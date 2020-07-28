<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_produkd extends CI_Model {

	public function tampil_produk()
	{
		if (isset($_GET['nama_kecamatan']) AND isset($_GET['nama_kategori']))
		{
			$nama_kecamatan = $_GET['nama_kecamatan'];
			$nama_kategori = $_GET['nama_kategori'];
			return $this->db->query("SELECT tb_produk.id_produk, tb_produk.nama_produk, tb_produk.harga, tb_produk.foto_produk, tb_usaha.id_kecamatan, tb_usaha.id_kategori, tb_kecamatan.nama_kecamatan, tb_kategori.nama_kategori FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kecamatan ON tb_usaha.id_kecamatan = tb_kecamatan.id_kecamatan JOIN tb_kategori ON tb_usaha.id_kategori = tb_kategori.id_kategori WHERE tb_kecamatan.nama_kecamatan ='$nama_kecamatan' AND tb_kategori.nama_kategori = '$nama_kategori'");
		}

		else if(isset ($_GET['nama_kecamatan']))
		{
			$nama_kecamatan = $_GET['nama_kecamatan'];
			return $this->db->query("SELECT tb_produk.id_produk, tb_produk.nama_produk, tb_produk.harga, tb_produk.foto_produk, tb_usaha.id_kecamatan, tb_kecamatan.nama_kecamatan FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kecamatan ON tb_usaha.id_kecamatan = tb_kecamatan.id_kecamatan  WHERE tb_kecamatan.nama_kecamatan ='$nama_kecamatan'");
		}
		
		else if (isset ($_GET['nama_kategori'])) 
		{
			$nama_kategori = $_GET['nama_kategori'];
			return $this->db->query("SELECT tb_produk.id_produk, tb_produk.nama_produk, tb_produk.harga, tb_produk.foto_produk, tb_usaha.id_kecamatan, tb_kecamatan.nama_kecamatan, tb_usaha.id_kategori, tb_kategori.nama_kategori FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kecamatan ON tb_usaha.id_kecamatan = tb_kecamatan.id_kecamatan JOIN tb_kategori ON tb_usaha.id_kategori = tb_kategori.id_kategori  WHERE tb_kategori.nama_kategori ='$nama_kategori'");
		}
		
		else
		{
			return $this->db->query("SELECT tb_produk.id_produk, tb_produk.nama_produk, tb_produk.harga, tb_produk.foto_produk, tb_usaha.id_kecamatan, tb_kecamatan.nama_kecamatan FROM tb_produk JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kecamatan ON tb_usaha.id_kecamatan = tb_kecamatan.id_kecamatan");
		}		
	}
}
