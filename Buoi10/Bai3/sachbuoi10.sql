-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3366:3366
-- Generation Time: Oct 27, 2024 at 09:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsach`
--

-- --------------------------------------------------------

--
-- Table structure for table `sachbuoi10`
--

CREATE TABLE `sachbuoi10` (
  `Masach` char(10) NOT NULL,
  `Tensach` varchar(50) DEFAULT NULL,
  `Soluong` int(11) DEFAULT NULL,
  `Dongia` int(11) DEFAULT NULL,
  `Tacgia` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sachbuoi10`
--

INSERT INTO `sachbuoi10` (`Masach`, `Tensach`, `Soluong`, `Dongia`, `Tacgia`) VALUES
('S001', 'Nguyễn Văn Hướng', 10, 2000, 'Kenny Hướn'),
('S002', 'Cơ sở dữ liệu', 15, 60000, 'TranB'),
('S003', 'HTML & CSS', 20, 40000, 'LeC'),
('S004', 'JavaScript', 12, 55000, 'PhamD'),
('S005', 'Python căn bản', 8, 70000, 'NguyenE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sachbuoi10`
--
ALTER TABLE `sachbuoi10`
  ADD PRIMARY KEY (`Masach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
