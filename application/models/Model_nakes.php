<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_nakes extends CI_Model{


	public function load_data_register_sip()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE id_user = $user_id AND status=1 OR id_user = $user_id AND status=2 OR id_user = $user_id AND status=4");
		return $sql->result_array();
	}

	public function load_sip_terdaftar()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE id_user = $user_id ");
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


	public function load_list_pencabutan()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE id_user = $user_id AND status=9 OR id_user = $user_id AND status=10 ");
		return $sql->result_array();
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
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Password Gagal Di Ubah !  </b></div>');
			redirect('nakes/my_profile');
	    }
	}

	public function load_manajemen()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE id_user = $user_id AND status=3");
		return $sql->result_array();
	}

	public function load_data_revisi()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE id_user = $user_id AND status=4 OR id_user = $user_id AND status=6");
		return $sql->result_array();
	}

	public function registrasi_sip($data,$id_new_sip)
	{
		$query= $this->db->insert('data_sip', $data);
	    if($query)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b> Berhasil Lanjut Upload Berkas </b></div>');
			redirect('nakes/upload_berkas/'.$id_new_sip);
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Pengajuan  </b></div>');
			redirect('nakes/upload_berkas/'.$id_new_sip);
	    }
	}

	public function revisi_data_sip($data,$id_sip)
	{
		$this->db->where('id',$id_sip);
		$query= $this->db->update('data_sip', $data);
	    if($query)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b> Berhasil Update Cek Note Lainnya, Jika Tidak Ada Silahkan Klik Selesai Revisi</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Pengajuan  </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
	    }
	}


	public function upload_berkas_sip($id_user,$id_sip,$update_data)
	{
		$this->db->where('id',$id_sip);
		$this->db->where('id_user',$id_user);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> BERKAS TELAH DIUPLOAD, data sedang ditinjau!!! </b></div>');
			redirect('nakes/register_sip');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/register_sip');
		}
			
	}

	public function upload_foto($id_user,$update_data)
	{
		
		$this->db->where('id',$id_user);
		$berhasil = $this->db->update('user', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Foto Berhasil Di Upload</b></div>');
			redirect('nakes/my_profile');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/my_profile');
		}

			
	}

	public function update_foto_ktp($id_sip,$update_data)
	{
		
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document KTP Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}

			
	}

	public function update_foto_str($id_sip,$update_data)
	{
		
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document STR Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}

			
	}


	public function update_foto_rop($id_sip,$update_data)
	{
		
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document ROP Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}

			
	}

	public function update_foto_rtp($id_sip,$update_data)
	{
		
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document RTP Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}

			
	}

	public function update_foto_ijazah($id_sip,$update_data)
	{
		
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document IJAZAH Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}

			
	}

	public function update_foto_surat_sehat($id_sip,$update_data)
	{
		
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document SURAT SEHAT Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}

			
	}

	public function update_foto_surat_pernyataan($id_sip,$update_data)
	{
		
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document SURAT PERNYATAAN Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_sip/'.$id_sip);
		}

			
	}


	public function revisi_selesai($id_sip,$update_status)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_status);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Revisi Selesai Data Anda Sedang Ditinjau</b></div>');
			redirect('nakes/revisi');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> permohonan GAGAL !!! </b></div>');
			redirect('nakes/revisi');
		}

			
	}

	public function update_sip_diperpanjang($update_data,$id_sip)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Permohonan Perpanjangan Berhasil Data Anda Sedang Ditinjau</b></div>');
			redirect('nakes/list_perpanjangan');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> permohonan GAGAL !!! </b></div>');
			redirect('nakes/nakes_manajement');
		}

			
	}
	
	public function load_list_perpanjangan()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE id_user = $user_id AND status=5 OR id_user = $user_id AND status=7 OR id_user = $user_id AND status=8");
		return $sql->result_array();
	}

	public function update_no_str_perpanjangan($id_sip,$update_no_str)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_no_str);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Update No STR Berhasil </b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> Update GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}

			
	}

	public function update_masa_berlaku_perpanjangan($id_sip,$update_masa_berlaku)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_masa_berlaku);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Update Masa Berlaku Berhasil </b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> Update GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}

			
	}


	public function update_str_riwayat_perpanjangan($id_sip,$update_data_riwayat)
	{
		$status_riw='undone';
		$this->db->where('id_sip',$id_sip);
		$this->db->where('status',$status_riw);
		$berhasil = $this->db->update('riwayat_perpanjangan', $update_data_riwayat);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document STR Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}

			
	}

	public function update_sip_lama_perpanjangan($id_sip,$update_data_riwayat)
	{
		$status_riw='undone';
		$this->db->where('id_sip',$id_sip);
		$this->db->where('status',$status_riw);
		$berhasil = $this->db->update('riwayat_perpanjangan', $update_data_riwayat);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document SIP LAMA Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}

			
	}

	public function update_rop_riwayat_perpanjangan($id_sip,$update_data_riwayat)
	{
		$status_riw='undone';
		$this->db->where('id_sip',$id_sip);
		$this->db->where('status',$status_riw);
		$berhasil = $this->db->update('riwayat_perpanjangan', $update_data_riwayat);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Document ROP Berhasil Di Upload</b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		}

			
	}

	public function revisi_perpanjangan_selesai($id_sip,$update_status)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_status);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Revisi Selesai Data Anda Sedang Ditinjau</b></div>');
			redirect('nakes/list_perpanjangan');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> permohonan GAGAL !!! </b></div>');
			redirect('nakes/list_perpanjangan');
		}

			
	}

	public function permohonan_pencabutan($id_sip,$update_data)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Permohonan Anda Berhasil, Silahkan Ke kantor Dinas Kesehatan Untuk Mengembalikan dan Validasi Pencabutan SIP</b></div>');
			redirect('nakes/manajemen_sip');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> permohonan GAGAL !!! </b></div>');
			redirect('nakes/manajemen_sip');
		}

			
	}


}