-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2023 pada 08.20
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
(198, '1', '2', 3),
(199, '1', '3', 3),
(200, '1', '4', 3),
(201, '1', '5', 4),
(202, '1', '8', 16),
(203, '2', '3', 4),
(204, '2', '4', 5),
(205, '2', '5', 6),
(206, '2', '8', 19),
(207, '3', '4', 1),
(208, '3', '5', 6),
(209, '3', '8', 15),
(210, '4', '5', 5),
(211, '4', '8', 14),
(212, '5', '8', 15),
(213, '1', '2', 3),
(214, '1', '3', 3),
(215, '1', '4', 3),
(216, '1', '5', 4),
(217, '1', '8', 16),
(218, '2', '3', 4),
(219, '2', '4', 5),
(220, '2', '5', 6),
(221, '2', '8', 19),
(222, '3', '4', 1),
(223, '3', '5', 6),
(224, '3', '8', 15),
(225, '4', '5', 5),
(226, '4', '8', 14),
(227, '5', '8', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kos`
--

CREATE TABLE `m_kos` (
  `id` int(11) NOT NULL,
  `kode` varchar(24) NOT NULL,
  `nama` text NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `gambar` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_kos`
--

INSERT INTO `m_kos` (`id`, `kode`, `nama`, `id_mitra`, `harga`, `deskripsi`, `alamat`, `lat`, `lng`, `gambar`, `gambar2`, `gambar3`) VALUES
(2, 'B', 'KOS MURAH DEKAT KAMPUS DAN ENAK', 6, 40000, '<p><strong>DESKRIPSI KOS</strong></p><p>Selamat datang di Kos <i>Diisi manual</i>, tempat tinggal yang sempurna untuk para pencari ketenangan dan kenyamanan. Terletak di jantung kota, Kos <i>Diisi manual</i> adalah oase modern yang dirancang dengan keindahan dan kualitas tinggi.&nbsp;<br>Setiap kamar kami dirancang dengan teliti untuk memberikan suasana yang menenangkan dan nyaman setelah hari yang panjang. Dengan perpaduan sempurna antara sentuhan kontemporer dan desain minimalis, setiap sudut kamar mengundang Anda untuk bersantai dan bersenang-senang.</p><p><strong>FASILITAS PARKIR</strong>&nbsp;<br>✔️ DIISI SENDIRI&nbsp;<br><strong>FASILITAS KAMAR</strong>&nbsp;<br>✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI&nbsp;<br><strong>FASILITAS KAMAR MANDI</strong>&nbsp;<br>✔️ DIISI SENDIRI &nbsp;✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI<br><strong>TIPE KAMAR</strong>&nbsp;<br>✔️ DIISI SENDIRI ✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI<br><strong>FASILITAS LAIN - LAIN</strong>&nbsp;<br>✔️ DIISI SENDIRI ✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI<br><strong>PERATURAN KOS</strong>&nbsp;<br>✔️ DIISI SENDIRI ✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI✔️ DIISI SENDIRI<br>&nbsp;</p>', 'Peterongan, Kabupaten Jombang, Jawa Timur, Indonesia', '-7.2573898', '112.7482015', '2023-06-15-kos-kosan-wisma-rosa-544356595.jpg', '2023-06-15-desain-kamar-kost-lemari-kecil.jpg', '2023-06-15-gambar 1.jpg');

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
(6, 'Nama Mitra', '62859950069', 'email@gmail.com', 'Alamat', 'mitra', '202cb962ac59075b964b07152d234b70', '');

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
  `status` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pelanggan`
--

INSERT INTO `m_pelanggan` (`id`, `nama`, `hp`, `email`, `alamat`, `username`, `password`, `status`, `level`) VALUES
(4, 'Zeaid', '62847758857676', 'email1@gmail.com', 'Alamat Jombang', 'user1', '202cb962ac59075b964b07152d234b70', '', 0),
(5, 'Yaqin', '6287866163545', 'email@gmail.com', 'Jombang', 'user2', '202cb962ac59075b964b07152d234b70', '', 0),
(6, 'User', '62859950069', 'email@gmail.com', 'Alamat', 'mitra', '202cb962ac59075b964b07152d234b70', '', 0);

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
  `tgl_kunjung` date NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `total_bulan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `hp` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_transaksi`
--

INSERT INTO `m_transaksi` (`id`, `id_pelanggan`, `id_kos`, `kode_transaksi`, `tgl_pemesanan`, `tgl_kunjung`, `keterangan`, `harga`, `total_bulan`, `nama`, `hp`, `grand_total`) VALUES
(2, 4, 1, 'TRXED2F1A0C', '2023-06-05 00:00:00', '2023-06-05', '', 10000, 5, 'Zeaid', 2147483647, 50000);

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
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_graph`
--
ALTER TABLE `m_graph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT untuk tabel `m_kos`
--
ALTER TABLE `m_kos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_mitra`
--
ALTER TABLE `m_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `m_transaksi`
--
ALTER TABLE `m_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
