-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 08:48 AM
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
(3, 'accountant', '$2y$10$cZSsN4cK6YQuqiyTRmJK9uvkOL2JcOTCgHk9v/lb189vOowKckgdq', 'Angelo', 'Cruz', '', 'Supervisor', '2023-11-03'),
(4, 'distributor', '$2y$10$VrVT/jb5.GWTfci0K6gZiufm7AsbZ5sz5Jubo3QL7oGLH9BpWjAJa', 'Distributor Angelo', 'Cruz', '', 'Distributor Admin', '2023-11-03'),
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
(510, '2024-04-04', '15:07:03', 'Angelo Cruz', 'Product load needs updated Materials # Creamy Corp date 2024-04-04'),
(511, '2024-04-04', '15:46:27', 'Angelo Cruz', 'Added new Type Raw Materials #Sugar date 2024-04-04'),
(512, '2024-04-04', '15:47:48', 'Angelo Cruz', 'Added new Raw Materials # date 2024-04-04'),
(513, '2024-04-04', '15:47:51', 'Angelo Cruz', 'User deleted  date 2024-04-04'),
(514, '2024-04-04', '15:49:01', 'Angelo Cruz', 'User deleted  date 2024-04-04'),
(515, '2024-04-04', '16:03:13', 'Angelo Cruz', 'Added new Type Raw Materials #Sugar date 2024-04-04'),
(516, '2024-04-04', '16:03:42', 'Angelo Cruz', 'Added new Type Raw Materials #MILK date 2024-04-04'),
(517, '2024-04-04', '16:06:21', 'Angelo Cruz', 'Added new Type Raw Materials #MILK date 2024-04-04'),
(518, '2024-04-04', '16:07:34', 'Angelo Cruz', 'Added new Type Raw Materials #Sugar date 2024-04-04'),
(519, '2024-04-04', '16:11:21', 'Angelo Cruz', 'Added new Type Raw Materials #Pure Coffee date 2024-04-04'),
(520, '2024-04-05', '14:55:29', '1234 1234', 'Added new Type Raw Materials #Sugar date 2024-04-05'),
(521, '2024-04-05', '14:56:22', '1234 1234', 'Added new Type Raw Materials #Non-Dairy Creamer date 2024-04-05'),
(522, '2024-04-05', '14:57:25', '1234 1234', 'Added new Type Raw Materials #Pure Coffee Powder date 2024-04-05'),
(523, '2024-04-05', '14:58:31', '1234 1234', 'Added new Type Raw Materials #Ground Cofee date 2024-04-05'),
(524, '2024-04-05', '15:00:15', '1234 1234', 'Added new Type Raw Materials #Coffee Blend date 2024-04-05'),
(525, '2024-04-05', '15:00:58', '1234 1234', 'Added new Type Raw Materials #Salt date 2024-04-05'),
(526, '2024-04-05', '15:02:52', '1234 1234', 'Added new Type Raw Materials #HG Pure Coffee date 2024-04-05'),
(527, '2024-04-05', '15:03:38', '1234 1234', 'Added new Type Raw Materials #PB Coffee Blend date 2024-04-05'),
(528, '2024-04-05', '15:03:54', '1234 1234', 'Added new Type Raw Materials #MF Ground Coffee date 2024-04-05'),
(529, '2024-04-05', '15:04:38', '1234 1234', 'Added new Type Raw Materials #Plastic Package  date 2024-04-05'),
(530, '2024-04-05', '15:04:46', '1234 1234', 'Added new Type Raw Materials #Box date 2024-04-05'),
(531, '2024-04-05', '15:05:54', '1234 1234', 'Added new Type Raw Materials #ASK Milk date 2024-04-05'),
(532, '2024-04-05', '15:06:19', '1234 1234', 'Added new Type Raw Materials #FL Caffeine date 2024-04-05'),
(533, '2024-04-05', '15:06:55', '1234 1234', 'Added new Type Raw Materials #FL Roasted Coffee  date 2024-04-05'),
(534, '2024-04-05', '15:11:11', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(535, '2024-04-05', '15:13:19', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(536, '2024-04-05', '15:13:56', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(537, '2024-04-05', '15:14:19', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(538, '2024-04-05', '15:14:43', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(539, '2024-04-05', '15:15:16', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(540, '2024-04-05', '15:15:35', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(541, '2024-04-05', '15:15:58', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(542, '2024-04-05', '15:16:23', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(543, '2024-04-05', '15:16:59', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(544, '2024-04-05', '15:17:57', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(545, '2024-04-05', '15:18:20', '1234 1234', 'Added new Type Raw Materials #Powdered Milk date 2024-04-05'),
(546, '2024-04-05', '15:18:45', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(547, '2024-04-05', '15:23:13', '1234 1234', 'Added new Need Materials # Brand Name date 2024-04-05'),
(548, '2024-04-05', '15:23:39', '1234 1234', 'Product load needs updated Materials # Brand Name date 2024-04-05'),
(549, '2024-04-05', '15:23:58', '1234 1234', 'Product load needs updated Materials # Brand Name date 2024-04-05'),
(550, '2024-04-05', '15:24:16', '1234 1234', 'Product load needs updated Materials # Brand Name date 2024-04-05'),
(551, '2024-04-05', '15:24:36', '1234 1234', 'Product load needs updated Materials # Brand Name date 2024-04-05'),
(552, '2024-04-05', '15:25:01', '1234 1234', 'Added new Need Materials # Brand Name date 2024-04-05'),
(553, '2024-04-05', '15:25:06', '1234 1234', 'Added new Need Materials # Brand Name date 2024-04-05'),
(554, '2024-04-05', '15:25:11', '1234 1234', 'Added new Need Materials # Brand Name date 2024-04-05'),
(555, '2024-04-05', '15:30:43', '1234 1234', 'Added new Need Materials # SGR-R date 2024-04-05'),
(556, '2024-04-05', '15:30:47', '1234 1234', 'Added new Need Materials # COF-HG50 date 2024-04-05'),
(557, '2024-04-05', '15:33:11', '1234 1234', 'Product load needs updated Materials # SGR-R date 2024-04-05'),
(558, '2024-04-05', '15:33:16', '1234 1234', 'Product load needs updated Materials # SGR-R date 2024-04-05'),
(559, '2024-04-05', '15:33:24', '1234 1234', 'Product load needs updated Materials # SGR-R date 2024-04-05'),
(560, '2024-04-05', '15:33:53', '1234 1234', 'Added new Need Materials # SGR-R date 2024-04-05'),
(561, '2024-04-05', '15:34:00', '1234 1234', 'Added new Need Materials # NDC date 2024-04-05'),
(562, '2024-04-05', '15:34:09', '1234 1234', 'Added new Need Materials # COF-HG50 date 2024-04-05'),
(563, '2024-04-05', '15:34:20', '1234 1234', 'Added new Need Materials # COF-PB6 date 2024-04-05'),
(564, '2024-04-05', '15:34:29', '1234 1234', 'Added new Need Materials # COF-MF878968 date 2024-04-05'),
(565, '2024-04-05', '15:34:39', '1234 1234', 'Added new Need Materials # COF-FL722092 date 2024-04-05'),
(566, '2024-04-05', '15:34:49', '1234 1234', 'Added new Need Materials # SLT-FI date 2024-04-05'),
(567, '2024-04-05', '15:34:58', '1234 1234', 'Added new Need Materials # ASK date 2024-04-05'),
(568, '2024-04-05', '15:35:12', '1234 1234', 'Added new Need Materials # SGR-R date 2024-04-05'),
(569, '2024-04-05', '15:35:19', '1234 1234', 'Product load needs updated Materials # NDC date 2024-04-05'),
(570, '2024-04-05', '15:35:35', '1234 1234', 'Product load needs updated Materials # COF-HG50 date 2024-04-05'),
(571, '2024-04-05', '15:36:25', '1234 1234', 'Added new Need Materials # NDC date 2024-04-05'),
(572, '2024-04-05', '15:36:39', '1234 1234', 'Added new Need Materials # COF-HG50 date 2024-04-05'),
(573, '2024-04-05', '15:36:49', '1234 1234', 'Added new Need Materials # COF-PB6 date 2024-04-05'),
(574, '2024-04-05', '15:37:07', '1234 1234', 'Added new Need Materials # COF-MF878968 date 2024-04-05'),
(575, '2024-04-05', '15:37:17', '1234 1234', 'Added new Need Materials # COF-FL578906 date 2024-04-05'),
(576, '2024-04-05', '15:37:25', '1234 1234', 'Added new Need Materials # COF-FL722092 date 2024-04-05'),
(577, '2024-04-05', '15:37:38', '1234 1234', 'Added new Need Materials # SLT-FI date 2024-04-05'),
(578, '2024-04-05', '15:37:51', '1234 1234', 'Added new Need Materials # ASK date 2024-04-05'),
(579, '2024-04-05', '15:38:05', '1234 1234', 'Added new Need Materials # MLK-704217 date 2024-04-05'),
(580, '2024-04-05', '15:38:16', '1234 1234', 'Added new Need Materials # SGR-R date 2024-04-05'),
(581, '2024-04-05', '15:38:27', '1234 1234', 'Added new Need Materials # NDC date 2024-04-05'),
(582, '2024-04-05', '15:38:42', '1234 1234', 'Added new Need Materials # COF-HG50 date 2024-04-05'),
(583, '2024-04-05', '15:38:48', '1234 1234', 'Added new Need Materials # COF-PB6 date 2024-04-05'),
(584, '2024-04-05', '15:39:10', '1234 1234', 'Added new Need Materials # COF-FL578906 date 2024-04-05'),
(585, '2024-04-05', '15:39:21', '1234 1234', 'Added new Need Materials # COF-FL722092 date 2024-04-05'),
(586, '2024-04-05', '15:39:38', '1234 1234', 'Added new Need Materials # COF-MF878968 date 2024-04-05'),
(587, '2024-04-05', '15:39:48', '1234 1234', 'Product load needs updated Materials # SLT-FI date 2024-04-05'),
(588, '2024-04-05', '15:40:07', '1234 1234', 'Added new Need Materials # SLT-FI date 2024-04-05'),
(589, '2024-04-05', '15:40:20', '1234 1234', 'Added new Need Materials # ASK date 2024-04-05'),
(590, '2024-04-05', '15:41:14', '1234 1234', 'Added new Type Raw Materials #Sugar B date 2024-04-05'),
(591, '2024-04-05', '15:41:37', '1234 1234', 'Added new Raw Materials # date 2024-04-05'),
(592, '2024-04-05', '15:41:54', '1234 1234', 'Added new Need Materials # SGR-B578903 date 2024-04-05'),
(593, '2024-04-08', '15:15:26', 'Angelo Cruz', 'Added new Raw Materials # date 2024-04-08'),
(594, '2024-04-22', '15:40:59', 'Angelo Cruz', 'Added new Vendor #TMTTMT FOODS date 2024-04-22'),
(595, '2024-04-23', '14:25:48', 'Angelo Cruz', 'Vendor updated TMT1 date 2024-04-23'),
(596, '2024-04-23', '14:25:55', 'Angelo Cruz', 'Vendor updated TMT date 2024-04-23'),
(597, '2024-04-26', '15:44:27', 'Angelo Cruz', 'User updated accountant date 2024-04-26'),
(598, '2024-04-26', '15:44:41', 'Angelo Cruz', 'User updated hr date 2024-04-26'),
(599, '2024-04-26', '15:53:15', 'Angelo Cruz', 'User updated hr date 2024-04-26'),
(600, '2024-04-26', '15:53:28', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(601, '2024-04-26', '15:53:38', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(602, '2024-04-26', '15:53:40', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(603, '2024-04-26', '15:53:45', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(604, '2024-04-26', '15:53:59', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(605, '2024-04-26', '15:54:05', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(606, '2024-04-26', '15:55:14', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(607, '2024-04-26', '15:55:18', 'Angelo Cruz', 'User updated distributor date 2024-04-26'),
(608, '2024-04-30', '13:36:23', 'Angelo Cruz', 'Added new User sdasd date 2024-04-30'),
(609, '2024-04-30', '13:36:31', 'Angelo Cruz', 'User deleted sdasd date 2024-04-30'),
(610, '2024-04-30', '15:58:41', 'Angelo Cruz', 'Added new Vendor #MTMMTM date 2024-04-30'),
(611, '2024-05-28', '17:00:34', 'Angelo Cruz', 'Added new User 202325 date 2024-05-28'),
(612, '2024-05-28', '17:00:45', 'Angelo Cruz', 'User deleted 202325 date 2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `before_sale`
--

CREATE TABLE `before_sale` (
  `id` int(11) NOT NULL,
  `invoice_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_inventory`
--

CREATE TABLE `main_inventory` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_number` text NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `batch` text NOT NULL,
  `piececode` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `boxcode` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` double NOT NULL,
  `qty` int(255) NOT NULL,
  `soldstock` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `dateofstock` date NOT NULL,
  `product_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_inventory`
--

INSERT INTO `main_inventory` (`id`, `product_id`, `product_number`, `photo`, `batch`, `piececode`, `boxcode`, `product_name`, `price`, `qty`, `soldstock`, `balance`, `dateofstock`, `product_expiration`) VALUES
(36, 5, 'CGCC', 'clasico.png', '13131', '4806538456029', '4806538450111', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 10.5, 10980, 0, 10980, '2024-04-25', '2025-04-25'),
(39, 6, 'CGB', 'brown.png', '4234234', '4806538450012', '4806538450128', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 10.5, 10980, 0, 10980, '2024-04-25', '2025-04-25'),
(42, 7, 'CGW', 'white.png', '2312312', '4806538450005', '4806538450135', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 10.5, 10980, 0, 10980, '2024-04-25', '2025-04-25');

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
(5, 'CGCC', 'clasico.png', '4806538450029', '4806538450111', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 10.5, '', '2024-03-15'),
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

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `material_code`, `product_name`, `product_batch`, `production_status`, `production_pieces`, `production_kilo`, `production_date`, `production_expiration`) VALUES
(30, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', '13131', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(31, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', '12313', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(32, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', '2321324', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(33, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', '4234234', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(34, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', '11223', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(36, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', '113131', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(37, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', '2312312', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(38, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', '21321312', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(39, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', '2321312', 'Completed', 10980, 0, '2024-04-25', '2025-04-25'),
(40, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', '4234234', 'Completed', 10980, 0, '2024-04-29', '2025-04-29');

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
(71, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'SGR-R', 150.87),
(72, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'NDC', 116.46),
(73, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-HG50', 15),
(74, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-PB6', 15),
(75, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-MF878968', 0.675),
(76, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-FL722092', 0.675),
(77, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'SLT-FI', 1.08),
(78, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'ASK', 0.105),
(79, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'SGR-R', 141.45),
(80, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'NDC', 133.92),
(81, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-HG50', 10.71),
(82, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-PB6', 10.71),
(83, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-MF878968', 1.065),
(84, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-FL578906', 0.645),
(85, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-FL722092', 0.525),
(86, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'SLT-FI', 0.435),
(87, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'ASK', 0.435),
(88, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'MLK-704217', 0.435),
(89, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'SGR-R', 146.64),
(90, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'NDC', 121.98),
(91, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-HG50', 14.43),
(92, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-PB6', 14.43),
(93, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-FL578906', 0.66),
(94, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-FL722092', 0.54),
(95, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-MF878968', 0.225),
(96, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'SLT-FI', 0.54),
(97, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'ASK', 0.105),
(98, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'SGR-B578903', 0.45);

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
(39, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'Creamy Corp', 20),
(40, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Brand Name', 150.87),
(41, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'Brand Name', 10),
(42, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'Brand Name', 5),
(43, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'Brand Name', 5),
(44, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'SGR-R', 116.46),
(45, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-HG50', 5),
(46, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'SGR-R', 150.87),
(47, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'NDC', 116.46),
(48, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-HG50', 15),
(49, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-PB6', 15),
(50, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-MF878968', 0.675),
(51, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'COF-FL722092', 0.675),
(52, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'SLT-FI', 0.54),
(53, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'ASK', 0.105),
(54, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'SGR-R', 141.45),
(55, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'NDC', 133.92),
(56, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-HG50', 10.71),
(57, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-PB6', 10.71),
(58, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-MF878968', 1.065),
(59, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-FL578906', 0.645),
(60, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'COF-FL722092', 0.525),
(61, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'SLT-FI', 0.435),
(62, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', 'ASK', 0.435),
(63, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'MLK-704217', 0.435),
(64, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'SGR-R', 146.64),
(65, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'NDC', 121.98),
(66, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-HG50', 14.43),
(67, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-PB6', 14.43),
(68, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-FL578906', 0.66),
(69, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-FL722092', 0.54),
(70, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'COF-MF878968', 0.225),
(71, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'SLT-FI', 0.54),
(72, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'ASK', 0.105),
(73, '6', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Brown) ', 'SGR-B578903', 0.45);

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
(22, 'SGR-R', '7', 'Brand Name', '50', 10000, 0, 0, '2024-04-05', '2024-07-10'),
(23, 'NDC', '8', 'Brand Name', '10235478', 10000, 1233.54, 8766.46, '2024-04-05', '2024-07-10'),
(24, 'COF-HG50', '13', 'Brand Name', '145874', 10000, 135.42, 9864.58, '2024-04-05', '2024-09-01'),
(25, 'COF-PB6', '14', 'Brand Name', '4573651', 10000, 135.42, 9864.58, '2024-04-05', '2024-10-01'),
(26, 'COF-MF878968', '15', 'Brand Name', '45003697', 10000, 6.57, 9993.43, '2024-04-05', '2024-06-25'),
(27, 'COF-FL578906', '19', 'Brand Name', '00236974', 10000, 3.915, 9996.085, '2024-04-05', '2025-01-01'),
(28, 'COF-FL722092', '20', 'Brand Name', '00369745', 10000, 5.895, 9994.105, '2024-04-05', '2025-01-01'),
(29, 'SLT-FI', '12', 'Brand Name', '11236954', 10000, 7.245, 9992.755, '2024-04-05', '2026-01-01'),
(30, 'ASK', '18', 'Brand Name', '4456312', 10000, 2.04, 9997.96, '2024-04-05', '2024-05-30'),
(31, 'BOX-00', '17', 'Brand Name', '66542137', 5000, 0, 0, '2024-04-05', '2026-02-01'),
(32, 'PPK-0145', '16', 'Brand Name', '88451230', 5000, 0, 0, '2024-04-05', '2026-02-01'),
(33, 'MLK-704217', '21', 'Brand Name', '33125947', 10000, 1.74, 9998.26, '2024-04-05', '2024-08-01'),
(34, 'SGR-B578903', '22', 'Brand Name', '4458712', 10000, 1.35, 9998.65, '2024-04-05', '2024-11-02'),
(35, 'ASK1', '18', 'Name', '4646465', 10000, 0, 0, '2024-04-08', '2024-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(255) NOT NULL,
  `invoice_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_code` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` double NOT NULL,
  `qty` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_amount` double NOT NULL,
  `time_sales` time NOT NULL,
  `date_sales` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `invoice_id`, `product_id`, `product_code`, `price`, `qty`, `total_amount`, `time_sales`, `date_sales`) VALUES
(160, '2024-7803546192-033140', '5', 'CGCC', 10.5, '1', 10.5, '03:31:40', '2024-05-17'),
(161, '2024-3071946285-040126', '5', 'CGCC', 10.5, '1', 10.5, '04:01:26', '2024-05-17'),
(162, '2024-7063152489-040142', '7', 'CGW', 10.5, '3', 31.5, '04:01:42', '2024-05-17'),
(163, '2024-2059764831-040203', '7', 'CGW', 10.5, '3', 31.5, '04:02:03', '2024-05-17'),
(164, '2024-0471958263-053239', '7', 'CGW', 10.5, '1', 10.5, '05:32:39', '2024-05-28'),
(165, '2024-0471958263-053239', '6', 'CGB', 10.5, '2', 21, '05:32:39', '2024-05-28'),
(166, '2024-0471958263-053239', '5', 'CGCC', 10.5, '2', 21, '05:32:39', '2024-05-28'),
(167, '2024-5602914783-053311', '7', 'CGW', 10.5, '1', 10.5, '05:33:11', '2024-05-28'),
(168, '2024-5602914783-053311', '6', 'CGB', 10.5, '2', 21, '05:33:11', '2024-05-28'),
(169, '2024-5602914783-053311', '5', 'CGCC', 10.5, '2', 21, '05:33:11', '2024-05-28'),
(170, '2024-2849705631-053619', '7', 'CGW', 10.5, '1', 10.5, '05:36:19', '2024-05-28'),
(171, '2024-2849705631-053619', '6', 'CGB', 10.5, '2', 21, '05:36:19', '2024-05-28'),
(172, '2024-2849705631-053619', '5', 'CGCC', 10.5, '2', 21, '05:36:19', '2024-05-28'),
(173, '2024-2973846015-053623', '7', 'CGW', 10.5, '1', 10.5, '05:36:23', '2024-05-28'),
(174, '2024-2973846015-053623', '6', 'CGB', 10.5, '2', 21, '05:36:23', '2024-05-28'),
(175, '2024-2973846015-053623', '5', 'CGCC', 10.5, '2', 21, '05:36:23', '2024-05-28'),
(176, '2024-7815623904-053706', '7', 'CGW', 10.5, '1', 10.5, '05:37:06', '2024-05-28'),
(177, '2024-7815623904-053706', '6', 'CGB', 10.5, '2', 21, '05:37:06', '2024-05-28'),
(178, '2024-7815623904-053706', '5', 'CGCC', 10.5, '2', 21, '05:37:06', '2024-05-28'),
(179, '2024-1587360249-053708', '7', 'CGW', 10.5, '1', 10.5, '05:37:08', '2024-05-28'),
(180, '2024-1587360249-053708', '6', 'CGB', 10.5, '2', 21, '05:37:08', '2024-05-28'),
(181, '2024-1587360249-053708', '5', 'CGCC', 10.5, '2', 21, '05:37:08', '2024-05-28'),
(182, '2024-6897520143-053711', '7', 'CGW', 10.5, '1', 10.5, '05:37:11', '2024-05-28'),
(183, '2024-6897520143-053711', '6', 'CGB', 10.5, '2', 21, '05:37:11', '2024-05-28'),
(184, '2024-6897520143-053711', '5', 'CGCC', 10.5, '2', 21, '05:37:11', '2024-05-28'),
(185, '2024-7286493105-053712', '7', 'CGW', 10.5, '1', 10.5, '05:37:12', '2024-05-28'),
(186, '2024-7286493105-053712', '6', 'CGB', 10.5, '2', 21, '05:37:12', '2024-05-28'),
(187, '2024-7286493105-053712', '5', 'CGCC', 10.5, '2', 21, '05:37:12', '2024-05-28'),
(188, '2024-3072195486-054045', '7', 'CGW', 10.5, '1', 10.5, '05:40:45', '2024-05-28'),
(189, '2024-5890163742-054057', '7', 'CGW', 10.5, '1', 10.5, '05:40:57', '2024-05-28'),
(190, '2024-5890163742-054057', '6', 'CGB', 10.5, '2', 21, '05:40:57', '2024-05-28'),
(191, '2024-5890163742-054057', '5', 'CGCC', 10.5, '2', 21, '05:40:57', '2024-05-28'),
(192, '2024-5684927301-054101', '7', 'CGW', 10.5, '1', 10.5, '05:41:01', '2024-05-28'),
(193, '2024-5684927301-054101', '6', 'CGB', 10.5, '2', 21, '05:41:01', '2024-05-28'),
(194, '2024-5684927301-054101', '5', 'CGCC', 10.5, '2', 21, '05:41:01', '2024-05-28'),
(195, '2024-3671240895-054132', '7', 'CGW', 10.5, '1', 10.5, '05:41:32', '2024-05-28'),
(196, '2024-3671240895-054132', '6', 'CGB', 10.5, '2', 21, '05:41:32', '2024-05-28'),
(197, '2024-3671240895-054132', '5', 'CGCC', 10.5, '2', 21, '05:41:32', '2024-05-28'),
(198, '2024-3165298074-054135', '7', 'CGW', 10.5, '1', 10.5, '05:41:35', '2024-05-28'),
(199, '2024-3165298074-054135', '6', 'CGB', 10.5, '2', 21, '05:41:35', '2024-05-28'),
(200, '2024-3165298074-054135', '5', 'CGCC', 10.5, '2', 21, '05:41:35', '2024-05-28'),
(201, '2024-7136952084-054148', '7', 'CGW', 10.5, '1', 10.5, '05:41:48', '2024-05-28'),
(202, '2024-7136952084-054148', '6', 'CGB', 10.5, '1', 10.5, '05:41:48', '2024-05-28'),
(203, '2024-7136952084-054148', '5', 'CGCC', 10.5, '1', 10.5, '05:41:48', '2024-05-28'),
(204, '2024-3175682094-054157', '7', 'CGW', 10.5, '1', 10.5, '05:41:57', '2024-05-28'),
(205, '2024-3175682094-054157', '6', 'CGB', 10.5, '1', 10.5, '05:41:57', '2024-05-28'),
(206, '2024-3175682094-054157', '5', 'CGCC', 10.5, '1', 10.5, '05:41:57', '2024-05-28'),
(207, '2024-9728130564-054232', '7', 'CGW', 10.5, '1', 10.5, '05:42:32', '2024-05-28'),
(208, '2024-9728130564-054232', '6', 'CGB', 10.5, '1', 10.5, '05:42:32', '2024-05-28'),
(209, '2024-9728130564-054232', '5', 'CGCC', 10.5, '1', 10.5, '05:42:32', '2024-05-28'),
(210, '2024-7935162804-054235', '7', 'CGW', 10.5, '1', 10.5, '05:42:35', '2024-05-28'),
(211, '2024-7935162804-054235', '6', 'CGB', 10.5, '1', 10.5, '05:42:35', '2024-05-28'),
(212, '2024-7935162804-054235', '5', 'CGCC', 10.5, '1', 10.5, '05:42:35', '2024-05-28'),
(213, '2024-3641587902-054256', '7', 'CGW', 10.5, '1', 10.5, '05:42:56', '2024-05-28'),
(214, '2024-3641587902-054256', '6', 'CGB', 10.5, '1', 10.5, '05:42:56', '2024-05-28'),
(215, '2024-3641587902-054256', '5', 'CGCC', 10.5, '1', 10.5, '05:42:56', '2024-05-28'),
(216, '2024-5742389106-054259', '7', 'CGW', 10.5, '1', 10.5, '05:42:59', '2024-05-28'),
(217, '2024-5742389106-054259', '6', 'CGB', 10.5, '1', 10.5, '05:42:59', '2024-05-28'),
(218, '2024-5742389106-054259', '5', 'CGCC', 10.5, '1', 10.5, '05:42:59', '2024-05-28'),
(219, '2024-8531046279-054313', '7', 'CGW', 10.5, '1', 10.5, '05:43:13', '2024-05-28'),
(220, '2024-8531046279-054313', '6', 'CGB', 10.5, '1', 10.5, '05:43:13', '2024-05-28'),
(221, '2024-8531046279-054313', '5', 'CGCC', 10.5, '1', 10.5, '05:43:13', '2024-05-28'),
(222, '2024-5086237941-054349', '7', 'CGW', 10.5, '1', 10.5, '05:43:49', '2024-05-28'),
(223, '2024-5086237941-054349', '6', 'CGB', 10.5, '1', 10.5, '05:43:49', '2024-05-28'),
(224, '2024-5086237941-054349', '5', 'CGCC', 10.5, '1', 10.5, '05:43:49', '2024-05-28'),
(225, '2024-3472590186-054356', '7', 'CGW', 10.5, '1', 10.5, '05:43:56', '2024-05-28'),
(226, '2024-3472590186-054356', '6', 'CGB', 10.5, '1', 10.5, '05:43:56', '2024-05-28'),
(227, '2024-3472590186-054356', '5', 'CGCC', 10.5, '1', 10.5, '05:43:56', '2024-05-28'),
(228, '2024-7964850132-054415', '7', 'CGW', 10.5, '1', 10.5, '05:44:15', '2024-05-28'),
(229, '2024-7964850132-054415', '6', 'CGB', 10.5, '1', 10.5, '05:44:15', '2024-05-28'),
(230, '2024-7964850132-054415', '5', 'CGCC', 10.5, '1', 10.5, '05:44:15', '2024-05-28'),
(231, '2024-9827065341-054425', '6', 'CGB', 10.5, '1', 10.5, '05:44:25', '2024-05-28'),
(232, '2024-9827065341-054425', '7', 'CGW', 10.5, '1', 10.5, '05:44:25', '2024-05-28'),
(233, '2024-9827065341-054425', '5', 'CGCC', 10.5, '1', 10.5, '05:44:25', '2024-05-28'),
(234, '2024-8260193457-054427', '6', 'CGB', 10.5, '1', 10.5, '05:44:27', '2024-05-28'),
(235, '2024-8260193457-054427', '7', 'CGW', 10.5, '1', 10.5, '05:44:27', '2024-05-28'),
(236, '2024-8260193457-054427', '5', 'CGCC', 10.5, '1', 10.5, '05:44:27', '2024-05-28'),
(237, '2024-2087315496-054508', '6', 'CGB', 10.5, '1', 10.5, '05:45:08', '2024-05-28'),
(238, '2024-2087315496-054508', '7', 'CGW', 10.5, '1', 10.5, '05:45:08', '2024-05-28'),
(239, '2024-2087315496-054508', '5', 'CGCC', 10.5, '1', 10.5, '05:45:08', '2024-05-28'),
(240, '2024-3541978062-054528', '6', 'CGB', 10.5, '3', 31.5, '05:45:28', '2024-05-28'),
(241, '2024-3541978062-054528', '7', 'CGW', 10.5, '2', 21, '05:45:28', '2024-05-28'),
(242, '2024-3541978062-054528', '5', 'CGCC', 10.5, '1', 10.5, '05:45:28', '2024-05-28'),
(243, '2024-0369517428-054540', '6', 'CGB', 10.5, '3', 31.5, '05:45:40', '2024-05-28'),
(244, '2024-0369517428-054540', '7', 'CGW', 10.5, '2', 21, '05:45:40', '2024-05-28'),
(245, '2024-0369517428-054540', '5', 'CGCC', 10.5, '1', 10.5, '05:45:40', '2024-05-28'),
(246, '2024-1785602943-054606', '6', 'CGB', 10.5, '3', 31.5, '05:46:06', '2024-05-28'),
(247, '2024-1785602943-054606', '7', 'CGW', 10.5, '2', 21, '05:46:06', '2024-05-28'),
(248, '2024-1785602943-054606', '5', 'CGCC', 10.5, '1', 10.5, '05:46:06', '2024-05-28'),
(249, '2024-9730458621-054621', '6', 'CGB', 10.5, '3', 31.5, '05:46:21', '2024-05-28'),
(250, '2024-9730458621-054621', '7', 'CGW', 10.5, '2', 21, '05:46:21', '2024-05-28'),
(251, '2024-9730458621-054621', '5', 'CGCC', 10.5, '1', 10.5, '05:46:21', '2024-05-28'),
(252, '2024-7869312405-054627', '6', 'CGB', 10.5, '3', 31.5, '05:46:27', '2024-05-28'),
(253, '2024-7869312405-054627', '7', 'CGW', 10.5, '2', 21, '05:46:27', '2024-05-28'),
(254, '2024-7869312405-054627', '5', 'CGCC', 10.5, '1', 10.5, '05:46:27', '2024-05-28'),
(255, '2024-4305782169-054737', '6', 'CGB', 10.5, '3', 31.5, '05:47:37', '2024-05-28'),
(256, '2024-4305782169-054737', '7', 'CGW', 10.5, '2', 21, '05:47:37', '2024-05-28'),
(257, '2024-4305782169-054737', '5', 'CGCC', 10.5, '1', 10.5, '05:47:37', '2024-05-28'),
(258, '2024-5397641820-054740', '6', 'CGB', 10.5, '3', 31.5, '05:47:40', '2024-05-28'),
(259, '2024-5397641820-054740', '7', 'CGW', 10.5, '2', 21, '05:47:40', '2024-05-28'),
(260, '2024-5397641820-054740', '5', 'CGCC', 10.5, '1', 10.5, '05:47:40', '2024-05-28'),
(261, '2024-4163795802-054750', '6', 'CGB', 10.5, '1', 10.5, '05:47:50', '2024-05-28'),
(262, '2024-4163795802-054750', '5', 'CGCC', 10.5, '1', 10.5, '05:47:50', '2024-05-28'),
(263, '2024-4163795802-054750', '7', 'CGW', 10.5, '1', 10.5, '05:47:50', '2024-05-28'),
(264, '2024-4319857602-054900', '6', 'CGB', 10.5, '1', 10.5, '05:49:00', '2024-05-28'),
(265, '2024-4319857602-054900', '5', 'CGCC', 10.5, '1', 10.5, '05:49:00', '2024-05-28'),
(266, '2024-4319857602-054900', '7', 'CGW', 10.5, '1', 10.5, '05:49:00', '2024-05-28'),
(267, '2024-8730215496-054903', '6', 'CGB', 10.5, '1', 10.5, '05:49:03', '2024-05-28'),
(268, '2024-8730215496-054903', '5', 'CGCC', 10.5, '1', 10.5, '05:49:03', '2024-05-28'),
(269, '2024-8730215496-054903', '7', 'CGW', 10.5, '1', 10.5, '05:49:03', '2024-05-28'),
(270, '2024-7832569014-054948', '6', 'CGB', 10.5, '1', 10.5, '05:49:48', '2024-05-28'),
(271, '2024-7832569014-054948', '5', 'CGCC', 10.5, '1', 10.5, '05:49:48', '2024-05-28'),
(272, '2024-7832569014-054948', '7', 'CGW', 10.5, '1', 10.5, '05:49:48', '2024-05-28'),
(273, '2024-9547860321-054950', '6', 'CGB', 10.5, '1', 10.5, '05:49:50', '2024-05-28'),
(274, '2024-9547860321-054950', '5', 'CGCC', 10.5, '1', 10.5, '05:49:50', '2024-05-28'),
(275, '2024-9547860321-054950', '7', 'CGW', 10.5, '1', 10.5, '05:49:50', '2024-05-28'),
(276, '2024-0649352718-055455', '5', 'CGCC', 10.5, '1', 10.5, '05:54:55', '2024-05-28'),
(277, '2024-0649352718-055455', '6', 'CGB', 10.5, '1', 10.5, '05:54:55', '2024-05-28'),
(278, '2024-0649352718-055455', '7', 'CGW', 10.5, '1', 10.5, '05:54:55', '2024-05-28'),
(279, '2024-9568724013-055509', '5', 'CGCC', 10.5, '1', 10.5, '05:55:09', '2024-05-28'),
(280, '2024-9568724013-055509', '6', 'CGB', 10.5, '1', 10.5, '05:55:09', '2024-05-28'),
(281, '2024-9568724013-055509', '7', 'CGW', 10.5, '1', 10.5, '05:55:09', '2024-05-28'),
(282, '2024-7984652310-055543', '5', 'CGCC', 10.5, '1', 10.5, '05:55:43', '2024-05-28'),
(283, '2024-7984652310-055543', '6', 'CGB', 10.5, '1', 10.5, '05:55:43', '2024-05-28'),
(284, '2024-7984652310-055543', '7', 'CGW', 10.5, '1', 10.5, '05:55:43', '2024-05-28'),
(285, '2024-6240389157-055547', '5', 'CGCC', 10.5, '1', 10.5, '05:55:47', '2024-05-28'),
(286, '2024-6240389157-055547', '6', 'CGB', 10.5, '1', 10.5, '05:55:47', '2024-05-28'),
(287, '2024-6240389157-055547', '7', 'CGW', 10.5, '1', 10.5, '05:55:47', '2024-05-28'),
(288, '2024-8420536917-055555', '5', 'CGCC', 10.5, '1', 10.5, '05:55:55', '2024-05-28'),
(289, '2024-8420536917-055555', '6', 'CGB', 10.5, '1', 10.5, '05:55:55', '2024-05-28'),
(290, '2024-8420536917-055555', '7', 'CGW', 10.5, '1', 10.5, '05:55:55', '2024-05-28'),
(291, '2024-2096714385-063132', '5', 'CGCC', 10.5, '10980', 115290, '06:31:32', '2024-06-06'),
(292, '2024-7920485316-063159', '5', 'CGCC', 10.5, '10980', 115290, '06:31:59', '2024-06-06'),
(293, '2024-8649325017-054032', '7', 'CGW', 10.5, '10980', 115290, '05:40:32', '2024-06-07'),
(294, '2024-6124985730-054314', '6', 'CGB', 10.5, '10980', 115290, '05:43:14', '2024-06-07'),
(295, '2024-5397861420-054339', '6', 'CGB', 10.5, '10980', 115290, '05:43:39', '2024-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `type_raw_materials`
--

CREATE TABLE `type_raw_materials` (
  `id` int(11) NOT NULL,
  `material_type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_raw_materials`
--

INSERT INTO `type_raw_materials` (`id`, `material_type`) VALUES
(7, 'Sugar'),
(8, 'Non-Dairy Creamer'),
(12, 'Salt'),
(13, 'HG Pure Coffee'),
(14, 'PB Coffee Blend'),
(15, 'MF Ground Coffee'),
(16, 'Plastic Package '),
(17, 'Box'),
(18, 'ASK Milk'),
(19, 'FL Caffeine'),
(20, 'FL Roasted Coffee '),
(21, 'Powdered Milk'),
(22, 'Sugar B');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(255) NOT NULL,
  `vendor_name` text NOT NULL,
  `company_name` text NOT NULL,
  `vendor_address` text NOT NULL,
  `city` text NOT NULL,
  `province` text NOT NULL,
  `zip_code` text NOT NULL,
  `country` text NOT NULL,
  `phone_number` text NOT NULL,
  `email_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_name`, `company_name`, `vendor_address`, `city`, `province`, `zip_code`, `country`, `phone_number`, `email_address`) VALUES
(1, 'TMT', 'TMT FOODS', '4F SITIO GRANDE', 'MANILA', 'METRO MANILA', '1002', 'PHILIPPINES', '094848561651', 'TMTFOODSTMT@gmail.com'),
(2, 'MTM', 'MTM', 'MTM', 'ANGELES', 'ABRA', '15555', 'MTM', '09445445455', 'MTM@gmail.com');

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
-- Indexes for table `before_sale`
--
ALTER TABLE `before_sale`
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
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_raw_materials`
--
ALTER TABLE `type_raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `audit_trail_record`
--
ALTER TABLE `audit_trail_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT for table `before_sale`
--
ALTER TABLE `before_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_needs`
--
ALTER TABLE `product_needs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `product_needs_history`
--
ALTER TABLE `product_needs_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `type_raw_materials`
--
ALTER TABLE `type_raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;