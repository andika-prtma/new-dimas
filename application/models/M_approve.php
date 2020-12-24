<?php 

class M_approve extends CI_Model{

	public function getAllUser(){
		return $this->db->get('tbl_user_login');
	}

	public function getListApprovers($id_revisi){
		$this->db->select('user.first_name, user.last_name, approve.*')
				->from('tbl_user_login as user')
				->join('tbl_approval as approve', 'approve.id_pic = user.ID', 'left')
				->where('approve.id_revisi', $id_revisi);
		return $this->db->get();
	}

	public function updateApprove($data, $where){
		$this->db->set($data)
				->where('id_revisi', $where);
		$this->db->update('tbl_approval');
	}

	public function updateApproveLog($data){ 
		$this->db->insert('tbl_approval_log',$data);
	}

	public function getLogApproval($id_revisi){
		$this->db->select('user.first_name, user.last_name, log.status, log.comment, log.updated_at')
				->from('tbl_approval_log as log')
				->join('tbl_user_login as user', 'user.ID = log.id_pic', 'left')
				->where('id_revisi', $id_revisi)
				->where('log.status !=', 0);
		return $this->db->get();				
	}


}