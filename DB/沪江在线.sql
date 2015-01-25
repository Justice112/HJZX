CREATE DATABASE  IF NOT EXISTS `hjzx` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `hjzx`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: hjzx
-- ------------------------------------------------------
-- Server version	5.5.34

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
-- Table structure for table `course_infos`
--

DROP TABLE IF EXISTS `course_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(2) DEFAULT NULL,
  `begin_section` int(2) DEFAULT NULL,
  `section_num` int(2) DEFAULT NULL,
  `single` varchar(10) DEFAULT NULL,
  `begin_week` int(2) DEFAULT NULL,
  `end_week` int(2) DEFAULT NULL,
  `room` varchar(20) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_infos`
--

LOCK TABLES `course_infos` WRITE;
/*!40000 ALTER TABLE `course_infos` DISABLE KEYS */;
INSERT INTO `course_infos` VALUES (81,1,1,2,'all',18,19,'一教136',58,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(82,3,1,2,'单周',1,15,'三教219',59,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(83,1,3,2,'all',18,19,'一教136',58,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(84,1,3,2,'all',1,16,'一教246',60,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(85,2,3,3,'all',1,16,'三教116',61,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(86,3,3,3,'all',1,16,'一教332',62,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(87,4,3,3,'all',1,16,'一教344',63,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(88,1,6,2,'all',1,16,'三教219',59,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(89,2,6,2,'all',1,16,'一教201',64,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(90,4,6,2,'all',1,16,'一教217',65,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(91,5,6,2,'all',18,19,'一教136',58,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(92,4,8,2,'all',1,16,'三教114',66,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(93,5,8,2,'all',18,19,'一教136',58,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(94,2,10,3,'all',1,10,'一教305',67,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(95,4,10,3,'all',1,10,'综合楼B区301',68,'2014-07-03 01:34:00','2014-07-03 01:34:00');
/*!40000 ALTER TABLE `course_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_user_ships`
--

DROP TABLE IF EXISTS `course_user_ships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_user_ships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_user_ships`
--

LOCK TABLES `course_user_ships` WRITE;
/*!40000 ALTER TABLE `course_user_ships` DISABLE KEYS */;
INSERT INTO `course_user_ships` VALUES (95,11,58,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(96,11,59,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(97,11,60,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(98,11,61,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(99,11,62,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(100,11,63,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(101,11,64,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(102,11,65,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(103,11,66,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(104,11,67,1,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(105,11,68,1,'2014-07-03 01:34:00','2014-07-03 01:34:00');
/*!40000 ALTER TABLE `course_user_ships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `attibute` int(11) DEFAULT NULL,
  `teacher_name` char(40) DEFAULT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_identify` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (58,'软件协同设计课程设计',1,'曹春萍',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(59,'接口与通讯技术A',1,'张幸',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(60,'嵌入式系统',1,'苏凡军',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(61,'软件工程',1,'张刚',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(62,'软件测试技术与软件质量',1,'赵海燕',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(63,'信号与系统(双语)',1,'许维东',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(64,'人工智能导论',1,'欧广宇',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(65,'软件协同设计',1,'曹春萍',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(66,'计算机图形学基础',1,'高丽萍',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(67,'物流管理',1,'黄小青',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00'),(68,'中国传统文化概论',1,'刘永',NULL,NULL,NULL,'2014-07-03 01:34:00','2014-07-03 01:34:00');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `path` varchar(100) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `folders`
--

DROP TABLE IF EXISTS `folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `parent_folder_id` int(11) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folders`
--

LOCK TABLES `folders` WRITE;
/*!40000 ALTER TABLE `folders` DISABLE KEYS */;
/*!40000 ALTER TABLE `folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_type` varchar(10) NOT NULL,
  `content` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,58,'testtesttest','test2 test2 test2 test2 test2 test2 test2',11,NULL,'2014-07-03 02:44:22','2014-07-03 02:44:22'),(2,58,'testtesttest','test2 test2 test2 test2 test2 test2 test2',11,NULL,'2014-07-03 02:44:22','2014-07-03 02:44:22'),(3,58,'testtesttest','test2 test2 test2 test2 test2 test2 test2',11,NULL,'2014-07-03 02:44:22','2014-07-03 02:44:22'),(4,58,'testtesttest','test2 test2 test2 test2 test2 test2 test2',11,NULL,'2014-07-03 02:44:22','2014-07-03 02:44:22'),(5,58,'testtesttest','test2 test2 test2 test2 test2 test2 test2',11,NULL,'2014-07-03 02:44:22','2014-07-03 02:44:22'),(6,58,'testtesttest','test2 test2 test2 test2 test2 test2 test2',11,NULL,'2014-07-03 02:44:22','2014-07-03 02:44:22'),(9,1,NULL,NULL,11,NULL,'2014-07-03 03:09:59','2014-07-03 03:09:59');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `content` tinytext,
  `floor` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (9,11,1,'123',0,'2014-07-03 03:19:24','2014-07-03 03:19:24'),(10,11,1,'123',1,'2014-07-03 03:19:27','2014-07-03 03:19:27'),(11,11,1,'123',2,'2014-07-03 03:19:49','2014-07-03 03:19:49');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'冯嘉祺','740221788@qq.com','b3d856633430302d1d802966d00a1ab8','学生','2014-07-03 01:33:59','2014-07-03 01:33:59');
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

-- Dump completed on 2014-07-03 12:35:00
