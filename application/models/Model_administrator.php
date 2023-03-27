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
		$sql = $this->db->query("SELECT * FROM riwayat_perpanjangan WHERE status='undone'");
		$riwayat = $sql->row_array();
		$id_sip = $riwayat['id_sip'];
		$datasip = $this->db->query("SELECT * FROM data_sip WHERE id=$id_sip");
		return $datasip->result_array();
	}

	public function load_manajemen_sip()
	{
		$sql = $this->db->query("SELECT * FROM validasi_sip WHERE status_validasi=1");
		return $sql->result_array();
	}

	public function load_manajemen_user()
	{
		$sql = $this->db->query("SELECT * FROM user WHERE id");
		return $sql->result_array();
	}

	public function validasi_sip($data,$id_sip,$status_sip,$title_validasi)
	{
		$query= $this->db->insert('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$update_status = array( 'status'=>$status );
			$this->db->where('id',$id_sip);
			$berhasil = $this->db->update('data_sip', $update_status);

			$this->session->set_flashdata('message',$title_validasi);
			redirect('administrator/validasi_sip');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}

	public function validasi_perpanjangan($data,$id_sip,$status_sip,$validator,$title_validasi)
	{
		$this->db->where('id_sip',$id_sip);
		$query= $this->db->update('validasi_sip', $data);
	    if($query)
	    {	

	    	$status = $status_sip ;
	    	$update_status = array( 'status'=>$status );
			$this->db->where('id',$id_sip);
			$berhasil = $this->db->update('data_sip', $update_status);
			if ($berhasil) {

				$berhasil = $this->db->update('data_sip', $update_status);
			}
			$this->session->set_flashdata('message',$title_validasi);
			redirect('administrator/perpanjangan_sip');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}
	
}