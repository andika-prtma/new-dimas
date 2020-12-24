<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index2(){
		$data['title'] 	= 'Rosalina | Role Management';
		$data['menu']	= $this->db->get("tbl_user_menu");
		$data['sub']	= $this->m_superadmin->getAllSubMenu();

		$this->load->view('superadmin/structure/header', $data);
		$this->load->view('home/sidebar');
		$this->load->view('home/topbar');
		$this->load->view('menu/index', $data);
		$this->load->view('home/footer-content');
		$this->load->view('superadmin/structure/footer');
	}

	public function index(){
		$data['title'] 	= 'Rosalina | Role Management';
		$data['menu']	= $this->db->get("tbl_user_menu");
		$data['sub']	= $this->m_superadmin->getAllSubMenu();

		$this->load->view('header/home-index', $data);
		$this->load->view('home/lte/sidebar');
		$this->load->view('home/lte/topbar');
		$this->load->view('menu/lte/index', $data);
		$this->load->view('home/lte/footer-content');
		$this->load->view('footer/home-index');
	}

	public function addNewMenu(){
		$title = $this->input->post('title');
		$this->db->insert('tbl_user_menu', ['menu' => $title, 'created_at' => time()]);
		redirect('menu');
	}

	public function addNewSubMenu(){
		$active = 1;
		if (!$this->input->post('active') == 1) {
			$active = 0;
		}

		$arr = [
			'id_menu' => $this->input->post('id_menu'),
			'title'	=> $this->input->post('title'),
			'link'	=> $this->input->post('link'),
			'created_at' => time(),
			'is_active' => $active
		];
		$this->db->insert('tbl_user_sub_menu', $arr);
		redirect('menu');
	}
}