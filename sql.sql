CREATE DATABASE  IF NOT EXISTS `t-doctrak` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `t-doctrak`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 10.10.5.11    Database: t-doctrak
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `audit`
--

DROP TABLE IF EXISTS `audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit` (
  `audit_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) DEFAULT NULL,
  `dml` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sql_string` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_security_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_id`),
  KEY `fk_security_name_idx` (`fk_security_username`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bacdocument_monitoring`
--

DROP TABLE IF EXISTS `bacdocument_monitoring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bacdocument_monitoring` (
  `bacdocument_monitoring_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_bacdocumentlist_tracker_id` bigint(20) NOT NULL,
  `transdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bacdocument_monitoring_id`),
  KEY `fkbacdocumentlist_tracker_id_idx` (`fk_bacdocumentlist_tracker_id`),
  CONSTRAINT `fkbacdocumentlist_tracker_id` FOREIGN KEY (`fk_bacdocumentlist_tracker_id`) REFERENCES `bacdocumentlist_tracker` (`bacdocumentlist_tracker_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bacdocument_template`
--

DROP TABLE IF EXISTS `bacdocument_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bacdocument_template` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `min_cost` decimal(10,2) NOT NULL,
  `max_cost` decimal(10,2) NOT NULL,
  `transdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`template_id`),
  UNIQUE KEY `template_name_UNIQUE` (`template_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bacdocument_templatelist`
--

DROP TABLE IF EXISTS `bacdocument_templatelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bacdocument_templatelist` (
  `templatelist_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_template_id` int(11) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `activity` varchar(45) CHARACTER SET utf8 NOT NULL,
  `max_day` int(11) NOT NULL,
  PRIMARY KEY (`templatelist_id`),
  KEY `fk_bacdocumen_template_id_idx` (`fk_template_id`),
  CONSTRAINT `fk_bacdocument_template_id` FOREIGN KEY (`fk_template_id`) REFERENCES `bacdocument_template` (`template_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bacdocumentlist`
--

DROP TABLE IF EXISTS `bacdocumentlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bacdocumentlist` (
  `bacdocument_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bacdocumentdetail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `prcost` decimal(10,2) NOT NULL,
  `fk_officename_bacdocumentlist` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fk_security_username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pr_date` date NOT NULL,
  `transdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_bacdocument_template` int(11) DEFAULT NULL,
  PRIMARY KEY (`bacdocument_id`),
  KEY `fk_bacdocumentlist_template_id_idx` (`fk_bacdocument_template`),
  CONSTRAINT `fk_bacdocumentlist_template_id` FOREIGN KEY (`fk_bacdocument_template`) REFERENCES `bacdocument_template` (`template_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bacdocumentlist_tracker`
--

DROP TABLE IF EXISTS `bacdocumentlist_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bacdocumentlist_tracker` (
  `bacdocumentlist_tracker_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_bacdocumentlist_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sortorder` int(11) NOT NULL,
  `receive_date` datetime DEFAULT NULL,
  `expire_days` int(11) DEFAULT NULL,
  `activity` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `receive_by` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `checkin_date` datetime DEFAULT NULL,
  PRIMARY KEY (`bacdocumentlist_tracker_id`),
  KEY `fk_bacdocumentlist_id_idx` (`fk_bacdocumentlist_id`),
  CONSTRAINT `fk_documentlist_id` FOREIGN KEY (`fk_bacdocumentlist_id`) REFERENCES `bacdocumentlist` (`bacdocument_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1300 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bacdocumentlist_trackerdetail`
--

DROP TABLE IF EXISTS `bacdocumentlist_trackerdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bacdocumentlist_trackerdetail` (
  `trackerdetail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_bacdocumentlist_tracker_id` bigint(20) NOT NULL,
  `Transdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `noted_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`trackerdetail_id`),
  KEY `fkbacdocumentlist_tracker_id_idx` (`fk_bacdocumentlist_tracker_id`),
  CONSTRAINT `fk_bacdocumentlist_tracker_id` FOREIGN KEY (`fk_bacdocumentlist_tracker_id`) REFERENCES `bacdocumentlist_tracker` (`bacdocumentlist_tracker_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `counter_log`
--

DROP TABLE IF EXISTS `counter_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counter_log` (
  `AI` bigint(20) NOT NULL AUTO_INCREMENT,
  `function` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`AI`)
) ENGINE=MyISAM AUTO_INCREMENT=313 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `document_template`
--

DROP TABLE IF EXISTS `document_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_template` (
  `template_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `template_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `template_description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_office_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`template_id`),
  KEY `fk_office_name_idx` (`fk_office_name`),
  CONSTRAINT `fk_doctemplate_officename` FOREIGN KEY (`fk_office_name`) REFERENCES `office` (`office_name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `document_type`
--

DROP TABLE IF EXISTS `document_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_type` (
  `documenttype_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `public` int(11) NOT NULL,
  PRIMARY KEY (`documenttype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `documentlist`
--

DROP TABLE IF EXISTS `documentlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentlist` (
  `document_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `document_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `document_description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_template_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_documenttype_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_security_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `document_filename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transdate` datetime DEFAULT NULL,
  `fk_office_name_documentlist` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `scrap` tinyint(4) DEFAULT '0',
  `complete` tinyint(4) NOT NULL DEFAULT '0',
  `document_file` longblob,
  `document_mime` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`document_id`),
  KEY `FK_documentsecurityuser_idx` (`fk_security_username`),
  KEY `FK_document_documenttype_idx` (`fk_documenttype_id`),
  KEY `fk_document_office_name_idx` (`fk_office_name_documentlist`),
  KEY `fk_document_template_id_idx` (`fk_template_id`),
  CONSTRAINT `FK_document_documenttype` FOREIGN KEY (`fk_documenttype_id`) REFERENCES `document_type` (`documenttype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_document_office_name` FOREIGN KEY (`fk_office_name_documentlist`) REFERENCES `office` (`office_name`) ON UPDATE CASCADE,
  CONSTRAINT `fk_document_template_documentlist` FOREIGN KEY (`fk_template_id`) REFERENCES `document_template` (`template_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `documentlist_history`
--

DROP TABLE IF EXISTS `documentlist_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentlist_history` (
  `fk_documentlist_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_officename` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `document_process` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `document_details` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_comment` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transdate` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_documentlst_id_idx` (`fk_documentlist_id`),
  KEY `fk_documenthistory_officename_idx` (`fk_officename`),
  CONSTRAINT `fk_documenthistory_officename` FOREIGN KEY (`fk_officename`) REFERENCES `office` (`office_name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_documentlst_id` FOREIGN KEY (`fk_documentlist_id`) REFERENCES `documentlist` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `documentlist_tracker`
--

DROP TABLE IF EXISTS `documentlist_tracker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentlist_tracker` (
  `documentlist_tracker_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_documentlist_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `office_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sortorder` smallint(6) NOT NULL,
  `received_val` smallint(6) DEFAULT NULL,
  `received_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `received_comment` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `released_val` smallint(6) DEFAULT NULL,
  `released_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `released_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `released_comment` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forrelease_val` smallint(6) DEFAULT NULL,
  `forrelease_date` datetime DEFAULT NULL,
  `forrelease_comment` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`documentlist_tracker_id`),
  KEY `fk_documentlist_tracker_documentlist_idx` (`fk_documentlist_id`),
  KEY `fk_documentlist_tracker_officename_idx` (`office_name`),
  CONSTRAINT `fk_documentlist_tracker_documentlist` FOREIGN KEY (`fk_documentlist_id`) REFERENCES `documentlist` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_documentlist_tracker_office` FOREIGN KEY (`office_name`) REFERENCES `office` (`office_name`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=866 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `generator`
--

DROP TABLE IF EXISTS `generator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generator` (
  `generator_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `counter` bigint(20) NOT NULL,
  `transdate` date DEFAULT NULL,
  PRIMARY KEY (`generator_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trig_generator_transdate` BEFORE UPDATE ON `generator` FOR EACH ROW BEGIN
	set new.transdate=current_timestamp;
	
    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail` (
  `mail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mailcontent` text COLLATE utf8_unicode_ci,
  `fk_security_username_owner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `maildate` datetime DEFAULT NULL,
  `mailtitle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mailstatus` tinyint(4) DEFAULT NULL,
  `fk_security_username_sender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mailcol` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_table` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fk_key` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `FK_mail_security_owner` (`fk_security_username_owner`),
  KEY `FK_mail_security_sender` (`fk_security_username_sender`),
  CONSTRAINT `FK_mail_security_owner` FOREIGN KEY (`fk_security_username_owner`) REFERENCES `security_user` (`security_username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_mail_security_sender` FOREIGN KEY (`fk_security_username_sender`) REFERENCES `security_user` (`security_username`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `Messages_id` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Message_Module` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Transdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Messages_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office` (
  `office_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'OFFICE',
  `office_description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transdate` timestamp NULL DEFAULT NULL,
  `bac` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`office_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `security_audit`
--

DROP TABLE IF EXISTS `security_audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_audit` (
  `transaction_code` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sqlquery` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `transdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dml` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`transaction_code`)
) ENGINE=InnoDB AUTO_INCREMENT=325 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER `security_audit_transdate` BEFORE INSERT ON `security_audit` FOR EACH ROW set new.transdate=now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `security_group`
--

DROP TABLE IF EXISTS `security_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_group` (
  `security_groupname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `security_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`security_groupname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `security_user`
--

DROP TABLE IF EXISTS `security_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_user` (
  `security_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `security_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_security_groupname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `security_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_office_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`security_username`),
  KEY `FK_security_user` (`fk_security_groupname`),
  KEY `FK_officename` (`fk_office_name`),
  KEY `security_username` (`security_name`),
  CONSTRAINT `FK_officename` FOREIGN KEY (`fk_office_name`) REFERENCES `office` (`office_name`) ON UPDATE CASCADE,
  CONSTRAINT `FK_security_user` FOREIGN KEY (`fk_security_groupname`) REFERENCES `security_group` (`security_groupname`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `template_list`
--

DROP TABLE IF EXISTS `template_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_list` (
  `template_list_id` int(11) DEFAULT NULL,
  `fk_template_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_office_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  KEY `FK_template_list_office` (`fk_office_name`),
  KEY `FK_template_list` (`fk_template_id`),
  CONSTRAINT `fk_template_id_templatelist` FOREIGN KEY (`fk_template_id`) REFERENCES `document_template` (`template_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_template_list_office` FOREIGN KEY (`fk_office_name`) REFERENCES `office` (`office_name`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-28 16:30:56
