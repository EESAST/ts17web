-- MySQL dump 10.13  Distrib 5.6.25, for osx10.8 (x86_64)
--
-- Host: localhost    Database: ts17web
-- ------------------------------------------------------
-- Server version	5.6.25

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
-- Table structure for table `detailforum`
--

DROP TABLE IF EXISTS `detailforum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detailforum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fatherindex` int(10) unsigned NOT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detailforum`
--

LOCK TABLES `detailforum` WRITE;
/*!40000 ALTER TABLE `detailforum` DISABLE KEYS */;
INSERT INTO `detailforum` VALUES (1,2,'hehehe','fcz','2016-01-20 10:10:13'),(2,2,'hahaha','fcz','2016-01-20 10:10:32'),(3,2,'hahaha','fcz','2016-01-20 10:11:18'),(4,1,'不说不知道一说吓一跳','fcz','2016-01-20 10:11:40'),(5,3,'sad','fcz','2016-01-20 06:21:45'),(6,4,'sfgssdg','test7','2016-01-31 02:06:14'),(7,10,'agergwegqb','lzhbrian','2016-02-01 13:04:05'),(8,7,'asfdasdfaf','lzhbrian','2016-02-01 13:04:11'),(9,7,'nenerterrgw','lzhbrian','2016-02-01 13:04:47'),(10,7,'hltelkrler','lzhbrian','2016-02-01 13:07:59'),(11,7,'ml34kmhlkmh\r\n','lzhbrian','2016-02-01 13:08:23'),(12,7,'rgwge','lzhbrian','2016-02-01 13:09:59'),(13,9,'wefqwfq','lzhbrian','2016-02-01 13:10:11'),(14,9,'ntrnrtntryrt','lzhbrian','2016-02-01 13:10:14'),(15,3,'jhbhjhbhj','lzhbrian','2016-02-01 13:13:10'),(16,7,'fqwfewq','testtest','2016-02-01 13:16:41'),(17,2,'wefwe','testtest','2016-02-01 13:16:50'),(18,10,'fwefefew','testtest','2016-02-01 13:17:02'),(19,12,'山东 v 达 vs v','testtest','2016-02-01 13:21:55'),(20,14,'颗颗颗','testuser','2016-02-02 02:31:56'),(21,14,'hahah','lzhbrian','2016-02-02 02:32:19'),(22,14,'hahah ','testtest','2016-02-02 02:32:34'),(23,10,'qwekfhjweq','testtest','2016-02-02 02:36:10'),(24,11,'qwefqwefqf','testtest','2016-02-02 02:36:18'),(25,12,'bdsfbfdsfd','testabtmefor','2016-02-02 03:20:30'),(26,13,'是短发是短发','testabtmefor','2016-02-02 03:22:18'),(27,12,'是短发是短发','testabtmefor','2016-02-02 03:22:38'),(28,11,'是短发撒地方','testabtmefor','2016-02-02 03:24:10'),(29,15,'是反攻倒算的功夫','testabtmefor','2016-02-03 10:04:05'),(30,15,'VS大','testabtmefor','2016-02-03 12:45:34'),(31,7,'dfaaf','testabtmefor','2016-02-03 12:48:11'),(33,11,'weqfewfq','testtest','2016-02-03 13:21:13'),(34,15,'qewfqwfq ','lllbrian','2016-02-06 09:30:02'),(35,15,'qewfqwfq ','lllbrian','2016-02-06 09:30:54'),(36,13,'fqwefqwefeqf','lllbrian','2016-02-06 09:31:01'),(37,11,'weqfqwefeqwf','lllbrian','2016-02-06 09:31:06'),(38,17,'fwefqwfqwq','lllbrian','2016-02-06 09:31:12'),(39,15,'wqefqwefqfq','lllbrian','2016-02-06 09:31:18'),(41,18,'asdas','lllbrian','2016-02-06 09:36:26'),(42,19,'efwqwfwfwf','lllbrian','2016-02-06 09:41:27'),(43,20,'撒发的发疯的身份撒的','testabtmefor','2016-02-06 09:45:57'),(44,20,'请问放弃我放弃我','testabtmefor','2016-02-06 09:46:00'),(45,22,'惹不起尔认为','test5','2016-02-06 10:05:48'),(47,23,'ewfewfwe ','test5','2016-02-06 10:06:29'),(48,12,'safsadf','test7','2016-02-06 10:07:35'),(49,14,'heheheh','test7','2016-02-06 10:07:48'),(50,2,'aksldhfjkashfjkahd我在回复','lzhbrian','2016-02-06 10:40:30'),(51,11,'发烧空军飞机卡收费克拉结束的','lzhbrian','2016-02-06 10:41:06'),(52,12,'上课减肥啦空间发挥空间发哈空间','lzhbrian','2016-02-06 10:41:35'),(53,15,'ewqrqehrqehrelkw','lzhbrian','2016-02-06 10:48:58');
/*!40000 ALTER TABLE `detailforum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `theme` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `kinds` enum('tucao','tactic','rule','bug') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `reply` int(10) unsigned NOT NULL DEFAULT '0',
  `plike` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum`
--

LOCK TABLES `forum` WRITE;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` VALUES (1,'fcz','我好饿','真的','tucao',1,0,'2016-01-20 10:03:15','2016-01-20 10:11:40'),(2,'fcz','我也饿','呵呵呵呵','tucao',5,5,'2016-01-20 10:03:57','2016-02-06 10:40:30'),(3,'fcz','asdfa','asfa','tucao',2,5,'2016-01-20 06:21:40','2016-02-01 13:13:10'),(5,'lzhbrian','d','ds','tucao',0,0,'2016-02-01 12:39:20','2016-02-01 12:39:20'),(7,'lzhbrian','sadcas','acsdcdad','tucao',7,6,'2016-02-01 12:46:56','2016-02-03 12:48:11'),(9,'lzhbrian','sdfasf(bug)','afsfaf','tucao',2,0,'2016-02-01 12:52:52','2016-02-01 13:10:14'),(10,'lzhbrian','asfasfasf(tactic)','lksdnlkjasnfsa','tactic',3,5,'2016-02-01 13:02:44','2016-02-02 02:36:10'),(11,'testtest','规则询问贴（rule）','fhkahfsjkdfhaldfa','rule',5,25,'2016-02-01 13:21:34','2016-02-06 10:41:06'),(12,'testtest','bug（bug）','看撒娇和防空军阿里合法的时间发 ','bug',5,18,'2016-02-01 13:21:49','2016-02-06 10:41:35'),(13,'testtest','rule2（rule）','封口机娃焕发健康时间考虑到哈伦裤放假啊哈','rule',2,12,'2016-02-01 13:22:21','2016-02-06 09:31:01'),(14,'testtest','bug（bug）','疯狂的萨和防空军撒发哈时间发；决定开始啦','bug',4,7,'2016-02-01 13:22:34','2016-02-06 10:07:48'),(15,'testabtmefor','测试测试','fweqfwqfewqfqew','tactic',6,84,'2016-02-02 03:22:07','2016-02-06 10:48:58'),(21,'testabtmefor','bugbugbug快消失','hah','bug',0,1,'2016-02-06 09:58:29','2016-02-06 09:58:29'),(22,'test5','hahaha我是乱发的','看来发健身房卡号发大水','tactic',1,1,'2016-02-06 10:05:40','2016-02-06 10:05:48'),(23,'test5','puppy','wefewfewf','bug',1,1,'2016-02-06 10:06:14','2016-02-06 10:06:29'),(24,'test7','hahahahaha','wefwefw','bug',0,0,'2016-02-06 10:07:27','2016-02-06 10:07:27'),(25,'test7','第六个平台报错','克赖斯基啊倒海翻江啊哭','bug',0,0,'2016-02-06 10:08:13','2016-02-06 10:08:13');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likehistory`
--

DROP TABLE IF EXISTS `likehistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likehistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likehistory`
--

LOCK TABLES `likehistory` WRITE;
/*!40000 ALTER TABLE `likehistory` DISABLE KEYS */;
INSERT INTO `likehistory` VALUES (1,17,8),(2,15,8),(3,15,10),(4,11,10),(5,17,10),(6,6,10),(7,18,10),(8,20,18),(9,22,12),(10,23,12),(11,21,12),(12,6,12),(13,15,12),(14,12,13),(15,26,8);
/*!40000 ALTER TABLE `likehistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newss`
--

DROP TABLE IF EXISTS `newss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedat` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newss`
--

LOCK TABLES `newss` WRITE;
/*!40000 ALTER TABLE `newss` DISABLE KEYS */;
INSERT INTO `newss` VALUES (3,'21312','发撒反对','士大夫','0000-00-00');
/*!40000 ALTER TABLE `newss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sourcecodes`
--

DROP TABLE IF EXISTS `sourcecodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sourcecodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `uploadedby` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `uploadedat` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sourcecodes`
--

LOCK TABLES `sourcecodes` WRITE;
/*!40000 ALTER TABLE `sourcecodes` DISABLE KEYS */;
INSERT INTO `sourcecodes` VALUES (1,'嘿我真的好想你','fcz','2016-01-23 06:32:51');
/*!40000 ALTER TABLE `sourcecodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `teamname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `leadername` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `member1name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `member2name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `member3name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `slogan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (2,'嘿我真的好想你','fanchengze','fcz','','','呵呵呵','嘿嘿嘿',1),(3,'我的队伍最帅','test3','','','','哈哈哈','passkey',1),(4,'hhh','lzhbrian','','','','jkh','iybyk',1);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `realname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `school` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `class` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `studentnumber` int(11) unsigned NOT NULL,
  `authKey` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `accessToken` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `teamname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `group` enum('admin','player') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'lzhbrian','$2y$13$MME8Lg56Z5vxAT3x6TLZz.q3hBBVBJMnYM6gs96qkWI.Lgs38ZF3e','lzhbrian@gmail.com','林子恒','清华大学','无42',2014011054,'7Nmfmwkuj88D_vyIN1jY8-HFQiM47nmz','','hhh',1,'2016-01-27 14:25:49','2016-01-27 15:39:35','player'),(9,'username','$2y$13$DeRxktOcMhejzgzRsVEHTeINMIbVfd7FD1sZ73bEZ4qkDCNMFcrDi','email3','胡昌然','清华大学','无42',2014011111,'KgR0qN7fzjlu9UkCxQgmkDFwQE3qc_gH','',NULL,1,'2016-01-27 14:29:35','2016-01-27 14:29:35','player'),(10,'lllbrian','$2y$13$gsrkJYT4UOAk8jsKjGEGTuNirRteMECNMHLOSXczBNo90X9nKHerC','lzhbrian@email','林','清华','电子系无42',2014,'XF1thgVEyPqnLFDSPv2xN3zS2hhXrSGi','',NULL,1,'2016-01-27 16:18:19','2016-01-27 16:18:19','player'),(11,'dddd','$2y$13$9CYoh0dFJ7mVaTyXHJ3y7elw90U/517XHcwc/DwPv.mOnygSggdmW','d','dd','d','d',0,'VZVF0P60KzZ4PT3CE5PRflDOyLKASQpE','',NULL,1,'2016-01-27 16:19:28','2016-01-27 16:19:28','player'),(12,'test5','$2y$13$WNAaNzgA74uj3Fh3qZCjPuubn28p4i.Kc5FojNQUT.IijdS9ry0dC','j','j','jj','j',0,'wzWQJ4ojE4x38TiqDJqc2gi7paDKWNY9','',NULL,1,'2016-01-27 16:20:57','2016-01-27 16:20:57','player'),(13,'test7','$2y$13$FEkdN9tO/nFArjm66W4kwOuo8UKqjEjKa0aNb4sbK1BzzxhetXQbS','dlzhbrian@gmail.com','林子恒','清华','w43',2014011000,'XxealDI_uqjL-dBL_126Z42UBn-Fk6Yj','',NULL,1,'2016-01-30 13:43:47','2016-01-30 13:43:47','player'),(15,'testtest','$2y$13$3T/goqu.zzItVf0nMG/mTuDtvWf6B11WU2oQn3EV9NRHmPsWOJLPW','email@email.com','k','lsdaf','l',2000,'5iXMBvAdttWC6AegdBlHloUv2XpDUXk0','',NULL,1,'2016-02-01 11:50:46','2016-02-01 11:50:46','player'),(16,'testtesttest','$2y$13$7P/162Are4/dc0wBiV0qtOCHzjJpm1U.6g4KcLxFo42s085ns9BYO','email@email.com1','real','sis','asdf',20123,'ravFilSvkQIhzGkawzdQyJXVt5keJS_k','',NULL,1,'2016-02-01 14:02:43','2016-02-01 14:02:43','player'),(17,'testuser','$2y$13$BFJO9rfWJgcLTNEXTm.2ZOfTAml/vgc6ZvSlV8.rxNfkdBDrNv1h.','email.email@email.com','jldksajlfk','lkfjsadkl','kfjalsk',29321893,'MEpuXlb7zAtiwYKbhd6pgm01ldIj1RUM','',NULL,1,'2016-02-01 14:37:42','2016-02-01 14:37:42','player'),(18,'testabtmefor','$2y$13$.yIv8DtbXRi3nR9u5yLZLukIjOUkaK3PrJ1LaZ1MU4XoqYSMd6FUW','test@email.com','real','sdlkj','flksjda',3029183,'_HpXCeHCww9T0lZcs7EXKGYxbxeOYqFM','',NULL,1,'2016-02-02 03:20:16','2016-02-02 03:20:16','player');
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

-- Dump completed on 2016-02-06 20:56:44
