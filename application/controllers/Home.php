<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
	}


	function index(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login
		$data['level_session'] = $level;
		// end session
		if(!empty($username)){
			$data['current_page'] = "home";
			$data['sub_page'] = "home";
			$data['list'] = $this->Mdata->get_pengeluaran_home();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('app/home_template', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function profile(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$iv_token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login
		$data['level_session'] = $level;
		// end session
		if(!empty($username)){
			$data['current_page'] = "home";
			$data['sub_page'] = "home";
			$data['list'] = $this->Mmaster->get_user_detail($iv_token);
			$this->load->view('app/index_header_template', $data);
			$this->load->view('app/profile_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}



	
	function limitAccess(){
		$this->session->unset_userdata('iv_token');
		$this->session->unset_userdata('iv_username');
		$this->session->unset_userdata('iv_name');
		$this->session->unset_userdata('iv_level');
		$this->load->view('app/404_temp');
	}

	function limitAccess_priv(){
		$this->load->view('app/404_temp');
	}

	function test_1(){
		redirect('home/error');
	}

	function error(){
		echo "<script LANGUAGE='JavaScript'>
		window.alert('ERROR TRY AGAIN');
		window.opener.location.reload();
		window.close();
		</script>";
	}

	

	

	
	

}
