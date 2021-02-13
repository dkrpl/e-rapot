-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2020 at 05:44 
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftarsiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` tinyint(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'rudy', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE IF NOT EXISTS `tb_gambar` (
  `id` tinyint(3) NOT NULL,
  `nis` int(4) DEFAULT NULL,
  `gambar` text,
  `aktif` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id`, `nis`, `gambar`, `aktif`) VALUES
(5, 1253, 'Speaker_Weave_by_Phil_Jackson.jpg', 'yes'),
(6, 1264, 'BosqueTK.jpg', 'yes'),
(7, 4562, 'Liquid_glass_by_matthileo.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `aktif` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kode_kelas`, `nama_kelas`, `aktif`) VALUES
('X-C', 'X-Umum-C', 'yes'),
('X-D', 'X-UMUM-D', 'yes'),
('X-E', 'X-Umum-E', 'yes'),
('XA', 'XI-UMUM-A', 'yes'),
('XB', 'X-UMUM-B', 'yes'),
('XI-1', 'XI-RPL-1', 'yes'),
('XI-3', 'XII-RPL-3', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `id_mapel` varchar(8) NOT NULL,
  `nama_mapel` varchar(30) DEFAULT NULL,
  `guru` varchar(40) DEFAULT NULL,
  `aktif` enum('yes','no') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `guru`, `aktif`) VALUES
('MAT-10', 'Matematika', 'Bu Nila', 'yes'),
('BHSIND', 'Bahasa Indonesia', 'Julia Lutfiati', 'yes'),
('Web-3', 'Pemrograman Web Dinamis', 'Rudy Eko Prasetya', 'yes'),
('BASDAT-3', 'Desain Basis Data', 'Riski Aswi,', 'yes'),
('PBO-3', 'Pemrograman Berorientasi Objek', 'Aprilina T', 'yes'),
('JARKOM-1', 'Jaringan Komputer', 'M. Syaiful Muharrom', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(5) NOT NULL,
  `nis` int(4) NOT NULL,
  `mapel` varchar(8) NOT NULL,
  `nilai` float DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nis`, `mapel`, `nilai`, `tanggal`) VALUES
(12, 1264, 'MAT-10', 79, '2015-01-11 10:34:32'),
(29, 1264, 'BHSIND', 50, '2019-11-11 05:07:58'),
(3, 1264, 'PBO-3', 80, '2014-09-28 05:21:46'),
(4, 1264, 'BASDAT-3', 70, '2014-09-28 05:21:53'),
(6, 1264, 'JARKOM-1', 90, '2014-09-28 05:22:12'),
(8, 65839, 'MAT-10', 80, '2014-09-28 05:29:58'),
(11, 1264, 'MAT-10', 98, '2014-09-28 09:30:05'),
(13, 1264, 'JARKOM-1', 90, '2015-12-31 22:11:05'),
(14, 9875, 'MAT-10', 89, '2016-01-03 02:21:41'),
(15, 65839, 'BHSIND', 75, '2016-01-05 00:24:28'),
(16, 65839, 'Web-3', 80, '2016-01-05 00:24:38'),
(17, 65839, 'BASDAT-3', 66, '2016-01-05 00:24:48'),
(18, 65839, 'JARKOM-1', 86, '2016-01-05 00:24:59'),
(19, 1264, 'MAT-10', 80, '2016-04-25 04:05:21'),
(21, 1264, 'BASDAT-3', 40, '2017-01-12 07:00:46'),
(22, 1264, 'Web-3', 65, '2017-01-12 07:01:16'),
(27, 65839, 'MAT-10', 123, '2017-05-30 06:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `nis` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota_kab` varchar(30) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `password`, `alamat`, `kota_kab`, `gender`, `kelas`) VALUES
(1264, 'Riadi', '202cb962ac59075b964b07152d234b70', 'kediri', 'test', 'L', 'X-C'),
(1253, 'Anita Ratna Sari', '202cb962ac59075b964b07152d234b70', 'Kediri Kab', 'Kediri', 'P', 'XB'),
(4562, 'Anton Gaspleng', '202cb962ac59075b964b07152d234b70', 'Nganjuk', 'Nganjuk', 'L', 'XI-1'),
(9875, 'Toni Sucipto', '202cb962ac59075b964b07152d234b70', 'Kediri', 'Kediri', 'L', 'XI-1'),
(7658, 'Deni Darco', '202cb962ac59075b964b07152d234b70', 'Jakarta Pusat Banget', 'Jakarta Pusat Banget', 'L', 'XA'),
(65839, 'BUDI ANDUK', '202cb962ac59075b964b07152d234b70', 'KEBUMEN', 'KEBUMEN', 'L', 'X-C'),
(783989, 'JARFIS', '202cb962ac59075b964b07152d234b70', 'NUSA TENGGARA TIMUR', 'NUSA TENGGARA TIMUR', 'P', 'XI-1'),
(65789, 'IRON MAN', '202cb962ac59075b964b07152d234b70', 'PACE NGANJUK', 'PACE NGANJUK', 'P', 'XA'),
(2222, 'siswa coba', '202cb962ac59075b964b07152d234b70', 'kediri aja', 'kediri', 'P', 'XA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas` (`kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
