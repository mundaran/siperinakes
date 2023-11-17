<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabag extends CI_Controller {

	public function __construct()
	    {
			parent::__construct();
			cek_login_siperi();
			$this->load->model('model_kabag');
			date_default_timezone_set('Asia/Jakarta');
		}

	public function index()
	{
		$data['title'] ='Dashboard';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/kabag_template/dashboard_header');
		$this->load->view('template_view/kabag_template/menubar',$data);
		$this->load->view('kabag/kabag_dashboard',$data);
		$this->load->view('template_view/kabag_template/dashboard_footer');
	}

	public function validasi_sip_kabag()
	{
		$data['title'] ='Validasi SIP Kabag';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_kabag->load_data_sip();
		$this->load->view('template_view/kabag_template/dashboard_header');
		$this->load->view('template_view/kabag_template/menubar',$data);
		$this->load->view('kabag/kabag_validasi',$data);
		$this->load->view('template_view/kabag_template/dashboard_footer');
	}


	public function form_validasi_sip()
	{
		$data['title'] ='Validasi SIP Kabag';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_kabag->load_data_sip();
		$this->load->view('template_view/kabag_template/dashboard_header');
		$this->load->view('template_view/kabag_template/menubar',$data);
		$this->load->view('kabag/kabag_form_validasi',$data);
		$this->load->view('template_view/kabag_template/dashboard_footer');
	
	}


	public function progres_sip()
	{
		$data['title'] ='Progres SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data['sip'] = $this->model_kabag->load_progres_sip();
		$this->load->view('template_view/kabag_template/dashboard_header');
		$this->load->view('template_view/kabag_template/menubar',$data);
		$this->load->view('kabag/kabag_daftar_progres',$data);
		$this->load->view('template_view/kabag_template/dashboard_footer');
	
	}

	public function manajemen_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data['data_sip'] = $this->model_kabag->load_manajemen_sip();
		$this->load->view('template_view/kabag_template/dashboard_header');
		$this->load->view('template_view/kabag_template/menubar',$data);
		$this->load->view('kabag/kabag_manajemen_sip',$data);
		$this->load->view('template_view/kabag_template/dashboard_footer');
	
	}


	public function aksi_konfirmasi_sekdin()
	{
		$data['title'] ='Validasi SIP Kabag';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$validasi_kabag = $this->input->post('validasi_kabag');
		$keterangan = $this->input->post('keterangan');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_nakes'=>$id_nakes,
			'id_sip'=>$id_sip,
			'validasi_kabag' => $validasi_kabag,
			'tgl_validasi_kabag'=>$tanggal_validasi,
			'keterangan'=>$keterangan,
		);
		$this->model_kabag->konfirmasi_sekdin($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes);

	}


	public function detail_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data['detail_sip']= $this->db->get_where('data_sip', array('id'=>$this->uri->segment(3)))->row_array();
		$this->load->view('template_view/kabag_template/dashboard_header');
		$this->load->view('template_view/kabag_template/menubar',$data);
		$this->load->view('kabag/kabag_detail_sip',$data);
		$this->load->view('template_view/kabag_template/dashboard_footer');
	
	}

	public function my_profile()
	{
		$data['title'] ='My Profile';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/kabag_template/dashboard_header');
		$this->load->view('template_view/kabag_template/menubar',$data);
		$this->load->view('kabag/kabag_my_profile',$data);
		$this->load->view('template_view/kabag_template/dashboard_footer');
	
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
	    $this->pdf->load_view('kabag/view_sip_dokter_pdf', $data);
	    }elseif ($sip['jenis_sip']=='Apoteker') {
	    	$this->pdf->load_view('kabag/view_sip_apoteker_pdf', $data);
	    }elseif ($sip['jenis_sip']=='TTK') {
	    	$this->pdf->load_view('kabag/view_sip_ttk_pdf', $data);
	    }
	}

	public function export_excel()
	{
		$data ['title'] ='EXPORT DATA TO EXCEL';
		$data ['user']  = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();

		$tanggal_awal = $this->input->post('tanggal_awal');
		$tgl = new DateTime($tanggal_awal);
        $new_tgl_awal = $tgl->format('Y-m-d');

		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$tgl_akhir = new DateTime($tanggal_akhir);
        $new_tgl_akhir = $tgl_akhir->format('Y-m-d');

        $data_validasi= $this->db->query("SELECT * FROM validasi_sip WHERE status_validasi=1 AND tgl_validasi_kadin BETWEEN '$new_tgl_awal' AND '$new_tgl_akhir' ORDER BY tgl_validasi_kadin ASC ");
		$data['data_validasi']= $data_validasi->result_array();

		$data['dari_tgl'] = $new_tgl_awal;
		$data['sampai_tgl'] = $new_tgl_awal;

		$this->load->view('kabag/kabag_export_excel_manajemen',$data);
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
			 redirect('kabag/my_profile');
		} else {
				$foto_profile = $this->upload->data();

				$update_data =  [
					'pict' => $file_name_pas_foto,
				];

				$this->model_kabag->upload_foto($id_user,$update_data);
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
		$this->model_kabag->edit_profile($id, $data);
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
			$this->model_kabag->update_password($id,$data_password);
		}  else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Password Gagal Di Ubah ! , Password Lama Tidak Sesuai  </b></div>');
			redirect('kabag/my_profile');
		}
		
	}

}