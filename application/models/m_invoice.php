<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_invoice extends CI_Model {

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama_pemesan');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$invoice = array (
			'nama_pemesan' => $nama,
			'alamat' => $alamat,
			'telepon' => $telepon,
			'tgl_pesan' => date('Y-m-d H:i:s'),
			
		);
		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_invoice'	=> $id_invoice,
				'id_produk'		=> $item['id'],
				'nama_produk'	=> $item['name'],
				'jumlah'		=> $item['qty'],
				'harga'			=> $item['price'],
			);
			$this->db->insert('tb_pesanan', $data);
		}
		return TRUE;

	}

	public function tampil_invoice($id_invoice = null)
	{
		$this->db->from('tb_invoice');
		if($id_invoice != null)
		{
			$this->db->where('id_invoice', $id_invoice);
		}
		$this->db->order_by('id_invoice', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getinvoice($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_invoice');
		if($result->num_rows() > 0 )
		{
			return $result->row();
		}
		else{
			return false;
		}
	}

	public function getpesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
		if($result->num_rows() > 0 )
		{
			return $result->result();
		}
		else{
			return false;
		}
	}

	public function detail_keranjang()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		return $this->db->query("SELECT tb_keranjang.*, tb_produk.* FROM tb_keranjang JOIN tb_produk ON tb_keranjang.id_produk = tb_produk.id_produk WHERE tb_keranjang.id_pengguna = '$id_pengguna'")->result_array();
	}
 
	
}