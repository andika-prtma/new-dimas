<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {
	public $id_user;
	public function __construct(){
		parent::__construct();
		$this->load->model("m_document");
		$this->load->model("m_home");
		$this->load->model("m_approve");
		$this->id_user = idUser();
		cekSession();
	}

	public function index(){
		$data['title'] 		= 'Document';
		$data['department'] = getDepartment()->data;
		$data['all']		= $this->m_home->countAll('tbl_document');
		$data['users']		= $this->m_home->countAll('tbl_user_login');
		$data['shared']		= $this->m_home->countShared($this->id_user);
		
		$this->load->view('header/home-index', $data);
		$this->load->view('home/sidebar');
		$this->load->view('document/index');
		$this->load->view('home/main-footer');
		$this->load->view('footer/home-index', $data);
	}

	public function addDocument($id){
		$data['title'] 		= 'Add Document';
		$data['kategori']	= $this->m_document->getData('tbl_kategori');
		$data['id_dept'] 	= $id;
		$this->load->view('header/home-index', $data);
		$this->load->view('home/sidebar');
		$this->load->view('document/doc-add');
		$this->load->view('home/main-footer');
		$this->load->view('footer/home-index', $data);	
	}	

	public function add_proses(){
		
		$title 				= $this->input->post('title');
		$deskripsi 			= $this->input->post('deskripsi');
		$kategori 			= $this->input->post('kategori');
		$jenis 				= $this->input->post('jenis');
		$proses 			= $this->input->post('proses');
		$reminder 			= strtotime($this->input->post('reminder'));
		$creator			= $this->session->userdata('id_user');
		
		$id_dept			= $this->input->post('id_dept');
		
		if ($kategori == 2) {
			$jenis = 0;
		} else if ($kategori == 3){
			if ($jenis == 2) {
				$proses = 0;
			}
		} else {
			$proses = 0;
			$jenis = 0;
		}

		// 1. insert ke master document & ambil id
		$doc = [	
			'title' 		=> $title, 
			'deskripsi' 	=> $deskripsi,
			'reminder' 		=> $reminder, 
			'id_dept' 		=> $id_dept,
			'id_kategori' 	=> $kategori,
			'kode1' 		=> $jenis,
			'kode2' 		=> $proses,
			'creator' 		=> $creator,
			'created_at' 	=> time(),
		];

		$id_doc = $this->m_document->insertDoc($doc);
		
		// 2. insert ke document log
		$log = [	
			'id_doc' 		=> $id_doc,
			'id_user' 		=> $creator,
			'status' 		=> 1,
			'created_at'	=> time() 
		];
		$this->m_document->insertLog($log);
		
		$id_department 	= getProfileDepartment($id_dept);

		$kode 		= $id_department->data[0]->kode;
		$kodeName	= $this->m_document->getKodeDocument($id_doc)->row();
		$kode1		= $kodeName->ctg_kode1;
		$kode2		= $kodeName->ctg_kode2;
		// $kode_name 	= 'PM';

		switch ($kategori) {
			case '1':
				$kode_akhir = $this->generate_nomor('MFG', 'M.MMS');
				$this->db->query("UPDATE tbl_document SET number_document = '$kode_akhir' WHERE ID = $id_doc");
			break;

			case '2':
				$kode_akhir = $this->generate_nomor('F'.$kode_name, $kode);
				$this->db->query("UPDATE tbl_document SET number_document = '$kode_akhir' WHERE ID = $id_doc");
			break;
		}

		switch ($jenis) {
			case '1':
				$kode_akhir = $this->generate_nomor($kode1.$kode2, $kode);
				$this->db->query("UPDATE tbl_document SET number_document = '$kode_akhir' WHERE ID = $id_doc");
			break;

			case '2':
				$kode_akhir = $this->generate_nomor($kode1.$kode2, $kode);
				$this->db->query("UPDATE tbl_document SET number_document = '$kode_akhir' WHERE ID = $id_doc");
			break;
		}

		//create periode
		$periode = [
			'id_doc' 	 => $id_doc,
			'id_user'	 => $creator,
			'created_at' => time()
		];

		$periode = $this->m_document->insertPeriode($periode);
		$revisi = [
			'id_doc' 		=> $id_doc,
			'id_periode'	=> $periode,
			'title'  		=> $title,
			'revisi'		=> '00',
			'created_at'	=> time()
		];
		$revisi = $this->m_document->insertRevisi($revisi);
		
		// 6. back
		redirect('document/documentList/'.$id_dept);
	}

	public function generate_nomor($param1, $param2){
		$kode  = "$param1-$param2-";
	 	$query = $this->m_document->generateNumber($kode);
		
	 	if ($query->num_rows() > 0){
	 		$query = $query->row();
	 		$angka = $query->nomor;
	 	} else {
	 		$angka = '000';
	 	}

		$nomor_trakhir 	= number_format($angka)+1;

		if (strlen($nomor_trakhir)=='1'){
			$lanjutan = '00'.$nomor_trakhir;
		}else if (strlen($nomor_trakhir)=='2'){
			$lanjutan = '0'.$nomor_trakhir;
		}else if (strlen($nomor_trakhir)=='3'){
			$lanjutan = ''.$nomor_trakhir;
		}else{
			$lanjutan = '001';
		}

		$kode_akhir = "$param1-$param2-$lanjutan";

		return $kode_akhir;
		// echo $kode_akhir;
	}

	public function kode(){
		$where = $this->input->post('id');

		$kode = $this->m_document->get_kode_jenis($where)->result();
		echo '<option>--- Pilih Jenis document ---</option>';
		foreach ($kode as $kd) {
			echo '<option value="'. $kd->ID. '">'.$kd->arti.', kode: ('.$kd->kode.')'.'</option>';	
		}
	}

	public function kode_proses(){
		$where = $this->input->post('id');

		$kode_proses = $this->m_document->get_kode_proses($where)->result();
		echo '<option>--- Pilih Jenis document berdasarkan proses ---</option>';
		foreach ($kode_proses as $pr) {
			echo '<option value="'. $pr->ID. '">'.$pr->arti.', kode: ('.$pr->kode.')'.'</option>';	
		}
	}

	public function documentView($id, $id_revisi){
		$data['title'] 		= 'View Document';
		$data['document'] 	= $this->m_document->getDetailDoc($id)->row();
		$data['periode']	= $this->m_document->getWhere('tbl_document_periode', ['id_doc' => $id]);
		$data['revisi']		= $this->m_document->getWhere('tbl_document_revisi', ['id_doc' => $id]);
		$data['approval']	= $this->m_document->getApproval($id_revisi);
		$data['log']		= $this->m_approve->getLogApproval($id_revisi);
		$data['revisiData'] = $this->m_document->getWhere('tbl_document_revisi', ['ID' => $id_revisi])->row();
		$data['status']		= $this->m_document->cekStatusApprove($id_revisi);
		$data['id_doc']		= $id;
		$data['id_revisi']	= $id_revisi;

		$this->load->view('header/document-view', $data);
		$this->load->view('home/sidebar');
		$this->load->view('document/doc-view', $data);
		$this->load->view('home/main-footer');
		$this->load->view('footer/document-view', $data);
	}

	public function revisi_proses(){
		$id_revisi 	= $this->input->post('id_revisi');
		$id_doc 	= $this->input->post('id_doc');
		$title 		= $this->input->post('title');
		$comment 	= $this->input->post('comment');
		$rev 		= $this->input->post('rev');

		$file_doc 	= $this->upload($id_doc, 'file_doc');
		$file_pdf 	= $this->upload($id_doc, 'file_pdf');
		$update 	= [
			'revisi' 	=> $rev,
			'title'		=> $title,
			'comment'	=> $comment,
			'file_pdf'  => $file_pdf,
			'file_doc'	=> $file_doc
		];

		// var_dump($update);
		$this->m_document->updateRevisi($update, $id_revisi);

		$this->session->set_userdata('update', 1);
		redirect('document/documentView/'.$id_doc.'/'.$id_revisi);	
	}

	private function upload($id_doc, $name_post){
		// mkdir('uploads/attachment/'.$id_doc);
		if (!file_exists('service/stamp/attachment/'.$id_doc)) {
			mkdir('service/stamp/attachment/'.$id_doc);
		}

		$config['upload_path']          = 'service/stamp/attachment/'.$id_doc;
		$config['allowed_types']        = 'jpg|png|jpeg|pdf|docx|doc|xls|xlsx';
		$config['max_size']             = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($name_post)){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data']['file_name'];
		}	
	}

	public function documentList($id){
		$data['title'] 			= 'Document List';
		$data['documentList'] 	= $this->m_document->documentDetail($id);
		$data['id_dept']		= $id;
		$this->load->view('header/document-list', $data);
		$this->load->view('home/sidebar');
		$this->load->view('document/doc-list', $data);
		$this->load->view('home/main-footer');
		$this->load->view('footer/document-list', $data);
	}

	public function addRevisi($id_doc, $id_revisi){
		$revisi = $this->db->get_where('tbl_document_revisi', ['ID' => $id_revisi])->row();
		$nomor  = intval($revisi->revisi)+1;

		$data =[
			'id_doc' 		=> $id_doc,
			'id_periode' 	=> $revisi->id_periode,
			'revisi'		=> '0'.$nomor,
			'title'			=> $revisi->title,
			'comment'		=> $revisi->comment,
			'created_at' 	=> time()
		];
		$this->db->insert('tbl_document_revisi', $data);
		redirect('document/documentView/'.$id_doc.'/'.$this->db->insert_id());
	}

	public function submit($id_doc, $id_revisi){
		$this->db->set('submit', 1)
				->where('ID', $id_revisi)
				->update('tbl_document_revisi');
		$this->session->userdata('submit', 1);

		/*Update Level Status*/
		$update_level = level_doc($id_doc,$id_revisi)+1;
		$update       = $this->db->query("UPDATE tbl_document_revisi SET level_approve='$update_level' WHERE ID='$id_revisi' ");

		redirect('document/documentView/'.$id_doc.'/'.$id_revisi);
	}

	public function cekProfile(){
		$dept = getProfileDepartment(1);
		var_dump($dept);
	}

	public function publish(){
		$type = $this->input->post('typePublish');
		$date = strtotime($this->input->post('efektifDate'));
		$id_rev = $this->input->post('id_rev');
		$id_doc = $this->input->post('id_doc');

		$data = [
			'efektif_date' 	=> $date,
			'efektif'		=> 1,
			'type_publish' 	=> $type
		];

		$this->m_document->prosesPublish($id_rev, $data);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function listShared(){
		$data['title'] 			= 'Document List shared';
		$data['shrExternal'] 	= $this->m_document->getShareExternal();
		$data['shrUser'] 		= $this->m_document->getShareUser();
		$data['shrDept'] 		= $this->m_document->getShareDept();
		
		$this->load->view('header/document-list', $data);
		$this->load->view('home/sidebar');
		$this->load->view('document/doc-listShared', $data);
		$this->load->view('home/main-footer');
		$this->load->view('footer/document-list', $data);
	}

}