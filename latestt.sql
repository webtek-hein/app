CREATE DATABASE  IF NOT EXISTS `newinventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `newinventory`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: newinventory
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
  `account_code` varchar(45) NOT NULL,
  `description` varchar(70) NOT NULL,
  PRIMARY KEY (`ac_id`),
  UNIQUE KEY `ac_id` (`ac_id`),
  KEY `acid` (`account_code`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_code`
--

LOCK TABLES `account_code` WRITE;
/*!40000 ALTER TABLE `account_code` DISABLE KEYS */;
INSERT INTO `account_code` VALUES (1,'1-07-01-010','	Land'),(2,'1-07-02-010','Land Improvements, Aquaculture Structures'),(3,'1-07-03-050','	Power Supply Systems'),(4,'1-07-04-010','	Buildings'),(5,'1-07-04-020','	School Buildings'),(6,'1-07-04-030','	Hospitals and Health Centers'),(7,'1-07-04-990','	Other Structures'),(8,'1-07-05-020','	Office Equipment'),(9,'1-07-07-010','	Furniture and Fixtures'),(10,'1-07-05-030','Information and Communication Technology Equipment'),(12,'1-07-07-020','	Books'),(13,'1-07-05-010','	Machinery'),(14,'1-07-05-040','	Agriculture and Forestry Equipment'),(15,'1-07-05-070','	Communication Equipment'),(16,'1-07-05-080','	Construction and Heavy Equipment'),(17,'1-07-05-090','	Disaster Response and Rescue Equipment'),(18,'1-07-05-110','	Medical Equipment'),(19,'1-07-05-100','Military, Police and Security Equipment'),(20,'1-07-05-130','	Sports Equipment'),(21,'1-07-05-140','	Technical and Scientific Equipment'),(22,'1-07-05-990','	Other Machinery and Equipment'),(23,'1-07-06-010','	Motor Vehicles'),(24,'1-07-03-010','	Road Networks'),(25,'1-07-03-090','Parks, Plazas and Monuments'),(26,'1-07-03-040','	Water Supply Systems'),(27,'1-07-03-020','	Flood Control Systems'),(28,'1-07-03-990','	Other Infrastructure Assets'),(29,'5-02-02-010','	Training Expenses'),(30,'5-02-03-010','	Office Supplies Expenses'),(31,'5-02-03-020','	Accountable Forms Expenses'),(32,'5-02-03-040','	Animal/Zoological Expenses'),(33,'5-02-03-050','	Food Supplies Expenses'),(34,'5-02-03-070','	Drugs and Medicines Expenses'),(35,'5-02-03-080','Medical, Dental and Laboratory Supplies Expenses'),(36,'5-02-03-090','Fuel, Oil and Lubricants Expenses'),(37,'5-02-03-100','	Agricultural and Marine Supplies Expenses'),(38,'5-02-03-110','	Textbooks and Instructional Materials Expens'),(39,'5-02-03-120','Military, Police and Traffic Supplies Expenses'),(40,'5-02-03-990','	Other Supplies and Materials Expenses'),(41,'5-02-04-010','	Water Expenses'),(42,'5-02-04-020','Electricity Expenses'),(43,'5-02-05-010','Postage and Courier Services'),(44,'5-02-05-020','Telephone Expenses'),(45,'5-02-05-030','Internet Subscription Expenses'),(46,'5-02-05-040','Cable, Satellite, Telegraph and Radio Expenses'),(47,'5-02-99-060','Membership Dues and Contributions to Organization'),(48,'5-02-06-010','	Awards/Rewards Expenses'),(49,'5-02-99-010','	Advertising Expenses'),(50,'5-02-99-020','	Printing and Publication Expenses'),(51,'5-02-99-050','	Rent Expenses'),(52,'5-02-99-030','	Representation Expenses'),(53,'5-02-99-040','	Transportation and Delivery Expenses'),(54,'5-02-99-070','	Subscription Expenses'),(55,'5-02-07-010','	Survey Expenses'),(56,'5-02-11-030','	Consultancy Services'),(57,'5-02-12-010','	Environment/Sanitary Services'),(58,'5-02-12-990','	Other General Services'),(59,'5-02-12-020','	Janitorial Services'),(60,'5-02-12-030','	Security Services'),(61,'5-02-11-990','	Other Professional Services'),(62,'5-02-13-020','	Repairs and Maintenance - Land Improvements'),(63,'5-02-13-030','Repairs and Maintenance - Infrastructure Assets'),(64,'5-02-13-040','Repairs and Maintenance - Buildings and Other Structures'),(65,'5-02-13-090','Repairs and Maintenance - Leased Assets Improvements'),(66,'5-02-13-050','Repairs and Maintenance - Machinery and Equipment'),(67,'5-02-13-070','Repairs and Maintenance - Furniture and Fixtures'),(68,'5-02-13-060','Repairs and Maintenance - Transportation Equipment'),(69,'5-02-13-990','Repairs and Maintenance - Other Property, Plant and Equipment'),(70,'5-02-14-020','	Subsidy to NGAs'),(71,'5-02-14-030','	Subsidy to Other Local Government Units'),(72,'5-02-99-080','	Donations'),(73,'5-02-10-030','	Extraordinary and Miscellaneous Expenses'),(74,'5-02-16-010','	Taxes'),(75,'5-02-16-020','	Fidelity Bond Premiums'),(76,'5-02-16-030','	Insurance Expenses'),(77,'5-02-99-990','	Other Maintenance and Operating Expenses'),(78,'5-03-01-040','	Bank Charges'),(79,'1-07-04-040','	Market'),(80,'1-07-04-050','	Slaughterhouses'),(81,'5-02-03-060','	Welfare Goods Expenses'),(85,'5-02-03-130','	Chemical and Filtering Supplies Expenses');
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
  `res_center_code` varchar(11) NOT NULL,
  `department` varchar(60) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (11,'8731','CITY ENVIRONMENT & PARKS MANAGEMENT OFFICE'),(12,'1191','BUREAU OF FIRE PREVENTION AND SAFETY'),(13,'1061','GENERAL SERVICES OFFICE'),(14,'4411','HEALTH SERVICES OFFICE'),(15,'1011B','OFFICE OF THE CITY HUMAN RESOURCE CENTER'),(16,'1131','CITY LEGAL OFFICE'),(17,'1122','CITY LIBRARY'),(18,'1011','CITY MAYOR\'S OFFICE'),(19,'1158','MUNICIPAL TRIAL COURT IN CITIES'),(20,'1041','OFFICE OF THE CITY PLANNING AND DEVELOPMENT'),(21,'1181','CITY POLICE OFFICE'),(22,'9999F','PAROLE AND PROBATION OFFICE'),(23,'1141','CITY PROSECUTOR\'S OFFICE'),(24,'9999G','PUBLIC ATTORNEY\'S OFFICE'),(25,'1151','REGIONAL TRIAL COURT'),(26,'1161','REGISTRY OF DEEDS'),(27,'1021','SANGGUNIANG PANGLUNGSOD'),(28,'7611','OFFICE OF THE CITY SOCIAL WELFARE DEVELOPMENT'),(29,'1091','CITY TREASURER\'S OFFICE'),(30,'8721','CITY VETERINARY OFFICE'),(110,'8751','CITY ENGINEER\'S OFFICE'),(111,'1081','CITY ACCOUNTANT\'S OFFICE'),(112,'1031','CITY ADMINISTRATOR\'S OFFICE'),(113,'1101','CITY ASSESSOR\'S OFFICE'),(114,'1111','OFFICE OF THE CITY AUDITOR'),(115,'1071','CITY BUDGET OFFICE'),(116,'1101A','CITY BUILDING AND ARCHITECTURE OFFICE'),(117,'1171','CITY JAIL MANAGEMENT & PENOLOGY'),(118,'1051','OFFICE OF THE LOCAL CIVIL REGISTRAR'),(119,'3311','DEPARTMENT OF EDUCATION');
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
  `date` datetime NOT NULL,
  `dept_id` int(11) NOT NULL,
  `recieved` varchar(45) NOT NULL,
  `user_distribute` varchar(45) NOT NULL,
  PRIMARY KEY (`dist_id`),
  KEY `depid_idx` (`dept_id`),
  CONSTRAINT `depid` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=451 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribution`
--

LOCK TABLES `distribution` WRITE;
/*!40000 ALTER TABLE `distribution` DISABLE KEYS */;
INSERT INTO `distribution` VALUES (441,'3','2017-07-28 08:00:00',11,'Kenneth Lee','Heinrch Bangui'),(442,'5','2017-07-20 04:00:00',12,'Leo Jung','Lovelace Oliva'),(443,'20','2017-07-19 03:00:00',13,'Ron Quilang','Mark Andawi'),(444,'3','2017-12-19 02:00:00',14,'Kyle Atienza','Christian Beltran'),(445,'50','2017-12-28 01:00:00',16,'Lean Dalin','Swira Cogasi'),(446,'20','2017-10-28 11:00:00',18,'Anton Lucas','Ian Alinso'),(447,'15','2017-11-28 06:00:00',19,'Jeco Ramos','Ryan Castillo'),(448,'50','2017-11-15 06:00:00',20,'Micca Delmedo','Mark Andawi'),(449,'50','2017-11-15 06:00:00',15,'Daren Dayrit','Lovelace Oliva'),(450,'20','2017-11-05 09:00:00',14,'Jan Romano','Ryan Castillo');
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
  `description` varchar(45) NOT NULL,
  `official_receipt` varchar(20) NOT NULL,
  `del_date` datetime NOT NULL,
  `date_rec` datetime NOT NULL,
  `receivedby` varchar(60) NOT NULL,
  `cost` double NOT NULL,
  `unit` enum('piece','box','set','ream','dozen','bundle','sack','others') NOT NULL DEFAULT 'others',
  `account_id` int(5) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `accountid_idx` (`account_id`),
  CONSTRAINT `accountid` FOREIGN KEY (`account_id`) REFERENCES `account_code` (`ac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (331,'Laptop','3','black laptops','0490','2017-07-17 06:00:00','2017-07-28 08:00:00','Louie Echave',2500,'others',8),(332,'TV','5','14 inches','0495','2017-07-18 08:00:00','2017-07-20 04:00:00','Neil Macalanda',2364,'others',7),(333,'Tarpaulin','20','White','0488','2017-07-18 09:00:00','2017-07-19 03:00:00','Fernando Lopez',2549,'others',5),(334,'Table','3','Wood','0485','2017-12-18 09:00:00','2017-12-19 02:00:00','Christian Luyon',50000,'others',3),(335,'Bulb','50','Circle','0458','2017-12-25 09:00:00','2017-12-28 01:00:00','Bernadette Lucas',3000,'others',8),(336,'Bond Paper','20','Short','1245','2017-10-25 09:00:00','2017-10-28 11:00:00','Hiacynth Santos',2000,'others',2),(337,'Wires','15','Blue','1255','2017-11-25 09:00:00','2017-11-28 06:00:00','Rotsen Bayawa',2463,'others',1),(338,'Ballpen','50','Black','2551','2017-11-12 09:00:00','2017-11-15 06:00:00','deczan Pida',2364,'others',8),(339,'Pencil','50','Nyllon','2145','2017-11-13 09:00:00','2017-11-15 06:00:00','Ace Rimalos',600,'others',2),(340,'Eraser','20','White','3369','2017-11-05 09:00:00','2017-11-07 06:00:00','Ravi Kim',960,'others',2);
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
  `contact_no` varchar(12) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2212 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (221,'Lovelace ','Oliva','lv@gmail.com','+6392588845','love','password','admin'),(222,'Lyra ','Ronquillo','lyra@yahoo.com','09254785639','lyra','password','custodian'),(223,'Joy','Cabildo','Joy@yahoo.com','09554287136','joy','password','department head'),(225,'Heinrigh','Bangui','Henry@yahoo.com','09235987452','Henry','password','admin'),(226,'Mark','Andawi','Mark@yahoo.com','09854732156','Mark','password','custodian'),(227,'Ryan','Castillo','Rye@yahoo.com','09852145778','Ryan','password','admin'),(228,'Glo','Goyo','Glo@yahoo.com','09582145877','Glo','password','department'),(229,'russel','Bayote','Russel@yahoo.com','09854731251','Russ','password','admin'),(2210,'Ian','Alinso','Ian@yahoo.com','09854564521','Ian','password','custodian'),(2211,'Christian','Beltran','Chris@yahoo.com','09855472364','Chris','password','admin');
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

-- Dump completed on 2017-07-03 12:12:06
