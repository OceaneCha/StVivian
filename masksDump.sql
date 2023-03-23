CREATE DATABASE  IF NOT EXISTS `masks` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `masks`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: masks
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `character`
--

DROP TABLE IF EXISTS `character`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `character` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `biography` varchar(255) DEFAULT NULL,
  `powers` varchar(255) DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  `picture` varchar(255) DEFAULT 'assets/characters/noCard.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character`
--

LOCK TABLES `character` WRITE;
/*!40000 ALTER TABLE `character` DISABLE KEYS */;
INSERT INTO `character` VALUES (1,'Viktoria','Vitsina','Vika','NIGHT SPINNER',19,1,'A former Vigilante recently turned official. She\'s part of the Incredible 8 alongside NEBULA, STUNNING STING, BOOMBOX, and GECKO. Her powers are impossible mobility and spider-related abilities.',NULL,1,'assets/characters/nightSpinner.png'),(2,'Cindy','Lovestein',NULL,'AVALANCHE',52,1,NULL,NULL,2,'assets/characters/avalanche.png'),(3,'Kimber','Tuffin',NULL,'NEBULA',NULL,1,'A child star, daughter of MILKYWAY MAIDEN, one of the Vivacious 7. Superpopular, her gravity powers are consistently eclipsed by her magnetic persona and her voluminous assets.',NULL,1,'assets/characters/nebula.png'),(4,'Glinda','Giles',NULL,'GECKO',NULL,1,'A cape who was transformed in a lizard in her youth. She\'s not quite as popular as NEBULA (but then again, nobody is), but she\'s a sweetheart among the Incredible 8, much to her consternation.',NULL,1,'assets/characters/gecko.png'),(5,'Jordan','Jefferson',NULL,'STUNNING STING',18,1,NULL,NULL,1,'assets/characters/stunningSting.png'),(6,'Hannah','Jefferson',NULL,'QUEEN COBRA',43,1,NULL,NULL,2,'assets/characters/queenCobra.png'),(7,'Diego','Martinez',NULL,'SPLIT-SECOND',NULL,1,NULL,NULL,2,'assets/characters/splitSecond.png'),(8,NULL,NULL,NULL,'BROODMOTHER',NULL,1,NULL,NULL,3,'assets/characters/noCard.png'),(9,NULL,NULL,NULL,'THE DEMIURGE',NULL,3,NULL,NULL,4,'assets/characters/noCard.png'),(10,'Ellen','Summer',NULL,NULL,25,2,NULL,NULL,NULL,'assets/characters/noCard.png'),(11,NULL,NULL,NULL,'BOOMBOX',NULL,1,'Even though she comes from metaphorically nowehere, BOOMBOX shines in the Incredible 8, her diamond-in-the-rough attitude a stark contrast with NEBULA and STUNNING STING.','Sonic manipulation, transformable limbs',1,'assets/characters/boombox.png');
/*!40000 ALTER TABLE `character` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `inAction` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Incredible 8',1),(2,'Vivacious 7',1),(3,'Savage 6',0),(4,'High 5',0),(5,'Formidable 4',0),(6,'Tyrants 3',0);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Superhero'),(2,'Civilian'),(3,'Supervillain'),(4,'Vigilante');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-23 14:21:00
