-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2023 pada 15.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` char(225) NOT NULL,
  `pembuat_obat` varchar(64) NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `tanggal_kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `pembuat_obat`, `stok_obat`, `tanggal_kadaluwarsa`) VALUES
(1, 'Obat Telinga', 'Prodia', 60, '2023-11-02'),
(2, 'Obat Darah Tinggi', 'Prodia', 34, '2023-10-14'),
(3, 'Obat Diare', 'kimia farma', 50, '2023-07-20'),
(4, 'Obat Batuk', 'Kimia Farma', 150, '2023-10-01'),
(5, 'Obat Pusing', 'Kalbe Farma', 200, '2023-11-03'),
(6, 'Obat Tetes Mata', 'Indofarma', 400, '2024-01-01'),
(7, 'Obat Luka', 'Prodia', 225, '2024-06-14'),
(8, 'Obat Maag', 'Hermina', 132, '2023-09-01'),
(9, 'Alkohol', 'Kimia Farma', 560, '2023-11-10'),
(10, 'Obat Darah Rendah', 'Kimia Farma', 172, '2024-01-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`) VALUES
(1, 'Citra Martia', '1995-09-02'),
(2, 'Ai kus', '1995-05-10'),
(3, 'Putri W', '1995-03-04'),
(4, 'Alya ', '2004-05-15'),
(5, 'Ayum T', '1997-08-09'),
(6, 'Dendy P', '2005-05-14'),
(7, 'Umar W', '2003-10-18'),
(8, 'Indra G', '2003-10-04'),
(9, 'Wulan P', '2008-10-03'),
(10, 'Ahmad F', '1998-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_obat`, `id_pasien`, `jumlah_transaksi`) VALUES
(1, 1, 10, 2),
(2, 10, 1, 5),
(3, 6, 2, 3),
(4, 6, 10, 20),
(5, 3, 6, 1),
(6, 7, 9, 50),
(7, 5, 3, 40),
(8, 9, 2, 200),
(9, 2, 10, 6),
(10, 1, 10, 8);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `pasien_fk` (`id_pasien`),
  ADD KEY `obat_fk` (`id_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `obat_fk` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `pasien_fk` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
