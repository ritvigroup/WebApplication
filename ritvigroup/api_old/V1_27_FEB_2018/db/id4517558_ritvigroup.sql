-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2018 at 07:30 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4517558_ritvigroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `deactivated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `profile_id`, `username`, `password`, `mpin`, `firstname`, `middlename`, `lastname`, `fullname`, `email`, `phonecountry`, `phone`, `alt_mobile`, `gender`, `date_of_birth`, `address`, `city`, `state`, `country`, `zipcode`, `about_me`, `status`, `image`, `device_token`, `login_otp`, `login_status`, `login_otp_valid_till`, `register_otp`, `register_otp_valid_till`, `password_reset_code`, `activation_code`, `created_on`, `updated_on`, `lant`, `long`, `deactivated_on`) VALUES
(1, '158987786715175697541181572855', NULL, NULL, 1234, NULL, NULL, NULL, 'virendra Kumar vishwakarma', 'virendravishwakarma@gmail.com', NULL, '+919810105635', '', 1, '1968-02-02', NULL, NULL, 'National Capital Territory of Delhi', NULL, NULL, '', 1, NULL, '', '572048', 1, '2018-02-02 16:40:44', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-02 16:39:14', '2018-02-02 21:28:02', NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_devices`
--

CREATE TABLE `admin_devices` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `device_token_id` text NOT NULL,
  `device_name` text,
  `added_on` datetime NOT NULL,
  `device_os` varchar(200) DEFAULT NULL,
  `lant` varchar(200) DEFAULT NULL,
  `long` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `logged_in_on` datetime NOT NULL,
  `logged_out_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_devices`
--

INSERT INTO `admin_devices` (`id`, `user_id`, `device_token_id`, `device_name`, `added_on`, `device_os`, `lant`, `long`, `status`, `logged_in_on`, `logged_out_on`) VALUES
(1, 1, '', '', '2018-02-02 16:39:45', '', '', '', 1, '2018-02-02 16:39:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` bigint(20) NOT NULL,
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
  `c_updated_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complaint_id`, `self_other_group`, `c_name`, `c_father_name`, `c_gender`, `c_mobile`, `c_email`, `c_aadhaar_number`, `c_district`, `c_tehsil`, `c_thana`, `c_block`, `c_village_panchayat`, `c_village`, `c_town_area`, `c_ward`, `c_full_address`, `c_department`, `c_subject`, `c_description`, `c_added_on`, `c_added_by`, `c_updated_on`, `c_updated_by`) VALUES
(1, 'C1e7be77791538a05c90878bf3911331c', 1, 'sdf', 'dsfasdfas', '2', '423423432', 'rajesh1may@gmail.com', '3423423423423', 'sdfsadf', 'adsfas', 'thana', 'sdfasdf', 'asdf435', 'asdfasd', 'sadfasd3', 'sadfasd34', 'asdfasdf5', 'asdfas', 'adsfasdfasdf', 'adsfadsfas', '2018-02-05 18:18:18', 1, '0000-00-00 00:00:00', 0),
(2, 'C7963FF760461A88E08205ADAB375F4B5', 1, 'sdf', 'dsfasdfas', '2', '423423432', 'rajesh1may@gmail.com', '3423423423423', 'sdfsadf', 'adsfas', 'thana', 'sdfasdf', 'asdf435', 'asdfasd', 'sadfasd3', 'sadfasd34', 'asdfasdf5', 'asdfas', 'adsfasdfasdf', 'adsfadsfas', '2018-02-05 18:19:19', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_attachment`
--

CREATE TABLE `complaint_attachment` (
  `id` bigint(20) NOT NULL,
  `c_id` bigint(20) NOT NULL,
  `c_type` varchar(20) NOT NULL,
  `c_filename` varchar(200) NOT NULL,
  `c_org_filename` varchar(200) NOT NULL,
  `c_status` int(11) NOT NULL DEFAULT '0',
  `c_added_on` datetime NOT NULL,
  `c_deleted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `iso_code_2` varchar(2) NOT NULL,
  `iso_code_3` varchar(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `phone_code` varchar(20) DEFAULT NULL,
  `favourite` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `feedback_by` varchar(255) NOT NULL,
  `feedback_text` text NOT NULL,
  `feedback_image` varchar(255) NOT NULL,
  `sent_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `message_type` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `video_length` varchar(200) DEFAULT NULL,
  `message_text` text NOT NULL,
  `sent_on` datetime NOT NULL,
  `server_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_y_n` int(11) DEFAULT '0',
  `received_on` datetime NOT NULL,
  `seen_on` datetime NOT NULL,
  `received_y_n` int(11) NOT NULL DEFAULT '0',
  `seen_y_n` int(11) NOT NULL DEFAULT '0',
  `firekey` text NOT NULL,
  `user_deleted_y_n` int(11) NOT NULL DEFAULT '0',
  `friend_deleted_y_n` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `action_perform` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `open_url` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `story_id` bigint(20) NOT NULL,
  `video_id` bigint(20) NOT NULL,
  `profile_id` bigint(20) NOT NULL,
  `added_on` datetime NOT NULL,
  `firekey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_read`
--

CREATE TABLE `notifications_read` (
  `id` bigint(20) NOT NULL,
  `notification_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `read_on` datetime NOT NULL,
  `deleted_y_n` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) NOT NULL,
  `report_by` bigint(20) NOT NULL,
  `report_text` varchar(255) NOT NULL,
  `report_image` varchar(255) NOT NULL,
  `report_on` datetime NOT NULL,
  `report_video` bigint(20) NOT NULL,
  `report_user` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `deactivated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_id`, `username`, `password`, `mpin`, `firstname`, `middlename`, `lastname`, `fullname`, `email`, `phonecountry`, `phone`, `alt_mobile`, `gender`, `date_of_birth`, `address`, `city`, `state`, `country`, `zipcode`, `about_me`, `status`, `image`, `device_token`, `login_otp`, `login_status`, `login_otp_valid_till`, `register_otp`, `register_otp_valid_till`, `password_reset_code`, `activation_code`, `created_on`, `updated_on`, `lant`, `long`, `deactivated_on`) VALUES
(1, '4844934541517558780172001497', NULL, NULL, 1234, NULL, NULL, NULL, 'Sunil Kumar vishwakarma', 'sundroid1993@gmail.com', NULL, '+919873738969', '', 1, '1993-02-11', NULL, NULL, 'National Capital Territory of Delhi', NULL, NULL, '', 1, NULL, '', '562974', 1, '2018-02-02 13:37:50', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-02 13:36:20', '2018-02-02 15:17:05', NULL, NULL, '0000-00-00 00:00:00'),
(3, '6076084641517820989221617377', NULL, NULL, 0, NULL, NULL, NULL, 'ritvigroup-1517820989', NULL, NULL, '+919911529958', '', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', 0, NULL, '', '196743', 0, '2018-02-05 14:27:59', NULL, '0000-00-00 00:00:00', NULL, NULL, '2018-02-05 14:26:29', NULL, NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_devices`
--

CREATE TABLE `users_devices` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `device_token_id` text NOT NULL,
  `device_name` text,
  `added_on` datetime NOT NULL,
  `device_os` varchar(200) DEFAULT NULL,
  `lant` varchar(200) DEFAULT NULL,
  `long` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `logged_in_on` datetime NOT NULL,
  `logged_out_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_devices`
--

INSERT INTO `users_devices` (`id`, `user_id`, `device_token_id`, `device_name`, `added_on`, `device_os`, `lant`, `long`, `status`, `logged_in_on`, `logged_out_on`) VALUES
(1, 1, '', '', '2018-02-02 13:37:22', '', '', '', 1, '2018-02-02 13:37:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_fav_admin`
--

CREATE TABLE `user_fav_admin` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `fav_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_fav_admin`
--

INSERT INTO `user_fav_admin` (`id`, `user_id`, `admin_id`, `fav_on`) VALUES
(6, 1, 1, '2018-02-06 11:57:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_devices`
--
ALTER TABLE `admin_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_attachment`
--
ALTER TABLE `complaint_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_read`
--
ALTER TABLE `notifications_read`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_devices`
--
ALTER TABLE `users_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_fav_admin`
--
ALTER TABLE `user_fav_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_devices`
--
ALTER TABLE `admin_devices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint_attachment`
--
ALTER TABLE `complaint_attachment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications_read`
--
ALTER TABLE `notifications_read`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_devices`
--
ALTER TABLE `users_devices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_fav_admin`
--
ALTER TABLE `user_fav_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
