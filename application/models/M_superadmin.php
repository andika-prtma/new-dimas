<?php 

class M_superadmin extends CI_Model{
	
	public function getMenu($role){
		$this->db->select('user_menu.ID, user_menu.menu')
				->from('tbl_user_menu as user_menu')
				->join('tbl_user_access_menu as access_menu', 'access_menu.id_menu = user_menu.ID', 'left')
				->where('access_menu.id_role', $role)
				->order_by('access_menu.id_menu', 'ASC');
		return $this->db->get();
	}

	public function getSubMenu($id){
		$this->db->select('*')
				->from('tbl_user_sub_menu as sub_menu')
				->where('sub_menu.id_menu', $id)
				->where('sub_menu.is_active', 1);
		return $this->db->get();
	}

	public function getAllSubMenu(){
		$this->db->select('sm.ID, sm.title, sm.link, m.menu')
				->from('tbl_user_sub_menu as sm')
				->join('tbl_user_menu as m', 'm.ID = sm.id_menu', 'left');
		return $this->db->get();
	}
}