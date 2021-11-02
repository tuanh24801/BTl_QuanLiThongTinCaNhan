-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 06:05 PM
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
-- Table structure for table `tb_banbe`
--

CREATE TABLE `tb_banbe` (
  `banbe_to` int(10) UNSIGNED NOT NULL,
  `banbe_from` int(10) UNSIGNED NOT NULL,
  `id_banbe` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_banbe`
--

INSERT INTO `tb_banbe` (`banbe_to`, `banbe_from`, `id_banbe`) VALUES
(35, 48, 11),
(48, 35, 12),
(49, 35, 15),
(35, 49, 16),
(52, 53, 19),
(53, 52, 20),
(52, 54, 21),
(54, 52, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketban`
--

CREATE TABLE `tb_ketban` (
  `loimoi_from` int(10) UNSIGNED NOT NULL,
  `loimoi_to` int(10) UNSIGNED NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `id_loimoi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ketban`
--

INSERT INTO `tb_ketban` (`loimoi_from`, `loimoi_to`, `trangthai`, `id_loimoi`) VALUES
(35, 23, 1, 1),
(35, 0, 1, 2),
(48, 35, 1, 7),
(47, 35, 1, 8),
(35, 49, 1, 9),
(35, 50, 1, 10),
(47, 49, 1, 11),
(35, 48, 0, 13),
(53, 52, 1, 14),
(54, 52, 1, 15),
(55, 56, 1, 16),
(49, 55, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lichhen`
--

CREATE TABLE `tb_lichhen` (
  `id_lichhen` int(10) UNSIGNED NOT NULL,
  `tenlichhen` varchar(100) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `thoigian` date NOT NULL,
  `id_nguoidung` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lichhen`
--

INSERT INTO `tb_lichhen` (`id_lichhen`, `tenlichhen`, `noidung`, `thoigian`, `id_nguoidung`) VALUES
(7, 'lịch 1', 'Nd Lịch 1', '2021-11-06', 53),
(8, 'Nộp bài Tập lớn ', 'Nộp bài Tập lớn ', '2021-11-03', 52);

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
  `id_taikhoan` int(10) UNSIGNED NOT NULL,
  `anhdaidien` varchar(255) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nguoidung`
--

INSERT INTO `tb_nguoidung` (`id_nguoidung`, `tennguoidung`, `sodienthoai`, `ngaysinh`, `diachi`, `email`, `id_taikhoan`, `anhdaidien`, `gioitinh`) VALUES
(35, 'Nguyen Anhh', '037945221', '2001-08-24', 'Hà Nội', 'tuanh12a12001@gmail.com', 35, '', 1),
(48, 'Visitor2', '03794522000', '2021-10-01', 'Hà Tây', 'Visitor2@gmail.com', 48, '', 1),
(49, 'Visitor3', '', '0000-00-00', '', 'Visitor3@gmail.com', 49, '', 0),
(52, 'Phương Phạm Quang', '0379452203', '2021-09-02', 'Vĩnh Phúc', 'Phuongpham01@gmail.com', 52, '', 1),
(53, 'Thanh Đào Nguyễn', '0379452202', '2021-12-28', 'Hưng Yên', 'ThanhDao01@gmail.com', 53, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhiemvu`
--

CREATE TABLE `tb_nhiemvu` (
  `id_nhiemvu` int(10) UNSIGNED NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `id_nguoidung` int(10) UNSIGNED NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT current_timestamp(),
  `tennhiemvu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nhiemvu`
--

INSERT INTO `tb_nhiemvu` (`id_nhiemvu`, `noidung`, `id_nguoidung`, `thoigian`, `tennhiemvu`) VALUES
(1, 'nhiệm vụ thứ 5 làm phần admin\r\nnhiệm vụ thứ 1', 23, '2021-10-27 09:53:07', 'Tên nv 1'),
(14, 'nhiệm vụ 1', 23, '2021-10-28 17:41:02', 'tuấn anhh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhom`
--

CREATE TABLE `tb_nhom` (
  `id_nhom` int(10) UNSIGNED NOT NULL,
  `id_thanhvien` int(11) NOT NULL,
  `tennhom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `muc` tinyint(1) NOT NULL,
  `tennguoidung` varchar(100) NOT NULL,
  `tk_khach` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_taikhoan`
--

INSERT INTO `tb_taikhoan` (`id_taikhoan`, `tentaikhoan`, `matkhau`, `ngaytao`, `email`, `code`, `trangthai`, `muc`, `tennguoidung`, `tk_khach`) VALUES
(1, 'Admin', 'Admin', '2021-10-20 00:29:35', '', '', 1, 1, '', 0),
(35, 'user3', '$2y$10$Y4j2.X8IfP2aKVUD7lSjoOVZjXYx9D5ac85vCj5m3Bp5ix/UTZ.He', '2021-10-30 00:33:02', 'tuanh12a12001@gmail.com', 'a2de5263150fc3996a6c0415a18638af', 1, 0, 'Nguyen Anhh', 0),
(48, 'Visitor1', '123', '2021-10-30 13:46:34', 'Visitor2@gmail.com', '', 1, 0, 'Visitor2', 1),
(49, 'Visitor3', '123', '2021-10-30 13:47:33', 'Visitor3@gmail.com', '', 1, 0, 'Visitor3', 1),
(52, 'PhuongPham', '123', '2021-11-02 21:40:11', 'Phuongpham01@gmail.com', '', 1, 0, 'Phương Phạm Quang', 1),
(53, 'ThanhDao', '123', '2021-11-02 21:40:49', 'ThanhDao01@gmail.com', '', 1, 0, 'Thanh Đào Nguyễn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tinnhan`
--

CREATE TABLE `tb_tinnhan` (
  `id_tinnhan` int(10) UNSIGNED NOT NULL,
  `tinnhan_from` int(10) UNSIGNED NOT NULL,
  `tinnhan_to` int(10) UNSIGNED NOT NULL,
  `noidung` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tinnhan`
--

INSERT INTO `tb_tinnhan` (`id_tinnhan`, `tinnhan_from`, `tinnhan_to`, `noidung`) VALUES
(386, 35, 48, 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banbe`
--
ALTER TABLE `tb_banbe`
  ADD PRIMARY KEY (`id_banbe`);

--
-- Indexes for table `tb_ketban`
--
ALTER TABLE `tb_ketban`
  ADD PRIMARY KEY (`id_loimoi`);

--
-- Indexes for table `tb_lichhen`
--
ALTER TABLE `tb_lichhen`
  ADD PRIMARY KEY (`id_lichhen`);

--
-- Indexes for table `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD UNIQUE KEY `id_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `tb_nhiemvu`
--
ALTER TABLE `tb_nhiemvu`
  ADD PRIMARY KEY (`id_nhiemvu`);

--
-- Indexes for table `tb_nhom`
--
ALTER TABLE `tb_nhom`
  ADD PRIMARY KEY (`id_nhom`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Indexes for table `tb_tinnhan`
--
ALTER TABLE `tb_tinnhan`
  ADD PRIMARY KEY (`id_tinnhan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banbe`
--
ALTER TABLE `tb_banbe`
  MODIFY `id_banbe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_ketban`
--
ALTER TABLE `tb_ketban`
  MODIFY `id_loimoi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_lichhen`
--
ALTER TABLE `tb_lichhen`
  MODIFY `id_lichhen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_nhiemvu`
--
ALTER TABLE `tb_nhiemvu`
  MODIFY `id_nhiemvu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_nhom`
--
ALTER TABLE `tb_nhom`
  MODIFY `id_nhom` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  MODIFY `id_taikhoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_tinnhan`
--
ALTER TABLE `tb_tinnhan`
  MODIFY `id_tinnhan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
