-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: ingello.com    Database: forma
-- ------------------------------------------------------
-- Server version	5.7.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_interface`
--

DROP TABLE IF EXISTS `access_interface`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `access_interface` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_mark` int(11) DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_access_interface_rule_id` (`rule_id`),
  KEY `fk_access_interface_user_id` (`user_id`),
  CONSTRAINT `fk_access_interface_rule_id` FOREIGN KEY (`rule_id`) REFERENCES `rule` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_access_interface_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_interface`
--

LOCK TABLES `access_interface` WRITE;
/*!40000 ALTER TABLE `access_interface` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_interface` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accessory`
--

DROP TABLE IF EXISTS `accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_class` varchar(255) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10156 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessory`
--

LOCK TABLES `accessory` WRITE;
/*!40000 ALTER TABLE `accessory` DISABLE KEYS */;
INSERT INTO `accessory` VALUES (62,'forma\\modules\\product\\records\\Type',5,1),(119,'forma\\modules\\product\\records\\Type',10,1),(121,'forma\\modules\\product\\records\\Type',11,1),(122,'forma\\modules\\product\\records\\Type',12,1),(123,'forma\\modules\\product\\records\\Type',13,1),(124,'forma\\modules\\product\\records\\Type',14,1),(125,'forma\\modules\\product\\records\\PackUnit',4,1),(126,'forma\\modules\\product\\records\\PackUnit',5,1),(131,'forma\\modules\\supplier\\records\\Supplier',6,1),(134,'forma\\modules\\product\\records\\Currency',6,1),(135,'forma\\modules\\product\\records\\TaxRate',4,1),(136,'forma\\modules\\product\\records\\TaxRate',5,1),(138,'forma\\modules\\product\\records\\TaxRate',6,1),(186,'forma\\modules\\worker\\records\\Worker',1,1),(187,'forma\\modules\\worker\\records\\Worker',2,1),(188,'forma\\modules\\worker\\records\\Worker',3,1),(189,'forma\\modules\\worker\\records\\Worker',4,1),(239,'forma\\modules\\supplier\\records\\Supplier',8,1),(332,'forma\\modules\\project\\records\\project\\Project',6,1),(337,'forma\\modules\\project\\records\\project\\Project',11,1),(1279,'forma\\modules\\customer\\records\\Customer',143,1),(1280,'forma\\modules\\customer\\records\\Customer',144,1),(1461,'forma\\modules\\product\\records\\Manufacturer',11,1),(1828,'forma\\modules\\product\\records\\Manufacturer',15,1),(2027,'forma\\modules\\product\\records\\Product',103,1),(2028,'forma\\modules\\product\\records\\Product',107,1),(2029,'forma\\modules\\product\\records\\Product',105,1),(2669,'forma\\modules\\selling\\records\\strategy\\Strategy',13,1),(7608,'forma\\modules\\purchase\\records\\purchase\\Purchase',177,1),(7609,'forma\\modules\\purchase\\records\\purchase\\Purchase',178,1),(7610,'forma\\modules\\selling\\records\\talk\\Answer',137,1),(7611,'forma\\modules\\purchase\\records\\purchase\\Purchase',1,1),(7613,'forma\\modules\\selling\\records\\talk\\Answer',138,1),(7614,'forma\\modules\\purchase\\records\\purchase\\Purchase',179,1),(7615,'forma\\modules\\product\\records\\Category',190,1),(7616,'forma\\modules\\selling\\records\\talk\\Answer',139,1),(7617,'forma\\modules\\product\\records\\Category',191,1),(7618,'forma\\modules\\product\\records\\Category',192,1),(7620,'forma\\modules\\selling\\records\\talk\\Answer',140,1),(7621,'forma\\modules\\selling\\records\\talk\\Answer',141,1),(7622,'forma\\modules\\purchase\\records\\purchase\\Purchase',180,1),(7623,'forma\\modules\\product\\records\\Manufacturer',10,1),(7624,'forma\\modules\\product\\records\\Product',246,1),(7625,'forma\\modules\\product\\records\\Product',247,1),(7626,'forma\\modules\\product\\records\\Manufacturer',12,1),(7627,'forma\\modules\\product\\records\\Product',248,1),(7628,'forma\\modules\\product\\records\\Manufacturer',13,1),(7629,'forma\\modules\\product\\records\\Product',249,1),(7630,'forma\\modules\\product\\records\\Manufacturer',14,1),(7631,'forma\\modules\\product\\records\\Product',250,1),(7632,'forma\\modules\\product\\records\\Product',251,1),(7633,'forma\\modules\\product\\records\\Manufacturer',16,1),(7634,'forma\\modules\\product\\records\\Product',252,1),(7635,'forma\\modules\\product\\records\\Product',253,1),(7636,'forma\\modules\\product\\records\\Manufacturer',17,1),(7637,'forma\\modules\\product\\records\\Product',254,1),(7638,'forma\\modules\\product\\records\\Manufacturer',18,1),(7639,'forma\\modules\\product\\records\\Product',255,1),(7640,'forma\\modules\\product\\records\\Currency',104,1),(7766,'forma\\modules\\purchase\\records\\purchase\\Purchase',201,1),(7767,'forma\\modules\\transit\\records\\transit\\Transit',1,1),(8682,'forma\\modules\\purchase\\records\\purchase\\Purchase',202,1),(8683,'forma\\modules\\purchase\\records\\purchase\\Purchase',203,1),(8684,'forma\\modules\\selling\\records\\selling\\Selling',1,1),(8685,'forma\\modules\\selling\\records\\selling\\Selling',2,1),(8686,'forma\\modules\\selling\\records\\selling\\Selling',3,1),(8687,'forma\\modules\\vacancy\\records\\Vacancy',86,1),(8688,'forma\\modules\\vacancy\\records\\Vacancy',87,1),(8689,'forma\\modules\\vacancy\\records\\Vacancy',88,1),(8690,'forma\\modules\\vacancy\\records\\Vacancy',89,1),(8691,'forma\\modules\\hr\\records\\interview\\Interview',1,1),(8692,'forma\\modules\\hr\\records\\interview\\Interview',2,1),(8693,'forma\\modules\\hr\\records\\interview\\Interview',3,1),(8694,'forma\\modules\\selling\\records\\strategy\\Strategy',1,1),(8695,'forma\\modules\\selling\\records\\strategy\\Strategy',2,1),(8696,'forma\\modules\\selling\\records\\strategy\\Strategy',3,1),(8697,'forma\\modules\\selling\\records\\talk\\Request',1,1),(8698,'forma\\modules\\selling\\records\\talk\\Answer',1,1),(8699,'forma\\modules\\selling\\records\\talk\\Answer',2,1),(8700,'forma\\modules\\selling\\records\\talk\\Request',2,1),(8701,'forma\\modules\\selling\\records\\talk\\Answer',3,1),(8702,'forma\\modules\\selling\\records\\talk\\Answer',4,1),(8703,'forma\\modules\\selling\\records\\talk\\Request',3,1),(8704,'forma\\modules\\selling\\records\\talk\\Answer',5,1),(8705,'forma\\modules\\selling\\records\\talk\\Answer',6,1),(8706,'forma\\modules\\selling\\records\\talk\\Request',4,1),(8707,'forma\\modules\\selling\\records\\talk\\Request',5,1),(8708,'forma\\modules\\selling\\records\\talk\\Request',6,1),(8709,'forma\\modules\\selling\\records\\talk\\Answer',7,1),(8710,'forma\\modules\\selling\\records\\talk\\Answer',8,1),(8711,'forma\\modules\\selling\\records\\talk\\Answer',9,1),(8712,'forma\\modules\\selling\\records\\talk\\Answer',10,1),(8713,'forma\\modules\\selling\\records\\talk\\Answer',11,1),(8714,'forma\\modules\\selling\\records\\talk\\Answer',12,1),(8715,'forma\\modules\\inventorization\\records\\Inventorization',1,1),(8716,'forma\\modules\\purchase\\records\\purchase\\Purchase',254,1),(8717,'forma\\modules\\purchase\\records\\purchase\\Purchase',255,1),(8718,'forma\\modules\\purchase\\records\\purchase\\Purchase',256,1),(8719,'forma\\modules\\selling\\records\\selling\\Selling',4,1),(8720,'forma\\modules\\selling\\records\\selling\\Selling',5,1),(8721,'forma\\modules\\selling\\records\\selling\\Selling',6,1),(8722,'forma\\modules\\selling\\records\\selling\\Selling',7,1),(8723,'forma\\modules\\selling\\records\\selling\\Selling',8,1),(8724,'forma\\modules\\selling\\records\\selling\\Selling',9,1),(8725,'forma\\modules\\customer\\records\\Customer',145,1),(8726,'forma\\modules\\customer\\records\\Customer',146,1),(8727,'forma\\modules\\selling\\records\\selling\\Selling',10,1),(8728,'forma\\modules\\selling\\records\\selling\\Selling',11,1),(8729,'forma\\modules\\selling\\records\\selling\\Selling',12,1),(8730,'forma\\modules\\selling\\records\\selling\\Selling',13,1),(8731,'forma\\modules\\selling\\records\\selling\\Selling',14,1),(8732,'forma\\modules\\selling\\records\\selling\\Selling',15,1),(8733,'forma\\modules\\hr\\records\\interview\\Interview',19,1),(8734,'forma\\modules\\worker\\records\\Worker',44,1),(8735,'forma\\modules\\worker\\records\\Worker',45,1),(8736,'forma\\modules\\worker\\records\\Worker',46,1),(8737,'forma\\modules\\hr\\records\\interview\\Interview',20,1),(8738,'forma\\modules\\hr\\records\\interview\\Interview',21,1),(8739,'forma\\modules\\hr\\records\\interview\\Interview',22,1),(8740,'forma\\modules\\worker\\records\\Worker',47,1),(8741,'forma\\modules\\hr\\records\\interview\\Interview',23,1),(8742,'forma\\modules\\worker\\records\\Worker',48,1),(8743,'forma\\modules\\worker\\records\\Worker',49,1),(8744,'forma\\modules\\hr\\records\\interview\\Interview',24,1),(8745,'forma\\modules\\hr\\records\\interview\\Interview',25,1),(8746,'forma\\modules\\worker\\records\\Worker',50,1),(8747,'forma\\modules\\hr\\records\\interview\\Interview',26,1),(8748,'forma\\modules\\worker\\records\\Worker',51,1),(8749,'forma\\modules\\inventorization\\records\\Inventorization',2,1),(8750,'forma\\modules\\purchase\\records\\purchase\\Purchase',257,1),(8751,'forma\\modules\\event\\records\\Event',1,1),(8983,'forma\\modules\\event\\records\\Event',2,1),(8984,'forma\\modules\\event\\records\\Event',6,1),(8985,'forma\\modules\\event\\records\\Event',7,1),(8986,'forma\\modules\\event\\records\\Event',9,1),(8987,'forma\\modules\\event\\records\\Event',10,1),(8988,'forma\\modules\\event\\records\\Event',11,1),(8989,'forma\\modules\\event\\records\\Event',12,1),(8990,'forma\\modules\\event\\records\\Event',13,1),(8991,'forma\\modules\\event\\records\\Event',14,1),(8992,'forma\\modules\\event\\records\\Event',15,1),(8993,'forma\\modules\\event\\records\\Event',16,1),(8994,'forma\\modules\\event\\records\\Event',17,1),(8995,'forma\\modules\\event\\records\\Event',18,1),(8996,'forma\\modules\\event\\records\\Event',19,1),(8997,'forma\\modules\\event\\records\\Event',20,1),(8998,'forma\\modules\\event\\records\\Event',21,1),(8999,'forma\\modules\\event\\records\\Event',22,1),(9000,'forma\\modules\\event\\records\\Event',23,1),(9001,'forma\\modules\\event\\records\\Event',24,1),(9002,'forma\\modules\\event\\records\\Event',25,1),(9003,'forma\\modules\\event\\records\\Event',26,1),(9004,'forma\\modules\\event\\records\\Event',27,1),(9005,'forma\\modules\\event\\records\\Event',28,1),(9006,'forma\\modules\\event\\records\\Event',29,1),(9007,'forma\\modules\\event\\records\\Event',30,1),(9008,'forma\\modules\\event\\records\\Event',31,1),(9009,'forma\\modules\\event\\records\\Event',32,1),(9010,'forma\\modules\\event\\records\\Event',33,1),(9011,'forma\\modules\\event\\records\\Event',34,1),(9012,'forma\\modules\\event\\records\\Event',35,1),(9013,'forma\\modules\\event\\records\\Event',36,1),(9014,'forma\\modules\\event\\records\\Event',37,1),(9015,'forma\\modules\\event\\records\\Event',38,1),(9016,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',1,1),(9017,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',2,1),(9018,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',3,1),(9019,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',4,1),(9020,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',5,1),(9021,'forma\\modules\\product\\records\\Category',193,1),(9022,'forma\\modules\\product\\records\\Manufacturer',19,1),(9023,'forma\\modules\\product\\records\\Product',256,1),(9024,'forma\\modules\\product\\records\\Manufacturer',20,1),(9025,'forma\\modules\\product\\records\\Product',257,1),(9026,'forma\\modules\\product\\records\\Product',258,1),(9027,'forma\\modules\\product\\records\\Manufacturer',21,1),(9028,'forma\\modules\\product\\records\\Product',259,1),(9029,'forma\\modules\\product\\records\\Product',260,1),(9030,'forma\\modules\\event\\records\\Event',39,1),(9232,'forma\\modules\\selling\\records\\selling\\Selling',43,1),(9233,'forma\\modules\\customer\\records\\Customer',164,1),(9234,'forma\\modules\\selling\\records\\selling\\Selling',44,1),(9235,'forma\\modules\\selling\\records\\selling\\Selling',44,1),(9236,'forma\\modules\\customer\\records\\Customer',165,1),(9237,'forma\\modules\\selling\\records\\selling\\Selling',45,1),(9238,'forma\\modules\\selling\\records\\selling\\Selling',45,1),(9239,'forma\\modules\\customer\\records\\Customer',166,1),(9240,'forma\\modules\\selling\\records\\selling\\Selling',46,1),(9241,'forma\\modules\\selling\\records\\selling\\Selling',46,1),(9413,'forma\\modules\\selling\\records\\customersource\\CustomerSource',1,1),(9820,'forma\\modules\\hr\\records\\interviewstate\\InterviewState',1,1),(9984,'forma\\modules\\transit\\records\\transit\\Transit',3,8),(9985,'forma\\modules\\product\\records\\Type',21,9),(9986,'forma\\modules\\product\\records\\Type',22,9),(9987,'forma\\modules\\product\\records\\Type',23,9),(9988,'forma\\modules\\product\\records\\Type',24,9),(9989,'forma\\modules\\product\\records\\Type',25,9),(9990,'forma\\modules\\product\\records\\Type',26,9),(9991,'forma\\modules\\product\\records\\PackUnit',8,9),(9992,'forma\\modules\\product\\records\\PackUnit',9,9),(9993,'forma\\modules\\supplier\\records\\Supplier',11,9),(9994,'forma\\modules\\supplier\\records\\Supplier',12,9),(9995,'forma\\modules\\product\\records\\Currency',107,9),(9996,'forma\\modules\\product\\records\\Currency',108,9),(9997,'forma\\modules\\product\\records\\TaxRate',9,9),(9998,'forma\\modules\\product\\records\\TaxRate',10,9),(9999,'forma\\modules\\worker\\records\\Worker',64,9),(10000,'forma\\modules\\worker\\records\\Worker',65,9),(10001,'forma\\modules\\worker\\records\\Worker',66,9),(10002,'forma\\modules\\worker\\records\\Worker',67,9),(10003,'forma\\modules\\worker\\records\\Worker',68,9),(10004,'forma\\modules\\worker\\records\\Worker',69,9),(10005,'forma\\modules\\worker\\records\\Worker',70,9),(10006,'forma\\modules\\worker\\records\\Worker',71,9),(10007,'forma\\modules\\worker\\records\\Worker',72,9),(10008,'forma\\modules\\worker\\records\\Worker',73,9),(10009,'forma\\modules\\worker\\records\\Worker',74,9),(10010,'forma\\modules\\worker\\records\\Worker',75,9),(10011,'forma\\modules\\project\\records\\project\\Project',14,9),(10012,'forma\\modules\\project\\records\\project\\Project',15,9),(10013,'forma\\modules\\customer\\records\\Customer',174,9),(10014,'forma\\modules\\customer\\records\\Customer',175,9),(10015,'forma\\modules\\customer\\records\\Customer',176,9),(10016,'forma\\modules\\customer\\records\\Customer',177,9),(10017,'forma\\modules\\customer\\records\\Customer',178,9),(10018,'forma\\modules\\customer\\records\\Customer',179,9),(10019,'forma\\modules\\customer\\records\\Customer',180,9),(10020,'forma\\modules\\product\\records\\Manufacturer',34,9),(10021,'forma\\modules\\product\\records\\Manufacturer',35,9),(10022,'forma\\modules\\product\\records\\Manufacturer',36,9),(10023,'forma\\modules\\product\\records\\Manufacturer',37,9),(10024,'forma\\modules\\product\\records\\Manufacturer',38,9),(10025,'forma\\modules\\product\\records\\Manufacturer',39,9),(10026,'forma\\modules\\product\\records\\Manufacturer',40,9),(10027,'forma\\modules\\product\\records\\Manufacturer',41,9),(10028,'forma\\modules\\product\\records\\Manufacturer',42,9),(10029,'forma\\modules\\product\\records\\Manufacturer',43,9),(10030,'forma\\modules\\product\\records\\Manufacturer',44,9),(10031,'forma\\modules\\product\\records\\Manufacturer',45,9),(10032,'forma\\modules\\selling\\records\\strategy\\Strategy',18,9),(10033,'forma\\modules\\selling\\records\\strategy\\Strategy',19,9),(10034,'forma\\modules\\product\\records\\Category',198,9),(10035,'forma\\modules\\product\\records\\Category',199,9),(10036,'forma\\modules\\product\\records\\Category',200,9),(10037,'forma\\modules\\product\\records\\Category',201,9),(10038,'forma\\modules\\vacancy\\records\\Vacancy',94,9),(10039,'forma\\modules\\vacancy\\records\\Vacancy',95,9),(10040,'forma\\modules\\vacancy\\records\\Vacancy',96,9),(10041,'forma\\modules\\vacancy\\records\\Vacancy',97,9),(10042,'forma\\modules\\selling\\records\\talk\\Request',13,9),(10043,'forma\\modules\\selling\\records\\talk\\Request',14,9),(10044,'forma\\modules\\selling\\records\\talk\\Request',15,9),(10045,'forma\\modules\\selling\\records\\talk\\Request',16,9),(10046,'forma\\modules\\selling\\records\\talk\\Request',17,9),(10047,'forma\\modules\\selling\\records\\talk\\Request',18,9),(10048,'forma\\modules\\event\\records\\Event',75,9),(10049,'forma\\modules\\event\\records\\Event',76,9),(10050,'forma\\modules\\event\\records\\Event',77,9),(10051,'forma\\modules\\event\\records\\Event',78,9),(10052,'forma\\modules\\event\\records\\Event',79,9),(10053,'forma\\modules\\event\\records\\Event',80,9),(10054,'forma\\modules\\event\\records\\Event',81,9),(10055,'forma\\modules\\event\\records\\Event',82,9),(10056,'forma\\modules\\event\\records\\Event',83,9),(10057,'forma\\modules\\event\\records\\Event',84,9),(10058,'forma\\modules\\event\\records\\Event',85,9),(10059,'forma\\modules\\event\\records\\Event',86,9),(10060,'forma\\modules\\event\\records\\Event',87,9),(10061,'forma\\modules\\event\\records\\Event',88,9),(10062,'forma\\modules\\event\\records\\Event',89,9),(10063,'forma\\modules\\event\\records\\Event',90,9),(10064,'forma\\modules\\event\\records\\Event',91,9),(10065,'forma\\modules\\event\\records\\Event',92,9),(10066,'forma\\modules\\event\\records\\Event',93,9),(10067,'forma\\modules\\event\\records\\Event',94,9),(10068,'forma\\modules\\event\\records\\Event',95,9),(10069,'forma\\modules\\event\\records\\Event',96,9),(10070,'forma\\modules\\event\\records\\Event',97,9),(10071,'forma\\modules\\event\\records\\Event',98,9),(10072,'forma\\modules\\event\\records\\Event',99,9),(10073,'forma\\modules\\event\\records\\Event',100,9),(10074,'forma\\modules\\event\\records\\Event',101,9),(10075,'forma\\modules\\event\\records\\Event',102,9),(10076,'forma\\modules\\event\\records\\Event',103,9),(10077,'forma\\modules\\event\\records\\Event',104,9),(10078,'forma\\modules\\event\\records\\Event',105,9),(10079,'forma\\modules\\event\\records\\Event',106,9),(10080,'forma\\modules\\event\\records\\Event',107,9),(10081,'forma\\modules\\event\\records\\Event',108,9),(10082,'forma\\modules\\event\\records\\Event',109,9),(10083,'forma\\modules\\selling\\records\\customersource\\CustomerSource',3,9),(10084,'forma\\modules\\hr\\records\\interviewstate\\InterviewState',3,9),(10085,'forma\\modules\\product\\records\\Product',276,9),(10086,'forma\\modules\\product\\records\\Product',277,9),(10087,'forma\\modules\\product\\records\\Product',278,9),(10088,'forma\\modules\\product\\records\\Product',279,9),(10089,'forma\\modules\\product\\records\\Product',280,9),(10090,'forma\\modules\\product\\records\\Product',281,9),(10091,'forma\\modules\\product\\records\\Product',282,9),(10092,'forma\\modules\\product\\records\\Product',283,9),(10093,'forma\\modules\\product\\records\\Product',284,9),(10094,'forma\\modules\\product\\records\\Product',285,9),(10095,'forma\\modules\\product\\records\\Product',286,9),(10096,'forma\\modules\\product\\records\\Product',287,9),(10097,'forma\\modules\\product\\records\\Product',288,9),(10098,'forma\\modules\\product\\records\\Product',289,9),(10099,'forma\\modules\\product\\records\\Product',290,9),(10100,'forma\\modules\\purchase\\records\\purchase\\Purchase',261,9),(10101,'forma\\modules\\purchase\\records\\purchase\\Purchase',262,9),(10102,'forma\\modules\\purchase\\records\\purchase\\Purchase',263,9),(10103,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',49,9),(10104,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',50,9),(10105,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',51,9),(10106,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',52,9),(10107,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',53,9),(10108,'forma\\modules\\selling\\records\\requeststrategy\\RequestStrategy',54,9),(10109,'forma\\modules\\selling\\records\\talk\\Answer',13,9),(10110,'forma\\modules\\selling\\records\\talk\\Answer',14,9),(10111,'forma\\modules\\selling\\records\\talk\\Answer',15,9),(10112,'forma\\modules\\selling\\records\\talk\\Answer',16,9),(10113,'forma\\modules\\selling\\records\\talk\\Answer',17,9),(10114,'forma\\modules\\selling\\records\\talk\\Answer',18,9),(10115,'forma\\modules\\selling\\records\\talk\\Answer',19,9),(10116,'forma\\modules\\selling\\records\\talk\\Answer',20,9),(10117,'forma\\modules\\selling\\records\\talk\\Answer',21,9),(10118,'forma\\modules\\selling\\records\\talk\\Answer',22,9),(10119,'forma\\modules\\selling\\records\\talk\\Answer',23,9),(10120,'forma\\modules\\inventorization\\records\\Inventorization',5,9),(10121,'forma\\modules\\inventorization\\records\\Inventorization',6,9),(10122,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',11,9),(10123,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',12,9),(10124,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',13,9),(10125,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',14,9),(10126,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',15,9),(10127,'forma\\modules\\selling\\records\\selling\\Selling',65,9),(10128,'forma\\modules\\selling\\records\\selling\\Selling',66,9),(10129,'forma\\modules\\selling\\records\\selling\\Selling',67,9),(10130,'forma\\modules\\selling\\records\\selling\\Selling',68,9),(10131,'forma\\modules\\selling\\records\\selling\\Selling',69,9),(10132,'forma\\modules\\selling\\records\\selling\\Selling',70,9),(10133,'forma\\modules\\selling\\records\\selling\\Selling',71,9),(10134,'forma\\modules\\selling\\records\\selling\\Selling',72,9),(10135,'forma\\modules\\selling\\records\\selling\\Selling',73,9),(10136,'forma\\modules\\selling\\records\\selling\\Selling',74,9),(10137,'forma\\modules\\selling\\records\\selling\\Selling',75,9),(10138,'forma\\modules\\selling\\records\\selling\\Selling',76,9),(10139,'forma\\modules\\selling\\records\\selling\\Selling',77,9),(10140,'forma\\modules\\selling\\records\\selling\\Selling',78,9),(10141,'forma\\modules\\selling\\records\\selling\\Selling',79,9),(10142,'forma\\modules\\selling\\records\\selling\\Selling',80,9),(10143,'forma\\modules\\selling\\records\\selling\\Selling',81,9),(10144,'forma\\modules\\selling\\records\\selling\\Selling',82,9),(10145,'forma\\modules\\transit\\records\\transit\\Transit',4,9),(10146,'forma\\modules\\transit\\records\\transit\\Transit',5,9),(10147,'forma\\modules\\inventorization\\records\\Inventorization',7,9),(10148,'forma\\modules\\supplier\\records\\Supplier',13,9),(10149,'forma\\modules\\purchase\\records\\purchase\\Purchase',264,9),(10150,'forma\\modules\\vacancy\\records\\Vacancy',98,9),(10151,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',16,9),(10152,'forma\\modules\\worker\\records\\Worker',76,9),(10153,'forma\\modules\\worker\\records\\Worker',77,9),(10154,'forma\\modules\\vacancy\\records\\Vacancy',99,9),(10155,'forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',17,9);
/*!40000 ALTER TABLE `accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `request_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id-answer-request_id` (`request_id`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'да',1),(2,'нет',1),(3,'богатый опыт (10+)',2),(4,'хороший опыт (5+лет)',2),(5,'да',3),(6,'небольшой ( до года)',2),(7,'извините, я передумал (а)',4),(8,'новой почтой',5),(9,'по тарифам новой почты, или джастин (обычно это около 60 грн по украине)',6),(10,'да',4),(12,'джастин',5),(13,'да',13),(14,'нет',13),(15,'богатый опыт (10+)',14),(16,'хороший опыт (5+лет)',14),(17,'да',15),(18,'небольшой ( до года)',14),(19,'извините, я передумал (а)',16),(20,'новой почтой',17),(21,'по тарифам новой почты, или джастин (обычно это около 60 грн по украине)',18),(22,'да',16),(23,'джастин',17);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_unique_index` (`name`,`parent_id`),
  KEY `category_ibfk_2` (`parent_id`),
  CONSTRAINT `category_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (192,'Кнопочные телефоны',190),(200,'Кнопочные телефоны',198),(191,'Смартфоны',190),(199,'Смартфоны',198),(193,'Стационарные телефоны',NULL),(201,'Стационарные телефоны',NULL),(190,'Телефоны',NULL),(198,'Телефоны',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=278 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (35,'Австралия'),(36,'Австрия'),(37,'Азербайджан'),(38,'Акротири'),(39,'Албания'),(40,'Алжир'),(41,'Американское Самоа'),(42,'Ангилья'),(43,'Ангола'),(44,'Андорра'),(45,'Антигуа и Барбуда'),(46,'Аргентина'),(47,'Армения'),(48,'Аруба'),(49,'Афганистан'),(50,'Багамские Острова'),(51,'Бангладеш'),(52,'Барбадос'),(53,'Бахрейн'),(54,'Белиз'),(55,'Белоруссия'),(56,'Бельгия'),(57,'Бенин'),(58,'Бермудские Острова'),(59,'Болгария'),(60,'Боливия'),(61,'Босния и Герцеговина'),(62,'Ботсвана'),(63,'Бразилия'),(64,'Британская территория в Индийском океане'),(65,'Британские Виргинские острова'),(66,'Бруней'),(67,'Буркина-Фасо'),(68,'Бурунди'),(69,'Бутан'),(70,'Вануату'),(71,'Ватикан'),(72,'Великобритания'),(73,'Венгрия'),(74,'Венесуэла'),(75,'Виргинские Острова'),(76,'Восточный Тимор'),(77,'Вьетнам'),(78,'Габон'),(79,'Гаити'),(80,'Гайана'),(81,'Гамбия'),(82,'Гана'),(83,'Гваделупа'),(84,'Гватемала'),(85,'Гвинея'),(86,'Гвинея-Бисау'),(87,'Германия'),(88,'Гернси'),(89,'Гибралтар'),(90,'Гондурас'),(91,'Гонконг'),(92,'Гренада'),(93,'Гренландия'),(94,'Греция'),(95,'Грузия'),(96,'Гуам'),(97,'Дания'),(98,'Декелия'),(99,'Демократическая Республика Конго'),(100,'Джерси'),(101,'Джибути'),(102,'Доминика'),(103,'Доминиканская Республика'),(104,'Египет'),(105,'Замбия'),(106,'Западная Сахара'),(107,'Зимбабве'),(108,'Израиль'),(109,'Индия'),(110,'Индонезия'),(111,'Иордания'),(112,'Ирак'),(113,'Иран'),(114,'Ирландия'),(115,'Исландия'),(116,'Испания'),(117,'Италия'),(118,'Йемен'),(119,'Кабо-Верде'),(120,'Казахстан'),(121,'Каймановы острова'),(122,'Камбоджа'),(123,'Камерун'),(124,'Канада'),(125,'Катар'),(126,'Кения'),(127,'Кипр'),(128,'Киргизия'),(129,'Кирибати'),(130,'Китай'),(131,'Кокосовые острова'),(132,'Колумбия'),(133,'Коморы'),(134,'Косово'),(135,'Коста-Рика'),(137,'Куба'),(138,'Кувейт'),(139,'Кюрасао'),(140,'Лаос'),(141,'Латвия'),(142,'Лесото'),(143,'Либерия'),(144,'Ливан'),(145,'Ливия'),(146,'Литва'),(147,'Лихтенштейн'),(148,'Люксембург'),(149,'Маврикий'),(150,'Мавритания'),(151,'Мадагаскар'),(152,'Майотта'),(153,'Макао'),(154,'Македония'),(155,'Малави'),(156,'Малайзия'),(157,'Мали'),(158,'Мальдивы'),(159,'Мальта'),(160,'Марокко'),(161,'Мартиника'),(162,'Маршалловы Острова'),(163,'Мексика'),(164,'Микронезия'),(165,'Мозамбик'),(166,'Молдова'),(167,'Монако'),(168,'Монголия'),(169,'Монтсератт'),(170,'Мьянма'),(171,'Намибия'),(172,'Науру'),(173,'Непал'),(174,'Нигер'),(175,'Нигерия'),(176,'Нидерландские Антильские острова'),(177,'Нидерланды'),(178,'Никарагуа'),(179,'Ниуэ'),(180,'Новая Зеландия'),(181,'Новая Каледония'),(182,'Норвегия'),(183,'Объединенные Арабские Эмираты'),(184,'Оман'),(185,'Остров Буве'),(186,'Остров Клиппертон'),(187,'Остров Мэн'),(188,'Остров Навасса'),(189,'Остров Норфолк'),(190,'Остров Рождества'),(191,'Остров Святой Елены, Остров Вознесения, и Тристан-да-Кунья'),(192,'Остров Уэйк'),(193,'Пакистан'),(194,'Палау'),(195,'Панама'),(196,'Папуа - Новая Гвинея'),(197,'Парагвай'),(198,'Перу'),(199,'Польша'),(200,'Португалия'),(201,'Пуэрто-Рико'),(202,'Республика Конго'),(203,'Реюньон'),(204,'Россия'),(205,'Руанда'),(206,'Румыния'),(207,'Самоа'),(208,'Сан-Марино'),(209,'Сан-Томе и Принсипи'),(210,'Саудовская Аравия'),(211,'Свазиленд'),(212,'Северная Корея'),(213,'Северные Марианские острова'),(214,'Сейшельские Острова'),(215,'Сен-Бартелеми'),(216,'Сен-Мартен'),(217,'Сенегал'),(218,'Сент-Люсия'),(219,'Сербия'),(220,'Сингапур'),(221,'Синт-Мартен'),(222,'Сирия'),(223,'Словакия'),(224,'Словения'),(225,'Соединенные Штаты Америки'),(226,'Соломоновы Острова'),(227,'Сомали'),(228,'Судан'),(229,'Суринам'),(230,'Сьерра-Леоне'),(231,'Таджикистан'),(232,'Таиланд'),(233,'Тайвань'),(234,'Танзания'),(235,'Того'),(236,'Токелау'),(237,'Тонга'),(238,'Тринидад и Тобаго'),(239,'Тувалу'),(240,'Тунис'),(241,'Туркменистан'),(242,'Турция'),(243,'Уганда'),(244,'Узбекистан'),(245,'Украина'),(246,'Уоллис и Футуна'),(247,'Уругвай'),(248,'Фарерские острова'),(249,'Фиджи'),(250,'Филиппины'),(251,'Финляндия'),(252,'Фолклендские острова'),(253,'Франция'),(254,'Французская Гвиана'),(255,'Французская Полинезия'),(256,'Хорватия'),(257,'Центральноафриканская Республика'),(258,'Чад'),(259,'Черногория'),(260,'Чехия'),(261,'Чили'),(262,'Швейцария'),(263,'Швеция'),(264,'Шпицберген'),(265,'Шри-Ланка'),(266,'Эквадор'),(267,'Экваториальная Гвинея'),(268,'Эль-Сальвадор'),(269,'Эритрея'),(270,'Эстония'),(271,'Эфиопия'),(272,'Южная Африка'),(273,'Южная Корея'),(274,'Южный Судан'),(275,'Ямайка'),(276,'Ян-Майен'),(277,'Япония');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` char(3) NOT NULL COMMENT 'ISO 4217 code',
  `rate` decimal(13,4) NOT NULL COMMENT 'US Dollar rate',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (6,'Доллар','USD',28.5000),(104,'Гривна','UAH',1.0000),(107,'Доллар','USD',28.5000),(108,'Гривна','UAH',1.0000);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `tax_rate` double(10,2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `firm` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `company_email` varchar(32) DEFAULT NULL,
  `chief_email` varchar(32) DEFAULT NULL,
  `company_phone` varchar(32) DEFAULT NULL,
  `chief_phone` varchar(32) DEFAULT NULL,
  `site_company` varchar(32) DEFAULT NULL,
  `description` text,
  `is_company` tinyint(1) DEFAULT NULL,
  `viber` char(255) DEFAULT NULL,
  `telegram` char(255) DEFAULT NULL,
  `skype` char(255) DEFAULT NULL,
  `whatsapp` char(255) DEFAULT NULL,
  `customer_source_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer-country_id_fk` (`country_id`),
  KEY `coustomer_source_idfk1` (`customer_source_id`),
  CONSTRAINT `coustomer_source_idfk1` FOREIGN KEY (`customer_source_id`) REFERENCES `customer_source` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (143,245,1.00,'Анна Альфа-плюс','Алфа плюс','Киев','252342@gmail.com','252342@gmail.com','','0660443958','','',0,'','','','',1),(144,245,2.00,'Роман','-','Харьков, Сумская 51','','send1message1@gmail.com','','0508899654','',NULL,0,NULL,NULL,NULL,NULL,NULL),(145,245,NULL,'Алина (Магнит)','Магнит','Харьков ','','','','05765165615','',NULL,1,NULL,NULL,NULL,NULL,NULL),(146,245,NULL,'Кирилл Владимирович (Эксперт солюшнс)','Expert solutions','Киев','','','','','',NULL,0,NULL,NULL,NULL,NULL,NULL),(164,NULL,NULL,'Дмитрий',NULL,NULL,NULL,'test@test.test',NULL,NULL,NULL,'<p>qasdrftg</p>',NULL,NULL,NULL,NULL,NULL,NULL),(165,NULL,NULL,'Дмитрий',NULL,NULL,NULL,'test@test.test',NULL,NULL,NULL,'<p>qasdrftg</p>',NULL,NULL,NULL,NULL,NULL,NULL),(166,NULL,NULL,'Дмитрий',NULL,NULL,NULL,'test@test.test',NULL,NULL,NULL,'<p>qasdrftg</p>',NULL,NULL,NULL,NULL,NULL,NULL),(174,245,1.00,'Анна Альфа-плюс','Алфа плюс','Киев','252342@gmail.com','252342@gmail.com','','0660443958','','',0,'','','','',1),(175,245,2.00,'Роман','-','Харьков, Сумская 51','','send1message1@gmail.com','','0508899654','',NULL,0,NULL,NULL,NULL,NULL,NULL),(176,245,NULL,'Алина (Магнит)','Магнит','Харьков ','','','','05765165615','',NULL,1,NULL,NULL,NULL,NULL,NULL),(177,245,NULL,'Кирилл Владимирович (Эксперт солюшнс)','Expert solutions','Киев','','','','','',NULL,0,NULL,NULL,NULL,NULL,NULL),(178,NULL,NULL,'Дмитрий',NULL,NULL,NULL,'test@test.test',NULL,NULL,NULL,'<p>qasdrftg</p>',NULL,NULL,NULL,NULL,NULL,NULL),(179,NULL,NULL,'Дмитрий',NULL,NULL,NULL,'test@test.test',NULL,NULL,NULL,'<p>qasdrftg</p>',NULL,NULL,NULL,NULL,NULL,NULL),(180,NULL,NULL,'Дмитрий',NULL,NULL,NULL,'test@test.test',NULL,NULL,NULL,'<p>qasdrftg</p>',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_source`
--

DROP TABLE IF EXISTS `customer_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_source`
--

LOCK TABLES `customer_source` WRITE;
/*!40000 ALTER TABLE `customer_source` DISABLE KEYS */;
INSERT INTO `customer_source` VALUES (1,'instagram ',1,'Description'),(3,'instagram ',1,'Description');
/*!40000 ALTER TABLE `customer_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `event_type_id` int(11) DEFAULT NULL COMMENT 'Тип',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `text` varchar(255) NOT NULL COMMENT 'Текст',
  `status` int(11) DEFAULT NULL COMMENT 'Статус',
  `date_from` date NOT NULL COMMENT 'Начало',
  `date_to` date NOT NULL COMMENT 'Конец',
  `start_time` time NOT NULL COMMENT 'Время',
  `end_time` time NOT NULL,
  `selling_id` int(11) DEFAULT NULL,
  `hash_for_event` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_type_id` (`event_type_id`),
  KEY `selling_id_idfk1` (`selling_id`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `selling_id_idfk1` FOREIGN KEY (`selling_id`) REFERENCES `selling` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,NULL,'Тестовое событие 1','Описание очень важного события, которое забудется, если не хранить его в системе.',1,'2018-11-30','2018-11-30','10:06:09','00:00:00',NULL,NULL),(2,NULL,'Тестовое событие 1','Тестовое событие 1',1,'2018-12-01','2018-12-01','09:06:09','00:00:00',NULL,NULL),(6,NULL,'Тестовое событие 2 ','Тестовое событие 2 ',1,'2019-01-21','2019-01-21','11:30:07','00:00:00',NULL,NULL),(7,NULL,'Тестовое событие 3','Тестовое событие 3',1,'2019-01-20','2019-01-20','07:00:07','00:00:00',NULL,NULL),(9,NULL,'Тестовое событие 5','Тестовое событие 5',1,'2019-01-21','2019-01-21','02:20:00','00:00:00',NULL,NULL),(10,NULL,'Тестовое событие 6','Тестовое событие 6',1,'2019-01-14','2019-01-14','12:50:00','00:00:00',NULL,NULL),(11,NULL,'Тестовое событие 7','Тестовое событие 7',1,'2019-01-12','2019-01-12','01:20:00','00:00:00',NULL,NULL),(12,NULL,'Презентация телефонов самсунг','Презентация телефонов самсунг',1,'2021-01-10','2021-01-10','12:00:00','03:30:00',NULL,NULL),(13,NULL,'Презентация телефонов IPhone','Презентация телефонов IPhone',1,'2021-01-11','2021-01-11','11:30:00','04:00:00',NULL,NULL),(14,NULL,'Утреннее собрание','',NULL,'2021-01-16','2021-01-16','10:00:00','11:00:00',NULL,NULL),(15,NULL,'Встреча с клиентом ','Встреча с клиентом ',1,'2021-01-16','2021-01-16','11:00:00','12:00:00',NULL,NULL),(16,NULL,'Утреннее собрание','',NULL,'2021-01-11','2021-01-11','10:30:00','11:00:00',NULL,NULL),(17,NULL,'Презентация телефонов самсунг','',NULL,'2021-01-11','2021-01-12','01:00:00','02:00:00',NULL,NULL),(18,NULL,'Утреннее собрание','Утреннее собрание',1,'2021-01-18','2021-01-18','10:00:00','11:00:00',NULL,NULL),(19,NULL,'Созвон по закупкам','Созвон по закупкам',1,'2021-01-24','2021-01-24','05:00:00','06:00:00',NULL,NULL),(20,NULL,'Планирование ремонта','<p>Планирование ремонта</p>',1,'2021-01-16','2021-01-18','12:00:00','12:00:00',NULL,NULL),(21,NULL,'Закупки товара','Закупки товара',1,'2021-01-24','2021-01-25','12:00:00','12:00:00',NULL,NULL),(22,NULL,'Утреннее собрание','',NULL,'2021-01-02','2021-01-02','11:00:00','12:00:00',NULL,NULL),(23,NULL,'Утреннее собрание','',NULL,'2021-01-03','2021-01-03','10:00:00','11:00:00',NULL,NULL),(24,NULL,'Утреннее собрание','',NULL,'2021-01-04','2021-01-04','11:00:00','12:00:00',NULL,NULL),(25,NULL,'Корпоратив','Корпоратив',1,'2021-01-25','2021-01-25','12:00:00','06:00:00',NULL,NULL),(26,NULL,'Утреннее собрание','',NULL,'2021-01-07','2021-01-07','10:00:00','11:00:00',NULL,NULL),(27,NULL,'Утреннее собрание','',NULL,'2021-01-08','2021-01-08','10:00:00','11:00:00',NULL,NULL),(28,NULL,'Утреннее собрание','',NULL,'2021-01-09','2021-01-09','10:00:00','11:00:00',NULL,NULL),(29,NULL,'Утреннее собрание','',NULL,'2021-01-14','2021-01-14','10:00:00','11:00:00',NULL,NULL),(30,NULL,'Утреннее собрание','',NULL,'2021-01-15','2021-01-15','10:00:00','11:00:00',NULL,NULL),(31,NULL,'Утреннее собрание','',NULL,'2021-01-17','2021-01-17','11:00:00','12:00:00',NULL,NULL),(32,NULL,'Утреннее собрание','',NULL,'2021-01-21','2021-01-21','10:00:00','11:00:00',NULL,NULL),(33,NULL,'Утреннее собрание','',NULL,'2021-01-22','2021-01-22','10:00:00','11:00:00',NULL,NULL),(34,NULL,'Утреннее собрание','',NULL,'2021-01-23','2021-01-24','00:00:00','00:00:00',NULL,NULL),(35,NULL,'Инвентаризация','',NULL,'2021-01-28','2021-01-29','00:00:00','00:00:00',NULL,NULL),(36,NULL,'День рождение сотрудника','',NULL,'2021-01-08','2021-01-09','00:00:00','00:00:00',NULL,NULL),(37,NULL,'дела выходного дня','',NULL,'2021-01-20','2021-01-21','00:00:00','00:00:00',NULL,NULL),(38,NULL,'дела выходного дня','',NULL,'2021-01-27','2021-01-28','00:00:00','00:00:00',NULL,NULL),(39,NULL,' Событие','',1,'2021-01-05','2021-01-06','00:00:00','00:00:00',NULL,NULL),(75,NULL,'Тестовое событие 1','Описание очень важного события, которое забудется, если не хранить его в системе.',1,'2018-11-30','2018-11-30','10:06:09','00:00:00',NULL,NULL),(76,NULL,'Тестовое событие 1','Тестовое событие 1',1,'2018-12-01','2018-12-01','09:06:09','00:00:00',NULL,NULL),(77,NULL,'Тестовое событие 2 ','Тестовое событие 2 ',1,'2019-01-21','2019-01-21','11:30:07','00:00:00',NULL,NULL),(78,NULL,'Тестовое событие 3','Тестовое событие 3',1,'2019-01-20','2019-01-20','07:00:07','00:00:00',NULL,NULL),(79,NULL,'Тестовое событие 5','Тестовое событие 5',1,'2019-01-21','2019-01-21','02:20:00','00:00:00',NULL,NULL),(80,NULL,'Тестовое событие 6','Тестовое событие 6',1,'2019-01-14','2019-01-14','12:50:00','00:00:00',NULL,NULL),(81,NULL,'Тестовое событие 7','Тестовое событие 7',1,'2019-01-12','2019-01-12','01:20:00','00:00:00',NULL,NULL),(82,NULL,'Презентация телефонов самсунг','Презентация телефонов самсунг',1,'2021-01-10','2021-01-10','12:00:00','03:30:00',NULL,NULL),(83,NULL,'Презентация телефонов IPhone','Презентация телефонов IPhone',1,'2021-01-11','2021-01-11','11:30:00','04:00:00',NULL,NULL),(84,NULL,'Утреннее собрание','',NULL,'2021-01-16','2021-01-16','10:00:00','11:00:00',NULL,NULL),(85,NULL,'Встреча с клиентом ','Встреча с клиентом ',1,'2021-01-16','2021-01-16','11:00:00','12:00:00',NULL,NULL),(86,NULL,'Утреннее собрание','',NULL,'2021-01-11','2021-01-11','10:30:00','11:00:00',NULL,NULL),(87,NULL,'Презентация телефонов самсунг','',NULL,'2021-01-11','2021-01-12','01:00:00','02:00:00',NULL,NULL),(88,NULL,'Утреннее собрание','Утреннее собрание',1,'2021-01-18','2021-01-18','10:00:00','11:00:00',NULL,NULL),(89,NULL,'Созвон по закупкам','Созвон по закупкам',1,'2021-01-24','2021-01-24','05:00:00','06:00:00',NULL,NULL),(90,NULL,'Планирование ремонта','<p>Планирование ремонта</p>',1,'2021-01-16','2021-01-18','12:00:00','12:00:00',NULL,NULL),(91,NULL,'Закупки товара','Закупки товара',1,'2021-01-24','2021-01-25','12:00:00','12:00:00',NULL,NULL),(92,NULL,'Утреннее собрание','',NULL,'2021-01-02','2021-01-02','11:00:00','12:00:00',NULL,NULL),(93,NULL,'Утреннее собрание','',NULL,'2021-01-03','2021-01-03','10:00:00','11:00:00',NULL,NULL),(94,NULL,'Утреннее собрание','',NULL,'2021-01-04','2021-01-04','11:00:00','12:00:00',NULL,NULL),(95,NULL,'Корпоратив','Корпоратив',1,'2021-01-25','2021-01-25','12:00:00','06:00:00',NULL,NULL),(96,NULL,'Утреннее собрание','',NULL,'2021-01-07','2021-01-07','10:00:00','11:00:00',NULL,NULL),(97,NULL,'Утреннее собрание','',NULL,'2021-01-08','2021-01-08','10:00:00','11:00:00',NULL,NULL),(98,NULL,'Утреннее собрание','',NULL,'2021-01-09','2021-01-09','10:00:00','11:00:00',NULL,NULL),(99,NULL,'Утреннее собрание','',NULL,'2021-01-14','2021-01-14','10:00:00','11:00:00',NULL,NULL),(100,NULL,'Утреннее собрание','',NULL,'2021-01-15','2021-01-15','10:00:00','11:00:00',NULL,NULL),(101,NULL,'Утреннее собрание','',NULL,'2021-01-17','2021-01-17','11:00:00','12:00:00',NULL,NULL),(102,NULL,'Утреннее собрание','',NULL,'2021-01-21','2021-01-21','10:00:00','11:00:00',NULL,NULL),(103,NULL,'Утреннее собрание','',NULL,'2021-01-22','2021-01-22','10:00:00','11:00:00',NULL,NULL),(104,NULL,'Утреннее собрание','',NULL,'2021-01-23','2021-01-24','00:00:00','00:00:00',NULL,NULL),(105,NULL,'Инвентаризация','',NULL,'2021-01-28','2021-01-29','00:00:00','00:00:00',NULL,NULL),(106,NULL,'День рождение сотрудника','',NULL,'2021-01-08','2021-01-09','00:00:00','00:00:00',NULL,NULL),(107,NULL,'дела выходного дня','',NULL,'2021-01-20','2021-01-21','00:00:00','00:00:00',NULL,NULL),(108,NULL,'дела выходного дня','',NULL,'2021-01-27','2021-01-28','00:00:00','00:00:00',NULL,NULL),(109,NULL,' Событие','',1,'2021-01-05','2021-01-06','00:00:00','00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `name` int(11) NOT NULL COMMENT 'Имя',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Статус',
  `color` varchar(20) NOT NULL DEFAULT '#CCC' COMMENT 'Цвет',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_type`
--

LOCK TABLES `event_type` WRITE;
/*!40000 ALTER TABLE `event_type` DISABLE KEYS */;
INSERT INTO `event_type` VALUES (1,0,0,'');
/*!40000 ALTER TABLE `event_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field`
--

DROP TABLE IF EXISTS `field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `widget` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `defaulted` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `field_ibfk_1` (`category_id`),
  CONSTRAINT `field_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=430 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (334,190,'widgetDropDownList','Диагональ экрана',NULL),(335,190,'widgetSwitchInput','Готов к отправке',''),(336,190,'widgetMultiSelect','Цвет',NULL),(337,190,'widgetNumberControl','Количество сим карт','2'),(338,190,'widgetTextInput','Оператичная память','2 ГБ'),(339,190,'widgetTextInput','Встроенная память','32 ГБ'),(340,190,'widgetDropDownList','Операционная система',NULL),(341,190,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(342,190,'widgetTypeahead','Датчики',NULL),(343,193,'widgetDropDownList','Тип трубки',NULL),(344,193,'widgetSwitchInput','Автоматический определитель номера (АОН)','1'),(345,193,'widgetMultiSelect','Источник питания',NULL),(358,198,'widgetDropDownList','Диагональ экрана',NULL),(359,198,'widgetSwitchInput','Готов к отправке',''),(360,198,'widgetMultiSelect','Цвет',NULL),(361,198,'widgetNumberControl','Количество сим карт','2'),(362,198,'widgetTextInput','Оператичная память','2 ГБ'),(363,198,'widgetTextInput','Встроенная память','32 ГБ'),(364,198,'widgetDropDownList','Операционная система',NULL),(365,198,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(366,198,'widgetTypeahead','Датчики',NULL),(367,201,'widgetDropDownList','Тип трубки',NULL),(368,201,'widgetSwitchInput','Автоматический определитель номера (АОН)','1'),(369,201,'widgetMultiSelect','Источник питания',NULL),(370,202,'widgetDropDownList','Диагональ экрана',NULL),(371,202,'widgetSwitchInput','Готов к отправке',''),(372,202,'widgetMultiSelect','Цвет',NULL),(373,202,'widgetNumberControl','Количество сим карт','2'),(374,202,'widgetTextInput','Оператичная память','2 ГБ'),(375,202,'widgetTextInput','Встроенная память','32 ГБ'),(376,202,'widgetDropDownList','Операционная система',NULL),(377,202,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(378,202,'widgetTypeahead','Датчики',NULL),(379,205,'widgetDropDownList','Тип трубки',NULL),(380,205,'widgetSwitchInput','Автоматический определитель номера (АОН)','1'),(381,205,'widgetMultiSelect','Источник питания',NULL),(382,206,'widgetDropDownList','Диагональ экрана',NULL),(383,206,'widgetSwitchInput','Готов к отправке',''),(384,206,'widgetMultiSelect','Цвет',NULL),(385,206,'widgetNumberControl','Количество сим карт','2'),(386,206,'widgetTextInput','Оператичная память','2 ГБ'),(387,206,'widgetTextInput','Встроенная память','32 ГБ'),(388,206,'widgetDropDownList','Операционная система',NULL),(389,206,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(390,206,'widgetTypeahead','Датчики',NULL),(391,209,'widgetDropDownList','Тип трубки',NULL),(392,209,'widgetSwitchInput','Автоматический определитель номера (АОН)','1'),(393,209,'widgetMultiSelect','Источник питания',NULL),(394,210,'widgetDropDownList','Диагональ экрана',NULL),(395,210,'widgetSwitchInput','Готов к отправке',''),(396,210,'widgetMultiSelect','Цвет',NULL),(397,210,'widgetNumberControl','Количество сим карт','2'),(398,210,'widgetTextInput','Оператичная память','2 ГБ'),(399,210,'widgetTextInput','Встроенная память','32 ГБ'),(400,210,'widgetDropDownList','Операционная система',NULL),(401,210,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(402,210,'widgetTypeahead','Датчики',NULL),(403,213,'widgetDropDownList','Тип трубки',NULL),(404,213,'widgetSwitchInput','Автоматический определитель номера (АОН)','1'),(405,213,'widgetMultiSelect','Источник питания',NULL),(406,214,'widgetDropDownList','Диагональ экрана',NULL),(407,214,'widgetSwitchInput','Готов к отправке',''),(408,214,'widgetMultiSelect','Цвет',NULL),(409,214,'widgetNumberControl','Количество сим карт','2'),(410,214,'widgetTextInput','Оператичная память','2 ГБ'),(411,214,'widgetTextInput','Встроенная память','32 ГБ'),(412,214,'widgetDropDownList','Операционная система',NULL),(413,214,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(414,214,'widgetTypeahead','Датчики',NULL),(415,217,'widgetDropDownList','Тип трубки',NULL),(416,217,'widgetSwitchInput','Автоматический определитель номера (АОН)','1'),(417,217,'widgetMultiSelect','Источник питания',NULL),(418,198,'widgetDropDownList','Диагональ экрана',NULL),(419,198,'widgetSwitchInput','Готов к отправке',''),(420,198,'widgetMultiSelect','Цвет',NULL),(421,198,'widgetNumberControl','Количество сим карт','2'),(422,198,'widgetTextInput','Оператичная память','2 ГБ'),(423,198,'widgetTextInput','Встроенная память','32 ГБ'),(424,198,'widgetDropDownList','Операционная система',NULL),(425,198,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(426,198,'widgetTypeahead','Датчики',NULL),(427,201,'widgetDropDownList','Тип трубки',NULL),(428,201,'widgetSwitchInput','Автоматический определитель номера (АОН)','1'),(429,201,'widgetMultiSelect','Источник питания',NULL);
/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_product_value`
--

DROP TABLE IF EXISTS `field_product_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=929 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_product_value`
--

LOCK TABLES `field_product_value` WRITE;
/*!40000 ALTER TABLE `field_product_value` DISABLE KEYS */;
INSERT INTO `field_product_value` VALUES (89,334,246,'87'),(90,335,246,'1'),(91,336,246,'[\"94\"]'),(92,337,246,''),(93,338,246,'6 ГБ'),(94,339,246,'64 ГБ'),(95,340,246,'99'),(96,341,246,'0'),(97,342,246,'Датчик освещения'),(98,334,247,'89'),(99,335,247,'1'),(100,336,247,'[\"93\"]'),(101,337,247,'1'),(102,338,247,'2 ГБ'),(103,339,247,'64 ГБ'),(104,340,247,'99'),(105,341,247,'1'),(106,342,247,'Датчик освещения'),(107,334,251,''),(108,335,251,'0'),(109,336,251,'[\"93\",\"95\"]'),(110,337,251,'2'),(111,338,251,'35 гб'),(112,339,251,''),(113,340,251,'99'),(114,341,251,'0'),(115,342,251,''),(116,334,255,''),(117,335,255,'0'),(118,336,255,'[\"95\",\"96\"]'),(119,337,255,'1'),(120,338,255,'200 МБ'),(121,339,255,'1 ГБ'),(122,340,255,''),(123,341,255,'0'),(124,342,255,''),(125,334,250,'89'),(126,335,250,'1'),(127,336,250,'[\"92\"]'),(128,337,250,'2'),(129,338,250,''),(130,339,250,'128 ГБ'),(131,340,250,'100'),(132,341,250,'1'),(133,342,250,'Датчик освещения'),(134,334,248,'86'),(135,335,248,'0'),(136,336,248,'[\"96\"]'),(137,337,248,'1'),(138,338,248,'6 ГБ'),(139,339,248,'64 ГБ'),(140,340,248,'99'),(141,341,248,'0'),(142,342,248,'Датчик освещения'),(143,334,249,'89'),(144,335,249,'0'),(145,336,249,'[\"95\",\"97\"]'),(146,337,249,'2'),(147,338,249,'6 ГБ'),(148,339,249,'128 ГБ'),(149,340,249,'99'),(150,341,249,'1'),(151,342,249,'Датчик освещения'),(152,334,252,'88'),(153,335,252,'1'),(154,336,252,'[\"94\"]'),(155,337,252,'1'),(156,338,252,'6 ГБ'),(157,339,252,'64 ГБ'),(158,340,252,'99'),(159,341,252,'0'),(160,342,252,''),(161,334,254,'91'),(162,335,254,'0'),(163,336,254,'[\"92\"]'),(164,337,254,'1'),(165,338,254,'200 МБ'),(166,339,254,'1 ГБ'),(167,340,254,''),(168,341,254,'0'),(169,342,254,''),(170,334,253,'91'),(171,335,253,'1'),(172,336,253,'[\"95\"]'),(173,337,253,'2'),(174,338,253,''),(175,339,253,'1 ГБ'),(176,340,253,''),(177,341,253,'0'),(178,342,253,''),(179,343,256,'104'),(180,344,256,'0'),(181,345,256,'[\"106\"]'),(182,343,257,'104'),(183,344,257,'1'),(184,345,257,'[\"106\"]'),(185,343,258,'105'),(186,344,258,'0'),(187,345,258,'[\"107\"]'),(188,343,259,'105'),(189,344,259,'0'),(190,345,259,'[\"107\"]'),(191,343,260,'105'),(192,344,260,'1'),(193,345,260,'[\"107\"]'),(299,358,276,'87'),(300,359,276,'1'),(301,360,276,'[\"94\"]'),(302,361,276,''),(303,362,276,'6 ГБ'),(304,363,276,'64 ГБ'),(305,364,276,'99'),(306,365,276,'0'),(307,366,276,'Датчик освещения'),(308,358,277,'89'),(309,359,277,'1'),(310,360,277,'[\"93\"]'),(311,361,277,'1'),(312,362,277,'2 ГБ'),(313,363,277,'64 ГБ'),(314,364,277,'99'),(315,365,277,'1'),(316,366,277,'Датчик освещения'),(317,358,281,''),(318,359,281,'0'),(319,360,281,'[\"93\",\"95\"]'),(320,361,281,'2'),(321,362,281,'35 гб'),(322,363,281,''),(323,364,281,'99'),(324,365,281,'0'),(325,366,281,''),(326,358,285,''),(327,359,285,'0'),(328,360,285,'[\"95\",\"96\"]'),(329,361,285,'1'),(330,362,285,'200 МБ'),(331,363,285,'1 ГБ'),(332,364,285,''),(333,365,285,'0'),(334,366,285,''),(335,358,280,'89'),(336,359,280,'1'),(337,360,280,'[\"92\"]'),(338,361,280,'2'),(339,362,280,''),(340,363,280,'128 ГБ'),(341,364,280,'100'),(342,365,280,'1'),(343,366,280,'Датчик освещения'),(344,358,278,'86'),(345,359,278,'0'),(346,360,278,'[\"96\"]'),(347,361,278,'1'),(348,362,278,'6 ГБ'),(349,363,278,'64 ГБ'),(350,364,278,'99'),(351,365,278,'0'),(352,366,278,'Датчик освещения'),(353,358,279,'89'),(354,359,279,'0'),(355,360,279,'[\"95\",\"97\"]'),(356,361,279,'2'),(357,362,279,'6 ГБ'),(358,363,279,'128 ГБ'),(359,364,279,'99'),(360,365,279,'1'),(361,366,279,'Датчик освещения'),(362,358,282,'88'),(363,359,282,'1'),(364,360,282,'[\"94\"]'),(365,361,282,'1'),(366,362,282,'6 ГБ'),(367,363,282,'64 ГБ'),(368,364,282,'99'),(369,365,282,'0'),(370,366,282,''),(371,358,284,'91'),(372,359,284,'0'),(373,360,284,'[\"92\"]'),(374,361,284,'1'),(375,362,284,'200 МБ'),(376,363,284,'1 ГБ'),(377,364,284,''),(378,365,284,'0'),(379,366,284,''),(380,358,283,'91'),(381,359,283,'1'),(382,360,283,'[\"95\"]'),(383,361,283,'2'),(384,362,283,''),(385,363,283,'1 ГБ'),(386,364,283,''),(387,365,283,'0'),(388,366,283,''),(389,367,286,'104'),(390,368,286,'0'),(391,369,286,'[\"106\"]'),(392,367,287,'104'),(393,368,287,'1'),(394,369,287,'[\"106\"]'),(395,367,288,'105'),(396,368,288,'0'),(397,369,288,'[\"107\"]'),(398,367,289,'105'),(399,368,289,'0'),(400,369,289,'[\"107\"]'),(401,367,290,'105'),(402,368,290,'1'),(403,369,290,'[\"107\"]'),(404,370,291,'156'),(405,371,291,'1'),(406,372,291,'[\"163\"]'),(407,373,291,''),(408,374,291,'6 ГБ'),(409,375,291,'64 ГБ'),(410,376,291,'168'),(411,377,291,'0'),(412,378,291,'Датчик освещения'),(413,370,292,'158'),(414,371,292,'1'),(415,372,292,'[\"162\"]'),(416,373,292,'1'),(417,374,292,'2 ГБ'),(418,375,292,'64 ГБ'),(419,376,292,'168'),(420,377,292,'1'),(421,378,292,'Датчик освещения'),(422,370,296,''),(423,371,296,'0'),(424,372,296,'[\"162\",\"164\"]'),(425,373,296,'2'),(426,374,296,'35 гб'),(427,375,296,''),(428,376,296,'168'),(429,377,296,'0'),(430,378,296,''),(431,370,300,''),(432,371,300,'0'),(433,372,300,'[\"164\",\"165\"]'),(434,373,300,'1'),(435,374,300,'200 МБ'),(436,375,300,'1 ГБ'),(437,376,300,''),(438,377,300,'0'),(439,378,300,''),(440,370,295,'158'),(441,371,295,'1'),(442,372,295,'[\"161\"]'),(443,373,295,'2'),(444,374,295,''),(445,375,295,'128 ГБ'),(446,376,295,'169'),(447,377,295,'1'),(448,378,295,'Датчик освещения'),(449,370,293,'155'),(450,371,293,'0'),(451,372,293,'[\"165\"]'),(452,373,293,'1'),(453,374,293,'6 ГБ'),(454,375,293,'64 ГБ'),(455,376,293,'168'),(456,377,293,'0'),(457,378,293,'Датчик освещения'),(458,370,294,'158'),(459,371,294,'0'),(460,372,294,'[\"164\",\"166\"]'),(461,373,294,'2'),(462,374,294,'6 ГБ'),(463,375,294,'128 ГБ'),(464,376,294,'168'),(465,377,294,'1'),(466,378,294,'Датчик освещения'),(467,370,297,'157'),(468,371,297,'1'),(469,372,297,'[\"163\"]'),(470,373,297,'1'),(471,374,297,'6 ГБ'),(472,375,297,'64 ГБ'),(473,376,297,'168'),(474,377,297,'0'),(475,378,297,''),(476,370,299,'160'),(477,371,299,'0'),(478,372,299,'[\"161\"]'),(479,373,299,'1'),(480,374,299,'200 МБ'),(481,375,299,'1 ГБ'),(482,376,299,''),(483,377,299,'0'),(484,378,299,''),(485,370,298,'160'),(486,371,298,'1'),(487,372,298,'[\"164\"]'),(488,373,298,'2'),(489,374,298,''),(490,375,298,'1 ГБ'),(491,376,298,''),(492,377,298,'0'),(493,378,298,''),(494,379,301,'173'),(495,380,301,'0'),(496,381,301,'[\"175\"]'),(497,379,302,'173'),(498,380,302,'1'),(499,381,302,'[\"175\"]'),(500,379,303,'174'),(501,380,303,'0'),(502,381,303,'[\"176\"]'),(503,379,304,'174'),(504,380,304,'0'),(505,381,304,'[\"176\"]'),(506,379,305,'174'),(507,380,305,'1'),(508,381,305,'[\"176\"]'),(509,382,306,'179'),(510,383,306,'1'),(511,384,306,'[\"186\"]'),(512,385,306,''),(513,386,306,'6 ГБ'),(514,387,306,'64 ГБ'),(515,388,306,'191'),(516,389,306,'0'),(517,390,306,'Датчик освещения'),(518,382,307,'181'),(519,383,307,'1'),(520,384,307,'[\"185\"]'),(521,385,307,'1'),(522,386,307,'2 ГБ'),(523,387,307,'64 ГБ'),(524,388,307,'191'),(525,389,307,'1'),(526,390,307,'Датчик освещения'),(527,382,311,''),(528,383,311,'0'),(529,384,311,'[\"185\",\"187\"]'),(530,385,311,'2'),(531,386,311,'35 гб'),(532,387,311,''),(533,388,311,'191'),(534,389,311,'0'),(535,390,311,''),(536,382,315,''),(537,383,315,'0'),(538,384,315,'[\"187\",\"188\"]'),(539,385,315,'1'),(540,386,315,'200 МБ'),(541,387,315,'1 ГБ'),(542,388,315,''),(543,389,315,'0'),(544,390,315,''),(545,382,310,'181'),(546,383,310,'1'),(547,384,310,'[\"184\"]'),(548,385,310,'2'),(549,386,310,''),(550,387,310,'128 ГБ'),(551,388,310,'192'),(552,389,310,'1'),(553,390,310,'Датчик освещения'),(554,382,308,'178'),(555,383,308,'0'),(556,384,308,'[\"188\"]'),(557,385,308,'1'),(558,386,308,'6 ГБ'),(559,387,308,'64 ГБ'),(560,388,308,'191'),(561,389,308,'0'),(562,390,308,'Датчик освещения'),(563,382,309,'181'),(564,383,309,'0'),(565,384,309,'[\"187\",\"189\"]'),(566,385,309,'2'),(567,386,309,'6 ГБ'),(568,387,309,'128 ГБ'),(569,388,309,'191'),(570,389,309,'1'),(571,390,309,'Датчик освещения'),(572,382,312,'180'),(573,383,312,'1'),(574,384,312,'[\"186\"]'),(575,385,312,'1'),(576,386,312,'6 ГБ'),(577,387,312,'64 ГБ'),(578,388,312,'191'),(579,389,312,'0'),(580,390,312,''),(581,382,314,'183'),(582,383,314,'0'),(583,384,314,'[\"184\"]'),(584,385,314,'1'),(585,386,314,'200 МБ'),(586,387,314,'1 ГБ'),(587,388,314,''),(588,389,314,'0'),(589,390,314,''),(590,382,313,'183'),(591,383,313,'1'),(592,384,313,'[\"187\"]'),(593,385,313,'2'),(594,386,313,''),(595,387,313,'1 ГБ'),(596,388,313,''),(597,389,313,'0'),(598,390,313,''),(599,391,316,'196'),(600,392,316,'0'),(601,393,316,'[\"198\"]'),(602,391,317,'196'),(603,392,317,'1'),(604,393,317,'[\"198\"]'),(605,391,318,'197'),(606,392,318,'0'),(607,393,318,'[\"199\"]'),(608,391,319,'197'),(609,392,319,'0'),(610,393,319,'[\"199\"]'),(611,391,320,'197'),(612,392,320,'1'),(613,393,320,'[\"199\"]'),(614,394,321,'202'),(615,395,321,'1'),(616,396,321,'[\"209\"]'),(617,397,321,''),(618,398,321,'6 ГБ'),(619,399,321,'64 ГБ'),(620,400,321,'214'),(621,401,321,'0'),(622,402,321,'Датчик освещения'),(623,394,322,'204'),(624,395,322,'1'),(625,396,322,'[\"208\"]'),(626,397,322,'1'),(627,398,322,'2 ГБ'),(628,399,322,'64 ГБ'),(629,400,322,'214'),(630,401,322,'1'),(631,402,322,'Датчик освещения'),(632,394,326,''),(633,395,326,'0'),(634,396,326,'[\"208\",\"210\"]'),(635,397,326,'2'),(636,398,326,'35 гб'),(637,399,326,''),(638,400,326,'214'),(639,401,326,'0'),(640,402,326,''),(641,394,330,''),(642,395,330,'0'),(643,396,330,'[\"210\",\"211\"]'),(644,397,330,'1'),(645,398,330,'200 МБ'),(646,399,330,'1 ГБ'),(647,400,330,''),(648,401,330,'0'),(649,402,330,''),(650,394,325,'204'),(651,395,325,'1'),(652,396,325,'[\"207\"]'),(653,397,325,'2'),(654,398,325,''),(655,399,325,'128 ГБ'),(656,400,325,'215'),(657,401,325,'1'),(658,402,325,'Датчик освещения'),(659,394,323,'201'),(660,395,323,'0'),(661,396,323,'[\"211\"]'),(662,397,323,'1'),(663,398,323,'6 ГБ'),(664,399,323,'64 ГБ'),(665,400,323,'214'),(666,401,323,'0'),(667,402,323,'Датчик освещения'),(668,394,324,'204'),(669,395,324,'0'),(670,396,324,'[\"210\",\"212\"]'),(671,397,324,'2'),(672,398,324,'6 ГБ'),(673,399,324,'128 ГБ'),(674,400,324,'214'),(675,401,324,'1'),(676,402,324,'Датчик освещения'),(677,394,327,'203'),(678,395,327,'1'),(679,396,327,'[\"209\"]'),(680,397,327,'1'),(681,398,327,'6 ГБ'),(682,399,327,'64 ГБ'),(683,400,327,'214'),(684,401,327,'0'),(685,402,327,''),(686,394,329,'206'),(687,395,329,'0'),(688,396,329,'[\"207\"]'),(689,397,329,'1'),(690,398,329,'200 МБ'),(691,399,329,'1 ГБ'),(692,400,329,''),(693,401,329,'0'),(694,402,329,''),(695,394,328,'206'),(696,395,328,'1'),(697,396,328,'[\"210\"]'),(698,397,328,'2'),(699,398,328,''),(700,399,328,'1 ГБ'),(701,400,328,''),(702,401,328,'0'),(703,402,328,''),(704,403,331,'219'),(705,404,331,'0'),(706,405,331,'[\"221\"]'),(707,403,332,'219'),(708,404,332,'1'),(709,405,332,'[\"221\"]'),(710,403,333,'220'),(711,404,333,'0'),(712,405,333,'[\"222\"]'),(713,403,334,'220'),(714,404,334,'0'),(715,405,334,'[\"222\"]'),(716,403,335,'220'),(717,404,335,'1'),(718,405,335,'[\"222\"]'),(719,406,336,'225'),(720,407,336,'1'),(721,408,336,'[\"232\"]'),(722,409,336,''),(723,410,336,'6 ГБ'),(724,411,336,'64 ГБ'),(725,412,336,'237'),(726,413,336,'0'),(727,414,336,'Датчик освещения'),(728,406,337,'227'),(729,407,337,'1'),(730,408,337,'[\"231\"]'),(731,409,337,'1'),(732,410,337,'2 ГБ'),(733,411,337,'64 ГБ'),(734,412,337,'237'),(735,413,337,'1'),(736,414,337,'Датчик освещения'),(737,406,341,''),(738,407,341,'0'),(739,408,341,'[\"231\",\"233\"]'),(740,409,341,'2'),(741,410,341,'35 гб'),(742,411,341,''),(743,412,341,'237'),(744,413,341,'0'),(745,414,341,''),(746,406,345,''),(747,407,345,'0'),(748,408,345,'[\"233\",\"234\"]'),(749,409,345,'1'),(750,410,345,'200 МБ'),(751,411,345,'1 ГБ'),(752,412,345,''),(753,413,345,'0'),(754,414,345,''),(755,406,340,'227'),(756,407,340,'1'),(757,408,340,'[\"230\"]'),(758,409,340,'2'),(759,410,340,''),(760,411,340,'128 ГБ'),(761,412,340,'238'),(762,413,340,'1'),(763,414,340,'Датчик освещения'),(764,406,338,'224'),(765,407,338,'0'),(766,408,338,'[\"234\"]'),(767,409,338,'1'),(768,410,338,'6 ГБ'),(769,411,338,'64 ГБ'),(770,412,338,'237'),(771,413,338,'0'),(772,414,338,'Датчик освещения'),(773,406,339,'227'),(774,407,339,'0'),(775,408,339,'[\"233\",\"235\"]'),(776,409,339,'2'),(777,410,339,'6 ГБ'),(778,411,339,'128 ГБ'),(779,412,339,'237'),(780,413,339,'1'),(781,414,339,'Датчик освещения'),(782,406,342,'226'),(783,407,342,'1'),(784,408,342,'[\"232\"]'),(785,409,342,'1'),(786,410,342,'6 ГБ'),(787,411,342,'64 ГБ'),(788,412,342,'237'),(789,413,342,'0'),(790,414,342,''),(791,406,344,'229'),(792,407,344,'0'),(793,408,344,'[\"230\"]'),(794,409,344,'1'),(795,410,344,'200 МБ'),(796,411,344,'1 ГБ'),(797,412,344,''),(798,413,344,'0'),(799,414,344,''),(800,406,343,'229'),(801,407,343,'1'),(802,408,343,'[\"233\"]'),(803,409,343,'2'),(804,410,343,''),(805,411,343,'1 ГБ'),(806,412,343,''),(807,413,343,'0'),(808,414,343,''),(809,415,346,'242'),(810,416,346,'0'),(811,417,346,'[\"244\"]'),(812,415,347,'242'),(813,416,347,'1'),(814,417,347,'[\"244\"]'),(815,415,348,'243'),(816,416,348,'0'),(817,417,348,'[\"245\"]'),(818,415,349,'243'),(819,416,349,'0'),(820,417,349,'[\"245\"]'),(821,415,350,'243'),(822,416,350,'1'),(823,417,350,'[\"245\"]'),(824,418,276,'248'),(825,419,276,'1'),(826,420,276,'[\"255\"]'),(827,421,276,''),(828,422,276,'6 ГБ'),(829,423,276,'64 ГБ'),(830,424,276,'260'),(831,425,276,'0'),(832,426,276,'Датчик освещения'),(833,418,277,'250'),(834,419,277,'1'),(835,420,277,'[\"254\"]'),(836,421,277,'1'),(837,422,277,'2 ГБ'),(838,423,277,'64 ГБ'),(839,424,277,'260'),(840,425,277,'1'),(841,426,277,'Датчик освещения'),(842,418,281,''),(843,419,281,'0'),(844,420,281,'[\"254\",\"256\"]'),(845,421,281,'2'),(846,422,281,'35 гб'),(847,423,281,''),(848,424,281,'260'),(849,425,281,'0'),(850,426,281,''),(851,418,285,''),(852,419,285,'0'),(853,420,285,'[\"256\",\"257\"]'),(854,421,285,'1'),(855,422,285,'200 МБ'),(856,423,285,'1 ГБ'),(857,424,285,''),(858,425,285,'0'),(859,426,285,''),(860,418,280,'250'),(861,419,280,'1'),(862,420,280,'[\"253\"]'),(863,421,280,'2'),(864,422,280,''),(865,423,280,'128 ГБ'),(866,424,280,'261'),(867,425,280,'1'),(868,426,280,'Датчик освещения'),(869,418,278,'247'),(870,419,278,'0'),(871,420,278,'[\"257\"]'),(872,421,278,'1'),(873,422,278,'6 ГБ'),(874,423,278,'64 ГБ'),(875,424,278,'260'),(876,425,278,'0'),(877,426,278,'Датчик освещения'),(878,418,279,'250'),(879,419,279,'0'),(880,420,279,'[\"256\",\"258\"]'),(881,421,279,'2'),(882,422,279,'6 ГБ'),(883,423,279,'128 ГБ'),(884,424,279,'260'),(885,425,279,'1'),(886,426,279,'Датчик освещения'),(887,418,282,'249'),(888,419,282,'1'),(889,420,282,'[\"255\"]'),(890,421,282,'1'),(891,422,282,'6 ГБ'),(892,423,282,'64 ГБ'),(893,424,282,'260'),(894,425,282,'0'),(895,426,282,''),(896,418,284,'252'),(897,419,284,'0'),(898,420,284,'[\"253\"]'),(899,421,284,'1'),(900,422,284,'200 МБ'),(901,423,284,'1 ГБ'),(902,424,284,''),(903,425,284,'0'),(904,426,284,''),(905,418,283,'252'),(906,419,283,'1'),(907,420,283,'[\"256\"]'),(908,421,283,'2'),(909,422,283,''),(910,423,283,'1 ГБ'),(911,424,283,''),(912,425,283,'0'),(913,426,283,''),(914,427,286,'265'),(915,428,286,'0'),(916,429,286,'[\"267\"]'),(917,427,287,'265'),(918,428,287,'1'),(919,429,287,'[\"267\"]'),(920,427,288,'266'),(921,428,288,'0'),(922,429,288,'[\"268\"]'),(923,427,289,'266'),(924,428,289,'0'),(925,429,289,'[\"268\"]'),(926,427,290,'266'),(927,428,290,'1'),(928,429,290,'[\"268\"]');
/*!40000 ALTER TABLE `field_product_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_value`
--

DROP TABLE IF EXISTS `field_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `field_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `is_main` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `field_value_ibfk_1` (`field_id`),
  CONSTRAINT `field_value_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_value`
--

LOCK TABLES `field_value` WRITE;
/*!40000 ALTER TABLE `field_value` DISABLE KEYS */;
INSERT INTO `field_value` VALUES (85,334,'4,1`` - 4,5``',0),(86,334,'4,6``- 5``',0),(87,334,'5,1`` - 5,5``',0),(88,334,'5,55`` - 6``',0),(89,334,'6`` - 6,49``',0),(90,334,'6,5`` и более',0),(91,334,'До 4``',0),(92,336,'Белый',0),(93,336,'Серый',0),(94,336,'Золотой',0),(95,336,'Черный',0),(96,336,'Красный',0),(97,336,'Голубой',0),(98,336,'Фиолетовый',0),(99,340,'Android',0),(100,340,'IOS',0),(101,340,'Windows',0),(102,342,'Акселерометр',0),(103,342,'Датчик освещения',1),(104,343,'беспроводная',0),(105,343,'проводная',0),(106,345,'аккумулятор',0),(107,345,'сеть',0),(131,358,'4,1`` - 4,5``',0),(132,358,'4,6``- 5``',0),(133,358,'5,1`` - 5,5``',0),(134,358,'5,55`` - 6``',0),(135,358,'6`` - 6,49``',0),(136,358,'6,5`` и более',0),(137,358,'До 4``',0),(138,360,'Белый',0),(139,360,'Серый',0),(140,360,'Золотой',0),(141,360,'Черный',0),(142,360,'Красный',0),(143,360,'Голубой',0),(144,360,'Фиолетовый',0),(145,364,'Android',0),(146,364,'IOS',0),(147,364,'Windows',0),(148,366,'Акселерометр',0),(149,366,'Датчик освещения',1),(150,367,'беспроводная',0),(151,367,'проводная',0),(152,369,'аккумулятор',0),(153,369,'сеть',0),(154,370,'4,1`` - 4,5``',0),(155,370,'4,6``- 5``',0),(156,370,'5,1`` - 5,5``',0),(157,370,'5,55`` - 6``',0),(158,370,'6`` - 6,49``',0),(159,370,'6,5`` и более',0),(160,370,'До 4``',0),(161,372,'Белый',0),(162,372,'Серый',0),(163,372,'Золотой',0),(164,372,'Черный',0),(165,372,'Красный',0),(166,372,'Голубой',0),(167,372,'Фиолетовый',0),(168,376,'Android',0),(169,376,'IOS',0),(170,376,'Windows',0),(171,378,'Акселерометр',0),(172,378,'Датчик освещения',1),(173,379,'беспроводная',0),(174,379,'проводная',0),(175,381,'аккумулятор',0),(176,381,'сеть',0),(177,382,'4,1`` - 4,5``',0),(178,382,'4,6``- 5``',0),(179,382,'5,1`` - 5,5``',0),(180,382,'5,55`` - 6``',0),(181,382,'6`` - 6,49``',0),(182,382,'6,5`` и более',0),(183,382,'До 4``',0),(184,384,'Белый',0),(185,384,'Серый',0),(186,384,'Золотой',0),(187,384,'Черный',0),(188,384,'Красный',0),(189,384,'Голубой',0),(190,384,'Фиолетовый',0),(191,388,'Android',0),(192,388,'IOS',0),(193,388,'Windows',0),(194,390,'Акселерометр',0),(195,390,'Датчик освещения',1),(196,391,'беспроводная',0),(197,391,'проводная',0),(198,393,'аккумулятор',0),(199,393,'сеть',0),(200,394,'4,1`` - 4,5``',0),(201,394,'4,6``- 5``',0),(202,394,'5,1`` - 5,5``',0),(203,394,'5,55`` - 6``',0),(204,394,'6`` - 6,49``',0),(205,394,'6,5`` и более',0),(206,394,'До 4``',0),(207,396,'Белый',0),(208,396,'Серый',0),(209,396,'Золотой',0),(210,396,'Черный',0),(211,396,'Красный',0),(212,396,'Голубой',0),(213,396,'Фиолетовый',0),(214,400,'Android',0),(215,400,'IOS',0),(216,400,'Windows',0),(217,402,'Акселерометр',0),(218,402,'Датчик освещения',1),(219,403,'беспроводная',0),(220,403,'проводная',0),(221,405,'аккумулятор',0),(222,405,'сеть',0),(223,406,'4,1`` - 4,5``',0),(224,406,'4,6``- 5``',0),(225,406,'5,1`` - 5,5``',0),(226,406,'5,55`` - 6``',0),(227,406,'6`` - 6,49``',0),(228,406,'6,5`` и более',0),(229,406,'До 4``',0),(230,408,'Белый',0),(231,408,'Серый',0),(232,408,'Золотой',0),(233,408,'Черный',0),(234,408,'Красный',0),(235,408,'Голубой',0),(236,408,'Фиолетовый',0),(237,412,'Android',0),(238,412,'IOS',0),(239,412,'Windows',0),(240,414,'Акселерометр',0),(241,414,'Датчик освещения',1),(242,415,'беспроводная',0),(243,415,'проводная',0),(244,417,'аккумулятор',0),(245,417,'сеть',0),(246,418,'4,1`` - 4,5``',0),(247,418,'4,6``- 5``',0),(248,418,'5,1`` - 5,5``',0),(249,418,'5,55`` - 6``',0),(250,418,'6`` - 6,49``',0),(251,418,'6,5`` и более',0),(252,418,'До 4``',0),(253,420,'Белый',0),(254,420,'Серый',0),(255,420,'Золотой',0),(256,420,'Черный',0),(257,420,'Красный',0),(258,420,'Голубой',0),(259,420,'Фиолетовый',0),(260,424,'Android',0),(261,424,'IOS',0),(262,424,'Windows',0),(263,426,'Акселерометр',0),(264,426,'Датчик освещения',1),(265,427,'беспроводная',0),(266,427,'проводная',0),(267,429,'аккумулятор',0),(268,429,'сеть',0);
/*!40000 ALTER TABLE `field_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interview`
--

DROP TABLE IF EXISTS `interview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_complete` datetime DEFAULT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  `dialog` text,
  `next_step` text,
  `state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `interview_worker_id_fk` (`worker_id`),
  KEY `interview_project_id_fk` (`project_id`),
  KEY `interview_vacancy_id_fk` (`vacancy_id`),
  KEY `fk_state_id-interview_state` (`state_id`),
  CONSTRAINT `fk_state_id-interview_state` FOREIGN KEY (`state_id`) REFERENCES `interview_state` (`id`) ON DELETE CASCADE,
  CONSTRAINT `interview_project_id_fk` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `interview_vacancy_id_fk` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE,
  CONSTRAINT `interview_worker_id_fk` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interview`
--

LOCK TABLES `interview` WRITE;
/*!40000 ALTER TABLE `interview` DISABLE KEYS */;
INSERT INTO `interview` VALUES (1,3,11,'-','2020-12-03 19:26:44',NULL,86,'03.12.2020 17:58:33<br/><p>Клиент: \n                        \n                        Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?                        \n                    </p><p>Менеджер: да</p><p>Клиент: \n                        \n                        Какой у вас опыт ?                        \n                    </p><p>Менеджер: богатый опыт (10+)</p><p>Клиент: \n                        \n                        вы уверены в своих силах?                        \n                    </p><p>Менеджер: да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">отличный разговор</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">созвониться</div>10.12.2020 12:40:44<br/><p>Клиент: \n                        \n                        Сколько стоит доставка ?                        \n                    </p><p>Менеджер: по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">ytnfytnfty</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ty fyttyn</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">ty fyttyn</div>',NULL),(2,1,11,'-','2020-12-03 19:34:26',NULL,87,NULL,NULL,NULL),(3,4,6,'-','2020-12-03 19:36:24',NULL,87,NULL,NULL,NULL),(19,2,11,'-','2020-12-10 14:00:53',NULL,89,NULL,NULL,NULL),(20,44,6,'-','2020-12-10 14:22:22',NULL,87,'11.12.2020 13:55:43<br/><p>Клиент: \n                        \n                        вы уверены в своих силах?                        \n                    </p><p>Менеджер: да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">kjnkjn</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">cktl csJ</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">cktl csJ</div>',NULL),(21,45,11,'-','2020-12-10 14:22:56',NULL,87,NULL,NULL,NULL),(22,46,11,'-','2020-12-10 14:25:43',NULL,87,NULL,NULL,NULL),(23,47,11,'-','2020-12-10 14:30:06',NULL,87,'10.12.2020 12:41:58<br/><p>Клиент: \n                        \n                        Какой у вас опыт ?                        \n                    </p><p>Менеджер: богатый опыт (10+)</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">отличный разговор</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">-</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">-</div>',NULL),(24,48,11,'-','2020-12-10 14:55:36',NULL,89,NULL,NULL,NULL),(25,49,11,'-','2020-12-10 14:56:16',NULL,89,NULL,NULL,NULL),(26,50,6,'-','2020-12-10 14:58:57',NULL,89,NULL,NULL,NULL);
/*!40000 ALTER TABLE `interview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interview_state`
--

DROP TABLE IF EXISTS `interview_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interview_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interview_state-user_id` (`user_id`),
  CONSTRAINT `fk_interview_state-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interview_state`
--

LOCK TABLES `interview_state` WRITE;
/*!40000 ALTER TABLE `interview_state` DISABLE KEYS */;
INSERT INTO `interview_state` VALUES (1,'NAim 1',1,1,''),(3,'NAim 1',1,9,'');
/*!40000 ALTER TABLE `interview_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorization`
--

DROP TABLE IF EXISTS `inventorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventorization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventorization_warehouse_id_fk` (`warehouse_id`),
  CONSTRAINT `inventorization_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorization`
--

LOCK TABLES `inventorization` WRITE;
/*!40000 ALTER TABLE `inventorization` DISABLE KEYS */;
INSERT INTO `inventorization` VALUES (1,101,'Новая инвентаризация с 10.12.2020 13:12:58','2020-12-10 13:15:20',1),(2,99,'Новая инвентаризация с 11.12.2020 16:13:27',NULL,0),(5,142,'Новая инвентаризация с 10.12.2020 13:12:58','2020-12-10 00:00:00',1),(6,140,'Новая инвентаризация с 11.12.2020 16:13:27',NULL,0),(7,139,'Новая инвентаризация с 11.11.2021 17:43:38',NULL,0);
/*!40000 ALTER TABLE `inventorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorization_product`
--

DROP TABLE IF EXISTS `inventorization_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorization_product`
--

LOCK TABLES `inventorization_product` WRITE;
/*!40000 ALTER TABLE `inventorization_product` DISABLE KEYS */;
INSERT INTO `inventorization_product` VALUES (1,253,1,20,20),(2,248,1,20,20),(3,249,1,15,14),(10,343,6,20,20),(11,338,6,20,20),(12,339,6,15,14),(13,283,5,20,20),(14,278,5,20,20),(15,279,5,15,14);
/*!40000 ALTER TABLE `inventorization_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `regularity_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `color` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `regularity_item_ibfk_1` (`regularity_id`),
  KEY `regularity_item_ibfk_2` (`parent_id`),
  CONSTRAINT `regularity_item_ibfk_1` FOREIGN KEY (`regularity_id`) REFERENCES `regularity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `regularity_item_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=549 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Форма',NULL,34,NULL,'weadfsehtgjhm','<p>У каждой компании есть <strong>своя</strong>, уникальная, неповторимая форма.</p><p>ФОРМА Вашей компании - это тысячи полезных функций для <strong>систематизации</strong> <strong>бизнеса, повышения</strong> показателей <strong>продаж</strong> и <strong>дисциплины</strong>. И конечно для <strong>подготовки</strong> малого бизнеса к <strong>росту</strong> и что главное - бесплатно. Бесплатно - потому, что нам выгоден рост Вашего бизнеса. Ведь для бизнеса, который в процессе роста, наша команда проектирует и программирует дорогие индивидуальные решения и предоставляет экспертные и консультационные услуги. </p><p>Здесь<strong> Вы научитесь эффективно управлять системой </strong>и менять её под свой бизнес. Это буквально не пустой текст - Вы сразу же будете<strong> на практике</strong> строить и управлять Вашей индивидуальной системой для бизнеса. И всё благодаря <strong>уникальным функциям </strong>ФОРМЫ. Раздел регламента - это <strong>инструмент управления компанией</strong> и внедрения в компанию<strong> систем автоматизации</strong>. Даже если у Вас 0 опыта - Вы постепенно сможете освоить все возможности. Может потребоваться несколько прочтений для качественного понимания всех функций данной системы.</p><p>Если у Вас есть опыт - Вы очень быстро разберетесь. В любом случае, мы постараемся Вам помочь. Вы можете написать нашей поддержке в любой момент, используя кнопку связи в правом нижнем углу. </p><p><img src=\"data:image/png;base64,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\" alt=\"\"></p><p>Итак, нас ждёт ознакомление с Регламентами ФОРМЫ, а значит и ознакомлением с основными функциями системы. Но в чем же тут практика - спросите Вы? Это очень похоже на теорию. Отвечу. Смотрите: Вы можете сразу же на практике использовать систему и применять её функции. Вживую. И доступно это благодаря специальным Кнопкам. Каждый Регламент состоит из разделов - конкретного текста, объясняющего возможности системы. Внутри разделов могут быть использованы специальные Кнопки, нажатие на которые позволяет посмотреть реальную функциональность системы в маленьком компактном окошке. Это удобно. Давайте попробуем! После нажатия на кнопку откроется окно. Вы можете полистать содержимое окна и закрыть его в правом верхнем углу нажмите на красный крестик Х.</p><p>{{/||НАЖМИ МЕНЯ}}<span class=\"redactor-invisible-space\"></span></p><p>Видели? Мы прямо из презентации можем смотреть на систему и даже пользоваться ею. В данном случае мы увидели панель с некоторыми показателями успешности компании. Каждый управленец настраивает данную панель по-своему. Пока забудем об этом на время и поговорим о том, как работать с системой FORMA.</p>','/regularity_images/airport-2373727_1920.jpg',1),(2,'Навигация',NULL,34,NULL,'','<p>Начнем с простого. Навигация в системе ФОРМА представлена в виде меню. Оно доступно в левой части системы. Это как оглавление в книге. Мы разбили <strong>функции, необходимые компании,</strong> по специальным категориям, совпадающим со стандартными <strong>отделами организации. </strong></p><p>Давайте посмотрим вот это окно: {{https://forma.ingello.com||СМОТРЕТЬ ОКНО}}</p><p>Видели разноцветное меню слева? Для удобства у каждого отдела компании есть <strong>свой цвет</strong>:.</p><p><strong>Зеленый - это отдел управления</strong>, это топ менеджмент, собственники, директора. Зачастую в малом бизнесе это один  человек. Тут происходит планирование и контроль выполнения. Нам доступны такие инструменты, как Календарь, Регламенты и Системные события. </p><p><strong>Оранжевый - это отдел учета.</strong> Тут всё связанное с каталогом Ваших Продуктов или Услуг а также с учетом операций, которые можно проводить над ними - например при хранении на складе это фильтр Остатков, Закупки, Перемещения, Инвентаризации и т.д. </p><p><strong>Синий - это отдел продаж.</strong> Тут Клиентская база и Воронка продаж, которая показывает, какие Клиенты на какой Стадии ваших взаимоотношений. Также тут можно настраивать Стратегии переговоров с Клиентами и автоматизировать Продажи с помощью интеграций.</p><p><strong>Красный - это отдел кадров</strong>. Всё про сотрудников. Тут регулируются процессы Найма, хранятся данные Кадров и расписываются Вакансии, необходимые для Проектов и задач Вашей компании. </p><p>Из чего же состоит меню? В следующем разделе мы поговорим в общих чертах о каждом из этих отделов, не сильно вдаваясь в детали, в ознакомительном режиме. Читайте <strong>Далее</strong>.</p><p>Кстати, если Вы прямо сейчас хотите прервать обучение и попасть в рабочую часть системы ФОРМА - Вы можете сделать это, нажав на оранжевую кнопку “К главной панели”. Не переживайте, Вы всегда сможете вернуться к обучению, мы будем ждать =) </p>','/regularity_images/sea-2710999_1920.jpg',1),(98,'Управление',NULL,34,NULL,'','<p>Данный раздел предназначен для менеджеров, директоров и управленцев. Независимо от количества людей в Вашем бизнесе (даже если это только Вы) - это удобный инструмент контроля, планирования и мониторинга деятельности Вашего бизнеса. Данный тип систем для управления называется АСУП - Автоматизированная система управления предприятием. Система ФОРМА максимально упрощает управление для малого бизнеса. А для проектирования сложных систем обратиться в компанию ingello (разработчик ФОРМЫ).</p><p>Позже мы детально ознакомимся с данным разделом, а сейчас можем посмотреть, как выглядит календарь. Жмите на кнопку, и возвращайтесь обратно, когда надоест (позже мы детально обсудим календарь). </p><p>{{/event||СМОТРЕТЬ КАЛЕНДАРЬ}}</p>','/regularity_images/paper-3213924_1280.jpg',1),(99,'Продукты',NULL,34,NULL,'','<p>Отдел Продуктов занимается оформлением Вашего торгового предложения. Бизнес строится на извлечении прибыли при продаже товара и\\или оказании услуги. Если у Вас всё просто и сложные функции Вам не нужны - Вы сможете просто описать свои предложения рынку, не потратив много времени. А если у Вас множество сложных товаров и услуг - отдел Продукта поможет Вам описать их во всех возможных формах и характеристиках, со всеми параметрами, атрибутами и опциями, а также распределить их по логическим категориям и подкатегориям в каталоге. Для продвинутых пользователей доступен конструктор, который позволит создавать сложные формы добавления продуктов в каталог. Он удобен для описания каталога продуктов или услуг. Об этом мы подробно поговорим в Регламенте Продуктов - в конце обзора отдела Продуктов. </p><p>Давайте продолжим разбираться, какие еще отделы есть в ФОРМЕ, а пока, если хотите, можете {{/product/product||ПОСМОТРЕТЬ СПИСОК ПРОДУКТОВ }} ?</p>','/regularity_images/ecommerce-3530785.jpg',1),(100,'Учет ресурсов',NULL,34,NULL,'','<p>Данный раздел поможет<strong> вести учет </strong>объектов в Вашей собственности. Это могут быть просто любые вещи. Например - столы, стулья, инструменты, компьютеры. Так-же это могут быть продукты, которые Вы продаёте. Более того: Вы сможете управлять целой сетью складов, производить операции <strong>закупок, транзитов и инвентаризации,</strong> учитывать <strong>накладные расходы, налоги</strong> и многое другое.</p><p>Системы такого класса называются <strong>WMR</strong> (Warehouse Management System - Система Управления Складом), а так-же имеются элементы систем типа <strong>ERP</strong> - (Enterprise Resource Planning - планирование ресурсов предприятия).</p><p>Помните, в прошлом разделе мы мельком увидели список Продуктов? А вот список наших Складов. Посмотрите их и увидите, на каком сколько продуктов находится сейчас.  {{/warehouse/warehouse||ПРОВЕРИТЬ СКЛАДЫ}}</p>','/regularity_images/ikea-2714998_1920.jpg',1),(101,'Продажи',NULL,34,NULL,'','<p>При проектировании системы ФОРМА, архитектор был убежден, что <strong>продажи</strong> - это самая важная часть любой бизнес-системы. Конечно же, всё работает в комплексе, и важны все отделы и их функции.</p><p> Но цель системы ФОРМА - это вывести бизнес <strong>на новый уровень</strong>, навести порядок в взаимоотношениях с клиентами. Все необходимые функции Вы найдёте тут. </p><p>Мы расскажем, как планировать <strong>переговоры</strong>, как <strong>обслуживать</strong> и опрашивать <strong>клиентов</strong>, как нарабатывать <strong>клиентскую базу</strong> и <strong>историю</strong> по каждому клиенту индивидуально, как разработать свою собственную <strong>стратегию</strong> <strong>продаж</strong> и <strong>автоматизировать</strong> их. </p><p>Системы такого типа называются популярным словом <strong>CRM</strong>  (Customer Relationship Management - <strong>Система управления взаимоотношениями с клиентами).</strong></p><p>Вот главная панель отдела Продаж. На ней виден прогресс по Продажам по клиентской базе.  {{/selling/default||ПОСМОТРЕТЬ ПАНЕЛЬ ПРОДАЖ}}<br></p>','/regularity_images/apples-1841132_1920.jpg',1),(102,'Кадры',NULL,34,NULL,'','<p>Даже если Вы пока один - вероятно, это не на долго. Для того, чтобы бизнес рос и распространяется, как франшиза, как вирус, - <strong>нужны кадры</strong>. Они, как говорится, “решают”. Позже мы поговорим как построить и <strong>систематизировать</strong> отдел кадров, как благодаря <strong>автоматизации</strong> избежать ненужной волокиты при <strong>найме</strong> и как перестать обучать кадровиков, а вместо этого сделать так, чтобы они обучали Вашу систему. </p><p>Отдел стоит на трёх китах - <strong>найм</strong>, <strong>вакансия</strong> и <strong>кадр</strong>. В прогрессивных областях конкуренция происходит не за клиентов, а за специалистов. И эту тенденцию важно не пропустить. </p><p>Системы такого класса называются <strong>HRM</strong> (Human Resource Management - <strong>Управление Человеко-Ресурсом</strong>).</p><p>Давайте посмотрим, как обстоят дела с распределением работы по сотрудникам  {{/hr||СМОТРЕТЬ ПАНЕЛЬ НАЙМА}}</p>','/regularity_images/basketball-108622_1920.jpg',1),(117,'Экспертные системы',NULL,34,NULL,'','<p>Данный класс систем предназначен для <strong>продвинутых</strong> компаний или предприятий, которые создаются на базе <strong>хорошего финансирования</strong> с целью <strong>скорейшего роста</strong>. Это не просто системы, <strong>это возможности</strong>. И в заключительной части мы познакомим Вас с возможностями ИТ компании ingello а также с её наработками. </p><p>Система ФОРМА - это <strong>бесплатный инструмент </strong>для компаний, который отлично подойдёт <strong>на ранних этапах развития</strong>, но планировать будущие разработки всегда лучше заранее и мы с удовольствием в этом поможем. </p><p>Поговорим о системах класса <strong>E-Commerce</strong> и <strong>Marketplace</strong> - для международной торговли, о системах <strong>PMS</strong> для управления проектами и командами, о системах <strong>HIS</strong> для медицинского обслуживания, об <strong>API</strong> системах и базах данных, про <strong>IOT</strong> - интернет вещей и умные дома, про большие данные и искусственный интеллект и даже про квантовую механику! </p><p>Спасибо, что изучаете регламент. Теперь перейдем к конкретной и формальной части.</p>','/regularity_images/person-731479_1920.jpg',1),(118,'Категории продуктов',NULL,153,NULL,'','<p>Всё начинается с того, что мы понимаем, какой сложный и разнообразный этот мир и как же сложно и многогранно всё то, чем нам интересно заниматься. Итак, если бы мы продавали телефоны, то сначала нам было бы удобно понимать, с какими Категориями Продуктов мы работаем.</p><p>Давайте посмотрим пример - какие мы придумали Категории для продажи телефонов. </p><p>{{/product/category||СМОТРЕТЬ КАТЕГОРИИ}}</p><p>Итак, Категории - это группа похожих по каким-то Характеристикам Продуктов. То есть для телефонов - это кнопки</p><p>Да, Вы наверняка уже обратили внимание на кнопку добавления новой Категории над таблицей. Давайте попробуем добавить свою Категорию. Например, Вы решили продавать самокаты (или то что Вы придумали). Но не каждый знает, насколько разными могут быть Продукты. Давайте создадим категорию под названием “Скоростные самокаты”. </p><p>{{/product/category/create||СОЗДАТЬ КАТЕГОРИЮ}} </p><p>Получилось? В следующем разделе мы добавим новый продукт.</p><p>Теперь Вы можете настроить данную категорию с помощью гибкого конструктора Характеристик. Но об этом мы поговорим позже, сейчас давайте добавим новый продукт.</p>','/regularity_images/library-5641389_1920.jpg',1),(119,'Добавлние продукта',NULL,153,NULL,'','<p>Давайте сразу к делу. Жмите на кнопку и пробуйте самостоятельно  {{/product/product/create||СОЗДАТЬ САМОКАТ}} .</p><p>А теперь давайте подробно разберемся - что же в этой форме. В левой части находится основная информация о Продукте. Тут единственное, что мы сейчас сделаем - это укажем имя. Давайте назовём его “Самокат самый быстрый”.</p><p>В правой части у нас выбор категории. Попробуйте выбрать разные категории и посмотреть, как меняется набор характеристик в зависимости от выбора. Выберите нашу категорию - “Скоростные самокаты”. Заметили, что на эту категорию характеристик нет? Конечно, мы же их пока не добавили. Но не страшно. Оставим пока всё, как есть и нажмем кнопку “Сохранить” в самом низу.  </p><p>Если у Вас много продуктов - конечно, это не обязательно добавлять их все руками, в будущем Вы сможете заказать доработку автоматического добавления и даже обновления каталога Продуктов - зависит от того, откуда эту информацию нужно взять - импортировать из excel файла поставщиков или программно скопировать из какого-то другого сайта. После того, как Вы добавили Продукт, Вы видите каталог всех Продуктов. О нём мы поговорим в следующем разделе. <br></p>','/regularity_images/container-4203677_1920.jpg',1),(120,'Каталог',NULL,153,NULL,'','<p>Каталог - это список Продуктов. Самая важная функция каталога - это искать продукты по определенным параметрам. Давайте еще раз посмотрим {{/product/product||СПИСОК ПРОДУКТОВ}}. Тут продуктов не много, но представьте, что Вы ведете учет тысяч продуктов. Как нам найти, к примеру, все определенные модели телефонов? </p><p>В таблице есть колонка “Наименование”. Под этой колонкой введите слово “Nokia” и нажмите Enter. Таким образом мы найдём все Продукты, в которых содержится данное слово. А чтобы отсортировать все записи по алфавиту - нажмите на надпись “Наименование”. </p><p>Попробуйте это на практике: {{/product/product||СПИСОК ПРОДУКТОВ}} </p><p>Таблицы такого типа называются ГРИД (grid). Это многофункциональные таблицы, в которых мы можем изменять и удалять записи, искать записи по нескольким параметрам, сортировать записи по возрастанию или убыванию (или по алфавиту) и производить импорт из (и экспорт данных в) электронные таблицы.</p><p>Если Вы выберете в каталоге категорию (выпадающий список в верху страницы) - то Вы сможете использовать специальные характеристики этой категории для поиска данных по этим характеристикам. Например, Вы можете найти все самокаты с характеристикой “скорость” равной 60км\\ч. </p><p>Выберите категорию в {{/product/product||КАТАЛОГЕ}} и потренируйтесь. </p><p>В следующем разделе мы будем говорить о самом сложном в Регламенте Продуктов - о конструкторе Характеристик. </p>','/regularity_images/color-5093046_1920.jpg',1),(121,'Хранилище',NULL,154,NULL,'','<p>Хранилище (Склад) - это некоторое пространство, в котором могут находиться Продукты, о которых нам известно из прошлых разделов. При том они там находятся в строго определенном количестве. И в этом разделе мы будем управлять Продуктами на Складах. Чтобы их добавить, нам понадобится операция Закупки. Если мы хотим перевезти Продукты со Склада на Склад - воспользуемся операцией Перемещение. Инвентаризация поможет нам осуществлять регулярные проверки Склада с реальным наличием Продукта. А про то, как осуществлять Продажи Продуктов со Склада - мы будем говорить в отдельном большом Регламенте!</p>\r\n<p>Перейдем к практике. Вот наш {{/warehouse/warehouse||СПИСОК ХРАНИЛИЩ}}. Нажмите на первый Склад. Внутри Склада Вы можете увидеть таблицу остатков на этом складе. Там видно, какой продукт в каком количестве содержится именно на этом складе. В дополнение можно видеть все даты, закупочную стоимость и другие дополнительные свойства.</p>\r\n<p>Вы можете  добавить новый склад, используя кнопку Создать хранилище в списке складов или же просто нажать на эту кнопку {{/warehouse/warehouse/create||СОЗДАНИЯ СКЛАДА}}. При создании Хранилища нужно всего-то дать ему название, адрес и выбрать страну. Попробуйте это сделать.</p>\r\n<p>После создания Хранилища Вы попадёте обратно - в список всех Складов. Нажмите на тот склад, который Вы только что создали. Тут пока пусто. В следующем разделе давайте попробуем Закупить Продукт (Товар,Услугу).</p>','/regularity_images/forklift-835340_1920.jpg',1),(122,'Поставки',NULL,154,NULL,'','<p>Поставки (они же - Закупки) - это способ пополнения запасов на Складе. На примере телефонов: мы продаём, но не производим телефоны. И для того, чтобы выставить их на свои витрины и добавить в свой каталог - нам нужно купить их, например, у завода-производителя.</p><p>Давайте сразу к практике. Посмотрим таблицу Поставок. Саму таблицу пока не будем изучать, просто нажмите на строку любой (например, первой) Поставки. Нажмите на первую строку этой таблицы: {{/purchase/main||ТАБЛИЦА ПОСТАВОК}}.</p>\r\n<p>Поставка - это операция. Это означает, что у неё есть несколько “состояний” (стадий, этапов, статусов - все называют по-разному). В системе ФОРМА есть еще несколько операций (например - Продажа, Найм сотрудника и т.д.). Мы стараемся по возможности организовывать похожий внешний вид всем похожим частям программы. Таким образом, почти любое действие в нашей системе будет выглядеть, как кнопка с текстом и иконкой. Любой список объектов в нашей системе стремиться выглядеть, как таблица с функциями поиска, сортировки, добавления и изменения пунктов. А любая операция будет похожа на то, что мы видим в форме Поставки. А что же мы в ней видим? Если кратко - есть основные данные - то есть у какого Поставщика покупаем, на какой Склад Закупаем (приходуем) и когда. А также в форме видно, какие именно Продукты мы Закупаем и сколько это будет стоить.</p>\r\n<p>Для того, чтобы изучить все эти возможности детально, давайте самостоятельно закупим тот Продукт, который мы с Вами ранее добавляли в Каталог. для этого можно нажать на кнопку “Заказать поставку” в {{/purchase/main||СПИСКЕ ПОСТАВОК}}. Или же просто нажать на {{/purchase/form/index||ЭТУ КНОПКУ}}.</p>\r\n<p>Итак, мы видим перед собой пустую форму Поставки. Так как в будущем нам предстоит работать с несколькими блоками данной формы - давайте поэтапно разберем их. </p>\r\n<p>Когда мы заказываем Поставку, сначала мы видим только один блок - “Укажите данные операции”. Это блок с основными данными Поставки. Выберите Склад, на котором есть интересующий Вас Продукт (например тот, который Вы добавили самостоятельно в прошлых разделах). Выберите Поставщика из списка справа или же добавьте нового, используя кнопку + слева от выпадающего списка. Поставщик - это тот, у кого Вы заказываете Продукт. Готово! Нажимайте “Сохранить”.</p>\r\n<p>После сохранения, открылось еще несколько блоков. </p>\r\n<p>Блок “Состояние” - очень интересный блок, в котором отображается, на каком этапе находится Поставка. Сейчас мы на этапе “Уточнение товарного состава”. Это означает, что нам нужно выбрать товар, который мы закупаем. </p><p>Блок состояний состоит по сути из двух вещей. 1. Список всех возможных состояний, где текущее отмечено отдельным цветом. 2. Список действий - состояний, в которые мы можем попасть из текущего. К примере сейчас мы уточняем товарный состав и из этого состояния мы можем перейти только в состояние оплаты. </p><p>Состояния гибко настраиваются под Ваш бизнес, об этом позже. </p>\r\n<p>Остальные состояния обсудим позже, теперь давайте посмотрим блок “Введите данные номенклатуры”. Он нужен для того, чтобы указать, какие товары мы закупаем и сколько. </p><p>Нажмите на поле ввода “Поиск в базе” в левой части блока. После нажатия отобразится список продуктов того склада, который Вы выбрали на старте. </p><p>Нажмите на тот продукт, который хотите закупить. Далее нужно указать его количество, стоимость и расходы на Поставку - налоги и накладные расходы. Налоги - это то, что нам нужно заплатить государству за то, что у нас есть дороги и прочие радости поселения. А НР (накладные расходы) - это, например, стоимость бензина, отгрузки и прочее. </p>\r\n<p>И тут важный момент. То, что мы добавляем к товару - это расходы конкретно на этот товар. Но есть отдельный блок “Накладные расходы”. В него мы можем добавлять общие расходы на всю Поставку. Всё, что мы добавим к накладным расходам - будет добавлены к общей сумме Поставки. </p>\r\n<p>Когда мы добавили все интересующие нас продукты (с помощью оранжевой кнопки +) мы можем видеть в самом последнем блоке под названием “Итоговые данные номенклатуры” итоговые суммы по этой Закупке.</p>\r\n<p>Теперь давайте переведем Закупку в следующую стадию - Оплата. Для этого в блоке “Состояния” нажмите кнопку “Перейти к оплате”. Сейчас, по идее, Вы должны рассчитываться со своим Поставщиком или оформлять предоплату. Далее, когда Поставщик подтвердил заказ - можете переводить закупку в состояние “Доставка”. И в этом состоянии у Вас 2 вариант - либо вернуться к оплате и выяснению, например, сколько товара было разбито по дороге, сколько товаров не соответствует заказу и т.д. </p><p>Либо же, если всё ок - Вы можете “Оприходовать” товар - это означает, что товар может теперь числиться на Складе. </p>\r\n<p>Давайте теперь найдем этот склад, на который Вы оприходовали - в {{/warehouse/warehouse||СПИСКЕ СКЛАДОВ}}. Если Ваш товар отображается на складе и его стало больше на то количество, в котором Вы его заказали - значит операция Закупки прошла успешно. Если нет - попробуйте еще раз, вероятно Вы что-то пропустили. Кстати, если обнаруживаете какие либо поломки или же у Вас появляются светлые идеи, как можно улучшить системы - пишите нам в чат, будем рады. </p>\r\n<p>Еще интересный и важный факт: когда товар находится в Поставке, но не оприходован - он всё равно отображается на складе, но его количество указано в колонке “Ожидается”. Это необходимо для того, чтобы, например, планировать продажи, учитывая всю картину товаров - как из наличия, так и тех, что еще не приехали на склад. <br></p>','/regularity_images/production-4408573_1920.jpg',1),(123,'Перемещение',NULL,154,NULL,'','<p>Представим - у Вас хотят закупить телефоны в Польше, а нужный товар есть только в Киеве. Нужно брать грузовик и везти товары в Польшу. Нам поможет операция “Перемещение” или “Транзит”. Это способ списать товар с одного склада и оприходовать на другом.  </p>\r\n<p>Да, Перемещение - это тоже операция. В прошлом разделе - “Закупка” - мы впервые столкнулись с операциями. Потому если Вы не проходили практику прошлого раздела - советуем ознакомиться, т.к. в этом разделе мы не будем повторно проговаривать, что такое, например, состояния и накладные расходы. </p>\r\n<p>Вот тут можно видеть все {{/transit/main||ОПЕРАЦИИ ПЕРЕМЕЩЕНИЯ.}}</p><p>Давайте создадим новую операцию. {{/transit/form/index||СОЗДАТЬ ПЕРЕМЕЩЕНИЕ}}.</p><p>Сначала укажите данные операции - откуда и куда. Выбираем склад, с которого мы перемещаем и склад, на который должен попасть товар. Можете дать название-комментарий к этому перемещению.  </p>\r\n<p>Теперь мы можем добавить товар, или же Ввести данные номенклатуры. Добавьте товар в соответствующем разделе а так же добавьте соответствующие накладные расходы на позиции и отдельно - на всю операцию перемещения. </p><p>Если у Вас появились вопросы в последних действиях - рекомендуем Вам перейти в предыдущий раздел, где мы тренировались работать с похожей операцией и разбирали всё в деталях.</p>\r\n<p>После того, как все товары и расходы указаны, мы можем оприходовать товар на тот склад, на который мы Перемещаем товар и он появится на том Складе. Можете сами проверить на новом складе: {{/warehouse/warehouse||СПИСОК СКЛАДОВ}}</p>','/regularity_images/truck-1030846_1920.jpg',1),(124,'Инвентаризация',NULL,154,NULL,'','<p>Как и все реальные объекты, Продукт (если это Товар, а не Услуга) скорее всего не лежит на месте. И периодически в месте хранения с ним происходят различные изменения. Он может качественно ухудшиться, сломаться, испортиться или его могут украсть и это критически важно учитывать, как в малом, так и крупном бизнесе. </p><p>Давайте создадим операцию инвентаризации. Нажмите кнопку \"Создать инвентаризацию\" и выберите склад на котором хотите ее провести.  {{/inventorization/main||СТРАНИЦА ИНВЕНТАРИЗАЦИЙ}}. </p>\r\n<p>После практики с Поставками и Перемещением, я думаю, Вы уже сами разобрались, что тут всё еще проще. Мы выбираем Склад, на котором будет проходить Инвентаризация, а потом в самом низу операции мы видим перечисление всех Товаров на складе и их количества. Всё что нам необходимо - это указать новое количество - фактическое. Напишите новое количество товара и в панели “Состояние” нажмите маленькую кнопку “Провести” (она маленькая, потому что её лучше нажимать обдуманно). После нажатия кнопки “Провести” на складе обновилась информация о товаре, а операция Инвентаризации добавилась в {{/inventorization/main||АРХИВ ИНВЕНТАРИЗАЦИЙ}}. </p>\r\n<p>Давайте и Склад проверим. Какой Склад Вы Инвентаризировали только что? {{/warehouse/warehouse||ВЫБРАТЬ СКЛАД}}  </p>','/regularity_images/tee-1252397_1920.jpg',1),(132,'Воронка кадров',NULL,156,NULL,'','<p>Есть такая штука, как воронка продаж, но хитрые руководители давно придумали как ее переиспользовать где это только возможно и поэтому представляем вашему вниманию {{/hr||ВОРОНКУ КАДРОВ}} =)</p><p>Данный инструмент наглядно показывает сколько людей у нас работает, сколько хочет чтоб их наняли, а сколько уже уволено. За это отвечают отдельные колонки в воронке. Если нажать на понравившийся столбик, то вы увидите таблицу со списком этих людей. </p><p>Идем дальше -&gt;</p>','/regularity_images/lechner-50119_1920.jpg',1),(133,'Вакансии',NULL,156,NULL,'','<p>Заглянем в закулисье бизнеса по продажам телефонов через интернет. И посмотрим на вакансии, которые были открыты за все время существования бизнеса. {{/vacancy/vacancy||СМОТРЕТЬ ВСЕ ВАКАНСИИ}}</p><p> Мы видим 4 вакансии, их заработную плату и описание. Давайте теперь разгрузим нашего директора и создадим вакансию “Менеджер по закупкам”. Нажмем кнопку “Создать вакансию” и заполним поля “Название”, “Описание” и “Ставка”. В описании можно детально описать обязанности менеджера, но пока введите что-то для примера. И нажмите в конце кнопку “Сохранить”. </p><p>Кнопка чтоб {{/vacancy/vacancy/create||СОЗДАТЬ ВАКАНСИЮ}}</p><p>Отлично! теперь в {{/vacancy/vacancy||СПИСКЕ ВАКАНСИЙ}} появилась новая вакансия, перейдем к кадрам.</p>','/regularity_images/office-1078869_1920.jpg',1),(134,'Кадры',NULL,156,NULL,'','<p>Если посмотреть на {{/worker/worker||СПИСОК КАДРОВ}}, то можно увидеть что их намного больше чем вакансий, это потому что мы храним историю о всех людях, которые записались к нам на собеседование. </p><p>Давайте добавим кадра, который нас заинтересовал и с кем мы бы пообщались. Нажмем кнопку {{/worker/worker/create||ДОБАВИТЬ}}. Вы увидите много полей, которые если подсвечиваются красным, то нужно заполнить, но можно поставить прочерк. </p><p>Интересной есть настройка “<strong>Кандидат подходит для вакансий</strong>\" . Из списка выберите те вакансии, на которые по вашему мнению подходит кандидат, например, “Менеджер по закупкам”. В отличии от “Претендует на должность”, данная настройка говорит о том, “<strong>на какую вакансию ВЫ хотите его нанять</strong>” и позволит выбрать кандидата для данной вакансии, а “<strong>Претендует на должность</strong>” - “<strong>на какой должности хотел бы работать кандидат</strong>”.</p><p>Теперь у нас есть кадр, которого потенциально можно нанять менеджером по закупкам. Давайте добавим ему конкурента.  Нажмем кнопку  {{/worker/worker/create||ДОБАВИТЬ}}.</p>','/regularity_images/seminar-594125_1920.jpg',1),(135,'Проекты',NULL,156,NULL,'','<p>Так бывает, что ваш бизнес достаточно разрастается, у вас появляется 2 направления деятельности, или 2 склада. А поэтому и 2 проекта. Давайте посмотрим какие проекты есть у нашего Директора. {{/project/project?ProjectSearch[state]=1||СМОТРЕТЬ ПРОЕКТЫ}}.</p><p> Он выделил главный департамент отдельно и отдельно 1 и 2 магазин, но только потому что это интернет-магазины  и менеджеров можно посадить в одном офисе. </p><p>Нажмем кнопку {{/project/project/create?p||ДОБАВИТЬ ПРОЕКТ}} и создадим проект “Электросамокаты”.<br></p><p>После создания нажмите на проекте кнопку “Добавить вакансию на проект” в {{/project/project?ProjectSearch[state]=1||СПИСКЕ ПРОЕКТОВ}}. И выберите там только что созданный проект, вакансию “менеджер по закупкам” в количестве позиций &gt; 1.</p><p> Ура осталось только выбрать кто из двух кандидатов нам больше понравился, двигаемся дальше!</p>','/regularity_images/industry-3087393_1920.jpg',1),(136,'Процесс найма',NULL,156,NULL,'','<p>Самый интересный этап. Это этап собеседований, знакомства с новыми людьми и найма. Словно вылов рыбы из реки. </p><p> Давайте начнем собеседование!</p><p>Снизу от {{/hr||ПАНЕЛИ УПРАВЛЕНИЯ}} на самой нижней карточке нужно нажать кнопку “Выбрать вакансии для найма”  И выбрать вакансию “Менеджер по закупкам”.</p><p><img src=\"https://lh6.googleusercontent.com/Tn6qH9irwdNrlcmf0jGCY6ln7vki3lXeeFFMbq4lFFpaUd8SSh6dtPFuEVpP-lG9FvjlcjlcYOsmkoTeteMLY1zjKInRGzxSVFadjp5w5jqDqBl4noeUVuvIgbsf4gZSPBg2lQ6s\"></p><p>Далее на другой странице в поле “Кадр” выбираем кадра из выпадающего списка и нажимаем кнопку “Сохранить”. Потом закрываем модальное окно.<img src=\"https://lh6.googleusercontent.com/RHvPl8IxQyzsq1qkZQvrbiromoqS0JN0qY9KBCVBdIVdnqR8jbtskyuBjm_MS3mOjjnbk23wlj0WMepRl6VjarmuuLz3Mc0RXzTnRfnfM3E2YKu8FfVoJ-8ITW7gidPO24rKMU3G\"></p><p>Все, процесс начат! Чтобы найти эту запись, нажмите на {{/hr||ПАНЕЛИ УПРАВЛЕНИЯ}} на колонку “Холод” и нажмите в таблице на нижнюю запись. Мы снова попали в процесс.</p><p>Кнопка “История” - предназначена для отображения  истории с данным кандидатом, сюда можно добавить любой комментарий.</p><p>Ниже есть блок состояний. Он предназначен для того, чтоб отмечать в какой колонке находится кандидат, в каком “состоянии”. </p><p>Предположим вы договорились о собеседовании - нажмите на маленькую кнопку “Собеседование”, так вы будете знать, что найти его можно в колонке “Собеседование”. На {{/hr||ПАНЕЛИ УПРАВЛЕНИЯ}}.</p><p>Когда мы провели таким образом несколько собеседований, отправили оффер одному из кандидатов и он его принял, то переведем кандидата в состояние  “Работа”. </p><p>Процесс найма завершен, ура! И у нас появился сотрудник,  который будет закупать электросамокаты для нашего нового направления бизнеса.</p>','/regularity_images/office-4639462_1920.jpg',1),(137,'Должностные инструкции',NULL,156,NULL,'','<p>Теперь вы готовы отстроить свою империю и делегировать найм другим. В данном разделе будут находится правила для каждой должности, прямо вместо этого текста, который Вы читаете! Как это сделать - мы узнаем в конце обучения. И теперь Вы готовы перейти к новому регламенту - регламенту Управления, который поможет руководителю контролировать свою компанию и создавать её уникальную модель.</p>','/regularity_images/video-conference-5238383_1920.jpg',1),(138,'Показатели',NULL,157,NULL,'','<p>Это пульс Вашей компании. На ней отображаются основные показатели Вашей компании. Обычно эту панель принято называть “Дэшборд”.  </p><p>Дэшборд состоит из виджетов - специальных блоков, в которых могут отображаться графики, таблицы другие формы данных. </p><p>К примеру, в ФОРМУ по умолчанию включен миниатюрный календарь, список сотрудников, состояние процессов найма, виджет воронки продаж, виджет статистики продаж по складам, виджет основных показателей и многое другое. Все эти функции мы рассмотрим в соответствующих разделах. </p><p>В каждом виджете есть специальная кнопка с тремя линиями, в которой есть основные функции виджета. Пока просто запомните, что такая есть. Она для супер-продвинутых пользователей или для тех, кто прочитал все регламенты. </p><p>Вы можете определить, какие данные Вам важнее видеть. Сейчас, в качестве первого практического взаимодействия, попробуем настроить дэшборд на Ваш вкус. Для этого мы будем перетаскивать виджеты курсором мыши в нужное Вам положение. Зажмите левую кнопку мыши на названии виджета и перемещайте его. Если виджет Вам не нужен - перетяните его в верхнюю панель (позже сможете вернуть). Если виджет Вам нужен - перетаскивайте его повыше. Если не важен - по ниже. Также можно свернуть виджет, нажав на кнопку “-”.</p><p><strong>ПОСМОТРИТЕ НА ДЭШБОРД,</strong> чтобы начать экспериментировать с панелью.</p><p>(Настраивать дэшборд можно только на большом экране)</p>','/regularity_images/chart-2785979_1920.jpg',1),(139,'Регламент',NULL,157,NULL,'','<p>Регламенты нужны для того, чтобы написать правила работы компании и пересечь эти правила с функциями системы. Это\n    очень мощная функция системы!</p><p>Интересный факт: Вы сейчас читаете регламент. Но его написал я, Олег, -\n    архитектор данной системы, других систем для малого бизнеса и ряда других коммерческих и некоммерческих систем. Но\n    никто не знает Ваш бизнес лучше, чем Вы. И потому в будущем Вы полностью перепишете регламенты Вашей компании.\n    Задача команды ingello - предоставить бесплатные функции на первое время, до начала стадии активного роста бизнеса,\n    на стадии выживания. </p><p>Регламент - это важнейший набор правил, определяющий поведение компании. Но это не\n    просто текст. Это мультифункциональный текст, в который можно зашить любую из тысяч функций системы. А давайте я\n    прямо сейчас покажу, как всё это устроено внутри.</p><p>Важно: Это может оказаться сложно для новичков, потому Вы\n    можете пропустить этот раздел и вернуться к нему позже. Либо же будьте готовы попробовать несколько раз, пока не\n    получится. А получится полюбому. </p><p>Начнем! Для начала, нажимайте эту кнопку, осмотритесь и закройте окно\n    {{/core/regularity/settings||СМОТРЕТЬ СПИСОК РЕГЛАМЕНТОВ}} </p><p>Видели этот список? Это список\n    регламентов, один из которых Вы сейчас читаете. А самое интересно это то, что в Вашей власти его изменить! Давайте\n    договоримся пока ничего не удалять, чтобы не нарушить программу. Но давайте что-нибудь добавим новое!</p><p>Чтобы не\n    добавлять что-попало, давайте создадим список должностных обязанностей. </p><p>Тогда, регламент будет называться\n    “Должностные обязанности”, а его разделы (пункты) будут называться “Обязанности менеджера”, “Обязанности продавца”,\n    “Обязанности администратора”. Нажимая на эти пункты мы будем видеть текст, в котором будут описаны эти обязанности,\n    к примеру “В обязанности продавца входит приветствовать клиента, консультировать его согласно следующим правилам….”.\n    Ну, Вы поняли, надеюсь. </p><p>Итак, попробуем добавить регламент. Вы можете нажать на предыдущую кнопку и добавить\n    новый регламент в список.</p><p>Или просто нажмите на эту кнопку и дайте название “Должностные обязанности” своему\n    собственному регламенту {{/core/regularity/create||СОЗДАЙТЕ СВОЙ РЕГЛАМЕНТ}} </p><p>Верю, что у Вас всё получилось.\n    Но давайте это проверим. Нажмите эту кнопку {{/core/regularity||РЕГЛАМЕНТЫ}}. Заметили? Теперь в регламентах\n    появился Ваш собственный регламент с названием, которое Вы написали!</p><p>Далее нужно наполнить его пунктами. То\n    есть, к примеру, должен получится \"список обязанностей для разных ролей Вашего бизнеса\". Давайте это сделаем.\n    {{/core/regularity||ОТКРОЙТЕ СПИСОК РЕГЛАМЕНТОВ И РАЗДЕЛОВ}} </p><p>Сверху (в ряд) располагаются вкладки всех\n    регламентов и среди них должен быть Ваш только что созданный. Нажмите на него и увидете кнопку “Добавить пункт”.\n    Клацайте на неё. </p><p>В появившемся окне нужно как минимум написать название пункта и его описание. Можете еще\n    выбрать его цвет. Если следовать нашему примеру, - то в название пишите должность, а в описание - обязанности этой\n    должности. И нажимайте кнопку “Добавить” внизу формы. </p><p>Повторите это действие несколько раз, чтобы наполнить\n    регламент пунктами.</p><p>А в следующем пункте мы поговорим о более сложном применении регламентов - о связывании их\n    с функциями системы. И разберемся, что за непонятные кнопочки были справа при создании регламента. </p>','/regularity_images/video-conference-5238383_1920.jpg',1),(140,'Регламент для продвинутых',NULL,157,NULL,'','<p>Теперь поговорим про беспрецедентно мощную функцию системы ФОРМА, которая способна создать из Вашего бизнеса точку непреодолимой силы на Вашем рынке. </p><p>Создайте любой новый раздел в  {{/core/regularity/create||РЕГЛАМЕНТЕ}} (как в прошлом пункте), но не спешите сохранять.</p><p>Помимо названия, описания и цвета регламента тут есть поле для загрузки картинки (в следующем разделе про презентацию мы поговорим об этом). </p><p>Сейчас нас больше интересует правая часть. В ней Вы видите карточки с какими то кнопками. </p><p>Вся правая часть делится на разные разделы, Вы могли обратить внимание, что они повторяют пункты меню системы (вот те, разноцветные, слева &lt;&lt;&lt;). Все эти функции (и не только эти) Вы можете использовать и они могут превращаться в вот такие &gt;&gt;&gt; {{/selling/default||КНОПКИ}} , при нажатии на которые мы попадаем в определенные разделы системы. </p><p>Вы программист? Скорее всего, Вы думаете, что не программист. Но теперь Вы им станете. Да и кто вообще не программист после 2020 года? =)</p><p>На каждой карточке с функцией есть 2 кнопки. Первая кнопка - это пример кнопки, которую мы можем “зашить” в текст. Нажмите на неё и всё поймёте. Вы их уже видели в регламентах. </p><p>Вторая кнопка - это волшебный код. Нажмите на неё и увидите этот код. Просто скопируйте этот код (самый интересный способ - трижды кликнув на код левой кнопкой мыши и нажав правой кнопкой). Теперь вставьте этот код в левой части в описание раздела. В ту часть, где Вы хотите, чтобы функция отображалась. К примеру, в должностные обязанности продавца можно было бы скопировать код кнопки списка клиентов или воронки продаж или кнопку создания нового процесса продажи. </p><p>Нажимайте кнопку “добавить” внизу и наслаждайтесь Вашим запрограммированным текстом в Вашем собственном регламенте.</p><p>Мне кажется, у Вас уже возникла масса идей, как можно использовать эту черную магию )</p><p>Теперь давайте посмотрим раздел “Презентация”, который тесно связан с тем, что мы уже знаем о регламентах. </p>','/regularity_images/sound-space-3851251_1920.jpg',1),(141,'Презентация',NULL,157,NULL,'','<p>Презентация - это в общем то те же самые регламенты, но в более… ээм… презентабельной … ээм… ФОРМЕ =)</p><p>По сути, это регламенты с картинками в формате типичных презентаций, но всё с теми же встроенными кнопками, которые вызывают специальные функции. </p><p>В отличии от панели настроек регламентов, тут подразумевается возможность последовательного просмотра регламентов в том порядке, в котором Вы их задали. </p><p>Вы просто начинаете с первого регламента и движетесь по разделам, нажимая кнопку “далее”. И так один за другим. </p><p>Вероятно, Вы сейчас читаете этот текст из раздела презентации. И конечно же, Вы можете всё тут поменять так, как Вам захочется. </p><p>Зайдите  в  {{/core/regularity||РЕГЛАМЕНТЫ}} и добавитье новый пункт или отредактируйте существующий (кнопка карандаша на блоке пункта).</p><p>При создании или редактировании пункта Вы можете добавлять картинку. Это должна быть большая картинка, далее она отобразится на пол экрана в презентации.</p><p>Важно поставить галочку “публичный” в настройках пункта, а также убедиться что такая же галочка установлена в регламенте. Для этого отредактируйте свой регламент в списке {{/core/regularity/settings||НАСТРОЙКИ РЕГЛАМЕНТОВ}} .  </p><p>Теперь Вы можете зайти в {{/core/regularity/regularity||ПРЕЗЕНТАЦИИ}}  и посмотреть, как это выглядит. </p><p>Вы можете также создавать презентации для Ваших клиентов и делиться с ними ссылкой на презентацию. Но важно понимать, что функции системы (кнопки) не будут для них работать. </p>','/regularity_images/innovation-561388_1920.jpg',1),(142,'Календарь',NULL,157,NULL,'','<p>Данный раздел нужен для того, чтобы планировать время и не только. </p><p>(календарем удобнее всего пользоваться на большом экране с помощью компьютерной мыши)</p><p>Календарь можно смотреть в разрезе месяца, недели, дня или повестки дня. </p><p>В верхней части календаря Вы можете видеть кнопки, которые переключают эти режимы.</p><p>Месяц - это 28-31 день “как на ладони”, в котором отображаются события. </p><p>Вы можете кликнуть на любой из дней и появится окошко, в котором Вы можете создать название и описание Вашего календарного события. </p><p>Неделя отличается тем, что тут мы видим 7 колонок, в которых видны не только сами события, но и их продолжительность. Вы можете перетягивать события с места на место или же тянуть их за нижний край, изменяя таким образом их продолжительность. </p><p>В режиме дня Вы увидите точно такую же колонку, как в неделе, но по ширине экрана. Подойдёт для детального планирования событий, которые происходят параллельно. </p><p>Теперь немного практики. Посмотрите раздел {{/event||КАЛЕНДАРЬ   }} и попробуйте создавать изменять и перетаскивать события. Это очень просто. </p><p>Интересно знать, что в процессе продаж и переговоров с клиентом Вы (а точнее менеджеры отдела продаж) можете использовать функциональность календаря, чтобы планировать встречи или созвоны для отдела продаж. Он встроен прямо в модуль переговоров, это очень удобно! </p>','/regularity_images/bulletin-board-3233653_1920.jpg',1),(143,'События',NULL,157,NULL,'','<p>В системе постоянно происходят различные события: добавили продажу, удалили клиента, изменили регламент… Все эти события строго фиксируются в системе и их можно отслеживать. Давайте на них посмотрим с помощью этой кнопки {{/core/system-event||СМОТРЕТЬ СОБЫТИЯ}}. События кратко говорят что, когда и в каком отделе произошло. Вы можете переходить прямо из событий к просмотру элементов раздела, нажимая соответствующие кнопки. Например “В отделе продаж произошло обновление клиента”. Это значит, что Тут Вы можете прямо отсюда перейти в отдел Продаж или в список Клиентов или в конкретного Клиента, данные по которому обновились. Кроме того, можно смотреть события в табличном виде, что позволяет применять поиск и сортировку всех событий. Нажмите на кнопку ”Показать таблицей”. Еще для поиска в списке Вы можете нажать кнопку “Поиск по событиям”.</p><p>Самая интересная часть раздела заключается в том, что можно подписаться на некоторые типы событий и тогда ФОРМА начнет отправлять Вам их на почту. Нажмите на кнопку “Подписаться на событие” или используйте эту кнопку {{/core/system-event-user/subscribe||ПОДПИСАТЬСЯ НА СОБЫТИЕ}}. Отметьте галочками те события, уведомления о которых Вам интересны (главное не забыть нажать на кнопку “Сохранить подписку”). </p>\r\n<p>Итак, это был последний регламент в рамках системы ФОРМА. Далее мы сможем продолжить говорить про более сложные и совсем не бесплатные программные средства автоматизации - для построения франшиз, крупных компаний и корпораций. Переходите в следующий раздел, когда будете готовы к новому этапу своего бизнеса.  </p>','/regularity_images/message-in-a-bottle-413680_1920.jpg',1),(144,'Планирование',NULL,158,NULL,'','',NULL,1),(145,'Электронная коммерция',NULL,158,NULL,'','',NULL,1),(146,'Управление магазином',NULL,158,NULL,'','',NULL,1),(147,'Обработка заявок',NULL,158,NULL,'','',NULL,1),(148,'Здоровье человека',NULL,158,NULL,'','',NULL,1),(149,'Образовательные системы',NULL,158,NULL,'','',NULL,1),(150,'IOT - интернет вещей',NULL,158,NULL,'','',NULL,1),(151,'Генератор платформ',NULL,158,NULL,'','',NULL,1),(152,'Голосовой помощник',NULL,158,NULL,'','',NULL,1),(153,'Мобильные приложения',NULL,158,NULL,'','',NULL,1),(154,'Искусственный интеллект',NULL,158,NULL,'','',NULL,1),(155,'Иммортал Инжелло',NULL,158,NULL,'','',NULL,1),(156,'Оформление продажи',NULL,159,NULL,'','<p>Если продажи так важны, почему же мы говорим о них только в середине? А потому, что мы проходили специальную подготовку и сейчас она нам всё существенно упростит. </p>\r\n<p>Давайте я докажу, что после того, как мы разобрались с отделом Продуктов и Хранилищ - продавать что-то стало проще простого. Предлагаю провести супер-быструю продажу. Нажмите на кнопку {{/selling/form||ОФОРМИТЬ ПРОДАЖУ}}. Тут всего 2 вопроса. Откуда и кому. В разделе “Место” выбираем наш склад или офис. А в разделе Клиент можно выбрать одного из наших клиентов. Сделайте это. (Кстати, Вы можете прямо отсюда добавить и склад и клиента или посмотреть о них информацию. Для этого можно нажать на соответствующие кнопки [Детали] или [Добавить]).</p>\r\n<p>На самом деле это почти всё. Нажмите кнопку Сохранить. Сейчас перед Вами очень ценный инструмент для продаж - со всеми его блоками, кнопками и индикаторами. В него зашито множество функций и он пересекается с другими отделами, которые мы уже изучали. Но сейчас давайте не будем вдумываться, для быстрой продажи нам осталось только одно - указать, какие Продукты мы продаём клиенту. И всё.  Для этого в специальном разделе “Товар” нужно выбрать товар, указать стоимость и количество, после чего нажать на кнопку “+” справа. Если товаров несколько - то нужно повторить эту операцию. И всё, не нужно нажимать никаких кнопок, по сути простейшая версия продажи только что осуществилась. Всё так просто, ведь мы уже добавили склады и настроили базовый учет. Всё так просто, ведь у нас уже описан продукт, он лежит в каталоге и на складе, просто ждёт продаж. </p>\r\n<p>Далее мы поговорим про продвинутые функции данной формы для продажи, а именно про блок коммуникаций со скриптами переговоров и мини-сайтом клиента и блок состояний. Вперед -&gt;</p>',NULL,1),(157,'Мини-сайт клиента',NULL,159,NULL,'','<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" id=\"docs-internal-guid-d46ff904-7fff-cebd-c3b5-760c6e91872a\">Когда мы находимся в форме продаж - мы можем использовать кнопку “Ссылка для клиента”. Зайдите в одну из продаж со </p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">{{/selling/main||СПИСКА ПРОДАЖ}}. </p><p>Когда откроется продажа - нажмите на такую кнопку:</p><p><img src=\"https://lh5.googleusercontent.com/o25Egk12xm1KGg4v4QamTI8y-MPRCH3TiVtf3XSTAEGaIjx_Rrc0z4IH3sbF2fZSht3UUyZ8Lv2GuSb52Yayk4b_ruNUqwcLXFlXdQS-tJtlFO9jG81U7Haw-w6udZ4SC_EXWfaT\"><br></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">По этой ссылке Ваш клиент сможет увидеть данную форму Продажи - со списком покупаемых Продуктов, с их ценами и с итоговой ценой с учетом налогов. Важно, что клиент может самостоятельно добавлять новые Продукты к этой Продаже. Такую веб-страницу можно использовать в качестве элемента торгового предложения и в рекламе.  </p>',NULL,1),(158,'Воронка продаж',NULL,159,NULL,'','<p>Если Вы продаете телефоны поштучно через торговые точки - вероятно, никакая воронка продаж Вам не нужна. Но если Вы, например, занимаетесь организацией сети торговых точек или реализуете франчайзинговую модель или же продаете телефоны оптом - тогда процесс продажи у Вас может длиться дни и даже месяцы. Клиент проходит множество стадий - различные презентации, проверки, утверждение документов, подписание актов, опросы и так далее… </p><p>Вот пример этапов, которые мы добавили для продажи телефонов. </p><p>{{/selling/default||СМОТРЕТЬ ВОРОНКУ ПРОДАЖ}}. </p><p>Все эти разноцветные столбики - это и есть этапы. Чем больше столбик - тем большее количество сделок обрабатываются на этом этапе. Чем горячее цвет столбика - тем более важно добавить на этот этап больше сделок. </p><p>Все столбики кликабельны. То есть если Вы кликните на один из них - Вы сможете увидеть, какие именно клиенты находятся в этом состоянии и что им продаём. Кликните на какой нибудь столбик, ознакомьтесь со списком. Если Вы кликнете на какой либо элемент из данного списка - вы попадете в форму продажи, которую мы уже видели ранее. Если хотите смотреть на всю воронку в виде таблицы - то есть по сути на список всех Ваших продаж - можете нажать на кнопку “Продажи” справа от воронки или же воспользоваться вот этой кнопкой {{/selling/main||СПИСОК ПРОДАЖ}}.</p><p>Возвращаясь к вот ЭТИМ разноцветным колонкам (этапам, состояниям) на графике. В каждом бизнесе и в каждой стратегии продаж эти этапы уникальны и специфичны. Потому система ФОРМА имеет специальный конструктор для воронкой продаж, который можно перенастроить без программистов индивидуально под Ваш бизнес. А мы понимаем, что он уникальный и неповторимый, недостойный простых шаблонов. О конструкторе и поговорим далее. Вперед -&gt;</p>',NULL,1),(159,'Этапы (Состояния) продаж',NULL,159,NULL,'','<p>В этом разделе мы узнаем, как свою, персональную, уникальную и эффективную систему для продаж - и всё это без дорогих программистов - с помощью конструктора воронки продаж. Давайте вспомним, как выглядит ВОРОНКА ПРОДАЖ. Этот раздел поможет Вам настроить свои собственные стадии переговоров и связать их логически - из какой стадии в какую есть переход и какие подсказки будут в каждой из стадий. Знания языков программирования не нужны, просто следуйте процессу информирования.</p><p>Приступим… В панели продаж есть кнопка под названием “Состояния”. Нажмите на неё или на аналогичную кнопку - вот эту: {{/selling/main-state/index||СОСТОЯНИЯ}} .</p><p>Узнаёте? Это ведь те самые состояния, которые находятся в форме продаж. И те же самые, которые находятся в воронке продаж. Так вот, все эти этапы Вы можете регулировать самостоятельно. Просто нажмите “Добавить состояние” или вот эту кнопку {{/selling/main-state/create||ДОБАВИТЬ СОСТОЯНИЕ}}. Состоянию нужно дать имя. Например, пусть это будет стадия опроса клиента. Так и назовём - “Опрос”. То, что мы напишем в описании (справа) - это текст или картинки, которые будут отображаться в этом состоянии, когда мы внутри какой нибудь Продажи. Если в поле “Порядок” написать цифру - то этот этап будет идти именно таким по счёту. Поставьте цифру 2, например. И нажмите “Сохранить”.  Теперь можете зайти в {{/selling/default||ВОРОНКУ ПРОДАЖ}} и убедиться, что колонка действительно добавлена. </p><p>Давайте создадим {{/selling/form||НОВУЮ ПРОДАЖУ}}, выберем откуда и кому, нажмем сохранить. Видите? Тут в панели состояний теперь тоже появилось новое - “Опрос”. Однако, мы не можем в него перейти. Давайте разберемся - почему. Вы увидите кнопку “Изменить состояния” в блоке состояний? Если да - нажмите на неё, либо же просто нажмите на кнопку {{/selling/main-state/index||РЕДАКТИРОВАТЬ СОСТОЯНИЯ}}. </p><p>Нажмите на самое первое под названием “Не знакомы”. В правой части Вы должны увидеть блок, где Вы можете настроить переход в следующие состояния. Давайте попробуем это сделать. Поставьте “галочку” возле состояния “Опрос”. Только что мы разрешили переход из состояния “Не знакомы” в состояние “Опрос”. </p><p>Давайте создадим еще одну {{/selling/form||НОВУЮ ПРОДАЖУ}} и попробуем перейти в состояние “Опрос”. Получилось? Отлично. </p><p>Вы освоили простой элемент бизнес-конструктора. В следующих разделах мы перейдем к возможностям, касающимся конструкторов переговоров и создания собственных стратегий в продажах. </p>',NULL,1),(160,'Использование скриптов',NULL,159,NULL,'','<p>Этот раздел покажет, как систематизировать отдел продаж в плане постоянной обработки клиентов. Наша цель, чтобы наша клиентская база не застаивалась и была постоянно в движении. Каждого клиента мы стараемся перевести на новый уровень взаимоотношений. Если мы не знакомы - срочно познакомиться. Если клиент еще не имеет коммерческого предложения - предложить, если уже получил - продать, если отказался - выяснить причниу, устранить и предложить снова, если уже что-то продали - выявить потребность и продать еще что-то. Это бесконечный процесс обмена и бесконечным его делает либо то, что Вы уходите и вместо Вас приходит конкурент, либо же Вы бесконечно поддерживаете этот денежно-товарный цикл в своей компании, регулярно, изо дня в день, вечно. И в этом Вам, конечно-же, поможет система ФОРМА,</p><p>(дописать)</p>',NULL,1),(161,'Настройка скриптов',NULL,159,NULL,'','<p>Этот раздел научит нас создавать уникальные стратегии продаж и переговоров для Вашей компании, которые помогут систематизировать её рост и существенно увеличить годовой оборот. </p><p>Данные функции уже доступны в системе {{/selling/speech-module||ТУТ}}, но текст для программы обучения мы еще не написали. Не расстраивайтесь, посмотрите следующий раздел, жмите Вперед -&gt;</p>',NULL,1),(162,'Авто-генерация лидов',NULL,159,NULL,'','<p>В данном разделе мы поговорим о будущем. Мы покажем на примере, как система может автоматизировать Ваш ручной труд. Раньше для работы человек использовал только свои руки. Потом он изобрел инструменты, которые помогали ему в работе. Позже он смог приручить животных и использовать их природную силу. И на венце эволюции человек создал машину, которая может работать при его минимальном участии. Но является ли машина действительно вершиной технологического прогресса? Конечно же нет. Очередной шаг развития технологий - это платформа. Это новая производная от труда, более заманчивая и специфичная категория автоматизации. Современный предприниматель может настроить систему индивидуально под себя и полностью автоматизировать некоторую рутинную часть своей работы. Например, для привлечения клиентов часто используется много ручного и однообразного труда для того чтобы найти клиента, выполнить ряд одинаковых операций для того чтобы его оформить, проинформировать и закрыть сделку. Для такого привлечения клиента часто используются ручные и долгие или автоматические и не очень качественные рассылки, после которого человека всё равно нужно вручную оформлять. </p><p>Но с системой автоматической генерации лидов этого делать не нужно. Что если я Вам скажу, что Ваша воронка продаж может заполняться автоматически? Давайте  приведем пример, как мы раньше автоматизировали продажи в нашей ИТ компании. Наши самые ранние клиенты собирались в уютных местах, например на бирже труда или фриланса. Мы продавали услуги по разработки приложений для стартапов. И вот как мы спроектировали процесс. </p><p>Полу-автоматический режим: заходим в специальный раздел {{/selling/freelancehunt/||ГЕНЕРАЦИЯ ЛИДОВ}}. После нажатия на эту кнопку система ФОРМА идёт на сайт биржи и находит там множество потенциальной работы - проектов, вакансий, задач и так далее. Выгружали обычно тысячами. Тут для примера мы ограничили выборку до 50-ти проектов. </p><p>Система не просто находит потенциальных клиентов. Она еще и выставляет им оценки по нашему внутреннему алгоритму ранжирования. Таким образом в самом верху мы получаем только самые релевантные задания с самым высоким баллом. Более того, в описании работы система сама подчеркивает фразы, которые нам нравятся (к примеру “программирование” “проектирование” и т.д.) и фразы, которые нам НЕ нравятся (к примеру “Готовые решения” “CMS” “Быстро” “Дёшево” и так далее. </p><p>Далее мы выбираем нужный проект, нажимая на кнопку “Обработать” и попадаем в форму обработки. После того, как мы нажали кнопку “Обработать” мы автоматически добавляем данного клиента в нашу клиентскую базу и добавляем новую Продажу в воронку для этого клиента. И видим форму коммуникации с клиентом. Так же Вы можете попасть в форму, нажав ФОРМА ОБРАБОТКИ. В этой форме мы предметно знакомимся с описанием работы, даём оценку проекту, пишем уникальный ответный комментарий с предложением о сотрудничестве и нажимаем кнопку “Отправить” (Submit). Наш отзыв автоматически отправляется системой ФОРМА на сервис freelancehint, нам даже не нужно заходить в его интерфейс. </p><p>Так и в Вашем бизнесе. Знакомитесь ли Вы через соц-сети или по почте, проводите холодный обзвон или покупаете базы клиентских контактов, посещаете ли конференции и митапы - всегда есть возможность автоматизировать часть процесса. Любая автоматизация - это избавление от вынужденного рутинного труда и расходов. Стоит стремиться автоматизировать всё, кроме ключевых переговоров, в которых должен участвовать человек с человеком. И даже в таких переговорах есть секретные приемы и тактики, но об этом позже. </p><p>Итак, автоматизация - это хорошо и такие возможности предусмотрены в системе ФОРМА. Это не будущее, это настоящее, однако такую умную систему нельзя взять в готовом виде. Её необходимо разработать с профессиональным программным архитектором, менеджером проекта, программистами и другими важными именно для Вашего проекта ролями. Это интересное приключение. Нужно ли это Вам прямо сейчас? Если Вы малый бизнес и работаете менее года, никогда не использовали программные системы и всё что Вы тут читаете Вам в новинку - тогда пожалуй Вам будет достаточно существующих бесплатных функций системы для того, чтобы поднять прибыль. Но если Вы готовы к серьезному росту и расширению границ - тогда самое время рассмотреть старт строительства своей собственной системы автоматизации. Наши специалисты смогут Вам в этом помочь, спроектировать и запрограммировать систему, которая заставит Ваших конкурентов не спать по ночам от её мощи. https://ingello.com/</p>',NULL,1),(163,'Конструктор Характеристик',NULL,153,NULL,'','<p>Это сложный раздел, завершающий Регламент Продуктов. И, возможно, новичкам стоит его пропустить, тут будет чуть-чуть сложнее.</p><p>Итак, у продуктов есть что-то общее и множество отличающихся деталей в конкретных случаях. И наша задача - научиться объединять продукты по общим чертам в категории, а уникальные черты конкретных продуктов научиться описывать через характеристики. И самое важное - это понять связь между характеристиками и категориями. Начнем.</p><p>Давайте используем созданную нами ранее Категорию, или же создадим новую: {{/product/category||СПИСОК КАТЕГОРИЙ}}. </p><p>Внутри категории после её создания можно наблюдать панель справа. Тут будет список дополнительных характеристик, которые можно придумать самостоятельно. </p><p>Давайте добавим парочку, для этого нужно нажать на кнопку “+Добавить”. </p><p>В самом простом случае, мы должны дать имя этой характеристике, </p><p>Если Вы редактируете категорию “Скоростные самокаты”, которую Вы создали ранее - тогда давайте дадим характеристике название “Скорость км\\ч”. Это же скоростные самокаты. Далее давайте выберем “Тип виджета”. Это поле отвечает за внешний вид данной характеристики. Через минуту увидите, о чем я говорю. Нажмите на это поле и выберете “Число”. И теперь нажимайте “Сохранить”. </p><p>Всё, характеристика добавлена. </p><p>Давайте теперь попробуем добавить новый продукт и выбрать в нём категорию “Скоростные самокаты”. {{/product/product/create||ДОБАВИТЬ ПРОДУКТ}}. </p><p>Увидели? Характеристика, которую Вы создали, добавилась к этому самокату и теперь Вы можете указать его скорость в цифрах. Кстати, попробуйте ввести не цифры, а буквы в это поле. Не получается? Всё потому, что Вы своими собственными руками запрограммировали систему таким образом. Давайте теперь “запрограммируем” что-то еще более хитрое в характеристиках.</p><p>Вернитесь в категорию самокатов {{/product/category||КАТЕГОРИИ}} (или в форме продуктов нажмите кнопку “Редактировать текущую категорию”). </p><p>Давайте добавим еще 3 характеристики самокатов:</p><p>“Цвет корпуса”, “Дата производства” и, например, “Условия использования”. </p><p>Для цвета выберите виджет “Цвет”, для даты - “Дату”. Тут пока всё просто и очевидно, как мы делали только что. </p><p>Теперь про “Условия использования”. Тут мы придумали более интересную характеристику. Условия могут быть разные. Один самокат можно использовать в мороз, другой нельзя. Какие то могут контактировать с водой, какие то нет. По песчаной поверхности тоже не каждый может кататься. А какие то могут это всё вместе взятое. Таким образом, тут нам нужно перечислить все возможные вариации условий, а когда будем добавлять конкретный самокат - можем выбрать, какие из них подходят для этого самоката. Для таких целей есть специальный тип виджета - мультиселект (от слова Мульти Выбор). Выберите его для характеристики с названием “Условия использования”. </p><p>Когда мы выбираем виджеты такого типа, у нас появляется новое поле ввода: “Значение 1” и кнопка “+”. </p><p>Давайте введем первое значение “Условий использования” - “Дождь”. И нажмем кнопку “+”. Введем второе значение - “Снег” и нажмем снова “+”. И так далее. Грязь, Вода, Песок, Лес, Город… Можете придумать свои варианты, где можно покататься на самокате. Кстати, возле полей ввода есть такие маленькие квадратики. Если нажать на них, появится галочка, которая обозначает, что этот параметр будет выбран по умолчанию. Например, давайте нажмем на этот квадратик рядом с вариантом “Город”, ведь скорее всего любой самокат может ездить по городу. После того, как добавили все пункты - нажимайте кнопку “Сохранить”.</p><p>Теперь давайте снова {{/product/product/create||ДОБАВИМ НОВЫЙ ПРОДУКТ}}. </p><p>Выбирайте категорию “Скоростные самокаты”. И что мы видим? Появились наши новые характеристики, которые мы добавили из конструктора. При нажатии на цвет у нас выпадает красивая разноцветная палитра, позволяющая выбрать уникальный цвет или скопировать его по шестнадцатеричному идентификатору.  В дате мы можем выбирать из удобного календаря определенный день.  И самое интересное - это Условия использования. тут уже выбран “Город”, если вы отметили “Город” в конструкторе, как поле по умолчанию. И при нажатии на это поле ввода мы видим выпадающий список всех возможных вариантов. Нажмите на те, которым соответствует данная модель самоката (т.к. мы его выдумали - нажмите просто на любые пункты). </p>\r\n<p>Это был последний и самый сложный раздел Регламента, касающийся Вашего Продукта. Для закрепления материала я предлагаю Вам поработать с конструктором категорий и описать свое торговое предложение. Мы еще не говорили, что категории могут иметь подкатегории и наследовать таким образом характеристики своих родительских категорий? А вот это и будет самостоятельная работа - разобраться в этом. Вот пример: есть категория “Самокаты”. Её основные характеристики - самые общие. Цвет, размер, вес и так далее. А есть такие под-категории: “Военные самокаты”  и “Грузовые самокаты”. У них есть свои уникальные наборы характеристик, придумайте их сами. Те характеристики, что будут в под-категориях - будут идти в дополнении к характеристикам основной категории. Попробуйте это сделать самостоятельно:  {{/product/category||СМОТРЕТЬ КАТЕГОРИИ}}</p>\r\n<p>В следующем Регламенте будем говорить не только о том, как вести учет всех абстрактных Продуктов и их Характеристик, но и как работать с реальными товарами в рамках склада. Так что готовьтесь к первой закупке в системе ФОРМА. </p>',NULL,1),(164,'Услуги и Хранилища',NULL,154,NULL,'','Этот завершительный раздел Регламента по Хранилищам расскажет о том, как вести учет при продаже Услуг. Этот раздел рассчитан на высокий уровень подготовки, ведь помимо того, что нужно хорошо понимать весь пройденный до этого момента материал, так еще и фантазию нужно будет немного проявить. Если Вы еще не читали регламент по Продажам - рекомендуем Вам перейти сразу к нему, чтобы увидеть общую картину. <p>Итак. Важно: говоря в контексте Склада обычно речь идёт о Товарах, а не Продуктах. Потому что Продукт - это абстрактная вещь, Продукт - это или материальная штука - то есть Товар, или менее материальное и не вещественное понятие - Услуга. Однако наши Склады (Хранилища) могут быть использованы для учета не только Товаров, но и Услуг. Это не так привычно, но может оказаться удобно для учета компаний, предоставляющих Услуги. Склад, который хранит Услуги у нас негласно называется Офисом. И конечно же Вам не понадобится закупать и перемещать и инвентаризировать Услуги, в случае если Вы сервисная компания и не продаёте продукты - раздел Склад для Вас это просто формальность для ведения учета продаж, например, из офиса.  </p>\r\n<p>Практическое задание: необходимо придумать способ описания и учета нематериальных услуг на базе отдела Продуктов и отдела Хранилищ. Самым лучшим способом будет организация такой работы с использованием уже имеющихся функций ФОРМЫ. Однако, если фантазия разгуляется - можете представить, что у Вас есть под рукой команда программистов и Вы можете давать им задания на изменение интерфейса ФОРМЫ. А нам Вы можете отправить текст Ваших идей и как знать - возможно именно Ваше видение станет частью бесплатного инструментария системы ФОРМА.</p>\r\n<p>Мы подбираемся к самой важной части системы. Следующий регламент познакомит Вас с Продажами Продуктов через Склад (Хранилище).</p>',NULL,1),(501,'Форма',NULL,209,NULL,'weadfsehtgjhm','<p>У каждой компании есть <strong>своя</strong>, уникальная, неповторимая форма.</p><p>ФОРМА Вашей компании - это тысячи полезных функций для <strong>систематизации</strong> <strong>бизнеса, повышения</strong> показателей <strong>продаж</strong> и <strong>дисциплины</strong>. И конечно для <strong>подготовки</strong> малого бизнеса к <strong>росту</strong> и что главное - бесплатно. Бесплатно - потому, что нам выгоден рост Вашего бизнеса. Ведь для бизнеса, который в процессе роста, наша команда проектирует и программирует дорогие индивидуальные решения и предоставляет экспертные и консультационные услуги. </p><p>Здесь<strong> Вы научитесь эффективно управлять системой </strong>и менять её под свой бизнес. Это буквально не пустой текст - Вы сразу же будете<strong> на практике</strong> строить и управлять Вашей индивидуальной системой для бизнеса. И всё благодаря <strong>уникальным функциям </strong>ФОРМЫ. Раздел регламента - это <strong>инструмент управления компанией</strong> и внедрения в компанию<strong> систем автоматизации</strong>. Даже если у Вас 0 опыта - Вы постепенно сможете освоить все возможности. Может потребоваться несколько прочтений для качественного понимания всех функций данной системы.</p><p>Если у Вас есть опыт - Вы очень быстро разберетесь. В любом случае, мы постараемся Вам помочь. Вы можете написать нашей поддержке в любой момент, используя кнопку связи в правом нижнем углу. </p><p><img src=\"data:image/png;base64,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\" alt=\"\"></p><p>Итак, нас ждёт ознакомление с Регламентами ФОРМЫ, а значит и ознакомлением с основными функциями системы. Но в чем же тут практика - спросите Вы? Это очень похоже на теорию. Отвечу. Смотрите: Вы можете сразу же на практике использовать систему и применять её функции. Вживую. И доступно это благодаря специальным Кнопкам. Каждый Регламент состоит из разделов - конкретного текста, объясняющего возможности системы. Внутри разделов могут быть использованы специальные Кнопки, нажатие на которые позволяет посмотреть реальную функциональность системы в маленьком компактном окошке. Это удобно. Давайте попробуем! После нажатия на кнопку откроется окно. Вы можете полистать содержимое окна и закрыть его в правом верхнем углу нажмите на красный крестик Х.</p><p>{{/||НАЖМИ МЕНЯ}}<span class=\"redactor-invisible-space\"></span></p><p>Видели? Мы прямо из презентации можем смотреть на систему и даже пользоваться ею. В данном случае мы увидели панель с некоторыми показателями успешности компании. Каждый управленец настраивает данную панель по-своему. Пока забудем об этом на время и поговорим о том, как работать с системой FORMA.</p>','/regularity_images/airport-2373727_1920.jpg',1),(502,'Навигация',NULL,209,NULL,'','<p>Начнем с простого. Навигация в системе ФОРМА представлена в виде меню. Оно доступно в левой части системы. Это как оглавление в книге. Мы разбили <strong>функции, необходимые компании,</strong> по специальным категориям, совпадающим со стандартными <strong>отделами организации. </strong></p><p>Давайте посмотрим вот это окно: {{https://forma.ingello.com||СМОТРЕТЬ ОКНО}}</p><p>Видели разноцветное меню слева? Для удобства у каждого отдела компании есть <strong>свой цвет</strong>:.</p><p><strong>Зеленый - это отдел управления</strong>, это топ менеджмент, собственники, директора. Зачастую в малом бизнесе это один  человек. Тут происходит планирование и контроль выполнения. Нам доступны такие инструменты, как Календарь, Регламенты и Системные события. </p><p><strong>Оранжевый - это отдел учета.</strong> Тут всё связанное с каталогом Ваших Продуктов или Услуг а также с учетом операций, которые можно проводить над ними - например при хранении на складе это фильтр Остатков, Закупки, Перемещения, Инвентаризации и т.д. </p><p><strong>Синий - это отдел продаж.</strong> Тут Клиентская база и Воронка продаж, которая показывает, какие Клиенты на какой Стадии ваших взаимоотношений. Также тут можно настраивать Стратегии переговоров с Клиентами и автоматизировать Продажи с помощью интеграций.</p><p><strong>Красный - это отдел кадров</strong>. Всё про сотрудников. Тут регулируются процессы Найма, хранятся данные Кадров и расписываются Вакансии, необходимые для Проектов и задач Вашей компании. </p><p>Из чего же состоит меню? В следующем разделе мы поговорим в общих чертах о каждом из этих отделов, не сильно вдаваясь в детали, в ознакомительном режиме. Читайте <strong>Далее</strong>.</p><p>Кстати, если Вы прямо сейчас хотите прервать обучение и попасть в рабочую часть системы ФОРМА - Вы можете сделать это, нажав на оранжевую кнопку “К главной панели”. Не переживайте, Вы всегда сможете вернуться к обучению, мы будем ждать =) </p>','/regularity_images/sea-2710999_1920.jpg',1),(503,'Управление',NULL,209,NULL,'','<p>Данный раздел предназначен для менеджеров, директоров и управленцев. Независимо от количества людей в Вашем бизнесе (даже если это только Вы) - это удобный инструмент контроля, планирования и мониторинга деятельности Вашего бизнеса. Данный тип систем для управления называется АСУП - Автоматизированная система управления предприятием. Система ФОРМА максимально упрощает управление для малого бизнеса. А для проектирования сложных систем обратиться в компанию ingello (разработчик ФОРМЫ).</p><p>Позже мы детально ознакомимся с данным разделом, а сейчас можем посмотреть, как выглядит календарь. Жмите на кнопку, и возвращайтесь обратно, когда надоест (позже мы детально обсудим календарь). </p><p>{{/event||СМОТРЕТЬ КАЛЕНДАРЬ}}</p>','/regularity_images/paper-3213924_1280.jpg',1),(504,'Продукты',NULL,209,NULL,'','<p>Отдел Продуктов занимается оформлением Вашего торгового предложения. Бизнес строится на извлечении прибыли при продаже товара и\\или оказании услуги. Если у Вас всё просто и сложные функции Вам не нужны - Вы сможете просто описать свои предложения рынку, не потратив много времени. А если у Вас множество сложных товаров и услуг - отдел Продукта поможет Вам описать их во всех возможных формах и характеристиках, со всеми параметрами, атрибутами и опциями, а также распределить их по логическим категориям и подкатегориям в каталоге. Для продвинутых пользователей доступен конструктор, который позволит создавать сложные формы добавления продуктов в каталог. Он удобен для описания каталога продуктов или услуг. Об этом мы подробно поговорим в Регламенте Продуктов - в конце обзора отдела Продуктов. </p><p>Давайте продолжим разбираться, какие еще отделы есть в ФОРМЕ, а пока, если хотите, можете {{/product/product||ПОСМОТРЕТЬ СПИСОК ПРОДУКТОВ }} ?</p>','/regularity_images/ecommerce-3530785.jpg',1),(505,'Учет ресурсов',NULL,209,NULL,'','<p>Данный раздел поможет<strong> вести учет </strong>объектов в Вашей собственности. Это могут быть просто любые вещи. Например - столы, стулья, инструменты, компьютеры. Так-же это могут быть продукты, которые Вы продаёте. Более того: Вы сможете управлять целой сетью складов, производить операции <strong>закупок, транзитов и инвентаризации,</strong> учитывать <strong>накладные расходы, налоги</strong> и многое другое.</p><p>Системы такого класса называются <strong>WMR</strong> (Warehouse Management System - Система Управления Складом), а так-же имеются элементы систем типа <strong>ERP</strong> - (Enterprise Resource Planning - планирование ресурсов предприятия).</p><p>Помните, в прошлом разделе мы мельком увидели список Продуктов? А вот список наших Складов. Посмотрите их и увидите, на каком сколько продуктов находится сейчас.  {{/warehouse/warehouse||ПРОВЕРИТЬ СКЛАДЫ}}</p>','/regularity_images/ikea-2714998_1920.jpg',1),(506,'Продажи',NULL,209,NULL,'','<p>При проектировании системы ФОРМА, архитектор был убежден, что <strong>продажи</strong> - это самая важная часть любой бизнес-системы. Конечно же, всё работает в комплексе, и важны все отделы и их функции.</p><p> Но цель системы ФОРМА - это вывести бизнес <strong>на новый уровень</strong>, навести порядок в взаимоотношениях с клиентами. Все необходимые функции Вы найдёте тут. </p><p>Мы расскажем, как планировать <strong>переговоры</strong>, как <strong>обслуживать</strong> и опрашивать <strong>клиентов</strong>, как нарабатывать <strong>клиентскую базу</strong> и <strong>историю</strong> по каждому клиенту индивидуально, как разработать свою собственную <strong>стратегию</strong> <strong>продаж</strong> и <strong>автоматизировать</strong> их. </p><p>Системы такого типа называются популярным словом <strong>CRM</strong>  (Customer Relationship Management - <strong>Система управления взаимоотношениями с клиентами).</strong></p><p>Вот главная панель отдела Продаж. На ней виден прогресс по Продажам по клиентской базе.  {{/selling/default||ПОСМОТРЕТЬ ПАНЕЛЬ ПРОДАЖ}}<br></p>','/regularity_images/apples-1841132_1920.jpg',1),(507,'Кадры',NULL,209,NULL,'','<p>Даже если Вы пока один - вероятно, это не на долго. Для того, чтобы бизнес рос и распространяется, как франшиза, как вирус, - <strong>нужны кадры</strong>. Они, как говорится, “решают”. Позже мы поговорим как построить и <strong>систематизировать</strong> отдел кадров, как благодаря <strong>автоматизации</strong> избежать ненужной волокиты при <strong>найме</strong> и как перестать обучать кадровиков, а вместо этого сделать так, чтобы они обучали Вашу систему. </p><p>Отдел стоит на трёх китах - <strong>найм</strong>, <strong>вакансия</strong> и <strong>кадр</strong>. В прогрессивных областях конкуренция происходит не за клиентов, а за специалистов. И эту тенденцию важно не пропустить. </p><p>Системы такого класса называются <strong>HRM</strong> (Human Resource Management - <strong>Управление Человеко-Ресурсом</strong>).</p><p>Давайте посмотрим, как обстоят дела с распределением работы по сотрудникам  {{/hr||СМОТРЕТЬ ПАНЕЛЬ НАЙМА}}</p>','/regularity_images/basketball-108622_1920.jpg',1),(508,'Экспертные системы',NULL,209,NULL,'','<p>Данный класс систем предназначен для <strong>продвинутых</strong> компаний или предприятий, которые создаются на базе <strong>хорошего финансирования</strong> с целью <strong>скорейшего роста</strong>. Это не просто системы, <strong>это возможности</strong>. И в заключительной части мы познакомим Вас с возможностями ИТ компании ingello а также с её наработками. </p><p>Система ФОРМА - это <strong>бесплатный инструмент </strong>для компаний, который отлично подойдёт <strong>на ранних этапах развития</strong>, но планировать будущие разработки всегда лучше заранее и мы с удовольствием в этом поможем. </p><p>Поговорим о системах класса <strong>E-Commerce</strong> и <strong>Marketplace</strong> - для международной торговли, о системах <strong>PMS</strong> для управления проектами и командами, о системах <strong>HIS</strong> для медицинского обслуживания, об <strong>API</strong> системах и базах данных, про <strong>IOT</strong> - интернет вещей и умные дома, про большие данные и искусственный интеллект и даже про квантовую механику! </p><p>Спасибо, что изучаете регламент. Теперь перейдем к конкретной и формальной части.</p>','/regularity_images/person-731479_1920.jpg',1),(509,'Категории продуктов',NULL,210,NULL,'','<p>Всё начинается с того, что мы понимаем, какой сложный и разнообразный этот мир и как же сложно и многогранно всё то, чем нам интересно заниматься. Итак, если бы мы продавали телефоны, то сначала нам было бы удобно понимать, с какими Категориями Продуктов мы работаем.</p><p>Давайте посмотрим пример - какие мы придумали Категории для продажи телефонов. </p><p>{{/product/category||СМОТРЕТЬ КАТЕГОРИИ}}</p><p>Итак, Категории - это группа похожих по каким-то Характеристикам Продуктов. То есть для телефонов - это кнопки</p><p>Да, Вы наверняка уже обратили внимание на кнопку добавления новой Категории над таблицей. Давайте попробуем добавить свою Категорию. Например, Вы решили продавать самокаты (или то что Вы придумали). Но не каждый знает, насколько разными могут быть Продукты. Давайте создадим категорию под названием “Скоростные самокаты”. </p><p>{{/product/category/create||СОЗДАТЬ КАТЕГОРИЮ}} </p><p>Получилось? В следующем разделе мы добавим новый продукт.</p><p>Теперь Вы можете настроить данную категорию с помощью гибкого конструктора Характеристик. Но об этом мы поговорим позже, сейчас давайте добавим новый продукт.</p>','/regularity_images/library-5641389_1920.jpg',1),(510,'Добавлние продукта',NULL,210,NULL,'','<p>Давайте сразу к делу. Жмите на кнопку и пробуйте самостоятельно  {{/product/product/create||СОЗДАТЬ САМОКАТ}} .</p><p>А теперь давайте подробно разберемся - что же в этой форме. В левой части находится основная информация о Продукте. Тут единственное, что мы сейчас сделаем - это укажем имя. Давайте назовём его “Самокат самый быстрый”.</p><p>В правой части у нас выбор категории. Попробуйте выбрать разные категории и посмотреть, как меняется набор характеристик в зависимости от выбора. Выберите нашу категорию - “Скоростные самокаты”. Заметили, что на эту категорию характеристик нет? Конечно, мы же их пока не добавили. Но не страшно. Оставим пока всё, как есть и нажмем кнопку “Сохранить” в самом низу.  </p><p>Если у Вас много продуктов - конечно, это не обязательно добавлять их все руками, в будущем Вы сможете заказать доработку автоматического добавления и даже обновления каталога Продуктов - зависит от того, откуда эту информацию нужно взять - импортировать из excel файла поставщиков или программно скопировать из какого-то другого сайта. После того, как Вы добавили Продукт, Вы видите каталог всех Продуктов. О нём мы поговорим в следующем разделе. <br></p>','/regularity_images/container-4203677_1920.jpg',1),(511,'Каталог',NULL,210,NULL,'','<p>Каталог - это список Продуктов. Самая важная функция каталога - это искать продукты по определенным параметрам. Давайте еще раз посмотрим {{/product/product||СПИСОК ПРОДУКТОВ}}. Тут продуктов не много, но представьте, что Вы ведете учет тысяч продуктов. Как нам найти, к примеру, все определенные модели телефонов? </p><p>В таблице есть колонка “Наименование”. Под этой колонкой введите слово “Nokia” и нажмите Enter. Таким образом мы найдём все Продукты, в которых содержится данное слово. А чтобы отсортировать все записи по алфавиту - нажмите на надпись “Наименование”. </p><p>Попробуйте это на практике: {{/product/product||СПИСОК ПРОДУКТОВ}} </p><p>Таблицы такого типа называются ГРИД (grid). Это многофункциональные таблицы, в которых мы можем изменять и удалять записи, искать записи по нескольким параметрам, сортировать записи по возрастанию или убыванию (или по алфавиту) и производить импорт из (и экспорт данных в) электронные таблицы.</p><p>Если Вы выберете в каталоге категорию (выпадающий список в верху страницы) - то Вы сможете использовать специальные характеристики этой категории для поиска данных по этим характеристикам. Например, Вы можете найти все самокаты с характеристикой “скорость” равной 60км\\ч. </p><p>Выберите категорию в {{/product/product||КАТАЛОГЕ}} и потренируйтесь. </p><p>В следующем разделе мы будем говорить о самом сложном в Регламенте Продуктов - о конструкторе Характеристик. </p>','/regularity_images/color-5093046_1920.jpg',1),(512,'Хранилище',NULL,211,NULL,'','<p>Хранилище (Склад) - это некоторое пространство, в котором могут находиться Продукты, о которых нам известно из прошлых разделов. При том они там находятся в строго определенном количестве. И в этом разделе мы будем управлять Продуктами на Складах. Чтобы их добавить, нам понадобится операция Закупки. Если мы хотим перевезти Продукты со Склада на Склад - воспользуемся операцией Перемещение. Инвентаризация поможет нам осуществлять регулярные проверки Склада с реальным наличием Продукта. А про то, как осуществлять Продажи Продуктов со Склада - мы будем говорить в отдельном большом Регламенте!</p>\r\n<p>Перейдем к практике. Вот наш {{/warehouse/warehouse||СПИСОК ХРАНИЛИЩ}}. Нажмите на первый Склад. Внутри Склада Вы можете увидеть таблицу остатков на этом складе. Там видно, какой продукт в каком количестве содержится именно на этом складе. В дополнение можно видеть все даты, закупочную стоимость и другие дополнительные свойства.</p>\r\n<p>Вы можете  добавить новый склад, используя кнопку Создать хранилище в списке складов или же просто нажать на эту кнопку {{/warehouse/warehouse/create||СОЗДАНИЯ СКЛАДА}}. При создании Хранилища нужно всего-то дать ему название, адрес и выбрать страну. Попробуйте это сделать.</p>\r\n<p>После создания Хранилища Вы попадёте обратно - в список всех Складов. Нажмите на тот склад, который Вы только что создали. Тут пока пусто. В следующем разделе давайте попробуем Закупить Продукт (Товар,Услугу).</p>','/regularity_images/forklift-835340_1920.jpg',1),(513,'Поставки',NULL,211,NULL,'','<p>Поставки (они же - Закупки) - это способ пополнения запасов на Складе. На примере телефонов: мы продаём, но не производим телефоны. И для того, чтобы выставить их на свои витрины и добавить в свой каталог - нам нужно купить их, например, у завода-производителя.</p><p>Давайте сразу к практике. Посмотрим таблицу Поставок. Саму таблицу пока не будем изучать, просто нажмите на строку любой (например, первой) Поставки. Нажмите на первую строку этой таблицы: {{/purchase/main||ТАБЛИЦА ПОСТАВОК}}.</p>\r\n<p>Поставка - это операция. Это означает, что у неё есть несколько “состояний” (стадий, этапов, статусов - все называют по-разному). В системе ФОРМА есть еще несколько операций (например - Продажа, Найм сотрудника и т.д.). Мы стараемся по возможности организовывать похожий внешний вид всем похожим частям программы. Таким образом, почти любое действие в нашей системе будет выглядеть, как кнопка с текстом и иконкой. Любой список объектов в нашей системе стремиться выглядеть, как таблица с функциями поиска, сортировки, добавления и изменения пунктов. А любая операция будет похожа на то, что мы видим в форме Поставки. А что же мы в ней видим? Если кратко - есть основные данные - то есть у какого Поставщика покупаем, на какой Склад Закупаем (приходуем) и когда. А также в форме видно, какие именно Продукты мы Закупаем и сколько это будет стоить.</p>\r\n<p>Для того, чтобы изучить все эти возможности детально, давайте самостоятельно закупим тот Продукт, который мы с Вами ранее добавляли в Каталог. для этого можно нажать на кнопку “Заказать поставку” в {{/purchase/main||СПИСКЕ ПОСТАВОК}}. Или же просто нажать на {{/purchase/form/index||ЭТУ КНОПКУ}}.</p>\r\n<p>Итак, мы видим перед собой пустую форму Поставки. Так как в будущем нам предстоит работать с несколькими блоками данной формы - давайте поэтапно разберем их. </p>\r\n<p>Когда мы заказываем Поставку, сначала мы видим только один блок - “Укажите данные операции”. Это блок с основными данными Поставки. Выберите Склад, на котором есть интересующий Вас Продукт (например тот, который Вы добавили самостоятельно в прошлых разделах). Выберите Поставщика из списка справа или же добавьте нового, используя кнопку + слева от выпадающего списка. Поставщик - это тот, у кого Вы заказываете Продукт. Готово! Нажимайте “Сохранить”.</p>\r\n<p>После сохранения, открылось еще несколько блоков. </p>\r\n<p>Блок “Состояние” - очень интересный блок, в котором отображается, на каком этапе находится Поставка. Сейчас мы на этапе “Уточнение товарного состава”. Это означает, что нам нужно выбрать товар, который мы закупаем. </p><p>Блок состояний состоит по сути из двух вещей. 1. Список всех возможных состояний, где текущее отмечено отдельным цветом. 2. Список действий - состояний, в которые мы можем попасть из текущего. К примере сейчас мы уточняем товарный состав и из этого состояния мы можем перейти только в состояние оплаты. </p><p>Состояния гибко настраиваются под Ваш бизнес, об этом позже. </p>\r\n<p>Остальные состояния обсудим позже, теперь давайте посмотрим блок “Введите данные номенклатуры”. Он нужен для того, чтобы указать, какие товары мы закупаем и сколько. </p><p>Нажмите на поле ввода “Поиск в базе” в левой части блока. После нажатия отобразится список продуктов того склада, который Вы выбрали на старте. </p><p>Нажмите на тот продукт, который хотите закупить. Далее нужно указать его количество, стоимость и расходы на Поставку - налоги и накладные расходы. Налоги - это то, что нам нужно заплатить государству за то, что у нас есть дороги и прочие радости поселения. А НР (накладные расходы) - это, например, стоимость бензина, отгрузки и прочее. </p>\r\n<p>И тут важный момент. То, что мы добавляем к товару - это расходы конкретно на этот товар. Но есть отдельный блок “Накладные расходы”. В него мы можем добавлять общие расходы на всю Поставку. Всё, что мы добавим к накладным расходам - будет добавлены к общей сумме Поставки. </p>\r\n<p>Когда мы добавили все интересующие нас продукты (с помощью оранжевой кнопки +) мы можем видеть в самом последнем блоке под названием “Итоговые данные номенклатуры” итоговые суммы по этой Закупке.</p>\r\n<p>Теперь давайте переведем Закупку в следующую стадию - Оплата. Для этого в блоке “Состояния” нажмите кнопку “Перейти к оплате”. Сейчас, по идее, Вы должны рассчитываться со своим Поставщиком или оформлять предоплату. Далее, когда Поставщик подтвердил заказ - можете переводить закупку в состояние “Доставка”. И в этом состоянии у Вас 2 вариант - либо вернуться к оплате и выяснению, например, сколько товара было разбито по дороге, сколько товаров не соответствует заказу и т.д. </p><p>Либо же, если всё ок - Вы можете “Оприходовать” товар - это означает, что товар может теперь числиться на Складе. </p>\r\n<p>Давайте теперь найдем этот склад, на который Вы оприходовали - в {{/warehouse/warehouse||СПИСКЕ СКЛАДОВ}}. Если Ваш товар отображается на складе и его стало больше на то количество, в котором Вы его заказали - значит операция Закупки прошла успешно. Если нет - попробуйте еще раз, вероятно Вы что-то пропустили. Кстати, если обнаруживаете какие либо поломки или же у Вас появляются светлые идеи, как можно улучшить системы - пишите нам в чат, будем рады. </p>\r\n<p>Еще интересный и важный факт: когда товар находится в Поставке, но не оприходован - он всё равно отображается на складе, но его количество указано в колонке “Ожидается”. Это необходимо для того, чтобы, например, планировать продажи, учитывая всю картину товаров - как из наличия, так и тех, что еще не приехали на склад. <br></p>','/regularity_images/production-4408573_1920.jpg',1),(514,'Перемещение',NULL,211,NULL,'','<p>Представим - у Вас хотят закупить телефоны в Польше, а нужный товар есть только в Киеве. Нужно брать грузовик и везти товары в Польшу. Нам поможет операция “Перемещение” или “Транзит”. Это способ списать товар с одного склада и оприходовать на другом.  </p>\r\n<p>Да, Перемещение - это тоже операция. В прошлом разделе - “Закупка” - мы впервые столкнулись с операциями. Потому если Вы не проходили практику прошлого раздела - советуем ознакомиться, т.к. в этом разделе мы не будем повторно проговаривать, что такое, например, состояния и накладные расходы. </p>\r\n<p>Вот тут можно видеть все {{/transit/main||ОПЕРАЦИИ ПЕРЕМЕЩЕНИЯ.}}</p><p>Давайте создадим новую операцию. {{/transit/form/index||СОЗДАТЬ ПЕРЕМЕЩЕНИЕ}}.</p><p>Сначала укажите данные операции - откуда и куда. Выбираем склад, с которого мы перемещаем и склад, на который должен попасть товар. Можете дать название-комментарий к этому перемещению.  </p>\r\n<p>Теперь мы можем добавить товар, или же Ввести данные номенклатуры. Добавьте товар в соответствующем разделе а так же добавьте соответствующие накладные расходы на позиции и отдельно - на всю операцию перемещения. </p><p>Если у Вас появились вопросы в последних действиях - рекомендуем Вам перейти в предыдущий раздел, где мы тренировались работать с похожей операцией и разбирали всё в деталях.</p>\r\n<p>После того, как все товары и расходы указаны, мы можем оприходовать товар на тот склад, на который мы Перемещаем товар и он появится на том Складе. Можете сами проверить на новом складе: {{/warehouse/warehouse||СПИСОК СКЛАДОВ}}</p>','/regularity_images/truck-1030846_1920.jpg',1),(515,'Инвентаризация',NULL,211,NULL,'','<p>Как и все реальные объекты, Продукт (если это Товар, а не Услуга) скорее всего не лежит на месте. И периодически в месте хранения с ним происходят различные изменения. Он может качественно ухудшиться, сломаться, испортиться или его могут украсть и это критически важно учитывать, как в малом, так и крупном бизнесе. </p><p>Давайте создадим операцию инвентаризации. Нажмите кнопку \"Создать инвентаризацию\" и выберите склад на котором хотите ее провести.  {{/inventorization/main||СТРАНИЦА ИНВЕНТАРИЗАЦИЙ}}. </p>\r\n<p>После практики с Поставками и Перемещением, я думаю, Вы уже сами разобрались, что тут всё еще проще. Мы выбираем Склад, на котором будет проходить Инвентаризация, а потом в самом низу операции мы видим перечисление всех Товаров на складе и их количества. Всё что нам необходимо - это указать новое количество - фактическое. Напишите новое количество товара и в панели “Состояние” нажмите маленькую кнопку “Провести” (она маленькая, потому что её лучше нажимать обдуманно). После нажатия кнопки “Провести” на складе обновилась информация о товаре, а операция Инвентаризации добавилась в {{/inventorization/main||АРХИВ ИНВЕНТАРИЗАЦИЙ}}. </p>\r\n<p>Давайте и Склад проверим. Какой Склад Вы Инвентаризировали только что? {{/warehouse/warehouse||ВЫБРАТЬ СКЛАД}}  </p>','/regularity_images/tee-1252397_1920.jpg',1),(516,'Воронка кадров',NULL,212,NULL,'','<p>Есть такая штука, как воронка продаж, но хитрые руководители давно придумали как ее переиспользовать где это только возможно и поэтому представляем вашему вниманию {{/hr||ВОРОНКУ КАДРОВ}} =)</p><p>Данный инструмент наглядно показывает сколько людей у нас работает, сколько хочет чтоб их наняли, а сколько уже уволено. За это отвечают отдельные колонки в воронке. Если нажать на понравившийся столбик, то вы увидите таблицу со списком этих людей. </p><p>Идем дальше -&gt;</p>','/regularity_images/lechner-50119_1920.jpg',1),(517,'Вакансии',NULL,212,NULL,'','<p>Заглянем в закулисье бизнеса по продажам телефонов через интернет. И посмотрим на вакансии, которые были открыты за все время существования бизнеса. {{/vacancy/vacancy||СМОТРЕТЬ ВСЕ ВАКАНСИИ}}</p><p> Мы видим 4 вакансии, их заработную плату и описание. Давайте теперь разгрузим нашего директора и создадим вакансию “Менеджер по закупкам”. Нажмем кнопку “Создать вакансию” и заполним поля “Название”, “Описание” и “Ставка”. В описании можно детально описать обязанности менеджера, но пока введите что-то для примера. И нажмите в конце кнопку “Сохранить”. </p><p>Кнопка чтоб {{/vacancy/vacancy/create||СОЗДАТЬ ВАКАНСИЮ}}</p><p>Отлично! теперь в {{/vacancy/vacancy||СПИСКЕ ВАКАНСИЙ}} появилась новая вакансия, перейдем к кадрам.</p>','/regularity_images/office-1078869_1920.jpg',1),(518,'Кадры',NULL,212,NULL,'','<p>Если посмотреть на {{/worker/worker||СПИСОК КАДРОВ}}, то можно увидеть что их намного больше чем вакансий, это потому что мы храним историю о всех людях, которые записались к нам на собеседование. </p><p>Давайте добавим кадра, который нас заинтересовал и с кем мы бы пообщались. Нажмем кнопку {{/worker/worker/create||ДОБАВИТЬ}}. Вы увидите много полей, которые если подсвечиваются красным, то нужно заполнить, но можно поставить прочерк. </p><p>Интересной есть настройка “<strong>Кандидат подходит для вакансий</strong>\" . Из списка выберите те вакансии, на которые по вашему мнению подходит кандидат, например, “Менеджер по закупкам”. В отличии от “Претендует на должность”, данная настройка говорит о том, “<strong>на какую вакансию ВЫ хотите его нанять</strong>” и позволит выбрать кандидата для данной вакансии, а “<strong>Претендует на должность</strong>” - “<strong>на какой должности хотел бы работать кандидат</strong>”.</p><p>Теперь у нас есть кадр, которого потенциально можно нанять менеджером по закупкам. Давайте добавим ему конкурента.  Нажмем кнопку  {{/worker/worker/create||ДОБАВИТЬ}}.</p>','/regularity_images/seminar-594125_1920.jpg',1),(519,'Проекты',NULL,212,NULL,'','<p>Так бывает, что ваш бизнес достаточно разрастается, у вас появляется 2 направления деятельности, или 2 склада. А поэтому и 2 проекта. Давайте посмотрим какие проекты есть у нашего Директора. {{/project/project?ProjectSearch[state]=1||СМОТРЕТЬ ПРОЕКТЫ}}.</p><p> Он выделил главный департамент отдельно и отдельно 1 и 2 магазин, но только потому что это интернет-магазины  и менеджеров можно посадить в одном офисе. </p><p>Нажмем кнопку {{/project/project/create?p||ДОБАВИТЬ ПРОЕКТ}} и создадим проект “Электросамокаты”.<br></p><p>После создания нажмите на проекте кнопку “Добавить вакансию на проект” в {{/project/project?ProjectSearch[state]=1||СПИСКЕ ПРОЕКТОВ}}. И выберите там только что созданный проект, вакансию “менеджер по закупкам” в количестве позиций &gt; 1.</p><p> Ура осталось только выбрать кто из двух кандидатов нам больше понравился, двигаемся дальше!</p>','/regularity_images/industry-3087393_1920.jpg',1),(520,'Процесс найма',NULL,212,NULL,'','<p>Самый интересный этап. Это этап собеседований, знакомства с новыми людьми и найма. Словно вылов рыбы из реки. </p><p> Давайте начнем собеседование!</p><p>Снизу от {{/hr||ПАНЕЛИ УПРАВЛЕНИЯ}} на самой нижней карточке нужно нажать кнопку “Выбрать вакансии для найма”  И выбрать вакансию “Менеджер по закупкам”.</p><p><img src=\"https://lh6.googleusercontent.com/Tn6qH9irwdNrlcmf0jGCY6ln7vki3lXeeFFMbq4lFFpaUd8SSh6dtPFuEVpP-lG9FvjlcjlcYOsmkoTeteMLY1zjKInRGzxSVFadjp5w5jqDqBl4noeUVuvIgbsf4gZSPBg2lQ6s\"></p><p>Далее на другой странице в поле “Кадр” выбираем кадра из выпадающего списка и нажимаем кнопку “Сохранить”. Потом закрываем модальное окно.<img src=\"https://lh6.googleusercontent.com/RHvPl8IxQyzsq1qkZQvrbiromoqS0JN0qY9KBCVBdIVdnqR8jbtskyuBjm_MS3mOjjnbk23wlj0WMepRl6VjarmuuLz3Mc0RXzTnRfnfM3E2YKu8FfVoJ-8ITW7gidPO24rKMU3G\"></p><p>Все, процесс начат! Чтобы найти эту запись, нажмите на {{/hr||ПАНЕЛИ УПРАВЛЕНИЯ}} на колонку “Холод” и нажмите в таблице на нижнюю запись. Мы снова попали в процесс.</p><p>Кнопка “История” - предназначена для отображения  истории с данным кандидатом, сюда можно добавить любой комментарий.</p><p>Ниже есть блок состояний. Он предназначен для того, чтоб отмечать в какой колонке находится кандидат, в каком “состоянии”. </p><p>Предположим вы договорились о собеседовании - нажмите на маленькую кнопку “Собеседование”, так вы будете знать, что найти его можно в колонке “Собеседование”. На {{/hr||ПАНЕЛИ УПРАВЛЕНИЯ}}.</p><p>Когда мы провели таким образом несколько собеседований, отправили оффер одному из кандидатов и он его принял, то переведем кандидата в состояние  “Работа”. </p><p>Процесс найма завершен, ура! И у нас появился сотрудник,  который будет закупать электросамокаты для нашего нового направления бизнеса.</p>','/regularity_images/office-4639462_1920.jpg',1),(521,'Должностные инструкции',NULL,212,NULL,'','<p>Теперь вы готовы отстроить свою империю и делегировать найм другим. В данном разделе будут находится правила для каждой должности, прямо вместо этого текста, который Вы читаете! Как это сделать - мы узнаем в конце обучения. И теперь Вы готовы перейти к новому регламенту - регламенту Управления, который поможет руководителю контролировать свою компанию и создавать её уникальную модель.</p>','/regularity_images/video-conference-5238383_1920.jpg',1),(522,'Показатели',NULL,213,NULL,'','<p>Это пульс Вашей компании. На ней отображаются основные показатели Вашей компании. Обычно эту панель принято называть “Дэшборд”.  </p><p>Дэшборд состоит из виджетов - специальных блоков, в которых могут отображаться графики, таблицы другие формы данных. </p><p>К примеру, в ФОРМУ по умолчанию включен миниатюрный календарь, список сотрудников, состояние процессов найма, виджет воронки продаж, виджет статистики продаж по складам, виджет основных показателей и многое другое. Все эти функции мы рассмотрим в соответствующих разделах. </p><p>В каждом виджете есть специальная кнопка с тремя линиями, в которой есть основные функции виджета. Пока просто запомните, что такая есть. Она для супер-продвинутых пользователей или для тех, кто прочитал все регламенты. </p><p>Вы можете определить, какие данные Вам важнее видеть. Сейчас, в качестве первого практического взаимодействия, попробуем настроить дэшборд на Ваш вкус. Для этого мы будем перетаскивать виджеты курсором мыши в нужное Вам положение. Зажмите левую кнопку мыши на названии виджета и перемещайте его. Если виджет Вам не нужен - перетяните его в верхнюю панель (позже сможете вернуть). Если виджет Вам нужен - перетаскивайте его повыше. Если не важен - по ниже. Также можно свернуть виджет, нажав на кнопку “-”.</p><p><strong>ПОСМОТРИТЕ НА ДЭШБОРД,</strong> чтобы начать экспериментировать с панелью.</p><p>(Настраивать дэшборд можно только на большом экране)</p>','/regularity_images/chart-2785979_1920.jpg',1),(523,'Регламент',NULL,213,NULL,'','<p>Регламенты нужны для того, чтобы написать правила работы компании и пересечь эти правила с функциями системы. Это\n    очень мощная функция системы!</p><p>Интересный факт: Вы сейчас читаете регламент. Но его написал я, Олег, -\n    архитектор данной системы, других систем для малого бизнеса и ряда других коммерческих и некоммерческих систем. Но\n    никто не знает Ваш бизнес лучше, чем Вы. И потому в будущем Вы полностью перепишете регламенты Вашей компании.\n    Задача команды ingello - предоставить бесплатные функции на первое время, до начала стадии активного роста бизнеса,\n    на стадии выживания. </p><p>Регламент - это важнейший набор правил, определяющий поведение компании. Но это не\n    просто текст. Это мультифункциональный текст, в который можно зашить любую из тысяч функций системы. А давайте я\n    прямо сейчас покажу, как всё это устроено внутри.</p><p>Важно: Это может оказаться сложно для новичков, потому Вы\n    можете пропустить этот раздел и вернуться к нему позже. Либо же будьте готовы попробовать несколько раз, пока не\n    получится. А получится полюбому. </p><p>Начнем! Для начала, нажимайте эту кнопку, осмотритесь и закройте окно\n    {{/core/regularity/settings||СМОТРЕТЬ СПИСОК РЕГЛАМЕНТОВ}} </p><p>Видели этот список? Это список\n    регламентов, один из которых Вы сейчас читаете. А самое интересно это то, что в Вашей власти его изменить! Давайте\n    договоримся пока ничего не удалять, чтобы не нарушить программу. Но давайте что-нибудь добавим новое!</p><p>Чтобы не\n    добавлять что-попало, давайте создадим список должностных обязанностей. </p><p>Тогда, регламент будет называться\n    “Должностные обязанности”, а его разделы (пункты) будут называться “Обязанности менеджера”, “Обязанности продавца”,\n    “Обязанности администратора”. Нажимая на эти пункты мы будем видеть текст, в котором будут описаны эти обязанности,\n    к примеру “В обязанности продавца входит приветствовать клиента, консультировать его согласно следующим правилам….”.\n    Ну, Вы поняли, надеюсь. </p><p>Итак, попробуем добавить регламент. Вы можете нажать на предыдущую кнопку и добавить\n    новый регламент в список.</p><p>Или просто нажмите на эту кнопку и дайте название “Должностные обязанности” своему\n    собственному регламенту {{/core/regularity/create||СОЗДАЙТЕ СВОЙ РЕГЛАМЕНТ}} </p><p>Верю, что у Вас всё получилось.\n    Но давайте это проверим. Нажмите эту кнопку {{/core/regularity||РЕГЛАМЕНТЫ}}. Заметили? Теперь в регламентах\n    появился Ваш собственный регламент с названием, которое Вы написали!</p><p>Далее нужно наполнить его пунктами. То\n    есть, к примеру, должен получится \"список обязанностей для разных ролей Вашего бизнеса\". Давайте это сделаем.\n    {{/core/regularity||ОТКРОЙТЕ СПИСОК РЕГЛАМЕНТОВ И РАЗДЕЛОВ}} </p><p>Сверху (в ряд) располагаются вкладки всех\n    регламентов и среди них должен быть Ваш только что созданный. Нажмите на него и увидете кнопку “Добавить пункт”.\n    Клацайте на неё. </p><p>В появившемся окне нужно как минимум написать название пункта и его описание. Можете еще\n    выбрать его цвет. Если следовать нашему примеру, - то в название пишите должность, а в описание - обязанности этой\n    должности. И нажимайте кнопку “Добавить” внизу формы. </p><p>Повторите это действие несколько раз, чтобы наполнить\n    регламент пунктами.</p><p>А в следующем пункте мы поговорим о более сложном применении регламентов - о связывании их\n    с функциями системы. И разберемся, что за непонятные кнопочки были справа при создании регламента. </p>','/regularity_images/video-conference-5238383_1920.jpg',1),(524,'Регламент для продвинутых',NULL,213,NULL,'','<p>Теперь поговорим про беспрецедентно мощную функцию системы ФОРМА, которая способна создать из Вашего бизнеса точку непреодолимой силы на Вашем рынке. </p><p>Создайте любой новый раздел в  {{/core/regularity/create||РЕГЛАМЕНТЕ}} (как в прошлом пункте), но не спешите сохранять.</p><p>Помимо названия, описания и цвета регламента тут есть поле для загрузки картинки (в следующем разделе про презентацию мы поговорим об этом). </p><p>Сейчас нас больше интересует правая часть. В ней Вы видите карточки с какими то кнопками. </p><p>Вся правая часть делится на разные разделы, Вы могли обратить внимание, что они повторяют пункты меню системы (вот те, разноцветные, слева &lt;&lt;&lt;). Все эти функции (и не только эти) Вы можете использовать и они могут превращаться в вот такие &gt;&gt;&gt; {{/selling/default||КНОПКИ}} , при нажатии на которые мы попадаем в определенные разделы системы. </p><p>Вы программист? Скорее всего, Вы думаете, что не программист. Но теперь Вы им станете. Да и кто вообще не программист после 2020 года? =)</p><p>На каждой карточке с функцией есть 2 кнопки. Первая кнопка - это пример кнопки, которую мы можем “зашить” в текст. Нажмите на неё и всё поймёте. Вы их уже видели в регламентах. </p><p>Вторая кнопка - это волшебный код. Нажмите на неё и увидите этот код. Просто скопируйте этот код (самый интересный способ - трижды кликнув на код левой кнопкой мыши и нажав правой кнопкой). Теперь вставьте этот код в левой части в описание раздела. В ту часть, где Вы хотите, чтобы функция отображалась. К примеру, в должностные обязанности продавца можно было бы скопировать код кнопки списка клиентов или воронки продаж или кнопку создания нового процесса продажи. </p><p>Нажимайте кнопку “добавить” внизу и наслаждайтесь Вашим запрограммированным текстом в Вашем собственном регламенте.</p><p>Мне кажется, у Вас уже возникла масса идей, как можно использовать эту черную магию )</p><p>Теперь давайте посмотрим раздел “Презентация”, который тесно связан с тем, что мы уже знаем о регламентах. </p>','/regularity_images/sound-space-3851251_1920.jpg',1),(525,'Презентация',NULL,213,NULL,'','<p>Презентация - это в общем то те же самые регламенты, но в более… ээм… презентабельной … ээм… ФОРМЕ =)</p><p>По сути, это регламенты с картинками в формате типичных презентаций, но всё с теми же встроенными кнопками, которые вызывают специальные функции. </p><p>В отличии от панели настроек регламентов, тут подразумевается возможность последовательного просмотра регламентов в том порядке, в котором Вы их задали. </p><p>Вы просто начинаете с первого регламента и движетесь по разделам, нажимая кнопку “далее”. И так один за другим. </p><p>Вероятно, Вы сейчас читаете этот текст из раздела презентации. И конечно же, Вы можете всё тут поменять так, как Вам захочется. </p><p>Зайдите  в  {{/core/regularity||РЕГЛАМЕНТЫ}} и добавитье новый пункт или отредактируйте существующий (кнопка карандаша на блоке пункта).</p><p>При создании или редактировании пункта Вы можете добавлять картинку. Это должна быть большая картинка, далее она отобразится на пол экрана в презентации.</p><p>Важно поставить галочку “публичный” в настройках пункта, а также убедиться что такая же галочка установлена в регламенте. Для этого отредактируйте свой регламент в списке {{/core/regularity/settings||НАСТРОЙКИ РЕГЛАМЕНТОВ}} .  </p><p>Теперь Вы можете зайти в {{/core/regularity/regularity||ПРЕЗЕНТАЦИИ}}  и посмотреть, как это выглядит. </p><p>Вы можете также создавать презентации для Ваших клиентов и делиться с ними ссылкой на презентацию. Но важно понимать, что функции системы (кнопки) не будут для них работать. </p>','/regularity_images/innovation-561388_1920.jpg',1),(526,'Календарь',NULL,213,NULL,'','<p>Данный раздел нужен для того, чтобы планировать время и не только. </p><p>(календарем удобнее всего пользоваться на большом экране с помощью компьютерной мыши)</p><p>Календарь можно смотреть в разрезе месяца, недели, дня или повестки дня. </p><p>В верхней части календаря Вы можете видеть кнопки, которые переключают эти режимы.</p><p>Месяц - это 28-31 день “как на ладони”, в котором отображаются события. </p><p>Вы можете кликнуть на любой из дней и появится окошко, в котором Вы можете создать название и описание Вашего календарного события. </p><p>Неделя отличается тем, что тут мы видим 7 колонок, в которых видны не только сами события, но и их продолжительность. Вы можете перетягивать события с места на место или же тянуть их за нижний край, изменяя таким образом их продолжительность. </p><p>В режиме дня Вы увидите точно такую же колонку, как в неделе, но по ширине экрана. Подойдёт для детального планирования событий, которые происходят параллельно. </p><p>Теперь немного практики. Посмотрите раздел {{/event||КАЛЕНДАРЬ   }} и попробуйте создавать изменять и перетаскивать события. Это очень просто. </p><p>Интересно знать, что в процессе продаж и переговоров с клиентом Вы (а точнее менеджеры отдела продаж) можете использовать функциональность календаря, чтобы планировать встречи или созвоны для отдела продаж. Он встроен прямо в модуль переговоров, это очень удобно! </p>','/regularity_images/bulletin-board-3233653_1920.jpg',1),(527,'События',NULL,213,NULL,'','<p>В системе постоянно происходят различные события: добавили продажу, удалили клиента, изменили регламент… Все эти события строго фиксируются в системе и их можно отслеживать. Давайте на них посмотрим с помощью этой кнопки {{/core/system-event||СМОТРЕТЬ СОБЫТИЯ}}. События кратко говорят что, когда и в каком отделе произошло. Вы можете переходить прямо из событий к просмотру элементов раздела, нажимая соответствующие кнопки. Например “В отделе продаж произошло обновление клиента”. Это значит, что Тут Вы можете прямо отсюда перейти в отдел Продаж или в список Клиентов или в конкретного Клиента, данные по которому обновились. Кроме того, можно смотреть события в табличном виде, что позволяет применять поиск и сортировку всех событий. Нажмите на кнопку ”Показать таблицей”. Еще для поиска в списке Вы можете нажать кнопку “Поиск по событиям”.</p><p>Самая интересная часть раздела заключается в том, что можно подписаться на некоторые типы событий и тогда ФОРМА начнет отправлять Вам их на почту. Нажмите на кнопку “Подписаться на событие” или используйте эту кнопку {{/core/system-event-user/subscribe||ПОДПИСАТЬСЯ НА СОБЫТИЕ}}. Отметьте галочками те события, уведомления о которых Вам интересны (главное не забыть нажать на кнопку “Сохранить подписку”). </p>\r\n<p>Итак, это был последний регламент в рамках системы ФОРМА. Далее мы сможем продолжить говорить про более сложные и совсем не бесплатные программные средства автоматизации - для построения франшиз, крупных компаний и корпораций. Переходите в следующий раздел, когда будете готовы к новому этапу своего бизнеса.  </p>','/regularity_images/message-in-a-bottle-413680_1920.jpg',1),(528,'Планирование',NULL,214,NULL,'','',NULL,1),(529,'Электронная коммерция',NULL,214,NULL,'','',NULL,1),(530,'Управление магазином',NULL,214,NULL,'','',NULL,1),(531,'Обработка заявок',NULL,214,NULL,'','',NULL,1),(532,'Здоровье человека',NULL,214,NULL,'','',NULL,1),(533,'Образовательные системы',NULL,214,NULL,'','',NULL,1),(534,'IOT - интернет вещей',NULL,214,NULL,'','',NULL,1),(535,'Генератор платформ',NULL,214,NULL,'','',NULL,1),(536,'Голосовой помощник',NULL,214,NULL,'','',NULL,1),(537,'Мобильные приложения',NULL,214,NULL,'','',NULL,1),(538,'Искусственный интеллект',NULL,214,NULL,'','',NULL,1),(539,'Иммортал Инжелло',NULL,214,NULL,'','',NULL,1),(540,'Оформление продажи',NULL,215,NULL,'','<p>Если продажи так важны, почему же мы говорим о них только в середине? А потому, что мы проходили специальную подготовку и сейчас она нам всё существенно упростит. </p>\r\n<p>Давайте я докажу, что после того, как мы разобрались с отделом Продуктов и Хранилищ - продавать что-то стало проще простого. Предлагаю провести супер-быструю продажу. Нажмите на кнопку {{/selling/form||ОФОРМИТЬ ПРОДАЖУ}}. Тут всего 2 вопроса. Откуда и кому. В разделе “Место” выбираем наш склад или офис. А в разделе Клиент можно выбрать одного из наших клиентов. Сделайте это. (Кстати, Вы можете прямо отсюда добавить и склад и клиента или посмотреть о них информацию. Для этого можно нажать на соответствующие кнопки [Детали] или [Добавить]).</p>\r\n<p>На самом деле это почти всё. Нажмите кнопку Сохранить. Сейчас перед Вами очень ценный инструмент для продаж - со всеми его блоками, кнопками и индикаторами. В него зашито множество функций и он пересекается с другими отделами, которые мы уже изучали. Но сейчас давайте не будем вдумываться, для быстрой продажи нам осталось только одно - указать, какие Продукты мы продаём клиенту. И всё.  Для этого в специальном разделе “Товар” нужно выбрать товар, указать стоимость и количество, после чего нажать на кнопку “+” справа. Если товаров несколько - то нужно повторить эту операцию. И всё, не нужно нажимать никаких кнопок, по сути простейшая версия продажи только что осуществилась. Всё так просто, ведь мы уже добавили склады и настроили базовый учет. Всё так просто, ведь у нас уже описан продукт, он лежит в каталоге и на складе, просто ждёт продаж. </p>\r\n<p>Далее мы поговорим про продвинутые функции данной формы для продажи, а именно про блок коммуникаций со скриптами переговоров и мини-сайтом клиента и блок состояний. Вперед -&gt;</p>',NULL,1),(541,'Мини-сайт клиента',NULL,215,NULL,'','<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\" id=\"docs-internal-guid-d46ff904-7fff-cebd-c3b5-760c6e91872a\">Когда мы находимся в форме продаж - мы можем использовать кнопку “Ссылка для клиента”. Зайдите в одну из продаж со </p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">{{/selling/main||СПИСКА ПРОДАЖ}}. </p><p>Когда откроется продажа - нажмите на такую кнопку:</p><p><img src=\"https://lh5.googleusercontent.com/o25Egk12xm1KGg4v4QamTI8y-MPRCH3TiVtf3XSTAEGaIjx_Rrc0z4IH3sbF2fZSht3UUyZ8Lv2GuSb52Yayk4b_ruNUqwcLXFlXdQS-tJtlFO9jG81U7Haw-w6udZ4SC_EXWfaT\"><br></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">По этой ссылке Ваш клиент сможет увидеть данную форму Продажи - со списком покупаемых Продуктов, с их ценами и с итоговой ценой с учетом налогов. Важно, что клиент может самостоятельно добавлять новые Продукты к этой Продаже. Такую веб-страницу можно использовать в качестве элемента торгового предложения и в рекламе.  </p>',NULL,1),(542,'Воронка продаж',NULL,215,NULL,'','<p>Если Вы продаете телефоны поштучно через торговые точки - вероятно, никакая воронка продаж Вам не нужна. Но если Вы, например, занимаетесь организацией сети торговых точек или реализуете франчайзинговую модель или же продаете телефоны оптом - тогда процесс продажи у Вас может длиться дни и даже месяцы. Клиент проходит множество стадий - различные презентации, проверки, утверждение документов, подписание актов, опросы и так далее… </p><p>Вот пример этапов, которые мы добавили для продажи телефонов. </p><p>{{/selling/default||СМОТРЕТЬ ВОРОНКУ ПРОДАЖ}}. </p><p>Все эти разноцветные столбики - это и есть этапы. Чем больше столбик - тем большее количество сделок обрабатываются на этом этапе. Чем горячее цвет столбика - тем более важно добавить на этот этап больше сделок. </p><p>Все столбики кликабельны. То есть если Вы кликните на один из них - Вы сможете увидеть, какие именно клиенты находятся в этом состоянии и что им продаём. Кликните на какой нибудь столбик, ознакомьтесь со списком. Если Вы кликнете на какой либо элемент из данного списка - вы попадете в форму продажи, которую мы уже видели ранее. Если хотите смотреть на всю воронку в виде таблицы - то есть по сути на список всех Ваших продаж - можете нажать на кнопку “Продажи” справа от воронки или же воспользоваться вот этой кнопкой {{/selling/main||СПИСОК ПРОДАЖ}}.</p><p>Возвращаясь к вот ЭТИМ разноцветным колонкам (этапам, состояниям) на графике. В каждом бизнесе и в каждой стратегии продаж эти этапы уникальны и специфичны. Потому система ФОРМА имеет специальный конструктор для воронкой продаж, который можно перенастроить без программистов индивидуально под Ваш бизнес. А мы понимаем, что он уникальный и неповторимый, недостойный простых шаблонов. О конструкторе и поговорим далее. Вперед -&gt;</p>',NULL,1),(543,'Этапы (Состояния) продаж',NULL,215,NULL,'','<p>В этом разделе мы узнаем, как свою, персональную, уникальную и эффективную систему для продаж - и всё это без дорогих программистов - с помощью конструктора воронки продаж. Давайте вспомним, как выглядит ВОРОНКА ПРОДАЖ. Этот раздел поможет Вам настроить свои собственные стадии переговоров и связать их логически - из какой стадии в какую есть переход и какие подсказки будут в каждой из стадий. Знания языков программирования не нужны, просто следуйте процессу информирования.</p><p>Приступим… В панели продаж есть кнопка под названием “Состояния”. Нажмите на неё или на аналогичную кнопку - вот эту: {{/selling/main-state/index||СОСТОЯНИЯ}} .</p><p>Узнаёте? Это ведь те самые состояния, которые находятся в форме продаж. И те же самые, которые находятся в воронке продаж. Так вот, все эти этапы Вы можете регулировать самостоятельно. Просто нажмите “Добавить состояние” или вот эту кнопку {{/selling/main-state/create||ДОБАВИТЬ СОСТОЯНИЕ}}. Состоянию нужно дать имя. Например, пусть это будет стадия опроса клиента. Так и назовём - “Опрос”. То, что мы напишем в описании (справа) - это текст или картинки, которые будут отображаться в этом состоянии, когда мы внутри какой нибудь Продажи. Если в поле “Порядок” написать цифру - то этот этап будет идти именно таким по счёту. Поставьте цифру 2, например. И нажмите “Сохранить”.  Теперь можете зайти в {{/selling/default||ВОРОНКУ ПРОДАЖ}} и убедиться, что колонка действительно добавлена. </p><p>Давайте создадим {{/selling/form||НОВУЮ ПРОДАЖУ}}, выберем откуда и кому, нажмем сохранить. Видите? Тут в панели состояний теперь тоже появилось новое - “Опрос”. Однако, мы не можем в него перейти. Давайте разберемся - почему. Вы увидите кнопку “Изменить состояния” в блоке состояний? Если да - нажмите на неё, либо же просто нажмите на кнопку {{/selling/main-state/index||РЕДАКТИРОВАТЬ СОСТОЯНИЯ}}. </p><p>Нажмите на самое первое под названием “Не знакомы”. В правой части Вы должны увидеть блок, где Вы можете настроить переход в следующие состояния. Давайте попробуем это сделать. Поставьте “галочку” возле состояния “Опрос”. Только что мы разрешили переход из состояния “Не знакомы” в состояние “Опрос”. </p><p>Давайте создадим еще одну {{/selling/form||НОВУЮ ПРОДАЖУ}} и попробуем перейти в состояние “Опрос”. Получилось? Отлично. </p><p>Вы освоили простой элемент бизнес-конструктора. В следующих разделах мы перейдем к возможностям, касающимся конструкторов переговоров и создания собственных стратегий в продажах. </p>',NULL,1),(544,'Использование скриптов',NULL,215,NULL,'','<p>Этот раздел покажет, как систематизировать отдел продаж в плане постоянной обработки клиентов. Наша цель, чтобы наша клиентская база не застаивалась и была постоянно в движении. Каждого клиента мы стараемся перевести на новый уровень взаимоотношений. Если мы не знакомы - срочно познакомиться. Если клиент еще не имеет коммерческого предложения - предложить, если уже получил - продать, если отказался - выяснить причниу, устранить и предложить снова, если уже что-то продали - выявить потребность и продать еще что-то. Это бесконечный процесс обмена и бесконечным его делает либо то, что Вы уходите и вместо Вас приходит конкурент, либо же Вы бесконечно поддерживаете этот денежно-товарный цикл в своей компании, регулярно, изо дня в день, вечно. И в этом Вам, конечно-же, поможет система ФОРМА,</p><p>(дописать)</p>',NULL,1),(545,'Настройка скриптов',NULL,215,NULL,'','<p>Этот раздел научит нас создавать уникальные стратегии продаж и переговоров для Вашей компании, которые помогут систематизировать её рост и существенно увеличить годовой оборот. </p><p>Данные функции уже доступны в системе {{/selling/speech-module||ТУТ}}, но текст для программы обучения мы еще не написали. Не расстраивайтесь, посмотрите следующий раздел, жмите Вперед -&gt;</p>',NULL,1),(546,'Авто-генерация лидов',NULL,215,NULL,'','<p>В данном разделе мы поговорим о будущем. Мы покажем на примере, как система может автоматизировать Ваш ручной труд. Раньше для работы человек использовал только свои руки. Потом он изобрел инструменты, которые помогали ему в работе. Позже он смог приручить животных и использовать их природную силу. И на венце эволюции человек создал машину, которая может работать при его минимальном участии. Но является ли машина действительно вершиной технологического прогресса? Конечно же нет. Очередной шаг развития технологий - это платформа. Это новая производная от труда, более заманчивая и специфичная категория автоматизации. Современный предприниматель может настроить систему индивидуально под себя и полностью автоматизировать некоторую рутинную часть своей работы. Например, для привлечения клиентов часто используется много ручного и однообразного труда для того чтобы найти клиента, выполнить ряд одинаковых операций для того чтобы его оформить, проинформировать и закрыть сделку. Для такого привлечения клиента часто используются ручные и долгие или автоматические и не очень качественные рассылки, после которого человека всё равно нужно вручную оформлять. </p><p>Но с системой автоматической генерации лидов этого делать не нужно. Что если я Вам скажу, что Ваша воронка продаж может заполняться автоматически? Давайте  приведем пример, как мы раньше автоматизировали продажи в нашей ИТ компании. Наши самые ранние клиенты собирались в уютных местах, например на бирже труда или фриланса. Мы продавали услуги по разработки приложений для стартапов. И вот как мы спроектировали процесс. </p><p>Полу-автоматический режим: заходим в специальный раздел {{/selling/freelancehunt/||ГЕНЕРАЦИЯ ЛИДОВ}}. После нажатия на эту кнопку система ФОРМА идёт на сайт биржи и находит там множество потенциальной работы - проектов, вакансий, задач и так далее. Выгружали обычно тысячами. Тут для примера мы ограничили выборку до 50-ти проектов. </p><p>Система не просто находит потенциальных клиентов. Она еще и выставляет им оценки по нашему внутреннему алгоритму ранжирования. Таким образом в самом верху мы получаем только самые релевантные задания с самым высоким баллом. Более того, в описании работы система сама подчеркивает фразы, которые нам нравятся (к примеру “программирование” “проектирование” и т.д.) и фразы, которые нам НЕ нравятся (к примеру “Готовые решения” “CMS” “Быстро” “Дёшево” и так далее. </p><p>Далее мы выбираем нужный проект, нажимая на кнопку “Обработать” и попадаем в форму обработки. После того, как мы нажали кнопку “Обработать” мы автоматически добавляем данного клиента в нашу клиентскую базу и добавляем новую Продажу в воронку для этого клиента. И видим форму коммуникации с клиентом. Так же Вы можете попасть в форму, нажав ФОРМА ОБРАБОТКИ. В этой форме мы предметно знакомимся с описанием работы, даём оценку проекту, пишем уникальный ответный комментарий с предложением о сотрудничестве и нажимаем кнопку “Отправить” (Submit). Наш отзыв автоматически отправляется системой ФОРМА на сервис freelancehint, нам даже не нужно заходить в его интерфейс. </p><p>Так и в Вашем бизнесе. Знакомитесь ли Вы через соц-сети или по почте, проводите холодный обзвон или покупаете базы клиентских контактов, посещаете ли конференции и митапы - всегда есть возможность автоматизировать часть процесса. Любая автоматизация - это избавление от вынужденного рутинного труда и расходов. Стоит стремиться автоматизировать всё, кроме ключевых переговоров, в которых должен участвовать человек с человеком. И даже в таких переговорах есть секретные приемы и тактики, но об этом позже. </p><p>Итак, автоматизация - это хорошо и такие возможности предусмотрены в системе ФОРМА. Это не будущее, это настоящее, однако такую умную систему нельзя взять в готовом виде. Её необходимо разработать с профессиональным программным архитектором, менеджером проекта, программистами и другими важными именно для Вашего проекта ролями. Это интересное приключение. Нужно ли это Вам прямо сейчас? Если Вы малый бизнес и работаете менее года, никогда не использовали программные системы и всё что Вы тут читаете Вам в новинку - тогда пожалуй Вам будет достаточно существующих бесплатных функций системы для того, чтобы поднять прибыль. Но если Вы готовы к серьезному росту и расширению границ - тогда самое время рассмотреть старт строительства своей собственной системы автоматизации. Наши специалисты смогут Вам в этом помочь, спроектировать и запрограммировать систему, которая заставит Ваших конкурентов не спать по ночам от её мощи. https://ingello.com/</p>',NULL,1),(547,'Конструктор Характеристик',NULL,210,NULL,'','<p>Это сложный раздел, завершающий Регламент Продуктов. И, возможно, новичкам стоит его пропустить, тут будет чуть-чуть сложнее.</p><p>Итак, у продуктов есть что-то общее и множество отличающихся деталей в конкретных случаях. И наша задача - научиться объединять продукты по общим чертам в категории, а уникальные черты конкретных продуктов научиться описывать через характеристики. И самое важное - это понять связь между характеристиками и категориями. Начнем.</p><p>Давайте используем созданную нами ранее Категорию, или же создадим новую: {{/product/category||СПИСОК КАТЕГОРИЙ}}. </p><p>Внутри категории после её создания можно наблюдать панель справа. Тут будет список дополнительных характеристик, которые можно придумать самостоятельно. </p><p>Давайте добавим парочку, для этого нужно нажать на кнопку “+Добавить”. </p><p>В самом простом случае, мы должны дать имя этой характеристике, </p><p>Если Вы редактируете категорию “Скоростные самокаты”, которую Вы создали ранее - тогда давайте дадим характеристике название “Скорость км\\ч”. Это же скоростные самокаты. Далее давайте выберем “Тип виджета”. Это поле отвечает за внешний вид данной характеристики. Через минуту увидите, о чем я говорю. Нажмите на это поле и выберете “Число”. И теперь нажимайте “Сохранить”. </p><p>Всё, характеристика добавлена. </p><p>Давайте теперь попробуем добавить новый продукт и выбрать в нём категорию “Скоростные самокаты”. {{/product/product/create||ДОБАВИТЬ ПРОДУКТ}}. </p><p>Увидели? Характеристика, которую Вы создали, добавилась к этому самокату и теперь Вы можете указать его скорость в цифрах. Кстати, попробуйте ввести не цифры, а буквы в это поле. Не получается? Всё потому, что Вы своими собственными руками запрограммировали систему таким образом. Давайте теперь “запрограммируем” что-то еще более хитрое в характеристиках.</p><p>Вернитесь в категорию самокатов {{/product/category||КАТЕГОРИИ}} (или в форме продуктов нажмите кнопку “Редактировать текущую категорию”). </p><p>Давайте добавим еще 3 характеристики самокатов:</p><p>“Цвет корпуса”, “Дата производства” и, например, “Условия использования”. </p><p>Для цвета выберите виджет “Цвет”, для даты - “Дату”. Тут пока всё просто и очевидно, как мы делали только что. </p><p>Теперь про “Условия использования”. Тут мы придумали более интересную характеристику. Условия могут быть разные. Один самокат можно использовать в мороз, другой нельзя. Какие то могут контактировать с водой, какие то нет. По песчаной поверхности тоже не каждый может кататься. А какие то могут это всё вместе взятое. Таким образом, тут нам нужно перечислить все возможные вариации условий, а когда будем добавлять конкретный самокат - можем выбрать, какие из них подходят для этого самоката. Для таких целей есть специальный тип виджета - мультиселект (от слова Мульти Выбор). Выберите его для характеристики с названием “Условия использования”. </p><p>Когда мы выбираем виджеты такого типа, у нас появляется новое поле ввода: “Значение 1” и кнопка “+”. </p><p>Давайте введем первое значение “Условий использования” - “Дождь”. И нажмем кнопку “+”. Введем второе значение - “Снег” и нажмем снова “+”. И так далее. Грязь, Вода, Песок, Лес, Город… Можете придумать свои варианты, где можно покататься на самокате. Кстати, возле полей ввода есть такие маленькие квадратики. Если нажать на них, появится галочка, которая обозначает, что этот параметр будет выбран по умолчанию. Например, давайте нажмем на этот квадратик рядом с вариантом “Город”, ведь скорее всего любой самокат может ездить по городу. После того, как добавили все пункты - нажимайте кнопку “Сохранить”.</p><p>Теперь давайте снова {{/product/product/create||ДОБАВИМ НОВЫЙ ПРОДУКТ}}. </p><p>Выбирайте категорию “Скоростные самокаты”. И что мы видим? Появились наши новые характеристики, которые мы добавили из конструктора. При нажатии на цвет у нас выпадает красивая разноцветная палитра, позволяющая выбрать уникальный цвет или скопировать его по шестнадцатеричному идентификатору.  В дате мы можем выбирать из удобного календаря определенный день.  И самое интересное - это Условия использования. тут уже выбран “Город”, если вы отметили “Город” в конструкторе, как поле по умолчанию. И при нажатии на это поле ввода мы видим выпадающий список всех возможных вариантов. Нажмите на те, которым соответствует данная модель самоката (т.к. мы его выдумали - нажмите просто на любые пункты). </p>\r\n<p>Это был последний и самый сложный раздел Регламента, касающийся Вашего Продукта. Для закрепления материала я предлагаю Вам поработать с конструктором категорий и описать свое торговое предложение. Мы еще не говорили, что категории могут иметь подкатегории и наследовать таким образом характеристики своих родительских категорий? А вот это и будет самостоятельная работа - разобраться в этом. Вот пример: есть категория “Самокаты”. Её основные характеристики - самые общие. Цвет, размер, вес и так далее. А есть такие под-категории: “Военные самокаты”  и “Грузовые самокаты”. У них есть свои уникальные наборы характеристик, придумайте их сами. Те характеристики, что будут в под-категориях - будут идти в дополнении к характеристикам основной категории. Попробуйте это сделать самостоятельно:  {{/product/category||СМОТРЕТЬ КАТЕГОРИИ}}</p>\r\n<p>В следующем Регламенте будем говорить не только о том, как вести учет всех абстрактных Продуктов и их Характеристик, но и как работать с реальными товарами в рамках склада. Так что готовьтесь к первой закупке в системе ФОРМА. </p>',NULL,1),(548,'Услуги и Хранилища',NULL,211,NULL,'','Этот завершительный раздел Регламента по Хранилищам расскажет о том, как вести учет при продаже Услуг. Этот раздел рассчитан на высокий уровень подготовки, ведь помимо того, что нужно хорошо понимать весь пройденный до этого момента материал, так еще и фантазию нужно будет немного проявить. Если Вы еще не читали регламент по Продажам - рекомендуем Вам перейти сразу к нему, чтобы увидеть общую картину. <p>Итак. Важно: говоря в контексте Склада обычно речь идёт о Товарах, а не Продуктах. Потому что Продукт - это абстрактная вещь, Продукт - это или материальная штука - то есть Товар, или менее материальное и не вещественное понятие - Услуга. Однако наши Склады (Хранилища) могут быть использованы для учета не только Товаров, но и Услуг. Это не так привычно, но может оказаться удобно для учета компаний, предоставляющих Услуги. Склад, который хранит Услуги у нас негласно называется Офисом. И конечно же Вам не понадобится закупать и перемещать и инвентаризировать Услуги, в случае если Вы сервисная компания и не продаёте продукты - раздел Склад для Вас это просто формальность для ведения учета продаж, например, из офиса.  </p>\r\n<p>Практическое задание: необходимо придумать способ описания и учета нематериальных услуг на базе отдела Продуктов и отдела Хранилищ. Самым лучшим способом будет организация такой работы с использованием уже имеющихся функций ФОРМЫ. Однако, если фантазия разгуляется - можете представить, что у Вас есть под рукой команда программистов и Вы можете давать им задания на изменение интерфейса ФОРМЫ. А нам Вы можете отправить текст Ваших идей и как знать - возможно именно Ваше видение станет частью бесплатного инструментария системы ФОРМА.</p>\r\n<p>Мы подбираемся к самой важной части системы. Следующий регламент познакомит Вас с Продажами Продуктов через Склад (Хранилище).</p>',NULL,1);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_interface`
--

DROP TABLE IF EXISTS `item_interface`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_interface` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_item` varchar(255) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_interface`
--

LOCK TABLES `item_interface` WRITE;
/*!40000 ALTER TABLE `item_interface` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_interface` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_rule`
--

DROP TABLE IF EXISTS `item_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) DEFAULT NULL,
  `item_interface_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_rule_rule_id` (`rule_id`),
  KEY `fk_item_rule_item_interface_id` (`item_interface_id`),
  CONSTRAINT `fk_item_rule_item_interface_id` FOREIGN KEY (`item_interface_id`) REFERENCES `item_interface` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_item_rule_rule_id` FOREIGN KEY (`rule_id`) REFERENCES `rule` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_rule`
--

LOCK TABLES `item_rule` WRITE;
/*!40000 ALTER TABLE `item_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manufacturer-country_id_fk` (`country_id`),
  CONSTRAINT `manufacturer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` VALUES (10,'Meizu',204,'Москва'),(11,'Realme',204,'Питер'),(12,'Huawei',204,'Волгоград'),(13,'Samsung',204,''),(14,'Apple',204,''),(15,'Nokia',245,'Харьков'),(16,'Xiaomi',245,'Киев'),(17,'Alcatel',245,'Одесса'),(18,'Sigma',245,'Харьков'),(19,'Gigaset',130,''),(20,'Panasonic',130,''),(21,'Texet',130,''),(34,'Meizu',204,'Москва'),(35,'Realme',204,'Питер'),(36,'Huawei',204,'Волгоград'),(37,'Samsung',245,'Харьков'),(38,'Apple',245,'Киев'),(39,'Nokia',245,'Харьков Дом проектов'),(40,'Xiaomi',245,'Харьков Нетеченская 30а'),(41,'Alcatel',204,'Москва'),(42,'Sigma',204,'Екатеринбург'),(43,'Gigaset',204,'Екатеринбург'),(44,'Panasonic',130,''),(45,'Texet',130,'');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `from_user_id` int(11) NOT NULL COMMENT 'Кто',
  `to_user_id` int(11) NOT NULL COMMENT 'Кому',
  `title` varchar(500) NOT NULL COMMENT 'О чем',
  `text` text NOT NULL COMMENT 'Сообщение',
  `datetime` datetime NOT NULL COMMENT 'Когда',
  `favorit` int(11) NOT NULL COMMENT 'Избранное',
  `status` int(11) NOT NULL COMMENT 'Статус',
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1541601480),('m171008_182007_base',1543322835),('m181207_232206_add_table_worker',1544605972),('m181207_233850_add_table_vacancy',1544605972),('m181207_234922_add_table_project',1544605972),('m181207_235524_create_junction_table_for_project_and_vacancy_tables',1544605972),('m181207_235742_create_junction_table_for_project_and_user_tables',1544605973),('m181209_140101_add_relation_for_interview_table',1544606347),('m181209_142416_rename_column_title_name',1544606347),('m181209_161439_add_column_dialog_in_interview',1544606347),('m181209_162945_add_column_count_in_project_vacancy',1544610554),('m181216_152128_add_column_parent_id_for_user_table',1544983343),('m181220_143552_add_column_id_for_request_strategy',1545327578),('m181222_213415_create_junction_table_for_worker_and_vacancy_tables',1545653493),('m181225_123543_create_junction_table_for_project_and_vacancy_tables',1545744817),('m181225_163355_add_column_collaborated_in_worker',1545757345),('m210917_091608_add_messenger_columns_to_customer_table',1632467338),('m210917_092423_create_interview_state_table',1632467338),('m210917_092955_add_state_id_columns_to_interview_table',1632467339),('m210917_100612_add_table_customer_source',1632467339),('m210917_102700_add_columt_customer_customer_source',1632467339),('m210917_103413_add_columt_event_sseling_id',1632467340),('m210920_085533_update_column_selling_warehouse_id_null',1632467340),('m210920_093425_create_column_data_next_step',1632467340),('m210921_112120_table_template',1632467340),('m210922_000000_drop_table_interview_state',1633941933),('m210922_000001_drop_old_tables',1633941933),('m210923_105308_add_columnt_selling_and_event_hash_for_event',1633941933),('m210929_130935_delete_column_selling_date_next_step',1633941934),('m211012_125150_add_table_rule',1636580612),('m211012_125223_add_table_access_interface',1636580612),('m211013_140118_add_table_interface_element',1636580612),('m211013_140530_add_table_rule_item',1636580613),('m211018_095924_rename_current_mark_table_access_interface',1636580613),('m211018_100634_rename_two_column_table_rule_model_mark',1636580613),('m211022_134800_add_column_name_rule_table_rule',1636580613),('m211108_135822_add_column_capacity_warehouse',1636580613);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `overhead_cost`
--

DROP TABLE IF EXISTS `overhead_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `overhead_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `sum` double(10,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `overhead_cost_currency_id_fk` (`currency_id`),
  CONSTRAINT `overhead_cost_currency_id_fk` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=746 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `overhead_cost`
--

LOCK TABLES `overhead_cost` WRITE;
/*!40000 ALTER TABLE `overhead_cost` DISABLE KEYS */;
INSERT INTO `overhead_cost` VALUES (729,NULL,500.00,6,''),(730,1,222.00,104,'1223vvrfe'),(733,NULL,500.00,107,''),(734,1,222.00,108,'1223vvrfe'),(735,NULL,500.00,109,''),(736,1,222.00,110,'1223vvrfe'),(737,NULL,500.00,111,''),(738,1,222.00,112,'1223vvrfe'),(739,NULL,500.00,113,''),(740,1,222.00,114,'1223vvrfe'),(741,NULL,500.00,115,''),(742,1,222.00,116,'1223vvrfe'),(743,NULL,500.00,107,''),(744,1,222.00,108,'1223vvrfe'),(745,NULL,NULL,107,'');
/*!40000 ALTER TABLE `overhead_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pack_unit`
--

DROP TABLE IF EXISTS `pack_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pack_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bottles_quantity` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pack_unit`
--

LOCK TABLES `pack_unit` WRITE;
/*!40000 ALTER TABLE `pack_unit` DISABLE KEYS */;
INSERT INTO `pack_unit` VALUES (4,'Коробка',10,20),(5,'Блок',200,20),(8,'Коробка',10,20),(9,'Блок',200,20);
/*!40000 ALTER TABLE `pack_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (3,'Минфин','ул. Прохорова 5',18,'Дарья','Корнева','Валерьевна',2,'1996-10-26','г. Харьков','0660443958','','-','Носила брекеты с 1.08.17 до 14.12.17. Сейчас стоит ретейнер. \r\n','внизу справа ','','правильный','следующая чистка 11.10.18','','','',NULL,NULL),(4,'Культуры','-',18,'Алина','Богуш','Николаевна',2,'1997-01-08','г.Харьков','0504034783','','','','','','','','','','',NULL,NULL),(5,'культуры','',18,'Александр','Мовчан','Сергеевич',1,'1994-12-09','','0504024285','','','','','','','','','','',NULL,NULL),(6,'образования','г. Харьков',19,'Соня','Панкевич','Генадиевна',2,'1994-01-06','','','','','','','','','','','','',NULL,NULL);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `customs_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `note` text,
  `volume` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `year_chart` int(11) DEFAULT NULL,
  `proof` double(10,2) DEFAULT NULL,
  `batcher` tinyint(1) DEFAULT NULL,
  `rating` double(10,2) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product-country_id_fk` (`country_id`),
  KEY `field_product_category_id_fk` (`category_id`),
  KEY `field_product_type_id_fk` (`type_id`),
  KEY `product-color_id-fk` (`color_id`),
  KEY `product_manufacturer_id_fk` (`manufacturer_id`),
  CONSTRAINT `field_product_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_product_type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product-color_id-fk` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_manufacturer_id_fk` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (246,NULL,191,10,'MBLN-1',NULL,'Мобильный телефон Meizu M10 3/32GB Black','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(247,NULL,191,11,'MBLN-2',NULL,'Мобильный телефон Realme 6 8/128GB White','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(248,NULL,191,12,'MBLN-4',NULL,'Мобильный телефон Huawei P Smart 2021 128GB Gold','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(249,NULL,191,13,'MBLN',NULL,'Мобильный телефон Samsung Galaxy Note 10 Lite (SM-N770) 6/128GB Aura Silver (SM-N770FZSDSEK)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(250,NULL,191,14,'MBLN-9',NULL,'Мобильный телефон Apple iPhone 11 128GB PRODUCT Red Официальная гарантия','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(251,NULL,190,15,'MBLN-7',NULL,'Мобильный телефон Nokia 3.4 3/64GB Fjord','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(252,NULL,191,16,'MBLN-3',NULL,'Мобильный телефон Xiaomi Redmi Note 9 Pro 6/128GB Interstellar Grey','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(253,NULL,192,15,'MBLN-8',NULL,'Мобильный телефон Nokia 150 TA-1235 DualSim Black (16GMNB01A16)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(254,NULL,192,17,'MBLN-5',NULL,'Мобильный телефон Alcatel 3025 Single SIM Metallic Gray (3025X-2AALUA1)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(255,NULL,192,18,'MBLN-10',NULL,'Мобильный телефон Sigma mobile Comfort 50 Shell Duo Black-Red','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(256,NULL,193,19,'RDTL',NULL,'Радиотелефон Gigaset A116 Black','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(257,NULL,193,20,'RDTL-1',NULL,'Радиотелефон PANASONIC KX-TG2511UAT','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(258,NULL,193,20,'TLFN',NULL,'Телефон PANASONIC KX-TS2352UAB','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(259,NULL,193,21,'TLFN-1',NULL,'Телефон TEXET TX-225 Вurgundy','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(260,NULL,193,20,'TLFN-2',NULL,'Телефон PANASONIC KX-TS2356UAW','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(276,NULL,199,34,'MBLN-1',NULL,'Мобильный телефон Meizu M10 3/32GB Black','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(277,NULL,199,35,'MBLN-2',NULL,'Мобильный телефон Realme 6 8/128GB White','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(278,NULL,199,36,'MBLN-4',NULL,'Мобильный телефон Huawei P Smart 2021 128GB Gold','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(279,NULL,199,37,'MBLN',NULL,'Мобильный телефон Samsung Galaxy Note 10 Lite (SM-N770) 6/128GB Aura Silver (SM-N770FZSDSEK)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(280,NULL,199,38,'MBLN-9',NULL,'Мобильный телефон Apple iPhone 11 128GB PRODUCT Red Официальная гарантия','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(281,NULL,198,39,'MBLN-7',NULL,'Мобильный телефон Nokia 3.4 3/64GB Fjord','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(282,NULL,199,40,'MBLN-3',NULL,'Мобильный телефон Xiaomi Redmi Note 9 Pro 6/128GB Interstellar Grey','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(283,NULL,200,39,'MBLN-8',NULL,'Мобильный телефон Nokia 150 TA-1235 DualSim Black (16GMNB01A16)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(284,NULL,200,41,'MBLN-5',NULL,'Мобильный телефон Alcatel 3025 Single SIM Metallic Gray (3025X-2AALUA1)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(285,NULL,200,42,'MBLN-10',NULL,'Мобильный телефон Sigma mobile Comfort 50 Shell Duo Black-Red','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(286,NULL,201,43,'RDTL',NULL,'Радиотелефон Gigaset A116 Black','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(287,NULL,201,44,'RDTL-1',NULL,'Радиотелефон PANASONIC KX-TG2511UAT','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(288,NULL,201,44,'TLFN',NULL,'Телефон PANASONIC KX-TS2352UAB','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(289,NULL,201,45,'TLFN-1',NULL,'Телефон TEXET TX-225 Вurgundy','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(290,NULL,201,44,'TLFN-2',NULL,'Телефон PANASONIC KX-TS2356UAW','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_pack_unit`
--

DROP TABLE IF EXISTS `product_pack_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_pack_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_pack_unit_unique_index` (`product_id`,`pack_unit_id`),
  KEY `field_product_pack_unit_pack_unit_id_fk` (`pack_unit_id`),
  CONSTRAINT `field_product_pack_unit_pack_unit_id_fk` FOREIGN KEY (`pack_unit_id`) REFERENCES `pack_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_product_pack_unit_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (6,'Интернет магазин телефонов 1 и 2','Харьков, Уличная 123','<p>Данный проект развивается постепенно, но мы активно развиваем интернет торговлю, поэтому вакансии есть постоянно.</p>',1),(11,'Главный департамент','Адрессная 45','<p>Это очень интересный проект</p>',1),(14,'Интернет магазин телефонов 1 и 2','Харьков, Уличная 123','<p>Данный проект развивается постепенно, но мы активно развиваем интернет торговлю, поэтому вакансии есть постоянно.</p>',1),(15,'Главный департамент','Адрессная 45','<p>Это очень интересный проект</p>',1);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_user` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`),
  KEY `idx-project_user-project_id` (`project_id`),
  KEY `idx-project_user-user_id` (`user_id`),
  CONSTRAINT `fk-project_user-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-project_user-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_user`
--

LOCK TABLES `project_user` WRITE;
/*!40000 ALTER TABLE `project_user` DISABLE KEYS */;
INSERT INTO `project_user` VALUES (6,1),(11,1);
/*!40000 ALTER TABLE `project_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_vacancy`
--

DROP TABLE IF EXISTS `project_vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_vacancy`
--

LOCK TABLES `project_vacancy` WRITE;
/*!40000 ALTER TABLE `project_vacancy` DISABLE KEYS */;
INSERT INTO `project_vacancy` VALUES (1,6,87,2),(2,6,89,1),(3,11,86,1),(4,11,87,4),(5,11,89,3),(11,14,95,2),(12,14,97,1),(13,15,94,1),(14,15,95,4),(15,15,97,3),(16,15,98,1),(17,14,99,1);
/*!40000 ALTER TABLE `project_vacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (255,8,100,'закупаем самсунг телефоны','2020-12-10 13:24:42','2020-12-10 13:32:22',3),(256,6,100,'Закупаем китайские телефоны ','2020-12-10 13:34:37','2020-12-10 13:36:26',3),(257,6,83,'ngnhgn','2020-12-11 16:15:35',NULL,0),(264,13,139,'','2021-11-11 17:50:44','2021-11-11 17:51:08',3);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_overhead_cost`
--

DROP TABLE IF EXISTS `purchase_overhead_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_overhead_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `overhead_cost_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_overhead_cost_purchase_id_fk` (`purchase_id`),
  KEY `purchase_overhead_cost_overhead_cost_id_fk` (`overhead_cost_id`),
  CONSTRAINT `purchase_overhead_cost_overhead_cost_id_fk` FOREIGN KEY (`overhead_cost_id`) REFERENCES `overhead_cost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_overhead_cost_purchase_id_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_overhead_cost`
--

LOCK TABLES `purchase_overhead_cost` WRITE;
/*!40000 ALTER TABLE `purchase_overhead_cost` DISABLE KEYS */;
INSERT INTO `purchase_overhead_cost` VALUES (1,256,729),(2,257,730),(7,265,737),(8,266,738),(9,268,739),(10,269,740),(11,271,741),(12,272,742);
/*!40000 ALTER TABLE `purchase_overhead_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_product`
--

DROP TABLE IF EXISTS `purchase_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `pack_unit_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_product`
--

LOCK TABLES `purchase_product` WRITE;
/*!40000 ALTER TABLE `purchase_product` DISABLE KEYS */;
INSERT INTO `purchase_product` VALUES (1,277,NULL,264,10,8000.00,NULL,745,NULL,107);
/*!40000 ALTER TABLE `purchase_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regularity`
--

DROP TABLE IF EXISTS `regularity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regularity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `icon` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `regularity_ibfk_1` (`user_id`),
  CONSTRAINT `regularity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regularity`
--

LOCK TABLES `regularity` WRITE;
/*!40000 ALTER TABLE `regularity` DISABLE KEYS */;
INSERT INTO `regularity` VALUES (34,'ФОРМА Вашей компании',1,1,'<p>Добро пожаловать в режим обучения для пользователей уникального и бесплатного бизнес-инструмента “ФОРМА”. </p>\r\n<p>Наша цель - перевести Ваш бизнес в стадию активного роста. А если Вы представитель малого бизнеса - то еще и научить пользоваться упрощенной версией программной системы для управления. Мы хотим на деле увеличить прибыль Вашего дела, чтобы в будущем появилась возможность дальнейшего роста и развития отделов компании в партнерстве с нашими командами - экспертами в разработке систем для бизнеса. В основном - если говорить, опять же, о малом бизнесе - все самые низкорастущие фрукты заключаются в оптимизации регулярной работы отдела продаж. Даже если Вы в этом отделе пока что один. </p>\r\n<p>Мы начнем вплотную подбираться ко всем деталям и возможностям отдела продаж ближе к середине нашего обучения. Однако перед тем, как заняться практическим применением мощных инструментов продаж, нам придется поговорить о самых базовых вещах - а именно о  Вашем торговом предложении и его разновидностях. О Вашем Продукте (товарах или услугах) и о том, как хранится вся важная информация о них и конечно же о том, как ФОРМА поможет Вам в наведении порядка в этом деле. А перед практической частью давайте просто посмотрим на компанию в первом приближении.</p><p>Процесс обучения разбит на множество разделов, которые описывают множество возможностей системы для бизнеса. Вы можете читать эти разделы по порядку или же переходить по ним в произвольном порядке, используя специальное меню над данным текстом. Используйте кнопку “Вперед -&gt;”, чтобы продолжить обучение. </p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"></span></span></span></p>','chart-bar','/regularity_images/data-4570804_1280.jpg',1),(153,'Продукты',1,2,'<p>Спасибо за Ваше терпение, сейчас мы, наконец-то, перейдем к практике. </p><p>Давайте представим, что мы продаём электронику - например, телефоны.</p><p>{{/product/product||ПОСМОТРЕТЬ ПРОДУКТЫ}} </p><p>Продукты (они же - Товары, Услуги) - это такие объекты, которые нам важно понимать в цифрах. Например, на Складе и при Продаже этого Продукта. В этом Регламенте мы посмотрим не только на то, как создавать каталог Продуктов, но и как провести описание уникальных Продуктов с уникальными Характеристиками. Для этого у нас предусмотрен специальный конструктор в Категориях. Но обо этом в следующем разделе. </p><p><br></p>','cube','/regularity_images/ecommerce-3530785.jpg',1),(154,'Учет ресурсов',1,3,'<p>Даже если у Вас нет Склада в виде большого помещения с полками, Вам может пригодиться функциональность учета - как хозяйственных и корпоративных ресурсов, так и Продуктов - товаров или даже услуг, которые Вы продаёте.</p>\r\n<p>В данном регламенте мы узнаем, как управлять Хранилищами (или Складами), как Закупать Продукт у Поставщиков, как проводить контроль остатков (Инвентаризация) и как Перемещать Продукты в сети Складов.</p>','th','/regularity_images/ikea-2714998_1920.jpg',1),(156,'Кадры',1,5,'<p>Данный раздел нужен для найма сотрудников. Представьте что вам нужно нанять сотрудников для продажи телефонов, т.е менеджеров по продажам (сейлзов). </p><p>Что вы будете для этого делать? Правильно! Вы разместите вакансии на <strong>Work.ua</strong> или на <strong>HeadHunter</strong> или другом сайте для поиска работы и будете ждать откликов. А далее после собеседований решите кого нанимать. </p><p>Давайте пройдем путь директора, который давно этим занимается и посмотрим как он это делает.</p>','user-plus','/regularity_images/basketball-108622_1920.jpg',1),(157,'Управление',1,6,'<p>Тут будет ответ на вопрос - как создать свой собственный бренд, свою дисциплину, свою систему и свою уникальную огромную корпорацию. Этот регламент может показаться запутанным, особенно в конце, ведь мы опять будем доказывать Вам, что Вы можете легко программировать и строить свои программы, даже не зная языка программирования.  </p><p>В этом регламенте мы рассмотрим главную панель руководителя, где собирается информация о всей компании и системе. Познакомимся с регламентом и с функциями, которые позволяют сконструировать его индивидуально под свою организацию. Узнаем, как раздел презентации позволяет качественно внедрить систему в компанию. Также посмотрим, на что способен календарь. </p>','calendar','/regularity_images/paper-3213924_1280.jpg',1),(158,'Экспертные системы',1,7,'<p>Этот текст является завершением основных регламентов системы. Всё, что будет далее - это описание более экспертных систем, которые мы можем применять в бизнесе. Это не для новичков. Точнее, может и для новичков, но только для тех, кто готов к возможностям современных технологий. Мы будем говорить о дорогих и сложных современных системах. Мы выйдем за рамки ФОРМЫ, ведь она - это скорее базовые функции, ядро системы контроля и инструментарий для важнейших операций.</p><p>В этом же регламенте речь пойдёт про планирование, проектирование и сложную организацию командной работы, про интеграцию со многими сервисами (например, гугл, фейсбук, дропбокс, гитхаб), про системы электронной коммерции, про системы медицинского направления, про применение искусственного интеллекта и интернета вещей, про голосовой помощник, про гибридные мобильные приложения и даже про бессмертие. Осторожно, следующие регламенты могут изменить Ваши взгляды на вещи. ( Вперед -&gt; )</p>','users','/regularity_images/person-731479_1920.jpg',1),(159,'Продажи',1,4,'<p>Конечно, в первую очередь, нужно любить то, чем занимаешься и прекрасно, когда Вы занимаетесь, например, телефонами, просто потому, что Вам это нравится. Но в современном мире, хорошо это или плохо, единой метрикой ценности Вашей деятельности для рынка являются деньги. И часто очень хороший продукт или услуга специалиста не могут систематически реализовывать себя на рынке при активном росте, так как не имеют специальных инструментов. ФОРМА - это и есть набор бесплатных инструментов, минимально необходимых для старта роста. После старта роста можно будет смело заказывать услуги проектирования индивидуальной, уникальной системы. А сейчас цель - набраться опыта и проработать основные процессы компании. И сейчас мы поработаем с самым главным процессом. </p>\r\n<p>Мы подошли к очень простому и одновременно - достаточно сложному. Начнем с простого. Итак, почти всегда Продажи - это самая важная функция компании. Т.к. наша система минимально необходимая для повышения прибыльности малого бизнеса, мы оставили только самые основные функции, без тяжелой артиллерии. Главный экран отдела продаж выглядит вот так: {{/selling/default||ПАНЕЛЬ ПРОДАЖ}}. И в этом Регламенте мы с Вами детально познакомимся со всеми функциями этой панели. В панели мы увидели воронку продаж, которая отображает все Ваши сделки на разных этапах. Это процессы переговоров со всеми Вашими клиентами. А для того, чтобы эти процессы были эффективны, удобны и не рутинны - мы добавили ряд функций, которые помогают заключать сделки. В следующем разделе мы посмотрим, как в форме оформить продажу и главное - зачем =)</p>','money-bill-wave',NULL,1),(209,'ФОРМА Вашей компании',9,1,'<p>Добро пожаловать в режим обучения для пользователей уникального и бесплатного бизнес-инструмента “ФОРМА”. </p>\r\n<p>Наша цель - перевести Ваш бизнес в стадию активного роста. А если Вы представитель малого бизнеса - то еще и научить пользоваться упрощенной версией программной системы для управления. Мы хотим на деле увеличить прибыль Вашего дела, чтобы в будущем появилась возможность дальнейшего роста и развития отделов компании в партнерстве с нашими командами - экспертами в разработке систем для бизнеса. В основном - если говорить, опять же, о малом бизнесе - все самые низкорастущие фрукты заключаются в оптимизации регулярной работы отдела продаж. Даже если Вы в этом отделе пока что один. </p>\r\n<p>Мы начнем вплотную подбираться ко всем деталям и возможностям отдела продаж ближе к середине нашего обучения. Однако перед тем, как заняться практическим применением мощных инструментов продаж, нам придется поговорить о самых базовых вещах - а именно о  Вашем торговом предложении и его разновидностях. О Вашем Продукте (товарах или услугах) и о том, как хранится вся важная информация о них и конечно же о том, как ФОРМА поможет Вам в наведении порядка в этом деле. А перед практической частью давайте просто посмотрим на компанию в первом приближении.</p><p>Процесс обучения разбит на множество разделов, которые описывают множество возможностей системы для бизнеса. Вы можете читать эти разделы по порядку или же переходить по ним в произвольном порядке, используя специальное меню над данным текстом. Используйте кнопку “Вперед -&gt;”, чтобы продолжить обучение. </p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"></span></span></span></p>','chart-bar','/regularity_images/data-4570804_1280.jpg',1),(210,'Продукты',9,2,'<p>Спасибо за Ваше терпение, сейчас мы, наконец-то, перейдем к практике. </p><p>Давайте представим, что мы продаём электронику - например, телефоны.</p><p>{{/product/product||ПОСМОТРЕТЬ ПРОДУКТЫ}} </p><p>Продукты (они же - Товары, Услуги) - это такие объекты, которые нам важно понимать в цифрах. Например, на Складе и при Продаже этого Продукта. В этом Регламенте мы посмотрим не только на то, как создавать каталог Продуктов, но и как провести описание уникальных Продуктов с уникальными Характеристиками. Для этого у нас предусмотрен специальный конструктор в Категориях. Но обо этом в следующем разделе. </p><p><br></p>','cube','/regularity_images/ecommerce-3530785.jpg',1),(211,'Учет ресурсов',9,3,'<p>Даже если у Вас нет Склада в виде большого помещения с полками, Вам может пригодиться функциональность учета - как хозяйственных и корпоративных ресурсов, так и Продуктов - товаров или даже услуг, которые Вы продаёте.</p>\r\n<p>В данном регламенте мы узнаем, как управлять Хранилищами (или Складами), как Закупать Продукт у Поставщиков, как проводить контроль остатков (Инвентаризация) и как Перемещать Продукты в сети Складов.</p>','th','/regularity_images/ikea-2714998_1920.jpg',1),(212,'Кадры',9,5,'<p>Данный раздел нужен для найма сотрудников. Представьте что вам нужно нанять сотрудников для продажи телефонов, т.е менеджеров по продажам (сейлзов). </p><p>Что вы будете для этого делать? Правильно! Вы разместите вакансии на <strong>Work.ua</strong> или на <strong>HeadHunter</strong> или другом сайте для поиска работы и будете ждать откликов. А далее после собеседований решите кого нанимать. </p><p>Давайте пройдем путь директора, который давно этим занимается и посмотрим как он это делает.</p>','user-plus','/regularity_images/basketball-108622_1920.jpg',1),(213,'Управление',9,6,'<p>Тут будет ответ на вопрос - как создать свой собственный бренд, свою дисциплину, свою систему и свою уникальную огромную корпорацию. Этот регламент может показаться запутанным, особенно в конце, ведь мы опять будем доказывать Вам, что Вы можете легко программировать и строить свои программы, даже не зная языка программирования.  </p><p>В этом регламенте мы рассмотрим главную панель руководителя, где собирается информация о всей компании и системе. Познакомимся с регламентом и с функциями, которые позволяют сконструировать его индивидуально под свою организацию. Узнаем, как раздел презентации позволяет качественно внедрить систему в компанию. Также посмотрим, на что способен календарь. </p>','calendar','/regularity_images/paper-3213924_1280.jpg',1),(214,'Экспертные системы',9,7,'<p>Этот текст является завершением основных регламентов системы. Всё, что будет далее - это описание более экспертных систем, которые мы можем применять в бизнесе. Это не для новичков. Точнее, может и для новичков, но только для тех, кто готов к возможностям современных технологий. Мы будем говорить о дорогих и сложных современных системах. Мы выйдем за рамки ФОРМЫ, ведь она - это скорее базовые функции, ядро системы контроля и инструментарий для важнейших операций.</p><p>В этом же регламенте речь пойдёт про планирование, проектирование и сложную организацию командной работы, про интеграцию со многими сервисами (например, гугл, фейсбук, дропбокс, гитхаб), про системы электронной коммерции, про системы медицинского направления, про применение искусственного интеллекта и интернета вещей, про голосовой помощник, про гибридные мобильные приложения и даже про бессмертие. Осторожно, следующие регламенты могут изменить Ваши взгляды на вещи. ( Вперед -&gt; )</p>','users','/regularity_images/person-731479_1920.jpg',1),(215,'Продажи',9,4,'<p>Конечно, в первую очередь, нужно любить то, чем занимаешься и прекрасно, когда Вы занимаетесь, например, телефонами, просто потому, что Вам это нравится. Но в современном мире, хорошо это или плохо, единой метрикой ценности Вашей деятельности для рынка являются деньги. И часто очень хороший продукт или услуга специалиста не могут систематически реализовывать себя на рынке при активном росте, так как не имеют специальных инструментов. ФОРМА - это и есть набор бесплатных инструментов, минимально необходимых для старта роста. После старта роста можно будет смело заказывать услуги проектирования индивидуальной, уникальной системы. А сейчас цель - набраться опыта и проработать основные процессы компании. И сейчас мы поработаем с самым главным процессом. </p>\r\n<p>Мы подошли к очень простому и одновременно - достаточно сложному. Начнем с простого. Итак, почти всегда Продажи - это самая важная функция компании. Т.к. наша система минимально необходимая для повышения прибыльности малого бизнеса, мы оставили только самые основные функции, без тяжелой артиллерии. Главный экран отдела продаж выглядит вот так: {{/selling/default||ПАНЕЛЬ ПРОДАЖ}}. И в этом Регламенте мы с Вами детально познакомимся со всеми функциями этой панели. В панели мы увидели воронку продаж, которая отображает все Ваши сделки на разных этапах. Это процессы переговоров со всеми Вашими клиентами. А для того, чтобы эти процессы были эффективны, удобны и не рутинны - мы добавили ряд функций, которые помогают заключать сделки. В следующем разделе мы посмотрим, как в форме оформить продажу и главное - зачем =)</p>','money-bill-wave',NULL,1);
/*!40000 ALTER TABLE `regularity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) DEFAULT NULL,
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (1,'Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?',1),(2,'Какой у вас опыт ?',1),(3,'вы уверены в своих силах?',1),(4,'Добрый день, нам поступила ваша заявка на покупку \"перечень товаров\", правильно?',1),(5,'Как бы вы хотели оформить заявку: новой почтой, джастин ?',1),(6,'Сколько стоит доставка ?',0),(13,'Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?',1),(14,'Какой у вас опыт ?',1),(15,'вы уверены в своих силах?',1),(16,'Добрый день, нам поступила ваша заявка на покупку \"перечень товаров\", правильно?',1),(17,'Как бы вы хотели оформить заявку: новой почтой, джастин ?',1),(18,'Сколько стоит доставка ?',0);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_strategy`
--

DROP TABLE IF EXISTS `request_strategy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_strategy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strategy_id` int(11) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-strategy-id` (`strategy_id`),
  KEY `fk-request-id` (`request_id`),
  CONSTRAINT `fk-request-id` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-strategy-id` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_strategy`
--

LOCK TABLES `request_strategy` WRITE;
/*!40000 ALTER TABLE `request_strategy` DISABLE KEYS */;
INSERT INTO `request_strategy` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,4),(5,2,5),(6,2,6),(49,18,13),(50,18,14),(51,18,15),(52,19,16),(53,19,17),(54,19,18);
/*!40000 ALTER TABLE `request_strategy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rule`
--

DROP TABLE IF EXISTS `rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `count_action` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `rule_name` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rule_item_id` (`item_id`),
  CONSTRAINT `fk_rule_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rule`
--

LOCK TABLES `rule` WRITE;
/*!40000 ALTER TABLE `rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selling`
--

DROP TABLE IF EXISTS `selling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selling`
--

LOCK TABLES `selling` WRITE;
/*!40000 ALTER TABLE `selling` DISABLE KEYS */;
INSERT INTO `selling` VALUES (1,143,101,1,'11111','2020-12-03 18:59:59','2020-12-03 17:04:31','10.12.2020 12:39:05<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>\n                                        \n                                        Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>да</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p> gg,j g</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">yufuk</div>10.12.2020 12:39:46<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>cg nc</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\"> g</div>10.12.2020 12:43:30<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>да</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>-</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">-</div>10.12.2020 12:46:43<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Как бы вы хотели оформить заявку: новой почтой, джастин ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>новой почтой</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>-</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">-</div>10.12.2020 12:56:45<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>\n                                        \n                                        Как бы вы хотели оформить заявку: новой почтой, джастин ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>новой почтой</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>ьг р</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\"> не</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\"> не</div>','OBKVs8PydaOBWQ3w_AFr9xdAtj1eQfW7'),(2,144,83,9,'2','2020-12-03 19:05:08','2020-12-03 17:08:38',NULL,NULL,'ZJx25OwTgWxhd9QAQVW80WaZjwInO7Dq'),(3,143,82,6,'3','2020-12-03 19:10:54','2020-12-10 11:57:41','03.12.2020 17:55:58<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Добрый день, нам поступила ваша заявка на покупку \"перечень товаров\", правильно?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>да</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Как бы вы хотели оформить заявку: новой почтой, джастин ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>джастин</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>Анна Белая, отделение 51</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">отправка товара</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">отправка товара</div>','NkngJ7yQIOd4SD6EUoZ9Qytn-Qbd1qCg'),(4,143,100,2,'4','2020-12-10 13:39:25',NULL,NULL,NULL,'x8DjEjNv-PF6gcafgchwxMf__6x2DSpw'),(5,143,101,5,'5','2020-12-10 13:40:38',NULL,NULL,NULL,'TpLJALs4k8KlL2sWPzE75rvdYnEZ0Y6K'),(6,143,99,6,'66','2020-12-10 13:41:29','2020-12-10 11:42:27',NULL,NULL,'EU9eLuisfoZVbvsgPs7esfYHoru8Crf7'),(7,144,83,7,'7','2020-12-10 13:44:33','2020-12-10 11:44:48',NULL,NULL,'gHQfF8h2a3v-DbEKH1r3HlWIpBfW8RT0'),(8,144,101,8,'8','2020-12-10 13:45:48','2020-12-10 11:45:53',NULL,NULL,'NUzJ8mZpou_QeOf_uB3wehJIctEUJsPt'),(9,144,83,4,'9','2020-12-10 13:48:38',NULL,NULL,NULL,'Sb1TTLOO77If-kr5Ag4wmUJj_2KpdEWL'),(10,145,82,1,'10','2020-12-10 13:55:14',NULL,NULL,NULL,'DCsVaIvIoy8IXAv0vXyaqJbOBVPWhjMM'),(11,145,83,2,'11','2020-12-10 13:55:37',NULL,NULL,NULL,'aYoUM3WbGabvVwWdgn8dDL6zlUrEBsxj'),(12,145,99,5,'12','2020-12-10 13:56:10',NULL,NULL,NULL,'ygXco0lOSm9F0E71eZISYHYGuukFlxZk'),(13,146,101,6,'13','2020-12-10 13:56:34','2020-12-10 11:56:39',NULL,NULL,'lcZ0QTETRg95cN1t68KmD-bkkQzib3i5'),(14,146,100,6,'14','2020-12-10 13:56:47','2020-12-10 11:56:51',NULL,NULL,'YKKALYJlq7ZPM0OHZub6gnnYdDtdsnNN'),(15,146,83,2,'15','2020-12-10 13:58:42',NULL,NULL,NULL,'AaqJBR5BWZb2S0yCyhtz3sbCZUEfRF-V'),(43,163,106,NULL,'43','2021-03-03 10:49:49',NULL,'03.03.2021 08:50:32<br/><div style=\"background: #d2d6de;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p><span class=\"ynRLnc\" style=\"background-color: initial;\">Описание:</span><html-blob style=\"background-color: initial;\"><a href=\"https://www.google.com/url?q=https://freelancehunt.com/mailbox/read/thread/5081522%23last-message&sa=D&source=calendar&usd=2&usg=AOvVaw3FnjayG3sl6hXdcJVXAy5r\" target=\"_blank\">https://freelancehunt.com/mailbox/read/thread/5081522#last-message</a> </html-blob></p><p><br><br></p><p>Требуется опытный Бэкграунд программист на базе Laravel!</p><p>Прошу вас ознакомится с ТЗ и в личные сообщения описать:</p><p>1. Цены<br>2. Сроки<br>3. Ваши условия (если есть)<br>4. На какой Админке собираетесь строить проект и почему.</p><p><a href=\"https://www.google.com/url?q=https://content.freelancehunt.com/projectsnippet/ad990/3fe20/313886/%25D0%25A2%25D0%2597%2B%25D0%25B4%25D0%25BB%25D1%258F%2B%25D0%25B8%25D0%25BD%25D1%2582%25D0%25B5%25D0%25B3%25D1%2580%25D0%25B0%25D1%2586%25D0%25B8%25D0%25B8.pdf&sa=D&source=calendar&usd=2&usg=AOvVaw0rZ9oJ1zD7skZ2A-jptJxS\" target=\"_blank\">https://content.freelancehunt.com/projectsnippet/ad990/3fe20/313886/%D0%A2%D0%97+%D0%B4%D0%BB%D1%8F+%D0%B8%D0%BD%D1%82%D0%B5%D0%B3%D1%80%D0%B0%D1%86%D0%B8%D0%B8.pdf</a></p></div>03.03.2021 08:50:41<br/><div style=\"background: #d2d6de;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p><span class=\"ynRLnc\">Описание:</span><html-blob><a href=\"https://www.google.com/url?q=https://freelancehunt.com/mailbox/read/thread/5081522%23last-message&sa=D&source=calendar&usd=2&usg=AOvVaw3FnjayG3sl6hXdcJVXAy5r\" target=\"_blank\">https://freelancehunt.com/mailbox/read/thread/5081522#last-message</a> </html-blob></p><p><br><br></p><p>Требуется опытный Бэкграунд программист на базе Laravel!</p><p>Прошу вас ознакомится с ТЗ и в личные сообщения описать:</p><p>1. Цены<br>2. Сроки<br>3. Ваши условия (если есть)<br>4. На какой Админке собираетесь строить проект и почему.</p><p><a href=\"https://www.google.com/url?q=https://content.freelancehunt.com/projectsnippet/ad990/3fe20/313886/%25D0%25A2%25D0%2597%2B%25D0%25B4%25D0%25BB%25D1%258F%2B%25D0%25B8%25D0%25BD%25D1%2582%25D0%25B5%25D0%25B3%25D1%2580%25D0%25B0%25D1%2586%25D0%25B8%25D0%25B8.pdf&sa=D&source=calendar&usd=2&usg=AOvVaw0rZ9oJ1zD7skZ2A-jptJxS\" target=\"_blank\">https://content.freelancehunt.com/projectsnippet/ad990/3fe20/313886/%D0%A2%D0%97+%D0%B4%D0%BB%D1%8F+%D0%B8%D0%BD%D1%82%D0%B5%D0%B3%D1%80%D0%B0%D1%86%D0%B8%D0%B8.pdf</a></p></div>',NULL,'kl2lDrV7bvEuzt7BKW0qQGNwIvF1Eymy'),(44,164,82,1,'44','2021-03-03 17:15:54',NULL,NULL,NULL,'GNpvbQqYTAF9WoXbFJruRPGTcAKiRuqQ'),(45,165,82,1,'45','2021-03-03 18:38:16',NULL,NULL,NULL,'ngw1_h2b-p9NiMvOJCay7cbxc7i_OTE6'),(46,166,82,1,'46','2021-03-03 18:38:53',NULL,NULL,NULL,'nfMteB9SjLcR9KXEF0xXZ2KSfWlYVany'),(65,174,142,67,'11111','2020-03-12 18:59:00','2020-12-03 17:04:31','10.12.2020 12:39:05<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>\n                                        \n                                        Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>да</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p> gg,j g</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">yufuk</div>10.12.2020 12:39:46<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>cg nc</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\"> g</div>10.12.2020 12:43:30<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>да</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>-</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">-</div>10.12.2020 12:46:43<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Как бы вы хотели оформить заявку: новой почтой, джастин ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>новой почтой</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>-</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">-</div>10.12.2020 12:56:45<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>\n                                        \n                                        Как бы вы хотели оформить заявку: новой почтой, джастин ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>новой почтой</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>ьг р</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\"> не</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\"> не</div>','OBKVs8PydaOBWQ3w_AFr9xdAtj1eQfW7'),(66,175,139,74,'2','2020-03-12 19:05:00','2020-12-03 17:08:38',NULL,NULL,'ZJx25OwTgWxhd9QAQVW80WaZjwInO7Dq'),(67,174,138,71,'3','2020-03-12 19:10:00','2020-12-10 11:57:41','03.12.2020 17:55:58<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Добрый день, нам поступила ваша заявка на покупку \"перечень товаров\", правильно?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>да</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Как бы вы хотели оформить заявку: новой почтой, джастин ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>джастин</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>Анна Белая, отделение 51</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">отправка товара</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">отправка товара</div>','NkngJ7yQIOd4SD6EUoZ9Qytn-Qbd1qCg'),(68,174,141,68,'4','2020-10-12 13:39:00',NULL,NULL,NULL,'x8DjEjNv-PF6gcafgchwxMf__6x2DSpw'),(69,174,142,70,'5','2020-10-12 13:40:00',NULL,NULL,NULL,'TpLJALs4k8KlL2sWPzE75rvdYnEZ0Y6K'),(70,174,140,71,'66','2020-10-12 13:41:00','2020-12-10 11:42:27',NULL,NULL,'EU9eLuisfoZVbvsgPs7esfYHoru8Crf7'),(71,175,139,72,'7','2020-10-12 13:44:00','2020-12-10 11:44:48',NULL,NULL,'gHQfF8h2a3v-DbEKH1r3HlWIpBfW8RT0'),(72,175,142,73,'8','2020-10-12 13:45:00','2020-12-10 11:45:53',NULL,NULL,'NUzJ8mZpou_QeOf_uB3wehJIctEUJsPt'),(73,175,139,69,'9','2020-10-12 13:48:00',NULL,NULL,NULL,'Sb1TTLOO77If-kr5Ag4wmUJj_2KpdEWL'),(74,176,138,67,'10','2020-10-12 13:55:00',NULL,NULL,NULL,'DCsVaIvIoy8IXAv0vXyaqJbOBVPWhjMM'),(75,176,139,68,'11','2020-10-12 13:55:00',NULL,NULL,NULL,'aYoUM3WbGabvVwWdgn8dDL6zlUrEBsxj'),(76,176,140,70,'12','2020-10-12 13:56:00',NULL,NULL,NULL,'ygXco0lOSm9F0E71eZISYHYGuukFlxZk'),(77,177,142,71,'13','2020-10-12 13:56:00','2020-12-10 11:56:39',NULL,NULL,'lcZ0QTETRg95cN1t68KmD-bkkQzib3i5'),(78,177,141,71,'14','2020-10-12 13:56:00','2020-12-10 11:56:51',NULL,NULL,'YKKALYJlq7ZPM0OHZub6gnnYdDtdsnNN'),(79,177,139,68,'15','2020-10-12 13:58:00',NULL,NULL,NULL,'AaqJBR5BWZb2S0yCyhtz3sbCZUEfRF-V'),(80,178,138,67,'44','2021-03-03 17:15:00',NULL,NULL,NULL,'GNpvbQqYTAF9WoXbFJruRPGTcAKiRuqQ'),(81,179,138,67,'45','2021-03-03 18:38:00',NULL,NULL,NULL,'ngw1_h2b-p9NiMvOJCay7cbxc7i_OTE6'),(82,180,138,67,'46','2021-03-03 18:38:00',NULL,NULL,NULL,'nfMteB9SjLcR9KXEF0xXZ2KSfWlYVany');
/*!40000 ALTER TABLE `selling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selling_product`
--

DROP TABLE IF EXISTS `selling_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selling_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `selling_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selling_product`
--

LOCK TABLES `selling_product` WRITE;
/*!40000 ALTER TABLE `selling_product` DISABLE KEYS */;
INSERT INTO `selling_product` VALUES (3,249,2,2,6825.00,0,NULL,104,NULL),(5,339,66,2,6825.00,0,NULL,116,NULL),(6,279,66,2,6825.00,0,NULL,108,NULL);
/*!40000 ALTER TABLE `selling_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `description` varchar(6500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_ibfk_1` (`user_id`),
  CONSTRAINT `state_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Не знакомы',1,2,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(2,'Презентация',1,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(4,'Есть интерес',1,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(5,'Согласована цена',1,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(6,'Продажа совершена',1,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(7,'Товар отправлен',1,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(8,'Возврат',1,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(9,'Архив',1,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>'),(67,'Не знакомы',9,2,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(68,'Презентация',9,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(69,'Есть интерес',9,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(70,'Согласована цена',9,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(71,'Продажа совершена',9,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(72,'Товар отправлен',9,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(73,'Возврат',9,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(74,'Архив',9,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state_to_state`
--

DROP TABLE IF EXISTS `state_to_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state_to_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `to_state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_to_state_ibfk_1` (`state_id`),
  KEY `state_to_state_ibfk_2` (`to_state_id`),
  CONSTRAINT `state_to_state_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `state_to_state_ibfk_2` FOREIGN KEY (`to_state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=616 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state_to_state`
--

LOCK TABLES `state_to_state` WRITE;
/*!40000 ALTER TABLE `state_to_state` DISABLE KEYS */;
INSERT INTO `state_to_state` VALUES (7,2,7),(8,2,1),(9,5,6),(15,2,8),(23,4,8),(25,6,7),(506,8,5),(518,9,7),(519,9,6),(520,7,8),(521,7,9),(597,1,2),(598,1,4),(599,1,5),(600,1,6),(601,68,72),(602,68,67),(603,70,71),(604,68,73),(605,69,73),(606,71,72),(607,73,70),(608,74,72),(609,74,71),(610,72,73),(611,72,74),(612,67,68),(613,67,69),(614,67,70),(615,67,71);
/*!40000 ALTER TABLE `state_to_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategy`
--

DROP TABLE IF EXISTS `strategy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `strategy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategy`
--

LOCK TABLES `strategy` WRITE;
/*!40000 ALTER TABLE `strategy` DISABLE KEYS */;
INSERT INTO `strategy` VALUES (1,'Собеседование на должность менеджера по продажам','Подходит для найма на эту вакансию'),(2,'Обработка заказа','Этот скрипт подойдет чтоб поговорить с клиентом, который уже готов заказать товар.'),(18,'Собеседование на должность менеджера по продажам','Подходит для найма на эту вакансию'),(19,'Обработка заказа','Этот скрипт подойдет чтоб поговорить с клиентом, который уже готов заказать товар.');
/*!40000 ALTER TABLE `strategy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (6,'Вадим Ок Инвест','Ок Инвест','Вадим Олегович',245,'Харьков, Сумская 21-в','olpmaster@gmail.com',10.00),(8,'Алла - Самсунг','Самсунг','Алла Владимировна',260,'Прага','olijenius@gmail.com',10.00),(13,'Андрей','','',NULL,'','',NULL);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_event`
--

DROP TABLE IF EXISTS `system_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `application` varchar(45) NOT NULL DEFAULT ' ',
  `module` varchar(45) NOT NULL,
  `data` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `class_name` varchar(100) NOT NULL,
  `request_uri` varchar(500) NOT NULL,
  `sender_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_system_event_1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19660 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_event`
--

LOCK TABLES `system_event` WRITE;
/*!40000 ALTER TABLE `system_event` DISABLE KEYS */;
INSERT INTO `system_event` VALUES (19110,'2020-12-16 14:16:04','HRM','Найм','Работник Удален: \"Алина\" пользователем admin',1,'Worker','/worker/worker/delete?id=51',51),(19111,'2020-12-16 14:29:02','BOSS','Регламент','Регламент Обновлен: \"Ваша компания\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19112,'2020-12-16 14:33:20','BOSS','Регламент','Регламент Обновлен: \"Продукты\" пользователем admin',1,'Regularity','/core/regularity/update?id=153',153),(19113,'2020-12-16 14:33:39','BOSS','Регламент','Регламент Обновлен: \"Продукты\" пользователем admin',1,'Regularity','/core/regularity/update?id=153',153),(19114,'2020-12-16 14:34:04','BOSS','Регламент','Регламент Обновлен: \"Ваша компания\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19115,'2020-12-16 14:34:54','BOSS','Регламент','Регламент Обновлен: \"Ваша компания\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19116,'2020-12-16 14:50:06','BOSS','Регламент','Шаблон Обновлен: \"Форма\" пользователем admin',1,'Item','/core/item/update?id=1',1),(19117,'2020-12-16 14:51:35','BOSS','Регламент','Шаблон Обновлен: \"Форма\" пользователем admin',1,'Item','/core/item/update?id=1',1),(19118,'2020-12-16 14:52:18','BOSS','Регламент','Регламент Обновлен: \"Ваша компания\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19119,'2020-12-16 14:56:27','BOSS','Регламент','Шаблон Создан: \"рр\" пользователем admin',1,'Item','/core/item/create?regularity_id=34',156),(19120,'2020-12-16 15:12:36','BOSS','Регламент','Шаблон Обновлен: \"Навигация\" пользователем admin',1,'Item','/core/item/update?id=2',2),(19121,'2020-12-16 15:13:33','BOSS','Регламент','Шаблон Обновлен: \"Навигация\" пользователем admin',1,'Item','/core/item/update?id=2',2),(19122,'2020-12-16 15:15:11','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19123,'2020-12-16 15:15:30','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19124,'2020-12-16 15:16:25','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19125,'2020-12-16 15:17:09','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19126,'2020-12-16 15:17:48','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19127,'2020-12-16 15:20:09','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19128,'2020-12-16 15:20:22','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19129,'2020-12-16 15:20:33','BOSS','Регламент','Шаблон Обновлен: \"Управление\" пользователем admin',1,'Item','/core/item/update?id=98',98),(19130,'2020-12-16 15:23:30','BOSS','Регламент','Шаблон Обновлен: \"Продукты\" пользователем admin',1,'Item','/core/item/update?id=99',99),(19131,'2020-12-16 15:25:21','BOSS','Регламент','Шаблон Обновлен: \"Учет ресурсов\" пользователем admin',1,'Item','/core/item/update?id=100',100),(19132,'2020-12-16 15:25:43','BOSS','Регламент','Шаблон Обновлен: \"Учет ресурсов\" пользователем admin',1,'Item','/core/item/update?id=100',100),(19133,'2020-12-16 15:25:58','BOSS','Регламент','Шаблон Обновлен: \"Форма\" пользователем admin',1,'Item','/core/item/update?id=1',1),(19134,'2020-12-16 15:28:50','BOSS','Регламент','Шаблон Обновлен: \"Продажи\" пользователем admin',1,'Item','/core/item/update?id=101',101),(19135,'2020-12-16 15:29:32','BOSS','Регламент','Регламент Обновлен: \"Ваша компания\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19136,'2020-12-16 15:30:08','BOSS','Регламент','Шаблон Обновлен: \"Кадры\" пользователем admin',1,'Item','/core/item/update?id=102',102),(19137,'2020-12-16 15:32:59','BOSS','Регламент','Шаблон Обновлен: \"Экспертные системы\" пользователем admin',1,'Item','/core/item/update?id=117',117),(19138,'2020-12-16 15:34:04','BOSS','Регламент','Регламент Обновлен: \"Продукты\" пользователем admin',1,'Regularity','/core/regularity/update?id=153',153),(19139,'2020-12-16 15:36:18','BOSS','Регламент','Регламент Обновлен: \"Продукты\" пользователем admin',1,'Regularity','/core/regularity/update?id=153',153),(19140,'2020-12-16 15:38:07','BOSS','Регламент','Шаблон Обновлен: \"Навигация\" пользователем admin',1,'Item','/core/item/update?id=2',2),(19141,'2020-12-16 15:45:33','BOSS','Регламент','Регламент Обновлен: \"Ваша компания\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19142,'2020-12-16 15:45:41','BOSS','Регламент','Шаблон Обновлен: \"Категории продуктов\" пользователем admin',1,'Item','/core/item/update?id=118',118),(19143,'2020-12-16 15:46:12','BOSS','Регламент','Регламент Обновлен: \"Ваша компания\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19144,'2020-12-16 15:46:17','BOSS','Регламент','Шаблон Обновлен: \"Категории продуктов\" пользователем admin',1,'Item','/core/item/update?id=118',118),(19145,'2020-12-16 15:47:56','BOSS','Регламент','Шаблон Обновлен: \"Форма продукта\" пользователем admin',1,'Item','/core/item/update?id=119',119),(19146,'2020-12-16 15:49:10','BOSS','Регламент','Регламент Обновлен: \"Учет ресурсов\" пользователем admin',1,'Regularity','/core/regularity/update?id=154',154),(19147,'2020-12-16 15:50:24','BOSS','Регламент','Шаблон Обновлен: \"Склад\" пользователем admin',1,'Item','/core/item/update?id=121',121),(19148,'2020-12-16 15:51:43','BOSS','Регламент','Шаблон Обновлен: \"Навигация\" пользователем admin',1,'Item','/core/item/update?id=2',2),(19149,'2020-12-16 15:51:55','BOSS','Регламент','Регламент Обновлен: \"Управление\" пользователем admin',1,'Regularity','/core/regularity/update?id=157',157),(19150,'2020-12-16 15:52:43','BOSS','Регламент','Шаблон Обновлен: \"Навигация\" пользователем admin',1,'Item','/core/item/update?id=2',2),(19151,'2020-12-16 15:58:04','HRM','Проект','Вакансия для проекта Создан:  пользователем admin',1,'ProjectVacancy','/project/project-vacancy/create?id=6',1),(19152,'2020-12-16 15:58:22','HRM','Проект','Вакансия для проекта Создан:  пользователем admin',1,'ProjectVacancy','/project/project-vacancy/create?id=6',2),(19153,'2020-12-16 15:59:02','HRM','Проект','Вакансия для проекта Создан:  пользователем admin',1,'ProjectVacancy','/project/project-vacancy/create?id=11',3),(19154,'2020-12-16 15:59:18','HRM','Проект','Вакансия для проекта Создан:  пользователем admin',1,'ProjectVacancy','/project/project-vacancy/create?id=11',4),(19155,'2020-12-16 15:59:36','HRM','Проект','Вакансия для проекта Создан:  пользователем admin',1,'ProjectVacancy','/project/project-vacancy/create?id=11',5),(19156,'2020-12-16 16:26:53','BOSS','Регламент','Шаблон Обновлен: \"Регламент\" пользователем admin',1,'Item','/core/item/update?id=139',139),(19157,'2020-12-17 08:37:00','BOSS','Регламент','Регламент Создан: \"Продажи\" пользователем admin',1,'Regularity','/core/regularity/create',159),(19158,'2020-12-17 08:37:33','BOSS','Регламент','Регламент Обновлен: \"Продажи\" пользователем admin',1,'Regularity','/core/regularity/update?id=159',159),(19159,'2020-12-17 08:38:34','BOSS','Регламент','Шаблон Создан: \"Воронка продаж\" пользователем admin',1,'Item','/core/item/create?regularity_id=159',156),(19160,'2020-12-17 08:38:49','BOSS','Регламент','Шаблон Создан: \"Оформление продажи\" пользователем admin',1,'Item','/core/item/create?regularity_id=159',157),(19161,'2020-12-17 08:39:04','BOSS','Регламент','Шаблон Создан: \"Этапы продаж\" пользователем admin',1,'Item','/core/item/create?regularity_id=159',158),(19162,'2020-12-17 08:39:20','BOSS','Регламент','Шаблон Создан: \"Использование скриптов\" пользователем admin',1,'Item','/core/item/create?regularity_id=159',159),(19163,'2020-12-17 08:39:37','BOSS','Регламент','Шаблон Создан: \"Настройка скриптов\" пользователем admin',1,'Item','/core/item/create?regularity_id=159',160),(19164,'2020-12-17 08:39:51','BOSS','Регламент','Шаблон Создан: \"Мини-сайт клиента\" пользователем admin',1,'Item','/core/item/create?regularity_id=159',161),(19165,'2020-12-17 08:40:07','BOSS','Регламент','Шаблон Создан: \"Авто-генерация лидов\" пользователем admin',1,'Item','/core/item/create?regularity_id=159',162),(19166,'2020-12-25 15:49:43','BOSS','Регламент','Регламент Обновлен: \"ФОРМА Вашей компании\" пользователем admin',1,'Regularity','/core/regularity/update?id=34',34),(19167,'2020-12-25 15:51:52','BOSS','Регламент','Шаблон Обновлен: \"Продукты\" пользователем admin',1,'Item','/core/item/update?id=99',99),(19168,'2020-12-25 15:53:49','BOSS','Регламент','Шаблон Обновлен: \"Категории продуктов\" пользователем admin',1,'Item','/core/item/update?id=118',118),(19169,'2020-12-25 15:56:27','BOSS','Регламент','Шаблон Обновлен: \"Добавлние продукта\" пользователем admin',1,'Item','/core/item/update?id=119',119),(19170,'2020-12-25 16:01:10','BOSS','Регламент','Шаблон Обновлен: \"Каталог\" пользователем admin',1,'Item','/core/item/update?id=120',120),(19171,'2020-12-25 16:10:02','BOSS','Регламент','Шаблон Создан: \"Конструктор Характеристик\" пользователем admin',1,'Item','/core/item/create?regularity_id=153',163),(19172,'2020-12-25 16:17:28','BOSS','Регламент','Шаблон Обновлен: \"Поставки\" пользователем admin',1,'Item','/core/item/update?id=122',122),(19173,'2020-12-25 16:21:27','BOSS','Регламент','Регламент Обновлен: \"Учет ресурсов\" пользователем admin',1,'Regularity','/core/regularity/update?id=154',154),(19174,'2020-12-25 16:22:57','ERP','Склад','Склад продукта Обновлен: \"Мобильный телефон Meizu M10 3/32GB Black\" пользователем admin',1,'WarehouseProduct','/warehouse/warehouse-product/update?id=2',2),(19175,'2020-12-25 16:23:15','ERP','Склад','Склад продукта Обновлен: \"Мобильный телефон Xiaomi Redmi Note 9 Pro 6/128GB Interstellar Grey\" пользователем admin',1,'WarehouseProduct','/warehouse/warehouse-product/update?id=5',5),(19176,'2020-12-25 16:23:32','ERP','Склад','Склад продукта Обновлен: \"Мобильный телефон Huawei P Smart 2021 128GB Gold\" пользователем admin',1,'WarehouseProduct','/warehouse/warehouse-product/update?id=6',6),(19177,'2020-12-25 16:23:48','ERP','Склад','Склад продукта Обновлен: \"Мобильный телефон Samsung Galaxy Note 10 Lite (SM-N770) 6/128GB Aura Silver (SM-N770FZSDSEK)\" пользователем admin',1,'WarehouseProduct','/warehouse/warehouse-product/update?id=41',41),(19178,'2020-12-25 16:24:13','BOSS','Регламент','Шаблон Обновлен: \"Хранилище\" пользователем admin',1,'Item','/core/item/update?id=121',121),(19179,'2020-12-25 16:24:48','ERP','Продукт','Категория Создан: \"Стационарные телефоны\" пользователем admin',1,'Category','/product/category/create',193),(19180,'2020-12-25 16:25:56','ERP','Продукт','Поле Создан: \"Тип трубки\" пользователем admin',1,'Field','/product/category/update?id=193',343),(19181,'2020-12-25 16:25:56','ERP','Продукт','Значение поля Создан: \"беспроводная\" пользователем admin',1,'FieldValue','/product/category/update?id=193',104),(19182,'2020-12-25 16:25:56','ERP','Продукт','Значение поля Создан: \"проводная\" пользователем admin',1,'FieldValue','/product/category/update?id=193',105),(19183,'2020-12-25 16:26:58','ERP','Продукт','Поле Создан: \"Автоматический определитель номера (АОН)\" пользователем admin',1,'Field','/product/category/update?id=193',344),(19184,'2020-12-25 16:27:02','BOSS','Регламент','Шаблон Обновлен: \"Перемещение\" пользователем admin',1,'Item','/core/item/update?id=123',123),(19185,'2020-12-25 16:27:38','ERP','Продукт','Поле Создан: \"Источник питания\" пользователем admin',1,'Field','/product/category/update?id=193',345),(19186,'2020-12-25 16:27:38','ERP','Продукт','Значение поля Создан: \"аккумулятор\" пользователем admin',1,'FieldValue','/product/category/update?id=193',106),(19187,'2020-12-25 16:27:38','ERP','Продукт','Значение поля Создан: \"сеть\" пользователем admin',1,'FieldValue','/product/category/update?id=193',107),(19188,'2020-12-25 16:29:13','BOSS','Регламент','Шаблон Обновлен: \"Инвентаризация\" пользователем admin',1,'Item','/core/item/update?id=124',124),(19189,'2020-12-25 16:30:52','ERP','Продукт','Производитель Создан: \"Gigaset\" пользователем admin',1,'Manufacturer','/product/manufacturer/create',19),(19190,'2020-12-25 16:31:29','ERP','Продукт','Продукт Создан: \"Радиотелефон Gigaset A116 Black\" пользователем admin',1,'Product','/product/product/create',256),(19191,'2020-12-25 16:31:29','ERP','Продукт','Значение поля продукта Создан: \"Радиотелефон Gigaset A116 Black\" пользователем admin',1,'FieldProductValue','/product/product/create',179),(19192,'2020-12-25 16:31:29','ERP','Продукт','Значение поля продукта Создан: \"Радиотелефон Gigaset A116 Black\" пользователем admin',1,'FieldProductValue','/product/product/create',180),(19193,'2020-12-25 16:31:29','ERP','Продукт','Значение поля продукта Создан: \"Радиотелефон Gigaset A116 Black\" пользователем admin',1,'FieldProductValue','/product/product/create',181),(19194,'2020-12-25 16:31:52','BOSS','Регламент','Шаблон Создан: \"Услуги и Хранилища\" пользователем admin',1,'Item','/core/item/create?regularity_id=154',164),(19195,'2020-12-25 16:32:49','ERP','Продукт','Производитель Создан: \"PANASONIC\" пользователем admin',1,'Manufacturer','/product/manufacturer/create',20),(19196,'2020-12-25 16:33:30','BOSS','Регламент','Регламент Обновлен: \"Продажи\" пользователем admin',1,'Regularity','/core/regularity/update?id=159',159),(19197,'2020-12-25 16:33:59','ERP','Продукт','Продукт Создан: \"Радиотелефон PANASONIC KX-TG2511UAT\" пользователем admin',1,'Product','/product/product/create',257),(19198,'2020-12-25 16:33:59','ERP','Продукт','Значение поля продукта Создан: \"Радиотелефон PANASONIC KX-TG2511UAT\" пользователем admin',1,'FieldProductValue','/product/product/create',182),(19199,'2020-12-25 16:33:59','ERP','Продукт','Значение поля продукта Создан: \"Радиотелефон PANASONIC KX-TG2511UAT\" пользователем admin',1,'FieldProductValue','/product/product/create',183),(19200,'2020-12-25 16:33:59','ERP','Продукт','Значение поля продукта Создан: \"Радиотелефон PANASONIC KX-TG2511UAT\" пользователем admin',1,'FieldProductValue','/product/product/create',184),(19201,'2020-12-25 16:36:11','ERP','Продукт','Продукт Создан: \"Телефон PANASONIC KX-TS2352UAB\" пользователем admin',1,'Product','/product/product/create',258),(19202,'2020-12-25 16:36:11','ERP','Продукт','Значение поля продукта Создан: \"Телефон PANASONIC KX-TS2352UAB\" пользователем admin',1,'FieldProductValue','/product/product/create',185),(19203,'2020-12-25 16:36:11','ERP','Продукт','Значение поля продукта Создан: \"Телефон PANASONIC KX-TS2352UAB\" пользователем admin',1,'FieldProductValue','/product/product/create',186),(19204,'2020-12-25 16:36:11','ERP','Продукт','Значение поля продукта Создан: \"Телефон PANASONIC KX-TS2352UAB\" пользователем admin',1,'FieldProductValue','/product/product/create',187),(19205,'2020-12-25 16:36:29','BOSS','Регламент','Шаблон Обновлен: \"Оформление продажи\" пользователем admin',1,'Item','/core/item/update?id=156',156),(19206,'2020-12-25 16:36:48','ERP','Продукт','Производитель Создан: \"TEXET\" пользователем admin',1,'Manufacturer','/product/manufacturer/create',21),(19207,'2020-12-25 16:36:57','ERP','Продукт','Продукт Создан: \"Телефон TEXET TX-225 Вurgundy\" пользователем admin',1,'Product','/product/product/create',259),(19208,'2020-12-25 16:36:57','ERP','Продукт','Значение поля продукта Создан: \"Телефон TEXET TX-225 Вurgundy\" пользователем admin',1,'FieldProductValue','/product/product/create',188),(19209,'2020-12-25 16:36:57','ERP','Продукт','Значение поля продукта Создан: \"Телефон TEXET TX-225 Вurgundy\" пользователем admin',1,'FieldProductValue','/product/product/create',189),(19210,'2020-12-25 16:36:57','ERP','Продукт','Значение поля продукта Создан: \"Телефон TEXET TX-225 Вurgundy\" пользователем admin',1,'FieldProductValue','/product/product/create',190),(19211,'2020-12-25 16:37:27','ERP','Продукт','Продукт Создан: \"Телефон PANASONIC KX-TS2356UAW\" пользователем admin',1,'Product','/product/product/create',260),(19212,'2020-12-25 16:37:27','ERP','Продукт','Значение поля продукта Создан: \"Телефон PANASONIC KX-TS2356UAW\" пользователем admin',1,'FieldProductValue','/product/product/create',191),(19213,'2020-12-25 16:37:27','ERP','Продукт','Значение поля продукта Создан: \"Телефон PANASONIC KX-TS2356UAW\" пользователем admin',1,'FieldProductValue','/product/product/create',192),(19214,'2020-12-25 16:37:27','ERP','Продукт','Значение поля продукта Создан: \"Телефон PANASONIC KX-TS2356UAW\" пользователем admin',1,'FieldProductValue','/product/product/create',193),(19215,'2020-12-25 16:37:37','BOSS','Регламент','Шаблон Обновлен: \"Мини-сайт клиента\" пользователем admin',1,'Item','/core/item/update?id=157',157),(19216,'2020-12-25 16:38:30','ERP','Продукт','Производитель Обновлен: \"Panasonic\" пользователем admin',1,'Manufacturer','/product/manufacturer/update?id=20',20),(19217,'2020-12-25 16:38:42','ERP','Продукт','Производитель Обновлен: \"Texet\" пользователем admin',1,'Manufacturer','/product/manufacturer/update?id=21',21),(19218,'2020-12-25 16:39:24','BOSS','Регламент','Шаблон Обновлен: \"Воронка продаж\" пользователем admin',1,'Item','/core/item/update?id=158',158),(19219,'2020-12-25 16:47:13','BOSS','Регламент','Шаблон Обновлен: \"Этапы (Состояния) продаж\" пользователем admin',1,'Item','/core/item/update?id=159',159),(19220,'2020-12-25 16:48:18','BOSS','Регламент','Шаблон Обновлен: \"Использование скриптов\" пользователем admin',1,'Item','/core/item/update?id=160',160),(19221,'2020-12-25 16:49:48','BOSS','Регламент','Шаблон Обновлен: \"Настройка скриптов\" пользователем admin',1,'Item','/core/item/update?id=161',161),(19222,'2020-12-25 16:54:37','BOSS','Регламент','Шаблон Обновлен: \"Авто-генерация лидов\" пользователем admin',1,'Item','/core/item/update?id=162',162),(19223,'2020-12-25 16:57:04','BOSS','Регламент','Шаблон Обновлен: \"Авто-генерация лидов\" пользователем admin',1,'Item','/core/item/update?id=162',162),(19224,'2020-12-25 16:57:56','BOSS','Регламент','Шаблон Обновлен: \"Авто-генерация лидов\" пользователем admin',1,'Item','/core/item/update?id=162',162),(19225,'2020-12-25 17:03:51','BOSS','Регламент','Регламент Обновлен: \"Кадры\" пользователем admin',1,'Regularity','/core/regularity/update?id=156',156),(19226,'2020-12-25 17:22:07','BOSS','Регламент','Регламент Обновлен: \"Управление\" пользователем admin',1,'Regularity','/core/regularity/update?id=157',157),(19227,'2020-12-25 17:29:50','BOSS','Регламент','Шаблон Обновлен: \"События\" пользователем admin',1,'Item','/core/item/update?id=143',143),(19228,'2020-12-25 17:30:48','BOSS','Регламент','Регламент Обновлен: \"Экспертные системы\" пользователем admin',1,'Regularity','/core/regularity/update?id=158',158),(19229,'2021-01-18 16:16:45','BOSS','Регламент','Шаблон Обновлен: \"Мини-сайт клиента\" пользователем admin',1,'Item','/core/item/update?id=157',157),(19230,'2021-01-18 16:17:58','BOSS','Регламент','Шаблон Обновлен: \"Этапы (Состояния) продаж\" пользователем admin',1,'Item','/core/item/update?id=159',159),(19231,'2021-01-18 16:18:29','BOSS','Регламент','Регламент Обновлен: \"Кадры\" пользователем admin',1,'Regularity','/core/regularity/update?id=156',156),(19232,'2021-01-18 16:19:40','BOSS','Регламент','Шаблон Обновлен: \"Воронка кадров\" пользователем admin',1,'Item','/core/item/update?id=132',132),(19233,'2021-01-18 16:22:00','BOSS','Регламент','Шаблон Обновлен: \"Вакансии\" пользователем admin',1,'Item','/core/item/update?id=133',133),(19234,'2021-01-18 16:22:19','BOSS','Регламент','Шаблон Обновлен: \"Вакансии\" пользователем admin',1,'Item','/core/item/update?id=133',133),(19235,'2021-01-18 16:24:52','BOSS','Регламент','Шаблон Обновлен: \"Кадры\" пользователем admin',1,'Item','/core/item/update?id=134',134),(19236,'2021-01-18 16:26:09','BOSS','Регламент','Шаблон Обновлен: \"Кадры\" пользователем admin',1,'Item','/core/item/update?id=134',134),(19237,'2021-01-18 16:26:27','BOSS','Регламент','Регламент Обновлен: \"Кадры\" пользователем admin',1,'Regularity','/core/regularity/update?id=156',156),(19238,'2021-01-18 16:27:04','BOSS','Ядро','Событие Создан: \" Событие\" пользователем admin',1,'Event','/event/event/create?date_from=2020-12-05&date_to=2020-12-06&start_time=0:0:00&end_time=0:0:00',39),(19239,'2021-01-18 16:30:56','BOSS','Регламент','Шаблон Обновлен: \"Проекты\" пользователем admin',1,'Item','/core/item/update?id=135',135),(19240,'2021-01-18 16:32:30','BOSS','Регламент','Шаблон Обновлен: \"Процесс найма\" пользователем admin',1,'Item','/core/item/update?id=136',136),(19241,'2021-01-18 16:33:21','BOSS','Регламент','Шаблон Обновлен: \"Процесс найма\" пользователем admin',1,'Item','/core/item/update?id=136',136),(19242,'2021-01-18 16:33:41','BOSS','Регламент','Шаблон Обновлен: \"Должностные инструкции\" пользователем admin',1,'Item','/core/item/update?id=137',137),(19243,'2021-01-18 16:36:22','BOSS','Ядро','Событие Обновлен: \"Тестовое событие 1\" пользователем admin',1,'Event','/event/event/update-event-month',1),(19244,'2021-01-18 16:36:22','BOSS','Ядро','Событие Обновлен: \"Тестовое событие 1\" пользователем admin',1,'Event','/event/event/update-event-month',2),(19245,'2021-01-18 16:36:22','BOSS','Ядро','Событие Обновлен: \"Тестовое событие 2 \" пользователем admin',1,'Event','/event/event/update-event-month',6),(19246,'2021-01-18 16:36:22','BOSS','Ядро','Событие Обновлен: \"Тестовое событие 3\" пользователем admin',1,'Event','/event/event/update-event-month',7),(19247,'2021-01-18 16:36:23','BOSS','Ядро','Событие Обновлен: \"Тестовое событие 5\" пользователем admin',1,'Event','/event/event/update-event-month',9),(19248,'2021-01-18 16:36:23','BOSS','Ядро','Событие Обновлен: \"Тестовое событие 6\" пользователем admin',1,'Event','/event/event/update-event-month',10),(19249,'2021-01-18 16:36:23','BOSS','Ядро','Событие Обновлен: \"Тестовое событие 7\" пользователем admin',1,'Event','/event/event/update-event-month',11),(19250,'2021-01-18 16:36:23','BOSS','Ядро','Событие Обновлен: \"Презентация телефонов самсунг\" пользователем admin',1,'Event','/event/event/update-event-month',12),(19251,'2021-01-18 16:36:23','BOSS','Ядро','Событие Обновлен: \"Презентация телефонов IPhone\" пользователем admin',1,'Event','/event/event/update-event-month',13),(19252,'2021-01-18 16:36:24','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',14),(19253,'2021-01-18 16:36:24','BOSS','Ядро','Событие Обновлен: \"Встреча с клиентом \" пользователем admin',1,'Event','/event/event/update-event-month',15),(19254,'2021-01-18 16:36:24','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',16),(19255,'2021-01-18 16:36:24','BOSS','Ядро','Событие Обновлен: \"Презентация телефонов самсунг\" пользователем admin',1,'Event','/event/event/update-event-month',17),(19256,'2021-01-18 16:36:24','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',18),(19257,'2021-01-18 16:36:24','BOSS','Ядро','Событие Обновлен: \"Созвон по закупкам\" пользователем admin',1,'Event','/event/event/update-event-month',19),(19258,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Планирование ремонта\" пользователем admin',1,'Event','/event/event/update-event-month',20),(19259,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Закупки товара\" пользователем admin',1,'Event','/event/event/update-event-month',21),(19260,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',22),(19261,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',23),(19262,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',24),(19263,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Корпоратив\" пользователем admin',1,'Event','/event/event/update-event-month',25),(19264,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',26),(19265,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',27),(19266,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',28),(19267,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',29),(19268,'2021-01-18 16:36:25','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',30),(19269,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',31),(19270,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',32),(19271,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',33),(19272,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"Утреннее собрание\" пользователем admin',1,'Event','/event/event/update-event-month',34),(19273,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"Инвентаризация\" пользователем admin',1,'Event','/event/event/update-event-month',35),(19274,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"День рождение сотрудника\" пользователем admin',1,'Event','/event/event/update-event-month',36),(19275,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"дела выходного дня\" пользователем admin',1,'Event','/event/event/update-event-month',37),(19276,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \"дела выходного дня\" пользователем admin',1,'Event','/event/event/update-event-month',38),(19277,'2021-01-18 16:36:26','BOSS','Ядро','Событие Обновлен: \" Событие\" пользователем admin',1,'Event','/event/event/update-event-month',39),(19278,'2021-02-02 11:23:28','BOSS','Регламент','Шаблон Обновлен: \"Проекты\" пользователем admin',1,'Item','/core/item/update?id=135',135),(19279,'2021-02-02 11:25:45','BOSS','Регламент','Шаблон Обновлен: \"Проекты\" пользователем admin',1,'Item','/core/item/update?id=135',135),(19573,'2021-03-03 10:33:19','CRM','Продажа','Продажа Обновлен: \"43\" пользователем admin',1,'Selling','/selling/form/test?id=43&state_id=13',43),(19576,'2021-03-03 15:15:54','CRM','Лид','Покупатель Создан: \"Дмитрий\" пользователем admin',1,'Customer','/test/test/test?id=154',164),(19577,'2021-03-03 15:15:54','CRM','Продажа','Продажа Создан:  пользователем admin',1,'Selling','/test/test/test?id=154',44),(19578,'2021-03-03 15:15:54','CRM','Продажа','Продажа Обновлен: \"44\" пользователем admin',1,'Selling','/test/test/test?id=154',44),(19579,'2021-03-03 16:38:16','CRM','Лид','Покупатель Создан: \"Дмитрий\" пользователем admin',1,'Customer','/test/test/test?id=154',165),(19580,'2021-03-03 16:38:17','CRM','Продажа','Продажа Создан:  пользователем admin',1,'Selling','/test/test/test?id=154',45),(19581,'2021-03-03 16:38:17','CRM','Продажа','Продажа Обновлен: \"45\" пользователем admin',1,'Selling','/test/test/test?id=154',45),(19582,'2021-03-03 16:38:53','CRM','Лид','Покупатель Создан: \"Дмитрий\" пользователем admin',1,'Customer','/test/test/test?id=154',166),(19583,'2021-03-03 16:38:53','CRM','Продажа','Продажа Создан:  пользователем admin',1,'Selling','/test/test/test?id=154',46),(19584,'2021-03-03 16:38:54','CRM','Продажа','Продажа Обновлен: \"46\" пользователем admin',1,'Selling','/test/test/test?id=154',46),(19600,'2021-09-24 07:11:08','CRM','Продажа','Источники клиентов Создан: \"Description\" пользователем admin',1,'CustomerSource','/selling/customer-source/create',1),(19601,'2021-09-24 07:11:20','CRM','Лид','Покупатель Обновлен: \"Анна Альфа-плюс\" пользователем admin',1,'Customer','/customer/customer/update?id=143',143),(19602,'2021-10-11 13:10:27','HRM','Найм','Состояние Создан: \"NAim 1\" пользователем admin',1,'InterviewState','/hr/interview-state/create',1),(19614,'2021-11-11 14:13:02','CRM','Продажа','Источники клиентов Обновлен: \"instagram \" пользователем admin',1,'CustomerSource','/selling/customer-source/update?id=1',1),(19615,'2021-11-11 14:23:52','ERP','Склад','Перевозка (транзит) Создан: \"ттест\" пользователем Ingello',8,'Transit','/transit/form/save',3),(19616,'2021-11-11 15:20:40','ERP','Склад','Склад Создан: \"Склад тест\" пользователем admin',1,'Warehouse','/warehouse/warehouse/create',137),(19617,'2021-11-11 15:20:40','ERP','Склад','Склад пользователя Создан:  пользователем admin',1,'WarehouseUser','/warehouse/warehouse/create',144),(19618,'2021-11-11 15:20:55','ERP','Склад','Склад Обновлен: \"Склад тест\" пользователем admin',1,'Warehouse','/warehouse/warehouse/update?id=137',137),(19619,'2021-11-11 15:20:55','ERP','Склад','Склад пользователя Создан:  пользователем admin',1,'WarehouseUser','/warehouse/warehouse/update?id=137',145),(19620,'2021-11-11 15:21:19','ERP','Склад','Склад Обновлен: \"Склад тест\" пользователем admin',1,'Warehouse','/warehouse/warehouse/update?id=137',137),(19621,'2021-11-11 15:21:19','ERP','Склад','Склад пользователя Создан:  пользователем admin',1,'WarehouseUser','/warehouse/warehouse/update?id=137',146),(19622,'2021-11-11 15:21:27','ERP','Склад','Склад Обновлен: \"Склад тест\" пользователем admin',1,'Warehouse','/warehouse/warehouse/update?id=137',137),(19623,'2021-11-11 15:21:27','ERP','Склад','Склад пользователя Создан:  пользователем admin',1,'WarehouseUser','/warehouse/warehouse/update?id=137',147),(19624,'2020-12-16 14:16:04','HRM','Найм','Работник Удален: \"Алина\" пользователем admin',9,'Worker','/worker/worker/delete?id=51',51),(19625,'2021-01-18 15:25:06','CRM','Продажа','Продажа Удален: \"Продажа Lenovo Tab 2\" пользователем admin',9,'Selling','/selling/main/delete?id=2',2),(19626,'2021-01-18 15:25:36','ERP','Склад','Склад Удален: \"Склад в Днепре\" пользователем admin',9,'Warehouse','/warehouse/warehouse/delete?id=102',102),(19627,'2021-01-18 15:28:21','HRM','Проект','Вакансия Удален: \"Менеджер по продажам\" пользователем admin',9,'Vacancy','/vacancy/vacancy/delete?id=90',90),(19628,'2021-01-18 15:29:10','ERP','Продукт','Категория Удален: \"Игровые ПК\" пользователем admin',9,'Category','/product/category/delete?id=194',194),(19629,'2021-11-11 15:30:17','ERP','Склад','Перевозка (транзит) Создан: \"\" пользователем Ingello',9,'Transit','/transit/form/save',5),(19630,'2021-11-11 15:43:38','ERP','Склад','Инвентаризация Создан: \"Новая инвентаризация с 11.11.2021 17:43:38\" пользователем Ingello',9,'Inventorization','/inventorization/form/create?without-header=&warehouseId=139',7),(19631,'2021-11-11 15:47:25','ERP','Склад','Склад Создан: \"Склад 1\" пользователем Ingello',9,'Warehouse','/product/product/import-excel',144),(19632,'2021-11-11 15:47:25','ERP','Склад','Склад пользователя Создан:  пользователем Ingello',9,'WarehouseUser','/product/product/import-excel',154),(19633,'2021-11-11 15:47:25','ERP','Склад','Склад продукта Создан: \"Мобильный телефон Xiaomi Redmi Note 9 Pro 6/128GB Interstellar Grey\" пользователем Ingello',9,'WarehouseProduct','/product/product/import-excel',140),(19634,'2021-11-11 15:47:25','ERP','Склад','Склад продукта Создан: \"Мобильный телефон Huawei P Smart 2021 128GB Gold\" пользователем Ingello',9,'WarehouseProduct','/product/product/import-excel',141),(19635,'2021-11-11 15:47:25','ERP','Склад','Склад продукта Создан: \"Мобильный телефон Realme 6 8/128GB White\" пользователем Ingello',9,'WarehouseProduct','/product/product/import-excel',142),(19636,'2021-11-11 15:47:25','ERP','Склад','Склад продукта Создан: \"Мобильный телефон Samsung Galaxy Note 10 Lite (SM-N770) 6/128GB Aura Silver (SM-N770FZSDSEK)\" пользователем Ingello',9,'WarehouseProduct','/product/product/import-excel',143),(19637,'2021-11-11 15:47:26','ERP','Склад','Склад продукта Создан: \"Мобильный телефон Meizu M10 3/32GB Black\" пользователем Ingello',9,'WarehouseProduct','/product/product/import-excel',144),(19638,'2021-11-11 15:50:41','ERP','Склад','Поставщик Создан: \"Андрей\" пользователем Ingello',9,'Supplier','/supplier/supplier/create',13),(19639,'2021-11-11 15:50:44','ERP','Склад','Закупка Создан: \"\" пользователем Ingello',9,'Purchase','/purchase/form/save',264),(19640,'2021-11-11 15:50:57','ERP','Склад','Накладные расходы Создан:  пользователем Ingello',9,'OverheadCost','/purchase/nomenclature/add-position',745),(19641,'2021-11-11 15:50:57','ERP','Склад','Закупка продукта Создан: \"Мобильный телефон Realme 6 8/128GB White\" пользователем Ingello',9,'PurchaseProduct','/purchase/nomenclature/add-position',1),(19642,'2021-11-11 15:50:57','ERP','Склад','Закупка продукта Обновлен: \"Мобильный телефон Realme 6 8/128GB White\" пользователем Ingello',9,'PurchaseProduct','/purchase/nomenclature/add-position',1),(19643,'2021-11-11 15:50:57','ERP','Склад','Склад продукта Создан: \"Мобильный телефон Realme 6 8/128GB White\" пользователем Ingello',9,'WarehouseProduct','/purchase/nomenclature/add-position',145),(19644,'2021-11-11 15:50:57','ERP','Склад','Закупка продукта Обновлен: \"Мобильный телефон Realme 6 8/128GB White\" пользователем Ingello',9,'PurchaseProduct','/purchase/nomenclature/add-position',1),(19645,'2021-11-11 15:51:03','ERP','Склад','Закупка Обновлен: \"\" пользователем Ingello',9,'Purchase','/purchase/state/payment?id=264&_pjax=%23state-pjax',264),(19646,'2021-11-11 15:51:06','ERP','Склад','Закупка Обновлен: \"\" пользователем Ingello',9,'Purchase','/purchase/state/delivery?id=264&_pjax=%23state-pjax',264),(19647,'2021-11-11 15:51:08','ERP','Склад','Склад продукта Создан: \"Мобильный телефон Realme 6 8/128GB White\" пользователем Ingello',9,'WarehouseProduct','/purchase/state/confirm?id=264&_pjax=%23state-pjax',146),(19648,'2021-11-11 15:51:08','ERP','Склад','Закупка Обновлен: \"\" пользователем Ingello',9,'Purchase','/purchase/state/confirm?id=264&_pjax=%23state-pjax',264),(19649,'2021-11-11 15:52:53','ERP','Склад','Перевозка (транзит) Обновлен: \"\" пользователем Ingello',9,'Transit','/transit/state/confirm?id=5&_pjax=%23state-pjax',5),(19650,'2021-11-11 16:00:33','BOSS','Ядро','Вы авторизовались',9,'Login','/login?code=4%2F0AX4XfWiR0D9KBFnzjdvHl_tkhlj9Zeewzi0Zs-tfNH3pXoJbaCJYDwNbxXePComgXWaNZw&scope=email+profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+openid&authuser=2&prompt=consent/zaglushka',1),(19651,'2021-11-11 16:28:54','HRM','Проект','Вакансия Создан: \"Тест\" пользователем Ingello',9,'Vacancy','/project/project-vacancy/create',98),(19652,'2021-11-11 16:28:54','HRM','Проект','Вакансия для проекта Создан:  пользователем Ingello',9,'ProjectVacancy','/project/project-vacancy/create',16),(19653,'2021-11-11 16:31:14','HRM','Найм','Работник Создан: \"Тест\" пользователем Ingello',9,'Worker','/worker/worker/create',76),(19654,'2021-11-11 16:31:14','HRM','Найм','Вакансия для работника Создан:  пользователем Ingello',9,'WorkerVacancy','/worker/worker/create',121),(19655,'2021-11-11 16:31:14','HRM','Найм','Вакансия для работника Создан:  пользователем Ingello',9,'WorkerVacancy','/worker/worker/create',122),(19656,'2021-11-11 16:31:42','HRM','Найм','Работник Создан: \"Тест\" пользователем Ingello',9,'Worker','/worker/worker/create',77),(19657,'2021-11-11 16:31:42','HRM','Найм','Вакансия для работника Создан:  пользователем Ingello',9,'WorkerVacancy','/worker/worker/create',123),(19658,'2021-11-11 16:39:11','HRM','Проект','Вакансия Создан: \"Тест2\" пользователем Ingello',9,'Vacancy','/project/project-vacancy/create',99),(19659,'2021-11-11 16:39:11','HRM','Проект','Вакансия для проекта Создан:  пользователем Ingello',9,'ProjectVacancy','/project/project-vacancy/create',17);
/*!40000 ALTER TABLE `system_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_event_user`
--

DROP TABLE IF EXISTS `system_event_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_event_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `object_name` varchar(200) NOT NULL,
  `create` tinyint(4) DEFAULT NULL,
  `update` tinyint(4) DEFAULT NULL,
  `delete` tinyint(4) DEFAULT NULL,
  `custom` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_system_event_user_1_idx` (`user_id`),
  CONSTRAINT `fk_system_event_user_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_event_user`
--

LOCK TABLES `system_event_user` WRITE;
/*!40000 ALTER TABLE `system_event_user` DISABLE KEYS */;
INSERT INTO `system_event_user` VALUES (2,9,'RequestStrategyOld',1,0,0,0);
/*!40000 ALTER TABLE `system_event_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_rate`
--

DROP TABLE IF EXISTS `tax_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tax_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `percent` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_rate`
--

LOCK TABLES `tax_rate` WRITE;
/*!40000 ALTER TABLE `tax_rate` DISABLE KEYS */;
INSERT INTO `tax_rate` VALUES (5,'Без НДС',0.00),(6,'C НДС',20.00),(9,'Без НДС',0.00),(10,'C НДС',20.00);
/*!40000 ALTER TABLE `tax_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dynagrid`
--

DROP TABLE IF EXISTS `tbl_dynagrid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `theme` text,
  `user` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result` text,
  `test_type_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `test_id` (`test_type_id`),
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `test_id` FOREIGN KEY (`test_type_id`) REFERENCES `test_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (37,'\n\n<div class=\"col-md-6\">\n            <div class=\"bs-sub-section\">\n            <div class=\"bs-example\">\n        <div class=\"detached-block-example\">Первый </div>\n                \n            <strong>Ваше имя?</strong>\n\n            <br> wdfbgh<br><br>\n                    </div>\n</div>\n    </div>\n<div class=\"col-md-6\">\n    <div class=\"bs-sub-section\">\n            <div class=\"bs-example\">\n        <div class=\"detached-block-example\">Контактная информация</div>\n            <h2>Дмитрий</h2><br>\n    test@test.test<br>\n    <p>qasdrftg</p>        </div>\n</div>\n</div>\n\n\n\n\n',154,164),(38,'\n\n<div class=\"col-md-6\">\n            <div class=\"bs-sub-section\">\n            <div class=\"bs-example\">\n        <div class=\"detached-block-example\">Первый </div>\n                \n            <strong>Ваше имя?</strong>\n\n            <br> wdfbgh<br><br>\n                    </div>\n</div>\n    </div>\n<div class=\"col-md-6\">\n    <div class=\"bs-sub-section\">\n            <div class=\"bs-example\">\n        <div class=\"detached-block-example\">Контактная информация</div>\n            <h2>Дмитрий</h2><br>\n    test@test.test<br>\n    <p>qasdrftg</p>        </div>\n</div>\n</div>\n\n\n\n\n',154,165),(39,'\n\n<div class=\"col-md-6\">\n            <div class=\"bs-sub-section\">\n            <div class=\"bs-example\">\n        <div class=\"detached-block-example\">Первый </div>\n                \n            <strong>Ваше имя?</strong>\n\n            <br> wdfbgh<br><br>\n                    </div>\n</div>\n    </div>\n<div class=\"col-md-6\">\n    <div class=\"bs-sub-section\">\n            <div class=\"bs-example\">\n        <div class=\"detached-block-example\">Контактная информация</div>\n            <h2>Дмитрий</h2><br>\n    test@test.test<br>\n    <p>qasdrftg</p>        </div>\n</div>\n</div>\n\n\n\n\n',154,166);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_type`
--

DROP TABLE IF EXISTS `test_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_type_user__fk` (`user_id`),
  CONSTRAINT `test_type_user__fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type`
--

LOCK TABLES `test_type` WRITE;
/*!40000 ALTER TABLE `test_type` DISABLE KEYS */;
INSERT INTO `test_type` VALUES (139,'Тест на программиста  ','test/test/test?id=139',NULL),(142,'Тест для менеджера ','test/test/test?id=142',NULL),(143,'Тест на джуна','test/test/test?id=143',NULL),(146,'Тест Клиента','test/test/test?id=146',NULL),(151,'Тест на Junior PHP','test/test/test?id=151',NULL),(154,'Тест тестовый','test/test/test?id=154',1);
/*!40000 ALTER TABLE `test_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_type_field`
--

DROP TABLE IF EXISTS `test_type_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test_type_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(255) NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `required` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_type_field_test_type__fk` (`test_id`),
  CONSTRAINT `test_type_field_test_type__fk` FOREIGN KEY (`test_id`) REFERENCES `test_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type_field`
--

LOCK TABLES `test_type_field` WRITE;
/*!40000 ALTER TABLE `test_type_field` DISABLE KEYS */;
INSERT INTO `test_type_field` VALUES (14,'База знаний','Знаете ли вы какие нибудь языки програмирования','input','Да, если да, то какие?','PHP, JavaScript',1,139),(22,'Ваши знания','wwww','radio','ttttt','ttttt',0,139),(23,'Ваши знания','Владеете ли вы коммуникабельными качествами ','checkbox','ttttt','Да, если да, то какие?',0,139),(24,'Ваши знания 22','Владеете ли вы коммуникабельными качествами  22','checkbox','Да 22',' 22',1,NULL),(25,'Ваши знания','Владеете ли вы коммуникабельными качествами ','radio','ttttt','Да/ Нет',0,139),(27,'Ваши знания 33','Владеете ли вы коммуникабельными качествами  33','input','Да 33','Да/ Нет 22',1,146),(62,'Вопросы по клиент серверу','Что такое ПОРТ','text','','Введите текст ',1,151),(63,'Вопросы по клиент серверу','Что не является заголовком http','radio','Cache || UserAgent || Status || Redirect','',0,151),(64,'Вопросы по клиент серверу','Может ли сервер сделать запрос на клиент?','checkbox','Да или Нет ','Да/Нет ',0,151),(65,'Блок 2','Вопрос1','text','','',1,151),(66,'Блок 2','Вопрос2','text','','',0,151),(67,'Первый ','Ваше имя?','text','','',0,154);
/*!40000 ALTER TABLE `test_type_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transit`
--

DROP TABLE IF EXISTS `transit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transit`
--

LOCK TABLES `transit` WRITE;
/*!40000 ALTER TABLE `transit` DISABLE KEYS */;
INSERT INTO `transit` VALUES (1,83,82,'Перевозим часть телефонов на склад 2','2020-12-03 18:13:33',NULL,0),(4,139,138,'Перевозим часть телефонов на склад 2','2020-12-03 18:13:33',NULL,0),(5,138,138,'','2021-11-11 17:30:17','2021-11-11 17:52:53',1);
/*!40000 ALTER TABLE `transit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transit_overhead_cost`
--

DROP TABLE IF EXISTS `transit_overhead_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transit_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `transit_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (5,'Продукт'),(10,'Услуга'),(11,'Инструмент'),(12,'Объект'),(13,'Расходный материал'),(14,'Сотрудник'),(21,'Продукт'),(22,'Услуга'),(23,'Инструмент'),(24,'Объект'),(25,'Расходный материал'),(26,'Сотрудник');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  `confirmed_email` int(11) DEFAULT '0',
  `email_string` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','admin@admin.admin','user',NULL,NULL,NULL,NULL,1,NULL),(9,'Ingello','$2y$13$itoVSSKxPgHDll6WtYAAoeCIYx3HeAR5GsM2wXs4otE/oVOQjRWZq','business.ingello@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacancy`
--

DROP TABLE IF EXISTS `vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` double DEFAULT NULL,
  `description` text,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacancy`
--

LOCK TABLES `vacancy` WRITE;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` VALUES (86,25000,'','Управляющий директор'),(87,10000,'<p>Почему мы?</p><p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p><p>Условия работы</p><p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p><p><br></p>','Менеджер по продажам'),(88,15000,'','Старший менеджер по продажам '),(89,15000,'','Менеджер по доставке'),(94,25000,'','Управляющий директор'),(95,10000,'<p>Почему мы?</p><p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p><p>Условия работы</p><p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p><p><br></p>','Менеджер по продажам'),(96,15000,'','Старший менеджер по продажам '),(97,15000,'','Менеджер по доставке'),(98,NULL,'','Тест'),(99,NULL,'','Тест2');
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse-country_id_fk` (`country_id`),
  CONSTRAINT `warehouse-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse`
--

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;
INSERT INTO `warehouse` VALUES (82,'Склад Ш',245,'Харьков (Шевченковский р-н)',100),(83,'Склад КП',245,'Киев правобережный',3),(99,'Склад И',245,'Харьков (Индустриальный р-н)',5),(100,'Склад Х',245,'Харьков (Холодногорский р-н)',2),(101,'Склад КЛ',245,'Киев левобережный',100),(106,'Офис 82',245,'Харьков',100),(137,'Склад тест',NULL,'',10),(138,'Склад Ш',245,'Харьков (Шевченковский р-н)',100),(139,'Склад КП',245,'Киев правобережный',3),(140,'Склад И',245,'Харьков (Индустриальный р-н)',5),(141,'Склад Х',245,'Харьков (Холодногорский р-н)',2),(142,'Склад КЛ',245,'Киев левобережный',100),(143,'Склад тест',NULL,'',10),(144,'Склад 1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_product`
--

DROP TABLE IF EXISTS `warehouse_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouse_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_product`
--

LOCK TABLES `warehouse_product` WRITE;
/*!40000 ALTER TABLE `warehouse_product` DISABLE KEYS */;
INSERT INTO `warehouse_product` VALUES (1,249,83,120,5000.00,NULL,6825.00,6300.00,250.00,0.00,104),(2,246,82,10,5000.00,NULL,NULL,NULL,NULL,NULL,104),(5,252,82,20,5600.00,NULL,NULL,NULL,NULL,NULL,6),(6,248,82,60,6000.00,NULL,NULL,NULL,NULL,NULL,6),(32,255,100,50,100.00,125.00,125.00,110.00,NULL,NULL,6),(33,254,99,50,1000.00,1500.00,1500.00,1200.00,NULL,NULL,104),(34,253,101,20,1000.00,1400.00,1400.00,1200.00,NULL,NULL,104),(35,247,99,15,5000.00,7000.00,7000.00,6000.00,NULL,NULL,104),(36,248,101,20,5000.00,7000.00,7000.00,6000.00,NULL,NULL,104),(37,249,101,14,5000.00,7300.00,7300.00,6500.00,NULL,NULL,104),(38,246,100,17,5000.00,7300.00,11131.25,10275.00,0.00,3562.50,104),(39,252,100,15,4000.00,5500.00,5500.00,5000.00,NULL,NULL,104),(40,247,82,50,4000.00,6000.00,6000.00,5000.00,NULL,NULL,104),(41,249,82,30,5600.00,NULL,NULL,NULL,NULL,NULL,104),(42,249,100,7,5000.00,NULL,6500.00,6000.00,0.00,0.00,104),(43,247,100,3,5000.00,NULL,9587.50,8850.00,0.00,2375.00,104),(124,279,139,120,5000.00,NULL,6825.00,6300.00,250.00,0.00,104),(125,276,138,10,5000.00,NULL,NULL,NULL,NULL,NULL,104),(126,282,138,20,5600.00,NULL,NULL,NULL,NULL,NULL,6),(127,278,138,60,6000.00,NULL,NULL,NULL,NULL,NULL,6),(128,285,141,50,100.00,125.00,125.00,110.00,NULL,NULL,6),(129,284,140,50,1000.00,1500.00,1500.00,1200.00,NULL,NULL,104),(130,283,142,20,1000.00,1400.00,1400.00,1200.00,NULL,NULL,104),(131,277,140,15,5000.00,7000.00,7000.00,6000.00,NULL,NULL,104),(132,278,142,20,5000.00,7000.00,7000.00,6000.00,NULL,NULL,104),(133,279,142,14,5000.00,7300.00,7300.00,6500.00,NULL,NULL,104),(134,276,141,17,5000.00,7300.00,11131.25,10275.00,0.00,3562.50,104),(135,282,141,15,4000.00,5500.00,5500.00,5000.00,NULL,NULL,104),(136,277,138,50,4000.00,6000.00,6000.00,5000.00,NULL,NULL,104),(137,279,138,30,5600.00,NULL,NULL,NULL,NULL,NULL,104),(138,279,141,7,5000.00,NULL,6500.00,6000.00,0.00,0.00,104),(139,277,141,3,5000.00,NULL,9587.50,8850.00,0.00,2375.00,104),(140,252,144,20,5600.00,NULL,NULL,NULL,NULL,NULL,6),(141,248,144,60,6000.00,NULL,NULL,NULL,NULL,NULL,6),(142,247,144,50,4000.00,6000.00,6000.00,5000.00,NULL,NULL,104),(143,249,144,30,5600.00,NULL,NULL,NULL,NULL,NULL,104),(144,246,144,20,15000.00,NULL,32630.00,30120.00,0.00,0.00,6),(145,277,139,0,NULL,NULL,NULL,NULL,NULL,NULL,107),(146,277,139,10,8000.00,NULL,10400.00,9600.00,0.00,0.00,107);
/*!40000 ALTER TABLE `warehouse_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_user`
--

DROP TABLE IF EXISTS `warehouse_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouse_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_user_warehouse_id_fk` (`warehouse_id`),
  KEY `warehouse_customer_user_id_fk` (`user_id`),
  CONSTRAINT `warehouse_customer_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `warehouse_user_warehouse_id_fk` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_user`
--

LOCK TABLES `warehouse_user` WRITE;
/*!40000 ALTER TABLE `warehouse_user` DISABLE KEYS */;
INSERT INTO `warehouse_user` VALUES (71,82,1),(72,83,1),(105,99,1),(106,100,1),(107,101,1),(144,137,1),(145,137,1),(146,137,1),(147,137,1),(148,138,9),(149,139,9),(150,140,9),(151,141,9),(152,142,9),(153,143,9),(154,144,9);
/*!40000 ALTER TABLE `warehouse_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget_user`
--

DROP TABLE IF EXISTS `widget_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `widget_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `row` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `collapsed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_widget_user_1_idx` (`user_id`),
  CONSTRAINT `widget_user_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=594 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_user`
--

LOCK TABLES `widget_user` WRITE;
/*!40000 ALTER TABLE `widget_user` DISABLE KEYS */;
INSERT INTO `widget_user` VALUES (510,1,'SalesFunnel',1,0,1,0),(511,1,'DepartmentPerfomance',0,7,0,0),(512,1,'WeeklySales',0,2,0,0),(513,1,'Employees',1,3,1,1),(514,1,'Messages',0,4,0,0),(515,1,'Workers',1,2,0,0),(516,1,'SalesWarehouse',1,4,1,0),(517,1,'ApplicationInfo',1,0,0,0),(518,1,'DeliveryPlan',0,5,0,0),(519,1,'Goals',1,1,1,0),(520,1,'Calendar',1,3,0,0),(521,1,'Suppliers',0,1,0,0),(522,1,'HiringFunnel',1,1,0,1),(523,1,'HistoryEvent',1,2,1,1),(524,NULL,'SalesFunnel',1,0,0,0),(525,NULL,'DepartmentPerfomance',0,7,0,0),(526,NULL,'WeeklySales',0,2,0,0),(527,NULL,'Employees',1,2,0,1),(528,NULL,'Messages',0,4,0,0),(529,NULL,'Workers',1,3,0,1),(530,NULL,'SalesWarehouse',1,4,0,0),(531,NULL,'ApplicationInfo',0,3,0,0),(532,NULL,'DeliveryPlan',0,5,0,0),(533,NULL,'Goals',0,6,0,0),(534,NULL,'Calendar',1,1,1,0),(535,NULL,'Suppliers',0,1,0,0),(536,NULL,'HiringFunnel',1,1,0,1),(537,NULL,'HistoryEvent',1,0,1,0),(538,NULL,'SalesFunnel',1,0,1,0),(539,NULL,'DepartmentPerfomance',0,7,0,0),(540,NULL,'WeeklySales',0,2,0,0),(541,NULL,'Employees',1,3,1,1),(542,NULL,'Messages',0,4,0,0),(543,NULL,'Workers',1,2,0,0),(544,NULL,'SalesWarehouse',1,4,1,0),(545,NULL,'ApplicationInfo',1,0,0,0),(546,NULL,'DeliveryPlan',0,5,0,0),(547,NULL,'Goals',1,1,1,0),(548,NULL,'Calendar',1,3,0,0),(549,NULL,'Suppliers',0,1,0,0),(550,NULL,'HiringFunnel',1,1,0,1),(551,NULL,'HistoryEvent',1,2,1,1),(552,NULL,'SalesFunnel',1,0,1,0),(553,NULL,'DepartmentPerfomance',0,7,0,0),(554,NULL,'WeeklySales',0,2,0,0),(555,NULL,'Employees',1,3,1,1),(556,NULL,'Messages',0,4,0,0),(557,NULL,'Workers',1,2,0,0),(558,NULL,'SalesWarehouse',1,4,1,0),(559,NULL,'ApplicationInfo',1,0,0,0),(560,NULL,'DeliveryPlan',0,5,0,0),(561,NULL,'Goals',1,1,1,0),(562,NULL,'Calendar',1,3,0,0),(563,NULL,'Suppliers',0,1,0,0),(564,NULL,'HiringFunnel',1,1,0,1),(565,NULL,'HistoryEvent',1,2,1,1),(566,NULL,'SalesFunnel',1,0,1,0),(567,NULL,'DepartmentPerfomance',0,7,0,0),(568,NULL,'WeeklySales',0,2,0,0),(569,NULL,'Employees',1,3,1,1),(570,NULL,'Messages',0,4,0,0),(571,NULL,'Workers',1,2,0,0),(572,NULL,'SalesWarehouse',1,4,1,0),(573,NULL,'ApplicationInfo',1,0,0,0),(574,NULL,'DeliveryPlan',0,5,0,0),(575,NULL,'Goals',1,1,1,0),(576,NULL,'Calendar',1,3,0,0),(577,NULL,'Suppliers',0,1,0,0),(578,NULL,'HiringFunnel',1,1,0,1),(579,NULL,'HistoryEvent',1,2,1,1),(580,9,'SalesFunnel',1,0,1,0),(581,9,'DepartmentPerfomance',0,7,0,0),(582,9,'WeeklySales',0,2,0,0),(583,9,'Employees',1,3,1,1),(584,9,'Messages',0,4,0,0),(585,9,'Workers',1,2,0,0),(586,9,'SalesWarehouse',1,4,1,0),(587,9,'ApplicationInfo',1,0,0,0),(588,9,'DeliveryPlan',0,5,0,0),(589,9,'Goals',1,1,1,0),(590,9,'Calendar',1,3,0,0),(591,9,'Suppliers',0,1,0,0),(592,9,'HiringFunnel',1,1,0,1),(593,9,'HistoryEvent',1,2,1,1);
/*!40000 ALTER TABLE `widget_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `apply_position` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `experience_description` text,
  `collaborated` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,0,'Анна','Власова','Максимовна','1997-12-12',1,'МТ258741','-',5,'<p>Знает эту сферу деятельности</p><p><br></p>',0),(2,0,'Максим ','Алонов','Владимирович',NULL,0,'-','-',2,'',0),(3,0,'Антон','Гетманский','Викторович',NULL,0,'-','-',7,'',0),(4,0,'Денис','Фомин','Алексеевич',NULL,0,'-','-',10,'',0),(44,0,'Алина','Власова','Максимовна','1994-12-11',1,'-','-',NULL,'',0),(45,0,'Валерия','Пушкова','Дмитриевна',NULL,1,'-','-',NULL,'',0),(46,0,'Петр','Гуров','Константинович',NULL,0,'-','-',NULL,'',0),(47,0,'Руслан','Петров','Владимирович',NULL,0,'-','-',NULL,'',0),(48,0,'Олег','Григорьев','Алексеевич',NULL,0,'-','-',NULL,'',0),(49,0,'Михаил','Вильсон','Викторович',NULL,0,'-','-',NULL,'',0),(50,0,'Дмитрий','Робинсон','Алексеевич',NULL,0,'-','-',NULL,'',0),(51,0,'Анна','Власова','Максимовна','1997-12-12',1,'МТ258741','-',5,'<p>Знает эту сферу деятельности</p><p><br></p>',0),(64,0,'Анна','Власова','Максимовна','1997-12-12',1,'МТ258741','-',5,'<p>Знает эту сферу деятельности</p><p><br></p>',0),(65,0,'Максим ','Алонов','Владимирович',NULL,0,'-','-',2,'',0),(66,0,'Антон','Гетманский','Викторович',NULL,0,'-','-',7,'',0),(67,0,'Денис','Фомин','Алексеевич',NULL,0,'-','-',10,'',0),(68,0,'Алина','Власова','Максимовна','1994-12-11',1,'-','-',NULL,'',0),(69,0,'Валерия','Пушкова','Дмитриевна',NULL,1,'-','-',NULL,'',0),(70,0,'Петр','Гуров','Константинович',NULL,0,'-','-',NULL,'',0),(71,0,'Руслан','Петров','Владимирович',NULL,0,'-','-',NULL,'',0),(72,0,'Олег','Григорьев','Алексеевич',NULL,0,'-','-',NULL,'',0),(73,0,'Михаил','Вильсон','Викторович',NULL,0,'-','-',NULL,'',0),(74,0,'Дмитрий','Робинсон','Алексеевич',NULL,0,'-','-',NULL,'',0),(75,0,'Анна','Власова','Максимовна','1997-12-12',1,'МТ258741','-',5,'<p>Знает эту сферу деятельности</p><p><br></p>',0),(76,0,'Тест','Тест','',NULL,NULL,'','',NULL,'',0),(77,0,'Тест','Тест','',NULL,NULL,'','',NULL,'',0);
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker_vacancy`
--

DROP TABLE IF EXISTS `worker_vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worker_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) DEFAULT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-worker_vacancy-worker_id` (`worker_id`),
  KEY `idx-worker_vacancy-vacancy_id` (`vacancy_id`),
  CONSTRAINT `fk-worker_vacancy-vacancy_id` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-worker_vacancy-worker_id` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_vacancy`
--

LOCK TABLES `worker_vacancy` WRITE;
/*!40000 ALTER TABLE `worker_vacancy` DISABLE KEYS */;
INSERT INTO `worker_vacancy` VALUES (1,1,87),(2,1,88),(3,2,89),(4,3,86),(5,3,88),(6,4,86),(7,4,87),(8,4,88),(9,44,87),(10,45,87),(11,46,87),(12,47,87),(13,48,89),(14,49,89),(15,50,89),(106,64,95),(107,64,96),(108,65,97),(109,66,94),(110,66,96),(111,67,94),(112,67,95),(113,67,96),(114,68,95),(115,69,95),(116,70,95),(117,71,95),(118,72,97),(119,73,97),(120,74,97),(121,76,94),(122,76,95),(123,77,98);
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

-- Dump completed on 2021-11-11 18:39:44