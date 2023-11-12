<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_kabag extends CI_Model{


	public function load_data_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=2");
		return $sql->result_array();
	}

}