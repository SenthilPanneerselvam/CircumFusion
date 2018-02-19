-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2018 at 11:52 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circumfusion`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `line1` varchar(50) DEFAULT NULL,
  `line2` varchar(50) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `country` varchar(20) NOT NULL DEFAULT 'IND'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business_segment`
--

CREATE TABLE `business_segment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`) VALUES
(1, 'manufacturer', NULL),
(2, 'service provider', NULL),
(3, 'raw material manufacturer', NULL),
(4, 'OEM', 1),
(5, 'tier-1', 1),
(6, 'industrial product manufactere', 1),
(7, 'other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `industry_segment`
--

CREATE TABLE `industry_segment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('IS','BS') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry_segment`
--

INSERT INTO `industry_segment` (`id`, `name`, `type`) VALUES
(1, 'Industry Segment1', 'IS'),
(2, 'Industry Segment2', 'IS'),
(3, 'Business Segment1', 'BS'),
(4, 'Business Segment2', 'BS');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `GST` varchar(10) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `industry_segment` int(11) DEFAULT NULL,
  `business_segment` int(11) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1518386688),
('m130524_201442_init', 1518387088);

-- --------------------------------------------------------

--
-- Table structure for table `servicer`
--

CREATE TABLE `servicer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `GST` varchar(20) NOT NULL,
  `size_of_organization` int(11) NOT NULL,
  `cluster_type` int(11) NOT NULL,
  `customer_business_segment` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_segment`
--
ALTER TABLE `business_segment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_segment`
--
ALTER TABLE `industry_segment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address` (`address`),
  ADD KEY `contact` (`contact`),
  ADD KEY `industry_segment` (`industry_segment`),
  ADD KEY `business_segment` (`business_segment`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `servicer`
--
ALTER TABLE `servicer`
  ADD KEY `address` (`address`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industry_segment`
--
ALTER TABLE `industry_segment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `category` (`id`);

--
-- Constraints for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD CONSTRAINT `manufacturer_ibfk_3` FOREIGN KEY (`contact`) REFERENCES `contact` (`id`),
  ADD CONSTRAINT `manufacturer_ibfk_4` FOREIGN KEY (`industry_segment`) REFERENCES `industry_segment` (`id`),
  ADD CONSTRAINT `manufacturer_ibfk_5` FOREIGN KEY (`business_segment`) REFERENCES `industry_segment` (`id`),
  ADD CONSTRAINT `manufacturer_ibfk_6` FOREIGN KEY (`address`) REFERENCES `address` (`id`);

--
-- Constraints for table `servicer`
--
ALTER TABLE `servicer`
  ADD CONSTRAINT `servicer_ibfk_1` FOREIGN KEY (`address`) REFERENCES `address` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
