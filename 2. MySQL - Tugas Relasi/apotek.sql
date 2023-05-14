-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 07:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_supplier`
--

CREATE TABLE `detail_supplier` (
  `id` int(11) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `instagram` varchar(64) DEFAULT NULL,
  `youtube` varchar(64) DEFAULT NULL,
  `kode_pos` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis_obat` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_obat`) VALUES
(1, 'Sirup'),
(2, 'Tablet'),
(3, 'Oles'),
(4, 'Kapsul');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` varchar(64) DEFAULT NULL,
  `harga_beli` varchar(64) DEFAULT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `id_jenis`, `stok`, `harga_jual`, `harga_beli`, `id_supplier`) VALUES
(1, 'Achiclovir', 2, 51, '12.000', '10.000', 1),
(2, 'Achiclovir', 3, 28, '12.000', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `com_supplier` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(32) NOT NULL,
  `no.telp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `com_supplier`, `alamat`, `kota`, `no.telp`) VALUES
(1, 'Toko Obat1', 'jl.Jalan kemana. aja', 'Ambon', 1234567892),
(2, 'Toko Obat2', 'Jl. Mengitari, Danau', 'Manado', 1234567891);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` varchar(255) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_supplier`
--
ALTER TABLE `detail_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_det_supplier` (`id_supplier`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `fk_detail_transaksi` (`id_obat`),
  ADD KEY `fk_transaksi` (`id_transaksi`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplier` (`id_supplier`),
  ADD KEY `fk_jenis` (`id_jenis`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_supplier`
--
ALTER TABLE `detail_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_supplier`
--
ALTER TABLE `detail_supplier`
  ADD CONSTRAINT `fk_det_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `fk_detail_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_transaksi` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
