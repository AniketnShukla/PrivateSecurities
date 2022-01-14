-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 14, 2022 at 12:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch ID` int(20) NOT NULL,
  `Branch Name` varchar(255) NOT NULL,
  `Pincode` int(20) NOT NULL,
  `Branch Manager` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch ID`, `Branch Name`, `Pincode`, `Branch Manager`) VALUES
(101, 'B1', 560000, 'Roberto'),
(102, 'B2', 57000, 'Thomas'),
(103, 'B3', 580000, 'Grey');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Client ID` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Client Location` varchar(255) NOT NULL,
  `Resource_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Client ID`, `Name`, `Client Location`, `Resource_ID`) VALUES
(1, 'C1', 'Bengluru', 102),
(2, 'C2', 'Davangere', 101),
(3, 'C3', 'Bidar', 103),
(4, 'C4', 'Udupi', 104);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `ID` int(20) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Client_ID` int(20) DEFAULT NULL,
  `Price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`ID`, `Type`, `Client_ID`, `Price`) VALUES
(101, 'Fence', 1, 3000),
(102, 'Camera', 1, 300),
(103, 'Camera2', 2, 400),
(104, 'Camera', 0, 300);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `ID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Date of Joining` date NOT NULL,
  `Pincode` int(20) NOT NULL,
  `Branch_ID` int(20) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Client_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`ID`, `Name`, `Gender`, `Date of Joining`, `Pincode`, `Branch_ID`, `Location`, `Client_ID`) VALUES
('E100', 'Green', 'M', '2022-01-03', 57000, 102, 'Davangere', 1),
('E101', 'Brett', 'M', '2021-12-21', 580000, 103, 'Bidar', 3),
('E102', 'Ramesh', 'M', '2021-11-23', 57000, 102, 'Davangere', 0),
('E103', 'Sasha', 'F', '2021-10-04', 598005, 104, 'Udupi', 0),
('E107', 'Gabriel', 'M', '2022-01-05', 560001, 7, 'Delhi', 0),
('E108', 'Nitin', 'M', '2022-01-12', 570001, 9, 'Delhi', 2),
('E109', 'Gabriel', 'M', '2022-01-05', 560001, 7, 'Delhi', 1),
('E110', 'Nitin', 'M', '2022-01-12', 570001, 9, 'Delhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Name`, `Password`) VALUES
('a', 'a'),
('admin', 'admin'),
('admin2', 'admin2'),
('Aniket', 'Shukla'),
('system', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch ID`),
  ADD UNIQUE KEY `Pincode` (`Pincode`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Client ID`),
  ADD UNIQUE KEY `Client Location` (`Client Location`),
  ADD KEY `client_ibfk_1` (`Resource_ID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Client_ID` (`Client_ID`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Branch_ID` (`Branch_ID`),
  ADD KEY `Client_ID` (`Client_ID`),
  ADD KEY `Location` (`Location`),
  ADD KEY `Pincode` (`Pincode`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
