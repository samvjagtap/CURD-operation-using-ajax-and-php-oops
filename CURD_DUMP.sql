-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: curd
-- ------------------------------------------------------
-- Server version	5.7.40-log

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
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `pro_man_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT '1',
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT '1',
  `updated_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` VALUES (1,'laptop',30000,'2023-05-01 00:00:00',1,'2023-06-04 20:52:11',1,'2023-06-04 20:52:12',1),(3,'Tab',20000,'2023-02-01 00:00:00',1,'2023-06-05 00:01:26',1,'2023-06-05 00:01:26',1),(19,'bag',1500,'2023-06-01 00:00:00',1,'2023-06-05 11:25:00',1,'2023-06-05 11:25:00',1),(20,'Pen',10,'2023-06-01 00:00:00',1,'2023-06-05 13:38:27',1,'2023-06-05 13:38:27',1),(21,'T-shirt',1500,'2023-06-01 00:00:00',1,'2023-06-05 13:38:43',1,'2023-06-05 13:38:43',1),(22,'TV',20000,'2023-06-01 00:00:00',1,'2023-06-05 13:38:59',1,'2023-06-05 13:38:59',1),(23,'Chair',2000,'2023-06-03 00:00:00',1,'2023-06-05 13:39:15',1,'2023-06-05 13:39:15',1),(24,'Radio',500,'2023-06-01 00:00:00',1,'2023-06-05 13:39:30',1,'2023-06-05 13:39:30',1),(25,'Table',10000,'2023-06-02 00:00:00',1,'2023-06-05 13:39:47',1,'2023-06-05 13:39:47',1),(26,'Clock',10000,'2023-06-01 00:00:00',1,'2023-06-05 13:40:15',1,'2023-06-05 13:40:15',0),(27,'Writting pad',500,'2023-06-01 00:00:00',1,'2023-06-05 13:41:01',1,'2023-06-05 13:41:01',1),(28,'Bat',1500,'2023-06-04 00:00:00',1,'2023-06-05 13:41:18',1,'2023-06-05 13:41:18',1),(29,'Sofaa',20000,'2023-06-01 00:00:00',1,'2023-06-05 13:41:36',1,'2023-06-05 13:41:36',1),(32,'Chart',10000,'2023-06-01 00:00:00',4,'2023-06-05 15:01:26',4,'2023-06-05 15:02:04',0);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'samsj','14209a14e89657e0efe91c6a7d258d9b','samjagtap041@gmail.com','2023-06-04 20:52:11','2023-06-04 20:52:11',1),(2,'rutikraj','7b223205ac11fa68f392a8f0c3f0514a','rutik@gmail.com','2023-06-04 20:52:11','2023-06-04 20:52:11',1),(3,'raghav','b010c88ea3815cc2f7b7a903651e3d73','raghav@gmail.com','2023-06-05 13:35:59','2023-06-05 13:35:59',1),(4,'revati','d4f8d31acd0c85b8ee10f647625d92bf','revati@gmail.com','2023-06-05 14:58:36','2023-06-05 14:58:36',1);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-05 15:30:17
