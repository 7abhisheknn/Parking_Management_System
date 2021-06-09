-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2021 at 04:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--
CREATE DATABASE IF NOT EXISTS `pms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(15) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_company_name` varchar(255) NOT NULL,
  `a_country` varchar(255) NOT NULL,
  `a_state` varchar(255) NOT NULL,
  `a_district` varchar(255) NOT NULL,
  `a_address` varchar(255) NOT NULL,
  `a_pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `b_id` int(15) NOT NULL,
  `p_id` int(15) NOT NULL,
  `a_id` int(15) NOT NULL,
  `v_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(15) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `p_id` int(15) NOT NULL,
  `a_id` int(15) NOT NULL,
  `p_price` int(15) DEFAULT NULL,
  `p_from` datetime NOT NULL,
  `p_till` datetime NOT NULL,
  `v_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_no` varchar(255) NOT NULL,
  `c_id` int(15) NOT NULL,
  `v_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `b_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
