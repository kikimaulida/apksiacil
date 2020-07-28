-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jul 2020 pada 16.03
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siacil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id_banner` int(11) NOT NULL,
  `foto_banner` varchar(100) NOT NULL,
  `tgl_unggah` date NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_banner`
--

INSERT INTO `tb_banner` (`id_banner`, `foto_banner`, `tgl_unggah`, `id_pengguna`) VALUES
(7, 'banner-200726-29525e3915.PNG', '2020-07-26', 40),
(8, 'banner-200726-155ebdc79e.PNG', '2020-07-26', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `icon`) VALUES
(10, 'Kuliner', 'kategori-200726-1d9dcec16f.png'),
(11, 'Fashion', 'kategori-200726-d32670a313.png'),
(12, 'Agribisnis', 'kategori-200726-882084f10f.png'),
(13, 'Otomotif', 'kategori-200726-3880285d3e.png'),
(14, 'Lainnya', 'kategori-200726-8aa4679611.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Bajuin'),
(2, 'Bati-bati'),
(3, 'Batu Ampar'),
(4, 'Bumi Makmur'),
(5, 'Jorong'),
(6, 'Kintap'),
(7, 'Kurau'),
(8, 'Panyipatan'),
(9, 'Pelaihari'),
(10, 'Takisung'),
(11, 'Tambang Ulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar_produk`
--

CREATE TABLE `tb_komentar_produk` (
  `id_komentar` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar_produk`
--

INSERT INTO `tb_komentar_produk` (`id_komentar`, `komentar`, `id_produk`, `id_pengguna`, `tanggal`, `status`) VALUES
(1, 'Apakah ada warna lain, selain yang ada di foto?', 33, 42, '2020-07-27', 0),
(2, 'Maaf mba, warna baju hanya ada 4 warna seperti pada foto', 33, 41, '2020-07-27', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto_pengguna` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_lengkap`, `email`, `username`, `password`, `foto_pengguna`, `level`, `status`) VALUES
(40, 'M. Thahir Supian', 'siaciltala@gmail.com', 'admin', 'admin', 'pengguna-260720-7418ec14df.png', 'admin', 'diterima'),
(41, 'Tari Yanti', 'mfahrialagustian08@gmail.com', 'tari', 'tari', 'pengguna-260720-c98ee0d455.png', 'pelaku usaha', 'diterima'),
(42, 'Kiki Maulida', 'kikimaulida.99@gmail.com', 'kiki', 'kiki', 'pengguna-260720-11c6963912.png', 'user', 'diterima'),
(43, 'Mila Camelia', 'mfahrialagustian08@gmail.com', 'mila', 'mila', 'pengguna-260720-54ce5b9410.png', 'pelaku usaha', 'diterima'),
(44, 'Wahzuni Sri Rahayu', 'kikimaulida.99@gmail.com', 'wahzun', 'wahzun', 'default.png', 'pelaku usaha', 'menunggu konfirmasi'),
(47, 'sari', 'kikimaulida.99@gmail.com', 'sari', 'sari', 'default.png', 'user', 'menunggu konfirmasi'),
(48, 'reka', 'kikimaulida.99@gmail.com', 'reka', 'rela', 'default.png', 'pelaku usaha', 'menunggu konfirmasi'),
(49, 'coba', 'mfahrialagustian08@gmail.com', 'coba', 'coba', 'default.png', 'user', 'ditolak'),
(50, 'fahrial', 'mfahrialagustian08@gmail.com', 'fahrial', 'fahrial', 'default.png', 'user', 'ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna_token`
--

CREATE TABLE `tb_pengguna_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_usaha` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga` varchar(20) NOT NULL,
  `foto_produk` varchar(30) NOT NULL,
  `status_produk` varchar(10) NOT NULL,
  `tgl_unggah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_usaha`, `id_pengguna`, `nama_produk`, `deskripsi_produk`, `harga`, `foto_produk`, `status_produk`, `tgl_unggah`) VALUES
(33, 21, 41, 'Shinara Kemeja Oversize', 'Bahan : CW Mini pleats,\r\nLd 120cm fit to XL', 'Rp.125.000', 'produk-200726-82c0c5915d.jpg', 'Tersedia', '2020-07-26'),
(34, 21, 41, 'Maurin Oneset', 'Bahan : Rayon Viscose,\r\nLd 102cm fit to L,\r\nP.Celana +- 94cm', 'Rp.165.000', 'produk-200726-853babeb96.jpg', 'Tersedia', '2020-07-26'),
(35, 21, 41, 'Tulip Pants', 'Bahan : Scuba Tebal,\r\nAllsize fit to L (pinggang karet),\r\nP.Celana +- 90cm', 'Rp.120.000', 'produk-200726-4ac2b316a5.jpg', 'Tersedia', '2020-07-26'),
(36, 21, 41, 'Tina Maxy Dress', 'Bahan : Torry Burch,\r\nLd 104cm fit to L,\r\nP.baju 135cm', 'Rp.190.000', 'produk-200726-56aae652af.PNG', 'Tersedia', '2020-07-26'),
(37, 21, 41, 'Dark Snow BF jeans', 'Bahan : jeans,\r\nSize : 27 28 29 30,\r\nP.celana : 95cm', 'Rp.135.000', 'produk-200726-75ac06de3d.jpg', 'Kosong', '2020-07-26'),
(38, 22, 43, 'Cireng Bumbu Rujak', 'Isi 10 harga 7 RIBU', 'Rp.7000', 'produk-200726-4bba208bd0.png', 'Tersedia', '2020-07-26'),
(39, 22, 43, 'Empek-empek DOS', '10 RIBU KOMPLIT ( 1 kapal selam 2 lenjer), 5 RIBU ( 1 kapal selam) + kuah bisa PEDAS/MANIS', 'Rp.5000 - Rp.10.000', 'produk-200726-f994cd34d5.png', 'Tersedia', '2020-07-26'),
(40, 22, 43, 'Empek-empek Lenjer', '10 RIBU ( isi 4 lenjer)', 'Rp.10.000', 'produk-200726-40fec4efdc.png', 'Tersedia', '2020-07-26'),
(41, 23, 44, 'Tela-tela', 'Varian Rasa Tela-tela: Balado, Jagung Bakar dan Berbeque, harga Rp.5.000/kotak', 'Rp.5.000', 'produk-200726-e0b0ca7771.png', 'Tersedia', '2020-07-26'),
(42, 23, 44, 'Cireng Lilit', 'Cireng Lilit Rp.1000/tusuk', 'Rp.1000', 'produk-200726-05eea94f78.png', 'Tersedia', '2020-07-26'),
(43, 23, 44, 'Cireng Bandung Frozen', 'Cireng Bandung Frozen harga Rp.10.000/mika', 'Rp.10.000', 'produk-200726-1239cfd53c.png', 'Tersedia', '2020-07-26'),
(44, 23, 44, 'Telur Gulung', 'Telur Gulung harga Rp.1000/tusuk', 'Rp.1000', 'produk-200726-2db910a47e.png', 'Tersedia', '2020-07-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rating_produk`
--

CREATE TABLE `tb_rating_produk` (
  `id_rating` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `review` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rating_produk`
--

INSERT INTO `tb_rating_produk` (`id_rating`, `id_produk`, `id_pengguna`, `rating`, `review`, `tanggal`) VALUES
(1, 33, 42, '4', 'Bahannya Adem, nyaman dipakai', '2020-07-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id_saran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `saran` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usaha`
--

CREATE TABLE `tb_usaha` (
  `id_usaha` int(11) NOT NULL,
  `nama_usaha` varchar(30) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jam_operasional` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `foto_usaha` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL,
  `bergabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_usaha`
--

INSERT INTO `tb_usaha` (`id_usaha`, `nama_usaha`, `id_pengguna`, `id_kategori`, `deskripsi`, `alamat`, `id_kecamatan`, `jam_operasional`, `telepon`, `foto_usaha`, `status`, `bergabung`) VALUES
(21, 'itsy.wearing', 41, 11, 'Menyediakan pakaian ready stock dan real pict', 'Jl. Balirejo', 9, 'Setiap hari (10.00-17.00)', '082191912048', 'usaha-200726-a79bb3f57f.PNG', 'diterima', '2020-07-26'),
(22, 'by.olahanmila', 43, 10, 'Menerima CATHERING : Empek-empek Dos dan Cireng Bumbu Rujak', 'Jl.A.Yani Km 101, Desa Jorong RT 12 RW 06', 5, 'Jika Ada Pesanan', '087764500306', 'usaha-200726-8580d1f323.jpeg', 'diterima', '2020-07-26'),
(23, 'Cireng by Acil Jual', 44, 10, 'CIRENG READY SETIAP HARI. Pelaihari Kota Delivery Sampai Sore yaa, ORDER LANGSUNG WA 088246287353', 'Jl. Purnawirawan, Gg.Damai', 9, 'Setiap Hari', '088246287353', 'usaha-200726-4d973abba8.png', 'diterima', '2020-07-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id_banner`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tb_komentar_produk`
--
ALTER TABLE `tb_komentar_produk`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pengguna_token`
--
ALTER TABLE `tb_pengguna_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_usaha` (`id_usaha`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_rating_produk`
--
ALTER TABLE `tb_rating_produk`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `tb_usaha`
--
ALTER TABLE `tb_usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_komentar_produk`
--
ALTER TABLE `tb_komentar_produk`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_pengguna_token`
--
ALTER TABLE `tb_pengguna_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_rating_produk`
--
ALTER TABLE `tb_rating_produk`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usaha`
--
ALTER TABLE `tb_usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD CONSTRAINT `tb_banner_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_komentar_produk`
--
ALTER TABLE `tb_komentar_produk`
  ADD CONSTRAINT `tb_komentar_produk_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_komentar_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_usaha`) REFERENCES `tb_usaha` (`id_usaha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_produk_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rating_produk`
--
ALTER TABLE `tb_rating_produk`
  ADD CONSTRAINT `tb_rating_produk_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rating_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_usaha`
--
ALTER TABLE `tb_usaha`
  ADD CONSTRAINT `tb_usaha_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usaha_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usaha_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
