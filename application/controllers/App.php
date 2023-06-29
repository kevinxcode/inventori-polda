<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->library('form_validation');
   		$this->load->database();
		$this->load->helper(array('url','form'));
		$this->load->library('email');
		
		$this->session_val = $this->session->has_userdata('iv_username');
	}


	function peralatanKHusus(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		
		// end level session
		if(!empty($username)){
			$data['current_page'] = "peralatan";
			$data['sub_page'] = "peralatan";
			$data['list'] = $this->Mdata->get_peralatan();
			$data['list_pengadaan'] = $this->Mdata->get_master_pegadaan();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/peralatan_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addPeralatan(){
		$id_peralatan = $this->input->post('id_peralatan');
		$pengadaan = $this->input->post('pengadaan');
		$jenis = $this->input->post('jenis');
		$jumlah = $this->input->post('jumlah');
		$b = $this->input->post('b');
		$rr = $this->input->post('rr');
		$rb = $this->input->post('rb');
		$data = array(
			'pengadaan' => $pengadaan,
			'jenis' => $jenis,
			'jumlah' => $jumlah,
			'b' => $b,
			'rr' => $rr,
			'rb' => $rb,
		);
		if($id_peralatan=='0'){
			$this->db->insert('tb_peralatan', $data);
		}else{
			$this->db->where('id_peralatan', $id_peralatan);
			$this->db->update('tb_peralatan', $data);
		}
		$this->session->set_flashdata('alert', 'SUCCESS');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function delPeralatan($id_peralatan){
		if(empty($this->session_val)){redirect('login');exit;}
		$this->db->where('id_peralatan', $id_peralatan);
		$this->db->delete('tb_peralatan');
		$this->session->set_flashdata('alert', 'DELETED');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function editPeralatan($id_peralatan){
		$list = $this->Mdata->get_peralatan_edit($id_peralatan);
		echo json_encode($list);
	}

	function pinjaman(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		
		// end level session
		if(!empty($username)){
			$data['current_page'] = "pinjaman";
			$data['sub_page'] = "pinjaman";
			$data['list'] = $this->Mdata->get_pinjaman();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/pinjaman_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function editPinjaman($id_pinjaman){
		$list = $this->Mdata->get_pinjaman_edit($id_pinjaman);
		echo json_encode($list);
	}

	function addPinjaman(){
		$id_pinjaman = $this->input->post('id_pinjaman');
		$tanggal_pinjam = $this->input->post('tanggal_pinjam');
		$nama_barang = $this->input->post('nama_barang');
		$peminjam = $this->input->post('peminjam');
		$jumlah = $this->input->post('jumlah');
		$tanggal_kembali = $this->input->post('tanggal_kembali');
		$data = array(
			'tanggal_pinjam' => $tanggal_pinjam,
			'nama_barang' => $nama_barang,
			'peminjam' => $peminjam,
			'jumlah' => $jumlah,
			'tanggal_kembali' => $tanggal_kembali,
			
		);
		if($id_pinjaman=='0'){
			$this->db->insert('tb_pinjaman', $data);
		}else{
			$this->db->where('id_pinjaman', $id_pinjaman);
			$this->db->update('tb_pinjaman', $data);
		}
		$this->session->set_flashdata('alert', 'SUCCESS');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function delPinjaman($id_pinjaman){
		if(empty($this->session_val)){redirect('login');exit;}
		$this->db->where('id_pinjaman', $id_pinjaman);
		$this->db->delete('tb_pinjaman');
		$this->session->set_flashdata('alert', 'DELETED');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function master_pengadaan(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		
		// end level session
		if(!empty($username)){
			$data['current_page'] = "master";
			$data['sub_page'] = "master_pengadaan";
			$data['list'] = $this->Mdata->get_master_pegadaan();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/master_pengadaan', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addMasterPengadaan(){
		$id = $this->input->post('id');
		$judul_pengadaan = $this->input->post('judul_pengadaan');
		$tahun = $this->input->post('tahun');
		
		$data = array(
			'judul_pengadaan' => $judul_pengadaan,
			'tahun' => $tahun,
			
		);
		if($id=='0'){
			$this->db->insert('master_pengadaan', $data);
		}else{
			$this->db->where('id', $id);
			$this->db->update('master_pengadaan', $data);
		}
		$this->session->set_flashdata('alert', 'SUCCESS');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function editMasterPengadaan($id){
		$list = $this->Mdata->get_master_pegadaan_edit($id);
		echo json_encode($list);
	}

	function rekap_1(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		
		// end level session
		if(!empty($username)){
			$data['current_page'] = "rekap";
			$data['sub_page'] = "rekap_1";
			$data['list'] = $this->Mdata->get_peralatan();
			$data['list_pengadaan'] = $this->Mdata->get_master_pegadaan();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/rekap_peralatan_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}
	

	function xls_1(){
		if(empty($this->session_val)){redirect('login');exit;}
		$date_now  = date("his");
		$data = array( 'title' => 'Rekap_data_peralatan_kHusus-'.$date_now );
		$data['list'] = $this->Mdata->get_peralatan();
		$this->load->view('data/xls_1',$data);
	}

	function rekap_2(){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		
		// end level session
		if(!empty($username)){
			$data['current_page'] = "rekap";
			$data['sub_page'] = "rekap_2";
			$data['list'] = $this->Mdata->get_pinjaman();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/rekap_pinjaman_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function xls_2(){
		if(empty($this->session_val)){redirect('login');exit;}
		$date_now  = date("his");
		$data = array( 'title' => 'Rekap_pinjam_pakai-'.$date_now );
		$data['list'] = $this->Mdata->get_pinjaman();
		$this->load->view('data/xls_2',$data);
	}


	
	

	

}
