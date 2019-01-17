<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
    }

public function submit($data){
	$u = $this->input->post("username");
	$p = $this->input->post("username");

		$data = array(
			'username' => $u,
			'password' => md5($p));
		$this->db->insert("user", $data);
	}
}