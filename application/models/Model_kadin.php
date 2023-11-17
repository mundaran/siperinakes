<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_kadin extends CI_Model{


	public function load_data_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=14");
		return $sql->result_array();
	}

	public function load_progres_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=2 OR status=11 OR status=12 OR status=14 ");
		return $sql->result_array();
	}

	public function load_manajemen_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=3");
		return $sql->result_array();
	}

	public function upload_foto($id_user,$update_data)
	{
		
		$this->db->where('id',$id_user);
		$berhasil = $this->db->update('user', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Foto Berhasil Di Upload</b></div>');
			redirect('kadin/my_profile');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('kadin/my_profile');
		}

			
	}

	public function edit_profile($id, $data)
	{
		$this->db->where('id', $id);
	    $berhasil = $this->db->update('user', $data);
	    if($berhasil)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Data Berhasil Di Ubah ! </b></div>');
			redirect('kadin/my_profile');
	    }
	    else
	    {
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Data Gagal Di Ubah !  </b></div>');
			redirect('kadin/my_profile');
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
			redirect('kadin/my_profile');
	    }
	}

	public function terbitkan_sip($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes)
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

			  $config['protocol'] = 'smtp';  
		      $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
		      $config['smtp_port'] = '465'; 
		      $config['smtp_user'] = 'cs.sipatas@gmail.com';  
		      $config['smtp_pass'] = 'sowovrydqhrcyyrz'; 
		      $config['mailtype'] = 'html';  
		      $config['charset'] = 'iso-8859-1';  
		      $config['wordwrap'] = TRUE;  
		      $config['newline'] = "\r\n"; 
		      $this->email->initialize($config);  
		      $url = base_url()."auth";  
		      $this->email->from('cs.sipatas@gmail.com', 'Notifikasi SIPATAS Dinas Kesehatan Bojonegoro');  
		      $this->email->to($email);   
		      $this->email->subject('SELAMAT SIP Anda Disetujui');  
		      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>SIP Anda Telah Disetujui</p><p>Silahkan Cetak Kedinas Kesehatan Bojonegoro </p><br/>Cek Status SIP Anda di ".$url."<br/><p>Regrads,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
		     	$this->email->message($message);
		     	$emailsent= $this->email->send();
				if($emailsent){
				$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b> Berhasil Diterbitkan  </b></div>');
				redirect('kadin/validasi_sip_kadin');
				}
				else{
					show_error($this->email->print_debugger());
				}

	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('sekdin/form_validasi_sip/'.$id_sip);
	    }
	}
}