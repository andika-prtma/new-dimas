<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cekSession();
	}

	public function index(){
		$data['title'] 	= 'Dimas | Role Management';
		$data['role']	= $this->db->get("tbl_user_role");

		$this->load->view('header/home-index', $data);
		$this->load->view('home/sidebar');
		$this->load->view('role/lte/index', $data);
		$this->load->view('home/main-footer');
		$this->load->view('footer/home-index');
	}

	public function detail($id){
		$data['title'] 	= 'Dimas | Role Detail';
		$data['menu']	= $this->db->get('tbl_user_menu');
		$data['role']	= $this->db->get_where('tbl_user_role', ['ID' => $id])->row();
		$data['access'] = $this->db->get_where("tbl_user_access_menu", ['id_role' => $id])->row();;
		$this->load->view('header/home-index', $data);
		$this->load->view('home/sidebar');
		$this->load->view('role/lte/detail', $data);
		$this->load->view('home/main-footer');
		$this->load->view('footer/home-index');
	}

	public function detailProses(){
		$akses = $this->input->post('access');
		$button = $this->input->post('send');
		$name = $this->input->post('nameRole');
		$id = $this->input->post('idRole');

		if ($button == 'cancel') {
			redirect('role');
		} else {
			$this->db->set('id_menu', json_encode($akses));			
			$this->db->where("id_role", $id);
			$this->db->update('tbl_user_access_menu');

			$this->db->set('role', $name);
			$this->db->where('ID', $id);
			$this->db->update('tbl_user_role');

			redirect('role');
		}
	}

	public function addRole(){
		$this->db->insert('tbl_user_role', 
			['role' => $this->input->post('role'), 'created_at' => time()]
		);
		redirect('role');
	}
}