/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.6.35-log : Database - homyt_new_invs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`homyt_new_invs` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `homyt_new_invs`;

/*Table structure for table `candidates` */

DROP TABLE IF EXISTS `candidates`;

CREATE TABLE `candidates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `job_applied_for` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `work_experience` text NOT NULL,
  `resume` text NOT NULL,
  `current_salary` varchar(200) NOT NULL,
  `expected_salary` varchar(200) NOT NULL,
  `last_company_name` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `candidates` */

insert  into `candidates`(`id`,`job_applied_for`,`name`,`email`,`phone`,`address`,`work_experience`,`resume`,`current_salary`,`expected_salary`,`last_company_name`,`added_on`) values (1,'Android Developer','Rajesh Kumar','ramesh@ramesh.com','23432432423','sdfasdf','34','20171116165509PM-1510831509-1075299045-2073874968.','234','3423','SDFDS','2017-11-16 16:55:09'),(2,'Android Developer','Ramesh Kumar','rajesh1may@gmail.com','3423412341234','Ramesh Address','23','20171116171817PM-1510832897-1210089777-1408310514.png','22','22','asdfads','2017-11-16 17:18:17'),(3,'Android Developer','Ramesh Kumar','rajesh1may@gmail.com','3423412341234','Ramesh Address','23','20171116171842PM-1510832922-1146662213-1181332610.png','22','22','asdfads','2017-11-16 17:18:42'),(4,'Android Developer','Ramesh Kumar','rajesh1may@gmail.com','3423412341234','Ramesh Address','23','20171116172446PM-1510833286-982547445-17628367.png','22','22','asdfads','2017-11-16 17:24:46');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` int(11) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` int(11) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

/*Table structure for table `homyt_contact` */

DROP TABLE IF EXISTS `homyt_contact`;

CREATE TABLE `homyt_contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `homyt_contact` */

insert  into `homyt_contact`(`id`,`name`,`email`,`message`,`created_on`) values (1,'Rajesh','rajesh1may@gmail.com','Test Rajesh Message','2017-11-14 16:40:57'),(2,'Rajesh','rajesh1may@gmail.com','Test Message 2','2017-11-14 16:48:40'),(3,'Test','test@test.com','34234234234234234 324 234 32 423 423 4 32324','2017-11-14 16:51:16'),(4,'Pushpendra','pushpendrarjesh2asdfa@sdfasdf.com','sdsfasdfadsf adsfads fasd fads fsad fsad fads f','2017-11-14 17:27:52'),(5,'','','','2017-11-16 16:47:47'),(6,'','','','2017-11-16 16:48:25'),(7,'','','','2017-11-16 16:48:38'),(8,'','','','2017-11-16 16:49:39'),(9,'','','','2017-11-16 16:50:15'),(10,'','','','2017-11-16 16:50:41'),(11,'','','','2017-11-16 16:51:05'),(12,'','','','2017-11-16 16:51:07'),(13,'','','','2017-11-16 16:51:07'),(14,'','','','2017-11-16 16:51:08'),(15,'','','','2017-11-16 16:51:08'),(16,'','','','2017-11-16 16:51:11'),(17,'','','','2017-11-16 16:51:32'),(18,'','','','2017-11-16 16:52:10'),(19,'','','','2017-11-16 16:55:08'),(20,'','','','2017-11-16 17:17:28');

/*Table structure for table `homyt_newsletter` */

DROP TABLE IF EXISTS `homyt_newsletter`;

CREATE TABLE `homyt_newsletter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `for_which_app` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `homyt_newsletter` */

insert  into `homyt_newsletter`(`id`,`email`,`created_on`,`for_which_app`) values (1,'rajesh1may@gmail.com','2017-11-14 17:23:18',NULL),(2,'rajesh2may@gmail.com','2017-11-14 17:24:00',NULL),(3,'pushpendra@gmail.com','2017-11-14 17:26:51',NULL),(4,'asdsddddsf','2017-11-14 17:40:51',NULL),(5,'asdfsadffsa','2017-11-14 17:41:01',NULL),(6,'asfdsadf','2017-11-14 17:41:08',NULL),(7,'adsfasdfadsfads@adfsadfadsfadsf.com','2017-11-21 14:42:06',NULL),(8,'pushpendra@pushpendra.com','2017-11-21 17:25:52','iOS'),(9,'test@testing.com','2017-11-21 19:24:03','iOS'),(10,'h_hamedah@yahoo.com','2017-11-21 20:24:15','Android'),(11,'ak.0523388760@gmail.com','2017-11-21 21:40:55','Android'),(12,'demm.wss.kh@gmail.com','2017-11-22 00:09:54','Android');

/*Table structure for table `investors` */

DROP TABLE IF EXISTS `investors`;

CREATE TABLE `investors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `thirdname` varchar(50) NOT NULL,
  `fourthname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date NOT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `phone_country` varchar(100) NOT NULL,
  `checkoutbox` varchar(100) NOT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `profileimg` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `investors` */

insert  into `investors`(`id`,`firstname`,`secondname`,`thirdname`,`fourthname`,`username`,`password`,`email`,`company`,`address`,`dob`,`city`,`state`,`country`,`phone_country`,`checkoutbox`,`zipcode`,`status`,`profileimg`,`phone`,`created_on`,`updated_on`,`created_by`,`updated_by`) values (1,'Rajesh','Kumar','Vishwakarma','Test','rajesh1may@gmail.com','rajesh','rajesh1may@gmail.com',NULL,'Test','2017-10-27','Test111','Test 222',NULL,'','','',0,'1509048968_20171027014608_858033777.png','342342324','2017-10-27 01:46:08','2017-10-27 01:46:08',0,0),(2,'Ø±ØºØ¯ ','Ù…ØµØ·ÙÙ‰','ØªÙˆÙÙŠÙ‚','Ø§Ø¨Ùˆ Ø¹Ø¨ÙŠØ¯ ','raghadalnaje@outlook.sa','majd.123456','raghadalnaje@outlook.sa',NULL,'Ø­ÙŠ Ø§Ù„Ø¨Ø³Ø§ØªÙŠÙ† ','1995-11-19','Ø¬Ù†ÙŠÙ†','Ù‡ÙˆÙ†Øº ÙƒÙˆÙ†Øº',NULL,'','','',0,'1509059391_20171027043951_751842933.jpg','569423838','2017-10-27 04:39:51','2017-10-27 04:39:51',0,0),(3,'Ù…Ø­Ù…ÙˆØ¯','Ø¹Ø¯Ù†Ø§Ù†','Ø¹ÙŠØ³Ù‰','Ø­Ù…Ø¯Ø§Ù†','Mahmoud1993adnan@outlook.com','ww654123','Mahmoud1993adnan@outlook.com',NULL,'Ø¹Ø§Ù†ÙŠÙ† /Ø´Ø§Ø±Ø¹ Ø§Ù„Ù…Ø¯Ø±Ø³Ø©','1993-09-07','Ø¬Ù†ÙŠÙ†','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','','','',0,'1509079365_20171027101245_1646889921.jpeg','599373827','2017-10-27 10:12:45','2017-10-27 10:12:45',0,0),(4,'Ù‡ÙŠØ«Ù…','Ù…Ø¹ÙŠÙ†','Ø®Ù„ÙŠÙ„','ÙƒØ¹ÙƒÙˆØ´','h_m-k@hotmail.com','21310889','h_m-k@hotmail.com',NULL,'Ø´Ø§Ø±Ø¹ Ø§Ø­Ù…Ø¯ Ø³Ø¹Ø¯','2017-10-29','ÙƒÙØ±ÙŠØ§Ø³ÙŠÙ','ÙƒÙØ±ÙŠØ§Ø³ÙŠÙ',NULL,'','','',0,'1509081665_20171027105105_1295284489.jpg','543986333','2017-10-27 10:51:05','2017-10-27 10:51:05',0,0),(5,'ÙŠÙˆØ³Ù','Ø®Ø§Ù„Ø¯ ','ÙŠÙˆØ³Ù','Ø´Ø¨Ø§Ù†Ù‡','y_shabaneg@hotmail.com','yousefPPU7412','y_shabaneg@hotmail.com',NULL,'Ù†Ù…Ø±Ø©_Ø´Ø§Ø±Ø¹ Ù†Ù…Ø±Ù‡_Ø¹Ù†Ø¯Ù…Ø³Ø¬Ø¯ Ù†Ù…Ø±Ù‡','2017-08-31','Ø§Ù„Ø®Ù„ÙŠÙ„','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','','','',0,'1509083359_20171027111919_510513947.jpeg','599585348','2017-10-27 11:19:19','2017-10-27 11:19:19',0,0),(6,'Ø¹Ø¯ÙŠ','ÙˆÙ„ÙŠØ¯','\"Ø­Ø³ÙŠÙ† Ø±Ø§Ø´Ø¯\"','Ø£Ø¨Ùˆ Ø§Ù„Ø±Ø¨','odai912@hotmail.com','4010422210599898406','odai912@hotmail.com',NULL,'Ù…Ø³Ù„ÙŠØ©-Ø¬Ù†ÙŠÙ†-ÙÙ„Ø³Ø·ÙŠÙ†','1996-01-23','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©','Ø¬Ù†ÙŠÙ†',NULL,'','','',0,'1509087667_20171027123107_1886148737.JPG','568199912','2017-10-27 12:31:07','2017-10-27 12:31:07',0,0),(7,'Ø¬Ù‡Ø§Ø¯','Ø¹Ù„ÙŠ','Ø°ÙŠØ§Ø¨','Ø±Ø¨Ø§ÙŠØ¹Ù‡','wala_rabaia@yahoo.com','29Ø®14Ø§','wala_rabaia@yahoo.com',NULL,'Ø´Ø§Ø±Ø¹ Ø§Ù„Ø´Ù‡ÙŠØ¯ ÙŠØ§Ø³Ø± Ø¹Ø±ÙØ§Øª','1967-03-17','Ø¬Ù†ÙŠÙ†- Ù…ÙŠØ«Ù„ÙˆÙ†','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','','','',0,'1509098127_20171027152527_373808889.jpg','599356155','2017-10-27 15:25:27','2017-10-27 15:25:27',0,0),(8,'Ø³Ø§Ø¦Ø¯','Ø¹ÙŠØ³','ÙŠ','Ø§ÙŠ','zeedta@js.sks','123456','zeedta@js.sks',NULL,'Ø§Ø§','2017-10-27','Ø±Ø±','ØªØªØª',NULL,'','Yes','',0,'1509098388_20171027152948_830046448.png','597086122','2017-10-27 15:29:48','2017-10-27 15:29:48',0,0),(9,'Ø±Ø§Ø¦Ø¯','Ø³Ù…ÙŠØ±','Ø§Ø³Ø¹Ø¯','Ø¬Ø§Ø¨Ø±','raed11.jaber@hotmail.com','raedtasneem1','raed11.jaber@hotmail.com',NULL,'Ø´Ø§Ø±Ø¹ Ø§Ù„Ø¨ÙŠØ± Ù‚Ø±Ø¨ Ø§Ù„Ù…Ø¬Ù„Ø³','0000-00-00','Ø¶ÙˆØ§Ø­ÙŠ Ø§Ù„Ù‚Ø¯Ø³ -Ø§Ù„Ø¬ÙŠØ¨','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©',NULL,'','','',0,'1509098910_20171027153830_762171251.png','598191761','2017-10-27 15:38:30','2017-10-27 15:38:30',0,0),(10,'ÙŠØ²Ù†','Ù…Ø­Ù…ÙˆØ¯','Ø§Ù…ÙŠÙ†','Ø§Ù„Ø´ÙŠØ® Ø­Ø³ÙŠÙ†','yazan.alshaikhhussein@gmail.com','0598241088Sy','yazan.alshaikhhussein@gmail.com',NULL,'ÙˆØ³Ø· Ø§Ù„Ø¨Ø¯ØŒ ÙƒÙØ±Ø¹Ø¨ÙˆØ´','1989-10-10','Ø·ÙˆÙ„ÙƒØ±Ù…','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','','','',0,'1509105359_20171027172559_610515073.jpg','598241088','2017-10-27 17:25:59','2017-10-27 17:25:59',0,0),(11,'Ø§ÙŠÙ…Ø§Ù†','ÙŠØ§Ø³Ø±','Ø±Ø§Ø³Ù…','Ø´Ø¨ÙŠØ·Ù‡','ammonshb@gmail.com','.445566.a','ammonshb@gmail.com',NULL,'Ù‚Ù„Ù‚ÙŠÙ„ÙŠØ© _ Ø­Ø¨Ù„Ø© _ Ø´Ø§Ø±Ø¹ Ù…Ø¯Ø±Ø³Ø© Ø§Ù„Ø¨Ù†Ø§Øª _ Ø§Ù„Ù…Ù†Ø·Ù‚Ù‡ Ø§Ù„ØºØ±Ø¨ÙŠØ©','1987-12-26','Ù‚Ù„Ù‚ÙŠÙ„ÙŠØ©','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©',NULL,'','','',0,'1509108344_20171027181544_1685820695.JPG','595566588','2017-10-27 18:15:44','2017-10-27 18:15:44',0,0),(12,'Ø¨Ù‡Ø§Ø¡','Ø¹Ø§Ø¯Ù„','Ø¹Ù„ÙŠ','Ø§Ø¨Ùˆ Ø§Ø³Ù†ÙŠÙ†Ø©','b_@hotmail.co.il','h0527348346','b_@hotmail.co.il',NULL,'Ø¨ÙŠØª Ø­Ù†ÙŠÙ†Ø§','1994-03-16','Ø§Ù„Ù‚Ø¯Ø³','Ø§Ù„Ù‚Ø¯Ø³',NULL,'','','',0,'1509119477_20171027212117_1665527686.jpg','052734834','2017-10-27 21:21:17','2017-10-27 21:21:17',0,0),(13,'Ø¹Ø¨ÙŠØ± ','Ø²Ø§Ù‡ÙŠ','Ù…Ø­Ù…Ø¯','Ù†ØµØ±','abeerznasr@gmail.com','lasposo535po#','abeerznasr@gmail.com',NULL,'Ø´Ø§Ø±Ø¹ Ù…Ø¯Ø±Ø³Ø© Ø¨Ù†Ø§Øª ØµÙØ§','1993-07-20','ØµÙØ§ - Ø±Ø§Ù… Ø§Ù„Ù„Ù‡','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©',NULL,'','','',0,'1509130401_20171028002321_1490729735.jpg','592156061','2017-10-28 00:23:21','2017-10-28 00:23:21',0,0),(14,'Ù…Ø­Ù…ÙˆØ¯','Ø¹Ù…Ø±','Ù…Ø­Ù…ÙˆØ¯','Ø¯Ø§Ø± Ø¹Ø±Ù…ÙˆØ´','mahmoud.armoush@hotmail.com','sh3ban1234','mahmoud.armoush@hotmail.com',NULL,'Ø§Ù„Ø¬Ù„Ø²ÙˆÙ†/Ø´Ø§Ø±Ø¹ Ø¹Ù†Ø§Ø¨Ø©','2007-07-27','Ø±Ø§Ù… Ø§Ù„Ù„Ù‡','Ø±Ø§Ù… Ø§Ù„Ù„Ù‡','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','','','',0,'1509133770_20171028011930_196104491.jpg','568560464','2017-10-28 01:19:30','2017-10-28 01:19:30',0,0),(15,'ÙØ§Ø·Ù…Ø©','Ø¹Ø¨Ø¯Ø§Ù„Ù„Ø·ÙŠÙ','Ù…Ø­Ù…Ø¯','Ø§Ø¨Ùˆ ÙŠØ§Ø³ÙŠÙ†','haya.yaseen.27@gmail.com','1234haya','haya.yaseen.27@gmail.com',NULL,'Ø²ÙŠÙ…Ø±-ÙŠÙ…Ø©','0000-00-00','Ø¨Ø¦Ø± Ø§Ù„Ø³ÙƒØ©','Ø¨Ø§Ù‚Ø© Ø§Ù„ØºØ±Ø¨ÙŠØ©-Ù…Ù†Ø·Ù‚Ø©Ø§Ù„Ù…Ø«Ù„Ø«',NULL,'','Yes','',0,'1509141387_20171028032627_2133560498.jpg','523196739','2017-10-28 03:26:27','2017-10-28 03:26:27',0,0),(16,'Ù…Ø±ÙŠÙ…','Ø¹Ø¨Ø¯ ','Ø¯Ø±ÙˆÙŠØ´ ','Ø²ÙŠØ¯Ø§Øª','mzeedat939@gmail.com','05240133','mzeedat939@gmail.com',NULL,'Ø¨Ù†ÙŠ Ù†Ø¹ÙŠÙ…. Ù‚Ø±ÙŠØ¨ Ù…Ù† Ù…Ø³Ø¬Ø¯ Ù„ÙˆØ·','2017-10-28','Ø§Ù„Ø®Ù„ÙŠÙ„','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠÙ‡','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','','','',0,'1509208463_20171028220423_114087509.jpg','059816750','2017-10-28 22:04:24','2017-10-28 22:04:24',0,0),(17,'Ø¹Ø¨Ø¯Ø§Ù„Ø¹Ø²ÙŠØ²','Ù…ØµØ·ÙÙ‰','Ø¹Ø¨Ø¯Ø§Ù„Ø¹Ø²ÙŠØ²','Ø¨Ø§Ù†Ù‡','abdulazizb1415@gmail.com','wehda159','abdulazizb1415@gmail.com',NULL,'Ø§Ù„Ø§Ø³ÙƒØ§Ù† ','1994-07-18','Ù…ÙƒØ© Ø§Ù„Ù…ÙƒØ±Ù…Ø©','Ù…ÙƒØ© Ø§Ù„Ù…ÙƒØ±Ù…Ø©',NULL,'','','',0,'1509223658_20171029021738_568814738.JPG','055554952','2017-10-29 02:17:38','2017-10-29 02:17:38',0,0),(18,'Ø¬Ù…ÙŠÙ„','Ø§Ø­Ù…Ø¯','Ù…Ø­Ù…ÙˆØ¯','Ø§Ù„Ø­Ø§Ø¬ Ø­Ø³Ù†','alum.qalq@gmail.com','.445566.','alum.qalq@gmail.com',NULL,'Ù‚Ù„Ù‚ÙŠÙ„ÙŠØ© - Ø´Ø§Ø±Ø¹ Ø§Ù„Ø­Ø¯ÙŠÙ‚Ø© - Ù‚Ø¨Ø§Ù„ Ø§Ù„Ù‚Ø§Ø¹Ø© Ø§Ù„Ù…Ù„ÙƒÙŠØ©','1964-09-25','Ù‚Ù„Ù‚ÙŠÙ„ÙŠØ©','Ø§Ù„Ø¶ÙØ© Ø§Ù„ØºØ±Ø¨ÙŠØ©',NULL,'','','',0,'1509273491_20171029160811_1480618242.jpg','599300290','2017-10-29 16:08:11','2017-10-29 16:08:11',0,0),(19,'Ø¹Ù„ÙŠ','Ù…Ø­Ù…Ø¯','Ø¹Ù„ÙŠ','Ø§Ù„Ø¯ÙˆØ³Ø±ÙŠ','ali_aldossri@hotmail.com','Zxcv9075410','ali_aldossri@hotmail.com',NULL,' Ø´Ø§Ø±Ø¹ Ø§Ù„Ø§Ù…ÙŠØ± Ø§Ø­Ù…Ø¯','2017-10-29','Ø§Ù„Ø¶Ù‡Ø±Ø§Ù†','Ø§Ù„Ù…Ù†Ø·Ù‚Ø© Ø§Ù„Ø´Ø±Ù‚ÙŠØ©','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','','Yes','',0,'1509277452_20171029171412_36075538.jpg','056941229','2017-10-29 17:14:12','2017-10-29 17:14:12',0,0),(20,'Ø¹Ù„ÙŠ','Ø¹Ø¨Ø¯Ø§Ù„Ø±Ø­Ù…Ù†','Ø§Ø­Ù…Ø¯','Ø­Ø³Ù†','ahm_266@hotmail.com','ahmad266','ahm_266@hotmail.com',NULL,'Ø­ÙŠ Ø§Ù„Ø¬Ø§Ù…Ø¹Ø© Ø´Ø§Ø±Ø¹ Ø§Ù„Ø§Ù†ØµØ§Ø±','1997-01-07','Ø¬Ø¯Ù‡','Ù…ÙƒÙ‡ Ø§Ù„Ù…ÙƒØ±Ù…Ø©',NULL,'','','',0,'1509431873_20171031120753_90296159.jpg','537663649','2017-10-31 12:07:53','2017-10-31 12:07:53',0,0),(21,'Ø¹Ø¨Ø¯Ø§Ù„Ø­ÙƒÙŠÙ…','Ø¹Ø¨Ø¯Ø§Ù„Ø±Ø­ÙŠÙ…','Ø¹Ø¨Ø¯Ø§Ù„ÙƒØ±ÙŠÙ…','Ø±Ø¨ÙŠØ¹','ahakeemrabie@gmail.com','a.2000.r','ahakeemrabie@gmail.com',NULL,'Ø§Ù„Ø¹Ø²ÙŠØ²ÙŠØ© Ø§Ù„Ø¬Ù†ÙˆØ¨ÙŠØ© - Ø·Ø±ÙŠÙ‚ Ø§Ù„Ù‡Ø¯Ø§','2000-04-29','Ù…ÙƒØ©','Ù…ÙƒØ©',NULL,'','Yes','',0,'1510079597_20171108000317_1094961236.jpg','509755520','2017-11-08 00:03:17','2017-11-08 00:03:17',0,0),(22,'Ø£ÙŠÙ…Ù†','Ø¹Ø¨Ø¯Ø§Ù„Ø±Ø­ÙŠÙ…','Ø¹Ø¨Ø¯Ø§Ù„ÙƒØ±ÙŠÙ…','Ø±Ø¨ÙŠØ¹','aymanrabie2001@gmail.com','a.2001.r','aymanrabie2001@gmail.com',NULL,'Ø§Ù„Ø¹Ø²ÙŠØ²ÙŠØ© Ø§Ù„Ø¬Ù†ÙˆØ¨ÙŠØ©-Ø·Ø±ÙŠÙ‚ Ø§Ù„Ù‡Ø¯Ø§','2001-05-11','Ù…ÙƒØ© Ø§Ù„Ù…ÙƒØ±Ù…Ø©','Ù…ÙƒØ© Ø§Ù„Ù…ÙƒØ±Ù…Ø©',NULL,'','Yes','',0,'1510081181_20171108002941_1062001346.jpg','536392653','2017-11-08 00:29:41','2017-11-08 00:29:41',0,0);

/*Table structure for table `investors_archive` */

DROP TABLE IF EXISTS `investors_archive`;

CREATE TABLE `investors_archive` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `thirdname` varchar(50) NOT NULL,
  `fourthname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date NOT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `phone_country` varchar(100) NOT NULL,
  `checkoutbox` varchar(100) NOT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `profileimg` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_archive` */

/*Table structure for table `investors_contracts` */

DROP TABLE IF EXISTS `investors_contracts`;

CREATE TABLE `investors_contracts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) NOT NULL,
  `contract_image` varchar(255) NOT NULL,
  `contract_image_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `investors_contracts` */

insert  into `investors_contracts`(`id`,`investor_id`,`contract_image`,`contract_image_name`,`uploaded_on`) values (1,1,'1509048968_20171027014608_INVS_CONTRACT_857111835.png','Screenshot from 2017-09-25 14-04-10.png','2017-10-27 01:46:08'),(2,2,'1509059391_20171027043951_INVS_CONTRACT_772382192.','','2017-10-27 04:39:51'),(3,3,'1509079365_20171027101245_INVS_CONTRACT_1063762606.jpg','IMG_20170508_110809.jpg','2017-10-27 10:12:45'),(4,4,'1509081665_20171027105105_INVS_CONTRACT_1743712887.jpg','13059554_10156712584025005_1073534988_n.jpg','2017-10-27 10:51:05'),(5,5,'1509083359_20171027111919_INVS_CONTRACT_2021114325.','','2017-10-27 11:19:19'),(6,6,'1509087667_20171027123107_INVS_CONTRACT_1377528828.jpg','13020059_1751847258383979_1972009866_n.jpg','2017-10-27 12:31:07'),(7,7,'1509098127_20171027152527_INVS_CONTRACT_2115205931.jpg','01.jpg','2017-10-27 15:25:27'),(8,8,'1509098388_20171027152948_INVS_CONTRACT_1595366289.','','2017-10-27 15:29:48'),(9,9,'1509098910_20171027153830_INVS_CONTRACT_39798017.jpg','image.jpg','2017-10-27 15:38:30'),(10,10,'1509105359_20171027172559_INVS_CONTRACT_1049630780.JPG','Ø¹Ù‚Ø¯ Ø§Ø³ØªØ«Ù…Ø§Ø±1.JPG','2017-10-27 17:25:59'),(11,11,'1509108344_20171027181544_INVS_CONTRACT_368014006.jpg','215659.jpg','2017-10-27 18:15:44'),(12,12,'1509119477_20171027212117_INVS_CONTRACT_421779119.','','2017-10-27 21:21:17'),(13,13,'1509130401_20171028002321_INVS_CONTRACT_617920053.jpg','13023660_1728253257386225_543599170_n.jpg','2017-10-28 00:23:21'),(14,14,'1509133770_20171028011930_INVS_CONTRACT_1946415606.','','2017-10-28 01:19:30'),(15,15,'1509141387_20171028032627_INVS_CONTRACT_1214687974.','','2017-10-28 03:26:27'),(16,16,'1509208464_20171028220424_INVS_CONTRACT_314353782.jpg','IMG-20171028-WA0012.jpg','2017-10-28 22:04:24'),(17,17,'1509223658_20171029021738_INVS_CONTRACT_275051348.jpg','Scan3.jpg','2017-10-29 02:17:38'),(18,18,'1509273491_20171029160811_INVS_CONTRACT_1913663217.','','2017-10-29 16:08:11'),(19,19,'1509277452_20171029171412_INVS_CONTRACT_57187532.','','2017-10-29 17:14:12'),(20,20,'1509431873_20171031120753_INVS_CONTRACT_1210630434.jpg','scan0023.jpg','2017-10-31 12:07:53'),(21,21,'1510079597_20171108000317_INVS_CONTRACT_1376611710.','','2017-11-08 00:03:17'),(22,22,'1510081181_20171108002941_INVS_CONTRACT_2089728778.','','2017-11-08 00:29:41');

/*Table structure for table `investors_contracts_archive` */

DROP TABLE IF EXISTS `investors_contracts_archive`;

CREATE TABLE `investors_contracts_archive` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) NOT NULL,
  `contract_image` varchar(255) NOT NULL,
  `contract_image_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_contracts_archive` */

/*Table structure for table `investors_ids` */

DROP TABLE IF EXISTS `investors_ids`;

CREATE TABLE `investors_ids` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) NOT NULL,
  `id_type` varchar(200) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `investors_ids` */

insert  into `investors_ids`(`id`,`investor_id`,`id_type`,`id_number`,`status`,`created_on`) values (1,1,'Personal Id','34234234234',1,'2017-10-27 01:46:08'),(2,2,'Personal Id','401575717',1,'2017-10-27 04:39:51'),(3,3,'Personal Id','855086328',1,'2017-10-27 10:12:45'),(4,4,'Personal Id','307891366',1,'2017-10-27 10:51:05'),(5,5,'Personal Id','',1,'2017-10-27 11:19:19'),(6,6,'Personal Id','401042221',1,'2017-10-27 12:31:07'),(7,7,'Personal Id','990600447',1,'2017-10-27 15:25:27'),(8,8,'Personal Id','564958562',1,'2017-10-27 15:29:48'),(9,9,'Personal Id','414850636',1,'2017-10-27 15:38:30'),(10,10,'Personal Id','852578822',1,'2017-10-27 17:25:59'),(11,11,'Personal Id','851690784',1,'2017-10-27 18:15:44'),(12,12,'Personal Id','312447808',1,'2017-10-27 21:21:17'),(13,13,'Personal Id','851277301',1,'2017-10-28 00:23:21'),(14,14,'','850802539',1,'2017-10-28 01:19:30'),(15,15,'Personal Id','313637878',1,'2017-10-28 03:26:27'),(16,16,'Personal Id','961059813',1,'2017-10-28 22:04:24'),(17,17,'Personal Id','1082611664',1,'2017-10-29 02:17:38'),(18,18,'Personal Id','906467998',1,'2017-10-29 16:08:11'),(19,19,'Personal Id','1055795551',1,'2017-10-29 17:14:12'),(20,20,'Passport','06675257',1,'2017-10-31 12:07:53'),(21,21,'Passport','N009314010',1,'2017-11-08 00:03:17'),(22,22,'Passport','N011627035',1,'2017-11-08 00:29:41');

/*Table structure for table `investors_ids_archive` */

DROP TABLE IF EXISTS `investors_ids_archive`;

CREATE TABLE `investors_ids_archive` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) NOT NULL,
  `id_type` varchar(200) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_ids_archive` */

/*Table structure for table `investors_ids_image` */

DROP TABLE IF EXISTS `investors_ids_image`;

CREATE TABLE `investors_ids_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investors_ids_id` bigint(20) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `investors_ids_image` */

insert  into `investors_ids_image`(`id`,`investors_ids_id`,`image_path`,`image_name`,`uploaded_on`) values (1,1,'1509048968_20171027014608_INVS_ID_945946363.S','S','2017-10-27 01:46:08'),(2,2,'1509059391_20171027043951_INVS_ID_1291018322.','','2017-10-27 04:39:51'),(3,3,'1509079365_20171027101245_INVS_ID_420158399.jpg','12212008_493076780853674_355672349_n.jpg','2017-10-27 10:12:45'),(4,4,'1509081665_20171027105105_INVS_ID_894491258.jpg','12483457_10156313008535005_1952308026_n.jpg','2017-10-27 10:51:05'),(5,5,'1509083359_20171027111919_INVS_ID_1437200334.','','2017-10-27 11:19:19'),(6,6,'1509087667_20171027123107_INVS_ID_932577812.jpg','img754.jpg','2017-10-27 12:31:07'),(7,7,'1509098127_20171027152527_INVS_ID_1030322456.jpg','EETKNdU295dCSVLQeaEN9f5B.jpg','2017-10-27 15:25:27'),(8,8,'1509098388_20171027152948_INVS_ID_1011247357.','','2017-10-27 15:29:48'),(9,9,'1509098910_20171027153830_INVS_ID_996484153.jpg','image.jpg','2017-10-27 15:38:30'),(10,10,'1509105359_20171027172559_INVS_ID_1542826646.JPG','Ø§Ù„Ù‡ÙˆÙŠØ© Ø§Ù„Ø´Ø®ØµÙŠØ©.JPG','2017-10-27 17:25:59'),(11,11,'1509108344_20171027181544_INVS_ID_1172316104.jpg','Ù¢Ù Ù¡Ù§Ù¡Ù Ù¢Ù§_Ù¡Ù¥Ù¢Ù¨Ù¡Ù¢.jpg','2017-10-27 18:15:44'),(12,12,'1509119477_20171027212117_INVS_ID_1433663149.jpg','11 001.jpg','2017-10-27 21:21:17'),(13,13,'1509130401_20171028002321_INVS_ID_2074483121.jpg','17965595_1875270349351181_952149365_n.jpg','2017-10-28 00:23:21'),(14,14,'1509133770_20171028011930_INVS_ID_1223020530.','','2017-10-28 01:19:30'),(15,15,'1509141387_20171028032627_INVS_ID_470393896.jpg','22835698_1530968883658596_374969940_n.jpg','2017-10-28 03:26:27'),(16,16,'1509208464_20171028220424_INVS_ID_1820074992.jpg','IMG-20171027-WA0010.jpg','2017-10-28 22:04:24'),(17,17,'1509223658_20171029021738_INVS_ID_1366291032.jpg','ID.jpg','2017-10-29 02:17:38'),(18,18,'1509273491_20171029160811_INVS_ID_1608015551.jpg','23023589_679231675613116_1890278161_n.jpg','2017-10-29 16:08:11'),(19,19,'1509277452_20171029171412_INVS_ID_418685202.jpg','1509277102262535820088.jpg','2017-10-29 17:14:12'),(20,20,'1509431873_20171031120753_INVS_ID_1135274710.jpg','scan0128.jpg','2017-10-31 12:07:53'),(21,21,'1510079597_20171108000317_INVS_ID_752825208.png','3.png','2017-11-08 00:03:17'),(22,22,'1510081181_20171108002941_INVS_ID_911329408.jpg','IMG-20171107-WA0003.jpg','2017-11-08 00:29:41');

/*Table structure for table `investors_ids_image_archive` */

DROP TABLE IF EXISTS `investors_ids_image_archive`;

CREATE TABLE `investors_ids_image_archive` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investors_ids_id` bigint(20) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_ids_image_archive` */

/*Table structure for table `investors_investment` */

DROP TABLE IF EXISTS `investors_investment`;

CREATE TABLE `investors_investment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) unsigned NOT NULL,
  `type_of_investment` varchar(50) DEFAULT NULL,
  `cheque_no` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `cheque_date` date NOT NULL,
  `bank_location` varchar(200) DEFAULT NULL,
  `amount` float(30,2) NOT NULL,
  `invest_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `investors_investment` */

/*Table structure for table `investors_old` */

DROP TABLE IF EXISTS `investors_old`;

CREATE TABLE `investors_old` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT '0',
  `zipcode` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `profileimg` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `investors_old` */

/*Table structure for table `investors_refused_reasons` */

DROP TABLE IF EXISTS `investors_refused_reasons`;

CREATE TABLE `investors_refused_reasons` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) NOT NULL,
  `wrong_group` varchar(200) NOT NULL,
  `exact_wrong` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_refused_reasons` */

/*Table structure for table `investors_shares` */

DROP TABLE IF EXISTS `investors_shares`;

CREATE TABLE `investors_shares` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) NOT NULL,
  `share_number` varchar(100) NOT NULL,
  `share_amount` varchar(100) NOT NULL,
  `share_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `investors_shares` */

insert  into `investors_shares`(`id`,`investor_id`,`share_number`,`share_amount`,`share_date`) values (1,1,'32342','0','2017-10-16'),(2,2,'4','1800 $','2013-10-16'),(3,3,'1','100 Ø¯ÙˆÙ„Ø§Ø±','2014-05-20'),(4,4,'1','1000$','2017-10-02'),(5,5,'Ø­ØµÙ‡ ÙˆØ§Ø­Ø¯Ø©','1000Ø¯ÙˆÙ„Ø§Ø±','1970-01-01'),(6,6,'3','300','2014-06-20'),(7,6,'1','1000','2014-11-05'),(8,7,'2','2000$','2014-09-21'),(9,7,'1','1000$','2014-09-25'),(10,7,'2','2000$','2014-10-09'),(11,7,'5','5000$','2014-10-23'),(12,7,'2','6000$','2014-12-11'),(13,7,'3','0$ (Ø§Ø³ØªØ«Ù…Ø§Ø± Ù…Ø¤ØªÙ…Ø±)','2014-12-31'),(14,7,'2','2000$','2015-03-29'),(15,8,'2','11','2017-10-23'),(16,9,'Ø¹Ù‚Ø¯ Ø´Ø±Ø§ÙƒÙ‡ 10% Ù…Ù† Ù‚ÙŠÙ…Ù‡ Ø§Ø±Ø¨Ø§Ø­ Ø§Ù„Ø´Ø±ÙƒØ©','100000$','2016-10-12'),(17,10,'6','6000 Ø¯ÙˆÙ„Ø§Ø±','2014-12-25'),(18,10,'20','2000 Ø¯ÙˆÙ„Ø§Ø±','1970-01-01'),(19,11,'1','1000 $','1970-01-01'),(20,12,'1','725 Ø¯ÙˆÙ„Ø§Ø±','2014-08-18'),(21,12,'1','700 Ø¯ÙˆÙ„Ø§Ø±','2014-09-14'),(22,13,'1','1000 Ø¯ÙˆÙ„Ø§Ø± Ø£Ù…Ø±ÙŠÙƒÙŠ','2015-09-01'),(23,14,'1','1000','1970-01-01'),(24,15,'3','3000 Ø¯ÙˆÙ„Ø§Ø±','2017-04-23'),(25,16,'Ø£Ø«Ù†Ø§Ù† Ø­ØµÙ‡','Ø£Ù„ÙØ§Ù† Ø¯ÙˆÙ„Ø§Ø± Ø§Ù…Ø±ÙŠÙƒÙŠ_2000$','2014-05-20'),(26,16,'Ø«Ù„Ø§Ø«ÙˆÙ† Ø­ØµÙ‡','Ø«Ù„Ø§Ø«Ø© Ø¢Ù„Ø§Ù Ø¯ÙˆÙ„Ø§Ø± Ø§Ù…Ø±ÙŠÙƒÙŠ_3000$','1970-01-01'),(27,17,'6','6000','2014-09-16'),(28,18,'1','1000 $','2014-12-25'),(29,19,'11,000 usd','11,000 usd','2017-03-01'),(30,20,'18','10500 Ø¯ÙˆÙ„Ø§Ø±','2017-10-26'),(31,21,'1','500Ø¯ÙˆÙ„Ø§Ø±','2017-02-24'),(32,21,'1','800Ø¯ÙˆÙ„Ø§Ø±','2017-02-03'),(33,22,'1','500Ø¯ÙˆÙ„Ø§Ø±','2017-02-24'),(34,22,'1','800Ø¯ÙˆÙ„Ø§Ø±','2017-03-02');

/*Table structure for table `investors_shares_archive` */

DROP TABLE IF EXISTS `investors_shares_archive`;

CREATE TABLE `investors_shares_archive` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investor_id` bigint(20) NOT NULL,
  `share_number` varchar(100) NOT NULL,
  `share_amount` varchar(100) NOT NULL,
  `share_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_shares_archive` */

/*Table structure for table `investors_shares_image` */

DROP TABLE IF EXISTS `investors_shares_image`;

CREATE TABLE `investors_shares_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investors_shares_id` bigint(20) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_shares_image` */

/*Table structure for table `investors_shares_image_archive` */

DROP TABLE IF EXISTS `investors_shares_image_archive`;

CREATE TABLE `investors_shares_image_archive` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `investors_shares_id` bigint(20) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `investors_shares_image_archive` */

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8,
  `short_title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `description` longtext CHARACTER SET utf8,
  `image` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `video` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `source` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `date` date NOT NULL,
  `tags` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `url` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `news` */

/*Table structure for table `news_images` */

DROP TABLE IF EXISTS `news_images`;

CREATE TABLE `news_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `news_id` bigint(20) NOT NULL,
  `image_path` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `news_images` */

/*Table structure for table `offers` */

DROP TABLE IF EXISTS `offers`;

CREATE TABLE `offers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `offers` */

/*Table structure for table `shares` */

DROP TABLE IF EXISTS `shares`;

CREATE TABLE `shares` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shares` */

/*Table structure for table `specialoffer` */

DROP TABLE IF EXISTS `specialoffer`;

CREATE TABLE `specialoffer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `specialoffer` */

/*Table structure for table `specialoffer_images` */

DROP TABLE IF EXISTS `specialoffer_images`;

CREATE TABLE `specialoffer_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `special_offer_id` bigint(20) NOT NULL,
  `image_path` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `specialoffer_images` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 Active || 0 Inactive',
  `gender` varchar(100) CHARACTER SET utf8 NOT NULL,
  `profileimg` varchar(100) CHARACTER SET utf8 NOT NULL,
  `company` varchar(200) CHARACTER SET utf8 NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`username`,`password`,`phone`,`status`,`gender`,`profileimg`,`company`,`created_on`,`updated_on`,`created_by`) values (1,'Rajesh Vishwakarma','rajesh1may@gmail.com','rajesh1may@gmail.com','e10adc3949ba59abbe56e057f20f883e','234234324234',1,'','/profileimg.png','Ø³Ù„Ø·Ù†Ø© Ø¹ÙÙ…Ø§Ù†','2017-10-12 06:30:32','0000-00-00 00:00:00',0),(2,'Zeedats','zeedats95@gmail.com','zeedats','7c888f1631365c740ab3c38e98cfa37f','234234324234',1,'','/uploads/profile/1509098388_20171027152948_830046448.png','','2017-11-09 11:19:32','0000-00-00 00:00:00',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
