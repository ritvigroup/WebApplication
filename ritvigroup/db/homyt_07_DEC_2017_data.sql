/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.6.35-log : Database - homyt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`homyt` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `homyt`;

/*Table structure for table `chat_image` */

DROP TABLE IF EXISTS `chat_image`;

CREATE TABLE `chat_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chat_between_user` varchar(255) NOT NULL,
  `image_path` text NOT NULL,
  `web_image_path` text NOT NULL,
  `uploaded_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `chat_image` */

insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (1,'1_2/','../../uploads/image/chat/1_2/20171101115048-1509517248-149638519.png','','2017-11-01 11:50:48');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (2,'1_2/','../../uploads/image/chat/1_2/20171101120015-1509517815-415882268.png','','2017-11-01 12:00:15');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (3,'1_2/','../../uploads/image/chat/1_2/20171101120346-1509518026-83922982.png','','2017-11-01 12:03:46');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (4,'1_2/','../../uploads/image/chat/1_2/20171101122055-1509519055-551440629.png','','2017-11-01 12:20:55');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (5,'1_2/','../../uploads/image/chat/1_2/20171101122150-1509519110-1169751611.png','','2017-11-01 12:21:50');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (6,'1_2/','../../uploads/image/chat/1_2/20171101122917-1509519557-1654838915.jpg','','2017-11-01 12:29:17');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (7,'1_2/','../../upload/image/chat/1_2/20171101155826-1509532106-159198390.jpg','','2017-11-01 15:58:26');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (8,'1_2/','upload/image/chat/1_2/20171101155852-1509532132-955430768.png','','2017-11-01 15:58:52');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (9,'1_2/','uploads/image/chat/1_2/20171101155942-1509532182-692000394.jpg','','2017-11-01 15:59:42');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (10,'1_2/','uploads/image/chat/1_2/20171101160155-1509532315-2092607668.jpg','','2017-11-01 16:01:55');
insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (11,'1_2/','../../uploads/image/chat/1_2/20171101160439-1509532479-273818523.jpg','','2017-11-01 16:04:39');

/*Table structure for table `email_phone` */

DROP TABLE IF EXISTS `email_phone`;

CREATE TABLE `email_phone` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `email_phone` */

insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (1,'rajesh1may@gmail.com','2342423423423','2017-11-13 19:26:44');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (2,'rajesh1may@gmail.com','7777777777777','2017-11-13 19:27:25');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (3,'ramesh@ramesh.com','3423412342','2017-11-13 19:44:47');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (4,'','','2017-11-13 19:45:12');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (5,'','','2017-11-13 19:47:45');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (6,'','','2017-11-13 19:47:52');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (7,'ramesh@ramesh.com','','2017-11-13 20:17:29');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (8,'haya.yaseen.27@gmail.com','','2017-11-14 02:00:30');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (9,'test@dsadfsadfsa.com','','2017-11-14 12:03:12');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (10,'nisan@hotmail.com','','2017-11-14 12:03:55');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (11,'','00970598606821','2017-11-14 17:21:49');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (12,'s_moon_09@yahoo.com','','2017-11-14 18:14:11');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (13,'ali_aldossri@hotmail.com','00966569412296','2017-11-14 18:25:08');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (14,'','972599797433','2017-11-14 20:09:41');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (15,'ahm_266@hotmail.com','008615564892023','2017-11-14 20:13:54');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (16,'samidzeidat@gmail.com','00970598559368','2017-11-16 01:37:00');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (17,'mustafa.e.s.shat@gmail.com','00972597653314','2017-11-16 01:47:59');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (18,'mustafa.e.s.shat@gmail.com','00970597653314','2017-11-16 01:48:25');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (19,'sjohar2010@gmail.com','0046737241870','2017-11-16 02:00:03');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (20,'walaa.96.wm@gmail.com','','2017-11-16 03:49:27');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (21,'','+972549956552','2017-11-16 06:34:19');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (22,'','+972549956552','2017-11-16 06:34:45');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (23,'','0598173519','2017-11-16 15:06:58');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (24,'rone4.ksar@gmail.com','','2017-11-16 19:17:14');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (25,'ibraheemkisswani010@gmail.com','','2017-11-16 21:23:52');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (26,'Alzmzn@hotmail.com','','2017-11-17 03:53:28');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (27,'Alzmzn@hotmail.com','00966503503077','2017-11-17 03:55:25');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (28,'','00966503503077','2017-11-17 03:57:19');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (29,'ibraheemkisswani010@gmail.com','970539669254','2017-11-17 17:54:59');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (30,'','972527348346','2017-11-18 01:03:08');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (31,'ranin2000paris@hotmail.com','','2017-11-18 13:25:35');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (32,'meme_1997jun2013@hotmail.com','','2017-11-18 14:53:23');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (33,'meme_1997jun2013@hotmail.com','','2017-11-18 14:53:40');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (34,'yazan.alshaikhhussein@gmail.com','00970598241088','2017-11-21 03:33:20');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (35,'ali_aldossri@hotmail.com','','2017-11-21 18:40:33');
insert  into `email_phone`(`id`,`email`,`phone`,`created_on`) values (36,'tamimi_96@yahoo','00972595985027','2017-11-22 02:12:58');

/*Table structure for table `like_emotion_type` */

DROP TABLE IF EXISTS `like_emotion_type`;

CREATE TABLE `like_emotion_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `like_emotion_type` */

insert  into `like_emotion_type`(`id`,`name`,`path`,`status`) values (1,'Like','like.png',1);
insert  into `like_emotion_type`(`id`,`name`,`path`,`status`) values (2,'Love','love.png',1);
insert  into `like_emotion_type`(`id`,`name`,`path`,`status`) values (3,'HaHa','happy.png',1);
insert  into `like_emotion_type`(`id`,`name`,`path`,`status`) values (4,'Wow','wow.png',1);
insert  into `like_emotion_type`(`id`,`name`,`path`,`status`) values (5,'Sad','sad.png',1);
insert  into `like_emotion_type`(`id`,`name`,`path`,`status`) values (6,'Angry','angry.png',1);

/*Table structure for table `live_video` */

DROP TABLE IF EXISTS `live_video`;

CREATE TABLE `live_video` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `live_video_key` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `started_on` datetime NOT NULL,
  `end_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `live_video` */

insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (1,'112c1865230f4443c8f1',1,'2017-12-01 12:27:38','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (2,'57521903448e14012287',13,'2017-12-01 12:44:47','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (3,'9ab11039b41681822b40',13,'2017-12-01 12:49:14','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (4,'84d214eb846156951423',13,'2017-12-01 12:50:59','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (5,'17320712425ce1701280',13,'2017-12-01 12:54:17','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (6,'251967e38a30a351c46c',13,'2017-12-01 12:54:54','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (7,'19e716656d4b905143f8',13,'2017-12-01 12:59:55','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (8,'e8373e31d11359343037',13,'2017-12-01 13:00:46','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (9,'0465520978fd51385b20',13,'2017-12-01 13:17:33','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (10,'6109150462e910210186',13,'2017-12-01 13:18:23','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (11,'1994af4c423c45310212',15,'2017-12-01 19:18:33','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (12,'7a12565289b5755b5191',22,'2017-12-01 19:37:04','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (13,'1ce8b54d5adc01674986',22,'2017-12-01 20:43:51','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (14,'9d7e223096ac80509e2f',13,'2017-12-02 16:40:01','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (15,'27db635730a407895430',13,'2017-12-02 21:31:09','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (16,'751536f426d0f0c2a071',13,'2017-12-02 21:31:44','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (17,'1afd21f25081513c1e07',17,'2017-12-02 21:32:08','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (18,'280484425c28f3782612',22,'2017-12-03 18:27:41','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (19,'059069d487efd136515c',15,'2017-12-04 14:01:31','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (20,'70165350d7d6974c1716',15,'2017-12-04 14:02:41','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (21,'71761502435268258270',15,'2017-12-04 14:04:13','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (22,'b01497c11f2da5761227',15,'2017-12-04 14:04:34','0000-00-00 00:00:00');
insert  into `live_video`(`id`,`live_video_key`,`user_id`,`started_on`,`end_on`) values (23,'21131f746911b5485554',15,'2017-12-04 19:04:23','0000-00-00 00:00:00');

/*Table structure for table `live_video_comments` */

DROP TABLE IF EXISTS `live_video_comments`;

CREATE TABLE `live_video_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `live_video_id` bigint(20) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `live_video_comments` */

/*Table structure for table `live_video_joined` */

DROP TABLE IF EXISTS `live_video_joined`;

CREATE TABLE `live_video_joined` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `live_video_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `joined_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `live_video_joined` */

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `friend_id` bigint(20) unsigned NOT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `message_type` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `video_length` varchar(200) DEFAULT NULL,
  `message_text` text NOT NULL,
  `sent_on` datetime NOT NULL,
  `deleted_y_n` int(11) DEFAULT '0',
  `received_on` datetime NOT NULL,
  `seen_on` datetime NOT NULL,
  `received_y_n` int(11) NOT NULL DEFAULT '0',
  `seen_y_n` int(11) NOT NULL DEFAULT '0',
  `firekey` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `messages` */

insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (1,13,23,0,'text',NULL,NULL,'0','0','hi','2017-12-02 12:09:05',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-KwmTtStTEZHYHPb4y');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (2,13,23,0,'text',NULL,NULL,'0','0','hello','2017-12-02 12:09:09',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-KwnURjZSv2cTyZ0jj');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (3,23,13,0,'text',NULL,NULL,'0','0','kello','2017-12-02 12:24:53',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-L-OxrCG26CsCAp79n');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (4,23,13,0,'text',NULL,NULL,'0','0','kaise ho','2017-12-02 12:24:59',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-L-QSX5OJqpnorKpJs');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (5,23,13,0,'text',NULL,NULL,'0','0','or kha ho','2017-12-02 12:25:06',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-L-SAbEx1AVVe4Ci3z');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (6,13,23,0,'text',NULL,NULL,'0','0','hikjn','2017-12-02 14:57:35',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-LYLr6ZbEbRd-3vLS6');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (7,13,23,0,'text',NULL,NULL,'0','0','hellasdc','2017-12-02 15:01:08',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-LZ9nCfd2CvKXdy7vU');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (8,23,13,0,'image',NULL,NULL,'0','12345','Hello how do you do','2017-12-02 15:01:24',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (9,23,13,0,'text',NULL,NULL,'0','12345','Hello how do you do','2017-12-02 15:01:46',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (10,23,13,0,'image','20171202184209-1512220329-IMAGE-1681930147-1580455600.jpg',NULL,'0','0','','2017-12-02 18:42:09',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-MLjYpANad9XROzwz8');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (11,23,13,0,'text',NULL,NULL,'0','0','hi','2017-12-04 10:27:17',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-Usekyj8JXB6e5HChH');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (12,22,23,0,'text',NULL,NULL,'0','0','hi','2017-12-04 10:28:57',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-Ut1kTXAiU8ZXZ4zI3');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (13,23,13,0,'text',NULL,NULL,'0','12345','test 23','2017-12-04 11:59:49',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (14,13,23,0,'text',NULL,NULL,'0','12345','test 13','2017-12-04 12:00:24',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (15,15,23,0,'text',NULL,NULL,'0','0','???','2017-12-04 19:05:22',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-WjEvsn6Bfm9xehfaC');
insert  into `messages`(`id`,`user_id`,`friend_id`,`group_id`,`message_type`,`path`,`thumbnail`,`size`,`video_length`,`message_text`,`sent_on`,`deleted_y_n`,`received_on`,`seen_on`,`received_y_n`,`seen_y_n`,`firekey`) values (16,15,23,0,'text',NULL,NULL,'0','0','test','2017-12-04 19:05:27',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'-L-WjG8oyE12i3Z6sGXV');

/*Table structure for table `messages_delete` */

DROP TABLE IF EXISTS `messages_delete`;

CREATE TABLE `messages_delete` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `friend_id` bigint(20) unsigned NOT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `message_type` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `video_length` varchar(200) DEFAULT NULL,
  `message_text` text NOT NULL,
  `sent_on` datetime NOT NULL,
  `deleted_y_n` int(11) DEFAULT '0',
  `received_on` datetime NOT NULL,
  `seen_on` datetime NOT NULL,
  `received_y_n` int(11) NOT NULL DEFAULT '0',
  `seen_y_n` int(11) NOT NULL DEFAULT '0',
  `firekey` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `messages_delete` */

/*Table structure for table `photo_albums` */

DROP TABLE IF EXISTS `photo_albums`;

CREATE TABLE `photo_albums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(200) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `photo_albums` */

/*Table structure for table `photo_comments` */

DROP TABLE IF EXISTS `photo_comments`;

CREATE TABLE `photo_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `photo_id` bigint(20) unsigned NOT NULL,
  `comment` text NOT NULL,
  `comment_on` datetime NOT NULL,
  `delete_yes_no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `photo_comments` */

/*Table structure for table `photo_likes` */

DROP TABLE IF EXISTS `photo_likes`;

CREATE TABLE `photo_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `like_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `photo_id` bigint(20) unsigned NOT NULL,
  `like_type` int(11) NOT NULL,
  `liked_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `photo_likes` */

/*Table structure for table `photoes` */

DROP TABLE IF EXISTS `photoes`;

CREATE TABLE `photoes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `photoes` */

/*Table structure for table `user_ask_questions` */

DROP TABLE IF EXISTS `user_ask_questions`;

CREATE TABLE `user_ask_questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `question_text` text NOT NULL,
  `asked_on` datetime NOT NULL,
  `asked_by` bigint(20) NOT NULL,
  `public_or_private` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `user_ask_questions` */

insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (1,1,'First Question','2017-11-15 05:13:21',2,'1');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (2,1,'Second Question','2017-11-16 07:19:34',3,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (3,1,'What is my question?','2017-11-16 14:48:29',4,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (4,1,'What is my question?','2017-11-16 16:15:07',4,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (5,1,'What is my question?','2017-11-16 18:48:44',4,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (6,1,'What is my question?','2017-11-16 18:50:08',4,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (7,1,'Checking the questions?','2017-11-18 17:08:36',13,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (8,1,'Checking new Question','2017-11-18 17:16:50',13,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (9,15,'this is my first question','2017-11-18 18:06:38',23,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (10,22,'dghh','2017-11-19 01:06:15',22,'1');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (11,15,'jfdgd','2017-11-24 19:34:26',15,'0');
insert  into `user_ask_questions`(`id`,`user_id`,`question_text`,`asked_on`,`asked_by`,`public_or_private`) values (12,23,'r7ruddjd','2017-11-27 14:06:57',23,'1');

/*Table structure for table `user_ask_questions_answers` */

DROP TABLE IF EXISTS `user_ask_questions_answers`;

CREATE TABLE `user_ask_questions_answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) NOT NULL,
  `answer_text` text NOT NULL,
  `answered_on` datetime NOT NULL,
  `answered_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `user_ask_questions_answers` */

insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (1,1,'First Answer','2017-11-16 07:24:35',4);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (2,1,'First Second Answer','2017-11-16 06:12:24',0);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (3,1,'This is my third answer','2017-11-16 15:54:47',1);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (4,1,'Hello this is reply by rajesh','2017-11-18 16:57:40',0);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (5,1,'Hello this is reply by rajesh','2017-11-18 16:58:37',0);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (6,1,'Hello this is reply by rajesh','2017-11-18 16:59:32',1);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (7,8,'answering question','2017-11-18 17:35:29',13);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (8,8,'asdcsdac','2017-11-18 17:39:55',13);
insert  into `user_ask_questions_answers`(`id`,`question_id`,`answer_text`,`answered_on`,`answered_by`) values (9,7,'casdcds','2017-11-18 17:40:02',13);

/*Table structure for table `user_ask_questions_answers_likes` */

DROP TABLE IF EXISTS `user_ask_questions_answers_likes`;

CREATE TABLE `user_ask_questions_answers_likes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `answer_id` bigint(20) NOT NULL,
  `liked_by` bigint(20) NOT NULL,
  `liked_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user_ask_questions_answers_likes` */

insert  into `user_ask_questions_answers_likes`(`id`,`answer_id`,`liked_by`,`liked_on`) values (1,1,1,'2017-11-16 10:09:08');

/*Table structure for table `user_ask_questions_likes` */

DROP TABLE IF EXISTS `user_ask_questions_likes`;

CREATE TABLE `user_ask_questions_likes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) NOT NULL,
  `liked_by` bigint(20) NOT NULL,
  `liked_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `user_ask_questions_likes` */

insert  into `user_ask_questions_likes`(`id`,`question_id`,`liked_by`,`liked_on`) values (1,1,1,'2017-11-16 08:21:25');
insert  into `user_ask_questions_likes`(`id`,`question_id`,`liked_by`,`liked_on`) values (2,1,2,'2017-11-16 07:17:17');

/*Table structure for table `user_devices` */

DROP TABLE IF EXISTS `user_devices`;

CREATE TABLE `user_devices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `device_token_id` text NOT NULL,
  `device_name` text,
  `added_on` datetime NOT NULL,
  `device_os` varchar(200) DEFAULT NULL,
  `lant` varchar(200) DEFAULT NULL,
  `long` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `logged_in_on` datetime NOT NULL,
  `logged_out_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

/*Data for the table `user_devices` */

insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (1,2,'','','2017-11-01 17:05:27','','0.0','0.0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (2,2,'','','2017-11-01 17:10:42','android','0.0','0.0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (3,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-01 17:47:51','android','0.0','0.0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (4,3,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:35:36','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-15 17:28:55');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (5,3,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:37:30','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-15 17:28:55');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (6,4,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:45:22','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (7,6,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:53:13','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (8,7,'DemoToken','','2017-11-03 15:47:51','','28.6351305','77.2807421',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (9,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-03 17:32:36','android','28.627542','77.37238',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (10,7,'DemoToken','','2017-11-03 18:13:22','','28.6351305','77.2807421',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (11,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 10:17:27','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (12,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 11:12:39','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (13,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 11:23:32','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (14,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 12:23:33','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (15,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 12:29:25','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (16,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 12:35:23','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (17,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 13:32:58','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (18,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 13:40:57','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (19,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-06 11:59:43','android','28.627542','77.37238',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (20,8,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 12:53:14','android','28.627542','77.37238',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (21,2,'','OnePlus A0001 6.0.1 LOLLIPOP_MR1','2017-11-07 13:38:37','android','28.6274823','77.3723576',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (22,8,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 13:39:12','android','28.627542','77.37238',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (23,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 14:56:17','android','28.6274584','77.3723582',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (24,9,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-07 14:58:06','android','28.6274414','77.3723565',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (25,3,'','Sony D5322 5.1.1 LOLLIPOP','2017-11-07 16:56:43','android','28.6275196','77.37238',1,'0000-00-00 00:00:00','2017-11-15 17:28:55');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (26,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:03:31','android','28.6274717','77.3723618',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (27,10,'','LGE LG-H850 7.0 M','2017-11-07 17:08:26','android','','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (28,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:11:31','android','28.6274733','77.372362',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (29,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:13:15','android','28.6274907','77.3723623',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (30,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:14:26','android','28.6274783','77.3723612',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (31,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:16:29','android','28.6274738','77.3723614',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (32,3,'','Google Android SDK built for x86 7.0 M','2017-11-08 10:29:06','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-15 17:28:55');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (33,3,'','Google Android SDK built for x86 7.0 M','2017-11-08 11:41:05','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-15 17:28:55');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (34,3,'dUkEs_P5o54:APA91bGW47Px-dvmfwfRnd-zp1r_wI-CLj75GEy8RdQuBxB7SmKd8k_q_zzMKr6pYvwKXzqZtNSGWTdDvcG8Wa6dRU0qrLfZuzwXiRRNphFwWnJInsYy1CM1Jxoa0XZpCQjn2_JpQjdv','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-11-08 12:39:13','android','','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (35,2,'cv0gHY-olJI:APA91bFNGEboJ3HuuTlCowXr9ZdhEZOUAL8Po78klGkBqa70g7jOv-n7UL4MmQXY4FlWVn0JTWrQ4N3wNIg0ykcF9TQATHYX5b7TprOLFrrqVA9FejZ9rqUAOrLojNbHzf4HkvcDmNQK','Motorola Moto G4 Plus 7.1.2 N','2017-11-08 12:40:21','android','28.6274537','77.3723546',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (36,3,'d9GdZoEdgO8:APA91bEFqOBKWqMfaloEx_Ue4DOGbi0TUBUb5aLV1_UhYWkLlFtIrYcfIJJAhWl-BoTOh1lYFeDLYvjpUzrs8ZEFwsu2bxQn6WLuCvETvGbygi5y6du3q-z7usgFrhfwP_UDsMcaaQ1T','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-11-08 12:56:31','android','28.6255519','77.3670759',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (37,3,'','Google Android SDK built for x86 7.0 M','2017-11-10 11:37:12','android','0.0','0.0',1,'0000-00-00 00:00:00','2017-11-15 17:28:55');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (38,2,'','Google Android SDK built for x86 7.0 M','2017-11-10 11:48:15','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (39,3,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-10 14:52:26','android','28.6274898','77.3723869',1,'0000-00-00 00:00:00','2017-11-15 17:28:55');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (40,13,'','Google Android SDK built for x86 7.0 M','2017-11-11 23:42:46','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (41,13,'','Google Android SDK built for x86 7.0 M','2017-11-12 00:10:30','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (42,13,'','Google Android SDK built for x86 7.0 M','2017-11-12 00:14:42','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (43,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-12 00:25:57','android','28.6437414','77.3584634',1,'0000-00-00 00:00:00','2017-11-16 19:18:08');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (44,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-12 00:27:02','android','28.6437414','77.3584634',1,'0000-00-00 00:00:00','2017-11-16 19:18:08');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (45,13,'','Google Android SDK built for x86 7.0 M','2017-11-12 12:00:45','android','77.21707333333333','28.527924999999996',1,'0000-00-00 00:00:00','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (46,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-12 12:03:36','android','28.6392234','77.3635887',1,'0000-00-00 00:00:00','2017-11-16 19:18:08');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (47,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-12 12:09:33','android','28.6390888','77.3636606',1,'0000-00-00 00:00:00','2017-11-16 19:18:08');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (48,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-12 12:13:18','android','28.6388174','77.3637299',1,'0000-00-00 00:00:00','2017-11-16 19:18:08');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (49,17,'','Xiaomi Redmi 4 7.1.2 N','2017-11-12 14:16:53','android','28.5319516','77.215546',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (50,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-13 11:39:44','android','28.6258696','77.3742525',1,'0000-00-00 00:00:00','2017-11-16 19:18:08');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (51,21,'','Google Android SDK built for x86 8.0.0 N_MR1','2017-11-15 11:26:10','android','0.0','0.0',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (52,21,'','GIONEE P2 4.2.2 JELLY_BEAN_MR1','2017-11-15 12:35:40','android','28.6277629','77.3728216',1,'2017-11-15 12:35:40','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (53,13,'','Google Android SDK built for x86 7.0 M','2017-11-15 14:57:51','android','77.21707333333333','28.527924999999996',1,'2017-11-15 14:57:51','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (54,13,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-15 16:57:59','android','28.6274823','77.3723591',1,'2017-11-15 16:57:59','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (55,13,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-15 17:28:42','android','28.6274821','77.3723565',1,'2017-11-15 17:28:42','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (56,22,'d9GdZoEdgO8:APA91bEFqOBKWqMfaloEx_Ue4DOGbi0TUBUb5aLV1_UhYWkLlFtIrYcfIJJAhWl-BoTOh1lYFeDLYvjpUzrs8ZEFwsu2bxQn6WLuCvETvGbygi5y6du3q-z7usgFrhfwP_UDsMcaaQ1T','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-11-15 17:29:44','android','28.6261427','77.368325',1,'2017-11-15 17:29:44','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (57,13,'','Google Android SDK built for x86 7.0 M','2017-11-16 15:09:26','android','77.21707333333333','28.527924999999996',1,'2017-11-16 15:09:26','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (58,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-16 19:17:44','android','28.6424288','77.3559512',1,'2017-11-16 19:17:44','2017-11-16 19:18:08');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (59,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-16 19:18:36','android','28.6405487','77.3588222',1,'2017-11-16 19:18:36','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (60,23,'','Sony D5322 5.1.1 LOLLIPOP','2017-11-17 18:13:56','android','28.6274479','77.3723456',1,'2017-11-17 18:13:56','2017-11-18 18:00:29');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (61,13,'','Google Android SDK built for x86 7.0 M','2017-11-18 12:13:52','android','77.21707333333333','28.527924999999996',1,'2017-11-18 12:13:52','2017-11-18 12:20:02');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (62,13,'','Google Android SDK built for x86 7.0 M','2017-11-18 12:25:32','android','77.21707333333333','28.527924999999996',1,'2017-11-18 12:25:32','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (63,23,'','Sony D5322 5.1.1 LOLLIPOP','2017-11-18 18:00:52','android','28.6274479','77.3723456',1,'2017-11-18 18:00:52','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (64,11,'','Xiaomi Redmi Note 4 7.0 M','2017-11-18 18:23:44','android','28.6275075','77.372369',1,'2017-11-18 18:23:44','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (65,22,'','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-11-18 18:26:43','android','28.6274619','77.3723557',1,'2017-11-18 18:26:43','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (66,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-18 18:28:58','android','28.6262281','77.3742525',1,'2017-11-18 18:28:58','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (67,13,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-20 11:46:25','android','28.6274947','77.3723512',1,'2017-11-20 11:46:25','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (68,26,'','motorola XT1022 5.1 LOLLIPOP','2017-11-21 12:15:36','android','28.6275127','77.3723466',1,'2017-11-21 12:15:36','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (69,13,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-22 11:21:07','android','28.6275132','77.3723461',1,'2017-11-22 11:21:07','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (70,23,'','Sony D5322 5.1.1 LOLLIPOP','2017-11-24 08:07:31','android','28.6337207','77.4937144',1,'2017-11-24 08:07:31','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (71,23,'','Sony D5322 5.1.1 LOLLIPOP','2017-11-24 19:27:04','android','28.6275384','77.3723468',1,'2017-11-24 19:27:04','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (72,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-24 19:32:50','android','28.6262281','77.3742525',1,'2017-11-24 19:32:50','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (73,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-24 21:23:49','android','28.6399471','77.3638463',1,'2017-11-24 21:23:49','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (74,13,'','Google Android SDK built for x86 7.0 M','2017-11-28 14:01:55','android','77.21707333333333','28.527924999999996',1,'2017-11-28 14:01:55','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (75,13,'','Google Android SDK built for x86 7.0 M','2017-11-28 14:26:31','android','77.21707333333333','28.527924999999996',1,'2017-11-28 14:26:31','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (76,13,'c2cxlBdwZHg:APA91bHzsRCAnYty5ICF96KIBRL1fa6oSDWYUIKAdKK6inuR80WvUPh2IW4RbWY221aBKn7C8sARKM9xK1HR5u0yv24xfgXuOLoHH306Wi5i6qKueCxQwh5wJlzSvITjtM64VblFn9uP','Google Android SDK built for x86 7.0 M','2017-11-28 14:37:59','android','77.21707333333333','28.527924999999996',1,'2017-11-28 14:37:59','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (77,23,'','Sony D5322 5.1.1 LOLLIPOP','2017-11-28 15:38:19','android','28.6275111','77.3723462',1,'2017-11-28 15:38:19','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (78,23,'fUXhXiu6x10:APA91bF2-cpJ83Lv7lWphRhdMCZ9Z3cxapkWW_lNMNKRbOajhDVROEfuiKGrmgN0F4klEle9cqq76qz214BavIM7DYlGBQLkDqOzo1O6LebYVODVqNhTKLxhNADueelHSqVOdi4qvV_X','Sony D5322 5.1.1 LOLLIPOP','2017-11-28 15:48:09','android','28.6275258','77.3723376',1,'2017-11-28 15:48:09','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (79,27,'eYrmQNAp6-s:APA91bFTpX1_-OH3inMqq0CjxS4_Psmsgg-iJYkeCS4aWuVwCyA-YHySGm-xWcSQXghVK3RJa0djv8gJQUMVqCkl45Om24bpJIcc7-PpoRldl7-Vb6zm1Hx-jpf1nnVwB15Dj23LWieK','Motorola Moto G4 Plus 7.1.2 N','2017-11-28 16:38:41','android','28.6274943','77.3723457',1,'2017-11-28 16:38:41','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (80,15,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-28 19:46:33','android','26.0602322','80.6396572',1,'2017-11-28 19:46:33','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (81,11,'elxQfH8AdIU:APA91bH9NzjGDOCgZKGB2jsCIaM8P7yR93Bq6SBak1DkoWTrn7AGr5BAMTahWc63BI23s-LEYeM83aBXTi2vK_jbJGbbDP6F54NYdlb9cpI4xKiI5_pf9GmT7RV2BWlEmjp6USV8fD4h','Xiaomi Redmi Note 4 7.0 M','2017-11-29 11:48:09','android','28.6274959','77.3723487',1,'2017-11-29 11:48:09','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (82,15,'dM1Rv5OjBj4:APA91bFKYRgY5ifEASNmNR_KsLv_sE9etYdwk8v6TLoX_cFkl6IKLLLXsr0u_c4sASqAwVHNdPqnsZ3Yxkn4NGNu6b_4SXKjb6TMtoJv1A7k_m75883hzYwIsuRDl6zA090P5Lak5OK9','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-29 17:45:51','android','28.6275219','77.3723658',1,'2017-11-29 17:45:51','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (83,13,'evNddZqju3s:APA91bGqR4F_8mzgLGLCrIXg0nOyKtMI-2N2jFLhb_LKlA8pHdaKR1hwdrA3MV21UoBVzkH3US5y5D2X9aBxcyD3VfhvG-A-6wS_V368LmmBWWvRCMhiqh61Rmx8AikiSkxUiuORsQvi','Motorola Moto G4 Plus 7.1.2 N','2017-11-30 11:18:10','android','28.6275034','77.3723542',1,'2017-11-30 11:18:10','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (84,22,'','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-12-01 11:17:12','android','28.6275051','77.3723572',1,'2017-12-01 11:17:12','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (85,23,'c8Su0j3ZTDo:APA91bGcIIjgVxGefdCRRsDCT-J-f0QPT3pDF3dlVIszY2QoYpDVvBYOF8Nw05JpyuhJIS3yly1cXVSkD4h2NY0a2IBc2Dr4r7hfTPDQ-ZheZiEotZIKQMTQpzN5vQddRNCD4HqrkTot','Sony D5322 5.1.1 LOLLIPOP','2017-12-01 12:01:14','android','28.627493','77.3723496',1,'2017-12-01 12:01:14','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (86,13,'fcoimWlpZVk:APA91bHg5Pb4EPYGqrIf-cj0CRy_v23R6nd1NUSXzj86IWWluRtXVuWhI1ahSFMKtSZn3EW1IbjzfNrAWdeDOyVFBlPd2cToHetWrjlo3eIOiLJpzm8Vn621grDlGgX9c7qzPSRbxDcj','Google Android SDK built for x86 7.0 M','2017-12-01 17:03:57','android','77.21707333333333','28.527924999999996',1,'2017-12-01 17:03:57','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (87,22,'cS1I9cxZ040:APA91bE_qNBKv20CPfGzhP3V8_trAz1dWcvJ1yr8_VNIuWRyCbnPOU-d5I5lehJA5JY4sqV3yPDf1raXjZ5Co0GBH5_ELThXr4sP8Ne-GyH9j6aafU4Ak6FrUtvRdPIfnqLNZthDBmeb','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-12-01 19:34:43','android','28.6388996','77.3347956',1,'2017-12-01 19:34:43','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (88,22,'dKNBgX14S_c:APA91bHMmvvnFy6-96MTPwZDhsnpNXwpjbgmAZW_eSKF2n_-06M_4vuCrYhkhkYt5zVLwxFqt38eCja5UyB4tkVpYS4N1Lu-fXc4FIlwxRynNIxIfnmCGmv-sLcfoTuY8Xj42o6ja2lg','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-12-02 15:56:18','android','28.6388974','77.3347856',1,'2017-12-02 15:56:18','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (89,17,'','Xiaomi Redmi 4 7.1.2 N','2017-12-02 21:30:26','android','28.5318702','77.215195',1,'2017-12-02 21:30:26','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (90,22,'dDQa66wFUkc:APA91bGvyQksBNkIkQYoYtcBlDYGsUI6U2zX4W81omPni0MT5t0Impl5kO-HaT_d8X5YiYe4TkwC7OsAl_XLNzN9TNGIkHaK5-otUQulewBB1NTHIpcnCiI-9UyKjD4Xyk9BEeWhdau2','motorola XT1225 6.0.1 LOLLIPOP_MR1','2017-12-05 19:41:13','android','28.6389007','77.3347906',1,'2017-12-05 19:41:13','0000-00-00 00:00:00');
insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`,`logged_in_on`,`logged_out_on`) values (91,26,'fILs_ciChmY:APA91bHDCG5eoa21f0gyltx12XrZ9MZzNPbGVtx6s547K7dqKHvSWdwORCvhJDxGNpEqgnkCHH2w6JUSgc7zzX0SfMc83AOUJ1kMDPcM32-E5-j4LkzO2GdxQwIt1Re3ofLan95HvsLY','motorola XT1022 5.1 LOLLIPOP','2017-12-07 11:50:32','android','28.6274915','77.3723801',1,'2017-12-07 11:50:32','0000-00-00 00:00:00');

/*Table structure for table `user_follows` */

DROP TABLE IF EXISTS `user_follows`;

CREATE TABLE `user_follows` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `follow_on` datetime NOT NULL,
  `privacy_hide` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

/*Data for the table `user_follows` */

insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (1,1,3,'2017-11-01 18:29:36',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (2,1,4,'2017-10-19 10:15:35',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (6,2,1,'2017-11-04 15:40:22',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (7,1,5,'2017-11-04 15:52:03',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (8,8,1,'2017-11-07 12:53:39',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (9,3,2,'2017-11-07 16:59:35',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (10,2,3,'2017-11-08 10:31:23',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (12,15,13,'2017-11-14 00:11:25',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (14,21,3,'2017-11-15 12:40:58',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (16,22,13,'2017-11-15 17:38:37',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (18,15,1,'2017-11-17 19:15:23',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (19,15,23,'2017-11-17 19:16:55',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (23,23,15,'2017-11-18 10:24:36',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (24,23,17,'2017-11-18 17:59:06',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (25,23,1,'2017-11-18 17:59:13',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (26,23,10,'2017-11-18 17:59:13',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (27,23,11,'2017-11-18 17:59:15',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (28,23,18,'2017-11-18 17:59:15',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (29,23,2,'2017-11-18 17:59:16',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (30,23,4,'2017-11-18 17:59:17',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (31,23,24,'2017-11-18 17:59:17',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (32,23,16,'2017-11-18 17:59:18',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (33,23,5,'2017-11-18 17:59:19',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (34,23,14,'2017-11-18 17:59:20',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (35,23,12,'2017-11-18 17:59:22',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (37,23,9,'2017-11-18 17:59:23',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (38,23,6,'2017-11-18 17:59:24',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (39,23,20,'2017-11-18 17:59:27',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (40,23,7,'2017-11-18 17:59:28',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (41,22,24,'2017-11-18 21:06:27',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (42,22,3,'2017-11-18 21:06:29',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (44,15,10,'2017-11-20 10:46:51',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (49,22,17,'2017-11-27 19:46:39',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (50,22,21,'2017-11-28 10:49:16',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (52,27,13,'2017-11-28 16:39:02',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (53,11,23,'2017-11-28 18:01:48',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (54,11,27,'2017-11-29 17:10:43',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (68,13,11,'2017-12-02 14:43:25',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (70,17,13,'2017-12-02 21:30:48',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (71,13,15,'2017-12-04 14:02:25',0);
insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (72,13,22,'2017-12-05 14:43:40',0);

/*Table structure for table `user_friends` */

DROP TABLE IF EXISTS `user_friends`;

CREATE TABLE `user_friends` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `requested_on` datetime NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT '0',
  `accepted_on` datetime NOT NULL,
  `accepted_type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_friends` */

/*Table structure for table `user_group_members` */

DROP TABLE IF EXISTS `user_group_members`;

CREATE TABLE `user_group_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_group_members` */

/*Table structure for table `user_groups` */

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_groups` */

/*Table structure for table `user_likes` */

DROP TABLE IF EXISTS `user_likes`;

CREATE TABLE `user_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `friend_id` bigint(20) unsigned NOT NULL,
  `matched_y_n` int(11) NOT NULL DEFAULT '0',
  `liked_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `user_likes` */

insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (1,13,11,0,'2017-12-02 13:42:42');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (2,13,2,0,'2017-12-02 13:42:52');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (3,13,15,0,'2017-12-02 13:42:53');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (4,13,23,1,'2017-12-02 13:42:53');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (5,22,21,0,'2017-12-02 16:03:31');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (6,23,6,0,'2017-12-04 10:37:30');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (7,23,15,0,'2017-12-04 10:37:31');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (8,23,2,0,'2017-12-04 10:37:31');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (9,23,3,0,'2017-12-04 10:37:32');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (10,23,7,0,'2017-12-04 10:37:34');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (11,23,13,1,'2017-12-04 10:37:35');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (12,23,22,0,'2017-12-04 10:37:37');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (13,23,11,0,'2017-12-04 10:37:40');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (14,23,26,0,'2017-12-05 11:43:00');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (15,23,27,0,'2017-12-05 11:43:03');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (16,23,4,0,'2017-12-05 11:43:11');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (17,23,8,0,'2017-12-05 11:43:13');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (18,23,9,0,'2017-12-05 11:45:39');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (19,23,10,0,'2017-12-05 11:45:41');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (20,22,18,0,'2017-12-05 14:37:27');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (21,23,29,0,'2017-12-06 10:15:43');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (22,23,17,0,'2017-12-06 10:15:44');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (23,23,5,0,'2017-12-06 10:17:32');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (24,23,18,0,'2017-12-06 10:17:36');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (25,23,31,0,'2017-12-06 10:17:38');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (26,23,16,0,'2017-12-06 10:17:39');
insert  into `user_likes`(`id`,`user_id`,`friend_id`,`matched_y_n`,`liked_on`) values (27,23,28,0,'2017-12-06 10:17:42');

/*Table structure for table `user_meet_pics` */

DROP TABLE IF EXISTS `user_meet_pics`;

CREATE TABLE `user_meet_pics` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `user_meet_pics` */

insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (8,13,'20171205130738PM-1512459458-MEET-1097476463.jpg','2017-12-05 13:07:38');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (9,13,'20171205130805PM-1512459485-MEET-691213536.png','2017-12-05 13:08:05');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (10,13,'20171205130805PM-1512459485-MEET-1131104588.png','2017-12-05 13:08:06');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (11,13,'20171205130806PM-1512459486-MEET-1379788945.jpg','2017-12-05 13:08:06');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (12,13,'20171205130806PM-1512459486-MEET-447709612.jpg','2017-12-05 13:08:06');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (13,22,'20171205143703PM-1512464823-MEET-1956347904.jpg','2017-12-05 14:37:03');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (14,22,'20171205143703PM-1512464823-MEET-1930704115.jpg','2017-12-05 14:37:03');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (15,22,'20171205143715PM-1512464835-MEET-701282176.png','2017-12-05 14:37:15');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (16,22,'20171205143715PM-1512464835-MEET-1890650678.png','2017-12-05 14:37:15');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (17,23,'20171206101634AM-1512535594-MEET-1477485838.jpg','2017-12-06 10:16:34');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (18,23,'20171206101634AM-1512535594-MEET-1609457545.JPG','2017-12-06 10:16:34');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (19,23,'20171206101650AM-1512535610-MEET-1237442232.jpg','2017-12-06 10:16:50');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (20,23,'20171206101650AM-1512535610-MEET-1250562999.jpg','2017-12-06 10:16:50');
insert  into `user_meet_pics`(`id`,`user_id`,`image`,`added_on`) values (21,23,'20171206101650AM-1512535610-MEET-20382209.jpg','2017-12-06 10:16:50');

/*Table structure for table `user_profile_view` */

DROP TABLE IF EXISTS `user_profile_view`;

CREATE TABLE `user_profile_view` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `viewed_user_id` bigint(20) NOT NULL,
  `viewed_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

/*Data for the table `user_profile_view` */

insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (1,23,11,'2017-11-20 14:29:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (2,23,11,'2017-11-20 14:29:26');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (3,23,1,'2017-11-20 14:29:42');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (4,23,1,'2017-11-20 14:47:39');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (5,11,1,'2017-11-20 14:53:51');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (6,23,15,'2017-11-20 15:48:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (7,13,23,'2017-11-20 16:18:04');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (8,13,23,'2017-11-20 16:19:29');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (9,13,23,'2017-11-20 16:19:40');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (10,13,23,'2017-11-20 16:19:46');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (11,13,15,'2017-11-20 16:19:52');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (12,13,15,'2017-11-20 16:20:32');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (13,13,15,'2017-11-20 16:25:18');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (14,13,23,'2017-11-20 18:35:33');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (15,13,23,'2017-11-20 18:36:23');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (16,13,23,'2017-11-20 18:36:30');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (17,13,23,'2017-11-20 18:36:59');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (18,23,1,'2017-11-20 20:31:07');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (19,23,1,'2017-11-20 20:31:20');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (20,23,1,'2017-11-20 20:31:23');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (21,23,1,'2017-11-20 20:31:28');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (22,23,1,'2017-11-20 20:32:32');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (23,23,1,'2017-11-20 20:32:45');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (24,23,1,'2017-11-20 20:32:53');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (25,23,1,'2017-11-20 20:32:56');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (26,15,23,'2017-11-22 10:39:40');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (27,13,23,'2017-11-22 14:24:44');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (28,13,1,'2017-11-22 14:31:00');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (29,13,23,'2017-11-22 14:32:59');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (30,13,23,'2017-11-22 14:33:39');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (31,13,23,'2017-11-22 14:35:04');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (32,13,23,'2017-11-22 14:40:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (33,13,23,'2017-11-22 14:41:00');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (34,13,23,'2017-11-22 14:41:58');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (35,13,23,'2017-11-22 14:42:35');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (36,13,23,'2017-11-22 14:43:40');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (37,13,23,'2017-11-22 14:44:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (38,13,1,'2017-11-22 14:45:48');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (39,13,23,'2017-11-22 14:46:49');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (40,13,23,'2017-11-22 14:49:11');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (41,13,23,'2017-11-22 14:52:56');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (42,13,1,'2017-11-22 14:55:01');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (43,13,1,'2017-11-22 15:45:36');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (44,13,23,'2017-11-22 15:45:55');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (45,13,23,'2017-11-22 17:04:20');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (46,13,1,'2017-11-22 17:33:50');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (47,13,23,'2017-11-22 17:34:17');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (48,13,23,'2017-11-22 18:02:09');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (49,13,23,'2017-11-23 12:18:35');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (50,13,1,'2017-11-23 12:19:56');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (51,13,23,'2017-11-23 12:29:57');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (52,13,1,'2017-11-23 12:33:09');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (53,13,23,'2017-11-23 12:33:12');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (54,13,23,'2017-11-23 12:34:34');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (55,13,23,'2017-11-23 12:54:37');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (56,13,23,'2017-11-23 12:55:59');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (57,13,23,'2017-11-23 13:44:05');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (58,13,23,'2017-11-23 13:47:57');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (59,13,23,'2017-11-23 13:48:10');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (60,13,23,'2017-11-23 13:51:53');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (61,13,23,'2017-11-23 13:53:59');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (62,13,23,'2017-11-23 13:56:39');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (63,13,23,'2017-11-23 13:57:47');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (64,22,13,'2017-11-23 14:03:40');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (65,13,23,'2017-11-23 14:03:51');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (66,13,23,'2017-11-23 14:03:58');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (67,22,13,'2017-11-23 14:04:22');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (68,22,13,'2017-11-23 14:04:48');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (69,13,22,'2017-11-23 14:04:58');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (70,22,13,'2017-11-23 14:11:02');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (71,23,15,'2017-11-23 16:14:03');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (72,23,15,'2017-11-23 16:14:10');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (73,13,23,'2017-11-23 18:56:45');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (74,13,23,'2017-11-23 18:56:52');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (75,23,15,'2017-11-24 10:16:47');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (76,23,15,'2017-11-24 10:16:49');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (77,23,15,'2017-11-24 10:18:26');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (78,23,15,'2017-11-24 10:23:30');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (79,23,15,'2017-11-24 10:29:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (80,23,15,'2017-11-24 10:29:18');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (81,23,15,'2017-11-24 10:44:42');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (82,23,7,'2017-11-24 14:44:50');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (83,23,7,'2017-11-24 14:44:52');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (84,23,7,'2017-11-24 14:44:55');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (85,23,2,'2017-11-24 14:48:28');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (86,13,23,'2017-11-24 14:57:06');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (87,13,15,'2017-11-24 14:57:08');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (88,13,15,'2017-11-24 14:57:15');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (89,13,23,'2017-11-24 14:57:17');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (90,15,13,'2017-11-24 19:33:38');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (91,23,13,'2017-11-24 19:34:33');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (92,15,23,'2017-11-24 21:29:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (93,15,23,'2017-11-24 21:29:18');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (94,15,23,'2017-11-24 21:29:29');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (95,15,23,'2017-11-24 21:29:35');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (96,15,23,'2017-11-24 21:29:53');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (97,13,1,'2017-11-27 01:03:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (98,15,2,'2017-11-27 14:18:46');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (99,13,15,'2017-11-27 17:14:47');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (100,13,15,'2017-11-27 17:14:47');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (101,13,15,'2017-11-27 17:14:47');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (102,13,23,'2017-11-27 18:18:24');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (103,13,1,'2017-11-28 13:55:08');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (104,13,23,'2017-11-28 13:55:15');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (105,13,23,'2017-11-28 14:03:34');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (106,13,23,'2017-11-28 14:03:48');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (107,13,23,'2017-11-28 14:03:51');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (108,13,23,'2017-11-28 14:03:56');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (109,13,23,'2017-11-28 14:04:16');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (110,23,13,'2017-11-28 15:38:46');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (111,13,23,'2017-11-28 15:38:58');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (112,13,23,'2017-11-28 15:42:25');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (113,23,13,'2017-11-28 15:48:22');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (114,23,13,'2017-11-28 15:55:50');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (115,23,13,'2017-11-28 16:01:25');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (116,23,13,'2017-11-28 16:35:19');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (117,27,13,'2017-11-28 16:38:59');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (118,27,13,'2017-11-28 16:39:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (119,27,13,'2017-11-28 16:40:00');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (120,13,27,'2017-11-28 16:40:11');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (121,27,7,'2017-11-28 16:43:14');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (122,27,19,'2017-11-28 16:43:18');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (123,27,21,'2017-11-28 16:43:19');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (124,27,13,'2017-11-28 16:43:53');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (125,27,13,'2017-11-28 17:16:01');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (126,13,27,'2017-11-28 17:16:35');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (127,13,27,'2017-11-28 17:23:52');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (128,27,13,'2017-11-28 17:24:45');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (129,13,27,'2017-11-28 17:24:48');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (130,27,13,'2017-11-28 17:35:04');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (131,13,27,'2017-11-28 17:35:11');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (132,27,13,'2017-11-28 17:37:21');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (133,13,27,'2017-11-28 17:38:38');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (134,13,27,'2017-11-28 17:44:58');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (135,13,27,'2017-11-28 17:48:03');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (136,13,27,'2017-11-28 17:48:04');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (137,27,13,'2017-11-28 17:53:52');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (138,27,13,'2017-11-28 17:54:43');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (139,13,27,'2017-11-28 17:55:22');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (140,11,23,'2017-11-28 18:01:45');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (141,27,13,'2017-11-28 18:03:57');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (142,13,27,'2017-11-28 18:04:12');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (143,13,27,'2017-11-28 18:07:39');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (144,13,27,'2017-11-28 18:13:28');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (145,13,27,'2017-11-28 18:16:55');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (146,27,13,'2017-11-28 18:17:05');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (147,15,11,'2017-11-28 19:35:44');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (148,15,11,'2017-11-28 19:36:21');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (149,15,11,'2017-11-28 19:36:22');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (150,27,13,'2017-11-29 15:48:57');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (151,27,13,'2017-11-29 16:12:20');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (152,11,27,'2017-11-29 17:10:39');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (153,27,15,'2017-11-29 17:38:52');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (154,15,2,'2017-11-29 18:48:54');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (155,23,15,'2017-11-29 20:01:27');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (156,23,15,'2017-11-29 20:01:29');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (157,23,15,'2017-11-29 20:01:29');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (158,23,15,'2017-11-29 20:02:13');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (159,23,15,'2017-11-29 20:02:14');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (160,23,15,'2017-11-29 20:02:14');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (161,13,1,'2017-11-30 13:54:31');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (162,13,23,'2017-11-30 15:05:51');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (163,13,23,'2017-11-30 15:08:00');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (164,13,23,'2017-11-30 15:08:08');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (165,13,15,'2017-11-30 15:08:16');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (166,13,15,'2017-11-30 15:08:20');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (167,13,15,'2017-11-30 15:09:23');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (168,13,23,'2017-11-30 15:16:50');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (169,13,23,'2017-11-30 15:17:00');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (170,13,23,'2017-11-30 15:18:47');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (171,13,23,'2017-11-30 15:19:02');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (172,13,23,'2017-11-30 15:19:04');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (173,13,23,'2017-11-30 15:19:11');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (174,13,23,'2017-11-30 15:20:47');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (175,13,23,'2017-11-30 15:31:15');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (176,13,15,'2017-11-30 15:31:20');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (177,13,23,'2017-11-30 15:32:22');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (178,13,11,'2017-11-30 15:32:31');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (179,13,1,'2017-11-30 15:40:15');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (180,23,1,'2017-11-30 15:40:22');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (181,13,23,'2017-11-30 15:40:52');
insert  into `user_profile_view`(`id`,`user_id`,`viewed_user_id`,`viewed_on`) values (182,23,13,'2017-11-30 15:41:45');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `phonecountry` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `date_of_birth` date NOT NULL,
  `interested_in` int(11) NOT NULL DEFAULT '0',
  `search_in_meet` int(11) NOT NULL DEFAULT '0',
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `zipcode` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `about_me` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `image` varchar(200) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `device_token` text,
  `login_otp` varchar(100) DEFAULT NULL,
  `login_otp_valid_till` datetime NOT NULL,
  `register_otp` varchar(100) DEFAULT NULL,
  `register_otp_valid_till` datetime NOT NULL,
  `password_reset_code` varchar(100) DEFAULT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `lant` varchar(200) DEFAULT NULL,
  `long` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (1,'110609639615115003531036768286','momyt-12312410','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'Rajesh','rajesh1may@gmail.com',NULL,'8911529958',0,'0000-00-00',0,0,'Sector 62','Noida','UP','0',NULL,'This is rajesh about me text',1,'20171117164929PM-1510917569-PROFILE-62411044.jpg','20171204102952AM-1512363592-PROFILE-906655913.jpg',NULL,NULL,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-09-20 11:42:48','2017-11-17 16:49:29','','');
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (2,'89203704415115003531728786523','momyt-12312411','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312411','sundroid1993@gmail.com',NULL,'9873738969',0,'0000-00-00',0,0,'Malviya Nagar','New Delhi','Delhi','0',NULL,'',1,'20171110171835PM-1510314515-PROFILE-575644284.jpg',NULL,'','12345','2017-11-10 11:49:11',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 06:20:00','2017-11-10 17:18:35',NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (3,'9703284261511500353125130876','momyt-12312412','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312412',NULL,NULL,'9999999999',0,'0000-00-00',0,0,NULL,NULL,'0','0',NULL,'',1,NULL,NULL,'','12345','2017-11-10 14:53:22',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:30:11',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (4,'9260241791511500353672882182','momyt-12312413','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312413',NULL,NULL,'5985559565',0,'0000-00-00',0,0,NULL,NULL,'0','0',NULL,'',1,NULL,NULL,'','12345','2017-11-01 18:45:56',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:44:56',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (5,'76921203915115003531318408666','momyt-12312414','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312414',NULL,NULL,'5485255522',0,'0000-00-00',0,0,NULL,NULL,'0','0',NULL,'',1,NULL,NULL,'','12345','2017-11-01 18:51:23',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:50:23',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (6,'14753215491511500353399984923','momyt-12312415','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312415',NULL,NULL,'2658945641',0,'0000-00-00',0,0,NULL,NULL,'0','0',NULL,'',1,NULL,NULL,'','12345','2017-11-01 18:54:09',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:53:09',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (7,'894071491511500353233588216','momyt-12312416','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312416',NULL,NULL,'1234567890',0,'0000-00-00',0,0,NULL,NULL,'0','0',NULL,'',1,NULL,NULL,'DemoToken','12345','2017-11-03 18:14:10',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-03 15:28:09',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (8,'10308211615115003532106606852','momyt-12312417','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312417',NULL,NULL,'9911529958',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','12345','2017-11-07 13:40:07',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-07 12:53:09',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (9,'10884987261511500353117288859','momyt-12312418','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312418',NULL,NULL,'8888888888',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','12345','2017-11-07 14:59:02',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-07 14:58:02',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (10,'4343829131511500353866095388','momyt-12312419','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312419',NULL,NULL,'0597100096',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','12345','2017-11-07 17:09:06',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-07 17:08:06',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (11,'16481287711511500353500904928','momyt-12312420','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'nitin antony','nitin.antony1992@gmail.com',NULL,'+919643272159',0,'0000-00-00',0,0,'dd','delhi','delhi',NULL,NULL,'rff',1,'20171128175754PM-1511872074-PROFILE-1398193440.jpg',NULL,'elxQfH8AdIU:APA91bH9NzjGDOCgZKGB2jsCIaM8P7yR93Bq6SBak1DkoWTrn7AGr5BAMTahWc63BI23s-LEYeM83aBXTi2vK_jbJGbbDP6F54NYdlb9cpI4xKiI5_pf9GmT7RV2BWlEmjp6USV8fD4h','940563','2017-11-29 11:49:02',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-11 13:05:51','2017-11-28 17:57:54',NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (12,'280544497151150035336866838','momyt-12312421','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312421',NULL,NULL,'9643272159',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','12345','2017-11-11 13:09:40',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-11 13:08:40',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (13,'1619236341511500353553320160','momyt-12312422','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'Sunil Kumar Vishwakarma123','sundroid@gmail.com',NULL,'+919873738969',0,'0000-00-00',0,0,'Malviya Nagar','New Delhi','Delhi',NULL,NULL,'I am cool',1,'20171204124151PM-1512371511-PROFILE-565851921.jpg','20171204124151PM-1512371511-COVER-PROFILE-1331805622.jpg','fcoimWlpZVk:APA91bHg5Pb4EPYGqrIf-cj0CRy_v23R6nd1NUSXzj86IWWluRtXVuWhI1ahSFMKtSZn3EW1IbjzfNrAWdeDOyVFBlPd2cToHetWrjlo3eIOiLJpzm8Vn621grDlGgX9c7qzPSRbxDcj','092487','2017-12-01 17:04:19',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-11 13:40:59','2017-12-04 12:41:51','','');
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (14,'212097503115115003531778956310','momyt-12312423','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312423',NULL,NULL,'+912322222222',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','368421','2017-11-11 20:56:58',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-11 20:55:58',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (15,'8853810961511500353533133938','momyt-12312424','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'Zeedats','zeedats95@gmail.com',NULL,'+918826533262',0,'0000-00-00',0,0,'Bani Naem','Hebron','Palestine',NULL,NULL,'',1,'20171122080108AM-1511317868-PROFILE-1420865733.jpg',NULL,'dM1Rv5OjBj4:APA91bFKYRgY5ifEASNmNR_KsLv_sE9etYdwk8v6TLoX_cFkl6IKLLLXsr0u_c4sASqAwVHNdPqnsZ3Yxkn4NGNu6b_4SXKjb6TMtoJv1A7k_m75883hzYwIsuRDl6zA090P5Lak5OK9','950674','2017-11-29 17:46:46',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-11 20:56:15','2017-11-22 08:01:08',NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (16,'207818316115115003532043958199','momyt-12312425','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312425',NULL,NULL,'+9708826533262',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','073269','2017-11-13 11:39:44',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-12 12:07:27',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (17,'8473019401511500353700804263','momyt-12312426','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312426',NULL,NULL,'+919810105635',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','915082','2017-12-02 21:31:21',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-12 14:16:33',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (18,'7054257451511500353942824961','momyt-12312427','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312427',NULL,NULL,'+91826533262',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','905632','2017-11-13 11:40:02',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-13 11:39:02',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (19,'10336016131511500353106867590','momyt-12312428','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312428',NULL,NULL,'+911234567890',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','189736','2017-11-15 11:21:25',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-15 11:20:25',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (20,'3644003731511500353770959062','momyt-12312429','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312429',NULL,NULL,'+18574016538',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','596372','2017-11-15 11:23:23',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-15 11:22:23',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (21,'174322254415115003531212243267','momyt-12312430','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-12312430',NULL,NULL,'+918953597827',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','814795','2017-11-21 12:12:43',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-15 11:25:10',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (22,'196789272215115003531671520504','momyt-12312431','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'pushpendramomytuser-12312431','pushpendra@gmail.com',NULL,'+918376952731',0,'0000-00-00',0,0,'allabhad','india','delhi',NULL,NULL,'cool',1,'20171205144317PM-1512465197-PROFILE-1262394355.jpg',NULL,'dDQa66wFUkc:APA91bGvyQksBNkIkQYoYtcBlDYGsUI6U2zX4W81omPni0MT5t0Impl5kO-HaT_d8X5YiYe4TkwC7OsAl_XLNzN9TNGIkHaK5-otUQulewBB1NTHIpcnCiI-9UyKjD4Xyk9BEeWhdau2','465192','2017-12-05 19:42:08',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-15 17:29:30','2017-12-05 14:43:17','','');
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (23,'21023718951511500353807808598','momyt-12312432','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'Rajesh Vishwakarma ','raj@gmail.com',NULL,'+919911529958',0,'0000-00-00',0,0,'Noida','Noida','Uttar Ptadesh',NULL,NULL,'this is me Rajeshdhdjdhdg dc sudgeudhsu egg dhxudhuddhxhshs',1,'20171204160448PM-1512383688-PROFILE-1749560389.JPG','20171204102952AM-1512363592-PROFILE-906655913.jpg','c8Su0j3ZTDo:APA91bGcIIjgVxGefdCRRsDCT-J-f0QPT3pDF3dlVIszY2QoYpDVvBYOF8Nw05JpyuhJIS3yly1cXVSkD4h2NY0a2IBc2Dr4r7hfTPDQ-ZheZiEotZIKQMTQpzN5vQddRNCD4HqrkTot','846193','2017-12-01 12:02:09',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-17 14:19:57','2017-12-04 16:04:48','','');
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (24,'34254801915115003531025619263','momyt-1510987302','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momytuser-1510987302',NULL,NULL,'+19873738969',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','301928','2017-11-18 12:12:42',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-18 12:11:42',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (25,'4627330915115003531225749726','momyt-1511246158','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momyt-1511246158',NULL,NULL,'+449205905044',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','493082','2017-11-21 12:06:58',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-21 12:05:58',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (26,'91960135815115003531051622787','momyt-1511246722','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momyt-1511246722',NULL,NULL,'+919205905044',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'fILs_ciChmY:APA91bHDCG5eoa21f0gyltx12XrZ9MZzNPbGVtx6s547K7dqKHvSWdwORCvhJDxGNpEqgnkCHH2w6JUSgc7zzX0SfMc83AOUJ1kMDPcM32-E5-j4LkzO2GdxQwIt1Re3ofLan95HvsLY','175924','2017-12-07 11:51:17',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-21 12:15:22',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (27,'1555502111511867243606558518','momyt-1511867243','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momyt-1511867243','deepak kumar',NULL,'+917835855019',0,'0000-00-00',0,0,'noida','delhi','delhi',NULL,NULL,'cool',1,NULL,NULL,'eYrmQNAp6-s:APA91bFTpX1_-OH3inMqq0CjxS4_Psmsgg-iJYkeCS4aWuVwCyA-YHySGm-xWcSQXghVK3RJa0djv8gJQUMVqCkl45Om24bpJIcc7-PpoRldl7-Vb6zm1Hx-jpf1nnVwB15Dj23LWieK','921786','2017-11-28 16:39:18',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-28 16:37:23','2017-11-29 18:40:14',NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (28,'133783553415118783342068665294','momyt-1511878334','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momyt-1511878334',NULL,NULL,'+91882653322',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','420936','2017-11-28 19:43:14',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-28 19:42:14',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (29,'195900746915121071681532248846','momyt-1512107168','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momyt-1512107168',NULL,NULL,'+918379952731',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'','526109','2017-12-01 11:17:08',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-12-01 11:16:08',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (30,'2453108631512210328855284758','momyt-1512210328','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momyt-1512210328',NULL,NULL,'+44',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'dKNBgX14S_c:APA91bHMmvvnFy6-96MTPwZDhsnpNXwpjbgmAZW_eSKF2n_-06M_4vuCrYhkhkYt5zVLwxFqt38eCja5UyB4tkVpYS4N1Lu-fXc4FIlwxRynNIxIfnmCGmv-sLcfoTuY8Xj42o6ja2lg','307541','2017-12-02 15:56:28',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-12-02 15:55:28',NULL,NULL,NULL);
insert  into `users`(`id`,`profile_id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`gender`,`date_of_birth`,`interested_in`,`search_in_meet`,`address`,`city`,`state`,`country`,`zipcode`,`about_me`,`status`,`image`,`cover_image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`,`lant`,`long`) values (31,'10393311811512479701335932857','momyt-1512479701','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'momyt-1512479701',NULL,NULL,'+44837692731',0,'0000-00-00',0,0,NULL,NULL,NULL,NULL,NULL,'',1,NULL,NULL,'dDQa66wFUkc:APA91bGvyQksBNkIkQYoYtcBlDYGsUI6U2zX4W81omPni0MT5t0Impl5kO-HaT_d8X5YiYe4TkwC7OsAl_XLNzN9TNGIkHaK5-otUQulewBB1NTHIpcnCiI-9UyKjD4Xyk9BEeWhdau2','107528','2017-12-05 18:46:01',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-12-05 18:45:01',NULL,NULL,NULL);

/*Table structure for table `video_albums` */

DROP TABLE IF EXISTS `video_albums`;

CREATE TABLE `video_albums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(200) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `video_albums` */

/*Table structure for table `video_comments` */

DROP TABLE IF EXISTS `video_comments`;

CREATE TABLE `video_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned NOT NULL,
  `comment` text NOT NULL,
  `comment_on` datetime NOT NULL,
  `delete_yes_no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `video_comments` */

insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (1,0,2,1,'checking comments','2017-11-10 14:35:33',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (2,0,3,5,'hi','2017-11-10 15:06:10',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (3,0,2,5,'hello ','2017-11-10 15:06:32',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (4,0,2,2,'comment1','2017-11-10 15:28:59',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (5,0,2,3,'checking comment','2017-11-10 15:37:05',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (6,0,2,4,'hello','2017-11-10 15:48:21',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (7,0,2,4,'hi','2017-11-10 15:48:25',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (8,0,15,8,'what the hell is this','2017-11-14 00:06:56',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (9,0,15,5,'shut up','2017-11-14 00:07:56',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (10,0,13,33,'commenting','2017-11-20 12:09:58',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (11,0,13,34,'hi','2017-11-20 18:19:34',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (12,0,13,34,'asdcdsc','2017-11-20 18:21:17',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (13,0,13,9,'dcasdc','2017-11-24 16:09:33',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (14,0,13,10,'hello','2017-11-24 16:18:03',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (15,0,13,9,'adscdcads','2017-11-24 16:18:24',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (16,0,13,10,'asdcdsc','2017-11-24 16:18:37',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (17,0,13,14,'aasdca','2017-11-24 16:22:53',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (18,0,13,18,'adscdc','2017-11-24 16:23:03',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (19,0,13,10,'casc','2017-11-24 16:23:58',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (20,0,13,10,'cadsc','2017-11-24 16:24:01',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (21,0,13,58,'hahahha','2017-11-30 22:18:31',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (22,0,13,57,'hii','2017-12-04 14:46:39',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (23,0,23,70,'dhdhhs','2017-12-04 15:59:37',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (24,2,13,9,'hello Amar Testing....','2017-12-04 18:07:42',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (25,2,13,9,'Sunil Bhaiya Testing Comments','2017-12-04 18:08:53',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (26,2,13,11,'Hello Test','2017-12-04 18:10:04',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (27,2,13,11,'Dada','2017-12-04 18:12:48',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (28,2,13,35,'ok done','2017-12-04 18:23:23',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (29,2,13,28,'Hello DVD','2017-12-05 11:19:29',0);
insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (30,2,13,10,'hello Zee','2017-12-05 17:12:52',0);

/*Table structure for table `video_joined` */

DROP TABLE IF EXISTS `video_joined`;

CREATE TABLE `video_joined` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `video_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `joined_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `video_joined` */

/*Table structure for table `video_likes` */

DROP TABLE IF EXISTS `video_likes`;

CREATE TABLE `video_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `like_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned NOT NULL,
  `like_type` int(11) NOT NULL,
  `liked_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8;

/*Data for the table `video_likes` */

insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (12,0,2,1,1,'2017-11-10 14:43:33');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (15,0,3,5,1,'2017-11-10 15:05:34');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (16,0,2,5,1,'2017-11-10 15:09:24');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (17,0,2,4,1,'2017-11-10 15:09:50');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (18,0,2,3,1,'2017-11-10 15:39:28');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (19,0,2,2,1,'2017-11-10 15:39:52');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (22,0,15,8,1,'2017-11-14 00:06:42');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (23,0,15,7,1,'2017-11-14 00:12:19');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (26,0,15,9,1,'2017-11-14 00:12:25');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (28,0,21,11,1,'2017-11-15 12:38:34');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (34,0,23,12,1,'2017-11-18 18:05:26');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (35,0,23,31,1,'2017-11-18 18:14:19');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (36,0,23,10,1,'2017-11-18 18:14:51');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (37,0,23,4,1,'2017-11-18 18:14:56');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (38,0,23,3,1,'2017-11-18 18:14:59');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (39,0,23,8,1,'2017-11-18 18:15:02');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (40,0,23,6,1,'2017-11-18 18:15:08');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (41,0,23,7,1,'2017-11-18 18:15:10');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (42,0,23,11,1,'2017-11-18 18:15:12');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (44,0,13,33,1,'2017-11-20 12:09:26');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (45,0,13,22,1,'2017-11-20 12:09:33');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (46,0,13,14,1,'2017-11-20 12:11:19');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (47,0,13,34,1,'2017-11-20 18:21:25');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (48,0,15,30,1,'2017-11-20 19:38:24');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (52,0,15,36,1,'2017-11-20 19:42:37');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (53,0,15,35,1,'2017-11-20 19:45:21');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (55,0,15,40,1,'2017-11-22 08:03:15');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (56,0,13,35,1,'2017-11-22 12:24:56');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (59,0,23,9,1,'2017-11-24 10:16:22');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (66,0,13,7,1,'2017-11-24 15:26:39');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (69,0,13,15,1,'2017-11-24 15:52:57');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (75,0,13,17,1,'2017-11-24 16:19:02');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (95,0,13,39,1,'2017-12-01 16:32:41');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (96,0,13,36,1,'2017-12-01 16:32:46');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (98,0,23,67,1,'2017-12-02 18:46:09');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (99,0,23,66,1,'2017-12-02 18:46:15');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (100,0,23,58,1,'2017-12-02 18:46:24');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (101,0,23,44,1,'2017-12-02 18:46:34');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (102,0,23,43,1,'2017-12-02 18:46:38');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (103,0,23,40,1,'2017-12-02 18:46:52');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (104,0,13,70,1,'2017-12-04 11:12:30');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (109,0,13,40,1,'2017-12-04 11:18:38');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (110,0,13,41,1,'2017-12-04 11:20:59');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (125,0,13,57,1,'2017-12-04 11:33:48');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (136,0,13,58,1,'2017-12-04 11:34:21');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (140,0,13,68,1,'2017-12-04 11:44:55');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (146,0,13,67,1,'2017-12-04 11:45:13');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (150,0,13,66,1,'2017-12-04 12:27:23');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (154,0,13,60,1,'2017-12-04 12:28:08');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (155,0,15,70,1,'2017-12-04 14:08:29');
insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (160,0,13,9,1,'2017-12-04 18:26:16');

/*Table structure for table `video_shares` */

DROP TABLE IF EXISTS `video_shares`;

CREATE TABLE `video_shares` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `share_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned NOT NULL,
  `shared_on` datetime NOT NULL,
  `delete_yes_no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `video_shares` */

insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (1,0,1,1,'2017-11-15 11:48:45',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (2,0,13,13,'2017-11-15 15:17:01',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (3,0,15,15,'2017-11-16 19:19:47',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (4,0,15,15,'2017-11-16 19:19:49',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (5,0,15,32,'2017-11-20 04:45:54',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (6,0,15,32,'2017-11-20 04:45:56',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (7,0,13,5,'2017-11-20 15:07:31',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (8,0,15,30,'2017-11-20 19:38:23',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (9,0,15,19,'2017-11-20 19:40:38',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (10,0,15,42,'2017-11-22 22:12:20',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (11,0,13,9,'2017-11-24 16:09:46',0);
insert  into `video_shares`(`id`,`share_id`,`user_id`,`video_id`,`shared_on`,`delete_yes_no`) values (12,0,13,60,'2017-12-04 12:28:14',0);

/*Table structure for table `video_tags` */

DROP TABLE IF EXISTS `video_tags`;

CREATE TABLE `video_tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `tagged_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `video_tags` */

insert  into `video_tags`(`id`,`user_id`,`video_id`,`friend_id`,`tagged_on`) values (3,13,15,1,'2017-11-15 17:17:30');
insert  into `video_tags`(`id`,`user_id`,`video_id`,`friend_id`,`tagged_on`) values (4,13,15,8,'2017-11-15 17:17:30');
insert  into `video_tags`(`id`,`user_id`,`video_id`,`friend_id`,`tagged_on`) values (5,22,24,1,'2017-11-17 18:23:57');
insert  into `video_tags`(`id`,`user_id`,`video_id`,`friend_id`,`tagged_on`) values (6,15,25,1,'2017-11-17 19:09:28');

/*Table structure for table `video_types` */

DROP TABLE IF EXISTS `video_types`;

CREATE TABLE `video_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `video_types` */

insert  into `video_types`(`id`,`name`) values (1,'1 Minute');
insert  into `video_types`(`id`,`name`) values (2,'3 Minutes');
insert  into `video_types`(`id`,`name`) values (3,'15 Minutes');

/*Table structure for table `video_views` */

DROP TABLE IF EXISTS `video_views`;

CREATE TABLE `video_views` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `video_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `viewed_on` datetime NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `viewed_time` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `video_views` */

insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (1,68,13,'2017-12-04 15:52:54','122.177.36.10','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (2,70,23,'2017-12-04 15:59:56','122.177.36.10','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (3,70,15,'2017-12-04 19:03:49','106.202.15.208','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (4,70,15,'2017-12-04 19:05:07','106.202.15.208','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (5,70,15,'2017-12-05 15:11:31','106.205.33.81','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (6,70,15,'2017-12-05 19:54:15','106.205.22.137','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (7,70,15,'2017-12-05 19:54:25','106.205.22.137','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (8,70,15,'2017-12-05 19:56:27','106.205.22.137','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (9,45,23,'2017-12-05 20:40:34','106.202.20.224','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (10,40,23,'2017-12-05 20:40:52','106.202.20.224','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (11,28,23,'2017-12-05 20:41:07','106.202.20.224','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (12,27,23,'2017-12-05 20:41:37','106.202.20.224','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (13,23,23,'2017-12-05 20:41:47','106.202.20.224','1','');
insert  into `video_views`(`id`,`video_id`,`user_id`,`viewed_on`,`ip_address`,`viewed_time`,`device_token`) values (14,69,23,'2017-12-06 10:14:45','122.177.232.197','1','');

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `tags` text NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_time` varchar(50) DEFAULT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `post_story` int(11) NOT NULL DEFAULT '0',
  `like_emotion_type_id` int(11) NOT NULL DEFAULT '1',
  `live_y_n` int(11) NOT NULL DEFAULT '0',
  `live_video_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/*Data for the table `videos` */

insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (1,2,'1510302770013.mp4','first video posted','','20171110140313-1510302793-1135671385-1360125268.mp4','20171110140313-1510302793-743894268-85307751.png','3718',0,'2017-11-10 14:03:13',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (2,2,'1510305597631.mp4','sadcascadscsdac','','20171110145008-1510305608-696268127-702555899.mp4','20171110145008-1510305608-562879555-1742588640.png','3711',0,'2017-11-10 14:50:08',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (3,3,'1510305746759.mp4','amar sharma working','','20171110145338-1510305818-1408768200-21302970.mp4','20171110145338-1510305818-698636874-412554965.png','3714',0,'2017-11-10 14:53:38',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (4,3,'1510306030663.mp4','laughing','','20171110145745-1510306065-265616139-652872403.mp4','20171110145745-1510306065-224268748-1177399036.png','3716',0,'2017-11-10 14:57:45',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (5,3,'1510306075920.mp4','dvd','','20171110145826-1510306106-663689002-1743221095.mp4','20171110145826-1510306106-432044688-1893814266.png','3712',0,'2017-11-10 14:58:26',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (6,3,'1510308924623.mp4','ajit oumar','','20171110154552-1510308952-1491176430-1128475974.mp4','20171110154552-1510308952-489974373-789808519.png','3712',0,'2017-11-10 15:45:52',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (7,1,'test file','test file','','20171111125746-1510385266-1846333602-885116467.FxqLwX6YEUMDLBEp9a7q (1)','20171111125746-1510385266-782510996-928850847.jpeg','6997',0,'2017-11-11 12:57:46',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (8,2,'1510383551774.mp4','fasdfafasf','','20171111125802-1510385282-219279322-985651358.mp4','20171111125802-1510385282-951419011-616568643.png','810',0,'2017-11-11 12:58:02',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (9,15,'1510553765527.mp4','1510553765527.mp4','','20171113114617-1510553777-894998639-937078171.mp4','20171113114618-1510553778-666169319-828317831.png','3712',0,'2017-11-13 11:46:18',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (10,15,'1510598527759.mp4','1510598527759.mp4','','20171114001335-1510598615-956458398-1203131780.mp4','20171114001335-1510598615-1742489006-205573101.png','3712',0,'2017-11-14 00:13:35',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (11,15,'1510656626059.mp4','1510656626059.mp4','','20171114162038-1510656638-741444092-1479486312.mp4','20171114162038-1510656638-1560821188-135249522.png','3712',0,'2017-11-14 16:20:38',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (12,15,'1510677906779.mp4','test server down','','20171114221558-1510677958-949905610-1008546472.mp4','20171114221558-1510677958-546489324-1288029401.png','3712',0,'2017-11-14 22:15:58',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (13,13,'1510738169803.mp4','sdcacdadsc','','20171115150013-1510738213-1653294427-349145355.mp4','20171115150013-1510738213-1379116870-621891777.png','810',0,'2017-11-15 15:00:13',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (14,13,'1510745279709.mp4','checking tag','','20171115165857-1510745337-1734108000-1904546199.mp4','20171115165857-1510745337-827372706-482729938.png','6997',0,'2017-11-15 16:58:57',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (15,13,'1510746379938.mp4','chaecking tagdvs','','20171115171730-1510746450-786790796-808105289.mp4','20171115171730-1510746450-1480356687-1766673032.png','6997',0,'2017-11-15 17:17:30',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (16,22,'1510906067251.mp4','feh','','20171117133804-1510906084-1519417580-572462669.mp4','20171117133804-1510906084-39638195-1310777768.png','7596',0,'2017-11-17 13:38:04',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (17,22,'1510906085190.mp4','1510906085190.mp4','','20171117133911-1510906151-1362921131-305046920.mp4','20171117133911-1510906151-286734119-374354902.png','4598',0,'2017-11-17 13:39:11',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (18,22,'1510906219338.mp4','1510906219338.mp4','','20171117134030-1510906230-514834788-1368759529.mp4','20171117134030-1510906230-1219430336-1270168131.png','5130',0,'2017-11-17 13:40:30',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (19,1,'test file','test file','','20171117134055-1510906255-1739199375-1122878576.mp4','20171117134055-1510906255-1265408290-1195245310.png','18000',0,'2017-11-17 13:40:55',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (20,13,'1510911017408.mp4','1510911017408.mp4','','20171117150100-1510911060-374466428-938614034.mp4','20171117150100-1510911060-1306167376-227980132.png','7171',0,'2017-11-17 15:01:00',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (21,13,'1510911275004.mp4','1510911275004.mp4','','20171117150451-1510911291-1059197760-319118366.mp4','20171117150451-1510911291-1583781770-194515384.png','3582',0,'2017-11-17 15:04:51',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (22,13,'1510911327040.mp4','1510911327040.mp4','','20171117150540-1510911340-150874808-516307702.mp4','20171117150540-1510911340-1775917899-1922668324.png','6018',0,'2017-11-17 15:05:40',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (23,15,'1510920396997.mp4','test','','20171117173736-1510920456-326302342-1626467787.mp4','20171117173736-1510920456-489029220-25538752.png','3712',0,'2017-11-17 17:37:36',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (24,22,'1510923101366.mp4','1510923101366.mp4','','20171117182357-1510923237-1375556196-1898136156.mp4','20171117182357-1510923237-40674250-15012630.png','6594',0,'2017-11-17 18:23:57',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (25,15,'1510925936923.mp4','test zoom+tags ','','20171117190927-1510925967-1383909688-1127356609.mp4','20171117190928-1510925968-356100939-1034620335.png','2482',0,'2017-11-17 19:09:28',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (26,23,'1510926663954.mp4','hello','','20171117192127-1510926687-295950672-385668454.mp4','20171117192128-1510926688-1007072715-1519586755.png','3179',0,'2017-11-17 19:21:28',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (27,15,'1510926729336.mp4','1510926729336.mp4','','20171117192258-1510926778-1947892174-1169862407.mp4','20171117192258-1510926778-957233206-860363507.png','2411',0,'2017-11-17 19:22:58',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (28,15,'1510939035101.mp4','1510939035101.mp4','','20171117224925-1510939165-1255071807-470625066.mp4','20171117224925-1510939165-1383038030-1723293230.png','14720',0,'2017-11-17 22:49:25',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (29,1,'XYZ','XYZ','','20171118132918-1510991958-1886664333-757133383.mp4','20171118132919-1510991959-889255087-556717230.jpg','2268.33333333333',0,'2017-11-18 13:29:19',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (30,1,'XYZ','XYZ','','20171118133236-1510992156-790462477-1817715472.mp4','20171118133236-1510992156-781218748-598434251.jpg','9071.66666666667',0,'2017-11-18 13:32:36',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (31,23,'1511008886350.mp4','test video rajesh','','20171118181212-1511008932-307367268-2033616128.mp4','20171118181212-1511008932-1943932873-1799477913.png','6997',0,'2017-11-18 18:12:12',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (32,11,'1511064345992.mp4','fjf','','20171119093604-1511064364-1849982235-2025628034.mp4','20171119093604-1511064364-829380912-211025562.png','2733',0,'2017-11-19 09:36:04',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (33,13,'1511159517768.mp4','jv  ','','20171120120834-1511159914-1691337540-1233003974.mp4','20171120120834-1511159914-1162208464-667201964.png','2990',0,'2017-11-20 12:08:34',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (34,13,'1511181121672.mp4','adfadsadsf','','20171120180800-1511181480-283894844-790207825.mp4','20171120180800-1511181480-370091436-241203342.png','2373',0,'2017-11-20 18:08:00',1,0,3,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (35,15,'1511186857887.mp4','1511186857887.mp4','','20171120193857-1511186937-148139491-862191048.mp4','20171120193857-1511186937-1646617128-1802777883.png','10027',0,'2017-11-20 19:38:57',1,0,4,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (36,15,'1511187013619.mp4','1511187013619.mp4','','20171120194313-1511187193-1510993793-1561934138.mp4','20171120194313-1511187193-1960246130-459093314.png','4352',0,'2017-11-20 19:43:13',1,0,6,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (37,15,'1511187296329.mp4','how to #Re','','20171120194633-1511187393-1718896206-1744216541.mp4','20171120194634-1511187394-1928172384-1774488107.png','3179',0,'2017-11-20 19:46:34',1,0,2,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (38,23,'1511190273677.mp4','test','','20171120203509-1511190309-872337448-1018513334.mp4','20171120203509-1511190309-913427809-1208405049.png','3471',0,'2017-11-20 20:35:09',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (39,23,'1511245334130.mp4','test','','20171121115314-1511245394-258489365-887962603.mp4','20171121115314-1511245394-1816488940-1850602795.png','2190',0,'2017-11-21 11:53:14',1,0,6,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (40,15,'1511317884022.mp4','right? ','','20171122080253-1511317973-1995112392-1088500658.mp4','20171122080253-1511317973-569258331-1015900574.png','8597',0,'2017-11-22 08:02:53',1,0,5,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (41,13,'1511333442028.mp4','1511333442028.mp4','','20171122122102-1511333462-1815403324-1428547258.mp4','20171122122103-1511333463-977057535-2002066296.png','6760',0,'2017-11-22 12:21:03',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (42,13,'1511333464674.mp4','1511333464674.mp4','','20171122122115-1511333475-132288689-373441691.mp4','20171122122115-1511333475-1684942587-137724822.png','3880',0,'2017-11-22 12:21:15',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (43,1,'22-09-17-03-09-26.mp4','22-09-17-03-09-26.mp4','','20171122151027-1511343627-1275218404-435879163.mp4','20171122151027-1511343627-2122809722-1175359753.jpg','3863.33333333333',0,'2017-11-22 15:10:27',1,0,0,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (44,1,'22-09-17-03-09-34.mp4','22-09-17-03-09-34.mp4','','20171122151124-1511343684-530949243-967894805.mp4','20171122151124-1511343684-445184165-609706283.jpg','3863.33333333333',0,'2017-11-22 15:11:24',1,0,0,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (45,1,'22-09-17-03-09-28.mp4','22-09-17-03-09-28.mp4','','20171122151134-1511343694-2146348794-630667385.mp4','20171122151134-1511343694-7413795-1368393713.jpg','3863.33333333333',0,'2017-11-22 15:11:34',1,0,0,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (46,15,'1511368400988.mp4','1511368400988.mp4','','20171122220703-1511368623-2024833241-1308736825.mp4','20171122220703-1511368623-754880858-1943761800.png','4928',0,'2017-11-22 22:07:03',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (47,15,'1511437990923.mp4','1511437990923.mp4','','20171123172345-1511438025-416825082-1923388756.mp4','20171123172345-1511438025-56203696-722203734.png','4253',0,'2017-11-23 17:23:45',1,1,5,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (48,13,'1511440699793.mp4','1511440699793.mp4','','20171123180838-1511440718-1566988780-1300752137.mp4','20171123180838-1511440718-58476128-51760722.png','5460',0,'2017-11-23 18:08:38',1,1,5,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (49,15,'1511440801180.mp4','1511440801180.mp4','','20171123181038-1511440838-598777266-775693057.mp4','20171123181038-1511440838-506872790-744774787.png','4651',0,'2017-11-23 18:10:38',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (50,23,'1511491317634.mp4','???? ??','','20171124081538-1511491538-1801719056-294563751.mp4','20171124081539-1511491539-1817032312-749577974.png','8107',0,'2017-11-24 08:15:39',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (51,13,'1511252800499.mp4','1511252800499.mp4','','20171124130201-1511508721-230682993-126984622.mp4','20171124130201-1511508721-825157104-1696086735.png','612',0,'2017-11-24 13:02:01',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (52,15,'1511592909394.mp4','1511592909394.mp4','','20171125122529-1511592929-2037767880-1778073039.mp4','20171125122529-1511592929-1369004637-1359602235.png','2122',0,'2017-11-25 12:25:29',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (53,15,'1511593012173.mp4','1511593012173.mp4','','20171125122716-1511593036-294443154-1714627728.mp4','20171125122716-1511593036-707881742-348775791.png','1365',0,'2017-11-25 12:27:16',1,1,4,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (54,23,'1511774570916.mp4','test','','20171127145310-1511774590-472326518-1503444035.mp4','20171127145311-1511774591-696985045-607370122.png','4400',0,'2017-11-27 14:53:11',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (55,23,'1511774590927.mp4','test2','','20171127145330-1511774610-522869660-144955784.mp4','20171127145330-1511774610-1057696597-725976135.png','5762',0,'2017-11-27 14:53:30',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (56,13,'1511774597755.mp4','syory postinf','','20171127145350-1511774630-903602613-21742232.mp4','20171127145350-1511774630-318670740-683196435.png','6720',0,'2017-11-27 14:53:50',1,1,5,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (57,13,'1511783818824.mp4','1511783818824.mp4','','20171127172802-1511783882-2096713889-1207415226.mp4','20171127172803-1511783883-132208576-576761782.png','19540',0,'2017-11-27 17:28:03',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (58,11,'1511870962176.mp4','1511870962176.mp4','','20171128174156-1511871116-1259535014-1498774944.mp4','20171128174156-1511871116-25490942-906575090.png','18440',0,'2017-11-28 17:41:56',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (59,27,'1511938127556.mp4','1511938127556.mp4','','20171129121912-1511938152-1578875431-808926580.mp4','20171129121913-1511938153-1049331844-1594497472.png','3680',0,'2017-11-29 12:19:13',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (60,27,'1511939291192.mp4','1511939291192.mp4','','20171129123851-1511939331-19140168-1956206577.mp4','20171129123851-1511939331-789349635-740549950.png','4780',0,'2017-11-29 12:38:51',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (61,13,'1511947551917.mp4','1511947551917.mp4','','20171129145627-1511947587-1576210115-539377043.mp4','20171129145627-1511947587-12986412-1904880205.png','6002',0,'2017-11-29 14:56:27',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (62,23,'1512017870791.mp4','try','','20171130103055-1512018055-1731078598-2118178967.mp4','20171130103055-1512018055-792783909-1057608008.png','3749',0,'2017-11-30 10:30:55',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (63,13,'1512034056701.mp4','1512034056701.mp4','','20171130145802-1512034082-73352355-1155810693.mp4','20171130145802-1512034082-895861311-182000924.png','4200',0,'2017-11-30 14:58:02',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (64,13,'1512033732422.mp4','1512033732422.mp4','','20171130150055-1512034255-2113583251-1005270711.mp4','20171130150055-1512034255-1588565452-557580309.png','3105',0,'2017-11-30 15:00:55',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (65,13,'1512034254042.mp4','1512034254042.mp4','','20171130150107-1512034267-784161476-1453089563.mp4','20171130150107-1512034267-1749593409-800755330.png','1348',0,'2017-11-30 15:01:07',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (66,13,'1512034266306.mp4','1512034266306.mp4','','20171130150119-1512034279-1870239830-109252640.mp4','20171130150119-1512034279-1285915393-1530630645.png','1960',0,'2017-11-30 15:01:19',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (67,13,'1512034411781.mp4','1512034411781.mp4','','20171130150345-1512034425-360310702-137664951.mp4','20171130150345-1512034425-1244930970-1561865843.png','1350',0,'2017-11-30 15:03:45',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (68,13,'1512060353210.mp4','1512060353210.mp4','','20171130221614-1512060374-1368739726-395039350.mp4','20171130221614-1512060374-1999537453-1472781396.png','10380',0,'2017-11-30 22:16:15',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (69,13,'1512104050251.mp4','1512104050251.mp4','','20171201102430-1512104070-1036593005-794270848.mp4','20171201102431-1512104071-1561770613-99680461.png','2960',0,'2017-12-01 10:24:31',1,0,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (70,13,'1512125676960.mp4','1512125676960.mp4','','20171201162624-1512125784-1915423148-1505262210.mp4','20171201162624-1512125784-817838183-336105075.png','64220',0,'2017-12-01 16:26:24',1,0,5,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (71,23,'1512140495358.mp4','trst','','20171201203308-1512140588-1385887216-658250721.mp4','20171201203309-1512140589-163835381-1457878935.png','9340',0,'2017-12-01 20:33:09',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (72,23,'1512363699100.mp4','1512363699100.mp4','','20171204103248-1512363768-499699824-1073103492.mp4','20171204103248-1512363768-1784821507-783439888.png','8899',0,'2017-12-04 10:32:48',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (73,13,'1512370586727.mp4','1512370586727.mp4','','20171204123312-1512370992-37671720-1499154126.mp4','20171204123312-1512370992-266533932-558162379.png','4980',0,'2017-12-04 12:33:12',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (74,23,'1512626985263.mp4','my story','','20171207114129-1512627089-891614114-2129875898.mp4','20171207114130-1512627090-1791909298-390169165.png','64660',0,'2017-12-07 11:41:30',1,1,1,0,0);
insert  into `videos`(`id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (75,13,'1512629889885.mp4','1512629889885.mp4','','20171207123058-1512630058-1586998582-877159057.mp4','20171207123058-1512630058-1110354580-1151858489.png','1281',0,'2017-12-07 12:30:58',1,1,1,0,0);

/*Table structure for table `videos_story` */

DROP TABLE IF EXISTS `videos_story`;

CREATE TABLE `videos_story` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint(20) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `tags` text NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_time` varchar(50) DEFAULT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `like_emotion_type_id` int(11) NOT NULL DEFAULT '1',
  `live_y_n` int(11) NOT NULL DEFAULT '0',
  `live_video_id` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

/*Data for the table `videos_story` */

insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (1,47,15,'1511437990923.mp4','1511437990923.mp4','','20171123172345-1511438025-416825082-1923388756.mp4','20171123172345-1511438025-56203696-722203734.png','4253',0,'2017-11-23 17:23:45',1,5,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (44,48,13,'1511440699793.mp4','1511440699793.mp4','','20171123180838-1511440718-1566988780-1300752137.mp4','20171123180838-1511440718-58476128-51760722.png','5460',0,'2017-11-23 18:08:38',1,5,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (45,49,15,'1511440801180.mp4','1511440801180.mp4','','20171123181038-1511440838-598777266-775693057.mp4','20171123181038-1511440838-506872790-744774787.png','4651',0,'2017-11-23 18:10:38',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (46,50,23,'1511491317634.mp4','???? ??','','20171124081538-1511491538-1801719056-294563751.mp4','20171124081539-1511491539-1817032312-749577974.png','8107',0,'2017-11-24 08:15:39',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (47,51,13,'1511252800499.mp4','1511252800499.mp4','','20171124130201-1511508721-230682993-126984622.mp4','20171124130201-1511508721-825157104-1696086735.png','612',0,'2017-11-24 13:02:01',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (48,52,15,'1511592909394.mp4','1511592909394.mp4','','20171125122529-1511592929-2037767880-1778073039.mp4','20171125122529-1511592929-1369004637-1359602235.png','2122',0,'2017-11-25 12:25:29',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (49,53,15,'1511593012173.mp4','1511593012173.mp4','','20171125122716-1511593036-294443154-1714627728.mp4','20171125122716-1511593036-707881742-348775791.png','1365',0,'2017-11-25 12:27:16',1,4,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (50,54,23,'1511774570916.mp4','test','','20171127145310-1511774590-472326518-1503444035.mp4','20171127145311-1511774591-696985045-607370122.png','4400',0,'2017-11-27 14:53:11',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (51,55,23,'1511774590927.mp4','test2','','20171127145330-1511774610-522869660-144955784.mp4','20171127145330-1511774610-1057696597-725976135.png','5762',0,'2017-11-27 14:53:30',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (52,56,13,'1511774597755.mp4','syory postinf','','20171127145350-1511774630-903602613-21742232.mp4','20171127145350-1511774630-318670740-683196435.png','6720',0,'2017-11-27 14:53:50',1,5,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (53,59,27,'1511938127556.mp4','1511938127556.mp4','','20171129121912-1511938152-1578875431-808926580.mp4','20171129121913-1511938153-1049331844-1594497472.png','3680',0,'2017-11-29 12:19:13',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (54,62,23,'1512017870791.mp4','try','','20171130103055-1512018055-1731078598-2118178967.mp4','20171130103055-1512018055-792783909-1057608008.png','3749',0,'2017-11-30 10:30:55',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (55,63,13,'1512034056701.mp4','1512034056701.mp4','','20171130145802-1512034082-73352355-1155810693.mp4','20171130145802-1512034082-895861311-182000924.png','4200',0,'2017-11-30 14:58:02',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (56,64,13,'1512033732422.mp4','1512033732422.mp4','','20171130150055-1512034255-2113583251-1005270711.mp4','20171130150055-1512034255-1588565452-557580309.png','3105',0,'2017-11-30 15:00:55',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (57,65,13,'1512034254042.mp4','1512034254042.mp4','','20171130150107-1512034267-784161476-1453089563.mp4','20171130150107-1512034267-1749593409-800755330.png','1348',0,'2017-11-30 15:01:07',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (58,71,23,'1512140495358.mp4','trst','','20171201203308-1512140588-1385887216-658250721.mp4','20171201203309-1512140589-163835381-1457878935.png','9340',0,'2017-12-01 20:33:09',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (59,72,23,'1512363699100.mp4','1512363699100.mp4','','20171204103248-1512363768-499699824-1073103492.mp4','20171204103248-1512363768-1784821507-783439888.png','8899',0,'2017-12-04 10:32:48',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (60,73,13,'1512370586727.mp4','1512370586727.mp4','','20171204123312-1512370992-37671720-1499154126.mp4','20171204123312-1512370992-266533932-558162379.png','4980',0,'2017-12-04 12:33:12',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (61,74,23,'1512626985263.mp4','my story','','20171207114129-1512627089-891614114-2129875898.mp4','20171207114130-1512627090-1791909298-390169165.png','64660',0,'2017-12-07 11:41:30',1,1,0,0);
insert  into `videos_story`(`id`,`video_id`,`user_id`,`name`,`description`,`tags`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`like_emotion_type_id`,`live_y_n`,`live_video_id`) values (62,75,13,'1512629889885.mp4','1512629889885.mp4','','20171207123058-1512630058-1586998582-877159057.mp4','20171207123058-1512630058-1110354580-1151858489.png','1281',0,'2017-12-07 12:30:58',1,1,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
