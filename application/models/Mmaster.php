<?php
class Mmaster extends CI_Model{

	function __construct()
    {
        parent::__construct();
	}

	public function get_user()
	{
		$sql = "SELECT * FROM tb_user order by idUser desc ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}




	public function get_role()
	{
		$sql = "SELECT * FROM role order by id desc ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_user_detail($token)
	{
		$sql = "SELECT * FROM tb_user where token_user='$token'  ";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_access($token)
	{
		
		$sql = "with
		t1 as (select * from role),
		t2 as (select * from role_access where token='$token')
		select *, t1.idrole as role_data from t1
		left join t2 ON t2.idrole = t1.idrole order by t1.id asc";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	function check_access($gid,$idrole)
	{
		
		$query = $this->db->query("SELECT * FROM claim.role_access where nik='$gid' AND idrole='$idrole'");
		if($query->num_rows() > 0)
		{
			return 1;
		}else{
			return 2;
		}
	}

	
	  public function get_priviledge($token_user,$item)
	{
		
		$sql = "SELECT idrole FROM role_access where token='$token_user' AND idrole='$item' AND dlt='1'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_priviledge_data($token_user,$item,$access)
	{
		
		$sql = "SELECT idrole FROM role_access where token='$token_user' AND idrole='$item' AND dlt='1' AND access='$access'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	public function get_priviledge_data_view($token_user,$item)
	{
		
		$sql = "SELECT idrole FROM role_access where token='$token_user' AND idrole='$item' AND dlt='1'";
		$query = $this->db->query($sql);
		return $query->result();
		$this->db->close();
	}

	

	




}
