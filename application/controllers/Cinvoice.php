<?php
	defined('BASEPATH') OR
	exit('No direct script access allowed');

	class Cinvoice extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model(['m_invoice', 'm_notif']);
		}

		public function index() 
		{
			$data['invoice'] = $this->m_invoice->tampil_invoice();
			$this->template->load('template', 'invoice/data_invoice', $data);
		}

		public function detail_invoice($id_invoice)
		{
			$data['invoice'] = $this->m_invoice->getinvoice($id_invoice);
			$data['pesanan'] = $this->m_invoice->getpesanan($id_invoice);
			$this->template->load('template', 'invoice/detail_invoice', $data);


		}
	}