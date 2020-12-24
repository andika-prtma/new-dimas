<?php 

class Ga_model extends CI_Model{
	
	public function searchByDate($start, $end){
		$this->db->where("date(departure_date) >=", $start)
				->where("date(departure_date) <=", $end);
		return $this->db->get('tbl_spd');
	}

	public function cariData($start, $end){
		$site = $this->input->post('site');
		$driver = intval($this->input->post('driver'));
		$mobil = intval($this->input->post('mobil'));
		
		$this->db->select('spd.nomor_spd, spd.agenda, u.first_name, spd.project, spd.departure_date, spd.expected_date, p.name_pickup as tujuan, spd.created_at')
				->from('tbl_spd as spd')
				->join('tbl_place as p', 'spd.id_place = p.ID', 'left')
				->join('tbl_user_login as u', 'spd.request_for = u.ID', 'left');

		if ($mobil != null && $site != null && $driver != null ) {
			//ada semua
			$this->db->where('p.driver_pickup', $driver)
					->where('p.mobil_pickup', $mobil)
					->where('spd.id_bu', $site)
					->where("date(departure_date) >=", $start)
					->where("date(departure_date) <=", $end);
		} else if ($site && $driver != null) {
			$this->db->where('spd.id_bu', $site)
					->where('p.driver_pickup', $driver);
		} else if ($site && $mobil != null) {
			$this->db->where('spd.id_bu', $site)
					->where('p.mobil_pickup', $mobil);
		} else if ($driver && $mobil != null) {
		 	$this->where('p.driver_pickup', $driver)
					->where('p.mobil_pickup', $mobil);
		} else {
			$this->db->where("date(departure_date) >=", $start)
				->where("date(departure_date) <=", $end);
		}
		return $this->db->get();
	}

	public function cariData2($start, $end){
		$site = $this->input->get('site');
		$driver = intval($this->input->get('driver'));
		$mobil = intval($this->input->get('mobil'));
		
		$this->db->select('spd.nomor_spd, spd.agenda, u.first_name, spd.project, spd.departure_date, spd.expected_date, p.name_pickup as tujuan, spd.created_at')
				->from('tbl_spd as spd')
				->join('tbl_place as p', 'spd.id_place = p.ID', 'left')
				->join('tbl_user_login as u', 'spd.request_for = u.ID', 'left');

		if ($mobil != 0 && $site != 0 && $driver != 0 ) {
			//ada semua
			$this->db->where('p.driver_pickup', $driver)
					->where('p.mobil_pickup', $mobil)
					->where('spd.id_bu', $site)
					->where("date(departure_date) >=", $start)
					->where("date(departure_date) <=", $end);
		} else if ($site && $driver != 0) {
			$this->db->where('spd.id_bu', $site)
					->where('p.driver_pickup', $driver);
		} else if ($site && $mobil != 0) {
			$this->db->where('spd.id_bu', $site)
					->where('p.mobil_pickup', $mobil);
		} else if ($driver && $mobil != 0) {
		 	$this->where('p.driver_pickup', $driver)
					->where('p.mobil_pickup', $mobil);
		} else {
			$this->db->where("date(departure_date) >=", $start)
				->where("date(departure_date) <=", $end);
		}
		return $this->db->get();
	}

	public function dataSPDwithUserName(){
		$this->db->select('spd.*, user.first_name, place.name_destination, driver.name, place.driver_pickup')
				->from('tbl_spd as spd')
				->join('tbl_user_login as user', 'user.ID = spd.request_for', 'left')
				->join('tbl_place as place', 'place.ID = spd.id_place', 'left')
				->join('tbl_mbl_driver as driver', 'driver.ID = place.driver_pickup', 'left');
		return $this->db->get();
	}

	public function existingSpd($id){
		$this->db->select('spd.*, 
			reqby.first_name as by_name, reqfor.first_name as for_name, 
			place.name_destination, place.name_pickup, place.jarak, spd.departure_date, spd.expected_date, place.ID as id_place')
				->from('tbl_spd as spd')
				->join('tbl_user_login as reqfor', 'reqfor.ID = spd.request_for', 'left')
				->join('tbl_user_login as reqby', 'reqby.ID = spd.request_by', 'left')
				->join('tbl_place as place', 'place.ID = spd.id_place', 'left')
				->join('tbl_mbl_driver as driver', 'driver.ID = place.driver_pickup', 'left')
				->where('spd.ID', $id);
		return $this->db->get();	
	}
	
}