-- MySQL dump 10.16  Distrib 10.1.31-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: laravel-library
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理用ID',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '本の名前',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '貸し出し状況\n0:在庫有\n1:貸出中',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'PHP初歩 ポケットリファレンス',1),(2,'イラストでよくわかるPHP はじめてのW',1),(3,'最初のキホンがやさしくわかる 絵で学ぶPHP',0),(4,'PHPの絵本',0),(5,'いきなりはじめるPHP~ワクワク・ドキドキ',0),(6,'PHP入門',0),(7,'PHP 初級',0),(8,'PHP 中級版',0),(10,'PHP 初級kkkkkkkkkkkkkkkkkkkkkkk',0),(11,'PHP 初級 やさしいオブジェクト指向開発の進め　初級編',0),(12,'PHP 初級 やさしいオブジェクト指向開発の進め　初級編　入門から発展まで　初版',0),(13,'PHP 初級kkkkkkkkkkkkkk',1),(14,'PHP 初級ｌｌｆｇｈｔ',0);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rent_logs`
--

DROP TABLE IF EXISTS `rent_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rent_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL COMMENT '本のID',
  `borrow_date` date DEFAULT NULL COMMENT '貸出日',
  `return_date` date DEFAULT NULL COMMENT '返却日',
  `rent_user_id` int(11) NOT NULL COMMENT '借りているユーザーのID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rent_logs`
--

LOCK TABLES `rent_logs` WRITE;
/*!40000 ALTER TABLE `rent_logs` DISABLE KEYS */;
INSERT INTO `rent_logs` VALUES (1,2,'2010-01-01','2018-10-30',1),(2,6,'2010-01-01','2018-10-29',2),(3,3,'2018-10-29','2018-10-30',1),(4,3,'2018-10-29','2018-10-30',1),(5,1,'2018-10-20','2018-10-30',1),(6,1,'2018-10-22','2018-10-30',1),(7,1,'2018-10-23','2018-10-30',1),(8,1,'2018-10-25','2018-10-30',1),(9,2,'2018-10-29','2018-10-30',1),(10,12,'2018-10-29','2018-10-29',1),(11,1,'2018-10-29','2018-10-30',1),(12,2,'2018-10-29','2018-10-30',1),(13,3,'2018-10-29','2018-10-30',1),(14,4,'2018-10-29','2018-10-29',2),(15,5,'2018-10-29','2018-10-29',2),(16,7,'2018-10-29','2018-10-29',2),(17,8,'2018-10-29','2018-10-29',2),(18,12,'2018-10-29','2018-10-29',2),(19,4,'2018-10-29','2018-10-29',2),(20,4,'2018-10-29','2018-10-29',1),(21,1,'2018-10-29','2018-10-30',1),(22,2,'2018-10-29','2018-10-30',1),(23,14,'2018-10-29','2018-10-30',1),(24,14,'2018-10-29','2018-10-30',1),(25,14,'2018-10-29','2018-10-30',1),(26,13,'2018-10-29',NULL,2),(28,3,'2018-10-30','2018-10-30',1),(29,1,'2018-10-30','2018-10-30',1),(30,1,'2018-10-30',NULL,1),(31,2,'2018-10-30',NULL,1);
/*!40000 ALTER TABLE `rent_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin01','administrator@b-engineer.jp',NULL,'$2y$10$RCTp4r8jW4qAk8ULu6nm3OfIVjN21frctiuQilwdDXOJaTjrY08U2','DK9f35478XZgxUhagx5mBFQSAz87eOqiOb6QdoUdWbwOeDNuKgmmYyGe5cge','2018-10-20 18:25:49','2018-10-20 18:25:49'),(2,'admin02','administrator@b-engineer.com',NULL,'$2y$10$hYUuvDuuVunJI4EKnlMiVuQRI3KEuoQ4XojBn4QuGpih3PClHxmxS','NUZXDs4fLZlUaIgJK0CFCQcs4lyebLJpLz6VPtwZAPDzj7E6wtytkpoWYBFv','2018-10-20 18:29:00','2018-10-20 18:29:00'),(3,'adminTest1','test01@b-engineer.jp',NULL,'$2y$10$uFsOglzDzegHPNRQOmYUluG0bJHjpittg8yQdNcExmk1Kfm0Phf6i',NULL,NULL,NULL),(4,'administrator','administrator@administrator.jp',NULL,'$2y$10$6/qWMczOf1ofhwJG40iHT.6VtbFBJBwuHZ1PDGnxKlPEMnEh1sYHu','WOezq3PotQRoRJeINCsmra5cUP3e2GWP0Uew8ZoOBX4zKPNWo2bpZAvLAxOb',NULL,NULL);
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

-- Dump completed on 2018-10-30 21:48:02
