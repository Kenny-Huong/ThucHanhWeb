-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_san_pham`, `gia`, `mo_ta`, `ngay_tao`) VALUES
(1, 'Điện thoại iPhone 15', 25000000.00, 'Điện thoại thông minh Apple iPhone 15 với nhiều tính năng mới.', '2024-11-19 11:42:26'),
(2, 'Laptop Dell XPS 13', 32000000.00, 'Laptop cao cấp dành cho dân văn phòng với thiết kế sang trọng.', '2024-11-19 11:42:26'),
(3, 'Tai nghe AirPods Pro', 4500000.00, 'Tai nghe không dây của Apple với khả năng chống ồn tuyệt vời.', '2024-11-19 11:42:26'),
(4, 'Smartwatch Galaxy Watch 6', 8000000.00, 'Đồng hồ thông minh của Samsung với nhiều tính năng hỗ trợ sức khỏe.', '2024-11-19 11:42:26'),
(5, 'Máy tính bảng iPad Pro', 28000000.00, 'Máy tính bảng cao cấp của Apple với màn hình Retina.', '2024-11-19 11:42:26'),
(6, 'Bàn phím cơ Logitech', 2000000.00, 'Bàn phím cơ chơi game với độ bền cao và thiết kế bắt mắt.', '2024-11-19 11:42:26'),
(7, 'Chuột không dây Microsoft', 800000.00, 'Chuột không dây chính hãng Microsoft, thiết kế tiện lợi.', '2024-11-19 11:42:26'),
(8, 'TV Samsung 55\"', 15000000.00, 'TV Samsung 4K màn hình rộng 55 inch với chất lượng hình ảnh vượt trội.', '2024-11-19 11:42:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
