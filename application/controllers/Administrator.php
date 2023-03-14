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
		$data['title'] ='Perpanjangan SIP';
		$data ['user'] = $this->db->get_where('user', array('username' => $this->session->userdata('username')))->row_array();
		$data ['sip'] = $this->model_administrator->load_data_perpanjangan_sip();

		$this->load->view('template_view/dashboard_header');
		$this->load->view('template_view/menubar',$data);
		$this->load->view('admin/admin_perpanjangan_sip',$data);
		$this->load->view('template_view/dashboard_footer');
	}

}