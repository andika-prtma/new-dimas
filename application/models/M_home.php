<?php 

class M_home extends CI_Model{

	public function needApproval($id_user){
		$this->db->select('doc.number_document, user.first_name, user.last_name, rev.revisi, rev.ID as id_revisi, doc.ID as id_doc, rev.title')
				->from('tbl_approval as approve')
				->join('tbl_document_revisi as rev', 'rev.ID = approve.id_revisi', 'left')
				->join('tbl_document as doc', 'rev.id_doc = doc.ID', 'left')
				->join('tbl_user_login as user', 'user.ID = approve.id_pic', 'left')
				->where('approve.id_pic',$id_user);
		return $this->db->get();
	}

	public function documentDetail($id){
		$this->db->select('doc.*, user.first_name, user.last_name, rev.revisi, rev.ID as id_revisi')
				->from('tbl_document_revisi as rev')
				->join('tbl_document as doc', 'rev.id_doc = doc.ID', 'left')
				->join('tbl_user_login as user', 'user.ID = doc.creator', 'left')
				->where('doc.id_dept',$id);
		return $this->db->get();
	}

	public function getApproval($id_revisi){
		$this->db->select('approve.created_at, user.first_name, user.last_name, approve.status,rev.submit')
				->from('tbl_approval as approve')
				->join('tbl_user_login as user', 'user.ID = approve.id_pic', 'left')
				->join('tbl_document_revisi as rev', 'approve.id_revisi = rev.ID', 'left')
				->where('approve.id_revisi', $id_revisi);
		return $this->db->get();
	}

	public function countAll($tbl){
		return $this->db->get($tbl)->num_rows();
	}

	public function countShared($user){
		$personal 	= $this->db->get_where('tbl_share_user',['id_user' => $user])->num_rows();
		$dept 		= $this->db->get_where('tbl_share_dept',['id_user' => $user])->num_rows();
		$external 	= $this->db->get_where('tbl_share_external',['id_user' => $user])->num_rows();

		return $personal + $dept + $external;
	}
}