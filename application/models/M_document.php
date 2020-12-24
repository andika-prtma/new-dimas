<?php 

class M_document extends CI_Model{

	public function getData($tbl){
		return $this->db->get($tbl);
	}

	public function getWhere($tbl, $where){
		$this->db->where($where);
		return $this->db->get($tbl);
	}

	public function getDetailDoc($id_doc){
		$this->db->select('doc.*, user.first_name, user.last_name')
				->from('tbl_document as doc')
				->join('tbl_user_login as user', 'user.ID = doc.creator', 'left')
				->where('doc.ID', $id_doc);
		return $this->db->get();
	}

	public function get_kode_jenis($where){
		$this->db->where('id_kategori', $where)
				->where('id_type', 1);
		return $this->db->get('tbl_kategori_kode');
	}

	public function get_kode_proses($where){
		$this->db->where('id_kategori', $where)
				->where('id_type', 2);
		return $this->db->get('tbl_kategori_kode');
	}

	public function insertDoc($doc){
		$this->db->insert('tbl_document', $doc);
		return $this->db->insert_id();
	}

	public function insertLog($log){
		$this->db->insert('tbl_document_log', $log);
	}

	public function insertRevisi($rev){
		$this->db->insert('tbl_document_revisi', $rev);
		return $this->db->insert_id();
	}

	public function insertPeriode($periode){
		$this->db->insert('tbl_document_periode', $periode);
		return $this->db->insert_id();
	}

	public function generateNumber($kode){
		$this->db->select("RIGHT(doc.number_document, 3) as nomor")
				->from('tbl_document as doc')
				->like('doc.number_document',$kode, 'both')
				->order_by('doc.number_document','desc')
				->limit(1);
		return $this->db->get();
	}

	public function updateRevisi($data, $where){
		$this->db->set($data)
				->where('ID', $where);
		$this->db->update('tbl_document_revisi');

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

	public function getKodeDocument($id_doc){				
		$this->db->select('kd1.kode as ctg_kode1, kd2.kode as ctg_kode2')
				->from('tbl_document as doc')
				->join('tbl_kategori_kode as kd1', 'doc.kode1 = kd1.ID', 'left')
				->join('tbl_kategori_kode as kd2', 'doc.kode2 = kd2.ID', 'left')
				->where('doc.ID', $id_doc);
		return $this->db->get();
	}

	public function cekStatus($id_rev){
		$rev = $this->db->get_where('tbl_document_revisi', ['ID' => $id_rev])->row();
		$app = $this->db->get_where('tbl_approval', ['id_revisi' => $id_rev])->num_rows();
		
		if (intval($app)+1 == intval($rev->level_approve)) {
			return 1;
		} else{
			return 0;
		}
	}

	public function prosesPublish($id, $data){
		$this->db->set($data);
		$this->db->where('ID', $id);
		$this->db->update('tbl_document_revisi');
	}
}