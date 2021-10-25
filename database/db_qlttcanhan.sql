-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 03:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_qlttcanhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_nguoidung`
--

CREATE TABLE `tb_nguoidung` (
  `id_nguoidung` int(10) UNSIGNED NOT NULL,
  `tennguoidung` varchar(100) NOT NULL,
  `sodienthoai` varchar(13) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_taikhoan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nguoidung`
--

INSERT INTO `tb_nguoidung` (`id_nguoidung`, `tennguoidung`, `sodienthoai`, `ngaysinh`, `diachi`, `email`, `id_taikhoan`) VALUES
(21, '', '', '0000-00-00', '', 'tuanh12a12001@gmail.com', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tb_taikhoan`
--

CREATE TABLE `tb_taikhoan` (
  `id_taikhoan` int(10) UNSIGNED NOT NULL,
  `tentaikhoan` varchar(60) NOT NULL,
  `matkhau` varchar(150) NOT NULL,
  `ngaytao` datetime DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `muc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_taikhoan`
--

INSERT INTO `tb_taikhoan` (`id_taikhoan`, `tentaikhoan`, `matkhau`, `ngaytao`, `email`, `code`, `trangthai`, `muc`) VALUES
(1, 'admin', 'admin', '2021-10-20 00:29:35', 'admin_cse@gmail.com', '', 1, 1),
(2, '', '', '2021-10-20 00:34:36', '', '', 0, 0),
(3, 'aaa', '123', '2021-10-20 01:37:39', 'root@e.com', '', 0, 0),
(15, 'abc23', '123', '2021-10-24 22:05:02', 'root@9gmail.csom', '', 0, 0),
(16, 'abc4', '123', '2021-10-25 01:11:18', 'abc4@gmail.com', '', 0, 0),
(18, 'user2', '$2y$10$HdKHOyx9zn2JKNlgTF1lbeUWwIblwZ60AvRxRCFry91xy7K6yKulG', '2021-10-25 02:46:45', 'user2@gmail.com', 'ffe34924133ee2a8d47bacbadcc0d425', 0, 0),
(21, 'user3', '$2y$10$cCD9.i7VNyq7AizWxcfHJO/XyPTZz3MIOWAUuW5XKRm4qYjBh./Cq', '2021-10-25 03:34:48', 'tuanh12a12001@gmail.com', '472b2f0754105970dc9317eae55dbac0', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD UNIQUE KEY `id_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  MODIFY `id_taikhoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
