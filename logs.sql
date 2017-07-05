-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 03:53 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logs`
--
CREATE DATABASE IF NOT EXISTS `logs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `logs`;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decrease_log`
--

INSERT INTO `decrease_log` (`dec_log_id`, `date`, `item_det_id`, `user_id`) VALUES
(6, '2017-07-05 07:45:30', 16, 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `increase_log`
--

INSERT INTO `increase_log` (`inc_log_id`, `date`, `item_det_id`, `user_id`) VALUES
(1, '2017-07-05 10:17:00', 26, 1),
(2, '2017-07-05 10:17:00', 27, 1),
(3, '2017-07-05 10:17:00', 28, 1),
(4, '2017-07-05 10:17:00', 29, 1),
(5, '2017-07-05 10:17:00', 30, 1),
(6, '2017-07-05 11:07:37', 31, 1),
(7, '2017-07-05 11:07:37', 32, 1),
(8, '2017-07-05 11:07:37', 33, 1),
(9, '2017-07-05 11:07:37', 34, 1),
(10, '2017-07-05 11:07:37', 35, 1),
(11, '2017-07-05 11:07:37', 36, 1),
(12, '2017-07-05 11:23:54', 37, 1),
(13, '2017-07-05 11:23:54', 38, 1),
(14, '2017-07-05 11:23:54', 39, 1),
(15, '2017-07-05 11:23:54', 40, 1),
(16, '2017-07-05 11:23:54', 41, 1),
(17, '2017-07-05 11:23:54', 42, 1),
(18, '2017-07-05 11:23:54', 43, 1),
(19, '2017-07-05 11:23:54', 44, 1),
(20, '2017-07-05 11:23:54', 45, 1),
(21, '2017-07-05 11:23:54', 46, 1),
(22, '2017-07-05 11:23:54', 47, 1),
(23, '2017-07-05 11:23:54', 48, 1),
(24, '2017-07-05 11:23:54', 49, 1),
(25, '2017-07-05 11:23:54', 50, 1),
(26, '2017-07-05 11:23:54', 51, 1),
(27, '2017-07-05 11:23:54', 52, 1),
(28, '2017-07-05 11:23:54', 53, 1),
(29, '2017-07-05 11:23:54', 54, 1),
(30, '2017-07-05 11:23:54', 55, 1),
(31, '2017-07-05 11:23:54', 56, 1),
(32, '2017-07-05 11:34:27', 57, 1),
(33, '2017-07-05 11:34:27', 58, 1),
(34, '2017-07-05 11:34:27', 59, 1),
(35, '2017-07-05 11:37:47', 60, 1),
(36, '2017-07-05 11:37:47', 61, 1),
(37, '2017-07-05 11:37:47', 62, 1),
(38, '2017-07-05 11:37:47', 63, 1),
(39, '2017-07-05 11:40:58', 64, 1),
(40, '2017-07-05 11:40:58', 65, 1),
(41, '2017-07-05 11:44:38', 66, 1),
(42, '2017-07-05 11:44:38', 67, 1),
(43, '2017-07-05 11:45:53', 68, 1),
(44, '2017-07-05 11:45:53', 69, 1),
(45, '2017-07-05 11:47:27', 70, 1),
(46, '2017-07-05 11:49:50', 71, 1),
(47, '2017-07-05 11:49:50', 72, 1),
(48, '2017-07-05 11:49:50', 73, 1),
(49, '2017-07-05 11:49:50', 74, 1),
(50, '2017-07-05 11:49:50', 75, 1);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `decrease_log`
--
ALTER TABLE `decrease_log`
  ADD PRIMARY KEY (`dec_log_id`);

--
-- Indexes for table `increase_log`
--
ALTER TABLE `increase_log`
  ADD PRIMARY KEY (`inc_log_id`);

--
-- Indexes for table `return_log`
--
ALTER TABLE `return_log`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `itemdet_idx` (`item_det_id`),
  ADD KEY `deptid_idx` (`dept_id`),
  ADD KEY `userid_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decrease_log`
--
ALTER TABLE `decrease_log`
  MODIFY `dec_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `increase_log`
--
ALTER TABLE `increase_log`
  MODIFY `inc_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `return_log`
--
ALTER TABLE `return_log`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
