-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2015 at 08:16 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_uas_webservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_laptops`
--

CREATE TABLE IF NOT EXISTS `t_laptops` (
  `laptop_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` text NOT NULL,
  `model` text NOT NULL,
  `release_years` text NOT NULL,
  PRIMARY KEY (`laptop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_laptops`
--

INSERT INTO `t_laptops` (`laptop_id`, `brand`, `model`, `release_years`) VALUES
(1, 'Acer', 'V5-471 G', '2013'),
(2, 'Acer', '4738z', '2009');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
