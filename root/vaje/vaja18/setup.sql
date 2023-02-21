-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: baza1
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Current Database: `baza1`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bazaOseb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bazaOseb`;

--
-- Table structure for table `kraj`
--

DROP TABLE IF EXISTS `kraj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kraj` (
  `KID` int(11) NOT NULL,
  `imeKraja` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`KID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kraj`
--

LOCK TABLES `kraj` WRITE;
/*!40000 ALTER TABLE `kraj` DISABLE KEYS */;
INSERT INTO `kraj` VALUES (1000,'Ljubljana'),(2000,'Maribor'),(4000,'Kranj');
/*!40000 ALTER TABLE `kraj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oseba`
--

DROP TABLE IF EXISTS `oseba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oseba` (
  `id` int(11) NOT NULL,
  `ime` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `rojstvo` date NOT NULL,
  `KID` int(11) NOT NULL,
  `spol` char(1) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(150) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `KID` (`KID`),
  CONSTRAINT `oseba_ibfk_1` FOREIGN KEY (`KID`) REFERENCES `kraj` (`KID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oseba`
--

LOCK TABLES `oseba` WRITE;
INSERT INTO `oseba` VALUES (1,'Miha','Novak','2001-04-01',1000,'M','miha@neki.si','dober prijatelj'),
(2,'Alenka','Volk','2002-04-18',1000,'F','lenka@neki.si',NULL),
(3,'Maja','Kralj','1998-01-14',4000,'F','maja@info.si','umetnica');

/*!40000 ALTER TABLE `oseba` DISABLE KEYS */;
/*!40000 ALTER TABLE `oseba` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


