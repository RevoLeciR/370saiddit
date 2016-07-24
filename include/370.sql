-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2016 at 08:21 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `370`
--
CREATE DATABASE IF NOT EXISTS `370` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `370`;

-- --------------------------------------------------------

--
-- Table structure for table `acccomvote`
--

DROP TABLE IF EXISTS `acccomvote`;
CREATE TABLE IF NOT EXISTS `acccomvote` (
  `aid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  KEY `aid` (`aid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acccomvote`
--

INSERT INTO `acccomvote` (`aid`, `cid`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `upvote` int(11) DEFAULT '0',
  `downvote` int(11) DEFAULT '0',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`aid`, `username`, `password`, `upvote`, `downvote`) VALUES
(1, 'user1', '5ed8f552a90ba88fc53148f8889bc50951635e872f8c693b83647b5ad4c45849', 0, 0),
(2, 'user2', '6fc4665dba9fc24946c594f824b8c6879efee8db25d8ffb7da4c61a98d608a8c', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `accpostvote`
--

DROP TABLE IF EXISTS `accpostvote`;
CREATE TABLE IF NOT EXISTS `accpostvote` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  KEY `aid` (`aid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accpostvote`
--

INSERT INTO `accpostvote` (`aid`, `pid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `commentcom`
--

DROP TABLE IF EXISTS `commentcom`;
CREATE TABLE IF NOT EXISTS `commentcom` (
  `cid` int(11) NOT NULL,
  `com_cid` int(11) NOT NULL,
  KEY `cid` (`cid`),
  KEY `com_cid` (`com_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentcom`
--

INSERT INTO `commentcom` (`cid`, `com_cid`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `commenton`
--

DROP TABLE IF EXISTS `commenton`;
CREATE TABLE IF NOT EXISTS `commenton` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  KEY `aid` (`aid`),
  KEY `pid` (`pid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commenton`
--

INSERT INTO `commenton` (`aid`, `pid`, `cid`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `editdatetime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `text` varchar(1000) NOT NULL,
  `refer_pid` int(11) NOT NULL,
  `created_aid` int(11) NOT NULL,
  `upvote` int(11) DEFAULT '0',
  `downvote` int(11) DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `refer_pid` (`refer_pid`),
  KEY `created_aid` (`created_aid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `datetime`, `editdatetime`, `text`, `refer_pid`, `created_aid`, `upvote`, `downvote`) VALUES
(1, '2016-07-23 22:44:17', NULL, 'test comment text 1', 1, 2, 0, 0),
(2, '2016-07-23 22:44:17', NULL, 'test comment text 2', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE IF NOT EXISTS `favourites` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  KEY `aid` (`aid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`aid`, `pid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `aid` int(11) NOT NULL,
  `frid` int(11) NOT NULL,
  KEY `aid` (`aid`),
  KEY `frid` (`frid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`aid`, `frid`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `makepost`
--

DROP TABLE IF EXISTS `makepost`;
CREATE TABLE IF NOT EXISTS `makepost` (
  `aid` int(11) NOT NULL,
  `ssid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  KEY `aid` (`aid`),
  KEY `ssid` (`ssid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `makepost`
--

INSERT INTO `makepost` (`aid`, `ssid`, `pid`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `createdatetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `editdatetime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `upvote` int(11) DEFAULT '0',
  `downvote` int(11) DEFAULT '0',
  `ssbelong` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `ssbelong` (`ssbelong`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `createdatetime`, `editdatetime`, `url`, `title`, `text`, `upvote`, `downvote`, `ssbelong`) VALUES
(1, '2016-07-23 22:44:16', NULL, NULL, 'test post title', 'test post text', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subsaiddit`
--

DROP TABLE IF EXISTS `subsaiddit`;
CREATE TABLE IF NOT EXISTS `subsaiddit` (
  `ssid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createtime` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_aid` int(11) NOT NULL,
  `frontpage` int(11) DEFAULT '0',
  PRIMARY KEY (`ssid`),
  KEY `created_aid` (`created_aid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subsaiddit`
--

INSERT INTO `subsaiddit` (`ssid`, `title`, `description`, `createtime`, `created_aid`, `frontpage`) VALUES
(1, 'test subsaiddit title', 'test subsaiddit description', '2016-07-23 22:44:16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `aid` int(11) NOT NULL,
  `ssid` int(11) NOT NULL,
  KEY `aid` (`aid`),
  KEY `ssid` (`ssid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`aid`, `ssid`) VALUES
(1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acccomvote`
--
ALTER TABLE `acccomvote`
  ADD CONSTRAINT `acccomvote_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE,
  ADD CONSTRAINT `acccomvote_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `comments` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `accpostvote`
--
ALTER TABLE `accpostvote`
  ADD CONSTRAINT `accpostvote_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE,
  ADD CONSTRAINT `accpostvote_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `commentcom`
--
ALTER TABLE `commentcom`
  ADD CONSTRAINT `commentcom_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `comments` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentcom_ibfk_2` FOREIGN KEY (`com_cid`) REFERENCES `comments` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `commenton`
--
ALTER TABLE `commenton`
  ADD CONSTRAINT `commenton_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`),
  ADD CONSTRAINT `commenton_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`) ON DELETE CASCADE,
  ADD CONSTRAINT `commenton_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `comments` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`refer_pid`) REFERENCES `posts` (`pid`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`created_aid`) REFERENCES `accounts` (`aid`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`frid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE;

--
-- Constraints for table `makepost`
--
ALTER TABLE `makepost`
  ADD CONSTRAINT `makepost_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`),
  ADD CONSTRAINT `makepost_ibfk_2` FOREIGN KEY (`ssid`) REFERENCES `subsaiddit` (`ssid`) ON DELETE CASCADE,
  ADD CONSTRAINT `makepost_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`ssbelong`) REFERENCES `subsaiddit` (`ssid`) ON DELETE CASCADE;

--
-- Constraints for table `subsaiddit`
--
ALTER TABLE `subsaiddit`
  ADD CONSTRAINT `subsaiddit_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `accounts` (`aid`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`ssid`) REFERENCES `subsaiddit` (`ssid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
