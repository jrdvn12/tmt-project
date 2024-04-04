-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Mar 15, 2024 at 09:43 AM
=======
-- Generation Time: Mar 18, 2024 at 07:36 AM
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac
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
(3, 'accountant', '$2y$10$cZSsN4cK6YQuqiyTRmJK9uvkOL2JcOTCgHk9v/lb189vOowKckgdq', 'Jograt', 'Cruz', '', '', '2023-11-03'),
(4, 'hr', '$2y$10$VrVT/jb5.GWTfci0K6gZiufm7AsbZ5sz5Jubo3QL7oGLH9BpWjAJa', 'HR Angelo', 'Cruz', '', 'Human Resources', '2023-11-03'),
(5, '1234', '$2y$10$6uDhydYVDiejdtty.TodlexS4kaLjzb8f96nUkoLjFuF4J.Vs6KnG', 'Admin', 'Admin', '', 'Admin', '2023-11-06'),
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
<<<<<<< HEAD
(441, '2024-03-15', '16:19:39', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-15');
=======
(441, '2024-03-15', '16:19:39', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-15'),
(442, '2024-03-18', '09:24:44', 'Angelo Cruz', 'User updated accountant date 2024-03-18'),
(443, '2024-03-18', '11:07:40', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-18'),
(444, '2024-03-18', '11:07:45', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-18'),
(445, '2024-03-18', '11:07:53', 'Angelo Cruz', 'Added new Need Materials #Hi date 2024-03-18');
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac

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
<<<<<<< HEAD
=======
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

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `material_code`, `product_name`, `product_batch`, `production_status`, `production_pieces`, `production_kilo`, `production_date`, `production_expiration`) VALUES
(1, '', '5', '555', 'Preparing', 0, 0, '2024-03-18', '2024-03-18');

-- --------------------------------------------------------

--
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac
-- Table structure for table `product_needs`
--

CREATE TABLE `product_needs` (
  `id` int(255) NOT NULL,
  `product_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_need` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loads` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

<<<<<<< HEAD
=======
--
-- Dumping data for table `product_needs`
--

INSERT INTO `product_needs` (`id`, `product_id`, `product_name`, `item_need`, `loads`) VALUES
(15, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Creamy Corp', 5),
(16, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Made in China', 1),
(17, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Thailand', 20);

>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac
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
<<<<<<< HEAD
=======
  `material_usage` double NOT NULL,
  `material_remaining` double NOT NULL,
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac
  `dateofstock` date NOT NULL,
  `date_expiration` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raw_materials`
--

<<<<<<< HEAD
INSERT INTO `raw_materials` (`id`, `material_code`, `material_type`, `material_name`, `material_batch`, `loads`, `dateofstock`, `date_expiration`) VALUES
(5, 'TM44511', 'Creamer', 'Creamy Corp', '20', 300, '2024-03-15', '2024-10-31'),
(6, 'TM45682', 'Salt', 'Salt Company', '5', 200, '2024-03-15', '2025-01-10'),
(7, 'TM45123', 'Plastic', 'Made in China', '5', 400, '2024-03-15', '2025-09-06'),
(8, 'TM156394', 'Pure Coffee', 'Thailand', '10', 900, '2024-03-15', '2024-09-30');
=======
INSERT INTO `raw_materials` (`id`, `material_code`, `material_type`, `material_name`, `material_batch`, `loads`, `material_usage`, `material_remaining`, `dateofstock`, `date_expiration`) VALUES
(5, 'TM44511', 'Creamer', 'Creamy Corp', '20', 300, 0, 300, '2024-03-15', '2024-10-31'),
(6, 'TM45682', 'Salt', 'Salt Company', '5', 200, 0, 200, '2024-03-15', '2025-01-10'),
(7, 'TM45123', 'Plastic', 'Made in China', '5', 400, 0, 400, '2024-03-15', '2025-09-06'),
(8, 'TM156394', 'Pure Coffee', 'Thailand', '10', 900, 0, 900, '2024-03-15', '2024-09-30');
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac

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
<<<<<<< HEAD
=======
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac
-- Indexes for table `product_needs`
--
ALTER TABLE `product_needs`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `audit_trail_record`
--
ALTER TABLE `audit_trail_record`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `product_needs`
--
ALTER TABLE `product_needs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
=======
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_needs`
--
ALTER TABLE `product_needs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
>>>>>>> 3bff898b871d6010b9aa536480baf802fbbd63ac

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;