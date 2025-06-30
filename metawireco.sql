-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2025 at 03:43 PM
-- Server version: 10.11.5-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metawireco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0. Inactive. 1. Active',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`, `full_name`, `status`, `created_on`, `last_login`) VALUES
(1, 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', 'Admin', '1', '2025-06-24 13:22:24', '2025-06-24 13:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `checksheet`
--

CREATE TABLE `checksheet` (
  `id` int(11) NOT NULL,
  `product_title` varchar(155) NOT NULL,
  `product_type` varchar(55) NOT NULL,
  `armor_short` varchar(55) NOT NULL,
  `armor_type` varchar(155) NOT NULL,
  `cable_title` varchar(350) NOT NULL,
  `conductor_type` varchar(155) NOT NULL,
  `voltage_rating` varchar(55) NOT NULL,
  `temperature_rating` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `additional_description` text NOT NULL,
  `solid_conductor` varchar(500) NOT NULL,
  `isulation` varchar(500) NOT NULL,
  `armor` varchar(500) NOT NULL,
  `armor_coding_sub` varchar(500) NOT NULL,
  `disclaimer` varchar(500) NOT NULL,
  `responsibility_statement` varchar(500) NOT NULL,
  `company_address` varchar(350) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `copyright_info` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0. Inactive. 1. Active',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checksheet`
--

INSERT INTO `checksheet` (`id`, `product_title`, `product_type`, `armor_short`, `armor_type`, `cable_title`, `conductor_type`, `voltage_rating`, `temperature_rating`, `description`, `additional_description`, `solid_conductor`, `isulation`, `armor`, `armor_coding_sub`, `disclaimer`, `responsibility_statement`, `company_address`, `contact`, `copyright_info`, `status`, `created_on`, `updated_on`) VALUES
(1, 'Product Title', 'Product type', 'AML', 'Aluminium type', 'Cable title', 'conductor type', '500V', '80.c', 'Testing dummy description', 'dummy additional description', 'solid conductor', 'summy insulation', 'armor dummy test', 'armor coding sub', 'dummy disclaimer', 'responsibility statement test', 'Kolkata', '9876543210', '@abc', '1', '2025-06-26 15:27:12', '2025-06-26 15:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `conductor_cable_details`
--

CREATE TABLE `conductor_cable_details` (
  `id` int(11) NOT NULL,
  `fk_checksheet_id` int(11) NOT NULL,
  `size` varchar(55) NOT NULL,
  `strands` varchar(55) NOT NULL,
  `color` varchar(55) NOT NULL,
  `green_ground_wire_size` varchar(55) NOT NULL,
  `diameter` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0. Inactive. 1.Active',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conductor_cable_details`
--

INSERT INTO `conductor_cable_details` (`id`, `fk_checksheet_id`, `size`, `strands`, `color`, `green_ground_wire_size`, `diameter`, `weight`, `status`, `created_on`, `updated_on`) VALUES
(1, 1, '14/2', 'Solid', '#000000', '14AWG', 0.43, 82.50, '1', '2025-06-26 15:27:12', '2025-06-26 15:27:12'),
(2, 1, '16/3', 'Semi Solid', '#000000', '16AWG', 1.60, 92.60, '1', '2025-06-26 15:27:12', '2025-06-26 15:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `logo_details`
--

CREATE TABLE `logo_details` (
  `id` int(11) NOT NULL,
  `fk_checksheet_id` int(11) NOT NULL,
  `title_logo` varchar(155) NOT NULL,
  `feature_logo` varchar(500) NOT NULL,
  `armor_coding_logo` varchar(155) NOT NULL,
  `company_logo` varchar(155) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0. Inactive. 1. Active',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo_details`
--

INSERT INTO `logo_details` (`id`, `fk_checksheet_id`, `title_logo`, `feature_logo`, `armor_coding_logo`, `company_logo`, `status`, `created_on`, `updated_on`) VALUES
(1, 1, 'img_685d1978d1700.png', '[\"img_685d1978d1f2d.png\",\"img_685d1978d2f6b.png\",\"img_685d1978d4128.jpg\",\"img_685d1978d507c.png\"]', 'img_685d1978d601e.png', 'img_685d1978d64c7.png', '1', '2025-06-26 15:27:12', '2025-06-26 15:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `standard_details`
--

CREATE TABLE `standard_details` (
  `id` int(11) NOT NULL,
  `fk_checksheet_id` int(11) NOT NULL,
  `standard_title` varchar(500) NOT NULL,
  `sequemtial_footage` varchar(255) NOT NULL,
  `footage_marker` varchar(255) NOT NULL,
  `chevron_direction` varchar(255) NOT NULL,
  `cable_size` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0. Inactive. 1. Active',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standard_details`
--

INSERT INTO `standard_details` (`id`, `fk_checksheet_id`, `standard_title`, `sequemtial_footage`, `footage_marker`, `chevron_direction`, `cable_size`, `status`, `created_on`, `updated_on`) VALUES
(1, 1, '[\"Standard 1\",\"Standard 2\",\"Standard 3\"]', 'sequential footage1', 'marker1', 'direction1', 'size1', '1', '2025-06-26 15:27:12', '2025-06-26 15:27:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checksheet`
--
ALTER TABLE `checksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conductor_cable_details`
--
ALTER TABLE `conductor_cable_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_details`
--
ALTER TABLE `logo_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_details`
--
ALTER TABLE `standard_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checksheet`
--
ALTER TABLE `checksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conductor_cable_details`
--
ALTER TABLE `conductor_cable_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logo_details`
--
ALTER TABLE `logo_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `standard_details`
--
ALTER TABLE `standard_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
