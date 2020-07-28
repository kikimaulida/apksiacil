<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_produk extends CI_Model {

	public function tampil_produk($id_pengguna = null)
	{
		if($id_pengguna == null)
		{
			return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha");
		}
		else
		{
			$id_pengguna=$this->session->userdata('id_pengguna');
			return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha WHERE tb_pengguna.id_pengguna = '$id_pengguna'");
		}		
	}

	public function getproduk($id_produk)
	{
		return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha WHERE tb_produk.id_produk = '$id_produk'");
	}

	public function getproduk1($id_usaha)
	{
		return $this->db->query("SELECT tb_produk.*, tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_usaha.id_usaha, tb_usaha.nama_usaha, tb_kecamatan.nama_kecamatan FROM tb_pengguna JOIN tb_produk ON tb_pengguna.id_pengguna = tb_produk.id_pengguna JOIN tb_usaha ON tb_usaha.id_usaha = tb_produk.id_usaha JOIN tb_kecamatan ON tb_usaha.id_kecamatan = tb_kecamatan.id_kecamatan WHERE tb_usaha.id_usaha ='$id_usaha'");
	}

	public function detailproduk($id_produk)
	{
		return $this->db->query("SELECT tb_produk.*, tb_usaha.* FROM tb_produk JOIN tb_usaha ON tb_produk.id_usaha = tb_usaha.id_usaha  WHERE tb_produk.id_produk = '$id_produk'");
	}
 
	public function tambah_produk($post)
	{
		$produk = [
			'id_produk' => $post['id_produk'],
			'id_pengguna' => $post['pengguna'],
			'id_usaha' => $post['usaha'],
			'nama_produk' => $post['nama_produk'],
			'deskripsi_produk' => $post['deskripsi_produk'],
			'harga' => $post['harga'],
			'foto_produk' => $post['foto_produk'],
			'status_produk' => $post['status_produk'],
			'tgl_unggah' => $post['tgl_unggah'],
		];
		$this->db->insert('tb_produk', $produk);
	}

	public function ubah_produk($post)
	{
		$produk = [
			'id_produk' => $post['id_produk'],
			'id_pengguna' => $post['pengguna'],
			'id_usaha' => $post['usaha'],
			'nama_produk' => $post['nama_produk'],
			'deskripsi_produk' => $post['deskripsi_produk'],
			'harga' => $post['harga'],
			'status_produk' => $post['status_produk'],
		];
		if($post['foto_produk'] != null)
		{
			$produk['foto_produk'] = $post['foto_produk'];
		}
		
		$this->db->where('id_produk', $post['id_produk']);
		$this->db->update('tb_produk', $produk);
	}
	
	public function hapus_produk($id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->delete('tb_produk'); //nama tabel database
	}

	function check_nama($nama_produk)
	{
		$this->db->from('tb_produk');
		$this->db->where('nama_produk', $nama_produk);
		$query = $this->db->get();
		return $query;
	}
}

/*SELECT tb_produk.nama_produk, tb_usaha.nama_usaha, tb_usaha.id_kecamatan FROM tb_usaha JOIN tb_produk ON tb_produk.id_usaha = tb_usaha.id_usaha JOIN tb_kecamatan ON tb_usaha.id_kecamatan = tb_kecamatan.id_kecamatan  WHERE tb_kecamatan.id_kecamatan ='9'*/