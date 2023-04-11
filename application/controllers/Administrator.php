<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	    {
			parent::__construct();
			cek_login_siperi();
			$this->load->model('model_administrator');
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
		$this->model_admin->edit_profile($id, $data);
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
			$this->session->set_flashdata('message','Ubah Password, Gagal Password Lama Tidak Sesuai !');
			redirect('administrator/my_profile');
		}
		
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
		$tanggal_validasi= date("d-m-Y");
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
		$this->model_administrator->approval_validasi_sip($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi);
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
		$tanggal_validasi= date("d-m-Y");
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
		$this->model_administrator->revisi_validasi_sip($data,$id_sip,$status_sip,$title_validasi);

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
		$tanggal_validasi= date("d-m-Y");
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
		$this->model_administrator->approval_revisi_sip_baru($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi);


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
		$tanggal_validasi= date("d-m-Y");
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
		$this->model_administrator->revisi_revisi_sip_baru($data,$id_sip,$status_sip,$title_validasi);


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
		$tanggal_validasi= date("d-m-Y");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->validasi_perpanjangan($data,$id_sip,$status_sip,$nomor_sip,$catatan,$validator_sebelumnya,$title_validasi,$nama_admin);


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
		$tanggal_validasi= date("d-m-Y");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->revisi_perpanjangan($data,$id_sip,$status_sip,$validator_sebelumnya,$title_validasi,$nama_admin);


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
		$tanggal_validasi= date("d-m-Y");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'id_sip'=>$id_sip,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_validasi'=>$tanggal_validasi,
		);
		$this->model_administrator->validasi_revisi_perpanjangan($data,$id_sip,$status_sip,$nomor_sip,$catatan,$validator_sebelumnya,$title_validasi,$nama_admin);


	}

	public function aksi_approval_cabut_sip()
	{
		$data['title'] ='Daftar Pencabutan';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$status_validasi = $this->input->post('status_validasi');
		$keterangan = $this->input->post('keterangan');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$tanggal_cabut= date("d-m-Y");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_admin'=>$id_admin,
			'status_validasi' => $status_validasi,
			'keterangan'=>$keterangan,
			'tanggal_cabut'=>$tanggal_cabut,
		);
		$this->model_administrator->approval_cabut_sip($data,$id_sip,$status_sip,$title_validasi);
	}

	public function aksi_hapus_user()
	{
		$data['title'] ='Daftar Pencabutan';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
	}

	public function aksi_nonaktif_user()
	{
		$data['title'] ='Manajemen User';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
	}
}