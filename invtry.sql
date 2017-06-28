CREATE DATABASE  IF NOT EXISTS `inventoryy` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventoryy`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: inventoryy
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
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_code`
--

LOCK TABLES `account_code` WRITE;
/*!40000 ALTER TABLE `account_code` DISABLE KEYS */;
INSERT INTO `account_code` VALUES (11,'1-07- 01-010'),(12,'1-07-02-010'),(13,'1-07-03-050'),(14,'1-07-04-010'),(15,'1-07-04-020');
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
  PRIMARY KEY (`dist_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution`
--

LOCK TABLES `distribution` WRITE;
/*!40000 ALTER TABLE `distribution` DISABLE KEYS */;
/*!40000 ALTER TABLE `distribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `i_ac`
--

DROP TABLE IF EXISTS `i_ac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `i_ac` (
  `item_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `usage` varchar(45) NOT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `i_ac`
--

LOCK TABLES `i_ac` WRITE;
/*!40000 ALTER TABLE `i_ac` DISABLE KEYS */;
/*!40000 ALTER TABLE `i_ac` ENABLE KEYS */;
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
  `i_ac` int(5) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Laptop','2','','',0,0),(2,'TV','1','','',0,0),(3,'Router','3','','',0,0),(4,'Ballpen','2','','',0,0),(5,'Bond Paper','1','','',0,0);
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
  PRIMARY KEY (`item_det_id`)
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
  PRIMARY KEY (`return_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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

-- Dump completed on 2017-06-28 14:38:57
