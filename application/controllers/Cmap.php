<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cmap extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			
			$this->load->model(['m_map', 'm_notif']);
		}

		public function index() 
		{
			$data['map'] = $this->m_map->tampil_map();
			$this->template->load('template', 'map', $data);
		}

	}