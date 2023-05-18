-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mei 2023 pada 07.55
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `id` int(5) NOT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `nm_barang` varchar(25) NOT NULL,
  `id_satuan` int(2) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`id`, `kd_barang`, `nm_barang`, `id_satuan`, `id_kategori`, `harga_beli`, `harga_jual`) VALUES
(2, 'A001', 'Test1', 2, 1, 20000, 25000),
(5, 'A002', 'Test2', 1, 2, 40000, 50000),
(6, 'A003', 'Test3', 2, 1, 30000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id` int(2) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kategori`
--

INSERT INTO `m_kategori` (`id`, `kategori`) VALUES
(1, 'Komputer'),
(2, 'Pakaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_satuan`
--

CREATE TABLE `m_satuan` (
  `id` int(2) NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_satuan`
--

INSERT INTO `m_satuan` (`id`, `satuan`) VALUES
(1, 'PCS'),
(2, 'Box');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_penjualan`
--

CREATE TABLE `tr_penjualan` (
  `id` int(5) NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `tgl_faktur` date NOT NULL,
  `nm_konsumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_penjualan`
--

INSERT INTO `tr_penjualan` (`id`, `no_faktur`, `tgl_faktur`, `nm_konsumen`) VALUES
(2, '4444', '2023-05-18', 'Konsumen 1'),
(3, '9787897987', '2023-05-19', 'Konsumen 2'),
(5, '2333344455555', '2023-05-18', 'Konsumen 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_penjualan_detail`
--

CREATE TABLE `tr_penjualan_detail` (
  `id` int(5) NOT NULL,
  `id_penjualan` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `session_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_penjualan_detail`
--

INSERT INTO `tr_penjualan_detail` (`id`, `id_penjualan`, `id_barang`, `jumlah`, `harga_satuan`, `total_harga`, `session_id`) VALUES
(9, 2, 2, 3, 20000, 60000, ''),
(10, 2, 5, 2, 15000, 30000, ''),
(11, 3, 5, 2, 300000, 600000, ''),
(14, 5, 2, 1, 20000, 20000, ''),
(15, 5, 6, 4, 15000, 60000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_satuan`
--
ALTER TABLE `m_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_penjualan`
--
ALTER TABLE `tr_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_penjualan_detail`
--
ALTER TABLE `tr_penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_satuan`
--
ALTER TABLE `m_satuan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tr_penjualan`
--
ALTER TABLE `tr_penjualan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tr_penjualan_detail`
--
ALTER TABLE `tr_penjualan_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
