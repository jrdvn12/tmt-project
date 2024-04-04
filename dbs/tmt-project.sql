-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 09:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmt-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `position`, `created_on`) VALUES
(1, 'admin', '$2y$10$Wxx.dhbG1Z/6t1R4G11.4eguAmrLaQFxnliBrwq2XbXOq9jF/QyGm', 'Angelo', 'Cruz', 'Untitled_design.webp', 'Admin', '2023-07-01'),
(3, 'accountant', '$2y$10$cZSsN4cK6YQuqiyTRmJK9uvkOL2JcOTCgHk9v/lb189vOowKckgdq', 'Jograt', 'Cruz', '', 'Human Resources', '2023-11-03'),
(4, 'hr', '$2y$10$VrVT/jb5.GWTfci0K6gZiufm7AsbZ5sz5Jubo3QL7oGLH9BpWjAJa', 'HR Angelo', 'Cruz', '', 'Human Resources', '2023-11-03'),
(5, '1234', '$2y$10$6uDhydYVDiejdtty.TodlexS4kaLjzb8f96nUkoLjFuF4J.Vs6KnG', 'Admin', 'Nin Mo', '', 'Accountant', '2023-11-06'),
(7, 'admin1', '$2y$10$jpxnq26eYZJQAeEK44kZ4uLRnoGWslc98gPu99gBvt9Qh2jcBad.G', '1234', '1234', '', 'Admin', '2024-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail_record`
--

CREATE TABLE `audit_trail_record` (
  `id` int(11) NOT NULL,
  `audit_date` date NOT NULL,
  `audit_time` time NOT NULL,
  `user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_trail_record`
--

INSERT INTO `audit_trail_record` (`id`, `audit_date`, `audit_time`, `user`, `description`) VALUES
(431, '2024-03-15', '15:59:31', 'Angelo Cruz', 'Added new Raw Materials # date 2024-03-15'),
(432, '2024-03-15', '16:00:19', 'Angelo Cruz', 'Added new Raw Materials # date 2024-03-15'),
(433, '2024-03-15', '16:01:12', 'Angelo Cruz', 'Added new Raw Materials # date 2024-03-15'),
(434, '2024-03-15', '16:02:07', 'Angelo Cruz', 'Added new Raw Materials # date 2024-03-15'),
(435, '2024-03-15', '16:05:16', 'Angelo Cruz', 'Added new Product #TMT48121 date 2024-03-15'),
(436, '2024-03-15', '16:06:08', 'Angelo Cruz', 'Added new Product #TMT412542 date 2024-03-15'),
(437, '2024-03-15', '16:07:01', 'Angelo Cruz', 'Added new Product #TMT457469 date 2024-03-15'),
(438, '2024-03-15', '16:11:08', 'Angelo Cruz', 'Added new Product #202325 date 2024-03-15'),
(439, '2024-03-15', '16:19:24', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-15'),
(440, '2024-03-15', '16:19:31', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-15'),
(441, '2024-03-15', '16:19:39', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-15'),
(442, '2024-03-18', '09:24:44', 'Angelo Cruz', 'User updated accountant date 2024-03-18'),
(443, '2024-03-18', '11:07:40', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-18'),
(444, '2024-03-18', '11:07:45', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-18'),
(445, '2024-03-18', '11:07:53', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-18'),
(446, '2024-03-19', '11:35:39', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-19'),
(447, '2024-03-19', '11:36:56', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-19'),
(448, '2024-03-19', '15:22:56', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-19'),
(449, '2024-03-19', '15:23:09', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-19'),
(450, '2024-03-19', '15:23:18', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-19'),
(451, '2024-03-21', '09:18:03', 'Angelo Cruz', 'User updated accountant date 2024-03-21'),
(452, '2024-03-21', '09:18:37', 'Angelo Cruz', 'User updated 1234 date 2024-03-21'),
(453, '2024-03-21', '09:48:00', 'Angelo Cruz', 'User updated 1234 date 2024-03-21'),
(454, '2024-03-21', '10:05:55', 'Angelo Cruz', 'Added new User Kobs date 2024-03-21'),
(455, '2024-03-21', '10:06:00', 'Angelo Cruz', 'User deleted Kobs date 2024-03-21'),
(456, '2024-03-21', '11:38:38', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(457, '2024-03-21', '11:38:42', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(458, '2024-03-21', '11:38:48', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(459, '2024-03-21', '11:52:30', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(460, '2024-03-21', '11:52:33', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(461, '2024-03-21', '11:52:40', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(462, '2024-03-21', '13:13:16', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(463, '2024-03-21', '13:21:05', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(464, '2024-03-21', '13:37:07', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(465, '2024-03-21', '14:05:30', 'Angelo Cruz', 'Added new Product #202325 date 2024-03-21'),
(466, '2024-03-21', '16:03:29', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(467, '2024-03-21', '17:28:48', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(468, '2024-03-21', '17:30:40', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(469, '2024-03-21', '17:30:52', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(470, '2024-03-21', '17:30:59', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-21'),
(471, '2024-03-25', '17:57:47', 'Angelo Cruz', 'User deleted  date 2024-03-25'),
(472, '2024-03-26', '11:01:58', 'Angelo Cruz', 'User deleted  date 2024-03-26'),
(473, '2024-03-26', '11:02:39', 'Angelo Cruz', 'User deleted  date 2024-03-26'),
(474, '2024-03-26', '11:14:49', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-26'),
(475, '2024-03-26', '11:54:08', 'Angelo Cruz', 'User updated  date 2024-03-26'),
(476, '2024-03-26', '11:55:06', 'Angelo Cruz', 'User updated  date 2024-03-26'),
(477, '2024-03-26', '13:13:53', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-26'),
(478, '2024-03-26', '13:14:01', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-26'),
(479, '2024-03-26', '14:25:59', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-26'),
(480, '2024-03-26', '14:26:05', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-26'),
(481, '2024-03-26', '14:33:17', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-26'),
(482, '2024-04-03', '17:20:39', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-03'),
(483, '2024-04-03', '17:40:33', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-03'),
(484, '2024-04-03', '18:09:19', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-03'),
(485, '2024-04-03', '18:09:23', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-03'),
(486, '2024-04-03', '18:09:28', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-03'),
(487, '2024-04-04', '14:08:28', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(488, '2024-04-04', '14:08:33', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(489, '2024-04-04', '14:08:36', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(490, '2024-04-04', '14:08:40', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(491, '2024-04-04', '14:13:41', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(492, '2024-04-04', '14:19:39', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(493, '2024-04-04', '14:19:45', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(494, '2024-04-04', '14:19:52', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(495, '2024-04-04', '14:19:58', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(496, '2024-04-04', '14:40:05', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(497, '2024-04-04', '14:43:27', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(498, '2024-04-04', '14:47:23', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(499, '2024-04-04', '14:47:33', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(500, '2024-04-04', '14:49:45', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-04-04'),
(501, '2024-04-04', '15:05:20', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04'),
(502, '2024-04-04', '15:05:24', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04'),
(503, '2024-04-04', '15:06:07', 'Angelo Cruz', 'Added new Need Materials # Creamy Corp date 2024-04-04'),
(504, '2024-04-04', '15:06:13', 'Angelo Cruz', 'Added new Need Materials # Made in China date 2024-04-04'),
(505, '2024-04-04', '15:06:21', 'Angelo Cruz', 'Added new Need Materials # Creamy Corp date 2024-04-04'),
(506, '2024-04-04', '15:06:28', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04'),
(507, '2024-04-04', '15:06:37', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04'),
(508, '2024-04-04', '15:06:42', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04'),
(509, '2024-04-04', '15:06:54', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04'),
(510, '2024-04-04', '15:07:03', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `main_inventory`
--

CREATE TABLE `main_inventory` (
  `id` int(255) NOT NULL,
  `product_number` int(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `piececode` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `boxcode` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` double NOT NULL,
  `qty` int(255) NOT NULL,
  `soldstock` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `dateofstock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_raw_materials`
--

CREATE TABLE `main_raw_materials` (
  `id` int(255) NOT NULL,
  `material_code` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `batch` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `expiration` date NOT NULL,
  `kilo` double NOT NULL,
  `dateofstock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `product_number` text NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `piececode` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `boxcode` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` double NOT NULL,
  `material_needs` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `dateofstock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_number`, `photo`, `piececode`, `boxcode`, `product_name`, `price`, `material_needs`, `dateofstock`) VALUES
(5, 'CGCC', 'clasico.png', '4806538456029', '4806538450111', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 10.5, '', '2024-03-15'),
(6, 'CGB', 'brown.png', '4806538450012', '4806538450128', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 10.5, '', '2024-03-15'),
(7, 'CGW', 'white.png', '4806538450005', '4806538450135', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 10.5, '', '2024-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(255) NOT NULL,
  `material_code` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_batch` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `production_status` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `production_pieces` double NOT NULL,
  `production_kilo` double NOT NULL,
  `production_date` date NOT NULL,
  `production_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_needs`
--

CREATE TABLE `product_needs` (
  `id` int(255) NOT NULL,
  `product_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_need` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loads` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_needs`
--

INSERT INTO `product_needs` (`id`, `product_id`, `product_name`, `item_need`, `loads`) VALUES
(61, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 50),
(62, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'Creamy Corp', 20),
(63, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 20),
(64, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'Creamy Corp', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product_needs_history`
--

CREATE TABLE `product_needs_history` (
  `id` int(255) NOT NULL,
  `product_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_need` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loads` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_needs_history`
--

INSERT INTO `product_needs_history` (`id`, `product_id`, `product_name`, `item_need`, `loads`) VALUES
(1, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Salt Company', 5),
(2, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 20),
(3, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Thailand', 1),
(4, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(5, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Salt Company', 20),
(6, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'Creamy Corp', 20),
(7, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 1),
(8, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(9, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 1),
(10, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Thailand', 1),
(11, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 20),
(12, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 20),
(13, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Thailand', 5),
(14, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Salt Company', 20),
(15, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 20),
(16, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(17, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'Creamy Corp', 5),
(18, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 20),
(19, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 1),
(20, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 20),
(21, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 1),
(22, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 1),
(23, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(24, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Salt Company', 5),
(25, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(26, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 1),
(27, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'Creamy Corp', 20),
(28, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(29, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 20),
(30, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 20),
(31, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'Creamy Corp', 5),
(32, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Thailand', 5),
(33, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(34, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 1),
(35, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(36, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(37, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'Creamy Corp', 20),
(38, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 20),
(39, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'Creamy Corp', 20);

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int(255) NOT NULL,
  `material_code` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `material_type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `material_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `material_batch` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loads` double NOT NULL,
  `material_usage` double NOT NULL,
  `material_remaining` double NOT NULL,
  `dateofstock` date NOT NULL,
  `date_expiration` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `material_code`, `material_type`, `material_name`, `material_batch`, `loads`, `material_usage`, `material_remaining`, `dateofstock`, `date_expiration`) VALUES
(5, 'TM44511', 'Creamer', 'Creamy Corp', '20', 300, 0, 300, '2024-03-15', '2024-10-31'),
(6, 'TM45682', 'Salt', 'Salt Company', '5', 200, 0, 200, '2024-03-15', '2025-01-10'),
(7, 'TM45123', 'Plastic', 'Made in China', '5', 400, 0, 400, '2024-03-15', '2025-09-06'),
(8, 'TM156394', 'Pure Coffee', 'Thailand', '10', 900, 0, 900, '2024-03-15', '2024-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trail_record`
--
ALTER TABLE `audit_trail_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_inventory`
--
ALTER TABLE `main_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_raw_materials`
--
ALTER TABLE `main_raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_needs`
--
ALTER TABLE `product_needs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_needs_history`
--
ALTER TABLE `product_needs_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `audit_trail_record`
--
ALTER TABLE `audit_trail_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `main_inventory`
--
ALTER TABLE `main_inventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `main_raw_materials`
--
ALTER TABLE `main_raw_materials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_needs`
--
ALTER TABLE `product_needs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `product_needs_history`
--
ALTER TABLE `product_needs_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
