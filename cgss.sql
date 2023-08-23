-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: cgs
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `cadet`
--

DROP TABLE IF EXISTS `cadet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadet` (
  `cadet_id` int NOT NULL AUTO_INCREMENT,
  `afpsn` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `servid` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `majid` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `yrgr` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `oyrgr` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `aname` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mname` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `initls` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `bdate` datetime DEFAULT NULL,
  `bplace` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `papa` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `padead` bit(1) DEFAULT NULL,
  `mama` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `madead` bit(1) DEFAULT NULL,
  `guardian` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `addr1` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `addr2` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipcode` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `region` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `highsch` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `height` float DEFAULT NULL,
  `eescore` float DEFAULT NULL,
  `math` decimal(18,0) DEFAULT NULL,
  `engl` decimal(18,0) DEFAULT NULL,
  `spma` decimal(18,0) DEFAULT NULL,
  `coy` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `battalion` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `battalion2` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cstat` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pix` longblob,
  `dateadmitted` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dategrad` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datecomm` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `degree` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `majorin` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `graduate` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latinaward` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coybat` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  'active' TINYINT(1) NOT NULL DEFAULT 0;
  'not_active' TINYINT(1) NOT NULL DEFAULT 1;
  PRIMARY KEY (`cadet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadet`
--

LOCK TABLES `cadet` WRITE;
/*!40000 ALTER TABLE `cadet` DISABLE KEYS */;
/*!40000 ALTER TABLE `cadet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `ccode` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `cequi` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cname` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cdesc` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cunits` float DEFAULT NULL,
  `ctype` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cadd` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cadd2` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ctypeold` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `deptcode` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `deptname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `depthead` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `deptgroup` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES 
(1,'DAW','DEPT OF AIR WARFARE','99951','T'),
(2,'DCIS','DEPT OF COMPUTING AND INFORMATION SCIENCES','02292','A'),
(3,'DES','DEPT OF ENGINEERING SCIENCES','9213','A'),
(4,'DGW','DEPT OF GROUND WARFARE','99930','T'),
(5,'DHS','DEPT OF HISTORY AND STRATEGY','-','A'),
(6,'DHUM','DEPT OF HUMANITIES','9953','A'),
(7,'DLAN','DEPT OF LANGUAGES','-','A'),
(8,'DLD','DEPT OF LEADERSHIP AND DEVELOPMENT','11260','T'),
(9,'DMATH','DEPT OF MATHEMATICS','13622','A'),
(10,'DMGT','DEPT OF MANAGEMENT','12915','A'),
(11,'DML','DEPT OF MILITARY LEADERSHIP','12458','T'),
(12,'DMS','DEPT OF MANAGERIAL SCIENCES','-','A'),
(13,'DNS','DEPT OF NATURAL SCIENCES','13399','A'),
(14,'DNW','DEPT OF NAVAL WARFARE','10999','T'),
(15,'DPE','DEPT OF PHYSICAL EDUCATION','-','T'),
(16,'DPS','DEPT OF PHYSICAL SCIENCES','13399','A'),
(17,'DSS','DEPT OF SOCIAL SCIENCES','2224','A'),
(18,'DTO','DEPT OF TACTICAL OFFICERS','11796','T'),
(19,'HACA','Head Academic','8682','A'),
(20,'SPDU','SPORTS AND PHYSICAL DEVELOPMENT UNIT','99954','T');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty` (
  `faculty_id` int NOT NULL AUTO_INCREMENT,
  `serialnr` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mi` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `aname` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `deptcode` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `igroup` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `itype` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `rank` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `brofserv` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pix` longblob,
  `uname` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pwd` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lvl` int DEFAULT NULL,
  `active` int DEFAULT NULL,
  PRIMARY KEY (`faculty_id`,`serialnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
(1,'INS001','MATH1','Dela Cruz','Juan','A','-','M','HAG','C','MS'),
(2,'INS002','MATH2','Apolinario','Andres','A','-','M','HAG','M','MS'),
(3,'INS003','MATH3','Silang','Gabriel','A','-','F','HAG','C','MR'),
(4,'INS004','MATH4','Ibarra','Crisostomo','B','-','M','HAG','C','MR'),
(5,'INS005','ENGL1','Lang','Scott','B','-','M','-','C','MR'),
(6,'INS006','ENGL2','Gates','Ethan','B','-','M','HAG','M','COL'),
(7,'INS007','ENGL3','De Santa','Michael','C','-','M','HAG','M','LT'),
(8,'INS008','ENGL4','Del Pilar','Jimmy','C','-','M','HAG','C','MAJ'),
(9,'INS009','FIL1','Wesley','John','C','-','M','HAG','C','LTC'),
(10,'INS010','FIL2','Mark','Romanoff','D','-','F','HAG','C','LTC'),
(11,'INS011','PE1','Johnson','Wanda','D','-','F','HAG','C','MR'),
(12,'INS012','PE2','Sweet','Peter','D','-','M','HAG','C','CPT'),
(13,'INS013','PE3','Steve','Bezos','E','-','M','HAG','M','CPT'),
(14,'INS014','PE4','Hank','Melchora','E','-','F','-','M','CPT'),
(15,'INS015','I32','Barton','Marcelo','E','-','M','-','M','GEN'),
(16,'INS016','I32','Strange','Quill','F','-','F','-','M','LT'),
(17,'INS017','I32','Vic','Vans','F','-','M','-','C','LT'),
(18,'INS018','I32','Parker','Bill','F','-','M','HAG','C','MS'),
(19,'INS019','I32','Granger','Crest','G','-','M','HAG','C','LTS'),
(20,'INS020','I32','Philips','Franklin','G','-','M','HAG','C','MR'),
(21,'INS021','I32','Cipriani','Russel','G','-','M','HAG','M','MR'),
(22,'INS022','I32','Weston','Devin','H','-','F','HAG','M','LTC'),
(23,'INS023','I32','Aiblinger','Boris','H','-','M','HAG','M','LTC'),
(24,'INS024','I32','Uchiha','Hanji','H','-','F','-','C','MR'),
(25,'INS025','I32','Springer','Erwin','I','-','M','-','M','LTC'),
(26,'INS026','I32','Pyxis','Dot','I','-','F','HAG','M','CPT'),
(27,'INS027','I32','Caluza','Kenny','I','-','M','HAG','M','MAJ'),
(28,'INS028','I32','Panopio','Eld','J','-','F','HAG','M','LT'),
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `major` (
  `major_id` int NOT NULL,
  `majid` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `majdes` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`major_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
/*!40000 ALTER TABLE `major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test','test@test.com','test','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-14  8:48:35
