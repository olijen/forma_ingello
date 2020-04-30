-- MySQL dump 10.13  Distrib 5.6.33, for debian-linux-gnu (x86_64)
--
-- Host: ingello.com    Database: warehouse
-- ------------------------------------------------------
-- Server version	5.7.25

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
-- Table structure for table `accessory`
--

DROP TABLE IF EXISTS `accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_class` varchar(255) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1473 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessory`
--

LOCK TABLES `accessory` WRITE;
/*!40000 ALTER TABLE `accessory` DISABLE KEYS */;
INSERT INTO `accessory` VALUES (1,'forma\\modules\\country\\records\\Country',6,1),(2,'forma\\modules\\customer\\records\\Customer',6,1),(3,'forma\\modules\\customer\\records\\Customer',7,1),(9,'forma\\modules\\country\\records\\Country',7,3),(10,'forma\\modules\\customer\\records\\Customer',8,3),(13,'forma\\modules\\country\\records\\Country',8,6),(14,'forma\\modules\\country\\records\\Country',9,4),(15,'forma\\modules\\customer\\records\\Customer',9,4),(17,'forma\\modules\\country\\records\\Country',10,6),(18,'forma\\modules\\country\\records\\Country',11,6),(19,'forma\\modules\\customer\\records\\Customer',10,6),(21,'forma\\modules\\customer\\records\\Customer',4,6),(23,'forma\\modules\\customer\\records\\Customer',11,1),(25,'forma\\modules\\product\\records\\Manufacturer',6,1),(26,'forma\\modules\\product\\records\\Type',3,1),(27,'forma\\modules\\product\\records\\Product',11,1),(28,'forma\\modules\\customer\\records\\Customer',12,5),(31,'forma\\modules\\customer\\records\\Customer',13,5),(34,'forma\\modules\\customer\\records\\Customer',14,5),(36,'forma\\modules\\customer\\records\\Customer',15,5),(38,'forma\\modules\\customer\\records\\Customer',16,5),(40,'forma\\modules\\customer\\records\\Customer',17,5),(42,'forma\\modules\\customer\\records\\Customer',18,5),(44,'forma\\modules\\customer\\records\\Customer',19,5),(47,'forma\\modules\\customer\\records\\Customer',20,5),(49,'forma\\modules\\customer\\records\\Customer',21,5),(51,'forma\\modules\\customer\\records\\Customer',22,5),(54,'forma\\modules\\product\\records\\Type',4,5),(55,'forma\\modules\\product\\records\\Manufacturer',7,5),(59,'forma\\modules\\customer\\records\\Customer',23,1),(62,'forma\\modules\\product\\records\\Type',5,1),(63,'forma\\modules\\product\\records\\Product',12,1),(66,'forma\\modules\\customer\\records\\Customer',24,6),(67,'forma\\modules\\customer\\records\\Customer',25,6),(68,'forma\\modules\\customer\\records\\Customer',26,6),(69,'forma\\modules\\customer\\records\\Customer',27,1),(70,'forma\\modules\\customer\\records\\Customer',28,1),(71,'forma\\modules\\customer\\records\\Customer',29,1),(78,'forma\\modules\\customer\\records\\Customer',30,4),(79,'forma\\modules\\customer\\records\\Customer',31,6),(85,'forma\\modules\\customer\\records\\Customer',32,6),(86,'forma\\modules\\customer\\records\\Customer',33,6),(87,'forma\\modules\\customer\\records\\Customer',34,6),(88,'forma\\modules\\customer\\records\\Customer',35,6),(89,'forma\\modules\\customer\\records\\Customer',36,6),(90,'forma\\modules\\customer\\records\\Customer',37,6),(91,'forma\\modules\\customer\\records\\Customer',38,6),(92,'forma\\modules\\customer\\records\\Customer',39,6),(93,'forma\\modules\\customer\\records\\Customer',40,6),(94,'forma\\modules\\customer\\records\\Customer',41,6),(95,'forma\\modules\\customer\\records\\Customer',42,6),(96,'forma\\modules\\customer\\records\\Customer',43,6),(97,'forma\\modules\\customer\\records\\Customer',44,6),(98,'forma\\modules\\customer\\records\\Customer',45,6),(99,'forma\\modules\\customer\\records\\Customer',46,6),(100,'forma\\modules\\customer\\records\\Customer',47,6),(101,'forma\\modules\\customer\\records\\Customer',48,6),(102,'forma\\modules\\customer\\records\\Customer',49,6),(103,'forma\\modules\\customer\\records\\Customer',50,6),(104,'forma\\modules\\customer\\records\\Customer',51,6),(105,'forma\\modules\\customer\\records\\Customer',52,6),(106,'forma\\modules\\customer\\records\\Customer',53,6),(107,'forma\\modules\\customer\\records\\Customer',54,6),(108,'forma\\modules\\customer\\records\\Customer',55,6),(109,'forma\\modules\\customer\\records\\Customer',56,6),(110,'forma\\modules\\customer\\records\\Customer',57,6),(111,'forma\\modules\\customer\\records\\Customer',58,6),(115,'forma\\modules\\customer\\records\\Customer',59,1),(117,'forma\\modules\\customer\\records\\Customer',60,1),(118,'forma\\modules\\product\\records\\Type',9,1),(119,'forma\\modules\\product\\records\\Type',10,1),(120,'forma\\modules\\product\\records\\Manufacturer',8,1),(121,'forma\\modules\\product\\records\\Type',11,1),(122,'forma\\modules\\product\\records\\Type',12,1),(123,'forma\\modules\\product\\records\\Type',13,1),(124,'forma\\modules\\product\\records\\Type',14,1),(125,'forma\\modules\\product\\records\\PackUnit',4,1),(126,'forma\\modules\\product\\records\\PackUnit',5,1),(127,'forma\\modules\\product\\records\\Category',1,1),(128,'forma\\modules\\product\\records\\Category',2,1),(129,'forma\\modules\\product\\records\\Product',13,1),(130,'forma\\modules\\product\\records\\Product',14,1),(131,'forma\\modules\\supplier\\records\\Supplier',6,1),(132,'forma\\modules\\product\\records\\Currency',4,1),(133,'forma\\modules\\product\\records\\Currency',5,1),(134,'forma\\modules\\product\\records\\Currency',6,1),(135,'forma\\modules\\product\\records\\TaxRate',4,1),(136,'forma\\modules\\product\\records\\TaxRate',5,1),(138,'forma\\modules\\product\\records\\TaxRate',6,1),(152,'forma\\modules\\customer\\records\\Customer',61,6),(153,'forma\\modules\\customer\\records\\Customer',62,6),(154,'forma\\modules\\customer\\records\\Customer',63,6),(155,'forma\\modules\\customer\\records\\Customer',64,6),(156,'forma\\modules\\customer\\records\\Customer',65,6),(157,'forma\\modules\\customer\\records\\Customer',66,6),(159,'forma\\modules\\customer\\records\\Customer',67,6),(161,'forma\\modules\\customer\\records\\Customer',68,6),(163,'forma\\modules\\customer\\records\\Customer',69,6),(165,'forma\\modules\\customer\\records\\Customer',70,6),(166,'forma\\modules\\customer\\records\\Customer',71,6),(168,'forma\\modules\\customer\\records\\Customer',72,6),(170,'forma\\modules\\customer\\records\\Customer',73,6),(172,'forma\\modules\\customer\\records\\Customer',74,6),(174,'forma\\modules\\customer\\records\\Customer',75,6),(176,'forma\\modules\\supplier\\records\\Supplier',7,6),(177,'forma\\modules\\customer\\records\\Customer',76,6),(178,'forma\\modules\\customer\\records\\Customer',77,6),(181,'forma\\modules\\project\\records\\Project',2,1),(182,'forma\\modules\\vacancy\\records\\Vacancy',1,1),(183,'forma\\modules\\vacancy\\records\\Vacancy',2,1),(184,'forma\\modules\\vacancy\\records\\Vacancy',3,1),(185,'forma\\modules\\vacancy\\records\\Vacancy',4,1),(186,'forma\\modules\\worker\\records\\Worker',1,1),(187,'forma\\modules\\worker\\records\\Worker',2,1),(188,'forma\\modules\\worker\\records\\Worker',3,1),(189,'forma\\modules\\worker\\records\\Worker',4,1),(190,'forma\\modules\\worker\\records\\Worker',5,1),(191,'forma\\modules\\worker\\records\\Worker',6,1),(192,'forma\\modules\\worker\\records\\Worker',7,1),(193,'forma\\modules\\worker\\records\\Worker',8,1),(194,'forma\\modules\\product\\records\\Product',15,1),(195,'forma\\modules\\product\\records\\Product',16,1),(196,'forma\\modules\\product\\records\\Product',17,1),(197,'forma\\modules\\product\\records\\Product',18,1),(198,'forma\\modules\\product\\records\\Product',19,1),(199,'forma\\modules\\customer\\records\\Customer',78,1),(200,'forma\\modules\\customer\\records\\Customer',79,6),(201,'forma\\modules\\customer\\records\\Customer',80,6),(202,'forma\\modules\\customer\\records\\Customer',81,6),(203,'forma\\modules\\customer\\records\\Customer',82,6),(204,'forma\\modules\\customer\\records\\Customer',83,6),(205,'forma\\modules\\customer\\records\\Customer',84,6),(206,'forma\\modules\\customer\\records\\Customer',85,6),(207,'forma\\modules\\customer\\records\\Customer',86,6),(208,'forma\\modules\\customer\\records\\Customer',87,6),(209,'forma\\modules\\customer\\records\\Customer',88,6),(210,'forma\\modules\\customer\\records\\Customer',89,6),(211,'forma\\modules\\customer\\records\\Customer',90,6),(212,'forma\\modules\\customer\\records\\Customer',91,6),(213,'forma\\modules\\customer\\records\\Customer',92,6),(214,'forma\\modules\\customer\\records\\Customer',93,6),(215,'forma\\modules\\customer\\records\\Customer',94,6),(216,'forma\\modules\\customer\\records\\Customer',95,6),(234,'forma\\modules\\customer\\records\\Customer',96,6),(235,'forma\\modules\\customer\\records\\Customer',97,6),(239,'forma\\modules\\supplier\\records\\Supplier',8,1),(240,'forma\\modules\\worker\\records\\Worker',9,8),(241,'forma\\modules\\project\\records\\project\\Project',13,6),(242,'forma\\modules\\project\\records\\project\\Project',14,6),(243,'forma\\modules\\project\\records\\project\\Project',15,6),(244,'forma\\modules\\project\\records\\project\\Project',16,6),(245,'forma\\modules\\project\\records\\project\\Project',17,6),(246,'forma\\modules\\project\\records\\project\\Project',18,6),(247,'forma\\modules\\vacancy\\records\\Vacancy',5,6),(248,'forma\\modules\\vacancy\\records\\Vacancy',6,6),(249,'forma\\modules\\vacancy\\records\\Vacancy',7,6),(250,'forma\\modules\\vacancy\\records\\Vacancy',8,6),(251,'forma\\modules\\vacancy\\records\\Vacancy',9,6),(252,'forma\\modules\\vacancy\\records\\Vacancy',10,6),(253,'forma\\modules\\worker\\records\\Worker',10,6),(255,'forma\\modules\\worker\\records\\Worker',11,6),(256,'forma\\modules\\worker\\records\\Worker',12,6),(257,'forma\\modules\\worker\\records\\Worker',13,6),(305,'forma\\modules\\vacancy\\records\\Vacancy',34,11),(306,'forma\\modules\\project\\records\\project\\Project',30,11),(307,'forma\\modules\\worker\\records\\Worker',27,11),(308,'forma\\modules\\worker\\records\\Worker',28,11),(312,'forma\\modules\\customer\\records\\Customer',98,6),(327,'forma\\modules\\project\\records\\Project',1,1),(328,'forma\\modules\\project\\records\\project\\Project',2,1),(329,'forma\\modules\\project\\records\\project\\Project',3,1),(330,'forma\\modules\\project\\records\\project\\Project',4,1),(331,'forma\\modules\\project\\records\\project\\Project',5,1),(332,'forma\\modules\\project\\records\\project\\Project',6,1),(333,'forma\\modules\\project\\records\\project\\Project',7,1),(334,'forma\\modules\\project\\records\\project\\Project',8,1),(335,'forma\\modules\\project\\records\\project\\Project',9,1),(336,'forma\\modules\\project\\records\\project\\Project',10,1),(337,'forma\\modules\\project\\records\\project\\Project',11,1),(338,'forma\\modules\\project\\records\\project\\Project',12,1),(339,'forma\\modules\\project\\records\\project\\Project',31,1),(340,'forma\\modules\\customer\\records\\Customer',99,1),(341,'forma\\modules\\worker\\records\\Worker',30,1),(342,'forma\\modules\\vacancy\\records\\Vacancy',36,1),(343,'forma\\modules\\project\\records\\project\\Project',32,1),(344,'forma\\modules\\worker\\records\\Worker',31,1),(345,'forma\\modules\\product\\records\\Product',20,1),(347,'forma\\modules\\selling\\records\\talk\\Answer',1,6),(348,'forma\\modules\\selling\\records\\talk\\Answer',2,6),(350,'forma\\modules\\selling\\records\\talk\\Answer',3,6),(351,'forma\\modules\\selling\\records\\talk\\Answer',4,6),(352,'forma\\modules\\selling\\records\\talk\\Answer',5,6),(353,'forma\\modules\\selling\\records\\talk\\Answer',6,6),(354,'forma\\modules\\selling\\records\\talk\\Answer',7,6),(355,'forma\\modules\\selling\\records\\talk\\Answer',8,6),(356,'forma\\modules\\selling\\records\\talk\\Answer',9,6),(357,'forma\\modules\\selling\\records\\talk\\Answer',10,6),(358,'forma\\modules\\selling\\records\\talk\\Answer',11,6),(359,'forma\\modules\\selling\\records\\talk\\Answer',12,6),(360,'forma\\modules\\selling\\records\\talk\\Answer',13,6),(361,'forma\\modules\\selling\\records\\talk\\Answer',31,6),(362,'forma\\modules\\selling\\records\\talk\\Answer',32,6),(363,'forma\\modules\\selling\\records\\talk\\Answer',33,6),(364,'forma\\modules\\selling\\records\\talk\\Request',1,6),(365,'forma\\modules\\selling\\records\\talk\\Request',2,6),(366,'forma\\modules\\selling\\records\\talk\\Request',3,6),(367,'forma\\modules\\selling\\records\\talk\\Request',4,6),(368,'forma\\modules\\selling\\records\\talk\\Request',5,6),(369,'forma\\modules\\selling\\records\\talk\\Request',6,6),(370,'forma\\modules\\selling\\records\\talk\\Request',7,6),(371,'forma\\modules\\selling\\records\\talk\\Request',8,6),(372,'forma\\modules\\selling\\records\\talk\\Request',9,6),(373,'forma\\modules\\selling\\records\\talk\\Request',10,6),(374,'forma\\modules\\selling\\records\\talk\\Request',11,6),(375,'forma\\modules\\selling\\records\\talk\\Request',12,6),(376,'forma\\modules\\selling\\records\\talk\\Request',13,6),(377,'forma\\modules\\selling\\records\\talk\\Request',14,6),(378,'forma\\modules\\selling\\records\\talk\\Request',15,6),(379,'forma\\modules\\selling\\records\\talk\\Request',16,6),(380,'forma\\modules\\selling\\records\\talk\\Request',17,6),(381,'forma\\modules\\selling\\records\\strategy\\Strategy',1,6),(382,'forma\\modules\\customer\\records\\Customer',100,6),(383,'forma\\modules\\hr\\records\\interview\\Interview',27,1),(385,'forma\\modules\\customer\\records\\Customer',101,1),(389,'forma\\modules\\customer\\records\\Customer',102,1),(390,'forma\\modules\\worker\\records\\Worker',32,1),(392,'forma\\modules\\project\\records\\project\\Project',33,1),(394,'forma\\modules\\hr\\records\\interview\\Interview',28,1),(395,'forma\\modules\\customer\\records\\Customer',103,6),(396,'forma\\modules\\vacancy\\records\\Vacancy',37,1),(397,'forma\\modules\\hr\\records\\interview\\Interview',29,1),(402,'forma\\modules\\hr\\records\\interview\\Interview',30,1),(406,'forma\\modules\\hr\\records\\interview\\Interview',31,1),(413,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',2,6),(414,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',3,6),(415,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',4,6),(416,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',5,6),(417,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',6,6),(418,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',7,6),(419,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',8,6),(420,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',9,6),(421,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',10,6),(422,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',11,6),(423,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',12,6),(424,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',13,6),(425,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',14,6),(426,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',15,6),(427,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',16,6),(428,'forma\\modules\\selling\\records\\selling\\Selling',20,6),(430,'forma\\modules\\selling\\records\\selling\\Selling',23,6),(431,'forma\\modules\\selling\\records\\selling\\Selling',24,6),(432,'forma\\modules\\selling\\records\\selling\\Selling',25,6),(433,'forma\\modules\\selling\\records\\selling\\Selling',26,6),(434,'forma\\modules\\selling\\records\\selling\\Selling',27,6),(435,'forma\\modules\\selling\\records\\selling\\Selling',28,6),(436,'forma\\modules\\selling\\records\\selling\\Selling',29,6),(437,'forma\\modules\\selling\\records\\selling\\Selling',30,6),(438,'forma\\modules\\selling\\records\\selling\\Selling',32,6),(439,'forma\\modules\\selling\\records\\selling\\Selling',33,6),(440,'forma\\modules\\selling\\records\\selling\\Selling',34,6),(441,'forma\\modules\\selling\\records\\selling\\Selling',35,6),(442,'forma\\modules\\selling\\records\\selling\\Selling',37,6),(443,'forma\\modules\\selling\\records\\selling\\Selling',38,6),(444,'forma\\modules\\selling\\records\\selling\\Selling',39,6),(445,'forma\\modules\\selling\\records\\selling\\Selling',45,6),(446,'forma\\modules\\selling\\records\\selling\\Selling',47,6),(447,'forma\\modules\\selling\\records\\selling\\Selling',48,6),(448,'forma\\modules\\selling\\records\\selling\\Selling',49,6),(449,'forma\\modules\\selling\\records\\selling\\Selling',51,6),(450,'forma\\modules\\selling\\records\\selling\\Selling',53,6),(451,'forma\\modules\\selling\\records\\selling\\Selling',54,6),(452,'forma\\modules\\selling\\records\\selling\\Selling',60,6),(453,'forma\\modules\\selling\\records\\selling\\Selling',61,6),(454,'forma\\modules\\selling\\records\\selling\\Selling',62,6),(455,'forma\\modules\\selling\\records\\selling\\Selling',63,6),(456,'forma\\modules\\selling\\records\\selling\\Selling',64,6),(457,'forma\\modules\\selling\\records\\selling\\Selling',66,6),(458,'forma\\modules\\selling\\records\\selling\\Selling',67,6),(459,'forma\\modules\\selling\\records\\selling\\Selling',68,6),(460,'forma\\modules\\selling\\records\\selling\\Selling',69,6),(461,'forma\\modules\\selling\\records\\selling\\Selling',71,6),(462,'forma\\modules\\selling\\records\\selling\\Selling',73,6),(463,'forma\\modules\\selling\\records\\selling\\Selling',75,6),(464,'forma\\modules\\selling\\records\\selling\\Selling',76,6),(465,'forma\\modules\\selling\\records\\selling\\Selling',77,6),(466,'forma\\modules\\selling\\records\\selling\\Selling',78,6),(467,'forma\\modules\\selling\\records\\selling\\Selling',79,6),(468,'forma\\modules\\selling\\records\\selling\\Selling',80,6),(469,'forma\\modules\\selling\\records\\selling\\Selling',81,6),(470,'forma\\modules\\selling\\records\\selling\\Selling',82,6),(471,'forma\\modules\\selling\\records\\selling\\Selling',83,6),(472,'forma\\modules\\selling\\records\\selling\\Selling',84,6),(473,'forma\\modules\\selling\\records\\selling\\Selling',85,6),(474,'forma\\modules\\selling\\records\\selling\\Selling',86,6),(475,'forma\\modules\\selling\\records\\selling\\Selling',87,6),(476,'forma\\modules\\selling\\records\\selling\\Selling',88,6),(477,'forma\\modules\\selling\\records\\selling\\Selling',89,6),(478,'forma\\modules\\selling\\records\\selling\\Selling',90,6),(479,'forma\\modules\\selling\\records\\selling\\Selling',91,6),(480,'forma\\modules\\selling\\records\\selling\\Selling',92,6),(481,'forma\\modules\\selling\\records\\selling\\Selling',93,6),(482,'forma\\modules\\selling\\records\\selling\\Selling',94,6),(483,'forma\\modules\\selling\\records\\selling\\Selling',95,6),(484,'forma\\modules\\selling\\records\\selling\\Selling',96,6),(485,'forma\\modules\\selling\\records\\selling\\Selling',97,6),(486,'forma\\modules\\selling\\records\\selling\\Selling',98,6),(487,'forma\\modules\\selling\\records\\selling\\Selling',99,6),(488,'forma\\modules\\selling\\records\\selling\\Selling',100,6),(489,'forma\\modules\\selling\\records\\selling\\Selling',101,6),(490,'forma\\modules\\selling\\records\\selling\\Selling',102,6),(491,'forma\\modules\\selling\\records\\selling\\Selling',103,6),(492,'forma\\modules\\selling\\records\\selling\\Selling',104,6),(493,'forma\\modules\\selling\\records\\selling\\Selling',105,6),(494,'forma\\modules\\selling\\records\\selling\\Selling',106,6),(495,'forma\\modules\\selling\\records\\selling\\Selling',107,6),(496,'forma\\modules\\selling\\records\\selling\\Selling',108,6),(497,'forma\\modules\\selling\\records\\selling\\Selling',109,6),(498,'forma\\modules\\selling\\records\\selling\\Selling',110,6),(499,'forma\\modules\\selling\\records\\selling\\Selling',111,6),(500,'forma\\modules\\selling\\records\\selling\\Selling',112,6),(501,'forma\\modules\\selling\\records\\selling\\Selling',113,6),(502,'forma\\modules\\selling\\records\\selling\\Selling',114,6),(503,'forma\\modules\\selling\\records\\selling\\Selling',115,6),(504,'forma\\modules\\selling\\records\\selling\\Selling',116,6),(505,'forma\\modules\\selling\\records\\selling\\Selling',117,6),(506,'forma\\modules\\selling\\records\\selling\\Selling',118,6),(507,'forma\\modules\\selling\\records\\selling\\Selling',119,6),(508,'forma\\modules\\selling\\records\\selling\\Selling',120,6),(509,'forma\\modules\\selling\\records\\selling\\Selling',121,6),(510,'forma\\modules\\hr\\records\\interview\\Interview',32,6),(513,'forma\\modules\\vacancy\\records\\Vacancy',38,1),(603,'forma\\modules\\vacancy\\records\\Vacancy',39,14),(604,'forma\\modules\\vacancy\\records\\Vacancy',40,14),(605,'forma\\modules\\vacancy\\records\\Vacancy',41,14),(606,'forma\\modules\\vacancy\\records\\Vacancy',42,13),(607,'forma\\modules\\vacancy\\records\\Vacancy',43,13),(608,'forma\\modules\\vacancy\\records\\Vacancy',44,13),(609,'forma\\modules\\vacancy\\records\\Vacancy',45,15),(610,'forma\\modules\\vacancy\\records\\Vacancy',46,15),(611,'forma\\modules\\vacancy\\records\\Vacancy',47,15),(612,'forma\\modules\\worker\\records\\Worker',33,14),(613,'forma\\modules\\worker\\records\\Worker',34,14),(614,'forma\\modules\\worker\\records\\Worker',35,14),(615,'forma\\modules\\worker\\records\\Worker',36,13),(616,'forma\\modules\\worker\\records\\Worker',37,13),(617,'forma\\modules\\worker\\records\\Worker',38,13),(618,'forma\\modules\\worker\\records\\Worker',39,15),(619,'forma\\modules\\worker\\records\\Worker',40,15),(620,'forma\\modules\\worker\\records\\Worker',41,15),(621,'forma\\modules\\project\\records\\project\\Project',34,14),(622,'forma\\modules\\project\\records\\project\\Project',35,14),(623,'forma\\modules\\project\\records\\project\\Project',36,14),(630,'forma\\modules\\project\\records\\project\\Project',40,15),(631,'forma\\modules\\project\\records\\project\\Project',41,13),(632,'forma\\modules\\project\\records\\project\\Project',38,13),(633,'forma\\modules\\project\\records\\project\\Project',42,13),(634,'forma\\modules\\project\\records\\project\\Project',43,15),(635,'forma\\modules\\project\\records\\project\\Project',42,15),(636,'forma\\modules\\project\\records\\project\\Project',41,15),(637,'forma\\modules\\project\\records\\project\\Project',35,15),(638,'forma\\modules\\project\\records\\project\\Project',36,15),(639,'forma\\modules\\project\\records\\project\\Project',34,15),(640,'forma\\modules\\project\\records\\project\\Project',44,13),(641,'forma\\modules\\project\\records\\project\\Project',45,15),(642,'forma\\modules\\project\\records\\project\\Project',46,13),(659,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',10,14),(660,'forma\\modules\\vacancy\\records\\Vacancy',42,14),(661,'forma\\modules\\vacancy\\records\\Vacancy',43,14),(662,'forma\\modules\\vacancy\\records\\Vacancy',44,14),(663,'forma\\modules\\vacancy\\records\\Vacancy',45,14),(664,'forma\\modules\\vacancy\\records\\Vacancy',46,14),(665,'forma\\modules\\vacancy\\records\\Vacancy',47,14),(666,'forma\\modules\\hr\\records\\interview\\Interview',51,14),(667,'forma\\modules\\hr\\records\\interview\\Interview',50,14),(668,'forma\\modules\\worker\\records\\Worker',21,14),(669,'forma\\modules\\worker\\records\\Worker',39,14),(670,'forma\\modules\\hr\\records\\interview\\Interview',52,14),(671,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',8,14),(672,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',11,14),(673,'forma\\modules\\worker\\records\\Worker',37,14),(674,'forma\\modules\\hr\\records\\interview\\Interview',53,14),(675,'forma\\modules\\selling\\records\\strategy\\Strategy',3,14),(676,'forma\\modules\\selling\\records\\talk\\Request',18,14),(677,'forma\\modules\\selling\\records\\talk\\Request',19,14),(678,'forma\\modules\\selling\\records\\talk\\Request',20,14),(679,'forma\\modules\\selling\\records\\talk\\Request',21,14),(680,'forma\\modules\\selling\\records\\talk\\Request',22,14),(682,'forma\\modules\\selling\\records\\talk\\Request',23,14),(683,'forma\\modules\\selling\\records\\talk\\Request',24,14),(684,'forma\\modules\\selling\\records\\talk\\Request',25,14),(685,'forma\\modules\\selling\\records\\talk\\Request',26,14),(686,'forma\\modules\\worker\\records\\Worker',42,14),(687,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',17,14),(688,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',18,14),(689,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',19,14),(690,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',20,14),(691,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',21,14),(692,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',22,14),(693,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',23,14),(694,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',24,14),(695,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',25,14),(707,'forma\\modules\\worker\\records\\Worker',14,13),(708,'forma\\modules\\worker\\records\\Worker',16,13),(709,'forma\\modules\\worker\\records\\Worker',33,13),(710,'forma\\modules\\worker\\records\\Worker',34,13),(711,'forma\\modules\\worker\\records\\Worker',35,13),(723,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',17,14),(724,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',18,14),(725,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',19,14),(726,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',20,14),(728,'forma\\modules\\hr\\records\\interview\\Interview',58,14),(730,'forma\\modules\\hr\\records\\interview\\Interview',60,13),(731,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',21,13),(732,'forma\\modules\\hr\\records\\interview\\Interview',61,13),(733,'forma\\modules\\hr\\records\\interview\\Interview',62,13),(734,'forma\\modules\\hr\\records\\interview\\Interview',58,13),(735,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',17,13),(736,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',19,13),(737,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',22,13),(738,'forma\\modules\\hr\\records\\interview\\Interview',63,13),(739,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',23,15),(740,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',24,15),(741,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',25,15),(742,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',26,15),(743,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',27,15),(744,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',28,13),(746,'forma\\modules\\worker\\records\\Worker',17,15),(747,'forma\\modules\\worker\\records\\Worker',16,14),(748,'forma\\modules\\worker\\records\\Worker',17,14),(877,'forma\\modules\\worker\\records\\Worker',76,14),(878,'forma\\modules\\hr\\records\\interview\\Interview',96,14),(892,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',83,9),(893,'forma\\modules\\project\\records\\project\\Project',36,9),(894,'forma\\modules\\vacancy\\records\\Vacancy',66,9),(895,'forma\\modules\\worker\\records\\Worker',78,9),(896,'forma\\modules\\project\\records\\project\\Project',60,9),(897,'forma\\modules\\hr\\records\\interview\\Interview',100,9),(898,'forma\\modules\\project\\records\\project\\Project',61,9),(899,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',84,9),(900,'forma\\modules\\project\\records\\project\\Project',62,9),(901,'forma\\modules\\project\\records\\project\\Project',63,9),(902,'forma\\modules\\project\\records\\project\\Project',64,9),(903,'forma\\modules\\project\\records\\project\\Project',65,9),(904,'forma\\modules\\project\\records\\project\\Project',66,9),(905,'forma\\modules\\project\\records\\project\\Project',67,9),(906,'forma\\modules\\project\\records\\project\\Project',68,9),(907,'forma\\modules\\project\\records\\project\\Project',69,9),(908,'forma\\modules\\project\\records\\project\\Project',70,9),(909,'forma\\modules\\vacancy\\records\\Vacancy',67,9),(910,'forma\\modules\\vacancy\\records\\Vacancy',68,9),(911,'forma\\modules\\selling\\records\\selling\\Selling',142,1),(912,'forma\\modules\\selling\\records\\selling\\Selling',143,1),(913,'forma\\modules\\worker\\records\\Worker',79,1),(914,'forma\\modules\\worker\\records\\Worker',80,1),(915,'forma\\modules\\worker\\records\\Worker',81,1),(916,'forma\\modules\\hr\\records\\interview\\Interview',101,1),(917,'forma\\modules\\customer\\records\\Customer',104,9),(918,'forma\\modules\\customer\\records\\Customer',105,9),(919,'forma\\modules\\customer\\records\\Customer',106,9),(920,'forma\\modules\\customer\\records\\Customer',107,9),(921,'forma\\modules\\selling\\records\\selling\\Selling',144,9),(922,'forma\\modules\\selling\\records\\selling\\Selling',145,9),(923,'forma\\modules\\selling\\records\\selling\\Selling',146,9),(924,'forma\\modules\\selling\\records\\selling\\Selling',147,9),(925,'forma\\modules\\selling\\records\\selling\\Selling',148,9),(926,'forma\\modules\\selling\\records\\selling\\Selling',149,9),(927,'forma\\modules\\selling\\records\\selling\\Selling',150,9),(928,'forma\\modules\\selling\\records\\selling\\Selling',151,9),(929,'forma\\modules\\customer\\records\\Customer',108,6),(930,'forma\\modules\\selling\\records\\selling\\Selling',152,6),(931,'forma\\modules\\selling\\records\\selling\\Selling',153,1),(932,'forma\\modules\\selling\\records\\selling\\Selling',154,1),(933,'forma\\modules\\selling\\records\\selling\\Selling',155,1),(934,'forma\\modules\\selling\\records\\selling\\Selling',156,1),(935,'forma\\modules\\customer\\records\\Customer',109,6),(936,'forma\\modules\\selling\\records\\selling\\Selling',157,6),(937,'forma\\modules\\selling\\records\\selling\\Selling',158,1),(938,'forma\\modules\\selling\\records\\selling\\Selling',159,1),(939,'forma\\modules\\selling\\records\\selling\\Selling',160,1),(940,'forma\\modules\\selling\\records\\selling\\Selling',161,1),(941,'forma\\modules\\selling\\records\\selling\\Selling',162,1),(942,'forma\\modules\\selling\\records\\selling\\Selling',163,1),(943,'forma\\modules\\selling\\records\\selling\\Selling',164,1),(944,'forma\\modules\\selling\\records\\selling\\Selling',165,1),(945,'forma\\modules\\selling\\records\\selling\\Selling',166,1),(946,'forma\\modules\\selling\\records\\selling\\Selling',167,1),(947,'forma\\modules\\selling\\records\\selling\\Selling',168,1),(948,'forma\\modules\\selling\\records\\selling\\Selling',169,1),(949,'forma\\modules\\selling\\records\\selling\\Selling',170,1),(950,'forma\\modules\\selling\\records\\selling\\Selling',171,1),(951,'forma\\modules\\selling\\records\\selling\\Selling',172,1),(952,'forma\\modules\\selling\\records\\selling\\Selling',173,1),(953,'forma\\modules\\selling\\records\\selling\\Selling',174,1),(954,'forma\\modules\\selling\\records\\selling\\Selling',175,1),(955,'forma\\modules\\selling\\records\\selling\\Selling',176,1),(956,'forma\\modules\\selling\\records\\selling\\Selling',177,1),(957,'forma\\modules\\selling\\records\\selling\\Selling',178,1),(958,'forma\\modules\\selling\\records\\selling\\Selling',179,1),(959,'forma\\modules\\selling\\records\\selling\\Selling',180,1),(960,'forma\\modules\\selling\\records\\selling\\Selling',181,1),(961,'forma\\modules\\selling\\records\\selling\\Selling',182,1),(962,'forma\\modules\\selling\\records\\selling\\Selling',183,1),(963,'forma\\modules\\selling\\records\\selling\\Selling',184,1),(964,'forma\\modules\\selling\\records\\selling\\Selling',185,1),(965,'forma\\modules\\selling\\records\\selling\\Selling',186,1),(966,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',85,6),(967,'forma\\modules\\worker\\records\\Worker',82,6),(968,'forma\\modules\\hr\\records\\interview\\Interview',102,6),(969,'forma\\modules\\selling\\records\\selling\\Selling',137,6),(970,'forma\\modules\\selling\\records\\selling\\Selling',138,6),(971,'forma\\modules\\selling\\records\\selling\\Selling',136,6),(972,'forma\\modules\\selling\\records\\selling\\Selling',134,6),(973,'forma\\modules\\selling\\records\\selling\\Selling',132,6),(974,'forma\\modules\\selling\\records\\selling\\Selling',131,6),(975,'forma\\modules\\selling\\records\\selling\\Selling',129,6),(976,'forma\\modules\\selling\\records\\selling\\Selling',124,6),(977,'forma\\modules\\selling\\records\\selling\\Selling',122,6),(978,'forma\\modules\\selling\\records\\selling\\Selling',130,6),(979,'forma\\modules\\selling\\records\\selling\\Selling',133,6),(980,'forma\\modules\\project\\records\\project\\Project',71,9),(981,'forma\\modules\\vacancy\\records\\Vacancy',69,9),(982,'forma\\modules\\worker\\records\\Worker',83,9),(983,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',86,9),(984,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',87,9),(985,'forma\\modules\\project\\records\\project\\Project',72,9),(986,'forma\\modules\\vacancy\\records\\Vacancy',70,9),(987,'forma\\modules\\worker\\records\\Worker',84,9),(988,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',88,9),(989,'forma\\modules\\hr\\records\\interview\\Interview',103,9),(990,'forma\\modules\\customer\\records\\Customer',110,6),(991,'forma\\modules\\selling\\records\\selling\\Selling',187,6),(992,'forma\\modules\\customer\\records\\Customer',111,6),(993,'forma\\modules\\selling\\records\\selling\\Selling',188,6),(994,'forma\\modules\\customer\\records\\Customer',112,6),(995,'forma\\modules\\selling\\records\\selling\\Selling',189,6),(996,'forma\\modules\\vacancy\\records\\Vacancy',37,9),(997,'forma\\modules\\selling\\records\\talk\\Request',27,9),(998,'forma\\modules\\selling\\records\\talk\\Request',28,9),(999,'forma\\modules\\selling\\records\\talk\\Request',29,9),(1000,'forma\\modules\\selling\\records\\talk\\Request',30,9),(1001,'forma\\modules\\selling\\records\\talk\\Request',31,9),(1002,'forma\\modules\\selling\\records\\talk\\Request',32,9),(1003,'forma\\modules\\selling\\records\\talk\\Request',33,9),(1004,'forma\\modules\\selling\\records\\talk\\Request',34,9),(1005,'forma\\modules\\selling\\records\\strategy\\Strategy',4,9),(1006,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',26,9),(1007,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',27,9),(1008,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',28,9),(1009,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',29,9),(1010,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',30,9),(1011,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',31,9),(1012,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',32,9),(1013,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',33,9),(1014,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',34,9),(1015,'forma\\modules\\selling\\records\\selling\\Selling',190,1),(1016,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',89,1),(1017,'forma\\modules\\worker\\records\\Worker',85,1),(1018,'forma\\modules\\hr\\records\\interview\\Interview',104,1),(1019,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',90,1),(1020,'forma\\modules\\hr\\records\\interview\\Interview',105,1),(1021,'forma\\modules\\worker\\records\\Worker',86,1),(1022,'forma\\modules\\hr\\records\\interview\\Interview',106,1),(1023,'forma\\modules\\worker\\records\\Worker',87,1),(1024,'forma\\modules\\hr\\records\\interview\\Interview',107,1),(1025,'forma\\modules\\worker\\records\\Worker',88,1),(1026,'forma\\modules\\hr\\records\\interview\\Interview',108,1),(1027,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',91,1),(1028,'forma\\modules\\worker\\records\\Worker',89,1),(1029,'forma\\modules\\hr\\records\\interview\\Interview',109,1),(1030,'forma\\modules\\worker\\records\\Worker',90,1),(1031,'forma\\modules\\hr\\records\\interview\\Interview',110,1),(1032,'forma\\modules\\worker\\records\\Worker',91,1),(1033,'forma\\modules\\hr\\records\\interview\\Interview',111,1),(1034,'forma\\modules\\selling\\records\\selling\\Selling',191,1),(1035,'forma\\modules\\customer\\records\\Customer',113,1),(1036,'forma\\modules\\selling\\records\\selling\\Selling',192,1),(1037,'forma\\modules\\customer\\records\\Customer',114,16),(1038,'forma\\modules\\selling\\records\\selling\\Selling',193,16),(1039,'forma\\modules\\selling\\records\\selling\\Selling',194,16),(1040,'forma\\modules\\customer\\records\\Customer',115,16),(1041,'forma\\modules\\selling\\records\\selling\\Selling',195,16),(1042,'forma\\modules\\customer\\records\\Customer',116,16),(1043,'forma\\modules\\selling\\records\\selling\\Selling',196,16),(1044,'forma\\modules\\customer\\records\\Customer',117,16),(1045,'forma\\modules\\selling\\records\\selling\\Selling',197,16),(1046,'forma\\modules\\customer\\records\\Customer',118,16),(1047,'forma\\modules\\selling\\records\\selling\\Selling',198,16),(1048,'forma\\modules\\customer\\records\\Customer',119,16),(1049,'forma\\modules\\selling\\records\\selling\\Selling',199,16),(1050,'forma\\modules\\customer\\records\\Customer',120,16),(1051,'forma\\modules\\selling\\records\\selling\\Selling',200,16),(1052,'forma\\modules\\selling\\records\\selling\\Selling',201,16),(1053,'forma\\modules\\customer\\records\\Customer',121,16),(1054,'forma\\modules\\selling\\records\\selling\\Selling',202,16),(1055,'forma\\modules\\customer\\records\\Customer',122,16),(1056,'forma\\modules\\selling\\records\\selling\\Selling',203,16),(1057,'forma\\modules\\customer\\records\\Customer',123,16),(1058,'forma\\modules\\selling\\records\\selling\\Selling',204,16),(1059,'forma\\modules\\customer\\records\\Customer',124,16),(1060,'forma\\modules\\selling\\records\\selling\\Selling',205,16),(1061,'forma\\modules\\customer\\records\\Customer',125,16),(1062,'forma\\modules\\selling\\records\\selling\\Selling',206,16),(1063,'forma\\modules\\customer\\records\\Customer',126,16),(1064,'forma\\modules\\selling\\records\\selling\\Selling',207,16),(1065,'forma\\modules\\customer\\records\\Customer',127,16),(1066,'forma\\modules\\selling\\records\\selling\\Selling',208,16),(1067,'forma\\modules\\customer\\records\\Customer',128,16),(1068,'forma\\modules\\selling\\records\\selling\\Selling',209,16),(1069,'forma\\modules\\customer\\records\\Customer',129,16),(1070,'forma\\modules\\selling\\records\\selling\\Selling',210,16),(1071,'forma\\modules\\customer\\records\\Customer',130,16),(1072,'forma\\modules\\selling\\records\\selling\\Selling',211,16),(1073,'forma\\modules\\customer\\records\\Customer',131,16),(1074,'forma\\modules\\selling\\records\\selling\\Selling',212,16),(1075,'forma\\modules\\customer\\records\\Customer',132,16),(1076,'forma\\modules\\selling\\records\\selling\\Selling',213,16),(1077,'forma\\modules\\customer\\records\\Customer',133,16),(1078,'forma\\modules\\selling\\records\\selling\\Selling',214,16),(1079,'forma\\modules\\customer\\records\\Customer',134,16),(1080,'forma\\modules\\selling\\records\\selling\\Selling',215,16),(1081,'forma\\modules\\customer\\records\\Customer',135,16),(1082,'forma\\modules\\selling\\records\\selling\\Selling',216,16),(1083,'forma\\modules\\customer\\records\\Customer',136,6),(1084,'forma\\modules\\selling\\records\\selling\\Selling',217,1),(1085,'forma\\modules\\customer\\records\\Customer',137,16),(1086,'forma\\modules\\selling\\records\\selling\\Selling',218,16),(1087,'forma\\modules\\customer\\records\\Customer',138,16),(1088,'forma\\modules\\selling\\records\\selling\\Selling',219,16),(1089,'forma\\modules\\customer\\records\\Customer',139,16),(1090,'forma\\modules\\selling\\records\\selling\\Selling',220,16),(1091,'forma\\modules\\customer\\records\\Customer',140,16),(1092,'forma\\modules\\selling\\records\\selling\\Selling',221,16),(1093,'forma\\modules\\customer\\records\\Customer',141,16),(1094,'forma\\modules\\selling\\records\\selling\\Selling',222,16),(1095,'forma\\modules\\customer\\records\\Customer',142,16),(1096,'forma\\modules\\selling\\records\\selling\\Selling',223,16),(1097,'forma\\modules\\customer\\records\\Customer',143,16),(1098,'forma\\modules\\selling\\records\\selling\\Selling',224,16),(1099,'forma\\modules\\customer\\records\\Customer',144,16),(1100,'forma\\modules\\selling\\records\\selling\\Selling',225,16),(1101,'forma\\modules\\customer\\records\\Customer',145,16),(1102,'forma\\modules\\selling\\records\\selling\\Selling',226,16),(1103,'forma\\modules\\selling\\records\\selling\\Selling',227,1),(1104,'forma\\modules\\customer\\records\\Customer',146,6),(1105,'forma\\modules\\worker\\records\\Worker',92,1),(1106,'forma\\modules\\selling\\records\\strategy\\Strategy',5,1),(1107,'forma\\modules\\selling\\records\\talk\\Request',35,1),(1108,'forma\\modules\\selling\\records\\talk\\Answer',40,1),(1109,'forma\\modules\\selling\\records\\talk\\Answer',41,9),(1110,'forma\\modules\\selling\\records\\talk\\Answer',42,9),(1111,'forma\\modules\\worker\\records\\Worker',93,9),(1112,'forma\\modules\\hr\\records\\interview\\Interview',112,9),(1113,'forma\\modules\\selling\\records\\talk\\Answer',43,9),(1114,'forma\\modules\\hr\\records\\interview\\Interview',113,1),(1115,'forma\\modules\\project\\records\\project\\Project',73,17),(1116,'forma\\modules\\vacancy\\records\\Vacancy',71,17),(1117,'forma\\modules\\vacancy\\records\\Vacancy',72,9),(1118,'forma\\modules\\worker\\records\\Worker',94,17),(1119,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',92,9),(1120,'forma\\modules\\selling\\records\\talk\\Request',36,17),(1121,'forma\\modules\\worker\\records\\Worker',95,9),(1122,'forma\\modules\\hr\\records\\interview\\Interview',114,9),(1123,'forma\\modules\\selling\\records\\talk\\Answer',44,17),(1124,'forma\\modules\\selling\\records\\strategy\\Strategy',6,17),(1125,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',93,17),(1126,'forma\\modules\\hr\\records\\interview\\Interview',115,17),(1127,'forma\\modules\\selling\\records\\talk\\Answer',45,9),(1128,'forma\\modules\\selling\\records\\strategy\\Strategy',7,17),(1129,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',35,17),(1130,'forma\\modules\\hr\\records\\interview\\Interview',116,17),(1131,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',94,9),(1132,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',95,9),(1133,'forma\\modules\\hr\\records\\interview\\Interview',117,9),(1134,'forma\\modules\\selling\\records\\talk\\Answer',46,17),(1135,'forma\\modules\\selling\\records\\talk\\Answer',47,9),(1136,'forma\\modules\\hr\\records\\interview\\Interview',118,9),(1137,'forma\\modules\\selling\\records\\talk\\Request',37,1),(1138,'forma\\modules\\selling\\records\\talk\\Answer',48,1),(1139,'forma\\modules\\selling\\records\\talk\\Answer',49,1),(1140,'forma\\modules\\selling\\records\\talk\\Request',38,1),(1141,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',96,9),(1142,'forma\\modules\\selling\\records\\talk\\Answer',50,1),(1143,'forma\\modules\\selling\\records\\talk\\Request',39,17),(1144,'forma\\modules\\hr\\records\\interview\\Interview',119,9),(1145,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',36,1),(1146,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',37,1),(1147,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',97,18),(1148,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',98,18),(1149,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',99,9),(1150,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',100,18),(1151,'forma\\modules\\worker\\records\\Worker',96,9),(1152,'forma\\modules\\hr\\records\\interview\\Interview',120,9),(1153,'forma\\modules\\hr\\records\\interview\\Interview',101,18),(1154,'forma\\modules\\worker\\records\\Worker',81,18),(1155,'forma\\modules\\worker\\records\\Worker',3,18),(1156,'forma\\modules\\worker\\records\\Worker',1,18),(1157,'forma\\modules\\hr\\records\\interview\\Interview',105,18),(1158,'forma\\modules\\hr\\records\\interview\\Interview',121,1),(1159,'forma\\modules\\hr\\records\\interview\\Interview',122,1),(1160,'forma\\modules\\hr\\records\\interview\\Interview',123,1),(1161,'forma\\modules\\hr\\records\\interview\\Interview',124,1),(1162,'forma\\modules\\hr\\records\\interview\\Interview',125,1),(1163,'forma\\modules\\hr\\records\\interview\\Interview',126,1),(1164,'forma\\modules\\hr\\records\\interview\\Interview',127,1),(1165,'forma\\modules\\selling\\records\\talk\\Answer',51,9),(1166,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',101,9),(1167,'forma\\modules\\project\\records\\project\\Project',74,19),(1168,'forma\\modules\\vacancy\\records\\Vacancy',73,19),(1169,'forma\\modules\\worker\\records\\Worker',97,19),(1170,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',102,19),(1171,'forma\\modules\\hr\\records\\interview\\Interview',128,19),(1172,'forma\\modules\\selling\\records\\talk\\Request',40,19),(1173,'forma\\modules\\selling\\records\\talk\\Answer',52,19),(1174,'forma\\modules\\selling\\records\\strategy\\Strategy',8,19),(1175,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',38,19),(1176,'forma\\modules\\project\\records\\project\\Project',75,20),(1177,'forma\\modules\\project\\records\\project\\Project',76,20),(1178,'forma\\modules\\project\\records\\project\\Project',77,20),(1179,'forma\\modules\\vacancy\\records\\Vacancy',74,20),(1180,'forma\\modules\\vacancy\\records\\Vacancy',75,20),(1181,'forma\\modules\\vacancy\\records\\Vacancy',76,20),(1182,'forma\\modules\\worker\\records\\Worker',98,20),(1183,'forma\\modules\\worker\\records\\Worker',99,20),(1184,'forma\\modules\\worker\\records\\Worker',100,20),(1185,'forma\\modules\\selling\\records\\talk\\Request',41,20),(1186,'forma\\modules\\selling\\records\\talk\\Request',42,20),(1187,'forma\\modules\\selling\\records\\talk\\Request',43,20),(1188,'forma\\modules\\selling\\records\\talk\\Answer',53,20),(1189,'forma\\modules\\selling\\records\\talk\\Answer',54,20),(1190,'forma\\modules\\selling\\records\\talk\\Answer',55,20),(1191,'forma\\modules\\selling\\records\\strategy\\Strategy',9,20),(1192,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',39,20),(1193,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',40,20),(1194,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',41,20),(1195,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',103,20),(1196,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',104,20),(1197,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',105,20),(1198,'forma\\modules\\hr\\records\\interview\\Interview',129,20),(1199,'forma\\modules\\selling\\records\\talk\\Answer',56,20),(1200,'forma\\modules\\hr\\records\\interview\\Interview',130,21),(1201,'forma\\modules\\worker\\records\\Worker',98,21),(1202,'forma\\modules\\project\\records\\project\\Project',78,9),(1203,'forma\\modules\\vacancy\\records\\Vacancy',77,9),(1204,'forma\\modules\\worker\\records\\Worker',101,9),(1205,'forma\\modules\\selling\\records\\talk\\Request',44,9),(1206,'forma\\modules\\selling\\records\\talk\\Answer',57,9),(1207,'forma\\modules\\selling\\records\\strategy\\Strategy',10,9),(1208,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',42,9),(1209,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',106,9),(1210,'forma\\modules\\hr\\records\\interview\\Interview',131,9),(1211,'forma\\modules\\hr\\records\\interview\\Interview',132,1),(1212,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',98,1),(1213,'forma\\modules\\selling\\records\\talk\\Answer',58,1),(1214,'forma\\modules\\selling\\records\\talk\\Request',45,18),(1215,'forma\\modules\\selling\\records\\talk\\Answer',59,18),(1216,'forma\\modules\\selling\\records\\talk\\Answer',60,18),(1217,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',43,18),(1218,'forma\\modules\\hr\\records\\interview\\Interview',111,18),(1219,'forma\\modules\\selling\\records\\talk\\Answer',58,18),(1220,'forma\\modules\\hr\\records\\interview\\Interview',133,1),(1221,'forma\\modules\\selling\\records\\talk\\Answer',61,9),(1222,'forma\\modules\\selling\\records\\talk\\Answer',62,9),(1223,'forma\\modules\\selling\\records\\talk\\Answer',63,9),(1224,'forma\\modules\\selling\\records\\talk\\Answer',64,9),(1225,'forma\\modules\\selling\\records\\talk\\Answer',65,9),(1226,'forma\\modules\\selling\\records\\talk\\Answer',66,9),(1227,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',107,9),(1228,'forma\\modules\\purchase\\records\\purchase\\Purchase',17,1),(1229,'forma\\modules\\product\\records\\Product',21,1),(1230,'forma\\modules\\inventorization\\records\\Inventorization',1,1),(1231,'forma\\modules\\worker\\records\\Worker',102,9),(1232,'forma\\modules\\worker\\records\\Worker',103,9),(1233,'forma\\modules\\vacancy\\records\\Vacancy',78,9),(1234,'forma\\modules\\vacancy\\records\\Vacancy',79,9),(1235,'forma\\modules\\vacancy\\records\\Vacancy',80,9),(1236,'forma\\modules\\worker\\records\\Worker',104,9),(1237,'forma\\modules\\worker\\records\\Worker',105,9),(1238,'forma\\modules\\vacancy\\records\\Vacancy',81,9),(1239,'forma\\modules\\worker\\records\\Worker',106,9),(1240,'forma\\modules\\vacancy\\records\\Vacancy',82,9),(1241,'forma\\modules\\worker\\records\\Worker',107,9),(1242,'forma\\modules\\worker\\records\\Worker',108,9),(1243,'forma\\modules\\worker\\records\\Worker',109,9),(1244,'forma\\modules\\worker\\records\\Worker',110,9),(1245,'forma\\modules\\worker\\records\\Worker',111,9),(1246,'forma\\modules\\worker\\records\\Worker',112,9),(1247,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',108,9),(1248,'forma\\modules\\hr\\records\\interview\\Interview',134,1),(1249,'forma\\modules\\vacancy\\records\\Vacancy',83,1),(1250,'forma\\modules\\worker\\records\\Worker',113,1),(1251,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',109,1),(1252,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',110,1),(1253,'forma\\modules\\hr\\records\\interview\\Interview',135,1),(1254,'forma\\modules\\selling\\records\\selling\\Selling',228,1),(1255,'forma\\modules\\customer\\records\\Customer',147,6),(1256,'forma\\modules\\hr\\records\\interview\\Interview',136,1),(1257,'forma\\modules\\selling\\records\\selling\\Selling',229,1),(1258,'forma\\modules\\selling\\records\\selling\\Selling',230,1),(1259,'forma\\modules\\selling\\records\\selling\\Selling',231,1),(1260,'forma\\modules\\selling\\records\\selling\\Selling',232,1),(1261,'forma\\modules\\selling\\records\\selling\\Selling',233,1),(1262,'forma\\modules\\hr\\records\\interview\\Interview',137,1),(1263,'forma\\modules\\worker\\records\\Worker',114,1),(1264,'forma\\modules\\worker\\records\\Worker',115,1),(1265,'forma\\modules\\worker\\records\\Worker',116,1),(1266,'forma\\modules\\product\\records\\Category',3,1),(1267,'forma\\modules\\product\\records\\Category',4,1),(1268,'forma\\modules\\product\\records\\Category',5,1),(1269,'forma\\modules\\selling\\records\\selling\\Selling',234,1),(1270,'forma\\modules\\selling\\records\\selling\\Selling',235,1),(1271,'forma\\modules\\purchase\\records\\purchase\\Purchase',18,1),(1272,'forma\\modules\\purchase\\records\\purchase\\Purchase',5,1),(1273,'forma\\modules\\hr\\records\\interview\\Interview',138,1),(1274,'forma\\modules\\product\\records\\Type',15,6),(1275,'forma\\modules\\product\\records\\Manufacturer',9,6),(1276,'forma\\modules\\product\\records\\Product',22,6),(1277,'forma\\modules\\purchase\\records\\purchase\\Purchase',19,6),(1278,'forma\\modules\\transit\\records\\transit\\Transit',2,6),(1279,'forma\\modules\\customer\\records\\Customer',148,1),(1280,'forma\\modules\\customer\\records\\Customer',149,1),(1281,'forma\\modules\\customer\\records\\Customer',150,1),(1282,'forma\\modules\\customer\\records\\Customer',151,1),(1283,'forma\\modules\\customer\\records\\Customer',152,1),(1284,'forma\\modules\\customer\\records\\Customer',153,1),(1285,'forma\\modules\\selling\\records\\selling\\Selling',236,1),(1286,'forma\\modules\\customer\\records\\Customer',154,1),(1287,'forma\\modules\\selling\\records\\selling\\Selling',237,1),(1288,'forma\\modules\\customer\\records\\Customer',155,1),(1289,'forma\\modules\\selling\\records\\selling\\Selling',238,1),(1290,'forma\\modules\\customer\\records\\Customer',156,1),(1291,'forma\\modules\\selling\\records\\selling\\Selling',239,1),(1292,'forma\\modules\\customer\\records\\Customer',157,1),(1293,'forma\\modules\\selling\\records\\selling\\Selling',240,1),(1294,'forma\\modules\\customer\\records\\Customer',158,1),(1295,'forma\\modules\\selling\\records\\selling\\Selling',241,1),(1296,'forma\\modules\\customer\\records\\Customer',159,1),(1297,'forma\\modules\\selling\\records\\selling\\Selling',242,1),(1298,'forma\\modules\\customer\\records\\Customer',160,1),(1299,'forma\\modules\\selling\\records\\selling\\Selling',243,1),(1300,'forma\\modules\\customer\\records\\Customer',161,1),(1301,'forma\\modules\\selling\\records\\selling\\Selling',244,1),(1302,'forma\\modules\\customer\\records\\Customer',162,1),(1303,'forma\\modules\\selling\\records\\selling\\Selling',245,1),(1304,'forma\\modules\\customer\\records\\Customer',163,1),(1305,'forma\\modules\\selling\\records\\selling\\Selling',246,1),(1306,'forma\\modules\\customer\\records\\Customer',164,1),(1307,'forma\\modules\\selling\\records\\selling\\Selling',247,1),(1308,'forma\\modules\\customer\\records\\Customer',165,1),(1309,'forma\\modules\\selling\\records\\selling\\Selling',248,1),(1310,'forma\\modules\\customer\\records\\Customer',166,1),(1311,'forma\\modules\\selling\\records\\selling\\Selling',249,1),(1312,'forma\\modules\\customer\\records\\Customer',167,1),(1313,'forma\\modules\\selling\\records\\selling\\Selling',250,1),(1314,'forma\\modules\\customer\\records\\Customer',168,1),(1315,'forma\\modules\\selling\\records\\selling\\Selling',251,1),(1316,'forma\\modules\\customer\\records\\Customer',169,1),(1317,'forma\\modules\\selling\\records\\selling\\Selling',252,1),(1318,'forma\\modules\\customer\\records\\Customer',170,1),(1319,'forma\\modules\\selling\\records\\selling\\Selling',253,1),(1320,'forma\\modules\\customer\\records\\Customer',171,1),(1321,'forma\\modules\\selling\\records\\selling\\Selling',254,1),(1322,'forma\\modules\\customer\\records\\Customer',172,1),(1323,'forma\\modules\\selling\\records\\selling\\Selling',255,1),(1324,'forma\\modules\\customer\\records\\Customer',173,1),(1325,'forma\\modules\\customer\\records\\Customer',174,1),(1326,'forma\\modules\\customer\\records\\Customer',175,1),(1327,'forma\\modules\\selling\\records\\selling\\Selling',256,1),(1328,'forma\\modules\\customer\\records\\Customer',176,1),(1329,'forma\\modules\\selling\\records\\selling\\Selling',257,1),(1330,'forma\\modules\\customer\\records\\Customer',177,1),(1331,'forma\\modules\\selling\\records\\selling\\Selling',258,1),(1332,'forma\\modules\\customer\\records\\Customer',178,1),(1333,'forma\\modules\\selling\\records\\selling\\Selling',259,1),(1334,'forma\\modules\\customer\\records\\Customer',179,1),(1335,'forma\\modules\\selling\\records\\selling\\Selling',260,1),(1336,'forma\\modules\\customer\\records\\Customer',180,1),(1337,'forma\\modules\\selling\\records\\selling\\Selling',261,1),(1338,'forma\\modules\\customer\\records\\Customer',181,1),(1339,'forma\\modules\\selling\\records\\selling\\Selling',262,1),(1340,'forma\\modules\\customer\\records\\Customer',182,1),(1341,'forma\\modules\\selling\\records\\selling\\Selling',263,1),(1342,'forma\\modules\\customer\\records\\Customer',183,1),(1343,'forma\\modules\\selling\\records\\selling\\Selling',264,1),(1344,'forma\\modules\\customer\\records\\Customer',184,1),(1345,'forma\\modules\\selling\\records\\selling\\Selling',265,1),(1346,'forma\\modules\\customer\\records\\Customer',185,1),(1347,'forma\\modules\\selling\\records\\selling\\Selling',266,1),(1348,'forma\\modules\\customer\\records\\Customer',186,1),(1349,'forma\\modules\\selling\\records\\selling\\Selling',267,1),(1350,'forma\\modules\\customer\\records\\Customer',187,1),(1351,'forma\\modules\\selling\\records\\selling\\Selling',268,1),(1352,'forma\\modules\\customer\\records\\Customer',188,1),(1353,'forma\\modules\\selling\\records\\selling\\Selling',269,1),(1354,'forma\\modules\\customer\\records\\Customer',189,1),(1355,'forma\\modules\\selling\\records\\selling\\Selling',270,1),(1356,'forma\\modules\\customer\\records\\Customer',190,1),(1357,'forma\\modules\\selling\\records\\selling\\Selling',271,1),(1358,'forma\\modules\\customer\\records\\Customer',191,1),(1359,'forma\\modules\\selling\\records\\selling\\Selling',272,1),(1360,'forma\\modules\\customer\\records\\Customer',192,1),(1361,'forma\\modules\\selling\\records\\selling\\Selling',273,1),(1362,'forma\\modules\\customer\\records\\Customer',193,1),(1363,'forma\\modules\\selling\\records\\selling\\Selling',274,1),(1364,'forma\\modules\\customer\\records\\Customer',194,1),(1365,'forma\\modules\\selling\\records\\selling\\Selling',275,1),(1366,'forma\\modules\\customer\\records\\Customer',195,1),(1367,'forma\\modules\\selling\\records\\selling\\Selling',276,1),(1368,'forma\\modules\\customer\\records\\Customer',196,1),(1369,'forma\\modules\\selling\\records\\selling\\Selling',277,1),(1370,'forma\\modules\\customer\\records\\Customer',197,1),(1371,'forma\\modules\\selling\\records\\selling\\Selling',278,1),(1372,'forma\\modules\\customer\\records\\Customer',198,1),(1373,'forma\\modules\\selling\\records\\selling\\Selling',279,1),(1374,'forma\\modules\\customer\\records\\Customer',199,1),(1375,'forma\\modules\\selling\\records\\selling\\Selling',280,1),(1376,'forma\\modules\\customer\\records\\Customer',200,1),(1377,'forma\\modules\\selling\\records\\selling\\Selling',281,1),(1378,'forma\\modules\\selling\\records\\talk\\Answer',67,1),(1379,'forma\\modules\\customer\\records\\Customer',201,1),(1380,'forma\\modules\\selling\\records\\selling\\Selling',282,1),(1381,'forma\\modules\\customer\\records\\Customer',202,77),(1382,'forma\\modules\\selling\\records\\selling\\Selling',283,77),(1383,'forma\\modules\\selling\\records\\selling\\Selling',284,77),(1384,'forma\\modules\\selling\\records\\selling\\Selling',285,77),(1385,'forma\\modules\\selling\\records\\selling\\Selling',286,1),(1386,'forma\\modules\\selling\\records\\selling\\Selling',287,77),(1387,'forma\\modules\\selling\\records\\selling\\Selling',288,77),(1388,'forma\\modules\\selling\\records\\selling\\Selling',289,77),(1389,'forma\\modules\\selling\\records\\selling\\Selling',290,77),(1390,'forma\\modules\\selling\\records\\selling\\Selling',291,77),(1391,'forma\\modules\\selling\\records\\selling\\Selling',292,77),(1392,'forma\\modules\\selling\\records\\selling\\Selling',293,77),(1393,'forma\\modules\\selling\\records\\selling\\Selling',294,77),(1394,'forma\\modules\\selling\\records\\selling\\Selling',295,77),(1395,'forma\\modules\\selling\\records\\selling\\Selling',296,77),(1396,'forma\\modules\\selling\\records\\selling\\Selling',297,77),(1397,'forma\\modules\\purchase\\records\\purchase\\Purchase',20,6),(1398,'forma\\modules\\product\\records\\Type',16,77),(1399,'forma\\modules\\product\\records\\Manufacturer',10,77),(1400,'forma\\modules\\product\\records\\Category',6,77),(1401,'forma\\modules\\product\\records\\Product',23,77),(1402,'forma\\modules\\product\\records\\PackUnit',6,77),(1403,'forma\\modules\\product\\records\\Product',24,77),(1404,'forma\\modules\\product\\records\\Product',25,1),(1405,'forma\\modules\\customer\\records\\Customer',203,1),(1406,'forma\\modules\\selling\\records\\selling\\Selling',298,1),(1407,'forma\\modules\\customer\\records\\Customer',204,1),(1408,'forma\\modules\\selling\\records\\selling\\Selling',299,1),(1409,'forma\\modules\\customer\\records\\Customer',205,1),(1410,'forma\\modules\\selling\\records\\selling\\Selling',300,1),(1411,'forma\\modules\\customer\\records\\Customer',206,1),(1412,'forma\\modules\\selling\\records\\selling\\Selling',301,1),(1413,'forma\\modules\\customer\\records\\Customer',207,1),(1414,'forma\\modules\\selling\\records\\selling\\Selling',302,1),(1415,'forma\\modules\\customer\\records\\Customer',208,1),(1416,'forma\\modules\\selling\\records\\selling\\Selling',303,1),(1417,'forma\\modules\\customer\\records\\Customer',209,1),(1418,'forma\\modules\\selling\\records\\selling\\Selling',304,1),(1419,'forma\\modules\\customer\\records\\Customer',210,1),(1420,'forma\\modules\\selling\\records\\selling\\Selling',305,1),(1421,'forma\\modules\\customer\\records\\Customer',211,1),(1422,'forma\\modules\\selling\\records\\selling\\Selling',306,1),(1423,'forma\\modules\\customer\\records\\Customer',212,1),(1424,'forma\\modules\\selling\\records\\selling\\Selling',307,1),(1425,'forma\\modules\\customer\\records\\Customer',213,1),(1426,'forma\\modules\\selling\\records\\selling\\Selling',308,1),(1427,'forma\\modules\\customer\\records\\Customer',214,1),(1428,'forma\\modules\\selling\\records\\selling\\Selling',309,1),(1429,'forma\\modules\\customer\\records\\Customer',215,1),(1430,'forma\\modules\\selling\\records\\selling\\Selling',310,1),(1431,'forma\\modules\\customer\\records\\Customer',216,1),(1432,'forma\\modules\\selling\\records\\selling\\Selling',311,1),(1433,'forma\\modules\\customer\\records\\Customer',217,1),(1434,'forma\\modules\\selling\\records\\selling\\Selling',312,1),(1435,'forma\\modules\\customer\\records\\Customer',218,1),(1436,'forma\\modules\\selling\\records\\selling\\Selling',313,1),(1437,'forma\\modules\\worker\\records\\Worker',117,1),(1438,'forma\\modules\\selling\\records\\talk\\Answer',68,1),(1439,'forma\\modules\\transit\\records\\transit\\Transit',3,1),(1440,'forma\\modules\\purchase\\records\\purchase\\Purchase',21,1),(1441,'forma\\modules\\purchase\\records\\purchase\\Purchase',22,1),(1442,'forma\\modules\\purchase\\records\\purchase\\Purchase',23,1),(1443,'forma\\modules\\purchase\\records\\purchase\\Purchase',24,1),(1444,'forma\\modules\\purchase\\records\\purchase\\Purchase',25,1),(1445,'forma\\modules\\customer\\records\\Customer',12,1),(1446,'forma\\modules\\selling\\records\\selling\\Selling',316,1),(1447,'forma\\modules\\customer\\records\\Customer',219,1),(1448,'forma\\modules\\selling\\records\\selling\\Selling',320,1),(1449,'forma\\modules\\customer\\records\\Customer',220,1),(1450,'forma\\modules\\selling\\records\\selling\\Selling',321,1),(1451,'forma\\modules\\customer\\records\\Customer',221,1),(1452,'forma\\modules\\selling\\records\\selling\\Selling',322,1),(1453,'forma\\modules\\customer\\records\\Customer',222,1),(1454,'forma\\modules\\selling\\records\\selling\\Selling',323,1),(1455,'forma\\modules\\customer\\records\\Customer',223,1),(1456,'forma\\modules\\selling\\records\\selling\\Selling',324,1),(1457,'forma\\modules\\customer\\records\\Customer',224,1),(1458,'forma\\modules\\selling\\records\\selling\\Selling',325,1),(1459,'forma\\modules\\customer\\records\\Customer',225,1),(1460,'forma\\modules\\selling\\records\\selling\\Selling',326,1),(1461,'forma\\modules\\customer\\records\\Customer',226,1),(1462,'forma\\modules\\selling\\records\\selling\\Selling',327,1),(1463,'forma\\modules\\product\\records\\Category',7,1),(1464,'forma\\modules\\product\\records\\Category',8,1),(1465,'forma\\modules\\product\\records\\Category',9,1),(1466,'forma\\modules\\product\\records\\Category',10,1),(1467,'forma\\modules\\product\\records\\Category',11,1),(1468,'forma\\modules\\product\\records\\Category',43,1),(1469,'forma\\modules\\product\\records\\Category',44,1),(1470,'forma\\modules\\product\\records\\Product',26,77),(1471,'forma\\modules\\product\\records\\Manufacturer',11,1),(1472,'forma\\modules\\product\\records\\Manufacturer',12,77);
/*!40000 ALTER TABLE `accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `request_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id-answer-request_id` (`request_id`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'Это (название организации), я правильно  позвонил?',1),(2,'Это (имя, отчество менеджера). Руководитель на месте?',2),(3,'Да, это по поводу  системы автоматизации. Вы руководитель?',3),(4,'В первую очередь, наши программы наводят порядок в продажах. Кроме того, мы наводим порядок в процессах найма, планирования и так далее. ',4),(5,'Соедините с руководителем отдела продаж. (С директором вашим)',5),(6,'Для автоматизации продаж и бизнес процессов. Вы руководитель, я правильно понимаю? Переключите на руководителя! ',6),(7,'Мне нужно переговорить с ним сегодня, т.к. мы могли бы дать компании дополнительных клиентов. Продиктуйте его номер.',7),(8,'Скажите, а вы всё еще пользуетесь теми старыми программами для учета? Ну, говорили что тормозят, что какие то проблеммы с ними. Не в курсе?Дайте номер руководителя, он должен быть в курсе этих вопросов.',7),(9,'Мы создаём ПОНЯТНОЕ программное обеспечение для компании и сотрудников, у нас две цели: 1)Повышение прибыльности компании;\r\n2)Порядок и дисциплина в бизнесе; \r\nВы сейчас пользуетесь какими либо программами, или может Excell, или ручка-листик?',8),(10,'В первую очередь, наши программы наводят порядок в продажах. Кроме того, мы наводим порядок в процессах найма, планирования и так далее. ',9),(11,'Могли бы Вы переговорить с нашим директором. Он расскажет все технические и формальные детали. ',10),(12,'Я видел много запросов по Вашему направлению. Вас ищут клиенты через интернет. Скажите, а Вы смогли бы обрабатывать больше клиентов, если мы предоставим Вам такую возможность? ',11),(13,'Рыночная! Прототип = 2000$ (как телефон и ноутбук(Проект в среднем, как не дорогая машина(20000$)))',12),(31,'Добрый день, соедениет с руководителем ',16),(32,'Ну отлично, значит не зря Вам звоню, если мы разработаем клиентскую  базу для вас, мы повысим эффективность Вашего бизнеса',17),(34,'fghjkl;',10),(35,'Я представляю компанию Инжелло',2),(36,'ыывапролдлорпа',12),(37,'цукенг',4),(38,'Вот ответ',3),(39,' Мой ответ',12),(40,'Да',35),(44,'12',36),(45,'Пришлю на почту',24),(46,'2',36),(47,'да',26),(48,'да',37),(49,'а раньше никак?',37),(51,'У меня нет опыта',19),(52,'TestForGabri',40),(53,'Тестовый ответ №1',41),(54,'Тестовый ответ №2',42),(55,'Тестовый ответ №3',43),(56,'тестовый ответ',43),(58,'да',37),(59,'картой',45),(60,'наличными',45),(61,'йцу',19),(62,'йцу',19),(63,'йцу',19),(64,'уцй',24),(65,'уцй',24),(66,'уууу',26),(67,'В таком случае, Вас может заинтересовать апгрейд системы. Мы можем провести аудит, это бесплатно.',14),(68,'',1);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_unique_index` (`name`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (8,'',NULL),(9,'вцф',2),(3,'Корм для котов',NULL),(1,'Крепкиеd1',3),(6,'Материальные утехи',NULL),(43,'Новый тест',11),(4,'Паучи',3),(5,'Пачка 400гр',3),(10,'Слабоалкоголка',2),(11,'Слабоалкоголка1',3),(44,'Слабоалкоголка2',3),(2,'Слабоалкоголка_тест',3),(7,'Смартфоны',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (2,'Польша'),(3,'Чехия'),(4,'Германия'),(5,'Франция'),(9,'Украина'),(10,'Белоруссия'),(11,'Россия'),(12,'Дания');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` char(3) NOT NULL COMMENT 'ISO 4217 code',
  `rate` decimal(13,4) NOT NULL COMMENT 'US Dollar rate',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'Доллар','USD',1.0000),(2,'Евро','EUR',1.2400),(3,'Гривна','GRN',0.0400),(4,'Гривна','UAH',1.0000);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `tax_rate` double(10,2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `firm` varchar(100) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `company_email` varchar(32) DEFAULT NULL,
  `chief_email` varchar(32) DEFAULT NULL,
  `company_phone` varchar(32) DEFAULT NULL,
  `chief_phone` varchar(32) DEFAULT NULL,
  `site_company` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer-country_id_fk` (`country_id`),
  CONSTRAINT `customer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (10,10,NULL,'Дмитрий Фомченко','ИП, Цифровой мир для малого бизнеса (что-то с проф-союзами)','Минск','','3045655@gmail.com','','+375293045655',NULL),(28,11,NULL,'Алиса Чудова','Стильная Мода','Челябинск, Корпоративная 17А','','dasjgvjhv','','+785225856501',''),(59,2,NULL,'Валентина Литейченко','Qiite Systems','Pritholinsi 43-e-1 ','','','','+589654523241',NULL),(148,NULL,NULL,'Программирование Сайта !',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,NULL,NULL,'Программирование Сайта !',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(150,NULL,NULL,'Программирование Сайта !',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(151,NULL,NULL,'Программирование Сайта !',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(152,NULL,NULL,'Программирование Сайта !',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(153,NULL,NULL,'Программирование Сайта !',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(154,NULL,NULL,'Программирование Сайта !',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(155,NULL,NULL,'Yii 2 - доработка интернет магазина.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(156,NULL,NULL,'Yii 2 - доработка интернет магазина.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(157,NULL,NULL,'Ролик для соц сетей 30сек (фитнесс)',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(158,NULL,NULL,'Back-end / full-stack (PHP7 Laravel) полная занятость/удаленка',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(159,NULL,NULL,'Cпециалист для постояннoй работы PHP, Laravel, Vue.js, HTML5, Ubuntu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(160,NULL,NULL,'PHP/Java/CRM/Сайт',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(161,NULL,NULL,'Laravel разработчик',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(162,NULL,NULL,'CRM   ToDo',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(163,NULL,NULL,'Опытный программист PHP   Laravel',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(164,NULL,NULL,'Laravel - доработка проекта',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(165,NULL,NULL,'Разработка магазина PHP фрейм Yii 2.0 , CSS фрейм Bootstrap',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(166,NULL,NULL,'Разработчик PHP',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(167,NULL,NULL,'Нужно разработать мобильное приложение по аналогу ppp...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(168,NULL,NULL,'PHP разработчик для разработки на moodle',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,NULL,NULL,'Интеграция 3 форм на Yii с внешней системой R-leads (Salesforce)',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(170,NULL,NULL,'Требуется PHP-разработчик, на постоянную работу',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(171,NULL,NULL,'Yii 2 - доработка интернет магазина.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,NULL,NULL,'Yii 2 - доработка интернет магазина.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(173,NULL,NULL,'Правки на Опенкарт 3 по ТЗ',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(174,NULL,NULL,'Правки на Опенкарт 3 по ТЗ',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(175,NULL,NULL,'Правки на Опенкарт 3 по ТЗ',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(176,NULL,NULL,'Нужен программист на разработку киберспортивного пр...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(177,NULL,NULL,'Разработка платформы по этапно.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(178,NULL,NULL,'Доработка функционала скрипта PHP',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(179,NULL,NULL,'Laravel/js (vue) разработчик',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(180,NULL,NULL,'Laravel\\React fullstack developer удаленно (фултайм, трекер)',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(181,NULL,NULL,'Ищу напарника backend Laravel разработчика для завершения п...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(182,NULL,NULL,'DirtMixer - профессиональная оффроад соц сеть',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(183,NULL,NULL,'Программист для поддержки проекта | Yii2',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(184,NULL,NULL,'Система распознавания лиц и статистика',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(185,NULL,NULL,'Создание прототипа WEB app',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(186,NULL,NULL,'Добавить функционал на рабочий сайт yii 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(187,NULL,NULL,'Веб интерфейс на ReactJS',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(188,NULL,NULL,'Laravel проект.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(189,NULL,NULL,'Правки PHP',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(190,NULL,NULL,'Разработка бэкенда для мобильного приложения',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(191,NULL,NULL,'Веб-приложение для взаимодействия между собой пользователей...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(192,NULL,NULL,'WEB-разработчик. Удаленная работа на постоянной основе....',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(193,NULL,NULL,'Laravel + Nuxt (vue.js) чат',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(194,NULL,NULL,'Специалист для проверки, доработки, рефакторинга проекта на Laravel...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(195,NULL,NULL,'Сделать приложение',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(196,NULL,NULL,'Нужно сделать правки на сайте Yii',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(197,NULL,NULL,'Разработка гибридного мобильного приложения',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(198,NULL,NULL,'Сопровождения и дальнейшей доработки интернет-платформы для переводчик...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(199,NULL,NULL,'Разработка CRM системы с использованием API',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(200,NULL,NULL,'Доработать CRM',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(201,NULL,NULL,'Требуется web-программист на удалённую работу',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(203,NULL,NULL,'Разработка приложения с серверной частью',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(204,NULL,NULL,'Консультация по выбору решения для создания мобильного приложения...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(205,NULL,NULL,'Парсер и подачу API для сайта на yii2',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(206,NULL,NULL,'Парсер данных с сайта',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(207,NULL,NULL,'Создание сайта для отеля',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(208,NULL,NULL,'Разработка парсеров',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(209,NULL,NULL,'Разработка приложения с серверной частью',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(210,NULL,NULL,'Разработка приложения с серверной частью',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(211,NULL,NULL,'Ищется php-программист (php 7.4, mysql). Удаленная работа',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(212,NULL,NULL,'Yii2 разработчик',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(213,NULL,NULL,'C Language Expert with experience in PHP Interpreter or PHP Extensions',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(214,NULL,NULL,'C Language Expert with experience in PHP Interpreter or PHP Extensions',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(215,NULL,NULL,'Отображение количества установок мобильных приложений на сайте...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(216,NULL,NULL,'Отображение количества установок мобильных приложений на сайте...',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(217,NULL,NULL,'Требуется web-программист на удалённую работу',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(218,NULL,NULL,'Middle/Senior PHP Developer',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(219,NULL,NULL,'Нужен специалист PHP, MySQL и JavaScript, HTML и CSS.',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(220,NULL,NULL,'Требуется Senior Backend Developer в офис в Киеве',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(221,NULL,NULL,'Ищется php-программист (php 7.4, mysql). Проект на удаленке',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(222,NULL,NULL,'Yii2 разработчик',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(223,NULL,NULL,'Требуется web-программист на удалённую работу',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(224,NULL,NULL,'Потрібен фрілансер backend php програміст (фреймворк Yii 2)',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(225,NULL,NULL,'Дропшиппинг платформа, учетка, автоматизация - ТЗ в описании....',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(226,NULL,NULL,'Необходимо настроить CRM для управления и автоматизации HR-процессов...',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `event_type_id` int(11) NOT NULL COMMENT 'Тип',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `text` text NOT NULL COMMENT 'Текст',
  `status` int(1) NOT NULL COMMENT 'Статус',
  `date_from` date NOT NULL COMMENT 'Начало',
  `date_to` date NOT NULL COMMENT 'Конец',
  `start_time` time NOT NULL COMMENT 'Время',
  PRIMARY KEY (`id`),
  KEY `event_type_id` (`event_type_id`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,1,'Тестовое событие 1','Описание очень важного события, которое забудется, если не хранить его в системе.',1,'2018-10-30','2018-10-30','10:06:09'),(2,1,'Тестовое событие 1','Тестовое событие 1',1,'2018-10-31','2018-10-31','09:06:09'),(3,3,'Тестовое событие 1','Описание очень важного события, которое забудется, если не хранить его в системе.',1,'2018-10-30','2018-10-30','10:06:09'),(4,4,'Тестовое событие 1','Описание очень важного события, которое забудется, если не хранить его в системе.',1,'2018-10-30','2018-10-30','10:06:09'),(5,1,'Тестовое событие 1','Тестовое событие 1',1,'2018-10-29','2018-10-29','10:36:09'),(6,1,'Тестовое событие 2 ','Тестовое событие 2 ',1,'2018-12-21','2018-12-21','11:30:07'),(7,1,'Тестовое событие 3','Тестовое событие 3',1,'2018-12-20','2018-12-20','07:00:07'),(8,2,'Тестовое событие 4','Описание',1,'2018-12-22','2018-12-22','17:20:00'),(9,1,'Тестовое событие 5','Тестовое событие 5',1,'2018-12-21','2018-12-21','02:20:00'),(10,1,'Тестовое событие 6','Тестовое событие 6',1,'2018-12-14','2018-12-14','12:50:00'),(11,1,'Тестовое событие 7','Тестовое событие 7',1,'2018-12-12','2018-12-12','01:20:00'),(12,2,'Тестовое событие 8','описание события',1,'2018-12-12','2018-12-12','13:20:00'),(13,2,'Тестовое событие 9','описание',1,'2018-12-26','2018-12-26','11:00:00');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `name` int(255) NOT NULL COMMENT 'Имя',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'Статус',
  `color` varchar(20) NOT NULL DEFAULT '#CCC' COMMENT 'Цвет',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_type`
--

LOCK TABLES `event_type` WRITE;
/*!40000 ALTER TABLE `event_type` DISABLE KEYS */;
INSERT INTO `event_type` VALUES (1,0,0,''),(2,0,0,''),(3,0,0,''),(4,0,0,''),(5,0,0,''),(6,0,0,''),(7,0,0,'');
/*!40000 ALTER TABLE `event_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field`
--

DROP TABLE IF EXISTS `field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `widget` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `field_ibfk_1` (`category_id`),
  CONSTRAINT `field_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,1,'DatePicker','Виджет даты'),(2,2,'DatePicker','Тот же виджет'),(3,1,'ColorInput','Цвет'),(4,2,'activeDropDownList','Дроплист(Html)'),(5,1,'dropDownList','Дроплист(ActiveFor)'),(6,2,'dropDownList','Дроплист(ActiveFor)2'),(11,2,'dropDownList','Мой первый виджетe'),(12,2,'ColorInput','Мой первый виджет'),(13,1,'dropDownList','Дроплист(ActiveFor)2'),(14,1,'dropDownList','Дроплист(ActiveFor)2');
/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_product_value`
--

DROP TABLE IF EXISTS `field_product_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_product_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `field_product_value_ibfk_1` (`field_id`),
  KEY `field_product_value_ibfk_2` (`product_id`),
  CONSTRAINT `field_product_value_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_product_value_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_product_value`
--

LOCK TABLES `field_product_value` WRITE;
/*!40000 ALTER TABLE `field_product_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_product_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_value`
--

DROP TABLE IF EXISTS `field_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `is_main` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `field_value_ibfk_1` (`field_id`),
  CONSTRAINT `field_value_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_value`
--

LOCK TABLES `field_value` WRITE;
/*!40000 ALTER TABLE `field_value` DISABLE KEYS */;
INSERT INTO `field_value` VALUES (1,1,'День рождения',1),(2,1,'8е марта',0),(3,1,'любой день',NULL);
/*!40000 ALTER TABLE `field_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interview`
--

DROP TABLE IF EXISTS `interview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `state` int(11) NOT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  `dialog` text,
  `next_step` text,
  PRIMARY KEY (`id`),
  KEY `interview_worker_id_fk` (`worker_id`),
  KEY `interview_project_id_fk` (`project_id`),
  KEY `interview_vacancy_id_fk` (`vacancy_id`),
  CONSTRAINT `interview_project_id_fk` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `interview_vacancy_id_fk` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE,
  CONSTRAINT `interview_worker_id_fk` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interview`
--

LOCK TABLES `interview` WRITE;
/*!40000 ALTER TABLE `interview` DISABLE KEYS */;
INSERT INTO `interview` VALUES (55,43,21,'','2018-12-26 16:15:36',NULL,4,11,'28.12.2018 12:49:07<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцуйцуйцу</div><br/>false28.12.2018 12:50:33<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><br/>false','false'),(56,44,21,'','2018-12-26 16:17:42',NULL,4,11,NULL,NULL),(67,29,22,'','2018-12-27 12:59:48',NULL,1,11,NULL,NULL),(68,50,22,'','2018-12-27 13:00:54',NULL,4,49,NULL,NULL),(69,51,22,'','2018-12-27 13:03:00',NULL,5,49,NULL,NULL),(70,52,22,'','2018-12-27 13:10:16',NULL,1,49,NULL,NULL),(71,53,24,'','2018-12-27 13:11:11',NULL,1,49,NULL,NULL),(72,54,24,'','2018-12-27 13:12:59',NULL,2,49,NULL,NULL),(73,55,25,'','2018-12-27 13:14:11',NULL,2,30,NULL,NULL),(74,17,47,'','2018-12-28 12:57:54',NULL,3,11,'28.12.2018 11:03:36<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Я оставил коментарий к диалогу.\nОн может быть различного размера.</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">В следующий раз позвонить в четверг</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">А вот оперативно-добавленный комментарий. </div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">В следующий раз позвонить в четверг</div>'),(75,56,21,'','2018-12-28 13:05:51',NULL,2,26,NULL,NULL),(76,56,21,'','2018-12-28 13:06:03',NULL,3,26,NULL,NULL),(77,56,21,'','2018-12-28 13:06:13',NULL,2,26,NULL,NULL),(78,56,21,'','2018-12-28 13:07:04',NULL,2,26,NULL,NULL),(79,56,21,'','2018-12-28 13:07:20',NULL,1,26,NULL,NULL),(80,56,21,'','2018-12-28 13:07:27',NULL,0,26,NULL,NULL),(81,56,21,'','2018-12-28 13:07:33',NULL,0,26,NULL,NULL),(82,56,21,'','2018-12-28 13:07:39',NULL,0,26,NULL,NULL),(83,56,21,'','2018-12-28 13:07:44',NULL,0,26,NULL,NULL),(84,56,21,'','2018-12-28 13:07:50',NULL,0,26,NULL,NULL),(85,56,21,'','2018-12-28 13:07:59',NULL,0,26,NULL,NULL),(86,56,21,'','2018-12-28 13:08:06',NULL,0,26,NULL,NULL),(87,56,21,'','2018-12-28 13:08:11',NULL,0,26,NULL,NULL),(88,56,21,'','2018-12-28 13:08:24',NULL,0,26,NULL,NULL),(89,56,21,'','2018-12-28 13:08:28',NULL,0,26,NULL,NULL),(90,56,21,'','2018-12-28 13:08:34',NULL,0,26,NULL,NULL),(91,56,21,'','2018-12-28 13:09:53',NULL,4,26,NULL,NULL),(92,56,21,'','2018-12-28 13:10:30',NULL,5,26,NULL,NULL),(93,56,21,'','2018-12-28 13:10:49',NULL,6,26,NULL,NULL),(94,29,58,'','2018-12-28 13:13:56',NULL,1,11,NULL,NULL),(95,74,25,'','2018-12-28 15:12:05',NULL,0,30,'28.12.2018 13:13:27<br/><p>Клиент: \n                        \n                        «Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )                        \n                    </p><p>Менеджер: Удовлетворительно</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">подходит</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">этап работы</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">этап работы</div>'),(97,17,21,'','2018-12-28 16:16:04',NULL,1,11,'28.12.2018 14:17:51<br/><p>Клиент: \n                        \n                        «Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )                        \n                    </p><p>Менеджер: Удовлетворительно</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">kdjagffjbj</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">12 5</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">12 5</div>'),(98,17,21,'','2018-12-28 16:18:45',NULL,3,26,NULL,NULL),(99,17,59,'','2018-12-28 16:39:11',NULL,4,11,NULL,NULL),(101,81,3,'','2019-01-08 13:50:33',NULL,2,1,'18.01.2019 16:33:53<br/><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: да</p><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">комментарий</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">хз</div>18.01.2019 16:53:32<br/><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ж</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">д</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">рр</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">рр</div>20.01.2019 17:05:52<br/><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: а раньше никак?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">рр</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">рр</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">рр</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">рр</div>'),(102,82,13,'','2019-01-08 21:21:57',NULL,3,5,'08.01.2019 19:23:00<br/><p>Клиент: \n                        \n                        Из какой компании?                        \n                    </p><p>Менеджер: В первую очередь, наши программы наводят порядок в продажах. Кроме того, мы наводим порядок в процессах найма, планирования и так далее. </p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">123</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1231</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1231</div>'),(104,85,8,'','2019-01-11 10:04:46',NULL,2,1,NULL,NULL),(105,1,9,'','2019-01-11 10:05:56',NULL,3,2,NULL,NULL),(106,86,9,'','2019-01-11 10:07:46',NULL,4,2,'19.01.2019 14:28:30<br/><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: фывфыв</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ыфв</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ыв</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ыв</div>'),(107,87,9,'','2019-01-11 10:08:50',NULL,1,2,NULL,NULL),(108,88,8,'','2019-01-11 10:13:37',NULL,5,1,NULL,NULL),(109,89,10,'','2019-01-11 10:14:58',NULL,4,3,NULL,NULL),(110,90,10,'','2019-01-11 10:15:49',NULL,1,3,NULL,NULL),(111,91,10,'','2019-01-11 10:17:37',NULL,0,3,'20.01.2019 17:10:03<br/><p>Клиент: \n                        \n                        Оплата наличными, или картой?                        \n                    </p><p>Менеджер: картой</p><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: фывфыв</p><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:09<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:10<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:11<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>20.01.2019 17:10:11<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">а</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">а</div>'),(113,1,6,'','2019-01-18 17:49:31',NULL,0,2,NULL,NULL),(115,94,73,'','2019-01-18 17:54:50',NULL,0,71,'<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">ыфафыа</div>',NULL),(116,94,73,'','2019-01-18 17:55:35',NULL,0,71,'18.01.2019 16:16:51<br/><p>Клиент: \n                        \n                                                \n                    </p><p>Менеджер: 12</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">asd</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">asd</div>18.01.2019 16:30:14<br/><p>Клиент: \n                        \n                                                \n                    </p><p>Менеджер: 2</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">фв</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>'),(120,96,66,'','2019-01-18 18:45:33',NULL,4,66,'20.01.2019 19:19:58<br/><p>Клиент: \n                        \n                        \"Что вы умеете делать ?\" (конкретные навыки)                        \n                    </p><p>Менеджер: У меня нет опыта</p><p>Клиент: \n                        \n                        «Может ли кто-то дать вам рекомендации?»                        \n                    </p><p>Менеджер: Пришлю на почту</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Комментарий к собес</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">сш</div>20.01.2019 19:20:48<br/><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Комментарий к собес</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">сш</div>21.01.2019 09:26:38<br/><p>Менеджер: \n                        \n                        \"Что вы умеете делать ?\" (конкретные навыки)                        \n                    </p><p>Кадр: йцу</p><p>Менеджер: \n                        \n                        «Может ли кто-то дать вам рекомендации?»                        \n                    </p><p>Кадр: уцй</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">След шаг</div>21.01.2019 09:28:05<br/><p>Менеджер: \n                        \n                        \"Что вы умеете делать ?\" (конкретные навыки)                        \n                    </p><p>Кадр: йцу</p><p>Менеджер: \n                        \n                        «Готовы ли вы работать на  объектах, если на  будет мало задач?»                        \n                    </p><p>Кадр: уууу</p><p>Менеджер: \n                        \n                        «Может ли кто-то дать вам рекомендации?»                        \n                    </p><p>Кадр: Пришлю на почту</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ууууу</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ууууууууу</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ууууууууу</div>'),(121,1,12,'','2019-01-18 20:36:33',NULL,0,1,NULL,NULL),(122,1,12,'','2019-01-18 20:36:45',NULL,0,1,NULL,NULL),(123,1,12,'','2019-01-18 20:36:53',NULL,1,1,NULL,NULL),(124,1,12,'','2019-01-18 20:37:10',NULL,6,1,NULL,NULL),(125,1,12,'','2019-01-18 20:38:56',NULL,0,1,NULL,NULL),(126,1,12,'','2019-01-18 20:39:05',NULL,0,1,NULL,NULL),(127,1,12,'','2019-01-18 20:39:11',NULL,0,1,NULL,NULL),(128,97,74,'','2019-01-19 15:32:39',NULL,0,73,'19.01.2019 13:34:12<br/><p>Клиент: \n                        \n                        TestForGabri                        \n                    </p><p>Менеджер: TestForGabri</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">фыв</div>'),(129,98,75,'','2019-01-19 15:41:31',NULL,4,74,'19.01.2019 13:42:22<br/><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №1</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №2</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: тестовый ответ</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Тестовый коммент</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">тестовый след.шаг</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">Тестовый </div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">тестовый след.шаг</div>'),(130,98,75,'','2019-01-19 15:45:04',NULL,0,74,'19.01.2019 13:45:33<br/><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №2</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: Тестовый ответ №1</p><p>Клиент: \n                        \n                        Тестовый вопрос №                        \n                    </p><p>Менеджер: тестовый ответ</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">1</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">1</div>'),(132,1,12,'','2019-01-19 16:21:12',NULL,4,1,NULL,NULL),(133,1,6,'','2019-01-20 21:52:07',NULL,0,2,NULL,NULL),(134,3,3,'','2019-01-25 13:49:07',NULL,0,2,NULL,NULL),(135,1,3,'','2019-02-06 14:49:41',NULL,3,1,'06.02.2019 12:50:57<br/><p>Менеджер: \n                        \n                        Оплата наличными, или картой?                        \n                    </p><p>Кадр: картой</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div><div style=\"background: #ffba1e;\" class=\"alert alert-primary\" role=\"alert\">йцуцкуекнерно</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">йцу</div>'),(136,1,3,'','2019-03-13 23:27:29',NULL,2,1,NULL,NULL),(137,1,3,'-','2020-03-19 18:18:17',NULL,0,1,'19.03.2020 16:19:16<br/><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><p>Клиент: \n                        \n                        Время доставки - в зависимости от загруженности от -х часов до . Будете ждать?                        \n                    </p><p>Менеджер: а раньше никак?</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">Было весело</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">СШ</div>19.03.2020 16:21:37<br/><p>Клиент: \n                        \n                        Здравствуйте, вы оформили на сайте заказ желаете проверить?                        \n                    </p><p>Менеджер: Да</p><p>Клиент: \n                        \n                        Оплата наличными, или картой?                        \n                    </p><p>Менеджер: наличными</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">q</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">w</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">w</div>'),(138,1,3,'-','2020-03-25 16:49:10',NULL,0,1,NULL,NULL);
/*!40000 ALTER TABLE `interview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interview_vacancy`
--

DROP TABLE IF EXISTS `interview_vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interview_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vacancy_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `cost_type` int(11) DEFAULT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `interview_vacancy_currency_id_fk` (`currency_id`),
  KEY `interview_vacancy_pack_unit_id_fk` (`pack_unit_id`),
  KEY `interview_vacancy_vacancy_id_fk` (`vacancy_id`),
  KEY `interview_vacancy_interview_id_fk` (`interview_id`),
  KEY `interview_vacancy_overhead_cost_id_fk` (`overhead_cost_id`),
  CONSTRAINT `interview_vacancy_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `interview_vacancy_interview_id_fk` FOREIGN KEY (`interview_id`) REFERENCES `interview` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `interview_vacancy_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `interview_vacancy_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `interview_vacancy_vacancy_id_fk` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interview_vacancy`
--

LOCK TABLES `interview_vacancy` WRITE;
/*!40000 ALTER TABLE `interview_vacancy` DISABLE KEYS */;
/*!40000 ALTER TABLE `interview_vacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorization`
--

DROP TABLE IF EXISTS `inventorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventorization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventorization_warehouse_id_fk` (`warehouse_id`),
  CONSTRAINT `inventorization_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorization`
--

LOCK TABLES `inventorization` WRITE;
/*!40000 ALTER TABLE `inventorization` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorization_product`
--

DROP TABLE IF EXISTS `inventorization_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventorization_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `inventorization_id` int(11) NOT NULL,
  `accounting_quantity` int(11) DEFAULT NULL,
  `fact_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventorization_product_product_id_fk` (`product_id`),
  KEY `iinventorization_product_warehouse_id_fk` (`inventorization_id`),
  CONSTRAINT `iinventorization_product_warehouse_id_fk` FOREIGN KEY (`inventorization_id`) REFERENCES `inventorization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inventorization_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorization_product`
--

LOCK TABLES `inventorization_product` WRITE;
/*!40000 ALTER TABLE `inventorization_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventorization_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `regularity_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `color` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(6500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regularity_item_ibfk_1` (`regularity_id`),
  KEY `regularity_item_ibfk_2` (`parent_id`),
  CONSTRAINT `regularity_item_ibfk_1` FOREIGN KEY (`regularity_id`) REFERENCES `regularity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `regularity_item_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (4,'Создаем проект',NULL,14,NULL,'#6aa84f','<p>Чтоб нанять сотрудника или подрядчика на проект,  сначала нужно его создать.<br></p><p>Нажав на эту кнопку {{/project/project?ProjectSearch[state]=1||Все проекты}}  - вы можете посмотреть список ваших проектов, которые сейчас в работе.</p><p>Чтоб создать проект нажмите на эту кнопку: {{/project/project/create||Создать проект}}<br></p>'),(15,'Заводим карточку кандидата',NULL,14,NULL,'#9fc5e8','<p>Перед тем как нанять кого-либо мы собираем базу кандидатов. Потом из них будем выбирать лучших на проект. Чтоб создать карточку кандидата - нажмите на кнопку: {{/worker/worker/create<span class=\"redactor-invisible-space\">||Создать карточку</span><span class=\"redactor-invisible-space\">}} <br></span></p><p><span class=\"redactor-invisible-space\"></span><br></p><p>Чтоб нанять кандидата на проект на определенную должность мы нажимаем кнопку: {{/hr/form/index||Нанять}}<br><span class=\"redactor-invisible-space\"></span></p>'),(17,'Создаем вакансию',4,14,NULL,'#45818e','<p>Создаем несколько вакансий на проект. Нажимаем кнопку: {{/vacancy/vacancy/create||Создать вакансию}}</p>'),(18,'Нанимаем кандидата',NULL,14,NULL,'#8e7cc3','<p> Чтоб нанять кандидата на проект на определенную должность мы нажимаем кнопку: {{/hr/form/index||Нанять}}</p>');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `manufacturer_unique_index` (`name`,`country_id`,`address`),
  KEY `manufacturer-country_id_fk` (`country_id`),
  CONSTRAINT `manufacturer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` VALUES (4,'Bacardi',4,'Адрес Bacardi'),(7,'fghjk',3,'fghjk.'),(9,'Ingello',NULL,''),(5,'Jack Daniels',5,'Адрес Jack Daniels'),(3,'Martini',3,'Адрес Martini'),(12,'NewZhukSoul',4,'sasasaesed,kuuygybyub,56'),(2,'Zonin',2,'Адрес Zonin'),(11,'Миша',9,'Харьков');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `from_user_id` int(11) NOT NULL COMMENT 'Кто',
  `to_user_id` int(11) NOT NULL COMMENT 'Кому',
  `title` varchar(500) NOT NULL COMMENT 'О чем',
  `text` text NOT NULL COMMENT 'Сообщение',
  `datetime` datetime NOT NULL COMMENT 'Когда',
  `favorit` int(1) NOT NULL COMMENT 'Избранное',
  `status` int(2) NOT NULL COMMENT 'Статус',
  PRIMARY KEY (`id`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1541601480),('m171008_182007_base',1543322835),('m181207_232206_add_table_worker',1544605972),('m181207_233850_add_table_vacancy',1544605972),('m181207_234922_add_table_project',1544605972),('m181207_235524_create_junction_table_for_project_and_vacancy_tables',1544605972),('m181207_235742_create_junction_table_for_project_and_user_tables',1544605973),('m181209_140101_add_relation_for_interview_table',1544606347),('m181209_142416_rename_column_title_name',1544606347),('m181209_161439_add_column_dialog_in_interview',1544606347),('m181209_162945_add_column_count_in_project_vacancy',1544610554),('m181216_152128_add_column_parent_id_for_user_table',1544983343),('m181220_143552_add_column_id_for_request_strategy',1545327578),('m181222_213415_create_junction_table_for_worker_and_vacancy_tables',1545653493),('m181225_123543_create_junction_table_for_project_and_vacancy_tables',1545744817),('m181225_163355_add_column_collaborated_in_worker',1545757345);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `overhead_cost`
--

DROP TABLE IF EXISTS `overhead_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `overhead_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `sum` double(10,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `overhead_cost_currency_id_fk` (`currency_id`),
  CONSTRAINT `overhead_cost_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `overhead_cost`
--

LOCK TABLES `overhead_cost` WRITE;
/*!40000 ALTER TABLE `overhead_cost` DISABLE KEYS */;
INSERT INTO `overhead_cost` VALUES (1,1,2.00,1,'Норм всё'),(2,1,5.00,1,''),(3,2,25.00,2,'Нормас'),(4,2,123.00,1,'1'),(5,1,55.00,2,'!'),(6,2,25.00,3,'50!'),(7,3,567.00,2,'Просто вот такой расход'),(8,1,456.00,1,''),(9,2,500.00,1,''),(10,2,1.00,1,'6'),(11,2,1.00,1,'6'),(12,2,1.00,1,'6'),(13,1,10.00,1,'qwe'),(14,1,200.00,1,''),(15,3,200.00,1,''),(16,NULL,10.00,1,NULL),(17,NULL,NULL,1,NULL),(18,NULL,NULL,1,NULL),(19,NULL,NULL,1,NULL),(20,NULL,NULL,1,NULL),(21,NULL,NULL,1,NULL),(22,NULL,NULL,1,NULL),(23,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `overhead_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pack_unit`
--

DROP TABLE IF EXISTS `pack_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pack_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bottles_quantity` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pack_unit`
--

LOCK TABLES `pack_unit` WRITE;
/*!40000 ALTER TABLE `pack_unit` DISABLE KEYS */;
INSERT INTO `pack_unit` VALUES (2,'12 шт',12,1),(3,'24 шт',24,1),(4,'Коробка',10,20),(5,'Блок',200,20),(6,'штуки',0,0);
/*!40000 ALTER TABLE `pack_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameCompany` varchar(255) DEFAULT NULL COMMENT 'Имя министерства, другого органа исполнительной власти, придпринемательства, установки, организации, к сфере управления которого является заведение охраны здоровя',
  `address` varchar(255) DEFAULT NULL COMMENT 'Местонахождения заведения где заполняется форма',
  `years` int(11) DEFAULT NULL COMMENT 'Текущий год',
  `name` varchar(255) DEFAULT NULL COMMENT 'Имя клиента',
  `surname` varchar(255) DEFAULT NULL COMMENT 'Фамилия клиента',
  `patronymic` varchar(255) DEFAULT NULL COMMENT 'Отчество клиента',
  `gender` tinyint(1) DEFAULT NULL COMMENT 'Пол клиента',
  `dateBirth` date DEFAULT NULL COMMENT 'Дата рождения клиента',
  `location` varchar(255) DEFAULT NULL COMMENT 'Место проживания клиента',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Номер телефона клиента',
  `diagnosis` varchar(255) DEFAULT NULL COMMENT 'Диагноз клиента',
  `complaints` text COMMENT 'Жалобы клиента',
  `allDiseases` text COMMENT 'История болезни',
  `developmentOfDisease` text COMMENT 'Развитие текущего заболевания',
  `surveyData` text COMMENT 'Дата объективного осмотра, внешний осмотр, состояние зубов',
  `bite` text COMMENT 'Прикус',
  `mouthCondition` text COMMENT 'Состояние гигиены рта, состояние слизистой оболочки  ',
  `xray` text COMMENT 'Ренгеновское обследование',
  `laboratoryTests` text COMMENT 'Лабараторное обследование',
  `colorVita` varchar(2) DEFAULT NULL COMMENT 'Цвет зубов по шкале Вита',
  `hygieneЕrainingDate` date DEFAULT NULL COMMENT 'Дата обучения ухода за полостью рта',
  `dateHygieneControl` date DEFAULT NULL COMMENT 'Дата контроля за уходом полостью рта',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (3,'Минфин','ул. Прохорова 5',18,'Дарья','Корнева','Валерьевна',2,'1996-10-26','г. Харьков','0660443958','','-','Носила брекеты с 1.08.17 до 14.12.17. Сейчас стоит ретейнер. \r\n','внизу справа ','','правильный','следующая чистка 11.10.18','','','',NULL,NULL),(4,'Культуры','-',18,'Алина','Богуш','Николаевна',2,'1997-01-08','г.Харьков','0504034783','','','','','','','','','','',NULL,NULL),(5,'культуры','',18,'Александр','Мовчан','Сергеевич',1,'1994-12-09','','0504024285','','','','','','','','','','',NULL,NULL),(6,'образования','г. Харьков',19,'Соня','Панкевич','Генадиевна',2,'1994-01-06','','','','','','','','','','','','',NULL,NULL),(7,'-','г. Харьков',17,'Елена','Чегодаева','Аркадьевна',2,'1995-01-06','','','','','','','','','','','','',NULL,NULL),(9,'','',18,'Дмитрий','Воеводчук','',1,'1995-03-07','','','','','','','','','','','','',NULL,NULL),(10,'','',17,'Артем','Зибаров','Игоревич',1,'1993-09-08','','0663483345','','','','','','','','','','',NULL,NULL),(11,'','',18,'Света','Чуприна','',2,'1975-10-10','','456765433243','','','','','','','','','','',NULL,NULL),(12,'шршотшот','ригрт',21,'Олег','Григорьев','Николаевич',1,'1994-10-11','','','','','','','','','','','','',NULL,NULL);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `customs_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `note` text,
  `volume` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `year_chart` int(11) DEFAULT NULL,
  `proof` double(10,2) DEFAULT NULL,
  `batcher` tinyint(1) DEFAULT NULL,
  `rating` double(10,2) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product-country_id_fk` (`country_id`),
  KEY `field_product_manufacturer_id_fk` (`manufacturer_id`),
  KEY `field_product_category_id_fk` (`category_id`),
  KEY `field_product_type_id_fk` (`type_id`),
  KEY `product-color_id-fk` (`color_id`),
  CONSTRAINT `field_product_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_product_manufacturer_id_fk` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_product_type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product-color_id-fk` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_pack_unit`
--

DROP TABLE IF EXISTS `product_pack_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_pack_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_pack_unit_unique_index` (`product_id`,`pack_unit_id`),
  KEY `field_product_pack_unit_pack_unit_id_fk` (`pack_unit_id`),
  CONSTRAINT `field_product_pack_unit_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_product_pack_unit_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_pack_unit`
--

LOCK TABLES `product_pack_unit` WRITE;
/*!40000 ALTER TABLE `product_pack_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_pack_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `state` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Проект Красный','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',1),(2,'Проект Синий','Харьков, Уличная 123','<h1>Используйте простые текстовые редакторы<br></h1>\r\n<p>Это очень простой текстовый редактор. Можно формировать произвольный текст и быстро тестировать различные форматы. Позже форматы будут переведены в регламент форм...\r\n</p>\r\n<p>Можно использовать разграничение текста посредством заголовков и горизонтальных линий\r\n</p>\r\n<h1>\r\n<hr>\r\n<p>Списки - это удобно. Используйте вложенные списки.\r\n</p></h1>\r\n<ul>\r\n	<li>Список пункт номер №</li>\r\n	<li>Список пункт номер №</li>\r\n	<li>Список пункт номер №\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul>\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul></li>\r\n	<li>Список пункт номер №\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul>\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n	</ul>\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n	</ul></li>\r\n	<li>Список пункт номер №\r\n	<ul>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n		\r\n		\r\n	</ul></li>\r\n</ul>\r\n<strong>Используйте нумерованные списки</strong>\r\n<ol>\r\n	<li>Список пункт номер №\r\n	<ol>\r\n		<li>Список пункт номер №\r\n		<ol>\r\n			<li>Список пункт номер №</li>\r\n			<li>Список пункт номер №</li>\r\n			<li>Список пункт номер №</li>\r\n		</ol></li>\r\n	</ol></li>\r\n	<li>Список пункт номер №\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n		<li>Список пункт номер №</li>\r\n	</ol></li>\r\n	<li>Список пункт номер №</li>\r\n	<li>Список пункт номер №\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol>\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol>\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol>\r\n	<ol>\r\n		<li>Список пункт номер №</li>\r\n	</ol></li>\r\n</ol>\r\n<p><span class=\"redactor-invisible-space\"><span class=\"label-red\">Текст статус важный</span></span>\r\n</p>',2),(3,'Проект Зеленый','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',1),(4,'Проект Лиловый','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',2),(5,'Проект Белый','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',2),(6,'Проект Перломутровый','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',2),(8,'Проект Фиолетовый','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',2),(9,'Проект Бирюзовый','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',2),(10,'Проект Серый','Харьков, Уличная 123','Данный проект отличается своим цветом, а также формой, размером и положением в пространстве. И чем угодно другим.',2),(11,'Проект Зеленый','Адрессная 45','Это очень интересный проект',1),(12,'Проект Алый','Адресная 8','Проект классный',2),(13,'Синий','Синий','<p>Синий</p>',1),(14,'Красный','Красный','<p>Красный</p>',1),(15,'Жёлтый','Жёлтый','<p>Жёлтый</p>',1),(16,'Зелёный ','Зелёный ','<p style=\"margin-left: 40px;\">Зелёный </p>',1),(17,'Голубой','Голубой','<p>Голубой</p>',1),(18,'Чёрный','Чёрный','<p>Чёрный</p>',1),(19,'Пробить стену','ул. Шевченко, дом 11, 115 кв','<p>Необходимо пробить стену и сделать подсобное помещение </p>',1),(21,'Поменять сантехнику','ул героев Сталинграда, дом 51, 66 кв','<p>Сантехника устарела и постоянно течёт, нужно всю заменить</p>',2),(22,'Строительство бани','ул 50 лет ВЛКСМ, дом 119','<p>Строительство бани по уже готовым чертежамСтроительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\">Строительство бани по уже готовым чертежам<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span> </p><p><br></p>',1),(23,'Замена стеклопакета','ул. Вакуленко, 102, 43 ','<p>Нужно заменить разбитый стеклопакет</p>',2),(24,'Натяжка потолка','ул. Франко. дом 45, кв 14','<p>Натяжка потолка в комнате длиной в 10 метров, шириной в 4</p>',1),(25,'Провести проводку','вул Валентиновская 2б. кв 38','<p>провести проводку в достроенное помещение </p>',1),(27,'Постройка жилого дома','ул Жорвика 15.','<p>Постройка частного двухэтажного дома по готовой планировке</p>',1),(28,'Ремонт квартиры','ул. Антонавская 36. кв 41','<p>Нужно положить ленолиум </p>',1),(30,'Убрать теретори','Люблой','<p style=\"margin-left: 20px;\">Любое</p>',2),(31,'Проект','Адрес','<p><strong>Описание</strong></p>',2),(32,'Проект по токарным работам','Киевская 18','<p style=\"margin-left: 20px;\"><span></span></p><hr><p>Проект и его описание</p><p>Можно писать тут</p><ul><li>И пользоваться классными штуками</li></ul>',1),(38,'Ремонт и проводка','Проводочная 17 А','<p>Тут я напишу данные о проекте. А так же добавлю файлы / фотографии.</p><p><br></p><p><img src=\"/images/5c2236cd5459f.jpg\"></p>',1),(47,'Капитальный ремонт','Капитальная 10','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong> после старого мастера<br></p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1<br><ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=Купить инструменты для ремонта\" target=\"_blank\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"/images/5c23a7784167c.xls\">Договор</a><br></p>',1),(48,'Ремонт подъезда','ул. Блюхера 51','<p>Требуется ремонт подъезда</p><ul><li>побелить стены</li><li>заменить оконные рамы</li><li>покрасить перила </li></ul><p><br></p>',1),(49,'Заменить дверную коробку','ул. Клочковская 34. 121','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',1),(50,'Залить бетонной смесью армированную ферму','Новогородская 57','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',2),(51,'Положить слои дорожной одежды','Частная 22','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',1),(52,'Вырыть котлован ','ул Междунородная 31','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',1),(53,'Ремонт водоотводного сооружения ','Водоотводная 7','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',1),(54,'Кровля частного дома','Частный 51','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',2),(55,'Залить пол ','Заливаня 54, 32','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',1),(56,'Шпаклёвка помещения ','Шлакова 22','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',2),(57,'Ремонт подвального помещения','Подвальный переулок 4/7','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера</p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',1),(58,'Возвести летнею беседку ','Летняя 41','<p>На объекте множество <strong>недоработок</strong> и <strong>халтуры</strong>после старого мастера<br></p><p><img src=\"https://premier-odessa.com.ua/upload/969d8c63002592e9799356f9e7be22a7.jpg\" alt=\"Картинки по запросу ремонт\"><br></p><hr><p><strong></strong><strong>Нужно сделать:</strong></p><ol><li>Задача номер 1\r\n<ol><li>Подзадача номер 1</li><li><del>Подзадача номер 2</del></li><li>Подзадача номер 3</li></ol></li><li><strong>Задача номер 2</strong></li><li>Задача номер 3</li><li><del>Задача номер 4</del></li></ol><p>Ссылка на <a href=\"https://google.com/search?q=%D0%9A%D1%83%D0%BF%D0%B8%D1%82%D1%8C%20%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B%20%D0%B4%D0%BB%D1%8F%20%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%D0%B0\">покупку инструментов для ремонта в Харькове</a></p><hr><p><br><a href=\"http://forma.ingello.com/images/5c23a7784167c.xls\">Договор</a></p>',1),(59,'ЖК Левада трёшка новострой','Харьков, Гагарина 51','<p>С первого января начинаем новый объект - новострой. </p><p><br></p>',1),(61,'Циркуны дом','Циркуны','<p>Плитка санузлы кухня камин</p>',2),(62,'ЖК Маршал,двушка новострой,отделка','Маршала Жукова ','<p>Закончена плитка ,остались финишные работы</p>',1),(63,'Качановская 17а,новострой двушка','Зделаем стяжка ,штукатурка,','<p>Временно заморожен</p>',1),(64,'Валентиновская ,45,трёшка ','','<p><img src=\"/images/5c42f9953e4de.jpg\"></p>',1),(65,'Старошишковская,11.трешка','Старошишковская 11 кв 12','<p>На 21.01.19</p><p>Стяжка пола . Перегородки. Штукатурка</p>',1),(66,'ЖК Дуэт ,новострой .двушка','','<p>Работа по дизайн проекту </p><p>Дима,Вадик,Макс</p><p><br></p>',1),(68,'Гагарина ,новострой .трешка','','<p>Штука есть,гипс есть , нужен сантехник, плиточник,шпатлевщики</p>',1),(69,'Амосова ,вторичка трешка','','<p>Прораб О</p><p>Мастер Игорь</p>',1),(70,'Балакирева 19 новострой трешка','','<p>Прораб ,бригадир Володя</p>',1),(73,'Тест1','Тест1','<p>Тест1</p>',1),(74,'TestForGabri','TestForGabri','<p>TestForGabri</p>',1),(75,'тестовый проект №1','тестовый проект №1','<p>тестовый проект №1</p><p><img src=\"/images/5c4327cba116d.png\"></p>',1),(76,'тестовый проект №2','тестовый проект №2','<p>тестовый проект №2</p>',1),(77,'тестовый проект №3','тестовый проект №3','<p>тестовый проект №3</p>',1);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_user` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`),
  KEY `idx-project_user-project_id` (`project_id`),
  KEY `idx-project_user-user_id` (`user_id`),
  CONSTRAINT `fk-project_user-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-project_user-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_user`
--

LOCK TABLES `project_user` WRITE;
/*!40000 ALTER TABLE `project_user` DISABLE KEYS */;
INSERT INTO `project_user` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,6),(14,6),(15,6),(16,6),(17,6),(18,6);
/*!40000 ALTER TABLE `project_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_vacancy`
--

DROP TABLE IF EXISTS `project_vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `x-project_vacancy-project_id` (`project_id`),
  KEY `id-project_vacancy-vacancy_id` (`vacancy_id`),
  CONSTRAINT `fk-project_vacancy_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-project_vacancy_vacancy` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_vacancy`
--

LOCK TABLES `project_vacancy` WRITE;
/*!40000 ALTER TABLE `project_vacancy` DISABLE KEYS */;
INSERT INTO `project_vacancy` VALUES (12,21,11,3),(31,47,11,5),(32,47,24,5),(34,28,11,1),(35,28,30,1),(36,22,11,1),(37,22,49,2),(38,24,11,1),(39,24,49,2),(40,25,11,1),(41,25,30,1),(42,19,49,1),(44,47,25,6),(45,21,26,1),(47,48,11,1),(48,49,11,1),(49,49,61,1),(50,49,50,1),(51,50,11,1),(52,50,24,1),(53,50,52,4),(54,50,49,3),(55,51,11,1),(56,51,24,3),(57,51,27,1),(58,51,32,1),(59,52,11,1),(60,52,59,1),(61,53,11,1),(62,53,26,1),(63,53,24,4),(64,54,11,1),(65,54,50,1),(66,54,58,1),(67,55,11,1),(68,55,24,2),(69,56,11,1),(70,56,24,1),(71,57,11,1),(72,57,24,2),(73,57,25,1),(74,57,61,1),(75,58,11,1),(76,58,50,1),(77,58,24,2),(78,23,11,2),(80,59,26,1),(81,59,63,1),(82,59,65,1),(83,6,2,1),(85,13,5,2),(87,61,66,2),(89,8,1,3),(90,9,2,2),(91,10,3,4),(93,73,71,5),(95,62,68,2),(97,11,1,2),(100,12,3,5),(102,74,73,1),(103,75,74,1),(104,76,75,3),(105,77,76,6),(107,68,66,1),(108,64,79,1),(109,3,1,3),(110,32,1,3);
/*!40000 ALTER TABLE `project_vacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_vacancy_old`
--

DROP TABLE IF EXISTS `project_vacancy_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_vacancy_old` (
  `project_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `count` int(11) DEFAULT '1',
  PRIMARY KEY (`project_id`,`vacancy_id`),
  KEY `idx-project_vacancy-project_id` (`project_id`),
  KEY `idx-project_vacancy-vacancy_id` (`vacancy_id`),
  CONSTRAINT `fk-project_vacancy-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-project_vacancy-vacancy_id` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_vacancy_old`
--

LOCK TABLES `project_vacancy_old` WRITE;
/*!40000 ALTER TABLE `project_vacancy_old` DISABLE KEYS */;
INSERT INTO `project_vacancy_old` VALUES (2,1,2),(13,10,1),(14,9,NULL),(15,9,NULL),(19,11,3),(19,25,1),(21,26,2),(22,24,1),(22,26,2),(22,31,1),(23,24,1),(23,25,1),(24,24,1),(25,30,1),(27,24,1),(27,31,1),(27,32,1),(28,24,1),(30,34,1),(32,36,NULL);
/*!40000 ALTER TABLE `project_vacancy_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_supplier_id_fk` (`supplier_id`),
  KEY `purchase_warehouse_id_fk` (`warehouse_id`),
  CONSTRAINT `purchase_supplier_id_fk` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (10,1,20,'Новая поставка с 29.11.2018 11:53:51','2018-11-29 11:53:51',NULL,0),(11,6,20,'12 23 344','2018-11-29 11:54:29',NULL,0);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_overhead_cost`
--

DROP TABLE IF EXISTS `purchase_overhead_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_overhead_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `overhead_cost_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_overhead_cost_purchase_id_fk` (`purchase_id`),
  KEY `purchase_overhead_cost_overhead_cost_id_fk` (`overhead_cost_id`),
  CONSTRAINT `purchase_overhead_cost_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_overhead_cost_purchase_id_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_overhead_cost`
--

LOCK TABLES `purchase_overhead_cost` WRITE;
/*!40000 ALTER TABLE `purchase_overhead_cost` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_overhead_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_product`
--

DROP TABLE IF EXISTS `purchase_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `tax_rate_id` double(10,2) DEFAULT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `prepayment` double(10,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_product_currency_id_fk` (`currency_id`),
  KEY `purchase_product_pack_unit_id_fk` (`pack_unit_id`),
  KEY `purchase_product_product_id_fk` (`product_id`),
  KEY `purchase_product_purchase_id_fk` (`purchase_id`),
  KEY `purchase_product_overhead_cost_id_fk` (`overhead_cost_id`),
  CONSTRAINT `purchase_product_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_product_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_product_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_product_purchase_id_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_product`
--

LOCK TABLES `purchase_product` WRITE;
/*!40000 ALTER TABLE `purchase_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regularity`
--

DROP TABLE IF EXISTS `regularity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regularity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regularity_ibfk_1` (`user_id`),
  CONSTRAINT `regularity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regularity`
--

LOCK TABLES `regularity` WRITE;
/*!40000 ALTER TABLE `regularity` DISABLE KEYS */;
INSERT INTO `regularity` VALUES (13,'Менеджмент',1,2,'Здесь мы можем создать регламент для работы менеджера','anchor'),(14,'Найм ',1,1,'В этом разделе мы добавили пункты, которые помогают нанимать сотрудников и подрядчиков на проекты','eye');
/*!40000 ALTER TABLE `regularity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (1,'Вы не туда попали'),(2,'Кто вы?'),(3,'По какому вопросу?'),(4,'Из какой компании?'),(5,'Не знаю, с кем соединить?'),(6,'Что за система?'),(7,'Руководителя нет, вышлите на почту'),(8,'ЛПР Что Вы предлагаете?'),(9,'ЛПР Что за система? Что за продукт? Что за прототип? Какие функции?'),(10,'ЛПР Есть интерес. Расскажите еще подробнее.'),(11,'ЛПР  Нет денег. Затишье  на рынке'),(12,'ЛПР Какая стоимость Ваших услуг?'),(13,'ЛПР Мне необходимо хранить данные о своем бизнесе только у себя на машине'),(14,'ЛПР У нас уже есть система созданная специально для нас'),(15,'ЛПР НЕ нуждаемся'),(16,'Алло'),(17,'Мы не ведём никакую базу клиентов.'),(18,'«Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )'),(19,'\"Что вы умеете делать ?\" (конкретные навыки)'),(20,'\"Сколько считаете вы должны получать сразу, а сколько потом\"'),(21,'\"На какую должность претендуете?\" '),(22,'\"Какие вакансии могли бы вам тоже подойти?\"'),(23,'«Почему вы уволились с предыдущего места работы?»'),(24,'«Может ли кто-то дать вам рекомендации?»'),(25,'«Готовы ли вы работать в выходные или праздничные дни?»'),(26,'«Готовы ли вы работать на 2 объектах, если на 1 будет мало задач?»'),(27,'«Расскажите нам о себе» (образование, специализация, опыт работы. почему вы пришли именно в эту кампанию, и почему эта должность так важна. )'),(28,'\"Что вы умеете делать ?\" (конкретные навыки)'),(29,'\"Сколько считаете вы должны получать сразу, а сколько потом\"'),(30,'\"На какую должность претендуете?\" '),(31,'\"Какие вакансии могли бы вам тоже подойти?\"'),(32,'«Почему вы уволились с предыдущего места работы?»'),(33,'«Может ли кто-то дать вам рекомендации?»'),(34,'«Готовы ли вы работать в выходные или праздничные дни?»'),(35,'Здравствуйте, вы оформили на сайте заказ желаете проверить?'),(36,'1'),(37,'Время доставки - в зависимости от загруженности от 2-х часов до 4. Будете ждать?'),(39,'тест'),(40,'TestForGabri'),(41,'Тестовый вопрос №1'),(42,'Тестовый вопрос №2'),(43,'Тестовый вопрос №3'),(45,'Оплата наличными, или картой?');
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_strategy`
--

DROP TABLE IF EXISTS `request_strategy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_strategy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strategy_id` int(11) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-strategy-id` (`strategy_id`),
  KEY `fk-request-id` (`request_id`),
  CONSTRAINT `fk-request-id` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-strategy-id` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_strategy`
--

LOCK TABLES `request_strategy` WRITE;
/*!40000 ALTER TABLE `request_strategy` DISABLE KEYS */;
INSERT INTO `request_strategy` VALUES (1,1,16),(2,1,1),(3,1,2),(4,1,3),(5,1,4),(6,1,5),(7,1,6),(8,1,7),(9,1,8),(10,1,9),(11,1,10),(12,1,11),(13,1,12),(14,1,13),(15,1,14),(16,1,17),(17,3,18),(18,3,19),(19,3,21),(20,3,22),(21,3,23),(22,3,24),(23,3,25),(24,3,26),(25,3,20),(26,4,18),(27,4,19),(28,4,20),(29,4,21),(30,4,22),(31,4,23),(32,4,24),(33,4,25),(34,4,26),(35,7,36),(36,5,35),(37,5,37),(38,8,40),(39,9,41),(40,9,42),(41,9,43),(43,5,45);
/*!40000 ALTER TABLE `request_strategy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_strategy_old`
--

DROP TABLE IF EXISTS `request_strategy_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_strategy_old` (
  `request_id` int(11) NOT NULL,
  `strategy_id` int(11) NOT NULL,
  PRIMARY KEY (`request_id`,`strategy_id`),
  KEY `idx-request_strategy-request_id` (`request_id`),
  KEY `idx-request_strategy-strategy_id` (`strategy_id`),
  CONSTRAINT `fk-request_strategy-request_id` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-request_strategy-strategy_id` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_strategy_old`
--

LOCK TABLES `request_strategy_old` WRITE;
/*!40000 ALTER TABLE `request_strategy_old` DISABLE KEYS */;
INSERT INTO `request_strategy_old` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(16,1);
/*!40000 ALTER TABLE `request_strategy_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selling`
--

DROP TABLE IF EXISTS `selling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `dialog` text,
  `next_step` text,
  `selling_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selling_ibfk_1` (`state_id`),
  KEY `selling_customer_id_fk` (`customer_id`),
  KEY `selling_warehouse_id_fk` (`warehouse_id`),
  CONSTRAINT `selling_customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `selling_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `selling_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=328 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selling`
--

LOCK TABLES `selling` WRITE;
/*!40000 ALTER TABLE `selling` DISABLE KEYS */;
INSERT INTO `selling` VALUES (109,59,20,1,NULL,'2018-12-12 13:22:36',NULL,NULL,NULL,NULL),(183,59,20,1,NULL,'2019-01-08 17:46:03',NULL,'<div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">ппп</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">ппп</div><div style=\"background: orangered;\" class=\"alert alert-primary\" role=\"alert\">ппп</div>',NULL,NULL);
/*!40000 ALTER TABLE `selling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selling_product`
--

DROP TABLE IF EXISTS `selling_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selling_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `selling_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` double(10,2) DEFAULT NULL,
  `cost_type` int(11) DEFAULT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selling_product_currency_id_fk` (`currency_id`),
  KEY `selling_product_pack_unit_id_fk` (`pack_unit_id`),
  KEY `selling_product_product_id_fk` (`product_id`),
  KEY `selling_product_selling_id_fk` (`selling_id`),
  KEY `selling_product_overhead_cost_id_fk` (`overhead_cost_id`),
  CONSTRAINT `selling_product_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `selling_product_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `selling_product_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `selling_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `selling_product_selling_id_fk` FOREIGN KEY (`selling_id`) REFERENCES `selling` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selling_product`
--

LOCK TABLES `selling_product` WRITE;
/*!40000 ALTER TABLE `selling_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `selling_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `description` varchar(6500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_ibfk_1` (`user_id`),
  CONSTRAINT `state_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Не знакомы',1,1,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(2,'Презентация',1,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(4,'Есть интерес',1,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(5,'Согласована цена',1,4,'На этом этапе мы уже обсудили цену и обсуждаем детали договора, готовимся к подписанию. '),(6,'Подписан договор',1,5,'На этом этапе мы начинаем работу, ничто не сможет нас остановить!'),(7,'Проект сделан',1,6,'На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.'),(8,'qrqwrqwrqwr',1,20,'<p>testsetset</p>'),(9,'Встреча',77,1,''),(10,'Обсуждение заказа',77,2,''),(11,'Утверждение сроков',77,3,'Описание под утверждение сроков'),(12,'Оплата',77,4,''),(13,'Сдача проекта',77,5,'');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state_to_state`
--

DROP TABLE IF EXISTS `state_to_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state_to_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `to_state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_to_state_ibfk_1` (`state_id`),
  KEY `state_to_state_ibfk_2` (`to_state_id`),
  CONSTRAINT `state_to_state_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `state_to_state_ibfk_2` FOREIGN KEY (`to_state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state_to_state`
--

LOCK TABLES `state_to_state` WRITE;
/*!40000 ALTER TABLE `state_to_state` DISABLE KEYS */;
INSERT INTO `state_to_state` VALUES (1,1,5),(2,1,6),(5,1,2),(6,1,4),(7,2,7),(8,2,1);
/*!40000 ALTER TABLE `state_to_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategy`
--

DROP TABLE IF EXISTS `strategy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `strategy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategy`
--

LOCK TABLES `strategy` WRITE;
/*!40000 ALTER TABLE `strategy` DISABLE KEYS */;
INSERT INTO `strategy` VALUES (1,'Холодные звонки','NULL'),(3,'1 Вид собеседования',''),(4,'1 Вид собеседования',''),(5,'Продажа',''),(6,'ррло','ор'),(7,'тест','1'),(8,'TestForGabri',''),(9,'Тестовая стратегия №1','Тестовая стратегия №1');
/*!40000 ALTER TABLE `strategy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `firm` varchar(100) DEFAULT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `tax_rate` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Ткаченко','Ткаченко','Михаил Ткаченко',1,'Киев','misha.tka4enko@gmail.com',2.20),(2,'Боренко','Боренко','Боренко Павел',2,'Варшава','p.borenko@gmail.com',2.80),(3,'Овик','Болгарские напитки','Овик',3,'Прага','kavkazec.wakeup@gmail.com',2.40),(4,'Полко','Полко','Александр Маслаев',4,'Берлин','alex.butter@gmail.com',2.50),(5,'Колядар','Колядар','Артур',5,'Париж','archie@gmail.com',2.10),(6,'Поставщик спиртного','Пьяный мастер','Вадим Олегович',1,'Харьков, Сумская 21-в','olpmaster@gmail.com',10.00),(7,'Поставщик номер 2','ФИрма','1',2,'1','1',1.00),(8,'Поставщик услуг','ПостУслу','Олег',1,'Харьков, Широнинцев 15','olijenius@gmail.com',10.00);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_event`
--

DROP TABLE IF EXISTS `system_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `application` varchar(45) DEFAULT NULL,
  `module` varchar(45) DEFAULT NULL,
  `data` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_event`
--

LOCK TABLES `system_event` WRITE;
/*!40000 ALTER TABLE `system_event` DISABLE KEYS */;
INSERT INTO `system_event` VALUES (2,'2014-02-11 00:00:00','','hkjhkjhk','dvdfg'),(3,'2014-02-16 00:00:00','','rfewewf','dvdfg'),(4,'2014-02-11 00:00:00','','hkjhkjhk','dvdfg'),(5,'2015-12-11 00:00:00','','fsdfsdfsaffeqwefffewqfe`','fwesdfsdewfwefvf'),(6,'2016-12-31 00:00:00','','fwerffdwfeergfegrgf','ljhnkjdknmsdjnjmk');
/*!40000 ALTER TABLE `system_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_rate`
--

DROP TABLE IF EXISTS `tax_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tax_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `percent` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_rate`
--

LOCK TABLES `tax_rate` WRITE;
/*!40000 ALTER TABLE `tax_rate` DISABLE KEYS */;
INSERT INTO `tax_rate` VALUES (4,'ФЛП 3 группа',3.00),(5,'ФЛП 2 группа',5.00),(6,'ООО',20.00);
/*!40000 ALTER TABLE `tax_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dynagrid`
--

DROP TABLE IF EXISTS `tbl_dynagrid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_dynagrid` (
  `id` varchar(100) NOT NULL COMMENT 'Unique dynagrid setting identifier',
  `filter_id` varchar(100) DEFAULT NULL COMMENT 'Filter setting identifier',
  `sort_id` varchar(100) DEFAULT NULL COMMENT 'Sort setting identifier',
  `data` varchar(5000) DEFAULT NULL COMMENT 'Json encoded data for the dynagrid configuration',
  PRIMARY KEY (`id`),
  KEY `tbl_dynagrid_FK1` (`filter_id`),
  KEY `tbl_dynagrid_FK2` (`sort_id`),
  CONSTRAINT `tbl_dynagrid_FK1` FOREIGN KEY (`filter_id`) REFERENCES `tbl_dynagrid_dtl` (`id`),
  CONSTRAINT `tbl_dynagrid_FK2` FOREIGN KEY (`sort_id`) REFERENCES `tbl_dynagrid_dtl` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dynagrid personalization configuration settings';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dynagrid`
--

LOCK TABLES `tbl_dynagrid` WRITE;
/*!40000 ALTER TABLE `tbl_dynagrid` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dynagrid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dynagrid_dtl`
--

DROP TABLE IF EXISTS `tbl_dynagrid_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_dynagrid_dtl` (
  `id` varchar(100) NOT NULL COMMENT 'Unique dynagrid detail setting identifier',
  `category` varchar(10) NOT NULL COMMENT 'Dynagrid detail setting category "filter" or "sort"',
  `name` varchar(150) NOT NULL COMMENT 'Name to identify the dynagrid detail setting',
  `data` varchar(5000) DEFAULT NULL COMMENT 'Json encoded data for the dynagrid detail configuration',
  `dynagrid_id` varchar(100) NOT NULL COMMENT 'Related dynagrid identifier',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_dynagrid_dtl_UK1` (`name`,`category`,`dynagrid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Dynagrid detail configuration settings';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dynagrid_dtl`
--

LOCK TABLES `tbl_dynagrid_dtl` WRITE;
/*!40000 ALTER TABLE `tbl_dynagrid_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dynagrid_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transit`
--

DROP TABLE IF EXISTS `transit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_warehouse_id` int(11) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transit_from_warehouse_id_fk` (`from_warehouse_id`),
  KEY `transit_to_warehouse_id_fk` (`to_warehouse_id`),
  CONSTRAINT `transit_from_warehouse_id_fk` FOREIGN KEY (`from_warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transit_to_warehouse_id_fk` FOREIGN KEY (`to_warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transit`
--

LOCK TABLES `transit` WRITE;
/*!40000 ALTER TABLE `transit` DISABLE KEYS */;
/*!40000 ALTER TABLE `transit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transit_overhead_cost`
--

DROP TABLE IF EXISTS `transit_overhead_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transit_overhead_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transit_id` int(11) NOT NULL,
  `overhead_cost_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transit_overhead_cost_transit_id_fk` (`transit_id`),
  KEY `transit_overhead_cost_overhead_cost_id_fk` (`overhead_cost_id`),
  CONSTRAINT `transit_overhead_cost_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transit_overhead_cost_transit_id_fk` FOREIGN KEY (`transit_id`) REFERENCES `transit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transit_overhead_cost`
--

LOCK TABLES `transit_overhead_cost` WRITE;
/*!40000 ALTER TABLE `transit_overhead_cost` DISABLE KEYS */;
/*!40000 ALTER TABLE `transit_overhead_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transit_product`
--

DROP TABLE IF EXISTS `transit_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transit_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `transit_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `overhead_cost_id` int(11) DEFAULT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transit_product_pack_unit_id_fk` (`pack_unit_id`),
  KEY `transit_product_product_id_fk` (`product_id`),
  KEY `transit_product_transit_id_fk` (`transit_id`),
  KEY `transit_product_overhead_cost_id_fk` (`overhead_cost_id`),
  CONSTRAINT `transit_product_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transit_product_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transit_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transit_product_transit_id_fk` FOREIGN KEY (`transit_id`) REFERENCES `transit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transit_product`
--

LOCK TABLES `transit_product` WRITE;
/*!40000 ALTER TABLE `transit_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `transit_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (5,'Продукт'),(10,'Услуга'),(11,'Инструмент'),(12,'Объект'),(13,'Расходный материал'),(14,'Сотрудник'),(15,'Услуга'),(16,'Товары для души');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `auth_key` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `confirmed_email` int(1) DEFAULT '0',
  `email_string` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','admin@admin.admin','user',NULL,NULL,NULL,NULL,1,NULL),(4,'kirill','$2y$13$HOrJAi19qEm7yaelOVsvw.tb7NSZnruC50C09cabJLgXHGkApgW1u','limbo9826@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(5,'archie','$2y$13$gYhb25Lo7tj00Ax03/PV9.prTGdykgsZ4qaXNE/6nkVw02FsAVrxW','astronautgeek@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(6,'ingello','$2y$13$.GfcJiKrglWdpk0oS2G/2ewlBCjuzWHnb/XC/Lg10UpBNkUULhYze','olijeniuss@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(7,'ingello2','$2y$13$OGCC6UGvUK2AoRaKOGRpJef0NbuWBtr.zMHLeXQIXsZcoXhzVtOVS','business.ingello@gmail.com','user',NULL,NULL,'',1,1,NULL),(8,'Test1','$2y$13$SfFAYsZ.uHjPxOaNpOchreuYyuit7gg.Iln9KduYPyMeNpCtbNRbG','1111@agsdg.com','user',NULL,NULL,'111111',6,1,NULL),(9,'oleg','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','levit@i.ua','user',NULL,NULL,'0937130073',NULL,1,NULL),(12,'ingello1','$2y$13$/zUzmvjIVqFhX4rViZRDrOciwo92zuVP4.l3izWSjI5WMBGkp8Erq','ing@gmail.com','user',NULL,NULL,'',1,1,NULL),(16,'tema','$2y$13$cAvQs5KaL6EAWETqeabH9e3WQnkWkAVPLV42BBCS/1/REMRW9XF1e','daivts1488@gmail.com','user',NULL,NULL,'+380-637154401',NULL,1,NULL),(17,'TestGabri','$2y$13$xiMx2bJhNm/nS6X7BH5F0.ea9tJF7laASWzc0dGyxe1xHiYGlXP4e','TestGabriasdasd@asasf.com','user',NULL,NULL,'1241241',NULL,1,NULL),(18,'admin2','$2y$13$c8d6vyPnAriDyDE1ySWa7e09nYVySRelhyU7VBlY4UmvkbCEhPvQO','dasha252342@gmail.com','user',NULL,NULL,'',1,1,NULL),(19,'TestForGabri','$2y$13$WLv4wEcZuQvAeIAEAqgNCu0ouygMxKmqxTnUQ4mdeCChHTvYci9Ly','11111WQ@gmail.com','user',NULL,NULL,'1111',NULL,1,NULL),(20,'NewUser','$2y$13$qMXgiS8rrhC.OZpNJKf4KO2rHQFkQmYuorP2i24jooGe8/6mm6AxO','11111@gmail.com','user',NULL,NULL,'11111',NULL,1,NULL),(21,'NewUserRef','$2y$13$ZcvJ5K/qkOYZe95EuzpbIuGX0P.ejr.mlCi5hf9BiacmzdM1sSs6O','11111@saf.com','user',NULL,NULL,'11111',20,1,NULL),(22,'111111','$2y$13$pb1EQk1LNzMbo4m7vZhRu.DnMvM2gPqJKVzBJy2Ocaf9vY6GaUOJm','ngello@gmail.com','user',NULL,NULL,'111111',NULL,1,NULL),(23,'manager1','$2y$13$aojywk9rO95bSepeLXVnEumnNISHUwRXzsuECcIYJ2caC8FkP0hRm','hh23456789098765433456789987654@gmail.com','user',NULL,NULL,'',9,1,NULL),(24,'Tymur','$2y$13$LMNvOzSu3.9HL48NEdXHvOFEYAhwgaEdkG3Dpn5hQtd32hoTdl20C','tymur@gmail.com','user',NULL,NULL,'1122334455',NULL,1,NULL),(77,'Тимур Жукотинський','$2y$13$/Ju5bGCkAmvZkMEPK450dex.VK7MDxLtkDQCH/ZQ1Q0oT6oofufPi','tymur.zhukotynskyi@nure.ua','user',NULL,NULL,NULL,NULL,1,NULL),(85,'taja90','$2y$13$2q4JE/GqpI68prIs7XZJ5eMTXxkjTHcK0CgQRdNPO5F2iywxl4znq','taja708@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(86,'Олег Григорьев','$2y$13$a17gm0796C5llltQVqADxO4dn/hm7/T/gghDa6/PXklHT6Dlg5CvW','olijenius@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(87,'tyzhukotinskiy','$2y$13$utErmjhovgeHQfCI8BCwcewavTNzdN.3vjok8akUWpWPV296o0Ege','tyzhukotinskiy@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` double DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacancy`
--

LOCK TABLES `vacancy` WRITE;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` VALUES (1,60000,'<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>','Должность Круглая'),(2,70000,'<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>','Должность Интересная'),(3,120000,'<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>','Должность Высокая'),(4,15000,'<p>Почему мы?</p>\r\n<p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p>\r\n<p>Условия работы</p>\r\n<p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p>\r\n<p>Что Вы получите?</p>\r\n<p>Самые комфортные условия труда по мере Вашего роста</p>','Должность младшего специалиста'),(5,1,'<p>Красная</p>','Красная​'),(6,2,'<p>Синяя</p>','Синяя'),(7,3,'<p>Жёлтая</p>','Жёлтая'),(8,1,'<p>й</p>','Чёрная'),(9,2,'<p>цйуй</p>','Серая'),(10,234,'<p>Белая</p>','Белая'),(11,400,'<p>Необходим опытный работник со знанием своего дела</p>','Прораб'),(24,500,'<p>Нужен строитель для постройки бани</p>','Строитель'),(25,300,'<p>Нужен специалист, чтоб пробить стену для нового помещения </p>','Демонтажник'),(26,150,'<p>Нужен человек для замены сантехники, можно с малым кол-во опыта.</p>','Сантехник'),(27,800,'<p>Нужен очень опытный специалист</p>','Геодезист'),(28,600,'<p>Нужен очень опытный специалист</p>','Бригадир'),(29,600,'<p>Нужен очень опытный специалист с правами кат C</p>','Водитель кат C'),(30,300,'<p>Нужен очень опытный специалист </p>','Электрик '),(31,1000,'<p>Нужен очень опытный специалист </p>','Архитектор'),(32,1000,'<p>Нужен очень опытный специалист </p>','Геолог'),(34,300,'<p>Нужен уборщик рабочей територии</p>','Уборщик'),(36,10000,'<p>Описание этой вакансии.</p><p>В ней много преимуществ. </p><p>И так далее...</p>','Вакансия Токаря от 10 до 15 лет опыта'),(38,300,'<p>300 грн в день</p><p>опыт, требования, задачиопыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\">опыт, требования, задачи<span class=\"redactor-invisible-space\"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>','Разнорабочий'),(49,NULL,'','Разнорабочий'),(50,300,'<p>Нужен специалист по дереву</p>','Плотник'),(51,1000,'<p>Нужен специалист по сварке</p>','Сварщик'),(52,1000,'<p>Нужен специалист по бетонам</p>','Специалист по заполнителям бетонов'),(53,2000,'<p>Нужен специалист</p>','Высотный рабочий'),(54,NULL,'','Помощник сварщика'),(55,NULL,'','помощник электрика'),(56,75000,'<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\" style=\"width: 421px; height: 271px;\" width=\"421\" height=\"271\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно. </p><p>И <a href=\"https://google.com\" target=\"_blank\">ссылки</a> делать</p>','Руководитель'),(57,3999,'<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\" width=\"363\" height=\"258\" style=\"width: 363px; height: 258px;\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>','Оператор крана'),(58,39000,'<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>','Специалист по кровле'),(59,4000,'<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\" width=\"463\" height=\"297\" style=\"width: 463px; height: 297px;\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>','Водитель экскаватора '),(60,7000,'<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>','Дизайнер помещений '),(61,3000,'<h2>Описание вакансии тут</h2><p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"Картинки по запросу руководитель\"></p><p>Можно и <strong>картинки</strong>, и <strong>файлы</strong> цеплять. И всё что угодно.</p><p>И <a href=\"https://google.com/\" target=\"_blank\">ссылки</a> делать</p>','Замерщик'),(62,2000,'<p><img src=\"https://utmagazine.ru/uploads/content/15639556.jpg\" alt=\"ÐÐ°ÑÑÐ¸Ð½ÐºÐ¸ Ð¿Ð¾ Ð·Ð°Ð¿ÑÐ¾ÑÑ ÑÑÐºÐ¾Ð²Ð¾Ð´Ð¸ÑÐµÐ»Ñ\"></p>','дизайнер'),(63,NULL,'','Плиточник'),(64,NULL,'','Гибсокортонщик'),(65,NULL,'','Отделочник'),(66,6000,'<p>Прораб: ответственность + опытность. </p><p><strong>Требования к кандидату: </strong></p><ul><li>Требование 1</li><li>Требование 2</li><li>Требование 3</li></ul>','Прораб'),(68,10000,'','Электрик'),(71,13,'<p>Тест1</p>','Тест1'),(73,1,'<p>TestForGabri</p>','TestForGabri1'),(74,1,'<p>тестовая вакансия №1</p>','тестовая вакансия №1'),(75,2,'<ol><li>тестовая вакансия №2<strong>тестовая вакансия №1 тестовая вакансия №1<span class=\"redactor-invisible-space\"><em></em></span></strong></li></ol>','тестовая вакансия №2'),(76,123,'<p>тестовая вакансия №3</p>','тестовая вакансия №3'),(78,10000,'<p>Опыт работ на внутренних работах от 3 лет<br></p>','Отделочник'),(79,10000,'<p>Опыт работ в облицовки плитки</p>','Плиточник'),(80,10000,'<p>Опыт работ<br></p>','Сантехник'),(81,10000,'','Штукатур'),(82,10000,'','Разнорабочий'),(83,8000,'<ul><li>йцуйцк</li><li>ца</li><li>йцкйцкйц</li><li>кцйцкйцккц</li></ul>','Повар');
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse-country_id_fk` (`country_id`),
  CONSTRAINT `warehouse-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse`
--

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;
INSERT INTO `warehouse` VALUES (9,'Круговое',9,'Кругов'),(13,'Полиграфия',NULL,''),(20,'Проект А',11,'Кутузовский 7'),(25,'Магазин русалочка',NULL,''),(27,'Офис Инжелло',2,'');
/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_product`
--

DROP TABLE IF EXISTS `warehouse_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `purchase_cost` double(10,2) DEFAULT NULL,
  `recommended_cost` double(10,2) DEFAULT NULL,
  `consumer_cost` double(10,2) DEFAULT NULL,
  `trade_cost` double(10,2) DEFAULT NULL,
  `tax` double(10,2) DEFAULT NULL,
  `overhead_cost` double(10,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_product_currency_id_fk` (`currency_id`),
  KEY `warehouse_product_product_id_fk` (`product_id`),
  KEY `warehouse_product_warehouse_id_fk` (`warehouse_id`),
  CONSTRAINT `warehouse_product_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `warehouse_product_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `warehouse_product_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_product`
--

LOCK TABLES `warehouse_product` WRITE;
/*!40000 ALTER TABLE `warehouse_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `warehouse_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_user`
--

DROP TABLE IF EXISTS `warehouse_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_user_warehouse_id_fk` (`warehouse_id`),
  KEY `warehouse_customer_user_id_fk` (`user_id`),
  CONSTRAINT `warehouse_customer_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `warehouse_user_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_user`
--

LOCK TABLES `warehouse_user` WRITE;
/*!40000 ALTER TABLE `warehouse_user` DISABLE KEYS */;
INSERT INTO `warehouse_user` VALUES (9,9,4),(13,13,5),(20,20,1),(25,25,9),(28,27,16);
/*!40000 ALTER TABLE `warehouse_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `passport` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `apply_position` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `experience_description` text CHARACTER SET utf8,
  `collaborated` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,1,'Олег','Олегов','Олегович','2018-12-12',0,'123456789','Желаемая позиция из резюме',17,'<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>',1),(2,1,'Вадим','Вадимович','Вадимов','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>',NULL),(3,1,'Денис','Денисович','Денисов','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>',0),(4,1,'Мария','Мариевна','Мариева','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>',NULL),(5,1,'Филип','Филипович','Филипов','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>',NULL),(6,1,'Кирилл','Кириллович','Кириллов','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>',NULL),(7,1,'Маграт','Магратович','Магратов','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>',NULL),(8,1,'Мария','Мариевна','Мариева','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p>\r\n<p>Работал на работе 2</p>\r\n<p>Работал на работе 3</p>',NULL),(10,0,'Антон','Буткевич','Антонович','1985-03-14',0,'1MК274ТРО','Администратор',1,'<p>Я доволен своим опытом</p>',NULL),(11,0,'Ира','Солдатова','Ириновна','1995-06-12',1,'RT34ЦУ422','По ситуации',5,'<p>Много чего видала</p>',NULL),(12,0,'Александр','Романов','Александрович','2018-12-13',0,'T730ОР3ТРВ','Водитель',9,'<p>Хорошо вожу</p>',NULL),(13,0,'Георгий','Крутой','Варфаламеевич','9111-05-01',0,'','Повар',1,'',NULL),(14,0,'Александр','Крок','Аслександрович','0124-03-12',1,'Ф24ПУ5Ц','Строитель',16,'<p>Большое количество малых проектов</p>',1),(16,1,'Мария','Пушкина','Александровна','0222-02-22',1,'','',NULL,'',1),(17,1,'Святослав','Кудрявцев','Иванович','0222-02-22',1,'23356','',4,'<p>asfsf</p>',1),(18,1,'Артём','Гордын','Иванович','0222-02-22',1,'','',NULL,'',NULL),(19,1,'Михаил','Степной','Романович','0222-02-22',1,'','',NULL,'',1),(20,0,'Дмитрий','Грус','Витальевич ','0222-02-22',0,'','',NULL,'',NULL),(21,1,'Антон','Покусай','Павлович','0222-02-22',0,'','',NULL,'',1),(22,0,'Генадий','Мащенко','Павлович','0222-02-22',0,'','',NULL,'',NULL),(23,0,'Григорий','Спел','Ворфаломеевич ',NULL,0,'','',NULL,'<p>Что-то умеет</p>',NULL),(24,1,'Дмитрий','Грус','Витальевич ','0222-02-22',0,'','',NULL,'<p>фвы</p>',NULL),(25,1,'Святослав','Кудрявцев','Иванович','0222-02-22',1,'','',NULL,'',NULL),(27,0,'Серафим','Серафим','',NULL,0,'','',NULL,'',NULL),(28,0,'Серафим','Серафим','',NULL,0,'','',NULL,'',NULL),(29,0,'Антон','Нежин','Иванович',NULL,NULL,'','',NULL,'',0),(30,0,'Валерий','ВИкторович','ВИкторенко','2018-12-19',0,'2546464542','Плотник',8,'<p><strong>Текст описания</strong></p><p><em>Текст описания</em><em></em><br></p><h1>Текст описания<br></h1>',NULL),(31,1,'Филип','Филипович','Филипов','2018-12-12',1,'123456789','Желаемая позиция из резюме',13,'<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>',NULL),(32,0,'Алексей2','Алехин2','Алехович2','1993-02-05',0,'МД 5451','прораб',16,'<p>Работал в многих компаниях</p>',NULL),(43,1,'Прораб','Прорабов','Тестович','2018-12-13',0,'','',NULL,'',1),(44,1,'Прораб 2','Прорабович','',NULL,NULL,'','',NULL,'',1),(45,0,'Мария','Пушкина','Александровна','0222-02-22',1,'','',NULL,'',NULL),(46,0,'Святослав','Кудрявцев','Иванович','0222-02-22',1,'','',NULL,'',NULL),(47,0,'Артем2','Гордын','Иванович',NULL,NULL,'','',NULL,'',0),(48,0,'Тимофей','Работников3','',NULL,NULL,'','',NULL,'',1),(49,1,'Тимофей','Работников3','',NULL,NULL,'','',NULL,'',1),(50,1,'Нурлан','Сабуров','',NULL,0,'','',NULL,'',1),(51,0,'Жора','Торянов','',NULL,NULL,'','',NULL,'',0),(52,0,'Богдан','Сенин','',NULL,NULL,'','',NULL,'',0),(53,0,'Петр','Меньшов','',NULL,NULL,'','',NULL,'',0),(54,0,'Иван','Абрамов','',NULL,NULL,'','',NULL,'',0),(55,0,'Владимир','Круглов','',NULL,NULL,'','',NULL,'',0),(56,1,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',11,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',1),(57,0,'Саша','Страхов','Сергеевич ','2018-12-13',0,'1G32KAS84','',2,'<p>Хороший специалист</p>',0),(58,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(59,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(60,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(61,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(62,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(63,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(64,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(65,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(66,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(67,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(68,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(69,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(70,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(71,0,'Виктор','Победов','Трудовович','2018-12-27',0,'1221231346','Больше всего интересует личный рост и интересные проекты',9,'<p><strong>Резюме</strong></p><p>скачать <a href=\"/images/5c250989877f5.pdf\">5c250989877f5.pdf</a><br></p><p><strong>Паспорт</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/776f98abfd.jpg\"><br></p><p><strong>Код</strong></p><p><img src=\"http://dl4.joxi.net/drive/2018/12/27/0017/0368/1134960/60/e1a7ec00f6.jpg\"></p><p><br></p><p>Любое описание с использованием стандартнртного форматирования</p><p><br></p>',0),(72,0,'Святослав','Кудрявцев','Иванович','2005-02-22',1,'13214125126','',4,'<p><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsdYEBb3uN3pFa-KqKH73BdjTf0-1TPTaYFyIZNXWdTntg9nKL\" alt=\"Похожее изображение\"></p><p><strong>Отчет о разговоре с кандидатом</strong></p>',NULL),(73,1,'Прорабб','Прорабов','Тестович','2018-12-13',0,'23432432','кккк',NULL,'',NULL),(74,0,'Антон','Гармаш','',NULL,NULL,'','',NULL,'',0),(76,0,'Жора','Фомичев','',NULL,NULL,'','',NULL,'',0),(77,0,'','','',NULL,NULL,'','',NULL,'<p><strong>gfclmknk\r\n</strong></p><p><img src=\"https://st2.depositphotos.com/2001755/5408/i/450/depositphotos_54081723-stock-photo-beautiful-nature-landscape.jpg\" alt=\"ÐÐ°ÑÑÐ¸Ð½ÐºÐ¸ Ð¿Ð¾ Ð·Ð°Ð¿ÑÐ¾ÑÑ ÐºÐ°ÑÑÐ¸Ð½ÐºÐ°\" width=\"422\" height=\"422\" style=\"width: 422px; height: 422px;\">\r\n</p><hr><p><img src=\"/images/5c262fdccea3b.jpeg\">\r\n</p>',0),(79,0,'Олег','Иванов','',NULL,NULL,'','',NULL,'',0),(80,0,'','','',NULL,NULL,'','',NULL,'',0),(81,0,'Олег','Иванов2','Максимович',NULL,NULL,'','',NULL,'',0),(82,0,'1','1','','2019-01-08',0,'','',NULL,'<p>dasdad</p>',0),(85,0,'Алексей','Петров','',NULL,NULL,'','',NULL,'',0),(86,1,'Борис','Фамильев','фыв',NULL,NULL,'фывфв','фыв',-1,'',1),(87,0,'Анна','Романова','',NULL,NULL,'','',NULL,'',0),(88,0,'Остап','Колинин','',NULL,NULL,'','',NULL,'',0),(89,1,'София','Печугина','',NULL,NULL,'','',NULL,'',1),(90,0,'Дмитрий','Дурнев','',NULL,NULL,'','',NULL,'',0),(91,0,'Лена','Караченцева','',NULL,NULL,'','',NULL,'',0),(92,0,'','','','2019-01-09',NULL,'','',1,'',0),(94,0,'Тест1','Тест1','Тест1',NULL,NULL,'','',NULL,'<p>Тест1</p>',0),(96,1,'Вова Прораб','','',NULL,0,'','Прораб',5,'<p>Курирует два обьекта</p>',1),(97,0,'TestForGabri','TestForGabri','TestForGabri',NULL,0,'','',NULL,'',0),(98,1,'Тестовый кадр №1','Тестовый кадр №1 Наверное','Тестовый кадр №1','2019-01-19',1,'фывфв2141','Тестовый кадр №1',4,'<p>Тестовый кадр №1 фывфывфвы</p>',1),(99,0,'Тестовый кадр №2','Тестовый кадр №2','Тестовый кадр №2','2019-01-19',1,'1234','Тестовый кадр №2',1,'<p>Тестовый кадр №2</p>',0),(100,1,'Тестовый кадр №3','Тестовый кадр №3','Тестовый кадр №3','2019-01-30',1,'214124','Тестовый кадр №3',3,'Тестовый кадр №3<p><img src=\"/images/5c4328708ff46.png\"></p>',1),(102,1,'Вадим Пенсия','','',NULL,0,'','Отделочник',20,'',1),(103,1,'Дима пенсия','','',NULL,0,'','Отделочник',15,'',0),(104,1,'Дядя Петя','','',NULL,NULL,'','Сантехник',10,'',0),(105,1,'Саша','Бондаренко','',NULL,NULL,'','Плиточник',7,'<p>Работает на Валентиновской<br></p>',0),(106,1,'Руслан','Дейнеко','',NULL,0,'','Штукатур',NULL,'',0),(107,1,'Дима Юрист','','',NULL,0,'','Разнорабочий',NULL,'',0),(108,1,'Дима','Пихотинский','',NULL,0,'','Разнорабочий',NULL,'',0),(109,1,'Саша','Шульгин','','1984-01-08',0,'','Электрик',NULL,'',0),(110,1,'Макс','','',NULL,NULL,'','Плиточник',NULL,'',0),(111,1,'Саша Купянск','','',NULL,0,'','Плиточник',NULL,'',0),(112,1,'Женя','Соболь','','1983-01-06',NULL,'','Отделочник',NULL,'<p>Веницианка</p>',0),(113,0,'Олег','Григорьев','Николаевич','2019-02-06',0,'123','',5,'<p><img src=\"/images/5c5ad69400420.jpg\"></p><p><br></p>',0),(114,0,'Олег','Олегов','Олегович','2018-12-12',1,'123456789','Желаемая позиция из резюме',3,'<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>',NULL),(115,0,'Олег','Олегов','Олегович','2018-12-12',1,'123456789','Желаемая позиция из резюме',3,'<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>',NULL),(116,1,'Олег','Олегов','Олегович','2018-12-12',0,'123456789','Желаемая позиция из резюме',17,'<p>Работал на работе 1</p><p>Работал на работе 2</p><p>Работал на работе 3</p>',NULL),(117,0,'','','',NULL,NULL,'','',NULL,'',0);
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker_vacancy`
--

DROP TABLE IF EXISTS `worker_vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) DEFAULT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-worker_vacancy-worker_id` (`worker_id`),
  KEY `idx-worker_vacancy-vacancy_id` (`vacancy_id`),
  CONSTRAINT `fk-worker_vacancy-vacancy_id` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-worker_vacancy-worker_id` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_vacancy`
--

LOCK TABLES `worker_vacancy` WRITE;
/*!40000 ALTER TABLE `worker_vacancy` DISABLE KEYS */;
INSERT INTO `worker_vacancy` VALUES (11,23,27),(12,23,28),(50,45,11),(51,45,31),(52,46,11),(53,47,24),(54,47,27),(55,47,28),(56,48,11),(57,48,24),(58,48,25),(68,29,11),(74,72,11),(75,72,24),(76,73,25),(77,73,27),(78,77,24),(79,77,27),(80,77,28),(81,17,11),(82,17,26),(83,17,28),(84,56,11),(85,56,24),(86,56,25),(88,80,1),(90,82,5),(91,82,6),(92,82,7),(93,82,9),(101,92,3),(102,92,4),(109,94,71),(111,3,1),(112,3,2),(113,3,3),(123,97,73),(125,99,75),(126,100,76),(128,98,74),(132,86,2),(142,104,80),(144,105,79),(145,106,81),(146,96,66),(147,107,82),(150,109,68),(151,110,79),(152,108,82),(155,112,78),(156,103,78),(157,102,78),(158,111,79),(161,113,1),(162,113,2),(163,113,4),(164,1,1),(165,1,2),(166,1,3),(167,114,1),(168,114,2),(169,114,3),(170,114,4),(171,115,1),(172,115,2),(173,115,3),(174,115,4),(175,116,1),(176,116,2),(177,116,3);
/*!40000 ALTER TABLE `worker_vacancy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-30 14:27:52