
-- Current Database: `geodetskauprava`
--
drop database if exists geodetskauprava;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `geodetskauprava` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `geodetskauprava`;

--
-- Table structure for table `stavba`
--
/*!40101 SET @saved_cs_client     = @@character_set_client */;

DROP TABLE IF EXISTS `stavba`;
CREATE TABLE `stavba` (
  `StavbaID` int(11) NOT NULL,
  `Naslov` char(30) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `Kraj` char(30) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `SteviloPrebivalcev` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StavbaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stanovanje`
--

DROP TABLE IF EXISTS `stanovanje`;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stanovanje` (
  `StavbaID` int(11) NOT NULL,
  `Zap_ST` int(11) NOT NULL,
  `Povrsina_kvadrati` float NOT NULL,
  `Prijavljenih` int(11) NOT NULL,
  `VrednostStanovanja` float NOT NULL,
  PRIMARY KEY (`StavbaID`,`Zap_ST`),
  CONSTRAINT `stanovanje_ibfk_1` FOREIGN KEY (`StavbaID`) REFERENCES `stavba` (`StavbaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stanovanje`
--

LOCK TABLES `stanovanje` WRITE;


UNLOCK TABLES;


--
-- Dumping data for table `stavba`
--

LOCK TABLES `stavba` WRITE;
UNLOCK TABLES;

