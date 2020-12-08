-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
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
) ENGINE=InnoDB AUTO_INCREMENT=8715 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessory`
--

LOCK TABLES `accessory` WRITE;
/*!40000 ALTER TABLE `accessory` DISABLE KEYS */;
INSERT INTO `accessory` (`id`, `entity_class`, `entity_id`, `user_id`) VALUES (62,'forma\\modules\\product\\records\\Type',5,1),(119,'forma\\modules\\product\\records\\Type',10,1),(121,'forma\\modules\\product\\records\\Type',11,1),(122,'forma\\modules\\product\\records\\Type',12,1),(123,'forma\\modules\\product\\records\\Type',13,1),(124,'forma\\modules\\product\\records\\Type',14,1),(125,'forma\\modules\\product\\records\\PackUnit',4,1),(126,'forma\\modules\\product\\records\\PackUnit',5,1),(131,'forma\\modules\\supplier\\records\\Supplier',6,1),(134,'forma\\modules\\product\\records\\Currency',6,1),(135,'forma\\modules\\product\\records\\TaxRate',4,1),(136,'forma\\modules\\product\\records\\TaxRate',5,1),(138,'forma\\modules\\product\\records\\TaxRate',6,1),(186,'forma\\modules\\worker\\records\\Worker',1,1),(187,'forma\\modules\\worker\\records\\Worker',2,1),(188,'forma\\modules\\worker\\records\\Worker',3,1),(189,'forma\\modules\\worker\\records\\Worker',4,1),(239,'forma\\modules\\supplier\\records\\Supplier',8,1),(332,'forma\\modules\\project\\records\\project\\Project',6,1),(337,'forma\\modules\\project\\records\\project\\Project',11,1),(1279,'forma\\modules\\customer\\records\\Customer',143,1),(1280,'forma\\modules\\customer\\records\\Customer',144,1),(1461,'forma\\modules\\product\\records\\Manufacturer',11,1),(1828,'forma\\modules\\product\\records\\Manufacturer',15,1),(2002,NULL,NULL,NULL),(2027,'forma\\modules\\product\\records\\Product',103,1),(2028,'forma\\modules\\product\\records\\Product',107,1),(2029,'forma\\modules\\product\\records\\Product',105,1),(2090,'forma\\modules\\selling\\records\\selling\\Selling',432,1),(2669,'forma\\modules\\selling\\records\\strategy\\Strategy',13,1),(7366,'forma\\modules\\selling\\records\\selling\\Selling',510,1),(7608,'forma\\modules\\purchase\\records\\purchase\\Purchase',177,1),(7609,'forma\\modules\\purchase\\records\\purchase\\Purchase',178,1),(7610,'forma\\modules\\selling\\records\\talk\\Answer',137,1),(7611,'forma\\modules\\purchase\\records\\purchase\\Purchase',1,1),(7612,'forma\\modules\\selling\\records\\selling\\Selling',611,1),(7613,'forma\\modules\\selling\\records\\talk\\Answer',138,1),(7614,'forma\\modules\\purchase\\records\\purchase\\Purchase',179,1),(7615,'forma\\modules\\product\\records\\Category',190,1),(7616,'forma\\modules\\selling\\records\\talk\\Answer',139,1),(7617,'forma\\modules\\product\\records\\Category',191,1),(7618,'forma\\modules\\product\\records\\Category',192,1),(7620,'forma\\modules\\selling\\records\\talk\\Answer',140,1),(7621,'forma\\modules\\selling\\records\\talk\\Answer',141,1),(7622,'forma\\modules\\purchase\\records\\purchase\\Purchase',180,1),(7623,'forma\\modules\\product\\records\\Manufacturer',10,1),(7624,'forma\\modules\\product\\records\\Product',246,1),(7625,'forma\\modules\\product\\records\\Product',247,1),(7626,'forma\\modules\\product\\records\\Manufacturer',12,1),(7627,'forma\\modules\\product\\records\\Product',248,1),(7628,'forma\\modules\\product\\records\\Manufacturer',13,1),(7629,'forma\\modules\\product\\records\\Product',249,1),(7630,'forma\\modules\\product\\records\\Manufacturer',14,1),(7631,'forma\\modules\\product\\records\\Product',250,1),(7632,'forma\\modules\\product\\records\\Product',251,1),(7633,'forma\\modules\\product\\records\\Manufacturer',16,1),(7634,'forma\\modules\\product\\records\\Product',252,1),(7635,'forma\\modules\\product\\records\\Product',253,1),(7636,'forma\\modules\\product\\records\\Manufacturer',17,1),(7637,'forma\\modules\\product\\records\\Product',254,1),(7638,'forma\\modules\\product\\records\\Manufacturer',18,1),(7639,'forma\\modules\\product\\records\\Product',255,1),(7640,'forma\\modules\\product\\records\\Currency',104,1),(7766,'forma\\modules\\purchase\\records\\purchase\\Purchase',201,1),(7767,'forma\\modules\\transit\\records\\transit\\Transit',1,1),(8682,'forma\\modules\\purchase\\records\\purchase\\Purchase',202,1),(8683,'forma\\modules\\purchase\\records\\purchase\\Purchase',203,1),(8684,'forma\\modules\\selling\\records\\selling\\Selling',1,1),(8685,'forma\\modules\\selling\\records\\selling\\Selling',2,1),(8686,'forma\\modules\\selling\\records\\selling\\Selling',3,1),(8687,'forma\\modules\\vacancy\\records\\Vacancy',86,1),(8688,'forma\\modules\\vacancy\\records\\Vacancy',87,1),(8689,'forma\\modules\\vacancy\\records\\Vacancy',88,1),(8690,'forma\\modules\\vacancy\\records\\Vacancy',89,1),(8691,'forma\\modules\\hr\\records\\interview\\Interview',1,1),(8692,'forma\\modules\\hr\\records\\interview\\Interview',2,1),(8693,'forma\\modules\\hr\\records\\interview\\Interview',3,1),(8694,'forma\\modules\\selling\\records\\strategy\\Strategy',1,1),(8695,'forma\\modules\\selling\\records\\strategy\\Strategy',2,1),(8696,'forma\\modules\\selling\\records\\strategy\\Strategy',3,1),(8697,'forma\\modules\\selling\\records\\talk\\Request',1,1),(8698,'forma\\modules\\selling\\records\\talk\\Answer',1,1),(8699,'forma\\modules\\selling\\records\\talk\\Answer',2,1),(8700,'forma\\modules\\selling\\records\\talk\\Request',2,1),(8701,'forma\\modules\\selling\\records\\talk\\Answer',3,1),(8702,'forma\\modules\\selling\\records\\talk\\Answer',4,1),(8703,'forma\\modules\\selling\\records\\talk\\Request',3,1),(8704,'forma\\modules\\selling\\records\\talk\\Answer',5,1),(8705,'forma\\modules\\selling\\records\\talk\\Answer',6,1),(8706,'forma\\modules\\selling\\records\\talk\\Request',4,1),(8707,'forma\\modules\\selling\\records\\talk\\Request',5,1),(8708,'forma\\modules\\selling\\records\\talk\\Request',6,1),(8709,'forma\\modules\\selling\\records\\talk\\Answer',7,1),(8710,'forma\\modules\\selling\\records\\talk\\Answer',8,1),(8711,'forma\\modules\\selling\\records\\talk\\Answer',9,1),(8712,'forma\\modules\\selling\\records\\talk\\Answer',10,1),(8713,'forma\\modules\\selling\\records\\talk\\Answer',11,1),(8714,'forma\\modules\\selling\\records\\talk\\Answer',12,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` (`id`, `text`, `request_id`) VALUES (1,'да',1),(2,'нет',1),(3,'богатый опыт (10+)',2),(4,'хороший опыт (5+лет)',2),(5,'да',3),(6,'небольшой ( до года)',2),(7,'извините, я передумал (а)',4),(8,'новой почтой',5),(9,'по тарифам новой почты, или джастин (обычно это около 60 грн по украине)',6),(10,'да',4),(12,'джастин',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES (192,'Кнопочные телефоны',190),(191,'Смартфоны',190),(190,'Телефоны',NULL);
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
INSERT INTO `country` (`id`, `name`) VALUES (35,'Австралия'),(36,'Австрия'),(37,'Азербайджан'),(38,'Акротири'),(39,'Албания'),(40,'Алжир'),(41,'Американское Самоа'),(42,'Ангилья'),(43,'Ангола'),(44,'Андорра'),(45,'Антигуа и Барбуда'),(46,'Аргентина'),(47,'Армения'),(48,'Аруба'),(49,'Афганистан'),(50,'Багамские Острова'),(51,'Бангладеш'),(52,'Барбадос'),(53,'Бахрейн'),(54,'Белиз'),(55,'Белоруссия'),(56,'Бельгия'),(57,'Бенин'),(58,'Бермудские Острова'),(59,'Болгария'),(60,'Боливия'),(61,'Босния и Герцеговина'),(62,'Ботсвана'),(63,'Бразилия'),(64,'Британская территория в Индийском океане'),(65,'Британские Виргинские острова'),(66,'Бруней'),(67,'Буркина-Фасо'),(68,'Бурунди'),(69,'Бутан'),(70,'Вануату'),(71,'Ватикан'),(72,'Великобритания'),(73,'Венгрия'),(74,'Венесуэла'),(75,'Виргинские Острова'),(76,'Восточный Тимор'),(77,'Вьетнам'),(78,'Габон'),(79,'Гаити'),(80,'Гайана'),(81,'Гамбия'),(82,'Гана'),(83,'Гваделупа'),(84,'Гватемала'),(85,'Гвинея'),(86,'Гвинея-Бисау'),(87,'Германия'),(88,'Гернси'),(89,'Гибралтар'),(90,'Гондурас'),(91,'Гонконг'),(92,'Гренада'),(93,'Гренландия'),(94,'Греция'),(95,'Грузия'),(96,'Гуам'),(97,'Дания'),(98,'Декелия'),(99,'Демократическая Республика Конго'),(100,'Джерси'),(101,'Джибути'),(102,'Доминика'),(103,'Доминиканская Республика'),(104,'Египет'),(105,'Замбия'),(106,'Западная Сахара'),(107,'Зимбабве'),(108,'Израиль'),(109,'Индия'),(110,'Индонезия'),(111,'Иордания'),(112,'Ирак'),(113,'Иран'),(114,'Ирландия'),(115,'Исландия'),(116,'Испания'),(117,'Италия'),(118,'Йемен'),(119,'Кабо-Верде'),(120,'Казахстан'),(121,'Каймановы острова'),(122,'Камбоджа'),(123,'Камерун'),(124,'Канада'),(125,'Катар'),(126,'Кения'),(127,'Кипр'),(128,'Киргизия'),(129,'Кирибати'),(130,'Китай'),(131,'Кокосовые острова'),(132,'Колумбия'),(133,'Коморы'),(134,'Косово'),(135,'Коста-Рика'),(137,'Куба'),(138,'Кувейт'),(139,'Кюрасао'),(140,'Лаос'),(141,'Латвия'),(142,'Лесото'),(143,'Либерия'),(144,'Ливан'),(145,'Ливия'),(146,'Литва'),(147,'Лихтенштейн'),(148,'Люксембург'),(149,'Маврикий'),(150,'Мавритания'),(151,'Мадагаскар'),(152,'Майотта'),(153,'Макао'),(154,'Македония'),(155,'Малави'),(156,'Малайзия'),(157,'Мали'),(158,'Мальдивы'),(159,'Мальта'),(160,'Марокко'),(161,'Мартиника'),(162,'Маршалловы Острова'),(163,'Мексика'),(164,'Микронезия'),(165,'Мозамбик'),(166,'Молдова'),(167,'Монако'),(168,'Монголия'),(169,'Монтсератт'),(170,'Мьянма'),(171,'Намибия'),(172,'Науру'),(173,'Непал'),(174,'Нигер'),(175,'Нигерия'),(176,'Нидерландские Антильские острова'),(177,'Нидерланды'),(178,'Никарагуа'),(179,'Ниуэ'),(180,'Новая Зеландия'),(181,'Новая Каледония'),(182,'Норвегия'),(183,'Объединенные Арабские Эмираты'),(184,'Оман'),(185,'Остров Буве'),(186,'Остров Клиппертон'),(187,'Остров Мэн'),(188,'Остров Навасса'),(189,'Остров Норфолк'),(190,'Остров Рождества'),(191,'Остров Святой Елены, Остров Вознесения, и Тристан-да-Кунья'),(192,'Остров Уэйк'),(193,'Пакистан'),(194,'Палау'),(195,'Панама'),(196,'Папуа - Новая Гвинея'),(197,'Парагвай'),(198,'Перу'),(199,'Польша'),(200,'Португалия'),(201,'Пуэрто-Рико'),(202,'Республика Конго'),(203,'Реюньон'),(204,'Россия'),(205,'Руанда'),(206,'Румыния'),(207,'Самоа'),(208,'Сан-Марино'),(209,'Сан-Томе и Принсипи'),(210,'Саудовская Аравия'),(211,'Свазиленд'),(212,'Северная Корея'),(213,'Северные Марианские острова'),(214,'Сейшельские Острова'),(215,'Сен-Бартелеми'),(216,'Сен-Мартен'),(217,'Сенегал'),(218,'Сент-Люсия'),(219,'Сербия'),(220,'Сингапур'),(221,'Синт-Мартен'),(222,'Сирия'),(223,'Словакия'),(224,'Словения'),(225,'Соединенные Штаты Америки'),(226,'Соломоновы Острова'),(227,'Сомали'),(228,'Судан'),(229,'Суринам'),(230,'Сьерра-Леоне'),(231,'Таджикистан'),(232,'Таиланд'),(233,'Тайвань'),(234,'Танзания'),(235,'Того'),(236,'Токелау'),(237,'Тонга'),(238,'Тринидад и Тобаго'),(239,'Тувалу'),(240,'Тунис'),(241,'Туркменистан'),(242,'Турция'),(243,'Уганда'),(244,'Узбекистан'),(245,'Украина'),(246,'Уоллис и Футуна'),(247,'Уругвай'),(248,'Фарерские острова'),(249,'Фиджи'),(250,'Филиппины'),(251,'Финляндия'),(252,'Фолклендские острова'),(253,'Франция'),(254,'Французская Гвиана'),(255,'Французская Полинезия'),(256,'Хорватия'),(257,'Центральноафриканская Республика'),(258,'Чад'),(259,'Черногория'),(260,'Чехия'),(261,'Чили'),(262,'Швейцария'),(263,'Швеция'),(264,'Шпицберген'),(265,'Шри-Ланка'),(266,'Эквадор'),(267,'Экваториальная Гвинея'),(268,'Эль-Сальвадор'),(269,'Эритрея'),(270,'Эстония'),(271,'Эфиопия'),(272,'Южная Африка'),(273,'Южная Корея'),(274,'Южный Судан'),(275,'Ямайка'),(276,'Ян-Майен'),(277,'Япония');
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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` (`id`, `name`, `code`, `rate`) VALUES (6,'Доллар','USD',28.5000),(104,'Гривна','UAH',1.0000);
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
  `address` varchar(32) DEFAULT NULL,
  `company_email` varchar(32) DEFAULT NULL,
  `chief_email` varchar(32) DEFAULT NULL,
  `company_phone` varchar(32) DEFAULT NULL,
  `chief_phone` varchar(32) DEFAULT NULL,
  `site_company` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer-country_id_fk` (`country_id`),
  CONSTRAINT `customer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `country_id`, `tax_rate`, `name`, `firm`, `address`, `company_email`, `chief_email`, `company_phone`, `chief_phone`, `site_company`) VALUES (143,245,1.00,'Анна Альфа-плюс','Алфа плюс','Заречный','252342@gmail.com','252342@gmail.com','','0660443958',''),(144,245,2.00,'Роман','-','','','send1message1@gmail.com','','','');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `event_type_id` (`event_type_id`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `event_type_id`, `name`, `text`, `status`, `date_from`, `date_to`, `start_time`, `end_time`) VALUES (1,1,'Тестовое событие 1','Описание очень важного события, которое забудется, если не хранить его в системе.',1,'2018-10-30','2018-10-30','10:06:09','00:00:00'),(2,1,'Тестовое событие 1','Тестовое событие 1',1,'2018-10-31','2018-10-31','09:06:09','00:00:00'),(6,1,'Тестовое событие 2 ','Тестовое событие 2 ',1,'2018-12-21','2018-12-21','11:30:07','00:00:00'),(7,1,'Тестовое событие 3','Тестовое событие 3',1,'2018-12-20','2018-12-20','07:00:07','00:00:00'),(9,1,'Тестовое событие 5','Тестовое событие 5',1,'2018-12-21','2018-12-21','02:20:00','00:00:00'),(10,1,'Тестовое событие 6','Тестовое событие 6',1,'2018-12-14','2018-12-14','12:50:00','00:00:00'),(11,1,'Тестовое событие 7','Тестовое событие 7',1,'2018-12-12','2018-12-12','01:20:00','00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_type`
--

LOCK TABLES `event_type` WRITE;
/*!40000 ALTER TABLE `event_type` DISABLE KEYS */;
INSERT INTO `event_type` (`id`, `name`, `status`, `color`) VALUES (1,0,0,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` (`id`, `category_id`, `widget`, `name`, `defaulted`) VALUES (334,190,'widgetDropDownList','Диагональ экрана',NULL),(335,190,'widgetSwitchInput','Готов к отправке',''),(336,190,'widgetMultiSelect','Цвет',NULL),(337,190,'widgetNumberControl','Количество сим карт','2'),(338,190,'widgetTextInput','Оператичная память','2 ГБ'),(339,190,'widgetTextInput','Встроенная память','32 ГБ'),(340,190,'widgetDropDownList','Операционная система',NULL),(341,190,'widgetSwitchInput','Возможность беспроводной зарядки','Нет'),(342,190,'widgetTypeahead','Датчики',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_product_value`
--

LOCK TABLES `field_product_value` WRITE;
/*!40000 ALTER TABLE `field_product_value` DISABLE KEYS */;
INSERT INTO `field_product_value` (`id`, `field_id`, `product_id`, `value`) VALUES (89,334,246,'87'),(90,335,246,'1'),(91,336,246,'[\"94\"]'),(92,337,246,''),(93,338,246,'6 ГБ'),(94,339,246,'64 ГБ'),(95,340,246,'99'),(96,341,246,'0'),(97,342,246,'Датчик освещения'),(98,334,247,'89'),(99,335,247,'1'),(100,336,247,'[\"93\"]'),(101,337,247,'1'),(102,338,247,'2 ГБ'),(103,339,247,'64 ГБ'),(104,340,247,'99'),(105,341,247,'1'),(106,342,247,'Датчик освещения'),(107,334,251,''),(108,335,251,'0'),(109,336,251,'[\"93\",\"95\"]'),(110,337,251,'2'),(111,338,251,'35 гб'),(112,339,251,''),(113,340,251,'99'),(114,341,251,'0'),(115,342,251,''),(116,334,255,''),(117,335,255,'0'),(118,336,255,'[\"95\",\"96\"]'),(119,337,255,'1'),(120,338,255,'200 МБ'),(121,339,255,'1 ГБ'),(122,340,255,''),(123,341,255,'0'),(124,342,255,''),(125,334,250,'89'),(126,335,250,'1'),(127,336,250,'[\"92\"]'),(128,337,250,'2'),(129,338,250,''),(130,339,250,'128 ГБ'),(131,340,250,'100'),(132,341,250,'1'),(133,342,250,'Датчик освещения'),(134,334,248,'86'),(135,335,248,'0'),(136,336,248,'[\"96\"]'),(137,337,248,'1'),(138,338,248,'6 ГБ'),(139,339,248,'64 ГБ'),(140,340,248,'99'),(141,341,248,'0'),(142,342,248,'Датчик освещения'),(143,334,249,'89'),(144,335,249,'0'),(145,336,249,'[\"95\",\"97\"]'),(146,337,249,'2'),(147,338,249,'6 ГБ'),(148,339,249,'128 ГБ'),(149,340,249,'99'),(150,341,249,'1'),(151,342,249,'Датчик освещения'),(152,334,252,'88'),(153,335,252,'1'),(154,336,252,'[\"94\"]'),(155,337,252,'1'),(156,338,252,'6 ГБ'),(157,339,252,'64 ГБ'),(158,340,252,'99'),(159,341,252,'0'),(160,342,252,''),(161,334,254,'91'),(162,335,254,'0'),(163,336,254,'[\"92\"]'),(164,337,254,'1'),(165,338,254,'200 МБ'),(166,339,254,'1 ГБ'),(167,340,254,''),(168,341,254,'0'),(169,342,254,''),(170,334,253,'91'),(171,335,253,'1'),(172,336,253,'[\"95\"]'),(173,337,253,'2'),(174,338,253,''),(175,339,253,'1 ГБ'),(176,340,253,''),(177,341,253,'0'),(178,342,253,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_value`
--

LOCK TABLES `field_value` WRITE;
/*!40000 ALTER TABLE `field_value` DISABLE KEYS */;
INSERT INTO `field_value` (`id`, `field_id`, `name`, `is_main`) VALUES (85,334,'4,1`` - 4,5``',0),(86,334,'4,6``- 5``',0),(87,334,'5,1`` - 5,5``',0),(88,334,'5,55`` - 6``',0),(89,334,'6`` - 6,49``',0),(90,334,'6,5`` и более',0),(91,334,'До 4``',0),(92,336,'Белый',0),(93,336,'Серый',0),(94,336,'Золотой',0),(95,336,'Черный',0),(96,336,'Красный',0),(97,336,'Голубой',0),(98,336,'Фиолетовый',0),(99,340,'Android',0),(100,340,'IOS',0),(101,340,'Windows',0),(102,342,'Акселерометр',0),(103,342,'Датчик освещения',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interview`
--

LOCK TABLES `interview` WRITE;
/*!40000 ALTER TABLE `interview` DISABLE KEYS */;
INSERT INTO `interview` (`id`, `worker_id`, `project_id`, `name`, `date_create`, `date_complete`, `state`, `vacancy_id`, `dialog`, `next_step`) VALUES (1,3,11,'-','2020-12-03 19:26:44',NULL,4,86,'03.12.2020 17:58:33<br/><p>Клиент: \n                        \n                        Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?                        \n                    </p><p>Менеджер: да</p><p>Клиент: \n                        \n                        Какой у вас опыт ?                        \n                    </p><p>Менеджер: богатый опыт (10+)</p><p>Клиент: \n                        \n                        вы уверены в своих силах?                        \n                    </p><p>Менеджер: да</p><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\">отличный разговор</div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">созвониться</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">созвониться</div>'),(2,1,11,'-','2020-12-03 19:34:26',NULL,2,87,NULL,NULL),(3,4,6,'-','2020-12-03 19:36:24',NULL,6,87,NULL,NULL);
/*!40000 ALTER TABLE `interview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interview_vacancy`
--

DROP TABLE IF EXISTS `interview_vacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interview_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vacancy_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `regularity_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `color` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(6500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `regularity_item_ibfk_1` (`regularity_id`),
  KEY `regularity_item_ibfk_2` (`parent_id`),
  CONSTRAINT `regularity_item_ibfk_1` FOREIGN KEY (`regularity_id`) REFERENCES `regularity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `regularity_item_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id`, `title`, `parent_id`, `regularity_id`, `order`, `color`, `description`, `picture`, `access`) VALUES (1,'Форма',NULL,34,NULL,'weadfsehtgjhm','<p>ФОРМА Вашей компании - это тысячи полезных функций для <strong>систематизации бизнеса, повышения </strong>показателей <strong>продаж</strong> и <strong>дисциплины</strong>. И конечно для <strong>подготовки</strong> малого бизнеса к <strong>росту</strong> (а для малого и крупного бизнеса, готового к росту, наша команда проектирует дорогие индивидуальные решения и предоставляет экспертные услуги). </p><p>Здесь, в разделе регламентов, <strong>Вы научитесь эффективно управлять системой</strong> и изменять её под свой бизнес. Это не пустой текст - Вы сразу же будете <strong>на практике</strong> строить и управлять Вашей индивидуальной системой благодаря <strong>уникальным функциям</strong> ФОРМЫ. </p><p>Раздел регламента - это <strong>инструмент управления компанией</strong> и внедрения в компанию <strong>систем автоматизации</strong>. Даже если у Вас 0 опыта - Вы постепенно освоите все возможности. Если у Вас есть опыт - Вы очень быстро разберетесь. В любом случае, мы поможем.\r\n</p><p>Регламенты - это большие информационные блоки. Каждый регламент состоит из разделов - конкретного текста, объясняющего возможности системы. Внутри разделов могут быть использованы специальные кнопки, нажатие на которые позволяет посмотреть реальную функциональность системы в маленьком компактном окошке. Это удобно. Давайте приступим</p>','/regularity_images/airport-2373727_1920.jpg',1),(98,'Управление',NULL,34,NULL,'','<p>Данный раздел предназначен для менеджеров, директоров и управленцев. Независимо от количества людей в Вашем бизнесе (даже если это только Вы) - это удобный инструмент контроля, планирования и мониторинга деятельности Вашего бизнеса. Данный тип систем для управления называется АСУП - Автоматизированная система управления предприятием. Система ФОРМА максимально упрощает управление для малого бизнеса. А для проектирования сложных систем обратиться в компанию ingello (разработчик ФОРМЫ).</p>','/regularity_images/paper-3213924_1280.jpg',1),(99,'Продукты',NULL,34,NULL,'','<p>Бизнес строится на извлечении прибыли при продаже продукта и\\или оказании услуги. И данный раздел Вам в этом поможет. Он удобен для описания каталога продуктов или услуг. Для продвинутых пользователей доступен конструктор, который позволит создавать сложные формы добавления продуктов в каталог. Об этом позже.  </p>','/regularity_images/ecommerce-3530785.jpg',1),(100,'Учет ресурсов',NULL,34,NULL,'','<p>Данный раздел поможет<strong> вести учет </strong>объектов в Вашей собственности. Это могут быть просто любые вещи. Например - столы, стулья, инструменты, компьютеры. Так-же это могут быть продукты, которые Вы продаёте. Более того: Вы сможете управлять целой сетью складов, производить операции <strong>закупок, транзитов и инвентаризации,</strong> учитывать <strong>накладные расходы, налоги</strong> и многое другое. </p><p>Системы такого класса называются <strong>WMR</strong> (Warehouse Management System - Система Управления Складом), а так-же имеются элементы систем типа <strong>ERP</strong> - (Enterprise Resource Planning - планирование ресурсов предприятия). </p>','/regularity_images/ikea-2714998_1920.jpg',1),(101,'Продажи',NULL,34,NULL,'','<p>При проектировании системы ФОРМА, архитектор был убежден, что <strong>продажи</strong> - это самая важная часть любой бизнес-системы. Конечно же, всё работает в комплексе, и важны все отделы и их функции.</p><p> Но цель системы ФОРМА - это вывести бизнес <strong>на новый уровень</strong>, навести порядок в взаимоотношениях с клиентами. Все необходимые функции Вы найдёте тут. </p><p>Мы расскажем, как планировать <strong>переговоры</strong>, как <strong>обслуживать</strong> и опрашивать <strong>клиентов</strong>, как нарабатывать <strong>клиентскую базу</strong> и <strong>историю</strong> по каждому клиенту индивидуально, как разработать свою собственную <strong>стратегию</strong> <strong>продаж</strong> и <strong>автоматизировать</strong> их. </p><p>Системы такого типа называются популярным словом <strong>CRM</strong>  (Customer Relationship Management - <strong>Система управления взаимоотношениями с клиентами).</strong></p>','/regularity_images/apples-1841132_1920.jpg',1),(102,'Кадры',NULL,34,NULL,'','<p>Даже если Вы пока один - вероятно, это не на долго. Для того, чтобы бизнес рос и распространяется, как франшиза, как вирус, - <strong>нужны кадры</strong>. Они, как говорится, “решают”. Позже мы поговорим как построить и <strong>систематизировать</strong> отдел кадров, как благодаря <strong>автоматизации</strong> избежать ненужной волокиты при <strong>найме</strong> и как перестать обучать кадровиков, а вместо этого сделать так, чтобы они обучали Вашу систему. </p><p>Отдел стоит на трёх китах - <strong>найм</strong>, <strong>вакансия</strong> и <strong>кадр</strong>. В прогрессивных областях конкуренция происходит не за клиентов, а за специалистов. И эту тенденцию важно не пропустить. </p><p>Системы такого класса называются <strong>HRM</strong> (Human Resource Management - <strong>Управление Человеко-Ресурсом</strong>). </p>','/regularity_images/basketball-108622_1920.jpg',1),(117,'Экспертные системы',NULL,34,NULL,'','<p>Данный класс систем предназначен для <strong>продвинутых</strong> компаний или предприятий, которые создаются на базе <strong>хорошего финансирования</strong> с целью <strong>скорейшего роста</strong>. Это не просто системы, <strong>это возможности</strong>. И в заключительной части мы познакомим Вас с возможностями ИТ компании ingello а также с её наработками. </p><p>Система ФОРМА - это <strong>бесплатный инструмент </strong>для компаний, который отлично подойдёт <strong>на ранних этапах развития</strong>, но планировать будущие разработки всегда лучше заранее и мы с удовольствием в этом поможем. </p><p>Поговорим о системах класса <strong>E-Commerce</strong> и <strong>Marketplace</strong> - для международной торговли, о системах <strong>PMS</strong> для управления проектами и командами, о системах <strong>HIS</strong> для медицинского обслуживания, об <strong>API</strong> системах и базах данных, про <strong>IOT</strong> - интернет вещей и умные дома, про большие данные и искусственный интеллект и даже про квантовую механику! </p><p>Спасибо, что изучаете регламент. Теперь перейдем к конкретной и формальной части. </p>','/regularity_images/person-731479_1920.jpg',1),(118,'Категории продуктов',NULL,153,NULL,'','<p>Категория продукта определяет его некоторые свойства. Представим себе большую библиотеку. Если мы попали в отдел книг о музыке - мы заранее будем знать некоторые качества любой книги, какую бы мы не взяли в этом отделе. С продуктами и услугами - также. Когда мы создаём в системе новый продукт - именно от категории будут зависеть основные его характеристики. </p><p>СПИСОК КАТЕГОРИЙ</p><p>Добавьте еще одну категорию на своё усмотрение.</p><p><br></p>','/regularity_images/library-5641389_1920.jpg',1),(119,'Форма продукта',NULL,153,NULL,'','<p>Форма продукта необходима для того, чтобы создать варианты услуг или продуктов, которыми занимается Ваша компания. Продаёт, обменивает или просто ведет количественный учет. </p><p>Например, Вы хотите начать вести учет офисных пренадлежностей...</p>','/regularity_images/container-4203677_1920.jpg',1),(120,'Каталог',NULL,153,NULL,'','<p>Каталог - это то, что Вы готовы предложить Вашему клиенту во всех возможных вариациях. Сам каталог не содержит информации о том, какие у Вас ограничения по продуктам или услугам. Информация о наличии продукта на складе и лимиты по услугам на офисах - находятся в хранилищах, о них мы поговорим отдельно. </p><p>Тут же всё просто: нам нужно создать каталог. Для этого нам нужно описать его <wtf>продукты\\услуги</wtf> со всеми подробностями и вариациями. В этом нам поможет форма добавления товара в каталог, читайте далее...</p>','/regularity_images/color-5093046_1920.jpg',1),(121,'Склад',NULL,154,NULL,'','<p>Основные операции</p>','/regularity_images/forklift-835340_1920.jpg',1),(122,'Закупки',NULL,154,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расходы</p><p>сумма</p><p>ожидаются</p>','/regularity_images/production-4408573_1920.jpg',1),(123,'Перемещение',NULL,154,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расхоы</p><p>сумма</p><p>ожидаются</p>','/regularity_images/truck-1030846_1920.jpg',1),(124,'Инвентаризация',NULL,154,NULL,'','<p>Порядок</p>','/regularity_images/tee-1252397_1920.jpg',1),(132,'Воронка кадров',NULL,156,NULL,'','','/regularity_images/lechner-50119_1920.jpg',1),(133,'Вакансии',NULL,156,NULL,'','','/regularity_images/office-1078869_1920.jpg',1),(134,'Кадры',NULL,156,NULL,'','','/regularity_images/seminar-594125_1920.jpg',1),(135,'Проекты',NULL,156,NULL,'','','/regularity_images/industry-3087393_1920.jpg',1),(136,'Процесс найма',NULL,156,NULL,'','','/regularity_images/office-4639462_1920.jpg',1),(137,'Должностные инструкции',NULL,156,NULL,'','','/regularity_images/video-conference-5238383_1920.jpg',1),(138,'Показатели',NULL,157,NULL,'','<p>Это пульс Вашей компании. На ней отображаются основные показатели Вашей компании. Обычно эту панель принято называть “Дэшборд”.  </p><p>Дэшборд состоит из виджетов - специальных блоков, в которых могут отображаться графики, таблицы другие формы данных. </p><p>К примеру, в ФОРМУ по умолчанию включен миниатюрный календарь, список сотрудников, состояние процессов найма, виджет воронки продаж, виджет статистики продаж по складам, виджет основных показателей и многое другое. Все эти функции мы рассмотрим в соответствующих разделах. </p><p>В каждом виджете есть специальная кнопка с тремя линиями, в которой есть основные функции виджета. Пока просто запомните, что такая есть. Она для супер-продвинутых пользователей или для тех, кто прочитал все регламенты. </p><p>Вы можете определить, какие данные Вам важнее видеть. Сейчас, в качестве первого практического взаимодействия, попробуем настроить дэшборд на Ваш вкус. Для этого мы будем перетаскивать виджеты курсором мыши в нужное Вам положение. Зажмите левую кнопку мыши на названии виджета и перемещайте его. Если виджет Вам не нужен - перетяните его в верхнюю панель (позже сможете вернуть). Если виджет Вам нужен - перетаскивайте его повыше. Если не важен - по ниже. Также можно свернуть виджет, нажав на кнопку “-”.</p><p><strong>ПОСМОТРИТЕ НА ДЭШБОРД,</strong> чтобы начать экспериментировать с панелью.</p><p>(Настраивать дэшборд можно только на большом экране)</p>','/regularity_images/chart-2785979_1920.jpg',1),(139,'Регламент',NULL,157,NULL,'','<p>Регламенты нужны для того, чтобы написать правила работы компании и пересечь эти правила с функциями системы. Это очень мощная функция системы!</p><p>Интересный факт: Вы сейчас читаете регламент. Но его написал я, Олег, - архитектор данной системы, других систем для малого бизнеса и ряда других коммерческих и некоммерческих систем. Но никто не знает Ваш бизнес лучше, чем Вы. И потому в будущем Вы полностью перепишете регламенты Вашей компании. Задача команды ingello - предоставить бесплатные функции на первое время, до начала стадии активного роста бизнеса, на стадии выживания. </p><p>Регламент - это важнейший набор правил, определяющий поведение компании. Но это не просто текст. Это мультифункциональный текст, в который можно зашить любую из тысяч функций системы. А давайте я прямо сейчас покажу, как всё это устроено внутри.</p><p>Важно: Это может оказаться сложно для новичков, потому Вы можете пропустить этот раздел и вернуться к нему позже. Либо же будьте готовы попробовать несколько раз, пока не получится. А получится полюбому. </p><p>Начнем! Для начала, нажимайте эту кнопку, осмотритесь и закройте окно {{/core/regularity/settings||СМОТРЕТЬ СПИСОК РЕГЛАМЕНТОВ}}  <a href=\"https://forma.ingello.com/core/regularity/settings\"></a></p><p>Видели этот список? Это список регламентов, один из которых Вы сейчас читаете. А самое интересно это то, что в Вашей власти его изменить! Давайте договоримся пока ничего не удалять, чтобы не нарушить программу. Но давайте что-нибудь добавим новое!</p><p>Чтобы не добавлять что-попало, давайте создадим список должностных обязанностей. </p><p>Тогда, регламент будет называться “Должностные обязанности”, а его разделы (пункты) будут называться “Обязанности менеджера”, “Обязанности продавца”, “Обязанности администратора”. Нажимая на эти пункты мы будем видеть текст, в котором будут описаны эти обязанности, к примеру “В обязанности продавца входит приветствовать клиента, консультировать его согласно следующим правилам….”. Ну, Вы поняли, надеюсь. </p><p>Итак, попробуем добавить регламент. Вы можете нажать на предыдущую кнопку и добавить новый регламент в список.</p><p>Или просто нажмите на эту кнопку и дайте название “Должностные обязанности” своему собственному регламенту {{/core/regularity/create||СОЗДАЙТЕ СВОЙ РЕГЛАМЕНТ}}  </p><p>Верю, что у Вас всё получилось. Но давайте это проверим. Нажмите эту кнопку {{/core/regularity||РЕГЛАМЕНТЫ}}. Заметили? Теперь в регламентах появился Ваш собственный регламент с названием, которое Вы написали!</p><p>Далее нужно наполнить его пунктами. То есть, к примеру, должен получится \"список обязанностей для разных ролей Вашего бизнеса\".  Давайте это сделаем.  {{/core/regularity||ОТКРОЙТЕ СПИСОК РЕГЛАМЕНТОВ И РАЗДЕЛОВ}} <a href=\"https://forma.ingello.com/core/regularity\"></a></p><p>Сверху (в ряд) располагаются вкладки всех регламентов и среди них должен быть Ваш только что созданный. Нажмите на него и увидете кнопку “Добавить пункт”. Клацайте на неё. </p><p>В появившемся окне нужно как минимум написать название пункта и его описание. Можете еще выбрать его цвет. Если следовать нашему примеру, - то в название пишите должность, а в описание - обязанности этой должности. И нажимайте кнопку “Добавить” внизу формы. </p><p>Повторите это действие несколько раз, чтобы наполнить регламент пунктами.</p><p>А в следующем пункте мы поговорим о более сложном применении регламентов - о связывании их с функциями системы. И разберемся, что за непонятные кнопочки были справа при создании регламента. </p>','/regularity_images/video-conference-5238383_1920.jpg',1),(140,'Регламент для продвинутых',NULL,157,NULL,'','<p>Теперь поговорим про беспрецедентно мощную функцию системы ФОРМА, которая способна создать из Вашего бизнеса точку непреодолимой силы на Вашем рынке. </p><p>Создайте любой новый раздел в  {{/core/regularity/create||РЕГЛАМЕНТЕ}} (как в прошлом пункте), но не спешите сохранять.</p><p>Помимо названия, описания и цвета регламента тут есть поле для загрузки картинки (в следующем разделе про презентацию мы поговорим об этом). </p><p>Сейчас нас больше интересует правая часть. В ней Вы видите карточки с какими то кнопками. </p><p>Вся правая часть делится на разные разделы, Вы могли обратить внимание, что они повторяют пункты меню системы (вот те, разноцветные, слева &lt;&lt;&lt;). Все эти функции (и не только эти) Вы можете использовать и они могут превращаться в вот такие &gt;&gt;&gt; {{/selling/default||КНОПКИ}} , при нажатии на которые мы попадаем в определенные разделы системы. </p><p>Вы программист? Скорее всего, Вы думаете, что не программист. Но теперь Вы им станете. Да и кто вообще не программист после 2020 года? =)</p><p>На каждой карточке с функцией есть 2 кнопки. Первая кнопка - это пример кнопки, которую мы можем “зашить” в текст. Нажмите на неё и всё поймёте. Вы их уже видели в регламентах. </p><p>Вторая кнопка - это волшебный код. Нажмите на неё и увидите этот код. Просто скопируйте этот код (самый интересный способ - трижды кликнув на код левой кнопкой мыши и нажав правой кнопкой). Теперь вставьте этот код в левой части в описание раздела. В ту часть, где Вы хотите, чтобы функция отображалась. К примеру, в должностные обязанности продавца можно было бы скопировать код кнопки списка клиентов или воронки продаж или кнопку создания нового процесса продажи. </p><p>Нажимайте кнопку “добавить” внизу и наслаждайтесь Вашим запрограммированным текстом в Вашем собственном регламенте.</p><p>Мне кажется, у Вас уже возникла масса идей, как можно использовать эту черную магию )</p><p>Теперь давайте посмотрим раздел “Презентация”, который тесно связан с тем, что мы уже знаем о регламентах. </p>','/regularity_images/sound-space-3851251_1920.jpg',1),(141,'Презентация',NULL,157,NULL,'','<p>Презентация - это в общем то те же самые регламенты, но в более… ээм… презентабельной … ээм… ФОРМЕ =)</p><p>По сути, это регламенты с картинками в формате типичных презентаций, но всё с теми же встроенными кнопками, которые вызывают специальные функции. </p><p>В отличии от панели настроек регламентов, тут подразумевается возможность последовательного просмотра регламентов в том порядке, в котором Вы их задали. </p><p>Вы просто начинаете с первого регламента и движетесь по разделам, нажимая кнопку “далее”. И так один за другим. </p><p>Вероятно, Вы сейчас читаете этот текст из раздела презентации. И конечно же, Вы можете всё тут поменять так, как Вам захочется. </p><p>Зайдите  в  {{/core/regularity||РЕГЛАМЕНТЫ}} и добавитье новый пункт или отредактируйте существующий (кнопка карандаша на блоке пункта).</p><p>При создании или редактировании пункта Вы можете добавлять картинку. Это должна быть большая картинка, далее она отобразится на пол экрана в презентации.</p><p>Важно поставить галочку “публичный” в настройках пункта, а также убедиться что такая же галочка установлена в регламенте. Для этого отредактируйте свой регламент в списке {{/core/regularity/settings||НАСТРОЙКИ РЕГЛАМЕНТОВ}} .  </p><p>Теперь Вы можете зайти в {{/core/regularity/regularity||ПРЕЗЕНТАЦИИ}}  и посмотреть, как это выглядит. </p><p>Вы можете также создавать презентации для Ваших клиентов и делиться с ними ссылкой на презентацию. Но важно понимать, что функции системы (кнопки) не будут для них работать. </p>','/regularity_images/innovation-561388_1920.jpg',1),(142,'Календарь',NULL,157,NULL,'','<p>Данный раздел нужен для того, чтобы планировать время и не только. </p><p>(календарем удобнее всего пользоваться на большом экране с помощью компьютерной мыши)</p><p>Календарь можно смотреть в разрезе месяца, недели, дня или повестки дня. </p><p>В верхней части календаря Вы можете видеть кнопки, которые переключают эти режимы.</p><p>Месяц - это 28-31 день “как на ладони”, в котором отображаются события. </p><p>Вы можете кликнуть на любой из дней и появится окошко, в котором Вы можете создать название и описание Вашего календарного события. </p><p>Неделя отличается тем, что тут мы видим 7 колонок, в которых видны не только сами события, но и их продолжительность. Вы можете перетягивать события с места на место или же тянуть их за нижний край, изменяя таким образом их продолжительность. </p><p>В режиме дня Вы увидите точно такую же колонку, как в неделе, но по ширине экрана. Подойдёт для детального планирования событий, которые происходят параллельно. </p><p>Теперь немного практики. Посмотрите раздел {{/event||КАЛЕНДАРЬ   }} и попробуйте создавать изменять и перетаскивать события. Это очень просто. </p><p>Интересно знать, что в процессе продаж и переговоров с клиентом Вы (а точнее менеджеры отдела продаж) можете использовать функциональность календаря, чтобы планировать встречи или созвоны для отдела продаж. Он встроен прямо в модуль переговоров, это очень удобно! </p>','/regularity_images/bulletin-board-3233653_1920.jpg',1),(143,'События',NULL,157,NULL,'','<p>В системе постоянно происходят различные события: добавили продажу, удалили клиента, изменили регламент… Все эти события строго фиксируются в системе и их можно отслеживать. Давайте на них посмотрим с помощью этой кнопки {{/core/system-event||СМОТРЕТЬ СОБЫТИЯ}}. События кратко говорят что, когда и в каком отделе произошло. Вы можете переходить прямо из событий к просмотру элементов раздела, нажимая соответствующие кнопки. </p>','/regularity_images/message-in-a-bottle-413680_1920.jpg',1),(144,'Планирование',NULL,158,NULL,'','',NULL,1),(145,'Электронная коммерция',NULL,158,NULL,'','',NULL,1),(146,'Управление магазином',NULL,158,NULL,'','',NULL,1),(147,'Обработка заявок',NULL,158,NULL,'','',NULL,1),(148,'Здоровье человека',NULL,158,NULL,'','',NULL,1),(149,'Образовательные системы',NULL,158,NULL,'','',NULL,1),(150,'IOT - интернет вещей',NULL,158,NULL,'','',NULL,1),(151,'Генератор платформ',NULL,158,NULL,'','',NULL,1),(152,'Голосовой помощник',NULL,158,NULL,'','',NULL,1),(153,'Мобильные приложения',NULL,158,NULL,'','',NULL,1),(154,'Искусственный интеллект',NULL,158,NULL,'','',NULL,1),(155,'Иммортал Инжелло',NULL,158,NULL,'','',NULL,1),(156,'Форма',NULL,159,NULL,'weadfsehtgjhm','<p>ФОРМА Вашей компании - это тысячи полезных функций для <strong>систематизации бизнеса, повышения </strong>показателей <strong>продаж</strong> и <strong>дисциплины</strong>. И конечно для <strong>подготовки</strong> малого бизнеса к <strong>росту</strong> (а для малого и крупного бизнеса, готового к росту, наша команда проектирует дорогие индивидуальные решения и предоставляет экспертные услуги). </p><p>Здесь, в разделе регламентов, <strong>Вы научитесь эффективно управлять системой</strong> и изменять её под свой бизнес. Это не пустой текст - Вы сразу же будете <strong>на практике</strong> строить и управлять Вашей индивидуальной системой благодаря <strong>уникальным функциям</strong> ФОРМЫ. </p><p>Раздел регламента - это <strong>инструмент управления компанией</strong> и внедрения в компанию <strong>систем автоматизации</strong>. Даже если у Вас 0 опыта - Вы постепенно освоите все возможности. Если у Вас есть опыт - Вы очень быстро разберетесь. В любом случае, мы поможем.\r\n</p><p>Регламенты - это большие информационные блоки. Каждый регламент состоит из разделов - конкретного текста, объясняющего возможности системы. Внутри разделов могут быть использованы специальные кнопки, нажатие на которые позволяет посмотреть реальную функциональность системы в маленьком компактном окошке. Это удобно. Давайте приступим!qwdefgryjilk.l</p>',NULL,1),(157,'Управление',NULL,159,NULL,'','<p>Данный раздел предназначен для менеджеров, директоров и управленцев. Независимо от количества людей в Вашем бизнесе (даже если это только Вы) - это удобный инструмент контроля, планирования и мониторинга деятельности Вашего бизнеса. Данный тип систем для управления называется АСУП - Автоматизированная система управления предприятием. Система ФОРМА максимально упрощает управление для малого бизнеса. А для проектирования сложных систем обратиться в компанию ingello (разработчик ФОРМЫ).</p>',NULL,1),(158,'Продукты',NULL,159,NULL,'','<p>Бизнес строится на извлечении прибыли при продаже продукта и\\или оказании услуги. И данный раздел Вам в этом поможет. Он удобен для описания каталога продуктов или услуг. Для продвинутых пользователей доступен конструктор, который позволит создавать сложные формы добавления продуктов в каталог. Об этом позже.  </p>',NULL,1),(159,'Учет ресурсов',NULL,159,NULL,'','<p>Данный раздел поможет<strong> вести учет </strong>объектов в Вашей собственности. Это могут быть просто любые вещи. Например - столы, стулья, инструменты, компьютеры. Так-же это могут быть продукты, которые Вы продаёте. Более того: Вы сможете управлять целой сетью складов, производить операции <strong>закупок, транзитов и инвентаризации,</strong> учитывать <strong>накладные расходы, налоги</strong> и многое другое. </p><p>Системы такого класса называются <strong>WMR</strong> (Warehouse Management System - Система Управления Складом), а так-же имеются элементы систем типа <strong>ERP</strong> - (Enterprise Resource Planning - планирование ресурсов предприятия). </p>',NULL,1),(160,'Продажи',NULL,159,NULL,'','<p>При проектировании системы ФОРМА, архитектор был убежден, что <strong>продажи</strong> - это самая важная часть любой бизнес-системы. Конечно же, всё работает в комплексе, и важны все отделы и их функции.</p><p> Но цель системы ФОРМА - это вывести бизнес <strong>на новый уровень</strong>, навести порядок в взаимоотношениях с клиентами. Все необходимые функции Вы найдёте тут. </p><p>Мы расскажем, как планировать <strong>переговоры</strong>, как <strong>обслуживать</strong> и опрашивать <strong>клиентов</strong>, как нарабатывать <strong>клиентскую базу</strong> и <strong>историю</strong> по каждому клиенту индивидуально, как разработать свою собственную <strong>стратегию</strong> <strong>продаж</strong> и <strong>автоматизировать</strong> их. </p><p>Системы такого типа называются популярным словом <strong>CRM</strong>  (Customer Relationship Management - <strong>Система управления взаимоотношениями с клиентами).</strong></p>',NULL,1),(161,'Кадры',NULL,159,NULL,'','<p>Даже если Вы пока один - вероятно, это не на долго. Для того, чтобы бизнес рос и распространяется, как франшиза, как вирус, - <strong>нужны кадры</strong>. Они, как говорится, “решают”. Позже мы поговорим как построить и <strong>систематизировать</strong> отдел кадров, как благодаря <strong>автоматизации</strong> избежать ненужной волокиты при <strong>найме</strong> и как перестать обучать кадровиков, а вместо этого сделать так, чтобы они обучали Вашу систему. </p><p>Отдел стоит на трёх китах - <strong>найм</strong>, <strong>вакансия</strong> и <strong>кадр</strong>. В прогрессивных областях конкуренция происходит не за клиентов, а за специалистов. И эту тенденцию важно не пропустить. </p><p>Системы такого класса называются <strong>HRM</strong> (Human Resource Management - <strong>Управление Человеко-Ресурсом</strong>). </p>',NULL,1),(162,'Экспертные системы',NULL,159,NULL,'','<p>Данный класс систем предназначен для <strong>продвинутых</strong> компаний или предприятий, которые создаются на базе <strong>хорошего финансирования</strong> с целью <strong>скорейшего роста</strong>. Это не просто системы, <strong>это возможности</strong>. И в заключительной части мы познакомим Вас с возможностями ИТ компании ingello а также с её наработками. </p><p>Система ФОРМА - это <strong>бесплатный инструмент </strong>для компаний, который отлично подойдёт <strong>на ранних этапах развития</strong>, но планировать будущие разработки всегда лучше заранее и мы с удовольствием в этом поможем. </p><p>Поговорим о системах класса <strong>E-Commerce</strong> и <strong>Marketplace</strong> - для международной торговли, о системах <strong>PMS</strong> для управления проектами и командами, о системах <strong>HIS</strong> для медицинского обслуживания, об <strong>API</strong> системах и базах данных, про <strong>IOT</strong> - интернет вещей и умные дома, про большие данные и искусственный интеллект и даже про квантовую механику! </p><p>Спасибо, что изучаете регламент. Теперь перейдем к конкретной и формальной части. </p>',NULL,1),(163,'Категории продуктов',NULL,160,NULL,'','',NULL,1),(164,'Форма продукта',NULL,160,NULL,'','',NULL,1),(165,'Каталог',NULL,160,NULL,'','',NULL,1),(166,'Склад',NULL,161,NULL,'','<p>Основные операции</p>',NULL,1),(167,'Закупки',NULL,161,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расходы</p><p>сумма</p><p>ожидаются</p>',NULL,1),(168,'Перемещение',NULL,161,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расхоы</p><p>сумма</p><p>ожидаются</p>',NULL,1),(169,'Инвентаризация',NULL,161,NULL,'','',NULL,1),(170,'Воронка кадров',NULL,162,NULL,'','',NULL,1),(171,'Вакансии',NULL,162,NULL,'','',NULL,1),(172,'Кадры',NULL,162,NULL,'','',NULL,1),(173,'Проекты',NULL,162,NULL,'','',NULL,1),(174,'Процесс найма',NULL,162,NULL,'','',NULL,1),(175,'Должностные инструкции',NULL,162,NULL,'','',NULL,1),(176,'Показатели',NULL,163,NULL,'','<p>Это пульс Вашей компании. На ней отображаются основные показатели Вашей компании. Обычно эту панель принято называть “Дэшборд”.  </p><p>Дэшборд состоит из виджетов - специальных блоков, в которых могут отображаться графики, таблицы другие формы данных. </p><p>К примеру, в ФОРМУ по умолчанию включен миниатюрный календарь, список сотрудников, состояние процессов найма, виджет воронки продаж, виджет статистики продаж по складам, виджет основных показателей и многое другое. Все эти функции мы рассмотрим в соответствующих разделах. </p><p>В каждом виджете есть специальная кнопка с тремя линиями, в которой есть основные функции виджета. Пока просто запомните, что такая есть. Она для супер-продвинутых пользователей или для тех, кто прочитал все регламенты. </p><p>Вы можете определить, какие данные Вам важнее видеть. Сейчас, в качестве первого практического взаимодействия, попробуем настроить дэшборд на Ваш вкус. Для этого мы будем перетаскивать виджеты курсором мыши в нужное Вам положение. Зажмите левую кнопку мыши на названии виджета и перемещайте его. Если виджет Вам не нужен - перетяните его в верхнюю панель (позже сможете вернуть). Если виджет Вам нужен - перетаскивайте его повыше. Если не важен - по ниже. Также можно свернуть виджет, нажав на кнопку “-”.</p><p><strong>ПОСМОТРИТЕ НА ДЭШБОРД,</strong> чтобы начать экспериментировать с панелью.</p><p>(Настраивать дэшборд можно только на большом экране)</p>',NULL,1),(177,'Регламент',NULL,163,NULL,'','<p>Регламенты нужны для того, чтобы написать правила работы компании и пересечь эти правила с функциями системы. Это очень мощная функция системы!</p><p>Интересный факт: Вы сейчас читаете регламент. Но его написал я, Олег, - архитектор данной системы, других систем для малого бизнеса и ряда других коммерческих и некоммерческих систем. Но никто не знает Ваш бизнес лучше, чем Вы. И потому в будущем Вы полностью перепишете регламенты Вашей компании. Задача команды ingello - предоставить бесплатные функции на первое время, до начала стадии активного роста бизнеса, на стадии выживания. </p><p>Регламент - это важнейший набор правил, определяющий поведение компании. Но это не просто текст. Это мультифункциональный текст, в который можно зашить любую из тысяч функций системы. А давайте я прямо сейчас покажу, как всё это устроено внутри.</p><p>Важно: Это может оказаться сложно для новичков, потому Вы можете пропустить этот раздел и вернуться к нему позже. Либо же будьте готовы попробовать несколько раз, пока не получится. А получится полюбому. </p><p>Начнем! Для начала, нажимайте эту кнопку, осмотритесь и закройте окно {{/core/regularity/settings||СМОТРЕТЬ СПИСОК РЕГЛАМЕНТОВ}}  <a href=\"https://forma.ingello.com/core/regularity/settings\"></a></p><p>Видели этот список? Это список регламентов, один из которых Вы сейчас читаете. А самое интересно это то, что в Вашей власти его изменить! Давайте договоримся пока ничего не удалять, чтобы не нарушить программу. Но давайте что-нибудь добавим новое!</p><p>Чтобы не добавлять что-попало, давайте создадим список должностных обязанностей. </p><p>Тогда, регламент будет называться “Должностные обязанности”, а его разделы (пункты) будут называться “Обязанности менеджера”, “Обязанности продавца”, “Обязанности администратора”. Нажимая на эти пункты мы будем видеть текст, в котором будут описаны эти обязанности, к примеру “В обязанности продавца входит приветствовать клиента, консультировать его согласно следующим правилам….”. Ну, Вы поняли, надеюсь. </p><p>Итак, попробуем добавить регламент. Вы можете нажать на предыдущую кнопку и добавить новый регламент в список.</p><p>Или просто нажмите на эту кнопку и дайте название “Должностные обязанности” своему собственному регламенту {{/core/regularity/create||СОЗДАЙТЕ СВОЙ РЕГЛАМЕНТ}}  </p><p>Верю, что у Вас всё получилось. Но давайте это проверим. Нажмите эту кнопку {{/core/regularity||РЕГЛАМЕНТЫ}}. Заметили? Теперь в регламентах появился Ваш собственный регламент с названием, которое Вы написали!</p><p>Далее нужно наполнить его пунктами. То есть, к примеру, должен получится \"список обязанностей для разных ролей Вашего бизнеса\".  Давайте это сделаем.  {{/core/regularity||ОТКРОЙТЕ СПИСОК РЕГЛАМЕНТОВ И РАЗДЕЛОВ}} <a href=\"https://forma.ingello.com/core/regularity\"></a></p><p>Сверху (в ряд) располагаются вкладки всех регламентов и среди них должен быть Ваш только что созданный. Нажмите на него и увидете кнопку “Добавить пункт”. Клацайте на неё. </p><p>В появившемся окне нужно как минимум написать название пункта и его описание. Можете еще выбрать его цвет. Если следовать нашему примеру, - то в название пишите должность, а в описание - обязанности этой должности. И нажимайте кнопку “Добавить” внизу формы. </p><p>Повторите это действие несколько раз, чтобы наполнить регламент пунктами.</p><p>А в следующем пункте мы поговорим о более сложном применении регламентов - о связывании их с функциями системы. И разберемся, что за непонятные кнопочки были справа при создании регламента. </p>',NULL,1),(178,'Регламент для продвинутых',NULL,163,NULL,'','<p>Теперь поговорим про беспрецедентно мощную функцию системы ФОРМА, которая способна создать из Вашего бизнеса точку непреодолимой силы на Вашем рынке. </p><p>Создайте любой новый раздел в  {{/core/regularity/create||РЕГЛАМЕНТЕ}} (как в прошлом пункте), но не спешите сохранять.</p><p>Помимо названия, описания и цвета регламента тут есть поле для загрузки картинки (в следующем разделе про презентацию мы поговорим об этом). </p><p>Сейчас нас больше интересует правая часть. В ней Вы видите карточки с какими то кнопками. </p><p>Вся правая часть делится на разные разделы, Вы могли обратить внимание, что они повторяют пункты меню системы (вот те, разноцветные, слева &lt;&lt;&lt;). Все эти функции (и не только эти) Вы можете использовать и они могут превращаться в вот такие &gt;&gt;&gt; {{/selling/default||КНОПКИ}} , при нажатии на которые мы попадаем в определенные разделы системы. </p><p>Вы программист? Скорее всего, Вы думаете, что не программист. Но теперь Вы им станете. Да и кто вообще не программист после 2020 года? =)</p><p>На каждой карточке с функцией есть 2 кнопки. Первая кнопка - это пример кнопки, которую мы можем “зашить” в текст. Нажмите на неё и всё поймёте. Вы их уже видели в регламентах. </p><p>Вторая кнопка - это волшебный код. Нажмите на неё и увидите этот код. Просто скопируйте этот код (самый интересный способ - трижды кликнув на код левой кнопкой мыши и нажав правой кнопкой). Теперь вставьте этот код в левой части в описание раздела. В ту часть, где Вы хотите, чтобы функция отображалась. К примеру, в должностные обязанности продавца можно было бы скопировать код кнопки списка клиентов или воронки продаж или кнопку создания нового процесса продажи. </p><p>Нажимайте кнопку “добавить” внизу и наслаждайтесь Вашим запрограммированным текстом в Вашем собственном регламенте.</p><p>Мне кажется, у Вас уже возникла масса идей, как можно использовать эту черную магию )</p><p>Теперь давайте посмотрим раздел “Презентация”, который тесно связан с тем, что мы уже знаем о регламентах. </p>',NULL,1),(179,'Презентация',NULL,163,NULL,'','<p>Презентация - это в общем то те же самые регламенты, но в более… ээм… презентабельной … ээм… ФОРМЕ =)</p><p>По сути, это регламенты с картинками в формате типичных презентаций, но всё с теми же встроенными кнопками, которые вызывают специальные функции. </p><p>В отличии от панели настроек регламентов, тут подразумевается возможность последовательного просмотра регламентов в том порядке, в котором Вы их задали. </p><p>Вы просто начинаете с первого регламента и движетесь по разделам, нажимая кнопку “далее”. И так один за другим. </p><p>Вероятно, Вы сейчас читаете этот текст из раздела презентации. И конечно же, Вы можете всё тут поменять так, как Вам захочется. </p><p>Зайдите  в  {{/core/regularity||РЕГЛАМЕНТЫ}} и добавитье новый пункт или отредактируйте существующий (кнопка карандаша на блоке пункта).</p><p>При создании или редактировании пункта Вы можете добавлять картинку. Это должна быть большая картинка, далее она отобразится на пол экрана в презентации.</p><p>Важно поставить галочку “публичный” в настройках пункта, а также убедиться что такая же галочка установлена в регламенте. Для этого отредактируйте свой регламент в списке {{/core/regularity/settings||НАСТРОЙКИ РЕГЛАМЕНТОВ}} .  </p><p>Теперь Вы можете зайти в {{/core/regularity/regularity||ПРЕЗЕНТАЦИИ}}  и посмотреть, как это выглядит. </p><p>Вы можете также создавать презентации для Ваших клиентов и делиться с ними ссылкой на презентацию. Но важно понимать, что функции системы (кнопки) не будут для них работать. </p>',NULL,1),(180,'Календарь',NULL,163,NULL,'','<p>Данный раздел нужен для того, чтобы планировать время и не только. </p><p>(календарем удобнее всего пользоваться на большом экране с помощью компьютерной мыши)</p><p>Календарь можно смотреть в разрезе месяца, недели, дня или повестки дня. </p><p>В верхней части календаря Вы можете видеть кнопки, которые переключают эти режимы.</p><p>Месяц - это 28-31 день “как на ладони”, в котором отображаются события. </p><p>Вы можете кликнуть на любой из дней и появится окошко, в котором Вы можете создать название и описание Вашего календарного события. </p><p>Неделя отличается тем, что тут мы видим 7 колонок, в которых видны не только сами события, но и их продолжительность. Вы можете перетягивать события с места на место или же тянуть их за нижний край, изменяя таким образом их продолжительность. </p><p>В режиме дня Вы увидите точно такую же колонку, как в неделе, но по ширине экрана. Подойдёт для детального планирования событий, которые происходят параллельно. </p><p>Теперь немного практики. Посмотрите раздел {{/event||КАЛЕНДАРЬ   }} и попробуйте создавать изменять и перетаскивать события. Это очень просто. </p><p>Интересно знать, что в процессе продаж и переговоров с клиентом Вы (а точнее менеджеры отдела продаж) можете использовать функциональность календаря, чтобы планировать встречи или созвоны для отдела продаж. Он встроен прямо в модуль переговоров, это очень удобно! </p>',NULL,1),(181,'События',NULL,163,NULL,'','<p>В системе постоянно происходят различные события: добавили продажу, удалили клиента, изменили регламент… Все эти события строго фиксируются в системе и их можно отслеживать. Давайте на них посмотрим с помощью этой кнопки {{/core/system-event||СМОТРЕТЬ СОБЫТИЯ}}. События кратко говорят что, когда и в каком отделе произошло. Вы можете переходить прямо из событий к просмотру элементов раздела, нажимая соответствующие кнопки. </p>',NULL,1),(182,'Планирование',NULL,164,NULL,'','',NULL,1),(183,'Электронная коммерция',NULL,164,NULL,'','',NULL,1),(184,'Управление магазином',NULL,164,NULL,'','',NULL,1),(185,'Обработка заявок',NULL,164,NULL,'','',NULL,1),(186,'Здоровье человека',NULL,164,NULL,'','',NULL,1),(187,'Образовательные системы',NULL,164,NULL,'','',NULL,1),(188,'IOT - интернет вещей',NULL,164,NULL,'','',NULL,1),(189,'Генератор платформ',NULL,164,NULL,'','',NULL,1),(190,'Голосовой помощник',NULL,164,NULL,'','',NULL,1),(191,'Мобильные приложения',NULL,164,NULL,'','',NULL,1),(192,'Искусственный интеллект',NULL,164,NULL,'','',NULL,1),(193,'Иммортал Инжелло',NULL,164,NULL,'','',NULL,1),(194,'Форма',NULL,165,NULL,'weadfsehtgjhm','<p>ФОРМА Вашей компании - это тысячи полезных функций для <strong>систематизации бизнеса, повышения </strong>показателей <strong>продаж</strong> и <strong>дисциплины</strong>. И конечно для <strong>подготовки</strong> малого бизнеса к <strong>росту</strong> (а для малого и крупного бизнеса, готового к росту, наша команда проектирует дорогие индивидуальные решения и предоставляет экспертные услуги). </p><p>Здесь, в разделе регламентов, <strong>Вы научитесь эффективно управлять системой</strong> и изменять её под свой бизнес. Это не пустой текст - Вы сразу же будете <strong>на практике</strong> строить и управлять Вашей индивидуальной системой благодаря <strong>уникальным функциям</strong> ФОРМЫ. </p><p>Раздел регламента - это <strong>инструмент управления компанией</strong> и внедрения в компанию <strong>систем автоматизации</strong>. Даже если у Вас 0 опыта - Вы постепенно освоите все возможности. Если у Вас есть опыт - Вы очень быстро разберетесь. В любом случае, мы поможем.\r\n</p><p>Регламенты - это большие информационные блоки. Каждый регламент состоит из разделов - конкретного текста, объясняющего возможности системы. Внутри разделов могут быть использованы специальные кнопки, нажатие на которые позволяет посмотреть реальную функциональность системы в маленьком компактном окошке. Это удобно. Давайте приступим!qwdefgryjilk.l</p>',NULL,1),(195,'Управление',NULL,165,NULL,'','<p>Данный раздел предназначен для менеджеров, директоров и управленцев. Независимо от количества людей в Вашем бизнесе (даже если это только Вы) - это удобный инструмент контроля, планирования и мониторинга деятельности Вашего бизнеса. Данный тип систем для управления называется АСУП - Автоматизированная система управления предприятием. Система ФОРМА максимально упрощает управление для малого бизнеса. А для проектирования сложных систем обратиться в компанию ingello (разработчик ФОРМЫ).</p>',NULL,1),(196,'Продукты',NULL,165,NULL,'','<p>Бизнес строится на извлечении прибыли при продаже продукта и\\или оказании услуги. И данный раздел Вам в этом поможет. Он удобен для описания каталога продуктов или услуг. Для продвинутых пользователей доступен конструктор, который позволит создавать сложные формы добавления продуктов в каталог. Об этом позже.  </p>',NULL,1),(197,'Учет ресурсов',NULL,165,NULL,'','<p>Данный раздел поможет<strong> вести учет </strong>объектов в Вашей собственности. Это могут быть просто любые вещи. Например - столы, стулья, инструменты, компьютеры. Так-же это могут быть продукты, которые Вы продаёте. Более того: Вы сможете управлять целой сетью складов, производить операции <strong>закупок, транзитов и инвентаризации,</strong> учитывать <strong>накладные расходы, налоги</strong> и многое другое. </p><p>Системы такого класса называются <strong>WMR</strong> (Warehouse Management System - Система Управления Складом), а так-же имеются элементы систем типа <strong>ERP</strong> - (Enterprise Resource Planning - планирование ресурсов предприятия). </p>',NULL,1),(198,'Продажи',NULL,165,NULL,'','<p>При проектировании системы ФОРМА, архитектор был убежден, что <strong>продажи</strong> - это самая важная часть любой бизнес-системы. Конечно же, всё работает в комплексе, и важны все отделы и их функции.</p><p> Но цель системы ФОРМА - это вывести бизнес <strong>на новый уровень</strong>, навести порядок в взаимоотношениях с клиентами. Все необходимые функции Вы найдёте тут. </p><p>Мы расскажем, как планировать <strong>переговоры</strong>, как <strong>обслуживать</strong> и опрашивать <strong>клиентов</strong>, как нарабатывать <strong>клиентскую базу</strong> и <strong>историю</strong> по каждому клиенту индивидуально, как разработать свою собственную <strong>стратегию</strong> <strong>продаж</strong> и <strong>автоматизировать</strong> их. </p><p>Системы такого типа называются популярным словом <strong>CRM</strong>  (Customer Relationship Management - <strong>Система управления взаимоотношениями с клиентами).</strong></p>',NULL,1),(199,'Кадры',NULL,165,NULL,'','<p>Даже если Вы пока один - вероятно, это не на долго. Для того, чтобы бизнес рос и распространяется, как франшиза, как вирус, - <strong>нужны кадры</strong>. Они, как говорится, “решают”. Позже мы поговорим как построить и <strong>систематизировать</strong> отдел кадров, как благодаря <strong>автоматизации</strong> избежать ненужной волокиты при <strong>найме</strong> и как перестать обучать кадровиков, а вместо этого сделать так, чтобы они обучали Вашу систему. </p><p>Отдел стоит на трёх китах - <strong>найм</strong>, <strong>вакансия</strong> и <strong>кадр</strong>. В прогрессивных областях конкуренция происходит не за клиентов, а за специалистов. И эту тенденцию важно не пропустить. </p><p>Системы такого класса называются <strong>HRM</strong> (Human Resource Management - <strong>Управление Человеко-Ресурсом</strong>). </p>',NULL,1),(200,'Экспертные системы',NULL,165,NULL,'','<p>Данный класс систем предназначен для <strong>продвинутых</strong> компаний или предприятий, которые создаются на базе <strong>хорошего финансирования</strong> с целью <strong>скорейшего роста</strong>. Это не просто системы, <strong>это возможности</strong>. И в заключительной части мы познакомим Вас с возможностями ИТ компании ingello а также с её наработками. </p><p>Система ФОРМА - это <strong>бесплатный инструмент </strong>для компаний, который отлично подойдёт <strong>на ранних этапах развития</strong>, но планировать будущие разработки всегда лучше заранее и мы с удовольствием в этом поможем. </p><p>Поговорим о системах класса <strong>E-Commerce</strong> и <strong>Marketplace</strong> - для международной торговли, о системах <strong>PMS</strong> для управления проектами и командами, о системах <strong>HIS</strong> для медицинского обслуживания, об <strong>API</strong> системах и базах данных, про <strong>IOT</strong> - интернет вещей и умные дома, про большие данные и искусственный интеллект и даже про квантовую механику! </p><p>Спасибо, что изучаете регламент. Теперь перейдем к конкретной и формальной части. </p>',NULL,1),(201,'Категории продуктов',NULL,166,NULL,'','',NULL,1),(202,'Форма продукта',NULL,166,NULL,'','',NULL,1),(203,'Каталог',NULL,166,NULL,'','',NULL,1),(204,'Склад',NULL,167,NULL,'','<p>Основные операции</p>',NULL,1),(205,'Закупки',NULL,167,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расходы</p><p>сумма</p><p>ожидаются</p>',NULL,1),(206,'Перемещение',NULL,167,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расхоы</p><p>сумма</p><p>ожидаются</p>',NULL,1),(207,'Инвентаризация',NULL,167,NULL,'','',NULL,1),(208,'Воронка кадров',NULL,168,NULL,'','',NULL,1),(209,'Вакансии',NULL,168,NULL,'','',NULL,1),(210,'Кадры',NULL,168,NULL,'','',NULL,1),(211,'Проекты',NULL,168,NULL,'','',NULL,1),(212,'Процесс найма',NULL,168,NULL,'','',NULL,1),(213,'Должностные инструкции',NULL,168,NULL,'','',NULL,1),(214,'Показатели',NULL,169,NULL,'','<p>Это пульс Вашей компании. На ней отображаются основные показатели Вашей компании. Обычно эту панель принято называть “Дэшборд”.  </p><p>Дэшборд состоит из виджетов - специальных блоков, в которых могут отображаться графики, таблицы другие формы данных. </p><p>К примеру, в ФОРМУ по умолчанию включен миниатюрный календарь, список сотрудников, состояние процессов найма, виджет воронки продаж, виджет статистики продаж по складам, виджет основных показателей и многое другое. Все эти функции мы рассмотрим в соответствующих разделах. </p><p>В каждом виджете есть специальная кнопка с тремя линиями, в которой есть основные функции виджета. Пока просто запомните, что такая есть. Она для супер-продвинутых пользователей или для тех, кто прочитал все регламенты. </p><p>Вы можете определить, какие данные Вам важнее видеть. Сейчас, в качестве первого практического взаимодействия, попробуем настроить дэшборд на Ваш вкус. Для этого мы будем перетаскивать виджеты курсором мыши в нужное Вам положение. Зажмите левую кнопку мыши на названии виджета и перемещайте его. Если виджет Вам не нужен - перетяните его в верхнюю панель (позже сможете вернуть). Если виджет Вам нужен - перетаскивайте его повыше. Если не важен - по ниже. Также можно свернуть виджет, нажав на кнопку “-”.</p><p><strong>ПОСМОТРИТЕ НА ДЭШБОРД,</strong> чтобы начать экспериментировать с панелью.</p><p>(Настраивать дэшборд можно только на большом экране)</p>',NULL,1),(215,'Регламент',NULL,169,NULL,'','<p>Регламенты нужны для того, чтобы написать правила работы компании и пересечь эти правила с функциями системы. Это очень мощная функция системы!</p><p>Интересный факт: Вы сейчас читаете регламент. Но его написал я, Олег, - архитектор данной системы, других систем для малого бизнеса и ряда других коммерческих и некоммерческих систем. Но никто не знает Ваш бизнес лучше, чем Вы. И потому в будущем Вы полностью перепишете регламенты Вашей компании. Задача команды ingello - предоставить бесплатные функции на первое время, до начала стадии активного роста бизнеса, на стадии выживания. </p><p>Регламент - это важнейший набор правил, определяющий поведение компании. Но это не просто текст. Это мультифункциональный текст, в который можно зашить любую из тысяч функций системы. А давайте я прямо сейчас покажу, как всё это устроено внутри.</p><p>Важно: Это может оказаться сложно для новичков, потому Вы можете пропустить этот раздел и вернуться к нему позже. Либо же будьте готовы попробовать несколько раз, пока не получится. А получится полюбому. </p><p>Начнем! Для начала, нажимайте эту кнопку, осмотритесь и закройте окно {{/core/regularity/settings||СМОТРЕТЬ СПИСОК РЕГЛАМЕНТОВ}}  <a href=\"https://forma.ingello.com/core/regularity/settings\"></a></p><p>Видели этот список? Это список регламентов, один из которых Вы сейчас читаете. А самое интересно это то, что в Вашей власти его изменить! Давайте договоримся пока ничего не удалять, чтобы не нарушить программу. Но давайте что-нибудь добавим новое!</p><p>Чтобы не добавлять что-попало, давайте создадим список должностных обязанностей. </p><p>Тогда, регламент будет называться “Должностные обязанности”, а его разделы (пункты) будут называться “Обязанности менеджера”, “Обязанности продавца”, “Обязанности администратора”. Нажимая на эти пункты мы будем видеть текст, в котором будут описаны эти обязанности, к примеру “В обязанности продавца входит приветствовать клиента, консультировать его согласно следующим правилам….”. Ну, Вы поняли, надеюсь. </p><p>Итак, попробуем добавить регламент. Вы можете нажать на предыдущую кнопку и добавить новый регламент в список.</p><p>Или просто нажмите на эту кнопку и дайте название “Должностные обязанности” своему собственному регламенту {{/core/regularity/create||СОЗДАЙТЕ СВОЙ РЕГЛАМЕНТ}}  </p><p>Верю, что у Вас всё получилось. Но давайте это проверим. Нажмите эту кнопку {{/core/regularity||РЕГЛАМЕНТЫ}}. Заметили? Теперь в регламентах появился Ваш собственный регламент с названием, которое Вы написали!</p><p>Далее нужно наполнить его пунктами. То есть, к примеру, должен получится \"список обязанностей для разных ролей Вашего бизнеса\".  Давайте это сделаем.  {{/core/regularity||ОТКРОЙТЕ СПИСОК РЕГЛАМЕНТОВ И РАЗДЕЛОВ}} <a href=\"https://forma.ingello.com/core/regularity\"></a></p><p>Сверху (в ряд) располагаются вкладки всех регламентов и среди них должен быть Ваш только что созданный. Нажмите на него и увидете кнопку “Добавить пункт”. Клацайте на неё. </p><p>В появившемся окне нужно как минимум написать название пункта и его описание. Можете еще выбрать его цвет. Если следовать нашему примеру, - то в название пишите должность, а в описание - обязанности этой должности. И нажимайте кнопку “Добавить” внизу формы. </p><p>Повторите это действие несколько раз, чтобы наполнить регламент пунктами.</p><p>А в следующем пункте мы поговорим о более сложном применении регламентов - о связывании их с функциями системы. И разберемся, что за непонятные кнопочки были справа при создании регламента. </p>',NULL,1),(216,'Регламент для продвинутых',NULL,169,NULL,'','<p>Теперь поговорим про беспрецедентно мощную функцию системы ФОРМА, которая способна создать из Вашего бизнеса точку непреодолимой силы на Вашем рынке. </p><p>Создайте любой новый раздел в  {{/core/regularity/create||РЕГЛАМЕНТЕ}} (как в прошлом пункте), но не спешите сохранять.</p><p>Помимо названия, описания и цвета регламента тут есть поле для загрузки картинки (в следующем разделе про презентацию мы поговорим об этом). </p><p>Сейчас нас больше интересует правая часть. В ней Вы видите карточки с какими то кнопками. </p><p>Вся правая часть делится на разные разделы, Вы могли обратить внимание, что они повторяют пункты меню системы (вот те, разноцветные, слева &lt;&lt;&lt;). Все эти функции (и не только эти) Вы можете использовать и они могут превращаться в вот такие &gt;&gt;&gt; {{/selling/default||КНОПКИ}} , при нажатии на которые мы попадаем в определенные разделы системы. </p><p>Вы программист? Скорее всего, Вы думаете, что не программист. Но теперь Вы им станете. Да и кто вообще не программист после 2020 года? =)</p><p>На каждой карточке с функцией есть 2 кнопки. Первая кнопка - это пример кнопки, которую мы можем “зашить” в текст. Нажмите на неё и всё поймёте. Вы их уже видели в регламентах. </p><p>Вторая кнопка - это волшебный код. Нажмите на неё и увидите этот код. Просто скопируйте этот код (самый интересный способ - трижды кликнув на код левой кнопкой мыши и нажав правой кнопкой). Теперь вставьте этот код в левой части в описание раздела. В ту часть, где Вы хотите, чтобы функция отображалась. К примеру, в должностные обязанности продавца можно было бы скопировать код кнопки списка клиентов или воронки продаж или кнопку создания нового процесса продажи. </p><p>Нажимайте кнопку “добавить” внизу и наслаждайтесь Вашим запрограммированным текстом в Вашем собственном регламенте.</p><p>Мне кажется, у Вас уже возникла масса идей, как можно использовать эту черную магию )</p><p>Теперь давайте посмотрим раздел “Презентация”, который тесно связан с тем, что мы уже знаем о регламентах. </p>',NULL,1),(217,'Презентация',NULL,169,NULL,'','<p>Презентация - это в общем то те же самые регламенты, но в более… ээм… презентабельной … ээм… ФОРМЕ =)</p><p>По сути, это регламенты с картинками в формате типичных презентаций, но всё с теми же встроенными кнопками, которые вызывают специальные функции. </p><p>В отличии от панели настроек регламентов, тут подразумевается возможность последовательного просмотра регламентов в том порядке, в котором Вы их задали. </p><p>Вы просто начинаете с первого регламента и движетесь по разделам, нажимая кнопку “далее”. И так один за другим. </p><p>Вероятно, Вы сейчас читаете этот текст из раздела презентации. И конечно же, Вы можете всё тут поменять так, как Вам захочется. </p><p>Зайдите  в  {{/core/regularity||РЕГЛАМЕНТЫ}} и добавитье новый пункт или отредактируйте существующий (кнопка карандаша на блоке пункта).</p><p>При создании или редактировании пункта Вы можете добавлять картинку. Это должна быть большая картинка, далее она отобразится на пол экрана в презентации.</p><p>Важно поставить галочку “публичный” в настройках пункта, а также убедиться что такая же галочка установлена в регламенте. Для этого отредактируйте свой регламент в списке {{/core/regularity/settings||НАСТРОЙКИ РЕГЛАМЕНТОВ}} .  </p><p>Теперь Вы можете зайти в {{/core/regularity/regularity||ПРЕЗЕНТАЦИИ}}  и посмотреть, как это выглядит. </p><p>Вы можете также создавать презентации для Ваших клиентов и делиться с ними ссылкой на презентацию. Но важно понимать, что функции системы (кнопки) не будут для них работать. </p>',NULL,1),(218,'Календарь',NULL,169,NULL,'','<p>Данный раздел нужен для того, чтобы планировать время и не только. </p><p>(календарем удобнее всего пользоваться на большом экране с помощью компьютерной мыши)</p><p>Календарь можно смотреть в разрезе месяца, недели, дня или повестки дня. </p><p>В верхней части календаря Вы можете видеть кнопки, которые переключают эти режимы.</p><p>Месяц - это 28-31 день “как на ладони”, в котором отображаются события. </p><p>Вы можете кликнуть на любой из дней и появится окошко, в котором Вы можете создать название и описание Вашего календарного события. </p><p>Неделя отличается тем, что тут мы видим 7 колонок, в которых видны не только сами события, но и их продолжительность. Вы можете перетягивать события с места на место или же тянуть их за нижний край, изменяя таким образом их продолжительность. </p><p>В режиме дня Вы увидите точно такую же колонку, как в неделе, но по ширине экрана. Подойдёт для детального планирования событий, которые происходят параллельно. </p><p>Теперь немного практики. Посмотрите раздел {{/event||КАЛЕНДАРЬ   }} и попробуйте создавать изменять и перетаскивать события. Это очень просто. </p><p>Интересно знать, что в процессе продаж и переговоров с клиентом Вы (а точнее менеджеры отдела продаж) можете использовать функциональность календаря, чтобы планировать встречи или созвоны для отдела продаж. Он встроен прямо в модуль переговоров, это очень удобно! </p>',NULL,1),(219,'События',NULL,169,NULL,'','<p>В системе постоянно происходят различные события: добавили продажу, удалили клиента, изменили регламент… Все эти события строго фиксируются в системе и их можно отслеживать. Давайте на них посмотрим с помощью этой кнопки {{/core/system-event||СМОТРЕТЬ СОБЫТИЯ}}. События кратко говорят что, когда и в каком отделе произошло. Вы можете переходить прямо из событий к просмотру элементов раздела, нажимая соответствующие кнопки. </p>',NULL,1),(220,'Планирование',NULL,170,NULL,'','',NULL,1),(221,'Электронная коммерция',NULL,170,NULL,'','',NULL,1),(222,'Управление магазином',NULL,170,NULL,'','',NULL,1),(223,'Обработка заявок',NULL,170,NULL,'','',NULL,1),(224,'Здоровье человека',NULL,170,NULL,'','',NULL,1),(225,'Образовательные системы',NULL,170,NULL,'','',NULL,1),(226,'IOT - интернет вещей',NULL,170,NULL,'','',NULL,1),(227,'Генератор платформ',NULL,170,NULL,'','',NULL,1),(228,'Голосовой помощник',NULL,170,NULL,'','',NULL,1),(229,'Мобильные приложения',NULL,170,NULL,'','',NULL,1),(230,'Искусственный интеллект',NULL,170,NULL,'','',NULL,1),(231,'Иммортал Инжелло',NULL,170,NULL,'','',NULL,1),(232,'Форма',NULL,171,NULL,'weadfsehtgjhm','<p>ФОРМА Вашей компании - это тысячи полезных функций для <strong>систематизации бизнеса, повышения </strong>показателей <strong>продаж</strong> и <strong>дисциплины</strong>. И конечно для <strong>подготовки</strong> малого бизнеса к <strong>росту</strong> (а для малого и крупного бизнеса, готового к росту, наша команда проектирует дорогие индивидуальные решения и предоставляет экспертные услуги). </p><p>Здесь, в разделе регламентов, <strong>Вы научитесь эффективно управлять системой</strong> и изменять её под свой бизнес. Это не пустой текст - Вы сразу же будете <strong>на практике</strong> строить и управлять Вашей индивидуальной системой благодаря <strong>уникальным функциям</strong> ФОРМЫ. </p><p>Раздел регламента - это <strong>инструмент управления компанией</strong> и внедрения в компанию <strong>систем автоматизации</strong>. Даже если у Вас 0 опыта - Вы постепенно освоите все возможности. Если у Вас есть опыт - Вы очень быстро разберетесь. В любом случае, мы поможем.\r\n</p><p>Регламенты - это большие информационные блоки. Каждый регламент состоит из разделов - конкретного текста, объясняющего возможности системы. Внутри разделов могут быть использованы специальные кнопки, нажатие на которые позволяет посмотреть реальную функциональность системы в маленьком компактном окошке. Это удобно. Давайте приступим!qwdefgryjilk.l</p>',NULL,1),(233,'Управление',NULL,171,NULL,'','<p>Данный раздел предназначен для менеджеров, директоров и управленцев. Независимо от количества людей в Вашем бизнесе (даже если это только Вы) - это удобный инструмент контроля, планирования и мониторинга деятельности Вашего бизнеса. Данный тип систем для управления называется АСУП - Автоматизированная система управления предприятием. Система ФОРМА максимально упрощает управление для малого бизнеса. А для проектирования сложных систем обратиться в компанию ingello (разработчик ФОРМЫ).</p>','/regularity_images/office.jpg',1),(234,'Продукты',NULL,171,NULL,'','<p>Бизнес строится на извлечении прибыли при продаже продукта и\\или оказании услуги. И данный раздел Вам в этом поможет. Он удобен для описания каталога продуктов или услуг. Для продвинутых пользователей доступен конструктор, который позволит создавать сложные формы добавления продуктов в каталог. Об этом позже.  </p>',NULL,1),(235,'Учет ресурсов',NULL,171,NULL,'','<p>Данный раздел поможет<strong> вести учет </strong>объектов в Вашей собственности. Это могут быть просто любые вещи. Например - столы, стулья, инструменты, компьютеры. Так-же это могут быть продукты, которые Вы продаёте. Более того: Вы сможете управлять целой сетью складов, производить операции <strong>закупок, транзитов и инвентаризации,</strong> учитывать <strong>накладные расходы, налоги</strong> и многое другое. </p><p>Системы такого класса называются <strong>WMR</strong> (Warehouse Management System - Система Управления Складом), а так-же имеются элементы систем типа <strong>ERP</strong> - (Enterprise Resource Planning - планирование ресурсов предприятия). </p>',NULL,1),(236,'Продажи',NULL,171,NULL,'','<p>При проектировании системы ФОРМА, архитектор был убежден, что <strong>продажи</strong> - это самая важная часть любой бизнес-системы. Конечно же, всё работает в комплексе, и важны все отделы и их функции.</p><p> Но цель системы ФОРМА - это вывести бизнес <strong>на новый уровень</strong>, навести порядок в взаимоотношениях с клиентами. Все необходимые функции Вы найдёте тут. </p><p>Мы расскажем, как планировать <strong>переговоры</strong>, как <strong>обслуживать</strong> и опрашивать <strong>клиентов</strong>, как нарабатывать <strong>клиентскую базу</strong> и <strong>историю</strong> по каждому клиенту индивидуально, как разработать свою собственную <strong>стратегию</strong> <strong>продаж</strong> и <strong>автоматизировать</strong> их. </p><p>Системы такого типа называются популярным словом <strong>CRM</strong>  (Customer Relationship Management - <strong>Система управления взаимоотношениями с клиентами).</strong></p>',NULL,1),(237,'Кадры',NULL,171,NULL,'','<p>Даже если Вы пока один - вероятно, это не на долго. Для того, чтобы бизнес рос и распространяется, как франшиза, как вирус, - <strong>нужны кадры</strong>. Они, как говорится, “решают”. Позже мы поговорим как построить и <strong>систематизировать</strong> отдел кадров, как благодаря <strong>автоматизации</strong> избежать ненужной волокиты при <strong>найме</strong> и как перестать обучать кадровиков, а вместо этого сделать так, чтобы они обучали Вашу систему. </p><p>Отдел стоит на трёх китах - <strong>найм</strong>, <strong>вакансия</strong> и <strong>кадр</strong>. В прогрессивных областях конкуренция происходит не за клиентов, а за специалистов. И эту тенденцию важно не пропустить. </p><p>Системы такого класса называются <strong>HRM</strong> (Human Resource Management - <strong>Управление Человеко-Ресурсом</strong>). </p>',NULL,1),(238,'Экспертные системы',NULL,171,NULL,'','<p>Данный класс систем предназначен для <strong>продвинутых</strong> компаний или предприятий, которые создаются на базе <strong>хорошего финансирования</strong> с целью <strong>скорейшего роста</strong>. Это не просто системы, <strong>это возможности</strong>. И в заключительной части мы познакомим Вас с возможностями ИТ компании ingello а также с её наработками. </p><p>Система ФОРМА - это <strong>бесплатный инструмент </strong>для компаний, который отлично подойдёт <strong>на ранних этапах развития</strong>, но планировать будущие разработки всегда лучше заранее и мы с удовольствием в этом поможем. </p><p>Поговорим о системах класса <strong>E-Commerce</strong> и <strong>Marketplace</strong> - для международной торговли, о системах <strong>PMS</strong> для управления проектами и командами, о системах <strong>HIS</strong> для медицинского обслуживания, об <strong>API</strong> системах и базах данных, про <strong>IOT</strong> - интернет вещей и умные дома, про большие данные и искусственный интеллект и даже про квантовую механику! </p><p>Спасибо, что изучаете регламент. Теперь перейдем к конкретной и формальной части. </p>',NULL,1),(239,'Категории продуктов',NULL,172,NULL,'','',NULL,1),(240,'Форма продукта',NULL,172,NULL,'','',NULL,1),(241,'Каталог',NULL,172,NULL,'','',NULL,1),(242,'Склад',NULL,173,NULL,'','<p>Основные операции</p>',NULL,1),(243,'Закупки',NULL,173,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расходы</p><p>сумма</p><p>ожидаются</p>',NULL,1),(244,'Перемещение',NULL,173,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расхоы</p><p>сумма</p><p>ожидаются</p>',NULL,1),(245,'Инвентаризация',NULL,173,NULL,'','',NULL,1),(246,'Воронка кадров',NULL,174,NULL,'','',NULL,1),(247,'Вакансии',NULL,174,NULL,'','',NULL,1),(248,'Кадры',NULL,174,NULL,'','',NULL,1),(249,'Проекты',NULL,174,NULL,'','',NULL,1),(250,'Процесс найма',NULL,174,NULL,'','',NULL,1),(251,'Должностные инструкции',NULL,174,NULL,'','',NULL,1),(252,'Показатели',NULL,175,NULL,'','<p>Это пульс Вашей компании. На ней отображаются основные показатели Вашей компании. Обычно эту панель принято называть “Дэшборд”.  </p><p>Дэшборд состоит из виджетов - специальных блоков, в которых могут отображаться графики, таблицы другие формы данных. </p><p>К примеру, в ФОРМУ по умолчанию включен миниатюрный календарь, список сотрудников, состояние процессов найма, виджет воронки продаж, виджет статистики продаж по складам, виджет основных показателей и многое другое. Все эти функции мы рассмотрим в соответствующих разделах. </p><p>В каждом виджете есть специальная кнопка с тремя линиями, в которой есть основные функции виджета. Пока просто запомните, что такая есть. Она для супер-продвинутых пользователей или для тех, кто прочитал все регламенты. </p><p>Вы можете определить, какие данные Вам важнее видеть. Сейчас, в качестве первого практического взаимодействия, попробуем настроить дэшборд на Ваш вкус. Для этого мы будем перетаскивать виджеты курсором мыши в нужное Вам положение. Зажмите левую кнопку мыши на названии виджета и перемещайте его. Если виджет Вам не нужен - перетяните его в верхнюю панель (позже сможете вернуть). Если виджет Вам нужен - перетаскивайте его повыше. Если не важен - по ниже. Также можно свернуть виджет, нажав на кнопку “-”.</p><p><strong>ПОСМОТРИТЕ НА ДЭШБОРД,</strong> чтобы начать экспериментировать с панелью.</p><p>(Настраивать дэшборд можно только на большом экране)</p>',NULL,1),(253,'Регламент',NULL,175,NULL,'','<p>Регламенты нужны для того, чтобы написать правила работы компании и пересечь эти правила с функциями системы. Это очень мощная функция системы!</p><p>Интересный факт: Вы сейчас читаете регламент. Но его написал я, Олег, - архитектор данной системы, других систем для малого бизнеса и ряда других коммерческих и некоммерческих систем. Но никто не знает Ваш бизнес лучше, чем Вы. И потому в будущем Вы полностью перепишете регламенты Вашей компании. Задача команды ingello - предоставить бесплатные функции на первое время, до начала стадии активного роста бизнеса, на стадии выживания. </p><p>Регламент - это важнейший набор правил, определяющий поведение компании. Но это не просто текст. Это мультифункциональный текст, в который можно зашить любую из тысяч функций системы. А давайте я прямо сейчас покажу, как всё это устроено внутри.</p><p>Важно: Это может оказаться сложно для новичков, потому Вы можете пропустить этот раздел и вернуться к нему позже. Либо же будьте готовы попробовать несколько раз, пока не получится. А получится полюбому. </p><p>Начнем! Для начала, нажимайте эту кнопку, осмотритесь и закройте окно {{/core/regularity/settings||СМОТРЕТЬ СПИСОК РЕГЛАМЕНТОВ}}  <a href=\"https://forma.ingello.com/core/regularity/settings\"></a></p><p>Видели этот список? Это список регламентов, один из которых Вы сейчас читаете. А самое интересно это то, что в Вашей власти его изменить! Давайте договоримся пока ничего не удалять, чтобы не нарушить программу. Но давайте что-нибудь добавим новое!</p><p>Чтобы не добавлять что-попало, давайте создадим список должностных обязанностей. </p><p>Тогда, регламент будет называться “Должностные обязанности”, а его разделы (пункты) будут называться “Обязанности менеджера”, “Обязанности продавца”, “Обязанности администратора”. Нажимая на эти пункты мы будем видеть текст, в котором будут описаны эти обязанности, к примеру “В обязанности продавца входит приветствовать клиента, консультировать его согласно следующим правилам….”. Ну, Вы поняли, надеюсь. </p><p>Итак, попробуем добавить регламент. Вы можете нажать на предыдущую кнопку и добавить новый регламент в список.</p><p>Или просто нажмите на эту кнопку и дайте название “Должностные обязанности” своему собственному регламенту {{/core/regularity/create||СОЗДАЙТЕ СВОЙ РЕГЛАМЕНТ}}  </p><p>Верю, что у Вас всё получилось. Но давайте это проверим. Нажмите эту кнопку {{/core/regularity||РЕГЛАМЕНТЫ}}. Заметили? Теперь в регламентах появился Ваш собственный регламент с названием, которое Вы написали!</p><p>Далее нужно наполнить его пунктами. То есть, к примеру, должен получится \"список обязанностей для разных ролей Вашего бизнеса\".  Давайте это сделаем.  {{/core/regularity||ОТКРОЙТЕ СПИСОК РЕГЛАМЕНТОВ И РАЗДЕЛОВ}} <a href=\"https://forma.ingello.com/core/regularity\"></a></p><p>Сверху (в ряд) располагаются вкладки всех регламентов и среди них должен быть Ваш только что созданный. Нажмите на него и увидете кнопку “Добавить пункт”. Клацайте на неё. </p><p>В появившемся окне нужно как минимум написать название пункта и его описание. Можете еще выбрать его цвет. Если следовать нашему примеру, - то в название пишите должность, а в описание - обязанности этой должности. И нажимайте кнопку “Добавить” внизу формы. </p><p>Повторите это действие несколько раз, чтобы наполнить регламент пунктами.</p><p>А в следующем пункте мы поговорим о более сложном применении регламентов - о связывании их с функциями системы. И разберемся, что за непонятные кнопочки были справа при создании регламента. </p>',NULL,1),(254,'Регламент для продвинутых',NULL,175,NULL,'','<p>Теперь поговорим про беспрецедентно мощную функцию системы ФОРМА, которая способна создать из Вашего бизнеса точку непреодолимой силы на Вашем рынке. </p><p>Создайте любой новый раздел в  {{/core/regularity/create||РЕГЛАМЕНТЕ}} (как в прошлом пункте), но не спешите сохранять.</p><p>Помимо названия, описания и цвета регламента тут есть поле для загрузки картинки (в следующем разделе про презентацию мы поговорим об этом). </p><p>Сейчас нас больше интересует правая часть. В ней Вы видите карточки с какими то кнопками. </p><p>Вся правая часть делится на разные разделы, Вы могли обратить внимание, что они повторяют пункты меню системы (вот те, разноцветные, слева &lt;&lt;&lt;). Все эти функции (и не только эти) Вы можете использовать и они могут превращаться в вот такие &gt;&gt;&gt; {{/selling/default||КНОПКИ}} , при нажатии на которые мы попадаем в определенные разделы системы. </p><p>Вы программист? Скорее всего, Вы думаете, что не программист. Но теперь Вы им станете. Да и кто вообще не программист после 2020 года? =)</p><p>На каждой карточке с функцией есть 2 кнопки. Первая кнопка - это пример кнопки, которую мы можем “зашить” в текст. Нажмите на неё и всё поймёте. Вы их уже видели в регламентах. </p><p>Вторая кнопка - это волшебный код. Нажмите на неё и увидите этот код. Просто скопируйте этот код (самый интересный способ - трижды кликнув на код левой кнопкой мыши и нажав правой кнопкой). Теперь вставьте этот код в левой части в описание раздела. В ту часть, где Вы хотите, чтобы функция отображалась. К примеру, в должностные обязанности продавца можно было бы скопировать код кнопки списка клиентов или воронки продаж или кнопку создания нового процесса продажи. </p><p>Нажимайте кнопку “добавить” внизу и наслаждайтесь Вашим запрограммированным текстом в Вашем собственном регламенте.</p><p>Мне кажется, у Вас уже возникла масса идей, как можно использовать эту черную магию )</p><p>Теперь давайте посмотрим раздел “Презентация”, который тесно связан с тем, что мы уже знаем о регламентах. </p>',NULL,1),(255,'Презентация',NULL,175,NULL,'','<p>Презентация - это в общем то те же самые регламенты, но в более… ээм… презентабельной … ээм… ФОРМЕ =)</p><p>По сути, это регламенты с картинками в формате типичных презентаций, но всё с теми же встроенными кнопками, которые вызывают специальные функции. </p><p>В отличии от панели настроек регламентов, тут подразумевается возможность последовательного просмотра регламентов в том порядке, в котором Вы их задали. </p><p>Вы просто начинаете с первого регламента и движетесь по разделам, нажимая кнопку “далее”. И так один за другим. </p><p>Вероятно, Вы сейчас читаете этот текст из раздела презентации. И конечно же, Вы можете всё тут поменять так, как Вам захочется. </p><p>Зайдите  в  {{/core/regularity||РЕГЛАМЕНТЫ}} и добавитье новый пункт или отредактируйте существующий (кнопка карандаша на блоке пункта).</p><p>При создании или редактировании пункта Вы можете добавлять картинку. Это должна быть большая картинка, далее она отобразится на пол экрана в презентации.</p><p>Важно поставить галочку “публичный” в настройках пункта, а также убедиться что такая же галочка установлена в регламенте. Для этого отредактируйте свой регламент в списке {{/core/regularity/settings||НАСТРОЙКИ РЕГЛАМЕНТОВ}} .  </p><p>Теперь Вы можете зайти в {{/core/regularity/regularity||ПРЕЗЕНТАЦИИ}}  и посмотреть, как это выглядит. </p><p>Вы можете также создавать презентации для Ваших клиентов и делиться с ними ссылкой на презентацию. Но важно понимать, что функции системы (кнопки) не будут для них работать. </p>',NULL,1),(256,'Календарь',NULL,175,NULL,'','<p>Данный раздел нужен для того, чтобы планировать время и не только. </p><p>(календарем удобнее всего пользоваться на большом экране с помощью компьютерной мыши)</p><p>Календарь можно смотреть в разрезе месяца, недели, дня или повестки дня. </p><p>В верхней части календаря Вы можете видеть кнопки, которые переключают эти режимы.</p><p>Месяц - это 28-31 день “как на ладони”, в котором отображаются события. </p><p>Вы можете кликнуть на любой из дней и появится окошко, в котором Вы можете создать название и описание Вашего календарного события. </p><p>Неделя отличается тем, что тут мы видим 7 колонок, в которых видны не только сами события, но и их продолжительность. Вы можете перетягивать события с места на место или же тянуть их за нижний край, изменяя таким образом их продолжительность. </p><p>В режиме дня Вы увидите точно такую же колонку, как в неделе, но по ширине экрана. Подойдёт для детального планирования событий, которые происходят параллельно. </p><p>Теперь немного практики. Посмотрите раздел {{/event||КАЛЕНДАРЬ   }} и попробуйте создавать изменять и перетаскивать события. Это очень просто. </p><p>Интересно знать, что в процессе продаж и переговоров с клиентом Вы (а точнее менеджеры отдела продаж) можете использовать функциональность календаря, чтобы планировать встречи или созвоны для отдела продаж. Он встроен прямо в модуль переговоров, это очень удобно! </p>',NULL,1),(257,'События',NULL,175,NULL,'','<p>В системе постоянно происходят различные события: добавили продажу, удалили клиента, изменили регламент… Все эти события строго фиксируются в системе и их можно отслеживать. Давайте на них посмотрим с помощью этой кнопки {{/core/system-event||СМОТРЕТЬ СОБЫТИЯ}}. События кратко говорят что, когда и в каком отделе произошло. Вы можете переходить прямо из событий к просмотру элементов раздела, нажимая соответствующие кнопки. </p>',NULL,1),(258,'Планирование',NULL,176,NULL,'','',NULL,1),(259,'Электронная коммерция',NULL,176,NULL,'','',NULL,1),(260,'Управление магазином',NULL,176,NULL,'','',NULL,1),(261,'Обработка заявок',NULL,176,NULL,'','',NULL,1),(262,'Здоровье человека',NULL,176,NULL,'','',NULL,1),(263,'Образовательные системы',NULL,176,NULL,'','',NULL,1),(264,'IOT - интернет вещей',NULL,176,NULL,'','',NULL,1),(265,'Генератор платформ',NULL,176,NULL,'','',NULL,1),(266,'Голосовой помощник',NULL,176,NULL,'','',NULL,1),(267,'Мобильные приложения',NULL,176,NULL,'','',NULL,1),(268,'Искусственный интеллект',NULL,176,NULL,'','',NULL,1),(269,'Иммортал Инжелло',NULL,176,NULL,'','',NULL,1),(308,'Форма',NULL,183,NULL,'weadfsehtgjhm','<p>ФОРМА Вашей компании - это тысячи полезных функций для <strong>систематизации бизнеса, повышения </strong>показателей <strong>продаж</strong> и <strong>дисциплины</strong>. И конечно для <strong>подготовки</strong> малого бизнеса к <strong>росту</strong> (а для малого и крупного бизнеса, готового к росту, наша команда проектирует дорогие индивидуальные решения и предоставляет экспертные услуги). </p><p>Здесь, в разделе регламентов, <strong>Вы научитесь эффективно управлять системой</strong> и изменять её под свой бизнес. Это не пустой текст - Вы сразу же будете <strong>на практике</strong> строить и управлять Вашей индивидуальной системой благодаря <strong>уникальным функциям</strong> ФОРМЫ. </p><p>Раздел регламента - это <strong>инструмент управления компанией</strong> и внедрения в компанию <strong>систем автоматизации</strong>. Даже если у Вас 0 опыта - Вы постепенно освоите все возможности. Если у Вас есть опыт - Вы очень быстро разберетесь. В любом случае, мы поможем.\r\n</p><p>Регламенты - это большие информационные блоки. Каждый регламент состоит из разделов - конкретного текста, объясняющего возможности системы. Внутри разделов могут быть использованы специальные кнопки, нажатие на которые позволяет посмотреть реальную функциональность системы в маленьком компактном окошке. Это удобно. Давайте приступим</p>','/regularity_images/airport-2373727_1920.jpg',1),(309,'Управление',NULL,183,NULL,'','<p>Данный раздел предназначен для менеджеров, директоров и управленцев. Независимо от количества людей в Вашем бизнесе (даже если это только Вы) - это удобный инструмент контроля, планирования и мониторинга деятельности Вашего бизнеса. Данный тип систем для управления называется АСУП - Автоматизированная система управления предприятием. Система ФОРМА максимально упрощает управление для малого бизнеса. А для проектирования сложных систем обратиться в компанию ingello (разработчик ФОРМЫ).</p>','/regularity_images/paper-3213924_1280.jpg',1),(310,'Продукты',NULL,183,NULL,'','<p>Бизнес строится на извлечении прибыли при продаже продукта и\\или оказании услуги. И данный раздел Вам в этом поможет. Он удобен для описания каталога продуктов или услуг. Для продвинутых пользователей доступен конструктор, который позволит создавать сложные формы добавления продуктов в каталог. Об этом позже.  </p>','/regularity_images/ecommerce-3530785.jpg',1),(311,'Учет ресурсов',NULL,183,NULL,'','<p>Данный раздел поможет<strong> вести учет </strong>объектов в Вашей собственности. Это могут быть просто любые вещи. Например - столы, стулья, инструменты, компьютеры. Так-же это могут быть продукты, которые Вы продаёте. Более того: Вы сможете управлять целой сетью складов, производить операции <strong>закупок, транзитов и инвентаризации,</strong> учитывать <strong>накладные расходы, налоги</strong> и многое другое. </p><p>Системы такого класса называются <strong>WMR</strong> (Warehouse Management System - Система Управления Складом), а так-же имеются элементы систем типа <strong>ERP</strong> - (Enterprise Resource Planning - планирование ресурсов предприятия). </p>','/regularity_images/ikea-2714998_1920.jpg',1),(312,'Продажи',NULL,183,NULL,'','<p>При проектировании системы ФОРМА, архитектор был убежден, что <strong>продажи</strong> - это самая важная часть любой бизнес-системы. Конечно же, всё работает в комплексе, и важны все отделы и их функции.</p><p> Но цель системы ФОРМА - это вывести бизнес <strong>на новый уровень</strong>, навести порядок в взаимоотношениях с клиентами. Все необходимые функции Вы найдёте тут. </p><p>Мы расскажем, как планировать <strong>переговоры</strong>, как <strong>обслуживать</strong> и опрашивать <strong>клиентов</strong>, как нарабатывать <strong>клиентскую базу</strong> и <strong>историю</strong> по каждому клиенту индивидуально, как разработать свою собственную <strong>стратегию</strong> <strong>продаж</strong> и <strong>автоматизировать</strong> их. </p><p>Системы такого типа называются популярным словом <strong>CRM</strong>  (Customer Relationship Management - <strong>Система управления взаимоотношениями с клиентами).</strong></p>','/regularity_images/apples-1841132_1920.jpg',1),(313,'Кадры',NULL,183,NULL,'','<p>Даже если Вы пока один - вероятно, это не на долго. Для того, чтобы бизнес рос и распространяется, как франшиза, как вирус, - <strong>нужны кадры</strong>. Они, как говорится, “решают”. Позже мы поговорим как построить и <strong>систематизировать</strong> отдел кадров, как благодаря <strong>автоматизации</strong> избежать ненужной волокиты при <strong>найме</strong> и как перестать обучать кадровиков, а вместо этого сделать так, чтобы они обучали Вашу систему. </p><p>Отдел стоит на трёх китах - <strong>найм</strong>, <strong>вакансия</strong> и <strong>кадр</strong>. В прогрессивных областях конкуренция происходит не за клиентов, а за специалистов. И эту тенденцию важно не пропустить. </p><p>Системы такого класса называются <strong>HRM</strong> (Human Resource Management - <strong>Управление Человеко-Ресурсом</strong>). </p>','/regularity_images/basketball-108622_1920.jpg',1),(314,'Экспертные системы',NULL,183,NULL,'','<p>Данный класс систем предназначен для <strong>продвинутых</strong> компаний или предприятий, которые создаются на базе <strong>хорошего финансирования</strong> с целью <strong>скорейшего роста</strong>. Это не просто системы, <strong>это возможности</strong>. И в заключительной части мы познакомим Вас с возможностями ИТ компании ingello а также с её наработками. </p><p>Система ФОРМА - это <strong>бесплатный инструмент </strong>для компаний, который отлично подойдёт <strong>на ранних этапах развития</strong>, но планировать будущие разработки всегда лучше заранее и мы с удовольствием в этом поможем. </p><p>Поговорим о системах класса <strong>E-Commerce</strong> и <strong>Marketplace</strong> - для международной торговли, о системах <strong>PMS</strong> для управления проектами и командами, о системах <strong>HIS</strong> для медицинского обслуживания, об <strong>API</strong> системах и базах данных, про <strong>IOT</strong> - интернет вещей и умные дома, про большие данные и искусственный интеллект и даже про квантовую механику! </p><p>Спасибо, что изучаете регламент. Теперь перейдем к конкретной и формальной части. </p>','/regularity_images/person-731479_1920.jpg',1),(315,'Категории продуктов',NULL,184,NULL,'','<p>Категория продукта определяет его некоторые свойства. Представим себе большую библиотеку. Если мы попали в отдел книг о музыке - мы заранее будем знать некоторые качества любой книги, какую бы мы не взяли в этом отделе. С продуктами и услугами - также. Когда мы создаём в системе новый продукт - именно от категории будут зависеть основные его характеристики. </p><p>СПИСОК КАТЕГОРИЙ</p><p>Добавьте еще одну категорию на своё усмотрение.</p><p><br></p>','/regularity_images/library-5641389_1920.jpg',1),(316,'Форма продукта',NULL,184,NULL,'','<p>Форма продукта необходима для того, чтобы создать варианты услуг или продуктов, которыми занимается Ваша компания. Продаёт, обменивает или просто ведет количественный учет. </p><p>Например, Вы хотите начать вести учет офисных пренадлежностей...</p>','/regularity_images/container-4203677_1920.jpg',1),(317,'Каталог',NULL,184,NULL,'','<p>Каталог - это то, что Вы готовы предложить Вашему клиенту во всех возможных вариациях. Сам каталог не содержит информации о том, какие у Вас ограничения по продуктам или услугам. Информация о наличии продукта на складе и лимиты по услугам на офисах - находятся в хранилищах, о них мы поговорим отдельно. </p><p>Тут же всё просто: нам нужно создать каталог. Для этого нам нужно описать его <wtf>продукты\\услуги</wtf> со всеми подробностями и вариациями. В этом нам поможет форма добавления товара в каталог, читайте далее...</p>','/regularity_images/color-5093046_1920.jpg',1),(318,'Склад',NULL,185,NULL,'','<p>Основные операции</p>','/regularity_images/forklift-835340_1920.jpg',1),(319,'Закупки',NULL,185,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расходы</p><p>сумма</p><p>ожидаются</p>','/regularity_images/production-4408573_1920.jpg',1),(320,'Перемещение',NULL,185,NULL,'','<p>Закупки (они же - поставки)</p><p>откуда куда</p><p>оприходование доставка</p><p>товарные позиции</p><p>накладные расхоы</p><p>сумма</p><p>ожидаются</p>','/regularity_images/truck-1030846_1920.jpg',1),(321,'Инвентаризация',NULL,185,NULL,'','<p>Порядок</p>','/regularity_images/tee-1252397_1920.jpg',1),(322,'Воронка кадров',NULL,186,NULL,'','','/regularity_images/lechner-50119_1920.jpg',1),(323,'Вакансии',NULL,186,NULL,'','','/regularity_images/office-1078869_1920.jpg',1),(324,'Кадры',NULL,186,NULL,'','','/regularity_images/seminar-594125_1920.jpg',1),(325,'Проекты',NULL,186,NULL,'','','/regularity_images/industry-3087393_1920.jpg',1),(326,'Процесс найма',NULL,186,NULL,'','','/regularity_images/office-4639462_1920.jpg',1),(327,'Должностные инструкции',NULL,186,NULL,'','','/regularity_images/video-conference-5238383_1920.jpg',1),(328,'Показатели',NULL,187,NULL,'','<p>Это пульс Вашей компании. На ней отображаются основные показатели Вашей компании. Обычно эту панель принято называть “Дэшборд”.  </p><p>Дэшборд состоит из виджетов - специальных блоков, в которых могут отображаться графики, таблицы другие формы данных. </p><p>К примеру, в ФОРМУ по умолчанию включен миниатюрный календарь, список сотрудников, состояние процессов найма, виджет воронки продаж, виджет статистики продаж по складам, виджет основных показателей и многое другое. Все эти функции мы рассмотрим в соответствующих разделах. </p><p>В каждом виджете есть специальная кнопка с тремя линиями, в которой есть основные функции виджета. Пока просто запомните, что такая есть. Она для супер-продвинутых пользователей или для тех, кто прочитал все регламенты. </p><p>Вы можете определить, какие данные Вам важнее видеть. Сейчас, в качестве первого практического взаимодействия, попробуем настроить дэшборд на Ваш вкус. Для этого мы будем перетаскивать виджеты курсором мыши в нужное Вам положение. Зажмите левую кнопку мыши на названии виджета и перемещайте его. Если виджет Вам не нужен - перетяните его в верхнюю панель (позже сможете вернуть). Если виджет Вам нужен - перетаскивайте его повыше. Если не важен - по ниже. Также можно свернуть виджет, нажав на кнопку “-”.</p><p><strong>ПОСМОТРИТЕ НА ДЭШБОРД,</strong> чтобы начать экспериментировать с панелью.</p><p>(Настраивать дэшборд можно только на большом экране)</p>','/regularity_images/chart-2785979_1920.jpg',1),(329,'Регламент',NULL,187,NULL,'','<p>Регламенты нужны для того, чтобы написать правила работы компании и пересечь эти правила с функциями системы. Это очень мощная функция системы!</p><p>Интересный факт: Вы сейчас читаете регламент. Но его написал я, Олег, - архитектор данной системы, других систем для малого бизнеса и ряда других коммерческих и некоммерческих систем. Но никто не знает Ваш бизнес лучше, чем Вы. И потому в будущем Вы полностью перепишете регламенты Вашей компании. Задача команды ingello - предоставить бесплатные функции на первое время, до начала стадии активного роста бизнеса, на стадии выживания. </p><p>Регламент - это важнейший набор правил, определяющий поведение компании. Но это не просто текст. Это мультифункциональный текст, в который можно зашить любую из тысяч функций системы. А давайте я прямо сейчас покажу, как всё это устроено внутри.</p><p>Важно: Это может оказаться сложно для новичков, потому Вы можете пропустить этот раздел и вернуться к нему позже. Либо же будьте готовы попробовать несколько раз, пока не получится. А получится полюбому. </p><p>Начнем! Для начала, нажимайте эту кнопку, осмотритесь и закройте окно {{/core/regularity/settings||СМОТРЕТЬ СПИСОК РЕГЛАМЕНТОВ}}  <a href=\"https://forma.ingello.com/core/regularity/settings\"></a></p><p>Видели этот список? Это список регламентов, один из которых Вы сейчас читаете. А самое интересно это то, что в Вашей власти его изменить! Давайте договоримся пока ничего не удалять, чтобы не нарушить программу. Но давайте что-нибудь добавим новое!</p><p>Чтобы не добавлять что-попало, давайте создадим список должностных обязанностей. </p><p>Тогда, регламент будет называться “Должностные обязанности”, а его разделы (пункты) будут называться “Обязанности менеджера”, “Обязанности продавца”, “Обязанности администратора”. Нажимая на эти пункты мы будем видеть текст, в котором будут описаны эти обязанности, к примеру “В обязанности продавца входит приветствовать клиента, консультировать его согласно следующим правилам….”. Ну, Вы поняли, надеюсь. </p><p>Итак, попробуем добавить регламент. Вы можете нажать на предыдущую кнопку и добавить новый регламент в список.</p><p>Или просто нажмите на эту кнопку и дайте название “Должностные обязанности” своему собственному регламенту {{/core/regularity/create||СОЗДАЙТЕ СВОЙ РЕГЛАМЕНТ}}  </p><p>Верю, что у Вас всё получилось. Но давайте это проверим. Нажмите эту кнопку {{/core/regularity||РЕГЛАМЕНТЫ}}. Заметили? Теперь в регламентах появился Ваш собственный регламент с названием, которое Вы написали!</p><p>Далее нужно наполнить его пунктами. То есть, к примеру, должен получится \"список обязанностей для разных ролей Вашего бизнеса\".  Давайте это сделаем.  {{/core/regularity||ОТКРОЙТЕ СПИСОК РЕГЛАМЕНТОВ И РАЗДЕЛОВ}} <a href=\"https://forma.ingello.com/core/regularity\"></a></p><p>Сверху (в ряд) располагаются вкладки всех регламентов и среди них должен быть Ваш только что созданный. Нажмите на него и увидете кнопку “Добавить пункт”. Клацайте на неё. </p><p>В появившемся окне нужно как минимум написать название пункта и его описание. Можете еще выбрать его цвет. Если следовать нашему примеру, - то в название пишите должность, а в описание - обязанности этой должности. И нажимайте кнопку “Добавить” внизу формы. </p><p>Повторите это действие несколько раз, чтобы наполнить регламент пунктами.</p><p>А в следующем пункте мы поговорим о более сложном применении регламентов - о связывании их с функциями системы. И разберемся, что за непонятные кнопочки были справа при создании регламента. </p>','/regularity_images/video-conference-5238383_1920.jpg',1),(330,'Регламент для продвинутых',NULL,187,NULL,'','<p>Теперь поговорим про беспрецедентно мощную функцию системы ФОРМА, которая способна создать из Вашего бизнеса точку непреодолимой силы на Вашем рынке. </p><p>Создайте любой новый раздел в  {{/core/regularity/create||РЕГЛАМЕНТЕ}} (как в прошлом пункте), но не спешите сохранять.</p><p>Помимо названия, описания и цвета регламента тут есть поле для загрузки картинки (в следующем разделе про презентацию мы поговорим об этом). </p><p>Сейчас нас больше интересует правая часть. В ней Вы видите карточки с какими то кнопками. </p><p>Вся правая часть делится на разные разделы, Вы могли обратить внимание, что они повторяют пункты меню системы (вот те, разноцветные, слева &lt;&lt;&lt;). Все эти функции (и не только эти) Вы можете использовать и они могут превращаться в вот такие &gt;&gt;&gt; {{/selling/default||КНОПКИ}} , при нажатии на которые мы попадаем в определенные разделы системы. </p><p>Вы программист? Скорее всего, Вы думаете, что не программист. Но теперь Вы им станете. Да и кто вообще не программист после 2020 года? =)</p><p>На каждой карточке с функцией есть 2 кнопки. Первая кнопка - это пример кнопки, которую мы можем “зашить” в текст. Нажмите на неё и всё поймёте. Вы их уже видели в регламентах. </p><p>Вторая кнопка - это волшебный код. Нажмите на неё и увидите этот код. Просто скопируйте этот код (самый интересный способ - трижды кликнув на код левой кнопкой мыши и нажав правой кнопкой). Теперь вставьте этот код в левой части в описание раздела. В ту часть, где Вы хотите, чтобы функция отображалась. К примеру, в должностные обязанности продавца можно было бы скопировать код кнопки списка клиентов или воронки продаж или кнопку создания нового процесса продажи. </p><p>Нажимайте кнопку “добавить” внизу и наслаждайтесь Вашим запрограммированным текстом в Вашем собственном регламенте.</p><p>Мне кажется, у Вас уже возникла масса идей, как можно использовать эту черную магию )</p><p>Теперь давайте посмотрим раздел “Презентация”, который тесно связан с тем, что мы уже знаем о регламентах. </p>','/regularity_images/sound-space-3851251_1920.jpg',1),(331,'Презентация',NULL,187,NULL,'','<p>Презентация - это в общем то те же самые регламенты, но в более… ээм… презентабельной … ээм… ФОРМЕ =)</p><p>По сути, это регламенты с картинками в формате типичных презентаций, но всё с теми же встроенными кнопками, которые вызывают специальные функции. </p><p>В отличии от панели настроек регламентов, тут подразумевается возможность последовательного просмотра регламентов в том порядке, в котором Вы их задали. </p><p>Вы просто начинаете с первого регламента и движетесь по разделам, нажимая кнопку “далее”. И так один за другим. </p><p>Вероятно, Вы сейчас читаете этот текст из раздела презентации. И конечно же, Вы можете всё тут поменять так, как Вам захочется. </p><p>Зайдите  в  {{/core/regularity||РЕГЛАМЕНТЫ}} и добавитье новый пункт или отредактируйте существующий (кнопка карандаша на блоке пункта).</p><p>При создании или редактировании пункта Вы можете добавлять картинку. Это должна быть большая картинка, далее она отобразится на пол экрана в презентации.</p><p>Важно поставить галочку “публичный” в настройках пункта, а также убедиться что такая же галочка установлена в регламенте. Для этого отредактируйте свой регламент в списке {{/core/regularity/settings||НАСТРОЙКИ РЕГЛАМЕНТОВ}} .  </p><p>Теперь Вы можете зайти в {{/core/regularity/regularity||ПРЕЗЕНТАЦИИ}}  и посмотреть, как это выглядит. </p><p>Вы можете также создавать презентации для Ваших клиентов и делиться с ними ссылкой на презентацию. Но важно понимать, что функции системы (кнопки) не будут для них работать. </p>','/regularity_images/innovation-561388_1920.jpg',1),(332,'Календарь',NULL,187,NULL,'','<p>Данный раздел нужен для того, чтобы планировать время и не только. </p><p>(календарем удобнее всего пользоваться на большом экране с помощью компьютерной мыши)</p><p>Календарь можно смотреть в разрезе месяца, недели, дня или повестки дня. </p><p>В верхней части календаря Вы можете видеть кнопки, которые переключают эти режимы.</p><p>Месяц - это 28-31 день “как на ладони”, в котором отображаются события. </p><p>Вы можете кликнуть на любой из дней и появится окошко, в котором Вы можете создать название и описание Вашего календарного события. </p><p>Неделя отличается тем, что тут мы видим 7 колонок, в которых видны не только сами события, но и их продолжительность. Вы можете перетягивать события с места на место или же тянуть их за нижний край, изменяя таким образом их продолжительность. </p><p>В режиме дня Вы увидите точно такую же колонку, как в неделе, но по ширине экрана. Подойдёт для детального планирования событий, которые происходят параллельно. </p><p>Теперь немного практики. Посмотрите раздел {{/event||КАЛЕНДАРЬ   }} и попробуйте создавать изменять и перетаскивать события. Это очень просто. </p><p>Интересно знать, что в процессе продаж и переговоров с клиентом Вы (а точнее менеджеры отдела продаж) можете использовать функциональность календаря, чтобы планировать встречи или созвоны для отдела продаж. Он встроен прямо в модуль переговоров, это очень удобно! </p>','/regularity_images/bulletin-board-3233653_1920.jpg',1),(333,'События',NULL,187,NULL,'','<p>В системе постоянно происходят различные события: добавили продажу, удалили клиента, изменили регламент… Все эти события строго фиксируются в системе и их можно отслеживать. Давайте на них посмотрим с помощью этой кнопки {{/core/system-event||СМОТРЕТЬ СОБЫТИЯ}}. События кратко говорят что, когда и в каком отделе произошло. Вы можете переходить прямо из событий к просмотру элементов раздела, нажимая соответствующие кнопки. </p>','/regularity_images/message-in-a-bottle-413680_1920.jpg',1),(334,'Планирование',NULL,188,NULL,'','',NULL,1),(335,'Электронная коммерция',NULL,188,NULL,'','',NULL,1),(336,'Управление магазином',NULL,188,NULL,'','',NULL,1),(337,'Обработка заявок',NULL,188,NULL,'','',NULL,1),(338,'Здоровье человека',NULL,188,NULL,'','',NULL,1),(339,'Образовательные системы',NULL,188,NULL,'','',NULL,1),(340,'IOT - интернет вещей',NULL,188,NULL,'','',NULL,1),(341,'Генератор платформ',NULL,188,NULL,'','',NULL,1),(342,'Голосовой помощник',NULL,188,NULL,'','',NULL,1),(343,'Мобильные приложения',NULL,188,NULL,'','',NULL,1),(344,'Искусственный интеллект',NULL,188,NULL,'','',NULL,1),(345,'Иммортал Инжелло',NULL,188,NULL,'','',NULL,1);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
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
  UNIQUE KEY `manufacturer_unique_index` (`name`,`country_id`,`address`),
  KEY `manufacturer-country_id_fk` (`country_id`),
  CONSTRAINT `manufacturer-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` (`id`, `name`, `country_id`, `address`) VALUES (17,'Alcatel',NULL,''),(14,'Apple',NULL,''),(12,'Huawei',NULL,''),(10,'Meizu',NULL,''),(15,'Nokia',NULL,''),(11,'Realme',NULL,''),(13,'Samsung',NULL,''),(18,'Sigma',NULL,''),(16,'Xiaomi',NULL,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=724 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `overhead_cost`
--

LOCK TABLES `overhead_cost` WRITE;
/*!40000 ALTER TABLE `overhead_cost` DISABLE KEYS */;
INSERT INTO `overhead_cost` (`id`, `type`, `sum`, `currency_id`, `comment`) VALUES (27,1,100.00,6,''),(35,NULL,NULL,6,''),(36,1,11.00,6,'11'),(37,1,11.00,6,'111'),(38,1,222.00,6,'11'),(39,1,23.00,6,''),(41,1,23.00,6,'1'),(45,1,23.00,6,'11'),(49,1,10.00,6,''),(50,3,400.00,6,'вот так'),(54,NULL,11111.00,6,''),(540,2,11.00,6,'ewefs'),(567,3,20.00,104,''),(568,NULL,NULL,104,''),(569,3,2.00,104,''),(570,4,20.00,104,''),(703,2,223.00,104,'3weasd'),(713,3,500.00,104,'за перевоз + погрузка');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pack_unit`
--

LOCK TABLES `pack_unit` WRITE;
/*!40000 ALTER TABLE `pack_unit` DISABLE KEYS */;
INSERT INTO `pack_unit` (`id`, `name`, `bottles_quantity`, `volume`) VALUES (4,'Коробка',10,20),(5,'Блок',200,20);
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
INSERT INTO `patient` (`id`, `nameCompany`, `address`, `years`, `name`, `surname`, `patronymic`, `gender`, `dateBirth`, `location`, `phone`, `diagnosis`, `complaints`, `allDiseases`, `developmentOfDisease`, `surveyData`, `bite`, `mouthCondition`, `xray`, `laboratoryTests`, `colorVita`, `hygieneЕrainingDate`, `dateHygieneControl`) VALUES (3,'Минфин','ул. Прохорова 5',18,'Дарья','Корнева','Валерьевна',2,'1996-10-26','г. Харьков','0660443958','','-','Носила брекеты с 1.08.17 до 14.12.17. Сейчас стоит ретейнер. \r\n','внизу справа ','','правильный','следующая чистка 11.10.18','','','',NULL,NULL),(4,'Культуры','-',18,'Алина','Богуш','Николаевна',2,'1997-01-08','г.Харьков','0504034783','','','','','','','','','','',NULL,NULL),(5,'культуры','',18,'Александр','Мовчан','Сергеевич',1,'1994-12-09','','0504024285','','','','','','','','','','',NULL,NULL),(6,'образования','г. Харьков',19,'Соня','Панкевич','Генадиевна',2,'1994-01-06','','','','','','','','','','','','',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `type_id`, `category_id`, `manufacturer_id`, `sku`, `customs_code`, `name`, `note`, `volume`, `color_id`, `year_chart`, `proof`, `batcher`, `rating`, `country_id`, `pack_unit_id`, `parent_id`) VALUES (246,NULL,191,10,'MBLN-1',NULL,'Мобильный телефон Meizu M10 3/32GB Black','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(247,NULL,191,11,'MBLN-2',NULL,'Мобильный телефон Realme 6 8/128GB White','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(248,NULL,191,12,'MBLN-4',NULL,'Мобильный телефон Huawei P Smart 2021 128GB Gold','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(249,NULL,191,13,'MBLN',NULL,'Мобильный телефон Samsung Galaxy Note 10 Lite (SM-N770) 6/128GB Aura Silver (SM-N770FZSDSEK)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(250,NULL,191,14,'MBLN-9',NULL,'Мобильный телефон Apple iPhone 11 128GB PRODUCT Red Официальная гарантия','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(251,NULL,190,15,'MBLN-7',NULL,'Мобильный телефон Nokia 3.4 3/64GB Fjord','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(252,NULL,191,16,'MBLN-3',NULL,'Мобильный телефон Xiaomi Redmi Note 9 Pro 6/128GB Interstellar Grey','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(253,NULL,192,15,'MBLN-8',NULL,'Мобильный телефон Nokia 150 TA-1235 DualSim Black (16GMNB01A16)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(254,NULL,192,17,'MBLN-5',NULL,'Мобильный телефон Alcatel 3025 Single SIM Metallic Gray (3025X-2AALUA1)','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(255,NULL,192,18,'MBLN-10',NULL,'Мобильный телефон Sigma mobile Comfort 50 Shell Duo Black-Red','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`id`, `name`, `address`, `description`, `state`) VALUES (6,'Интернет магазин телефонов 1 и 2','Харьков, Уличная 123','<p>Данный проект развивается постепенно, но мы активно развиваем интернет торговлю, поэтому вакансии есть постоянно.</p>',1),(11,'Главный департамент','Адрессная 45','<p>Это очень интересный проект</p>',1);
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
INSERT INTO `project_user` (`project_id`, `user_id`) VALUES (6,1),(11,1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_vacancy`
--

LOCK TABLES `project_vacancy` WRITE;
/*!40000 ALTER TABLE `project_vacancy` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_vacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_vacancy_old`
--

DROP TABLE IF EXISTS `project_vacancy_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_vacancy_old` (
  `project_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `count` int(11) DEFAULT '1',
  PRIMARY KEY (`project_id`,`vacancy_id`),
  KEY `idx-project_vacancy-project_id` (`project_id`),
  KEY `idx-project_vacancy-vacancy_id` (`vacancy_id`),
  CONSTRAINT `fk-project_vacancy-project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-project_vacancy-vacancy_id` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_vacancy_old`
--

LOCK TABLES `project_vacancy_old` WRITE;
/*!40000 ALTER TABLE `project_vacancy_old` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_vacancy_old` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` (`id`, `supplier_id`, `warehouse_id`, `name`, `date_create`, `date_complete`, `state`) VALUES (202,8,83,'закупаем самсунг телефоны','2020-12-03 18:03:49','2020-12-03 18:05:56',3),(203,6,82,'Закупаем китайские телефоны ','2020-12-03 18:06:40',NULL,2),(204,8,83,'закупаем самсунг телефоны','2020-12-03 18:03:49','2020-12-03 18:05:56',0),(205,6,82,'Закупаем китайские телефоны ','2020-12-03 18:06:40',NULL,0);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regularity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `regularity_ibfk_1` (`user_id`),
  CONSTRAINT `regularity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regularity`
--

LOCK TABLES `regularity` WRITE;
/*!40000 ALTER TABLE `regularity` DISABLE KEYS */;
INSERT INTO `regularity` (`id`, `name`, `user_id`, `order`, `title`, `icon`, `picture`, `access`) VALUES (34,'Ваша компания',1,1,'<p>Этот регламент расскажет про отделы компании, сотрудников и их взаимодействие с системой в общих чертах. Пока просто посмотрим на компанию в первом приближении, а потом перейдем к практической части. </p>','',NULL,1),(153,'Продукты',1,2,'','','/regularity_images/ecommerce-3530785.jpg',1),(154,'Учет ресурсов',1,3,'','','/regularity_images/ikea-2714998_1920.jpg',1),(156,'Кадры',1,5,'','','/regularity_images/basketball-108622_1920.jpg',1),(157,'Управление',1,6,'','','/regularity_images/paper-3213924_1280.jpg',1),(158,'Экспертные системы',1,7,'','','/regularity_images/person-731479_1920.jpg',1),(159,'Ваша компания',128,1,'<p>Этот регламент расскажет про отделы компании, сотрудников и их взаимодействие с системой в общих чертах. Пока просто посмотрим на компанию в первом приближении, а потом перейдем к практической части. </p>','',NULL,1),(160,'Продукты',128,2,'','',NULL,1),(161,'Учет ресурсов',128,3,'','',NULL,1),(162,'Кадры',128,5,'','',NULL,1),(163,'Управление',128,6,'','',NULL,1),(164,'Экспертные системы',128,7,'','',NULL,1),(165,'Ваша компания',129,1,'<p>Этот регламент расскажет про отделы компании, сотрудников и их взаимодействие с системой в общих чертах. Пока просто посмотрим на компанию в первом приближении, а потом перейдем к практической части. </p>','',NULL,1),(166,'Продукты',129,2,'','',NULL,1),(167,'Учет ресурсов',129,3,'','',NULL,1),(168,'Кадры',129,5,'','',NULL,1),(169,'Управление',129,6,'','',NULL,1),(170,'Экспертные системы',129,7,'','',NULL,1),(171,'Ваша компания',130,1,'<p>Этот регламент расскажет про отделы компании, сотрудников и их взаимодействие с системой в общих чертах. Пока просто посмотрим на компанию в первом приближении, а потом перейдем к практической части. </p>','',NULL,1),(172,'Продукты',130,2,'','',NULL,1),(173,'Учет ресурсов',130,3,'','',NULL,1),(174,'Кадры',130,5,'','',NULL,1),(175,'Управление',130,6,'','',NULL,1),(176,'Экспертные системы',130,7,'','',NULL,1),(183,'Ваша компания',132,1,'<p>Этот регламент расскажет про отделы компании, сотрудников и их взаимодействие с системой в общих чертах. Пока просто посмотрим на компанию в первом приближении, а потом перейдем к практической части. </p>','',NULL,1),(184,'Продукты',132,2,'','','/regularity_images/ecommerce-3530785.jpg',1),(185,'Учет ресурсов',132,3,'','','/regularity_images/ikea-2714998_1920.jpg',1),(186,'Кадры',132,5,'','','/regularity_images/basketball-108622_1920.jpg',1),(187,'Управление',132,6,'','','/regularity_images/paper-3213924_1280.jpg',1),(188,'Экспертные системы',132,7,'','','/regularity_images/person-731479_1920.jpg',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` (`id`, `text`, `is_manager`) VALUES (1,'Добрый день, я сейчас пробегусь по основным вопросам, а потом вы сможете задать свои, хорошо? Начнем:  Вас зовут \"ФИО собеседника\", правильно ?',1),(2,'Какой у вас опыт ?',1),(3,'вы уверены в своих силах?',1),(4,'Добрый день, нам поступила ваша заявка на покупку \"перечень товаров\", правильно?',1),(5,'Как бы вы хотели оформить заявку: новой почтой, джастин ?',1),(6,'Сколько стоит доставка ?',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_strategy`
--

LOCK TABLES `request_strategy` WRITE;
/*!40000 ALTER TABLE `request_strategy` DISABLE KEYS */;
INSERT INTO `request_strategy` (`id`, `strategy_id`, `request_id`) VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,4),(5,2,5),(6,2,6);
/*!40000 ALTER TABLE `request_strategy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_strategy_old`
--

DROP TABLE IF EXISTS `request_strategy_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40000 ALTER TABLE `request_strategy_old` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selling`
--

LOCK TABLES `selling` WRITE;
/*!40000 ALTER TABLE `selling` DISABLE KEYS */;
INSERT INTO `selling` (`id`, `customer_id`, `warehouse_id`, `state_id`, `name`, `date_create`, `date_complete`, `dialog`, `next_step`, `selling_token`) VALUES (1,143,83,9,'1111','2020-12-03 18:59:59','2020-12-03 17:04:31',NULL,NULL,'OBKVs8PydaOBWQ3w_AFr9xdAtj1eQfW7'),(2,144,83,9,'2','2020-12-03 19:05:08','2020-12-03 17:08:38',NULL,NULL,'ZJx25OwTgWxhd9QAQVW80WaZjwInO7Dq'),(3,143,82,2,'3','2020-12-03 19:10:54',NULL,'03.12.2020 17:55:58<br/><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Сколько стоит доставка ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>по тарифам новой почты, или джастин (обычно это около 60 грн по украине)</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Добрый день, нам поступила ваша заявка на покупку \"перечень товаров\", правильно?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>да</p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Клиент: <p>\n                                        \n                                        Как бы вы хотели оформить заявку: новой почтой, джастин ?                                        \n                                    </p></div><div style=\"background: #c5ddfc;\" class=\"alert alert-primary\" role=\"alert\">Менеджер: <p>джастин</p></div><br/><div style=\"background: mediumseagreen;\" class=\"alert alert-primary\" role=\"alert\"><p>Анна Белая, отделение 51</p></div><br/><div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">отправка товара</div>','<div style=\"background: yellowgreen;\" class=\"alert alert-primary\" role=\"alert\">отправка товара</div>','NkngJ7yQIOd4SD6EUoZ9Qytn-Qbd1qCg');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selling_product`
--

LOCK TABLES `selling_product` WRITE;
/*!40000 ALTER TABLE `selling_product` DISABLE KEYS */;
INSERT INTO `selling_product` (`id`, `product_id`, `selling_id`, `quantity`, `cost`, `cost_type`, `overhead_cost_id`, `currency_id`, `pack_unit_id`) VALUES (2,249,1,1,6825.00,0,NULL,104,NULL),(3,249,2,2,6825.00,0,NULL,104,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` (`id`, `name`, `user_id`, `order`, `description`) VALUES (1,'Не знакомы',1,2,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(2,'Презентация',1,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(4,'Есть интерес',1,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(5,'Согласована цена',1,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(6,'Продажа совершена',1,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(7,'Товар отправлен',1,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(8,'Возврат',1,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(9,'Архив',1,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>'),(10,'Не знакомы',128,1,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(11,'Презентация',128,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(12,'Есть интерес',128,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(13,'Согласована цена',128,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(14,'Продажа совершена',128,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(15,'Товар отправлен',128,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(16,'Возврат',128,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(17,'Архив',128,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>'),(18,'Не знакомы',129,1,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(19,'Презентация',129,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(20,'Есть интерес',129,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(21,'Согласована цена',129,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(22,'Продажа совершена',129,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(23,'Товар отправлен',129,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(24,'Возврат',129,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(25,'Архив',129,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>'),(26,'Не знакомы',130,1,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(27,'Презентация',130,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(28,'Есть интерес',130,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(29,'Согласована цена',130,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(30,'Продажа совершена',130,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(31,'Товар отправлен',130,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(32,'Возврат',130,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(33,'Архив',130,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>'),(34,'Не знакомы',NULL,1,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(35,'Презентация',NULL,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(36,'Есть интерес',NULL,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(37,'Согласована цена',NULL,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(38,'Продажа совершена',NULL,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(39,'Товар отправлен',NULL,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(40,'Возврат',NULL,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(41,'Архив',NULL,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>'),(42,'Не знакомы',132,1,'<p><strong>С данным клиентом м</strong>ы не знакомы =(. Нужно <strong>срочно</strong> познакомиться! </p>'),(43,'Презентация',132,2,'<p>На этом этапе мы проводим презентации продуктов\\услуг</p>'),(44,'Есть интерес',132,3,'На этом этапе клиент проявил интерес к компании. Наша следующая цель - согласовать цену и условия работ, либо вернуться на презентацию. \n\n'),(45,'Согласована цена',132,4,'<p>На этом этапе мы уже обсудили цену и обсуждаем детали продажи</p>'),(46,'Продажа совершена',132,5,'<p>На этом этапе мы готовим товар к отправке</p>'),(47,'Товар отправлен',132,6,'<p>На этом этапе проект готов, мы достигли цели, можно отдохнуть и начать новый процесс.</p>'),(48,'Возврат',132,7,'<p>Товар был отправлен обратно в течении 14 дней после получения.</p>'),(49,'Архив',132,8,'<p>Товар не был отправлен обратно в течении 14 дней после получения. Продажа закрыта</p>');
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
) ENGINE=InnoDB AUTO_INCREMENT=601 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state_to_state`
--

LOCK TABLES `state_to_state` WRITE;
/*!40000 ALTER TABLE `state_to_state` DISABLE KEYS */;
INSERT INTO `state_to_state` (`id`, `state_id`, `to_state_id`) VALUES (7,2,7),(8,2,1),(9,5,6),(15,2,8),(23,4,8),(25,6,7),(506,8,5),(518,9,7),(519,9,6),(520,7,8),(521,7,9),(522,10,13),(523,10,14),(524,10,11),(525,10,12),(526,11,15),(527,11,10),(528,13,14),(529,11,16),(530,12,16),(531,14,15),(532,16,13),(533,17,15),(534,17,14),(535,15,16),(536,15,17),(537,18,21),(538,18,22),(539,18,19),(540,18,20),(541,19,23),(542,19,18),(543,21,22),(544,19,24),(545,20,24),(546,22,23),(547,24,21),(548,25,23),(549,25,22),(550,23,24),(551,23,25),(552,26,29),(553,26,30),(554,26,27),(555,26,28),(556,27,31),(557,27,26),(558,29,30),(559,27,32),(560,28,32),(561,30,31),(562,32,29),(563,33,31),(564,33,30),(565,31,32),(566,31,33),(567,34,37),(568,34,38),(569,34,35),(570,34,36),(571,35,39),(572,35,34),(573,37,38),(574,35,40),(575,36,40),(576,38,39),(577,40,37),(578,41,39),(579,41,38),(580,39,40),(581,39,41),(582,42,45),(583,42,46),(584,42,43),(585,42,44),(586,43,47),(587,43,42),(588,45,46),(589,43,48),(590,44,48),(591,46,47),(592,48,45),(593,49,47),(594,49,46),(595,47,48),(596,47,49),(597,1,2),(598,1,4),(599,1,5),(600,1,6);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategy`
--

LOCK TABLES `strategy` WRITE;
/*!40000 ALTER TABLE `strategy` DISABLE KEYS */;
INSERT INTO `strategy` (`id`, `name`, `description`) VALUES (1,'Собеседование на должность менеджера по продажам','Подходит для найма на эту вакансию'),(2,'Обработка заказа','Этот скрипт подойдет чтоб поговорить с клиентом, который уже готов заказать товар.');
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `name`, `firm`, `contact_name`, `country_id`, `address`, `email`, `tax_rate`) VALUES (6,'Вадим Ок Инвест','Ок Инвест','Вадим Олегович',245,'Харьков, Сумская 21-в','olpmaster@gmail.com',10.00),(8,'Алла - Самсунг','Самсунг','Алла Владимировна',260,'Прага','olijenius@gmail.com',10.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=18856 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_event`
--

LOCK TABLES `system_event` WRITE;
/*!40000 ALTER TABLE `system_event` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_event_user`
--

LOCK TABLES `system_event_user` WRITE;
/*!40000 ALTER TABLE `system_event_user` DISABLE KEYS */;
INSERT INTO `system_event_user` (`id`, `user_id`, `object_name`, `create`, `update`, `delete`, `custom`) VALUES (11,18,'Regularity',1,0,0,0),(12,18,'Customer',1,0,0,0),(13,18,'Selling',1,0,0,0),(14,18,'SellingProduct',1,0,0,0),(15,18,'State',1,0,0,0),(16,18,'StateToState',1,0,0,0),(33,77,'Warehouse',0,0,1,0),(34,77,'WarehouseProduct',0,0,1,0),(35,77,'Worker',1,1,1,0),(36,77,'Vacancy',1,0,0,0),(37,1,'WarehouseProduct',0,0,1,0),(38,1,'Project',1,0,0,0),(39,1,'ProjectVacancyOld',1,0,0,0),(40,117,'Selling',1,0,0,0),(41,117,'Product',1,1,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_rate`
--

LOCK TABLES `tax_rate` WRITE;
/*!40000 ALTER TABLE `tax_rate` DISABLE KEYS */;
INSERT INTO `tax_rate` (`id`, `name`, `percent`) VALUES (4,'ФЛП 3 группа',3.00),(5,'ФЛП 2 группа',5.00),(6,'ООО',20.00);
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
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `test_id` FOREIGN KEY (`test_type_id`) REFERENCES `test_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` (`id`, `result`, `test_type_id`, `customer_id`) VALUES (1,'9aVcjC5qhH0IgG96GrutjqMhqoGHe-6VmfEPTq74J3bEyA_FFgfrTUDNPksr2sfk-Wzk5b83u9HRqWYD9LITJg==/Да, если да, то какие?/ttttt/ttttt/ttttt',NULL,NULL),(12,'-iI9AplVKH3ixdcwdDZy5_aUC-pXh-1k0xb1Ko_a6AvLT25LoThHTaqIhgFFVxiNrNlFjm_LuCCbTpxn1ZDcWw==/маккак/ttttt/ttttt/ttttt',NULL,NULL),(13,'Me2mssvEm094mVyvDd7e828GfLlZoZGBwfREsyRX1iIAgPX786n0fzDUDZ48v7SZNUsy3WHtxMWJrC3-fh3icg==/Да, если да, то какие?/ttttt/ttttt/ttttt',NULL,NULL),(15,'N7HkB3H5sGcwdMRQ0fpIaDc9CkPRu0xigHcrswf_XdIG3LdOSZTfV3g5lWHgmyICbXBEJ-n3GSbIL0L-XbVpgg==/Да, если да, то какие?/cecdttttt/ttttt/ttttt',NULL,NULL),(16,'HUeLRp54CrIUQyGhn8uYeUbli_h1JF_FuUumIyro3VgsKtgPphVlglwOcJCuqvITHKjFnE1oCoHxE89ucKLpCA==/Да, если да, то какие?/ttttt/ttttt/ttttt',NULL,NULL),(17,'tcF_k4cbYUCdE1GciEVLPNc9T067Pt8B4BBT-77CCMCErCzav3YOcNVeAK25JCFWjXABKoNyikWoSDq25Ig8kA==/ДА/ttttt/ttttt/ttttt',NULL,NULL);
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
  CONSTRAINT `test_type_user__fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type`
--

LOCK TABLES `test_type` WRITE;
/*!40000 ALTER TABLE `test_type` DISABLE KEYS */;
INSERT INTO `test_type` (`id`, `name`, `link`, `user_id`) VALUES (139,'Тест на программиста  ','test/test/test?id=139',NULL),(140,'Новый тест','test/test/test?id=140',NULL),(141,'wdwdw','test/test/test?id=141',NULL),(142,'Тест для менеджера ','test/test/test?id=142',NULL),(143,'Тест на джуна','test/test/test?id=143',NULL),(144,'тест','test/test/test?id=144',NULL),(145,'Тест на джуна2','test/test/test?id=145',NULL),(146,'Тест Клиента','test/test/test?id=146',NULL),(147,'wdwdw','test/test/test?id=147',NULL),(148,'Тестовый тест','test/test/test?id=148',NULL),(149,'Новый тест','test/test/test?id=149',NULL);
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
  CONSTRAINT `test_type_field_test_type__fk` FOREIGN KEY (`test_id`) REFERENCES `test_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_type_field`
--

LOCK TABLES `test_type_field` WRITE;
/*!40000 ALTER TABLE `test_type_field` DISABLE KEYS */;
INSERT INTO `test_type_field` (`id`, `block_name`, `label_name`, `type`, `value`, `placeholder`, `required`, `test_id`) VALUES (14,'База знаний','Знаете ли вы какие нибудь языки програмирования','input','Да, если да, то какие?','PHP, JavaScript',1,139),(20,'Ваши знания','Владеете ли вы коммуникабельными качествами ','input','ttttt','Да/ Нет',0,141),(21,'Ваши знания','Владеете ли вы коммуникабельными качествами ','frefre','ttttt','Да/ Нет',0,141),(22,'Ваши знания','wwww','radio','ttttt','ttttt',0,139),(23,'Ваши знания','Владеете ли вы коммуникабельными качествами ','checkbox','ttttt','Да, если да, то какие?',0,139),(24,'Ваши знания 22','Владеете ли вы коммуникабельными качествами  22','checkbox','Да 22',' 22',1,NULL),(25,'Ваши знания','Владеете ли вы коммуникабельными качествами ','radio','ttttt','Да/ Нет',0,139),(26,'Ваши знания','Владеете ли вы коммуникабельными качествами ','checkbox','ttttt','Да/ Нет',0,145),(27,'Ваши знания 33','Владеете ли вы коммуникабельными качествами  33','input','Да 33','Да/ Нет 22',1,146),(28,'Ваши знания','Владеете ли вы коммуникабельными качествами ','radio','ttttt','Да/ Нет',0,147),(30,'Ваши знания','Владеете ли вы коммуникабельными качествами ','radio','','',0,147),(54,'Личная информация','Как вас зовут?','text','','Дима',1,149),(55,'Ваши знания','Вопрос1','text','','',0,149),(56,'Ваши знания','Текст инпута','checkbox','1','',0,149),(57,'Ваши знания','Чексбокс не нажатый','checkbox','','',0,149),(58,'Ваши знания','Вопрос радио','radio','Часть вопроса1 || Часть вопроса2 || Часть вопроса3 || Часть вопроса4 ','',0,149),(59,'Ваши знания','Вопрос радио(2)','radio','Радио','',0,149);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transit`
--

LOCK TABLES `transit` WRITE;
/*!40000 ALTER TABLE `transit` DISABLE KEYS */;
INSERT INTO `transit` (`id`, `from_warehouse_id`, `to_warehouse_id`, `name`, `date_create`, `date_complete`, `state`) VALUES (1,83,82,'Перевозим часть телефонов на склад 2','2020-12-03 18:13:33',NULL,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`id`, `name`) VALUES (5,'Продукт'),(10,'Услуга'),(11,'Инструмент'),(12,'Объект'),(13,'Расходный материал'),(14,'Сотрудник');
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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `auth_key`, `access_token`, `phone`, `parent_id`, `confirmed_email`, `email_string`) VALUES (1,'admin','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','admin@admin.admin','user',NULL,NULL,NULL,NULL,1,NULL),(4,'kirill','$2y$13$HOrJAi19qEm7yaelOVsvw.tb7NSZnruC50C09cabJLgXHGkApgW1u','limbo9826@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(5,'archie','$2y$13$gYhb25Lo7tj00Ax03/PV9.prTGdykgsZ4qaXNE/6nkVw02FsAVrxW','astronautgeek@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(6,'ingello','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','olijeniuss@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(7,'ingello2','252342','business.ingello@gmail.com','user',NULL,NULL,'',1,1,NULL),(8,'Test1','$2y$13$SfFAYsZ.uHjPxOaNpOchreuYyuit7gg.Iln9KduYPyMeNpCtbNRbG','1111@agsdg.com','user',NULL,NULL,'111111',6,1,NULL),(9,'oleg','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','levit@i.ua','user',NULL,NULL,'0937130073',NULL,1,NULL),(12,'ingello1','$2y$13$/zUzmvjIVqFhX4rViZRDrOciwo92zuVP4.l3izWSjI5WMBGkp8Erq','ing@gmail.com','user',NULL,NULL,'',1,1,NULL),(16,'tema','$2y$13$cAvQs5KaL6EAWETqeabH9e3WQnkWkAVPLV42BBCS/1/REMRW9XF1e','daivts1488@gmail.com','user',NULL,NULL,'+380-637154401',NULL,1,NULL),(17,'TestGabriadmin2(passw)','$2y$13$c8d6vyPnAriDyDE1ySWa7e09nYVySRelhyU7VBlY4UmvkbCEhPvQO','TestGabriasdasd@asasf.com','user',NULL,NULL,'1241241',NULL,1,NULL),(18,'admin2','','dasha252342@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(19,'TestForGabri','$2y$13$WLv4wEcZuQvAeIAEAqgNCu0ouygMxKmqxTnUQ4mdeCChHTvYci9Ly','11111WQ@gmail.com','user',NULL,NULL,'1111',NULL,1,NULL),(20,'NewUser','$2y$13$qMXgiS8rrhC.OZpNJKf4KO2rHQFkQmYuorP2i24jooGe8/6mm6AxO','11111@gmail.com','user',NULL,NULL,'11111',NULL,1,NULL),(21,'NewUserRef','$2y$13$ZcvJ5K/qkOYZe95EuzpbIuGX0P.ejr.mlCi5hf9BiacmzdM1sSs6O','11111@saf.com','user',NULL,NULL,'11111',20,1,NULL),(22,'111111','$2y$13$pb1EQk1LNzMbo4m7vZhRu.DnMvM2gPqJKVzBJy2Ocaf9vY6GaUOJm','ngello@gmail.com','user',NULL,NULL,'111111',NULL,1,NULL),(23,'manager1','$2y$13$aojywk9rO95bSepeLXVnEumnNISHUwRXzsuECcIYJ2caC8FkP0hRm','hh23456789098765433456789987654@gmail.com','user',NULL,NULL,'',9,1,NULL),(24,'Tymur','$2y$13$LMNvOzSu3.9HL48NEdXHvOFEYAhwgaEdkG3Dpn5hQtd32hoTdl20C','tymur@gmail.com','user',NULL,NULL,'1122334455',NULL,1,NULL),(77,'Тимур Жукотинський','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','tymur.zhukotynskyi@nure.ua','user',NULL,NULL,NULL,NULL,1,NULL),(86,'Олег Григорьев','$2y$13$a17gm0796C5llltQVqADxO4dn/hm7/T/gghDa6/PXklHT6Dlg5CvW','olijenius2@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(87,'Артём Явдокименко','$2y$13$.JOD81CapnTjvr6kUKyu/e8fLhn4ZkISEMX6WzwoyxW4t2eJ70TX2','timmaddy01@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(88,'olijenius','$2y$13$J/uIE6fMIn/XWokm5F3BRekcKrd2olwLrSWxM7IuoNXfduC2aWgu2','olijenius@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(93,'dasha','$2y$13$P7JHe62R0Vvy8VF8UguyBeV20xghzgV4DLK6b3flcmGVG/AK2pq4i','smailick1@yandex.ru','user',NULL,NULL,'',NULL,1,NULL),(94,'Алла','$2y$13$DI6J5..VHSypxKwqfMGMRuUMzgbeCcX82DJUWqO.kRsdvoWlfhMny','smailick2@yandex.ru','user',NULL,NULL,'',NULL,0,'a5ZcXcEFOYKh80b4f-G8Q8s6YDdUBUjV'),(95,'Саша','$2y$13$Gi0iIkIdyJ1wwexr9gndu.OwBjC6itYoxU6O4Jn7VliN9s/1kmes2','smailick3@yandex.ru','user',NULL,NULL,'',NULL,0,'nGKZghG-qVAJpw_GOhicRNm5IbTRhQAz'),(96,'Сашка','$2y$13$MPbMfbpAxrNcAYXt88lmK./dcpGDgV6nvbvDsVuwxWVAoSj/OKsmm','smailick252342@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(98,'Дарья','$2y$13$rKhEOd1BN4w8hkkcXwgYP./exvoKHLzz748JRxuhxr975YS4ZwjSW','ailick252342@gmail.com','user',NULL,NULL,'',NULL,0,'NzP0vz9KWOLX9IEC8_FuxymujyhJHeea'),(108,'Alen','$2y$13$zXUBw7v81aO6S0NZD0bjZ.wtMh5INGBvtKODpuwW4f8MQL9DeTUTW','alenrong12@gmail.com','user',NULL,NULL,'Rong',NULL,0,'ALoOEQylFwNo2gDJBP3TOcehwlJGOoNW'),(109,'Панкреотин Аптека','$2y$13$MCn3LGadixjmNex0zNIVk.MVkj.theNcgEZRV.hI7oSc7LBh/SJ3G','taja708@gmail.com','user',NULL,NULL,'+380677281928',NULL,1,NULL),(111,'Семён Моругий','$2y$13$gv9.QoD/7PKDOUiJ6JnOw.yckeGXva/4COBBPSa64DzURdct.Rkou','tratill2798@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(112,'mike','$2y$13$GNA36kX38PjGx8BaO0fh0.oMcbJ43UbpvTjDEPWUY9HBhOUV.qNiq','send1message1@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(117,'Тимур Жукотинский','$2y$13$equ5en6laCqNK8aNPaF8X.u4wa/gwaUdCy/gkMfK4GoIH0cJvojr6','мпр\n@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(118,'Peri','$2y$13$/q.K3OX349AJ2u2AN3vOMOhlB9oRbrt6Tb8iO1ZlO4Sd2KAckbZtq','shisska@gmail.com','user',NULL,NULL,'',NULL,1,''),(121,'Tr Mw','$2y$13$rxwnrKmRU9HT/71oOAAxg.b70772GTi5ywZFI7.Ke8N36JbhSMsgq','truemw88@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(126,'Test Login','$2y$13$P15fvRNbc5MdKbCz6wT0dO3FmYsRQuqkPdVmQd4VbPhhyi32u6jJG','testlogin88911@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL),(127,'Мага','$2y$13$ZVMU3la91OVeAG/7h76dme1CZH2ZGBugXCtkwYAVubrgnx4/5iegS','olla@gmail.com','user',NULL,NULL,'123',1,0,'Ops-cyHnftMjmonguOvBDjhY42xIU2TS'),(128,'Peri utkonos','$2y$13$/q.K3OX349AJ2u2AN3vOMOhlB9oRbrt6Tb8iO1ZlO4Sd2KAckbZtq','peri_superAgent@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(129,'Jambo','$2y$13$/q.K3OX349AJ2u2AN3vOMOhlB9oRbrt6Tb8iO1ZlO4Sd2KAckbZtq','jambo@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(130,'Jambo','$2y$13$/q.K3OX349AJ2u2AN3vOMOhlB9oRbrt6Tb8iO1ZlO4Sd2KAckbZtq','jamsbo@gmail.com','user',NULL,NULL,'',NULL,1,NULL),(132,'Тимур','$2y$13$7yrG7eb4daksBLalsq3IBed5apKcQuHT0Xscb4fhlxoMiifmBTzTC','tyzhukotinskiy@gmail.com','user',NULL,NULL,'+380682829208',NULL,1,NULL),(133,'Yessen Baktybay','$2y$13$A7AXixV3kBs.ADYcg9VdkOF0w48U1nx4Vov/GTrq9A4PVsdT5UC9u','yessen84@gmail.com','user',NULL,NULL,NULL,NULL,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacancy`
--

LOCK TABLES `vacancy` WRITE;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` (`id`, `rate`, `description`, `name`) VALUES (86,25000,'','Управляющий директор'),(87,10000,'<p>Почему мы?</p><p>Работая у нас Вы не просто делаете полезное дело для наших клиентов и всего мира. Вы так же развиваетесь и развитию этому нет никакого физического предела.</p><p>Условия работы</p><p>Наносить непоправимую пользу клиенту, причинять добро, творить качество</p><p><br></p>','Менеджер по продажам'),(88,15000,'','Старший менеджер по продажам '),(89,15000,'','Менеджер по доставке');
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
  PRIMARY KEY (`id`),
  KEY `warehouse-country_id_fk` (`country_id`),
  CONSTRAINT `warehouse-country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse`
--

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;
INSERT INTO `warehouse` (`id`, `name`, `country_id`, `address`) VALUES (82,'Интернет магазин телефонов (2)',245,'Харьков (Шевченковский р-н)'),(83,'Интернет магазин телефонов',245,'Киев правобережный');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_product`
--

LOCK TABLES `warehouse_product` WRITE;
/*!40000 ALTER TABLE `warehouse_product` DISABLE KEYS */;
INSERT INTO `warehouse_product` (`id`, `product_id`, `warehouse_id`, `quantity`, `purchase_cost`, `recommended_cost`, `consumer_cost`, `trade_cost`, `tax`, `overhead_cost`, `currency_id`) VALUES (1,249,83,120,5000.00,NULL,6825.00,6300.00,250.00,0.00,104),(2,246,82,0,NULL,NULL,NULL,NULL,NULL,NULL,104),(5,252,82,0,NULL,NULL,NULL,NULL,NULL,NULL,6),(6,248,82,0,NULL,NULL,NULL,NULL,NULL,NULL,6);
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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_user`
--

LOCK TABLES `warehouse_user` WRITE;
/*!40000 ALTER TABLE `warehouse_user` DISABLE KEYS */;
INSERT INTO `warehouse_user` (`id`, `warehouse_id`, `user_id`) VALUES (71,82,1),(72,83,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=956 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_user`
--

LOCK TABLES `widget_user` WRITE;
/*!40000 ALTER TABLE `widget_user` DISABLE KEYS */;
INSERT INTO `widget_user` (`id`, `user_id`, `name`, `active`, `row`, `col`, `collapsed`) VALUES (510,1,'SalesFunnel',1,1,1,0),(511,1,'DepartmentPerfomance',0,4,0,0),(512,1,'WeeklySales',1,3,1,0),(513,1,'Employees',0,7,0,0),(514,1,'Messages',0,0,0,0),(515,1,'Workers',1,6,0,0),(516,1,'SalesWarehouse',1,2,1,0),(517,1,'ApplicationInfo',0,3,0,0),(518,1,'DeliveryPlan',0,6,0,0),(519,1,'Goals',0,5,0,0),(520,1,'Calendar',1,0,1,0),(521,1,'Suppliers',0,2,0,0),(522,1,'HiringFunnel',1,5,0,0),(523,1,'HistoryEvent',0,1,0,0),(524,18,'DepartmentPerfomance',1,0,0,0),(525,18,'WeeklySales',1,1,0,0),(526,18,'Employees',1,2,0,0),(527,18,'Messages',1,3,0,0),(528,18,'Workers',1,4,0,0),(529,18,'SalesWarehouse',1,5,0,0),(530,18,'DeliveryPlan',1,0,1,0),(531,18,'Goals',1,1,1,0),(532,18,'Calendar',1,2,1,0),(533,18,'Suppliers',1,3,1,0),(534,18,'HiringFunnel',1,4,1,0),(535,18,'HistoryEvent',1,5,1,0),(536,77,'SalesFunnel',1,0,1,0),(537,77,'DepartmentPerfomance',0,1,0,0),(538,77,'WeeklySales',1,0,0,0),(539,77,'Employees',0,0,0,0),(540,77,'Messages',1,2,0,0),(541,77,'Workers',1,4,0,0),(542,77,'SalesWarehouse',1,3,0,0),(543,77,'ApplicationInfo',1,1,1,0),(544,77,'DeliveryPlan',1,2,1,0),(545,77,'Goals',1,3,1,0),(546,77,'Calendar',1,1,0,0),(547,77,'Suppliers',1,4,1,0),(548,77,'HiringFunnel',1,5,1,0),(549,77,'HistoryEvent',1,6,1,0),(550,NULL,'SalesFunnel',1,0,0,0),(551,NULL,'DepartmentPerfomance',1,1,0,0),(552,NULL,'WeeklySales',1,2,0,0),(553,NULL,'Employees',1,3,0,0),(554,NULL,'Messages',1,4,0,0),(555,NULL,'Workers',1,5,0,0),(556,NULL,'SalesWarehouse',1,6,0,0),(557,NULL,'ApplicationInfo',1,0,1,0),(558,NULL,'DeliveryPlan',1,1,1,0),(559,NULL,'Goals',1,2,1,0),(560,NULL,'Calendar',1,3,1,0),(561,NULL,'Suppliers',1,4,1,0),(562,NULL,'HiringFunnel',1,5,1,0),(563,NULL,'HistoryEvent',1,6,1,0),(564,109,'SalesFunnel',0,2,0,0),(565,109,'DepartmentPerfomance',0,6,0,0),(566,109,'WeeklySales',0,0,0,0),(567,109,'Employees',0,3,0,0),(568,109,'Messages',0,1,0,0),(569,109,'Workers',0,9,0,0),(570,109,'SalesWarehouse',1,0,0,1),(571,109,'ApplicationInfo',0,5,0,0),(572,109,'DeliveryPlan',1,0,1,0),(573,109,'Goals',0,4,0,0),(574,109,'Calendar',0,7,0,0),(575,109,'Suppliers',1,2,0,0),(576,109,'HiringFunnel',1,1,0,1),(577,109,'HistoryEvent',0,8,0,0),(578,NULL,'SalesFunnel',1,0,0,0),(579,NULL,'DepartmentPerfomance',1,1,0,0),(580,NULL,'WeeklySales',1,2,0,0),(581,NULL,'Employees',1,3,0,0),(582,NULL,'Messages',1,4,0,0),(583,NULL,'Workers',1,5,0,0),(584,NULL,'SalesWarehouse',1,6,0,0),(585,NULL,'ApplicationInfo',1,0,1,0),(586,NULL,'DeliveryPlan',1,1,1,0),(587,NULL,'Goals',1,2,1,0),(588,NULL,'Calendar',1,3,1,0),(589,NULL,'Suppliers',1,4,1,0),(590,NULL,'HiringFunnel',1,5,1,0),(591,NULL,'HistoryEvent',1,6,1,0),(592,111,'SalesFunnel',1,0,0,1),(593,111,'DepartmentPerfomance',1,1,0,1),(594,111,'WeeklySales',1,2,0,1),(595,111,'Employees',1,3,0,1),(596,111,'Messages',1,4,0,1),(597,111,'Workers',1,5,0,1),(598,111,'SalesWarehouse',1,6,0,1),(599,111,'ApplicationInfo',1,0,1,1),(600,111,'DeliveryPlan',1,1,1,1),(601,111,'Goals',1,2,1,1),(602,111,'Calendar',1,3,1,0),(603,111,'Suppliers',1,4,1,1),(604,111,'HiringFunnel',1,5,1,1),(605,111,'HistoryEvent',1,6,1,0),(606,112,'SalesFunnel',1,0,0,1),(607,112,'DepartmentPerfomance',1,1,0,1),(608,112,'WeeklySales',1,2,0,1),(609,112,'Employees',1,3,0,1),(610,112,'Messages',1,4,0,1),(611,112,'Workers',1,5,0,1),(612,112,'SalesWarehouse',1,6,0,0),(613,112,'ApplicationInfo',1,0,1,1),(614,112,'DeliveryPlan',1,1,1,1),(615,112,'Goals',1,3,1,1),(616,112,'Calendar',1,5,1,1),(617,112,'Suppliers',1,4,1,1),(618,112,'HiringFunnel',1,2,1,1),(619,112,'HistoryEvent',1,6,1,0),(620,NULL,'SalesFunnel',1,2,0,0),(621,NULL,'DepartmentPerfomance',1,0,0,0),(622,NULL,'WeeklySales',1,3,0,0),(623,NULL,'Employees',1,4,0,0),(624,NULL,'Messages',1,5,0,0),(625,NULL,'Workers',1,6,0,0),(626,NULL,'SalesWarehouse',0,1,0,0),(627,NULL,'ApplicationInfo',1,0,1,0),(628,NULL,'DeliveryPlan',1,1,0,0),(629,NULL,'Goals',1,1,1,0),(630,NULL,'Calendar',1,2,1,0),(631,NULL,'Suppliers',1,3,1,0),(632,NULL,'HiringFunnel',0,0,0,0),(633,NULL,'HistoryEvent',1,4,1,0),(634,NULL,'SalesFunnel',1,0,0,0),(635,NULL,'DepartmentPerfomance',1,1,0,0),(636,NULL,'WeeklySales',1,2,0,0),(637,NULL,'Employees',1,3,0,0),(638,NULL,'Messages',1,4,0,0),(639,NULL,'Workers',1,5,0,0),(640,NULL,'SalesWarehouse',1,6,0,0),(641,NULL,'ApplicationInfo',1,0,1,0),(642,NULL,'DeliveryPlan',1,1,1,0),(643,NULL,'Goals',1,2,1,0),(644,NULL,'Calendar',1,3,1,0),(645,NULL,'Suppliers',1,4,1,0),(646,NULL,'HiringFunnel',1,5,1,0),(647,NULL,'HistoryEvent',1,6,1,0),(648,NULL,'SalesFunnel',1,0,0,0),(649,NULL,'DepartmentPerfomance',1,1,0,0),(650,NULL,'WeeklySales',1,2,0,0),(651,NULL,'Employees',1,3,0,0),(652,NULL,'Messages',1,4,0,0),(653,NULL,'Workers',1,5,0,0),(654,NULL,'SalesWarehouse',1,6,0,0),(655,NULL,'ApplicationInfo',1,0,1,0),(656,NULL,'DeliveryPlan',1,1,1,0),(657,NULL,'Goals',1,2,1,0),(658,NULL,'Calendar',1,3,1,0),(659,NULL,'Suppliers',1,4,1,0),(660,NULL,'HiringFunnel',1,5,1,0),(661,NULL,'HistoryEvent',1,6,1,0),(662,88,'SalesFunnel',1,1,0,0),(663,88,'DepartmentPerfomance',1,3,0,0),(664,88,'WeeklySales',0,2,0,0),(665,88,'Employees',1,0,1,0),(666,88,'Messages',0,0,0,0),(667,88,'Workers',1,1,1,0),(668,88,'SalesWarehouse',0,1,0,0),(669,88,'ApplicationInfo',1,5,0,0),(670,88,'DeliveryPlan',1,2,0,0),(671,88,'Goals',1,4,0,0),(672,88,'Calendar',0,3,0,0),(673,88,'Suppliers',0,5,0,0),(674,88,'HiringFunnel',1,0,0,0),(675,88,'HistoryEvent',0,7,0,0),(676,117,'SalesFunnel',1,0,0,0),(677,117,'DepartmentPerfomance',1,1,0,0),(678,117,'WeeklySales',0,9,0,0),(679,117,'Employees',0,0,0,0),(680,117,'Messages',0,5,0,0),(681,117,'Workers',0,12,0,0),(682,117,'SalesWarehouse',0,1,0,0),(683,117,'ApplicationInfo',1,1,1,0),(684,117,'DeliveryPlan',0,2,0,0),(685,117,'Goals',0,4,0,0),(686,117,'Calendar',1,0,1,0),(687,117,'Suppliers',0,3,0,0),(688,117,'HiringFunnel',1,2,0,0),(689,117,'HistoryEvent',0,11,0,0),(690,118,'SalesFunnel',1,0,0,0),(691,118,'DepartmentPerfomance',1,1,0,0),(692,118,'WeeklySales',1,2,0,0),(693,118,'Employees',1,3,0,0),(694,118,'Messages',1,4,0,0),(695,118,'Workers',1,5,0,0),(696,118,'SalesWarehouse',1,6,0,0),(697,118,'ApplicationInfo',1,0,1,0),(698,118,'DeliveryPlan',1,1,1,0),(699,118,'Goals',1,2,1,0),(700,118,'Calendar',1,3,1,0),(701,118,'Suppliers',1,4,1,0),(702,118,'HiringFunnel',1,5,1,0),(703,118,'HistoryEvent',1,6,1,0),(704,NULL,'SalesFunnel',1,0,0,0),(705,NULL,'DepartmentPerfomance',1,1,0,0),(706,NULL,'WeeklySales',1,2,0,0),(707,NULL,'Employees',1,3,0,0),(708,NULL,'Messages',1,4,0,0),(709,NULL,'Workers',1,5,0,0),(710,NULL,'SalesWarehouse',1,6,0,0),(711,NULL,'ApplicationInfo',1,0,1,0),(712,NULL,'DeliveryPlan',1,1,1,0),(713,NULL,'Goals',1,2,1,0),(714,NULL,'Calendar',1,3,1,0),(715,NULL,'Suppliers',1,4,1,0),(716,NULL,'HiringFunnel',1,5,1,0),(717,NULL,'HistoryEvent',1,6,1,0),(718,121,'SalesFunnel',1,0,0,0),(719,121,'DepartmentPerfomance',1,1,0,0),(720,121,'WeeklySales',1,2,0,0),(721,121,'Employees',1,3,0,0),(722,121,'Messages',1,4,0,0),(723,121,'Workers',1,5,0,0),(724,121,'SalesWarehouse',1,6,0,0),(725,121,'ApplicationInfo',1,0,1,0),(726,121,'DeliveryPlan',1,1,1,0),(727,121,'Goals',1,2,1,0),(728,121,'Calendar',1,3,1,0),(729,121,'Suppliers',1,4,1,0),(730,121,'HiringFunnel',1,5,1,0),(731,121,'HistoryEvent',1,6,1,0),(732,NULL,'SalesFunnel',1,0,0,0),(733,NULL,'DepartmentPerfomance',1,1,0,0),(734,NULL,'WeeklySales',1,2,0,0),(735,NULL,'Employees',1,3,0,0),(736,NULL,'Messages',1,4,0,0),(737,NULL,'Workers',1,5,0,0),(738,NULL,'SalesWarehouse',1,6,0,0),(739,NULL,'ApplicationInfo',1,0,1,0),(740,NULL,'DeliveryPlan',1,1,1,0),(741,NULL,'Goals',1,2,1,0),(742,NULL,'Calendar',1,3,1,0),(743,NULL,'Suppliers',1,4,1,0),(744,NULL,'HiringFunnel',1,5,1,0),(745,NULL,'HistoryEvent',1,6,1,0),(746,NULL,'SalesFunnel',1,5,1,0),(747,NULL,'DepartmentPerfomance',1,3,0,0),(748,NULL,'WeeklySales',0,3,0,0),(749,NULL,'Employees',1,4,1,0),(750,NULL,'Messages',1,5,0,0),(751,NULL,'Workers',0,2,0,0),(752,NULL,'SalesWarehouse',1,6,0,0),(753,NULL,'ApplicationInfo',1,2,1,0),(754,NULL,'DeliveryPlan',0,0,0,0),(755,NULL,'Goals',1,2,0,0),(756,NULL,'Calendar',0,1,0,0),(757,NULL,'Suppliers',1,6,1,0),(758,NULL,'HiringFunnel',1,3,1,0),(759,NULL,'HistoryEvent',1,4,0,0),(760,NULL,'SalesFunnel',1,0,0,0),(761,NULL,'DepartmentPerfomance',1,1,0,0),(762,NULL,'WeeklySales',1,2,0,0),(763,NULL,'Employees',1,3,0,0),(764,NULL,'Messages',1,4,0,0),(765,NULL,'Workers',1,5,0,0),(766,NULL,'SalesWarehouse',1,6,0,0),(767,NULL,'ApplicationInfo',1,0,1,0),(768,NULL,'DeliveryPlan',1,1,1,0),(769,NULL,'Goals',1,2,1,0),(770,NULL,'Calendar',1,3,1,0),(771,NULL,'Suppliers',1,4,1,0),(772,NULL,'HiringFunnel',1,5,1,0),(773,NULL,'HistoryEvent',1,6,1,0),(774,NULL,'SalesFunnel',1,0,0,0),(775,NULL,'DepartmentPerfomance',1,1,0,0),(776,NULL,'WeeklySales',1,2,0,0),(777,NULL,'Employees',1,3,0,0),(778,NULL,'Messages',1,4,0,0),(779,NULL,'Workers',1,5,0,0),(780,NULL,'SalesWarehouse',1,6,0,0),(781,NULL,'ApplicationInfo',1,0,1,0),(782,NULL,'DeliveryPlan',1,1,1,0),(783,NULL,'Goals',1,2,1,0),(784,NULL,'Calendar',1,3,1,0),(785,NULL,'Suppliers',1,4,1,0),(786,NULL,'HiringFunnel',1,5,1,0),(787,NULL,'HistoryEvent',1,6,1,0),(788,126,'SalesFunnel',1,0,0,0),(789,126,'DepartmentPerfomance',1,1,0,0),(790,126,'WeeklySales',1,2,0,0),(791,126,'Employees',1,3,0,0),(792,126,'Messages',1,4,0,0),(793,126,'Workers',1,5,0,0),(794,126,'SalesWarehouse',1,6,0,0),(795,126,'ApplicationInfo',1,0,1,0),(796,126,'DeliveryPlan',1,1,1,0),(797,126,'Goals',1,2,1,0),(798,126,'Calendar',1,3,1,0),(799,126,'Suppliers',1,4,1,0),(800,126,'HiringFunnel',1,5,1,0),(801,126,'HistoryEvent',1,6,1,0),(802,NULL,'SalesFunnel',1,0,0,0),(803,NULL,'DepartmentPerfomance',1,1,0,0),(804,NULL,'WeeklySales',1,2,0,0),(805,NULL,'Employees',1,3,0,0),(806,NULL,'Messages',1,4,0,0),(807,NULL,'Workers',1,5,0,0),(808,NULL,'SalesWarehouse',1,6,0,0),(809,NULL,'ApplicationInfo',1,0,1,0),(810,NULL,'DeliveryPlan',1,1,1,0),(811,NULL,'Goals',1,2,1,0),(812,NULL,'Calendar',1,3,1,0),(813,NULL,'Suppliers',1,4,1,0),(814,NULL,'HiringFunnel',1,5,1,0),(815,NULL,'HistoryEvent',1,6,1,0),(816,NULL,'SalesFunnel',1,0,0,0),(817,NULL,'DepartmentPerfomance',1,1,0,0),(818,NULL,'WeeklySales',1,2,0,0),(819,NULL,'Employees',1,3,0,0),(820,NULL,'Messages',1,4,0,0),(821,NULL,'Workers',1,5,0,0),(822,NULL,'SalesWarehouse',1,6,0,0),(823,NULL,'ApplicationInfo',1,0,1,0),(824,NULL,'DeliveryPlan',1,1,1,0),(825,NULL,'Goals',1,2,1,0),(826,NULL,'Calendar',1,3,1,0),(827,NULL,'Suppliers',1,4,1,0),(828,NULL,'HiringFunnel',1,5,1,0),(829,NULL,'HistoryEvent',1,6,1,0),(830,NULL,'SalesFunnel',1,0,0,0),(831,NULL,'DepartmentPerfomance',1,1,0,0),(832,NULL,'WeeklySales',1,2,0,0),(833,NULL,'Employees',1,3,0,0),(834,NULL,'Messages',1,4,0,0),(835,NULL,'Workers',1,5,0,0),(836,NULL,'SalesWarehouse',1,6,0,0),(837,NULL,'ApplicationInfo',1,0,1,0),(838,NULL,'DeliveryPlan',1,1,1,0),(839,NULL,'Goals',1,2,1,0),(840,NULL,'Calendar',1,3,1,0),(841,NULL,'Suppliers',1,4,1,0),(842,NULL,'HiringFunnel',1,5,1,0),(843,NULL,'HistoryEvent',1,6,1,0),(844,NULL,'SalesFunnel',1,0,0,0),(845,NULL,'DepartmentPerfomance',1,1,0,0),(846,NULL,'WeeklySales',1,2,0,0),(847,NULL,'Employees',1,3,0,0),(848,NULL,'Messages',1,4,0,0),(849,NULL,'Workers',1,5,0,0),(850,NULL,'SalesWarehouse',1,6,0,0),(851,NULL,'ApplicationInfo',1,0,1,0),(852,NULL,'DeliveryPlan',1,1,1,0),(853,NULL,'Goals',1,2,1,0),(854,NULL,'Calendar',1,3,1,0),(855,NULL,'Suppliers',1,4,1,0),(856,NULL,'HiringFunnel',1,5,1,0),(857,NULL,'HistoryEvent',1,6,1,0),(858,NULL,'SalesFunnel',1,0,0,0),(859,NULL,'DepartmentPerfomance',1,1,0,0),(860,NULL,'WeeklySales',1,2,0,0),(861,NULL,'Employees',1,3,0,0),(862,NULL,'Messages',1,4,0,0),(863,NULL,'Workers',1,5,0,0),(864,NULL,'SalesWarehouse',1,6,0,0),(865,NULL,'ApplicationInfo',1,0,1,0),(866,NULL,'DeliveryPlan',1,1,1,0),(867,NULL,'Goals',1,2,1,0),(868,NULL,'Calendar',1,3,1,0),(869,NULL,'Suppliers',1,4,1,0),(870,NULL,'HiringFunnel',1,5,1,0),(871,NULL,'HistoryEvent',1,6,1,0),(872,128,'SalesFunnel',1,0,0,0),(873,128,'DepartmentPerfomance',1,1,0,0),(874,128,'WeeklySales',1,2,0,0),(875,128,'Employees',1,3,0,0),(876,128,'Messages',1,4,0,0),(877,128,'Workers',1,5,0,0),(878,128,'SalesWarehouse',1,6,0,0),(879,128,'ApplicationInfo',1,0,1,0),(880,128,'DeliveryPlan',1,1,1,0),(881,128,'Goals',1,2,1,0),(882,128,'Calendar',1,3,1,0),(883,128,'Suppliers',1,4,1,0),(884,128,'HiringFunnel',1,5,1,0),(885,128,'HistoryEvent',1,6,1,0),(886,129,'SalesFunnel',0,0,0,0),(887,129,'DepartmentPerfomance',1,1,0,0),(888,129,'WeeklySales',1,2,0,0),(889,129,'Employees',1,3,0,0),(890,129,'Messages',1,4,0,0),(891,129,'Workers',1,5,0,0),(892,129,'SalesWarehouse',1,6,0,0),(893,129,'ApplicationInfo',1,0,1,0),(894,129,'DeliveryPlan',1,1,1,0),(895,129,'Goals',1,2,1,0),(896,129,'Calendar',1,3,1,0),(897,129,'Suppliers',1,4,1,0),(898,129,'HiringFunnel',1,5,1,0),(899,129,'HistoryEvent',1,6,1,0),(900,130,'SalesFunnel',1,0,0,0),(901,130,'DepartmentPerfomance',1,1,0,0),(902,130,'WeeklySales',1,2,0,0),(903,130,'Employees',1,3,0,0),(904,130,'Messages',1,4,0,0),(905,130,'Workers',1,5,0,0),(906,130,'SalesWarehouse',1,6,0,0),(907,130,'ApplicationInfo',1,0,1,0),(908,130,'DeliveryPlan',1,1,1,0),(909,130,'Goals',1,2,1,0),(910,130,'Calendar',1,3,1,0),(911,130,'Suppliers',1,4,1,0),(912,130,'HiringFunnel',1,5,1,0),(913,130,'HistoryEvent',1,6,1,0),(914,NULL,'SalesFunnel',1,0,0,0),(915,NULL,'DepartmentPerfomance',1,1,0,0),(916,NULL,'WeeklySales',1,2,0,0),(917,NULL,'Employees',1,3,0,0),(918,NULL,'Messages',1,4,0,0),(919,NULL,'Workers',1,5,0,0),(920,NULL,'SalesWarehouse',1,6,0,0),(921,NULL,'ApplicationInfo',1,0,1,0),(922,NULL,'DeliveryPlan',1,1,1,0),(923,NULL,'Goals',1,2,1,0),(924,NULL,'Calendar',1,3,1,0),(925,NULL,'Suppliers',1,4,1,0),(926,NULL,'HiringFunnel',1,5,1,0),(927,NULL,'HistoryEvent',1,6,1,0),(928,132,'SalesFunnel',1,0,0,0),(929,132,'DepartmentPerfomance',1,1,0,0),(930,132,'WeeklySales',1,2,0,0),(931,132,'Employees',1,3,0,0),(932,132,'Messages',1,4,0,0),(933,132,'Workers',1,5,0,0),(934,132,'SalesWarehouse',1,6,0,0),(935,132,'ApplicationInfo',1,0,1,0),(936,132,'DeliveryPlan',1,1,1,0),(937,132,'Goals',1,2,1,0),(938,132,'Calendar',1,3,1,0),(939,132,'Suppliers',1,4,1,0),(940,132,'HiringFunnel',1,5,1,0),(941,132,'HistoryEvent',1,6,1,0),(942,133,'SalesFunnel',1,0,0,0),(943,133,'DepartmentPerfomance',1,1,0,0),(944,133,'WeeklySales',1,2,0,0),(945,133,'Employees',1,3,0,0),(946,133,'Messages',1,4,0,0),(947,133,'Workers',1,5,0,0),(948,133,'SalesWarehouse',1,6,0,0),(949,133,'ApplicationInfo',1,0,1,0),(950,133,'DeliveryPlan',1,1,1,0),(951,133,'Goals',1,2,1,0),(952,133,'Calendar',1,3,1,0),(953,133,'Suppliers',1,4,1,0),(954,133,'HiringFunnel',1,5,1,0),(955,133,'HistoryEvent',1,6,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` (`id`, `status`, `name`, `surname`, `patronymic`, `date_birth`, `gender`, `passport`, `apply_position`, `experience`, `experience_description`, `collaborated`) VALUES (1,0,'Анна','Власова','Максимовна','1997-12-12',1,'МТ258741','-',5,'<p>Знает эту сферу деятельности</p><p><br></p>',0),(2,0,'Максим ','Алонов','Владимирович',NULL,0,'-','-',2,'',0),(3,0,'Антон','Гетманский','Викторович',NULL,0,'-','-',7,'',0),(4,0,'Денис','Фомин','Алексеевич',NULL,0,'-','-',10,'',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_vacancy`
--

LOCK TABLES `worker_vacancy` WRITE;
/*!40000 ALTER TABLE `worker_vacancy` DISABLE KEYS */;
INSERT INTO `worker_vacancy` (`id`, `worker_id`, `vacancy_id`) VALUES (1,1,87),(2,1,88),(3,2,89),(4,3,86),(5,3,88),(6,4,86),(7,4,87),(8,4,88);
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

-- Dump completed on 2020-12-08 19:00:17
