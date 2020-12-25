<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class External extends CI_Controller {
	public $id_user;
	public function __construct(){
		parent::__construct();
		$this->load->model("m_document");
		$this->load->model("m_approve");
		$this->load->model("m_share");
		$this->load->model("m_external");
		$this->id_user = idUser();
	}


	public function index(){
		$data['title'] 	= 'DIMAS';
		$data['key'] 	= $this->input->get('key');
		$cekKey = $this->m_external->cekKey($data['key']);
		if ($cekKey->num_rows() <= 0) {
			redirect('external/not_found');
		}

		$duration 	 = $cekKey->row()->date_limit;
		$cekDuration = $this->cek_duration($duration);

		switch ($cekDuration) {
			case '0':
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Link document belum berlaku</div>');
				$data['status']	= 0;
			break;
			case '1':				
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Masukan Password</div>');
				$data['status'] = 1;
			break;
			case '2':
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Link document sudah tidak berlaku</div>');
				$data['status'] = 2;
			break;
		}

		$this->load->view('external/index', $data);
	}

	private function cek_duration($date){
		$waktu 	= explode('-', $date);
		$start 	= $waktu[0];
		$start 	= str_replace(' ', '', $start); 
		$start 	= explode('/', $start);
		

		$finish = $waktu[1];
		$finish	= str_replace(' ', '', $finish); 
		$finish	= explode('/', $finish);
		
		$start 	= GregorianToJD($start[0], $start[1], $start[2]);
		$finish = GregorianToJD($finish[0], $finish[1], $finish[2]);
		$now 	= GregorianToJD(date('m'), date('d'), date('Y'));

		if ($start <= $now) {
			if ($now <= $now) {
				return 1;
			} else {
				return 2;
			}
		} else {
			return 0;
		}
	}

	public function validationPassword(){
		$key 		= $this->input->post("key");
		$password 	= $this->input->post('password');

		$cek = $this->m_external->cekPassword($key, $password);
		if ($cek->num_rows() > 0) {
			$sess = [
				'key' => $key,
				'password' => $password,
			];
			$this->session->set_userdata($sess);
			redirect('external/initiation?key='.$key);
		} else {
			$this->session->set_flashdata('wrong', '<div class="alert alert-danger" role="alert">Password salah</div>');
			$this->session->set_userdata('salah', 1);
			redirect('external?key='.$key);
		}
	}

	public function not_found(){
		echo "Periksa Link kembali";
	}

	public function initiation(){
		$data['key'] 		= $this->input->get("key");
		$data['password'] 	= $this->session->userdata('pass');
		$data['title']		= 'DIMAS';
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Masukan data diri</div>');
		$this->load->view('external/initiation', $data);
	}

	public function initProses(){
		$data['password'] = $this->session->userdata('pass');
		$key 	= $this->input->get("key");
		$email 	= $this->input->post('email');
		$name  	= $this->input->post('name');
		$id_share = $this->m_external->getIdKey($key);

		$log = [
			'name' 	=> $name,
			'email' => $email,
			'id_share_external' => $id_share->id_share,
			'created_at' => time()
		];


		$id_log = $this->m_external->insertLog($log);
		$this->session->set_userdata('key', $key);
		$this->session->set_userdata($log);
		redirect('external/viewDocument?key='.$key);
	}

	public function viewDocument(){
		$key = $this->input->get('key');
		$data['title'] 		= 'DIMAS';
		$data['document'] 	= $this->m_external->getDocument($key)->row();

		$this->load->view('header/external', $data);
		$this->load->view('external/view-document', $data);
		$this->load->view('footer/external');
	}


	
}