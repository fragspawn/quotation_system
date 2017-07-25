-- MySQL dump 10.16  Distrib 10.1.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.20-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(512) NOT NULL,
  `address_1` varchar(256) NOT NULL,
  `address_2` varchar(256) NOT NULL,
  `suburb` varchar(128) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `session_id` varchar(128) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `line_item`
--

DROP TABLE IF EXISTS `line_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line_item` (
  `line_item_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `units_max` int(11) NOT NULL,
  PRIMARY KEY (`line_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line_item`
--

LOCK TABLES `line_item` WRITE;
/*!40000 ALTER TABLE `line_item` DISABLE KEYS */;
INSERT INTO `line_item` VALUES (1,'Storage Space','storage_space','The amount of non-volatile storage the system will incorporate 1 TB = 1,000 Gigabytes','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','TB',1,59,3,6,12,18,1,30),(2,'Memory','memory','System Memory the amount of volatile storage the system will have','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','GB',4,20,4,8,16,32,4,64),(3,'Network Interfaces','network_interfaces','The number of network connections the system needs','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','Gigabit Port',1,100,1,2,3,4,1,4),(4,'Network Nodes','network_nodes','The number of clients to be served by the system','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','clients',4,10,16,48,128,256,4,512),(5,'CPU cores','cpu_cores','The number of CPU cores to put to the task','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','cores',2,100,2,4,8,16,2,16),(6,'thin clients','thin_clients','The number of diskless multi-media devices that will be connected to the system','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','thin clients',4,300,4,16,32,64,0,128),(7,'DVB Channels','dvb_channels','The number of digital video broadcast tuners to install into the server','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','DVB Tuner',1,80,1,2,4,8,0,8),(8,'Antenna Install','antenna_install','Professional installation of DVB compatible antenna','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','Antenna',1,1000,1,2,3,4,0,4),(9,'Gigabit Switching','gigabit_switching','The switching equipment needed to serve video clients','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','gigabit port',8,90,8,16,64,256,0,512),(10,'Network cabling','network_cabling','Run CAT5e cable for 16 computers, per room','http://placehold.it/150x150','http://placehold.it/200x200','http://placehold.it/300x300','http://placehold.it/400x440','rooms',1,3000,1,4,8,16,0,32);
/*!40000 ALTER TABLE `line_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_cust_id` int(11) NOT NULL,
  `quate_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `total_cost` float NOT NULL,
  PRIMARY KEY (`quote_id`),
  KEY `quote_cust_id` (`quote_cust_id`),
  CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`quote_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation`
--

LOCK TABLES `quotation` WRITE;
/*!40000 ALTER TABLE `quotation` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quote_lines`
--

DROP TABLE IF EXISTS `quote_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quote_lines` (
  `quote_line_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_qote_id` int(11) NOT NULL,
  `quote_item_id` int(11) NOT NULL,
  PRIMARY KEY (`quote_line_id`),
  KEY `quote_cust_id` (`quote_qote_id`),
  KEY `quote_item_id` (`quote_item_id`),
  CONSTRAINT `quote_lines_ibfk_1` FOREIGN KEY (`quote_qote_id`) REFERENCES `quotation` (`quote_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `quote_lines_ibfk_2` FOREIGN KEY (`quote_item_id`) REFERENCES `line_item` (`line_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quote_lines`
--

LOCK TABLES `quote_lines` WRITE;
/*!40000 ALTER TABLE `quote_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `quote_lines` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-27 12:35:52
