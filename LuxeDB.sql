-- MySQL dump 10.13  Distrib 5.5.38, for osx10.6 (i386)
--
-- Host: localhost    Database: LuxeDB
-- ------------------------------------------------------
-- Server version	5.5.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Clients`
--

DROP TABLE IF EXISTS `Clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Clients` (
  `ClientId` int(4) NOT NULL AUTO_INCREMENT,
  `ClientName` varchar(20) COLLATE ascii_bin NOT NULL,
  `ClientSurname` varchar(20) COLLATE ascii_bin NOT NULL,
  `ClientMail` varchar(30) COLLATE ascii_bin NOT NULL,
  `ClientPhone` varchar(11) COLLATE ascii_bin NOT NULL DEFAULT '',
  `ClientAddress` varchar(30) COLLATE ascii_bin NOT NULL,
  `ClientBuyRate` double(7,2) NOT NULL,
  `ClientActive` enum('YES','NO') COLLATE ascii_bin NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`ClientId`),
  KEY `ClientId` (`ClientId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=ascii COLLATE=ascii_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clients`
--

LOCK TABLES `Clients` WRITE;
/*!40000 ALTER TABLE `Clients` DISABLE KEYS */;
INSERT INTO `Clients` VALUES (8,'Maria','Herrstand','mariaherr@mucho.com','123456789','Gart street 43',75.90,'NO'),(9,'Bob','Johnson','bjohn@heh.com','123456789','Erh street 182',78.50,'YES'),(10,'Danielle','Jones','daniellej@hello.com','123456789','han street 67',129.50,'YES'),(11,'Anna','Hanson','annahanson@hello.com','123123','Hey street 34',63.79,'YES'),(12,'Paulina','Harriet','pharr@luxe.com','18273361','Tas Street 34',78.64,'YES'),(13,'Victoria','Lane','viclane@example.com','81237334','Juan Street 153',69.69,'YES'),(14,'Aneta','Michalska','amichalska@hey.com','90871625','Piotrkowska 45',60.12,'YES'),(15,'Marianne','Napkin','marinap@hello.com','89716253','Usage street 45',55.30,'YES');
/*!40000 ALTER TABLE `Clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employees`
--

DROP TABLE IF EXISTS `Employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employees` (
  `EmplID` int(4) NOT NULL AUTO_INCREMENT,
  `EmpName` varchar(20) COLLATE ascii_bin NOT NULL,
  `EmpSurname` varchar(20) COLLATE ascii_bin NOT NULL,
  `EmpMail` varchar(30) COLLATE ascii_bin NOT NULL,
  `EmpPhone` int(9) NOT NULL,
  `EmpSales` decimal(7,2) NOT NULL,
  `EmpWorkHrs` decimal(4,2) NOT NULL,
  `EmpPerformance` decimal(2,1) NOT NULL,
  PRIMARY KEY (`EmplID`),
  KEY `EmplID` (`EmplID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=ascii COLLATE=ascii_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employees`
--

LOCK TABLES `Employees` WRITE;
/*!40000 ALTER TABLE `Employees` DISABLE KEYS */;
INSERT INTO `Employees` VALUES (1,'Juan','Garcia','juan@example.com',3124157,0.00,0.00,0.0);
/*!40000 ALTER TABLE `Employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products` (
  `ProdId` int(4) NOT NULL AUTO_INCREMENT,
  `ProdName` varchar(100) COLLATE ascii_bin NOT NULL,
  `ProdPrice` decimal(6,2) NOT NULL,
  `ProdUnits` int(2) NOT NULL,
  `ProdActive` enum('YES','NO') COLLATE ascii_bin NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`ProdId`),
  KEY `ProdId` (`ProdId`),
  KEY `ProdId_2` (`ProdId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=ascii COLLATE=ascii_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (7,'Leather wallet',29.99,20,'YES'),(8,'Feather lace shirt',80.00,10,'YES'),(9,'Panama hat',12.20,10,'YES'),(10,'Studded handbag',90.00,8,'YES'),(11,'Frilled silk shirt',72.00,10,'YES'),(12,'Jacket with fringe strip',149.00,20,'YES'),(13,'V-neck overshirt',89.09,15,'YES'),(14,'White tropical top',76.99,13,'YES'),(15,'Printed parka',75.90,10,'YES'),(16,'Printed fur sandals',109.99,7,'YES');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductsBySales`
--

DROP TABLE IF EXISTS `ProductsBySales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductsBySales` (
  `IdProduct` int(11) NOT NULL,
  `IdSale` int(11) NOT NULL,
  `IdProductSale` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdProductSale`),
  KEY `IdProduct` (`IdProduct`,`IdSale`),
  KEY `IdSale` (`IdSale`),
  CONSTRAINT `ProductsBySales_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `Products` (`ProdId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ProductsBySales_ibfk_2` FOREIGN KEY (`IdSale`) REFERENCES `Sales` (`SalesId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=ascii COLLATE=ascii_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductsBySales`
--

LOCK TABLES `ProductsBySales` WRITE;
/*!40000 ALTER TABLE `ProductsBySales` DISABLE KEYS */;
INSERT INTO `ProductsBySales` VALUES (7,27,29),(7,32,40),(7,34,44),(7,35,47),(7,37,49),(7,38,52),(7,39,53),(7,40,55),(7,42,60),(7,43,61),(8,30,34),(9,34,45),(9,39,54),(10,27,30),(10,35,46),(11,32,38),(11,33,41),(11,44,63),(12,31,36),(12,38,51),(12,41,58),(12,41,59),(13,28,31),(13,33,42),(13,36,48),(14,30,33),(14,32,37),(15,29,32),(15,34,43),(15,37,50),(15,40,56),(15,43,62),(16,31,35),(16,32,39),(16,41,57);
/*!40000 ALTER TABLE `ProductsBySales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sales`
--

DROP TABLE IF EXISTS `Sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sales` (
  `SalesId` int(11) NOT NULL AUTO_INCREMENT,
  `IdClient` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `SaleDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SalesId`),
  KEY `SalesId` (`SalesId`),
  KEY `IdClient` (`IdClient`),
  KEY `EmployeeID` (`EmployeeID`),
  CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `Clients` (`ClientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Sales_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `Employees` (`EmplID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=ascii COLLATE=ascii_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sales`
--

LOCK TABLES `Sales` WRITE;
/*!40000 ALTER TABLE `Sales` DISABLE KEYS */;
INSERT INTO `Sales` VALUES (27,14,1,'2015-01-09 23:00:00'),(28,14,1,'2015-02-10 23:00:00'),(29,8,1,'2015-02-12 23:00:00'),(30,9,1,'2015-02-13 23:00:00'),(31,10,1,'2015-03-02 23:00:00'),(32,11,1,'2015-03-24 23:00:00'),(33,12,1,'2015-04-14 22:00:00'),(34,12,1,'2015-04-19 22:00:00'),(35,13,1,'2015-04-29 22:00:00'),(36,13,1,'2015-04-30 22:00:00'),(37,14,1,'2015-05-12 22:00:00'),(38,15,1,'2015-05-16 22:00:00'),(39,15,1,'2015-05-24 22:00:00'),(40,12,1,'2015-05-31 22:00:00'),(41,12,1,'2015-06-02 22:00:00'),(42,11,1,'2015-06-08 22:00:00'),(43,14,1,'2015-06-12 22:00:00'),(44,12,1,'2015-06-15 10:33:43');
/*!40000 ALTER TABLE `Sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(60) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','juangarcia');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-17 13:00:42
