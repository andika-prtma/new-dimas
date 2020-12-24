<?php 

function cekSession(){
	$ci = get_instance();
	if (!$ci->session->userdata('id_user')) {
		redirect('login');
	}
}

function idUser(){
	$ci = get_instance();
	return $ci->session->userdata('id_user');
}