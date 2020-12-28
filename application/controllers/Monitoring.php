<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("m_document");
		$this->load->model("m_monitoring");
	}

	public function index(){
		$data['title'] 		= 'Monitoring';
		$data['request'] 	= $this->m_monitoring->getRequest()->result();
		
		$this->load->view('header/home-index', $data);
		$this->load->view('home/sidebar');
		$this->load->view('monitoring/mr/index');
		$this->load->view('home/main-footer');
		$this->load->view('footer/home-index', $data);
	}

	public function acceptRequestDirect($id){
		$this->m_monitoring->updateRequest($id);
		redirect('monitoring');
	}


}