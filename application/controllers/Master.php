<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->library('form_validation');
   		$this->load->database();
		$this->load->helper(array('url','form'));
		$this->load->library('email');
		
		$this->session_val = $this->session->has_userdata('iv_username');
	}

	
	


	function user(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');		//null if not login
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		
		// end level session
		if(!empty($username)){
			$data['current_page'] = "master";
			$data['sub_page'] = "user";
			$data['list'] = $this->Mmaster->get_user();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('master/user_template', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addUser(){
		if(empty($this->session_val)){redirect('login');exit;}
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$data = array(
			'token_user' => $this->Madminuser->generate_token(),
			'name' => $name,
			'username' => $username,
			'password' => md5($password),
			'level' => $level,
		);
		
		$this->db->insert('tb_user', $data);
		$this->session->set_flashdata('alert', 'SUCCESS');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function updateUser(){
		if(empty($this->session_val)){redirect('login');exit;}
		$idUser = $this->input->post('idUser');
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		$data = array(
			'name' => $name,
			'username' => $username,
			'level' => $level,
		);
		
		$this->db->where('idUser', $idUser);
		$this->db->update('tb_user', $data);
		$this->session->set_flashdata('alert', 'UPDATED');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function delUser($id){
		if(empty($this->session_val)){redirect('login');exit;}
		$this->db->where('token_user', $id);
		$this->db->delete('tb_user');
		$this->session->set_flashdata('alert', 'DELETED');
		redirect($_SERVER['HTTP_REFERER']);
	}

	
	function role(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');		//null if not login
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
        
		if(!empty($username)){
			$data['current_page'] = "role";
			$data['sub_page'] = "role";
			$data['list'] = $this->Mmaster->get_role();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('master/role_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addRole(){
		if(empty($this->session_val)){redirect('login');exit;}
		$remark = $this->input->post('remark');
		$idrole = str_replace(" ","_",$remark);
		$data = array(
			'idrole' => $idrole,
			'remark' => $remark
			);
		
		$this->db->insert('role', $data);
		$this->session->set_flashdata('alert', 'SUCCESS');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function access($token_data){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');		//null if not login
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
       
		if(!empty($username)){
			$data['current_page'] = "role";
			$data['sub_page'] = "role";
			$data['gid_data'] = $token_data;
			$res = $this->Mmaster->get_user_detail($token_data);
			foreach($res as $dt){
				$data['email'] = $name = $dt->name;
			}
			$data['list'] = $this->Mmaster->get_access($token_data);
			$this->load->view('app/index_header_template', $data);
			$this->load->view('master/access_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addAccess2(){
		if(empty($this->session_val)){redirect('login');exit;}
		$token = $this->input->post('token');
		$del = $this->delAcc_nik($token);
		if($del==1){
			$res = $this->input->post('dlt[]');
			if(empty($res)){
				redirect($_SERVER['HTTP_REFERER']); exit;
			}
			$result = array();
			foreach($res AS $key => $val){
				$result[] = array(
				'dlt'  => isset ($_POST['dlt'][$key]) ? $_POST['dlt'][$key]: null,
				'access'  => isset ($_POST['access'][$key]) ? $_POST['access'][$key]: null,
				'token'  => $_POST['token'],
				);
			}      
			foreach($result as $dt){
				$dlt_data = $dt['dlt'];
				$pieces = explode("-", $dlt_data);
				$idrole = $pieces[0]; 
				$dlt = $pieces[1]; 
				$token = $dt['token'];
				$access = $dt['access'];

				$data = array(
					'idrole' => $idrole,
					'token' => $token,
					'dlt' => $dlt,
					'access' => $access,
				);
				
				$this->db->insert('role_access', $data);
			}
		}
		$this->session->set_flashdata('alert', 'SUCCESS');
		redirect($_SERVER['HTTP_REFERER']);
		

	}

	function delAcc_nik($token){
		
		$this->db->where('token', $token);
		$this->db->delete('role_access');
		return 1;
	}

	

	








}
