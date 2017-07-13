-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 05:09 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- Table structure for table `account_code`
--

DROP TABLE IF EXISTS `account_code`;
CREATE TABLE `account_code` (
  `ac_id` int(11) NOT NULL,
  `account_code` varchar(45) NOT NULL,
  `description` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `account_code`
--

TRUNCATE TABLE `account_code`;
--
-- Dumping data for table `account_code`
--

INSERT INTO `account_code` (`ac_id`, `account_code`, `description`) VALUES
(1, '1-07-01-010', '	Land'),
(2, '1-07-02-010', 'Land Improvements, Aquaculture Structures'),
(3, '1-07-03-050', '	Power Supply Systems'),
(4, '1-07-04-010', '	Buildings'),
(5, '1-07-04-020', '	School Buildings'),
(6, '1-07-04-030', '	Hospitals and Health Centers'),
(7, '1-07-04-990', '	Other Structures'),
(8, '1-07-05-020', '	Office Equipment'),
(9, '1-07-07-010', '	Furniture and Fixtures'),
(10, '1-07-05-030', 'Information and Communication Technology Equipment'),
(12, '1-07-07-020', '	Books'),
(13, '1-07-05-010', '	Machinery'),
(14, '1-07-05-040', '	Agriculture and Forestry Equipment'),
(15, '1-07-05-070', '	Communication Equipment'),
(16, '1-07-05-080', '	Construction and Heavy Equipment'),
(17, '1-07-05-090', '	Disaster Response and Rescue Equipment'),
(18, '1-07-05-110', '	Medical Equipment'),
(19, '1-07-05-100', 'Military, Police and Security Equipment'),
(20, '1-07-05-130', '	Sports Equipment'),
(21, '1-07-05-140', '	Technical and Scientific Equipment'),
(22, '1-07-05-990', '	Other Machinery and Equipment'),
(23, '1-07-06-010', '	Motor Vehicles'),
(24, '1-07-03-010', '	Road Networks'),
(25, '1-07-03-090', 'Parks, Plazas and Monuments'),
(26, '1-07-03-040', '	Water Supply Systems'),
(27, '1-07-03-020', '	Flood Control Systems'),
(28, '1-07-03-990', '	Other Infrastructure Assets'),
(29, '5-02-02-010', '	Training Expenses'),
(30, '5-02-03-010', '	Office Supplies Expenses'),
(31, '5-02-03-020', '	Accountable Forms Expenses'),
(32, '5-02-03-040', '	Animal/Zoological Expenses'),
(33, '5-02-03-050', '	Food Supplies Expenses'),
(34, '5-02-03-070', '	Drugs and Medicines Expenses'),
(35, '5-02-03-080', 'Medical, Dental and Laboratory Supplies Expenses'),
(36, '5-02-03-090', 'Fuel, Oil and Lubricants Expenses'),
(37, '5-02-03-100', '	Agricultural and Marine Supplies Expenses'),
(38, '5-02-03-110', '	Textbooks and Instructional Materials Expens'),
(39, '5-02-03-120', 'Military, Police and Traffic Supplies Expenses'),
(40, '5-02-03-990', '	Other Supplies and Materials Expenses'),
(41, '5-02-04-010', '	Water Expenses'),
(42, '5-02-04-020', 'Electricity Expenses'),
(43, '5-02-05-010', 'Postage and Courier Services'),
(44, '5-02-05-020', 'Telephone Expenses'),
(45, '5-02-05-030', 'Internet Subscription Expenses'),
(46, '5-02-05-040', 'Cable, Satellite, Telegraph and Radio Expenses'),
(47, '5-02-99-060', 'Membership Dues and Contributions to Organization'),
(48, '5-02-06-010', '	Awards/Rewards Expenses'),
(49, '5-02-99-010', '	Advertising Expenses'),
(50, '5-02-99-020', '	Printing and Publication Expenses'),
(51, '5-02-99-050', '	Rent Expenses'),
(52, '5-02-99-030', '	Representation Expenses'),
(53, '5-02-99-040', '	Transportation and Delivery Expenses'),
(54, '5-02-99-070', '	Subscription Expenses'),
(55, '5-02-07-010', '	Survey Expenses'),
(56, '5-02-11-030', '	Consultancy Services'),
(57, '5-02-12-010', '	Environment/Sanitary Services'),
(58, '5-02-12-990', '	Other General Services'),
(59, '5-02-12-020', '	Janitorial Services'),
(60, '5-02-12-030', '	Security Services'),
(61, '5-02-11-990', '	Other Professional Services'),
(62, '5-02-13-020', '	Repairs and Maintenance - Land Improvements'),
(63, '5-02-13-030', 'Repairs and Maintenance - Infrastructure Assets'),
(64, '5-02-13-040', 'Repairs and Maintenance - Buildings and Other Structures'),
(65, '5-02-13-090', 'Repairs and Maintenance - Leased Assets Improvements'),
(66, '5-02-13-050', 'Repairs and Maintenance - Machinery and Equipment'),
(67, '5-02-13-070', 'Repairs and Maintenance - Furniture and Fixtures'),
(68, '5-02-13-060', 'Repairs and Maintenance - Transportation Equipment'),
(69, '5-02-13-990', 'Repairs and Maintenance - Other Property, Plant and Equipment'),
(70, '5-02-14-020', '	Subsidy to NGAs'),
(71, '5-02-14-030', '	Subsidy to Other Local Government Units'),
(72, '5-02-99-080', '	Donations'),
(73, '5-02-10-030', '	Extraordinary and Miscellaneous Expenses'),
(74, '5-02-16-010', '	Taxes'),
(75, '5-02-16-020', '	Fidelity Bond Premiums'),
(76, '5-02-16-030', '	Insurance Expenses'),
(77, '5-02-99-990', '	Other Maintenance and Operating Expenses'),
(78, '5-03-01-040', '	Bank Charges'),
(79, '1-07-04-040', '	Market'),
(80, '1-07-04-050', '	Slaughterhouses'),
(81, '5-02-03-060', '	Welfare Goods Expenses'),
(85, '5-02-03-130', '	Chemical and Filtering Supplies Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `decrease_log`
--

DROP TABLE IF EXISTS `decrease_log`;
CREATE TABLE `decrease_log` (
  `dec_log_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_det_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `decrease_log`
--

TRUNCATE TABLE `decrease_log`;
--
-- Dumping data for table `decrease_log`
--

INSERT INTO `decrease_log` (`dec_log_id`, `date`, `item_det_id`, `user_id`) VALUES
(1, '2017-07-12 23:29:43', 2, 1),
(2, '2017-07-13 00:52:34', 1, 1),
(3, '2017-07-13 00:52:34', 3, 1),
(4, '2017-07-13 00:52:34', 4, 1),
(5, '2017-07-13 00:56:26', 5, 1),
(6, '2017-07-13 00:56:26', 6, 1),
(7, '2017-07-13 00:56:26', 7, 1),
(8, '2017-07-13 00:56:59', 8, 1),
(9, '2017-07-13 00:56:59', 9, 1),
(10, '2017-07-13 00:56:59', 10, 1),
(11, '2017-07-13 00:56:59', 11, 1),
(12, '2017-07-13 00:58:15', 1, 1),
(13, '2017-07-13 00:59:21', 2, 1),
(14, '2017-07-13 00:59:21', 3, 1),
(15, '2017-07-13 01:00:52', 1, 1),
(16, '2017-07-13 01:01:49', 4, 1),
(17, '2017-07-13 01:01:49', 5, 1),
(18, '2017-07-13 01:01:49', 6, 1),
(19, '2017-07-13 01:01:49', 7, 1),
(20, '2017-07-13 01:02:31', 8, 1),
(21, '2017-07-13 01:02:31', 9, 1),
(22, '2017-07-13 01:02:31', 10, 1),
(23, '2017-07-13 01:02:31', 11, 1),
(24, '2017-07-13 01:02:31', 12, 1),
(25, '2017-07-13 01:02:31', 13, 1),
(26, '2017-07-13 01:02:31', 14, 1),
(27, '2017-07-13 01:02:31', 15, 1),
(28, '2017-07-13 01:03:16', 16, 1),
(29, '2017-07-13 01:03:16', 17, 1),
(30, '2017-07-13 01:03:16', 18, 1),
(31, '2017-07-13 01:03:16', 19, 1),
(32, '2017-07-13 01:03:16', 20, 1),
(33, '2017-07-13 01:03:16', 21, 1),
(34, '2017-07-13 01:03:16', 22, 1),
(35, '2017-07-13 01:03:16', 23, 1),
(36, '2017-07-13 01:03:16', 24, 1),
(37, '2017-07-13 01:03:16', 25, 1),
(38, '2017-07-13 01:03:16', 26, 1),
(39, '2017-07-13 01:03:16', 27, 1),
(40, '2017-07-13 01:03:16', 28, 1),
(41, '2017-07-13 01:04:30', 1, 1),
(42, '2017-07-13 01:05:08', 2, 1),
(43, '2017-07-13 01:05:08', 3, 1),
(44, '2017-07-13 01:07:15', 4, 1),
(45, '2017-07-13 01:07:15', 5, 1),
(46, '2017-07-13 01:07:15', 6, 1),
(47, '2017-07-13 01:07:15', 7, 1),
(48, '2017-07-13 01:08:00', 8, 1),
(49, '2017-07-13 01:08:00', 9, 1),
(50, '2017-07-13 01:08:00', 10, 1),
(51, '2017-07-13 01:08:00', 11, 1),
(52, '2017-07-13 01:08:00', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `res_center_code` varchar(11) NOT NULL,
  `department` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `department`
--

TRUNCATE TABLE `department`;
--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `res_center_code`, `department`) VALUES
(11, '8731', 'CITY ENVIRONMENT & PARKS MANAGEMENT OFFICE'),
(12, '1191', 'BUREAU OF FIRE PREVENTION AND SAFETY'),
(13, '1061', 'GENERAL SERVICES OFFICE'),
(14, '4411', 'HEALTH SERVICES OFFICE'),
(15, '1011B', 'OFFICE OF THE CITY HUMAN RESOURCE CENTER'),
(16, '1131', 'CITY LEGAL OFFICE'),
(17, '1122', 'CITY LIBRARY'),
(18, '1011', 'CITY MAYOR\'S OFFICE'),
(19, '1158', 'MUNICIPAL TRIAL COURT IN CITIES'),
(20, '1041', 'OFFICE OF THE CITY PLANNING AND DEVELOPMENT'),
(21, '1181', 'CITY POLICE OFFICE'),
(22, '9999F', 'PAROLE AND PROBATION OFFICE'),
(23, '1141', 'CITY PROSECUTOR\'S OFFICE'),
(24, '9999G', 'PUBLIC ATTORNEY\'S OFFICE'),
(25, '1151', 'REGIONAL TRIAL COURT'),
(26, '1161', 'REGISTRY OF DEEDS'),
(27, '1021', 'SANGGUNIANG PANGLUNGSOD'),
(28, '7611', 'OFFICE OF THE CITY SOCIAL WELFARE DEVELOPMENT'),
(29, '1091', 'CITY TREASURER\'S OFFICE'),
(30, '8721', 'CITY VETERINARY OFFICE'),
(110, '8751', 'CITY ENGINEER\'S OFFICE'),
(111, '1081', 'CITY ACCOUNTANT\'S OFFICE'),
(112, '1031', 'CITY ADMINISTRATOR\'S OFFICE'),
(113, '1101', 'CITY ASSESSOR\'S OFFICE'),
(114, '1111', 'OFFICE OF THE CITY AUDITOR'),
(115, '1071', 'CITY BUDGET OFFICE'),
(116, '1101A', 'CITY BUILDING AND ARCHITECTURE OFFICE'),
(117, '1171', 'CITY JAIL MANAGEMENT & PENOLOGY'),
(118, '1051', 'OFFICE OF THE LOCAL CIVIL REGISTRAR'),
(119, '3311', 'DEPARTMENT OF EDUCATION');

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

DROP TABLE IF EXISTS `distribution`;
CREATE TABLE `distribution` (
  `dist_id` int(11) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `distrib_date` datetime NOT NULL,
  `dept_id` int(11) NOT NULL,
  `receivedby` varchar(45) NOT NULL,
  `user_distribute` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `distribution`
--

TRUNCATE TABLE `distribution`;
--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`dist_id`, `quantity`, `distrib_date`, `dept_id`, `receivedby`, `user_distribute`) VALUES
(1, '1', '2017-01-01 00:00:00', 11, 'test', 'admin admin');

-- --------------------------------------------------------

--
-- Table structure for table `increase_log`
--

DROP TABLE IF EXISTS `increase_log`;
CREATE TABLE `increase_log` (
  `inc_log_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_det_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `increase_log`
--

TRUNCATE TABLE `increase_log`;
--
-- Dumping data for table `increase_log`
--

INSERT INTO `increase_log` (`inc_log_id`, `date`, `item_det_id`, `user_id`) VALUES
(1, '2017-07-13 00:58:14', 1, 1),
(2, '2017-07-13 00:59:21', 2, 1),
(3, '2017-07-13 00:59:21', 3, 1),
(4, '2017-07-13 01:00:51', 4, 1),
(5, '2017-07-13 01:01:49', 5, 1),
(6, '2017-07-13 01:01:49', 6, 1),
(7, '2017-07-13 01:01:49', 7, 1),
(8, '2017-07-13 01:02:31', 8, 1),
(9, '2017-07-13 01:02:31', 9, 1),
(10, '2017-07-13 01:02:31', 10, 1),
(11, '2017-07-13 01:02:31', 11, 1),
(12, '2017-07-13 01:02:31', 12, 1),
(13, '2017-07-13 01:02:31', 13, 1),
(14, '2017-07-13 01:02:31', 14, 1),
(15, '2017-07-13 01:02:31', 15, 1),
(16, '2017-07-13 01:03:15', 16, 1),
(17, '2017-07-13 01:03:15', 17, 1),
(18, '2017-07-13 01:03:15', 18, 1),
(19, '2017-07-13 01:03:15', 19, 1),
(20, '2017-07-13 01:03:15', 20, 1),
(21, '2017-07-13 01:03:15', 21, 1),
(22, '2017-07-13 01:03:15', 22, 1),
(23, '2017-07-13 01:03:15', 23, 1),
(24, '2017-07-13 01:03:15', 24, 1),
(25, '2017-07-13 01:03:15', 25, 1),
(26, '2017-07-13 01:03:15', 26, 1),
(27, '2017-07-13 01:03:15', 27, 1),
(28, '2017-07-13 01:03:15', 28, 1),
(29, '2017-07-13 01:04:30', 1, 1),
(30, '2017-07-13 01:05:08', 2, 1),
(31, '2017-07-13 01:05:08', 3, 1),
(32, '2017-07-13 01:05:57', 4, 1),
(33, '2017-07-13 01:05:57', 5, 1),
(34, '2017-07-13 01:05:57', 6, 1),
(35, '2017-07-13 01:07:15', 7, 1),
(36, '2017-07-13 01:08:00', 8, 1),
(37, '2017-07-13 01:08:00', 9, 1),
(38, '2017-07-13 01:08:00', 10, 1),
(39, '2017-07-13 01:08:00', 11, 1),
(40, '2017-07-13 01:08:00', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `item_description` varchar(45) NOT NULL,
  `unit` enum('piece','box','set','ream','dozen','bundle','sack','others') NOT NULL DEFAULT 'others',
  `item_type` enum('CO','MOOE') DEFAULT 'CO',
  `account_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `item`
--

TRUNCATE TABLE `item`;
--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `quantity`, `item_description`, `unit`, `item_type`, `account_id`) VALUES
(1, 'test', '9', 'test', 'piece', 'CO', 1);

--
-- Triggers `item`
--
DROP TRIGGER IF EXISTS `addquantity`;
DELIMITER $$
CREATE TRIGGER `addquantity` AFTER UPDATE ON `item` FOR EACH ROW BEGIN
		
        SET @counter = 0;
         while @counter < new.quantity-old.quantity do
         	INSERT INTO item_detail (item_id) VALUES (NEW.item_id);
		set @counter=@counter+1;
    	end while ;
  END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `item_detail`;
DELIMITER $$
CREATE TRIGGER `item_detail` AFTER INSERT ON `item` FOR EACH ROW BEGIN
		
        SET @counter = 0;
         while @counter < new.quantity do
         	INSERT INTO item_detail (item_id) VALUES (NEW.item_id);
		set @counter=@counter+1;
    	end while ;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item_detail`
--

DROP TABLE IF EXISTS `item_detail`;
CREATE TABLE `item_detail` (
  `item_det_id` int(11) NOT NULL,
  `serial` int(11) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `supplier` varchar(60) DEFAULT NULL,
  `official_receipt_no` int(11) DEFAULT NULL,
  `del_date` datetime DEFAULT NULL,
  `date_rec` datetime DEFAULT NULL,
  `receivedby` varchar(60) DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `dist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `item_detail`
--

TRUNCATE TABLE `item_detail`;
--
-- Dumping data for table `item_detail`
--

INSERT INTO `item_detail` (`item_det_id`, `serial`, `exp_date`, `supplier`, `official_receipt_no`, `del_date`, `date_rec`, `receivedby`, `unit_cost`, `item_id`, `dist_id`) VALUES
(1, NULL, '2017-01-01', 'test', 2, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'test', 4, 1, NULL),
(2, NULL, '2017-01-01', 'testtest', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'test', 2, 1, NULL),
(3, NULL, '2017-01-01', 'testtest', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'test', 2, 1, NULL),
(4, NULL, '2017-01-01', 'lastnatalaga', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 3, 1, NULL),
(5, NULL, '2017-01-01', 'lastnatalaga', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 3, 1, NULL),
(6, NULL, '2017-01-01', 'lastnatalaga', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 3, 1, NULL),
(7, NULL, '2017-01-01', 'lastnatalaga', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 3, 1, NULL),
(8, NULL, '2017-01-01', 'dont replace', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 4, 1, NULL),
(9, NULL, '2017-01-01', 'dont replace', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 4, 1, NULL),
(10, NULL, '2017-01-01', 'dont replace', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 4, 1, NULL),
(11, NULL, '2017-01-01', 'dont replace', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 4, 1, NULL),
(12, NULL, '2017-01-01', 'dont replace', 1, '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'lastnatalaga', 4, 1, NULL);

--
-- Triggers `item_detail`
--
DROP TRIGGER IF EXISTS `decrease_log`;
DELIMITER $$
CREATE TRIGGER `decrease_log` AFTER UPDATE ON `item_detail` FOR EACH ROW BEGIN	
   	INSERT INTO decrease_log (item_det_id) VALUES (NEW.item_det_id);
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `increase_log`;
DELIMITER $$
CREATE TRIGGER `increase_log` AFTER INSERT ON `item_detail` FOR EACH ROW BEGIN	
   	INSERT INTO increase_log (item_det_id) VALUES (NEW.item_det_id);
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `return_log`
--

DROP TABLE IF EXISTS `return_log`;
CREATE TABLE `return_log` (
  `return_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` varchar(45) NOT NULL,
  `item_det_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `return_person` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `return_log`
--

TRUNCATE TABLE `return_log`;
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `position`) VALUES
(1, 'admin', 'admin', 'Joy_Cabildo24@yahoo.com', '09053983127', 'admin', 'admin', 'admin'),
(221, 'Lovelace ', 'Oliva', 'lv@gmail.com', '+6392588845', 'love', 'password', 'admin'),
(222, 'Lyra ', 'Ronquillo', 'lyra@yahoo.com', '09254785639', 'lyra', 'password', 'custodian'),
(223, 'Joy', 'Cabildo', 'Joy@yahoo.com', '09554287136', 'joy', 'password', 'department head'),
(225, 'Heinrich', 'Bangui', 'hein@yahoo.com', '09235987452', 'hein', 'password', 'admin'),
(226, 'Mark', 'Andawi', 'Mark@yahoo.com', '09854732156', 'Mark', 'password', 'custodian'),
(227, 'Ryan', 'Castillo', 'Rye@yahoo.com', '09852145778', 'Ryan', 'password', 'admin'),
(228, 'Glo', 'Goyo', 'Glo@yahoo.com', '09582145877', 'Glo', 'password', 'department'),
(229, 'russel', 'Bayote', 'Russel@yahoo.com', '09854731251', 'Russ', 'password', 'admin'),
(2210, 'Ian', 'Alinso', 'Ian@yahoo.com', '09854564521', 'Ian', 'password', 'custodian'),
(2211, 'Christian', 'Beltran', 'Chris@yahoo.com', '09855472364', 'Chris', 'password', 'admin'),
(2212, 'hhthyt', 'tyh', 'htyh@gmai.com', 'tyhty', 'htyhty', '123', 'Warehouse Officer'),
(2213, 'yo', 'mama', 'yomama@gmail.com', '20323204104', 'yo', '123', 'Warehouse Officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_code`
--
ALTER TABLE `account_code`
  ADD PRIMARY KEY (`ac_id`),
  ADD UNIQUE KEY `ac_id` (`ac_id`),
  ADD KEY `acid` (`account_code`);

--
-- Indexes for table `decrease_log`
--
ALTER TABLE `decrease_log`
  ADD PRIMARY KEY (`dec_log_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`dist_id`),
  ADD KEY `depid_idx` (`dept_id`);

--
-- Indexes for table `increase_log`
--
ALTER TABLE `increase_log`
  ADD PRIMARY KEY (`inc_log_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `accountid_idx` (`account_id`);

--
-- Indexes for table `item_detail`
--
ALTER TABLE `item_detail`
  ADD PRIMARY KEY (`item_det_id`),
  ADD KEY `itemid_idx` (`item_id`),
  ADD KEY `distid_idx` (`dist_id`),
  ADD KEY `dist_idx` (`dist_id`),
  ADD KEY `dist` (`dist_id`);

--
-- Indexes for table `return_log`
--
ALTER TABLE `return_log`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `itemdet_idx` (`item_det_id`),
  ADD KEY `deptid_idx` (`dept_id`),
  ADD KEY `userid_idx` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_code`
--
ALTER TABLE `account_code`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `decrease_log`
--
ALTER TABLE `decrease_log`
  MODIFY `dec_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `increase_log`
--
ALTER TABLE `increase_log`
  MODIFY `inc_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `item_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `return_log`
--
ALTER TABLE `return_log`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2214;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `distribution`
--
ALTER TABLE `distribution`
  ADD CONSTRAINT `depid` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `accountid` FOREIGN KEY (`account_id`) REFERENCES `account_code` (`ac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_detail`
--
ALTER TABLE `item_detail`
  ADD CONSTRAINT `dist` FOREIGN KEY (`dist_id`) REFERENCES `distribution` (`dist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itemid` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
