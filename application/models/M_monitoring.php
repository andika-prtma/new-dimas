<?php 

class M_monitoring extends CI_Model{

	public function getRequest(){
		$this->db->select('rev.*, doc.number_document, ext.id_user as sender, ext.ID as id_ext')
				->from('tbl_share_external as ext')
				->join('tbl_document_revisi as rev', 'rev.ID = ext.id_rev', 'left')
				->join('tbl_user_login as usr', 'usr.ID = ext.id_user', 'left')
				->join('tbl_document as doc', 'doc.ID = rev.id_doc', 'left')
				->where('ext.confirm_mr', 0);
		return $this->db->get();
	}

	public function updateRequest($id_req){
		$this->db->set('confirm_mr', 1)
				->where('ID', $id_req)
				->update('tbl_share_external');
	}


}