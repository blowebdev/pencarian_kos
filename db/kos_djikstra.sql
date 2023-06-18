-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.infinityfree.com
-- Waktu pembuatan: 18 Jun 2023 pada 05.35
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_34430667_kos`
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
(203, '2', '3', 4),
(204, '2', '4', 5),
(205, '2', '5', 6),
(206, '2', '8', 19),
(207, '3', '4', 1),
(213, '1', '2', 3),
(214, '1', '3', 3),
(215, '1', '4', 3),
(218, '2', '3', 4),
(219, '2', '4', 5),
(220, '2', '5', 6),
(221, '2', '8', 19),
(222, '3', '4', 1);

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
(2, 'E', 'KOS MURAH DEKAT KAMPUS DAN ENAK', 6, 400, '<p><strong>DESKRIPSI KOS</strong></p><p>Selamat datang di Kos <i>Diisi manual</i>, tempat tinggal yang sempurna untuk para pencari ketenangan dan kenyamanan. Terletak di jantung kota, Kos <i>Diisi manual</i> adalah oase modern yang dirancang dengan keindahan dan kualitas tinggi.&nbsp;<br>Setiap kamar kami dirancang dengan teliti untuk memberikan suasana yang menenangkan dan nyaman setelah hari yang panjang. Dengan perpaduan sempurna antara sentuhan kontemporer dan desain minimalis, setiap sudut kamar mengundang Anda untuk bersantai dan bersenang-senang.</p><p><strong>FASILITAS PARKIR</strong>&nbsp;<br>?? DIISI SENDIRI&nbsp;<br><strong>FASILITAS KAMAR</strong>&nbsp;<br>?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI&nbsp;<br><strong>FASILITAS KAMAR MANDI</strong>&nbsp;<br>?? DIISI SENDIRI &nbsp;?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI<br><strong>TIPE KAMAR</strong>&nbsp;<br>?? DIISI SENDIRI ?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI<br><strong>FASILITAS LAIN - LAIN</strong>&nbsp;<br>?? DIISI SENDIRI ?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI<br><strong>PERATURAN KOS</strong>&nbsp;<br>?? DIISI SENDIRI ?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI?? DIISI SENDIRI<br>&nbsp;</p>', 'STIKes Husada Jombang, Mancarmalang, Mancar, Jombang Regency, East Java, Indonesia', '-7.5318687', '112.2743693', '2023-06-15-kos-kosan-wisma-rosa-544356595.jpg', '2023-06-15-desain-kamar-kost-lemari-kecil.jpg', '2023-06-15-gambar 1.jpg'),
(10, 'B', 'kos suwarni', 7, 450, '<p><strong>DESKRIPSI KOS</strong></p><p>Selamat datang di Kos <i>Diisi manual</i>, tempat tinggal yang sempurna untuk para pencari ketenangan dan kenyamanan. Terletak di jantung kota, Kos <i>Diisi manual</i> adalah oase modern yang dirancang dengan keindahan dan kualitas tinggi.&nbsp;<br>Setiap kamar kami dirancang dengan teliti untuk memberikan suasana yang menenangkan dan nyaman setelah hari yang panjang. Dengan perpaduan sempurna antara sentuhan kontemporer dan desain minimalis, setiap sudut kamar mengundang Anda untuk bersantai dan bersenang-senang.</p><p><strong>FASILITAS PARKIR</strong>&nbsp;<br>âœ”ï¸ parkir depan kamar<br><strong>FASILITAS KAMAR</strong>&nbsp;<br>âœ”ï¸ <strong>KASUR&nbsp;</strong></p><p>âœ”ï¸<strong>TELEVISI</strong></p><p>âœ”ï¸KIPAS ANGIN<br><strong>FASILITAS KAMAR MANDI</strong>&nbsp;<br>âœ”ï¸ DALAM<br><strong>TIPE KAMAR</strong>&nbsp;<br>âœ”ï¸ DIISI SENDIRI&nbsp;<br><strong>FASILITAS LAIN - LAIN</strong>&nbsp;<br>âœ”ï¸ DIISI SENDIRI&nbsp;<br><strong>PERATURAN KOS</strong>&nbsp;<br>âœ”ï¸ DIISI SENDIRI&nbsp;<br>&nbsp;</p>', 'Jl. Pertahanan 2, Wonokerto Selatan, Peterongan, Jombang Regency, East Java, Indonesia', '-7.5432546', '112.2825616', '2023-06-15-WhatsApp Image 2023-06-15 at 20.20.13.jpeg', '2023-06-15-WhatsApp Image 2023-06-15 at 20.20.13.jpeg', '2023-06-15-WhatsApp Image 2023-06-15 at 20.20.13.jpeg'),
(11, 'c', 'kos bu Nur', 6, 500, '<p><strong>DESKRIPSI KOS</strong></p><p>Selamat datang di Kos <i>Diisi manual</i>, tempat tinggal yang sempurna untuk para pencari ketenangan dan kenyamanan. Terletak di jantung kota, Kos <i>Diisi manual</i> adalah oase modern yang dirancang dengan keindahan dan kualitas tinggi.&nbsp;<br>Setiap kamar kami dirancang dengan teliti untuk memberikan suasana yang menenangkan dan nyaman setelah hari yang panjang. Dengan perpaduan sempurna antara sentuhan kontemporer dan desain minimalis, setiap sudut kamar mengundang Anda untuk bersantai dan bersenang-senang.</p><p><strong>FASILITAS PARKIR</strong>&nbsp;<br>âœ”ï¸ ya<br><strong>FASILITAS KAMAR</strong>&nbsp;<br>âœ”ï¸lngkap<br><strong>FASILITAS KAMAR MANDI</strong>&nbsp;<br>âœ”ï¸&nbsp;kamar mandi dalam<br><strong>TIPE KAMAR</strong>&nbsp;<br>âœ”ï¸3x4<br><strong>FASILITAS LAIN - LAIN</strong>&nbsp;<br>âœ”ï¸wifi<br><strong>PERATURAN KOS</strong>&nbsp;<br>âœ”ï¸&nbsp;<br>&nbsp;</p>', 'Jl. Pertahanan 2 No.22, Wonokerto Selatan, Peterongan, Kec. Peterongan, KabupatÃ©n Jombang, Jawa Timur 61481, Indonesia', '-7.542057299999999', '112.2801989', '2023-06-15-Screenshot_8.png', '2023-06-15-Screenshot_8.png', '2023-06-15-Screenshot_8.png'),
(12, 'd', 'kos jajar', 8, 400, '<p><strong>DESKRIPSI KOS</strong></p><p>Selamat datang di Kos <i>Diisi manual</i>, tempat tinggal yang sempurna untuk para pencari ketenangan dan kenyamanan. Terletak di jantung kota, Kos <i>Diisi manual</i> adalah oase modern yang dirancang dengan keindahan dan kualitas tinggi.&nbsp;<br>Setiap kamar kami dirancang dengan teliti untuk memberikan suasana yang menenangkan dan nyaman setelah hari yang panjang. Dengan perpaduan sempurna antara sentuhan kontemporer dan desain minimalis, setiap sudut kamar mengundang Anda untuk bersantai dan bersenang-senang.</p><p><strong>FASILITAS PARKIR</strong>&nbsp;<br>âœ”ï¸ ya<br><strong>FASILITAS KAMAR</strong>&nbsp;<br>âœ”ï¸ kasur&nbsp;<br><strong>FASILITAS KAMAR MANDI</strong>&nbsp;<br>âœ”ï¸ kamar mandi dalam&nbsp;<br><strong>TIPE KAMAR</strong>&nbsp;<br>âœ”ï¸ luas 3x4<br><strong>FASILITAS LAIN - LAIN</strong>&nbsp;<br>âœ”ï¸ wfi free<br><strong>PERATURAN KOS</strong>&nbsp;<br>âœ”ï¸dilarang membawa cewe</p>', 'Jl. H. Abas Ibrahim No.36, Jajar, Kepuhkembeng, Kec. Peterongan, KabupatÃ©n Jombang, Jawa Timur 61481, Indonesia', '-7.535463000000001', '112.2590093', '2023-06-15-Screenshot_9.png', '2023-06-15-Screenshot_9.png', '2023-06-15-Screenshot_9.png'),
(13, 'F', 'kos ceria ', 9, 550, '<p><strong>DESKRIPSI KOS</strong></p><p>Selamat datang di Kos <i>Diisi manual</i>, tempat tinggal yang sempurna untuk para pencari ketenangan dan kenyamanan. Terletak di jantung kota, Kos <i>Diisi manual</i> adalah oase modern yang dirancang dengan keindahan dan kualitas tinggi.&nbsp;<br>Setiap kamar kami dirancang dengan teliti untuk memberikan suasana yang menenangkan dan nyaman setelah hari yang panjang. Dengan perpaduan sempurna antara sentuhan kontemporer dan desain minimalis, setiap sudut kamar mengundang Anda untuk bersantai dan bersenang-senang.</p><p><strong>FASILITAS PARKIR</strong>&nbsp;<br>âœ”ï¸ ya&nbsp;<br><strong>FASILITAS KAMAR</strong>&nbsp;<br>âœ”ï¸ kasur ,lemari, meja belajar&nbsp;<br><strong>FASILITAS KAMAR MANDI</strong>&nbsp;<br>âœ”ï¸ di dalam<br><strong>TIPE KAMAR</strong>&nbsp;<br>âœ”ï¸3x4<br><strong>FASILITAS LAIN - LAIN</strong>&nbsp;<br>âœ”ï¸wifi<br><strong>PERATURAN KOS</strong>&nbsp;<br>âœ”ï¸ dilarang keluar &nbsp;malam diatas jam 9<br>&nbsp;</p>', 'Kos Ceria, Jl. Patriot No.46, RT.03/RW.04, Kembeng, Kepuhkembeng, Kec. Peterongan, KabupatÃ©n Jombang, Jawa Timur 61419, Indonesia', '-7.5343748', '112.2579181', '2023-06-16-WhatsApp Image 2023-06-16 at 09.41.19.jpeg', '2023-06-16-WhatsApp Image 2023-06-16 at 09.41.19.jpeg', '2023-06-16-WhatsApp Image 2023-06-16 at 09.41.19.jpeg'),
(14, 'G', 'kos an latansa', 6, 450, '<p><strong>DESKRIPSI KOS</strong></p><p>Selamat datang di Kos <i>Diisi manual</i>, tempat tinggal yang sempurna untuk para pencari ketenangan dan kenyamanan. Terletak di jantung kota, Kos <i>Diisi manual</i> adalah oase modern yang dirancang dengan keindahan dan kualitas tinggi.&nbsp;<br>Setiap kamar kami dirancang dengan teliti untuk memberikan suasana yang menenangkan dan nyaman setelah hari yang panjang. Dengan perpaduan sempurna antara sentuhan kontemporer dan desain minimalis, setiap sudut kamar mengundang Anda untuk bersantai dan bersenang-senang.</p><p><strong>FASILITAS PARKIR</strong>&nbsp;<br><br><strong>FASILITAS KAMAR</strong>&nbsp;<br><br><strong>FASILITAS KAMAR MANDI</strong>&nbsp;<br><br><strong>TIPE KAMAR</strong>&nbsp;<br>3x4<br><strong>FASILITAS LAIN - LAIN</strong>&nbsp;<br>âœ”ï¸wifi<br><strong>PERATURAN KOS</strong>&nbsp;<br>âœ”ï¸ dilarang membawa hewan pliharaan<br>&nbsp;</p>', 'Conogo, Janti, Kec. Jogoroto, KabupatÃ©n Jombang, Jawa Timur, Indonesia', '-7.552456200000001', '112.2875802', '2023-06-16-WhatsApp Image 2023-06-16 at 13.34.14 (1).jpeg', '2023-06-16-WhatsApp Image 2023-06-16 at 13.34.14.jpeg', '2023-06-16-WhatsApp Image 2023-06-16 at 13.34.15.jpeg');

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
(6, 'Nama Mitra', '62859950069', 'email@gmail.com', 'Alamat', 'mitra', '202cb962ac59075b964b07152d234b70', ''),
(7, 'Silfi', '6287814551828', 'silfinaisza234@gma.com', 'Jombang', 'Silfi', '49a11801b007427d91340cccf2bdea13', ''),
(8, 'wahyudi', '6285231693454', 'wahyudi123@gmail.com', 'Jl. H. Abas Ibrahim 36, Jajar, Kepuhkembeng, Kec. Peterongan, Kabupaten Jombang, Jawa Timur 61481', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', ''),
(9, 'arwan', '6285736064834', 'muharwan098@gmail.com', 'Kos Ceria, Jl. Patriot No.46, RT.03/RW.04, Kembeng, Kepuhkembeng, Kec. Peterongan, Kabupaten Jombang, Jawa Timur 61419', 'arwan', '34b37843375dc2ca3d04c6b1349489f6', ''),
(10, 'CC', '122344', 'CC@yahoo.com', 'CC', 'CC', 'aa53ca0b650dfd85c4f59fa156f7a2cc', '');

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
(8, 'MM', '62789000', 'MM@yahoo.com', 'MM', 'MM', 'ad05f78187c942f9dd521605fa81f1ba', '', 0),
(9, 'Muhammad Syamsul Ali', '62847758857676', 'email1@gmail.com', 'Jombang', 'ali', '202cb962ac59075b964b07152d234b70', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_review`
--

CREATE TABLE `m_review` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(113) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `jarak` int(11) NOT NULL,
  `pesan_mudah` int(11) NOT NULL,
  `aplikasi` int(11) NOT NULL,
  `ui` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_review`
--

INSERT INTO `m_review` (`id`, `kode_transaksi`, `lokasi`, `jarak`, `pesan_mudah`, `aplikasi`, `ui`, `id_user`, `id_kos`, `catatan`) VALUES
(2, 'TRXAB5762C8', 4, 4, 4, 5, 4, 4, 2, 'Ok');

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
  `grand_total` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_transaksi`
--

INSERT INTO `m_transaksi` (`id`, `id_pelanggan`, `id_kos`, `kode_transaksi`, `tgl_pemesanan`, `tgl_kunjung`, `keterangan`, `harga`, `total_bulan`, `nama`, `hp`, `grand_total`, `status`) VALUES
(3, 8, 12, 'TRX3B7EB04D', '2023-06-16 00:00:00', '2023-06-18', '', 400, 2, 'MM', 62789000, 800, ''),
(4, 8, 15, 'TRX01E771DF', '2023-06-16 00:00:00', '2023-06-17', '', 400000, 2, 'MM', 62789000, 800000, ''),
(5, 9, 13, 'TRX432DA11E', '2023-06-17 00:00:00', '2023-06-17', '', 550, 10, 'Muhammad Syamsul Ali', 2147483647, 5500, 'SETUJU');

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
-- Indeks untuk tabel `m_review`
--
ALTER TABLE `m_review`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `m_mitra`
--
ALTER TABLE `m_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_review`
--
ALTER TABLE `m_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_transaksi`
--
ALTER TABLE `m_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
