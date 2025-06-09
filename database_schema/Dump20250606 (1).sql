-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: procurement_database
-- ------------------------------------------------------
-- Server version	8.0.40

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
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments_tbl`
--

LOCK TABLES `departments_tbl` WRITE;
/*!40000 ALTER TABLE `departments_tbl` DISABLE KEYS */;
INSERT INTO `departments_tbl` VALUES (1,'Basic Arts and Sciences Department'),(2,'Civil and Allied Department'),(3,'Mechanical and Allied Department'),(4,'Electrical and Allied Department'),(5,'Office of Student Affairs'),(6,'Admission, Guidance and Counseling'),(7,'Research and Development Services'),(8,'Extension Services'),(9,'Innovation and Technology Support Office'),(10,'Technology Licensing Office Coordinator'),(11,'Quality Assurance'),(12,'University Information Technology Center'),(13,'Gender and Development'),(14,'Human Resource Management'),(15,'Property and Supply'),(16,'Procurement'),(17,'Infrastructure Development'),(18,'Building and Grounds Maintenance'),(19,'Accounting'),(20,'Budgeting'),(21,'Collecting and Disbursing'),(22,'Medical Services'),(23,'Dental Services'),(24,'Records Management'),(25,'BAC Secretariat'),(26,'Campus Business Manager'),(27,'Registration'),(28,'Learning Resource Center'),(29,'Sports and Cultural Development'),(30,'Planning Office'),(31,'National Service Training Program'),(32,'Literacy Training Service'),(33,'Reserve Officers Training Corps'),(34,'Civic Welfare and Training Service');
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_tbl`
--

LOCK TABLES `roles_tbl` WRITE;
/*!40000 ALTER TABLE `roles_tbl` DISABLE KEYS */;
INSERT INTO `roles_tbl` VALUES (1,'Campus Director',NULL,NULL),(2,'Assistant Director for Academic Affairs ',NULL,1),(3,'Assistant Director for Administration and Finance ',NULL,1),(4,'Assistant Director for Research and Extension',NULL,1),(5,'Department Head - Basic Arts and Sciences Department',1,2),(6,'Department Head - Civil and Allied Department',2,2),(7,'Department Head - Mechanical and Allied Department',3,2),(8,'Department Head - Electrical and Allied Department',4,2),(9,'Plannig Officer',30,1),(10,'Section Head - Human Resource Management',14,3),(11,'Section Head - Property and Supply',15,3),(12,'Section Head - Procurement',16,3),(13,'Section Head - Infrastructure Development',17,3),(14,'Section Head - Building and Grounds Maintenance',18,3),(15,'Section Head - Accounting',19,3),(16,'Section Head - Budgeting',20,3),(17,'Section Head - Collecting and Disbursing',21,3),(18,'Section Head - Medical Services',22,3),(19,'Section Head - Dental Services',23,3),(20,'Section Head - Records Management',24,3),(21,'Section Head - BAC Secretariat',25,3),(22,'Section Head - Campus Business Manager',26,3),(23,'Head - Office of Student Affairs',5,2),(24,'Head - Admission, Guidance and Counseling',6,2),(25,'Head - National Service Training Program',31,2),(26,'Head - Literacy Training Service',32,2),(27,'Head - Reserve Officers Training Corps',33,2),(28,'Head - Civic Welfare and Training Service',34,2),(29,'Section Head - Registration',27,24),(30,'Section Head - Learning Resource Center',28,23),(31,'Section Head - Sports and Cultural Development',29,23),(32,'Section Head - Bachelor of Engineering Technology Major in Chemical Technology',2,6),(33,'Section Head - Bachelor of Science in Environmental Science',2,6),(34,'Section Head - Bachelor of Science in Civil Engineering',2,6),(35,'Section Head - Bachelor of Engineering Technology Major in Civil Technology',2,6),(36,'Section Head - Bachelor of Science in Electronics Engineering',4,8),(37,'Section Head - Bachelor of Engineering Technology Major in Electronics Technology',4,8),(38,'Section Head - Bachelor of Science in Information Technology',4,8),(39,'Section Head - Bachelor of Science in Electrical Engineering',4,8),(40,'Section Head - Bachelor of Engineering Technology Major in Electrical Technology',4,8),(41,'Section Head - Bachelor of Engineering Technology Major in Instrumentation and Controls',4,8),(42,'Section Head - Bachelor of Engineering Technology Major in Mechatronics Technology',4,8),(43,'Section Head - Bachelor of Science in Mechanical Engineering',3,7),(44,'Section Head - Bachelor of Engineering Technology Major in Heating, Ventilation and Air Conditioning, and Refrigeration Technology',3,7),(45,'Section Head - Bachelor of Engineering Technology Major in Dies and Moulds Technology',3,7),(46,'Section Head - Bachelor of Engineering Technology Major in Non-Destructive Testing Technology',3,7),(47,'Section Head - Bachelor of Engineering Technology Major in Electromechanical Technology',3,7),(48,'Section Head - Bachelor of Engineering Technology Major in Automotive Technology',3,7),(49,'Section Head - Bachelor of Engineering Technology Major in Mechanical Technology',3,7);
/*!40000 ALTER TABLE `roles_tbl` ENABLE KEYS */;
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
  `user_fullname` varchar(150) GENERATED ALWAYS AS (concat(`user_firstname`,_utf8mb4' ',`user_middlename`,_utf8mb4' ',`user_lastname`)) VIRTUAL,
  `user_email` varchar(70) DEFAULT NULL,
  `user_password` varchar(70) DEFAULT NULL,
  `user_type` enum('Faculty','Staff') NOT NULL,
  `user_role_fk` int DEFAULT NULL,
  `user_dep_fk` int DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_role_fk` (`user_role_fk`),
  KEY `user_dep_fk` (`user_dep_fk`),
  CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`user_role_fk`) REFERENCES `roles_tbl` (`role_id`),
  CONSTRAINT `users_tbl_ibfk_2` FOREIGN KEY (`user_dep_fk`) REFERENCES `departments_tbl` (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tbl`
--

LOCK TABLES `users_tbl` WRITE;
/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;
UNLOCK TABLES;

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-06 21:10:50
