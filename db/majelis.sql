-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2019 at 05:55 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
  `verif` int(1) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majelis`
--

INSERT INTO `majelis` (`id_majelis`, `nama_majelis`, `ketua`, `alamat`, `kontak`, `id_kategori`, `logo`, `verif`, `block`, `deleted`) VALUES
(1, 'JQH AL Mizan', 'Wusthol Bahri', 'Jalan Mataram No.9 Kota Tegal', '085643281771', 1, '', 1, 0, 0),
(2, 'Arauddhotul Mahmoedah', 'Ahmad Syekh ', 'Jalan Teuku Umar No.30 Tegal', '0828382839128', 2, 'majelis_1558085386.png', 0, 0, 0),
(3, 'Majelis Al Ikhlas', 'Falah', 'Jatibarang', '08543281777', 1, 'majelis_1558410730.png', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `majelis`
--
ALTER TABLE `majelis`
  ADD PRIMARY KEY (`id_majelis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `majelis`
--
ALTER TABLE `majelis`
  MODIFY `id_majelis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
