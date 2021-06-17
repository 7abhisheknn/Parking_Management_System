-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2021 at 07:50 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_email`, `a_password`, `a_name`, `a_company_name`, `a_country`, `a_state`, `a_district`, `a_address`, `a_pincode`) VALUES
(1, 'first_admin@admin.com', 'first_admin', 'first_admin', 'first_park', 'India', 'Karnataka', 'Bangalore', 'Rameshwaram,3rd road,\r\n8th cross,\r\nMahanagar.', '560002'),
(2, 'q(Email)', 'q(Your_Password)', 'q(Name)', 'q(Company_Name)', 'q(Country)', 'q(State)', 'q(District)', 'q(Address)', 'q(Pincode)'),
(3, '(Email)', '(Your_Password)', '(Name)', '(Company_Name)', '(Country)', '(State)', '(District)', '(Address)', '(Pincode)'),
(4, 'hanuman@gmail.com', 'hanu', 'hanuman', 'bheem', 'India', 'Maharastra', 'bidar', 'mainroad ext , line 5', '123456'),
(5, 'asdf@gmail.com', '1', '1', '1', '1', '1', '1', '1', '1'),
(6, 'super_park@gmail.com', 'super_park', 'super_park_name', 'super_park', 'India', 'Tamil Nadu', 'Vellore', 'Kelambakkam', '600127'),
(7, 'super_park2@gmail.com', 'super_park2', 'super_park2_name', 'super_park2', 'India', 'Bangalore', 'City', 'Bus Stand', '654863');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `b_id` int(15) NOT NULL,
  `p_id` int(15) NOT NULL,
  `a_id` int(15) NOT NULL,
  `v_no` varchar(255) NOT NULL,
  `b_price` int(255) NOT NULL,
  `b_from` datetime NOT NULL,
  `b_till` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`b_id`, `p_id`, `a_id`, `v_no`, `b_price`, `b_from`, `b_till`) VALUES
(1, 4, 6, 'maruti01', 2000, '2021-06-16 03:20:47', '2021-06-16 21:20:47'),
(2, 4, 6, 'bmw01', 2000, '2021-06-16 03:20:47', '2021-06-16 21:20:47'),
(3, 5, 6, 'batmancar01', 5000, '2021-06-16 03:20:47', '2021-06-16 21:20:47'),
(4, 6, 7, 'ironmancar01', 9000, '2021-06-16 03:20:47', '2021-06-16 21:20:47'),
(5, 6, 7, 'rajputcar01', 9000, '2021-06-16 03:20:47', '2021-06-16 21:20:47'),
(6, 7, 7, 'royalscar01', 9000, '2021-06-16 03:20:47', '2021-06-16 21:20:47');

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_email`, `c_password`, `c_name`, `c_address`) VALUES
(1, 'first_customer@customer.com', 'first_customer', 'first_customer', 'Ram house\r\nganga marga, koteshwara\r\nvellore, Chennai,\r\nTamil Nadu , India'),
(2, 'myemail@gmail.com', 'password', 'ram', 'kaliyug'),
(3, 'customeremail@gmail.com', 'customerpassword', 'customername', 'customeraddress'),
(4, 'abhishek@email.com', 'abhishek', 'abhishek', 'delhi'),
(5, 'rithesh@email.com', 'rithesh', 'rithesh', 'kolkata'),
(6, 'anikait@email.com', 'anikait', 'anikait', 'mumbai'),
(7, '1234@gmail.com', 'qwer', '1234', '1234qwer');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `p_id` int(15) NOT NULL,
  `a_id` int(15) NOT NULL,
  `p_price` int(15) NOT NULL DEFAULT 0,
  `p_from` datetime DEFAULT NULL,
  `p_till` datetime DEFAULT NULL,
  `v_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`p_id`, `a_id`, `p_price`, `p_from`, `p_till`, `v_no`) VALUES
(1, 1, 0, '2012-04-28 03:12:00', '2022-04-23 03:11:00', 'ironmancar01'),
(2, 1, 100, '2021-06-10 05:32:38', '2021-06-10 18:02:38', 'TN21Z123'),
(3, 1, 1000, '2021-06-17 21:59:00', '2021-06-17 23:59:00', 'ironmancar02'),
(4, 6, 1000, '2021-06-17 22:04:00', '2021-06-17 04:04:00', 'random'),
(5, 6, 2000, NULL, NULL, NULL),
(6, 7, 5000, NULL, NULL, NULL),
(7, 7, 9000, '2021-06-17 23:17:00', '2021-07-01 23:17:00', 'costlycar01');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_no` varchar(255) NOT NULL,
  `c_id` int(15) NOT NULL,
  `v_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_no`, `c_id`, `v_type`) VALUES
('batmancar01', 6, 'car'),
('bmw01', 4, 'car'),
('costlycar01', 2, 'car'),
('extremecar01', 4, 'car'),
('extremecar02', 4, 'car'),
('ironmancar01', 6, 'car'),
('maruti01', 4, 'car'),
('normalcar01', 4, 'car'),
('rajputcar01', 5, 'car'),
('random', 6, 'car'),
('royalscar01', 5, 'car'),
('TN21Z123', 1, 'Car');

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
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `b_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;