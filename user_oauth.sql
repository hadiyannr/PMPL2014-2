-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2014 at 12:30 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siapmasukui`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_oauth`
--

CREATE TABLE IF NOT EXISTS `user_oauth` (
  `user_id` int(11) NOT NULL,
  `provider` varchar(45) NOT NULL,
  `identifier` varchar(64) NOT NULL,
  `profile_cache` text,
  `session_data` text,
  PRIMARY KEY (`provider`,`identifier`),
  UNIQUE KEY `unic_user_id_name` (`user_id`,`provider`),
  KEY `oauth_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
