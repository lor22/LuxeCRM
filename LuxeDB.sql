-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2015 at 03:57 
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
  `ClientBuyRate` double(7,2) NOT NULL,
  `ClientActive` enum('YES','NO') COLLATE ascii_bin NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`ClientId`, `ClientName`, `ClientSurname`, `ClientMail`, `ClientPhone`, `ClientAddress`, `ClientBuyRate`, `ClientActive`) VALUES
(8, 'Maria', 'Herrstand', 'mariaherr@mucho', '123456789', 'Gart street', 3.10, 'YES'),
(9, 'Bob', 'Johnson', 'bjohn@heh.com', '123456789', 'erh street', 0.00, 'YES'),
(10, 'Piotr', 'Frederyk', 'piotr@hello.com', '123456789', 'han street', 0.00, 'YES'),
(11, 'Clark', 'Gabe', 'clark@hello.com', '123123', 'hey street', 0.00, 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
 ADD PRIMARY KEY (`ClientId`), ADD KEY `ClientId` (`ClientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
MODIFY `ClientId` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
