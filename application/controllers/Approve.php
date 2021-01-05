<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("m_document");
		$this->load->model("m_approve");
	}

	public function index(){
		$data['title'] 		= 'Document';
		$data['department'] = getDepartment()->data;
		
		$this->load->view('header/home-index', $data);
		$this->load->view('home/sidebar');
		$this->load->view('document/index');
		$this->load->view('home/main-footer');
		$this->load->view('footer/home-index', $data);
	}

	public function approveDocument($doc, $id_revisi){
		$data['title'] 		= 'View Document';
		$data['document'] 		= $this->m_document->getDetailDoc($doc)->row();
		$data['users']			= $this->m_approve->getAllUser();
		$data['approvalList']	= $this->m_approve->getListApprovers($id_revisi);
		$data['id_revisi']	= $id_revisi;
		$data['id_doc']		= $doc;
		
		$this->load->view('header/document-view', $data);
		$this->load->view('home/sidebar');
		$this->load->view('approve/approve-doc', $data);
		$this->load->view('home/main-footer');
		$this->load->view('footer/document-view', $data);
	}

	public function setup_proses(){
		$name_level = $this->input->post('level');
		$person		= $this->input->post('person');
		$id_revisi 	= $this->input->post('id_revisi');
		$id_doc		= $this->input->post('id_doc');
		$level 		= $this->db->get_where('tbl_approval', ['id_revisi' => $id_revisi])->num_rows();

		$data = [
			'id_revisi' 	=> $id_revisi,
			'id_pic'		=> $person,
			'name_level' 	=> $name_level,
			'level'			=> intval($level)+1,
			'status'		=> 1,
			'created_at'	=> time()

		];

		$this->db->insert('tbl_approval', $data);
		redirect('approve/approveDocument/'.$id_doc.'/'.$id_revisi);
	}

	public function detail($id, $id_revisi){
		$data['title'] 		= 'Detail';
		$data['document'] 	= $this->m_document->getDetailDoc($id)->row();
		$data['periode']	= $this->m_document->getWhere('tbl_document_periode', ['id_doc' => $id]);
		$data['revisi']		= $this->m_document->getWhere('tbl_document_revisi', ['id_doc' => $id]);
		$data['approval']	= $this->m_document->getApproval($id_revisi);
		$data['log']		= $this->m_approve->getLogApproval($id_revisi);
		$data['revisiData'] = $this->m_document->getWhere('tbl_document_revisi', ['ID' => $id_revisi])->row();
		$data['id_doc']		= $id;
		$data['id_revisi']	= $id_revisi;
		$data['statusApp'] 	= $this->m_document->cekStatusApprove($id_revisi);

		$this->load->view('header/document-view', $data);
		$this->load->view('home/sidebar');
		$this->load->view('approve/approve-detail', $data);
		$this->load->view('home/main-footer');
		$this->load->view('footer/document-view', $data);
	}

	public function approve_proses(){
		$comment = $this->input->post('comment');
		$status  = $this->input->post('status');
		$id_doc 	= $this->input->post('id_doc');
		$id_revisi 	= $this->input->post('id_revisi');

		$data = [
			'comment' 		=> $comment,
			'status'		=> $status,
			'updated_at' 	=> time()
		];
		$this->m_approve->updateApprove($data, $id_revisi);
		$datalog = [
			'id_revisi' 	=> $id_revisi,
			'id_pic'       	=> $this->session->userdata('id_user'),
			'comment' 		=> $comment,
			'status'		=> $status,
			'updated_at' 	=> time()
		];
		$this->m_approve->updateApproveLog($datalog);
		$update = $this->db->query("UPDATE tbl_document_revisi SET level_approve='$status' WHERE ID='$id_revisi' ");
		//cek complete approval
		$this->m_approve->cekApproval($id_doc, $id_revisi);
		redirect('approve/detail/'.$id_doc.'/'.$id_revisi);
	}

}