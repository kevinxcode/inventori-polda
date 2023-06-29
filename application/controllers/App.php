<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {

	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->library('form_validation');
   		$this->load->database();
		$this->load->helper(array('url','form'));
		$this->load->library('email');
		
		$this->session_val = $this->session->has_userdata('iv_username');
	}


	function stok(){
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
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "stok";
			$data['sub_page'] = "stok";
			$txtsearch = $this->input->post('txtsearch');
			if($txtsearch=='1'){
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');
				$data['list'] = $this->Mdata->get_date_stok($start_date,$end_date);
			}else{
				$data['list'] = $this->Mdata->get_stok();
			}
			
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/stok_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}
	function xlsStock(){
		if(empty($this->session_val)){redirect('login');exit;}
		$date_now  = date("his");
		$data = array( 'title' => 'Data_stock-'.$date_now );
		$data['list'] = $this->Mdata->get_stok();
	
		$this->load->view('data/xls_stock',$data);
	}

	function outStock(){
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
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "stok";
			$data['sub_page'] = "stok";
			$check = $this->input->post('check');
			
			if($check=='1'){
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');
				$data['list'] = $this->Mdata->get_stok_out_date($start_date,$end_date);
			}else{
				$data['list'] = $this->Mdata->get_stok_out();
			}
			 $btn_submit = $this->input->post('btn_submit');
			if($btn_submit=='1'){
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');
				redirect('app/xlsOutstock/'.$start_date.'/'.$end_date);
				exit;
			}
			
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/stok_out_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function xlsOutstock($start_date,$end_date){
		if(empty($this->session_val)){redirect('login');exit;}
		$date_now  = date("his");
		$data = array( 'title' => 'out_stock-'.$date_now );
		$data['list'] = $this->Mdata->get_stok_out_date($start_date,$end_date);
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('data/xls_out_stock',$data);
	}


	function addStok(){
		if(empty($this->session_val)){redirect('login');exit;}
		$token = $this->Madminuser->generate_token();
		$check = $this->input->post('check');
		$tanggal = $this->input->post('tanggal');
		$title = $this->input->post('title');
		$jumlah = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		if($check==0){
			$data = array(
				'token' => $token,
				'tanggal' => $tanggal,
				'title' => $title,
				'jumlah' => $jumlah,
				'harga' => $harga,
				);
	
			$this->db->insert('stok', $data);
			$this->session->set_flashdata('alert', 'SUCCESS');;
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$token_data = $this->input->post('token');
			$data = array(
				'tanggal' => $tanggal,
				'title' => $title,
				'jumlah' => $jumlah,
				'harga' => $harga,
				);
	
			$this->db->where('token', $token_data);
			$this->db->update('stok', $data);
			$this->session->set_flashdata('alert', 'SUCCESS');;
			$this->load->view('success_tmp');
		}
		
	}

	function delStok($token){
		if(empty($this->session_val)){redirect('login');exit;}
		$this->db->where('token', $token);
		$this->db->delete('stok');
		$this->session->set_flashdata('alert', 'DELETED');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function editStok($token_id){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login aa
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "stok";
			$data['sub_page'] = "stok";
			$data['list'] = $this->Mdata->get_edit_stok($token_id);
			$this->load->view('app/index_header_template_view', $data);
			$this->load->view('data/edit_stok_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function pengeluaran(){
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
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "pengeluaran";
			$data['sub_page'] = "pengeluaran";
			$data['list'] = $this->Mdata->get_pengeluaran();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/pengeluaran_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addPengeluaran(){
		if(empty($this->session_val)){redirect('login');exit;}
		$token = $this->Madminuser->generate_token();
		$check = $this->input->post('check');
		$tanggal = $this->input->post('tanggal');
		$oleh = $this->input->post('oleh');
		$status = $this->input->post('status');

		$kode = $this->Mdata->get_kode();
		$nourut = substr($kode, 3, 4);
        $kodeBarangSekarang = $nourut + 1;
		$kode_final =  sprintf("%04s", $kodeBarangSekarang);

		if($check==0){
			$data = array(
				'token_pengeluaran' => $token,
				'kode' => $kode_final,
				'tanggal' => $tanggal,
				'oleh' => $oleh,
				'status' => $status,
				);
	
			$this->db->insert('pengeluaran', $data);
			$this->session->set_flashdata('alert', 'SUCCESS');;
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$token_data = $this->input->post('token');
			$data = array(
				'oleh' => $oleh,
				'status' => $status,
				);
	
			$this->db->where('token_pengeluaran', $token_data);
			$this->db->update('pengeluaran', $data);
			$this->session->set_flashdata('alert', 'SUCCESS');;
			$this->load->view('success_tmp');
		}
		
	}

	function editPengeluaran($token_id){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login aa
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "pengeluaran";
			$data['sub_page'] = "pengeluaran";
			$data['list'] = $this->Mdata->get_edit_pengeluaran($token_id);
			$this->load->view('app/index_header_template_view', $data);
			$this->load->view('data/edit_pengeluaran_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function item($token_id){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login aa
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "pengeluaran";
			$data['sub_page'] = "pengeluaran";
			$data['token_pengeluaran'] = $token_id;
			$data['list'] = $this->Mdata->get_edit_pengeluaran($token_id);
			$data['list_item'] = $this->Mdata->get_item($token_id);
			$data['grand_total'] = $grand_total = $this->Mdata->grand_total($token_id);
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/item_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function viewStok(){
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
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "pengeluaran";
			$data['sub_page'] = "pengeluaran";
			$data['list'] = $this->Mdata->get_stok_total();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/view_stok_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addItem(){
		if(empty($this->session_val)){redirect('login');exit;}
		$token_stok = $this->input->post('token_stok');
		$token_pengeluaran = $this->input->post('token_pengeluaran');
		$judul = $this->input->post('judul');
		$harga_item = $this->input->post('harga_item');
		$jumlah_keluar = $this->input->post('jumlah_keluar');
		
		$sisa_stok = $this->input->post('sisa_stok');
		if($jumlah_keluar>$sisa_stok){
			$this->session->set_flashdata('alert', 'JUMLAH STOK TIDAK CUKUP');;
			redirect($_SERVER['HTTP_REFERER']); exit;
		}
		if($jumlah_keluar==''){
			$this->session->set_flashdata('alert', 'JUMLAH KELUAR KOSONG');;
			redirect($_SERVER['HTTP_REFERER']); exit;
		}
		$data = array(
			'token_stok' => $token_stok,
			'token_pengeluaran' => $token_pengeluaran,
			'judul' => $judul,
			'harga_item' => $harga_item,
			'jumlah_keluar' => $jumlah_keluar,
			);

		$this->db->insert('item', $data);
		$this->session->set_flashdata('alert', 'SUCCESS');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function delItem($id_item){
		if(empty($this->session_val)){redirect('login');exit;}
		$this->db->where('id_item', $id_item);
		$this->db->delete('item');
		$this->session->set_flashdata('alert', 'DELETED');;
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function printPengeluaran(){
		if(empty($this->session_val)){redirect('login');exit;}
		$token_id = $this->input->post('token_pengeluaran');
		$noted = $this->input->post('noted');
		$data_2 = array(
			'noted' => $noted,
			);

		$this->db->where('token_pengeluaran', $token_id);
		$this->db->update('pengeluaran', $data_2);
		redirect('app/pdfView/'.$token_id);
	}

  function pdfView($token_id)
	{
		if(empty($this->session_val)){redirect('login');exit;}
		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 9,
			'default_font' => 'dejavusans',
			'margin_left' => 6,
			'margin_right' => 6,
			'margin_top' => 6,
			'margin_bottom' => 6,
			'margin_header' => 0,
			'margin_footer' => 0,
			'orientation' => 'p',
			]);

			$data['list'] = $this->Mdata->get_edit_pengeluaran($token_id);
			$data['list_item'] = $this->Mdata->get_item($token_id);
			$data['grand_total'] = $grand_total = $this->Mdata->grand_total($token_id);

			$html = $data;
			$mpdf->SetDisplayPreferences('/HideMenubar/HideToolbar/DisplayDocTitle');
			$data = $this->load->view('data/pdf_pengeluaran_temp', $html, TRUE);
			$mpdf->WriteHTML($data);
			$file_name = 'Print_pengeluaran';
			$date = date('ymdhis');
			$mpdf->Output($file_name.'-'.$date.'.pdf', 'D');
			//$mpdf->Output('MyPDF.pdf', 'D');
	}

	function transaksi(){
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
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'transaksi');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "transaksi";
			$data['sub_page'] = "transaksi";
			$txtsearch = $this->input->post('txtsearch');
			if($txtsearch=='1'){
				$data['start_date'] = $start_date =$this->input->post('start_date');
				$data['end_date'] =  $end_date = $this->input->post('end_date');
			}else{
				$data['start_date'] = $start_date = date('Y-m-01');
				$data['end_date'] = $end_date = date('Y-m-t');
			}
			
			$data['list'] = $this->Mdata->get_transaksi($start_date,$end_date,0);
			$res =  $this->Mdata->get_total_transaksi($start_date,$end_date,0);
			foreach ($res as $dt){
				$data['total_in'] = $dt->total_in;
				$data['total_out'] = $dt->total_out;
				$data['balance'] = $dt->balance;
			}
			$btn_submit =$this->input->post('btn_submit');
			if($btn_submit=='1'){ // pdf
				redirect('app/reportPdf_view/'.$start_date.'/'.$end_date);
				exit;
			}
			if($btn_submit=='2'){ // xls
				redirect('app/xlsTransaksi/'.$start_date.'/'.$end_date);
				exit;
			}

			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/transaksi_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function xlsTransaksi($start_date,$end_date){
		if(empty($this->session_val)){redirect('login');exit;}
		$date_now  = date("his");
		$data = array( 'title' => 'data_transaksi-'.$date_now );
		$data['list'] = $this->Mdata->get_transaksi($start_date,$end_date,1);
			$res =  $this->Mdata->get_total_transaksi($start_date,$end_date,1);
			foreach ($res as $dt){
				$data['total_in'] = $dt->total_in;
				$data['total_out'] = $dt->total_out;
				$data['balance'] = $dt->balance;
			}
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('data/xls_transaksi',$data);
	}

	function reportPdf_view($start_date,$end_date)
	{
		if(empty($this->session_val)){redirect('login');exit;}
		
		
		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 9,
			'default_font' => 'dejavusans',
			'margin_left' => 6,
			'margin_right' => 6,
			'margin_top' => 6,
			'margin_bottom' => 6,
			'margin_header' => 0,
			'margin_footer' => 0,
			'orientation' => 'p',
			]);
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;

			$data['list'] = $this->Mdata->get_transaksi($start_date,$end_date,1);
			$res =  $this->Mdata->get_total_transaksi($start_date,$end_date,1);
			foreach ($res as $dt){
				$data['total_in'] = $dt->total_in;
				$data['total_out'] = $dt->total_out;
				$data['balance'] = $dt->balance;
			}
			print_r($html);
			$html = $data;
			$mpdf->SetDisplayPreferences('/HideMenubar/HideToolbar/DisplayDocTitle');
			$data = $this->load->view('data/pdf_laporan_temp', $html, TRUE);
			$mpdf->WriteHTML($data);
			$file_name = 'Laporan_Transaksi';
			$date = date('ymdhis');
			$mpdf->Output($file_name.'-'.$date.'.pdf', 'D');
			//$mpdf->Output('MyPDF.pdf', 'D');
	}

	function addTransaksi(){
		if(empty($this->session_val)){redirect('login');exit;}
		$check = $this->input->post('check');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		$kategory = $this->input->post('kategory');
		$txtjumlah = $this->input->post('txtjumlah');
		if($kategory=='1'){
			$pay_in = $txtjumlah;
			$pay_out = '';
		}else{
			$pay_in = '';
			$pay_out = $txtjumlah;
		}
		if($check=='0'){
			$data = array(
				'tanggal' => $tanggal,
				'deskripsi' => $deskripsi,
				'kategory' => $kategory,
				'pay_in' => $pay_in,
				'pay_out' => $pay_out,
				'dlt' => '0',
				);
	
			$this->db->insert('transaksi', $data);
			$this->session->set_flashdata('alert', 'SUCCESS');;
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$idtransaksi = $this->input->post('idtransaksi');
			$data = array(
				'tanggal' => $tanggal,
				'deskripsi' => $deskripsi,
				'kategory' => $kategory,
				'pay_in' => $pay_in,
				'pay_out' => $pay_out,
				'dlt' => '0',
				);
	
			$this->db->where('idtransaksi', $idtransaksi);
			$this->db->update('transaksi', $data);
			$this->session->set_flashdata('alert', 'SUCCESS');;
			$this->load->view('success_tmp');
		}
		
	}

		
	function editTransaksi($id){
		date_default_timezone_set('Asia/Jakarta');
		$this->session->unset_userdata('pwdexpire_username');
		$this->session->unset_userdata('pwdexpire_userrole');
		// get user session name
		$token = $this->session->userdata('iv_token');
		$username = $this->session->userdata('iv_username');		//null if not login
		$data['username_session'] = $username;
		$name = $this->session->userdata('iv_name');		//null if not login
		$data['name_session'] = $name;
		$level = $this->session->userdata('iv_level');		//null if not login aa
		$data['level_session'] = $level;
		$data['flash_message'] = $this->session->flashdata('alert');
		// end session
		if($level!='1') { redirect('home/limitAccess');}
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "transaksi";
			$data['sub_page'] = "transaksi";
			$data['list'] = $this->Mdata->get_edit_transaksi($id);
			$this->load->view('app/index_header_template_view', $data);
			$this->load->view('data/edit_transaksi_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function report(){
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
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'stok');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "report";
			$data['sub_page'] = "report";
			$data['list'] = $this->Mdata->get_laporan();
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/laporan_temp', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function createReport(){
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
		$priviledge_set = $this->Mmaster->get_priviledge_data_view($token,'transaksi');
        if (!$priviledge_set){redirect('home/limitAccess_priv');}
		// end level session
		if(!empty($username)){
			$data['current_page'] = "report";
			$data['sub_page'] = "report";
			
			$data['start_date'] = $start_date =$this->input->post('start_date');
			$data['end_date'] =  $end_date = $this->input->post('end_date');
			$data['keterangan'] =  $keterangan = $this->input->post('keterangan');
			
			$data['list'] = $this->Mdata->get_transaksi($start_date,$end_date,0);
			$res =  $this->Mdata->get_total_transaksi($start_date,$end_date,0);
			foreach ($res as $dt){
				$data['total_in'] = $dt->total_in;
				$data['total_out'] = $dt->total_out;
				$data['balance'] = $dt->balance;
			}
			$this->load->view('app/index_header_template', $data);
			$this->load->view('data/laporan_view', $data);
			$this->load->view('app/index_footer_template', $data);
		} else {
			redirect('login');
		}
	}

	function addReport(){
		$start_date =$this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$keterangan = $this->input->post('keterangan');
		$res = $this->Mdata->get_transaksi($start_date,$end_date,0);
		foreach($res as $dt){
			$idtransaksi = $dt->idtransaksi;
			$data = array(
				'dlt' => '1',
			);
			$this->db->where('idtransaksi', $idtransaksi);
			$this->db->update('transaksi', $data);
		}
		$data_2 = array(
			'keterangan' => $keterangan,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'status' => '1',
		);
		$this->db->insert('laporan', $data_2);
		$this->session->set_flashdata('alert', 'SUCCESS');;
		redirect('app/report');
	}

	function reportPdf($id)
	{
		if(empty($this->session_val)){redirect('login');exit;}
		
		
		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 9,
			'default_font' => 'dejavusans',
			'margin_left' => 6,
			'margin_right' => 6,
			'margin_top' => 6,
			'margin_bottom' => 6,
			'margin_header' => 0,
			'margin_footer' => 0,
			'orientation' => 'p',
			]);
			$res_1 = $this->Mdata->get_report_id($id);
			foreach($res_1 as $dt){
				$data['start_date'] = $start_date = $dt->start_date;
				$data['end_date'] = $end_date = $dt->end_date;
			}

			$data['list'] = $this->Mdata->get_transaksi($start_date,$end_date,1);
			$res =  $this->Mdata->get_total_transaksi($start_date,$end_date,1);
			foreach ($res as $dt){
				$data['total_in'] = $dt->total_in;
				$data['total_out'] = $dt->total_out;
				$data['balance'] = $dt->balance;
			}
			print_r($html);
			$html = $data;
			$mpdf->SetDisplayPreferences('/HideMenubar/HideToolbar/DisplayDocTitle');
			$data = $this->load->view('data/pdf_laporan_temp', $html, TRUE);
			$mpdf->WriteHTML($data);
			$file_name = 'Laporan_Transaksi';
			$date = date('ymdhis');
			$mpdf->Output($file_name.'-'.$date.'.pdf', 'D');
			//$mpdf->Output('MyPDF.pdf', 'D');
	}

	function delReport($id){
		$res_1 = $this->Mdata->get_report_id($id);
		foreach($res_1 as $dt){
			$start_date = $dt->start_date;
		 	$end_date = $dt->end_date;
		}
		$res = $this->Mdata->get_transaksi($start_date,$end_date,1);
		foreach($res as $dt){
			$idtransaksi = $dt->idtransaksi;
			$data = array(
				'dlt' => '0',
			);
			$this->db->where('idtransaksi', $idtransaksi);
			$this->db->update('transaksi', $data);
		}
		$this->db->where('id_lap', $id);
		$this->db->delete('laporan');

		$this->session->set_flashdata('alert', 'DELETED');;
		redirect($_SERVER['HTTP_REFERER']);
	}

	function reportXls($id){
		if(empty($this->session_val)){redirect('login');exit;}
		$res_1 = $this->Mdata->get_report_id($id);
		foreach($res_1 as $dt){
			$start_date = $dt->start_date;
		 	$end_date = $dt->end_date;
		}
		$date_now  = date("his");
		$data = array( 'title' => 'data_transaksi-'.$date_now );
		$data['list'] = $this->Mdata->get_transaksi($start_date,$end_date,1);
			$res =  $this->Mdata->get_total_transaksi($start_date,$end_date,1);
			foreach ($res as $dt){
				$data['total_in'] = $dt->total_in;
				$data['total_out'] = $dt->total_out;
				$data['balance'] = $dt->balance;
			}
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$this->load->view('data/xls_transaksi',$data);
	}

	
	

	

}
