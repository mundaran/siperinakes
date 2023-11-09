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
			date_default_timezone_set('Asia/Jakarta');
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
				if($user['aktifasi'] == '1'){
					$data = array(
							'username'=>$user['username'],
							'role_id'=>$user['role_id']
						);
						$this->session->set_userdata($data);
						
						if($user['role_id']==11){
						redirect('administrator');
						}
						
						elseif($user['role_id']==21){
						redirect('nakes');
						}
					
				}

				else{
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b> Akun Belum Melakukan Verifikasi! Silahkan Buka Email Anda Dan Verifikasi Akun Anda </b></div>');
						redirect('auth');
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
							'role_id'=>21
						);

						

						  $query= $this->db->insert('user',$data);
						  $config['protocol'] = 'smtp';  
					      $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
					      $config['smtp_port'] = '465'; 
					      $config['smtp_user'] = 'cs.sipatas@gmail.com';  
					      $config['smtp_pass'] = 'sowovrydqhrcyyrz'; 
					      $config['mailtype'] = 'html';  
					      $config['charset'] = 'iso-8859-1';  
					      $config['wordwrap'] = TRUE;  
					      $config['newline'] = "\r\n"; 
					      $this->email->initialize($config);  
					      $url = base_url()."auth/confirm/".$usernameemail;  
					      $this->email->from('cs.sipatas@gmail.com', 'SIPATAS Dinas Kesehatan Bojonegoro');  
					      $this->email->to($usernameemail);   
					      $this->email->subject('Silahkan Verifikasikan Email Anda');  
					      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>Terimakasih telah bergabung bersama kami</p><p>Silahkan klik tautan dibawah ini untuk aktivasi/verifikasi email anda</p>".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
					     	$this->email->message($message);
					     	$emailsent= $this->email->send();
							if($emailsent){
							$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Pendaftaran Berhasil, Silahkan Login</b></div>');
							redirect('auth');
							}
							else{
							show_error($this->email->print_debugger());
							}

						 
						}

					else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Konfirmasi Password Tidak Sesuai </b></div>');
					redirect('auth/register_user');
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
				$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Akun Anda Telah Di Verifikasi </b></div>');
				redirect ('auth');
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Maaf Confirmasi Gagal Silahkan Hubungi Administrator</b></div>');
				redirect ('auth');
			}
		}


		public function reset_password(){
			$email=$this->input->post('email');
			$cek_email = $this->db->query("SELECT * FROM user WHERE email ='$email' ");
			$row = $cek_email->num_rows();
			if($row==0){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Email anda tidak terdaftar </b></div>');
				redirect('auth');
			}
			else{
				$user = $this->db->get_where('user', array('email'=> $email))->row_array();
				$id_user = $user['id'];
				$name = $user['name'];
				if($email == $user['email']){

					  $config['protocol'] = 'smtp';  
				      $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
				      $config['smtp_port'] = '465'; 
				      $config['smtp_user'] = 'cs.sipatas@gmail.com';  
				      $config['smtp_pass'] = 'sowovrydqhrcyyrz'; 
				      $config['mailtype'] = 'html';  
				      $config['charset'] = 'iso-8859-1';  
				      $config['wordwrap'] = TRUE;  
				      $config['newline'] = "\r\n"; 
				      $this->email->initialize($config);  
				      $url = base_url()."auth/ubah_password/".$email.'/'.$id_user;  
				      $this->email->from('cs.sipatas@gmail.com', 'Reset SIPATAS Dinas Kesehatan Bojonegoro');  
				      $this->email->to($email);   
				      $this->email->subject('Silahkan Verifikasikan Email Anda');  
				      $message = "<html><head><head></head><body><p>Hi,".$name."</p><p>Reset Password Berhasil</p><p>Silahkan klik tautan dibawah ini untuk merubah password baru anda</p>".$url."<br/><p>Sincerely,</p><p>Dinas Kesehatan Bojonegoro</p></body></html>";  
				     	$this->email->message($message);
				     	$emailsent= $this->email->send();
						if($emailsent){
						$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Reset Password Berhasil Silahkan Cek email Anda</b></div>');
						redirect('auth');
						}
					else{
						show_error($this->email->print_debugger());
					}

				}

			}

		}

		public function ubah_password(){
			$this->load->view('template_view/auth_header');
			$this->load->view('auth/form_ubah_password');
			$this->load->view('template_view/auth_footer');
		}

		public function aksi_ubah_password(){

			$email=$this->uri->segment(3);
			$id_user=$this->uri->segment(4);
			$password = md5($this->input->post('new_password')); 
			$confirm = md5($this->input->post('confirm_new_password'));

			if($password==$confirm){
				$user = $this->db->get_where('user', array('email'=> $email))->row_array();

				if($email == $user['email']){
					if($id_user == $user['id']){
						$data = array(
							'password'=>$password
						);
						$this->db->where('email', $email);
						$update_password = $this->db->update('user', $data);
						if($update_password){
							$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"><b>Password berhasil di ubah </b></div>');
							redirect('auth');
						}
						else{
							$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Maaf Password Gagal diubah Silahkan Hubungi Administrator </b></div>');
						redirect('auth/ubah_password/'.$email.'/'.$id_user);
						}
					
					}

					else{
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Maaf Password Gagal diubah Silahkan Hubungi Administrator </b></div>');
						redirect('auth/ubah_password/'.$email.'/'.$id_user);
						}
				}
				else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Maaf Password Gagal diubah Silahkan Hubungi Administrator</b></div>');
					redirect ('auth/ubah_password/'.$email.'/'.$id_user);
				}
			}

			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><b>Maaf Password Gagal diubah Konfirmasi Password Tidak Sesuai</b></div>');
					redirect ('auth/ubah_password/'.$email.'/'.$id_user);
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