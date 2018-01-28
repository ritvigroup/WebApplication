/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.6.35-log : Database - homyt_voice
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`homyt_voice` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `homyt_voice`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_temp_password` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_email_id` varchar(100) COLLATE utf8_bin NOT NULL,
  `admin_phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `admin_state` int(11) NOT NULL,
  `admin_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_zipcode` varchar(10) COLLATE utf8_bin NOT NULL,
  `admin_country` int(11) NOT NULL,
  `verification_code` varchar(100) COLLATE utf8_bin NOT NULL,
  `is_locked` int(11) NOT NULL DEFAULT '0',
  `admin_type_id` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `admin_created_on` datetime NOT NULL,
  `admin_updated_on` datetime NOT NULL,
  `admin_created_by` int(11) NOT NULL,
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `admin_username` (`admin_username`,`admin_email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This table used to store admin record';

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`admin_username`,`admin_password`,`admin_temp_password`,`admin_name`,`admin_email_id`,`admin_phone`,`admin_state`,`admin_city`,`admin_zipcode`,`admin_country`,`verification_code`,`is_locked`,`admin_type_id`,`admin_status`,`admin_created_on`,`admin_updated_on`,`admin_created_by`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','','Super Admin','rajesh1may@gmail.com','',0,'','',0,'',0,0,1,'2017-05-13 23:43:39','0000-00-00 00:00:00',0);
insert  into `admin`(`a_id`,`admin_username`,`admin_password`,`admin_temp_password`,`admin_name`,`admin_email_id`,`admin_phone`,`admin_state`,`admin_city`,`admin_zipcode`,`admin_country`,`verification_code`,`is_locked`,`admin_type_id`,`admin_status`,`admin_created_on`,`admin_updated_on`,`admin_created_by`) values (4,'rajesh','e360bc13bcba071f4746adbb334cd78e','','Rajesh','','',0,'','',0,'',0,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',0);

/*Table structure for table `answers` */

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL,
  `q_id` int(11) NOT NULL,
  `a_en` text NOT NULL,
  `a_ar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `answers` */

insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (1,'1','2017-05-14 07:23:25',2,'I did not understand your question can you please explain it?','I did not understand your question can you please explain it?');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (2,'1','2017-05-14 16:55:47',2,'I cannot understand what you want to help from me','I cannot understand what you want to help from me');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (3,'1','2017-05-14 17:14:13',1,'Please Wait we are going to restart your system','Please Wait we are going to restart your system in arabic');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (4,'1','2017-05-15 13:46:48',7,'I didn\'t work anywhere. I am Homyt Assisant and ready to help you. How can I help you.','I didn\'t work anywhere. I am Homyt Assisant and ready to help you. How can I help you.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (5,'1','2017-05-15 13:47:06',5,'I have no place to live. I am Homyt Assistant.','I have no place to live. I am Homyt Assistant.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (6,'1','2017-05-15 13:47:21',3,'Your name is Zeedat','Your name is Zeedat');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (7,'1','2017-05-15 13:48:54',6,'Your favorite food is Burger','Your favorite food is Burger');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (8,'1','2017-05-15 13:49:16',4,'I am not a species. I am under process of development. I cannot tell you my age.','I am not a species. I am under process of development. I cannot tell you my age.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (9,'1','2017-05-15 13:49:47',8,'I have no feeling of sorrow and happiness. I am an assistant so I can assist you.','I have no feeling of sorrow and happiness. I am an assistant so I can assist you.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (11,'1','2017-05-16 16:18:04',2,'Sorry! For what. I am hear to help you. ','Sorry! For what. I am hear to help you. ');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (12,'1','2017-05-16 16:19:46',9,'The time is @@TIME@@','The time is @@TIME@@');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (13,'1','2017-05-16 17:26:26',10,'I am fine thank you. How can I help you','I am fine thank you. How can I help you');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (14,'1','2017-05-16 17:28:33',11,'I am nowhere. How can I help you.','I am nowhere. How can I help you.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (15,'1','2017-05-16 17:30:00',12,'I am here to help you. How can I help you','I am here to help you. How can I help you');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (16,'1','2017-05-17 12:46:36',13,'Today\'s date is ##DATE##','Today\'s date is ##DATE##');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (17,'1','2017-05-18 10:37:00',14,'You can call me as your Homyt Assistant. How can I help you.','You can call me as your Homyt Assistant. How can I help you.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (18,'1','2017-05-18 10:54:47',14,'I\'m Homyt Assistant and ready to help you. How can I help you.','I\'m Homyt Assistant and ready to help you. How can I help you.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (19,'1','2017-05-18 13:43:16',15,'Nothing','Nothing');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (20,'1','2017-05-18 13:43:34',15,'I said sorry that I cannot get you','I said sorry that I cannot get you');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (21,'1','2017-05-19 10:45:45',16,'Hello. How can I help you','Hello. How can I help you');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (22,'1','2017-05-19 10:48:15',17,'No I am alright. I have nothing to do more. I am here to help you. Tell me how can I help you.','No I am alright. I have nothing to do more. I am here to help you. Tell me how can I help you.');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (23,'1','2017-05-19 10:57:14',18,'Its okay. I am assistance. How can I help you','Its okay. I am assistance. How can I help you');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (24,'1','2017-05-19 12:21:08',19,'**AUDIO**zee**AUDIO**Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','**AUDIO**zee**AUDIO**Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ');
insert  into `answers`(`id`,`status`,`added_on`,`q_id`,`a_en`,`a_ar`) values (25,'1','2017-05-19 12:36:59',19,'**AUDIO**hamza**AUDIO**Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','**AUDIO**hamza**AUDIO**Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ');

/*Table structure for table `guest_chat` */

DROP TABLE IF EXISTS `guest_chat`;

CREATE TABLE `guest_chat` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `guest_session` varchar(200) NOT NULL,
  `guest_question` text CHARACTER SET utf8 NOT NULL,
  `homyt_answer` text CHARACTER SET utf8 NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=latin1;

/*Data for the table `guest_chat` */

insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (1,'gc3a4e70lqg1pqh75lg6lr0mk1',' What is my name','Your name is Zeedat','2017-05-17 17:02:23');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (2,'gc3a4e70lqg1pqh75lg6lr0mk1',' How old I am','You are 28 years old','2017-05-17 17:02:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (3,'gc3a4e70lqg1pqh75lg6lr0mk1',' Where do I live','You live in Noida','2017-05-17 17:02:40');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (4,'gc3a4e70lqg1pqh75lg6lr0mk1',' Where do I work','You work at Homyt','2017-05-17 17:02:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (5,'gc3a4e70lqg1pqh75lg6lr0mk1',' What is my favourite food','Your favorite food is Burger','2017-05-17 17:02:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (6,'gc3a4e70lqg1pqh75lg6lr0mk1',' Are you serious','I am always serious and ready to help you','2017-05-17 17:02:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (7,'gc3a4e70lqg1pqh75lg6lr0mk1',' What is my name','Your name is Zeedat','2017-05-17 17:03:37');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (8,'gc3a4e70lqg1pqh75lg6lr0mk1',' System start','Please Wait we are going to restart your system','2017-05-17 17:06:13');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (9,'gc3a4e70lqg1pqh75lg6lr0mk1',' Hot','We had not found anything suitable for your question','2017-05-17 17:06:25');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (10,'gc3a4e70lqg1pqh75lg6lr0mk1',' Are you serious','I am always serious and ready to help you','2017-05-17 17:06:32');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (11,'gc3a4e70lqg1pqh75lg6lr0mk1',' What is my age','You are 28 years old','2017-05-17 17:06:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (12,'gc3a4e70lqg1pqh75lg6lr0mk1',' What is my name','Your name is Zeedat','2017-05-17 17:06:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (13,'gc3a4e70lqg1pqh75lg6lr0mk1',' Tell me something about yourself','Your name is Zeedat','2017-05-17 17:06:51');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (14,'gc3a4e70lqg1pqh75lg6lr0mk1',' Great','We had not found anything suitable for your question','2017-05-17 17:07:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (15,'gc3a4e70lqg1pqh75lg6lr0mk1',' Sorry','We had not found anything suitable for your question','2017-05-17 17:08:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (16,'gc3a4e70lqg1pqh75lg6lr0mk1',' Sorry','We had not found anything suitable for your question','2017-05-17 17:08:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (17,'gc3a4e70lqg1pqh75lg6lr0mk1',' Thank you','You work at Homyt','2017-05-17 17:08:22');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (18,'gc3a4e70lqg1pqh75lg6lr0mk1',' Time please','The time is 05:08 PM','2017-05-17 17:08:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (19,'gc3a4e70lqg1pqh75lg6lr0mk1',' Date please','Today\'s date is 17th May 2017','2017-05-17 17:09:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (20,'gc3a4e70lqg1pqh75lg6lr0mk1',' Ù…Ø±Ø­Ø¨Ø§','We had not found anything suitable for your question','2017-05-17 17:09:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (21,'gc3a4e70lqg1pqh75lg6lr0mk1',' Ø¹Ø±ÙŠØ³','We had not found anything suitable for your question','2017-05-17 17:09:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (22,'gc3a4e70lqg1pqh75lg6lr0mk1',' Ù…Ø±Ø­Ø¨Ø§','We had not found anything suitable for your question','2017-05-17 17:10:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (23,'gc3a4e70lqg1pqh75lg6lr0mk1',' à¤µà¥à¤¹à¤¾à¤Ÿ à¤‡à¤œ à¤¯à¥‹à¤° à¤¨à¥‡à¤®','We had not found anything suitable for your question','2017-05-17 17:13:28');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (24,'gc3a4e70lqg1pqh75lg6lr0mk1',' à¤—à¥à¤¡','We had not found anything suitable for your question','2017-05-17 17:13:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (25,'gc3a4e70lqg1pqh75lg6lr0mk1',' à¤®à¥‡à¤°à¤¾ à¤¨à¤¾à¤® à¤°à¤¾à¤œà¥‡à¤¶ à¤•à¥à¤®à¤¾à¤° à¤µà¤¿à¤¶à¥à¤µà¤•à¤°à¥à¤®à¤¾ à¤¹à¥ˆ','We had not found anything suitable for your question','2017-05-17 17:13:42');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (26,'gc3a4e70lqg1pqh75lg6lr0mk1',' à¤•à¥à¤²à¥‹à¤œ à¤®à¤¾à¤‡à¤•à¥à¤°à¥‹à¤«à¥‹à¤¨','We had not found anything suitable for your question','2017-05-17 17:13:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (27,'aep98i5jf813dlokivb99ojir6',' What is my name','Your name is Zeedat','2017-05-17 17:22:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (28,'aep98i5jf813dlokivb99ojir6',' Hello','We had not found anything suitable for your question','2017-05-17 17:47:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (29,'bg307e7chnsdlh186rj490bfi6',' Good afternoon how can I help','You work at Homyt','2017-05-17 17:59:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (30,'bg307e7chnsdlh186rj490bfi6',' Good afternoon how can I help you','You work at Homyt','2017-05-17 17:59:33');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (31,'bg307e7chnsdlh186rj490bfi6',' Ok','We had not found anything suitable for your question','2017-05-17 17:59:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (32,'bg307e7chnsdlh186rj490bfi6',' What is my age','You are 28 years old','2017-05-17 17:59:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (33,'bg307e7chnsdlh186rj490bfi6',' Ready to receive your command','You work at Homyt','2017-05-17 18:01:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (34,'bg307e7chnsdlh186rj490bfi6',' You work at home at','You work at Homyt','2017-05-17 18:01:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (35,'bg307e7chnsdlh186rj490bfi6',' You work the damn it','You work at Homyt','2017-05-17 18:02:01');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (36,'bg307e7chnsdlh186rj490bfi6',' Oh my','Your name is Zeedat','2017-05-17 18:02:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (37,'bg307e7chnsdlh186rj490bfi6',' Mumbai','We had not found anything suitable for your question','2017-05-17 18:02:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (38,'bg307e7chnsdlh186rj490bfi6',' Homemade','We had not found anything suitable for your question','2017-05-17 18:02:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (39,'bg307e7chnsdlh186rj490bfi6',' Homemade','We had not found anything suitable for your question','2017-05-17 18:02:22');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (40,'bg307e7chnsdlh186rj490bfi6',' Home it','You work at Homyt','2017-05-17 18:02:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (41,'bg307e7chnsdlh186rj490bfi6',' Ok','We had not found anything suitable for your question','2017-05-17 18:04:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (42,'bg307e7chnsdlh186rj490bfi6',' Clear chat','We had not found anything suitable for your question','2017-05-17 18:04:51');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (43,'joc3brg5ppo4dphf1od3mqgj41',' About','We had not found anything suitable for your question','2017-05-17 18:08:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (44,'joc3brg5ppo4dphf1od3mqgj41',' Click about','We had not found anything suitable for your question','2017-05-17 18:08:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (45,'joc3brg5ppo4dphf1od3mqgj41',' Clip about','We had not found anything suitable for your question','2017-05-17 18:09:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (46,'joc3brg5ppo4dphf1od3mqgj41',' Click about','We had not found anything suitable for your question','2017-05-17 18:09:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (47,'joc3brg5ppo4dphf1od3mqgj41',' Clip about','We had not found anything suitable for your question','2017-05-17 18:10:51');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (48,'joc3brg5ppo4dphf1od3mqgj41',' Click about','We had not found anything suitable for your question','2017-05-17 18:11:04');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (49,'joc3brg5ppo4dphf1od3mqgj41',' Click about','We had not found anything suitable for your question','2017-05-17 18:11:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (50,'joc3brg5ppo4dphf1od3mqgj41',' Click about','We had not found anything suitable for your question','2017-05-17 18:11:40');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (51,'joc3brg5ppo4dphf1od3mqgj41',' Click me','Your name is Zeedat','2017-05-17 18:15:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (52,'joc3brg5ppo4dphf1od3mqgj41',' Click about','We had not found anything suitable for your question','2017-05-17 18:15:43');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (53,'joc3brg5ppo4dphf1od3mqgj41',' Click about','We had not found anything suitable for your question','2017-05-17 18:16:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (54,'joc3brg5ppo4dphf1od3mqgj41',' Players chat','We had not found anything suitable for your question','2017-05-17 18:16:51');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (55,'tnv7vej01s5v2ksl096mslir95',' Click about','We had not found anything suitable for your question','2017-05-17 18:17:02');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (56,'784tk5s8luktai76q5ehq2n710',' Click about','We had not found anything suitable for your question','2017-05-17 18:23:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (57,'a3l0cpmh20v58ljgrluhh7p525',' Contact','We had not found anything suitable for your question','2017-05-17 18:24:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (58,'a3l0cpmh20v58ljgrluhh7p525',' Click ho','You are 28 years old','2017-05-17 18:24:55');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (59,'a3l0cpmh20v58ljgrluhh7p525',' About','We had not found anything suitable for your question','2017-05-17 18:27:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (60,'qhfnsnjqjdivhlu0ittv8inq04',' Hello','We had not found anything suitable for your question','2017-05-17 18:29:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (61,'qhfnsnjqjdivhlu0ittv8inq04',' Hello','We had not found anything suitable for your question','2017-05-17 18:29:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (62,'ti0tn2ov8fmi32o7ae02o6sko5',' Hello','We had not found anything suitable for your question','2017-05-17 18:30:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (63,'ti0tn2ov8fmi32o7ae02o6sko5',' Hello','We had not found anything suitable for your question','2017-05-17 18:31:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (64,'f2gsbg9edt4tgqf8ba3vdgn9j4',' Hello','We had not found anything suitable for your question','2017-05-17 18:31:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (65,'f2gsbg9edt4tgqf8ba3vdgn9j4',' Hello','We had not found anything suitable for your question','2017-05-17 18:32:19');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (66,'f2gsbg9edt4tgqf8ba3vdgn9j4',' Hello','We had not found anything suitable for your question','2017-05-17 18:33:04');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (67,'f2gsbg9edt4tgqf8ba3vdgn9j4',' What is my name and what is my address','Your name is Zeedat and You work at Homyt','2017-05-17 18:33:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (68,'f2gsbg9edt4tgqf8ba3vdgn9j4',' What is my age and what is my favourite food','You are 28 years old and Your favorite food is Burger','2017-05-17 18:33:21');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (69,'f2gsbg9edt4tgqf8ba3vdgn9j4',' Kindly send it please','You work at Homyt','2017-05-17 18:33:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (70,'f2gsbg9edt4tgqf8ba3vdgn9j4',' Time please and wait please','The time is 06:33 PM and The time is 06:33 PM','2017-05-17 18:33:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (71,'f2gsbg9edt4tgqf8ba3vdgn9j4',' What is my favourite colour','You work at Homyt','2017-05-17 18:33:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (72,'f2gsbg9edt4tgqf8ba3vdgn9j4',' What is my favourite colour','We had not found anything suitable for your question','2017-05-17 18:35:31');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (73,'f2gsbg9edt4tgqf8ba3vdgn9j4',' What is my age and where do I live','You are 28 years old and You live in Noida','2017-05-17 18:35:39');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (74,'f2gsbg9edt4tgqf8ba3vdgn9j4',' Microphone','We had not found anything suitable for your question','2017-05-17 18:35:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (75,'8dbnk8l4t8dslpfqj6d0pcg905',' What is your name','You can call me as your Homyt Assistant. How can I help you.','2017-05-18 10:57:25');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (76,'8dbnk8l4t8dslpfqj6d0pcg905',' What is your name','I\'m Homyt Assistant and ready to help you. How can I help you.','2017-05-18 10:57:33');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (77,'8dbnk8l4t8dslpfqj6d0pcg905',' How can you call you','We had not found anything suitable for your question','2017-05-18 10:58:04');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (78,'8dbnk8l4t8dslpfqj6d0pcg905',' How can I call you','You can call me as your Homyt Assistant. How can I help you.','2017-05-18 10:58:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (79,'8dbnk8l4t8dslpfqj6d0pcg905',' What is your name','I\'m Homyt Assistant and ready to help you. How can I help you.','2017-05-18 10:58:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (80,'8dbnk8l4t8dslpfqj6d0pcg905',' What\'s your name','We had not found anything suitable for your question','2017-05-18 10:58:57');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (81,'8dbnk8l4t8dslpfqj6d0pcg905',' What\'s name is your','We had not found anything suitable for your question','2017-05-18 10:59:19');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (82,'8dbnk8l4t8dslpfqj6d0pcg905',' What\'s name is your','We had not found anything suitable for your question','2017-05-18 11:10:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (83,'8dbnk8l4t8dslpfqj6d0pcg905',' What is your name','You can call me as your Homyt Assistant. How can I help you.','2017-05-18 11:10:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (84,'8dbnk8l4t8dslpfqj6d0pcg905',' What\'s name is your','We had not found anything suitable for your question','2017-05-18 11:10:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (85,'8dbnk8l4t8dslpfqj6d0pcg905',' What\'s name is your','We had not found anything suitable for your question','2017-05-18 11:11:08');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (86,'8dbnk8l4t8dslpfqj6d0pcg905',' What\'s name is your','We had not found anything suitable for your question','2017-05-18 11:12:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (87,'8dbnk8l4t8dslpfqj6d0pcg905',' What\'s name is your','I\'m Homyt Assistant and ready to help you. How can I help you.','2017-05-18 11:13:28');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (88,'b7628fddf9khmtmio67g0bkmg4',' What do you mean','Sorry !','2017-05-18 13:27:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (89,'b7628fddf9khmtmio67g0bkmg4',' Tell me the time','The time is 01:27 PM','2017-05-18 13:27:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (90,'b7628fddf9khmtmio67g0bkmg4',' Thank you','We had not found anything suitable for your question','2017-05-18 13:28:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (91,'b7628fddf9khmtmio67g0bkmg4',' Time kids','We had not found anything suitable for your question','2017-05-18 13:28:13');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (92,'b7628fddf9khmtmio67g0bkmg4',' What\'s your name','You can call me as your Homyt Assistant. How can I help you.','2017-05-18 13:28:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (93,'b7628fddf9khmtmio67g0bkmg4',' What\'s your name','You can call me as your Homyt Assistant. How can I help you.','2017-05-18 13:28:28');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (94,'b7628fddf9khmtmio67g0bkmg4',' Open country','We had not found anything suitable for your question','2017-05-18 13:28:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (95,'b7628fddf9khmtmio67g0bkmg4',' How can I call you','You can call me as your Homyt Assistant. How can I help you.','2017-05-18 13:28:41');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (96,'b7628fddf9khmtmio67g0bkmg4',' How old are you','We had not found anything suitable for your question','2017-05-18 13:28:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (97,'b7628fddf9khmtmio67g0bkmg4',' What is the age','We had not found anything suitable for your question','2017-05-18 13:28:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (98,'b7628fddf9khmtmio67g0bkmg4',' What is your age','You are 28 years old','2017-05-18 13:29:01');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (99,'b7628fddf9khmtmio67g0bkmg4',' Hot scene','We had not found anything suitable for your question','2017-05-18 13:29:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (100,'b7628fddf9khmtmio67g0bkmg4',' Rich h****','We had not found anything suitable for your question','2017-05-18 13:29:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (101,'b7628fddf9khmtmio67g0bkmg4',' F*** you','We had not found anything suitable for your question','2017-05-18 13:29:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (102,'b7628fddf9khmtmio67g0bkmg4',' Time please','The time is 01:41 PM','2017-05-18 13:41:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (103,'b7628fddf9khmtmio67g0bkmg4',' What is the correct time','We had not found anything suitable for your question','2017-05-18 13:41:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (104,'b7628fddf9khmtmio67g0bkmg4',' What time is it','The time is 01:41 PM','2017-05-18 13:41:11');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (105,'b7628fddf9khmtmio67g0bkmg4',' Tell me the time','The time is 01:41 PM','2017-05-18 13:41:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (106,'b7628fddf9khmtmio67g0bkmg4',' Tell me the correct time','We had not found anything suitable for your question','2017-05-18 13:41:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (107,'b7628fddf9khmtmio67g0bkmg4',' What is the current time','The time is 01:41 PM','2017-05-18 13:41:42');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (108,'b7628fddf9khmtmio67g0bkmg4',' What','I cannot understand what you want to help from me','2017-05-18 13:42:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (109,'b7628fddf9khmtmio67g0bkmg4',' Sorry','Sorry !','2017-05-18 13:42:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (110,'b7628fddf9khmtmio67g0bkmg4',' For what','We had not found anything suitable for your question','2017-05-18 13:42:11');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (111,'b7628fddf9khmtmio67g0bkmg4',' You said sorry for what','We had not found anything suitable for your question','2017-05-18 13:42:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (112,'b7628fddf9khmtmio67g0bkmg4',' You said sorry for phone','We had not found anything suitable for your question','2017-05-18 13:43:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (113,'b7628fddf9khmtmio67g0bkmg4',' You said sorry for what','Nothing','2017-05-18 13:43:59');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (114,'b7628fddf9khmtmio67g0bkmg4',' You said sorry for what','Nothing','2017-05-18 13:44:04');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (115,'b7628fddf9khmtmio67g0bkmg4',' You said sorry for what','I said sorry that I cannot get you','2017-05-18 13:44:08');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (116,'b7628fddf9khmtmio67g0bkmg4',' Why you can\'t beat me','We had not found anything suitable for your question','2017-05-18 13:44:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (117,'b7628fddf9khmtmio67g0bkmg4',' Why you can get me','We had not found anything suitable for your question','2017-05-18 13:44:21');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (118,'b7628fddf9khmtmio67g0bkmg4',' Sorry','Sorry !','2017-05-18 13:44:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (119,'b7628fddf9khmtmio67g0bkmg4',' Why sorry','We had not found anything suitable for your question','2017-05-18 13:44:31');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (120,'b7628fddf9khmtmio67g0bkmg4',' Sorry','Sorry !','2017-05-18 13:51:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (121,'5j91nuvv2rn4h38uds3uh6vp81',' Sorry','I cannot understand what you want to help from me','2017-05-18 14:11:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (122,'5j91nuvv2rn4h38uds3uh6vp81',' Sorry','I cannot understand what you want to help from me','2017-05-18 14:11:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (123,'5j91nuvv2rn4h38uds3uh6vp81',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 14:11:25');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (124,'5j91nuvv2rn4h38uds3uh6vp81',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 14:11:32');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (125,'5j91nuvv2rn4h38uds3uh6vp81',' Hello','We had not found anything suitable for your question','2017-05-18 14:11:39');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (126,'5j91nuvv2rn4h38uds3uh6vp81',' Click video','We had not found anything suitable for your question','2017-05-18 15:19:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (127,'5j91nuvv2rn4h38uds3uh6vp81',' Clip video','We had not found anything suitable for your question','2017-05-18 15:19:43');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (128,'5j91nuvv2rn4h38uds3uh6vp81',' Flip contact','We had not found anything suitable for your question','2017-05-18 15:19:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (129,'5j91nuvv2rn4h38uds3uh6vp81',' Click contact','We had not found anything suitable for your question','2017-05-18 15:19:55');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (130,'k4jclmskjra42339c080ee0d04',' Hello','We had not found anything suitable for your question','2017-05-18 15:23:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (131,'k4jclmskjra42339c080ee0d04',' Hello','We had not found anything suitable for your question','2017-05-18 15:24:57');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (132,'k4jclmskjra42339c080ee0d04',' Hello','We had not found anything suitable for your question','2017-05-18 15:26:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (133,'k4jclmskjra42339c080ee0d04',' What','I did not understand your question can you please explain it?','2017-05-18 15:26:33');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (134,'tfbnb83d0aga00i84df5flp9t2',' Hello','We had not found anything suitable for your question','2017-05-18 15:27:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (135,'tfbnb83d0aga00i84df5flp9t2',' What','Sorry! For what. I am hear to help you. ','2017-05-18 15:27:19');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (136,'tfbnb83d0aga00i84df5flp9t2',' What','I did not understand your question can you please explain it?','2017-05-18 15:27:32');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (137,'tfbnb83d0aga00i84df5flp9t2',' What','I did not understand your question can you please explain it?','2017-05-18 15:27:39');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (138,'tfbnb83d0aga00i84df5flp9t2',' What','I did not understand your question can you please explain it?','2017-05-18 15:27:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (139,'tfbnb83d0aga00i84df5flp9t2',' What','I did not understand your question can you please explain it?','2017-05-18 15:27:51');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (140,'tfbnb83d0aga00i84df5flp9t2',' What','I did not understand your question can you please explain it?','2017-05-18 15:28:16');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (141,'tfbnb83d0aga00i84df5flp9t2',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 15:28:23');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (142,'tfbnb83d0aga00i84df5flp9t2',' Sharif','We had not found anything suitable for your question','2017-05-18 15:28:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (143,'tfbnb83d0aga00i84df5flp9t2',' Sorry','I cannot understand what you want to help from me','2017-05-18 15:28:41');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (144,'bc3duqvcn29lu3bqmqapbetr54',' Sorry','I cannot understand what you want to help from me','2017-05-18 16:43:08');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (145,'bc3duqvcn29lu3bqmqapbetr54',' Sorry','I cannot understand what you want to help from me','2017-05-18 16:43:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (146,'bc3duqvcn29lu3bqmqapbetr54',' Saree','We had not found anything suitable for your question','2017-05-18 16:43:22');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (147,'bc3duqvcn29lu3bqmqapbetr54',' Sorry','I cannot understand what you want to help from me','2017-05-18 16:43:28');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (148,'bc3duqvcn29lu3bqmqapbetr54',' Sorry','I cannot understand what you want to help from me','2017-05-18 16:43:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (149,'bc3duqvcn29lu3bqmqapbetr54',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 16:43:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (150,'bc3duqvcn29lu3bqmqapbetr54',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 16:43:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (151,'bc3duqvcn29lu3bqmqapbetr54',' Sorry','I cannot understand what you want to help from me','2017-05-18 16:44:04');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (152,'t5r7ri6imgnc00f0125fqj6ig3',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 16:46:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (153,'atppej50vqcn7guh7re6bo6m61',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 16:47:28');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (154,'atppej50vqcn7guh7re6bo6m61',' Search','We had not found anything suitable for your question','2017-05-18 16:47:39');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (155,'atppej50vqcn7guh7re6bo6m61',' Sorry','I did not understand your question can you please explain it?','2017-05-18 16:47:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (156,'ga6sibikucq7qmpuu694tb9621',' Sorry','I did not understand your question can you please explain it?','2017-05-18 16:49:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (157,'ga6sibikucq7qmpuu694tb9621',' Sorry','Sorry! For what. I am hear to help you. ','2017-05-18 16:49:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (158,'ga6sibikucq7qmpuu694tb9621',' Sorry','I cannot understand what you want to help from me','2017-05-18 16:50:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (159,'ga6sibikucq7qmpuu694tb9621',' Sorry','I did not understand your question can you please explain it?','2017-05-18 16:50:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (160,'ga6sibikucq7qmpuu694tb9621',' Deadpool','We had not found anything suitable for your question','2017-05-18 16:51:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (161,'ga6sibikucq7qmpuu694tb9621',' Date please','Today\'s date is Thursday 18th May 2017','2017-05-18 16:51:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (162,'ga6sibikucq7qmpuu694tb9621',' What is your name','You can call me as your Homyt Assistant. How can I help you.','2017-05-18 16:58:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (163,'ga6sibikucq7qmpuu694tb9621',' What\'s your name','I\'m Homyt Assistant and ready to help you. How can I help you.','2017-05-18 16:58:19');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (164,'ga6sibikucq7qmpuu694tb9621',' What\'s name','I\'m Homyt Assistant and ready to help you. How can I help you.','2017-05-18 16:58:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (165,'ga6sibikucq7qmpuu694tb9621',' Thank you','We had not found anything suitable for your question','2017-05-18 16:58:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (166,'ga6sibikucq7qmpuu694tb9621',' Time please','The time is 04:58 PM','2017-05-18 16:58:41');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (167,'ga6sibikucq7qmpuu694tb9621',' Can you tell me the date please','We had not found anything suitable for your question','2017-05-18 16:58:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (168,'ga6sibikucq7qmpuu694tb9621',' Deadly','We had not found anything suitable for your question','2017-05-18 16:59:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (169,'ga6sibikucq7qmpuu694tb9621',' Date please','Today\'s date is Thursday 18th May 2017','2017-05-18 16:59:06');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (170,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 10:51:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (171,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 10:51:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (172,'fnmm7ui18gg5sc1rg343ld2rm4',' Are you there','Hello. How can I help you','2017-05-19 10:51:59');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (173,'fnmm7ui18gg5sc1rg343ld2rm4',' Good morning','Hello. How can I help you','2017-05-19 10:52:04');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (174,'fnmm7ui18gg5sc1rg343ld2rm4',' Are you there','Hello. How can I help you','2017-05-19 10:52:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (175,'fnmm7ui18gg5sc1rg343ld2rm4',' Good afternoon','Hello. How can I help you','2017-05-19 10:52:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (176,'fnmm7ui18gg5sc1rg343ld2rm4',' What\'s your name','You can call me as your Homyt Assistant. How can I help you.','2017-05-19 10:52:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (177,'fnmm7ui18gg5sc1rg343ld2rm4',' Are you serious','I am always serious and ready to help you','2017-05-19 10:52:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (178,'fnmm7ui18gg5sc1rg343ld2rm4',' Some kind of joke','I am always serious and ready to help you','2017-05-19 10:52:42');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (179,'fnmm7ui18gg5sc1rg343ld2rm4',' Great','We had not found anything suitable for your question','2017-05-19 10:52:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (180,'fnmm7ui18gg5sc1rg343ld2rm4',' Create','We had not found anything suitable for your question','2017-05-19 10:52:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (181,'fnmm7ui18gg5sc1rg343ld2rm4',' Ok','I am always serious and ready to help you','2017-05-19 10:53:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (182,'fnmm7ui18gg5sc1rg343ld2rm4',' Did please','We had not found anything suitable for your question','2017-05-19 10:53:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (183,'fnmm7ui18gg5sc1rg343ld2rm4',' Did please','We had not found anything suitable for your question','2017-05-19 10:53:11');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (184,'fnmm7ui18gg5sc1rg343ld2rm4',' Please tell me the time','The time is 10:53 AM','2017-05-19 10:53:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (185,'fnmm7ui18gg5sc1rg343ld2rm4',' Please tell me the date','We had not found anything suitable for your question','2017-05-19 10:53:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (186,'fnmm7ui18gg5sc1rg343ld2rm4',' DID Prince','We had not found anything suitable for your question','2017-05-19 10:53:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (187,'fnmm7ui18gg5sc1rg343ld2rm4',' Date 20','We had not found anything suitable for your question','2017-05-19 10:55:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (188,'fnmm7ui18gg5sc1rg343ld2rm4',' What is the date','Today\'s date is Friday 19th May 2017','2017-05-19 10:55:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (189,'fnmm7ui18gg5sc1rg343ld2rm4',' Did please','We had not found anything suitable for your question','2017-05-19 10:55:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (190,'fnmm7ui18gg5sc1rg343ld2rm4',' Date please','Today\'s date is Friday 19th May 2017','2017-05-19 10:55:21');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (191,'fnmm7ui18gg5sc1rg343ld2rm4',' OK great','We had not found anything suitable for your question','2017-05-19 10:55:28');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (192,'fnmm7ui18gg5sc1rg343ld2rm4',' Ok','I am always serious and ready to help you','2017-05-19 10:57:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (193,'fnmm7ui18gg5sc1rg343ld2rm4',' Ok','Its okay. I am assistance. How can I help you','2017-05-19 10:58:06');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (194,'fnmm7ui18gg5sc1rg343ld2rm4',' Great','We had not found anything suitable for your question','2017-05-19 10:58:13');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (195,'fnmm7ui18gg5sc1rg343ld2rm4',' OK great','We had not found anything suitable for your question','2017-05-19 10:58:19');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (196,'fnmm7ui18gg5sc1rg343ld2rm4',' Ok','Its okay. I am assistance. How can I help you','2017-05-19 11:15:47');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (197,'fnmm7ui18gg5sc1rg343ld2rm4',' Great','Its okay. I am assistance. How can I help you','2017-05-19 11:15:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (198,'fnmm7ui18gg5sc1rg343ld2rm4',' Please tell me the time','The time is 11:16 AM','2017-05-19 11:16:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (199,'fnmm7ui18gg5sc1rg343ld2rm4',' What is the date','Today\'s date is Friday 19th May 2017','2017-05-19 11:16:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (200,'fnmm7ui18gg5sc1rg343ld2rm4',' Where do you work','You work at Homyt','2017-05-19 11:16:19');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (201,'fnmm7ui18gg5sc1rg343ld2rm4',' Where do you work','You work at Homyt','2017-05-19 11:16:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (202,'fnmm7ui18gg5sc1rg343ld2rm4',' Where do you work','I didn\'t work anywhere. I am Homyt Assisant and ready to help you. How can I help you.','2017-05-19 11:17:42');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (203,'fnmm7ui18gg5sc1rg343ld2rm4',' What is your name','I\'m Homyt Assistant and ready to help you. How can I help you.','2017-05-19 11:17:57');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (204,'fnmm7ui18gg5sc1rg343ld2rm4',' What is your name and how old are you','You can call me as your Homyt Assistant. How can I help you. and We had not found anything suitable for your question','2017-05-19 11:18:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (205,'fnmm7ui18gg5sc1rg343ld2rm4',' How old are you','We had not found anything suitable for your question','2017-05-19 11:18:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (206,'fnmm7ui18gg5sc1rg343ld2rm4',' Nothing','We had not found anything suitable for your question','2017-05-19 11:27:55');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (207,'fnmm7ui18gg5sc1rg343ld2rm4',' OK great','Its okay. I am assistance. How can I help you','2017-05-19 11:28:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (208,'fnmm7ui18gg5sc1rg343ld2rm4',' Please tell me the time','The time is 11:28 AM','2017-05-19 11:28:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (209,'fnmm7ui18gg5sc1rg343ld2rm4',' What is the age','We had not found anything suitable for your question','2017-05-19 11:28:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (210,'fnmm7ui18gg5sc1rg343ld2rm4',' Your age','You are 28 years old','2017-05-19 11:28:23');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (211,'fnmm7ui18gg5sc1rg343ld2rm4',' What is your age','You are 28 years old','2017-05-19 11:28:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (212,'fnmm7ui18gg5sc1rg343ld2rm4',' What is your age','I am not a species. I am under process of development. I cannot tell you my age.','2017-05-19 11:29:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (213,'fnmm7ui18gg5sc1rg343ld2rm4',' What is your age','I am not a species. I am under process of development. I cannot tell you my age.','2017-05-19 11:29:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (214,'fnmm7ui18gg5sc1rg343ld2rm4',' How old are you','I am not a species. I am under process of development. I cannot tell you my age.','2017-05-19 11:30:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (215,'fnmm7ui18gg5sc1rg343ld2rm4',' OK great','Its okay. I am assistance. How can I help you','2017-05-19 11:30:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (216,'fnmm7ui18gg5sc1rg343ld2rm4',' Please tell me the time and date please','The time is 11:30 AM and Today\'s date is Friday 19th May 2017','2017-05-19 11:30:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (217,'fnmm7ui18gg5sc1rg343ld2rm4',' Rotate','We had not found anything suitable for your question','2017-05-19 11:30:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (218,'fnmm7ui18gg5sc1rg343ld2rm4',' Are you serious','I am always serious and ready to help you','2017-05-19 11:30:41');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (219,'fnmm7ui18gg5sc1rg343ld2rm4',' Are you serious','I have no feeling of sorrow and happiness. I am an assistant so I can assist you.','2017-05-19 11:32:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (220,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to contact','We had not found anything suitable for your question','2017-05-19 11:32:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (221,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to contact','We had not found anything suitable for your question','2017-05-19 11:34:02');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (222,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to contact','We had not found anything suitable for your question','2017-05-19 11:34:33');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (223,'fnmm7ui18gg5sc1rg343ld2rm4',' India','We had not found anything suitable for your question','2017-05-19 11:51:47');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (224,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to media','We had not found anything suitable for your question','2017-05-19 11:51:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (225,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to media','We had not found anything suitable for your question','2017-05-19 11:52:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (226,'fnmm7ui18gg5sc1rg343ld2rm4',' Clip contact','We had not found anything suitable for your question','2017-05-19 11:53:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (227,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to about','We had not found anything suitable for your question','2017-05-19 11:53:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (228,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to home','We had not found anything suitable for your question','2017-05-19 11:53:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (229,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to media','We had not found anything suitable for your question','2017-05-19 11:53:47');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (230,'fnmm7ui18gg5sc1rg343ld2rm4',' How to press','We had not found anything suitable for your question','2017-05-19 11:53:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (231,'fnmm7ui18gg5sc1rg343ld2rm4',' Flip contact','We had not found anything suitable for your question','2017-05-19 11:53:59');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (232,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to about','We had not found anything suitable for your question','2017-05-19 12:06:16');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (233,'fnmm7ui18gg5sc1rg343ld2rm4',' Go to about','We had not found anything suitable for your question','2017-05-19 12:06:22');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (234,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:25:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (235,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:27:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (236,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:27:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (237,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:27:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (238,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:28:33');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (239,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:28:40');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (240,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:32:23');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (241,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:32:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (242,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:33:08');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (243,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:33:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (244,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:33:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (245,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:35:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (246,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:36:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (247,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:37:13');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (248,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:37:22');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (249,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:37:31');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (250,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:37:42');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (251,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:38:37');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (252,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:38:47');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (253,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**audio1','2017-05-19 12:38:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (254,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:40:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (255,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:40:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (256,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:41:02');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (257,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:41:08');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (258,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:41:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (259,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:41:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (260,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:50:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (261,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:50:23');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (262,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:50:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (263,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:50:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (264,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:51:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (265,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:51:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (266,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:51:25');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (267,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:53:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (268,'fnmm7ui18gg5sc1rg343ld2rm4',' Ahlan wa sahlan Saeed','We had not found anything suitable for your question','2017-05-19 12:53:32');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (269,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:54:22');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (270,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:54:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (271,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 12:54:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (272,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:54:47');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (273,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 12:59:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (274,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:59:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (275,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:59:43');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (276,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 12:59:51');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (277,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 13:00:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (278,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 13:00:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (279,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 13:00:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (280,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:00:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (281,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:01:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (282,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:03:57');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (283,'fnmm7ui18gg5sc1rg343ld2rm4',' Ajit','We had not found anything suitable for your question','2017-05-19 13:04:06');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (284,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:04:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (285,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:19:01');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (286,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 13:19:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (287,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:19:29');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (288,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:20:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (289,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:20:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (290,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 13:20:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (291,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**zee','2017-05-19 13:21:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (292,'fnmm7ui18gg5sc1rg343ld2rm4',' Satish','We had not found anything suitable for your question','2017-05-19 13:21:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (293,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','**AUDIO**hamza','2017-05-19 13:21:40');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (294,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','hamza','2017-05-19 14:04:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (295,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','zee','2017-05-19 14:04:33');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (296,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','zee','2017-05-19 14:04:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (297,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','hamza','2017-05-19 14:05:06');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (298,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:11:13');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (299,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:11:21');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (300,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:11:31');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (301,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:11:37');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (302,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:11:52');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (303,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:12:02');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (304,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:53:32');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (305,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:54:14');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (306,'fnmm7ui18gg5sc1rg343ld2rm4',' Aatish','We had not found anything suitable for your question','2017-05-19 14:55:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (307,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:55:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (308,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:56:40');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (309,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 14:57:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (310,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 14:57:16');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (311,'fnmm7ui18gg5sc1rg343ld2rm4',' Rajesh','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:16:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (312,'fnmm7ui18gg5sc1rg343ld2rm4',' 1','We had not found anything suitable for your question','2017-05-19 15:17:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (313,'fnmm7ui18gg5sc1rg343ld2rm4',' O n e','We had not found anything suitable for your question','2017-05-19 15:17:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (314,'fnmm7ui18gg5sc1rg343ld2rm4',' 1','We had not found anything suitable for your question','2017-05-19 15:17:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (315,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','We had not found anything suitable for your question','2017-05-19 15:18:13');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (316,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:18:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (317,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:18:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (318,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:19:32');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (319,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:19:42');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (320,'fnmm7ui18gg5sc1rg343ld2rm4',' Hello','Hello. How can I help you','2017-05-19 15:23:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (321,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:23:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (322,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:24:32');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (323,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:24:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (324,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:24:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (325,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:25:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (326,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:25:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (327,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:28:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (328,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:28:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (329,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:29:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (330,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:31:01');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (331,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:31:08');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (332,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:32:52');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (333,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:33:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (334,'fnmm7ui18gg5sc1rg343ld2rm4',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:37:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (335,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:46:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (336,'o74du68k4vmcrdvo53804md1g7',' Hello','Hello. How can I help you','2017-05-19 15:46:47');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (337,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:46:52');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (338,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:51:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (339,'o74du68k4vmcrdvo53804md1g7',' Hello','Hello. How can I help you','2017-05-19 15:55:59');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (340,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:56:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (341,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 15:57:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (342,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:00:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (343,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:00:27');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (344,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:00:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (345,'o74du68k4vmcrdvo53804md1g7',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:00:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (346,'eb5vvdv1dmrf83ugdr6r9mfkh3',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:01:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (347,'n371g3skgbjp9gubqejhjlfo45',' Hello','Hello. How can I help you','2017-05-19 16:08:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (348,'n371g3skgbjp9gubqejhjlfo45',' Hello','Hello. How can I help you','2017-05-19 16:09:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (349,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:09:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (350,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:10:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (351,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:10:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (352,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:11:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (353,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:11:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (354,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:17:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (355,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:18:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (356,'n371g3skgbjp9gubqejhjlfo45',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:18:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (357,'n371g3skgbjp9gubqejhjlfo45',' Hello','Hello. How can I help you','2017-05-19 16:19:11');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (358,'n371g3skgbjp9gubqejhjlfo45',' Hello','Hello. How can I help you','2017-05-19 16:21:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (359,'3g8gttgsjda7bqd6n4b8itu8t2',' Hello','Hello. How can I help you','2017-05-19 16:24:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (360,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:24:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (361,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:24:35');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (362,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:24:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (363,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:24:57');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (364,'3g8gttgsjda7bqd6n4b8itu8t2',' Hello','Hello. How can I help you','2017-05-19 16:25:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (365,'3g8gttgsjda7bqd6n4b8itu8t2',' What is your name and what is your age','I\'m Homyt Assistant and ready to help you. How can I help you. and I am not a species. I am under process of development. I cannot tell you my age.','2017-05-19 16:25:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (366,'3g8gttgsjda7bqd6n4b8itu8t2',' Hello','Hello. How can I help you','2017-05-19 16:27:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (367,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:27:51');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (368,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:28:02');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (369,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:28:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (370,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:28:59');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (371,'3g8gttgsjda7bqd6n4b8itu8t2',' Yes','We had not found anything suitable for your question','2017-05-19 16:29:44');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (372,'3g8gttgsjda7bqd6n4b8itu8t2',' 123','We had not found anything suitable for your question','2017-05-19 16:30:02');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (373,'3g8gttgsjda7bqd6n4b8itu8t2',' World 150','We had not found anything suitable for your question','2017-05-19 16:30:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (374,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:30:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (375,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:30:23');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (376,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø­Ù…Ø²Ø© ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:30:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (377,'3g8gttgsjda7bqd6n4b8itu8t2',' Play','Ù…Ø±Ø­Ø¨Ø§ Ø²ÙŠ ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ','2017-05-19 16:32:25');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (378,'3g8gttgsjda7bqd6n4b8itu8t2',' About','We had not found anything suitable for your question','2017-05-19 16:32:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (379,'3g8gttgsjda7bqd6n4b8itu8t2',' Clip video','We had not found anything suitable for your question','2017-05-19 16:33:09');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (380,'lr3lmp8a8p4vlkr99h1g4958d3',' What is your name','You can call me as your Homyt Assistant. How can I help you.','2017-05-21 17:18:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (381,'lr3lmp8a8p4vlkr99h1g4958d3',' How old are you','I am not a species. I am under process of development. I cannot tell you my age.','2017-05-21 17:18:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (382,'lr3lmp8a8p4vlkr99h1g4958d3',' OK great','Its okay. I am assistance. How can I help you','2017-05-21 17:18:45');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (383,'lr3lmp8a8p4vlkr99h1g4958d3',' Be serious','We had not found anything suitable for your question','2017-05-21 17:18:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (384,'lr3lmp8a8p4vlkr99h1g4958d3',' Are you serious','I have no feeling of sorrow and happiness. I am an assistant so I can assist you.','2017-05-21 17:19:01');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (385,'lr3lmp8a8p4vlkr99h1g4958d3',' Where do you work','I didn\'t work anywhere. I am Homyt Assisant and ready to help you. How can I help you.','2017-05-21 17:19:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (386,'lr3lmp8a8p4vlkr99h1g4958d3',' Where do you live','You live in Noida','2017-05-21 17:19:25');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (387,'lr3lmp8a8p4vlkr99h1g4958d3',' I live in Noida','We had not found anything suitable for your question','2017-05-21 17:19:30');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (388,'lr3lmp8a8p4vlkr99h1g4958d3',' Microphone','We had not found anything suitable for your question','2017-05-21 17:19:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (389,'pnap2af8i1h89j05de4rqupq57',' Open contacts','We had not found anything suitable for your question','2017-05-30 15:42:46');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (390,'pnap2af8i1h89j05de4rqupq57',' What is my name','Your name is Zeedat','2017-05-30 15:42:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (391,'pnap2af8i1h89j05de4rqupq57',' Where are you want','We had not found anything suitable for your question','2017-05-30 15:43:00');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (392,'pnap2af8i1h89j05de4rqupq57',' Open above','We had not found anything suitable for your question','2017-05-30 15:47:54');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (393,'pnap2af8i1h89j05de4rqupq57',' Open about','We had not found anything suitable for your question','2017-05-30 15:48:02');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (394,'pnap2af8i1h89j05de4rqupq57',' Koffee media','We had not found anything suitable for your question','2017-05-30 15:48:10');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (395,'pnap2af8i1h89j05de4rqupq57',' Open media','We had not found anything suitable for your question','2017-05-30 15:48:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (396,'pnap2af8i1h89j05de4rqupq57',' Open offer','We had not found anything suitable for your question','2017-05-30 15:48:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (397,'pnap2af8i1h89j05de4rqupq57',' Hello','Hello. How can I help you','2017-05-30 15:48:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (398,'pnap2af8i1h89j05de4rqupq57',' I don\'t know','We had not found anything suitable for your question','2017-05-30 15:48:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (399,'pnap2af8i1h89j05de4rqupq57',' How are you','I am fine thank you. How can I help you','2017-05-30 15:49:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (400,'pnap2af8i1h89j05de4rqupq57',' Aap in Punjab','We had not found anything suitable for your question','2017-05-30 15:49:26');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (401,'pnap2af8i1h89j05de4rqupq57',' Open Coolpad','We had not found anything suitable for your question','2017-05-30 15:49:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (402,'pnap2af8i1h89j05de4rqupq57',' Open kurta','We had not found anything suitable for your question','2017-05-30 15:49:41');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (403,'5oegvucbgd8j97gv2var50s5l3',' What is my name','Your name is Zeedat','2017-06-05 16:14:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (404,'5oegvucbgd8j97gv2var50s5l3',' Sai Kumar','We had not found anything suitable for your question','2017-06-05 16:14:16');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (405,'5oegvucbgd8j97gv2var50s5l3',' Sai Kumar','We had not found anything suitable for your question','2017-06-05 16:14:24');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (406,'sjphelao3o61hu3domevt4o9d3',' Hello','Hello. How can I help you','2017-06-05 16:16:17');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (407,'sjphelao3o61hu3domevt4o9d3',' What is my name','Your name is Zeedat','2017-06-05 16:16:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (408,'sjphelao3o61hu3domevt4o9d3',' Where do I live','We had not found anything suitable for your question','2017-06-05 16:16:40');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (409,'sjphelao3o61hu3domevt4o9d3',' Where I live','We had not found anything suitable for your question','2017-06-05 16:16:47');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (410,'5oegvucbgd8j97gv2var50s5l3',' Sai Kumar','We had not found anything suitable for your question','2017-06-05 16:16:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (411,'sjphelao3o61hu3domevt4o9d3',' Where I work','We had not found anything suitable for your question','2017-06-05 16:16:53');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (412,'sjphelao3o61hu3domevt4o9d3',' Where do I work','We had not found anything suitable for your question','2017-06-05 16:17:01');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (413,'sjphelao3o61hu3domevt4o9d3',' What is my age','We had not found anything suitable for your question','2017-06-05 16:17:08');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (414,'sjphelao3o61hu3domevt4o9d3',' What all the am','We had not found anything suitable for your question','2017-06-05 16:17:16');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (415,'sjphelao3o61hu3domevt4o9d3',' Where I work','We had not found anything suitable for your question','2017-06-05 16:19:59');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (416,'sjphelao3o61hu3domevt4o9d3',' How are you','I am fine thank you. How can I help you','2017-06-05 16:20:06');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (417,'sjphelao3o61hu3domevt4o9d3',' Selectors name','We had not found anything suitable for your question','2017-06-05 16:20:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (418,'sjphelao3o61hu3domevt4o9d3',' Select players name','We had not found anything suitable for your question','2017-06-05 16:20:23');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (419,'sjphelao3o61hu3domevt4o9d3',' Collectors name','We had not found anything suitable for your question','2017-06-05 16:20:37');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (420,'sjphelao3o61hu3domevt4o9d3',' Open media','We had not found anything suitable for your question','2017-06-05 16:20:43');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (421,'sjphelao3o61hu3domevt4o9d3',' Open contact','We had not found anything suitable for your question','2017-06-05 16:20:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (422,'sjphelao3o61hu3domevt4o9d3',' Open about','We had not found anything suitable for your question','2017-06-05 16:20:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (423,'sjphelao3o61hu3domevt4o9d3',' Open press','We had not found anything suitable for your question','2017-06-05 16:21:03');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (424,'sjphelao3o61hu3domevt4o9d3',' Opensocial','We had not found anything suitable for your question','2017-06-05 16:21:11');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (425,'sjphelao3o61hu3domevt4o9d3',' Open social','We had not found anything suitable for your question','2017-06-05 16:21:19');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (426,'sjphelao3o61hu3domevt4o9d3',' Home','We had not found anything suitable for your question','2017-06-05 16:21:25');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (427,'sjphelao3o61hu3domevt4o9d3',' How old I am','We had not found anything suitable for your question','2017-06-05 16:21:33');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (428,'sjphelao3o61hu3domevt4o9d3',' F*** you','We had not found anything suitable for your question','2017-06-05 16:21:41');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (429,'sjphelao3o61hu3domevt4o9d3',' Suck my dick','We had not found anything suitable for your question','2017-06-05 16:21:49');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (430,'sjphelao3o61hu3domevt4o9d3',' Mail','We had not found anything suitable for your question','2017-06-05 16:21:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (431,'sjphelao3o61hu3domevt4o9d3',' What is my name','Your name is Zeedat','2017-06-05 16:22:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (432,'sjphelao3o61hu3domevt4o9d3',' How you doing','I am fine thank you. How can I help you','2017-06-05 16:24:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (433,'sjphelao3o61hu3domevt4o9d3',' What is the time','The time is 04:24 PM','2017-06-05 16:24:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (434,'sjphelao3o61hu3domevt4o9d3',' Are you serious','I have no feeling of sorrow and happiness. I am an assistant so I can assist you.','2017-06-05 16:24:21');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (435,'sjphelao3o61hu3domevt4o9d3',' What is your favourite food','Your favorite food is Burger','2017-06-05 16:24:31');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (436,'sjphelao3o61hu3domevt4o9d3',' Where do you live','I have no place to live. I am Homyt Assistant.','2017-06-05 16:24:38');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (437,'sjphelao3o61hu3domevt4o9d3',' Where you live','I have no place to live. I am Homyt Assistant.','2017-06-05 16:24:48');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (438,'sjphelao3o61hu3domevt4o9d3',' What is your age','I am not a species. I am under process of development. I cannot tell you my age.','2017-06-05 16:24:55');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (439,'sjphelao3o61hu3domevt4o9d3',' Sorry','Sorry! For what. I am hear to help you. ','2017-06-05 16:25:07');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (440,'sjphelao3o61hu3domevt4o9d3',' What is my name','Your name is Zeedat','2017-06-05 16:25:15');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (441,'sjphelao3o61hu3domevt4o9d3',' Still my name','We had not found anything suitable for your question','2017-06-05 16:25:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (442,'sjphelao3o61hu3domevt4o9d3',' Tell my name','We had not found anything suitable for your question','2017-06-05 16:25:28');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (443,'sjphelao3o61hu3domevt4o9d3',' Tell my name','We had not found anything suitable for your question','2017-06-05 16:25:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (444,'sjphelao3o61hu3domevt4o9d3',' What do you mean','I cannot understand what you want to help from me','2017-06-05 16:25:43');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (445,'sjphelao3o61hu3domevt4o9d3',' System start','Please Wait we are going to restart your system','2017-06-05 16:25:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (446,'sjphelao3o61hu3domevt4o9d3',' Really','We had not found anything suitable for your question','2017-06-05 16:25:58');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (447,'sjphelao3o61hu3domevt4o9d3',' Where are you','I am nowhere. How can I help you.','2017-06-05 16:26:04');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (448,'sjphelao3o61hu3domevt4o9d3',' Seriously','We had not found anything suitable for your question','2017-06-05 16:26:11');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (449,'sjphelao3o61hu3domevt4o9d3',' What is the date','Today\'s date is Monday 05th June 2017','2017-06-05 16:26:18');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (450,'sjphelao3o61hu3domevt4o9d3',' You said sorry for what','I said sorry that I cannot get you','2017-06-05 16:26:34');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (451,'sjphelao3o61hu3domevt4o9d3',' Current time','The time is 04:26 PM','2017-06-05 16:26:43');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (452,'sjphelao3o61hu3domevt4o9d3',' Hello','Hello. How can I help you','2017-06-05 16:26:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (453,'sjphelao3o61hu3domevt4o9d3',' What is your name','I\'m Homyt Assistant and ready to help you. How can I help you.','2017-06-05 16:26:56');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (454,'sjphelao3o61hu3domevt4o9d3',' What is my name','Your name is Zeedat','2017-06-05 16:27:05');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (455,'sjphelao3o61hu3domevt4o9d3',' By which name I call you','You can call me as your Homyt Assistant. How can I help you.','2017-06-05 16:27:12');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (456,'sjphelao3o61hu3domevt4o9d3',' Go to hell','We had not found anything suitable for your question','2017-06-05 16:27:21');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (457,'pddajucnbn26e2hnmk9k7ed9p0',' What is my account','We had not found anything suitable for your question','2017-06-05 22:00:20');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (458,'pddajucnbn26e2hnmk9k7ed9p0',' How much my profits','We had not found anything suitable for your question','2017-06-05 22:00:36');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (459,'30ijt6s0gc9huv2v7j1ua1bb43',' What is my name','Your name is Zeedat','2017-06-25 01:11:50');
insert  into `guest_chat`(`id`,`guest_session`,`guest_question`,`homyt_answer`,`added_on`) values (460,'30ijt6s0gc9huv2v7j1ua1bb43',' Witney Carson','We had not found anything suitable for your question','2017-06-25 01:11:58');

/*Table structure for table `guests` */

DROP TABLE IF EXISTS `guests`;

CREATE TABLE `guests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `fathername` varchar(100) NOT NULL,
  `mothername` varchar(100) NOT NULL,
  `brothername` varchar(100) NOT NULL,
  `sistername` varchar(100) NOT NULL,
  `friendsname` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guests` */

/*Table structure for table `language` */

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `language` */

insert  into `language`(`id`,`language_name`,`code`) values (1,'English','en');
insert  into `language`(`id`,`language_name`,`code`) values (2,'Arabic','ar');

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL,
  `q_en` text NOT NULL,
  `q_ar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `questions` */

insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (1,'1','2017-05-14 04:15:25','System Start/lets start again/please start/lets start','Ø¨Ø¯Ø¡ Ø§Ù„Ù†Ø¸Ø§Ù…/ÙŠØªÙŠØ­ Ø¨Ø¯Ø¡ Ù…Ø±Ø© Ø£Ø®Ø±Ù‰/ÙŠØ±Ø¬Ù‰ Ø¨Ø¯Ø¡/ÙŠØªÙŠØ­ Ø¨Ø¯Ø¡');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (2,'1','2017-05-14 12:21:02','What/what do you mean/I am not getting you/sorry/Pardon please/pardon/excuse me','Ù…Ø§Ø°Ø§/Ù…Ø§Ø°Ø§ ØªÙ‚ØµØ¯/Ø£Ù†Ø§ Ù„Ø§ ØªØ­ØµÙ„ Ø¹Ù„Ù‰/Ø¢Ø³Ù/Ø¹ÙÙˆØ§ Ù…Ù† ÙØ¶Ù„Ùƒ/Ø§Ù„Ø¹ÙÙˆ/Ø¹ÙÙˆØ§');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (3,'1','2017-05-15 13:45:30','What is my name/what\'s my name/tell me my name/spell my name/say my name/speak my name','Ù…Ø§ Ù‡Ùˆ Ø§Ø³Ù…ÙŠ/Ù…Ø§ Ù‡Ùˆ Ø§Ø³Ù…ÙŠ/Ù‚Ù„ Ù„ÙŠ Ø§Ø³Ù…ÙŠ/ØªÙˆØ¶ÙŠØ­ Ø§Ø³Ù…ÙŠ/ÙŠÙ‚ÙˆÙ„ Ø§Ø³Ù…ÙŠ/ÙŠØªÙƒÙ„Ù… Ø§Ø³Ù…ÙŠ');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (4,'1','2017-05-15 13:45:39','What is your age/How old you are/what\'s your age/how much you are old/are you old/you are old/how old are you/','Ø·ÙŠØ¨/Ø­Ø³Ù†Ø§/Ù…ÙˆØ§ÙÙ‚ Ø¹Ø¸ÙŠÙ…/Ø´ÙƒØ±Ø§ Ù„Ùƒ/Ø´ÙƒØ±Ø§ Ø¬Ø²ÙŠÙ„Ø§/Ø´ÙƒØ±Ø§/Ø³Ø±ÙˆØ±ÙŠ......');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (5,'1','2017-05-15 13:45:48','Where do you live/where you live/where is your place/where your place','Ø£ÙŠÙ† ØªØ¹ÙŠØ´/Ø§Ù„Ù…ÙƒØ§Ù† Ø§Ù„Ø°ÙŠ ØªØ¹ÙŠØ´ ÙÙŠÙ‡/Ø£ÙŠÙ† Ù…ÙƒØ§Ù†Ùƒ/Ù…ÙƒØ§Ù†Ùƒ');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (6,'1','2017-05-15 13:46:08','what is your favourite food/what\'s your favourite food/what do you eat/what you eat','Ø£ÙŠÙ† ØªØ¹Ù…Ù„/Ø£ÙŠÙ† Ù…ÙƒØ§Ù†Ùƒ/Ø£ÙŠÙ† Ù‡Ùˆ Ù…ÙƒØªØ¨Ùƒ/Ø£ÙŠÙ† Ù…ÙƒØ§Ù† Ø¹Ù…Ù„Ùƒ...');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (7,'1','2017-05-15 13:46:18','Where do you work/where is your place/where is your office/where is your work place','Ø£ÙŠÙ† ØªØ¹Ù…Ù„/Ø£ÙŠÙ† Ù…ÙƒØ§Ù†Ùƒ/Ø£ÙŠÙ† Ù‡Ùˆ Ù…ÙƒØªØ¨Ùƒ/Ø£ÙŠÙ† Ù…ÙƒØ§Ù† Ø¹Ù…Ù„Ùƒ');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (8,'1','2017-05-15 13:46:31','Are you serious/are you joking/is this some kind of joke/is this joke/is this a joke/you are joking','Ù‡Ù„ Ø£Ù†Øª Ø¬Ø§Ø¯/Ù‡Ù„ ØªÙ…Ø²Ø­/Ù‡Ù„ Ù‡Ø°Ø§ Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ù†ÙƒØªØ©/Ù‡Ù„ Ù‡Ø°Ù‡ Ù…Ø²Ø­Ø©/Ù‡Ù„ Ù‡Ø°Ù‡ Ù…Ø²Ø­Ø©/Ø£Ù†Øª ØªÙ…Ø²Ø­');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (9,'1','2017-05-16 16:18:55','What is the time/Time please/what time is it/what time it is/please tell me the time/please tell me time/current time/what is the current time/tell me the time/tell me time now/tell me time','Ù…Ø§ Ù‡Ùˆ Ø§Ù„ÙˆÙ‚Øª/Ø§Ù„ÙˆÙ‚Øª Ù…Ù† ÙØ¶Ù„Ùƒ/Ù…Ø§ Ù‡Ùˆ Ø§Ù„ÙˆÙ‚Øª/Ù…Ø§ Ù‡Ùˆ Ø§Ù„ÙˆÙ‚Øª/Ù…Ù† ÙØ¶Ù„Ùƒ Ù‚Ù„ Ù„ÙŠ Ø§Ù„ÙˆÙ‚Øª/Ù…Ù† ÙØ¶Ù„Ùƒ Ù‚Ù„ Ù„ÙŠ Ø§Ù„ÙˆÙ‚Øª/Ø§Ù„ÙˆÙ‚Øª Ø§Ù„Ø­Ø§Ù„ÙŠ/Ù…Ø§ Ù‡Ùˆ Ø§Ù„ÙˆÙ‚Øª Ø§Ù„Ø­Ø§Ù„ÙŠ/Ù‚Ù„ Ù„ÙŠ Ø§Ù„ÙˆÙ‚Øª/Ù‚Ù„ Ù„ÙŠ Ø§Ù„ÙˆÙ‚Øª Ø§Ù„Ø¢Ù†/Ù‚Ù„ Ù„ÙŠ Ø²Ù…Ù†');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (10,'1','2017-05-16 17:25:58','How are you/How you doing/How\'s doing/How\'s you doing','ÙƒÙŠÙ Ø­Ø§Ù„Ùƒ/ÙƒÙŠÙ ØªÙØ¹Ù„/ÙƒÙŠÙ ØªÙØ¹Ù„/ÙƒÙŠÙ ØªÙØ¹Ù„');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (11,'1','2017-05-16 17:27:16','Where are you/Where you are/Where were you','Ø£ÙŠÙ† Ø£Ù†Øª/Ø£ÙŠÙ† Ø£Ù†Øª/Ø£ÙŠÙ† ÙƒÙ†Øª');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (12,'1','2017-05-16 17:29:13','What can you do/What can do for me/What can do for me/What can do','Ù…Ø§Ø°Ø§ ÙŠÙ…ÙƒÙ†Ùƒ Ø£Ù† ØªÙØ¹Ù„/Ù…Ø§Ø°Ø§ ÙŠÙ…ÙƒÙ† Ø£Ù† ØªÙØ¹Ù„ Ø¨Ø§Ù„Ù†Ø³Ø¨Ø© Ù„ÙŠ/Ù…Ø§Ø°Ø§ ÙŠÙ…ÙƒÙ† Ø£Ù† ØªÙØ¹Ù„ Ø¨Ø§Ù„Ù†Ø³Ø¨Ø© Ù„ÙŠ/Ù…Ø§ ÙŠÙ…ÙƒÙ† Ø§Ù„Ù‚ÙŠØ§Ù… Ø¨Ù‡');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (13,'1','2017-05-17 12:45:47','What is the date/Date please/what date is it/what date it is/please tell me the date/please tell me date/current time/what is the current date/tell me the date/tell me date now/tell me date/What is today\'s date/today\'s date/today date/date please','Ù…Ø§ Ù‡Ùˆ ØªØ§Ø±ÙŠØ®/ØªØ§Ø±ÙŠØ® Ù…Ù† ÙØ¶Ù„Ùƒ/Ù…Ø§ Ù‡Ùˆ Ø§Ù„ØªØ§Ø±ÙŠØ®/Ù…Ø§ Ù‡Ùˆ ØªØ§Ø±ÙŠØ®/Ù…Ù† ÙØ¶Ù„Ùƒ Ù‚Ù„ Ù„ÙŠ ØªØ§Ø±ÙŠØ®/Ù…Ù† ÙØ¶Ù„Ùƒ Ù‚Ù„ Ù„ÙŠ ØªØ§Ø±ÙŠØ®/Ø§Ù„ÙˆÙ‚Øª Ø§Ù„Ø­Ø§Ù„ÙŠ/Ù…Ø§ Ù‡Ùˆ Ø§Ù„ØªØ§Ø±ÙŠØ® Ø§Ù„Ø­Ø§Ù„ÙŠ/Ù‚Ù„ Ù„ÙŠ ØªØ§Ø±ÙŠØ®/Ø£Ø®Ø¨Ø±Ù†ÙŠ ØªØ§Ø±ÙŠØ® Ø§Ù„Ø¢Ù†/Ù‚Ù„ Ù„ÙŠ Ø§Ù„ØªØ§Ø±ÙŠØ®/Ù…Ø§ Ù‡Ùˆ ØªØ§Ø±ÙŠØ® Ø§Ù„ÙŠÙˆÙ…/ØªØ§Ø±ÙŠØ® Ø§Ù„ÙŠÙˆÙ…/Ø§Ù„ÙŠÙˆÙ… ØªØ§Ø±ÙŠØ®/ØªØ§Ø±ÙŠØ® Ù…Ù† ÙØ¶Ù„Ùƒ');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (14,'1','2017-05-18 10:16:51','What is your name/What\'s your name/What name is your/How can I call you/By which name I call you/What\'s name is your','Ù…Ø§ Ù‡Ùˆ Ø§Ø³Ù…Ùƒ/Ù…Ø§ Ø§Ø³Ù…Ùƒ/Ù…Ø§ Ù‡Ùˆ Ø§Ø³Ù…Ùƒ/ÙƒÙŠÙ ÙŠÙ…ÙƒÙ†Ù†ÙŠ Ø§Ù„Ø§ØªØµØ§Ù„ Ø¨Ùƒ/Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ø§Ù„Ø§Ø³Ù… Ø§Ù„Ø°ÙŠ Ø£Ø³Ù…ÙŠÙ‡/Ù…Ø§ Ù‡Ùˆ Ø§Ø³Ù…Ùƒ');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (15,'1','2017-05-18 13:42:56','You said sorry for what/You said sorry/why sorry/why are you sorry','Ù‚Ù„Øª Ø¢Ø³Ù Ù„Ù…Ø§/Ù‚Ù„Øª Ø¢Ø³Ù/Ù„Ù…Ø§Ø°Ø§ Ø¢Ø³Ù/Ù„Ù…Ø§Ø°Ø§ Ø£Ù†Øª Ø¢Ø³Ù');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (16,'1','2017-05-19 10:44:44','Hello/Are you there/Are you here/Hellos/Good Morning/Good Afternoon/Good Evening/Good Night','Ù…Ø±Ø­Ø¨Ø§/Ù‡Ù„ Ø£Ù†Øª Ù‡Ù†Ø§/Ù‡Ù„ Ø£Ù†Øª Ù‡Ù†Ø§/Ù‡ÙŠÙ„ÙˆØ³/ØµØ¨Ø§Ø­ Ø§Ù„Ø®ÙŠØ±/Ù…Ø³Ø§Ø¡ Ø§Ù„Ø®ÙŠØ±/Ù…Ø³Ø§Ø¡ Ø§Ù„Ø®ÙŠØ±/Ù„ÙŠÙ„Ø© Ø³Ø¹ÙŠØ¯Ø©');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (17,'1','2017-05-19 10:47:35','What wrong with you/Anything wrong with you','Ù…Ø§ Ø§Ù„Ø®Ø·Ø£ Ù…Ø¹Ùƒ/Ø£ÙŠ Ø´ÙŠØ¡ Ø®Ø§Ø·Ø¦ Ù…Ø¹Ùƒ');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (18,'1','2017-05-19 10:56:41','Ok/okay/ok great/thank you/thank you very much/thanks/my pleasure','Ø·ÙŠØ¨/Ø­Ø³Ù†Ø§/Ù…ÙˆØ§ÙÙ‚ Ø¹Ø¸ÙŠÙ…/Ø´ÙƒØ±Ø§ Ù„Ùƒ/Ø´ÙƒØ±Ø§ Ø¬Ø²ÙŠÙ„Ø§/Ø´ÙƒØ±Ø§/Ø³Ø±ÙˆØ±ÙŠ');
insert  into `questions`(`id`,`status`,`added_on`,`q_en`,`q_ar`) values (19,'1','2017-05-19 12:20:33','play/','Ø±Ø§Ø¬ÙŠØ´/Ø±Ø§Ø¬ÙŠØ´ ÙƒÙˆÙ…Ø§Ø± Vishwakarma/Ø±Ø§Ø¬ÙŠØ´ ÙƒÙˆÙ…Ø§Ø±/');

/*Table structure for table `suggestions` */

DROP TABLE IF EXISTS `suggestions`;

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_en` text NOT NULL,
  `q_ar` text NOT NULL,
  `times_asked` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `suggestions` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `subjects` varchar(250) NOT NULL,
  PRIMARY KEY (`uid`),
  FULLTEXT KEY `subjects` (`subjects`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`uid`,`course_id`,`subjects`) values (1,1,'html,php');
insert  into `users`(`uid`,`course_id`,`subjects`) values (2,1,'java,html,sql');
insert  into `users`(`uid`,`course_id`,`subjects`) values (3,1,'java');
insert  into `users`(`uid`,`course_id`,`subjects`) values (4,1,'fashion,html,php,sql,java');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
