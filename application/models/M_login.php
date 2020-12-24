<?php 

class M_login extends CI_Model{

	public function updateLastLogin($id_user){
		$this->db->set("last_login", time());
		$this->db->where('ID', $id_user);
		$this->db->update('tbl_user_login');
	}
}