-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 05:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siperi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_sip`
--

CREATE TABLE `data_sip` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `jenis_sip` varchar(100) NOT NULL,
  `alamat_praktek` varchar(100) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_sip`
--

CREATE TABLE `master_sip` (
  `id` int(100) NOT NULL,
  `jenis_sip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_sip`
--

INSERT INTO `master_sip` (`id`, `jenis_sip`) VALUES
(1, 'Dokter Umum'),
(2, 'Dokter Spesialis'),
(3, 'Dokter Gigi'),
(4, 'Apoteker'),
(5, 'TTK(Tenaga Kerja Kefarmasian)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(100) NOT NULL,
  `aktifasi` int(100) NOT NULL,
  `pict` varchar(100) NOT NULL,
  `nik` int(100) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota_kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `no_hp`, `password`, `role_id`, `aktifasi`, `pict`, `nik`, `gelar`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `provinsi`, `kota_kabupaten`, `kecamatan`, `kelurahan`) VALUES
(1, 'Bagus', 'bagusmundaran@gmail.com', 'bagusmundaran@gmail.com', '0', 'bagus', 1, 1, '', 0, '', '', '0000-00-00', '', '', '', '', ''),
(2, 'Arafiki', 'arafiki@gmail.com', 'arafiki@gmail.com', '08997665672', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, '', 0, 'Sp.A', 'Bojonegoro', '1996-12-12', 'Trucuk rt4, rw5', 'Jawa Timur', 'Bojonegoro', 'Bojonegoro', 'Trucuk'),
(43, 'Mundaran', 'baguzmundaran@gmail.com', 'baguzmundaran@gmail.com', '0', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0, '', 0, '', '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(100) NOT NULL,
  `role_id` int(100) NOT NULL,
  `menu_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(100) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Nakes');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu_sub_menu`
--

CREATE TABLE `user_menu_sub_menu` (
  `id` int(100) NOT NULL,
  `sub_menu_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu_sub_menu`
--

INSERT INTO `user_menu_sub_menu` (`id`, `sub_menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Registrasi Baru', 'nakes/Registrasi Baru', 'tf-icons bx bx-note', 1),
(2, 2, 'Perpanjang', 'nakes/perpanjang', 'tf-icons bx bx-time', 1),
(3, 2, 'Perubahan', 'nakes/perubahan', 'tf-icons bx bx-edit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'nakes');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(100) NOT NULL,
  `menu_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(100) NOT NULL,
  `menu_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `menu_type`) VALUES
(1, 2, 'Dashboard', 'nakes', 'tf-icons bx bx-home', 1, '1'),
(2, 2, 'Register SIP', 'nakes/register_sip', 'tf-icons bx bx-archive', 1, '2'),
(3, 2, 'STPT', 'nakes/STPT', 'tf-icons bx bx-book', 1, ''),
(4, 2, 'Riwayat', 'nakes/riwayat', 'tf-icons bx bx-history', 1, ''),
(5, 1, 'Dashboard Admin', 'administrator', 'tf-icons bx bx-home', 1, ''),
(6, 1, 'Validasi SIP', 'administrator/validasi_sip', 'tf-icons bx bx-data', 1, ''),
(7, 1, 'Cetak SIP', 'administrator/cetak_sip', 'tf-icons bx bx-printer', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_sip`
--
ALTER TABLE `data_sip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_sip`
--
ALTER TABLE `master_sip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu_sub_menu`
--
ALTER TABLE `user_menu_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_sip`
--
ALTER TABLE `data_sip`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_sip`
--
ALTER TABLE `master_sip`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
