-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 06:06 AM
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
(594, '2024-04-22', '15:40:59', 'Angelo Cruz', 'Added new Vendor #TMTTMT FOODS date 2024-04-22');

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

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `material_code`, `product_name`, `product_batch`, `production_status`, `production_pieces`, `production_kilo`, `production_date`, `production_expiration`) VALUES
(20, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', '55565465', 'Onprocess', 0, 0, '2024-04-05', '2025-04-05'),
(21, '7', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (White) ', '100', 'Preparing', 0, 0, '2024-04-05', '2025-04-05');

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
(72, '5', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico)', 'NDC', 11646),
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
(23, 'NDC', '8', 'Brand Name', '10235478', 10000, 0, 0, '2024-04-05', '2024-07-10'),
(24, 'COF-HG50', '13', 'Brand Name', '145874', 10000, 0, 0, '2024-04-05', '2024-09-01'),
(25, 'COF-PB6', '14', 'Brand Name', '4573651', 10000, 0, 0, '2024-04-05', '2024-10-01'),
(26, 'COF-MF878968', '15', 'Brand Name', '45003697', 10000, 0, 0, '2024-04-05', '2024-06-25'),
(27, 'COF-FL578906', '19', 'Brand Name', '00236974', 10000, 0, 0, '2024-04-05', '2025-01-01'),
(28, 'COF-FL722092', '20', 'Brand Name', '00369745', 10000, 0, 0, '2024-04-05', '2025-01-01'),
(29, 'SLT-FI', '12', 'Brand Name', '11236954', 10000, 0, 0, '2024-04-05', '2026-01-01'),
(30, 'ASK', '18', 'Brand Name', '4456312', 10000, 0, 0, '2024-04-05', '2024-05-30'),
(31, 'BOX-00', '17', 'Brand Name', '66542137', 5000, 0, 0, '2024-04-05', '2026-02-01'),
(32, 'PPK-0145', '16', 'Brand Name', '88451230', 5000, 0, 0, '2024-04-05', '2026-02-01'),
(33, 'MLK-704217', '21', 'Brand Name', '33125947', 10000, 0, 0, '2024-04-05', '2024-08-01'),
(34, 'SGR-B578903', '22', 'Brand Name', '4458712', 10000, 0, 0, '2024-04-05', '2024-11-02'),
(35, 'ASK1', '18', 'Name', '4646465', 10000, 0, 0, '2024-04-08', '2024-06-29');

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
(1, 'TMT', 'TMT FOODS', '4F SITIO GRANDE', 'MANILA', 'METRO MANILA', '1002', 'PHILIPPINES', '094848561651', 'TMTFOODSTMT@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `audit_trail_record`
--
ALTER TABLE `audit_trail_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- AUTO_INCREMENT for table `type_raw_materials`
--
ALTER TABLE `type_raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
