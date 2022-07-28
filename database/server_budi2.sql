-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2022 pada 12.08
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server_budi2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

DROP TABLE IF EXISTS `tb_jurusan`;
CREATE TABLE `tb_jurusan` (
  `id_jurusan` tinyint(4) UNSIGNED NOT NULL,
  `jurusan` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(3, 'UMUM'),
(4, 'IPA'),
(5, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas` (
  `id_kelas` smallint(6) UNSIGNED NOT NULL,
  `kelas` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, '7 A'),
(2, '7 B'),
(3, '7 C'),
(4, '8 A'),
(5, '8 B'),
(6, '8 C'),
(7, '9 A'),
(8, '9 B'),
(9, '9 C'),
(10, '10 A'),
(11, '10 B'),
(12, '10 C'),
(13, '11 A'),
(14, '11 B'),
(15, '11 C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode`
--

DROP TABLE IF EXISTS `tb_periode`;
CREATE TABLE `tb_periode` (
  `id_periode` smallint(6) UNSIGNED NOT NULL,
  `tahun_akademik` char(9) NOT NULL,
  `semester` enum('GANJIL','GENAP') NOT NULL,
  `status_periode` enum('AKTIF','TIDAK AKTIF') NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `tahun_akademik`, `semester`, `status_periode`, `periode_awal`, `periode_akhir`) VALUES
(1, '2020/2021', 'GANJIL', 'AKTIF', '2020-12-08', '2021-02-19'),
(2, '2021/2022', 'GANJIL', 'TIDAK AKTIF', '2021-01-01', '2022-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjaman`
--

DROP TABLE IF EXISTS `tb_pinjaman`;
CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `kode` varchar(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `keterangan` enum('pinjaman siswa','pinjaman guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjaman`, `kode`, `id_user`, `waktu`, `jumlah_pinjam`, `jumlah_bayar`, `keterangan`) VALUES
(7, '1', 16, '2022-07-25 07:47:40', 3000000, 0, 'pinjaman guru'),
(8, '2', 16, '2022-07-25 07:47:54', 0, 100000, 'pinjaman guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tabungan`
--

DROP TABLE IF EXISTS `tb_tabungan`;
CREATE TABLE `tb_tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `kode` varchar(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `jumlah_nabung` int(11) NOT NULL,
  `jumlah_ambil` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status_nabung` enum('-','belum diambil','diambil') NOT NULL,
  `keterangan` enum('tabungan siswa','tabungan guru') NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id_tabungan`, `kode`, `id_user`, `id_periode`, `jumlah_nabung`, `jumlah_ambil`, `waktu`, `status_nabung`, `keterangan`, `modified_by`, `modified_dt`) VALUES
(9, '1', 16, 1, 200000, 0, '2022-07-21 11:54:25', 'belum diambil', 'tabungan guru', 0, '2022-07-26 09:54:25'),
(11, '1', 18, 2, 200000, 0, '2022-07-27 00:00:00', 'belum diambil', 'tabungan guru', 0, '2022-07-25 06:50:20'),
(15, '2', 16, 2, 0, 50000, '2022-07-23 04:55:58', '-', 'tabungan guru', 0, '2022-07-25 06:50:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(65) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `telepon` char(17) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `foto` varchar(65) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','siswa','guru') NOT NULL,
  `status_akun` int(1) NOT NULL,
  `mendaftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `alamat`, `jk`, `telepon`, `id_jurusan`, `id_kelas`, `norek`, `foto`, `username`, `password`, `level`, `status_akun`, `mendaftar`) VALUES
(1, '', '', 'laki-laki', '', 0, 0, '', '', 'admin', '$2y$10$dCYyc0qvWqaHEtUei2dKF.TEFcPbXvIiSlfLru9vYobH89gjvp6qO', 'admin', 1, '2021-12-27 13:25:27'),
(16, 'budix', 'skfjksdx', 'laki-laki', '5934000', 0, 0, '334353', 'dashguru.JPG', 'budi', '$2y$10$6j.WMPWTiq3qbwAk0lnIGeLVKGDI7SLL1ogKDibIq3o16IdX6BZkG', 'guru', 1, '2022-07-23 01:31:58'),
(18, 'ijah', 'sfjdk', 'perempuan', '8348', 0, 0, '432423', 'dashguru1.JPG', 'ijah', '$2y$10$nQrK222Cvfkd6XOXA9.I5.hXfG339s7BZ4XM.MUuSBp7dNpD9NCuS', 'guru', 1, '2022-07-21 05:38:55'),
(19, 'aaaa', 'abbbbb', 'laki-laki', '1231231231232', 3, 3, '123123123', 'IMG_0266.jpg', 'aaa', '$2y$10$gNd/ku28j879YM1n4eW6z.hMBnyWYp/DqOYgs05iIwLYX.aRgJMGe', 'guru', 1, '2022-07-23 01:04:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indeks untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `id_periode` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
