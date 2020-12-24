<?php


function level_doc($id_doc='',$id_rev=''){
	$ci = get_instance();
			$ci->db->select('level_approve');
			$ci->db->where('id_doc', $id_doc);
			$ci->db->where('ID', $id_rev);
	$open = $ci->db->get('tbl_document_revisi')->row_array();
	return $open['level_approve'];
}

function level_max($id_rev=''){
	$ci = get_instance();
			$ci->db->select('MAX(level) as level');
			$ci->db->where('id_revisi', $id_rev);
	$open = $ci->db->get('tbl_approval')->row_array();
	return $open['level'];
}

function level_pic($level='',$id_rev=''){
	$ci = get_instance();
			$ci->db->select('id_pic');
			$ci->db->where('level', $level);
			$ci->db->where('id_revisi', $id_rev);
	$open = $ci->db->get('tbl_approval')->row_array();	
	return $open['id_pic'];
}