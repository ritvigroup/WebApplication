-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2018 at 09:36 AM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
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
-- Table structure for table `admin_devices`
--

CREATE TABLE IF NOT EXISTS `admin_devices` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complaint_id`, `self_other_group`, `c_name`, `c_father_name`, `c_gender`, `c_mobile`, `c_email`, `c_aadhaar_number`, `c_district`, `c_tehsil`, `c_thana`, `c_block`, `c_village_panchayat`, `c_village`, `c_town_area`, `c_ward`, `c_full_address`, `c_department`, `c_subject`, `c_description`, `c_added_on`, `c_added_by`, `c_updated_on`, `c_updated_by`, `c_status`) VALUES
(1, 'BDBEBC97', 1, 'Sunil Kumar Vishwakarma', 'Virendra VIshwakarma', 'Male', '+919873738969', 'sundroid1993@gmail.com', '', 'sdc', 'asdc', 'asdc', 'asdc', 'asdc', 'asdc', '', '', '', 'asdc', 'asdc', 'asdcadsc', '2018-02-19 12:34:16', 1, '0000-00-00 00:00:00', 0, 0),
(2, '0DC0FB05', 1, 'Sunil Kumar Vishwakarma', 'Virendra Vishwakarma', 'Male', '+919873738969', 'sundroid1993@gmail.com', '', 'asdc', 'asdc', 'asdc', 'asdc', 'asdc', 'acsdc', '', '', '', 'asdc', 'asdc', 'asdc', '2018-02-19 12:50:10', 1, '0000-00-00 00:00:00', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `complaint_assigned_to`
--

INSERT INTO `complaint_assigned_to` (`id`, `complaint_id`, `assigned_to_admin`, `assigned_from_user`, `assigned_from_admin`, `assigned_status`, `assigned_description`, `assigned_on`) VALUES
(1, 1, 2, 1, 0, 'Initiate Complaint', 'Initiate Complaint', '2018-02-19 12:34:16'),
(2, 2, 2, 1, 0, 'Initiate Complaint', 'Initiate Complaint', '2018-02-19 12:50:10');

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
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
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
  `server_added_on` datetime DEFAULT NULL,
  `deleted_y_n` int(11) DEFAULT '0',
  `received_on` datetime NOT NULL,
  `seen_on` datetime NOT NULL,
  `received_y_n` int(11) NOT NULL DEFAULT '0',
  `seen_y_n` int(11) NOT NULL DEFAULT '0',
  `firekey` text NOT NULL,
  `user_deleted_y_n` int(11) NOT NULL DEFAULT '0',
  `friend_deleted_y_n` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_id`, `username`, `password`, `mpin`, `firstname`, `middlename`, `lastname`, `fullname`, `email`, `phonecountry`, `phone`, `alt_mobile`, `gender`, `date_of_birth`, `address`, `city`, `state`, `country`, `zipcode`, `about_me`, `status`, `image`, `device_token`, `login_otp`, `login_status`, `login_otp_valid_till`, `register_otp`, `register_otp_valid_till`, `password_reset_code`, `activation_code`, `created_on`, `updated_on`, `lant`, `long`, `deactivated_on`) VALUES
(1, '129136092215180811601868707095', NULL, NULL, 1234, NULL, NULL, NULL, 'Sunil Kumar', 'sundroid1993@gmail.com', NULL, '+919873738969', '', 1, '1993-02-11', NULL, NULL, 'National Capital Territory of Delhi', NULL, NULL, '', 1, NULL, '', '601279', 1, '2018-02-08 14:57:43', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-08 14:42:40', '2018-02-19 16:54:43', NULL, NULL, '0000-00-00 00:00:00'),
(2, '4932229881518116835685411876', NULL, NULL, 0, NULL, NULL, NULL, 'ritvigroup-1518116835', NULL, NULL, '+914258914776', '', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, '', '816075', 0, '2018-02-09 00:38:45', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-09 00:37:15', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(3, '109127416615184833162116424746', NULL, NULL, 0, NULL, NULL, NULL, 'ritvigroup-1518483316', NULL, NULL, '+914252051216', '', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, '', '497820', 0, '2018-02-19 20:46:08', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-13 06:25:16', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(4, '191815076715190512251218632579', NULL, NULL, 0, NULL, NULL, NULL, 'ritvigroup-1519051225', NULL, NULL, '+919632585486', '', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, '', '135908', 0, '2018-02-19 20:46:08', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-19 20:10:25', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(5, '11663405921519052925410434202', NULL, NULL, 0, NULL, NULL, NULL, 'ritvigroup-1519052925', NULL, NULL, '+914258924776', '', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, '', '431279', 0, '2018-02-19 20:49:20', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-19 20:38:45', NULL, NULL, NULL, '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_devices`
--

INSERT INTO `users_devices` (`id`, `user_id`, `device_token_id`, `device_name`, `added_on`, `device_os`, `lant`, `long`, `status`, `logged_in_on`, `logged_out_on`) VALUES
(1, 1, '', '', '2018-02-08 14:43:11', '', '', '', 1, '2018-02-08 14:43:11', '0000-00-00 00:00:00'),
(2, 1, '', '', '2018-02-08 14:46:21', '', '', '', 1, '2018-02-08 14:46:21', '0000-00-00 00:00:00'),
(3, 1, '', '', '2018-02-08 14:56:43', '', '', '', 1, '2018-02-08 14:56:43', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_fav_leader`
--

INSERT INTO `user_fav_leader` (`id`, `c_profile_id`, `l_profile_id`, `fav_on`) VALUES
(1, 1, 2, '2018-02-19 12:31:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`user_profile_id`, `user_id`, `user_type`, `parent_user_id`, `user_role`, `first_name`, `middle_name`, `last_name`, `email`, `created_on`, `updated_on`, `status`, `device_token`, `image`, `cover_image`, `date_of_birth`, `gender`, `state`, `mobile`, `alt_mobile`) VALUES
(1, 1, '1', 1, 0, 'Sunil', '', 'Kumar', '', '2018-02-08 14:49:54', '2018-02-19 16:54:43', 1, '', '', '', '0000-00-00', '', '', '+919873738969', '9876543210'),
(2, 1, '2', 1, 0, 'Sunil', '', 'Kumar', '', '2018-02-08 15:45:11', '2018-02-08 15:45:11', 1, '', '', '', '0000-00-00', '', '', '', '+917011916021');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
