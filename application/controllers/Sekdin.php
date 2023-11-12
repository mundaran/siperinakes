<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekdin extends CI_Controller {

	public function __construct()
	    {
			parent::__construct();
			cek_login_siperi();
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


}