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
		
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('nakes/nakes_dashboard',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function my_profile()
	{
		$data['title'] ='profile';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('nakes/my_profile',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function register_sip()
	{
		$data['title'] ='Register SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip']= $this->model_nakes->load_data_sip();
		
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('nakes/nakes_register_sip',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function notification()
	{
		$data['title'] ='Notification';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('nakes/nakes_notification',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function upload_berkas()
	{
		$data['title'] ='Register SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user = $user ['id'];

		$file_name = str_replace('.','',time().$user['name']);
		$config['upload_path']          = './document/pas_foto';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
 
		if ( !$this->upload->do_upload('pasfoto')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message',.$error);
		}
		else{
			$file_name = str_replace('.','',time().$user['name']);
			$config['upload_path']          = './document/ktp';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['max_size']             = 1000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			if ( !$this->upload->do_upload('ktp')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('templates/error_page', $error);
		}
		else{

		}
            	

		}
		
	}


	//batas-tampilan dan aksi//


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
		$jenis_sip = $this->input->post('jenis_sip');
		$no_str = $this->input->post('no_str');
		$masa_berlaku_str = $this->input->post('masa_berlaku_str');
		$tempat_praktek = $this->input->post('tempat_praktek');
		$alamat_praktek = $this->input->post('alamat_praktek');
		$jenis_praktek = $this->input->post('jenis_praktek');
		$hari_awal = $this->input->post('hari_awal');
		$hari_akhir = $this->input->post('hari_akhir');
		$jam_buka = $this->input->post('jam_buka');
		$jam_tutup = $this->input->post('jam_tutup');
		$status = '1' ;
		$tanggal_daftar = $this->input->post('tanggal_daftar');

		$data = array(
		'id_user' => $id,
		'jenis_sip' => $jenis_sip,
		'no_str' => $no_str,
		'masa_berlaku_str' => $masa_berlaku_str,
		'tempat_praktek' => $tempat_praktek,
		'alamat_praktek' => $alamat_praktek,
		'jenis_praktek' => $jenis_praktek,
		'hari_awal_praktek' => $hari_awal,
		'hari_akhir_praktek' => $hari_akhir,
		'jam_buka' => $jam_buka,
		'jam_tutup' => $jam_tutup,
		'status' => $status,
		'tanggal_daftar'=>$tanggal_daftar,
		);
		$this->model_nakes->registrasi_sip($data);
	}

	
}