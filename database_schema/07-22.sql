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
-- Table structure for table `admins_tbl`
--

DROP TABLE IF EXISTS `admins_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins_tbl` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `admin_key` int DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `admin_key` (`admin_key`),
  CONSTRAINT `admins_tbl_ibfk_1` FOREIGN KEY (`admin_key`) REFERENCES `master_keys_tbl` (`master_key_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins_tbl`
--

LOCK TABLES `admins_tbl` WRITE;
/*!40000 ALTER TABLE `admins_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins_tbl` ENABLE KEYS */;
UNLOCK TABLES;

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
  `app_item_pmo` varchar(150) DEFAULT NULL,
  `app_item_mode` varchar(100) DEFAULT NULL,
  `app_item_estimated_total` decimal(10,2) DEFAULT NULL,
  `app_item_estimated_mooe` decimal(10,2) DEFAULT NULL,
  `app_item_estimated_co` decimal(10,2) DEFAULT NULL,
  `app_item_remarks` varchar(150) DEFAULT NULL,
  `app_item_adspost` date DEFAULT NULL,
  `app_item_subopen` date DEFAULT NULL,
  `app_item_notice` date DEFAULT NULL,
  `app_item_contract` date DEFAULT NULL,
  `app_item_source_fund` varchar(100) DEFAULT NULL,
  `app_item_code` varchar(20) DEFAULT NULL,
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
  `app_prepared_by_name` int DEFAULT NULL,
  `app_prepared_by_designation` varchar(100) DEFAULT NULL,
  `app_recommending_by_name` int DEFAULT NULL,
  `app_recommending_by_designation` varchar(100) DEFAULT NULL,
  `app_approved_by_name` int DEFAULT NULL,
  `app_approved_by_designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`app_id`),
  KEY `app_ppmp_items_id_fk` (`app_ppmp_items_id_fk`),
  KEY `fk_app_prepared_by_name` (`app_prepared_by_name`),
  KEY `fk_app_recommending_by_name` (`app_recommending_by_name`),
  KEY `fk_app_approved_by_name` (`app_approved_by_name`),
  CONSTRAINT `app_tbl_ibfk_1` FOREIGN KEY (`app_ppmp_items_id_fk`) REFERENCES `ppmp_tbl` (`ppmp_id`),
  CONSTRAINT `fk_app_approved_by_name` FOREIGN KEY (`app_approved_by_name`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `fk_app_prepared_by_name` FOREIGN KEY (`app_prepared_by_name`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `fk_app_recommending_by_name` FOREIGN KEY (`app_recommending_by_name`) REFERENCES `users_tbl` (`user_id`)
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
-- Table structure for table `dep_budget_tbl`
--

DROP TABLE IF EXISTS `dep_budget_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dep_budget_tbl` (
  `bud_id` int NOT NULL AUTO_INCREMENT,
  `bud_dep_fk` int DEFAULT NULL,
  `bud_year` year DEFAULT NULL,
  `bud_total` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`bud_id`),
  KEY `bud_dep_fk` (`bud_dep_fk`),
  CONSTRAINT `dep_budget_tbl_ibfk_1` FOREIGN KEY (`bud_dep_fk`) REFERENCES `departments_tbl` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dep_budget_tbl`
--

LOCK TABLES `dep_budget_tbl` WRITE;
/*!40000 ALTER TABLE `dep_budget_tbl` DISABLE KEYS */;
INSERT INTO `dep_budget_tbl` VALUES (1,1,2025,150.00),(2,2,2025,200.00),(3,3,2025,200.00),(4,4,NULL,200.00),(5,5,NULL,200.00),(6,6,NULL,200.00),(7,7,NULL,200.00),(8,8,NULL,200.00),(9,9,NULL,200.00),(10,10,NULL,200.00),(11,11,NULL,200.00),(12,12,NULL,200.00),(13,13,NULL,200.00),(14,14,NULL,200.00),(15,15,NULL,200.00),(16,16,NULL,200.00),(17,17,NULL,200.00),(18,18,NULL,200.00),(19,19,NULL,200.00),(20,20,NULL,200.00),(21,21,NULL,200.00),(22,22,NULL,200.00),(23,23,NULL,200.00),(24,24,NULL,200.00),(25,25,NULL,200.00),(26,26,NULL,200.00),(27,27,NULL,200.00),(28,28,NULL,200.00),(29,29,NULL,200.00),(30,30,NULL,200.00),(31,31,NULL,200.00),(32,35,NULL,200.00),(33,36,NULL,200.00),(34,37,NULL,200.00),(35,38,NULL,200.00),(36,39,NULL,200.00);
/*!40000 ALTER TABLE `dep_budget_tbl` ENABLE KEYS */;
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
INSERT INTO `departments_tbl` VALUES (1,'Basic Arts and Sciences Department','Academic'),(2,'Civil and Allied Department','Academic'),(3,'Mechanical and Allied Department','Academic'),(4,'Electrical and Allied Department','Academic'),(5,'Office of Student Affairs','Administrative'),(6,'Admission, Guidance and Counseling','Administrative'),(7,'Research and Development Services','Administrative'),(8,'Extension Services','Administrative'),(9,'Innovation and Technology Support Office','Administrative'),(10,'Technology Licensing Office Coordinator','Administrative'),(11,'Quality Assurance','Administrative'),(12,'University Information Technology Center','Administrative'),(13,'Gender and Development','Administrative'),(14,'Human Resource Management','Administrative'),(15,'Property and Supply','Administrative'),(16,'Procurement','Administrative'),(17,'Infrastructure Development','Administrative'),(18,'Building and Grounds Maintenance','Administrative'),(19,'Accounting','Administrative'),(20,'Budgeting','Administrative'),(21,'Collecting and Disbursing','Administrative'),(22,'Medical Services','Administrative'),(23,'Dental Services','Administrative'),(24,'Records Management','Administrative'),(25,'BAC Secretariat','Administrative'),(26,'Campus Business Manager','Administrative'),(27,'Registration','Administrative'),(28,'Learning Resource Center','Administrative'),(29,'Sports and Cultural Development','Administrative'),(30,'Planning Office','Administrative'),(31,'National Service Training Program','Administrative'),(35,'Director\'s Office','Administrative'),(36,'Assistant Director for Academic Affairs Office','Administrative'),(37,'Assistant Director for Admin and Finance Office','Administrative'),(38,'Assistant Director for Research and Extension Office','Administrative'),(39,'Project Management Committee','Administrative');
/*!40000 ALTER TABLE `departments_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files_tbl`
--

DROP TABLE IF EXISTS `files_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files_tbl` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_type` enum('ppmp','app','pr','po','ics','par') DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_uploaded_by` int DEFAULT NULL,
  `file_sent_to` int DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  KEY `file_uploaded_by` (`file_uploaded_by`),
  KEY `file_sent_to` (`file_sent_to`),
  CONSTRAINT `files_tbl_ibfk_1` FOREIGN KEY (`file_uploaded_by`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `files_tbl_ibfk_2` FOREIGN KEY (`file_sent_to`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files_tbl`
--

LOCK TABLES `files_tbl` WRITE;
/*!40000 ALTER TABLE `files_tbl` DISABLE KEYS */;
INSERT INTO `files_tbl` VALUES (1,'ppmp','Project_Procurement_Management_Plan_20250711_074155.xlsx',72,NULL,'writable/uploads/ppmp/Project_Procurement_Management_Plan_20250711_074155.xlsx'),(2,'ppmp','Project_Procurement_Management_Plan_20250711_074307.xlsx',72,NULL,'writable/uploads/ppmp/Project_Procurement_Management_Plan_20250711_074307.xlsx'),(3,'pr','Purchase_Request_20250711_075406.xlsx',72,NULL,'writable/uploads/pr/Purchase_Request_20250711_075406.xlsx'),(4,'pr','Purchase_Request_20250711_080548.xlsx',72,NULL,'writable/uploads/pr/Purchase_Request_20250711_080548.xlsx'),(5,'ppmp','Project_Procurement_Management_Plan_20250713_012637.xlsx',72,NULL,'writable/uploads/ppmp/Project_Procurement_Management_Plan_20250713_012637.xlsx'),(6,'pr','Purchase_Request_20250713_012647.xlsx',72,NULL,'writable/uploads/pr/Purchase_Request_20250713_012647.xlsx'),(7,'pr','Purchase_Request_20250713_014444.xlsx',72,NULL,'writable/uploads/pr/Purchase_Request_20250713_014444.xlsx');
/*!40000 ALTER TABLE `files_tbl` ENABLE KEYS */;
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
-- Table structure for table `master_keys_tbl`
--

DROP TABLE IF EXISTS `master_keys_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_keys_tbl` (
  `master_key_id` int NOT NULL AUTO_INCREMENT,
  `master_key` varchar(100) NOT NULL,
  `master_key_is_used` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`master_key_id`),
  UNIQUE KEY `master_key` (`master_key`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_keys_tbl`
--

LOCK TABLES `master_keys_tbl` WRITE;
/*!40000 ALTER TABLE `master_keys_tbl` DISABLE KEYS */;
INSERT INTO `master_keys_tbl` VALUES (1,'6oYknwNzbC',0),(2,'J54oN8U6p6',0),(3,'rx0qnPiajP',0),(4,'yz5QBm908y',0),(5,'MAjqqnoQK0',0);
/*!40000 ALTER TABLE `master_keys_tbl` ENABLE KEYS */;
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
  `mr_date_received` date DEFAULT NULL,
  PRIMARY KEY (`mr_item_id`),
  KEY `mr_id_fk` (`mr_id_fk`),
  KEY `mr_po_fk` (`mr_po_fk`),
  CONSTRAINT `mr_items_tbl_ibfk_1` FOREIGN KEY (`mr_id_fk`) REFERENCES `mr_tbl` (`mr_id`),
  CONSTRAINT `mr_items_tbl_ibfk_2` FOREIGN KEY (`mr_po_fk`) REFERENCES `po_tbl` (`po_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr_tbl`
--

LOCK TABLES `mr_tbl` WRITE;
/*!40000 ALTER TABLE `mr_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `mr_tbl` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `ppmp_item_code` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ppmp_item_id`),
  KEY `ppmp_id_fk` (`ppmp_id_fk`),
  CONSTRAINT `ppmp_items_tbl_ibfk_1` FOREIGN KEY (`ppmp_id_fk`) REFERENCES `ppmp_tbl` (`ppmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppmp_items_tbl`
--

LOCK TABLES `ppmp_items_tbl` WRITE;
/*!40000 ALTER TABLE `ppmp_items_tbl` DISABLE KEYS */;
INSERT INTO `ppmp_items_tbl` VALUES (12,5,'akjbakjfb','12',123.00,0,0,0,1,0,0,0,0,0,0,0,0,'123'),(13,5,'asnf ','51',135.00,0,1,0,0,0,0,0,0,0,0,0,0,'1254'),(14,5,'iuf','23',2.00,0,0,0,0,0,0,1,0,0,0,0,0,'123'),(15,5,'asfn','2',42.00,0,0,0,0,0,0,0,0,0,0,0,1,'123'),(16,6,'akjbfkaj','12',123.00,0,0,0,0,0,0,0,0,0,0,1,0,'123'),(17,6,'lakwf','23',51.00,0,0,0,0,1,0,0,0,0,0,0,0,'153'),(18,7,'','',0.00,0,0,0,0,0,0,0,0,0,0,0,0,'aaaa'),(19,8,'Blanket','1',3333.00,0,1,1,0,0,0,0,0,0,0,0,0,'123'),(21,10,'DCCSA','123',3213.00,0,1,1,0,0,0,0,0,0,0,0,0,'123');
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
  `ppmp_total_proposed_budget` decimal(12,2) DEFAULT NULL,
  `ppmp_total_budget_allocated` decimal(12,2) DEFAULT NULL,
  `ppmp_period_covered` year DEFAULT NULL,
  `ppmp_prepared_by_name` int DEFAULT NULL,
  `ppmp_evaluated_by_name` int DEFAULT NULL,
  `ppmp_remarks` varchar(100) DEFAULT NULL,
  `ppmp_date_approved` varchar(50) DEFAULT NULL,
  `ppmp_recommended_by_name` int DEFAULT NULL,
  `ppmp_prepared_by_position` varchar(100) DEFAULT NULL,
  `ppmp_recommended_by_position` varchar(100) DEFAULT NULL,
  `ppmp_evaluated_by_position` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ppmp_id`),
  KEY `ppmp_office_fk` (`ppmp_office_fk`),
  KEY `ppmp_date_submitted_fk` (`ppmp_prepared_by_name`),
  KEY `ppmp_evaluated_by_user_fk` (`ppmp_evaluated_by_name`),
  KEY `fk_ppmp_recommended_by` (`ppmp_recommended_by_name`),
  CONSTRAINT `fk_ppmp_evaluated_by` FOREIGN KEY (`ppmp_evaluated_by_name`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `fk_ppmp_prepared_by` FOREIGN KEY (`ppmp_prepared_by_name`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `fk_ppmp_recommended_by` FOREIGN KEY (`ppmp_recommended_by_name`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `ppmp_tbl_ibfk_1` FOREIGN KEY (`ppmp_office_fk`) REFERENCES `departments_tbl` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppmp_tbl`
--

LOCK TABLES `ppmp_tbl` WRITE;
/*!40000 ALTER TABLE `ppmp_tbl` DISABLE KEYS */;
INSERT INTO `ppmp_tbl` VALUES (5,'Pending',37,8924.00,909.00,2009,41,62,'PPMP submitted','07/15/2025',49,'awf','asf','asf'),(6,'Pending',6,8924.00,909.00,2009,49,7,'PPMP submitted','07/15/2025',14,'aobfafb','asf','aoiwf'),(7,'Approved',37,0.00,0.00,0000,3,37,'PPMP submitted','',49,'aaaa','aaaa','aaaa'),(8,'Pending',20,200000.00,200000.00,2025,6,65,'PPMP submitted','07/19/2025',3,'Department Head - CAAD','Campus Director','Head - GAD'),(10,'Approved',2,1201313213.00,100000.00,2025,6,65,'PPMP submitted','07/19/2025',3,'Department Head - CAAD','Campus Director','Head - GAD');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_items_tbl`
--

LOCK TABLES `pr_items_tbl` WRITE;
/*!40000 ALTER TABLE `pr_items_tbl` DISABLE KEYS */;
INSERT INTO `pr_items_tbl` VALUES (1,1,0,0.00,0.00,'',''),(2,2,0,0.00,0.00,'',''),(3,3,0,0.00,0.00,'',''),(4,4,0,0.00,0.00,'','');
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
  `pr_department` int DEFAULT NULL,
  `pr_no_date` varchar(20) DEFAULT NULL,
  `pr_sai_no_date` varchar(20) DEFAULT NULL,
  `pr_printed_name` int DEFAULT NULL,
  `pr_designation` varchar(100) DEFAULT NULL,
  `pr_approved_by` int DEFAULT NULL,
  PRIMARY KEY (`pr_id`),
  KEY `pr_app_item_id` (`pr_app_item_id_fk`),
  KEY `fk_pr_department` (`pr_department`),
  KEY `fk_pr_printed_name` (`pr_printed_name`),
  KEY `fk_pr_approved_by` (`pr_approved_by`),
  CONSTRAINT `fk_pr_approved_by` FOREIGN KEY (`pr_approved_by`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `fk_pr_department` FOREIGN KEY (`pr_department`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `fk_pr_printed_name` FOREIGN KEY (`pr_printed_name`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `pr_tbl_ibfk_1` FOREIGN KEY (`pr_app_item_id_fk`) REFERENCES `app_items_tbl` (`app_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_tbl`
--

LOCK TABLES `pr_tbl` WRITE;
/*!40000 ALTER TABLE `pr_tbl` DISABLE KEYS */;
INSERT INTO `pr_tbl` VALUES (1,NULL,'adsa','Pending','Pending',NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,'csd','Pending','Pending',NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,'','Pending','Pending',NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,'','Pending','Pending',NULL,NULL,NULL,NULL,NULL,NULL);
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
  `gen_role` enum('Director','Assistant Director','Head','Planning Officer','Procurement','Supply','Faculty','Unassigned') DEFAULT 'Unassigned',
  PRIMARY KEY (`role_id`),
  KEY `role_dep_id_fk` (`role_dep_id_fk`),
  KEY `role_parent_role_id` (`role_parent_role_id`),
  CONSTRAINT `roles_tbl_ibfk_1` FOREIGN KEY (`role_dep_id_fk`) REFERENCES `departments_tbl` (`dep_id`),
  CONSTRAINT `roles_tbl_ibfk_2` FOREIGN KEY (`role_parent_role_id`) REFERENCES `roles_tbl` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_tbl`
--

LOCK TABLES `roles_tbl` WRITE;
/*!40000 ALTER TABLE `roles_tbl` DISABLE KEYS */;
INSERT INTO `roles_tbl` VALUES (1,'Campus Director',35,1,'Director'),(2,'Assistant Director for Academic Affairs',36,1,'Assistant Director'),(3,'Assistant Director for Administration and Finance ',37,1,'Assistant Director'),(4,'Assistant Director for Research and Extension',38,1,'Assistant Director'),(5,'Department Head - Basic Arts and Sciences Department',1,2,'Head'),(6,'Department Head - Civil and Allied Department',2,2,'Head'),(7,'Department Head - Mechanical and Allied Department',3,2,'Head'),(8,'Department Head - Electrical and Allied Department',4,2,'Head'),(9,'Planning Officer',30,1,'Planning Officer'),(10,'Head - Human Resource Management',14,3,'Head'),(11,'Head - Property and Supply',15,3,'Supply'),(12,'Head - Procurement',16,3,'Procurement'),(13,'Head - Infrastructure Development',17,3,'Head'),(14,'Head - Building and Grounds Maintenance',18,3,'Head'),(15,'Head - Accounting',19,3,'Head'),(16,'Head - Budgeting',20,3,'Head'),(17,'Head - Collecting and Disbursing',21,3,'Head'),(18,'Head - Medical Services',22,3,'Head'),(19,'Head - Dental Services',23,3,'Head'),(20,'Head - Records Management',24,3,'Head'),(21,'Head - BAC Secretariat',25,3,'Head'),(22,'Head - Campus Business Manager',26,3,'Head'),(23,'Head - Office of Student Affairs',5,2,'Head'),(24,'Head - Admission, Guidance and Counseling',6,2,'Head'),(25,'Head - National Service Training Program',31,2,'Head'),(30,'Head - Learning Resource Center',28,23,'Head'),(31,'Head - Sports and Cultural Development',29,23,'Head'),(32,'Head - Bachelor of Engineering Technology Major in Chemical Technology',2,6,'Faculty'),(33,'Head - Bachelor of Science in Environmental Science',2,6,'Faculty'),(34,'Head - Bachelor of Science in Civil Engineering',2,6,'Faculty'),(35,'Head - Bachelor of Engineering Technology Major in Civil Technology',2,6,'Faculty'),(36,'Head - Bachelor of Science in Electronics Engineering',4,8,'Faculty'),(37,'Head - Bachelor of Engineering Technology Major in Electronics Technology',4,8,'Faculty'),(38,'Head - Bachelor of Science in Information Technology',4,8,'Faculty'),(39,'Head - Bachelor of Science in Electrical Engineering',4,8,'Faculty'),(40,'Head - Bachelor of Engineering Technology Major in Electrical Technology',4,8,'Faculty'),(41,'Head - Bachelor of Engineering Technology Major in Instrumentation and Controls',4,8,'Faculty'),(42,'Head - Bachelor of Engineering Technology Major in Mechatronics Technology',4,8,'Faculty'),(43,'Head - Bachelor of Science in Mechanical Engineering',3,7,'Faculty'),(44,'Head - Bachelor of Engineering Technology Major in Heating, Ventilation and Air Conditioning, and Refrigeration Technology',3,7,'Faculty'),(45,'Head - Bachelor of Engineering Technology Major in Dies and Moulds Technology',3,7,'Faculty'),(46,'Head - Bachelor of Engineering Technology Major in Non-Destructive Testing Technology',3,7,'Faculty'),(47,'Head - Bachelor of Engineering Technology Major in Electromechanical Technology',3,7,'Faculty'),(48,'Head - Bachelor of Engineering Technology Major in Automotive Technology',3,7,'Faculty'),(49,'Head - Bachelor of Engineering Technology Major in Mechanical Technology',3,7,'Faculty'),(123,'Head - Research and Development Services',7,4,'Head'),(124,'Head - Extension Services',8,4,'Head'),(125,'Head - Innovation Technology Support Office',9,4,'Head'),(126,'Head - Technology Licensing Office Coordinator',10,4,'Head'),(127,'Head - Quality Assurance',11,1,'Head'),(128,'Head - University Information Technology Center',12,1,'Head'),(129,'Head - Gender and Development',13,1,'Head'),(131,'Head - Project Management Committee',39,3,'Head'),(146,'Head - Bachelor of Technical-Vocational Teacher Education',1,5,'Faculty');
/*!40000 ALTER TABLE `roles_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stepper_tbl`
--

DROP TABLE IF EXISTS `stepper_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stepper_tbl` (
  `stepper_id` int NOT NULL AUTO_INCREMENT,
  `stepper_dep_id_fk` int DEFAULT NULL,
  `stepper_phase` enum('PPMP','APP','PR','Bidding','PO','Delivery','PAR','ICS') DEFAULT NULL,
  `stepper_status` enum('Inactive','Active','Completed') DEFAULT 'Inactive',
  `stepper_remark` text,
  `stepper_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`stepper_id`),
  KEY `stepper_dep_id_fk` (`stepper_dep_id_fk`),
  CONSTRAINT `stepper_tbl_ibfk_1` FOREIGN KEY (`stepper_dep_id_fk`) REFERENCES `departments_tbl` (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stepper_tbl`
--

LOCK TABLES `stepper_tbl` WRITE;
/*!40000 ALTER TABLE `stepper_tbl` DISABLE KEYS */;
INSERT INTO `stepper_tbl` VALUES (1,2,'PPMP','Completed','Phase PPMP has been approved/completed.','2025-07-21 17:57:37'),(2,2,'APP','','APP review is pending.','2025-07-21 17:57:37'),(3,2,'PR','','Awaiting APP approval.','2025-07-21 17:57:37'),(4,2,'Bidding','','Awaiting PR approval.','2025-07-21 17:57:37'),(5,2,'PO','','Awaiting Bidding completion.','2025-07-21 17:57:37'),(6,2,'Delivery','','Awaiting PO approval.','2025-07-21 17:57:37'),(7,2,'PAR','','Awaiting Delivery completion.','2025-07-21 17:57:37'),(8,2,'ICS','','Awaiting PAR creation.','2025-07-21 17:57:37'),(9,35,'PPMP','','PPMP creation/submission is pending.','2025-07-21 17:05:50'),(10,35,'APP','','Awaiting PPMP approval.','2025-07-21 17:05:50'),(11,35,'PR','','Awaiting APP approval.','2025-07-21 17:05:50'),(12,35,'Bidding','','Awaiting PR approval.','2025-07-21 17:05:50'),(13,35,'PO','','Awaiting Bidding completion.','2025-07-21 17:05:50'),(14,35,'Delivery','','Awaiting PO approval.','2025-07-21 17:05:50'),(15,35,'PAR','','Awaiting Delivery completion.','2025-07-21 17:05:50'),(16,35,'ICS','','Awaiting PAR creation.','2025-07-21 17:05:50'),(17,30,'PPMP','','PPMP creation/submission is pending.','2025-07-21 18:02:50'),(18,30,'APP','','Awaiting PPMP approval.','2025-07-21 18:02:50'),(19,30,'PR','','Awaiting APP approval.','2025-07-21 18:02:50'),(20,30,'Bidding','','Awaiting PR approval.','2025-07-21 18:02:50'),(21,30,'PO','','Awaiting Bidding completion.','2025-07-21 18:02:50'),(22,30,'Delivery','','Awaiting PO approval.','2025-07-21 18:02:50'),(23,30,'PAR','','Awaiting Delivery completion.','2025-07-21 18:02:50'),(24,30,'ICS','','Awaiting PAR creation.','2025-07-21 18:02:50'),(25,16,'PPMP','','PPMP creation/submission is pending.','2025-07-21 17:04:44'),(26,16,'APP','','Awaiting PPMP approval.','2025-07-21 17:04:44'),(27,16,'PR','','Awaiting APP approval.','2025-07-21 17:04:44'),(28,16,'Bidding','','Awaiting PR approval.','2025-07-21 17:04:44'),(29,16,'PO','','Awaiting Bidding completion.','2025-07-21 17:04:44'),(30,16,'Delivery','','Awaiting PO approval.','2025-07-21 17:04:44'),(31,16,'PAR','','Awaiting Delivery completion.','2025-07-21 17:04:44'),(32,16,'ICS','','Awaiting PAR creation.','2025-07-21 17:04:44'),(33,15,'PPMP','','PPMP creation/submission is pending.','2025-07-19 17:57:34'),(34,15,'APP','','Awaiting PPMP approval.','2025-07-19 17:57:34'),(35,15,'PR','','Awaiting APP approval.','2025-07-19 17:57:34'),(36,15,'Bidding','','Awaiting PR approval.','2025-07-19 17:57:34'),(37,15,'PO','','Awaiting Bidding completion.','2025-07-19 17:57:34'),(38,15,'Delivery','','Awaiting PO approval.','2025-07-19 17:57:34'),(39,15,'PAR','','Awaiting Delivery completion.','2025-07-19 17:57:34'),(40,15,'ICS','','Awaiting PAR creation.','2025-07-19 17:57:34');
/*!40000 ALTER TABLE `stepper_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks_tbl`
--

DROP TABLE IF EXISTS `tasks_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks_tbl` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `submitted_by` int DEFAULT NULL,
  `submitted_to` int DEFAULT NULL,
  `task_description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ppmp_id_fk` int DEFAULT NULL,
  `app_id_fk` int DEFAULT NULL,
  `task_type` varchar(50) NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `submitted_by` (`submitted_by`),
  KEY `fk_tasks_ppmp` (`ppmp_id_fk`),
  KEY `fk_submitted_to` (`submitted_to`),
  KEY `fk_app_id_fk` (`app_id_fk`),
  CONSTRAINT `fk_app_id_fk` FOREIGN KEY (`app_id_fk`) REFERENCES `app_tbl` (`app_id`),
  CONSTRAINT `fk_submitted_to` FOREIGN KEY (`submitted_to`) REFERENCES `users_tbl` (`user_id`),
  CONSTRAINT `fk_tasks_ppmp` FOREIGN KEY (`ppmp_id_fk`) REFERENCES `ppmp_tbl` (`ppmp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tasks_tbl_ibfk_1` FOREIGN KEY (`submitted_by`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks_tbl`
--

LOCK TABLES `tasks_tbl` WRITE;
/*!40000 ALTER TABLE `tasks_tbl` DISABLE KEYS */;
INSERT INTO `tasks_tbl` VALUES (1,52,63,'A new PPMP has been submitted for your review.','2025-07-16 01:37:48',5,NULL,''),(2,52,63,'A new PPMP has been submitted for your review.','2025-07-16 13:30:19',6,NULL,'PPMP'),(3,72,63,'A new PPMP has been submitted for your review.','2025-07-16 23:31:56',7,NULL,'PPMP'),(4,6,63,'A new Project Procurement Management Plan has been submitted for your review.','2025-07-19 11:34:47',8,NULL,'Project Procurement Management'),(6,6,63,'A new Project Procurement Management Plan has been submitted for your review.','2025-07-19 11:55:42',10,NULL,'Project Procurement Management');
/*!40000 ALTER TABLE `tasks_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_department_tbl`
--

DROP TABLE IF EXISTS `user_role_department_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role_department_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int DEFAULT NULL,
  `department_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_role_department` (`role_id`,`department_id`),
  KEY `user_id_fk` (`user_id`),
  KEY `department_id_fk` (`department_id`),
  CONSTRAINT `fk_department_id` FOREIGN KEY (`department_id`) REFERENCES `departments_tbl` (`dep_id`),
  CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles_tbl` (`role_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_department_tbl`
--

LOCK TABLES `user_role_department_tbl` WRITE;
/*!40000 ALTER TABLE `user_role_department_tbl` DISABLE KEYS */;
INSERT INTO `user_role_department_tbl` VALUES (25,2,NULL,30),(26,3,1,35),(28,1,NULL,2),(29,71,NULL,3),(30,34,NULL,1),(31,47,NULL,1),(32,72,35,2),(33,4,12,16),(34,63,9,30),(35,52,34,1),(36,6,6,2),(38,7,NULL,2),(39,9,NULL,35),(41,35,NULL,15),(43,5,11,15);
/*!40000 ALTER TABLE `user_role_department_tbl` ENABLE KEYS */;
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
  `user_type` enum('Faculty','Staff') DEFAULT NULL,
  `user_suffix` varchar(15) DEFAULT NULL,
  `user_tupid` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tbl`
--

LOCK TABLES `users_tbl` WRITE;
/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` (`user_id`, `user_firstname`, `user_middlename`, `user_lastname`, `user_email`, `user_password`, `user_type`, `user_suffix`, `user_tupid`) VALUES (1,'Rexmelle','F.','Decapia','rexmelle.decapia@tup.edu.ph','$2y$10$zAmbV1DZ84kAmXS8SWGfTeHH9YDyFBEad/yCsakwUzQVHAUZZwmDG','Faculty',NULL,NULL),(2,'Ruby','T.','Villanueva','ruby.villanueva@tup.edu.ph','$2y$10$wvaI7ZECiTTOr/kZ82g/WeX4ngTq.vQQ66eFMWSimM8lXfOsqBX0u','Faculty',NULL,NULL),(3,'Glenn','N.','Ortiz','glenn.ortiz@tup.edu.ph','$2y$10$Nt.cQ3XhQQK/acWEPpEkPOf6XnKtiIW/Q.DwCEC.nI/I.vkSYTJIG','Faculty',NULL,NULL),(4,'Ivan Ray','G. ','Ancero','ivan.ancero@tup.edu.ph','$2y$10$QXEy6xuIo6cCiDyqs2cPh.wmGU1.QeEl6GQML9isRS/NKArt84.KS','Faculty',NULL,NULL),(5,'Krystel May','R.','Alvarado','krystel.alvarado@tup.edu.ph','$2y$10$PrhEjxJ9xZiDvOdzQuMzFuR7gDIe.48HEqk8IxrVZNlyQxuKszxIe','Faculty',NULL,NULL),(6,'Christian','C.','Calingasan','christian.calingasan@tup.edu.ph','$2y$10$UIeR63rqXXoeTvBNFwejxOcWOluFu/v/3/6T.hKIOHeNUi8IPkhDu','Faculty',NULL,NULL),(7,'Corazon ','C.','Dela Rosa','corazon.delarosa@tup.edu.ph','$2y$10$0ai0NWFnNpl8l9OSHXc/9ecUCm8iO7v1f9HcFvUEbC7ZJlHJ24mmq','Faculty',NULL,NULL),(9,'Hector','M.','Tibo',NULL,NULL,'Faculty',NULL,NULL),(10,'Lieda','A.','Sobida',NULL,NULL,'Faculty',NULL,NULL),(11,'Jane','E.','Morgado',NULL,NULL,'Faculty',NULL,NULL),(12,'Ramil Leonardo','H.','Africa',NULL,NULL,'Faculty',NULL,NULL),(13,'Maureen','A.','Salve',NULL,NULL,'Faculty',NULL,NULL),(14,'Cindy','Q.','Maldecir',NULL,NULL,'Faculty',NULL,NULL),(15,'Mitchie','M.','Caurel',NULL,NULL,'Faculty',NULL,NULL),(16,'Christopher Mitchel','I.','Azuelo',NULL,NULL,'Faculty',NULL,NULL),(17,'Mary Rose Gabrielle','F.','Habla',NULL,NULL,'Faculty',NULL,NULL),(18,'Menerva Pesito',NULL,'Doctor',NULL,NULL,'Faculty',NULL,NULL),(19,'Grace','D.','Usana',NULL,NULL,'Faculty',NULL,NULL),(20,'Jenneth','L.','Yu',NULL,NULL,'Faculty',NULL,NULL),(21,'Roselle','L.','Honorio',NULL,NULL,'Faculty',NULL,NULL),(22,'Neizzel Joy','T.','Labro-Azuelo',NULL,NULL,'Faculty',NULL,NULL),(23,'Ma. Clowee Anne','M.','Sarmiento',NULL,NULL,'Faculty',NULL,NULL),(24,'Vivian','T.','Pangan',NULL,NULL,'Faculty',NULL,NULL),(25,'Normita','M.','Mata',NULL,NULL,'Faculty',NULL,NULL),(26,'Maria Carina','V.','Silvino',NULL,NULL,'Faculty',NULL,NULL),(27,'Jim','A.','Linda',NULL,NULL,'Faculty',NULL,NULL),(28,'Patrick Justin','L.','Ariado',NULL,NULL,'Faculty',NULL,NULL),(29,'Lizette','P.','Terania',NULL,NULL,'Faculty',NULL,NULL),(30,'Roy','J.','Garbin',NULL,NULL,'Faculty',NULL,NULL),(31,'Leilani','G.','Oledan',NULL,NULL,'Faculty',NULL,NULL),(32,'Anna Marie','A.','Dalaguit',NULL,NULL,'Faculty',NULL,NULL),(33,'Rogelio','C.','Mercurio',NULL,NULL,'Faculty','III',NULL),(34,'Heherson','P.','Ramos','heherson.ramos@tup.edu.ph','$2y$10$gfd68LZz4B4Nfd6fr9DL0u77S6hAeDaS5shUZv4gG16beZfRW8JAa','Faculty',NULL,NULL),(35,'Norway','J.','Pangan',NULL,NULL,'Faculty',NULL,NULL),(36,'Raymund','M.','Lozada',NULL,NULL,'Faculty',NULL,NULL),(37,'June Raymond','L.','Mariano',NULL,NULL,'Faculty',NULL,NULL),(38,'Ma. Lizette','G.','Peña',NULL,NULL,'Faculty',NULL,NULL),(39,'Juliet','T.','Narez',NULL,NULL,'Faculty',NULL,NULL),(40,'Ronnie','A.','Ramos',NULL,NULL,'Faculty',NULL,NULL),(41,'Flordeliza','Y.','Valdez',NULL,NULL,'Faculty',NULL,NULL),(42,'Enrique','A.','Silvino',NULL,NULL,'Faculty',NULL,NULL),(43,'Roilene','C.','Pagatpat',NULL,NULL,'Faculty',NULL,NULL),(44,'Janiel Mico','D.','Panganiban',NULL,NULL,'Faculty',NULL,NULL),(45,'Sanjie Dutt','A.','Kumar',NULL,NULL,'Faculty',NULL,NULL),(46,'Al-Stephenson','B.','Lapastora',NULL,NULL,'Faculty',NULL,NULL),(47,'Cesar','S.','Mendoza','cesar.mendoza@tup.edu.ph','$2y$10$DO6W1owZot0InYFykFy.Kef4hFsvvz3KxrzcjQ36Hy5xY982NuCiK','Faculty',NULL,NULL),(48,'Reginald','B.','Cutanda',NULL,NULL,'Faculty',NULL,NULL),(49,'Clinton','P.','Icuspit',NULL,NULL,'Faculty',NULL,NULL),(50,'Maria Gena','C.','Cruz',NULL,NULL,'Faculty',NULL,NULL),(51,'Christopher','B.','Parmis',NULL,NULL,'Faculty',NULL,NULL),(52,'Maricel','S.','Ochoa','maricel.ochoa@tup.edu.ph','$2y$10$KbRHqAC1U6REAtWC4DhbOurvVBPjrjTK0kKKiI7k2ab.HyyZFyG5q','Faculty',NULL,NULL),(53,'Marcelo','V.','Rivera',NULL,NULL,'Faculty',NULL,NULL),(54,'Julius Delfin','A.','Silang',NULL,NULL,'Faculty',NULL,NULL),(55,'Edwin','P.','Roldan',NULL,NULL,'Faculty',NULL,NULL),(56,'Renante','D.','Junto',NULL,NULL,'Faculty',NULL,NULL),(57,'Rica Jane','Y.','Kosca',NULL,NULL,'Faculty',NULL,NULL),(58,'Triztan','S.','Dela Cruz',NULL,NULL,'Faculty',NULL,NULL),(59,'Aldwin','C.','Aggabao',NULL,NULL,'Faculty',NULL,NULL),(60,'Nemalyn','P.','Decapia',NULL,NULL,'Faculty',NULL,NULL),(61,'Teodoro','M.','Nimuan',NULL,NULL,'Faculty',NULL,NULL),(62,'Eugene','C.','Singson',NULL,NULL,'Faculty',NULL,NULL),(63,'Jediah','P.','Puertollano','jediah.puertollano@tup.edu.ph','$2y$10$K//i1lj2/NXGTR/Hi.IIp.Ytfsp5wHpHa9V5OtnGr.kF3F6QKHxxC','Faculty',NULL,NULL),(64,'Angelica','F.','Olivar',NULL,NULL,'Faculty',NULL,NULL),(65,'Annaline','C.','Tanto',NULL,NULL,'Faculty',NULL,NULL),(71,'John Rex','Bautista','Duran','johnrex.duran@tup.edu.ph','$2y$12$jS4Y8/61ZJH7RdqSS8nIied7UT2wjZi9P19mvnSWCteCXDWQbsqbC','Staff','','230265'),(72,'Emmanuel','Peque','Ferrer','emmanuel.ferrer@tup.edu.ph','$2y$12$X/Br7Yz2U9IKSKF6MeTPDO57qFQGX7ByUVOm.zBS7q78GGxK6qNnK','Faculty','','230252');
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_hierarchy`
--

DROP TABLE IF EXISTS `view_hierarchy`;
/*!50001 DROP VIEW IF EXISTS `view_hierarchy`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_hierarchy` AS SELECT 
 1 AS `role_id`,
 1 AS `role_name`,
 1 AS `Department`,
 1 AS `Under`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_role_department`
--

DROP TABLE IF EXISTS `view_role_department`;
/*!50001 DROP VIEW IF EXISTS `view_role_department`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_role_department` AS SELECT 
 1 AS `role_id`,
 1 AS `role_name`,
 1 AS `dep_id`,
 1 AS `dep_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_user_department_type`
--

DROP TABLE IF EXISTS `view_user_department_type`;
/*!50001 DROP VIEW IF EXISTS `view_user_department_type`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_user_department_type` AS SELECT 
 1 AS `user_id`,
 1 AS `user_tupid`,
 1 AS `user_firstname`,
 1 AS `user_lastname`,
 1 AS `user_type`,
 1 AS `dep_id`,
 1 AS `dep_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_user_mr_items`
--

DROP TABLE IF EXISTS `view_user_mr_items`;
/*!50001 DROP VIEW IF EXISTS `view_user_mr_items`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_user_mr_items` AS SELECT 
 1 AS `user_id`,
 1 AS `user_lastname`,
 1 AS `mr_id`,
 1 AS `mr_item_id`,
 1 AS `item_name`,
 1 AS `mr_item_unit`,
 1 AS `mr_item_quantity`,
 1 AS `mr_location`,
 1 AS `mr_date_received`*/;
SET character_set_client = @saved_cs_client;

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
 1 AS `department`,
 1 AS `type`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_users_for_role_assignment`
--

DROP TABLE IF EXISTS `view_users_for_role_assignment`;
/*!50001 DROP VIEW IF EXISTS `view_users_for_role_assignment`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_users_for_role_assignment` AS SELECT 
 1 AS `user_id`,
 1 AS `user_tupid`,
 1 AS `user_firstname`,
 1 AS `user_lastname`,
 1 AS `dep_name`,
 1 AS `department_id`,
 1 AS `role_id`,
 1 AS `role_name`*/;
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
-- Final view structure for view `view_hierarchy`
--

/*!50001 DROP VIEW IF EXISTS `view_hierarchy`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_hierarchy` AS select `r`.`role_id` AS `role_id`,`r`.`role_name` AS `role_name`,`d`.`dep_name` AS `Department`,`parent`.`role_name` AS `Under` from ((`roles_tbl` `r` left join `departments_tbl` `d` on((`r`.`role_dep_id_fk` = `d`.`dep_id`))) left join `roles_tbl` `parent` on((`r`.`role_parent_role_id` = `parent`.`role_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_role_department`
--

/*!50001 DROP VIEW IF EXISTS `view_role_department`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_role_department` AS select `r`.`role_id` AS `role_id`,`r`.`role_name` AS `role_name`,`d`.`dep_id` AS `dep_id`,`d`.`dep_name` AS `dep_name` from (`roles_tbl` `r` join `departments_tbl` `d` on((`r`.`role_dep_id_fk` = `d`.`dep_id`))) order by `d`.`dep_name`,`r`.`role_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_user_department_type`
--

/*!50001 DROP VIEW IF EXISTS `view_user_department_type`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_user_department_type` AS select distinct `u`.`user_id` AS `user_id`,`u`.`user_tupid` AS `user_tupid`,`u`.`user_firstname` AS `user_firstname`,`u`.`user_lastname` AS `user_lastname`,`u`.`user_type` AS `user_type`,`d`.`dep_id` AS `dep_id`,`d`.`dep_name` AS `dep_name` from ((`user_role_department_tbl` `urd` join `users_tbl` `u` on((`urd`.`user_id` = `u`.`user_id`))) join `departments_tbl` `d` on((`urd`.`department_id` = `d`.`dep_id`))) order by `u`.`user_lastname` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_user_mr_items`
--

/*!50001 DROP VIEW IF EXISTS `view_user_mr_items`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_user_mr_items` AS select `u`.`user_id` AS `user_id`,`u`.`user_lastname` AS `user_lastname`,`m`.`mr_id` AS `mr_id`,`i`.`mr_item_id` AS `mr_item_id`,`pi`.`po_items_descrip` AS `item_name`,`i`.`mr_item_unit` AS `mr_item_unit`,`i`.`mr_item_quantity` AS `mr_item_quantity`,`i`.`mr_location` AS `mr_location`,`p`.`po_date` AS `mr_date_received` from ((((`users_tbl` `u` join `mr_tbl` `m` on((`u`.`user_id` = `m`.`mr_user_id_fk`))) join `mr_items_tbl` `i` on((`m`.`mr_id` = `i`.`mr_id_fk`))) join `po_tbl` `p` on((`i`.`mr_po_fk` = `p`.`po_id`))) join `po_items_tbl` `pi` on((`pi`.`po_items_id_fk` = `p`.`po_id`))) order by `u`.`user_id`,`m`.`mr_id`,`i`.`mr_item_id` */;
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
/*!50001 VIEW `view_user_roles_departments` AS select `u`.`user_id` AS `user_id`,`u`.`user_tupid` AS `tupt_id`,`u`.`user_firstname` AS `first_name`,`u`.`user_lastname` AS `last_name`,`u`.`user_email` AS `email`,`r`.`role_name` AS `role`,`d`.`dep_name` AS `department`,`u`.`user_type` AS `type` from (((`users_tbl` `u` left join `user_role_department_tbl` `urd` on((`u`.`user_id` = `urd`.`user_id`))) left join `roles_tbl` `r` on((`urd`.`role_id` = `r`.`role_id`))) left join `departments_tbl` `d` on((`urd`.`department_id` = `d`.`dep_id`))) order by `u`.`user_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_users_for_role_assignment`
--

/*!50001 DROP VIEW IF EXISTS `view_users_for_role_assignment`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_users_for_role_assignment` AS select `u`.`user_id` AS `user_id`,`u`.`user_tupid` AS `user_tupid`,`u`.`user_firstname` AS `user_firstname`,`u`.`user_lastname` AS `user_lastname`,`d`.`dep_name` AS `dep_name`,`urd`.`department_id` AS `department_id`,`urd`.`role_id` AS `role_id`,`r`.`role_name` AS `role_name` from (((`users_tbl` `u` left join `user_role_department_tbl` `urd` on((`u`.`user_id` = `urd`.`user_id`))) left join `departments_tbl` `d` on((`urd`.`department_id` = `d`.`dep_id`))) left join `roles_tbl` `r` on((`urd`.`role_id` = `r`.`role_id`))) */;
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

-- Dump completed on 2025-07-22 10:36:19
