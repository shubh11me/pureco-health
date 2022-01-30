-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 07:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pure_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_email`, `admin_password`) VALUES
(1, 'sumeetprachande@gmail.com', 'sumeeT123*#');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(60) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `apt_date` datetime DEFAULT NULL,
  `id_proof` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `test` varchar(30) NOT NULL,
  `no_of_peop` int(10) NOT NULL,
  `mob_no` varchar(15) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `payment_amount` int(25) NOT NULL,
  `payment_id` varchar(60) NOT NULL,
  `aapt_by` varchar(60) NOT NULL,
  `apt_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `tast_amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `tast_amount`) VALUES
(1, 'RT-PCR', 600),
(4, 'CBC', 150),
(5, 'HB', 50),
(6, 'ANC PROFILE', 900),
(7, 'BT.CT', 100),
(8, 'PT', 500),
(9, 'RETICULOSITE COUNT', 220),
(10, 'ESR', 50),
(11, 'BLOOD GROUP', 50),
(12, 'BLOOD SUGAR', 50),
(13, 'WIDAL TEST', 150),
(14, 'HIV', 400),
(15, 'DENGUE IgG,IgM,NS-1', 1200),
(16, 'MALARIA ANTIGEN', 500),
(17, 'VITAMIN B-12', 900),
(18, 'TESTOSTERONE', 1000),
(19, 'CRP', 500),
(20, 'URINE-R', 50),
(21, 'URINE-PREGNANCY TEST', 100),
(22, 'SR.PROTEINS', 200),
(23, 'SR.CREATINE', 100),
(24, 'BL.UREA', 100),
(25, 'SR.CHOLESTROL', 200),
(26, 'SR.CALCIUM', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
