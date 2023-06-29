<?php
class Mdata extends CI_Model{

	function __construct()
    {
        parent::__construct();
	}


	public function get_stok()
	{
		$sql = "WITH
		t0 AS (SELECT SUM(jumlah_keluar) AS total_keluar, token_stok FROM item GROUP BY token_stok),
		t1 AS (SELECT * FROM stok s 
		left JOIN t0  ON t0.token_stok=s.token ORDER BY title ASC),
		t2 AS (SELECT *, coalesce(total_keluar, 0) AS keluar_data FROM t1),
		t3 AS (SELECT *, (jumlah-keluar_data) AS sisa FROM t2 )
		SELECT * FROM t3 WHERE sisa>0 order by idstok desc ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_date_stok($start_date,$end_date)
	{
		$sql = "WITH
		t0 AS (SELECT SUM(jumlah_keluar) AS total_keluar, token_stok FROM item GROUP BY token_stok),
		t1 AS (SELECT * FROM stok s 
		left JOIN t0  ON t0.token_stok=s.token ORDER BY title ASC),
		t2 AS (SELECT *, coalesce(total_keluar, 0) AS keluar_data FROM t1),
		t3 AS (SELECT *, (jumlah-keluar_data) AS sisa FROM t2 )
		SELECT * FROM t3 WHERE sisa>0 AND tanggal between '$start_date' AND '$end_date'
		 order by idstok desc ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_stok_out()
	{
		$sql = "WITH
		t0 AS (SELECT SUM(jumlah_keluar) AS total_keluar, token_stok FROM item GROUP BY token_stok),
		t1 AS (SELECT * FROM stok s 
		left JOIN t0  ON t0.token_stok=s.token ORDER BY title ASC),
		t2 AS (SELECT *, coalesce(total_keluar, 0) AS keluar_data FROM t1),
		t3 AS (SELECT *, (jumlah-keluar_data) AS sisa FROM t2 )
		SELECT * FROM t3 WHERE sisa<='0' order by idstok desc limit 300";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_stok_out_date($dt1,$dt2)
	{
		$sql = "WITH
		t0 AS (SELECT SUM(jumlah_keluar) AS total_keluar, token_stok FROM item GROUP BY token_stok),
		t1 AS (SELECT * FROM stok s 
		left JOIN t0  ON t0.token_stok=s.token ORDER BY title ASC),
		t2 AS (SELECT *, coalesce(total_keluar, 0) AS keluar_data FROM t1),
		t3 AS (SELECT *, (jumlah-keluar_data) AS sisa FROM t2 )
		SELECT * FROM t3 WHERE sisa<='0' AND tanggal between '$dt1' AND  '$dt2'   order by idstok desc ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_edit_stok($token_id)
	{
		$sql = "SELECT * FROM stok where token='$token_id' order by idstok desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_pengeluaran()
	{
		$sql = "SELECT * FROM pengeluaran p left join status s ON s.id=p.status order by id_pengeluaran desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_kode()
	{
		$query = $this->db->query("SELECT MAX(kode) as kode from pengeluaran");
        $hasil = $query->row();
        return $hasil->kode; 
	}

	public function get_edit_pengeluaran($token_id)
	{
		$sql = "SELECT * FROM pengeluaran p left join status s ON s.id=p.status
		 where token_pengeluaran='$token_id' order by id_pengeluaran desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_stok_total()
	{
		$sql = "WITH
		t0 AS (SELECT SUM(jumlah_keluar) AS total_keluar, token_stok FROM item GROUP BY token_stok),
		t1 AS (SELECT * FROM stok s 
		left JOIN t0  ON t0.token_stok=s.token ORDER BY title ASC),
		t2 AS (SELECT *, coalesce(total_keluar, 0) AS keluar_data FROM t1),
		t3 AS (SELECT *, (jumlah-keluar_data) AS sisa FROM t2 )
		SELECT * FROM t3 WHERE sisa>0 ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_item($token_pengeluaran)
	{
		$sql = "SELECT *, (harga_item*jumlah_keluar) AS total FROM item WHERE token_pengeluaran='$token_pengeluaran'  order by id_item desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function grand_total($token_pengeluaran)
	{
		$sql = "with
		t1 AS (SELECT *, (harga_item*jumlah_keluar) AS total FROM item WHERE token_pengeluaran='$token_pengeluaran'  order by id_item DESC)
		SELECT SUM(total) AS grand_total FROM t1";
		$query = $this->db->query($sql);
		$list = $query->result();
		foreach($list as $dt){
			return $grand_total = $dt->grand_total;
		}
	}

	public function get_transaksi($dt1,$dt2,$cat)
	{
		$sql = "SELECT * FROM transaksi where tanggal between '$dt1' AND  '$dt2'  order by idtransaksi desc, tanggal desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_total_transaksi($dt1,$dt2,$cat)
	{
		$sql = "WITH
		t1 AS (SELECT SUM(pay_in) AS total_in, SUM(pay_out) AS total_out FROM transaksi where tanggal between '$dt1' AND  '$dt2' )
		SELECT *, (total_in-total_out) AS balance FROM t1 ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_edit_transaksi($id)
	{
		$sql = "SELECT * FROM transaksi where idtransaksi='$id'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_laporan()
	{
		$sql = "SELECT * FROM laporan order by id_lap desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_report_id($id)
	{
		$sql = "SELECT * FROM laporan where id_lap='$id' order by id_lap desc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	public function get_pengeluaran_home()
	{
		$sql = "SELECT p.tanggal, p.kode, i.judul, i.jumlah_keluar FROM item i                                      
		INNER JOIN pengeluaran p ON p.token_pengeluaran=i.token_pengeluaran  ORDER BY id_item DESC LIMIT 300";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();  
	}

	









}
