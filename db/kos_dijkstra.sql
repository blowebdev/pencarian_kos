-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2023 pada 10.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos_dijkstra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_graph`
--

CREATE TABLE `m_graph` (
  `id` int(11) NOT NULL,
  `node_1` text NOT NULL,
  `node_2` text NOT NULL,
  `jarak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_graph`
--

INSERT INTO `m_graph` (`id`, `node_1`, `node_2`, `jarak`) VALUES
(163, '1', '2', 2.63),
(164, '1', '3', 2.4),
(172, '3', '4', 0.66),
(174, '7', '8', 16.46),
(178, '2', '7', 2.8),
(180, '4', '5', 4.91),
(182, '1', '9', 4.01);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kos`
--

CREATE TABLE `m_kos` (
  `id` int(11) NOT NULL,
  `kode` varchar(24) NOT NULL,
  `nama` text NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_kos`
--

INSERT INTO `m_kos` (`id`, `kode`, `nama`, `id_mitra`, `deskripsi`, `alamat`, `lat`, `lng`, `gambar`) VALUES
(1, 'A', 'Hotel Dewi', 5, 'Kos enak dan nyaman', 'Hotel Dewi, Jalan Cempaka, Babatan, Kepuhkembeng, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.5342103', '112.2508957', '2023-05-29-banner_depan3.png'),
(2, 'B', 'Mbok Semah', 4, 'Warung makan mbok semah', 'Nasi Lodeh Mbok Semah, RT.05/RW.02, Desa Dukuhklopo, Dukuh Klopo, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.5108226', '112.2546161', '2023-05-29-banner_depan2.png'),
(3, 'C', 'Pasar Peterongan', 3, 'Kos enak dan murah', 'Pasar Peterongan Jombang, Mancar Timur, Mancar, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.5384113', '112.2768476', '2023-05-29-banner_depan2.png'),
(4, 'D', 'Ponpes DU', 4, 'Kos enak dan murah', 'Pondok Pesantren Darul Ulum Jombang, Wonokerto Selatan, Peterongan, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.544236799999999', '112.2758029', '2023-05-29-banner_depan2.png'),
(5, 'E', 'Stasiun Kereta api jombang', 4, 'Dekripsi', 'Stasiun Jombang, Jalan Basuki Rahmad, Kaliwungu, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.557961799999999', '112.2334793', '2023-05-29-banner_depan2.png'),
(7, 'F', 'Kos murah rejoso', 3, 'Deskripsi kos', 'RUN FUTSAL, Jalan Kemuning, Sambong Dukuh, Candi Mulyo, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.5312384', '112.2398082', '2023-05-29-banner_depan.png'),
(8, 'G', 'Kos min 1 jombang', 3, 'sa', 'Bareng, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.666667', '112.3', '2023-05-29-banner_depan2.png'),
(9, 'J', 'KOS MURAH DEKAT KAMPUS', 5, 'Deskirpsi\r\nkamar mandi \r\nfree wifi', 'Dekat bravo', '-7.543100394857285', '112.21562951025389', '2023-06-03-tenda.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_mitra`
--

CREATE TABLE `m_mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `hp` text NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_mitra`
--

INSERT INTO `m_mitra` (`id`, `nama`, `hp`, `email`, `alamat`, `username`, `password`, `status`) VALUES
(2, 'Ahmad', '6285748496135', 'hudamiftakh8@gmail.com', 'Jombang jawa timur', 'huda', '202cb962ac59075b964b07152d234b70', ''),
(3, 'Umam', '6285712551156', 'ulin@gmail.com', 'Alamat 2', 'ulin', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(4, 'Zeaid', '62847758857676', 'email1@gmail.com', 'Alamat Jombang', 'user1', '202cb962ac59075b964b07152d234b70', ''),
(5, 'Yaqin', '6287866163545', 'email@gmail.com', 'Jombang', 'user2', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pelanggan`
--

CREATE TABLE `m_pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `hp` text NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pelanggan`
--

INSERT INTO `m_pelanggan` (`id`, `nama`, `hp`, `email`, `alamat`, `username`, `password`, `status`) VALUES
(2, 'Ahmad', '6285748496135', 'hudamiftakh8@gmail.com', 'Jombang jawa timur', 'huda', '202cb962ac59075b964b07152d234b70', ''),
(3, 'Umam', '6285712551156', 'ulin@gmail.com', 'Alamat 2', 'ulin', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(4, 'Zeaid', '62847758857676', 'email1@gmail.com', 'Alamat Jombang', 'user1', '202cb962ac59075b964b07152d234b70', ''),
(5, 'Yaqin', '6287866163545', 'email@gmail.com', 'Jombang', 'user2', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_transaksi`
--

CREATE TABLE `m_transaksi` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `kode_transaksi` text NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`user_id`, `nama`, `username`, `password`, `level`) VALUES
(4, 'Admin Kos', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_graph`
--
ALTER TABLE `m_graph`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_kos`
--
ALTER TABLE `m_kos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_mitra`
--
ALTER TABLE `m_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_transaksi`
--
ALTER TABLE `m_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_graph`
--
ALTER TABLE `m_graph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT untuk tabel `m_kos`
--
ALTER TABLE `m_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_mitra`
--
ALTER TABLE `m_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_transaksi`
--
ALTER TABLE `m_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
