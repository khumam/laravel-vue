-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 10:02 AM
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

--
-- Dumping data for table `detail_supplier`
--

INSERT INTO `detail_supplier` (`id`, `website`, `email`, `instagram`, `youtube`, `kode_pos`, `id_supplier`) VALUES
(1, 'www.tokoobat1.com', 'to1@gmail.com', '@to1', 'tokoobat1', 11111, 1),
(2, 'www.tokoobat2.com', 'to2@gmail.com', '@to2', 'tokoobat2', 22222, 2),
(3, 'www.tokoobat3.com', 'to3@gmail.com', '@to3', 'tokoobat3', 33333, 3),
(4, 'www.tokoobat4.com', 'to4@gmail.com', '@to4', 'tokoobat4', 44444, 4),
(5, 'www.tokoobat5.com', 'to5@gmail.com', '@to5', 'tokoobat5', 55555, 5),
(6, 'www.tokoobat6.com', 'to6@gmail.com', '@to6', 'tokoobat6', 66666, 6),
(7, 'www.tokoobat7.com', 'to7@gmail.com', '@to7', 'tokoobat7', 77777, 7),
(8, 'www.tokoobat8.com', 'to8@gmail.com', '@to8', 'tokoobat8', 88888, 8),
(9, 'www.tokoobat9.com', 'to9@gmail.com', '@to9', 'tokoobat9', 99999, 9),
(10, 'www.tokoobat10.com', 'to10@gmail.com', '@to10', 'tokoobat10', 10101, 10);

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
(4, 'Kapsul'),
(5, 'Supositoria'),
(6, 'Tetes'),
(7, 'Inhaler'),
(8, 'Suntik'),
(9, 'Implan'),
(10, 'Sublingual');

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
  `id_supplier` int(11) NOT NULL,
  `tahun_exp` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `id_jenis`, `stok`, `harga_jual`, `harga_beli`, `id_supplier`, `tahun_exp`) VALUES
(1, 'Achiclovir', 2, 51, '12000', '10000', 1, 2024),
(2, 'Achiclovir', 3, 28, '12000', '10000', 1, 2023),
(3, 'Paracetamol', 2, 30, '14000', '12000', 2, 2025),
(4, 'Amoxcilin', 2, 22, '15000', '10000', 2, 2023),
(5, 'Mefenamic Acid', 2, 32, '12000', '10000', 2, 2026),
(6, 'Paracetamol', 1, 15, '18000', '22000', 2, 2024),
(7, 'Vitamin B12', 4, 31, '25000', '20000', 1, 2025),
(8, 'Calpanac', 3, 22, '18000', '16000', 1, 2025),
(9, 'OBH', 1, 41, '22000', '20000', 2, 2023),
(10, 'Antasida', 2, 27, '14000', '12000', 1, 2024),
(11, 'Ibuprofen', 2, 19, '21000', '19000', 1, 2026),
(12, 'Paratusin', 2, 32, '30000', '28000', 2, 2025);

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
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `com_supplier`, `alamat`, `kota`, `no_telp`) VALUES
(1, 'Toko Obat1', 'Jl.Jalan kemana-aja', 'Ambon', '012345678921'),
(2, 'Toko Obat2', 'Jl. Mengitari, Danau', 'Manado', '012345678912'),
(3, 'Toko Obat3', 'jl. in-aja dulu', 'Sabang', '081234567891'),
(4, 'Toko Obat4', 'Jl. ni-Semua dengan Senyuman', 'Medan', '081345678912'),
(5, 'Toko Obat5', 'Jl. yang penuh tantangan', 'Jakarta', '081456789123'),
(6, 'Toko Obat6', 'Jl. ku, bukan kamu', 'Bandung', '081567891234'),
(7, 'Toko Obat7', 'Jl. Hidupmu Tak semudah itu', 'Jakarta', '081678912345'),
(8, 'Toko Obat8', 'Jl. kita, Berbeda', 'Manado', '081789123456'),
(9, 'Toko Obat9', 'Jl. kita, saat itu', 'Jakarta', '081891234567'),
(10, 'Toko Obat10', 'Jl. Lurus, tanpa belok', 'Jakarta', '081912345678');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
