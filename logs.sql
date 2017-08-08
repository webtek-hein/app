-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 01:21 AM
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
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `decrease_log`
--

TRUNCATE TABLE `decrease_log`;
-- --------------------------------------------------------

--
-- Table structure for table `edit_log`
--

DROP TABLE IF EXISTS `edit_log`;
CREATE TABLE `edit_log` (
  `edit_log_id` int(11) NOT NULL,
  `before_item_name` varchar(60) NOT NULL,
  `after_item_name` varchar(60) NOT NULL,
  `before_description` varchar(60) NOT NULL,
  `after_description` varchar(60) NOT NULL,
  `before_unit` varchar(60) NOT NULL,
  `after_unit` varchar(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `edit_log`
--

TRUNCATE TABLE `edit_log`;
-- --------------------------------------------------------

--
-- Table structure for table `increase_log`
--

DROP TABLE IF EXISTS `increase_log`;
CREATE TABLE `increase_log` (
  `inc_log_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_det_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `supplier` varchar(60) DEFAULT NULL,
  `official_receipt_no` varchar(60) DEFAULT NULL,
  `del_date` datetime DEFAULT NULL,
  `date_rec` datetime DEFAULT NULL,
  `receivedby` varchar(60) DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `item_status` varchar(60) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `dist_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `increase_log`
--

TRUNCATE TABLE `increase_log`;
-- --------------------------------------------------------

--
-- Table structure for table `return_log`
--

DROP TABLE IF EXISTS `return_log`;
CREATE TABLE `return_log` (
  `return_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` text,
  `item_det_id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `return_person` varchar(45) NOT NULL,
  `status` enum('replaced','no action','pending') DEFAULT 'pending',
  `dist_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `return_log`
--

TRUNCATE TABLE `return_log`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `decrease_log`
--
ALTER TABLE `decrease_log`
  ADD PRIMARY KEY (`dec_log_id`);

--
-- Indexes for table `edit_log`
--
ALTER TABLE `edit_log`
  ADD PRIMARY KEY (`edit_log_id`);

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
  MODIFY `dec_log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `edit_log`
--
ALTER TABLE `edit_log`
  MODIFY `edit_log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `increase_log`
--
ALTER TABLE `increase_log`
  MODIFY `inc_log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `return_log`
--
ALTER TABLE `return_log`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
