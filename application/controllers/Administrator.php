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
		
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_dashboard',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function validasi_sip()
	{
		$data['title'] ='Validasi SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_sip();

		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_validasi',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function form_validasi_sip()
	{
		$data['title'] ='Validasi SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_sip();

		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_form_validasi',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function perpanjangan_sip()
	{
		$data['title'] ='Permohonan Perpanjangan SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_perpanjangan_sip();
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_perpanjangan_sip',$data);
		$this->load->view('template_view/dashboard_footer');
	}



	public function manajemen_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_sip'] = $this->model_administrator->load_manajemen_sip();
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_manajemen_sip',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function detail_sip()
	{
		$data['title'] ='Manajemen SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data['detail_sip']= $this->db->get_where('data_sip', array('id'=>$this->uri->segment(3)))->row_array();
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_detail_sip',$data);
		$this->load->view('template_view/dashboard_footer');
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
	    if($sip['jenis_sip']='Dokter'){
	    $this->pdf->load_view('admin/view_sip_pdf', $data);
	    }elseif ($sip['jenis_sip']='Dokter') {
	    	$this->pdf->load_view('admin/view_sip_apoteker_pdf', $data);
	    }elseif ($sip['jenis_sip']='TTK') {
	    	$this->pdf->load_view('admin/view_sip_ttk_pdf', $data);
	    }
	}

	public function form_validasi_perpanjangan()
	{
		$data['title'] ='Permohonan Perpanjangan SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_form_validasi_perpanjangan',$data);
		$this->load->view('template_view/dashboard_footer');
	}

	public function manajemen_user()
	{
		$data['title'] ='Manajemen User';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['data_user']=$this->model_administrator->load_manajemen_user();
		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_manajemen_user',$data);
		$this->load->view('template_view/dashboard_footer');
	
	}







//batas view dan aksi



	public function aksi_validasi_sip()
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
		$this->model_administrator->validasi_sip($data,$id_sip,$status_sip,$title_validasi);


	}


	public function aksi_validasi_perpanjangan()
	{

		$data['title'] ='Validasi SIP';
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
		$this->model_administrator->validasi_perpanjangan($data,$id_sip,$status_sip,$validator_sebelumnya,$title_validasi,$nama_admin);


	}

}