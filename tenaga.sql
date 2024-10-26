-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2024 pada 16.32
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
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga`
--

CREATE TABLE `tenaga` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan','','') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `tgs_tambahan` varchar(255) DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu') NOT NULL,
  `thn_msk` year(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tenaga`
--

INSERT INTO `tenaga` (`id`, `nama`, `slug`, `nip`, `jk`, `foto`, `alamat`, `email`, `jabatan`, `mapel`, `tgs_tambahan`, `agama`, `thn_msk`, `created_at`, `updated_at`) VALUES
(1, 'sukma syafika', 'sukma', NULL, 'Perempuan', 'tenaga1.jpg', 'jayapura papua', 'suksya12@gmail.com', 'Guru Mapel', 'Jaringan Komputer', NULL, 'Islam', '2020', NULL, NULL),
(2, 'Fany Giya', 'fany', '121245637854122555', 'Perempuan', 'tenaga2.jpeg', 'Padang Bulan', 'Fanydebora@gmail.com', 'Kepala sekolah', 'Ipa & Bhs Inggris', 'Wali Kelas', 'Kristen', '1999', NULL, NULL),
(9, 'Annisa', 'annisa', '123456789785641239', 'Perempuan', 'WhatsApp Image 2024-10-23 at 09.24.17.jpeg', 'Non qui magni commod', 'qozyvu@gmail.com', 'wali kepala sekolah', 'multimedia', 'ugvu', 'Islam', '2017', '2024-10-18 05:19:08', '2024-10-25 05:44:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tenaga`
--
ALTER TABLE `tenaga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tenaga`
--
ALTER TABLE `tenaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
