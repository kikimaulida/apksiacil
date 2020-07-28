<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_notif extends CI_Model {

    public $table = 'tb_usaha';
    public $id_usaha = 'id_usaha';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get total rows
    function total_rows($q = NULL) 
    {
        $this->db->like('id_usaha', $q);
        $this->db->where('status', 'menunggu konfirmasi');
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }	

    public function usaha_baru()
    {
        $usaha_baru = $this->db->query("SELECT * FROM tb_usaha WHERE tb_usaha.status = 'menunggu konfirmasi' ORDER BY tb_usaha.id_usaha DESC");
        return $usaha_baru;
    }
}

	