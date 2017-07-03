-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 04:57 AM
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
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `res_center_code` varchar(11) NOT NULL,
  `department` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date` datetime NOT NULL,
  `dept_id` int(11) NOT NULL,
  `recieved` varchar(45) NOT NULL,
  `user_distribute` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`dist_id`, `quantity`, `date`, `dept_id`, `recieved`, `user_distribute`) VALUES
(441, '3', '2017-07-28 08:00:00', 11, 'Kenneth Lee', 'Heinrch Bangui'),
(442, '5', '2017-07-20 04:00:00', 12, 'Leo Jung', 'Lovelace Oliva'),
(443, '20', '2017-07-19 03:00:00', 13, 'Ron Quilang', 'Mark Andawi'),
(444, '3', '2017-12-19 02:00:00', 14, 'Kyle Atienza', 'Christian Beltran'),
(445, '50', '2017-12-28 01:00:00', 16, 'Lean Dalin', 'Swira Cogasi'),
(446, '20', '2017-10-28 11:00:00', 18, 'Anton Lucas', 'Ian Alinso'),
(447, '15', '2017-11-28 06:00:00', 19, 'Jeco Ramos', 'Ryan Castillo'),
(448, '50', '2017-11-15 06:00:00', 20, 'Micca Delmedo', 'Mark Andawi'),
(449, '50', '2017-11-15 06:00:00', 15, 'Daren Dayrit', 'Lovelace Oliva'),
(450, '20', '2017-11-05 09:00:00', 14, 'Jan Romano', 'Ryan Castillo');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `official_receipt` varchar(20) NOT NULL,
  `del_date` datetime NOT NULL,
  `date_rec` datetime NOT NULL,
  `receivedby` varchar(60) NOT NULL,
  `cost` double NOT NULL,
  `unit` enum('piece','box','set','ream','dozen','bundle','sack','others') NOT NULL DEFAULT 'others',
  `account_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `quantity`, `description`, `official_receipt`, `del_date`, `date_rec`, `receivedby`, `cost`, `unit`, `account_id`) VALUES
(331, 'Laptop', '3', 'black laptops', '0490', '2017-07-17 06:00:00', '2017-07-28 08:00:00', 'Louie Echave', 2500, 'others', 8),
(332, 'TV', '5', '14 inches', '0495', '2017-07-18 08:00:00', '2017-07-20 04:00:00', 'Neil Macalanda', 2364, 'others', 7),
(333, 'Tarpaulin', '20', 'White', '0488', '2017-07-18 09:00:00', '2017-07-19 03:00:00', 'Fernando Lopez', 2549, 'others', 5),
(334, 'Table', '3', 'Wood', '0485', '2017-12-18 09:00:00', '2017-12-19 02:00:00', 'Christian Luyon', 50000, 'others', 3),
(335, 'Bulb', '50', 'Circle', '0458', '2017-12-25 09:00:00', '2017-12-28 01:00:00', 'Bernadette Lucas', 3000, 'others', 8),
(336, 'Bond Paper', '20', 'Short', '1245', '2017-10-25 09:00:00', '2017-10-28 11:00:00', 'Hiacynth Santos', 2000, 'others', 2),
(337, 'Wires', '15', 'Blue', '1255', '2017-11-25 09:00:00', '2017-11-28 06:00:00', 'Rotsen Bayawa', 2463, 'others', 1),
(338, 'Ballpen', '50', 'Black', '2551', '2017-11-12 09:00:00', '2017-11-15 06:00:00', 'deczan Pida', 2364, 'others', 8),
(339, 'Pencil', '50', 'Nyllon', '2145', '2017-11-13 09:00:00', '2017-11-15 06:00:00', 'Ace Rimalos', 600, 'others', 2),
(340, 'Eraser', '20', 'White', '3369', '2017-11-05 09:00:00', '2017-11-07 06:00:00', 'Ravi Kim', 960, 'others', 2);

--
-- Triggers `item`
--
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
  `exp_date` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `dist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_detail`
--

INSERT INTO `item_detail` (`item_det_id`, `serial`, `exp_date`, `item_id`, `dist_id`) VALUES
(8, NULL, NULL, 331, NULL),
(9, NULL, NULL, 331, NULL),
(10, NULL, NULL, 331, NULL),
(11, NULL, NULL, 332, NULL),
(12, NULL, NULL, 332, NULL),
(13, NULL, NULL, 332, NULL),
(14, NULL, NULL, 332, NULL),
(15, NULL, NULL, 332, NULL),
(16, NULL, NULL, 333, NULL),
(17, NULL, NULL, 333, NULL),
(18, NULL, NULL, 333, NULL),
(19, NULL, NULL, 333, NULL),
(20, NULL, NULL, 333, NULL),
(21, NULL, NULL, 333, NULL),
(22, NULL, NULL, 333, NULL),
(23, NULL, NULL, 333, NULL),
(24, NULL, NULL, 333, NULL),
(25, NULL, NULL, 333, NULL),
(26, NULL, NULL, 333, NULL),
(27, NULL, NULL, 333, NULL),
(28, NULL, NULL, 333, NULL),
(29, NULL, NULL, 333, NULL),
(30, NULL, NULL, 333, NULL),
(31, NULL, NULL, 333, NULL),
(32, NULL, NULL, 333, NULL),
(33, NULL, NULL, 333, NULL),
(34, NULL, NULL, 333, NULL),
(35, NULL, NULL, 333, NULL),
(36, NULL, NULL, 334, NULL),
(37, NULL, NULL, 334, NULL),
(38, NULL, NULL, 334, NULL),
(39, NULL, NULL, 335, NULL),
(40, NULL, NULL, 335, NULL),
(41, NULL, NULL, 335, NULL),
(42, NULL, NULL, 335, NULL),
(43, NULL, NULL, 335, NULL),
(44, NULL, NULL, 335, NULL),
(45, NULL, NULL, 335, NULL),
(46, NULL, NULL, 335, NULL),
(47, NULL, NULL, 335, NULL),
(48, NULL, NULL, 335, NULL),
(49, NULL, NULL, 335, NULL),
(50, NULL, NULL, 335, NULL),
(51, NULL, NULL, 335, NULL),
(52, NULL, NULL, 335, NULL),
(53, NULL, NULL, 335, NULL),
(54, NULL, NULL, 335, NULL),
(55, NULL, NULL, 335, NULL),
(56, NULL, NULL, 335, NULL),
(57, NULL, NULL, 335, NULL),
(58, NULL, NULL, 335, NULL),
(59, NULL, NULL, 335, NULL),
(60, NULL, NULL, 335, NULL),
(61, NULL, NULL, 335, NULL),
(62, NULL, NULL, 335, NULL),
(63, NULL, NULL, 335, NULL),
(64, NULL, NULL, 335, NULL),
(65, NULL, NULL, 335, NULL),
(66, NULL, NULL, 335, NULL),
(67, NULL, NULL, 335, NULL),
(68, NULL, NULL, 335, NULL),
(69, NULL, NULL, 335, NULL),
(70, NULL, NULL, 335, NULL),
(71, NULL, NULL, 335, NULL),
(72, NULL, NULL, 335, NULL),
(73, NULL, NULL, 335, NULL),
(74, NULL, NULL, 335, NULL),
(75, NULL, NULL, 335, NULL),
(76, NULL, NULL, 335, NULL),
(77, NULL, NULL, 335, NULL),
(78, NULL, NULL, 335, NULL),
(79, NULL, NULL, 335, NULL),
(80, NULL, NULL, 335, NULL),
(81, NULL, NULL, 335, NULL),
(82, NULL, NULL, 335, NULL),
(83, NULL, NULL, 335, NULL),
(84, NULL, NULL, 335, NULL),
(85, NULL, NULL, 335, NULL),
(86, NULL, NULL, 335, NULL),
(87, NULL, NULL, 335, NULL),
(88, NULL, NULL, 335, NULL),
(89, NULL, NULL, 336, NULL),
(90, NULL, NULL, 336, NULL),
(91, NULL, NULL, 336, NULL),
(92, NULL, NULL, 336, NULL),
(93, NULL, NULL, 336, NULL),
(94, NULL, NULL, 336, NULL),
(95, NULL, NULL, 336, NULL),
(96, NULL, NULL, 336, NULL),
(97, NULL, NULL, 336, NULL),
(98, NULL, NULL, 336, NULL),
(99, NULL, NULL, 336, NULL),
(100, NULL, NULL, 336, NULL),
(101, NULL, NULL, 336, NULL),
(102, NULL, NULL, 336, NULL),
(103, NULL, NULL, 336, NULL),
(104, NULL, NULL, 336, NULL),
(105, NULL, NULL, 336, NULL),
(106, NULL, NULL, 336, NULL),
(107, NULL, NULL, 336, NULL),
(108, NULL, NULL, 336, NULL),
(109, NULL, NULL, 337, NULL),
(110, NULL, NULL, 337, NULL),
(111, NULL, NULL, 337, NULL),
(112, NULL, NULL, 337, NULL),
(113, NULL, NULL, 337, NULL),
(114, NULL, NULL, 337, NULL),
(115, NULL, NULL, 337, NULL),
(116, NULL, NULL, 337, NULL),
(117, NULL, NULL, 337, NULL),
(118, NULL, NULL, 337, NULL),
(119, NULL, NULL, 337, NULL),
(120, NULL, NULL, 337, NULL),
(121, NULL, NULL, 337, NULL),
(122, NULL, NULL, 337, NULL),
(123, NULL, NULL, 337, NULL),
(124, NULL, NULL, 338, NULL),
(125, NULL, NULL, 338, NULL),
(126, NULL, NULL, 338, NULL),
(127, NULL, NULL, 338, NULL),
(128, NULL, NULL, 338, NULL),
(129, NULL, NULL, 338, NULL),
(130, NULL, NULL, 338, NULL),
(131, NULL, NULL, 338, NULL),
(132, NULL, NULL, 338, NULL),
(133, NULL, NULL, 338, NULL),
(134, NULL, NULL, 338, NULL),
(135, NULL, NULL, 338, NULL),
(136, NULL, NULL, 338, NULL),
(137, NULL, NULL, 338, NULL),
(138, NULL, NULL, 338, NULL),
(139, NULL, NULL, 338, NULL),
(140, NULL, NULL, 338, NULL),
(141, NULL, NULL, 338, NULL),
(142, NULL, NULL, 338, NULL),
(143, NULL, NULL, 338, NULL),
(144, NULL, NULL, 338, NULL),
(145, NULL, NULL, 338, NULL),
(146, NULL, NULL, 338, NULL),
(147, NULL, NULL, 338, NULL),
(148, NULL, NULL, 338, NULL),
(149, NULL, NULL, 338, NULL),
(150, NULL, NULL, 338, NULL),
(151, NULL, NULL, 338, NULL),
(152, NULL, NULL, 338, NULL),
(153, NULL, NULL, 338, NULL),
(154, NULL, NULL, 338, NULL),
(155, NULL, NULL, 338, NULL),
(156, NULL, NULL, 338, NULL),
(157, NULL, NULL, 338, NULL),
(158, NULL, NULL, 338, NULL),
(159, NULL, NULL, 338, NULL),
(160, NULL, NULL, 338, NULL),
(161, NULL, NULL, 338, NULL),
(162, NULL, NULL, 338, NULL),
(163, NULL, NULL, 338, NULL),
(164, NULL, NULL, 338, NULL),
(165, NULL, NULL, 338, NULL),
(166, NULL, NULL, 338, NULL),
(167, NULL, NULL, 338, NULL),
(168, NULL, NULL, 338, NULL),
(169, NULL, NULL, 338, NULL),
(170, NULL, NULL, 338, NULL),
(171, NULL, NULL, 338, NULL),
(172, NULL, NULL, 338, NULL),
(173, NULL, NULL, 338, NULL),
(174, NULL, NULL, 339, NULL),
(175, NULL, NULL, 339, NULL),
(176, NULL, NULL, 339, NULL),
(177, NULL, NULL, 339, NULL),
(178, NULL, NULL, 339, NULL),
(179, NULL, NULL, 339, NULL),
(180, NULL, NULL, 339, NULL),
(181, NULL, NULL, 339, NULL),
(182, NULL, NULL, 339, NULL),
(183, NULL, NULL, 339, NULL),
(184, NULL, NULL, 339, NULL),
(185, NULL, NULL, 339, NULL),
(186, NULL, NULL, 339, NULL),
(187, NULL, NULL, 339, NULL),
(188, NULL, NULL, 339, NULL),
(189, NULL, NULL, 339, NULL),
(190, NULL, NULL, 339, NULL),
(191, NULL, NULL, 339, NULL),
(192, NULL, NULL, 339, NULL),
(193, NULL, NULL, 339, NULL),
(194, NULL, NULL, 339, NULL),
(195, NULL, NULL, 339, NULL),
(196, NULL, NULL, 339, NULL),
(197, NULL, NULL, 339, NULL),
(198, NULL, NULL, 339, NULL),
(199, NULL, NULL, 339, NULL),
(200, NULL, NULL, 339, NULL),
(201, NULL, NULL, 339, NULL),
(202, NULL, NULL, 339, NULL),
(203, NULL, NULL, 339, NULL),
(204, NULL, NULL, 339, NULL),
(205, NULL, NULL, 339, NULL),
(206, NULL, NULL, 339, NULL),
(207, NULL, NULL, 339, NULL),
(208, NULL, NULL, 339, NULL),
(209, NULL, NULL, 339, NULL),
(210, NULL, NULL, 339, NULL),
(211, NULL, NULL, 339, NULL),
(212, NULL, NULL, 339, NULL),
(213, NULL, NULL, 339, NULL),
(214, NULL, NULL, 339, NULL),
(215, NULL, NULL, 339, NULL),
(216, NULL, NULL, 339, NULL),
(217, NULL, NULL, 339, NULL),
(218, NULL, NULL, 339, NULL),
(219, NULL, NULL, 339, NULL),
(220, NULL, NULL, 339, NULL),
(221, NULL, NULL, 339, NULL),
(222, NULL, NULL, 339, NULL),
(223, NULL, NULL, 339, NULL),
(224, NULL, NULL, 340, NULL),
(225, NULL, NULL, 340, NULL),
(226, NULL, NULL, 340, NULL),
(227, NULL, NULL, 340, NULL),
(228, NULL, NULL, 340, NULL),
(229, NULL, NULL, 340, NULL),
(230, NULL, NULL, 340, NULL),
(231, NULL, NULL, 340, NULL),
(232, NULL, NULL, 340, NULL),
(233, NULL, NULL, 340, NULL),
(234, NULL, NULL, 340, NULL),
(235, NULL, NULL, 340, NULL),
(236, NULL, NULL, 340, NULL),
(237, NULL, NULL, 340, NULL),
(238, NULL, NULL, 340, NULL),
(239, NULL, NULL, 340, NULL),
(240, NULL, NULL, 340, NULL),
(241, NULL, NULL, 340, NULL),
(242, NULL, NULL, 340, NULL),
(243, NULL, NULL, 340, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

DROP TABLE IF EXISTS `return`;
CREATE TABLE `return` (
  `return_id` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `reason` varchar(45) NOT NULL,
  `item_det_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `return_person` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `position`) VALUES
(221, 'Lovelace ', 'Oliva', 'lv@gmail.com', '+6392588845', 'love', 'password', 'admin'),
(222, 'Lyra ', 'Ronquillo', 'lyra@yahoo.com', '09254785639', 'lyra', 'password', 'custodian'),
(223, 'Joy', 'Cabildo', 'Joy@yahoo.com', '09554287136', 'joy', 'password', 'department head'),
(225, 'Heinrigh', 'Bangui', 'Henry@yahoo.com', '09235987452', 'Henry', 'password', 'admin'),
(226, 'Mark', 'Andawi', 'Mark@yahoo.com', '09854732156', 'Mark', 'password', 'custodian'),
(227, 'Ryan', 'Castillo', 'Rye@yahoo.com', '09852145778', 'Ryan', 'password', 'admin'),
(228, 'Glo', 'Goyo', 'Glo@yahoo.com', '09582145877', 'Glo', 'password', 'department'),
(229, 'russel', 'Bayote', 'Russel@yahoo.com', '09854731251', 'Russ', 'password', 'admin'),
(2210, 'Ian', 'Alinso', 'Ian@yahoo.com', '09854564521', 'Ian', 'password', 'custodian'),
(2211, 'Christian', 'Beltran', 'Chris@yahoo.com', '09855472364', 'Chris', 'password', 'admin');

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
-- Indexes for table `return`
--
ALTER TABLE `return`
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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;
--
-- AUTO_INCREMENT for table `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `item_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT for table `return`
--
ALTER TABLE `return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2212;
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

--
-- Constraints for table `return`
--
ALTER TABLE `return`
  ADD CONSTRAINT `deptid` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itemdet` FOREIGN KEY (`item_det_id`) REFERENCES `item_detail` (`item_det_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
