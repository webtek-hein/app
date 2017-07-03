-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 11:53 PM
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
  `date` datetime NOT NULL,
  `dept_id` int(11) NOT NULL,
  `recieved` varchar(45) NOT NULL,
  `user_distribute` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `distribution`
--

TRUNCATE TABLE `distribution`;
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
-- Truncate table before insert `item`
--

TRUNCATE TABLE `item`;
--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `quantity`, `description`, `official_receipt`, `del_date`, `date_rec`, `receivedby`, `cost`, `unit`, `account_id`) VALUES
(1, 'Laptop', '6', 'black laptops', '0490', '2017-07-17 06:00:00', '2017-07-28 08:00:00', 'Louie Echave', 2500, 'others', 8),
(2, 'TV', '5', '14 inches', '0495', '2017-07-18 08:00:00', '2017-07-20 04:00:00', 'Neil Macalanda', 2364, 'others', 7),
(3, 'Tarpaulin', '20', 'White', '0488', '2017-07-18 09:00:00', '2017-07-19 03:00:00', 'Fernando Lopez', 2549, 'others', 5),
(4, 'Table', '3', 'Wood', '0485', '2017-12-18 09:00:00', '2017-12-19 02:00:00', 'Christian Luyon', 50000, 'others', 3),
(5, 'Bulb', '50', 'Circle', '0458', '2017-12-25 09:00:00', '2017-12-28 01:00:00', 'Bernadette Lucas', 3000, 'others', 8),
(6, 'Bond Paper', '20', 'Short', '1245', '2017-10-25 09:00:00', '2017-10-28 11:00:00', 'Hiacynth Santos', 2000, 'others', 2),
(7, 'Wires', '15', 'Blue', '1255', '2017-11-25 09:00:00', '2017-11-28 06:00:00', 'Rotsen Bayawa', 2463, 'others', 1),
(8, 'Ballpen', '50', 'Black', '2551', '2017-11-12 09:00:00', '2017-11-15 06:00:00', 'deczan Pida', 2364, 'others', 8),
(9, 'Pencil', '50', 'Nyllon', '2145', '2017-11-13 09:00:00', '2017-11-15 06:00:00', 'Ace Rimalos', 600, 'others', 2),
(10, 'Eraser', '20', 'White', '3369', '2017-11-05 09:00:00', '2017-11-07 06:00:00', 'Ravi Kim', 960, 'others', 2);

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
DROP TRIGGER IF EXISTS `item_detail_update`;
DELIMITER $$
CREATE TRIGGER `item_detail_update` AFTER UPDATE ON `item` FOR EACH ROW BEGIN
        SET @counter = 0;
        SET @value = new.quantity - old.quantity;
         while @counter < @value do
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
-- Truncate table before insert `item_detail`
--

TRUNCATE TABLE `item_detail`;
--
-- Dumping data for table `item_detail`
--

INSERT INTO `item_detail` (`item_det_id`, `serial`, `exp_date`, `item_id`, `dist_id`) VALUES
(253, 1, NULL, 1, 441),
(254, NULL, NULL, 1, NULL),
(255, NULL, NULL, 1, NULL),
(256, NULL, NULL, 1, NULL),
(257, NULL, NULL, 1, NULL),
(258, NULL, NULL, 1, NULL),
(259, NULL, NULL, 2, NULL),
(260, NULL, NULL, 2, NULL),
(261, NULL, NULL, 2, NULL),
(262, NULL, NULL, 2, NULL),
(263, NULL, NULL, 2, NULL),
(264, NULL, NULL, 3, NULL),
(265, NULL, NULL, 3, NULL),
(266, NULL, NULL, 3, NULL),
(267, NULL, NULL, 3, NULL),
(268, NULL, NULL, 3, NULL),
(269, NULL, NULL, 3, NULL),
(270, NULL, NULL, 3, NULL),
(271, NULL, NULL, 3, NULL),
(272, NULL, NULL, 3, NULL),
(273, NULL, NULL, 3, NULL),
(274, NULL, NULL, 3, NULL),
(275, NULL, NULL, 3, NULL),
(276, NULL, NULL, 3, NULL),
(277, NULL, NULL, 3, NULL),
(278, NULL, NULL, 3, NULL),
(279, NULL, NULL, 3, NULL),
(280, NULL, NULL, 3, NULL),
(281, NULL, NULL, 3, NULL),
(282, NULL, NULL, 3, NULL),
(283, NULL, NULL, 3, NULL),
(284, NULL, NULL, 4, NULL),
(285, NULL, NULL, 4, NULL),
(286, NULL, NULL, 4, NULL),
(287, NULL, NULL, 5, NULL),
(288, NULL, NULL, 5, NULL),
(289, NULL, NULL, 5, NULL),
(290, NULL, NULL, 5, NULL),
(291, NULL, NULL, 5, NULL),
(292, NULL, NULL, 5, NULL),
(293, NULL, NULL, 5, NULL),
(294, NULL, NULL, 5, NULL),
(295, NULL, NULL, 5, NULL),
(296, NULL, NULL, 5, NULL),
(297, NULL, NULL, 5, NULL),
(298, NULL, NULL, 5, NULL),
(299, NULL, NULL, 5, NULL),
(300, NULL, NULL, 5, NULL),
(301, NULL, NULL, 5, NULL),
(302, NULL, NULL, 5, NULL),
(303, NULL, NULL, 5, NULL),
(304, NULL, NULL, 5, NULL),
(305, NULL, NULL, 5, NULL),
(306, NULL, NULL, 5, NULL),
(307, NULL, NULL, 5, NULL),
(308, NULL, NULL, 5, NULL),
(309, NULL, NULL, 5, NULL),
(310, NULL, NULL, 5, NULL),
(311, NULL, NULL, 5, NULL),
(312, NULL, NULL, 5, NULL),
(313, NULL, NULL, 5, NULL),
(314, NULL, NULL, 5, NULL),
(315, NULL, NULL, 5, NULL),
(316, NULL, NULL, 5, NULL),
(317, NULL, NULL, 5, NULL),
(318, NULL, NULL, 5, NULL),
(319, NULL, NULL, 5, NULL),
(320, NULL, NULL, 5, NULL),
(321, NULL, NULL, 5, NULL),
(322, NULL, NULL, 5, NULL),
(323, NULL, NULL, 5, NULL),
(324, NULL, NULL, 5, NULL),
(325, NULL, NULL, 5, NULL),
(326, NULL, NULL, 5, NULL),
(327, NULL, NULL, 5, NULL),
(328, NULL, NULL, 5, NULL),
(329, NULL, NULL, 5, NULL),
(330, NULL, NULL, 5, NULL),
(331, NULL, NULL, 5, NULL),
(332, NULL, NULL, 5, NULL),
(333, NULL, NULL, 5, NULL),
(334, NULL, NULL, 5, NULL),
(335, NULL, NULL, 5, NULL),
(336, NULL, NULL, 5, NULL),
(337, NULL, NULL, 6, NULL),
(338, NULL, NULL, 6, NULL),
(339, NULL, NULL, 6, NULL),
(340, NULL, NULL, 6, NULL),
(341, NULL, NULL, 6, NULL),
(342, NULL, NULL, 6, NULL),
(343, NULL, NULL, 6, NULL),
(344, NULL, NULL, 6, NULL),
(345, NULL, NULL, 6, NULL),
(346, NULL, NULL, 6, NULL),
(347, NULL, NULL, 6, NULL),
(348, NULL, NULL, 6, NULL),
(349, NULL, NULL, 6, NULL),
(350, NULL, NULL, 6, NULL),
(351, NULL, NULL, 6, NULL),
(352, NULL, NULL, 6, NULL),
(353, NULL, NULL, 6, NULL),
(354, NULL, NULL, 6, NULL),
(355, NULL, NULL, 6, NULL),
(356, NULL, NULL, 6, NULL),
(357, NULL, NULL, 7, NULL),
(358, NULL, NULL, 7, NULL),
(359, NULL, NULL, 7, NULL),
(360, NULL, NULL, 7, NULL),
(361, NULL, NULL, 7, NULL),
(362, NULL, NULL, 7, NULL),
(363, NULL, NULL, 7, NULL),
(364, NULL, NULL, 7, NULL),
(365, NULL, NULL, 7, NULL),
(366, NULL, NULL, 7, NULL),
(367, NULL, NULL, 7, NULL),
(368, NULL, NULL, 7, NULL),
(369, NULL, NULL, 7, NULL),
(370, NULL, NULL, 7, NULL),
(371, NULL, NULL, 7, NULL),
(372, NULL, NULL, 8, NULL),
(373, NULL, NULL, 8, NULL),
(374, NULL, NULL, 8, NULL),
(375, NULL, NULL, 8, NULL),
(376, NULL, NULL, 8, NULL),
(377, NULL, NULL, 8, NULL),
(378, NULL, NULL, 8, NULL),
(379, NULL, NULL, 8, NULL),
(380, NULL, NULL, 8, NULL),
(381, NULL, NULL, 8, NULL),
(382, NULL, NULL, 8, NULL),
(383, NULL, NULL, 8, NULL),
(384, NULL, NULL, 8, NULL),
(385, NULL, NULL, 8, NULL),
(386, NULL, NULL, 8, NULL),
(387, NULL, NULL, 8, NULL),
(388, NULL, NULL, 8, NULL),
(389, NULL, NULL, 8, NULL),
(390, NULL, NULL, 8, NULL),
(391, NULL, NULL, 8, NULL),
(392, NULL, NULL, 8, NULL),
(393, NULL, NULL, 8, NULL),
(394, NULL, NULL, 8, NULL),
(395, NULL, NULL, 8, NULL),
(396, NULL, NULL, 8, NULL),
(397, NULL, NULL, 8, NULL),
(398, NULL, NULL, 8, NULL),
(399, NULL, NULL, 8, NULL),
(400, NULL, NULL, 8, NULL),
(401, NULL, NULL, 8, NULL),
(402, NULL, NULL, 8, NULL),
(403, NULL, NULL, 8, NULL),
(404, NULL, NULL, 8, NULL),
(405, NULL, NULL, 8, NULL),
(406, NULL, NULL, 8, NULL),
(407, NULL, NULL, 8, NULL),
(408, NULL, NULL, 8, NULL),
(409, NULL, NULL, 8, NULL),
(410, NULL, NULL, 8, NULL),
(411, NULL, NULL, 8, NULL),
(412, NULL, NULL, 8, NULL),
(413, NULL, NULL, 8, NULL),
(414, NULL, NULL, 8, NULL),
(415, NULL, NULL, 8, NULL),
(416, NULL, NULL, 8, NULL),
(417, NULL, NULL, 8, NULL),
(418, NULL, NULL, 8, NULL),
(419, NULL, NULL, 8, NULL),
(420, NULL, NULL, 8, NULL),
(421, NULL, NULL, 8, NULL),
(422, NULL, NULL, 9, NULL),
(423, NULL, NULL, 9, NULL),
(424, NULL, NULL, 9, NULL),
(425, NULL, NULL, 9, NULL),
(426, NULL, NULL, 9, NULL),
(427, NULL, NULL, 9, NULL),
(428, NULL, NULL, 9, NULL),
(429, NULL, NULL, 9, NULL),
(430, NULL, NULL, 9, NULL),
(431, NULL, NULL, 9, NULL),
(432, NULL, NULL, 9, NULL),
(433, NULL, NULL, 9, NULL),
(434, NULL, NULL, 9, NULL),
(435, NULL, NULL, 9, NULL),
(436, NULL, NULL, 9, NULL),
(437, NULL, NULL, 9, NULL),
(438, NULL, NULL, 9, NULL),
(439, NULL, NULL, 9, NULL),
(440, NULL, NULL, 9, NULL),
(441, NULL, NULL, 9, NULL),
(442, NULL, NULL, 9, NULL),
(443, NULL, NULL, 9, NULL),
(444, NULL, NULL, 9, NULL),
(445, NULL, NULL, 9, NULL),
(446, NULL, NULL, 9, NULL),
(447, NULL, NULL, 9, NULL),
(448, NULL, NULL, 9, NULL),
(449, NULL, NULL, 9, NULL),
(450, NULL, NULL, 9, NULL),
(451, NULL, NULL, 9, NULL),
(452, NULL, NULL, 9, NULL),
(453, NULL, NULL, 9, NULL),
(454, NULL, NULL, 9, NULL),
(455, NULL, NULL, 9, NULL),
(456, NULL, NULL, 9, NULL),
(457, NULL, NULL, 9, NULL),
(458, NULL, NULL, 9, NULL),
(459, NULL, NULL, 9, NULL),
(460, NULL, NULL, 9, NULL),
(461, NULL, NULL, 9, NULL),
(462, NULL, NULL, 9, NULL),
(463, NULL, NULL, 9, NULL),
(464, NULL, NULL, 9, NULL),
(465, NULL, NULL, 9, NULL),
(466, NULL, NULL, 9, NULL),
(467, NULL, NULL, 9, NULL),
(468, NULL, NULL, 9, NULL),
(469, NULL, NULL, 9, NULL),
(470, NULL, NULL, 9, NULL),
(471, NULL, NULL, 9, NULL),
(472, NULL, NULL, 10, NULL),
(473, NULL, NULL, 10, NULL),
(474, NULL, NULL, 10, NULL),
(475, NULL, NULL, 10, NULL),
(476, NULL, NULL, 10, NULL),
(477, NULL, NULL, 10, NULL),
(478, NULL, NULL, 10, NULL),
(479, NULL, NULL, 10, NULL),
(480, NULL, NULL, 10, NULL),
(481, NULL, NULL, 10, NULL),
(482, NULL, NULL, 10, NULL),
(483, NULL, NULL, 10, NULL),
(484, NULL, NULL, 10, NULL),
(485, NULL, NULL, 10, NULL),
(486, NULL, NULL, 10, NULL),
(487, NULL, NULL, 10, NULL),
(488, NULL, NULL, 10, NULL),
(489, NULL, NULL, 10, NULL),
(490, NULL, NULL, 10, NULL),
(491, NULL, NULL, 10, NULL);

--
-- Triggers `item_detail`
--
DROP TRIGGER IF EXISTS `decrease_log`;
DELIMITER $$
CREATE TRIGGER `decrease_log` AFTER UPDATE ON `item_detail` FOR EACH ROW BEGIN	
   IF (old.serial is not null) THEN
   	INSERT INTO logs.decrease_log (item_det_id) VALUES (NEW.item_det_id);
    END IF;
  END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `increase_log`;
DELIMITER $$
CREATE TRIGGER `increase_log` AFTER INSERT ON `item_detail` FOR EACH ROW BEGIN
         	INSERT INTO logs.increase_log (item_det_id) VALUES (NEW.item_det_id);
  END
$$
DELIMITER ;

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `item_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2213;
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
