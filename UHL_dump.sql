-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cc
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Table structure for table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_form` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` text NOT NULL,
  `Message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_form`
--

LOCK TABLES `contact_form` WRITE;
/*!40000 ALTER TABLE `contact_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `following`
--

DROP TABLE IF EXISTS `following`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `following` (
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`follower_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `following`
--

LOCK TABLES `following` WRITE;
/*!40000 ALTER TABLE `following` DISABLE KEYS */;
/*!40000 ALTER TABLE `following` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(200) NOT NULL,
  `verify_user` tinyint(1) NOT NULL DEFAULT '0',
  `loggedInCount` int(11) DEFAULT NULL,
  `socketid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'hello','b17033@students.iitmandi.ac.in','hello','Student',0,1,NULL),(2,'akhil','b17033@students.iitmandi.ac.in','w','Mentor',0,2,NULL),(3,'Akhil Rajput','b17033@students.iitmandi.ac.in','Powerboy','Student',0,3,NULL);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentor_image`
--

DROP TABLE IF EXISTS `mentor_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentor_image` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentor_image`
--

LOCK TABLES `mentor_image` WRITE;
/*!40000 ALTER TABLE `mentor_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentor_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentorform`
--

DROP TABLE IF EXISTS `mentorform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mentorform` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `quali` varchar(255) NOT NULL,
  `insti` text NOT NULL,
  `occupation` text NOT NULL,
  `image_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentorform`
--

LOCK TABLES `mentorform` WRITE;
/*!40000 ALTER TABLE `mentorform` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentorform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm`
--

DROP TABLE IF EXISTS `pm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `seen` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm`
--

LOCK TABLES `pm` WRITE;
/*!40000 ALTER TABLE `pm` DISABLE KEYS */;
/*!40000 ALTER TABLE `pm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `private_messages`
--

DROP TABLE IF EXISTS `private_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `private_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `time_sent` datetime NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `opened` enum('0','1') NOT NULL,
  `recipientDelete` enum('0','1') NOT NULL,
  `senderDelete` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `private_messages`
--

LOCK TABLES `private_messages` WRITE;
/*!40000 ALTER TABLE `private_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `private_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `random`
--

DROP TABLE IF EXISTS `random`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `random` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ran_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `random`
--

LOCK TABLES `random` WRITE;
/*!40000 ALTER TABLE `random` DISABLE KEYS */;
/*!40000 ALTER TABLE `random` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_chat_messages`
--

DROP TABLE IF EXISTS `s_chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `message` int(255) NOT NULL,
  `when` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_chat_messages`
--

LOCK TABLES `s_chat_messages` WRITE;
/*!40000 ALTER TABLE `s_chat_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_chat_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu_image`
--

DROP TABLE IF EXISTS `stu_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu_image` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu_image`
--

LOCK TABLES `stu_image` WRITE;
/*!40000 ALTER TABLE `stu_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `stu_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stuform`
--

DROP TABLE IF EXISTS `stuform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuform` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `user_id` int(14) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `class` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuform`
--

LOCK TABLES `stuform` WRITE;
/*!40000 ALTER TABLE `stuform` DISABLE KEYS */;
INSERT INTO `stuform` VALUES (1,3,'Akhil Rajput','Naresh Kumar','b17033@students.iitmandi.ac.in','St. Joseph','Kamand, IIT Mandi',12);
/*!40000 ALTER TABLE `stuform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_list`
--

DROP TABLE IF EXISTS `sub_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_list` (
  `sub_id` int(12) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_list`
--

LOCK TABLES `sub_list` WRITE;
/*!40000 ALTER TABLE `sub_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test1`
--

DROP TABLE IF EXISTS `test1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test1` (
  `id` int(20) NOT NULL,
  `q1` int(4) DEFAULT '0',
  `q2` int(4) DEFAULT '0',
  `q3` int(4) DEFAULT '0',
  `q4` int(4) DEFAULT '0',
  `q5` int(4) DEFAULT '0',
  `q6` int(4) DEFAULT '0',
  `q7` int(4) DEFAULT '0',
  `q8` int(4) DEFAULT '0',
  `q9` int(4) DEFAULT '0',
  `q10` int(4) DEFAULT '0',
  `q11` int(4) DEFAULT '0',
  `q12` int(4) DEFAULT '0',
  `q13` int(4) DEFAULT '0',
  `q14` int(4) DEFAULT '0',
  `q15` int(4) DEFAULT '0',
  `q16` int(4) DEFAULT '0',
  `q17` int(4) DEFAULT '0',
  `q18` int(4) DEFAULT '0',
  `q19` int(4) DEFAULT '0',
  `q20` int(4) DEFAULT '0',
  `q21` int(4) DEFAULT '0',
  `q22` int(4) DEFAULT '0',
  `q23` int(4) DEFAULT '0',
  `q24` int(4) DEFAULT '0',
  `q25` int(4) DEFAULT '0',
  `q26` int(4) DEFAULT '0',
  `q27` int(4) DEFAULT '0',
  `q28` int(4) DEFAULT '0',
  `q29` int(4) DEFAULT '0',
  `q30` int(4) DEFAULT '0',
  `q31` int(4) DEFAULT '0',
  `q32` int(4) DEFAULT '0',
  `q33` int(4) DEFAULT '0',
  `q34` int(4) DEFAULT '0',
  `q35` int(4) DEFAULT '0',
  `q36` int(4) DEFAULT '0',
  `q37` int(4) DEFAULT '0',
  `q38` int(4) DEFAULT '0',
  `q39` int(4) DEFAULT '0',
  `q40` int(4) DEFAULT '0',
  `q41` int(4) DEFAULT '0',
  `q42` int(4) DEFAULT '0',
  `q43` int(4) DEFAULT '0',
  `q44` int(4) DEFAULT '0',
  `q45` int(4) DEFAULT '0',
  `q46` int(4) DEFAULT '0',
  `q47` int(4) DEFAULT '0',
  `q48` int(4) DEFAULT '0',
  `q49` int(4) DEFAULT '0',
  `q50` int(4) DEFAULT '0',
  `q51` int(4) DEFAULT '0',
  `q52` int(4) DEFAULT '0',
  `q53` int(4) DEFAULT '0',
  `q54` int(4) DEFAULT '0',
  `q55` int(4) DEFAULT '0',
  `q56` int(4) DEFAULT '0',
  `q57` int(4) DEFAULT '0',
  `q58` int(4) DEFAULT '0',
  `q59` int(4) DEFAULT '0',
  `q60` int(4) DEFAULT '0',
  `q61` int(4) DEFAULT '0',
  `q62` int(4) DEFAULT '0',
  `q63` int(4) DEFAULT '0',
  `q64` int(4) DEFAULT '0',
  `q65` int(4) DEFAULT '0',
  `q66` int(4) DEFAULT '0',
  `q67` int(4) DEFAULT '0',
  `q68` int(4) DEFAULT '0',
  `q69` int(4) DEFAULT '0',
  `q70` int(4) DEFAULT '0',
  `q71` int(4) DEFAULT '0',
  `q72` int(4) DEFAULT '0',
  `q73` int(4) DEFAULT '0',
  `q74` int(4) DEFAULT '0',
  `q75` int(4) DEFAULT '0',
  `q76` int(4) DEFAULT '0',
  `q77` int(4) DEFAULT '0',
  `q78` int(4) DEFAULT '0',
  `q79` int(4) DEFAULT '0',
  `q80` int(4) DEFAULT '0',
  `q81` int(4) DEFAULT '0',
  `q82` int(4) DEFAULT '0',
  `q83` int(4) DEFAULT '0',
  `q84` int(4) DEFAULT '0',
  `q85` int(4) DEFAULT '0',
  `q86` int(4) DEFAULT '0',
  `q87` int(4) DEFAULT '0',
  `q88` int(4) DEFAULT '0',
  `q89` int(4) DEFAULT '0',
  `q90` int(4) DEFAULT '0',
  `total_marks` int(10) DEFAULT NULL,
  `time_taken_secs` int(10) DEFAULT NULL,
  `phy_marks` int(6) DEFAULT NULL,
  `chem_marks` int(6) DEFAULT NULL,
  `maths_marks` int(6) DEFAULT NULL,
  `image_id` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test1`
--

LOCK TABLES `test1` WRITE;
/*!40000 ALTER TABLE `test1` DISABLE KEYS */;
INSERT INTO `test1` VALUES (1,2,0,0,0,0,3,0,0,0,0,4,0,0,2,4,0,0,1,0,3,3,4,0,1,0,0,2,0,0,3,2,0,0,4,3,0,0,0,0,3,0,0,0,0,0,4,0,0,0,3,0,0,0,0,3,0,0,0,0,3,3,0,0,0,0,0,2,0,0,0,0,0,0,4,0,0,0,0,0,2,0,0,0,0,0,4,0,0,0,4,49,1,13,17,19,NULL);
/*!40000 ALTER TABLE `test1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test2`
--

DROP TABLE IF EXISTS `test2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test2` (
  `id` int(20) NOT NULL,
  `q1` int(4) DEFAULT '0',
  `q2` int(4) DEFAULT '0',
  `q3` int(4) DEFAULT '0',
  `q4` int(4) DEFAULT '0',
  `q5` int(4) DEFAULT '0',
  `q6` int(4) DEFAULT '0',
  `q7` int(4) DEFAULT '0',
  `q8` int(4) DEFAULT '0',
  `q9` int(4) DEFAULT '0',
  `q10` int(4) DEFAULT '0',
  `q11` int(4) DEFAULT '0',
  `q12` int(4) DEFAULT '0',
  `q13` int(4) DEFAULT '0',
  `q14` int(4) DEFAULT '0',
  `q15` int(4) DEFAULT '0',
  `q16` int(4) DEFAULT '0',
  `q17` int(4) DEFAULT '0',
  `q18` int(4) DEFAULT '0',
  `q19` int(4) DEFAULT '0',
  `q20` int(4) DEFAULT '0',
  `q21` int(4) DEFAULT '0',
  `q22` int(4) DEFAULT '0',
  `q23` int(4) DEFAULT '0',
  `q24` int(4) DEFAULT '0',
  `q25` int(4) DEFAULT '0',
  `q26` int(4) DEFAULT '0',
  `q27` int(4) DEFAULT '0',
  `q28` int(4) DEFAULT '0',
  `q29` int(4) DEFAULT '0',
  `q30` int(4) DEFAULT '0',
  `q31` int(4) DEFAULT '0',
  `q32` int(4) DEFAULT '0',
  `q33` int(4) DEFAULT '0',
  `q34` int(4) DEFAULT '0',
  `q35` int(4) DEFAULT '0',
  `q36` int(4) DEFAULT '0',
  `q37` int(4) DEFAULT '0',
  `q38` int(4) DEFAULT '0',
  `q39` int(4) DEFAULT '0',
  `q40` int(4) DEFAULT '0',
  `q41` int(4) DEFAULT '0',
  `q42` int(4) DEFAULT '0',
  `q43` int(4) DEFAULT '0',
  `q44` int(4) DEFAULT '0',
  `q45` int(4) DEFAULT '0',
  `q46` int(4) DEFAULT '0',
  `q47` int(4) DEFAULT '0',
  `q48` int(4) DEFAULT '0',
  `q49` int(4) DEFAULT '0',
  `q50` int(4) DEFAULT '0',
  `q51` int(4) DEFAULT '0',
  `q52` int(4) DEFAULT '0',
  `q53` int(4) DEFAULT '0',
  `q54` int(4) DEFAULT '0',
  `q55` int(4) DEFAULT '0',
  `q56` int(4) DEFAULT '0',
  `q57` int(4) DEFAULT '0',
  `q58` int(4) DEFAULT '0',
  `q59` int(4) DEFAULT '0',
  `q60` int(4) DEFAULT '0',
  `q61` int(4) DEFAULT '0',
  `q62` int(4) DEFAULT '0',
  `q63` int(4) DEFAULT '0',
  `q64` int(4) DEFAULT '0',
  `q65` int(4) DEFAULT '0',
  `q66` int(4) DEFAULT '0',
  `q67` int(4) DEFAULT '0',
  `q68` int(4) DEFAULT '0',
  `q69` int(4) DEFAULT '0',
  `q70` int(4) DEFAULT '0',
  `q71` int(4) DEFAULT '0',
  `q72` int(4) DEFAULT '0',
  `q73` int(4) DEFAULT '0',
  `q74` int(4) DEFAULT '0',
  `q75` int(4) DEFAULT '0',
  `q76` int(4) DEFAULT '0',
  `q77` int(4) DEFAULT '0',
  `q78` int(4) DEFAULT '0',
  `q79` int(4) DEFAULT '0',
  `q80` int(4) DEFAULT '0',
  `q81` int(4) DEFAULT '0',
  `q82` int(4) DEFAULT '0',
  `q83` int(4) DEFAULT '0',
  `q84` int(4) DEFAULT '0',
  `q85` int(4) DEFAULT '0',
  `q86` int(4) DEFAULT '0',
  `q87` int(4) DEFAULT '0',
  `q88` int(4) DEFAULT '0',
  `q89` int(4) DEFAULT '0',
  `q90` int(4) DEFAULT '0',
  `total_marks` int(10) DEFAULT NULL,
  `time_taken_secs` int(10) DEFAULT NULL,
  `phy_marks` int(6) DEFAULT NULL,
  `chem_marks` int(6) DEFAULT NULL,
  `maths_marks` int(6) DEFAULT NULL,
  `image_id` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test2`
--

LOCK TABLES `test2` WRITE;
/*!40000 ALTER TABLE `test2` DISABLE KEYS */;
INSERT INTO `test2` VALUES (1,2,4,1,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,4,2,4,3,0,0,0,0,0,0,0,0,0,0,0,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,3,3,3,0,0,0,0,0,0,0,0,0,0,0,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,4,45,291,10,15,20,NULL);
/*!40000 ALTER TABLE `test2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_answers`
--

DROP TABLE IF EXISTS `test_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_answers` (
  `test_no` int(20) NOT NULL,
  `q1` int(4) DEFAULT NULL,
  `q2` int(4) DEFAULT NULL,
  `q3` int(4) DEFAULT NULL,
  `q4` int(4) DEFAULT NULL,
  `q5` int(4) DEFAULT NULL,
  `q6` int(4) DEFAULT NULL,
  `q7` int(4) DEFAULT NULL,
  `q8` int(4) DEFAULT NULL,
  `q9` int(4) DEFAULT NULL,
  `q10` int(4) DEFAULT NULL,
  `q11` int(4) DEFAULT NULL,
  `q12` int(4) DEFAULT NULL,
  `q13` int(4) DEFAULT NULL,
  `q14` int(4) DEFAULT NULL,
  `q15` int(4) DEFAULT NULL,
  `q16` int(4) DEFAULT NULL,
  `q17` int(4) DEFAULT NULL,
  `q18` int(4) DEFAULT NULL,
  `q19` int(4) DEFAULT NULL,
  `q20` int(4) DEFAULT NULL,
  `q21` int(4) DEFAULT NULL,
  `q22` int(4) DEFAULT NULL,
  `q23` int(4) DEFAULT NULL,
  `q24` int(4) DEFAULT NULL,
  `q25` int(4) DEFAULT NULL,
  `q26` int(4) DEFAULT NULL,
  `q27` int(4) DEFAULT NULL,
  `q28` int(4) DEFAULT NULL,
  `q29` int(4) DEFAULT NULL,
  `q30` int(4) DEFAULT NULL,
  `q31` int(4) DEFAULT NULL,
  `q32` int(4) DEFAULT NULL,
  `q33` int(4) DEFAULT NULL,
  `q34` int(4) DEFAULT NULL,
  `q35` int(4) DEFAULT NULL,
  `q36` int(4) DEFAULT NULL,
  `q37` int(4) DEFAULT NULL,
  `q38` int(4) DEFAULT NULL,
  `q39` int(4) DEFAULT NULL,
  `q40` int(4) DEFAULT NULL,
  `q41` int(4) DEFAULT NULL,
  `q42` int(4) DEFAULT NULL,
  `q43` int(4) DEFAULT NULL,
  `q44` int(4) DEFAULT NULL,
  `q45` int(4) DEFAULT NULL,
  `q46` int(4) DEFAULT NULL,
  `q47` int(4) DEFAULT NULL,
  `q48` int(4) DEFAULT NULL,
  `q49` int(4) DEFAULT NULL,
  `q50` int(4) DEFAULT NULL,
  `q51` int(4) DEFAULT NULL,
  `q52` int(4) DEFAULT NULL,
  `q53` int(4) DEFAULT NULL,
  `q54` int(4) DEFAULT NULL,
  `q55` int(4) DEFAULT NULL,
  `q56` int(4) DEFAULT NULL,
  `q57` int(4) DEFAULT NULL,
  `q58` int(4) DEFAULT NULL,
  `q59` int(4) DEFAULT NULL,
  `q60` int(4) DEFAULT NULL,
  `q61` int(4) DEFAULT NULL,
  `q62` int(4) DEFAULT NULL,
  `q63` int(4) DEFAULT NULL,
  `q64` int(4) DEFAULT NULL,
  `q65` int(4) DEFAULT NULL,
  `q66` int(4) DEFAULT NULL,
  `q67` int(4) DEFAULT NULL,
  `q68` int(4) DEFAULT NULL,
  `q69` int(4) DEFAULT NULL,
  `q70` int(4) DEFAULT NULL,
  `q71` int(4) DEFAULT NULL,
  `q72` int(4) DEFAULT NULL,
  `q73` int(4) DEFAULT NULL,
  `q74` int(4) DEFAULT NULL,
  `q75` int(4) DEFAULT NULL,
  `q76` int(4) DEFAULT NULL,
  `q77` int(4) DEFAULT NULL,
  `q78` int(4) DEFAULT NULL,
  `q79` int(4) DEFAULT NULL,
  `q80` int(4) DEFAULT NULL,
  `q81` int(4) DEFAULT NULL,
  `q82` int(4) DEFAULT NULL,
  `q83` int(4) DEFAULT NULL,
  `q84` int(4) DEFAULT NULL,
  `q85` int(4) DEFAULT NULL,
  `q86` int(4) DEFAULT NULL,
  `q87` int(4) DEFAULT NULL,
  `q88` int(4) DEFAULT NULL,
  `q89` int(4) DEFAULT NULL,
  `q90` int(4) DEFAULT NULL,
  PRIMARY KEY (`test_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_answers`
--

LOCK TABLES `test_answers` WRITE;
/*!40000 ALTER TABLE `test_answers` DISABLE KEYS */;
INSERT INTO `test_answers` VALUES (1,2,4,2,1,4,3,3,3,2,4,2,4,2,1,4,3,3,3,2,4,2,4,2,1,4,3,3,3,2,4,1,4,3,1,3,3,2,2,3,3,1,4,3,1,3,3,2,2,3,3,1,4,3,1,3,3,2,2,3,3,3,3,3,4,3,4,2,3,2,4,3,3,3,4,3,4,2,3,2,4,3,3,3,4,3,4,2,3,2,4),(2,2,4,2,1,4,3,3,3,2,4,2,4,2,1,4,3,3,3,2,4,2,4,2,1,4,3,3,3,2,4,1,4,3,1,3,3,2,2,3,3,1,4,3,1,3,3,2,2,3,3,1,4,3,1,3,3,2,2,3,3,3,3,3,4,3,4,2,3,2,4,3,3,3,4,3,4,2,3,2,4,3,3,3,4,3,4,2,3,2,4);
/*!40000 ALTER TABLE `test_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_follow`
--

DROP TABLE IF EXISTS `user_follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follower` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `subscribed` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `follow_unique` (`follower`,`following`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_follow`
--

LOCK TABLES `user_follow` WRITE;
/*!40000 ALTER TABLE `user_follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vid_lecture`
--

DROP TABLE IF EXISTS `vid_lecture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vid_lecture` (
  `vid_id` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `vid_code` varchar(255) NOT NULL,
  PRIMARY KEY (`vid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vid_lecture`
--

LOCK TABLES `vid_lecture` WRITE;
/*!40000 ALTER TABLE `vid_lecture` DISABLE KEYS */;
/*!40000 ALTER TABLE `vid_lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `views` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `video_id` int(255) NOT NULL,
  `timestamp` datetime(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `views`
--

LOCK TABLES `views` WRITE;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
/*!40000 ALTER TABLE `views` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-27 14:50:21
