-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 07:23 AM
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
(1, 'admin', '$2y$10$Wxx.dhbG1Z/6t1R4G11.4eguAmrLaQFxnliBrwq2XbXOq9jF/QyGm', 'Angelo', 'Cruz', '', 'Admin', '2023-07-01'),
(3, 'accountant', '$2y$10$cZSsN4cK6YQuqiyTRmJK9uvkOL2JcOTCgHk9v/lb189vOowKckgdq', 'CPA Angelo', 'Cruz', '', 'Accountant', '2023-11-03'),
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
(217, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(218, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(219, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(220, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-04'),
(221, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-05'),
(222, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-06'),
(223, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-07'),
(224, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-08'),
(225, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-09'),
(226, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-10'),
(227, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-11'),
(228, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-12'),
(229, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-13'),
(230, '2024-02-11', '02:40:38', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-14'),
(231, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-15'),
(232, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-16'),
(233, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-17'),
(234, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-18'),
(235, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-19'),
(236, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-20'),
(237, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-21'),
(238, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-22'),
(239, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-23'),
(240, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-24'),
(241, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-25'),
(242, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-26'),
(243, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-27'),
(244, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-28'),
(245, '2024-02-11', '02:40:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-29'),
(246, '2024-02-20', '23:21:36', 'Angelo Cruz', 'User password updated   date 2024-02-20'),
(247, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(248, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(249, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(250, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-04'),
(251, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-05'),
(252, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-06'),
(253, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-07'),
(254, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-08'),
(255, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-09'),
(256, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-10'),
(257, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-11'),
(258, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-12'),
(259, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-13'),
(260, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-14'),
(261, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-15'),
(262, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-16'),
(263, '2024-02-21', '02:26:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-17'),
(264, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-18'),
(265, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-19'),
(266, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-20'),
(267, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-22'),
(268, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-23'),
(269, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-24'),
(270, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-25'),
(271, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-26'),
(272, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-27'),
(273, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-28'),
(274, '2024-02-21', '02:26:47', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-29'),
(275, '2024-02-21', '02:27:31', 'Angelo Cruz', 'Employee updated 202325 date 2024-02-21'),
(276, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-01'),
(277, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-02'),
(278, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-03'),
(279, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-04'),
(280, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-05'),
(281, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-06'),
(282, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-07'),
(283, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-08'),
(284, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-09'),
(285, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-10'),
(286, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-11'),
(287, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-12'),
(288, '2024-02-21', '02:27:51', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-13'),
(289, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-14'),
(290, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-15'),
(291, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-16'),
(292, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-17'),
(293, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-18'),
(294, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-19'),
(295, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-20'),
(296, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-21'),
(297, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-22'),
(298, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-23'),
(299, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-24'),
(300, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-25'),
(301, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-26'),
(302, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-27'),
(303, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-28'),
(304, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-29'),
(305, '2024-02-21', '02:27:52', 'Angelo Cruz', 'Rejected leave for employee id number 202325 date 2024-02-29'),
(306, '2024-02-21', '02:27:55', 'Angelo Cruz', 'Rejected leave for employee id number 202325 date 2024-02-29'),
(307, '2024-02-21', '02:28:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(308, '2024-02-21', '02:28:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(309, '2024-02-21', '02:28:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(310, '2024-02-21', '02:28:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-04'),
(311, '2024-02-21', '02:28:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-05'),
(312, '2024-02-21', '02:28:39', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-06'),
(313, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(314, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(315, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(316, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-04'),
(317, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-05'),
(318, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-06'),
(319, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-07'),
(320, '2024-02-21', '02:30:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-08'),
(321, '2024-02-21', '02:33:07', 'Angelo Cruz', 'Employee updated 202325 date 2024-02-21'),
(322, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(323, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(324, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(325, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-04'),
(326, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-05'),
(327, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-06'),
(328, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-07'),
(329, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-08'),
(330, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-09'),
(331, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-10'),
(332, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-11'),
(333, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-12'),
(334, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-13'),
(335, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-14'),
(336, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-15'),
(337, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-16'),
(338, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-17'),
(339, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-18'),
(340, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-19'),
(341, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-20'),
(342, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-21'),
(343, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-22'),
(344, '2024-02-21', '02:34:20', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-23'),
(345, '2024-02-21', '02:34:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-24'),
(346, '2024-02-21', '02:34:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-25'),
(347, '2024-02-21', '02:34:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-26'),
(348, '2024-02-21', '02:34:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-27'),
(349, '2024-02-21', '02:34:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-28'),
(350, '2024-02-21', '02:34:21', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-29'),
(351, '2024-02-21', '02:36:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-01'),
(352, '2024-02-21', '02:36:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-02'),
(353, '2024-02-21', '02:36:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-03'),
(354, '2024-02-21', '02:36:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-04'),
(355, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-05'),
(356, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-06'),
(357, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-07'),
(358, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-08'),
(359, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-09'),
(360, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-10'),
(361, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-11'),
(362, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-12'),
(363, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-13'),
(364, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-14'),
(365, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-15'),
(366, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-16'),
(367, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-17'),
(368, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-18'),
(369, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-19'),
(370, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-20'),
(371, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-21'),
(372, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-22'),
(373, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-23'),
(374, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-24'),
(375, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-25'),
(376, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-26'),
(377, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-27'),
(378, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-28'),
(379, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-29'),
(380, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Rejected leave for employee id number 202325 date 2024-02-29'),
(381, '2024-02-21', '02:36:28', 'Angelo Cruz', 'Rejected leave for employee id number 202325 date 2024-02-29'),
(382, '2024-02-21', '02:37:10', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(383, '2024-02-21', '02:37:10', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(384, '2024-02-21', '02:37:10', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(385, '2024-02-21', '02:37:10', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-04'),
(386, '2024-02-21', '02:39:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-01'),
(387, '2024-02-21', '02:39:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-02'),
(388, '2024-02-21', '02:39:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-03'),
(389, '2024-02-21', '02:39:27', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-04'),
(390, '2024-02-21', '02:39:27', 'Angelo Cruz', 'Rejected leave for employee id number 202325 date 2024-02-04'),
(391, '2024-02-21', '02:39:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(392, '2024-02-21', '02:39:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(393, '2024-02-21', '02:39:46', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(394, '2024-02-21', '02:40:01', 'Angelo Cruz', 'Employee updated 202325 date 2024-02-21'),
(395, '2024-02-21', '02:40:23', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-01'),
(396, '2024-02-21', '02:40:23', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-02'),
(397, '2024-02-21', '02:40:23', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-03'),
(398, '2024-02-21', '02:40:23', 'Angelo Cruz', 'Rejected leave for employee id number 202325 date 2024-02-03'),
(399, '2024-02-21', '02:40:37', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-01'),
(400, '2024-02-21', '02:40:37', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-02'),
(401, '2024-02-21', '02:40:37', 'Angelo Cruz', 'Added new leave for employee id number 202325 date 2024-02-03'),
(402, '2024-02-21', '02:49:47', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-01'),
(403, '2024-02-21', '02:49:47', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-02'),
(404, '2024-02-21', '02:49:47', 'Angelo Cruz', 'Delete leave for employee id number 202325 date 2024-02-03'),
(405, '2024-02-21', '02:49:47', 'Angelo Cruz', 'Rejected leave for employee id number 202325 date 2024-02-03'),
(406, '2024-03-11', '04:00:44', 'Angelo Cruz', 'Attendance downloaded attendance-from-Jan 01 2024-to-Mar 31 2024.csv date 2024-03-11'),
(407, '2024-03-11', '13:47:20', 'Angelo Cruz', 'Added new User admin1 date 2024-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `main_inventory`
--

CREATE TABLE `main_inventory` (
  `id` int(255) NOT NULL,
  `product_number` int(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` double NOT NULL,
  `qty` int(255) NOT NULL,
  `soldstock` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `dateofstock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_inventory`
--

INSERT INTO `main_inventory` (`id`, `product_number`, `photo`, `product_name`, `price`, `qty`, `soldstock`, `balance`, `dateofstock`) VALUES
(14, 2147483647, '', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico) BOX', 1800, 500, 0, 500, '2024-03-07'),
(15, 2147483647, '', 'Café Gusto 3-in-1 Premium Taste Coffee Mix (Clasico) BOX', 1800, 10, 0, 10, '2024-03-07');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT for table `main_inventory`
--
ALTER TABLE `main_inventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
