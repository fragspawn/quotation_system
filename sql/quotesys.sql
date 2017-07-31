-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2017 at 09:19 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.15

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
-- Table structure for table `ACL`
--

CREATE TABLE `ACL` (
  `user_id` int(11) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(128) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ACL`
--

INSERT INTO `ACL` (`user_id`, `username`, `password`, `state`) VALUES
(1, 'bob', 'brown', 1),
(2, 'bill', 'hicks', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(512) NOT NULL,
  `address_1` varchar(256) NOT NULL,
  `address_2` varchar(256) NOT NULL,
  `suburb` varchar(128) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `session_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `phone`, `email`, `address_1`, `address_2`, `suburb`, `state`, `postcode`, `session_id`) VALUES
(1, 'Dianne Francis', '123412341234', 'df@df.com', 'asdf st', '', 'mulgawie', 'QLD', '4721', '13245sfasd12345asdfo945lkjfn7');

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
  `units` varchar(32) NOT NULL,
  `unit_increment` int(11) NOT NULL,
  `unit_cost` decimal(8,0) NOT NULL,
  `units_small` int(11) NOT NULL,
  `units_medium` int(11) NOT NULL,
  `units_large` int(11) NOT NULL,
  `units_min` int(11) NOT NULL,
  `units_max` int(11) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_item`
--

INSERT INTO `line_item` (`line_item_id`, `name`, `system_name`, `description`, `image_small`, `image_medium`, `image_large`, `units`, `unit_increment`, `unit_cost`, `units_small`, `units_medium`, `units_large`, `units_min`, `units_max`, `enabled`) VALUES
(1, 'Storage Space', 'storage_space', 'The amount of non volatile storage the system will incorporate 1 TB = 1,000 Gigabytes', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'TB', 1, '59', 3, 6, 12, 1, 30, 0),
(2, 'Memory', 'memory', 'System Memory the amount of volatile storage the system will have', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'GB', 4, '20', 4, 8, 16, 4, 64, 0),
(3, 'Network Interfaces', 'network_interfaces', 'The number of network connections the system needs', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'Gigabit Port', 1, '100', 1, 2, 3, 1, 4, 0),
(4, 'Network Nodes', 'network_nodes', 'The number of clients to be served by the system', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'clients', 4, '10', 16, 48, 128, 4, 512, 0),
(5, 'CPU cores', 'cpu_cores', 'The number of CPU cores to put to the task', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'cores', 2, '100', 2, 4, 8, 2, 16, 0),
(6, 'thin clients', 'thin_clients', 'The number of diskless multi-media devices that will be connected to the system', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'thin clients', 4, '300', 4, 16, 32, 0, 128, 0),
(7, 'DVB Channels', 'dvb_channels', 'The number of digital video broadcast tuners to install into the server', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'DVB Tuner', 1, '80', 1, 2, 4, 0, 8, 0),
(8, 'Antenna Install', 'antenna_install', 'Professional installation of DVB compatible antenna', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'Antenna', 1, '1000', 1, 2, 3, 0, 4, 0),
(9, 'Gigabit Switching', 'gigabit_switching', 'The switching equipment needed to serve video clients', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'gigabit port', 8, '90', 8, 16, 64, 0, 512, 0),
(10, 'Network cabling', 'network_cabling', 'Run CAT5e cable for 16 computers, per room', 'http://placehold.it/150x150', 'http://placehold.it/200x200', 'http://placehold.it/300x300', 'rooms', 1, '3000', 1, 4, 8, 0, 32, 1);

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

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quote_id`, `quote_cust_id`, `quate_created`, `total_cost`) VALUES
(1, 1, '0000-00-00 00:00:00', 123443);

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
-- Indexes for table `ACL`
--
ALTER TABLE `ACL`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `ACL`
--
ALTER TABLE `ACL`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `line_item`
--
ALTER TABLE `line_item`
  MODIFY `line_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
