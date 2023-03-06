<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_nakes extends CI_Model{

	public function load_data()
	{
		$user = $this->db->get_where('user', array('role_id' => ('2')))->row_array();;
	}
	
}