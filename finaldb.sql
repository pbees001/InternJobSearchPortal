-- MySQL dump 10.13  Distrib 8.0.26, for macos11 (x86_64)
--
-- Host: localhost    Database: internjobportal
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `internjobportal`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `internjobportal` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `internjobportal`;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2016_06_01_000001_create_oauth_auth_codes_table',2),(5,'2016_06_01_000002_create_oauth_access_tokens_table',2),(6,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(7,'2016_06_01_000004_create_oauth_clients_table',2),(8,'2016_06_01_000005_create_oauth_personal_access_clients_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
INSERT INTO `oauth_access_tokens` VALUES ('010ef69f20633c607dba93b95b706283debfb148d114ad109827440a1951f40f1a21432a8a2fc086',2,1,'MyApp','[]',0,'2021-11-27 08:46:04','2021-11-27 08:46:04','2022-11-27 03:46:04'),('295b090871f48a0d068122b0046a30ece36a79a21b4718495eeb02cc64ba9630a1a6f3cbe86cf358',3,1,'MyApp','[]',0,'2021-11-25 13:06:35','2021-11-25 13:06:35','2022-11-25 08:06:35'),('46ff4dcf5a53e7a6d4270016dc57d724b8f7eeec395109408594cdb253c2948b9e5392b9d3ce54a3',2,1,'MyApp','[]',0,'2021-11-25 13:22:08','2021-11-25 13:22:08','2022-11-25 08:22:08'),('5c5a908edb22e5d8eaaf8070f9e6831ce0a32fd9e0f5ae8f806b40b5bab5d35701a72978787afec4',2,1,'MyApp','[]',0,'2021-11-26 23:56:19','2021-11-26 23:56:19','2022-11-26 18:56:19'),('87c76a0d21b4ea85b62961f5cf88a08cba5e6c246f92a7d157d5d2b9f35ec76752054044ff2767db',2,1,'MyApp','[]',0,'2021-11-27 08:35:02','2021-11-27 08:35:02','2022-11-27 03:35:02'),('c95f44c961cbfa8c4bc8baa0f2856fc16ba2c215a9c04e76254d854a4df5e669b17b7dcf43ec709f',2,1,'MyApp','[]',0,'2021-11-25 13:04:46','2021-11-25 13:04:46','2022-11-25 08:04:46');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
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
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','HVEEYLfR1VZANyy912nUZ2mdi1IBowBGvNxbxLAu',NULL,'http://localhost',1,0,0,'2021-11-25 12:47:20','2021-11-25 12:47:20'),(2,NULL,'Laravel Password Grant Client','nfgzqsjTkEFovyMcyFjr2QCfj8aVN73MXEDVr8WJ','users','http://localhost',0,1,0,'2021-11-25 12:47:20','2021-11-25 12:47:20');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
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
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2021-11-25 12:47:20','2021-11-25 12:47:20');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'john','john@example.com',NULL,'$2y$10$YO9W7jAoccg1RhSrjnYOjuPJvFxZvT9j/SU8wWOU7.rHovWQOHYA2',NULL,'2021-11-25 11:29:17','2021-11-25 11:29:17'),(2,'priyatham','priyathamp16@gmail.com','2021-11-25 11:47:51','$2y$10$JuaA1Eh.h61mENIPwUY4xOmADY769oe3Y9vf6RUnIJMf/14DaxCI2',NULL,'2021-11-25 11:40:20','2021-11-25 11:47:51'),(3,'qwer','qwer@example.com',NULL,'$2y$10$lpTcKQcTniFey1Q46uCeV.ab9sb99KTQpY1qCq1J6Z3FQwU3mb2Xu',NULL,'2021-11-25 13:06:35','2021-11-25 13:06:35'),(4,'qwerty','qwerty@example.com',NULL,'$2y$10$e74DHANSDV.hjTAzKHNT9OYIIlgNV77LqFa33/WC1d1zlobsVbEYK',NULL,'2021-11-26 06:30:17','2021-11-26 06:30:17'),(6,'qwert','qwert@example.com',NULL,'$2y$10$gCCQxfSEJiIDybNbxFzjf.vBK9xCaztV5/tdaLzy.TC/RwdMcyOBW',NULL,'2021-11-26 06:47:22','2021-11-26 06:47:22'),(7,'asdf','asdf@example.com',NULL,'$2y$10$gpTMBhBWBv..m4bTx2gSOe.KCHOWneu833geVLoBbtjGXs4lNXb9u',NULL,'2021-11-26 06:51:26','2021-11-26 06:51:26'),(8,'zxcv','zxcv@example.com',NULL,'$2y$10$P3bFBI8rwpM3b4Mve/5zPuEChHNwuLHSy1QcawqoWfJGY10LbvTFa',NULL,'2021-11-26 07:02:24','2021-11-26 07:02:24'),(9,'asdfg','asdfg@example.com',NULL,'$2y$10$azvRUzi0xlXsrez29u0nketSuG7RluQXHFq8gjPWyOIfLrbwoUf9O',NULL,'2021-11-26 07:58:16','2021-11-26 07:58:16'),(10,'asdfgh','asdfgh@gmail.com',NULL,'$2y$10$kOr..kBJxggN9cd/sMjF4uwSwyQsDIIc2qW4ufG8JMIifUKf7XfNy',NULL,'2021-11-26 09:06:21','2021-11-26 09:06:21'),(11,'ramm','ramm@example.com',NULL,'$2y$10$P0ThDhmHwL5T0sVxT6EvC.iV/cimuDlTyBt3dawxNFwhytoB8KL1u',NULL,'2021-12-01 06:26:51','2021-12-01 06:26:51'),(13,'sam','sam@example.com',NULL,'$2y$10$295GJjBKm0N3wamz6KJkeeOlLZ.VBrwsb6vKUAtut7KR3VC/mflhu',NULL,'2021-12-01 06:33:00','2021-12-01 06:33:00'),(14,'Nikki','Nikki@example.com',NULL,'$2y$10$Wmv.ptwIkXpw2bQ9fC6GB.mrh9FsttsgwEaC44gOiCJpsGXjWWfDW','a7Nva4Gp6NQYPwTjp4X7ZfaKzbzhP3nLi7pTaczQB844ecOfoHpYxxJgMHEj','2021-12-02 19:59:20','2021-12-02 19:59:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-11 11:14:01
