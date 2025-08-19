-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 02:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phannguyendinhvu`
--

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGV` int(11) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `NTNS` date NOT NULL,
  `QueQuan` varchar(100) NOT NULL,
  `GioiTinh` varchar(50) NOT NULL,
  `SDT` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Khoa` int(50) NOT NULL,
  `HocVan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`MaGV`, `HoTen`, `NTNS`, `QueQuan`, `GioiTinh`, `SDT`, `email`, `Khoa`, `HocVan`) VALUES
(5, 'Nguyễn Anh Phương', '2001-01-02', 'Ninh Hòa', 'Nam', '0336748863', 'nap@gmail.com', 1, 1),
(6, 'Trương Tấn Nghĩa', '2001-01-03', 'Phú Yên', 'Nam', '0336747763', 'ttn@gmail.com', 2, 2),
(7, 'Phan Nguyễn Đình Vũ', '2001-01-04', 'Vạn Ninh', 'Nam', '0392582694', 'vu@gmail.com', 3, 3),
(8, 'Nguyễn Thị Thanh Ni', '2001-01-05', 'Vạn Ninh', 'Nữ', '03376722450', 'ni@gmail.com', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hocvi`
--

CREATE TABLE `hocvi` (
  `MaHocVan` int(11) NOT NULL,
  `TenHocVan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hocvi`
--

INSERT INTO `hocvi` (`MaHocVan`, `TenHocVan`) VALUES
(1, 'Cử nhân'),
(2, 'Thạc sĩ'),
(3, 'Tiến sĩ'),
(4, 'Giáo sư');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` int(11) NOT NULL,
  `TenKhoa` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SDT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`, `DiaChi`, `Email`, `SDT`) VALUES
(1, 'CNTT', 'ĐH Nha Trang', 'cntt@ntu.edu.vn', '0337775467'),
(2, 'Ngôn ngữ Anh', 'ĐH Nha Trang', 'nna@ntu.edu.vn', '0338885467'),
(3, 'Luật', 'ĐH Nha Trang', 'luat@ntu.edu.vn', '0336665467'),
(4, 'Kinh Tế', 'ĐH Nha Trang', 'kt@ntu.edu.vn', '0332225467');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MaGV`),
  ADD KEY `Khoa` (`Khoa`),
  ADD KEY `HocVan` (`HocVan`);

--
-- Indexes for table `hocvi`
--
ALTER TABLE `hocvi`
  ADD PRIMARY KEY (`MaHocVan`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `MaGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hocvi`
--
ALTER TABLE `hocvi`
  MODIFY `MaHocVan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `MaKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`Khoa`) REFERENCES `khoa` (`MaKhoa`),
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`HocVan`) REFERENCES `hocvi` (`MaHocVan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
