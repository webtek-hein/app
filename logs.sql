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
INSERT INTO `decrease_log` VALUES (881,'2017-07-28 08:00:00'),(882,'2017-07-19 03:00:00'),(883,'2017-12-19 02:00:00'),(884,'2017-12-19 02:00:00'),(885,'2017-10-28 11:00:00'),(886,'2017-11-28 06:00:00'),(887,'2017-11-15 06:00:00'),(888,'2017-11-15 06:00:00'),(889,'2017-11-07 06:00:00');
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
INSERT INTO `increase_log` VALUES (991,'2017-07-17 06:00:00','Samsung'),(992,'2017-07-18 08:00:00','Panasonic'),(993,'2017-07-18 09:00:00','Teuz'),(994,'2017-12-18 09:00:00','SM Baguio'),(995,'2017-12-25 09:00:00','SM Baguio'),(996,'2017-10-25 09:00:00','Orion'),(997,'2017-11-25 09:00:00','Megatech'),(998,'2017-11-12 09:00:00','Pilot'),(999,'2017-11-13 09:00:00','Nyllon'),(1000,'2017-11-05 09:00:00','HBW');
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

-- Dump completed on 2017-07-03 10:37:14
