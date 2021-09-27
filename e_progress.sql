-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2021 pada 09.24
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_progress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file`
--

CREATE TABLE `tb_file` (
  `id_file` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_file`
--

INSERT INTO `tb_file` (`id_file`, `id_project`, `nama_file`, `size`, `file`) VALUES
(1, 1, 'Screenshot (11).png', '1.454', '1632703905_960b9a84e958f5772942.png'),
(3, 2, 'datasheet_manual.xlsx', '0.022', '1632709906_874d09b5030ca0739485.xlsx'),
(4, 2, 'datasheet_manual.csv', '0.029', '1632709906_e8865c843fc154091094.csv'),
(5, 2, '', '0.000', '1632709942_1347efa8898f9a853081');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` varchar(5) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_project`
--

CREATE TABLE `tb_project` (
  `id_project` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `desc_project` text NOT NULL,
  `project_progress` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_sit` date NOT NULL,
  `tgl_uat` date NOT NULL,
  `tgl_to` date NOT NULL,
  `os` varchar(50) NOT NULL,
  `message_h2h` varchar(255) NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_project`
--

INSERT INTO `tb_project` (`id_project`, `pic`, `durasi`, `periode`, `project`, `desc_project`, `project_progress`, `status`, `tgl_sit`, `tgl_uat`, `tgl_to`, `os`, `message_h2h`, `time_stamp`) VALUES
(2, '123', '123', '123', '123', 'asfsaasfsasfsa', 25, '0', '2020-02-02', '2020-02-02', '2020-02-02', '12', '12', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`id_project`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_file`
--
ALTER TABLE `tb_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
