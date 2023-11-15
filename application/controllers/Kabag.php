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

}