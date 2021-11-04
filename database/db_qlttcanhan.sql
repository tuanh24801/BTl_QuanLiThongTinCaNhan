-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 03:27 PM
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
(77, 78, 35),
(78, 77, 36);

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
(77, 78, 1, 21);

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
(14, 'lịch 1', '213', '2021-11-03', 78);

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
  `gioitinh` tinyint(1) NOT NULL,
  `mota` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nguoidung`
--

INSERT INTO `tb_nguoidung` (`id_nguoidung`, `tennguoidung`, `sodienthoai`, `ngaysinh`, `diachi`, `email`, `gioitinh`, `mota`) VALUES
(1, 'Tin nhắn hệ thống', '', '0000-00-00', '', '', 0, ''),
(75, 'Visitor2', '', '0000-00-00', '', 'Visitor2@gmail.com', 0, ''),
(77, 'Đào nguyễn Thanh', '', '0000-00-00', '', 'daont1810@gmail.com', 0, ''),
(78, 'Tuấn Anh', '', '0000-00-00', '', 'tuanh12a12001@gmail.com', 0, '');

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
(100, '23', 78, '2021-11-04 21:13:25', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhom`
--

CREATE TABLE `tb_nhom` (
  `id_nhom` int(10) UNSIGNED NOT NULL,
  `tennhom` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nhom`
--

INSERT INTO `tb_nhom` (`id_nhom`, `tennhom`) VALUES
(23, 'Nhomvts3'),
(24, 'abc'),
(25, '61TH1');

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
  `tk_khach` tinyint(1) NOT NULL,
  `id_nguoidung` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_taikhoan`
--

INSERT INTO `tb_taikhoan` (`id_taikhoan`, `tentaikhoan`, `matkhau`, `ngaytao`, `email`, `code`, `trangthai`, `muc`, `tennguoidung`, `tk_khach`, `id_nguoidung`) VALUES
(1, 'admin', 'admin', '2021-11-04 20:40:17', '', '', 1, 1, '', 0, 1),
(75, 'Visitor2', '123', '2021-11-04 20:50:28', 'Visitor2@gmail.com', '', 1, 0, 'Visitor2', 1, 75),
(77, 'user4', '$2y$10$uSrJVJ9J76fh49r.FNO3A.mphsDaULpxGFw/KKTa5g9EbQYeqRw3K', '2021-11-04 21:07:35', 'daont1810@gmail.com', '68ec53b797d28b9367b619b1bd47108a', 1, 0, 'Đào nguyễn Thanh', 0, 77),
(78, 'user5', '$2y$10$NxkHQGrH4SnoeBMkVcobfu.vzc.YcpaftC5SGoKHbi2686TRCYEnO', '2021-11-04 21:09:45', 'tuanh12a12001@gmail.com', 'c81201ad84dfe20bf613441bc35e8a6c', 1, 0, 'Tuấn Anh', 0, 78);

-- --------------------------------------------------------

--
-- Table structure for table `tb_thanhviennhom`
--

CREATE TABLE `tb_thanhviennhom` (
  `id_thanhviennhom` int(10) UNSIGNED NOT NULL,
  `id_thanhvien` int(10) UNSIGNED NOT NULL,
  `id_nhom` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_thanhviennhom`
--

INSERT INTO `tb_thanhviennhom` (`id_thanhviennhom`, `id_thanhvien`, `id_nhom`) VALUES
(51, 78, 24),
(52, 77, 25),
(53, 78, 25);

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
(426, 78, 77, 'đào ơi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tinnhan_nhom`
--

CREATE TABLE `tb_tinnhan_nhom` (
  `id_tinnhan_nhom` int(10) UNSIGNED NOT NULL,
  `tinnhan_from` int(10) UNSIGNED NOT NULL,
  `tinnhan_to` int(10) UNSIGNED NOT NULL,
  `noidung` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tinnhan_nhom`
--

INSERT INTO `tb_tinnhan_nhom` (`id_tinnhan_nhom`, `tinnhan_from`, `tinnhan_to`, `noidung`) VALUES
(95, 78, 25, 'hic'),
(96, 25, 77, 'Tuấn Anh:  hic');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trangthai`
--

CREATE TABLE `tb_trangthai` (
  `id_trangthai` int(10) UNSIGNED NOT NULL,
  `noidung` varchar(2000) NOT NULL,
  `id_nguoidung` int(10) UNSIGNED NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_trangthai`
--

INSERT INTO `tb_trangthai` (`id_trangthai`, `noidung`, `id_nguoidung`, `thoigian`) VALUES
(5, 'Hôm nay vui vãi lìn', 78, '2021-11-04 21:13:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banbe`
--
ALTER TABLE `tb_banbe`
  ADD PRIMARY KEY (`id_banbe`),
  ADD KEY `banbe_from` (`banbe_from`),
  ADD KEY `banbe_to` (`banbe_to`);

--
-- Indexes for table `tb_ketban`
--
ALTER TABLE `tb_ketban`
  ADD PRIMARY KEY (`id_loimoi`),
  ADD KEY `loimoi_from` (`loimoi_from`),
  ADD KEY `loimoi_to` (`loimoi_to`);

--
-- Indexes for table `tb_lichhen`
--
ALTER TABLE `tb_lichhen`
  ADD PRIMARY KEY (`id_lichhen`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Indexes for table `tb_nhiemvu`
--
ALTER TABLE `tb_nhiemvu`
  ADD PRIMARY KEY (`id_nhiemvu`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `tb_nhom`
--
ALTER TABLE `tb_nhom`
  ADD PRIMARY KEY (`id_nhom`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `tb_thanhviennhom`
--
ALTER TABLE `tb_thanhviennhom`
  ADD PRIMARY KEY (`id_thanhviennhom`),
  ADD KEY `id_nhom` (`id_nhom`),
  ADD KEY `id_thanhvien` (`id_thanhvien`);

--
-- Indexes for table `tb_tinnhan`
--
ALTER TABLE `tb_tinnhan`
  ADD PRIMARY KEY (`id_tinnhan`),
  ADD KEY `tinnhan_from` (`tinnhan_from`),
  ADD KEY `tinnhan_to` (`tinnhan_to`);

--
-- Indexes for table `tb_tinnhan_nhom`
--
ALTER TABLE `tb_tinnhan_nhom`
  ADD PRIMARY KEY (`id_tinnhan_nhom`);

--
-- Indexes for table `tb_trangthai`
--
ALTER TABLE `tb_trangthai`
  ADD PRIMARY KEY (`id_trangthai`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banbe`
--
ALTER TABLE `tb_banbe`
  MODIFY `id_banbe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_ketban`
--
ALTER TABLE `tb_ketban`
  MODIFY `id_loimoi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_lichhen`
--
ALTER TABLE `tb_lichhen`
  MODIFY `id_lichhen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_nhiemvu`
--
ALTER TABLE `tb_nhiemvu`
  MODIFY `id_nhiemvu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tb_nhom`
--
ALTER TABLE `tb_nhom`
  MODIFY `id_nhom` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  MODIFY `id_taikhoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tb_thanhviennhom`
--
ALTER TABLE `tb_thanhviennhom`
  MODIFY `id_thanhviennhom` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_tinnhan`
--
ALTER TABLE `tb_tinnhan`
  MODIFY `id_tinnhan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- AUTO_INCREMENT for table `tb_tinnhan_nhom`
--
ALTER TABLE `tb_tinnhan_nhom`
  MODIFY `id_tinnhan_nhom` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tb_trangthai`
--
ALTER TABLE `tb_trangthai`
  MODIFY `id_trangthai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_banbe`
--
ALTER TABLE `tb_banbe`
  ADD CONSTRAINT `tb_banbe_ibfk_1` FOREIGN KEY (`banbe_from`) REFERENCES `tb_nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `tb_banbe_ibfk_2` FOREIGN KEY (`banbe_to`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Constraints for table `tb_ketban`
--
ALTER TABLE `tb_ketban`
  ADD CONSTRAINT `tb_ketban_ibfk_1` FOREIGN KEY (`loimoi_from`) REFERENCES `tb_nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `tb_ketban_ibfk_2` FOREIGN KEY (`loimoi_to`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Constraints for table `tb_lichhen`
--
ALTER TABLE `tb_lichhen`
  ADD CONSTRAINT `tb_lichhen_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Constraints for table `tb_nhiemvu`
--
ALTER TABLE `tb_nhiemvu`
  ADD CONSTRAINT `tb_nhiemvu_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Constraints for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD CONSTRAINT `tb_taikhoan_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Constraints for table `tb_thanhviennhom`
--
ALTER TABLE `tb_thanhviennhom`
  ADD CONSTRAINT `tb_thanhviennhom_ibfk_1` FOREIGN KEY (`id_nhom`) REFERENCES `tb_nhom` (`id_nhom`),
  ADD CONSTRAINT `tb_thanhviennhom_ibfk_2` FOREIGN KEY (`id_thanhvien`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Constraints for table `tb_tinnhan`
--
ALTER TABLE `tb_tinnhan`
  ADD CONSTRAINT `tb_tinnhan_ibfk_1` FOREIGN KEY (`tinnhan_from`) REFERENCES `tb_nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `tb_tinnhan_ibfk_2` FOREIGN KEY (`tinnhan_to`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Constraints for table `tb_trangthai`
--
ALTER TABLE `tb_trangthai`
  ADD CONSTRAINT `tb_trangthai_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
