-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.9.2-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk apotek
CREATE DATABASE IF NOT EXISTS `apotek` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `apotek`;

-- membuang struktur untuk table apotek.detail_obat
CREATE TABLE IF NOT EXISTS `detail_obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `obat_id` int(11) DEFAULT NULL,
  `kandungan` text DEFAULT NULL,
  `efek_samping` text DEFAULT NULL,
  `jenis_obat` enum('tablet','sirup','kain','salep') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_obat_id` (`obat_id`),
  CONSTRAINT `fk_obat_id` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel apotek.detail_obat: ~10 rows (lebih kurang)
DELETE FROM `detail_obat`;
INSERT INTO `detail_obat` (`id`, `obat_id`, `kandungan`, `efek_samping`, `jenis_obat`) VALUES
	(1, 1, 'kimia', 'tidak ada', 'sirup'),
	(2, 2, 'kimia', 'tidak ada', 'tablet'),
	(3, 3, 'kimia', 'tidak ada', 'tablet'),
	(4, 4, 'kimia', 'tidak ada', 'tablet'),
	(5, 5, 'kimia', 'tidak ada', 'tablet'),
	(6, 6, 'kimia', 'tidak ada', 'tablet'),
	(7, 7, 'kimia', 'tidak ada', 'tablet'),
	(8, 8, 'kimia', 'tidak ada', 'tablet'),
	(9, 9, 'kimia', 'tidak ada', 'tablet'),
	(10, 10, 'kimia', 'tidak ada', 'tablet');

-- membuang struktur untuk table apotek.nota
CREATE TABLE IF NOT EXISTS `nota` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `total_harga` int(12) DEFAULT 0,
  `total_bayar` int(12) DEFAULT 0,
  `total_kembalian` int(12) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_nota` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_nota` (`kode_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel apotek.nota: ~10 rows (lebih kurang)
DELETE FROM `nota`;
INSERT INTO `nota` (`id`, `total_harga`, `total_bayar`, `total_kembalian`, `created_at`, `updated_at`, `kode_nota`) VALUES
	(1, 100000, 100000, 0, '2023-06-24 09:39:01', '2023-06-24 09:39:02', 'asd123'),
	(2, 20000, 50000, 30000, '2023-06-24 09:43:38', '2023-06-24 09:43:40', 'asd234'),
	(3, 20000, 50000, 30000, '2023-06-24 09:43:41', '2023-06-24 09:43:42', 'asd235'),
	(4, 20000, 50000, 30000, '2023-06-24 09:43:43', '2023-06-24 09:43:43', 'asd236'),
	(5, 20000, 50000, 30000, '2023-06-24 09:43:45', '2023-06-24 09:43:46', 'asd237'),
	(6, 20000, 50000, 30000, '2023-06-25 10:37:04', '2023-06-25 10:37:05', 'asd238'),
	(7, 20000, 50000, 30000, '2023-06-25 10:37:06', '2023-06-25 10:37:07', 'asd239'),
	(8, 20000, 50000, 30000, '2023-06-25 10:37:08', '2023-06-25 10:37:09', 'asd240'),
	(9, 20000, 50000, 30000, '2023-06-25 10:37:10', '2023-06-25 10:37:12', 'asd241'),
	(10, 20000, 50000, 30000, '2023-06-25 10:37:13', '2023-06-25 10:37:14', 'asd242');

-- membuang struktur untuk table apotek.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) DEFAULT NULL,
  `produsen` varchar(50) DEFAULT NULL,
  `stok_obat` int(11) DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga` int(12) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel apotek.obat: ~10 rows (lebih kurang)
DELETE FROM `obat`;
INSERT INTO `obat` (`id`, `nama_obat`, `produsen`, `stok_obat`, `expired`, `created_at`, `updated_at`, `harga`) VALUES
	(1, 'Obat Telinga', 'Prodia', 20, '2023-11-02 00:00:00', '2023-06-21 15:27:21', '2023-06-21 15:27:19', 20000),
	(2, 'Obat Radang', 'Prodia', 34, '2023-10-14 00:00:00', '2023-06-21 15:27:23', '2023-06-21 15:27:24', 20000),
	(3, 'Obat Diare', 'kimia farma', 50, '2023-07-20 00:00:00', '2023-06-21 15:27:26', '2023-06-21 15:27:27', 20000),
	(4, 'Obat Batuk', 'Kimia Farma', 150, '2023-10-01 00:00:00', '2023-06-21 15:27:28', '2023-06-21 15:27:30', 20000),
	(5, 'Obat Pusing', 'Kalbe Farma', 200, '2023-11-03 00:00:00', '2023-06-21 15:27:31', '2023-06-21 15:27:32', 20000),
	(6, 'Obat Telinga', 'Prodia', 20, '2023-11-02 00:00:00', '2023-06-23 11:10:51', '2023-06-23 11:10:52', 20000),
	(7, 'Obat Radang', 'Prodia', 34, '2023-10-14 00:00:00', '2023-06-23 11:10:53', '2023-06-23 11:10:54', 20000),
	(8, 'Obat Diare', 'kimia farma', 50, '2023-07-20 00:00:00', '2023-06-23 11:10:55', '2023-06-23 11:10:56', 20000),
	(9, 'Obat Batuk', 'Kimia Farma', 150, '2023-10-01 00:00:00', '2023-06-23 11:10:57', '2023-06-23 11:10:58', 20000),
	(10, 'Obat Pusing', 'Kalbe Farma', 200, '2023-11-03 00:00:00', '2023-06-23 11:10:59', '2023-06-23 11:10:59', 20000);

-- membuang struktur untuk table apotek.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_obat` int(12) DEFAULT NULL,
  `jumlah` int(12) DEFAULT NULL,
  `kode_nota` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_obat` (`id_obat`),
  KEY `fk_nota` (`kode_nota`),
  CONSTRAINT `fk_nota` FOREIGN KEY (`kode_nota`) REFERENCES `nota` (`kode_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel apotek.transaksi: ~11 rows (lebih kurang)
DELETE FROM `transaksi`;
INSERT INTO `transaksi` (`id`, `id_obat`, `jumlah`, `kode_nota`, `created_at`, `updated_at`) VALUES
	(1, 7, 2, 'asd123', '2023-06-25 10:31:18', '2023-06-25 10:31:20'),
	(2, 10, 4, 'asd234', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(3, 9, 1, 'asd234', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(4, 6, 1, 'asd235', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(5, 6, 1, 'asd236', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(6, 1, 1, 'asd237', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(7, 8, 1, 'asd238', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(8, 5, 1, 'asd239', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(9, 3, 1, 'asd240', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(10, 2, 1, 'asd241', '2023-06-25 10:38:06', '2023-06-25 10:38:06'),
	(11, 2, 1, 'asd242', '2023-06-25 10:38:06', '2023-06-25 10:38:06');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
