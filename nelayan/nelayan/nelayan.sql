-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2023 pada 17.52
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
-- Database: `nelayan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tangkap`
--

CREATE TABLE `hasil_tangkap` (
  `id` int(11) NOT NULL,
  `jenis_ikan` varchar(255) NOT NULL,
  `jumlah_ikan` int(11) NOT NULL,
  `berat_ikan` decimal(10,2) NOT NULL,
  `tanggal_tangkap` date NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_tangkap`
--

INSERT INTO `hasil_tangkap` (`id`, `jenis_ikan`, `jumlah_ikan`, `berat_ikan`, `tanggal_tangkap`, `id_users`) VALUES
(10, 'Lele', 50, 5.00, '2023-12-27', 1),
(11, 'Mujaer', 57, 4.00, '2023-12-27', 1),
(12, 'Ikan emas', 24, 4.00, '2023-12-28', 1),
(13, 'ikan teri', 120, 5.00, '2023-12-27', 2),
(14, 'Nila', 9, 9.00, '2023-12-27', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama_nelayan` varchar(255) NOT NULL,
  `nomor_kapal` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama_nelayan`, `nomor_kapal`, `password`) VALUES
(1, 'Jack Sparrow', '6969', '123jack'),
(2, 'siti', '80', 'siti');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_tangkap`
--
ALTER TABLE `hasil_tangkap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_tangkap`
--
ALTER TABLE `hasil_tangkap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
