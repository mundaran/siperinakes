<?php
function cek_login_siperi()
{
	$ci = get_instance();
	if(!$ci->session->userdata('username'))
	{
		redirect('auth');
	}
	else{
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);

		$querymenu = $ci->db->get_where('user_menu', array('menu' => $menu))->row_array();
		$menu_id = $querymenu['id'];

		$userAccess = $ci->db->get_where('user_access_menu', array('role_id' =>$role_id, 'menu_id'=> $menu_id));

		if($userAccess->num_rows()<1){
			redirect('auth/blocked');
		}
	}
}