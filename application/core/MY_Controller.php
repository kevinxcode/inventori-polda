<?php

class MY_Controller extends CI_Controller {

  function __construct() {
    parent::__construct();
		$t_nik = $this->session->userdata('iv_token');
    if ($t_nik) {
			$priviledge = [];
			$data_priv = $this->Mmaster->get_role();
				foreach($data_priv as $dt){
					$idrole = $dt->idrole;
					$priviledge[$idrole] = $this->Mmaster->get_priviledge($t_nik,$idrole);
					$priviledge[$idrole.'_1'] = $this->Mmaster->get_priviledge_data($t_nik,$idrole,"1");
					$priviledge[$idrole.'_2'] = $this->Mmaster->get_priviledge_data($t_nik,$idrole,"2");
				}
      	$this->session->set_userdata(['priviledge_claim' => $priviledge]);
    }
  }
}
