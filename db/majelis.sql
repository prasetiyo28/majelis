-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2019 at 07:34 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majelis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'Fatkhul Falah', 'fatkhulfalah@gmail.com', '2b620bdf79fc91e5f062c2d6e897dd3c'),
(2, 'admin', 'admin@majelis.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `kategori` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Nadhatul Ulama'),
(2, 'Muhammadiyah');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `id_majelis` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `id_majelis`, `nama_kegiatan`, `tempat`, `tanggal`) VALUES
(1, 1, 'Pengajian', 'Masjid Al ikhlas no 20', '2019-07-31'),
(2, 1, 'Pengajian Rutin', 'Masjid Al Ikhlas Debong', '2019-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `majelis`
--

CREATE TABLE `majelis` (
  `id_majelis` int(1) NOT NULL,
  `nama_majelis` varchar(150) NOT NULL,
  `ketua` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `id_kategori` int(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `verif` int(1) NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `latitude` double NOT NULL DEFAULT 0,
  `infaq` int(11) NOT NULL DEFAULT 0,
  `block` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majelis`
--

INSERT INTO `majelis` (`id_majelis`, `nama_majelis`, `ketua`, `alamat`, `kontak`, `id_kategori`, `logo`, `verif`, `longitude`, `latitude`, `infaq`, `block`, `deleted`) VALUES
(1, 'JQH AL Mizans', 'Aldin Tri Mulyo', 'Kalinyamat Wetan', '082898989898', 1, '', 1, 0, 0, 2000000, 0, 0),
(2, 'Arauddhotul Mahmoedah', 'Ahmad Syekh ', 'Jalan Teuku Umar No.30 Tegal', '0828382839128', 2, 'majelis_1558085386.png', 0, 0, 0, 0, 0, 0),
(3, 'Majelis Al Ikhlas', 'Falah', 'Jatibarang', '08543281777', 1, 'majelis_1558410730.png', 0, 0, 0, 0, 0, 0),
(4, 'JQH Al Amin', 'Mulyono', 'Jalan Merpati no 30  Dukuhturi', '0872372187172', 2, 'majelis_1563097503.png', 0, 109.1248786455078, -6.903887937730955, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(9) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_majelis` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `verif` tinyint(1) NOT NULL DEFAULT 0,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `alamat`, `email`, `jenis_kelamin`, `password`, `id_majelis`, `deleted`, `verif`, `blocked`, `level`, `token`) VALUES
(1, 'Aldin Tri Mulyo', 'Kalinyamat Kulon Gang 12 , Kota Tegal', 'aldin@gmail.com', 'Laki-Laki', '7a59124c390c24bd6f76035deea98c83', 1, 0, 1, 0, 0, ''),
(2, 'Bayu Adi Prasetiyo', NULL, 'bayu@gmail.com', 'Laki-Laki', '6ad14ba9986e3615423dfca256d04e3f', 0, 0, 1, 0, 0, ''),
(3, 'Aldin', NULL, 'aldin@gmail.com', 'Laki-Laki', 'dda51d3feaa9d758f9c556312266923a', 0, 0, 0, 0, 0, ''),
(4, 'Adi', NULL, 'adi@gmail.com', 'Laki-Laki', '6ad14ba9986e3615423dfca256d04e3f', 0, 0, 1, 0, 0, ''),
(5, 'Chloe', NULL, 'chloe@gmail.com', 'Perempuan', '6ad14ba9986e3615423dfca256d04e3f', 0, 0, 1, 0, 0, ''),
(6, 'Kim', NULL, 'kim@gmail.com', 'Laki-Laki', '25d55ad283aa400af464c76d713c07ad', 0, 0, 1, 0, 0, 'da340038be2e5077646e1c946ca0a4e95726b0b7c3316173450c0d51fb9f691f448cefd2f4b37968');

-- --------------------------------------------------------

--
-- Table structure for table `users_majelis`
--

CREATE TABLE `users_majelis` (
  `id_users` int(11) NOT NULL,
  `id_majelis` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_majelis`
--

INSERT INTO `users_majelis` (`id_users`, `id_majelis`, `email`, `password`) VALUES
(1, 1, 'majelis1@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 1, 'amin@gmail.com', '9276af0022e0cb0073a9ca05a18e0521');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majelis`
--
ALTER TABLE `majelis`
  ADD PRIMARY KEY (`id_majelis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_majelis`
--
ALTER TABLE `users_majelis`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `majelis`
--
ALTER TABLE `majelis`
  MODIFY `id_majelis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_majelis`
--
ALTER TABLE `users_majelis`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
