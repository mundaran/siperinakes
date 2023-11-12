<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	    {
			parent::__construct();
			cek_login_siperi();
			$this->load->model('model_administrator');
			date_default_timezone_set('Asia/Jakarta');
		}

	public function index()
	{
		$data['title'] ='Dashboard Admin';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_dashboard',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function my_profile()
	{
		$data['title'] ='My Profile';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_my_profile',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function edit_user()
	{
		$data['title'] ='manajemen_user';
		$id_nakes =$this->uri->segment(3);
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['nakes'] = $sql = $this->db->query("SELECT * FROM user WHERE id=$id_nakes ")->row_array();;
		
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_edit_user',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function validasi_sip()
	{
		$data['title'] ='Validasi SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_sip();

		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data); 
		$this->load->view('admin/admin_validasi',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function form_validasi_sip()
	{
		$data['title'] ='Validasi SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_sip();

		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_form_validasi',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function perpanjangan_sip()
	{
		$data['title'] ='Permohonan Perpanjangan SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_perpanjangan_sip();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_perpanjangan_sip',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}



	public function manajemen_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_sip'] = $this->model_administrator->load_manajemen_sip();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_manajemen_sip',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function form_perpanjang_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_sip();

		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_form_perpanjang',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function detail_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data['detail_sip']= $this->db->get_where('data_sip', array('id'=>$this->uri->segment(3)))->row_array();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_detail_sip',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function print_sip()
	{
		$data['title'] ='Detail SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data['detail_sip']= $this->db->get_where('data_sip', array('id'=>$this->uri->segment(3)))->row_array();
		$this->load->library('pdf');
		$customPaper = array(0,0,793,1240);
	    $this->pdf->setPaper($customPaper);
	    $this->pdf->filename = "data_sip.pdf";
	    $sip = $this->db->get_where('data_sip', array('id'=>$this->uri->segment(3)))->row_array();
	    if($sip['jenis_sip']=='Dokter'){
	    $this->pdf->load_view('admin/view_sip_pdf', $data);
	    }elseif ($sip['jenis_sip']=='Apoteker') {
	    	$this->pdf->load_view('admin/view_sip_apoteker_pdf', $data);
	    }elseif ($sip['jenis_sip']=='TTK') {
	    	$this->pdf->load_view('admin/view_sip_ttk_pdf', $data);
	    }
	}

	public function form_validasi_perpanjangan()
	{
		$data['title'] ='Permohonan Perpanjangan SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_form_validasi_perpanjangan',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function manajemen_user()
	{
		$data['title'] ='Manajemen User';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_user']=$this->model_administrator->load_manajemen_user();
		$data ['data_user_nonaktif']=$this->model_administrator->load_manajemen_user_nonaktif();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_manajemen_user',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	
	}

	public function list_revisi_sip()
	{
		$data ['title'] ='List Revisi';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_revisi']=$this->model_administrator->load_list_revisi_sip();
		$data ['data_revisi_perpanjangan']=$this->model_administrator->load_list_revisi_sip_perpanjangan();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_list_revisi',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	
	}

	public function form_validasi_revisi()
	{
		$data['title'] ='List Revisi';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_form_validasi_revisi',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function form_validasi_revisi_perpanjangan()
	{
		$data['title'] ='List Revisi';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_form_validasi_revisi_perpanjangan',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function daftar_pencabutan()
	{
		$data['title'] ='Daftar Pencabutan';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['cabut_sip']= $this->model_administrator->load_list_pencabutan();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_daftar_pencabutan',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function form_pencabutan()
	{
		$data['title'] ='Daftar Pencabutan';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['cabut_sip']= $this->model_administrator->load_list_pencabutan();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_form_pencabutan',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}


	public function manajemen_artikel()
	{
		$data['title'] ='Manajemen Artikel';
		$id_nakes =$this->uri->segment(3);
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_manajemen_artikel',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

	public function progres_sip()
	{
		$data['title'] ='Progres SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_sip']= $this->model_administrator->load_progres_sip();
		$this->load->view('template_view/admin_template/dashboard_header');
		$this->load->view('template_view/admin_template/menubar',$data);
		$this->load->view('admin/admin_daftar_progres',$data);
		$this->load->view('template_view/admin_template/dashboard_footer');
	}

//batas view dan aksi

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
		$this->model_administrator->edit_profile($id, $data);
	}

	public function aksi_edit_profile_user()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_nakes = $this->uri->segment(3);
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
		$this->model_administrator->edit_profile_nakes($id_nakes, $data);
	}

	public function aksi_tambah_user()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$nama = $this->input->post('nama_lengkap');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$role_id = $this->input->post('role_id');


		$data = array(
		'name'     => $nama,
		'email'    => $email,
		'password' => $password,
		'role_id'  => $role_id,
		'aktifasi' => 0
		);
		$this->model_administrator->tambah_user($data);
	}


	public function upload_foto(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$file_name_pas_foto = 'pas-foto-'.$id_user.'';
		$config['upload_path']          = './document/foto_user';
		$config['allowed_types']        = 'jpg';
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
			 redirect('administrator/my_profile');
		} else {
				$foto_profile = $this->upload->data();

				$update_data =  [
					'pict' => $file_name_pas_foto,
				];

				$this->model_administrator->upload_foto($id_user,$update_data);
			}
	}

	public function aksi_edit_foto_nakes(){
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_user= $user['id'];
		$id_nakes = $this->uri->segment(3);
		$file_name_pas_foto = 'pas-foto-'.$id_nakes.'';
		$config['upload_path']          = './document/foto_user';
		$config['allowed_types']        = 'jpg';
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
			 redirect('administrator/edit_user/'.$id_nakes);
		} else {
				$foto_profile = $this->upload->data();

				$update_data =  [
					'pict' => $file_name_pas_foto,
				];

				$this->model_administrator->edit_foto_nakes($id_nakes,$update_data);
			}
	}

	public function aksi_ubah_password()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$password_lama = md5($this->input->post('password_lama'));
		$password_baru = md5($this->input->post('password_baru'));
		if($user['password']==$password_lama){
			$data_password = array(
			'password'=>$password_baru,
			);
			$this->model_administrator->update_password($id,$data_password);
		}  else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Password Gagal Di Ubah ! , Password Lama Tidak Sesuai  </b></div>');
			redirect('administrator/my_profile');
		}
		
	}

	public function aksi_ganti_password_user()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_nakes = $this->uri->segment(3);
		$password_baru = md5($this->input->post('password_baru'));
		$data_password = array(
			'password'=>$password_baru,
			);
			$this->model_administrator->update_password_nakes($id_nakes,$data_password);
	}

	public function aksi_approval_validasi_sip()
	{
		$data['title'] ='Validasi SIP';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$keterangan = $this->input->post('keterangan');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$tanggal_validasi= date("y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_nakes'=>$id_nakes,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->approval_validasi_sip($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes);
	}

	public function aksi_revisi_validasi_sip()
	{
		$data['title'] ='Validasi SIP';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$keterangan = $this->input->post('keterangan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_nakes'=>$id_nakes,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->revisi_validasi_sip($data,$id_sip,$status_sip,$title_validasi,$id_nakes);

	}


	public function aksi_approval_revisi_sip_baru()
	{
		$data['title'] ='List Revisi';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$keterangan = $this->input->post('keterangan');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_nakes'=>$id_nakes,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->approval_revisi_sip_baru($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes);


	}


	public function aksi_revisi_revisi_sip_baru()
	{
		$data['title'] ='List Revisi';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$keterangan = $this->input->post('keterangan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_nakes'=>$id_nakes,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->revisi_revisi_sip_baru($data,$id_sip,$status_sip,$title_validasi,$id_nakes);


	}


	public function aksi_validasi_perpanjangan()
	{

		$data['title'] ='Permohonan Perpanjangan SIP';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$nama_admin = $admin['name'];
		$validator_sebelumnya = $this->input->post('validator_sebelumnya');
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$keterangan = $this->input->post('keterangan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->validasi_perpanjangan($data,$id_sip,$status_sip,$nomor_sip,$catatan,$validator_sebelumnya,$title_validasi,$nama_admin,$id_nakes);


	}

	public function aksi_revisi_perpanjangan()
	{

		$data['title'] ='Permohonan Perpanjangan SIP';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$nama_admin = $admin['name'];
		$validator_sebelumnya = $this->input->post('validator_sebelumnya');
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$keterangan = $this->input->post('keterangan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->revisi_perpanjangan($data,$id_sip,$status_sip,$validator_sebelumnya,$title_validasi,$nama_admin,$id_nakes);


	}

	public function aksi_validasi_revisi_perpanjangan()
	{

		$data['title'] ='Permohonan Perpanjangan SIP';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$nama_admin = $admin['name'];
		$validator_sebelumnya = $this->input->post('validator_sebelumnya');
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$keterangan = $this->input->post('keterangan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->validasi_revisi_perpanjangan($data,$id_sip,$status_sip,$nomor_sip,$catatan,$validator_sebelumnya,$title_validasi,$nama_admin,$id_nakes);


	}

	public function aksi_approval_cabut_sip()
	{
		$data['title'] ='Daftar Pencabutan';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$status_validasi = $this->input->post('status_validasi');
		$keterangan = $this->input->post('keterangan');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$tanggal_cabut= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$catatan = 'dicabut';
		$data = array(
			'id_admin'=>$id_admin,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_cabut'=>$tanggal_cabut,
		);
		$this->model_administrator->approval_cabut_sip($data,$id_sip,$status_sip,$title_validasi,$id_nakes);
	}


	public function aksi_perpanjangan(){
		$user    = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin= $user['id'];
		$id_sip  = $this->uri->segment(3);
		$id_nakes= $this->uri->segment(4);
		$date    = date('Y-m-d');
		$no_str_baru = $this->input->post('no_str_baru');
		$masa_berlaku_str = $this->input->post('masa_berlaku_str');

		$file_name_sip_lama = 'sip-lama-'.$id_sip.'-'.$id_nakes.'-'.$date;
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
			 redirect('administrator/form_perpanjang_sip/'.$id_sip.'/'.$id_nakes);
		} else {
			$file_name_str_baru = 'str-'.$id_nakes.'-'.$id_sip.'-'.$date;
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
				 redirect('administrator/form_perpanjang_sip/'.$id_sip.'/'.$id_nakes);
			} else {
				$file_name_rop_baru = 'rop-'.$id_nakes.'-'.$id_sip.'-'.$date;
				$config['upload_path']          = './document/rop';
				$config['allowed_types']        = 'pdf';
				$config['file_name']            = $file_name_rop_baru;
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
					 redirect('administrator/form_perpanjang_sip/'.$id_sip.'/'.$id_nakes);
			}else{
				$rop_up = $this->upload->data();
				$status = 'undone';

				$insert_data =  [

					'id_sip'   => $id_sip,
					'id_user'  => $id_nakes,
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
						$this->model_administrator->update_sip_diperpanjang($update_data,$id_sip);
					} else{
						$this->session->set_flashdata('message', 'Gagal Perpanjangan');
						redirect('administrator/form_perpanjangan_sip/'.$id_nakes.'/'.$id_nakes);
					}
				}

			}
		}
	}

	public function aksi_cabut_sip()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$pemohon=$user['name'];
		$tanggal_cabut=date('Y-m-d');
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$file_name_surat_cabut = 'spc-'.strtr($pemohon, ". ", "--").'-'.$id_sip;'';
		$config['upload_path']          = './document/surat_cabut';
		$config['allowed_types']        = 'pdf';
		$config['file_name']            = $file_name_surat_cabut;
		$config['overwrite'] = false;
		$config['max_size']             = 3000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( !$this->upload->do_upload('surat_cabut')){
			 $this->session->set_flashdata('message', 'Upload-gagal' );
			 $error = array('error' => $this->upload->display_errors());
    		 $this->session->set_flashdata('message','<div class="alert alert-danger col-lg-6"><b>'.$error['error'].$file_name_surat_cabut.'</b></div>');
			 redirect('administrator/manajemen_sip');
		} else {
				$foto_surat_cabut = $this->upload->data();

				$update_data =  [
					'status'=>9,
					'surat_cabut' => $file_name_surat_cabut,
				];

				$this->model_administrator->permohonan_pencabutan($id_sip,$update_data,$id_nakes);
			}
	}


	public function aksi_hapus_user()
	{
		$data['title'] ='Daftar Pencabutan';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
	}

	public function aksi_nonaktifkan_user()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_nakes = $this->uri->segment(3);

		$datanakes = array(
		'aktifasi'     => 0,
		);
		$this->model_administrator->nonaktifkan_user($id_nakes,$datanakes);
	}

	public function aksi_aktifkan_user()
	{
		$user = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id = $user['id'];
		$id_nakes = $this->uri->segment(3);

		$datanakes = array(
		'aktifasi'     => 1,
		);
		$this->model_administrator->aktifkan_user($id_nakes,$datanakes);
	}



}