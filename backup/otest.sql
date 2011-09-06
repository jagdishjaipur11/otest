-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2011 at 03:12 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `otest`
--
CREATE DATABASE `otest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `otest`;

-- --------------------------------------------------------

--
-- Table structure for table `onlinelist`
--

CREATE TABLE IF NOT EXISTS `onlinelist` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `testcode` varchar(40) NOT NULL,
  `tname` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `testcode` (`testcode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `onlinelist`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` bigint(255) NOT NULL AUTO_INCREMENT,
  `collid` bigint(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cellnum` bigint(10) NOT NULL,
  `random` bigint(100) NOT NULL,
  `flag` varchar(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `collid`, `username`, `password`, `fname`, `email`, `cellnum`, `random`, `flag`) VALUES
(15, 1001, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin Surname', 'admin@admin.com', 1122112211, 268374946, 'a'),
(23, 112, 'student', 'ad6a280417a0f533d8b670c61667e1a0', 'student', 's@s.com', 2233223322, 741122249, 's'),
(22, 0, 'review', '20b5cc850dacb1dcc21080fd26cc519e', 'review', 'r@r.com', 1122332211, 679613975, 'r'),
(24, 0, 'root', '63a9f0ea7bb98050796b649e85481845', 'ROOT', 'root@root.com', 1199999999, 535571018, 'a');
