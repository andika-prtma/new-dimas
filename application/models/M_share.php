<?php 

class M_share extends CI_Model{
	public function detail_doc($id_rev, $id_doc){
		$this->db->select('rev.*, doc.creator, doc.number_document, doc.id_dept, user.first_name' )
				->from('tbl_document_revisi as rev')
				->join('tbl_document as doc', 'doc.ID = rev.id_doc', 'left')
				->join('tbl_user_login as user', 'user.ID = doc.creator', 'left')
				->where('rev.ID', $id_rev);
		return $this->db->get();
	}
	

	public function insertShareUser($data){
		$this->db->insert('tbl_share_user', $data);
	}
	
	public function insertShareDept($data){
		$this->db->insert('tbl_share_dept', $data);
	}

	public function insertShareExternal($data){
		$this->db->insert('tbl_share_external', $data);
	}
}