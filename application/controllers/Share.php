<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {
	public $id_user;
	public function __construct(){
		parent::__construct();
		$this->load->model("m_document");
		$this->load->model("m_approve");
		$this->load->model("m_share");
		$this->id_user = idUser();
		cekSession();
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

	public function sharePage($id_doc, $id_rev){
		$data['title'] 		= 'Share Document';
		$data['document']	= $this->m_share->detail_doc($id_rev, $id_doc)->row();
		$data['users']		= $this->db->get('tbl_user_login')->result();
		$data['department'] = getDepartment()->data;
		
		$this->load->view('header/share-page', $data);
		$this->load->view('home/sidebar');
		$this->load->view('share/index');
		$this->load->view('home/main-footer');
		$this->load->view('footer/share-page', $data);	
	}

	public function shareUserProses(){
		$user 	= $this->input->post('user');
		$id_rev = $this->input->post('id_rev');
		
		foreach ($user as $usr) {
			$data = [
				'id_rev' 			=> $id_rev,
				'id_user' 			=> $this->id_user,
				'id_user_receive' 	=> $usr,
				'created_at' 		=> time(),
				'is_active' 		=> 1
			];
			$this->m_share->insertShareUser($data);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function shareDeptProses(){
		$dept 	= $this->input->post('dept');
		$id_rev = $this->input->post('id_rev');
		
		foreach ($dept as $dpt) {
			$data = [
				'id_rev' 		=> $id_rev,
				'id_user' 		=> $this->id_user,
				'id_dept' 		=> $dpt,
				'created_at' 	=> time(),
				'is_active' 	=> 1
			];
			$this->m_share->insertShareDept($data);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function shareExternalProses(){
		$id_rev 	= $this->input->post('id_rev');
		$duration  	= $this->input->post('duration');
		$keperluan 	= $this->input->post('keperluan');
		$password 	= $this->input->post("password");
		$link_token = sha1(time());
		$data = [
			'id_rev'		=> $id_rev,
			'id_user'		=> $this->id_user,
			'password' 		=> $password,
			'token'			=> $link_token,
			'date_limit'	=> $duration,
			'confirm_mr'	=> 0,
			'keperluan' 	=> $keperluan,
			'is_active' 	=> 0,
			'created_at' 	=> time(),
		];
		
		$this->m_share->insertShareExternal($data);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function externalShare(){
		$data['title'] = 'List share';
		$data['list'] = $this->m_share->getExternalList($this->id_user);
		
		$this->load->view('header/share-page', $data);
		$this->load->view('home/sidebar');
		$this->load->view('share/list-share');
		$this->load->view('home/main-footer');
		$this->load->view('footer/share-page', $data);	
	}

	public function viewExternalDoc($id_doc, $id_rev){
		$data['title'] 	 	= 'DIMAS | Detail';
		$data['document']	= $this->m_share->view_detail_doc($id_rev, $id_doc)->row();
		$data['users']		= $this->db->get('tbl_user_login')->result();
		$data['department'] = getDepartment()->data;
		
		$this->load->view('header/share-page', $data);
		$this->load->view('home/sidebar');
		$this->load->view('share/view-share');
		$this->load->view('home/main-footer');
		$this->load->view('footer/share-page', $data);
	}
}
