<?php 

	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index(){

			$this->load->view('login/index');
		}

		function act_login(){

			$username = $this->input->post('username');
			echo $username;
			$pass = $this->input->post('pass');
			$cek_username = $this->db->get_where('tbl_admin',['username' => $username])->row_array();

			if ($cek_username == true) {

				$cekpass = password_verify($pass, $cek_username['pass']);
				if($cekpass == true){
					$data = [
						'username' => $username,
					];
					$this->session->set_userdata($data);
					redirect('index/index');
				}else{

					$this->session->set_flashdata('message', 'swal("Oops", "Password anda salah", "error" );');
					redirect('Login/');
				}

			}else{

				$this->session->set_flashdata('message', 'swal("Oops", "Username anda salah", "error" );');
				redirect('Login/');
			}
		}

		function logout(){

			$this->session->unset_userdata('username');
			redirect('login/');
		}
	}
?>