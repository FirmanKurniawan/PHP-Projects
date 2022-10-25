-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 02:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` int(4) NOT NULL,
  `kd_barang_keluar` varchar(16) DEFAULT NULL,
  `nama_barang_keluar` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `jumlah_keluar` int(4) DEFAULT NULL,
  `tanggal_keluar` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_barang_keluar`, `kd_barang_keluar`, `nama_barang_keluar`, `jenis`, `jumlah_keluar`, `tanggal_keluar`) VALUES
(15, 'A1', 'Baju', 'Pakaian', 5, '2022-07-01 09:46:47'),
(16, 'A2', 'Monitor', 'Elektronik', 6, '2022-07-01 09:46:54'),
(19, 'A3', 'Baju Kemeja', 'Pakaian', 10, '2022-07-01 10:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_barang_masuk` int(4) NOT NULL,
  `kd_barang_masuk` varchar(16) DEFAULT NULL,
  `nama_barang_masuk` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `asal_barang` varchar(35) DEFAULT NULL,
  `jumlah_masuk` int(4) DEFAULT NULL,
  `tanggal_masuk` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_barang_masuk`, `kd_barang_masuk`, `nama_barang_masuk`, `jenis`, `asal_barang`, `jumlah_masuk`, `tanggal_masuk`) VALUES
(9, 'A1', 'Baju', 'Aksesoris', 'PT. Tiga', 10, '2022-07-01 10:34:41'),
(10, 'A2', 'Monitor', 'Elektronik', 'PT. Usaha', 12, '2022-07-01 10:35:16'),
(12, 'A3', 'Baju Kemeja', 'Pakaian', 'PT. Hira', 60, '2022-07-01 10:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '$2y$10$4BzLvhq1bDFbnihbJCfxZOudbkFL3vyfDXyc0Xsn7fDUkM/PzIlqa'),
-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_barang`
--

CREATE TABLE `tb_stok_barang` (
  `id_stok` int(4) NOT NULL,
  `kd_barang` varchar(16) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `stok_barang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok_barang`
--

INSERT INTO `tb_stok_barang` (`id_stok`, `kd_barang`, `nama`, `jenis`, `stok_barang`) VALUES
(25, 'A1', 'Baju', 'Pakaian', '10'),
(26, 'A2', 'Monitor', 'Elektronik', '12'),
(29, 'A3', 'Baju Kemeja', 'Pakaian', '60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_stok_barang`
--
ALTER TABLE `tb_stok_barang`
  ADD PRIMARY KEY (`id_stok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_barang_keluar` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_barang_masuk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_stok_barang`
--
ALTER TABLE `tb_stok_barang`
  MODIFY `id_stok` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
