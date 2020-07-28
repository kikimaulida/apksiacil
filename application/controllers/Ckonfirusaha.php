<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Ckonfirusaha extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_usaha', 'm_pengguna', 'm_kategori', 'm_kecamatan', 'm_notif']);
		}

		public function index() 
		{
			
			$level = $this->session->userdata('level');
			if ($level == 'admin')
			{
				$id_pengguna = '';
			}
			else {
				$id_pengguna = $this->session->userdata('id_pengguna');
			}
			$data['row'] = $this->m_usaha->konfir_usaha($id_pengguna);
			/*var_dump($data);*/
			$this->template->load('template', 'usaha/konfir_usaha', $data);
		} 

		public function detail_usaha($id_usaha)
		{
			$data['row'] = $this->m_usaha->getusaha($id_usaha);
			$this->template->load('template', 'usaha/detail_konfir', $data);
		}

		function status()
	    {
	        $id_usaha=$this->input->post('id_usaha');
	        $status=$this->input->post('status');
	        $this->m_usaha->status($id_usaha,$status);
	        redirect('Ckonfirusaha');        
	    }
	}