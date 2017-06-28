CREATE DATABASE  IF NOT EXISTS `logs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `logs`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: logs
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
-- Table structure for table `decrease_log`
--

DROP TABLE IF EXISTS `decrease_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `decrease_log` (
  `dec_log_id` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  PRIMARY KEY (`dec_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decrease_log`
--

LOCK TABLES `decrease_log` WRITE;
/*!40000 ALTER TABLE `decrease_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `decrease_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `increase_log`
--

DROP TABLE IF EXISTS `increase_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `increase_log` (
  `inc_log_id` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `supplier` varchar(45) NOT NULL,
  PRIMARY KEY (`inc_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `increase_log`
--

LOCK TABLES `increase_log` WRITE;
/*!40000 ALTER TABLE `increase_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `increase_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_log`
--

DROP TABLE IF EXISTS `return_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `return_log` (
  `return_log_id` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `reason` varchar(45) NOT NULL,
  PRIMARY KEY (`return_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_log`
--

LOCK TABLES `return_log` WRITE;
/*!40000 ALTER TABLE `return_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `return_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-28 14:38:29
