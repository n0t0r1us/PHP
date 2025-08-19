-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 01:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chuyenbay`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuyen_bay1`
--

CREATE TABLE `chuyen_bay1` (
  `ma_chuyenbay` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sohieu_chuyenbay` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_tpkhoihanh` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_khoihanh` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_tpden` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_den` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_ve` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chuyen_bay1`
--

INSERT INTO `chuyen_bay1` (`ma_chuyenbay`, `sohieu_chuyenbay`, `ma_tpkhoihanh`, `ngay_khoihanh`, `ma_tpden`, `ngay_den`, `gia_ve`) VALUES
('VJ090', 'VJA389', 'HK', '22-1-2021', 'LD', '23-1-2021', 1500000),
('VJ123', 'VJA335', 'NT', '22-1-2021', 'HK', '23-1-2021', 500000),
('VJ127', 'VJA330', 'NT', '08-01-2022', 'LD', '09-01-2022', 1200000),
('VJ135', 'VJA338', 'LD', '08-01-2022', 'NT', '09-01-2022', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `quocgia`
--

CREATE TABLE `quocgia` (
  `ma_quocgia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_quocgia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quocgia`
--

INSERT INTO `quocgia` (`ma_quocgia`, `ten_quocgia`) VALUES
('JP', 'JAPAN'),
('UK', 'ANH'),
('US', 'MY'),
('VN', 'VIETNAM');

-- --------------------------------------------------------

--
-- Table structure for table `thanh_pho`
--

CREATE TABLE `thanh_pho` (
  `ma_thanhpho` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_thanhpho` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_bang_tinh` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_quocgia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanh_pho`
--

INSERT INTO `thanh_pho` (`ma_thanhpho`, `ten_thanhpho`, `ten_bang_tinh`, `ma_quocgia`) VALUES
('HK', 'NEW YORK', 'NEW YORK', 'US'),
('LD', 'LONDON', 'LONDON', 'UK'),
('NT', 'Nha Trang', 'Khánh Hòa', 'VN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyen_bay1`
--
ALTER TABLE `chuyen_bay1`
  ADD PRIMARY KEY (`ma_chuyenbay`),
  ADD KEY `ma_tpkhoihanh` (`ma_tpkhoihanh`),
  ADD KEY `ma_tpden` (`ma_tpden`);

--
-- Indexes for table `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`ma_quocgia`);

--
-- Indexes for table `thanh_pho`
--
ALTER TABLE `thanh_pho`
  ADD PRIMARY KEY (`ma_thanhpho`),
  ADD KEY `ma_quocgia` (`ma_quocgia`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuyen_bay1`
--
ALTER TABLE `chuyen_bay1`
  ADD CONSTRAINT `chuyen_bay1_ibfk_1` FOREIGN KEY (`ma_tpkhoihanh`) REFERENCES `thanh_pho` (`ma_thanhpho`),
  ADD CONSTRAINT `chuyen_bay1_ibfk_2` FOREIGN KEY (`ma_tpden`) REFERENCES `thanh_pho` (`ma_thanhpho`);

--
-- Constraints for table `thanh_pho`
--
ALTER TABLE `thanh_pho`
  ADD CONSTRAINT `thanh_pho_ibfk_1` FOREIGN KEY (`ma_quocgia`) REFERENCES `quocgia` (`ma_quocgia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
