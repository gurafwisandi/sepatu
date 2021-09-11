<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$vel['data']='';
		if($this->input->post('submit') == "submit"){
			$hsl=$this->auth_m->login();
			if($hsl > 0){
				redirect('/dashboard');
			}else{
				$vel['data']=$hsl;
			}
		}
		// $this->load->view('login',$vel);
		// $this->load->view('loginalt',$vel);
		$this->load->view('logins',$vel);
	}

	public function logout()
	{
	  $this->session->sess_destroy($data_session);
		redirect('/auth/login');
	}


	public function register()
	{
		$this->load->view('register');
	}
	
}