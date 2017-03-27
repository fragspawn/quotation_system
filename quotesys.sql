-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 01:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotesys`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `name` int(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(512) NOT NULL,
  `address_1` varchar(256) NOT NULL,
  `address_2` varchar(256) NOT NULL,
  `suburb` varchar(128) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `session_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `line_item`
--

CREATE TABLE `line_item` (
  `line_item_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `system_name` varchar(128) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `image_small` varchar(128) NOT NULL,
  `image_medium` varchar(128) NOT NULL,
  `image_large` varchar(128) NOT NULL,
  `image_massive` varchar(128) NOT NULL,
  `units` varchar(32) NOT NULL,
  `unit_increment` int(11) NOT NULL,
  `unit_cost` decimal(8,0) NOT NULL,
  `units_small` int(11) NOT NULL,
  `units_medium` int(11) NOT NULL,
  `units_large` int(11) NOT NULL,
  `units_massive` int(11) NOT NULL,
  `units_min` int(11) NOT NULL,
  `units_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_item`
--

INSERT INTO `line_item` (`line_item_id`, `name`, `system_name`, `description`, `image_small`, `image_medium`, `image_large`, `image_massive`, `units`, `unit_increment`, `unit_cost`, `units_small`, `units_medium`, `units_large`, `units_massive`, `units_min`, `units_max`) VALUES
(1, 'Storage Space', 'storage_space', 'The amount of non-volatile storage the system will incorporate 1 TB = 1,000 Gigabytes', '', '', '', '', 'TB', 1, '59', 3, 6, 12, 18, 1, 30),
(2, 'Memory', 'memory', 'System Memory the amount of volatile storage the system will have', '', '', '', '', 'GB', 4, '20', 4, 8, 16, 32, 4, 64),
(3, 'Network Interfaces', 'network_interfaces', 'The number of network connections the system needs', '', '', '', '', 'Gigabit Port', 1, '100', 1, 2, 3, 4, 1, 4),
(4, 'Network Nodes', 'network_nodes', 'The number of clients to be served by the system', '', '', '', '', 'clients', 4, '10', 16, 48, 128, 256, 4, 512),
(5, 'CPU cores', 'cpu_cores', 'The number of CPU cores to put to the task', '', '', '', '', 'cores', 2, '100', 2, 4, 8, 16, 2, 16),
(6, 'thin clients', 'thin_clients', 'The number of diskless multi-media devices that will be connected to the system', '', '', '', '', 'thin clients', 4, '300', 4, 16, 32, 64, 0, 128),
(7, 'DVB Channels', 'dvb_channels', 'The number of digital video broadcast tuners to install into the server', '', '', '', '', 'DVB Tuner', 1, '80', 1, 2, 4, 8, 0, 8),
(8, 'Antenna Install', 'antenna_install', 'Professional installation of DVB compatible antenna', '', '', '', '', 'Antenna', 1, '1000', 1, 2, 3, 4, 0, 4),
(9, 'Gigabit Switching', 'gigabit_switching', 'The switching equipment needed to serve video clients', '', '', '', '', 'gigabit port', 8, '90', 8, 16, 64, 256, 0, 512),
(10, 'Network cabling', 'network_cabling', 'Run CAT5e cable for 16 computers, per room', '', '', '', '', 'rooms', 1, '3000', 1, 4, 8, 16, 0, 32);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quote_id` int(11) NOT NULL,
  `quote_cust_id` int(11) NOT NULL,
  `quate_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `total_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quote_lines`
--

CREATE TABLE `quote_lines` (
  `quote_line_id` int(11) NOT NULL,
  `quote_qote_id` int(11) NOT NULL,
  `quote_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `line_item`
--
ALTER TABLE `line_item`
  ADD PRIMARY KEY (`line_item_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quote_id`),
  ADD KEY `quote_cust_id` (`quote_cust_id`);

--
-- Indexes for table `quote_lines`
--
ALTER TABLE `quote_lines`
  ADD PRIMARY KEY (`quote_line_id`),
  ADD KEY `quote_cust_id` (`quote_qote_id`),
  ADD KEY `quote_item_id` (`quote_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `line_item`
--
ALTER TABLE `line_item`
  MODIFY `line_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quote_lines`
--
ALTER TABLE `quote_lines`
  MODIFY `quote_line_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`quote_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quote_lines`
--
ALTER TABLE `quote_lines`
  ADD CONSTRAINT `quote_lines_ibfk_1` FOREIGN KEY (`quote_qote_id`) REFERENCES `quotation` (`quote_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `quote_lines_ibfk_2` FOREIGN KEY (`quote_item_id`) REFERENCES `line_item` (`line_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
