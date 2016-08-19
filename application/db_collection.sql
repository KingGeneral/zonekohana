-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2016 at 04:41 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(3) NOT NULL,
  `menu` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `orderlist` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `levels` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `parents` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu`, `orderlist`, `levels`, `parents`) VALUES
(1, 'Home', '0', '0', '0'),
(2, 'About', '7', '2', '3'),
(3, 'Support', '2', '1', '8'),
(4, 'Contact', '4', '2', '3'),
(5, 'FAQ', '3', '2', '3'),
(6, 'testme', '5', '3', '4'),
(7, 'aaaa', '6', '4', '6'),
(8, 'teshoho', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` int(5) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantity` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `username`, `product`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'zone1', 'kohana1212', 56, '2016-08-05 10:42:21', '2016-08-08 11:08:13'),
(2, 'zone', 'windows222', 8, '2016-08-05 10:42:21', '2016-08-05 14:50:14'),
(3, 'zone', 'mouse', 5, '2016-08-05 10:43:08', '2016-08-05 10:43:08'),
(4, 'zone', 'pc', 5, '2016-08-05 10:43:08', '2016-08-05 10:43:08'),
(5, 'Shana', 'CI', 1, '2016-08-05 10:44:15', '2016-08-05 10:44:15'),
(6, 'Shana', 'Blog', 2, '2016-08-05 10:44:15', '2016-08-05 10:44:15'),
(7, 'Shen', 'Minyak', 3, '2016-08-05 10:44:39', '2016-08-05 10:44:39'),
(8, 'Shen', 'Emas', 65, '2016-08-05 10:44:39', '2016-08-05 10:44:39'),
(9, 'Zero', 'Log wood', 87, '2016-08-05 10:45:23', '2016-08-05 10:45:23'),
(10, 'Zero', 'Green App', 55, '2016-08-05 10:45:23', '2016-08-05 10:45:23'),
(11, 'Wain', 'rantai', 40, '2016-08-05 10:46:10', '2016-08-05 10:46:10'),
(12, 'Weeble', 'Gundu', 23, '2016-08-05 10:46:10', '2016-08-05 10:54:49'),
(13, 'zena', 'baba', 99, '2016-08-05 14:21:58', '2016-08-05 14:21:58'),
(14, 'adaw', 'stringsss', 10, '0000-00-00 00:00:00', '2016-08-05 14:54:45'),
(15, 'aseqe', 'dsfew23', 6, '2016-08-05 15:00:07', '2016-08-05 15:00:07'),
(19, 'aa', 'sd', 12, '2016-08-08 10:15:21', '2016-08-08 10:15:21'),
(20, 'aa1222', 'aaa', 1, '2016-08-08 10:24:09', '2016-08-08 10:24:09'),
(21, 'aa12345', 'aaaaaa1', 12, '2016-08-08 10:27:01', '2016-08-10 17:01:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
