-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2015 at 03:05 
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `LuxeDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE IF NOT EXISTS `Clients` (
`ClientId` int(4) NOT NULL,
  `ClientName` varchar(20) COLLATE ascii_bin NOT NULL,
  `ClientSurname` varchar(20) COLLATE ascii_bin NOT NULL,
  `ClientMail` varchar(30) COLLATE ascii_bin NOT NULL,
  `ClientPhone` varchar(11) COLLATE ascii_bin NOT NULL DEFAULT '',
  `ClientAddress` varchar(30) COLLATE ascii_bin NOT NULL,
  `ClientBuyRate` double(2,1) NOT NULL,
  `ClientActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`ClientId`, `ClientName`, `ClientSurname`, `ClientMail`, `ClientPhone`, `ClientAddress`, `ClientBuyRate`, `ClientActive`) VALUES
(8, 'Maestra', 'Guapa', 'maestraguapa@mucho.mucho', '123456789', 'Calle la belleza, Pais hermoso', 3.1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE IF NOT EXISTS `Employees` (
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
(1, 'Juan', 'Garcia', 'juan@example.com', 3124157, '0.00', '0.00', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
`ProdId` int(4) NOT NULL,
  `ProdName` varchar(20) COLLATE ascii_bin NOT NULL,
  `ProdPrice` decimal(6,2) NOT NULL,
  `ProdUnits` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProdId`, `ProdName`, `ProdPrice`, `ProdUnits`) VALUES
(7, 'Leather Wallet', '19.99', 20);

-- --------------------------------------------------------

--
-- Table structure for table `ProductsBySales`
--

CREATE TABLE IF NOT EXISTS `ProductsBySales` (
  `IdProduct` int(11) NOT NULL,
  `IdSale` int(11) NOT NULL,
`IdProductSale` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `ProductsBySales`
--

INSERT INTO `ProductsBySales` (`IdProduct`, `IdSale`, `IdProductSale`) VALUES
(7, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE IF NOT EXISTS `Sales` (
`SalesId` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`SalesId`, `IdClient`, `EmployeeID`) VALUES
(4, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
 ADD PRIMARY KEY (`ClientId`), ADD KEY `ClientId` (`ClientId`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
 ADD PRIMARY KEY (`EmplID`), ADD KEY `EmplID` (`EmplID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
 ADD PRIMARY KEY (`ProdId`), ADD KEY `ProdId` (`ProdId`), ADD KEY `ProdId_2` (`ProdId`);

--
-- Indexes for table `ProductsBySales`
--
ALTER TABLE `ProductsBySales`
 ADD PRIMARY KEY (`IdProductSale`), ADD KEY `IdProduct` (`IdProduct`,`IdSale`), ADD KEY `IdSale` (`IdSale`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
 ADD PRIMARY KEY (`SalesId`), ADD KEY `SalesId` (`SalesId`), ADD KEY `IdClient` (`IdClient`), ADD KEY `EmployeeID` (`EmployeeID`);

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
MODIFY `ClientId` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
-- AUTO_INCREMENT for table `ProductsBySales`
--
ALTER TABLE `ProductsBySales`
MODIFY `IdProductSale` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
MODIFY `SalesId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ProductsBySales`
--
ALTER TABLE `ProductsBySales`
ADD CONSTRAINT `ProductsBySales_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `Products` (`ProdId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ProductsBySales_ibfk_2` FOREIGN KEY (`IdSale`) REFERENCES `Sales` (`SalesId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
ADD CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `Clients` (`ClientId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Sales_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `Employees` (`EmplID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
