<?php 

class Spd_model extends CI_Model{
	
	public function update_lampiran($id, $data){
		$this->db->set('attachment', $data);
		$this->db->where('ID', $id);
		$this->db->update('tbl_spd');
	}

	public function getCarLocation(){
		$this->db->select('m.name_mbl, m.nmr_plat, m.status, l.location, m.ID')
				->from('tbl_mbl as m')
				->join('tbl_mbl_location as l', 'l.ID = m.id_mbl_location', 'left');
		return $this->db->get();				
	}

	public function getDataSPD(){
		$this->db->get("s.nomor_spd, s.request_for, p.name_pickup,s.departure_date")
				->from('tbl_spd as s')
				->join('tbl_place as p', 'p.ID = s.id_place','join');
		return $this->db->get();
	}

	public function dataSPDwithUser($id_user){
		$this->db->get("spd.*, reqby.email as by_name, reqby.first_name as by_name, reqfor.email as for_email, reqfor.first_name as for_name, place.name_pickup, place.mobil_pickup, place.name_destination, place.mobil_destination")
				->from('tbl_spd as spd')
				->join('tbl_place as place', 'place.ID = spd.id_place','left')
				->join('tbl_user_login as reqby', 'reqby.ID = spd.reqby', 'left')
				->join('tbl_user_login as reqfor', 'reqfor.ID = spd.reqfor', 'left')
				->where('spd.request_for', $id_user);
		return $this->db->get();	
	}

	public function sss($id_user){
		$this->db->select("
			spd.nomor_spd, spd.departure_date, spd.agenda, spd.project, spd.created_at,
			 reqby.email as by_email, reqby.first_name as by_name, 
			 reqfor.email as for_email, reqfor.first_name as for_name, 
			 place.name_pickup, place.mobil_pickup, place.name_destination, place.mobil_destination")
				->from('tbl_spd as spd')
				->join('tbl_place as place', 'place.ID = spd.id_place','left')
				->join('tbl_user_login as reqby', 'reqby.ID = spd.request_by', 'left')
				->join('tbl_user_login as reqfor', 'reqfor.ID = spd.request_for', 'left')
				->where('spd.request_for', $id_user);
		return $this->db->get();	
	}

}