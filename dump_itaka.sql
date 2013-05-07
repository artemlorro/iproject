-- MySQL dump 10.13  Distrib 5.1.67, for portbld-freebsd8.3 (i386)
--
-- Host: localhost    Database: itaka
-- ------------------------------------------------------
-- Server version	5.1.67

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
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent`
--

LOCK TABLES `agent` WRITE;
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'r01','Выборгский район');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bnews`
--

DROP TABLE IF EXISTS `bnews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bnews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dt` datetime DEFAULT NULL,
  `skey` varchar(256) NOT NULL DEFAULT '',
  `name` varchar(256) NOT NULL DEFAULT '',
  `ann` text,
  `text` text,
  `preview` text,
  `onoff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bnews`
--

LOCK TABLES `bnews` WRITE;
/*!40000 ALTER TABLE `bnews` DISABLE KEYS */;
INSERT INTO `bnews` VALUES (1,'2013-05-04 19:30:55','novost_rynka_1','Новость рынка 1','<p>\n	Тут будет аннотация новости рынка 1</p>\n','<p>\n	Тут будет текст новости рынка 1</p>\n',NULL,1),(2,'2013-05-04 19:49:53','novost_rynka_2','Новость рынка 2','<p>\n	Аннотация</p>\n','<p>\n	Текст</p>\n',NULL,1);
/*!40000 ALTER TABLE `bnews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bnews_branches`
--

DROP TABLE IF EXISTS `bnews_branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bnews_branches` (
  `bnews_id` int(11) NOT NULL DEFAULT '0',
  `branch_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bnews_branches`
--

LOCK TABLES `bnews_branches` WRITE;
/*!40000 ALTER TABLE `bnews_branches` DISABLE KEYS */;
INSERT INTO `bnews_branches` VALUES (1,3),(1,5),(1,1),(2,3),(2,2);
/*!40000 ALTER TABLE `bnews_branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bottom_menu`
--

DROP TABLE IF EXISTS `bottom_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bottom_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordr` int(11) NOT NULL DEFAULT '0',
  `col` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(256) NOT NULL DEFAULT '',
  `url` varchar(256) NOT NULL DEFAULT '',
  `onoff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bottom_menu`
--

LOCK TABLES `bottom_menu` WRITE;
/*!40000 ALTER TABLE `bottom_menu` DISABLE KEYS */;
INSERT INTO `bottom_menu` VALUES (1,4,0,'Новостройки','',1),(2,3,0,'Вторичный рынок','',1),(3,2,0,'Аренда','',1),(4,0,1,'Элитная','',1),(5,1,0,'Коммерческая','',1),(6,10,1,'Коттеджи','',1),(7,8,1,'Загородная','',1),(8,9,1,'Зарубежная','',1),(9,7,2,'О компании','',1),(10,6,2,'Услуги','',1),(11,5,2,'Новости','',1),(12,12,3,'Пресс-центр','',1),(13,11,3,'FAQ','',1),(14,13,3,'Контакты','',1);
/*!40000 ALTER TABLE `bottom_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `cid` varchar(128) NOT NULL,
  `onoff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'Новостройки','n1',1),(2,'Вторичный рынок','n2',1),(3,'Аренда','n3',1),(4,'Элитная','n4',0),(5,'Коммерческая','n5',0),(6,'Коттеджи','n6',0),(7,'Загородная','n7',0),(8,'Ипотека','n8',0),(9,'х','n9',0);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building_type`
--

DROP TABLE IF EXISTS `building_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building_type`
--

LOCK TABLES `building_type` WRITE;
/*!40000 ALTER TABLE `building_type` DISABLE KEYS */;
INSERT INTO `building_type` VALUES (1,'t1','Кирпично-монолитный');
/*!40000 ALTER TABLE `building_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `glo`
--

DROP TABLE IF EXISTS `glo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `header_phone1_code` varchar(32) NOT NULL DEFAULT '',
  `header_phone1` varchar(32) NOT NULL DEFAULT '',
  `header_phone2_code` varchar(32) DEFAULT '',
  `header_phone2` varchar(32) DEFAULT '',
  `main_slider_images` text,
  `main_ceo_text` text NOT NULL,
  `main_ceo_sub` varchar(256) NOT NULL DEFAULT '',
  `main_ceo_img` text NOT NULL,
  `main_ceo_fio` varchar(256) NOT NULL DEFAULT '',
  `url_vk` varchar(256) NOT NULL DEFAULT '',
  `url_fb` varchar(256) NOT NULL DEFAULT '',
  `url_tw` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glo`
--

LOCK TABLES `glo` WRITE;
/*!40000 ALTER TABLE `glo` DISABLE KEYS */;
INSERT INTO `glo` VALUES (1,'(812)','740-70-40','(800)','333-98-00','136765138085.png;136765138494.png;136765371486.png','<p>\n	Я не знаю ни одной другой профессии, допускающей столько разнообразных мотивов для тех, кто в нее приходит и работает, профессии столь жесткой и справедливой одновременно. Жесткой, так как уровень заработка зависит только от количества и качества вложенных сил. Справедливой, так как взамен дает невероятное количество возможностей для роста, р</p>\n<p>\n	Работа в недвижимости &ndash; истинно бесценный жизненный опыт.</p>\n<p class=\"last\">\n	Добро пожаловать в &laquo;Итаку&raquo;!&raquo;</p>\n','Генеральный директор АН «Итака»','136765227951.png','Сергей Антонович Галалу','http://vk.com','http://facebook.com','http://twitter.com');
/*!40000 ALTER TABLE `glo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ground_status`
--

DROP TABLE IF EXISTS `ground_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ground_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ground_status`
--

LOCK TABLES `ground_status` WRITE;
/*!40000 ALTER TABLE `ground_status` DISABLE KEYS */;
INSERT INTO `ground_status` VALUES (1,'s1','В собственности');
/*!40000 ALTER TABLE `ground_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lavatory_type`
--

DROP TABLE IF EXISTS `lavatory_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lavatory_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lavatory_type`
--

LOCK TABLES `lavatory_type` WRITE;
/*!40000 ALTER TABLE `lavatory_type` DISABLE KEYS */;
INSERT INTO `lavatory_type` VALUES (1,'t1','Раздельный');
/*!40000 ALTER TABLE `lavatory_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metro_line`
--

DROP TABLE IF EXISTS `metro_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metro_line` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metro_line`
--

LOCK TABLES `metro_line` WRITE;
/*!40000 ALTER TABLE `metro_line` DISABLE KEYS */;
INSERT INTO `metro_line` VALUES (1,'Ветка0002','Правобережная линия'),(2,'012','Синия ветка');
/*!40000 ALTER TABLE `metro_line` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metro_station`
--

DROP TABLE IF EXISTS `metro_station`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metro_station` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `metro_line_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metro_station`
--

LOCK TABLES `metro_station` WRITE;
/*!40000 ALTER TABLE `metro_station` DISABLE KEYS */;
INSERT INTO `metro_station` VALUES (1,'pr1',2,'Проспект просвещения'),(2,'pr2',2,'Парнас');
/*!40000 ALTER TABLE `metro_station` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dt` datetime DEFAULT NULL,
  `skey` varchar(256) NOT NULL DEFAULT '',
  `name` varchar(256) NOT NULL DEFAULT '',
  `ann` text,
  `text` text,
  `preview` text,
  `onoff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'2013-04-20 16:44:35','novost_1','Новость 1','<p>\n	Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости</p>\n','<p>\n	Как можно было заметить, мы используем метод save() как для добавления, так и для обновления записей. Если экземпляр AR создан с использованием оператора new, то вызов метода save() приведёт к добавлению новой строки в базу данных. Если же экземпляр AR создан как результат вызова методов find и findAll, вызов метода save() обновит данные существующей строки в таблице. На самом деле, можно использовать свойство CActiveRecord::isNewRecord для указания, является экземпляр AR новым или нет. Кроме того, можно обновить одну или несколько строк в таблице без их предварительной загрузки. Для этого в AR существуют следующие методы уровня класса:</p>\n','136774294346.png',1),(2,'2013-04-20 16:48:39','novost_2','Новость 2','<p>\n	Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости&nbsp;Тут будет аннотация новости</p>\n','<p>\n	Как можно было заметить, мы используем метод save() как для добавления, так и для обновления записей. Если экземпляр AR создан с использованием оператора new, то вызов метода save() приведёт к добавлению новой строки в базу данных. Если же экземпляр AR создан как результат вызова методов find и findAll, вызов метода save() обновит данные существующей строки в таблице. На самом деле, можно использовать свойство CActiveRecord::isNewRecord для указания, является экземпляр AR новым или нет. Кроме того, можно обновить одну или несколько строк в таблице без их предварительной загрузки. Для этого в AR существуют следующие методы уровня класса:</p>\n','136774293389.png',1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_commercial`
--

DROP TABLE IF EXISTS `obj_commercial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_commercial` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `agent_id` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `appropriation` varchar(256) NOT NULL DEFAULT '',
  `market` tinyint(1) NOT NULL DEFAULT '0',
  `lease_type` tinyint(1) NOT NULL DEFAULT '0',
  `deadline` datetime DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  `address` varchar(256) NOT NULL DEFAULT '',
  `train_station` varchar(256) NOT NULL DEFAULT '',
  `s_total` float NOT NULL DEFAULT '0',
  `room_height` float NOT NULL DEFAULT '0',
  `building_type` varchar(256) NOT NULL DEFAULT '',
  `floor` smallint(6) NOT NULL DEFAULT '0',
  `qty_floor` smallint(6) NOT NULL DEFAULT '0',
  `adv_text` varchar(256) NOT NULL DEFAULT '',
  `images` text NOT NULL,
  `rooms` text NOT NULL,
  `entrances` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_commercial`
--

LOCK TABLES `obj_commercial` WRITE;
/*!40000 ALTER TABLE `obj_commercial` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_commercial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_commercial_metro`
--

DROP TABLE IF EXISTS `obj_commercial_metro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_commercial_metro` (
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `station_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_commercial_metro`
--

LOCK TABLES `obj_commercial_metro` WRITE;
/*!40000 ALTER TABLE `obj_commercial_metro` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_commercial_metro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_cottage`
--

DROP TABLE IF EXISTS `obj_cottage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_cottage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `agent_id` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `object_type` varchar(256) NOT NULL DEFAULT '',
  `qty_rooms_total` smallint(6) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `address` varchar(256) NOT NULL DEFAULT '',
  `train_station` varchar(256) NOT NULL DEFAULT '',
  `s_total` float NOT NULL DEFAULT '0',
  `s_live` float NOT NULL DEFAULT '0',
  `s_kitchen` float NOT NULL DEFAULT '0',
  `s_ground` float NOT NULL DEFAULT '0',
  `floor` smallint(6) NOT NULL DEFAULT '0',
  `qty_floor` smallint(6) NOT NULL DEFAULT '0',
  `has_restoration` tinyint(1) NOT NULL DEFAULT '0',
  `lavatory_type` varchar(256) NOT NULL DEFAULT '0',
  `stage` varchar(256) NOT NULL DEFAULT '0',
  `deadline` datetime DEFAULT NULL,
  `adv_text` varchar(256) NOT NULL DEFAULT '',
  `images` text NOT NULL,
  `rooms` text NOT NULL,
  `payments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_cottage`
--

LOCK TABLES `obj_cottage` WRITE;
/*!40000 ALTER TABLE `obj_cottage` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_cottage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_cottage_metro`
--

DROP TABLE IF EXISTS `obj_cottage_metro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_cottage_metro` (
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `station_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_cottage_metro`
--

LOCK TABLES `obj_cottage_metro` WRITE;
/*!40000 ALTER TABLE `obj_cottage_metro` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_cottage_metro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_rent`
--

DROP TABLE IF EXISTS `obj_rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_rent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `agent_id` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `type` smallint(6) NOT NULL DEFAULT '0',
  `qty_rooms_total` smallint(6) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `address` varchar(256) NOT NULL DEFAULT '',
  `train_station` varchar(256) NOT NULL DEFAULT '',
  `s_total` float NOT NULL DEFAULT '0',
  `s_live` float NOT NULL DEFAULT '0',
  `s_kitchen` float NOT NULL DEFAULT '0',
  `s_ground` float NOT NULL DEFAULT '0',
  `ground_status` varchar(256) NOT NULL DEFAULT '',
  `floor` smallint(6) NOT NULL DEFAULT '0',
  `qty_floor` smallint(6) NOT NULL DEFAULT '0',
  `has_phone` tinyint(1) NOT NULL DEFAULT '0',
  `has_electric` tinyint(1) NOT NULL DEFAULT '0',
  `has_water_pipe` tinyint(1) NOT NULL DEFAULT '0',
  `has_gas_pipe` tinyint(1) NOT NULL DEFAULT '0',
  `adv_text` varchar(256) NOT NULL DEFAULT '',
  `images` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_rent`
--

LOCK TABLES `obj_rent` WRITE;
/*!40000 ALTER TABLE `obj_rent` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_rent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_rent_metro`
--

DROP TABLE IF EXISTS `obj_rent_metro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_rent_metro` (
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `station_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_rent_metro`
--

LOCK TABLES `obj_rent_metro` WRITE;
/*!40000 ALTER TABLE `obj_rent_metro` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_rent_metro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_secondary`
--

DROP TABLE IF EXISTS `obj_secondary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_secondary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `agent_id` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `type` smallint(6) NOT NULL DEFAULT '0',
  `qty_rooms_total` smallint(6) NOT NULL DEFAULT '0',
  `qty_to_sale` smallint(6) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `address` varchar(256) NOT NULL DEFAULT '',
  `train_station` varchar(256) NOT NULL DEFAULT '',
  `s_total` float NOT NULL DEFAULT '0',
  `s_live` float NOT NULL DEFAULT '0',
  `s_kitchen` float NOT NULL DEFAULT '0',
  `room_height` float NOT NULL DEFAULT '0',
  `building_type_id` int(11) NOT NULL DEFAULT '0',
  `floor` smallint(6) NOT NULL DEFAULT '0',
  `qty_floor` smallint(6) NOT NULL DEFAULT '0',
  `has_phone` tinyint(1) NOT NULL DEFAULT '0',
  `has_balcony` tinyint(1) NOT NULL DEFAULT '0',
  `has_lift` tinyint(1) NOT NULL DEFAULT '0',
  `bathroom` varchar(256) NOT NULL DEFAULT '',
  `adv_text` varchar(256) NOT NULL DEFAULT '',
  `images` text NOT NULL,
  `district_id` int(11) NOT NULL DEFAULT '0',
  `itaka_only` tinyint(1) NOT NULL DEFAULT '0',
  `lavatory_type_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_secondary`
--

LOCK TABLES `obj_secondary` WRITE;
/*!40000 ALTER TABLE `obj_secondary` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_secondary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_secondary_metro`
--

DROP TABLE IF EXISTS `obj_secondary_metro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_secondary_metro` (
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `station_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_secondary_metro`
--

LOCK TABLES `obj_secondary_metro` WRITE;
/*!40000 ALTER TABLE `obj_secondary_metro` DISABLE KEYS */;
/*!40000 ALTER TABLE `obj_secondary_metro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `skey` varchar(256) NOT NULL DEFAULT '',
  `name` varchar(256) NOT NULL DEFAULT '',
  `text` text,
  `onoff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'o_kompanii','О компании','<p>\n	<strong>Надо сказать, что платоновская академия индуктивно трансформирует интеллигибельный гедонизм, учитывая опасность, которую представляли собой писания Дюринга для не окрепшего еще немецкого рабочего движения. Гегельянство контролирует предмет деятельности, ломая рамки привычных представлений. Исчисление предикатов амбивалентно. Мир нетривиален. Герменевтика, по определению, заполняет из ряда вон выходящий гравитационный парадокс, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире.</strong></p>\n<p>\n	Мир реально заполняет дуализм, при этом буквы А, В, I, О символизируют соответственно общеутвердительное, общеотрицательное, частноутвердительное и частноотрицательное суждения. Исчисление предикатов трансформирует неоднозначный гений, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире. Гений дискредитирует позитивизм, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире.</p>\n',1);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_type`
--

DROP TABLE IF EXISTS `pay_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_type`
--

LOCK TABLES `pay_type` WRITE;
/*!40000 ALTER TABLE `pay_type` DISABLE KEYS */;
INSERT INTO `pay_type` VALUES (1,'t1','Безнал');
/*!40000 ALTER TABLE `pay_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `top_menu`
--

DROP TABLE IF EXISTS `top_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `top_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordr` int(11) NOT NULL DEFAULT '0',
  `name` varchar(256) NOT NULL DEFAULT '',
  `url` varchar(256) NOT NULL DEFAULT '',
  `onoff` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `top_menu`
--

LOCK TABLES `top_menu` WRITE;
/*!40000 ALTER TABLE `top_menu` DISABLE KEYS */;
INSERT INTO `top_menu` VALUES (1,0,'Новостройки','',1,0),(2,1,'Вторичный рынок','',1,0),(3,2,'Аренда','',1,0),(4,3,'Элитная','',1,0),(5,4,'Коммерческая','',1,0),(6,5,'Коттеджи','',1,0),(7,6,'Загородная','',1,0),(8,7,'Ипотека','',1,0),(9,8,'Другие услуги','',1,0),(10,1,'Другое 1','',1,9);
/*!40000 ALTER TABLE `top_menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-07 15:08:52
