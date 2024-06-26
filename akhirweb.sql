-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2024 pada 08.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhirweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar1`
--

CREATE TABLE `kamar1` (
  `id_kamar` int(6) UNSIGNED NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `ukuran_kasur` varchar(20) NOT NULL,
  `Kamar_mandi` enum('private','shared') NOT NULL,
  `ada_ac` tinyint(1) NOT NULL,
  `Gambar_tumbnail` varchar(255) NOT NULL,
  `meja_rias` tinyint(1) NOT NULL,
  `lemari_pakaian` tinyint(1) NOT NULL,
  `kulkas` tinyint(1) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kamar1`
--

INSERT INTO `kamar1` (`id_kamar`, `lokasi`, `detail`, `ukuran_kasur`, `Kamar_mandi`, `ada_ac`, `Gambar_tumbnail`, `meja_rias`, `lemari_pakaian`, `kulkas`, `harga`) VALUES
(1, 'Jl. Cendrawasih No.13', 'Kamar single dengan fasilitas premium, cocok untuk mahasiswa atau pekerja yang menginginkan privasi.', 'Single', 'private', 1, 'Kamar_Single_Eksklusif.jpg', 1, 1, 0, 250000.00),
(2, 'Jl. Bau Massepe No. 9', 'Kamar yang lebih luas, cocok untuk pasangan atau dua orang teman.', 'Single', 'shared', 0, 'kamar_eksklusif2.jpg', 0, 1, 1, 150000.00),
(3, 'Lokasi 3', 'Detail kamar 3', 'Single', 'shared', 1, 'gambar3.jpg', 1, 0, 0, 180000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kos`
--

CREATE TABLE `kos` (
  `id` int(11) NOT NULL,
  `pemilik_kos` varchar(255) NOT NULL,
  `nama_kos` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text NOT NULL,
  `fasilitas` text NOT NULL,
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kos`
--

INSERT INTO `kos` (`id`, `pemilik_kos`, `nama_kos`, `alamat`, `harga`, `deskripsi`, `fasilitas`, `tanggal_ditambahkan`) VALUES
(1, 'wana', 'arunika', 'jln', 100.00, 'ruangan yang luas', 'ac', '2024-06-11 07:30:36'),
(2, 'Sri', 'arunika', 'jln', 100.00, 'ruangan yang luas', 'ac', '2024-06-11 07:37:17'),
(3, 'Anisaaa', 'arunika', 'jln', 100.00, 'ruangan yang luas', 'Kipas', '2024-06-11 07:40:10'),
(4, 'Anisaaa', 'arunika', 'jln', 100.00, 'ruangan yang luas', 'Kipas', '2024-06-11 07:43:14'),
(5, 'Anisaaa', 'arunika', 'jln', 100.00, 'ruangan yang luas', 'Kipas', '2024-06-11 07:49:47'),
(6, 'Anisaaa', 'arunika', 'jln', 100.00, 'ruangan yang luas', 'Kipas', '2024-06-11 07:50:18'),
(7, 'shapira ', 'shapira12', 'jln.mangga', 2000000.00, 'aman dan nyaman', 'tv', '2024-06-19 08:54:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_sewa`
--

CREATE TABLE `pembayaran_sewa` (
  `id_pembayaran` int(6) UNSIGNED NOT NULL,
  `id_user` int(6) UNSIGNED NOT NULL,
  `id_kamar` int(6) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `metode_pembayaran` enum('transfer','tunai') NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_pembayaran` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran_sewa`
--

INSERT INTO `pembayaran_sewa` (`id_pembayaran`, `id_user`, `id_kamar`, `nama`, `email`, `nomor_hp`, `metode_pembayaran`, `tanggal_pembayaran`, `jumlah_pembayaran`) VALUES
(1, 1, 1, 'wana', 'wana@gmail.com', '083253189243', 'transfer', '2024-06-26', 250000.00),
(2, 1, 1, 'wana', 'wana@gmail.com', '087654345234', 'tunai', '2024-06-24', 250000.00),
(3, 1, 1, 'shapira', 'shapira@gmail.com', '082346785675', 'tunai', '2024-06-23', 250000.00),
(4, 1, 1, 'srirahayu', 'andisri@gmail.com', '082196986899', 'transfer', '2024-06-24', 250000.00),
(5, 4, 1, 'anisa', 'annisya@gmail.com', '08625654987298', 'transfer', '2024-06-17', 250000.00),
(6, 1, 2, 'Anisaaa', 'annisya@gmail.com', '08625654987298', 'tunai', '2024-06-28', 150000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kota_asal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`, `jenis_kelamin`, `tanggal_lahir`, `pekerjaan`, `kota_asal`) VALUES
(1, 'wana', '085490243190', 'wana@gmail.com', '99057c26ce74e2cdfa5e8dc25942c96f', 'perempuan', '2024-06-03', 'mahasiswa', 'parepare'),
(2, 'Sri', '084589290243', 'sri@gmail.com', 'd1565ebd8247bbb01472f80e24ad29b6', 'perempuan', '2024-06-24', 'Mahasiswa', 'parepare'),
(3, 'saphira', '083254678908', 'saphir@gmail.com', '8319b64f687f379bb33f16b78baccd96', 'perempuan', '2024-06-17', 'Mahasiswa', 'parepare'),
(4, 'anisa', '085397190234', 'anisa@gmail.com', '40cc8f68f52757aff1ad39a006bfbf11', 'perempuan', '2024-06-12', 'Beban', 'Seoul');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar1`
--
ALTER TABLE `kamar1`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_sewa`
--
ALTER TABLE `pembayaran_sewa`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar1`
--
ALTER TABLE `kamar1`
  MODIFY `id_kamar` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kos`
--
ALTER TABLE `kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_sewa`
--
ALTER TABLE `pembayaran_sewa`
  MODIFY `id_pembayaran` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
