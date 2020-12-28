<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

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


}