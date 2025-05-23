-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: laravelauth
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Technology','2025-04-17 09:01:09','2025-04-17 09:01:09'),(2,'Health','2025-04-17 09:01:09','2025-04-17 09:01:09'),(3,'Travel','2025-04-17 09:01:09','2025-04-17 09:01:09'),(4,'Food','2025-04-17 09:01:10','2025-04-17 09:01:10'),(5,'Lifestyle','2025-04-17 09:01:10','2025-04-17 09:01:10'),(6,'Education','2025-04-17 09:01:10','2025-04-17 09:01:10'),(7,'Finance','2025-04-17 09:01:10','2025-04-17 09:01:10'),(8,'Entertainment','2025-04-17 09:01:10','2025-04-17 09:01:10'),(9,'Sports','2025-04-17 09:01:10','2025-04-17 09:01:10'),(10,'Fashion','2025-04-17 09:01:10','2025-04-17 09:01:10');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (8,'0001_01_01_000000_create_users_table',1),(9,'0001_01_01_000001_create_cache_table',1),(10,'0001_01_01_000002_create_jobs_table',1),(11,'2025_04_17_134555_create_categories_table',1),(12,'2025_04_17_140358_create_posts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `likes` int NOT NULL DEFAULT '0',
  `comments_count` int NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'pJwBmJQlcR','HQkdV4hebBg7zbdR1cK4','cJbqeEVUEvckqtoaj3awE9GjYvxA6z8eFBgPnaCA8SNsRIuqwlhSRsVP6l4q8nvdIad9dHyRknyS2GeEMHjUyqlZDygAz3OWkmV9','hQsuh2eaoeYUgG2PyDhL','4NDN4bCAnB','https://picsum.photos/400/150',1,8,94,21,1,'2025-04-17 14:34:16','2025-04-17 09:04:16','2025-04-17 09:04:16'),(2,1,'VbTGopyoXq','mDp15LS0d9QvH83vT96p','p7mab4K997dEbyOT7511CKxYJJ8y8vrgFlbeAYwOURCxYfxSFsXb5DlLHf5Jijsx6FCo7b6iaX3qqAD7gLLK3npEuUgkzvDNhRMb','33WbAa8Ea4FwkFRTbvec','57Ze66rhVa','https://picsum.photos/400/150',2,57,67,27,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-18 09:32:12'),(3,1,'0iWmeDfm5q','OYCp35uTkeyd5s7LfTxB','bomoZVcg5qY2H8NMJCGDDVXbK2FBpTUWGa9Kt1AWOIzp4RjVDi4rsZfXdtZLSWfR8la9palteRVnHrpOhKS8k9BGLC4g0LpEjmJP','Xrpo1SO805DAP5JqSbJ6','X71xEAJWhI','https://picsum.photos/400/150',5,55,47,23,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-18 09:24:46'),(4,1,'21C8ArAGdM','4yS6GH7iwO8v32SrOjZL','RZidohHpg5c2zNPjQbYKQxkrjoIJHPVJtZVRvpgyHlCupEZ6x8du54y0jlqj3flCwuCdImfFCNVJtS767LZh8kXRZCgBLv6DIP7s','qBSBffOCoNBhuAfpg8X8','P7D6V8tzb7','https://picsum.photos/400/150',2,106,25,39,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:39:32'),(5,1,'LNuzozEEkw','ZPI3Mm4UfSRcyrJF16FK','SqLTu861ak1jc46uMDAEF6HQbvqeoFU3sWgj0EOVcE2em4uekWbCiC9IiJObyjl8sxPOFi4ZS5NaprzvEuEtz12V1p8yu4cMf9WB','fwbDr0dYIW0CYQyXKGue','gtZ4RKmq22','https://picsum.photos/400/150',1,18,49,56,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(6,1,'q7ULqhmlQH','SDcllE93Jqj9QUAFwlJ7','SF7Q6YnF4x4jmZE6Ynv7uxGYRU3e4vGRKHnElTUUGbbR6Nx3CaceaSjaj6hnVtqcDywMifhToPFk6bCxCpOD76p1wHFazXiEpRp9','VqZvp5Ck6l32NZd7xkck','45mryCZluq','https://picsum.photos/400/150',8,100,65,71,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:44:23'),(7,1,'v0tqK1R4yZ','LLCRG6xuEmegppeWDd0L','Jrm1LpViPo37Z1bkSl4FLViSolf3myPOoQ3KFBGVJPyxaY41L5KCUSaVfbEpY7AKNjZorAUTlEKX7HWeEb511lTWX0svqk3iD7aW','zF7RYyI3FPMPLUCYSJxv','3P5btj1VBh','https://picsum.photos/400/150',8,83,41,81,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(8,1,'taonC40h1f','ofv2Lwu1A1xe4XOHtmXJ','ggFtimWIsveOvVP9geZHcqBLSw8H3O1FSu4o3uEVx8V1xG0ZSdgAXUD2MaFjhVPUmYexDXutskdqzcWE2Ab2WTzT319AR6e87Nz7','UmLiNwGM64EHj38fQ6YM','DEWBbKHCQV','https://picsum.photos/400/150',6,41,65,33,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(9,1,'rhv4LmVSHw','xzdWys9JV7hNTgdKdX8L','6YHwMDOCUKkaWjPpA3aoeM4p5iNRoTa2gEDSTxa5bcgpl0AWbA8FYqm3peSXFPsfz3IclVHwXf1k3qzqFTkquasJ3AGKxjCE91LM','CuqxTEgzEuadXffpg3aD','l34taNL7gV','https://picsum.photos/400/150',3,48,17,20,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-18 09:45:01'),(10,1,'LAItgEs8zs','bunMNzi3BVM3kRyJl7Gs','xYBpgwlmAUR9h3Bx8DHRV5JRo5btbrAe1lZCe2CBMgqJpkSLvyjOPqiyrK5cOP7qiBlmhuwcCWqIzoG09dX4TkzPgtoQPBYgVQdi','Xz58qWF3Td6Ghc7RwcoG','TqC2ukqNan','https://picsum.photos/400/150',3,30,35,68,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(11,1,'tFbqIb2IxI','zleWhf3o4ovxTOqlqNKP','1PLaAy0GVpnApEp1LUhwKm0MVssp9jsj0J95t8zVPrTpVMeHvoTaT5gEAdvVnfOMCVpP2mRJHEKGjJ5RYxf8utJhAMDC2K21Ogy2','KYKkYpiaRCr0WzdWsYD7','HOAWhtfp3K','https://picsum.photos/400/150',4,92,76,22,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(12,1,'5SEg4HD7PP','0g8G7essJv5vrZcHAh8l','9301VWC0rqnqB5r3Ak1wy3S9hs8VbYNgQdhIYnOt5WX3VCKkB7vNYJ5aVaruGnSkfRDpW47ausdiAGqyJUiuKwsVlidJC5ypLHe0','PYHfSD2vdco6BFYfyw2r','R0ucsBMeeT','https://picsum.photos/400/150',5,27,40,5,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(13,1,'IzXbjRTwXu','5I5fMqwyTeXP26cjjqds','7sGCYZh8RQ5YZdzO2BJVJe73dVZq6qcwJhRJnFiSJLu95eQLhKdk4wcE5bNnUCq7DHNFiI4tp469aseTBwl4hAxXEJrrNfZTaKdQ','R4OAGBGF5Lxtq8Q5jkN5','MZmK8bS7bx','https://picsum.photos/400/150',7,98,53,72,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:06:11'),(14,1,'R164EbYQc4','l3edQYKjJvVpaKsZ1exb','qJ8vKq1PfTTttI6SsDUOloDXmZRWzhBLi3Rbzh9TvlYVwM25MIkKXiSTPhyc0bcDP8zbeobG3y4f9P4UgHvbLrlgDOvaZntsjnWY','Uhq63I5dDckDWzGYzWOW','VhUH9E56LO','https://picsum.photos/400/150',9,42,54,92,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 22:36:32'),(15,1,'red5qKUsPJ','xOIe6uxHJO5CNOAYsfkb','SeDe394SctRCmqic9WEhfAR9wWHzqRVcbB5cBOaMrrpmFn8pYujnjST1FfBVch7gyXd3BYoh7ZpN1ypa9tPLtRUjAbxGHfdF9J4J','VCYT5VukvxBtFAYtkcur','oqMQZ5nNAr','https://picsum.photos/400/150',5,33,85,82,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(16,1,'oWCbedZWro','LKWC9WqOvLoOSjyOnGNx','hI6tVuRXk5jvFFC67jq0otLtD6aANSI7Fw7WkeoIMVHDtfzJ5Qe0Vt4RWwkOhSQysx8hpDUOQRR9I3vC02dtnixoZEzf1QgSyxyB','t2unNqiNdCC2LIjMZWAi','wtthgCdnJk','https://picsum.photos/400/150',9,69,1,40,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 22:56:47'),(17,1,'1WuyRla2Hg','CnZzpnNg4Bs8jjuOSaLE','yokHY2NRRRBpPRLaKH5f2mwD7f4v4w2fsxY1svH9abSj1sZbQEKKG6tLaNNvF8zTL4K4VGS8mVoLA2W1TJoec8PzcOhoV8hkPGmJ','9qt0L05PMO2g9kNKN4oK','hDIKGxLf3F','https://picsum.photos/400/150',2,53,30,49,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(18,1,'5V9ucOeSkx','Ndak54DfN84hugh98env','eaVYgcgGjKWnVCep2h6EXkmujZIDWAPFvREUt1m1NOO3gZMFoljZUrsNfvfWRMU1VAr8IFZnBczWI88fmREa4eOjNwOCMoHxSqL1','WgvJare69Kx6HFe05GX3','WZDqBLCgPE','https://picsum.photos/400/150',6,48,8,96,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(19,1,'dEL1yKD492','feGSv6eK2JX7nNeDOqzf','nYzggIaDqxBfRzvmrgtEYTJ5UaUr0DMDGm0Zx0c4bZLcQRRXoLmHgmxrbuMmOi3ap9RWgVFzprSiUEUkpoYyPnpNVqBOH9GBBhwE','wp20dMOgpqkZXBDIS9f8','1lvEfs3E3M','https://picsum.photos/400/150',10,75,100,78,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(20,1,'t5GUftHUzs','eKySCUCiL8Gvm2l8EEzT','DWhunfIhMJbSh5rSIEAgSBYf0KWz7owDXE3uXQhfsarTnfWh2ZkX6XkmfcWot81lxiAXT0bedJ82I4mNxAPYI7Z5DFYkEUBoRgvT','9vdnEiaOF6DIWDoIjuWK','z5qK2BXfhl','https://picsum.photos/400/150',7,64,6,68,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:06:00'),(21,1,'5H0bkqn3Ko','HDOSv2EsJuz5keqUQqxg','cJkdOsm0erABWoV8DEnxtzA0iHBJ4yxG9USoosoiixFBR5LCyeoV5rm3vYyctKGj3mFVYWG2ftGAozaiLFUdHu0W2vy4CKeeOrda','EJPQiZPcOIkmGxAUbGdK','VhN8JXB1jR','https://picsum.photos/400/150',9,57,37,63,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(22,1,'SauQCZINdV','626Y5HK7ntl0NkFcgEPI','6vAoYW0u9htPF0HSxcXvvvOvRTarhpZIYzthBQq7Oc8iaq7LhfuO4GRJPKl4r3BXcEZg6UhUKBu8tePkAWluKceEkspk743POIFw','KTQI2VkhPlAd15hAjikq','t7rPCTCKNP','https://picsum.photos/400/150',9,2,63,25,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(23,1,'IaFQ7DMoMi','CMNaM3ZqyOiyGpFT5v8q','R6k5wlfx5CJ8jrp8NWWtEPd3dhN7VQx46yCoBv5fbBK9yk93R5Ds8aohQ2yAgQyUL0HGeX8v57vY2V9v39RLzXmVkFmHSGYFSODH','Cpbh2dNOATHU8Ifd173z','XirnSwlX9w','https://picsum.photos/400/150',1,14,32,95,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(24,1,'qU91itjQWF','uJFu4v8z0ECcixYaIc2p','vymqpZHy8KoJ7nrnFTCLUqWeAlLvwBFIcSq9hISeKTwbbsIA5wlZci23Z4IqOGn24qbT9aHEZhJOJNVGTjhuwAEFvBEhUfvPZTAG','f2x70UKqHURgS2qk0lKx','aj9DyJtnIX','https://picsum.photos/400/150',1,0,5,18,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(25,1,'t96V83V37Q','VIc41yEKN7RPW6MZyXzN','auMRo1xCZ68UQv14Gy87FKYt3EVA6s509VV8aW0fiumYCmkepJDnraSiG99GqyPGybCPCpwsU93H1ppd2yXvz2tHeWovpIPmZIr2','Vy92Hdx10dvYFtzDvtXt','PoCGfZoMHx','https://picsum.photos/400/150',2,9,95,98,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(26,1,'FJcGcgG7NE','fgwwhStfWEXxKZ4HbCUn','6c3mNA80eiY8ikVEWiPcQSLqcu3DuWfH2qDonZBXRpXIJmJVN4xN6CsXLtTOI0lqCCRkdx9Dg7HR7mbdlWFCQXfy58VzUlQIRfDB','YPEwp0tGeRFqIsJfZz7W','aEfxxWSBm0','https://picsum.photos/400/150',10,86,6,55,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(27,1,'Bt0UpUuy71','72rpR09gD2UNwYvXMX9Q','wdFz3DJTSENdH6g31Ip3rRXvhvKfbXil8OZ258EDNG3y1t0PIMPrpfy8m7SeVDowPyvWZZdL0fhzRFiyh2ti7r9QMgvLtdclMsjh','Q3uBWu2J1xriYLNsTrsr','yFBZ8w8D18','https://picsum.photos/400/150',4,77,34,11,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(28,1,'bfOYOpiPdY','BKITAaXbCAxhy3lItPHB','rjpaVMfx0DqGLv25odync1f31uMmX1eQUrcpeVarVnUN70V1Ey229bhMAhXmYaK4cYZNW9krImojjNsbCyCLYaqLP0YNjllyRytT','qeaas5aLB9UNbSb45R9M','AzhmRooRVI','https://picsum.photos/400/150',1,71,36,37,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(29,1,'F311rKJjCa','t7BnfLG81Uk3cK3K8OUu','CZZwatQG5IjASN86Xm2rB6oxSESQYPekYwZvd3MGO1fM4Uh4oK47HUuUaX6KXYGunxblJimgiuKnYnx7fnHIiC5r8YswxvaiOzPK','CLTN5RGxH0tmc0UkqSk3','BPycQIHpGr','https://picsum.photos/400/150',2,58,66,94,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(30,1,'UyXw5j2wR2','bE9Bp2OJlRSu9WedPfQy','I22UKHExAjkM1UEq420OCGJDhe9LDKLSL5Rye6R8PJffRFSY2VV6RN1v3mF1bpRMEgIRBMxMyDcZXAESa6EFCuicmLRS60Vp6gCA','Kytix5eX7NXbkEfZAcfl','MKFzRKjzPb','https://picsum.photos/400/150',1,1,74,46,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(31,1,'GIpVslCvFq','Nt1ATcTdhS3anh6nXWoQ','ufAlcm8LmxhYTqsHDqapj7JcKp7DP2n7c5FK4vPc4FXbFpSCxeeMbtccmWbx8IDkrk2W0etWYK6cs82AY8g0ygB9vzgrkiz1KJMY','BoEqrFIaDYAOeI32qW0M','n6SOm2yGt6','https://picsum.photos/400/150',2,78,32,76,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:34:49'),(32,1,'bXrjuuIdk1','G41xHa5YS61bAwpsUWWq','cGEg3jNpSUDJ3wilMO5PLHWXwt0CClrCRm3m8y6EXqWjA5fZIY2w6NaxrFgBlEkdjDXCKEuSBCgv0odTCMZjG3nv7LvDq7IFOoTD','i8YdBH5j9Aoyn9KuaEhi','4oTu2ojN3P','https://picsum.photos/400/150',8,82,53,61,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(33,1,'8ckrVTzx2O','NH6lYRfwLlpgkcY4yAhu','f2VDyPQE2pkghFwnyRzpyuPGE6ndvjsbJx5a7fWm2INuA6stMKq8NQA7lGfLVRn0doEaUIy0pV5O6TAvAL0irirR5CSRwdzhfvma','CZFDcwj4fCdlAIfScEGI','4rKv3f52Y8','https://picsum.photos/400/150',2,46,93,55,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(34,1,'fHSNxX7Vr7','OaWnI6Yn2mZCRihYDoCK','TJRMPqnn7mmKLm8VyrsZKyA2xn45fksjubDjVaGWVtC3yyJBSBZcTwD0wc3DEv9wIDSU35U08Gf28AMAqG4xDgaBKCxpJjJCVzUX','tpT1ZBDh3IoJDqPUgpwT','fHS1KTmIx0','https://picsum.photos/400/150',3,45,79,82,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(35,1,'Y4ZTpUW7su','TKrpLaHrvVwYXGm56Mvz','eE59Y2sb2TG3ns3U8Ay9SIJPqgQLQWxUVeWg2HWBywLwMLuK91cbp2DYB5mfqecLnO7dX6pUwnknyahJ2EOFkJkzrqm503UsDMvr','UnkBxt28N0Cx3v67tJX2','nX9kGuy3gu','https://picsum.photos/400/150',10,39,44,71,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(36,1,'kPk91WTYjy','aJxnkhGLBK0Cn2c1O7nQ','8NSwbR12Hiu8vaQW0sSrhiP3QrbS4eBniEB5EdRFAtP7w8xJP9xTRJNEL64j0Gj3rxWbvGpesPGTc6ouZLKuQJBZtYl2r9sVMpVP','FxG0RAioT1yX6FMMk13m','dlmEFZN20x','https://picsum.photos/400/150',7,19,40,11,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(37,1,'dmnVRvelPr','nO0yQwOPp9HCCJR8oY79','j70aREzJv8rT6rjBIaoGgjXZG2L7ztkmWoApHjYC4YFnclObQfA8vZsXsaAayynp36mGXNai8fysTXFCLUpkKUchvKRONzMpXArt','TDvXVF9P2S8M88abrUp0','6TBfoBx49t','https://picsum.photos/400/150',8,72,4,8,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(38,1,'qkeAuosp4j','lDUcmSg3oOk1nB63SBoM','0NyHRalGDb9zDFDWYVIAW2NWu5LmYgtQFOnyFll1Pbutqs7MQYbDEZHjzn1c0KJG9KMAVFc81QmgP6iBsQ4K5FkSQFVElR56QTbV','1EFKY8FGLpUQRH3o3um7','UiohCFHFmo','https://picsum.photos/400/150',10,15,12,75,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(39,1,'OzMDjR8aqe','ynFqhs0U6JfLl8HgStVr','u2uojx3im76UZwBpg8zmPPTaTPbcZMW9oHBIUbcrIWiG836Y4LdIS0EVgd1VSzyBu8EK1sZaRS8IaG4TWqnBHouWGe0ok2MnGVhD','8b77agK37jS4M38KTuV4','qDg9mXkDPf','https://picsum.photos/400/150',2,70,71,10,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:39:59'),(40,1,'tytXsg93qt','3llGxZVYs1Ut2Yp8zg3K','0T0uWoiRnWT57RsH7iPawjDoijGQqkebOY26QtHcKfB3Mhjomf34VNagQtGeYoTdUxFeCdMJ3rtNRWU1xXxzqyOCGgntKhJej8AD','an69ny1eNkLD3M63T1kB','odrY7ItmFs','https://picsum.photos/400/150',6,47,30,85,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(41,1,'9HEe5ZmR5a','LiCISnEXzv5WiYrRnKo3','OEjKUq1xhTfBWOZKvKUsMvGaHfkMctBPczuKfM3Qt5ruNxnKCDUXUrVxYHRQSTH3UHq1P1rQvvKEyZqvacd9ZCNU8ltPZ49RXL4U','tgsMr3D1kCdcnUxQ4qIo','a6iAHAiLCe','https://picsum.photos/400/150',1,29,99,0,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(42,1,'kiXC604ukb','A4L5AV0hUdwzQ9wP2PaS','1CzGwfNKJJNK2jMY8OlInu2XO81SRELsKfvchm68lAeUSMuB1wkq0P5ti1TEKzzPRl8MmRktEen8CRN8yuPD37FGzE9tYdW7S4oY','SkfgH6ochy91uiBaOAxQ','9RwqyyKDF3','https://picsum.photos/400/150',6,44,65,32,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(43,1,'ZUlCAiBXTy','3Y8EGA3EALDhvEMOBWpl','bma7Vrpnv0nTdIDgeiLbiz03irwRstrJCgXDhQ1nw8B0DEO6ZMydg6BwzmpnUFLf9xwZwpysqllSvpDGfGkrFfX3ZRlMUKQfsFdg','gOX6D6p9nQnzKzJF63vZ','KWEiD02b38','https://picsum.photos/400/150',3,94,29,16,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(44,1,'UFrRsfpfYN','iuxvu1lwy8im5jmzadjs','JmTWnVm1huTTVsm7e5b8EY19Eg9fIwtHAU88YdaP5CNMCqX8WHOXPqA81YjeMaMHnFXMEgBWuvnwxCHVZPzNVwXWHu1Lksu2oV6H','s5AlosA1Vfk3I0F8ntb0','SZ7MEzVDFX','https://picsum.photos/400/150',5,7,92,8,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(45,1,'5dxdhRIHy8','bzEVFOnQHuGhc225YS10','xk1jzcMDsdQWYCbHjiHwGRqvtctR8cF5rrsUIFZ4ZtiTxsAIsMQeI3MUX7WQa85ekcUo3PCtRr72MkKmBxn1DdmbqiyJCgl0uLAg','VrrjV960zAR3nLe5apEZ','8VLPqsdzvw','https://picsum.photos/400/150',7,93,10,73,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:06:18'),(46,1,'6ueFdxc7hZ','Ud48AX3yFLtKrJX0l93l','6BGimZzFHz32oa1WKJst6fdQZ0I4I08fNWK0LbjQ3uHYrsxPLoy28Hx10dE7VsNpd50uyiBJ6mq7A2JdCA0DyA18ddUeZYYvN7HC','uIeqaIvwj2XgBG8vcCxF','1HK2tuuODU','https://picsum.photos/400/150',3,16,57,63,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(47,1,'at2B11fH2u','iyQ8lzlY8SxYF3geh38s','mSNfTTlRD3pWD6LGxcadin8bHqfeR9s1YrdfBf29yJbgyzwLhDOVXe72nW680du4StzgVScl1h7YTEjxZlq62tbqOfzc1GTSldv0','wsjyuWcND6ElvVmSYbKq','qLIucYsxGT','https://picsum.photos/400/150',2,28,6,22,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(48,1,'28D314i2dd','SYvfQ3db1wxWLd28sl8j','9gfUazhuQfoIs1CfPQKm8qZoPvqzfR2acY577wD0aeQXB6GvL54iw7QQHUSS1UFPAsdvijkyfvObvppxHU6w8kSUixnyIP5zLhoK','k67J4y3nqDzMNb9MCQJa','yzquFotgTf','https://picsum.photos/400/150',2,72,50,47,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(49,1,'wXIgirf4Ym','jirJMa6iegRZz90UHHjC','01LgMgvFNAC6FpEAFKc7thMYvhrUUpt6NYhnuvxhkLk7AeRQuABmFglYzPfDAr94eyUUkHILPs9VZoKSuWOV2NDTG2T3BdnzB18l','JwkqPLdb3GxwuVCr7RFo','Fk8bWDquxT','https://picsum.photos/400/150',8,76,9,12,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(50,1,'xDcXl4Io9i','xnNlghTCCT4dV1rT0Qc1','UtGkIESv8cO4yxG2gFJkz8OTDRtk6fO9sk1mBpcw3d2EcvPshx8gAULNATQysA7txS7WgHo1HW9NSSH7oFgWJZrVEq7z6Pwx5yBH','ity32NGxN72RQSkSSX4W','n93CT4INkj','https://picsum.photos/400/150',6,86,96,96,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(51,1,'nSb9jNlKyh','tZqO1dr90wy3pANFGgJy','4C197Bim92YNiB27aJuS7Smk37gXV9Tmrs1CMMR4dWftYZRzFOOMTm2dsuKWDWYDyZ7IXs4OAVRwdivXieCUUUfPPXnmeLlUlpQt','SdX5tUrWxLifHiV8aWnq','yvsL1PT2of','https://picsum.photos/400/150',1,29,94,0,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(52,1,'XaYL8IpAso','X98weEB0iGZsDi6d5Aqp','ZfNC4KKgs3N7jqYe7vdCSbAuLnwB1H9Pz6KXyjN3FS2oaLWuw9YY3YVU2N6zhRo3mBz3AFh0zAzexTgnGnDcovyNDb5NLlLbHufy','f8SNXLfemFjYI7DunpHj','ewIaBWxiNG','https://picsum.photos/400/150',3,16,98,29,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(53,1,'kMgpwXmJVh','293E10FCMxBxdVys822G','g0XKWQZ2D71bo0Pqflzh5lL8nX8Yh0nA3XLfnHDkE72F76iuYyB6b7VSisIA8mVz2vyricgkIJ8lLsUTZ9F9G9P9jUhr9cen1CFu','LZ8zUU1ZzeLBKpEzkzDK','MyPVJWlUX8','https://picsum.photos/400/150',7,46,48,93,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 12:14:27'),(54,1,'hG3K7qkWxR','J44DvP5MfGNSgY74dxvl','M5ipv6K7oUg9PTxmywOxyymRf3DDAhiHuMypep6ZJ94BnYtoN84ouOE8Yb9isnLf1OZYYfKM3PKJgVvGpN2pgUn7NydVVI6n1d4b','ZmwQu8P8dyfUs6fS7d8Z','hGrcfDID6u','https://picsum.photos/400/150',9,6,37,49,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(55,1,'bogiToEvpl','n4ykoKpTnYPN8uJkTGTK','S4pczQkuxC5d79y9zLEevdzbQuhRshsRApB187IUgzq4eAuJEMyGFFDuLr6TTNZNcm6K5dNCuX3PIYSCKj7dm3sNbwZFFjBfIwdn','pqzczbe0Y1GKOjgT5GXY','uixMUiMQ3T','https://picsum.photos/400/150',10,43,50,21,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(56,1,'Ycs8QOXdFs','rIi5Rb51JXSwlj4msmro','sIEE507EEGfM4cGNIAhCl70p8ibSu9HNfSpGLgpsWfEdlSJxG5xUYYTwtHXYGYVpKPfYiRJTY13mQMHWYQPuzxqgnfb0Mu1MKsRO','QC46U5C3CZ5i5NIAAUsX','Zze9ybYoAr','https://picsum.photos/400/150',7,26,20,32,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(57,1,'zF0foH1hka','SUwGJqrvCuywsw0nD4yy','TvioISdAeVK9teiUolR3uZTqBjC6dNSGenEEUdD3hVsE7ICAmBpMXMTUBAAOFtEeIDFvyvjikONRMqNEbB2B7Ijckg457ulFCOBm','vq1AoWPdNSloWTkdBRqC','baAOtuoi2t','https://picsum.photos/400/150',3,23,97,4,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(58,1,'th07sEPIUT','XIY851YjLBJ202xRx3h4','hCOo0rKpRwK4p8ClOuYvJxUuNZx6OLLwvn0t1RqfL6zB382uy79hdj5ehotKHol6oM2UeE8riELUluN85FskzYjFyGl1jaGHw938','Qe0wGXgJamzDGO7MeRmJ','BLmhXsJlbk','https://picsum.photos/400/150',1,16,86,45,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(59,1,'uOc2edyp65','W7AuJs5G9Ei24CRsTSNX','PFSLEZjF9JcELqaGfafZr2Voi5V9H9VpSRPDnb10pAbEGYc7PrqhhL5sCaBvLITdRmf1Jj4kedq40UBVGZSRBVgFI7yRi3JTBNza','qHvYeqAEDQ4x81k4EwrG','x3eJPJOiqE','https://picsum.photos/400/150',9,87,6,46,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 22:36:41'),(60,1,'brr6oLMVJv','REPeEH4qUMMqAs8z2wBX','mdkhwbQV6ZjTeni6rrLUxz4RIQzdbQJhBIagLSF6s9L0RgAidZRvnykjIBk9RjZy6pkN9WLFpYLRmrqPaqiTnsqvXZ9XRjCmGMW5','WbbOufeshjuuhSefj64k','2NXYzlBrQp','https://picsum.photos/400/150',1,67,94,10,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(61,1,'BcpSrbioyw','ZuCfM5I2dXhvS1Y4wmS7','RibIrjO8nCuSMDglpy3xcgciS7tG6tcvQuKIuKv5fJidVOnX2WaupCvjUmJMTaiJCggEkzy2RSTtLQfUgmzKzZnYHVAXO0KWhFZc','0DU5AHF0pG1yD10wa4k4','TEmRXokhYh','https://picsum.photos/400/150',5,84,6,72,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(62,1,'Ew9nO6q4eb','hHG64pzp9dXR0A6GXY3M','qGSQxSaaIKFVrT4WkBCkdQokdLqzdjPeJkCY50OKbOPRqsU46Jo5LIZonCnDB1VH6gEm5L6hm22EBqbmYU5rHBYIyAv2cGpRE0vS','kFlM2oalcDjpOB9XzVl2','GfuSP6R3PD','https://picsum.photos/400/150',4,100,37,65,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(63,1,'rFq6YUVoFr','RfhCZc9VTRWPPkgXkVHn','2o9MIj727m7mArXjCP3YDdJYsLoEJGk7o5mHxssetdz3v6rzZPnPbkEXmr8XiFG7t5tEO86B8MtPAro2NtjbR4CgjjJudyU7CvVw','jOiovLJKbE9dH3tJG4MC','ao6IyPlToy','https://picsum.photos/400/150',10,21,99,73,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(64,1,'gYtamhEBhO','zQTGTsnsIF4VLvQxGG5E','l8nOON4tNladMwsXVa7KcIphSWneH6CStXlewI9I7AnvYWtGipH2Qp8g8jMDPGYtoQ8NPjea0ZsfZkbmVX5m1xxH0nwpwfhfYIQb','mLVvrAOL4do4xYoIkZuY','ESR4Vu90Q6','https://picsum.photos/400/150',10,52,90,45,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(65,1,'klktF96Tl7','MF5L2RVL5xxWeKjiOH77','BM9hNElqu8ymhi2BvjapuZ35v4BvUrzAhNqEPCorGitVoJC5lGnAZBP6tRI9DkMUWhRWZJuzm6cfvLbLc5ixYyBAiZXBs6OZUGkO','5R5tNpOC9ZtqgUriPiIi','9hGrXvuYWF','https://picsum.photos/400/150',9,23,47,54,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(66,1,'GAkW4xSll2','Lyn5SqU3Xt8JfPsm02PU','H3CRV0IyI5yWFeMHrevsLduXbVPpjoEGx9DxmMv36tMpGN0fL3V6bOD1wc4kGyNkeuNIZ5gXhaMCwbIjBzUy3scOtzPfej6FTU6I','SNtVzE5tuGiJGMn54jGu','lEKWcy6bs6','https://picsum.photos/400/150',2,100,57,10,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-18 09:20:32'),(67,1,'bgSqog10ub','yko3kXRXAtkys7J8IFsz','pNQmoft9Wmjm55w040ug1U9l3WAm4EFnzfO6d70YUBUcO1vdu7QKnqi5Nw2clcIdaIPvqcC4jdJjMJBbb32QRkCbzaeuVvExZI5O','zxwOZ3R8kRR8UaP8pJc9','IETaQVQcQi','https://picsum.photos/400/150',3,77,52,54,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(68,1,'vew52xigfX','72mFdjlqWuaLjk3F2P0z','m4stvIUKi08zHLHeaGBDZWzdBIc8of0WbfG4MOyoVVFVAOt4AVBw7fJGRDOBfXBQFJvHb1O6q52M6R9Pk0vtljL0L7oElwd3FTow','20scDDi7HYBypl4TcQzJ','HBNfl2V2QQ','https://picsum.photos/400/150',1,82,53,47,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(69,1,'2rxYfZfSOR','laxGks1z3pL0ekIJW7He','jAvoh28lYw3NsCjrABUo6SBMe3osRcjlSlsSNOY2Omdv8ClpxBQxtcaJBUFIvDmnGatIUOK61E3d6clGOS3AGysbe7mg0FriGov5','VvoUXEEYj7QpE77CmEkK','9ZRU2kwnmA','https://picsum.photos/400/150',10,2,28,64,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(70,1,'TEzPNWYKWh','b9pkOHHpitDjN7PZNAba','Zc7C3afqdORksWoH2bqilG7pHPfRrfntokM63DfWjtGuLK0TiWMW9lyZfxR9YLCtgtFsa3rH3YIL5tIW3zkm8bZwn242N71JlMQ1','ScgPTtccAF3evh7RYkFh','J5LSlwIciU','https://picsum.photos/400/150',6,10,41,7,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(71,1,'YiptQWjmpQ','h22UujCpmS40exqfozgb','ft9RfU1aZATv9NF6lvkBCscaLFFIx111ceb7G09OhMC25CaY7w5DetmFW70Vymvvcwy8EHWiCrerfPY3O4J7k1FmXp9xKOhe6yMT','my9lPNFmDbfFCrGtvtqs','wueAum0pAM','https://picsum.photos/400/150',4,51,15,71,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(72,1,'MwdNOS9cT2','2QxdvfJ6nGKOnT10puwr','yrRwN5QZlfcs3UVG6moYxFB0AaSVvHimBGwSskCRVcysekdb9kp1PzpVSKo17ZajCdum12lmcHRiErrtZ66XFicAbW7TfOWZBu84','ZJYDq2mdaSUUQld3Zy71','iqhDiI4BrE','https://picsum.photos/400/150',2,32,20,72,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(73,1,'2eWZ02mcel','dpw16exdtC0K2tFf0YC2','rezmLsecuzFwxdIhqFp8m93ZxTidFOR2kQEp5HIMKqZNMxUYjPWEHx24UE2iBSEvSjaEcPFsESQIojhoW7qXhYY8A03BJYPi12Ta','ZhUxz2XGspqMjgEupk1R','ibi41TDmQE','https://picsum.photos/400/150',4,35,84,22,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(74,1,'IkNOczvYRi','EMNAVfaS3KiF8aBoVRct','QHqPB0Cyk9TWY9YUQFqmsnNZi6PHDeBncHgrjv1q3dgnS5HuXnnfbx8f61Zolwehp3LAf2FR5QImHpEMVIyuJNrfkLh1z4ZSRuwJ','8MqIrOaQ67D75ozjLx3O','kopdaAsgAy','https://picsum.photos/400/150',4,2,22,88,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(75,1,'4IE88FoOqs','OzYLSa7mf7lBZXn4hDvY','2lBbaZkmRwFIerDrqs2HWO7S0X1l1qIkEiZ5oVvZYSXDJfB6wVnVcYthT6BARRShF3FuyP3AHU16ytC0QONRxpQzzdT4JvA5k7hs','eCZs9ljsvFG6b3FEvdRc','2MbAAiRt4U','https://picsum.photos/400/150',7,36,45,95,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(76,1,'X5eG0wi6YH','JsjmmYLbLSqpJa4orvXh','TwDXG8G7O01xCtio3O8TQV2KQiVXc2iTIWQPQWzBv7QXmTkiCbaWTpLrxpH8UJfwN2vWVHUYL7jkTbM4cWXZDyivHoMzXDaxPsHn','sNw0dXI5NSOmlXOK1RS2','qOu1CaLibD','https://picsum.photos/400/150',6,81,89,73,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(77,1,'bY0ZmwgdfI','q5afEcAA04x5dc08YGdS','5A7tx1VAA11BR4lB9ZjQKvHG55kBtcqeU0o5wSNysirLSHYl1nPj41U2QDQIplBK7Ww1txlRn667FTl4k6c8AJmA6NyCX0vVAB3Q','W3IgASbCpf9rr3OkbYcL','QjqlMDX2JY','https://picsum.photos/400/150',8,65,50,9,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(78,1,'9DLu71fL6L','Td6v7mrbt8T2hjQYRuJQ','vleC802h6n45rDaVnRSX5MSDQSCSC5DYOQclksClWsf5dAHHY9EKeW7P3v58BfynZDvnKMTxDGkd8v5d0jUWKYdTzXPydLDjxLCx','dfjopoyyqQmmMnJ9Cezh','knLy1FOgCe','https://picsum.photos/400/150',5,65,46,35,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(79,1,'lr3HCvKg42','XkfRUj7Vv1K9A5KsXCHl','R9BHVQ03FoIvWPLgAwcgUoRl0NWmgvs0oQRmc0z8cC36PZX9oQ1TqDu06YnrGrTKLbzMhMZ99EtXJeqGEiV3B7xz4UqsSEz0mLyM','nBF3sc0YFNqkOAQjaNov','fXg3sbaX42','https://picsum.photos/400/150',10,80,49,92,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(80,1,'pwXWAT26Er','42XpoUQHsblkCuPho17h','0M1VCXk8Io2qMCUwqFNw7AavwzN9Fw57lPuUMvzWdZCX5XkxHOfOph3GNSnDosqxOURHpwiwYztuFLAmt3X8K55gmDKmAoE8lYdG','JGO5scBzqlLWMKJ8E2a0','0bZu5BFFsH','https://picsum.photos/400/150',2,93,92,43,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(81,1,'pDA02CUb64','eKwxmBcAkYVfabjqAsWb','yL1LVy67Km4V48QjjcoRjRcPuL6CAfdxHOo6muxbblNw46bG8hgHipqPh4ubIlLDS0sl9zFmeuYwifSywEem1YU1Mm7htKBx1oSQ','rCH65DlB570j791xIVMv','KNmHGZHNrv','https://picsum.photos/400/150',5,81,29,40,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(82,1,'aTJnJvYlLo','KR2z8two3dKzSdZ2iw2e','hz7SxQfV8CaJDEBumxAoDTDpBc2xof7dpZUm7KpMo6YOI9HLaTwXo1AbQPVgZ9q94SFWGO0M1zLBsWTRJSzjcPRSCJHSa2R7xlQz','13LJdZ21H06PHpW99YPT','nheEbbnL9X','https://picsum.photos/400/150',8,8,44,4,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(83,1,'HgLaEZn0JP','NEZZl4JJyehomA353LHT','ZUZEBwfhVRx6NYYx6mLr798czg2VRRtwkO9gj0EWFqofYzZQmTBQVLTiyiBRLVfrTQlblFUcd3E0Fqs6NkpQ0Mf3npJ2v8M3YtkY','HxJMDSr1EznSLdUz1nrf','jiO6EoTf3u','https://picsum.photos/400/150',3,34,10,23,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(84,1,'eCkNjfwr3S','yTmR2x27nuVVi8Bb2kMd','XZncTqWyTJjhEtULen2KgBAMYjzCZiqxJUcRH0k4kZQbI198orRINi0qijtBqo9sxcxCHFwn5QrpCo6fvBn2FJYbyDU9lwxsjPJi','DfH9Btf3NQwihhoyvBn6','GxnBEPtCE2','https://picsum.photos/400/150',5,44,15,86,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(85,1,'iwbWQsjPMY','vOzh6OXULKjqBSWnrYpM','HWh5biNfIS2SeOQRhWGxNaeN7uzp1pEDdXX1Ju6MZ16CGGsP1J1DQjWNGDnlEu2oorX8UcKPShwWozeY40B4tJ7orYAevE2yVUYK','WmrDhnwCQo7Lv1dOMKFu','JALKxNRKe3','https://picsum.photos/400/150',5,2,0,12,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(86,1,'OWp7QIFGQC','Rqht8FjLiAUHcMm5Uaew','RAlKC2TE004jflqjVheC3FPFx9Fjz0kRwwsxT58ruRa9MtMRoaMnLGf76KniCKa5UXUeRfUgA32IeTjKr2h398mQR5FAXNEXf0t4','VozD3YFUTxUbNQnWYsuW','b0iWrdb25o','https://picsum.photos/400/150',5,101,81,80,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-20 02:15:54'),(87,1,'6wvkwl5y1Y','1nUu8TdAdkz4MWJ1ZFxa','rWEPtqYoRklJiPtMa7DoCS1WOR1lwUa3cQxyTzfejeaOoYNdzZFH69lPUOvDWZ4IH8VQJ4QdStKasuxLh19JD8fOoOL3n6PguAR7','zxpwOiFTtACCKDBe6zNS','SVhIV3s5yp','https://picsum.photos/400/150',4,64,89,38,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(88,1,'kD2gmaNJe2','Ii24k2b3mWLNeKoMSLZA','vMGgMXnadW6eMg6dUVjGYJHC5jyGgOCwKwuYvhAvEgY71bM4k3rcs7YyULkU1nGoSSZ3FlsuvQNmnNXoMEJre2iZuPrinW0TMlgJ','QDyNwXwwc7zHyLrhibL7','5tKVvg5sU8','https://picsum.photos/400/150',2,59,13,56,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(89,1,'9SzFrMbsYo','UE0of6T9uXrXaktpvuWB','mpDPvIgTTp9dbUEFEo82fEAIFMugpNU8cxwU6HYXdi1T9NT8v8exadbS4nNkVQHJKXEGco63iRQYBABeQYmF4n24FSlIf5TxJa80','YUZoWDXizVm8cHp0dP58','UgdlQUPGxR','https://picsum.photos/400/150',2,31,87,29,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(90,1,'uVUjGIIQFi','4S4DHRgCa84vqKWPI8uu','4hiq5VhQ6lt4AOqX40sdsYQrM2451Wa59VAHgT5vLhCGrZM9eKPnifBAo3e1F62aa7MN4MCpmkZanmmHxZSzlrHE2MckCxChoacf','yGCbjlppzcwfadKvFEk8','wUo1i9nxs4','https://picsum.photos/400/150',6,66,92,91,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(91,1,'ENdXrOb5Zk','vREvolzchusU7Pp6nRqv','4P4hTMk5tteFLGoaIG9rqczHy9Znn9GUI4zCH2OevA6kBDwzLqBMJ3AAFwhWUuIsuQwbDAnj68FstOxuXt83mkgFm0YC03xuaVkx','GxQi8hAffjNYAEorxsfg','Aktjmdaxiq','https://picsum.photos/400/150',3,57,24,42,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(92,1,'fftUnFhlqu','Zv8aAEuufyLaSVb2TRjk','o5j6iYAPxaW7OHUaHJPulpvP5KWQ52VG0NOotpWs3UHVtdC6Nx2cZZczfnLrDnsRG14LV22RQCnfChabkxd47rvXGd7Aa65gz0FH','2xENcVp896XOvHxLlC2k','duXADywxc4','https://picsum.photos/400/150',6,28,95,57,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(93,1,'rhUQHpOqDW','TdmbvaikRkSzLkX0IEzx','1PJW2FRljHY8CvTXTSpN16mwwKBnuEvRk95O9gAsDWn4kLp5vrgj7ZOBcXJWvIaa6Zq5ijk3jLvsCq6EYlyr13wCEuXiwVFoeR28','CfR6nz5skmiajsQqNMsN','nwiDBGRPQ3','https://picsum.photos/400/150',3,18,62,63,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(94,1,'5bfR0oCgko','JNAE5xwgjCo4KWfG2QGu','ZrukwmjRdHEsSgSSw7zFMx384tHTb7g38YYIHLt0dTKqi367vdfANMl5oubErOhPKTYgDqsbb5oZeQnVDX1fWeLD2NfXM6eJj0KS','AKcBo3Nj6XShdKrUMknm','eb9IFnVFUT','https://picsum.photos/400/150',9,68,43,21,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(95,1,'1lhZ8tbnM3','P7FYSujYsySg8kpToQaH','NA1WR945REANNW3hk4BxFyGaMa2DgsJ2MzwPKT3IeCUDsTi0mmcV16pN91u0kf1si3Hg5FAoSkReXFsmtjjsSr3jFampqdiSGkYj','Bzfy1gS7KlBg6RCnpyhT','9j9ODbBq8Z','https://picsum.photos/400/150',2,50,96,69,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(96,1,'TVFuRzMCQg','r45hXGrVuY77EAYtEZv7','wYv55C3FldagheUCjFZppPiRzYiQdxBeA5RwvL3UWSwwG43aoIsY4hzCDjRyPeonNPwZXVSAhmIMXqqzuX2zPI2465uSkcTnRfLp','x78Ms27U2x7dYfiCsus2','QWBUo8cjF1','https://picsum.photos/400/150',8,34,14,60,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(97,1,'PR6Zkzyd7N','EqE4yv5yG1077b0bRXAQ','axDPJ0JpkwDVqKa14mpbZAccSRA8v2d7UbmFmyk1ve53xRYtdoBGNCU4n0U1zwHm8GvpMfmtmaRVLydWwZ4UhhXva1oVN8XHYKsQ','VfzWNkNrjr525tXnlgLO','RLNXLIA660','https://picsum.photos/400/150',10,32,41,1,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(98,1,'xl5xRD3kSE','XcFGaQm21ulZMGA4fLlR','LoBgQgfnn0Tj8dcvSamTHnW6R14TcVhGQ0PwHaQ5Vmc5fnkfAUhc0TT9IBFrrtQj8r3rmzVdWzxIuSL9a79HQLAbIgfLSCaXxdU4','Ufa1iSE4mNqIAcjC7PVk','fgdp0Rgcqi','https://picsum.photos/400/150',5,41,34,29,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(99,1,'RP6RsObrGr','l7toASEy3ACCVgpXwn2H','w2tBJYC05wrxGdCAmzaX1Xn0d1b9xkcoZVVYeszXKlKzR0fyxY6NHW2eee7e37Xqt3BCR0FuTfGbcNYEJmqqsbRvHfm0YimdJ6rK','HHViNfdONydZjd8LRuuh','wQx3CVtqbs','https://picsum.photos/400/150',6,16,71,57,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17'),(100,1,'BYa3uxSYle','TjuGs7P4haPm0tUY4iyM','hnMfVytdiAWAm8t5TBoCVbvTk5twyEOwhcDGxUg0uvd5WyLPXYMPPR4z6uPpemmskCQU2BNATTpApNp0J2hnU54zG0Dj94FN9K5a','HkIZrAjMklbVbFVcKGKy','4XctYYL3q9','https://picsum.photos/400/150?random=100',7,26,33,99,1,'2025-04-17 14:34:17','2025-04-17 09:04:17','2025-04-17 09:04:17');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('8yLWiKl40gG04VOml3fy7dCVTLPzqytSTPKFaYrv',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNks4cmVBNXp6ZVRwOXlIcHZYTFhDd0xSZmRRWHpyR1YybktLY21TOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3QtcGFzc3dvcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1745134940),('9EMN4OZybmgXKpAcYY4MzEBpwMx7tLJatCe3Nfo1',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnBPSWpYY0MxY3VHY0Zrd214SU9raXNwcVFPdkF2R2Y1Y2hKU3F5diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXRlZ29yeS9UZWNobm9sb2d5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1745135163),('T2HwioOCne2QqdcnogjtzhmtNrH0zTsoyhU1zbu7',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYUowWlRmRUZOUkhFWG5ReEZOcG9aVlJPak1uZ3Y1Q2Rsd2Q5d21pZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1745430671);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2025-04-17 08:41:20','$2y$12$Wovw5wiieokrOd3hu5mSy.IldDc.oxc5DDOqpOaAxN0vdIlK6DaIe','boBftDPtb2','2025-04-17 08:41:20','2025-04-17 08:41:20'),(2,'IRFAN ANSARI','irfan@gmail.com',NULL,'$2y$12$cLXqp5GnXGXyaclJb6CLHulXfgessW2QKktj/CawWMiXQmoFU2Nrq',NULL,'2025-04-17 11:41:15','2025-04-17 11:41:15');
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

-- Dump completed on 2025-04-24  0:00:09
