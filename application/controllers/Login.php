<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->library('form_validation');
   		$this->load->database();
		$this->load->helper(array('url','form'));
		$this->load->library('email');
	}

	

	function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$username = $this->session->userdata('iv_username');		//null if not login a
		$data['username_session'] = $username;
		$data['current_page'] = "";
		if(!empty($username))
		{
			$this->session->set_flashdata('successlogin', 'welcome');
			redirect('home');
		} else {
			$this->load->view('app/login_template');
		}
	}

	
	function checkLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$user = $this->Madminuser->get_user($username,$password);
			foreach($user as $dt){
				$token_user = $dt->token_user;
				$username = $dt->username;
				$name = $dt->name;
				$level = $dt->level;
			}
		if(!empty($token_user)){
			$time = time();
			$usersession = array(
				'iv_token'  => $token_user,
				'iv_username'  => $username,
				'iv_name'  => $name,
				'iv_level'  => $level,
			);
			$this->session->set_userdata($usersession);
			
					
		$this->session->set_flashdata('successlogin', 'welcome');
		redirect('home');
		}else{
			$this->session->set_flashdata('eror_com', 'eror_com');
			redirect('login');	
		}
	}

	function logout(){
	date_default_timezone_set('Asia/Jakarta');
	$nik = $this->session->userdata('iv_username');
	$this->session->unset_userdata('iv_username');
	$this->session->unset_userdata('iv_token');
	$this->session->unset_userdata('iv_name');
	$this->session->unset_userdata('iv_level');
	$this->session->set_flashdata('logout', 'logout');
	redirect('login');
	}

	

}
