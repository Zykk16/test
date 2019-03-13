-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cf59149_phplessi
-- ------------------------------------------------------
-- Server version	5.5.50-log

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
-- Table structure for table `geekbrains_morozyuk`
--

DROP TABLE IF EXISTS `geekbrains_morozyuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geekbrains_morozyuk` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `name_img` varchar(100) NOT NULL,
  `size_img` int(11) NOT NULL,
  `type_img` char(20) NOT NULL,
  `katalog` varchar(100) NOT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_img`),
  KEY `img_index` (`name_img`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geekbrains_morozyuk`
--

LOCK TABLES `geekbrains_morozyuk` WRITE;
/*!40000 ALTER TABLE `geekbrains_morozyuk` DISABLE KEYS */;
INSERT INTO `geekbrains_morozyuk` VALUES (43,'meditsinskiy-massazh.jpg',116580,'jpg','data/meditsinskiy-massazh.jpg',NULL),(44,'cavitation.jpg',34880,'jpg','data/cavitation.jpg',0),(45,'anticellulite-massage.png',15611,'png','data/anticellulite-massage.png',0),(46,'child-massage.jpg',80591,'jpg','data/child-massage.jpg',0),(47,'anticellulite-massage.png',15611,'png','data/anticellulite-massage.png',0),(48,'vibromassazh.jpg',138942,'jpg','data/vibromassazh.jpg',0);
/*!40000 ALTER TABLE `geekbrains_morozyuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cf59149_phplessi'
--

--
-- Dumping routines for database 'cf59149_phplessi'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-06 20:02:47
