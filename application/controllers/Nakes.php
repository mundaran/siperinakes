<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nakes extends CI_Controller {

	public function __construct()
	    {
			parent::__construct();
			cek_login_siperi();
			$this->load->model('model_nakes');
		}

	public function index()
	{
		$data['title'] ='Dashboard';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip']= $this->model_nakes->load_sip_terdaftar();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_dashboard',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function my_profile()
	{
		$data['title'] ='profile';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/my_profile',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function register_sip()
	{
		$data['title'] ='Register SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip']= $this->model_nakes->load_data_register_sip();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_register_sip',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function notification()
	{
		$data['title'] ='Notification';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_notification',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function upload_berkas()
	{
		$data['title'] ='Register SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_upload_berkas',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function manajemen_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_sip'] = $this->model_nakes->load_manajemen();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_manajemen',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function detail_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data['detail_sip']= $this->db->get_where('data_sip', array('id'=>$this->uri->segment(3)))->row_array();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_detail_sip',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function form_perpanjangan_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_form_perpanjangan',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}
	
	public function revisi()
	{
		$data['title'] ='Revisi SIP Baru';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip_revisi']  = $this->model_nakes->load_data_revisi();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_revisi',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function form_revisi_sip()
	{
		$data['title'] ='Revisi';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip_revisi']  = $this->model_nakes->load_data_revisi();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_form_revisi',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}


	public function pencabutan()
	{
		$data['title'] ='Pencabutan';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_pencabutan',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function list_perpanjangan()
	{
		$data['title'] ='List Perpanjangan';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['perpanjang_sip']= $this->model_nakes->load_list_perpanjangan();
		
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_list_perpanjangan',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	public function form_revisi_perpanjangan()
	{
		$data['title'] ='List Perpanjangan';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/nakes_template/dashboard_header');
		$this->load->view('template_view/nakes_template/menubar',$data);
		$this->load->view('nakes/nakes_form_revisi_perpanjangan',$data);
		$this->load->view('template_view/nakes_template/dashboard_footer');
	}

	//batas-tampilan dan aksi//

	public function aksi_upload_berkas()
	{
		$data['title'] ='Register SIP';
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user = $user['id'];
		$id_sip = $this->input->post('id_sip');

		$file_name_pas_foto = 'pas-foto-'.$id_user.'-'.$id_sip;
		$config['upload_path']          = './document/pas_foto';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_pas_foto;
		$config['overwrite'] = false;
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('pasfoto')){
			 $this->session->set_flashdata('message', 'pasfoto-gagal' );
			 redirect('nakes/upload_berkas');
		} else {
			$file_name_ktp = 'ktp-'.$id_user.'-'.$id_sip;
			$config['upload_path']          = './document/foto_ktp';
			$config['allowed_types']        = 'pdf';
			$config['file_name']            = $file_name_ktp;
			$config['overwrite'] = false;
			$config['max_size']             = 1000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$pas_foto_up = $this->upload->data();
			$this->load->library('upload', $config);
	 		$this->upload->initialize($config);
			if ( !$this->upload->do_upload('ktp')){
				 $this->session->set_flashdata('message', 'ktp-gagal' );
				 redirect('nakes/upload_berkas');
			} else {
				$file_name_str= 'str-'.$id_user.'-'.$id_sip;
				$config['upload_path']          = './document/str';
				$config['allowed_types']        = 'pdf';
				$config['file_name']            = $file_name_str;
				$config['overwrite'] = false;
				$config['max_size']             = 1000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$ktp_up = $this->upload->data();
				$this->load->library('upload', $config);
		 		$this->upload->initialize($config);
				if ( !$this->upload->do_upload('str')){
					 $this->session->set_flashdata('message', 'str-gagal' );
					 redirect('nakes/upload_berkas');
				} else {
					$file_name_rop = 'rop-'.$id_user.'-'.$id_sip;
					$config['upload_path']          = './document/rop';
					$config['allowed_types']        = 'pdf';
					$config['file_name']            = $file_name_rop;
					$config['overwrite'] = false;
					$config['max_size']             = 1000;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;
					$str_up = $this->upload->data();
					$this->load->library('upload', $config);
			 		$this->upload->initialize($config);
					if ( !$this->upload->do_upload('rop')){
						 $this->session->set_flashdata('message', 'rop-gagal' );
						 redirect('nakes/upload_berkas');
					} else {
						$file_name_rtp = 'rtp-'.$id_user.'-'.$id_sip;
						$config['upload_path']          = './document/rtp';
						$config['allowed_types']        = 'pdf';
						$config['file_name']            = $file_name_rtp;
						$config['overwrite'] = false;
						$config['max_size']             = 1000;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$rop_up = $this->upload->data();
						$this->load->library('upload', $config);
				 		$this->upload->initialize($config);
						if ( !$this->upload->do_upload('rtp')){
							 $this->session->set_flashdata('message', 'rtp-gagal' );
							 redirect('nakes/upload_berkas');
						} else {
							$file_name_ijazah = 'ijazah-'.$id_user.'-'.$id_sip;
							$config['upload_path']          = './document/ijazah';
							$config['allowed_types']        = 'pdf';
							$config['file_name']            = $file_name_ijazah;
							$config['overwrite'] = false;
							$config['max_size']             = 1000;
							$config['max_width']            = 1024;
							$config['max_height']           = 768;
							$rtp_up = $this->upload->data();
							$this->load->library('upload', $config);
					 		$this->upload->initialize($config);
							if ( !$this->upload->do_upload('ijazah')){
								 $this->session->set_flashdata('message', 'ijazah-gagal' );
								 redirect('nakes/upload_berkas');
							} else {
								$file_name_surat_sehat = 'surat-sehat-'.$id_user.'-'.$id_sip;
								$config['upload_path']          = './document/surat_sehat';
								$config['allowed_types']        = 'pdf';
								$config['file_name']            = $file_name_surat_sehat;
								$config['overwrite'] = false;
								$config['max_size']             = 1000;
								$config['max_width']            = 1024;
								$config['max_height']           = 768;
								$ijazah_up = $this->upload->data();
								$this->load->library('upload', $config);
						 		$this->upload->initialize($config);
								if ( !$this->upload->do_upload('surat_sehat')){
									 $this->session->set_flashdata('message', 'surat_sehat-gagal' );
									 redirect('nakes/upload_berkas');
								} else {
									$file_name_surat_pernyataan = 'surat-pernyataan-'.$id_user.'-'.$id_sip;
									$config['upload_path']          = './document/surat_pernyataan';
									$config['allowed_types']        = 'pdf';
									$config['file_name']            = $file_name_surat_pernyataan;
									$config['overwrite'] = false;
									$config['max_size']             = 1000;
									$config['max_width']            = 1024;
									$config['max_height']           = 768;
									$surat_sehat_up = $this->upload->data();
									$this->load->library('upload', $config);
							 		$this->upload->initialize($config);
									if ( !$this->upload->do_upload('pernyataan')){
										 $this->session->set_flashdata('message', 'pernyataan-gagal' );
										 redirect('nakes/upload_berkas');
									} else {
										$surat_pernyataan_up = $this->upload->data();

										$update_data =  [
											'pas_foto' => $file_name_pas_foto,
											'foto_ktp' => $file_name_ktp,
											'foto_str' => $file_name_str,
											'rekomendasi_org_p' => $file_name_rop,
											'rekomendasi_tmpt_p' => $file_name_rtp,
											'ijazah' => $file_name_ijazah,
											'surat_sehat' => $file_name_surat_sehat,
											'pernyataan' => $file_name_surat_pernyataan,
											'status' => 2,
										];

										$this->model_nakes->upload_berkas_sip($id_user,$id_sip,$update_data);
									}
								}
							}
						}
					}
				}

			}


		}
       
	}

	public function upload_foto(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$file_name_pas_foto = 'pas-foto-'.$id_user.'';
		$config['upload_path']          = './document/foto_user';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['file_name']            = $file_name_pas_foto;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_user')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/my_profile');
		} else {
				$foto_profile = $this->upload->data();

				$update_data =  [
					'pict' => $file_name_pas_foto,
				];

				$this->model_nakes->upload_foto($id_user,$update_data);
			}
	}

	public function aksi_edit_profile()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$nama = $this->input->post('nama_lengkap');
		$nik = $this->input->post('nik');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$provinsi = $this->input->post('provinsi');
		$kota_kabupaten = $this->input->post('kota_kabupaten');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');


		$data = array(
		'name' => $nama,
		'nik' => $nik,
		'email' => $email,
		'no_hp' => $no_hp,
		'tempat_lahir' => $tempat_lahir,
		'tanggal_lahir' => $tanggal_lahir,
		'alamat' => $alamat,
		'provinsi' => $provinsi,
		'kota_kabupaten' => $kota_kabupaten,
		'kecamatan' => $kecamatan,
		'kelurahan' => $kelurahan,
		);
		$this->model_nakes->edit_profile($id, $data);
	}

	public function aksi_register_sip()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_new_sip = $this->input->post('id_sip_new');
		$jenis_sip = $this->input->post('jenis_sip');
		$no_str = $this->input->post('no_str');
		$no_rekomendasi_op = $this->input->post('no_rekomendasi_op');
		$masa_berlaku_str = $this->input->post('masa_berlaku_str');
		$tempat_praktek = $this->input->post('tempat_praktek');
		$alamat_praktek = $this->input->post('alamat_praktek');
		$jenis_praktek = $this->input->post('jenis_praktek');
		$hari_awal = $this->input->post('hari_jam_praktek');
		$catatan = $this->input->post('catatan');
		$status = '1' ;
		$tanggal_daftar = $this->input->post('tanggal_daftar');

		$data = array(
		'id' => $id_new_sip,
		'id_user' => $id,
		'jenis_sip' => $jenis_sip,
		'no_str' => $no_str,
		'no_rekomendasi_op'=> $no_rekomendasi_op,
		'masa_berlaku_str' => $masa_berlaku_str,
		'tempat_praktek' => $tempat_praktek,
		'alamat_praktek' => $alamat_praktek,
		'jenis_praktek' => $jenis_praktek,
		'hari_awal_praktek' => $hari_awal,
		'status' => $status,
		'tanggal_daftar'=>$tanggal_daftar,
		'catatan'=>$catatan,
		);
		$this->model_nakes->registrasi_sip($data,$id_new_sip);
	}

	public function aksi_perpanjangan(){
		$user    = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user = $user['id'];
		$id_sip  = $this->uri->segment(3);
		$date    = date('d-m-y');
		$no_str_baru = $this->input->post('no_str_baru');
		$masa_berlaku_str = $this->input->post('masa_berlaku_str');

		$file_name_sip_lama = 'sip-lama-'.$id_sip.'-'.$id_user.'-'.$date;
		$config['upload_path']          = './document/foto_sip_lama';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_sip_lama;
		$config['overwrite'] = false;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_sip_lama')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_perpanjangan_sip/'.$id_user);
		} else {
			$file_name_str_baru = 'str-'.$id_user.'-'.$id_sip.'-'.$date;
			$config['upload_path']          = './document/str';
			$config['allowed_types']        = 'pdf';
			$config['file_name']            = $file_name_str_baru;
			$config['overwrite'] = false;
			$config['max_size']             = 1000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$foto_sip_baru = $this->upload->data();
			$this->load->library('upload', $config);
	 		$this->upload->initialize($config);
			if ( !$this->upload->do_upload('foto_str_baru')){
			 	 $this->session->set_flashdata('message', 'Upload-gagal' );
			 	 $error = array('error' => $this->upload->display_errors());
				 $this->session->set_flashdata('message',$error['error']);
				 redirect('nakes/form_perpanjangan_sip/'.$id_user);
			} else {
				$file_name_rop_baru = 'rop-'.$id_user.'-'.$id_sip.'-'.$date;
				$config['upload_path']          = './document/rop';
				$config['allowed_types']        = 'pdf';
				$config['file_name']            = $file_name_str_baru;
				$config['overwrite'] = false;
				$config['max_size']             = 1000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$foto_rop_baru = $this->upload->data();
				$this->load->library('upload', $config);
		 		$this->upload->initialize($config);
				if ( !$this->upload->do_upload('foto_rop_baru')){
				 	 $this->session->set_flashdata('message', 'Upload-gagal' );
				 	 $error = array('error' => $this->upload->display_errors());
					 $this->session->set_flashdata('message',$error['error']);
					 redirect('nakes/form_perpanjangan_sip/'.$id_user);
			}else{
				$rop_up = $this->upload->data();
				$status = 'undone';

				$insert_data =  [

					'id_sip'   => $id_sip,
					'id_user'  => $id_user,
					'sip_lama' => $file_name_sip_lama, 
					'str_baru' => $file_name_str_baru,
					'rop_baru' => $file_name_rop_baru,
					'status'   => $status,
					'tanggal'  => $date,
				];

				$insert = $query= $this->db->insert('riwayat_perpanjangan', $insert_data);

					if ($insert) {
						$update_data =[
							'no_str' => $no_str_baru,
							'masa_berlaku_str' => $masa_berlaku_str,
							'foto_str' => $file_name_str_baru,
							'rekomendasi_org_p'=>$file_name_rop_baru,
							'status' => 5,

						];
						$this->model_nakes->update_sip_diperpanjang($update_data,$id_sip);
					} else{
						$this->session->set_flashdata('message', 'Gagal Perpanjangan');
						redirect('nakes/form_perpanjangan_sip/'.$id_user);
					}
				}

			}
		}
	}

	
	public function update_foto_ktp(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_sip = $this->uri->segment(3);
		$file_name_foto_ktp = 'ktp-'.$id_user.'-'.$id_sip;'';
		$config['upload_path']          = './document/foto_ktp';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_ktp;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_ktp_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_sip/'.$id_sip);
		} else {
				$foto_ktp = $this->upload->data();

				$update_data =  [
					'foto_ktp' => $file_name_foto_ktp,
				];

				$this->model_nakes->update_foto_ktp($id_sip,$update_data);
			}
	}

	public function update_foto_str(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_sip = $this->uri->segment(3);
		$file_name_foto_str = 'str-'.$id_user.'-'.$id_sip;'';
		$config['upload_path']          = './document/str';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_str;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_str_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_sip/'.$id_sip);
		} else {
				$foto_str = $this->upload->data();

				$update_data =  [
					'foto_str' => $file_name_foto_str,
				];

				$this->model_nakes->update_foto_str($id_sip,$update_data);
			}
	}


	public function update_foto_rop(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_sip = $this->uri->segment(3);
		$file_name_foto_rop = 'rop-'.$id_user.'-'.$id_sip;'';
		$config['upload_path']          = './document/rop';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_rop;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_rop_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_sip/'.$id_sip);
		} else {
				$foto_rop = $this->upload->data();

				$update_data =  [
					'rekomendasi_org_p' => $file_name_foto_rop,
				];

				$this->model_nakes->update_foto_rop($id_sip,$update_data);
			}
	}

	public function update_foto_rtp(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_sip = $this->uri->segment(3);
		$file_name_foto_rtp = 'rtp-'.$id_user.'-'.$id_sip;'';
		$config['upload_path']          = './document/rtp';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_rtp;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_rtp_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_sip/'.$id_sip);
		} else {
				$foto_rtp = $this->upload->data();

				$update_data =  [
					'rekomendasi_tmpt_p' => $file_name_foto_rtp,
				];

				$this->model_nakes->update_foto_rtp($id_sip,$update_data);
			}
	}

	public function update_foto_ijazah(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_sip = $this->uri->segment(3);
		$file_name_foto_ijazah = 'ijazah-'.$id_user.'-'.$id_sip;'';
		$config['upload_path']          = './document/ijazah';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_ijazah;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_ijazah_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_sip/'.$id_sip);
		} else {
				$foto_ijazah = $this->upload->data();

				$update_data =  [
					'ijazah' => $file_name_foto_ijazah,
				];

				$this->model_nakes->update_foto_ijazah($id_sip,$update_data);
			}
	}

	public function update_foto_surat_sehat(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_sip = $this->uri->segment(3);
		$file_name_foto_surat_sehat = 'surat-sehat-'.$id_user.'-'.$id_sip;'';
		$config['upload_path']          = './document/surat_sehat';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_surat_sehat;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_surat_sehat_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_sip/'.$id_sip);
		} else {
				$foto_surat_sehat = $this->upload->data();

				$update_data =  [
					'surat_sehat' => $file_name_foto_surat_sehat,
				];

				$this->model_nakes->update_foto_surat_sehat($id_sip,$update_data);
			}
	}

	public function update_foto_surat_pernyataan(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_sip = $this->uri->segment(3);
		$file_name_foto_surat_pernyataan = 'surat-pernyataan-'.$id_user.'-'.$id_sip;'';
		$config['upload_path']          = './document/surat_pernyataan';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_surat_pernyataan;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_surat_pernyataan_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_sip/'.$id_sip);
		} else {
				$foto_surat_pernyataan = $this->upload->data();

				$update_data =  [
					'surat_sehat' => $file_name_foto_surat_pernyataan,
				];

				$this->model_nakes->update_foto_surat_pernyataan($id_sip,$update_data);
			}
	}

	public function revisi_selesai()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_sip = $this->uri->segment(3);

		$update_status = array(
		'status' => 6,
		);
		$this->model_nakes->revisi_selesai($id_sip, $update_status);
	}

	public function aksi_update_no_str_baru()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_sip = $this->uri->segment(3);
		$no_str_baru=$this->input->post('no_str_baru');
		$update_no_str = array(
		'no_str'=>$no_str_baru,
		);
		$this->model_nakes->update_no_str_perpanjangan($id_sip,$update_no_str);
	}

	public function aksi_update_masa_berlaku()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_sip = $this->uri->segment(3);
		$masa_berlaku_str=$this->input->post('masa_berlaku_str');
		$update_masa_berlaku = array(
		'masa_berlaku_str'=>$masa_berlaku_str,
		);
		$this->model_nakes->update_masa_berlaku_perpanjangan($id_sip,$update_masa_berlaku);
	}


	public function aksi_update_str_perpanjangan(){
		$user    = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user = $user['id'];
		$id_sip  = $this->uri->segment(3);
		$date    = date('d-m-y');
		$file_name_foto_str = 'str-'.$id_user.'-'.$id_sip.'-'.$date.'';
		$config['upload_path']          = './document/str';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_foto_str;
		$config['overwrite'] = true;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_str_baru')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		} else {
				$foto_str = $this->upload->data();

				$update_data_sip =  [
					'foto_str' => $file_name_foto_str,
				];

				$this->db->where('id',$id_sip);
				$up_data_sip = $this->db->update('data_sip', $update_data_sip);

				if($up_data_sip){

					$update_data_riwayat =  [
					'str_baru' => $file_name_foto_str,
					];

					$up_data_riwayat = $this->model_nakes->update_str_riwayat_perpanjangan($id_sip,$update_data_riwayat);

				}
			}
	}

	public function aksi_update_sip_lama_perpanjangan(){
		$user    = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user = $user['id'];
		$id_sip  = $this->uri->segment(3);
		$date    = date('d-m-y');

		$file_name_sip_lama = 'sip-lama-'.$id_sip.'-'.$id_user.'-'.$date;
		$config['upload_path']          = './document/foto_sip_lama';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_sip_lama;
		$config['overwrite'] = false;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('foto_sip_lama')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message',$error['error']);
			 redirect('nakes/form_revisi_perpanjangan/'.$id_sip);
		} else {
				$foto_sip_lama = $this->upload->data();

				$update_data_riwayat =  [
				'sip_lama' => $file_name_sip_lama,
				];

				$up_data_riwayat = $this->model_nakes->update_sip_lama_perpanjangan($id_sip,$update_data_riwayat);
			}
	}

}