-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 04:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_magang`
--

CREATE TABLE `tbl_magang` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nim` int(10) DEFAULT NULL,
  `konsentrasi` varchar(20) DEFAULT NULL,
  `tahun` int(20) DEFAULT NULL,
  `pembimbing` varchar(30) DEFAULT NULL,
  `tempat_magang` varchar(20) DEFAULT NULL,
  `waktu_mulai` date DEFAULT NULL,
  `waktu_selesai` date DEFAULT NULL,
  `dokumen` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_magang`
--

INSERT INTO `tbl_magang` (`id`, `nama`, `nim`, `konsentrasi`, `tahun`, `pembimbing`, `tempat_magang`, `waktu_mulai`, `waktu_selesai`, `dokumen`, `status`) VALUES
(4, NULL, 19094429, '3', 2015, 'asdas', 'fgfg', '2022-01-19', '2022-01-19', '61ed6cacd3a53.pdf', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
