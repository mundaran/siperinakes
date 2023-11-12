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
		
		$datasip = $this->db->query("SELECT * FROM data_sip WHERE status=5 ");
		return $datasip->result_array();
	}

	public function load_manajemen_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=3");
		return $sql->result_array();
	}

	public function load_list_revisi_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=6 OR status=4");
		return $sql->result_array();
	}

	public function load_list_revisi_sip_perpanjangan()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=8 OR status=7");
		return $sql->result_array();
	}

	public function load_manajemen_user()
	{
		$sql = $this->db->query("SELECT * FROM user WHERE id AND aktifasi=1");
		return $sql->result_array();
	}

	public function load_manajemen_user_nonaktif()
	{
		$sql = $this->db->query("SELECT * FROM user WHERE id AND aktifasi=0");
		return $sql->result_array();
	}

	public function load_list_pencabutan()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$user_id = $user['id'];
		$sql = $this->db->query("SELECT * FROM data_sip WHERE  status=9 OR status=10 ");
		return $sql->result_array();
	}


	public function load_progres_sip()
	{
		$sql = $this->db->query("SELECT * FROM data_sip WHERE status=3");
		return $sql->result_array();
	}

	public function tambah_user($data)
	{
		$query= $this->db->insert('user', $data);
	    if($query)
	    {	
	    	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Tambah User Berhasil </b></div>');
			redirect('administrator/manajemen_user');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('administrator/manajemen_user');
	    }
	}


	public function edit_profile($id, $data)
	{
		$this->db->where('id', $id);
	    $berhasil = $this->db->update('user', $data);
	    if($berhasil)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Data Berhasil Di Ubah ! </b></div>');
			redirect('administrator/my_profile');
	    }
	    else
	    {
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Data Gagal Di Ubah !  </b></div>');
			redirect('administrator/my_profile');
	    }
	}

	public function edit_profile_nakes($id_nakes, $data)
	{
		$this->db->where('id', $id_nakes);
	    $berhasil = $this->db->update('user', $data);
	    if($berhasil)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><b>Data Berhasil Di Ubah ! </b></div>');
			redirect('administrator/edit_user/'.$id_nakes);
	    }
	    else
	    {
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Data Gagal Di Ubah !  </b></div>');
			redirect('administrator/edit_user/'.$id_nakes);
	    }
	}

	public function upload_foto($id_user,$update_data)
	{
		
		$this->db->where('id',$id_user);
		$berhasil = $this->db->update('user', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Foto Berhasil Di Upload</b></div>');
			redirect('administrator/my_profile');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('administrator/my_profile');
		}

			
	}

	public function edit_foto_nakes($id_nakes,$update_data)
	{
		
		$this->db->where('id',$id_nakes);
		$berhasil = $this->db->update('user', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Foto Berhasil Di Upload</b></div>');
			redirect('administrator/edit_user/'.$id_nakes);
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> GAGAL !!! </b></div>');
			redirect('administrator/edit_user/'.$id_nakes);
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
			redirect('administrator/my_profile');
	    }
	}

	public function update_password_nakes($id_nakes,$data_password)
	{
		$this->db->where('id', $id_nakes);
	    $berhasil = $this->db->update('user', $data_password);
	    if($berhasil)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert"><b>Password Berhasil Ubah. </b></div>');
			redirect('administrator/edit_user/'.$id_nakes);
	    }
	    else
	    {
	    	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Password Gagal Di Ubah !  </b></div>');
			redirect('administrator/edit_user/'.$id_nakes);
	    }
	}

	public function nonaktifkan_user($id_nakes,$datanakes)
	{
		$this->db->where('id', $id_nakes);
	    $berhasil_nonak = $this->db->update('user', $datanakes);
	    if($berhasil_nonak)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Data User Nonaktifkan ! </b></div>');
			redirect('administrator/manajemen_user');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Data User Gagal Nonaktifkan ! </b></div>');
			redirect('administrator/manajemen_user');
	    }
	}

	public function aktifkan_user($id_nakes,$datanakes)
	{
		$this->db->where('id', $id_nakes);
	    $berhasil_ak = $this->db->update('user', $datanakes);
	    if($berhasil_ak)
	    {	
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><b> User Diaktifkan ! </b></div>');
			redirect('administrator/manajemen_user');
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><b> Data User Gagal Diaktifkan ! </b></div>');
			redirect('administrator/manajemen_user');
	    }
	}

	public function approval_validasi_sip($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes)
	{
		$query= $this->db->insert('validasi_sip', $data);
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

		    }
		    else
		    {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi Hubungi Administrator </b></div>');
				redirect('adminsitrator/form_validasi_sip/'.$id_sip);
		    }
	}

	public function approval_revisi_sip_baru($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes)
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
		      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>SIP Anda Telah Disetujui</p><p>Silahkan Cetak Kedinas Kesehatan Bojonegoro </p><br/>Cek Status SIP Anda di ".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
		     	$this->email->message($message);
		     	$emailsent= $this->email->send();
				if($emailsent){
				$this->session->set_flashdata('message',$title_validasi);
				redirect('administrator/list_revisi_sip');
				}
				else{
					show_error($this->email->print_debugger());
				}

	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}


	public function revisi_validasi_sip($data,$id_sip,$status_sip,$title_validasi,$id_nakes)
	{

		$id_pemohon =$id_nakes;
    	$user = $this->db->get_where('user', array('id'=> $id_pemohon))->row_array();
    	$email = $user['email'];
    	$name = $user['name'];


		$query= $this->db->insert('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$update_status = array( 'status'=>$status );
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
		      $this->email->subject('REVISI SIP');  
		      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>Mohon REVISI data SIP Anda </p><br/>Cek Status REVISI SIP Anda di ".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
		     	$this->email->message($message);
		     	$emailsent= $this->email->send();
				if($emailsent){
				$this->session->set_flashdata('message',$title_validasi);
				redirect('administrator/validasi_sip');
				}
				else{
					show_error($this->email->print_debugger());
				}

	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}

	public function revisi_revisi_sip_baru($data,$id_sip,$status_sip,$title_validasi,$id_nakes)
	{
		$id_pemohon =$id_nakes;
    	$user = $this->db->get_where('user', array('id'=> $id_pemohon))->row_array();
    	$email = $user['email'];
    	$name = $user['name'];



		$this->db->where('id_sip',$id_sip);
		$query= $this->db->update('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$update_status = array( 'status'=>$status );
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
		      $this->email->subject('REVISI SIP');  
		      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>Mohon REVISI data SIP Anda </p><br/>Cek Status REVISI SIP Anda di ".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
		     	$this->email->message($message);
		     	$emailsent= $this->email->send();
				if($emailsent){
				$this->session->set_flashdata('message',$title_validasi);
				redirect('administrator/list_revisi_sip');
				}
				else{
					show_error($this->email->print_debugger());
				}


	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}


	public function validasi_perpanjangan($data,$id_sip,$status_sip,$nomor_sip,$catatan,$validator_sebelumnya,$title_validasi,$nama_admin,$id_nakes)
	{


		$id_pemohon =$id_nakes;
    	$user = $this->db->get_where('user', array('id'=> $id_pemohon))->row_array();
    	$email = $user['email'];
    	$name = $user['name'];

		$this->db->where('id_sip',$id_sip);
		$update_validasi= $this->db->update('validasi_sip', $data);

	    if($update_validasi){	
	    	$status = $status_sip ;
	    	$update_status = array( 
	    		'status'=>$status,
	    		'nomor_sip'=>$nomor_sip,
	    		'catatan'=>$catatan
	    	 );
			$this->db->where('id',$id_sip);
			$up_data_sip = $this->db->update('data_sip', $update_status);

			if ($up_data_sip) {
				$up_status = 'done';
				$data_riwayat=array(
					'status' => $up_status,
					'approver_sebelumnya'=>$validator_sebelumnya,
					'approver_perpanjangan'=>$nama_admin
				);

				$status_per = 'undone';
				$where =array(
					'id_sip' => $id_sip,
					'status'=>$status_per
				);
				$this->db->where($where);
				$up_riwayat = $this->db->update('riwayat_perpanjangan', $data_riwayat);

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
			      $this->email->subject('SELAMAT PERPANJANGAN DISETUJUI');  
			      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>PERPANJANGAN SIP Anda Telah Disetujui</p><p>Silahkan Cetak Kedinas Kesehatan Bojonegoro </p><br/>Cek Status SIP Anda di ".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
			     	$this->email->message($message);
			     	$emailsent= $this->email->send();
					if($emailsent){
					$this->session->set_flashdata('message',$title_validasi);
					redirect('administrator/perpanjangan_sip');
					}
					else{
						show_error($this->email->print_debugger());
					}

				
			} else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
				redirect('administrator/perpanjangan_sip');
			}
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}

	public function revisi_perpanjangan($data,$id_sip,$status_sip,$validator_sebelumnya,$title_validasi,$nama_admin,$id_nakes)
	{

		$id_pemohon =$id_nakes;
    	$user = $this->db->get_where('user', array('id'=> $id_pemohon))->row_array();
    	$email = $user['email'];
    	$name = $user['name'];

		$this->db->where('id_sip',$id_sip);
		$update_validasi= $this->db->update('validasi_sip', $data);

	    if($update_validasi){	
	    	$status = $status_sip ;
	    	$update_status = array( 
	    		'status'=>$status,
	    	 );
			$this->db->where('id',$id_sip);
			$up_data_sip = $this->db->update('data_sip', $update_status);

			if ($up_data_sip) {
				$up_status = 'undone';
				$data_riwayat=array(
					'status' => $up_status,
					'approver_sebelumnya'=>$validator_sebelumnya,
					'approver_perpanjangan'=>$nama_admin
				);

				$status_per = 'undone';
				$where =array(
					'id_sip' => $id_sip,
					'status'=>$status_per
				);
				$this->db->where($where);
				$up_riwayat = $this->db->update('riwayat_perpanjangan', $data_riwayat);

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
		      $this->email->subject('REVISI PERPANJANGAN SIP');  
		      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>Mohon REVISI data SIP Anda </p><br/>Cek Status REVISI PERPANJANGAN SIP Anda di ".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
		     	$this->email->message($message);
		     	$emailsent= $this->email->send();
				if($emailsent){
				$this->session->set_flashdata('message',$title_validasi);
				redirect('administrator/perpanjangan_sip');
				}
				else{
					show_error($this->email->print_debugger());
				}

				
			} 
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
				redirect('administrator/perpanjangan_sip');
			}
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_sip/'.$id_sip);
	    }
	}

	public function validasi_revisi_perpanjangan($data,$id_sip,$status_sip,$nomor_sip,$catatan,$validator_sebelumnya,$title_validasi,$nama_admin,$id_nakes)
	{

		$id_pemohon =$id_nakes;
    	$user = $this->db->get_where('user', array('id'=> $id_pemohon))->row_array();
    	$email = $user['email'];
    	$name = $user['name'];

		$this->db->where('id_sip',$id_sip);
		$update_validasi= $this->db->update('validasi_sip', $data);

	    if($update_validasi){	
	    	$status = $status_sip ;
	    	$update_status = array( 
	    		'status'=>$status,
	    		'nomor_sip'=>$nomor_sip,
	    		'catatan'=>$catatan
	    	 );
			$this->db->where('id',$id_sip);
			$up_data_sip = $this->db->update('data_sip', $update_status);

			if ($up_data_sip) {
				$up_status = 'done';
				$data_riwayat=array(
					'status' => $up_status,
					'approver_sebelumnya'=>$validator_sebelumnya,
					'approver_perpanjangan'=>$nama_admin
				);

				$status_per = 'undone';
				$where =array(
					'id_sip' => $id_sip,
					'status'=>$status_per
				);
				$this->db->where($where);
				$up_riwayat = $this->db->update('riwayat_perpanjangan', $data_riwayat);

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
			      $this->email->subject('SELAMAT PERPANJANGAN DISETUJUI');  
			      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>PERPANJANGAN SIP Anda Telah Disetujui</p><p>Silahkan Cetak Kedinas Kesehatan Bojonegoro </p><br/>Cek Status SIP Anda di ".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
			     	$this->email->message($message);
			     	$emailsent= $this->email->send();
					if($emailsent){
					$this->session->set_flashdata('message',$title_validasi);
					redirect('administrator/list_revisi_sip');
					}
					else{
						show_error($this->email->print_debugger());
					}


			} else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
				redirect('administrator/form_validasi_revisi_perpanjangan/'.$id_sip);
			}
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Validasi  </b></div>');
			redirect('adminsitrator/form_validasi_revisi_perpanjangan/'.$id_sip);
	    }
	}

	public function approval_cabut_sip($data,$id_sip,$status_sip,$title_validasi,$id_nakes)
	{

		$id_pemohon =$id_nakes;
    	$user = $this->db->get_where('user', array('id'=> $id_pemohon))->row_array();
    	$email = $user['email'];
    	$name = $user['name'];


		$this->db->where('id_sip',$id_sip);
		$query= $this->db->update('validasi_sip', $data);
	    if($query)
	    {	
	    	$status = $status_sip ;
	    	$no_sip = $nomor_sip;
	    	$note = $catatan;
	    	$update_status = array( 
	    		'status'=>$status,
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
			      $this->email->subject('SIP DICABUT');  
			      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>Permohonan CABUT SIP Telah Selesai</p><p>Terimakasih Sudah Menggunakan SIPATAS Unruk Layanan Perizinanan Praktik Anda. </p><br/>Cek Status SIP Anda di ".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
			     	$this->email->message($message);
			     	$emailsent= $this->email->send();
					if($emailsent){
					$this->session->set_flashdata('message', $title_validasi);
					redirect('administrator/daftar_pencabutan');
					}
					else{
						show_error($this->email->print_debugger());
					}

			
	    }
	    else
	    {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Gagal Cabut  </b></div>');
			redirect('adminsitrator/daftar_pencabutan');
	    }
	}

	public function update_sip_diperpanjang($update_data,$id_sip)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-primary"><b> Permohonan Perpanjangan Berhasil Silahkan Validasi Di Menu Permohonan Perpanjangan</b></div>');
			redirect('administrator/manajemen_sip');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> Permohonan GAGAL !!! </b></div>');
			redirect('administrator/manajemen_sip');
		}

			
	}

	public function permohonan_pencabutan($id_sip,$update_data)
	{
		$this->db->where('id',$id_sip);
		$berhasil = $this->db->update('data_sip', $update_data);
		if($berhasil){
			$this->session->set_flashdata('message','<div class="alert alert-success"><b> Permohonan Cabut Berhasil, Silahkan Ke Menu Pencabutan Untuk Pengembalian SIP dan Validasi Pencabutan SIP</b></div>');
			redirect('administrator/manajemen_sip');
		}
		else{

			$this->session->set_flashdata('message','<div class="alert alert-danger"><b> Pencabutan GAGAL !!! </b></div>');
			redirect('administrator/manajemen_sip');
		}

			
	}
	
	
}