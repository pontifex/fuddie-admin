-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: fuddie_local
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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_street` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_city` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_state` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_country` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_postal_code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_line1` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_line2` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,'Perfect Street','Poznań','wielkopolska','Poland','61-625','',NULL,1,'2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badge`
--

DROP TABLE IF EXISTS `badge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `badge` (
  `id` int(11) NOT NULL,
  `v_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_description` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badge`
--

LOCK TABLES `badge` WRITE;
/*!40000 ALTER TABLE `badge` DISABLE KEYS */;
INSERT INTO `badge` VALUES (1,'Test Badge','Description goes here','no-image.png',1,'2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `badge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_description` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'American Food','Good taste, a lot of calories',1,'2019-03-14 09:05:00','2019-03-14 09:05:00',NULL),(2,'China Taste','You have no idea how taste a dog is!',1,'2019-03-14 09:11:00','2019-03-18 13:19:28',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_website` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_logo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_phone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_settings` json DEFAULT NULL,
  `b_status` tinyint(1) NOT NULL DEFAULT '1',
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Test Company','www.test-company.com',NULL,'Test Street 7/7','0044123123123',NULL,1,'2019-03-14 08:55:00','2019-03-14 08:56:40',NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_type`
--

DROP TABLE IF EXISTS `discount_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount_type` (
  `id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_unit` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_type`
--

LOCK TABLES `discount_type` WRITE;
/*!40000 ALTER TABLE `discount_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `discount_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20190312102356','2019-03-12 16:16:11'),('20190312161219','2019-03-12 16:16:11'),('20190314075538','2019-03-14 08:05:59');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mini_game`
--

DROP TABLE IF EXISTS `mini_game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mini_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_badge` int(11) NOT NULL,
  `v_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_badge_goal` int(11) NOT NULL DEFAULT '0',
  `v_description` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_badge1_idx` (`fk_badge`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mini_game`
--

LOCK TABLES `mini_game` WRITE;
/*!40000 ALTER TABLE `mini_game` DISABLE KEYS */;
INSERT INTO `mini_game` VALUES (1,1,'Test Mini Game','123',100,'Wow it has a description',1,'2019-03-14 19:45:00','2019-03-14 19:48:17',NULL);
/*!40000 ALTER TABLE `mini_game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mini_game_category`
--

DROP TABLE IF EXISTS `mini_game_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mini_game_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_url_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mini_game_category`
--

LOCK TABLES `mini_game_category` WRITE;
/*!40000 ALTER TABLE `mini_game_category` DISABLE KEYS */;
INSERT INTO `mini_game_category` VALUES (1,'Category A','no-icon.png','Description of category a',1,'2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `mini_game_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mini_game_has_mini_game_category`
--

DROP TABLE IF EXISTS `mini_game_has_mini_game_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mini_game_has_mini_game_category` (
  `mini_game_id` int(11) NOT NULL,
  `mini_game_category_id` int(11) NOT NULL,
  PRIMARY KEY (`mini_game_id`,`mini_game_category_id`),
  KEY `fk_mini_game_has_mini_game_category_mini_game1_idx` (`mini_game_id`),
  KEY `fk_mini_game_has_mini_game_category_mini_game_category1_idx` (`mini_game_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mini_game_has_mini_game_category`
--

LOCK TABLES `mini_game_has_mini_game_category` WRITE;
/*!40000 ALTER TABLE `mini_game_has_mini_game_category` DISABLE KEYS */;
INSERT INTO `mini_game_has_mini_game_category` VALUES (1,1);
/*!40000 ALTER TABLE `mini_game_has_mini_game_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_payment` int(11) DEFAULT NULL,
  `fk_user` int(11) NOT NULL,
  `fk_restaurant` int(11) NOT NULL,
  `fk_order_status` int(11) NOT NULL,
  `v_uuid` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_subtotal` decimal(10,2) NOT NULL,
  `d_discount` decimal(10,2) NOT NULL,
  `d_fee` decimal(10,2) NOT NULL,
  `d_total` decimal(10,2) NOT NULL,
  `d_fee_percentage` decimal(10,2) NOT NULL,
  `v_currency` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_channel` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_payment1_idx` (`fk_payment`),
  KEY `fk_order_restaurant1_idx` (`fk_restaurant`),
  KEY `fk_order_user1_idx` (`fk_user`),
  KEY `fk_order_order_status1_idx` (`fk_order_status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,1,1,1,1,'123123123123123',1000.00,0.00,1000.00,1000.00,100.00,'EUR','127.0.0.1','VIP','2019-03-14 11:05:00','2019-03-14 11:05:00',NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,'567','2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status_history`
--

DROP TABLE IF EXISTS `order_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_status_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) NOT NULL,
  `fk_order_status` int(11) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_order_status_history_order1_idx` (`fk_order`),
  KEY `fk_order_status_history_order_status1_idx` (`fk_order_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status_history`
--

LOCK TABLES `order_status_history` WRITE;
/*!40000 ALTER TABLE `order_status_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_status_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameter`
--

DROP TABLE IF EXISTS `parameter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_parameter_type` int(11) NOT NULL,
  `v_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_description` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_value` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parameter_parameter_type1_idx` (`fk_parameter_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter`
--

LOCK TABLES `parameter` WRITE;
/*!40000 ALTER TABLE `parameter` DISABLE KEYS */;
/*!40000 ALTER TABLE `parameter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameter_type`
--

DROP TABLE IF EXISTS `parameter_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameter_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter_type`
--

LOCK TABLES `parameter_type` WRITE;
/*!40000 ALTER TABLE `parameter_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `parameter_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_payment_method` int(11) NOT NULL,
  `v_gateway_code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_gateway_status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_total` decimal(10,2) NOT NULL,
  `v_currency` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_payment_method1_idx` (`fk_payment_method`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,1,'987','Unknown',1000.00,'EUR','2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_gateway`
--

DROP TABLE IF EXISTS `payment_gateway`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_gateway` (
  `id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_gateway`
--

LOCK TABLES `payment_gateway` WRITE;
/*!40000 ALTER TABLE `payment_gateway` DISABLE KEYS */;
INSERT INTO `payment_gateway` VALUES ('1',1,'2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `payment_gateway` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_history`
--

DROP TABLE IF EXISTS `payment_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_payment` int(11) NOT NULL,
  `v_gateway_status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_request` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_history_payment1_idx` (`fk_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_history`
--

LOCK TABLES `payment_history` WRITE;
/*!40000 ALTER TABLE `payment_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_payment_method_type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_user_has_payment_gateway` int(11) NOT NULL,
  `c_iin` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_last_4_digits` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_token` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_type_card` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_issuer` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_device_session_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_default` tinyint(1) NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_expired_at` date DEFAULT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_method_payment_method_type1_idx` (`fk_payment_method_type`),
  KEY `fk_payment_method_user_has_payment_gateway1_idx` (`fk_user_has_payment_gateway`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method`
--

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
INSERT INTO `payment_method` VALUES (1,'1',1,'123','1234','token','debit','visa','mBank','1',1,1,'2020-01-01','2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_method_type`
--

DROP TABLE IF EXISTS `payment_method_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_method_type` (
  `id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method_type`
--

LOCK TABLES `payment_method_type` WRITE;
/*!40000 ALTER TABLE `payment_method_type` DISABLE KEYS */;
INSERT INTO `payment_method_type` VALUES ('1',1,'2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `payment_method_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_company` int(11) NOT NULL,
  `v_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_logo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_phone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_website` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_longitude` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_latitude` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_settings` json DEFAULT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_branch_company1_idx` (`fk_company`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` VALUES (1,1,'My First Restaurant',NULL,'Wealthy Avenue 1','0044321321321',NULL,NULL,NULL,'0','0',NULL,1,'2019-03-14 09:12:00','2019-03-14 09:12:00',NULL);
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_has_category`
--

DROP TABLE IF EXISTS `restaurant_has_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant_has_category` (
  `restaurant_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`restaurant_id`,`category_id`),
  KEY `fk_restaurant_has_category_restaurant1_idx` (`restaurant_id`),
  KEY `fk_restaurant_has_category_category1_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_has_category`
--

LOCK TABLES `restaurant_has_category` WRITE;
/*!40000 ALTER TABLE `restaurant_has_category` DISABLE KEYS */;
INSERT INTO `restaurant_has_category` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `restaurant_has_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_has_mini_game`
--

DROP TABLE IF EXISTS `restaurant_has_mini_game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant_has_mini_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_restaurant` int(11) NOT NULL,
  `fk_game` int(11) NOT NULL,
  `fk_discount_type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_amount` decimal(10,2) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurant_has_game_restaurant1_idx` (`fk_restaurant`),
  KEY `fk_restaurant_has_game_discount_type1_idx` (`fk_discount_type`),
  KEY `fk_restaurant_has_game_game1_idx` (`fk_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_has_mini_game`
--

LOCK TABLES `restaurant_has_mini_game` WRITE;
/*!40000 ALTER TABLE `restaurant_has_mini_game` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant_has_mini_game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_image`
--

DROP TABLE IF EXISTS `restaurant_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_restaurant` int(11) NOT NULL,
  `v_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurant_image_restaurant1_idx` (`fk_restaurant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_image`
--

LOCK TABLES `restaurant_image` WRITE;
/*!40000 ALTER TABLE `restaurant_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_schedule`
--

DROP TABLE IF EXISTS `restaurant_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_restaurant` int(11) NOT NULL,
  `i_day` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_open_at` time NOT NULL,
  `d_close_at` time NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurant_schedule_restaurant1_idx` (`fk_restaurant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_schedule`
--

LOCK TABLES `restaurant_schedule` WRITE;
/*!40000 ALTER TABLE `restaurant_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reward`
--

DROP TABLE IF EXISTS `reward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_waiter` int(11) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reward_waiter1_idx` (`fk_waiter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reward`
--

LOCK TABLES `reward` WRITE;
/*!40000 ALTER TABLE `reward` DISABLE KEYS */;
/*!40000 ALTER TABLE `reward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_address` int(11) DEFAULT NULL,
  `v_external_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_gender` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_birthday` date DEFAULT NULL,
  `v_code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_settings` json DEFAULT NULL,
  `i_ranking` int(11) DEFAULT '0',
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `v_external_id_UNIQUE` (`v_external_id`),
  KEY `fk_user_address1_idx` (`fk_address`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'123','Pierr Dolony','pierr.dolony@gmail.com','0044567567567','male','1990-01-01','Yes','[]',1,1,'2019-03-14 10:10:10','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_badge`
--

DROP TABLE IF EXISTS `user_has_badge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_badge` (
  `user_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`badge_id`),
  KEY `fk_user_has_badge_user1_idx` (`user_id`),
  KEY `fk_user_has_badge_badge1_idx` (`badge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_badge`
--

LOCK TABLES `user_has_badge` WRITE;
/*!40000 ALTER TABLE `user_has_badge` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_badge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_payment_gateway`
--

DROP TABLE IF EXISTS `user_has_payment_gateway`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_payment_gateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `fk_payment_gateway` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_device_code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL,
  `d_updated_at` datetime NOT NULL,
  `d_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_payment_gateway_user1_idx` (`fk_user`),
  KEY `fk_user_has_payment_gateway_payment_gateway1_idx` (`fk_payment_gateway`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_payment_gateway`
--

LOCK TABLES `user_has_payment_gateway` WRITE;
/*!40000 ALTER TABLE `user_has_payment_gateway` DISABLE KEYS */;
INSERT INTO `user_has_payment_gateway` VALUES (1,1,'1','567','765',1,'2019-03-14 10:00:00','2019-03-14 10:00:00',NULL);
/*!40000 ALTER TABLE `user_has_payment_gateway` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_user`
--

DROP TABLE IF EXISTS `user_has_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_user` (
  `user_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`user_id1`),
  KEY `fk_user_has_user_user1_idx` (`user_id`),
  KEY `fk_user_has_user_user2_idx` (`user_id1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_user`
--

LOCK TABLES `user_has_user` WRITE;
/*!40000 ALTER TABLE `user_has_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `waiter`
--

DROP TABLE IF EXISTS `waiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_restaurant` int(11) NOT NULL,
  `v_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_code` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_status` tinyint(1) NOT NULL,
  `d_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_deleted_at` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waiter_restaurant1_idx` (`fk_restaurant`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waiter`
--

LOCK TABLES `waiter` WRITE;
/*!40000 ALTER TABLE `waiter` DISABLE KEYS */;
INSERT INTO `waiter` VALUES (1,1,'Lucas Test','567',1,'2019-03-14 09:23:00','2019-03-14 09:23:00',NULL);
/*!40000 ALTER TABLE `waiter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-19 13:35:10
