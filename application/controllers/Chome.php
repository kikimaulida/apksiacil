<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(['m_produk', 'm_produkd', 'm_usaha', 'm_usahad', 'm_kecamatan', 'm_kategori', 'm_pengguna', 'model_slider', 'm_komentar', 'm_balaskomen', 'm_rating', 'm_saran', 'm_invoice', 'm_map']);
	}

	public function index()
	{
		$data['row1'] = $this->m_kecamatan->tampil_kecamatan();
		$data['row2'] = $this->model_slider->get_slider();
		$data['row3'] = $this->m_kategori->tampil_kategori();
		
		$this->template1->load('template1', 'depan/home', $data);
	}

	public function tambah_keranjang($id)
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$dt = $this->db->query("SELECT * FROM tb_keranjang WHERE id_pengguna = '$id_pengguna' AND id_produk = '$id'");
		$cek = $dt->num_rows();
		if($cek > 0)
		{
			$dta = $dt->row();
			$jml = $dta->jumlah+1;
			$data = array(
				'jumlah' => $jml, 
			);
			$this->db->where('id_keranjang', $dta->id_keranjang);
			$this->db->update('tb_keranjang', $data);

		}else{
			$data = array(
			'id_keranjang' => '',
			'id_pengguna' => $id_pengguna,
			'id_produk' => $id,
			'jumlah' => 1, 

		);
		$this->db->insert('tb_keranjang', $data);
		}
		
		redirect('Chome/tampilproduk');
	}

	public function detail_keranjang()
	{
		
		$data ['data'] = $this->m_invoice->detail_keranjang();	
		/*print_r($data);*/
		$this->template1->load('template1', 'depan/detail_keranjang', $data);
	}

	public function hapus_keranjang($id)
	{
		$this->db->where('id_keranjang', $id);
        $this->db->delete('tb_keranjang');
		redirect('Chome/detail_keranjang');
	}

	public function pembayaran()
	{
		$this->template1->load('template1', 'depan/pembayaran');
	}

	public function proses_pesanan()
	{
		$proses = $this->m_invoice->index();
		if($proses){
		$this->cart->destroy();
		$this->template1->load('template1', 'depan/proses_pesanan');
		} else {
			echo "Maaf, Pesanan Anda Gagal diproses!";
		}
	}

	public function tampilproduk()
	{
		$data['row'] = $this->m_produkd->tampil_produk();
		// echo '<pre>';
		// print_r($data['row']);
		// echo '</pre>';
		$data['row1'] = $this->m_kecamatan->tampil_kecamatan();
		$data['row2'] = $this->m_kategori->tampil_kategori();
		$this->template1->load('template1', 'depan/tampil_produk', $data);
	}

	public function detail_produk($id_produk)
	{
		$data['id_produk'] = $id_produk;
		$data['row1'] = $this->m_komentar->tampil_komentar($id_produk);
		$data['row2'] = $this->m_rating->tampil_rating($id_produk);
		$data['row3'] = $this->m_produk->fotoproduk($id_produk);
		$data['jumlah_review']   = $this->m_rating->jumlahreview($id_produk);
		$data['jumlah_rating']   = $this->m_rating->jumlahrating($id_produk);
		$data['row'] = $this->m_produk->detailproduk($id_produk);
		/*print_r($data['row1']->result());*/
		$this->template->load('template1', 'depan/detail_produk', $data);
	}

	public function tampilusaha()
	{
		$data['row'] = $this->m_usahad->tampil_usaha();
		$this->template1->load('template1', 'depan/tampil_usaha', $data);
	}

	public function detailusaha($id_usaha)
	{
		$data['row'] = $this->m_usaha->getusaha($id_usaha);
		$data['row1'] = $this->m_produk->getproduk1($id_usaha);
		$data['map'] = $this->m_map->tampil_map($id_usaha);
		$this->template1->load('template1', 'depan/detail_usaha', $data);
	}

	public function daftar()
	{
		$pengguna = new stdClass();
		$pengguna->id_pengguna = null;
		$pengguna->nama_lengkap = null;
		$pengguna->email = null;
		$pengguna->username = null;
		$pengguna->password = null;
		$pengguna->foto_pengguna = null;
		$pengguna->level= null;
		$pengguna->status= null;

		$data = array(
			'page' => 'tambah',
			'row' => $pengguna,
		);
		$this->template->load('template1', 'depan/pendaftaran', $data);
	}

	public function proses()
	{
		$config['upload_path']		= './uploads/pengguna/';
		$config['allowed_types']	= 'jpg|png|jpeg';
		$config['max_size']			= 2048;
		$config['file_name']		= 'pengguna-'.date('ymd').'-'.substr(md5(rand()),0,10);
	
		$this->load->library('upload', $config);
		
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])) 
		{
			if($this->m_pengguna->check_username($post['username'])->num_rows() > 0 )
			{
				$this->session->set_flashdata('error', "Maaf, username  $post[username] sudah terdaftar/digunakan.");
				redirect('chome/daftar');
			}

			if(@$_FILES['foto_ktp']['name'] != null)
			{
				if ($this->upload->do_upload('foto_ktp'))
				{
					$post['foto_ktp'] = $this->upload->data('file_name');
				}
				else
				{
					$error = $this->upload->display_errors();
					redirect('auth/login');
				}
			}

			if(@$_FILES['foto_pengguna']['name'] != null)
			{
				if ($this->upload->do_upload('foto_pengguna'))
				{
					$post['foto_pengguna'] = $this->upload->data('file_name');
					$this->m_pengguna->tambah_pengguna($post);
					if ($this->db->affected_rows() > 0) 
					{
			          	$this->session->set_flashdata('success', "Tunggu Verifikasi Dari SIACIL TALA");
			        }
						redirect('auth/login');
				}
				else
				{
					$error = $this->upload->display_errors();
					redirect('chome/daftar');
				}
			}
			else 
			{
				$post['foto_pengguna'] = 'default.png';
				$this->m_pengguna->tambah_pengguna($post);
				if ($this->db->affected_rows() > 0) 
				{
		          	$this->session->set_flashdata('success', "Tunggu Verifikasi Dari SIACIL TALA");
		        }
					redirect('auth/login');
			}
		} 

	}

	public function proseskomentar()
	{
		$this->m_komentar->tambah_komentar();
		if ($this->db->affected_rows() > 0) 
		{
          	echo "<script>alert('Komentar Berhasil Terkirim.');</script>";
        }
            echo "<script>window.location='".site_url('chome/detail_produk/'. $this->input->post('id_produk'))."';</script>";
		/*if ($this->db->affected_rows() > 0) {}
        redirect('Chome/detail_produk/'. $this->input->post('id_produk'));*/
	}

	public function prosesbalasan()
	{
		$this->m_balaskomen->balas_komentar();
		if ($this->db->affected_rows() > 0) 
		{
          	echo "<script>alert('Komentar Berhasil Terkirim.');</script>";
        }
            echo "<script>window.location='".site_url('chome/detail_produk/'. $this->input->post('id_produk'))."';</script>";
	}

	public function prosesrating()
	{
		$this->m_rating->tambah_rating();
		if ($this->db->affected_rows() > 0) 
		{
          	echo "<script>alert('Rating dan Review Berhasil Terkirim.');</script>";
        }
            echo "<script>window.location='".site_url('chome/detail_produk/'. $this->input->post('id_produk'))."';</script>";
	}

	public function kontak() 
	{
		$this->template->load('template1', 'depan/kontak');
	}

	public function prosessaran()
	{
		$this->m_saran->tambah_saran();
		if ($this->db->affected_rows() > 0) 
		{
          	echo "<script>alert('Terima Kasih atas Saran yang Anda berikan.');</script>";
        }
            echo "<script>window.location='".site_url('chome')."';</script>";
	}

	public function tentang() 
	{
		$this->template->load('template1', 'depan/tentang');
	}
}
