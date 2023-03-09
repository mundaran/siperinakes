<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_nakes extends CI_Model{


	public function load_data_sip()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE id_user = $user_id AND status=1 OR id_user = $user_id AND status=2");
		return $sql->result_array();
	}

	public function edit_profile($id, $data)
	{
		$this->db->where('id', $id);
	    $berhasil = $this->db->update('user', $data);
	    if($berhasil)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Data Berhasil Di Ubah ! </b></div>');
			redirect('nakes/my_profile');
	    }
	    else
	    {
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Data Gagal Di Ubah !  </b></div>');
			redirect('auth/register_user');
	    }
	}

	public function registrasi_sip($data)
	{
		$query= $this->db->insert('data_sip', $data);
	    if($query)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b> Berhasil Lanjut Upload Berkas </b></div>');
			redirect('nakes/upload_berkas');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Pengajuan  </b></div>');
			redirect('auth/register_sip');
	    }
	}


	public function upload_data_berkas($id_sip,$data)
	{
		$this->db->where('id', $id_sip);
		$berhasil = $this->db->update('data_sip', $data);
		if($berhasil){
			$this->session->set_flashdata('message4','<div class="alert bg-green"><b> BERHASIL data sedang ditinjau!!! </b></div>');
			redirect('nakes/register_sip');
		}
		else{

			$this->session->set_flashdata('message4','<div class="alert bg-pink"><b> GAGAL !!! </b></div>');
			redirect('nakes/register_sip');
		}

			
	}
	
}