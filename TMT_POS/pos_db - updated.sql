-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2024 at 03:34 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `stock` int NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `image` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `encoder` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `barcode` (`barcode`),
  KEY `description` (`description`),
  KEY `qty` (`stock`),
  KEY `user_id` (`user_id`),
  KEY `date` (`date`),
  KEY `views` (`views`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `description`, `stock`, `amount`, `image`, `user_id`, `date`, `views`, `encoder`, `category`) VALUES
(1, '2222472108593', 'Banetti Hazir Noodle', 80, '10.95', 'uploads/019111ea60f176a07807d9be878b7b0ff5d4c52b_5812.jpg', '1', '2022-01-03 18:33:44', 42, 'Rhayli', 'Pasta & Noodles'),
(3, '2222947895764', 'Crisps', 193, '4.95', 'uploads/a376a3a3f34dc21971ca40ac6dd6664585c197a6_4817.jpg', '1', '2022-01-09 08:46:29', 59, 'Rhayli', 'Snacks'),
(4, '2222881344444', 'Burger', 200, '10.00', 'uploads/c322c54a3249e75ca46347a2c4ec9385672cb8e3_5698.jpg', '1', '2022-01-09 08:47:02', 14, 'Rhayli', 'Snacks'),
(5, '1234', 'So good milk', 92, '20.00', 'uploads/e149b8702ddb43e5cda3c10803c563203b27cfc0_6896.jpg', '1', '2022-01-09 08:47:54', 22, 'Rhayli', 'Dairy Products'),
(6, '2222925913231', 'OMO SOFTENER', 82, '50.00', 'uploads/e80200cc753ea342725ba080f668144fe4c763b9_7977.jpg', 'Unknown', '2022-01-16 08:35:24', 56, 'Rhayli', 'Detergent'),
(8, '2222595564534', '7 UP', 46, '34.00', 'uploads/a6f424034ca00dc2c3b55761f2b1c31d689ca215_6797.jpg', '6', '2023-07-01 12:15:13', 3, 'jhypsss', 'Beverages'),
(10, '2222974243584', 'Caramel Moolatte', 22, '5.00', 'uploads/7efe697d3a3cafad54574764253c1c4e5ee3de93_3723.png', '1', '2023-07-01 12:59:42', 6, 'jhypsss', 'Frozen Foods'),
(11, '2222123200968', 'Monster', 200, '45.00', 'uploads/40fbc31c9795970c2b93419196a07354829db713_1986.jpg', '6', '2023-07-01 16:25:41', 3, 'jhypsss', 'Beverages'),
(15, '2222135063866', 'Cola Zero in can', 25, '39.00', 'uploads/a54741bf6d71e0b52ce6cd34d0d526c6dd4e94a6_4751.jpg', '6', '2023-07-03 11:07:15', 1, 'jhypsss', 'Beverages'),
(16, '2222877211304', 'Mirinda', 29, '35.00', 'uploads/e5bc61c49ab567c8e2a921d735f77c19955571c1_5489.jpg', '6', '2023-07-03 11:08:04', 1, 'TUP Admin', 'Beverages'),
(17, '2222774991043', 'Spindrift', 30, '50.00', 'uploads/5e07651f0573ad1d5851ce6ea26eae85d59b67dc_2952.jpg', '6', '2023-07-03 11:08:40', 0, 'TUP Admin', 'Beverages'),
(18, '2222794658425', 'Boost Energy', 45, '50.00', 'uploads/5edd64c0e275bd3cb6e9940773da659adfb228dc_9357.jpg', '6', '2023-07-03 13:20:21', 0, 'TUP Admin', 'Beverages'),
(19, '2222893703661', 'Fifa', 53, '23.00', 'uploads/product/a5ff699d375e9743390192ba1674647dfc51025d_2043.jpg', '6', '2023-07-03 14:11:53', 1, 'TUP Admin', 'Beverages'),
(23, '2223519322434', 'CDO Luncheon Meat 350g', 100, '150.00', 'uploads/product85853e6e9d47bdb7286d1076c1aeabdb0ebe74bc_9138.jpg', '1', '2024-03-26 07:16:38', 0, 'TUP Admin', 'Canned Goods'),
(24, '2223375580155', 'Lucky Me Beef Noodles', 100, '25.00', 'uploads/product7eb433368ec83423b493eb98b515917409b145f7_8232.jpg', '1', '2024-03-26 07:21:19', 0, 'TUP Admin', 'Pasta & Noodles'),
(25, '2223686064536', 'ID Lace', 100, '25.00', 'uploads/product6f21ec36b38e2139a8b5a643e1fcb6b5330e45d1_6010.jfif', '1', '2024-04-02 02:33:17', 0, 'TUP Admin', 'School Supplies'),
(26, '2223155520988', 'Black T-Shirt', 100, '150.00', 'uploads/product5ea1733a8d127449fd3ad4ed51938de31dd3e668_2079.jpg', '1', '2024-04-02 02:33:45', 0, 'TUP Admin', 'Clothing'),
(27, '2223636584775', 'White T-Shirt', 100, '150.00', 'uploads/productf57de05611fffd9ab731fb1ee845793193845dc0_9018.jpg', '1', '2024-04-02 02:34:19', 0, 'TUP Admin', 'Clothing'),
(30, '2223434399143', 'Snapback Hat', 0, '75.00', 'uploads/product3e434d486cd8acf99a8cd93bf97c966f5009d804_9935.jpg', '1', '2024-04-02 02:41:19', 0, 'TUP Admin', 'Clothing'),
(31, '2223780889232', 'Legal Envelop Long', 10, '25.00', 'uploads/product/dd8fbb1526220739db2497422c95f6cf5268c389_4126.jpg', '1', '2024-04-02 02:41:48', 0, 'TUP Admin', 'School Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receipt_no` int DEFAULT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barcode` (`barcode`),
  KEY `user_id` (`user_id`),
  KEY `date` (`date`),
  KEY `description` (`description`),
  KEY `receipt_no` (`receipt_no`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `barcode`, `receipt_no`, `description`, `qty`, `amount`, `total`, `date`, `user_id`) VALUES
(7, '1234', 3, 'So good milk', 1, '20.00', '20.00', '2024-02-17 11:11:37', '1'),
(8, '2222472108593', 4, 'Biscuits', 2, '10.95', '21.90', '2024-02-17 19:50:49', '1'),
(9, '2222472108593', 5, 'Biscuits', 2, '10.95', '21.90', '2024-03-17 19:52:19', '1'),
(10, '2222472108593', 6, 'Biscuits', 1, '10.95', '10.95', '2024-03-17 19:52:40', '1'),
(11, '2222925913231', 7, 'OMO SOFTENER', 1, '50.00', '50.00', '2023-01-17 19:56:02', '1'),
(12, '1234', 8, 'So good milk', 2, '20.00', '40.00', '2023-01-17 20:00:02', '1'),
(13, '1234', 9, 'So good milk', 1, '20.00', '20.00', '2023-04-17 19:57:44', '1'),
(14, '1234', 10, 'So good milk', 3, '20.00', '60.00', '2023-04-17 19:57:53', '1'),
(207, '1234', 8, 'So good milk', 2, '20.00', '40.00', '2024-04-01 20:00:02', '1'),
(208, '1234', 9, 'So good milk', 1, '20.00', '20.00', '2024-04-01 20:00:02', '1'),
(209, '1234', 10, 'So good milk', 3, '20.00', '60.00', '2024-04-02 20:00:02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'male',
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `void_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `date` (`date`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`, `role`, `gender`, `deletable`, `void_code`) VALUES
(1, 'TUP Admin', 'tup@tup.com', '$2y$10$nah2kwq0IHoepQc/JDV78OgQVfz5fS3X3qZRhqnP5qc7LOYJKS.Yi', '2021-12-28 09:33:15', 'uploads/b9f374a1b62b51b3ded23d37248aa8ab5f9d34fc_3518.png', 'admin', 'male', 0, '12345'),
(2, 'Keqing', 'keqing@email.com', '$2y$10$nah2kwq0IHoepQc/JDV78OgQVfz5fS3X3qZRhqnP5qc7LOYJKS.Yi', '2021-12-28 10:39:58', 'uploads/user/c73cac02fb8be32cd2d07a65c6092db6c04a074e_7337.png', 'cashier', 'female', 1, ''),
(5, 'some user', 'mail@mail.com', '$2y$10$nah2kwq0IHoepQc/JDV78OgQVfz5fS3X3qZRhqnP5qc7LOYJKS.Yi', '2022-02-17 19:13:49', NULL, 'user', 'male', 0, ''),
(6, 'jhypsss', 'jhypsss@gmail.com', '$2y$10$B1pjLAulfY8VtxAIR8gJUOjjAjYaVRJbm2N8xSVTQH8DXXmmlLlIO', '2023-07-01 09:30:31', 'uploads/7f4a7b046709ce53086ca3a737267c6823681445_6624.jpg', 'admin', 'male', 0, '54321'),
(7, 'bocchi', 'bocchi@gmail.com', '$2y$10$nah2kwq0IHoepQc/JDV78OgQVfz5fS3X3qZRhqnP5qc7LOYJKS.Yi', '2023-07-01 09:31:07', 'uploads/71266d5faa035f21973b3dc9e234bac0cc299bab_8219.jpg', 'supervisor', 'female', 1, ''),
(8, 'Lylle', 'lylle@gmail.com', '$2y$10$PFJWAx70jLZlQBDU8vdLmeXuUWwej/hZdKKWZhKtYS.SpCqujhdP6', '2023-07-02 19:53:31', 'uploads/user/46168ddf4212a9f488b6e226ea8eda9618da3a45_1651.jpg', 'cashier', 'male', 1, ''),
(9, 'Kobe', 'kobe@gmail.com', '$2y$10$Ebbr//0./97Tj9/fk2unAujplitV7VCm7AJYfQkuDv99BBIvLVRuS', '2023-07-02 19:56:28', NULL, 'supervisor', 'male', 1, ''),
(10, 'sam', 'sam@gmail.com', '$2y$10$8Ysz5pGB0j/ngy3VS2qUWufO4kZstqgvZU8gAWQ3IRNMnruqxiRc2', '2023-07-02 19:57:29', NULL, 'user', 'female', 1, ''),
(11, 'Rhayli', 'rhayli@gmail.com', '$2y$10$NsyhkVpAl32bEHVUCw2anuS76RbRPWXCCrRhjbzoea81pKY33Ye1S', '2023-07-02 19:58:44', NULL, 'admin', 'male', 1, '678910'),
(12, 'Wednesday', 'wednesday@gmail.com', '$2y$10$UtXmSXM03dnnp51mwFGYVuz5F46aeAdTQi3FnUz95iBMxlepbr3Zy', '2023-07-03 12:02:31', 'uploads/188e2135e926173ebb76e6894cce1f51e1b3b42d_2500.jpg', 'supervisor', 'female', 1, ''),
(13, 'Power', 'power@gmail.com', '$2y$10$hB4fuVl9jTWv5vALhbxbwOUGGsalqC/6YphH3H5AdVBi5L85Sf5pu', '2023-07-03 12:09:34', 'uploads/97aa685e4581bf69b223f762454fd338c019f816_9114.jpg', 'cashier', 'female', 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
