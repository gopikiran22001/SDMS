-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 06:05 PM
-- Server version: 8.0.36
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d21466`
--
CREATE DATABASE IF NOT EXISTS `d21466` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `d21466`;

-- --------------------------------------------------------

--
-- Table structure for table `c`
--

CREATE TABLE `c` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm`
--

CREATE TABLE `cm` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_att`
--

CREATE TABLE `cm_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_face`
--

CREATE TABLE `cm_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_att`
--

CREATE TABLE `c_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_face`
--

CREATE TABLE `c_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec`
--

CREATE TABLE `ec` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec_att`
--

CREATE TABLE `ec_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec_face`
--

CREATE TABLE `ec_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee`
--

CREATE TABLE `ee` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee_att`
--

CREATE TABLE `ee_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee_face`
--

CREATE TABLE `ee_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m`
--

CREATE TABLE `m` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_att`
--

CREATE TABLE `m_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_face`
--

CREATE TABLE `m_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c`
--
ALTER TABLE `c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm`
--
ALTER TABLE `cm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_att`
--
ALTER TABLE `cm_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_face`
--
ALTER TABLE `cm_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `c_att`
--
ALTER TABLE `c_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_face`
--
ALTER TABLE `c_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_att`
--
ALTER TABLE `ec_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_face`
--
ALTER TABLE `ec_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `ee`
--
ALTER TABLE `ee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee_att`
--
ALTER TABLE `ee_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee_face`
--
ALTER TABLE `ee_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `m`
--
ALTER TABLE `m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_att`
--
ALTER TABLE `m_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_face`
--
ALTER TABLE `m_face`
  ADD PRIMARY KEY (`dt`);
--
-- Database: `d22466`
--
CREATE DATABASE IF NOT EXISTS `d22466` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `d22466`;

-- --------------------------------------------------------

--
-- Table structure for table `c`
--

CREATE TABLE `c` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm`
--

CREATE TABLE `cm` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_att`
--

CREATE TABLE `cm_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_face`
--

CREATE TABLE `cm_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_att`
--

CREATE TABLE `c_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_face`
--

CREATE TABLE `c_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec`
--

CREATE TABLE `ec` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec_att`
--

CREATE TABLE `ec_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec_face`
--

CREATE TABLE `ec_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee`
--

CREATE TABLE `ee` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee_att`
--

CREATE TABLE `ee_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee_face`
--

CREATE TABLE `ee_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m`
--

CREATE TABLE `m` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_att`
--

CREATE TABLE `m_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_face`
--

CREATE TABLE `m_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c`
--
ALTER TABLE `c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm`
--
ALTER TABLE `cm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_att`
--
ALTER TABLE `cm_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_face`
--
ALTER TABLE `cm_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `c_att`
--
ALTER TABLE `c_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_face`
--
ALTER TABLE `c_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_att`
--
ALTER TABLE `ec_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_face`
--
ALTER TABLE `ec_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `ee`
--
ALTER TABLE `ee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee_att`
--
ALTER TABLE `ee_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee_face`
--
ALTER TABLE `ee_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `m`
--
ALTER TABLE `m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_att`
--
ALTER TABLE `m_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_face`
--
ALTER TABLE `m_face`
  ADD PRIMARY KEY (`dt`);
--
-- Database: `d23466`
--
CREATE DATABASE IF NOT EXISTS `d23466` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `d23466`;

-- --------------------------------------------------------

--
-- Table structure for table `c`
--

CREATE TABLE `c` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm`
--

CREATE TABLE `cm` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_att`
--

CREATE TABLE `cm_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_face`
--

CREATE TABLE `cm_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_att`
--

CREATE TABLE `c_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_face`
--

CREATE TABLE `c_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec`
--

CREATE TABLE `ec` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec_att`
--

CREATE TABLE `ec_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ec_face`
--

CREATE TABLE `ec_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee`
--

CREATE TABLE `ee` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee_att`
--

CREATE TABLE `ee_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee_face`
--

CREATE TABLE `ee_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m`
--

CREATE TABLE `m` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `img` varbinary(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_att`
--

CREATE TABLE `m_att` (
  `id` varchar(12) NOT NULL,
  `img` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_face`
--

CREATE TABLE `m_face` (
  `dt` date NOT NULL,
  `sem` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c`
--
ALTER TABLE `c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm`
--
ALTER TABLE `cm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_att`
--
ALTER TABLE `cm_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_face`
--
ALTER TABLE `cm_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `c_att`
--
ALTER TABLE `c_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_face`
--
ALTER TABLE `c_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_att`
--
ALTER TABLE `ec_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_face`
--
ALTER TABLE `ec_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `ee`
--
ALTER TABLE `ee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee_att`
--
ALTER TABLE `ee_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee_face`
--
ALTER TABLE `ee_face`
  ADD PRIMARY KEY (`dt`);

--
-- Indexes for table `m`
--
ALTER TABLE `m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_att`
--
ALTER TABLE `m_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_face`
--
ALTER TABLE `m_face`
  ADD PRIMARY KEY (`dt`);
--
-- Database: `student_management`
--
CREATE DATABASE IF NOT EXISTS `student_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `student_management`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint NOT NULL,
  `mail` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varbinary(255) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fname`, `lname`, `gender`, `dob`, `phone`, `mail`, `address`, `username`, `password`, `img`, `type`) VALUES
('GOPIKIRAN', 'DAVU', 'Male', '2005-02-02', 54654666, 'gk22012005@gmail.com', 'dfg', 'gk', 'gk', 0x4139626b33792e6a7067, ''),
('GOPIKIRAN', 'DAVU', 'Male', '2005-01-22', 6305973437, 'gopikiran22001@gmail.com', 'Gannavaram', 'gopi_kiran', 'gk', 0x796f7269696368692d74737567696b756e692d6b696d657473752d6e6f2d79616962612d7468756d622e6a7067, 'Admin'),
('GOPIKIRAN', 'DAVU', 'Male', '2023-08-07', 6305973437, 'gk22012005@gmail.com', 'g', 'prem', 'gk', 0x57494e5f32303233303832315f31305f34375f35395f50726f2e6a7067, '');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch` bigint NOT NULL,
  `dur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch`, `dur`) VALUES
(21466, '2021 to 2024'),
(22466, '2022 to 2025'),
(23466, '2023 to 2026');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bname` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`name`, `bname`) VALUES
('C', 'Civil Engineering'),
('CM', 'Computer Engineering'),
('EC', 'Electronics  and Communication Engineering'),
('EE', 'Electrical and Electronics Engineering'),
('M', 'Mechanical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `c`
--

CREATE TABLE `c` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` int NOT NULL,
  `sem` int NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c`
--

INSERT INTO `c` (`name`, `code`, `sem`, `type`) VALUES
('English', 101, 1, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `cm`
--

CREATE TABLE `cm` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` int NOT NULL,
  `sem` int NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cm`
--

INSERT INTO `cm` (`name`, `code`, `sem`, `type`) VALUES
('English', 101, 1, 'T'),
('Engineering Mathematics-1', 102, 1, 'T'),
('Engineering Physics', 103, 1, 'T'),
('Engineering Chemistry and Environmental studies', 104, 1, 'T'),
('Basic of Computer Engineering', 105, 1, 'T'),
('Programming in C', 106, 1, 'T'),
('Engineering Drawing', 107, 1, 'L'),
('Programming in C Lab', 108, 1, 'L'),
('Physics Lab', 109, 1, 'L'),
('Chemistry Lab', 110, 1, 'L'),
('Computer Fundamental Lab', 111, 1, 'L'),
('Engineering Mathematics-2', 301, 3, 'T'),
('Digital Electronics', 302, 3, 'T'),
('Operating systems', 303, 3, 'T'),
('Data Structures through C', 304, 3, 'T'),
('DBMS', 305, 3, 'T'),
('Digital Electronics Lab', 306, 3, 'L'),
('Data Structures through C Lab', 307, 3, 'L'),
('DBMS Lab', 308, 3, 'L'),
('Multimedia Lab', 309, 3, 'L'),
('Engineering Mathematics-3', 401, 4, 'T'),
('Web Technologies', 402, 4, 'T'),
('Computer Organization and Microprocessors', 403, 4, 'T'),
('Oops through C++', 404, 4, 'T'),
('Computer Networks', 405, 4, 'T'),
('Web Technologies Lab', 406, 4, 'L'),
('Oops through C++ Lab', 407, 4, 'L'),
('Communication Skills', 408, 4, 'L'),
('Computer Hardware & Network Maintenance Lab', 409, 4, 'L'),
('Industrial Management and Enterpreneurship', 501, 5, 'T'),
('Java Programming', 502, 5, 'T'),
('Software Engineering', 503, 5, 'T'),
('Internet of Things', 504, 5, 'T'),
('Python Programming', 505, 5, 'T'),
('Java Programming Lab', 506, 5, 'L'),
('Python Programming Lab', 507, 5, 'L'),
('Life Skills', 508, 5, 'L'),
('Project Work', 509, 5, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `ec`
--

CREATE TABLE `ec` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` int NOT NULL,
  `sem` int NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ee`
--

CREATE TABLE `ee` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` int NOT NULL,
  `sem` int NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m`
--

CREATE TABLE `m` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` int NOT NULL,
  `sem` int NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `c`
--
ALTER TABLE `c`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `cm`
--
ALTER TABLE `cm`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `ee`
--
ALTER TABLE `ee`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `m`
--
ALTER TABLE `m`
  ADD PRIMARY KEY (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
