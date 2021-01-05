<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $id_user;

	public function __construct(){
		parent::__construct();
		$this->load->model("m_home");
		$this->id_user = idUser();

		cekSession();
	}

	public function index(){

		$data['title']	 	= 'DIMAS';
		$data['document']	= $this->m_home->needApproval($this->session->userdata('id_user'));
		$data['document1']	= $this->m_home->jajal();
		$data['all']		= $this->m_home->countAll('tbl_document');
		$data['users']		= $this->m_home->countAll('tbl_user_login');
		$data['shared']		= $this->m_home->countShared($this->id_user);
		
		$this->load->view('header/home-index', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/index');
		$this->load->view('home/main-footer');
		$this->load->view('footer/home-index', $data);
	}

}