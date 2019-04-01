-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: fuddie_admin_local
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companies` json NOT NULL,
  `restaurants` json NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL,
  `d_updated_at` datetime NOT NULL,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D76E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'[]','[]','admin@fuddie.com','[\"ROLE_SUPER_ADMIN\"]','$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q','2019-03-14 10:00:00','2019-03-14 10:00:00',NULL),(2,'[]','[]','user@fuddie.com','[\"ROLE_ANY_USER\"]','$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q','2019-03-14 10:00:00','2019-03-14 10:00:00',NULL),(3,'[]','[]','cashier@fuddie.com','[\"ROLE_CASHIER\"]','$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q','2019-03-18 20:04:15','2019-03-18 20:04:15',NULL),(4,'[]','[\"1\"]','restaurant@fuddie.com','[\"ROLE_RESTAURANT_ADMIN\"]','$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q','2019-03-19 09:14:56','2019-03-19 09:14:56',NULL),(5,'[\"1\"]','[]','company@fuddie.com','[\"ROLE_COMPANY_ADMIN\"]','$argon2i$v=19$m=1024,t=2,p=2$WVE5eG5IYmY5ZnA5U3dQZQ$ylD8fsNcmjOao2LJ4t/yNvB02VfY8hKH4B9FkI06y4Q','2019-03-19 09:25:32','2019-03-19 09:25:32',NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
