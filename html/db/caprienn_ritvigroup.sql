-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2018 at 07:27 AM
-- Server version: 5.5.53-38.5-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caprienn_ritvigroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE IF NOT EXISTS `citizen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `mpin` int(11) NOT NULL DEFAULT '0',
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `device_token` text,
  `login_otp` varchar(100) DEFAULT NULL,
  `login_status` int(11) NOT NULL DEFAULT '1',
  `login_otp_valid_till` datetime NOT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `lantitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `deactivated_on` datetime NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`),
  KEY `mpin` (`mpin`),
  KEY `email` (`email`),
  KEY `login_status` (`login_status`),
  KEY `profile_id` (`profile_id`),
  KEY `login_otp` (`login_otp`),
  KEY `login_otp_valid_till` (`login_otp_valid_till`),
  KEY `activation_code` (`activation_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`id`, `profile_id`, `username`, `password`, `mpin`, `email`, `mobile`, `status`, `device_token`, `login_otp`, `login_status`, `login_otp_valid_till`, `activation_code`, `lantitude`, `longitude`, `deactivated_on`, `created_on`, `updated_on`) VALUES
(1, '38356075715198137571608353036', 'kaajneeti1519813757', NULL, 1234, NULL, '+919873738969', 1, '', '619203', 1, '2018-02-28 16:00:47', NULL, NULL, NULL, '0000-00-00 00:00:00', '2018-02-28 15:59:17', NULL),
(2, '14527447541520153613139050493', 'kaajneeti1520153613', NULL, 0, NULL, '+919643870815', 0, '', '701243', 0, '2018-03-04 14:25:03', NULL, NULL, NULL, '0000-00-00 00:00:00', '2018-03-04 14:23:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `citizen_album`
--

CREATE TABLE IF NOT EXISTS `citizen_album` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `show_for` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `citizen_fav_citizen`
--

CREATE TABLE IF NOT EXISTS `citizen_fav_citizen` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) NOT NULL DEFAULT '0',
  `friend_citizen_id` bigint(20) NOT NULL DEFAULT '0',
  `fav_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`citizen_id`,`friend_citizen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `citizen_fav_leader`
--

CREATE TABLE IF NOT EXISTS `citizen_fav_leader` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) NOT NULL DEFAULT '0',
  `leader_profile_id` bigint(20) NOT NULL DEFAULT '0',
  `fav_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`citizen_id`,`leader_profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `citizen_fav_leader`
--

INSERT INTO `citizen_fav_leader` (`id`, `citizen_id`, `leader_profile_id`, `fav_on`) VALUES
(2, 1, 1, '2018-03-04 13:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_log`
--

CREATE TABLE IF NOT EXISTS `citizen_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) NOT NULL,
  `device_token_id` text NOT NULL,
  `device_name` text,
  `device_os` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `lantitude` varchar(200) DEFAULT NULL,
  `logged_in` datetime NOT NULL,
  `logged_out` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `citizen_log`
--

INSERT INTO `citizen_log` (`id`, `citizen_id`, `device_token_id`, `device_name`, `device_os`, `longitude`, `lantitude`, `logged_in`, `logged_out`) VALUES
(1, 1, '', '', '', '', '', '2018-02-28 15:59:52', '0000-00-00 00:00:00'),
(2, 1, '', '', '', '', '', '2018-02-28 16:00:05', '0000-00-00 00:00:00'),
(3, 1, '', '', '', '', '', '2018-02-28 16:00:09', '0000-00-00 00:00:00'),
(4, 1, '', '', '', '', '', '2018-02-28 16:00:10', '0000-00-00 00:00:00'),
(5, 1, '', '', '', '', '', '2018-02-28 16:00:10', '0000-00-00 00:00:00'),
(6, 1, '', '', '', '', '', '2018-02-28 16:00:10', '0000-00-00 00:00:00'),
(7, 1, '', '', '', '', '', '2018-02-28 16:00:11', '0000-00-00 00:00:00'),
(8, 1, '', '', '', '', '', '2018-02-28 16:00:11', '0000-00-00 00:00:00'),
(9, 1, '', '', '', '', '', '2018-02-28 16:00:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_photo`
--

CREATE TABLE IF NOT EXISTS `citizen_photo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) unsigned NOT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_title` varchar(255) NOT NULL,
  `photo_description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `citizen_profile`
--

CREATE TABLE IF NOT EXISTS `citizen_profile` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) unsigned NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `alt_mobile` varchar(20) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `date_of_birth` date NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `zipcode` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `about_me` text NOT NULL,
  `profile_photo_id` bigint(20) NOT NULL DEFAULT '0',
  `cover_photo_id` bigint(20) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `updated_on` datetime DEFAULT NULL,
  `facebook_profile_id` varchar(255) NOT NULL,
  `google_profile_id` varchar(255) NOT NULL,
  `twitter_profile_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `citizen_id` (`citizen_id`),
  KEY `profile_photo_id` (`profile_photo_id`),
  KEY `cover_photo_id` (`cover_photo_id`),
  KEY `facebook_profile_id` (`facebook_profile_id`),
  KEY `google_profile_id` (`google_profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `citizen_profile`
--

INSERT INTO `citizen_profile` (`id`, `citizen_id`, `firstname`, `middlename`, `lastname`, `fullname`, `email`, `mobile`, `alt_mobile`, `gender`, `date_of_birth`, `address`, `city`, `state`, `country`, `zipcode`, `about_me`, `profile_photo_id`, `cover_photo_id`, `status`, `updated_on`, `facebook_profile_id`, `google_profile_id`, `twitter_profile_id`) VALUES
(1, 1, 'kaajneeti1519813757', NULL, NULL, 'kaajneeti1519813757', NULL, '+919873738969', '', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '2018-02-28 15:59:17', '', '', ''),
(2, 2, 'kaajneeti1520153613', NULL, NULL, 'kaajneeti1520153613', NULL, '+919643870815', '', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', 0, 0, 0, '2018-03-04 14:23:33', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `complaint_id` varchar(50) NOT NULL,
  `self_other_group` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_father_name` varchar(100) NOT NULL,
  `c_gender` varchar(10) NOT NULL,
  `c_mobile` varchar(20) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_aadhaar_number` varchar(100) NOT NULL,
  `c_district` varchar(100) NOT NULL,
  `c_tehsil` varchar(100) NOT NULL,
  `c_thana` varchar(100) NOT NULL,
  `c_block` varchar(100) NOT NULL,
  `c_village_panchayat` varchar(100) NOT NULL,
  `c_village` varchar(100) NOT NULL,
  `c_town_area` varchar(100) NOT NULL,
  `c_ward` varchar(100) NOT NULL,
  `c_full_address` varchar(200) NOT NULL,
  `c_department` varchar(100) NOT NULL,
  `c_subject` varchar(200) NOT NULL,
  `c_description` text NOT NULL,
  `c_added_on` datetime NOT NULL,
  `c_added_by` bigint(20) NOT NULL,
  `c_updated_on` datetime NOT NULL,
  `c_updated_by` bigint(20) NOT NULL,
  `c_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_assigned_to`
--

CREATE TABLE IF NOT EXISTS `complaint_assigned_to` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `complaint_id` bigint(20) NOT NULL,
  `assigned_to_admin` bigint(20) NOT NULL,
  `assigned_from_user` bigint(20) NOT NULL,
  `assigned_from_admin` bigint(20) NOT NULL,
  `assigned_status` varchar(100) NOT NULL,
  `assigned_description` text NOT NULL,
  `assigned_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_associated_member`
--

CREATE TABLE IF NOT EXISTS `complaint_associated_member` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `complaint_id` bigint(20) NOT NULL,
  `associated_citizen_id` bigint(20) NOT NULL,
  `associated_status` varchar(100) NOT NULL,
  `associated_accept_status` int(11) NOT NULL DEFAULT '0',
  `associated_on` datetime NOT NULL,
  `associated_accepted_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_attachment`
--

CREATE TABLE IF NOT EXISTS `complaint_attachment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `c_id` bigint(20) NOT NULL,
  `c_type` varchar(20) NOT NULL,
  `c_filename` varchar(200) NOT NULL,
  `c_org_filename` varchar(200) NOT NULL,
  `c_order` int(11) NOT NULL DEFAULT '0',
  `c_status` int(11) NOT NULL DEFAULT '0',
  `c_added_on` datetime NOT NULL,
  `c_deleted_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `iso_code_2` varchar(2) NOT NULL,
  `iso_code_3` varchar(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `phone_code` varchar(20) DEFAULT NULL,
  `favourite` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `feedback_by` varchar(255) NOT NULL,
  `feedback_text` text NOT NULL,
  `feedback_image` varchar(255) NOT NULL,
  `sent_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE IF NOT EXISTS `leader` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `mpin` int(11) NOT NULL DEFAULT '0',
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `device_token` text,
  `login_otp` varchar(100) DEFAULT NULL,
  `login_status` int(11) NOT NULL DEFAULT '1',
  `login_otp_valid_till` datetime NOT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `lantitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `deactivated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leader`
--

INSERT INTO `leader` (`id`, `profile_id`, `username`, `password`, `mpin`, `email`, `phone`, `status`, `device_token`, `login_otp`, `login_status`, `login_otp_valid_till`, `activation_code`, `created_on`, `updated_on`, `lantitude`, `longitude`, `deactivated_on`) VALUES
(1, '3423423434242', 'rajesh1may', 'rajesh', 1234, 'rajesh1may@gmail.com', '9911529958', 1, NULL, '123456', 1, '0000-00-00 00:00:00', NULL, '2018-03-01 07:29:34', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(2, '3423423446346', 'sunandroid1993', 'sunil', 1234, 'sunandroid1993@gmail.com', '2342342342', 1, NULL, '123456', 1, '0000-00-00 00:00:00', NULL, '2018-03-01 07:29:34', NULL, NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leader_album`
--

CREATE TABLE IF NOT EXISTS `leader_album` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `leader_profile_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `show_for` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leader_fav_leader`
--

CREATE TABLE IF NOT EXISTS `leader_fav_leader` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `leader_profile_id` bigint(20) NOT NULL DEFAULT '0',
  `friend_leader_profile_id` bigint(20) NOT NULL DEFAULT '0',
  `fav_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`friend_leader_profile_id`,`leader_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leader_log`
--

CREATE TABLE IF NOT EXISTS `leader_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `leader_id` bigint(20) NOT NULL,
  `device_token_id` text NOT NULL,
  `device_name` text,
  `device_os` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `lantitude` varchar(200) DEFAULT NULL,
  `logged_in` datetime NOT NULL,
  `logged_out` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leader_photo`
--

CREATE TABLE IF NOT EXISTS `leader_photo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `leader_profile_id` bigint(20) unsigned NOT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leader_profile`
--

CREATE TABLE IF NOT EXISTS `leader_profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `leader_id` bigint(20) NOT NULL,
  `leader_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=Leader, 2=Subleader',
  `parent_leader_id` bigint(20) NOT NULL,
  `leader_role` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `device_token` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `state` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `alt_mobile` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `image_id` bigint(20) NOT NULL,
  `cover_image_id` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`leader_id`,`parent_leader_id`,`leader_role`,`first_name`,`middle_name`,`last_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leader_profile`
--

INSERT INTO `leader_profile` (`id`, `leader_id`, `leader_type`, `parent_leader_id`, `leader_role`, `first_name`, `middle_name`, `last_name`, `email`, `device_token`, `date_of_birth`, `gender`, `state`, `mobile`, `alt_mobile`, `status`, `image_id`, `cover_image_id`, `created_on`, `updated_on`) VALUES
(1, 1, '1', 0, 0, 'Rajesh', 'Kumar', 'Vishwakarma', 'rajesh1may@gmail.com', '', '1981-05-01', 'Male', 'New Delhi', '9911529958', '', 1, 0, 0, '2018-03-01 05:23:29', '0000-00-00 00:00:00'),
(2, 2, '2', 0, 0, 'Sunil', 'Kumar', 'Vishwakarma', 'sunandroid1993@gmail.com', '', '1993-05-01', 'Male', 'New Delhi', '3423423423', '', 1, 0, 0, '2018-03-02 05:23:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) unsigned NOT NULL,
  `friend_citizen_id` bigint(20) unsigned NOT NULL,
  `citizen_group_id` bigint(20) unsigned NOT NULL,
  `message_type` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `video_length` varchar(200) DEFAULT NULL,
  `message_text` text NOT NULL,
  `sent_on` datetime NOT NULL,
  `server_added_on` datetime NOT NULL,
  `deleted_y_n` int(11) DEFAULT '0',
  `received_on` datetime NOT NULL,
  `seen_on` datetime NOT NULL,
  `received_y_n` int(11) NOT NULL DEFAULT '0',
  `seen_y_n` int(11) NOT NULL DEFAULT '0',
  `firekey` text NOT NULL,
  `citizen_deleted_y_n` int(11) NOT NULL DEFAULT '0',
  `friend_citizen_deleted_y_n` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `citizen_id` (`citizen_id`),
  KEY `citizen_group_id` (`citizen_group_id`),
  KEY `friend_citizen_id` (`friend_citizen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_group`
--

CREATE TABLE IF NOT EXISTS `message_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `citizen_id` bigint(20) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `group_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `citizen_id` (`citizen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action_perform` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `open_url` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `story_id` bigint(20) NOT NULL,
  `video_id` bigint(20) NOT NULL,
  `profile_id` bigint(20) NOT NULL,
  `added_on` datetime NOT NULL,
  `firekey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_read`
--

CREATE TABLE IF NOT EXISTS `notifications_read` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `notification_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `read_on` datetime NOT NULL,
  `deleted_y_n` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `report_by` bigint(20) NOT NULL,
  `report_text` varchar(255) NOT NULL,
  `report_image` varchar(255) NOT NULL,
  `report_on` datetime NOT NULL,
  `report_video` bigint(20) NOT NULL,
  `report_user` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `suggestion_id` varchar(50) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_father_name` varchar(100) NOT NULL,
  `c_gender` varchar(10) NOT NULL,
  `c_mobile` varchar(20) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_aadhaar_number` varchar(100) NOT NULL,
  `c_district` varchar(100) NOT NULL,
  `c_tehsil` varchar(100) NOT NULL,
  `c_thana` varchar(100) NOT NULL,
  `c_block` varchar(100) NOT NULL,
  `c_village_panchayat` varchar(100) NOT NULL,
  `c_village` varchar(100) NOT NULL,
  `c_town_area` varchar(100) NOT NULL,
  `c_ward` varchar(100) NOT NULL,
  `c_full_address` varchar(200) NOT NULL,
  `c_department` varchar(100) NOT NULL,
  `c_subject` varchar(200) NOT NULL,
  `c_description` text NOT NULL,
  `c_added_on` datetime NOT NULL,
  `c_added_by` bigint(20) NOT NULL,
  `c_updated_on` datetime NOT NULL,
  `c_updated_by` bigint(20) NOT NULL,
  `c_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `mpin` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `phonecountry` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `alt_mobile` varchar(20) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `date_of_birth` date NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `zipcode` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `about_me` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `image` varchar(200) DEFAULT NULL,
  `device_token` text,
  `login_otp` varchar(100) DEFAULT NULL,
  `login_status` int(11) NOT NULL DEFAULT '1',
  `login_otp_valid_till` datetime NOT NULL,
  `register_otp` varchar(100) DEFAULT NULL,
  `register_otp_valid_till` datetime NOT NULL,
  `password_reset_code` varchar(100) DEFAULT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `lant` varchar(200) DEFAULT NULL,
  `long` varchar(200) DEFAULT NULL,
  `deactivated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_devices`
--

CREATE TABLE IF NOT EXISTS `users_devices` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_fav_citizen`
--

CREATE TABLE IF NOT EXISTS `user_fav_citizen` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_profile_id` bigint(20) NOT NULL,
  `fav_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`user_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_fav_leader`
--

CREATE TABLE IF NOT EXISTS `user_fav_leader` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `c_profile_id` bigint(20) NOT NULL,
  `l_profile_id` bigint(20) NOT NULL,
  `fav_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`c_profile_id`,`l_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `user_profile_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_type` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=Citizen, 2=Leader, 3=Subleader',
  `parent_user_id` bigint(20) NOT NULL,
  `user_role` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Waiting,1=Active, 2=In-Active, -1=Deleted',
  `device_token` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `state` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `alt_mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`user_profile_id`),
  KEY `user_id` (`user_id`,`parent_user_id`,`user_role`,`first_name`,`middle_name`,`last_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
