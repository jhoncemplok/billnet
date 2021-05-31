-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2017 at 07:37 PM
-- Server version: 5.5.56-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surdayso_billingv3new`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_paket`
--

CREATE TABLE `t_paket` (
  `id_paket` int(3) NOT NULL,
  `kode_paket` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id` int(11) NOT NULL,
  `no_pelanggan` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `corporate` varchar(60) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_paket` varchar(3) NOT NULL,
  `aktif` int(2) NOT NULL,
  `password` varchar(50) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_setting`
--

CREATE TABLE `t_setting` (
  `id` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_setting`
--

INSERT INTO `t_setting` (`id`, `nama`, `alamat`, `pemilik`, `logo`) VALUES
(1, 'Anu Anu', 'Jl. Lika-liku cinta, No.69 Desa Cinta Janda', 'Iwan Setiawan', 'logoulizznet.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_tagihan`
--

CREATE TABLE `t_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `bulan_tagihan` varchar(7) NOT NULL,
  `tagihan` int(10) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL,
  `bulan_tagihan` varchar(255) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_validasi` date NOT NULL,
  `status` enum('pending','lunas') NOT NULL,
  `sisa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','operator') NOT NULL,
  `aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `nama`, `level`, `aktif`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin', '1'),
(2, 'operator', '4b583376b2767b923c3e1da60d10de59', 'Operator', 'operator', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_paket`
--
ALTER TABLE `t_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_setting`
--
ALTER TABLE `t_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_tagihan`
--
ALTER TABLE `t_tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_paket`
--
ALTER TABLE `t_paket`
  MODIFY `id_paket` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_setting`
--
ALTER TABLE `t_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_tagihan`
--
ALTER TABLE `t_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
