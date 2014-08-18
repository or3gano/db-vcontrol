-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: db_vcontrol
-- ------------------------------------------------------
-- Server version	5.6.17-log

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
-- Table structure for table `db_patches`
--

DROP TABLE IF EXISTS `db_patches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_patches` (
  `patch_id` int(11) NOT NULL AUTO_INCREMENT,
  `patch_name` varchar(255) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`patch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_patches`
--

LOCK TABLES `db_patches` WRITE;
/*!40000 ALTER TABLE `db_patches` DISABLE KEYS */;
INSERT INTO `db_patches` (`patch_id`, `patch_name`, `updated`) VALUES (1,'patch1.sql','2014-08-18');
INSERT INTO `db_patches` (`patch_id`, `patch_name`, `updated`) VALUES (2,'patch2.sql','2014-08-18');
INSERT INTO `db_patches` (`patch_id`, `patch_name`, `updated`) VALUES (3,'patch3.sql','2014-08-18');
INSERT INTO `db_patches` (`patch_id`, `patch_name`, `updated`) VALUES (4,'patch4.sql','2014-08-18');
/*!40000 ALTER TABLE `db_patches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offiziersbursche`
--

DROP TABLE IF EXISTS `offiziersbursche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offiziersbursche` (
  `german` varchar(255) DEFAULT NULL,
  `english` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offiziersbursche`
--

LOCK TABLES `offiziersbursche` WRITE;
/*!40000 ALTER TABLE `offiziersbursche` DISABLE KEYS */;
/*!40000 ALTER TABLE `offiziersbursche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenanza`
--

DROP TABLE IF EXISTS `ordenanza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordenanza` (
  `spanish` varchar(255) DEFAULT NULL,
  `english` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenanza`
--

LOCK TABLES `ordenanza` WRITE;
/*!40000 ALTER TABLE `ordenanza` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordenanza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zeh_batman`
--

DROP TABLE IF EXISTS `zeh_batman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zeh_batman` (
  `french` varchar(255) DEFAULT NULL,
  `english` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zeh_batman`
--

LOCK TABLES `zeh_batman` WRITE;
/*!40000 ALTER TABLE `zeh_batman` DISABLE KEYS */;
/*!40000 ALTER TABLE `zeh_batman` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-18 13:29:21
