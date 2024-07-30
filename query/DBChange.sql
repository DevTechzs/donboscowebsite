-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2023 at 12:39 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tz_clients`
--

-- --------------------------------------------------------

--
-- Table structure for table `itpl_leads`
--

-- DROP TABLE IF EXISTS `ITPL_Leads`;
CREATE TABLE IF NOT EXISTS `ITPL_Leads` (
  `LeadsID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `EmailID` varchar(100) NOT NULL,
  `TitleName` varchar(300) NOT NULL,
  `Description` text NOT NULL,
  `IPAddress` varchar(100) NOT NULL,
  `EntryByID` int DEFAULT NULL,
  `DeviceInfo` varchar(300) NOT NULL,
  `EntryDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`LeadsID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `itpl_leads`
--


-- --------------------------------------------------------

--
-- Table structure for table `itpl_requirements`
--

 -- DROP TABLE IF EXISTS `ITPL_Requirements`;
CREATE TABLE IF NOT EXISTS `ITPL_Requirements` (
  `ItplRequirementsID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `EmailID` varchar(200) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `BusinessName` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `RequiredService` varchar(300) DEFAULT NULL,
  `CreatedDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ItplRequirementsID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `itpl_requirements`
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
