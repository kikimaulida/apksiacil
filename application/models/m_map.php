<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_map extends CI_Model {

	public function tampil_map($id = null)
	{
		if($id){
			return $this->db->query("SELECT * FROM tb_usaha WHERE id_usaha = '$id'");
		}else{
			return $this->db->query("SELECT * FROM tb_usaha");
		}
		
	}

}