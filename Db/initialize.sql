-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2014 at 07:53 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tk`
--

-- --------------------------------------------------------

--
-- Table structure for table `BS_MAP_INSTANCE`
--

CREATE TABLE `BS_MAP_INSTANCE` (
  `BS_MAP_ROWID` int(11) NOT NULL AUTO_INCREMENT,
  `CELL_ID` char(2) NOT NULL,
  `UNIT_ID` int(11) NOT NULL,
  `UNIT_HEALTH` int(11) NOT NULL,
  `SAVE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_ID` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`BS_MAP_ROWID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `BS_MAP_NEW`
--

CREATE TABLE `BS_MAP_NEW` (
  `BS_MAP_ROWID` int(11) NOT NULL AUTO_INCREMENT,
  `CELL_ID` char(2) NOT NULL,
  `UNIT_ID` char(3) NOT NULL,
  `UNIT_HEALTH` int(11) NOT NULL,
  PRIMARY KEY (`BS_MAP_ROWID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `BS_UNIT`
--

CREATE TABLE `BS_UNIT` (
  `BS_UNIT_ROWID` int(11) NOT NULL AUTO_INCREMENT,
  `UNIT_COLOR` varchar(4) NOT NULL,
  `UNIT_SHORT_DESC` varchar(30) NOT NULL,
  `UNIT_DESC` varchar(30) NOT NULL,
  `HEALTH` int(11) NOT NULL DEFAULT '100',
  `WEAK_CURSE_MOD` int(11) NOT NULL DEFAULT '-20',
  `STRONG_CURSE_MOD` int(11) NOT NULL DEFAULT '-50',
  `WEAK_BUFF_MOD` int(11) NOT NULL DEFAULT '20',
  `STRONG_BUFF_MOD` int(11) NOT NULL DEFAULT '50',
  `AIR_ATTACK` int(11) NOT NULL DEFAULT '0',
  `AIR_DEFENCE` int(11) NOT NULL DEFAULT '0',
  `GROUND_ATTACK` int(11) NOT NULL DEFAULT '0',
  `GROUND_DEFENCE` int(11) NOT NULL DEFAULT '0',
  `ATTACK_RANGE` int(11) NOT NULL DEFAULT '0',
  `MOVE_RANGE` int(11) NOT NULL DEFAULT '0',
  `HAS_SUPER_POWER` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`BS_UNIT_ROWID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `BS_UNIT`
--

INSERT INTO `BS_UNIT` (`BS_UNIT_ROWID`, `UNIT_COLOR`, `UNIT_SHORT_DESC`, `UNIT_DESC`, `HEALTH`, `WEAK_CURSE_MOD`, `STRONG_CURSE_MOD`, `WEAK_BUFF_MOD`, `STRONG_BUFF_MOD`, `AIR_ATTACK`, `AIR_DEFENCE`, `GROUND_ATTACK`, `GROUND_DEFENCE`, `ATTACK_RANGE`, `MOVE_RANGE`, `HAS_SUPER_POWER`) VALUES
(1, 'Red', 'Truck', 'Red Truck', 110, -20, -50, 20, 50, 0, 0, 0, 0, 5, 2, 0),
(2, 'Red', 'Tank', 'Red Tank', 110, -20, -50, 20, 50, 0, 0, 0, 0, 3, 1, 1),
(3, 'Red', 'V2', 'Red V2', 500, -20, -50, 20, 50, 0, 0, 0, 0, 6, 2, 0),
(4, 'Red', 'Helicopter', 'Red Helicopter', 100, -20, -50, 20, 50, 0, 0, 0, 0, 3, 1, 0),
(5, 'Red', 'Jet', 'Red Jet', 110, -20, -50, 20, 50, 0, 0, 0, 0, 4, 4, 1),
(6, 'Red', 'Plane', 'Red Plane', 110, -20, -50, 20, 50, 4, 0, 0, 0, 3, 3, 1),
(7, 'Blue', 'Truck', 'Blue Truck', 100, -20, -50, 20, 50, 0, 0, 0, 0, 5, 2, 0),
(8, 'Blue', 'Tank', 'Blue Tank', 100, -20, -50, 20, 50, 0, 0, 0, 0, 3, 1, 0),
(9, 'Blue', 'V2', 'Blue V2', 100, -20, -50, 20, 50, 0, 0, 0, 0, 6, 2, 0),
(10, 'Blue', 'Helicopter', 'Blue Helicopter', 100, -20, -50, 20, 50, 0, 0, 0, 0, 3, 1, 0),
(11, 'Blue', 'Jet', 'Blue Jet', 100, -20, -50, 20, 50, 0, 0, 0, 0, 4, 4, 0),
(12, 'Blue', 'Plane', 'Blue Plane', 100, -20, -50, 20, 50, 0, 0, 0, 0, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `BS_USERS`
--

CREATE TABLE `BS_USERS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `BS_USERS`
--

INSERT INTO `BS_USERS` (`id`, `username`, `password`) VALUES
(6, 'belfring', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'belfring', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, 'username', '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, 'brandon', '5f4dcc3b5aa765d61d8327deb882cf99'),
(11, 'lance', 'f5d1278e8109edd94e1e4197e04873b9'),
(12, 'kelfring', '5f4dcc3b5aa765d61d8327deb882cf99'),
(13, 'marlan', '5f4dcc3b5aa765d61d8327deb882cf99'),
(22, 'testy', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinyint(1) unsigned DEFAULT NULL,
  `health` tinyint(1) unsigned DEFAULT NULL,
  `can_parent` tinyint(1) unsigned DEFAULT NULL,
  `pop_provided` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`, `health`, `can_parent`, `pop_provided`) VALUES
(1, 0, 0, 0, 0),
(2, 0, 0, 0, 0),
(3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `BUILDINGS`
--

CREATE TABLE `BUILDINGS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(64) NOT NULL DEFAULT '',
  `HEALTH` int(11) NOT NULL DEFAULT '500',
  `CAN_PARENT` int(1) NOT NULL DEFAULT '0',
  `POP_PROVIDED` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `BUILDINGS`
--

INSERT INTO `BUILDINGS` (`ID`, `NAME`, `HEALTH`, `CAN_PARENT`, `POP_PROVIDED`) VALUES
(1, 'Airport', 100, 1, 300),
(2, 'Base', 300, 0, 1000),
(3, 'Barracks', 1000, 1, 4000),
(4, 'Factory', 500, 1, 1000),
(5, 'Fotress', 500, 1, 1000),
(6, 'Tower', 500, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `BUILDING_TYPES`
--

CREATE TABLE `BUILDING_TYPES` (
  `MAP_ROWID` int(11) NOT NULL AUTO_INCREMENT,
  `BUILDING_TYPE` varchar(100) NOT NULL,
  PRIMARY KEY (`MAP_ROWID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `BUILDING_TYPES`
--

INSERT INTO `BUILDING_TYPES` (`MAP_ROWID`, `BUILDING_TYPE`) VALUES
(1, 'Airport'),
(2, 'Barracks'),
(3, 'Base'),
(4, 'Factory'),
(5, 'Fortress'),
(6, 'Tower');

-- --------------------------------------------------------

--
-- Table structure for table `MAP`
--

CREATE TABLE `MAP` (
  `MAP_ROWID` int(11) NOT NULL AUTO_INCREMENT,
  `MAP_NAME` varchar(100) NOT NULL,
  `MAP_ROW` int(11) NOT NULL,
  `MAP_COLUMN` int(11) NOT NULL,
  `COLOR` varchar(4) NOT NULL,
  `UNIT` varchar(100) NOT NULL,
  `HEALTH` int(11) NOT NULL,
  `WEAK_CURSE` int(11) NOT NULL,
  `STRONG_CURSE` int(11) NOT NULL,
  `WEAK_BUFF` int(11) NOT NULL,
  `STRONG_BUFF` int(11) NOT NULL,
  `AIR_ATTACK` int(11) NOT NULL,
  `AIR_DEFENCE` int(11) NOT NULL,
  `GROUND_ATTACK` int(11) NOT NULL,
  `GROUND_DEFENCE` int(11) NOT NULL,
  `ATTACK_RANGE` int(11) NOT NULL,
  `MOVE_RANGE` int(11) NOT NULL,
  `SUPER_POWER` int(11) NOT NULL,
  PRIMARY KEY (`MAP_ROWID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `MAP`
--

INSERT INTO `MAP` (`MAP_ROWID`, `MAP_NAME`, `MAP_ROW`, `MAP_COLUMN`, `COLOR`, `UNIT`, `HEALTH`, `WEAK_CURSE`, `STRONG_CURSE`, `WEAK_BUFF`, `STRONG_BUFF`, `AIR_ATTACK`, `AIR_DEFENCE`, `GROUND_ATTACK`, `GROUND_DEFENCE`, `ATTACK_RANGE`, `MOVE_RANGE`, `SUPER_POWER`) VALUES
(48, 'firestormblitzkrieg', 11, 2, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(49, 'firestormblitzkrieg', 0, 16, 'Blue', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(50, 'firestormblitzkrieg', 8, 1, 'Red', 'Truck', 200, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 0),
(51, 'firestormblitzkrieg', 7, 2, 'Red', 'Plane', 100, 0, 0, 0, 0, 0, 0, 0, 0, 8, 6, 0),
(52, 'firestormblitzkrieg', 10, 1, 'Red', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(53, 'firestormblitzkrieg', 9, 1, 'Red', 'V2', 200, 0, 0, 0, 0, 0, 0, 0, 0, 6, 2, 0),
(54, 'firestormblitzkrieg', 7, 1, 'Red', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 0),
(55, 'firestormblitzkrieg', 11, 1, 'Red', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 1),
(56, 'firestormblitzkrieg', 8, 0, 'Red', 'Base', 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 'firestormblitzkrieg', 9, 0, 'Red', 'Tower', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(58, 'firestormblitzkrieg', 10, 0, 'Red', 'Bunker', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(59, 'firestormblitzkrieg', 3, 15, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(60, 'firestormblitzkrieg', 4, 14, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(61, 'firestormblitzkrieg', 5, 13, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(62, 'firestormblitzkrieg', 9, 17, 'Blue', 'Base', 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 'firestormblitzkrieg', 8, 17, 'Blue', 'Tower', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(64, 'firestormblitzkrieg', 6, 14, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(65, 'firestormblitzkrieg', 10, 17, 'Blue', 'Bunker', 600, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(66, 'firestormblitzkrieg', 7, 15, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(67, 'firestormblitzkrieg', 7, 16, 'Blue', 'Truck', 200, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 0),
(68, 'firestormblitzkrieg', 8, 16, 'Blue', 'Plane', 100, 0, 0, 0, 0, 0, 0, 0, 0, 8, 6, 0),
(69, 'firestormblitzkrieg', 9, 16, 'Blue', 'V2', 200, 0, 0, 0, 0, 0, 0, 0, 0, 6, 2, 0),
(70, 'firestormblitzkrieg', 10, 13, 'Blue', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 0),
(72, 'firestormoneonone', 3, 15, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(73, 'firestormoneonone', 4, 3, 'Red', 'Jet', 1000, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(76, 'firestormair', 3, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(77, 'firestormair', 3, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(79, 'firestormair', 4, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(80, 'firestormair', 4, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(82, 'firestormair', 5, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(83, 'firestormair', 5, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(85, 'firestormair', 6, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(86, 'firestormair', 6, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(88, 'landrushblitzkrieg', 11, 2, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(89, 'landrushblitzkrieg', 0, 16, 'Blue', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(90, 'landrushblitzkrieg', 8, 1, 'Red', 'Truck', 200, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 0),
(91, 'landrushblitzkrieg', 7, 2, 'Red', 'Plane', 100, 0, 0, 0, 0, 0, 0, 0, 0, 8, 6, 0),
(92, 'landrushblitzkrieg', 10, 1, 'Red', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(93, 'landrushblitzkrieg', 9, 1, 'Red', 'V2', 200, 0, 0, 0, 0, 0, 0, 0, 0, 6, 2, 0),
(94, 'landrushblitzkrieg', 7, 1, 'Red', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 0),
(95, 'landrushblitzkrieg', 11, 1, 'Red', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 1),
(96, 'landrushblitzkrieg', 8, 0, 'Red', 'Base', 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, 'landrushblitzkrieg', 9, 0, 'Red', 'Tower', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(98, 'landrushblitzkrieg', 10, 0, 'Red', 'Bunker', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(99, 'landrushblitzkrieg', 6, 15, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(100, 'landrushblitzkrieg', 4, 14, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(101, 'landrushblitzkrieg', 5, 13, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(102, 'landrushblitzkrieg', 10, 17, 'Blue', 'Base', 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, 'landrushblitzkrieg', 9, 17, 'Blue', 'Tower', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(104, 'landrushblitzkrieg', 6, 14, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(105, 'landrushblitzkrieg', 11, 17, 'Blue', 'Bunker', 600, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(106, 'landrushblitzkrieg', 7, 15, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(107, 'landrushblitzkrieg', 7, 14, 'Blue', 'Truck', 200, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 0),
(108, 'landrushblitzkrieg', 8, 16, 'Blue', 'Plane', 100, 0, 0, 0, 0, 0, 0, 0, 0, 8, 6, 0),
(109, 'landrushblitzkrieg', 9, 16, 'Blue', 'V2', 200, 0, 0, 0, 0, 0, 0, 0, 0, 6, 2, 0),
(110, 'landrushblitzkrieg', 10, 13, 'Blue', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 0),
(111, 'gulfofomanblitzkrieg', 11, 2, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(112, 'gulfofomanblitzkrieg', 11, 16, 'Blue', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(113, 'gulfofomanblitzkrieg', 8, 1, 'Red', 'Truck', 200, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 0),
(114, 'gulfofomanblitzkrieg', 7, 2, 'Red', 'Plane', 100, 0, 0, 0, 0, 0, 0, 0, 0, 8, 6, 0),
(115, 'gulfofomanblitzkrieg', 10, 1, 'Red', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(116, 'gulfofomanblitzkrieg', 9, 1, 'Red', 'V2', 200, 0, 0, 0, 0, 0, 0, 0, 0, 6, 2, 0),
(117, 'gulfofomanblitzkrieg', 7, 1, 'Red', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 0),
(118, 'gulfofomanblitzkrieg', 11, 1, 'Red', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 1),
(119, 'gulfofomanblitzkrieg', 8, 0, 'Red', 'Base', 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, 'gulfofomanblitzkrieg', 9, 0, 'Red', 'Tower', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(121, 'gulfofomanblitzkrieg', 10, 0, 'Red', 'Bunker', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(122, 'gulfofomanblitzkrieg', 9, 15, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(123, 'gulfofomanblitzkrieg', 7, 14, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(124, 'gulfofomanblitzkrieg', 8, 13, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(125, 'gulfofomanblitzkrieg', 10, 17, 'Blue', 'Base', 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, 'gulfofomanblitzkrieg', 9, 17, 'Blue', 'Tower', 400, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(127, 'gulfofomanblitzkrieg', 6, 14, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(128, 'gulfofomanblitzkrieg', 11, 17, 'Blue', 'Bunker', 600, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(129, 'gulfofomanblitzkrieg', 7, 15, 'Blue', 'Tank', 300, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
(131, 'gulfofomanblitzkrieg', 8, 16, 'Blue', 'Plane', 100, 0, 0, 0, 0, 0, 0, 0, 0, 8, 6, 0),
(132, 'gulfofomanblitzkrieg', 9, 16, 'Blue', 'V2', 200, 0, 0, 0, 0, 0, 0, 0, 0, 6, 2, 0),
(133, 'gulfofomanblitzkrieg', 10, 13, 'Blue', 'Helicopter', 100, 0, 0, 0, 0, 0, 0, 0, 0, 4, 3, 0),
(134, 'landrushoneonone', 8, 15, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(135, 'landrushoneonone', 4, 3, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(136, 'landrushair', 3, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(137, 'landrushair', 8, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(138, 'landrushair', 4, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(139, 'landrushair', 9, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(140, 'landrushair', 5, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(141, 'landrushair', 10, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(142, 'landrushair', 6, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(143, 'landrushair', 11, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(144, 'gulfofomanoneonone', 11, 15, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(145, 'gulfofomanoneonone', 11, 3, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(146, 'gulfofomanair', 3, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(147, 'gulfofomanair', 8, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(148, 'gulfofomanair', 4, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(149, 'gulfofomanair', 9, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(150, 'gulfofomanair', 5, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(151, 'gulfofomanair', 10, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(152, 'gulfofomanair', 6, 1, 'Red', 'Jet', 100, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0),
(153, 'gulfofomanair', 11, 16, 'Blue', 'Jet', 300, 0, 0, 0, 0, 0, 0, 0, 0, 6, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `SCOREBOARD`
--

CREATE TABLE `SCOREBOARD` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `score` int(10) NOT NULL,
  `url` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `SCOREBOARD`
--

INSERT INTO `SCOREBOARD` (`id`, `name`, `score`, `url`) VALUES
(2, 'Marlan', 1110, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c0.24.160.160/p160x160/1620758_10201882699253137_1815229301_n.jpg'),
(4, 'David', 1200, 'https://lh3.googleusercontent.com/-mur6MMHyGGY/AAAAAAAAAAI/AAAAAAAAAZY/-XFLvT4ND4E/s120-c/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `UNIT_TYPES`
--

CREATE TABLE `UNIT_TYPES` (
  `MAP_ROWID` int(11) NOT NULL AUTO_INCREMENT,
  `UNIT_TYPE` varchar(100) NOT NULL,
  PRIMARY KEY (`MAP_ROWID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `UNIT_TYPES`
--

INSERT INTO `UNIT_TYPES` (`MAP_ROWID`, `UNIT_TYPE`) VALUES
(1, 'Truck'),
(2, 'Tank'),
(3, 'V2'),
(4, 'Helicopter'),
(5, 'Jet'),
(6, 'Plane');
