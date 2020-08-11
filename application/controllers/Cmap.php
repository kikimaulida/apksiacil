<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cmap extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			
			$this->load->model(['m_kategori', 'm_notif']);
		}

		public function index() 
		{
			$this->template->load('template', 'map');
		}

		public function tampilmap()
		{
			$data= $this->db->get('tb_map')->result();
			echo json_encode($data);
		}

	}