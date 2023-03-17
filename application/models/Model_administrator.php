<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_administrator extends CI_Model{


	public function load_data_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=2");
		return $sql->result_array();
	}

	public function load_data_perpanjangan_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=4");
		return $sql->result_array();
	}

	public function validasi_sip($data,$id_sip)
	{
		$query= $this->db->insert('validasi_sip', $data);
	    if($query)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b> Berhasil Lanjut Upload Berkas </b></div>');
			redirect('adminsitrator/validasi_sip');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}
	
}