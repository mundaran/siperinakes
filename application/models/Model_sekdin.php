<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_sekdin extends CI_Model{


	public function load_data_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=12");
		return $sql->result_array();
	}

	public function load_progres_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=2 OR status=11 OR status=14");
		return $sql->result_array();
	}

	public function load_manajemen_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=3");
		return $sql->result_array();
	}


	public function edit_profile($id, $data)
	{
		$this->db->where('id', $id);
	    $berhasil = $this->db->update('user', $data);
	    if($berhasil)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Data Berhasil Di Ubah ! </b></div>');
			redirect('sekdin/my_profile');
	    }
	    else
	    {
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Data Gagal Di Ubah !  </b></div>');
			redirect('sekin/my_profile');
	    }
	}

	public function upload_foto($id_user,$update_data)
	{
		
		$this->db->where('id',$id_user);
		$berhasil = $this->db->update('user', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Foto Berhasil Di Upload</b></div>');
			redirect('sekdin/my_profile');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('sekdin/my_profile');
		}

			
	}

	public function update_password($id,$data_password)
	{
		$this->db->where('id', $id);
	    $berhasil = $this->db->update('user', $data_password);
	    if($berhasil)
	    {	
	    	$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Password Berhasil Ubah ! Silahkan Login Kembali</b></div>');
			redirect('auth');
	    }
	    else
	    {
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Password Gagal Di Ubah ! Password Lama Tidak Sesuai </b></div>');
			redirect('sekdin/my_profile');
	    }
	}


	public function konfirmasi_kadin($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes)
	{
		$this->db->where('id_sip',$id_sip);
		$query= $this->db->update('validasi_sip', $data);
	    if($query)
	    {	
	    	$id_pemohon =$id_nakes;
	    	$user = $this->db->get_where('user', array('id'=> $id_pemohon))->row_array();
	    	$email = $user['email'];
	    	$name = $user['name'];


	    	$status = $status_sip ;
	    	$no_sip = $nomor_sip;
	    	$note = $catatan;
	    	$update_status = array( 
	    		'status'=>$status,
	    		'nomor_sip'=>$nomor_sip,
	    		'catatan'=>$catatan
	    					);
			$this->db->where('id',$id_sip);
			$berhasil = $this->db->update('data_sip', $update_status);
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b> Berhasil Validasi, Berkas sedang Proses Kadin  </b></div>');
			redirect('sekdin/form_validasi_sip/'.$id_sip);

	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('sekdin/form_validasi_sip/'.$id_sip);
	    }
	}
}