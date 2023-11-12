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


}