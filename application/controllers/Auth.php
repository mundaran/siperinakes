<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session'); 
		}

	public function index()
		{
			$this->form_validation->set_rules('username', 'Username', 'trim');

			$this->form_validation->set_rules('password','Password', 'trim');

			if($this->form_validation->run() ==false)
			{
				$this->load->view('template_view/auth_header');

				$this->load->view('auth/login');

				$this->load->view('template_view/auth_footer');
			}

			else{
				$this->_login();		
			}
		}	


	private function _login()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$user = $this->db->get_where('user', array('username'=> $username))->row_array();

		if($user){
			if($password == $user['password']){
				if($user['aktifasi'] == '0'){
					$this->session->set_flashdata('message','<div class="alert bg-orange"><b> Akun Belum Melakukan Aktifasi! </b></div>');
						redirect('auth');
				}

				else{
						$data = array(
							'username'=>$user['username'],
							'role_id'=>$user['role_id']
						);
						$this->session->set_userdata($data);
						
						if($user['role_id']==1){
						redirect('administrator');
						}
						
						elseif($user['role_id']==2){
						redirect('nakes');
						}
					}

			}

			else{
				$this->session->set_flashdata('message','<div class="alert bg-orange"><b> Password tidak Sesuai! </b></div>');
				redirect('auth');
				}

		}

		else{
			$this->session->set_flashdata('message','<div class="alert bg-pink"><b> Username salah! </b></div>');
				redirect('auth');
			}

	}



	public function register_user()
		{
			$this->load->view('template_view/auth_header');

			$this->load->view('auth/register_user');

			$this->load->view('template_view/auth_footer');
		}

	public function aksi_register_user()
		{
			$name = $this->input->post('name');
			$usernameemail = $this->input->post('username-email');
			$password = md5($this->input->post('password')); 
			$confirm = md5($this->input->post('confirm'));

			$cek_email = $this->db->query("SELECT * FROM user WHERE email ='$usernameemail' ");
			$row = $cek_email->num_rows();
			if($row==1){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Email anda sudah digunakan </b></div>');
				redirect('auth/register_user');
			} 
			else{
				$cek_email = $this->db->query("SELECT * FROM user WHERE username ='$usernameemail' ");
				$row_username = $cek_email->num_rows();
				if($row_username==1){
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Username sudah digunakan </b></div>');
					redirect('auth/register_user');
				}

				else{
					if($password == $confirm ){
						$data=array(
							'name'=>$name,
							'username'=>$usernameemail,
							'email' => $usernameemail,
							'password'=>$password,
							'role_id'=>2
						);

						$query= $this->db->insert('user',$data);

					  $config=[
					  	'protocol' =>'smtp',
					  	'smtp_host'=>'ssl://smtp.googlemail.com',
					  	'smtp_user'=>'gbuble11@gmail.com`',
					  	'smtp_pass'=>'Jokam354',
					  	'smtp_port'=> 465,
					  	'mailtype' => 'html',
					  	'starttls'  => true,
					  	'charset'  => 'iso-8859-1',
					  	'newline'   => "\r\n"
						]; 
				      $this->load->library('email', $config); 
				      $this->email->initialize($config);
				      $this->email->from('gbuble11@gmail.com', 'Pemkab Bojonegoro');  
				      $this->email->to($usernameemail);   
				      $this->email->subject('Silahkan Verifikasikan Email Anda'); 
				      $url = base_url()."auth/confirm/".$usernameemail;  
				      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>Terimakasih telah bergabung bersama kami</p><p>Silahkan klik tautan dibawah ini untuk aktivasi/verifikasi email anda</p>".$url."<br/><p>Sincerely,</p><p>Pemkab Bojonegoro</p></body></html>";  
			     	  $this->email->message($message);
			     	  $sendemail= $this->email->send();
			     	  show_error($this->email->print_debugger());

						if($sendemail){
							echo 'berhasil';
						}
					}
					else{
						show_error($this->email->print_debugger());
					}
				}
			}
		}



		public function confirm(){
			$email=$this->uri->segment(3);
			$password=$this->uri->segment(4);
			$data = array(
				'aktifasi'=>1
			);
			$this->db->where('email', $email);
			$berhasil = $this->db->update('user', $data);
			if($berhasil){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Akun Anda Telah Di Verifikasi </b></div>');
				redirect ('auth');
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Confirmasi Gagal </b></div>');
				redirect ('auth');
			}
		}			

	public function logout()
		{
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>sudah log out! </b></div>');
				redirect('dashboard');	
		}
}