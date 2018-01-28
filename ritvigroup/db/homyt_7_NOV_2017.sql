/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.6.35-log : Database - homyt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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

insert  into `chat_image`(`id`,`chat_between_user`,`image_path`,`web_image_path`,`uploaded_on`) values (1,'1_2/','../../uploads/image/chat/1_2/20171101115048-1509517248-149638519.png','','2017-11-01 11:50:48'),(2,'1_2/','../../uploads/image/chat/1_2/20171101120015-1509517815-415882268.png','','2017-11-01 12:00:15'),(3,'1_2/','../../uploads/image/chat/1_2/20171101120346-1509518026-83922982.png','','2017-11-01 12:03:46'),(4,'1_2/','../../uploads/image/chat/1_2/20171101122055-1509519055-551440629.png','','2017-11-01 12:20:55'),(5,'1_2/','../../uploads/image/chat/1_2/20171101122150-1509519110-1169751611.png','','2017-11-01 12:21:50'),(6,'1_2/','../../uploads/image/chat/1_2/20171101122917-1509519557-1654838915.jpg','','2017-11-01 12:29:17'),(7,'1_2/','../../upload/image/chat/1_2/20171101155826-1509532106-159198390.jpg','','2017-11-01 15:58:26'),(8,'1_2/','upload/image/chat/1_2/20171101155852-1509532132-955430768.png','','2017-11-01 15:58:52'),(9,'1_2/','uploads/image/chat/1_2/20171101155942-1509532182-692000394.jpg','','2017-11-01 15:59:42'),(10,'1_2/','uploads/image/chat/1_2/20171101160155-1509532315-2092607668.jpg','','2017-11-01 16:01:55'),(11,'1_2/','../../uploads/image/chat/1_2/20171101160439-1509532479-273818523.jpg','','2017-11-01 16:04:39');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `messages` */

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `user_devices` */

insert  into `user_devices`(`id`,`user_id`,`device_token_id`,`device_name`,`added_on`,`device_os`,`lant`,`long`,`status`) values (1,2,'','','2017-11-01 17:05:27','','0.0','0.0',1),(2,2,'','','2017-11-01 17:10:42','android','0.0','0.0',1),(3,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-01 17:47:51','android','0.0','0.0',1),(4,3,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:35:36','android','77.21707333333333','28.527924999999996',1),(5,3,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:37:30','android','77.21707333333333','28.527924999999996',1),(6,4,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:45:22','android','77.21707333333333','28.527924999999996',1),(7,6,'','Google Android SDK built for x86 7.0 M','2017-11-01 18:53:13','android','77.21707333333333','28.527924999999996',1),(8,7,'DemoToken','','2017-11-03 15:47:51','','28.6351305','77.2807421',1),(9,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-03 17:32:36','android','28.627542','77.37238',1),(10,7,'DemoToken','','2017-11-03 18:13:22','','28.6351305','77.2807421',1),(11,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 10:17:27','android','77.21707333333333','28.527924999999996',1),(12,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 11:12:39','android','77.21707333333333','28.527924999999996',1),(13,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 11:23:32','android','77.21707333333333','28.527924999999996',1),(14,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 12:23:33','android','77.21707333333333','28.527924999999996',1),(15,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 12:29:25','android','77.21707333333333','28.527924999999996',1),(16,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 12:35:23','android','77.21707333333333','28.527924999999996',1),(17,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 13:32:58','android','77.21707333333333','28.527924999999996',1),(18,2,'','Google Android SDK built for x86 7.0 M','2017-11-04 13:40:57','android','77.21707333333333','28.527924999999996',1),(19,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-06 11:59:43','android','28.627542','77.37238',1),(20,8,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 12:53:14','android','28.627542','77.37238',1),(21,2,'','OnePlus A0001 6.0.1 LOLLIPOP_MR1','2017-11-07 13:38:37','android','28.6274823','77.3723576',1),(22,8,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 13:39:12','android','28.627542','77.37238',1),(23,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 14:56:17','android','28.6274584','77.3723582',1),(24,9,'','vivo vivo V3Max 5.1.1 LOLLIPOP','2017-11-07 14:58:06','android','28.6274414','77.3723565',1),(25,3,'','Sony D5322 5.1.1 LOLLIPOP','2017-11-07 16:56:43','android','28.6275196','77.37238',1),(26,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:03:31','android','28.6274717','77.3723618',1),(27,10,'','LGE LG-H850 7.0 M','2017-11-07 17:08:26','android','','',1),(28,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:11:31','android','28.6274733','77.372362',1),(29,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:13:15','android','28.6274907','77.3723623',1),(30,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:14:26','android','28.6274783','77.3723612',1),(31,2,'','Motorola Moto G4 Plus 7.1.2 N','2017-11-07 17:16:29','android','28.6274738','77.3723614',1);

/*Table structure for table `user_follows` */

DROP TABLE IF EXISTS `user_follows`;

CREATE TABLE `user_follows` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `follow_on` datetime NOT NULL,
  `privacy_hide` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `user_follows` */

insert  into `user_follows`(`id`,`user_id`,`friend_id`,`follow_on`,`privacy_hide`) values (1,1,3,'2017-11-01 18:29:36',0),(2,1,4,'2017-10-19 10:15:35',0),(6,2,1,'2017-11-04 15:40:22',0),(7,1,5,'2017-11-04 15:52:03',0),(8,8,1,'2017-11-07 12:53:39',0),(9,3,2,'2017-11-07 16:59:35',0);

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

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `phonecountry` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `zipcode` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `image` varchar(200) DEFAULT NULL,
  `device_token` text,
  `login_otp` varchar(100) DEFAULT NULL,
  `login_otp_valid_till` datetime NOT NULL,
  `register_otp` varchar(100) DEFAULT NULL,
  `register_otp_valid_till` datetime NOT NULL,
  `password_reset_code` varchar(100) DEFAULT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`firstname`,`middlename`,`lastname`,`fullname`,`email`,`phonecountry`,`phone`,`address`,`city`,`state`,`country`,`zipcode`,`status`,`image`,`device_token`,`login_otp`,`login_otp_valid_till`,`register_otp`,`register_otp_valid_till`,`password_reset_code`,`activation_code`,`created_on`,`updated_on`) values (1,'rajesh1may@gmail.com','d41d8cd98f00b204e9800998ecf8427e',NULL,NULL,NULL,'Rajesh','rajesh1may@gmail.com',NULL,'8911529958','Sector 62','Noida','UP','0',NULL,1,'20171104125436PM-1509780276-PROFILE-1608090543.jpg',NULL,NULL,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-09-20 11:42:48','2017-11-04 12:54:36'),(2,'9873738969',NULL,NULL,NULL,NULL,'9873738969','vishwakarmasunil68@gmail.com',NULL,'9873738969','Malviya Nagar','New Delhi','Delhi','0',NULL,1,NULL,'','12345','2017-11-07 17:17:21',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 06:20:00','2017-11-04 14:18:55'),(3,'9999999999',NULL,NULL,NULL,NULL,'9999999999',NULL,NULL,'9999999999',NULL,NULL,'0','0',NULL,1,NULL,'','12345','2017-11-07 16:57:39',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:30:11',NULL),(4,'5985559565',NULL,NULL,NULL,NULL,'5985559565',NULL,NULL,'5985559565',NULL,NULL,'0','0',NULL,1,NULL,'','12345','2017-11-01 18:45:56',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:44:56',NULL),(5,'5485255522',NULL,NULL,NULL,NULL,'5485255522',NULL,NULL,'5485255522',NULL,NULL,'0','0',NULL,1,NULL,'','12345','2017-11-01 18:51:23',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:50:23',NULL),(6,'2658945641',NULL,NULL,NULL,NULL,'2658945641',NULL,NULL,'2658945641',NULL,NULL,'0','0',NULL,1,NULL,'','12345','2017-11-01 18:54:09',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-01 18:53:09',NULL),(7,'1234567890',NULL,NULL,NULL,NULL,'1234567890',NULL,NULL,'1234567890',NULL,NULL,'0','0',NULL,1,NULL,'DemoToken','12345','2017-11-03 18:14:10',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-03 15:28:09',NULL),(8,'9911529958',NULL,NULL,NULL,NULL,'9911529958',NULL,NULL,'9911529958',NULL,NULL,NULL,NULL,NULL,1,NULL,'','12345','2017-11-07 13:40:07',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-07 12:53:09',NULL),(9,'8888888888',NULL,NULL,NULL,NULL,'8888888888',NULL,NULL,'8888888888',NULL,NULL,NULL,NULL,NULL,1,NULL,'','12345','2017-11-07 14:59:02',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-07 14:58:02',NULL),(10,'0597100096',NULL,NULL,NULL,NULL,'0597100096',NULL,NULL,'0597100096',NULL,NULL,NULL,NULL,NULL,1,NULL,'','12345','2017-11-07 17:09:06',NULL,'0000-00-00 00:00:00',NULL,NULL,'2017-11-07 17:08:06',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `video_comments` */

insert  into `video_comments`(`id`,`comment_id`,`user_id`,`video_id`,`comment`,`comment_on`,`delete_yes_no`) values (1,0,1,1,'This is my first comment','2017-11-06 16:19:43',0),(2,0,1,1,'This is my second comment','2017-11-06 16:19:52',0),(3,0,1,1,'This is my second comment','2017-11-06 16:21:56',0),(4,0,1,1,'This is my second comment','2017-11-06 16:33:02',0),(5,0,1,1,'This is my last comment','2017-11-06 16:34:59',0),(6,0,1,1,'This is my last comment','2017-11-06 16:39:39',0),(7,0,1,1,'This is my last comment','2017-11-06 18:10:42',0),(8,0,2,18,'first comment','2017-11-07 15:52:24',0),(9,0,2,18,'second comment','2017-11-07 15:53:31',0),(10,0,1,1,'test comment','2017-11-07 16:30:05',0),(11,0,1,1,'test comment','2017-11-07 16:30:46',0),(12,0,2,18,'second comment','2017-11-07 16:31:23',0),(13,0,2,18,'fourth comment','2017-11-07 16:35:06',0),(14,0,2,18,'fifth comment','2017-11-07 16:38:59',0),(15,0,2,18,'aasdc','2017-11-07 16:39:15',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `video_likes` */

insert  into `video_likes`(`id`,`like_id`,`user_id`,`video_id`,`like_type`,`liked_on`) values (4,0,1,1,1,'2017-11-06 18:15:28'),(5,0,1,2,1,'2017-11-06 18:15:32'),(6,0,1,3,1,'2017-11-06 18:15:39'),(12,0,1,5,1,'2017-11-06 18:16:51'),(13,0,1,6,1,'2017-11-06 18:16:55'),(14,0,1,7,1,'2017-11-06 18:17:00'),(32,0,2,18,1,'2017-11-07 12:29:14'),(35,0,1,4,1,'2017-11-07 14:53:02');

/*Table structure for table `video_types` */

DROP TABLE IF EXISTS `video_types`;

CREATE TABLE `video_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `video_types` */

insert  into `video_types`(`id`,`name`) values (1,'1 Minute'),(2,'3 Minutes'),(3,'15 Minutes');

/*Table structure for table `video_views` */

DROP TABLE IF EXISTS `video_views`;

CREATE TABLE `video_views` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `video_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `viewed_on` datetime NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `viewed_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `video_views` */

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `video_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_time` varchar(50) DEFAULT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `post_story` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `videos` */

insert  into `videos`(`id`,`user_id`,`name`,`description`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`,`post_story`) values (1,1,'test file','test file','20171104165458-1509794698-176602838-1505420289.mp4','20171104165458-1509794698-918452037-547301929.png','3:00',0,'2017-11-04 16:54:58',1,1),(2,1,'test file','test file','20171104173542-1509797142-1729943870-1251966942.mp4','20171104173542-1509797142-1102523617-1692462434.png','3:00',0,'2017-11-04 17:35:42',1,1),(3,1,'myvideo.mp4','myvideo.mp4','20171104175930-1509798570-433219644-440976075.mp4','20171104175930-1509798570-980816472-397487200.png','5548',0,'2017-11-04 17:59:30',1,0),(4,1,'test file','test file','20171106113044-1509948044-1544740680-1798585733.mp4','20171106113044-1509948044-1652353412-602242066.png','3:00',0,'2017-11-06 11:30:44',1,1),(5,1,'myvideo.mp4','myvideo.mp4','20171106113201-1509948121-140469627-995814119.mp4','20171106113201-1509948121-312580188-285705715.png','2901',0,'2017-11-06 11:32:01',1,0),(6,1,'myvideo.mp4','myvideo.mp4','20171106113741-1509948461-1476587837-226794639.mp4','20171106113741-1509948461-2128982571-1765010282.png','2901',0,'2017-11-06 11:37:41',1,0),(7,1,'myvideo.mp4','myvideo.mp4','20171106114104-1509948664-2131657807-998576758.mp4','20171106114104-1509948664-1042699215-1185454230.png','2901',0,'2017-11-06 11:41:04',1,0),(8,1,'myvideo.mp4','myvideo.mp4','20171106115959-1509949799-163867963-1915561024.mp4','20171106115959-1509949799-1531372740-1793856591.png','2901',0,'2017-11-06 11:59:59',1,0),(9,1,'test file','test file','20171106120627-1509950187-1067451732-1434912427.mp4','20171106120627-1509950187-1874076537-1646664189.png','3:00',0,'2017-11-06 12:06:27',1,0),(10,1,'test file','test file','20171106120646-1509950206-1832351855-626107921.mp4','20171106120646-1509950206-1226157650-1831026346.png','3:00',0,'2017-11-06 12:06:46',1,0),(11,1,'myvideo.mp4','myvideo.mp4','20171106125956-1509953396-1487584872-1858423570.mp4','20171106125956-1509953396-1196012158-1273534750.png','1080',0,'2017-11-06 12:59:56',0,0),(12,2,'myvideo.mp4','myvideo.mp4','20171106174139-1509970299-14128188-993639744.mp4','20171106174139-1509970299-1497630297-780898820.png','3579',0,'2017-11-06 17:41:39',1,0),(13,2,'myvideo.mp4','myvideo.mp4','20171106174839-1509970719-802318359-1489930294.mp4','20171106174839-1509970719-447113050-1916077728.png','3579',0,'2017-11-06 17:48:39',1,0),(14,2,'myvideo.mp4','myvideo.mp4','20171106174929-1509970769-274964976-729472808.mp4','20171106174929-1509970769-2096423122-1080862453.png','3579',0,'2017-11-06 17:49:29',1,0),(15,2,'myvideo.mp4','myvideo.mp4','20171106181929-1509972569-2143739626-1099794766.mp4','20171106181929-1509972569-1684083949-1150988590.png','1895',0,'2017-11-06 18:19:29',1,0),(16,2,'myvideo.mp4','myvideo.mp4','20171107101713-1510030033-449228726-1853104249.mp4','20171107101713-1510030033-499435071-378771879.png','2859',0,'2017-11-07 10:17:13',1,0),(17,2,'myvideo.mp4','myvideo.mp4','20171107102741-1510030661-124041664-1183573246.mp4','20171107102741-1510030661-1704855988-1375582305.png','2919',0,'2017-11-07 10:27:41',1,0),(18,2,'myvideo.mp4','myvideo.mp4','20171107103040-1510030840-717963938-1505625865.mp4','20171107103040-1510030840-362659187-707866748.png','1764',0,'2017-11-07 10:30:40',1,1),(19,2,'myvideo.mp4','myvideo.mp4','20171107122319-1510037599-839624020-517665141.mp4','20171107122319-1510037599-480832395-613679622.png','1894',0,'2017-11-07 12:23:19',1,1),(20,8,'myvideo.mp4','myvideo.mp4','20171107135753-1510043273-950143737-404199396.mp4','20171107135753-1510043273-1849813179-129418319.png','853',0,'2017-11-07 13:57:53',1,1),(21,2,'myvideo.mp4','myvideo.mp4','20171107143023-1510045223-785517349-839512277.mp4','20171107143023-1510045223-2111413398-1037901833.png','1003',0,'2017-11-07 14:30:23',1,1),(22,1,'test file','test file','20171107150803-1510047483-2031311656-1664406441.mp4','20171107150803-1510047483-1233356825-1376200475.jpg','3:00',0,'2017-11-07 15:08:03',1,0),(23,1,'test file','test file','20171107150818-1510047498-2131743423-224563961.mp4','20171107150818-1510047498-304532954-1256169989.jpg','3:00',0,'2017-11-07 15:08:18',1,0),(24,2,'myvideo.mp4','myvideo.mp4','20171107150937-1510047577-526841527-1376562996.mp4','20171107150937-1510047577-2124923907-1640610213.png','2280',0,'2017-11-07 15:09:37',1,1),(25,2,'myvideo.mp4','myvideo.mp4','20171107150949-1510047589-863310077-1291572049.mp4','20171107150949-1510047589-876052003-377801085.png','2280',0,'2017-11-07 15:09:49',1,1),(26,0,'myvideo.mp4','myvideo.mp4','20171107151924-1510048164-898316210-1026402075.mp4','20171107151924-1510048164-776144587-118451914.png','706',0,'2017-11-07 15:19:24',1,1);

/*Table structure for table `videos_story` */

DROP TABLE IF EXISTS `videos_story`;

CREATE TABLE `videos_story` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `video_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_time` varchar(50) DEFAULT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `videos_story` */

insert  into `videos_story`(`id`,`user_id`,`name`,`description`,`video_path`,`image_path`,`video_time`,`album_id`,`added_on`,`status`) values (1,2,'myvideo.mp4','myvideo.mp4','20171107103040-1510030840-717963938-1505625865.mp4','20171107103040-1510030840-362659187-707866748.png','1764',0,'2017-11-07 10:30:40',1),(2,2,'myvideo.mp4','myvideo.mp4','20171107122319-1510037599-839624020-517665141.mp4','20171107122319-1510037599-480832395-613679622.png','1894',0,'2017-11-07 12:23:19',1),(3,8,'myvideo.mp4','myvideo.mp4','20171107135753-1510043273-950143737-404199396.mp4','20171107135753-1510043273-1849813179-129418319.png','853',0,'2017-11-07 13:57:53',1),(4,2,'myvideo.mp4','myvideo.mp4','20171107143023-1510045223-785517349-839512277.mp4','20171107143023-1510045223-2111413398-1037901833.png','1003',0,'2017-11-07 14:30:23',1),(5,2,'myvideo.mp4','myvideo.mp4','20171107150937-1510047577-526841527-1376562996.mp4','20171107150937-1510047577-2124923907-1640610213.png','2280',0,'2017-11-07 15:09:37',1),(6,2,'myvideo.mp4','myvideo.mp4','20171107150949-1510047589-863310077-1291572049.mp4','20171107150949-1510047589-876052003-377801085.png','2280',0,'2017-11-07 15:09:49',1),(7,0,'myvideo.mp4','myvideo.mp4','20171107151924-1510048164-898316210-1026402075.mp4','20171107151924-1510048164-776144587-118451914.png','706',0,'2017-11-07 15:19:24',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
