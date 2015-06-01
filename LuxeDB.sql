-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 18, 2015 at 12:28 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `LuxeDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
`ClientId` int(4) NOT NULL,
  `ClientName` varchar(20) COLLATE ascii_bin NOT NULL,
  `ClientSurname` varchar(20) COLLATE ascii_bin NOT NULL,
  `ClientMail` varchar(30) COLLATE ascii_bin NOT NULL,
  `ClientPhone` varchar(11) COLLATE ascii_bin NOT NULL DEFAULT '',
  `ClientAddress` varchar(30) COLLATE ascii_bin NOT NULL,
  `ClientBuyRate` double(2,1) NOT NULL,
  `ClientActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`ClientId`, `ClientName`, `ClientSurname`, `ClientMail`, `ClientPhone`, `ClientAddress`, `ClientBuyRate`, `ClientActive`) VALUES
(1, 'Pedro', 'Perez', 'pero@hola.com', '1344523', '28th street', 0.5, 1),
(3, 'Luis', 'Galeson', 'luisgale@example.com', '22234123', 'Piotrkowska 89', 0.0, 1),
(5, 'Lola', 'Mason', 'lolama@hello.com', '90139281', 'Liverpool 34', 0.0, 1),
(6, 'Danielle', 'Clarkson', 'dacla@hyte.com', '89122736', 'Kraft 45', 0.0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
`EmplID` int(4) NOT NULL,
  `EmpName` varchar(20) COLLATE ascii_bin NOT NULL,
  `EmpSurname` varchar(20) COLLATE ascii_bin NOT NULL,
  `EmpMail` varchar(30) COLLATE ascii_bin NOT NULL,
  `EmpPhone` int(9) NOT NULL,
  `EmpSales` decimal(7,2) NOT NULL,
  `EmpWorkHrs` decimal(4,2) NOT NULL,
  `EmpPerformance` decimal(2,1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`EmplID`, `EmpName`, `EmpSurname`, `EmpMail`, `EmpPhone`, `EmpSales`, `EmpWorkHrs`, `EmpPerformance`) VALUES
(1, 'Juan', 'Garcia', 'juan@example.com', 3124157, 0.00, 0.00, 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
`ProdId` int(4) NOT NULL,
  `ProdName` varchar(20) COLLATE ascii_bin NOT NULL,
  `ProdPrice` decimal(6,2) NOT NULL,
  `ProdUnits` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProdId`, `ProdName`, `ProdPrice`, `ProdUnits`) VALUES
(7, 'Leather Wallet', 19.99, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`id` int(20) NOT NULL,
  `password` varchar(60) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `username`) VALUES
(1, 'admin', 'juangarcia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
 ADD PRIMARY KEY (`ClientId`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
 ADD PRIMARY KEY (`EmplID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
 ADD PRIMARY KEY (`ProdId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
MODIFY `ClientId` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
MODIFY `EmplID` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
MODIFY `ProdId` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;