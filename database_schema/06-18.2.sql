-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: procurement_database
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `app_items_tbl`
--

DROP TABLE IF EXISTS `app_items_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_items_tbl` (
  `app_item_id` int NOT NULL AUTO_INCREMENT,
  `app_id_fk` int DEFAULT NULL,
  `app_item_name` varchar(100) DEFAULT NULL,
  `app_item_quantity` varchar(50) DEFAULT NULL,
  `app_item_pmo` varchar(150) DEFAULT NULL,
  `app_item_moed` varchar(100) DEFAULT NULL,
  `app_item_estimated_total` decimal(10,2) DEFAULT NULL,
  `app_item_estimated_mooe` decimal(10,2) DEFAULT NULL,
  `app_item_estimated_co` decimal(10,2) DEFAULT NULL,
  `app_item_remarks` varchar(150) DEFAULT NULL,
  `app_item_adspost` date DEFAULT NULL,
  `app_item_subopen` date DEFAULT NULL,
  `app_item_notice` date DEFAULT NULL,
  `app_item_contract` date DEFAULT NULL,
  `app_item_source_fund` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`app_item_id`),
  KEY `app_id_fk` (`app_id_fk`),
  CONSTRAINT `app_items_tbl_ibfk_1` FOREIGN KEY (`app_id_fk`) REFERENCES `app_tbl` (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_items_tbl`
--

LOCK TABLES `app_items_tbl` WRITE;
/*!40000 ALTER TABLE `app_items_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_items_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_tbl`
--

DROP TABLE IF EXISTS `app_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_tbl` (
  `app_id` int NOT NULL AUTO_INCREMENT,
  `app_ppmp_items_id_fk` int DEFAULT NULL,
  `app_status` enum('Pending','Rejected','Approved') DEFAULT NULL,
  `app_dep_id_fk` int DEFAULT NULL,
  `app_recom_approval_user_fk` int DEFAULT NULL,
  `app_prepared_by_user_fk` int DEFAULT NULL,
  `app_remarks` text,
  `app_section` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`app_id`),
  KEY `app_ppmp_items_id_fk` (`app_ppmp_items_id_fk`),
  KEY `app_dep_id_fk` (`app_dep_id_fk`),
  KEY `app_recom_approval_user_fk` (`app_recom_approval_user_fk`),
  KEY `app_prepared_by_user_fk` (`app_prepared_by_user_fk`),
  CONSTRAINT `app_tbl_ibfk_1` FOREIGN KEY (`app_ppmp_items_id_fk`) REFERENCES `ppmp_tbl` (`ppmp_id`),
  CONSTRAINT `app_tbl_ibfk_2` FOREIGN KEY (`app_dep_id_fk`) REFERENCES `departments_tbl` (`dep_id`),
  CONSTRAINT `app_tbl_ibfk_3` FOREIGN KEY (`app_recom_approval_user_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `app_tbl_ibfk_4` FOREIGN KEY (`app_prepared_by_user_fk`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_tbl`
--

LOCK TABLES `app_tbl` WRITE;
/*!40000 ALTER TABLE `app_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bid_status`
--

DROP TABLE IF EXISTS `bid_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bid_status` (
  `bid_stat_id` int NOT NULL AUTO_INCREMENT,
  `bid_stat_po_item_fk` int DEFAULT NULL,
  `bid_stat` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `bid_stat_date` date DEFAULT NULL,
  `bit_stat_remarks` text,
  PRIMARY KEY (`bid_stat_id`),
  KEY `bid_stat_po_item_fk` (`bid_stat_po_item_fk`),
  CONSTRAINT `bid_status_ibfk_1` FOREIGN KEY (`bid_stat_po_item_fk`) REFERENCES `po_tbl` (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bid_status`
--

LOCK TABLES `bid_status` WRITE;
/*!40000 ALTER TABLE `bid_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `bid_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_status_tbl`
--

DROP TABLE IF EXISTS `delivery_status_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_status_tbl` (
  `delivery_stat_id` int NOT NULL AUTO_INCREMENT,
  `delivery_stat_po_item_fk` int DEFAULT NULL,
  `delivery_stat_` enum('Pending','Delivered','Cancelled') DEFAULT NULL,
  `delivery_stat_date` date DEFAULT NULL,
  `delivery_stat_remarks` text,
  PRIMARY KEY (`delivery_stat_id`),
  KEY `delivery_stat_po_item_fk` (`delivery_stat_po_item_fk`),
  CONSTRAINT `delivery_status_tbl_ibfk_1` FOREIGN KEY (`delivery_stat_po_item_fk`) REFERENCES `po_tbl` (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_status_tbl`
--

LOCK TABLES `delivery_status_tbl` WRITE;
/*!40000 ALTER TABLE `delivery_status_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_status_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments_tbl`
--

DROP TABLE IF EXISTS `departments_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments_tbl` (
  `dep_id` int NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(200) DEFAULT NULL,
  `dep_type` enum('Academic','Administrative') DEFAULT 'Administrative',
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments_tbl`
--

LOCK TABLES `departments_tbl` WRITE;
/*!40000 ALTER TABLE `departments_tbl` DISABLE KEYS */;
INSERT INTO `departments_tbl` VALUES (1,'Basic Arts and Sciences Department','Academic'),(2,'Civil and Allied Department','Academic'),(3,'Mechanical and Allied Department','Academic'),(4,'Electrical and Allied Department','Academic'),(5,'Office of Student Affairs','Administrative'),(6,'Admission, Guidance and Counseling','Administrative'),(7,'Research and Development Services','Administrative'),(8,'Extension Services','Administrative'),(9,'Innovation and Technology Support Office','Administrative'),(10,'Technology Licensing Office Coordinator','Administrative'),(11,'Quality Assurance','Administrative'),(12,'University Information Technology Center','Administrative'),(13,'Gender and Development','Administrative'),(14,'Human Resource Management','Administrative'),(15,'Property and Supply','Administrative'),(16,'Procurement','Administrative'),(17,'Infrastructure Development','Administrative'),(18,'Building and Grounds Maintenance','Administrative'),(19,'Accounting','Administrative'),(20,'Budgeting','Administrative'),(21,'Collecting and Disbursing','Administrative'),(22,'Medical Services','Administrative'),(23,'Dental Services','Administrative'),(24,'Records Management','Administrative'),(25,'BAC Secretariat','Administrative'),(26,'Campus Business Manager','Administrative'),(27,'Registration','Administrative'),(28,'Learning Resource Center','Administrative'),(29,'Sports and Cultural Development','Administrative'),(30,'Planning Office','Administrative'),(31,'National Service Training Program','Administrative'),(32,'Literacy Training Service','Administrative'),(33,'Reserve Officers Training Corps','Administrative'),(34,'Civic Welfare and Training Service','Administrative'),(35,'Director\'s Office','Administrative'),(36,'Assistant Director for Academic Affairs Office','Administrative'),(37,'Assistant Director for Admin and Finance Office','Administrative'),(38,'Assistant Director for Research and Extension Office','Administrative'),(39,'Project Management Committee','Administrative');
/*!40000 ALTER TABLE `departments_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invent_custo_tbl`
--

DROP TABLE IF EXISTS `invent_custo_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invent_custo_tbl` (
  `invent_custo_id` int NOT NULL AUTO_INCREMENT,
  `invent_custo_prop_ack_fk` int DEFAULT NULL,
  `invent_custo_user_id_fk` int DEFAULT NULL,
  `invent_custo_fund_cluster` int DEFAULT NULL,
  `invent_custo_po_no` date DEFAULT NULL,
  `invent_custo_ics_no` date DEFAULT NULL,
  `invent_custo_code` int DEFAULT NULL,
  `invent_custo_item_no` int DEFAULT NULL,
  `invent_custo_est_life` varchar(30) DEFAULT NULL,
  `invent_custo_received_from_fk` int DEFAULT NULL,
  `invent_custo_received_from_date` date DEFAULT NULL,
  `invent_custo_received_by_fk` int DEFAULT NULL,
  `invent_custo_received_by_date` date DEFAULT NULL,
  `invent_custo_tbl_remarks` text,
  PRIMARY KEY (`invent_custo_id`),
  KEY `invent_custo_prop_ack_fk` (`invent_custo_prop_ack_fk`),
  KEY `invent_custo_user_id_fk` (`invent_custo_user_id_fk`),
  KEY `invent_custo_received_from_fk` (`invent_custo_received_from_fk`),
  KEY `invent_custo_received_by_fk` (`invent_custo_received_by_fk`),
  CONSTRAINT `invent_custo_tbl_ibfk_1` FOREIGN KEY (`invent_custo_prop_ack_fk`) REFERENCES `prop_ack_tbl` (`prop_ack_id`),
  CONSTRAINT `invent_custo_tbl_ibfk_2` FOREIGN KEY (`invent_custo_user_id_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `invent_custo_tbl_ibfk_3` FOREIGN KEY (`invent_custo_received_from_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `invent_custo_tbl_ibfk_4` FOREIGN KEY (`invent_custo_received_by_fk`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invent_custo_tbl`
--

LOCK TABLES `invent_custo_tbl` WRITE;
/*!40000 ALTER TABLE `invent_custo_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `invent_custo_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr_items_tbl`
--

DROP TABLE IF EXISTS `mr_items_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mr_items_tbl` (
  `mr_item_id` int NOT NULL AUTO_INCREMENT,
  `mr_id_fk` int DEFAULT NULL,
  `mr_item_unit` varchar(20) DEFAULT NULL,
  `mr_item_quantity` int DEFAULT NULL,
  `mr_location` varchar(100) DEFAULT NULL,
  `mr_po_fk` int DEFAULT NULL,
  PRIMARY KEY (`mr_item_id`),
  KEY `mr_id_fk` (`mr_id_fk`),
  KEY `mr_po_fk` (`mr_po_fk`),
  CONSTRAINT `mr_items_tbl_ibfk_1` FOREIGN KEY (`mr_id_fk`) REFERENCES `mr_tbl` (`mr_id`),
  CONSTRAINT `mr_items_tbl_ibfk_2` FOREIGN KEY (`mr_po_fk`) REFERENCES `po_tbl` (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr_items_tbl`
--

LOCK TABLES `mr_items_tbl` WRITE;
/*!40000 ALTER TABLE `mr_items_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `mr_items_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr_tbl`
--

DROP TABLE IF EXISTS `mr_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mr_tbl` (
  `mr_id` int NOT NULL AUTO_INCREMENT,
  `mr_user_id_fk` int DEFAULT NULL,
  PRIMARY KEY (`mr_id`),
  KEY `mr_user_id_fk` (`mr_user_id_fk`),
  CONSTRAINT `mr_tbl_ibfk_1` FOREIGN KEY (`mr_user_id_fk`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr_tbl`
--

LOCK TABLES `mr_tbl` WRITE;
/*!40000 ALTER TABLE `mr_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `mr_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications_tbl`
--

DROP TABLE IF EXISTS `notifications_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications_tbl` (
  `notif_id` int NOT NULL AUTO_INCREMENT,
  `notif_sender_id` int DEFAULT NULL,
  `notif_receiver_id` int DEFAULT NULL,
  `notif_message` text,
  `notif_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notif_id`),
  KEY `notif_sender_id` (`notif_sender_id`),
  KEY `notif_receiver_id` (`notif_receiver_id`),
  CONSTRAINT `notifications_tbl_ibfk_1` FOREIGN KEY (`notif_sender_id`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `notifications_tbl_ibfk_2` FOREIGN KEY (`notif_receiver_id`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications_tbl`
--

LOCK TABLES `notifications_tbl` WRITE;
/*!40000 ALTER TABLE `notifications_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otp_temp_tbl`
--

DROP TABLE IF EXISTS `otp_temp_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `otp_temp_tbl` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `otp_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otp_temp_tbl`
--

LOCK TABLES `otp_temp_tbl` WRITE;
/*!40000 ALTER TABLE `otp_temp_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `otp_temp_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `po_items_specs_tbl`
--

DROP TABLE IF EXISTS `po_items_specs_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `po_items_specs_tbl` (
  `po_items_spec_id` int NOT NULL AUTO_INCREMENT,
  `po_item_specs_id_fk` int DEFAULT NULL,
  `po_item_spec_descrip` text,
  PRIMARY KEY (`po_items_spec_id`),
  KEY `po_item_specs_id_fk` (`po_item_specs_id_fk`),
  CONSTRAINT `po_items_specs_tbl_ibfk_1` FOREIGN KEY (`po_item_specs_id_fk`) REFERENCES `po_items_tbl` (`po_items_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_items_specs_tbl`
--

LOCK TABLES `po_items_specs_tbl` WRITE;
/*!40000 ALTER TABLE `po_items_specs_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `po_items_specs_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `po_items_tbl`
--

DROP TABLE IF EXISTS `po_items_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `po_items_tbl` (
  `po_items_id` int NOT NULL AUTO_INCREMENT,
  `po_items_id_fk` int DEFAULT NULL,
  `po_items_stockno` int DEFAULT NULL,
  `po_items_unit` varchar(20) DEFAULT NULL,
  `po_items_descrip` varchar(100) DEFAULT NULL,
  `po_items_quantity` int DEFAULT NULL,
  `po_items_cost` decimal(10,2) DEFAULT NULL,
  `po_items_total_cost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`po_items_id`),
  KEY `po_items_id_fk` (`po_items_id_fk`),
  CONSTRAINT `po_items_tbl_ibfk_1` FOREIGN KEY (`po_items_id_fk`) REFERENCES `po_tbl` (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_items_tbl`
--

LOCK TABLES `po_items_tbl` WRITE;
/*!40000 ALTER TABLE `po_items_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `po_items_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `po_tbl`
--

DROP TABLE IF EXISTS `po_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `po_tbl` (
  `po_id` int NOT NULL AUTO_INCREMENT,
  `po_status` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `po_pr_items_id_fk` int DEFAULT NULL,
  `po_supplier` varchar(100) DEFAULT NULL,
  `po_ponumber` date DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_address` varchar(200) DEFAULT NULL,
  `po_tele` varchar(60) DEFAULT NULL,
  `po_tin` varchar(60) DEFAULT NULL,
  `po_mode` varchar(50) DEFAULT NULL,
  `po_tuptin` varchar(60) DEFAULT NULL,
  `po_place_delivery` varchar(100) DEFAULT NULL,
  `po_delivery_term` varchar(50) DEFAULT NULL,
  `po_date_delivery` date DEFAULT NULL,
  `po_payment_term` varchar(50) DEFAULT NULL,
  `po_signed_by_fk` int DEFAULT NULL,
  `po_fund_cluster` int DEFAULT NULL,
  `po_fund_available` varchar(100) DEFAULT NULL,
  `po_orsburs` varchar(50) DEFAULT NULL,
  `po_date_orsburs` date DEFAULT NULL,
  `po_amount` int DEFAULT NULL,
  `po_remarks` text,
  PRIMARY KEY (`po_id`),
  KEY `po_pr_items_id_fk` (`po_pr_items_id_fk`),
  KEY `po_signed_by_fk` (`po_signed_by_fk`),
  CONSTRAINT `po_tbl_ibfk_1` FOREIGN KEY (`po_pr_items_id_fk`) REFERENCES `pr_items_tbl` (`pr_items_id`),
  CONSTRAINT `po_tbl_ibfk_2` FOREIGN KEY (`po_signed_by_fk`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_tbl`
--

LOCK TABLES `po_tbl` WRITE;
/*!40000 ALTER TABLE `po_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `po_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppmp_items_tbl`
--

DROP TABLE IF EXISTS `ppmp_items_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppmp_items_tbl` (
  `ppmp_item_id` int NOT NULL AUTO_INCREMENT,
  `ppmp_id_fk` int DEFAULT NULL,
  `ppmp_item_name` varchar(100) DEFAULT NULL,
  `ppmp_item_quantity` varchar(50) DEFAULT NULL,
  `ppmp_item_estimated_budget` decimal(10,2) DEFAULT NULL,
  `ppmp_sched_jan` tinyint(1) DEFAULT '0',
  `ppmp_sched_feb` tinyint(1) DEFAULT '0',
  `ppmp_sched_mar` tinyint(1) DEFAULT '0',
  `ppmp_sched_apr` tinyint(1) DEFAULT '0',
  `ppmp_sched_may` tinyint(1) DEFAULT '0',
  `ppmp_sched_jun` tinyint(1) DEFAULT '0',
  `ppmp_sched_jul` tinyint(1) DEFAULT '0',
  `ppmp_sched_aug` tinyint(1) DEFAULT '0',
  `ppmp_sched_sep` tinyint(1) DEFAULT '0',
  `ppmp_sched_oct` tinyint(1) DEFAULT '0',
  `ppmp_sched_nov` tinyint(1) DEFAULT '0',
  `ppmp_sched_dec` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ppmp_item_id`),
  KEY `ppmp_id_fk` (`ppmp_id_fk`),
  CONSTRAINT `ppmp_items_tbl_ibfk_1` FOREIGN KEY (`ppmp_id_fk`) REFERENCES `ppmp_tbl` (`ppmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppmp_items_tbl`
--

LOCK TABLES `ppmp_items_tbl` WRITE;
/*!40000 ALTER TABLE `ppmp_items_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `ppmp_items_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppmp_tbl`
--

DROP TABLE IF EXISTS `ppmp_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppmp_tbl` (
  `ppmp_id` int NOT NULL AUTO_INCREMENT,
  `ppmp_status` enum('Pending','Rejected','Approved') DEFAULT 'Pending',
  `ppmp_office_fk` int DEFAULT NULL,
  `ppmp_total_budget_allocation` int DEFAULT NULL,
  `ppmp_total_proposed_allocation` int DEFAULT NULL,
  `ppmp_period_covered` year DEFAULT NULL,
  `ppmp_date_submitted_fk` int DEFAULT NULL,
  `ppmp_date_signed_fk` int DEFAULT NULL,
  `ppmp_prepared_by_user_fk` int DEFAULT NULL,
  `ppmp_evaluated_by_user_fk` int DEFAULT NULL,
  `ppmp_recommended_by_user_fk` int DEFAULT NULL,
  `ppmp_remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ppmp_id`),
  KEY `ppmp_office_fk` (`ppmp_office_fk`),
  KEY `ppmp_date_submitted_fk` (`ppmp_date_submitted_fk`),
  KEY `ppmp_date_signed_fk` (`ppmp_date_signed_fk`),
  KEY `ppmp_prepared_by_user_fk` (`ppmp_prepared_by_user_fk`),
  KEY `ppmp_evaluated_by_user_fk` (`ppmp_evaluated_by_user_fk`),
  KEY `ppmp_recommended_by_user_fk` (`ppmp_recommended_by_user_fk`),
  CONSTRAINT `ppmp_tbl_ibfk_1` FOREIGN KEY (`ppmp_office_fk`) REFERENCES `departments_tbl` (`dep_id`),
  CONSTRAINT `ppmp_tbl_ibfk_2` FOREIGN KEY (`ppmp_date_submitted_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `ppmp_tbl_ibfk_3` FOREIGN KEY (`ppmp_date_signed_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `ppmp_tbl_ibfk_4` FOREIGN KEY (`ppmp_prepared_by_user_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `ppmp_tbl_ibfk_5` FOREIGN KEY (`ppmp_evaluated_by_user_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `ppmp_tbl_ibfk_6` FOREIGN KEY (`ppmp_recommended_by_user_fk`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppmp_tbl`
--

LOCK TABLES `ppmp_tbl` WRITE;
/*!40000 ALTER TABLE `ppmp_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `ppmp_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_items_specs_tbl`
--

DROP TABLE IF EXISTS `pr_items_specs_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_items_specs_tbl` (
  `pr_items_spec_id` int NOT NULL AUTO_INCREMENT,
  `pr_item_id_fk` int DEFAULT NULL,
  `pr_item_spec_descrip` text,
  PRIMARY KEY (`pr_items_spec_id`),
  KEY `pr_item_id_fk` (`pr_item_id_fk`),
  CONSTRAINT `pr_items_specs_tbl_ibfk_1` FOREIGN KEY (`pr_item_id_fk`) REFERENCES `pr_items_tbl` (`pr_items_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_items_specs_tbl`
--

LOCK TABLES `pr_items_specs_tbl` WRITE;
/*!40000 ALTER TABLE `pr_items_specs_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_items_specs_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_items_tbl`
--

DROP TABLE IF EXISTS `pr_items_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_items_tbl` (
  `pr_items_id` int NOT NULL AUTO_INCREMENT,
  `pr_id_fk` int DEFAULT NULL,
  `pr_items_quantity` int DEFAULT NULL,
  `pr_items_cost` decimal(10,2) DEFAULT NULL,
  `pr_items_total_cost` decimal(10,2) DEFAULT NULL,
  `pr_items_unit` varchar(20) DEFAULT NULL,
  `pr_items_descrip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pr_items_id`),
  KEY `pr_id_fk` (`pr_id_fk`),
  CONSTRAINT `pr_items_tbl_ibfk_1` FOREIGN KEY (`pr_id_fk`) REFERENCES `pr_tbl` (`pr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_items_tbl`
--

LOCK TABLES `pr_items_tbl` WRITE;
/*!40000 ALTER TABLE `pr_items_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_items_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_tbl`
--

DROP TABLE IF EXISTS `pr_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_tbl` (
  `pr_id` int NOT NULL AUTO_INCREMENT,
  `pr_app_item_id_fk` int DEFAULT NULL,
  `pr_section` varchar(50) DEFAULT NULL,
  `pr_status1` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `pr_status2` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `pr_total` decimal(10,2) DEFAULT NULL,
  `pr_prdate` datetime DEFAULT NULL,
  `pr_saidate` datetime DEFAULT NULL,
  `pr_remarks` text,
  PRIMARY KEY (`pr_id`),
  KEY `pr_app_item_id` (`pr_app_item_id_fk`),
  CONSTRAINT `pr_tbl_ibfk_1` FOREIGN KEY (`pr_app_item_id_fk`) REFERENCES `app_items_tbl` (`app_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_tbl`
--

LOCK TABLES `pr_tbl` WRITE;
/*!40000 ALTER TABLE `pr_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prop_ack_tbl`
--

DROP TABLE IF EXISTS `prop_ack_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prop_ack_tbl` (
  `prop_ack_id` int NOT NULL AUTO_INCREMENT,
  `prop_ack_po_item_id_fk` int DEFAULT NULL,
  `prop_ack_number` date DEFAULT NULL,
  `prop_ack_date_acq` date DEFAULT NULL,
  `prop_ack_amount` decimal(10,2) DEFAULT NULL,
  `prop_ack_received_by_fk` int DEFAULT NULL,
  `prop_ack_received_date` date DEFAULT NULL,
  `prop_ack_issued_by_fk` int DEFAULT NULL,
  `prop_ack_issued_date` date DEFAULT NULL,
  `prop_ack_deli_stats` int DEFAULT NULL,
  `prop_ack_bid_stats` int DEFAULT NULL,
  PRIMARY KEY (`prop_ack_id`),
  KEY `prop_ack_po_item_id_fk` (`prop_ack_po_item_id_fk`),
  KEY `prop_ack_received_by_fk` (`prop_ack_received_by_fk`),
  KEY `prop_ack_issued_by_fk` (`prop_ack_issued_by_fk`),
  KEY `prop_ack_deli_stats` (`prop_ack_deli_stats`),
  KEY `prop_ack_bid_stats` (`prop_ack_bid_stats`),
  CONSTRAINT `prop_ack_tbl_ibfk_1` FOREIGN KEY (`prop_ack_po_item_id_fk`) REFERENCES `po_items_tbl` (`po_items_id`),
  CONSTRAINT `prop_ack_tbl_ibfk_2` FOREIGN KEY (`prop_ack_received_by_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `prop_ack_tbl_ibfk_3` FOREIGN KEY (`prop_ack_issued_by_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `prop_ack_tbl_ibfk_4` FOREIGN KEY (`prop_ack_deli_stats`) REFERENCES `delivery_status_tbl` (`delivery_stat_id`),
  CONSTRAINT `prop_ack_tbl_ibfk_5` FOREIGN KEY (`prop_ack_bid_stats`) REFERENCES `bid_status` (`bid_stat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prop_ack_tbl`
--

LOCK TABLES `prop_ack_tbl` WRITE;
/*!40000 ALTER TABLE `prop_ack_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `prop_ack_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `roles_departments_view`
--

DROP TABLE IF EXISTS `roles_departments_view`;
/*!50001 DROP VIEW IF EXISTS `roles_departments_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `roles_departments_view` AS SELECT 
 1 AS `role_id`,
 1 AS `role_name`,
 1 AS `Department`,
 1 AS `Under`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `roles_tbl`
--

DROP TABLE IF EXISTS `roles_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles_tbl` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) DEFAULT NULL,
  `role_dep_id_fk` int DEFAULT NULL,
  `role_parent_role_id` int DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  KEY `role_dep_id_fk` (`role_dep_id_fk`),
  KEY `role_parent_role_id` (`role_parent_role_id`),
  CONSTRAINT `roles_tbl_ibfk_1` FOREIGN KEY (`role_dep_id_fk`) REFERENCES `departments_tbl` (`dep_id`),
  CONSTRAINT `roles_tbl_ibfk_2` FOREIGN KEY (`role_parent_role_id`) REFERENCES `roles_tbl` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_tbl`
--

LOCK TABLES `roles_tbl` WRITE;
/*!40000 ALTER TABLE `roles_tbl` DISABLE KEYS */;
INSERT INTO `roles_tbl` VALUES (1,'Campus Director',35,1),(2,'Assistant Director for Academic Affairs ',36,1),(3,'Assistant Director for Administration and Finance ',37,1),(4,'Assistant Director for Research and Extension',38,1),(5,'Department Head - Basic Arts and Sciences Department',1,2),(6,'Department Head - Civil and Allied Department',2,2),(7,'Department Head - Mechanical and Allied Department',3,2),(8,'Department Head - Electrical and Allied Department',4,2),(9,'Planning Officer',30,1),(10,'Section Head - Human Resource Management',14,3),(11,'Section Head - Property and Supply',15,3),(12,'Section Head - Procurement',16,3),(13,'Section Head - Infrastructure Development',17,3),(14,'Section Head - Building and Grounds Maintenance',18,3),(15,'Section Head - Accounting',19,3),(16,'Section Head - Budgeting',20,3),(17,'Section Head - Collecting and Disbursing',21,3),(18,'Section Head - Medical Services',22,3),(19,'Section Head - Dental Services',23,3),(20,'Section Head - Records Management',24,3),(21,'Section Head - BAC Secretariat',25,3),(22,'Section Head - Campus Business Manager',26,3),(23,'Head - Office of Student Affairs',5,2),(24,'Head - Admission, Guidance and Counseling',6,2),(25,'Head - National Service Training Program',31,2),(26,'Head - Literacy Training Service',32,2),(27,'Head - Reserve Officers Training Corps',33,2),(28,'Head - Civic Welfare and Training Service',34,2),(29,'Section Head - Registration',27,24),(30,'Section Head - Learning Resource Center',28,23),(31,'Section Head - Sports and Cultural Development',29,23),(32,'Section Head - Bachelor of Engineering Technology Major in Chemical Technology',2,6),(33,'Section Head - Bachelor of Science in Environmental Science',2,6),(34,'Section Head - Bachelor of Science in Civil Engineering',2,6),(35,'Section Head - Bachelor of Engineering Technology Major in Civil Technology',2,6),(36,'Section Head - Bachelor of Science in Electronics Engineering',4,8),(37,'Section Head - Bachelor of Engineering Technology Major in Electronics Technology',4,8),(38,'Section Head - Bachelor of Science in Information Technology',4,8),(39,'Section Head - Bachelor of Science in Electrical Engineering',4,8),(40,'Section Head - Bachelor of Engineering Technology Major in Electrical Technology',4,8),(41,'Section Head - Bachelor of Engineering Technology Major in Instrumentation and Controls',4,8),(42,'Section Head - Bachelor of Engineering Technology Major in Mechatronics Technology',4,8),(43,'Section Head - Bachelor of Science in Mechanical Engineering',3,7),(44,'Section Head - Bachelor of Engineering Technology Major in Heating, Ventilation and Air Conditioning, and Refrigeration Technology',3,7),(45,'Section Head - Bachelor of Engineering Technology Major in Dies and Moulds Technology',3,7),(46,'Section Head - Bachelor of Engineering Technology Major in Non-Destructive Testing Technology',3,7),(47,'Section Head - Bachelor of Engineering Technology Major in Electromechanical Technology',3,7),(48,'Section Head - Bachelor of Engineering Technology Major in Automotive Technology',3,7),(49,'Section Head - Bachelor of Engineering Technology Major in Mechanical Technology',3,7),(123,'Head - Research and Development Services',7,4),(124,'Head - Extension Services',8,4),(125,'Head - Innovation Technology Support Office',9,4),(126,'Head - Technology Licensing Office Coordinator',10,4),(127,'Head - Quality Assurance',11,1),(128,'Head - University Information Technology Center',12,1),(129,'Head - Gender and Development',13,1),(131,'Head - Project Management Committee',39,3),(132,'Office Personnel - Science Research Analyst I',35,1),(133,'Office Personnel - Program Coordinator',36,2),(134,'Office Personnel',36,2),(135,'Office Personnel - Administrative Aide VI',37,3),(136,'Office Personnel',37,3),(137,'Office Personnel',38,4),(138,'Office Personnel ',5,23),(139,'Office Personnel',27,29),(140,'Office Personnel - Guidance Coordinator ',6,24),(141,'Office Personnel - Nurse II',22,18),(142,'Office Personnel - System Developer',12,128),(143,'Office Personnel - Website Admin',12,128),(144,'Office Personnel - College Librarian II',28,30),(145,'Office Personnel - College Librarian I',28,30),(146,'Section Head - Bachelor of Technical-Vocational Teacher Education',1,5),(147,'Office Personnel',NULL,NULL);
/*!40000 ALTER TABLE `roles_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `user_department_view`
--

DROP TABLE IF EXISTS `user_department_view`;
/*!50001 DROP VIEW IF EXISTS `user_department_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `user_department_view` AS SELECT 
 1 AS `user_id`,
 1 AS `user_tupid`,
 1 AS `user_firstname`,
 1 AS `user_lastname`,
 1 AS `user_email`,
 1 AS `role_name`,
 1 AS `department_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_departments_tbl`
--

DROP TABLE IF EXISTS `user_departments_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_departments_tbl` (
  `user_id_fk` int NOT NULL,
  `department_id_fk` int NOT NULL,
  PRIMARY KEY (`user_id_fk`,`department_id_fk`),
  KEY `department_id_fk` (`department_id_fk`),
  CONSTRAINT `user_departments_tbl_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `user_departments_tbl_ibfk_2` FOREIGN KEY (`department_id_fk`) REFERENCES `departments_tbl` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_departments_tbl`
--

LOCK TABLES `user_departments_tbl` WRITE;
/*!40000 ALTER TABLE `user_departments_tbl` DISABLE KEYS */;
INSERT INTO `user_departments_tbl` VALUES (34,1),(47,1),(35,2),(51,2),(52,2),(37,3),(49,3),(58,3),(59,3),(60,3),(61,3),(62,3),(36,4),(53,4),(54,4),(55,4),(56,4),(57,4),(15,5),(16,5),(17,5),(15,6),(16,6),(22,6),(23,6),(9,7),(10,8),(11,9),(11,10),(64,11),(27,12),(28,12),(29,12),(65,13),(26,22),(18,27),(19,27),(20,27),(21,27),(30,28),(31,28),(32,28),(33,29),(63,30),(48,31),(49,33),(50,34),(1,35),(2,35),(3,36),(4,36),(5,36),(6,37),(7,37),(13,37),(24,37),(25,37),(38,37),(39,37),(40,37),(41,37),(42,37),(43,37),(44,37),(45,37),(46,37),(8,38),(12,38),(14,38);
/*!40000 ALTER TABLE `user_departments_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_department_tbl`
--

DROP TABLE IF EXISTS `user_role_department_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role_department_tbl` (
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `department_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`department_id`),
  KEY `role_id` (`role_id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `user_role_department_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `user_role_department_tbl_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles_tbl` (`role_id`),
  CONSTRAINT `user_role_department_tbl_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `departments_tbl` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_department_tbl`
--

LOCK TABLES `user_role_department_tbl` WRITE;
/*!40000 ALTER TABLE `user_role_department_tbl` DISABLE KEYS */;
INSERT INTO `user_role_department_tbl` VALUES (1,1,35),(3,2,36),(6,3,37),(8,4,38),(34,5,1),(35,6,2),(37,7,3),(36,8,4),(63,9,30),(38,10,37),(40,11,15),(42,12,16),(43,13,17),(45,14,18),(39,15,19),(41,16,20),(24,18,37),(25,19,37),(46,20,24),(46,21,25),(15,23,5),(15,24,6),(48,25,31),(48,26,31),(49,27,3),(50,28,34),(18,29,27),(30,30,28),(33,31,29),(51,32,2),(51,33,2),(52,34,2),(52,35,2),(53,36,4),(53,37,4),(54,38,4),(55,39,4),(56,40,4),(57,41,4),(57,42,4),(58,43,3),(58,44,3),(59,45,3),(60,46,3),(61,47,3),(62,48,3),(49,49,33),(9,123,7),(10,124,8),(11,125,9),(11,125,10),(64,127,11),(27,128,12),(65,129,13),(44,131,39),(4,133,36),(5,134,36),(7,135,37),(2,137,35),(12,137,38),(13,137,37),(14,137,38),(16,138,5),(17,138,5),(19,139,27),(20,139,27),(21,139,27),(16,140,6),(22,140,6),(23,140,6),(26,141,22),(28,142,12),(29,143,12),(31,144,28),(32,145,28),(47,146,1);
/*!40000 ALTER TABLE `user_role_department_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `user_roles_and_department`
--

DROP TABLE IF EXISTS `user_roles_and_department`;
/*!50001 DROP VIEW IF EXISTS `user_roles_and_department`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `user_roles_and_department` AS SELECT 
 1 AS `user_id`,
 1 AS `user_fullname`,
 1 AS `role_name`,
 1 AS `department_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `user_roles_departments_view`
--

DROP TABLE IF EXISTS `user_roles_departments_view`;
/*!50001 DROP VIEW IF EXISTS `user_roles_departments_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `user_roles_departments_view` AS SELECT 
 1 AS `user_id`,
 1 AS `user_tupid`,
 1 AS `user_firstname`,
 1 AS `user_lastname`,
 1 AS `user_email`,
 1 AS `role_name`,
 1 AS `department_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_roles_tbl`
--

DROP TABLE IF EXISTS `user_roles_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles_tbl` (
  `user_id_fk` int NOT NULL,
  `role_id_fk` int NOT NULL,
  PRIMARY KEY (`user_id_fk`,`role_id_fk`),
  KEY `role_id_fk` (`role_id_fk`),
  CONSTRAINT `user_roles_tbl_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `user_roles_tbl_ibfk_2` FOREIGN KEY (`role_id_fk`) REFERENCES `roles_tbl` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles_tbl`
--

LOCK TABLES `user_roles_tbl` WRITE;
/*!40000 ALTER TABLE `user_roles_tbl` DISABLE KEYS */;
INSERT INTO `user_roles_tbl` VALUES (1,1),(3,2),(6,3),(8,4),(34,5),(35,6),(37,7),(36,8),(63,9),(38,10),(40,11),(42,12),(43,13),(45,14),(39,15),(41,16),(24,18),(25,19),(46,20),(46,21),(15,23),(15,24),(48,25),(48,26),(49,27),(50,28),(18,29),(30,30),(33,31),(51,32),(51,33),(52,34),(52,35),(53,36),(53,37),(54,38),(55,39),(56,40),(57,41),(57,42),(58,43),(58,44),(59,45),(60,46),(61,47),(62,48),(49,49),(9,123),(10,124),(11,125),(64,127),(27,128),(65,129),(44,131),(2,132),(4,133),(5,134),(7,135),(2,137),(12,137),(13,137),(14,137),(16,138),(17,138),(19,139),(20,139),(21,139),(16,140),(22,140),(23,140),(26,141),(28,142),(29,143),(31,144),(32,145),(47,146);
/*!40000 ALTER TABLE `user_roles_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_tbl`
--

DROP TABLE IF EXISTS `users_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_tbl` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(80) DEFAULT NULL,
  `user_middlename` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(50) DEFAULT NULL,
  `user_fullname` varchar(100) GENERATED ALWAYS AS (concat_ws(_utf8mb4' ',`user_firstname`,`user_middlename`,`user_lastname`,`user_suffix`)) VIRTUAL,
  `user_email` varchar(70) DEFAULT NULL,
  `user_password` varchar(70) DEFAULT NULL,
  `user_type` enum('Staff','Faculty','Both') DEFAULT 'Staff',
  `user_suffix` varchar(15) DEFAULT NULL,
  `user_tupid` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tbl`
--

LOCK TABLES `users_tbl` WRITE;
/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` (`user_id`, `user_firstname`, `user_middlename`, `user_lastname`, `user_email`, `user_password`, `user_type`, `user_suffix`, `user_tupid`) VALUES (1,'Rexmelle','F.','Decapia',NULL,NULL,'Staff',NULL,NULL),(2,'Ruby','T.','Villanueva',NULL,NULL,'Staff',NULL,NULL),(3,'Glenn','N.','Ortiz',NULL,NULL,'Staff',NULL,NULL),(4,'Ivan Ray','G. ','Ancero',NULL,NULL,'Both',NULL,NULL),(5,'Krystel May','R.','Alvarado',NULL,NULL,'Both',NULL,NULL),(6,'Christian','C.','Calingasan',NULL,NULL,'Staff',NULL,NULL),(7,'Corazon ','C.','Dela Rosa',NULL,NULL,'Staff',NULL,NULL),(8,'Emmanuel','L.','Ferrer',NULL,NULL,'Staff',NULL,NULL),(9,'Hector','M.','Tibo',NULL,NULL,'Staff',NULL,NULL),(10,'Lieda','A.','Sobida',NULL,NULL,'Both',NULL,NULL),(11,'Jane','E.','Morgado',NULL,NULL,'Staff',NULL,NULL),(12,'Ramil Leonardo','H.','Africa',NULL,NULL,'Staff',NULL,NULL),(13,'Maureen','A.','Salve',NULL,NULL,'Staff',NULL,NULL),(14,'Cindy','Q.','Maldecir',NULL,NULL,'Staff',NULL,NULL),(15,'Mitchie','M.','Caurel',NULL,NULL,'Staff',NULL,NULL),(16,'Christopher Mitchel','I.','Azuelo',NULL,NULL,'Staff',NULL,NULL),(17,'Mary Rose Gabrielle','F.','Habla',NULL,NULL,'Staff',NULL,NULL),(18,'Menerva Pesito',NULL,'Doctor',NULL,NULL,'Staff',NULL,NULL),(19,'Grace','D.','Usana',NULL,NULL,'Staff',NULL,NULL),(20,'Jenneth','L.','Yu',NULL,NULL,'Staff',NULL,NULL),(21,'Roselle','L.','Honorio',NULL,NULL,'Staff',NULL,NULL),(22,'Neizzel Joy','T.','Labro-Azuelo',NULL,NULL,'Staff',NULL,NULL),(23,'Ma. Clowee Anne','M.','Sarmiento',NULL,NULL,'Staff',NULL,NULL),(24,'Vivian','T.','Pangan',NULL,NULL,'Staff',NULL,NULL),(25,'Normita','M.','Mata',NULL,NULL,'Staff',NULL,NULL),(26,'Maria Carina','V.','Silvino',NULL,NULL,'Staff',NULL,NULL),(27,'Jim','A.','Linda',NULL,NULL,'Staff',NULL,NULL),(28,'Patrick Justin','L.','Ariado',NULL,NULL,'Staff',NULL,NULL),(29,'Lizette','P.','Terania',NULL,NULL,'Staff',NULL,NULL),(30,'Roy','J.','Garbin',NULL,NULL,'Staff',NULL,NULL),(31,'Leilani','G.','Oledan',NULL,NULL,'Staff',NULL,NULL),(32,'Anna Marie','A.','Dalaguit',NULL,NULL,'Staff',NULL,NULL),(33,'Rogelio','C.','Mercurio',NULL,NULL,'Staff','III',NULL),(34,'Heherson','P.','Ramos',NULL,NULL,'Staff',NULL,NULL),(35,'Norway','J.','Pangan',NULL,NULL,'Staff',NULL,NULL),(36,'Raymund','M.','Lozada',NULL,NULL,'Staff',NULL,NULL),(37,'June Raymond','L.','Mariano',NULL,NULL,'Staff',NULL,NULL),(38,'Ma. Lizette','G.','Peña',NULL,NULL,'Staff',NULL,NULL),(39,'Juliet','T.','Narez',NULL,NULL,'Staff',NULL,NULL),(40,'Ronnie','A.','Ramos',NULL,NULL,'Staff',NULL,NULL),(41,'Flordeliza','Y.','Valdez',NULL,NULL,'Staff',NULL,NULL),(42,'Enrique','A.','Silvino',NULL,NULL,'Staff',NULL,NULL),(43,'Roilene','C.','Pagatpat',NULL,NULL,'Staff',NULL,NULL),(44,'Janiel Mico','D.','Panganiban',NULL,NULL,'Staff',NULL,NULL),(45,'Sanjie Dutt','A.','Kumar',NULL,NULL,'Staff',NULL,NULL),(46,'Al-Stephenson','B.','Lapastora',NULL,NULL,'Staff',NULL,NULL),(47,'Cesar','S.','Mendoza',NULL,NULL,'Staff',NULL,NULL),(48,'Reginald','B.','Cutanda',NULL,NULL,'Staff',NULL,NULL),(49,'Clinton','P.','Icuspit',NULL,NULL,'Staff',NULL,NULL),(50,'Maria Gena','C.','Cruz',NULL,NULL,'Staff',NULL,NULL),(51,'Christopher','B.','Parmis',NULL,NULL,'Staff',NULL,NULL),(52,'Maricel','S.','Ochoa',NULL,NULL,'Staff',NULL,NULL),(53,'Marcelo','V.','Rivera',NULL,NULL,'Staff',NULL,NULL),(54,'Julius Delfin','A.','Silang',NULL,NULL,'Staff',NULL,NULL),(55,'Edwin','P.','Roldan',NULL,NULL,'Staff',NULL,NULL),(56,'Renante','D.','Junto',NULL,NULL,'Staff',NULL,NULL),(57,'Rica Jane','Y.','Kosca',NULL,NULL,'Staff',NULL,NULL),(58,'Triztan','S.','Dela Cruz',NULL,NULL,'Staff',NULL,NULL),(59,'Aldwin','C.','Aggabao',NULL,NULL,'Staff',NULL,NULL),(60,'Nemalyn','P.','Decapia',NULL,NULL,'Staff',NULL,NULL),(61,'Teodoro','M.','Nimuan',NULL,NULL,'Staff',NULL,NULL),(62,'Eugene','C.','Singson',NULL,NULL,'Staff',NULL,NULL),(63,'Jediah','P.','Puertollano',NULL,NULL,'Staff',NULL,NULL),(64,'Angelica','F.','Olivar',NULL,NULL,'Staff',NULL,NULL),(65,'Annaline','C.','Tanto',NULL,NULL,'Staff',NULL,NULL);
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_user_roles_departments`
--

DROP TABLE IF EXISTS `view_user_roles_departments`;
/*!50001 DROP VIEW IF EXISTS `view_user_roles_departments`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_user_roles_departments` AS SELECT 
 1 AS `user_id`,
 1 AS `tupt_id`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `email`,
 1 AS `role`,
 1 AS `department`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `roles_departments_view`
--

/*!50001 DROP VIEW IF EXISTS `roles_departments_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `roles_departments_view` AS select `r`.`role_id` AS `role_id`,`r`.`role_name` AS `role_name`,`d`.`dep_name` AS `Department`,`parent`.`role_name` AS `Under` from ((`roles_tbl` `r` left join `departments_tbl` `d` on((`r`.`role_dep_id_fk` = `d`.`dep_id`))) left join `roles_tbl` `parent` on((`r`.`role_parent_role_id` = `parent`.`role_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user_department_view`
--

/*!50001 DROP VIEW IF EXISTS `user_department_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_department_view` AS select `u`.`user_id` AS `user_id`,`u`.`user_tupid` AS `user_tupid`,`u`.`user_firstname` AS `user_firstname`,`u`.`user_lastname` AS `user_lastname`,`u`.`user_email` AS `user_email`,`r`.`role_name` AS `role_name`,`d`.`dep_name` AS `department_name` from ((((`users_tbl` `u` left join `user_roles_tbl` `ur` on((`u`.`user_id` = `ur`.`user_id_fk`))) left join `roles_tbl` `r` on((`ur`.`role_id_fk` = `r`.`role_id`))) left join `user_departments_tbl` `ud` on((`u`.`user_id` = `ud`.`user_id_fk`))) left join `departments_tbl` `d` on((`ud`.`department_id_fk` = `d`.`dep_id`))) order by `u`.`user_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user_roles_and_department`
--

/*!50001 DROP VIEW IF EXISTS `user_roles_and_department`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_roles_and_department` AS select `u`.`user_id` AS `user_id`,`u`.`user_fullname` AS `user_fullname`,`r`.`role_name` AS `role_name`,`d`.`dep_name` AS `department_name` from ((((`users_tbl` `u` left join `user_roles_tbl` `ur` on((`u`.`user_id` = `ur`.`user_id_fk`))) left join `roles_tbl` `r` on((`ur`.`role_id_fk` = `r`.`role_id`))) left join `user_departments_tbl` `ud` on((`u`.`user_id` = `ud`.`user_id_fk`))) left join `departments_tbl` `d` on((`ud`.`department_id_fk` = `d`.`dep_id`))) order by `u`.`user_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user_roles_departments_view`
--

/*!50001 DROP VIEW IF EXISTS `user_roles_departments_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_roles_departments_view` AS select `u`.`user_id` AS `user_id`,`u`.`user_tupid` AS `user_tupid`,`u`.`user_firstname` AS `user_firstname`,`u`.`user_lastname` AS `user_lastname`,`u`.`user_email` AS `user_email`,`r`.`role_name` AS `role_name`,(select `d`.`dep_name` from (`user_departments_tbl` `ud2` join `departments_tbl` `d` on((`d`.`dep_id` = `ud2`.`department_id_fk`))) where (`ud2`.`user_id_fk` = `u`.`user_id`) order by `d`.`dep_id` limit 1) AS `department_name` from ((`users_tbl` `u` join `user_roles_tbl` `ur` on((`ur`.`user_id_fk` = `u`.`user_id`))) join `roles_tbl` `r` on((`r`.`role_id` = `ur`.`role_id_fk`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_user_roles_departments`
--

/*!50001 DROP VIEW IF EXISTS `view_user_roles_departments`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_user_roles_departments` AS select `u`.`user_id` AS `user_id`,`u`.`user_tupid` AS `tupt_id`,`u`.`user_firstname` AS `first_name`,`u`.`user_lastname` AS `last_name`,`u`.`user_email` AS `email`,`r`.`role_name` AS `role`,`d`.`dep_name` AS `department` from (((`user_role_department_tbl` `urd` join `users_tbl` `u` on((`urd`.`user_id` = `u`.`user_id`))) join `roles_tbl` `r` on((`urd`.`role_id` = `r`.`role_id`))) join `departments_tbl` `d` on((`urd`.`department_id` = `d`.`dep_id`))) order by `u`.`user_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-18 11:55:40
