<?php
class Mdata extends CI_Model{

	function __construct()
    {
        parent::__construct();
	}


	public function get_peralatan(){
		$sql = "select * from tb_peralatan p
		inner join master_pengadaan m ON m.id=p.pengadaan
		 order by id_peralatan desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_peralatan_edit($id_peralatan){
		$sql = "select * from tb_peralatan where id_peralatan= '$id_peralatan' order by id_peralatan desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_pinjaman(){
		$sql = "select * from tb_pinjaman order by id_pinjaman desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_pinjaman_edit($id_pinjaman){
		$sql = "select * from tb_pinjaman where id_pinjaman='$id_pinjaman' order by id_pinjaman desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_master_pegadaan(){
		$sql = "select * from master_pengadaan order by id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_master_pegadaan_edit($id){
		$sql = "select * from master_pengadaan where id='$id' order by id desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}



	

	









}
