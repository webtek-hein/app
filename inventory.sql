CREATE DATABASE  IF NOT EXISTS `inventiry` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventiry`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: inventiry
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `account_code`
--

DROP TABLE IF EXISTS `account_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_code` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`ac_id`),
  KEY `acid` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_code`
--

LOCK TABLES `account_code` WRITE;
/*!40000 ALTER TABLE `account_code` DISABLE KEYS */;
INSERT INTO `account_code` VALUES (42,'1-07-01-010','	Land\r'),(43,'1-07-02-010','	Land Improvements'),(44,'1-07-03-050','	Power Supply Systems\r'),(45,'1-07-04-010','	Buildings\r'),(46,'1-07-04-020','	School Buildings\r'),(47,'1-07-04-030','	Hospitals and Health Centers\r'),(48,'1-07-04-990','	Other Structures\r'),(49,'1-07-05-020','	Office Equipment\r'),(50,'1-07-07-010','	Furniture and Fixtures\r'),(51,'1-07-05-030','	Information and Communication Technology Equ'),(52,'1-07-07-020','	Books\r'),(53,'1-07-05-010','	Machinery\r'),(54,'1-07-05-040','	Agriculture and Forestry Equipment\r'),(55,'1-07-05-070','	Communication Equipment\r'),(56,'1-07-05-080','	Construction and Heavy Equipment\r'),(57,'1-07-05-090','	Disaster Response and Rescue Equipment\r'),(58,'1-07-05-110','	Medical Equipment\r'),(59,'1-07-05-100','	Military'),(60,'1-07-05-130','	Sports Equipment\r'),(61,'1-07-05-140','	Technical and Scientific Equipment\r'),(62,'1-07-05-990','	Other Machinery and Equipment\r'),(63,'1-07-06-010','	Motor Vehicles\r'),(64,'1-07-03-010','	Road Networks\r'),(65,'1-07-03-090','	Parks'),(66,'1-07-03-040','	Water Supply Systems\r'),(67,'1-07-03-020','	Flood Control Systems\r'),(68,'1-07-03-990','	Other Infrastructure Assets\r'),(69,'5-02-02-010','	Training Expenses\r'),(70,'5-02-03-010','	Office Supplies Expenses\r'),(71,'5-02-03-020','	Accountable Forms Expenses\r'),(72,'5-02-03-040','	Animal/Zoological Expenses\r'),(73,'5-02-03-050','	Food Supplies Expenses\r'),(74,'5-02-03-070','	Drugs and Medicines Expenses\r'),(75,'5-02-03-080','	Medical'),(76,'5-02-03-090','	Fuel'),(77,'5-02-03-100','	Agricultural and Marine Supplies Expenses\r'),(78,'5-02-03-110','	Textbooks and Instructional Materials Expens'),(79,'5-02-03-120','	Military'),(80,'5-02-03-990','	Other Supplies and Materials Expenses\r'),(81,'5-02-04-010','	Water Expenses\r'),(82,'5-02-04-020','	Electricity Expenses\r'),(83,'5-02-05-010','	Postage and Courier Services\r'),(84,'5-02-05-020','	Telephone Expenses\r'),(85,'5-02-05-030','	Internet Subscription Expenses\r'),(86,'5-02-05-040','	Cable'),(87,'5-02-99-060','	Membership Dues and Contributions to Organiz'),(88,'5-02-06-010','	Awards/Rewards Expenses\r'),(89,'5-02-99-010','	Advertising Expenses\r'),(90,'5-02-99-020','	Printing and Publication Expenses\r'),(91,'5-02-99-050','	Rent Expenses\r'),(92,'5-02-99-030','	Representation Expenses\r'),(93,'5-02-99-040','	Transportation and Delivery Expenses\r'),(94,'5-02-99-070','	Subscription Expenses\r'),(95,'5-02-07-010','	Survey Expenses\r'),(96,'5-02-11-030','	Consultancy Services\r'),(97,'5-02-12-010','	Environment/Sanitary Services\r'),(98,'5-02-12-990','	Other General Services\r'),(99,'5-02-12-020','	Janitorial Services\r'),(100,'5-02-12-030','	Security Services\r'),(101,'5-02-11-990','	Other Professional Services\r'),(102,'5-02-13-020','	Repairs and Maintenance - Land Improvements\r'),(103,'5-02-13-030','	Repairs and Maintenance - Infrastructure Ass'),(104,'5-02-13-040','	Repairs and Maintenance - Buildings and Othe'),(105,'5-02-13-090','	Repairs and Maintenance - Leased Assets Impr'),(106,'5-02-13-050','	Repairs and Maintenance - Machinery and Equi'),(107,'5-02-13-070','	Repairs and Maintenance - Furniture and Fixt'),(108,'5-02-13-060','	Repairs and Maintenance - Transportation Equ'),(109,'5-02-13-990','	Repairs and Maintenance - Other Property'),(110,'5-02-14-020','	Subsidy to NGAs\r'),(111,'5-02-14-030','	Subsidy to Other Local Government Units\r'),(112,'5-02-99-080','	Donations\r'),(113,'5-02-10-030','	Extraordinary and Miscellaneous Expenses\r'),(114,'5-02-16-010','	Taxes'),(115,'5-02-16-020','	Fidelity Bond Premiums\r'),(116,'5-02-16-030','	Insurance Expenses\r'),(117,'5-02-99-990','	Other Maintenance and Operating Expenses\r'),(118,'5-03-01-040','	Bank Charges\r'),(119,'1-07-04-040','	Market\r'),(120,'1-07-04-050','	Slaughterhouses\r'),(121,'5-02-03-060','	Welfare Goods Expenses\r'),(122,'5-02-03-130','	Chemical and Filtering Supplies Expenses\r'),(123,'           ','\r'),(124,'           ','');
/*!40000 ALTER TABLE `account_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(45) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribution`
--

DROP TABLE IF EXISTS `distribution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribution` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(45) NOT NULL,
  `date/time` datetime NOT NULL,
  `dept_id` int(11) NOT NULL,
  `recieved` varchar(45) NOT NULL,
  `user_distribute` varchar(45) NOT NULL,
  PRIMARY KEY (`dist_id`),
  CONSTRAINT `depid` FOREIGN KEY (`dist_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution`
--

LOCK TABLES `distribution` WRITE;
/*!40000 ALTER TABLE `distribution` DISABLE KEYS */;
/*!40000 ALTER TABLE `distribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `item_description` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `account_id` int(5) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `accountid_idx` (`account_id`),
  CONSTRAINT `accountid` FOREIGN KEY (`account_id`) REFERENCES `account_code` (`ac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_detail`
--

DROP TABLE IF EXISTS `item_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_detail` (
  `item_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` int(11) NOT NULL,
  `exp_date` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  PRIMARY KEY (`item_det_id`),
  KEY `itemid_idx` (`item_id`),
  KEY `distid_idx` (`dist_id`),
  KEY `dist_idx` (`dist_id`),
  KEY `dist` (`dist_id`),
  CONSTRAINT `dist` FOREIGN KEY (`dist_id`) REFERENCES `distribution` (`dist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `itemid` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_detail`
--

LOCK TABLES `item_detail` WRITE;
/*!40000 ALTER TABLE `item_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return`
--

DROP TABLE IF EXISTS `return`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `return` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(45) NOT NULL,
  `reason` varchar(45) NOT NULL,
  `item_det_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `return_person` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`return_id`),
  KEY `itemdet_idx` (`item_det_id`),
  KEY `deptid_idx` (`dept_id`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `deptid` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `itemdet` FOREIGN KEY (`item_det_id`) REFERENCES `item_detail` (`item_det_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return`
--

LOCK TABLES `return` WRITE;
/*!40000 ALTER TABLE `return` DISABLE KEYS */;
/*!40000 ALTER TABLE `return` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-29 22:51:51
