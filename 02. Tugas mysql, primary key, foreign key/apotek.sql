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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel apotek.nota: ~0 rows (lebih kurang)
DELETE FROM `nota`;

-- membuang struktur untuk table apotek.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) DEFAULT NULL,
  `produsen` varchar(50) DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga` int(12) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel apotek.obat: ~0 rows (lebih kurang)
DELETE FROM `obat`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel apotek.transaksi: ~0 rows (lebih kurang)
DELETE FROM `transaksi`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
