<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadin extends CI_Controller {

	public function __construct()
	    {
			parent::__construct();
			cek_login_siperi();
			$this->load->model('model_kadin');
			date_default_timezone_set('Asia/Jakarta');
		}

	public function index()
	{
		$data['title'] ='Dashboard Kadin';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/kadin_template/dashboard_header');
		$this->load->view('template_view/kadin_template/menubar',$data);
		$this->load->view('kadin/kadin_dashboard',$data);
		$this->load->view('template_view/kadin_template/dashboard_footer');
	}

	public function validasi_sip_kadin()
	{
		$data['title'] ='Validasi Kadin';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_kadin->load_data_sip();
		$this->load->view('template_view/kadin_template/dashboard_header');
		$this->load->view('template_view/kadin_template/menubar',$data);
		$this->load->view('kadin/kadin_validasi',$data);
		$this->load->view('template_view/kadin_template/dashboard_footer');
	}

	public function form_validasi_sip()
	{
		$data['title'] ='Validasi Kadin';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_kadin->load_data_sip();
		$this->load->view('template_view/kadin_template/dashboard_header');
		$this->load->view('template_view/kadin_template/menubar',$data);
		$this->load->view('kadin/kadin_form_validasi',$data);
		$this->load->view('template_view/kadin_template/dashboard_footer');
	}
	
	public function manajemen_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_sip'] = $this->model_kadin->load_manajemen_sip();
		$this->load->view('template_view/kadin_template/dashboard_header');
		$this->load->view('template_view/kadin_template/menubar',$data);
		$this->load->view('kadin/kadin_manajemen_sip',$data);
		$this->load->view('template_view/kadin_template/dashboard_footer');
	}


	public function aksi_terbitkan_sip()
	{
		$data['title'] ='Validasi SIP Kadin';
		$admin = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$id_admin = $admin['id'];
		$id_sip = $this->uri->segment(3);
		$id_nakes = $this->uri->segment(4);
		$validasi_kadin = $this->input->post('validasi_kadin');
		$keterangan = $this->input->post('keterangan');
		$nomor_sip = $this->input->post('nomor_sip');
		$catatan = $this->input->post('catatan');
		$tanggal_validasi= date("Y-m-d");
		$status_sip = $this->input->post('status_sip');
		$title_validasi = $this->input->post('title_validasi');
		$data = array(
			'id_nakes'=>$id_nakes,
			'id_sip'=>$id_sip,
			'validasi_kadin' => $validasi_kadin,
			'tgl_validasi_kadin'=>$tanggal_validasi,
			'keterangan'=>$keterangan,
		);
		$this->model_kadin->terbitkan_sip($data,$id_sip,$status_sip,$nomor_sip,$catatan,$title_validasi,$id_nakes);

	}

}