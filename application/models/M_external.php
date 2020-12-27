<?php 

class M_external extends CI_Model{

	public function cekKey($token){
		$share 		= $this->db->get_where('tbl_share_external', ['token' => $token]);
		return $share;
	}

	public function cekPassword($key, $password){
		$this->db->select('tbl_share_external.*')
				->where('token', $key)
				->where('password', $password);
		return $this->db->get('tbl_share_external');
	}

	public function getIdKey($key){
		$this->db->select('share.ID as id_share')
				->where('token', $key);
		return $this->db->get('tbl_share_external as share')->row();
	}

	public function insertLog($log){
		$this->db->insert('tbl_share_external_log', $log);
		return $this->db->insert_id();
	}

	public function getDocument($key){
		$this->db->select('rev.*, user.first_name as creator, user2.first_name as sender, doc.number_document, doc.id_dept, doc.ID as id_doc ')
				->from('tbl_share_external as ext')
				->join('tbl_document_revisi as rev', 'ext.id_rev = rev.ID', 'left')
				->join('tbl_document as doc', 'rev.id_doc = doc.ID', 'left')
				->join('tbl_user_login as user', 'doc.creator = user.ID', 'join')
				->join('tbl_user_login as user2', 'ext.id_user = user2.ID', 'join')
				->where('ext.token', $key);
		return $this->db->get();
	}

	public function insertComment($comment, $visitor){
		$data = [
			'id_ext_log' 	=> $visitor,
			'comment' 		=> $comment,
			'created_at' 	=> time()
		];

		$this->db->insert('tbl_share_external_comment', $data);
	}

	


}