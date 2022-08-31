-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: empire
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buildrequsts`
--

DROP TABLE IF EXISTS `buildrequsts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildrequsts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sundirction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberofspace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberofflower` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildrequsts`
--

LOCK TABLES `buildrequsts` WRITE;
/*!40000 ALTER TABLE `buildrequsts` DISABLE KEYS */;
INSERT INTO `buildrequsts` VALUES (2,'ريرين مرحبا ١٠٠ مرحبا ١٠٠ مرحبا ١٠٠ مرحبا ١٠٠ مرحبا ١٠٠','طلب بناء بيا','موصل حي النور','2021-09-05 12:03:24','2021-09-05 12:03:24',NULL,NULL,NULL,NULL,NULL),(3,'ريرين مرحبا ١٠٠ مرحبا ١٠٠ مرحبا ١٠٠ مرحبا ١٠٠ مرحبا ١٠٠','طلب بناء بيا','موصل حي النور','2021-09-05 12:03:24','2021-09-05 12:03:24','689769','شروق تام','300م ','3','2'),(4,'تقرق','نثررث','تثرث','2022-05-14 22:23:14','2022-05-14 22:23:14','٧٢٧٧٢','ثتتث','تثتث',NULL,NULL),(5,'text',NULL,'text','2022-06-29 06:08:07','2022-06-29 06:08:07',NULL,'text','text',NULL,NULL),(6,'text',NULL,'text','2022-07-18 06:00:32','2022-07-18 06:00:32',NULL,'text','text','text','text');
/*!40000 ALTER TABLE `buildrequsts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'images/articles/Aw4XcZtqcUPGcfmWiQkX0e2zRBQ0gOhZqwZA42xS.jpg','بيوت','2021-10-13 11:41:50','2021-10-13 11:41:50'),(2,'images/articles/HwbaaS14aYokBkQIy02ilFhRC9TiNTbLxXMHwcpK.jpg','شقق','2021-10-13 11:42:04','2021-10-13 11:42:04'),(3,'images/articles/sVlPcvcfH3fw3MwTf9qA7HWOdw7KgqjvNX3e6IzQ.jpg','بيوت صغيرة','2021-10-13 12:19:40','2021-10-13 12:19:40'),(4,'images/articles/vDdgb4dJMK8tY9ALDWxqqN5xPe9FKC1gsdEXtigJ.jpg','200م','2021-10-14 11:50:26','2021-10-14 11:50:26'),(5,'image/HzzbCZeOVz6UuclbtOdlO8kXh5eZZtPl36doMtzi.jpg','house','2022-05-29 10:50:43','2022-05-29 10:50:43'),(6,'image/2ztdOhceHb7guUTmyqT1KxWvwcFxdvvx8GGymPnv.jpg','فلل','2022-06-10 06:55:48','2022-06-10 06:55:48');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cruds`
--

DROP TABLE IF EXISTS `cruds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cruds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fas fa-bars',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `built` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cruds_name_unique` (`name`),
  UNIQUE KEY `cruds_model_unique` (`model`),
  UNIQUE KEY `cruds_route_unique` (`route`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cruds`
--

LOCK TABLES `cruds` WRITE;
/*!40000 ALTER TABLE `cruds` DISABLE KEYS */;
INSERT INTO `cruds` VALUES (2,'customer','App\\Models\\Customer','customer','users',1,1,'2021-12-20 13:34:33','2021-12-20 13:38:12'),(3,'worker','App\\Models\\Worker','worker','users',1,1,'2021-12-20 13:45:21','2021-12-20 13:47:52'),(4,'expensecategory','App\\Models\\ExpenseCategory','expensecategory','users',1,1,'2021-12-20 13:54:29','2021-12-20 13:55:56'),(5,'ending','App\\Models\\Ending','ending','users',1,1,'2021-12-20 14:05:19','2021-12-20 14:07:00'),(6,'project','App\\Models\\Project','project','users',1,1,'2021-12-20 14:09:35','2021-12-20 14:35:11'),(7,'expense','App\\Models\\Expense','expense','money',1,1,'2021-12-20 14:49:00','2021-12-20 14:59:25'),(8,'endingamount','App\\Models\\EndingAmount','endingamount','fas fa-bars',1,1,'2021-12-20 15:03:09','2021-12-20 15:05:05'),(9,'income','App\\Models\\Income','income','fas fa-bars',1,1,'2021-12-20 21:48:09','2021-12-20 21:50:28'),(10,'outpayment','App\\Models\\OutPayment','outpayment','money',1,1,'2021-12-26 11:37:16','2021-12-26 11:40:20'),(11,'officepayment','App\\Models\\OfficePayment','officepayment','fas fa-bars',1,1,'2021-12-31 00:41:26','2021-12-31 00:45:49'),(12,'officeexp','App\\Models\\OfficeExp','officeexp','fas fa-bars',1,1,'2022-05-08 19:37:45','2022-05-08 19:39:32'),(13,'projectperctanges','App\\Models\\Projectperctanges','projectperctanges','fas fa-bars',1,1,'2022-05-08 19:53:49','2022-05-08 19:55:24'),(14,'buildrequst','App\\Models\\Buildrequst','buildrequst','fas fa-bars',1,1,'2022-05-14 21:45:57','2022-05-29 10:44:55'),(15,'categories','App\\Models\\Categories','categories','fas fa-bars',1,1,'2022-05-14 21:52:20','2022-05-14 21:53:52'),(16,'post','App\\Models\\Post','post','fas fa-bars',1,1,'2022-05-14 21:56:27','2022-05-14 21:57:28');
/*!40000 ALTER TABLE `cruds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ending_amounts`
--

DROP TABLE IF EXISTS `ending_amounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ending_amounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  `worker_id` bigint(20) unsigned NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(25,8) DEFAULT NULL,
  `pay` double NOT NULL,
  `rest` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recive_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isred` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ending_amounts`
--

LOCK TABLES `ending_amounts` WRITE;
/*!40000 ALTER TABLE `ending_amounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `ending_amounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endings`
--

DROP TABLE IF EXISTS `endings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endings`
--

LOCK TABLES `endings` WRITE;
/*!40000 ALTER TABLE `endings` DISABLE KEYS */;
INSERT INTO `endings` VALUES (1,'انهائات','2022-05-13 18:30:36','2022-05-13 18:30:36');
/*!40000 ALTER TABLE `endings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_categories`
--

DROP TABLE IF EXISTS `expense_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_categories`
--

LOCK TABLES `expense_categories` WRITE;
/*!40000 ALTER TABLE `expense_categories` DISABLE KEYS */;
INSERT INTO `expense_categories` VALUES (4,'اعمال ترابية ','2022-05-09 13:17:48','2022-05-09 13:17:48'),(5,'الهيكل','2022-05-09 13:18:42','2022-05-09 13:18:42');
/*!40000 ALTER TABLE `expense_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `project_id` bigint(20) unsigned NOT NULL,
  `worker_id` bigint(20) unsigned DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(25,8) DEFAULT NULL,
  `pay` double DEFAULT NULL,
  `rest` double DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recive_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isred` tinyint(1) DEFAULT NULL,
  `fromOut` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,NULL,1,NULL,'2022-08-31',700000.00000000,500000,200000,'لايوجد','حسين',NULL,NULL,NULL,'2022-08-30 20:04:33','2022-08-30 20:12:31');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incomes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `amount` double(25,8) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recive_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `isred` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomes`
--

LOCK TABLES `incomes` WRITE;
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
INSERT INTO `incomes` VALUES (1,1,10000000.00000000,'تجربة ادخال','محمد معتز',NULL,'2022-08-30',NULL,'2022-08-30 19:53:04','2022-08-30 19:53:04');
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastworks`
--

DROP TABLE IF EXISTS `lastworks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lastworks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastworks`
--

LOCK TABLES `lastworks` WRITE;
/*!40000 ALTER TABLE `lastworks` DISABLE KEYS */;
/*!40000 ALTER TABLE `lastworks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2016_06_01_000001_create_oauth_auth_codes_table',1),(2,'2016_06_01_000002_create_oauth_access_tokens_table',1),(3,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(4,'2016_06_01_000004_create_oauth_clients_table',1),(5,'2016_06_01_000005_create_oauth_personal_access_clients_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('0c2b2435af35c758298c867bf77c9844d628a5dca33b51ccfb6c8a01f88225105e683720038d7316',8,1,'user','[]',0,'2022-05-14 23:35:11','2022-05-14 23:35:11','2023-05-14 23:35:11'),('14cfe247044d5f16e5635288aa23355e78f2c7c49e690f6c3154098d57701bac1edc83a965dc3ff2',15,1,'user','[]',0,'2022-08-21 10:20:37','2022-08-21 10:20:37','2023-08-21 13:20:37'),('1b2a65878403413568f47fcd95684855e8fd8816dbf4ee30e8382a7ff8ce4219cb5c30285a3fce35',8,1,'user','[]',0,'2022-05-14 22:53:32','2022-05-14 22:53:32','2023-05-15 01:53:32'),('2040cb035db82cdb3e5fc8e368b5a5372cefd67af974c0a2110816ff1cb1aaac65f06451f10c16de',8,1,'user','[]',0,'2022-05-14 22:12:27','2022-05-14 22:12:27','2023-05-15 01:12:27'),('21de74024219b3e0b73c1848890b7022e125cabb84b8f2c6448d4d9b6e146fac74620e48efe77376',8,1,'user','[]',0,'2022-05-14 22:52:48','2022-05-14 22:52:48','2023-05-15 01:52:48'),('22d0c679170a939db960b913cab1b36011f4b50e2126988b3a2b7d74c0d308402ea2364f7f322e10',8,1,'user','[]',0,'2022-05-09 20:27:24','2022-05-09 20:27:24','2023-05-09 20:27:24'),('24faa89b4bc42d73cd8cb605135975ef277fe780550f62b6b5b769eaf8223ca089934fedfdc1650c',8,1,'user','[]',0,'2022-05-14 22:14:28','2022-05-14 22:14:28','2023-05-15 01:14:28'),('2eae44f4b28e7c1f56dbeff30d514f3c8042b2d50ef1e87654721b3ebd6e8b572286d76936d5b013',8,1,'user','[]',0,'2022-05-16 11:07:50','2022-05-16 11:07:50','2023-05-16 14:07:50'),('329380ed2dcd159599c66307358806f87b68b7fd0c3876b134049f123da23fcb7b439ae758d2f574',8,1,'user','[]',0,'2022-05-14 21:36:25','2022-05-14 21:36:25','2023-05-15 00:36:25'),('35b5de89791b8a96e986209f0b6f2b52be998d0e1e7034f20a437f3040a7b52b0b82cbe882805cf3',8,1,'user','[]',0,'2022-05-14 22:49:03','2022-05-14 22:49:03','2023-05-14 22:49:03'),('46c4cb03323b3fd367e6b6582fe879d58d141ab72f3c30153a21f8977264da392010f907ba99343f',8,1,'user','[]',0,'2022-05-14 22:42:15','2022-05-14 22:42:15','2023-05-15 01:42:15'),('46ee92bba571534816fb7a328beb8258a917ef51137abb1a0354877c8142a3231703c141dde251df',8,1,'user','[]',0,'2022-05-16 11:11:05','2022-05-16 11:11:05','2023-05-16 14:11:05'),('50a11496cf6c0540efd6653868617a3427695440c20181432cbbccd45993bcf0a302eead99f3f58d',8,1,'user','[]',0,'2022-05-14 22:09:34','2022-05-14 22:09:34','2023-05-15 01:09:34'),('51241ee023fd501f61f1bb2909731a5997087b6ed75b1503a027d9e81d030a5cb117ae1eb5755859',15,1,'user','[]',0,'2022-08-09 13:35:20','2022-08-09 13:35:20','2023-08-09 16:35:20'),('54e4e57ca515d56ade0a3f610cdcf1bd250d0a3624e13d58f0aa0b1c30e9ad478bc9d3c581f27d60',8,1,'user','[]',0,'2022-05-14 22:53:49','2022-05-14 22:53:49','2023-05-15 01:53:49'),('679975cccce79a2059e6487c12eba2addbee7b33548fb9dac28023bade3df5ece39d6f5d51bb3c57',15,1,'user','[]',0,'2022-08-21 10:39:00','2022-08-21 10:39:00','2023-08-21 13:39:00'),('68e944e67685972fa0c17526ab78868e6832929ff1c53bb084f19a32e537f132ea9481f5d43fb2f8',8,1,'user','[]',0,'2022-05-13 17:57:56','2022-05-13 17:57:56','2023-05-13 17:57:56'),('6db23dba6daf4eba7c38d87002331d37bf1021c115c32236f8b10fb27295cac8e22e7800b43797ca',8,1,'user','[]',0,'2022-05-14 22:11:50','2022-05-14 22:11:50','2023-05-15 01:11:50'),('7167aeeb163ed68aabeca11a36182489f4830c83421a9739df077f6776a7919228ce275b88518092',8,1,'user','[]',0,'2022-05-15 00:20:27','2022-05-15 00:20:27','2023-05-15 03:20:27'),('803d4ed1447c3accbdb7a5c03dd1ceb22dc56baea329fe356a8c9386b187e01f63508217f5a0127d',8,1,'user','[]',0,'2022-05-14 22:54:12','2022-05-14 22:54:12','2023-05-15 01:54:12'),('810c7370070d1c26ae2dd35ffe993ceb7b2537c112d845372c5fe4e29bc67912329eed0c312574ed',8,1,'user','[]',0,'2022-05-14 23:33:14','2022-05-14 23:33:14','2023-05-14 23:33:14'),('8a136ea13093c022dc4aab4a54f515c16efc9028c9f23e0dab1ccb537b9cb07acefe7a93d54817ee',8,1,'user','[]',0,'2022-05-14 22:13:47','2022-05-14 22:13:47','2023-05-15 01:13:47'),('8e08f12b7685c615a7fc268e85fa000fa3f7f0e8821a9c2a5876e61b80e3f7d042abe84423bc53b4',15,1,'user','[]',0,'2022-08-21 10:19:26','2022-08-21 10:19:26','2023-08-21 13:19:26'),('8f9071cb8230e2ca48efaa8efbdaa17efa677239d00854ba173bd8ba84850acc8a6a2e47cd8657c1',8,1,'user','[]',0,'2022-05-14 22:09:01','2022-05-14 22:09:01','2023-05-15 01:09:01'),('9d2d660b6880d3a90fc3698008c41768862dd8aebcedb751da18ab9699402e4fd5697acdad59366b',8,1,'user','[]',0,'2022-05-09 20:27:44','2022-05-09 20:27:44','2023-05-09 20:27:44'),('a6a63754470045f01f7900c485c6b977d4d90ce6126ca3ff1804dc9585ffac46a6208bf79849e5d3',8,1,'user','[]',0,'2022-05-14 22:13:57','2022-05-14 22:13:57','2023-05-15 01:13:57'),('b9f6eaa674e65f27c165f76cd4e32985c60e0861b750e0c5681571ea4f6a95913fb1e7e09d326ef4',8,1,'user','[]',0,'2022-05-14 21:56:11','2022-05-14 21:56:11','2023-05-15 00:56:11'),('fa88b6cdd0e4cc56c786bfc27802409b09a3072b477530fb8a4d558e00f91e7fe115f30a54c4ce58',8,1,'user','[]',0,'2022-05-14 23:31:50','2022-05-14 23:31:50','2023-05-14 23:31:50'),('fb67e17bc9a52050a7d665656e1322d079de85785b52a9f32d567b25a24e94122c32ce61f395bbe9',8,1,'user','[]',0,'2022-05-14 22:11:24','2022-05-14 22:11:24','2023-05-15 01:11:24');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Empire Personal Access Client','rg4dhJe0F37SPbhJqF9isvRIQSh7C7QA0ITuJcuu',NULL,'http://localhost',1,0,0,'2022-05-09 19:55:06','2022-05-09 19:55:06'),(2,NULL,'Empire Password Grant Client','NdX2nDGASucO5LkweWUZhA115SlvcAnoSi0nkT4E','users','http://localhost',0,1,0,'2022-05-09 19:55:06','2022-05-09 19:55:06');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2022-05-09 19:55:06','2022-05-09 19:55:06');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office_expenses`
--

DROP TABLE IF EXISTS `office_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office_expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` double(24,8) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_expenses`
--

LOCK TABLES `office_expenses` WRITE;
/*!40000 ALTER TABLE `office_expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `office_expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office_payments`
--

DROP TABLE IF EXISTS `office_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_payments`
--

LOCK TABLES `office_payments` WRITE;
/*!40000 ALTER TABLE `office_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `office_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `out_payments`
--

DROP TABLE IF EXISTS `out_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `out_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) NOT NULL,
  `amount` double(20,8) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `out_payments`
--

LOCK TABLES `out_payments` WRITE;
/*!40000 ALTER TABLE `out_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `out_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panel_admins`
--

DROP TABLE IF EXISTS `panel_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `panel_admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `panel_admins_user_id_unique` (`user_id`),
  CONSTRAINT `panel_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panel_admins`
--

LOCK TABLES `panel_admins` WRITE;
/*!40000 ALTER TABLE `panel_admins` DISABLE KEYS */;
INSERT INTO `panel_admins` VALUES (1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `panel_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',8,'user','e7b8bc9303e670a8196117ab95984561389beffef26e91e638a4885ba622d1a2','[\"*\"]',NULL,'2022-05-09 20:06:03','2022-05-09 20:06:03'),(2,'App\\Models\\User',8,'user','356a057e580676ff6e333b064c71361dd732ab770da4a88b09b1b3fa9ff96364','[\"*\"]',NULL,'2022-05-09 20:06:03','2022-05-09 20:06:03'),(3,'App\\Models\\User',8,'user','319a3526da36ca35c64b60c394af21a215994146a7d13db88c05d9a22510d155','[\"*\"]',NULL,'2022-05-09 20:17:28','2022-05-09 20:17:28'),(4,'App\\Models\\User',8,'user','7f9ce32c75024de5df5bd5d12e904dd5ee9a5cb3a9ac08ccdcdf8545228eff01','[\"*\"]',NULL,'2022-05-09 20:17:42','2022-05-09 20:17:42'),(5,'App\\Models\\User',8,'user','3f985e6ee8c8d769ea1d3f671fc7a109a47d1bb47bba8220201a669dcac6a094','[\"*\"]',NULL,'2022-05-09 20:17:46','2022-05-09 20:17:46');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latlng` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ishome` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (7,'موقع جميل ','[\"36.37734425922152\",\"43.180131912231445\"]','[\"images\\/D8ekLahTYdYFOJicToWacxsF5L7AuWVKjyvuOVXv.jpg\",\"images\\/MH6rLQuSp2eRTNwfw2BizqvneJ3TAxjTxvM6Qzpm.jpg\"]','2021-09-05 09:05:00','2021-10-21 06:15:27','الموصل','399م','4','1','2',0),(8,'بناء 2021','[\"36.37734425922152\",\"43.180131912231445\"]','[\"images\\/YnovCinyx1nym1weV1jLve6ovNIxCpFt09b4xtYQ.jpg\",\"images\\/mLkTYyKMmixbQLfZIRRtO5cynnSW4PcMnsiZDDEi.jpg\"]','2021-09-05 09:26:14','2021-10-13 09:30:07','حي الوحدةd','299م','2','3','2',1),(9,'بيت جميل','[\"36.37666666441423\",\"43.1919129694031\"]','[\"images\\/EAhy2KbL3vZ1yK3WvZJKuZ6aNK1FUGNyT4KuW6ST.jpg\",\"images\\/ZS4ydvhnzckQRV3jVwvaLA5QD184gTXmi4FvmpOn.jpg\",\"images\\/6kTCjzy8DTcATAA7mG0yHMW6E28QyzrXQgpJLgtS.jpg\",\"images\\/VWktEj84q1RSFBnk0B2WJGwtJqTIHxVfHVfF6yIR.jpg\"]','2021-10-14 08:51:26','2021-10-21 06:23:26',NULL,'300م','4','3','4',1),(10,'موقع جميل ','[\"36.37734425922152\",\"43.180131912231445\"]','[\"images\\/D8ekLahTYdYFOJicToWacxsF5L7AuWVKjyvuOVXv.jpg\",\"images\\/MH6rLQuSp2eRTNwfw2BizqvneJ3TAxjTxvM6Qzpm.jpg\"]','2021-09-05 09:05:00','2021-10-13 08:20:37','الموصل','399م','4','1','2',0),(11,'بناء 2021','[\"36.37734425922152\",\"43.180131912231445\"]','[\"images\\/YnovCinyx1nym1weV1jLve6ovNIxCpFt09b4xtYQ.jpg\",\"images\\/mLkTYyKMmixbQLfZIRRtO5cynnSW4PcMnsiZDDEi.jpg\"]','2021-09-05 09:26:14','2021-10-13 09:30:07','حي الوحدةd','299م','2','3','2',0),(12,'بيت جميل','[\"36.37666666441423\",\"43.1919129694031\"]','[\"images\\/EAhy2KbL3vZ1yK3WvZJKuZ6aNK1FUGNyT4KuW6ST.jpg\",\"images\\/ZS4ydvhnzckQRV3jVwvaLA5QD184gTXmi4FvmpOn.jpg\",\"images\\/6kTCjzy8DTcATAA7mG0yHMW6E28QyzrXQgpJLgtS.jpg\",\"images\\/VWktEj84q1RSFBnk0B2WJGwtJqTIHxVfHVfF6yIR.jpg\"]','2021-10-14 08:51:26','2021-10-21 06:13:12',NULL,'300م','4','3','4',1),(14,'sds','[\"36.336957\",\"43.136450\"]','[\"images\\/KLJffA5RxaVOsptHQgJXTPDzJpCgMRbtIK67YWRl.jpg\",\"images\\/XZ4n0Q6jWenIQ57cCcm45vw2JRqYNAgf6iXR6FtK.jpg\",\"images\\/oVIwSod7sgr0tv3Dm8a2kUAutXebrXWmnyPp8M25.jpg\"]','2022-05-29 21:43:01','2022-05-29 21:43:01','fd','fd','fd','fd','1',1),(15,'fg','[\"36.343824338723714\",\"43.16089614266493\"]','[\"images\\/SPvZmtGTA6a0QKg64YMLCKfBwq9tFbVVdZ8Ns7bz.jpg\",\"images\\/tAT0PWiZDKhvlvZra2Yd4FBn3ApIUiFx4Qd0X7Q4.jpg\"]','2022-05-29 21:44:03','2022-05-29 21:44:03','gfd','fgd','gfd','fgd','1',0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectperctanges`
--

DROP TABLE IF EXISTS `projectperctanges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projectperctanges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `amount` double(24,8) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectperctanges`
--

LOCK TABLES `projectperctanges` WRITE;
/*!40000 ALTER TABLE `projectperctanges` DISABLE KEYS */;
INSERT INTO `projectperctanges` VALUES (5,7,80000.00000000,'نسبة من  المقبوض  : 1,000,000','2022-05-09',1,'2022-05-09 12:39:14','2022-05-09 12:39:14'),(6,13,800000.00000000,'نسبة من  المقبوض  : 10,000,000','2022-05-09',1,'2022-05-16 11:26:17','2022-05-16 11:26:17'),(7,13,800000.00000000,'نسبة سلفة صافية ','2022-04-16',1,'2022-05-16 11:34:52','2022-05-16 11:34:52'),(8,11,80000.00000000,'نسبة من  المقبوض  : 1,000,000','2022-05-25',1,'2022-05-25 09:54:35','2022-05-25 09:54:35'),(9,14,800000.00000000,'نسبة من  المقبوض  : 10,000,000','2022-05-25',1,'2022-05-25 10:45:42','2022-05-25 10:45:42');
/*!40000 ALTER TABLE `projectperctanges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space_build` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_perctange` int(10) unsigned DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_customer_id_foreign` (`customer_id`),
  CONSTRAINT `projects_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'دار سكني','الفلاح','300',NULL,'2','2022-08-22',7,NULL,14,'2022-08-21 13:01:11','2022-08-30 20:13:35');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slideshows`
--

DROP TABLE IF EXISTS `slideshows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slideshows`
--

LOCK TABLES `slideshows` WRITE;
/*!40000 ALTER TABLE `slideshows` DISABLE KEYS */;
/*!40000 ALTER TABLE `slideshows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_superuser` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ashraf','empire@app',1,NULL,'$2y$10$T5zGfGWTwAJGgk51zoGaJecM.TmWkUhxtc/lOo6pALr3.APVpx/O2',NULL,NULL,NULL,0,'Bzl1a0oc0C3hg8BnUxyBTTkrU8mfrVmLtIFEwvKlXVeNAItmd6GAwyfZUfRy','2022-01-17 20:07:49','2022-01-17 20:07:49'),(12,'التعليم جديد / اياد ','ayad@app',1,NULL,'$2y$10$N8C8iF5whAqllgZ19hIKmOL0ZuR/Lvtlqrw.bxly4O1BByJ1mEYRG',NULL,'التعليم','customer',1,NULL,'2022-05-28 10:34:41','2022-05-28 10:34:41'),(13,'المالية جديد/حسن','hasan@app',1,NULL,'$2y$10$0RrGa1NL094m6PocjSmn/uRR7tjcLXL9V/k7hFgHFkF6pS5r8Z.t2',NULL,'المالية','customer',1,NULL,'2022-05-30 07:52:11','2022-05-30 07:52:11'),(14,'ابو اشرف ','abo ashraf @app',1,NULL,'$2y$10$2ZKIHKQcW27asJrchkxFtuxc2UddLTVaeLQQAgnBZQndJTDwcKSLy',NULL,'المحاربين','customer',1,NULL,'2022-05-31 07:47:59','2022-05-31 07:47:59'),(15,'مخزن الفيصلية ','a@app',1,NULL,'$2y$10$OD9BVp2odEZ8L2OGvZUtBeugNMelF3.y0W9SdfGJuUaIALCxbT5Ge',NULL,'الفيصلية ','customer',1,NULL,'2022-06-02 06:16:32','2022-08-21 10:19:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-31  3:08:43
