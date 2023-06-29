<?php
class Madminuser extends CI_Model{

	function __construct()
    {
        parent::__construct();
	}


	

	function get_user($username,$pwd){
		$pass = md5($pwd);
		$query = $this->db->query("SELECT * FROM tb_user
		WHERE username=".$this->db->escape($username)." AND password=".$this->db->escape($pass)."");
		return $query->result();
	}



	
// generate token id
	function generate_token()
	{
		$hash = "";
		$date = date('mdHis');
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		for($i = 0; $i < 15; $i++)
		{
			$hash .= $chars[mt_rand(0, 61)];
			$tokenid =($hash);
			$token = $tokenid.''.$date;
		}
		return $token;
	}




}
