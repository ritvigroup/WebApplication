-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2017 at 09:17 AM
-- Server version: 5.5.55-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homyt_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_image`
--

CREATE TABLE `chat_image` (
  `id` bigint(20) NOT NULL,
  `chat_between_user` varchar(255) NOT NULL,
  `image_path` text NOT NULL,
  `web_image_path` text NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_image`
--

INSERT INTO `chat_image` (`id`, `chat_between_user`, `image_path`, `web_image_path`, `uploaded_on`) VALUES
(1, '1_2/', '../../uploads/image/chat/1_2/20171101115048-1509517248-149638519.png', '', '2017-11-01 11:50:48'),
(2, '1_2/', '../../uploads/image/chat/1_2/20171101120015-1509517815-415882268.png', '', '2017-11-01 12:00:15'),
(3, '1_2/', '../../uploads/image/chat/1_2/20171101120346-1509518026-83922982.png', '', '2017-11-01 12:03:46'),
(4, '1_2/', '../../uploads/image/chat/1_2/20171101122055-1509519055-551440629.png', '', '2017-11-01 12:20:55'),
(5, '1_2/', '../../uploads/image/chat/1_2/20171101122150-1509519110-1169751611.png', '', '2017-11-01 12:21:50'),
(6, '1_2/', '../../uploads/image/chat/1_2/20171101122917-1509519557-1654838915.jpg', '', '2017-11-01 12:29:17'),
(7, '1_2/', '../../upload/image/chat/1_2/20171101155826-1509532106-159198390.jpg', '', '2017-11-01 15:58:26'),
(8, '1_2/', 'upload/image/chat/1_2/20171101155852-1509532132-955430768.png', '', '2017-11-01 15:58:52'),
(9, '1_2/', 'uploads/image/chat/1_2/20171101155942-1509532182-692000394.jpg', '', '2017-11-01 15:59:42'),
(10, '1_2/', 'uploads/image/chat/1_2/20171101160155-1509532315-2092607668.jpg', '', '2017-11-01 16:01:55'),
(11, '1_2/', '../../uploads/image/chat/1_2/20171101160439-1509532479-273818523.jpg', '', '2017-11-01 16:04:39');

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
  `deleted_y_n` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photoes`
--

CREATE TABLE `photoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_albums`
--

CREATE TABLE `photo_albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(200) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_comments`
--

CREATE TABLE `photo_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `comment_on` datetime NOT NULL,
  `delete_yes_no` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_likes`
--

CREATE TABLE `photo_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `like_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL,
  `like_type` int(11) NOT NULL,
  `liked_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `fullname`, `email`, `phonecountry`, `phone`, `address`, `city`, `state`, `country`, `zipcode`, `status`, `image`, `device_token`, `login_otp`, `login_otp_valid_till`, `register_otp`, `register_otp_valid_till`, `password_reset_code`, `activation_code`, `created_on`, `updated_on`) VALUES
(1, 'rajesh1may@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, 'Rajesh', 'rajesh1may@gmail.com', NULL, '8911529958', 'Sector 62', 'Noida', 'UP', '0', NULL, 1, '20171104125436PM-1509780276-PROFILE-1608090543.jpg', NULL, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-09-20 11:42:48', '2017-11-04 12:54:36'),
(2, '9873738969', NULL, NULL, NULL, NULL, '9873738969', 'vishwakarmasunil68@gmail.com', NULL, '9873738969', 'Malviya Nagar', 'New Delhi', 'Delhi', '0', NULL, 1, NULL, '', '12345', '2017-11-07 13:39:25', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-11-01 06:20:00', '2017-11-04 14:18:55'),
(3, '9999999999', NULL, NULL, NULL, NULL, '9999999999', NULL, NULL, '9999999999', NULL, NULL, '0', '0', NULL, 1, NULL, '', '12345', '2017-11-01 18:38:25', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-11-01 18:30:11', NULL),
(4, '5985559565', NULL, NULL, NULL, NULL, '5985559565', NULL, NULL, '5985559565', NULL, NULL, '0', '0', NULL, 1, NULL, '', '12345', '2017-11-01 18:45:56', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-11-01 18:44:56', NULL),
(5, '5485255522', NULL, NULL, NULL, NULL, '5485255522', NULL, NULL, '5485255522', NULL, NULL, '0', '0', NULL, 1, NULL, '', '12345', '2017-11-01 18:51:23', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-11-01 18:50:23', NULL),
(6, '2658945641', NULL, NULL, NULL, NULL, '2658945641', NULL, NULL, '2658945641', NULL, NULL, '0', '0', NULL, 1, NULL, '', '12345', '2017-11-01 18:54:09', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-11-01 18:53:09', NULL),
(7, '1234567890', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, '1234567890', NULL, NULL, '0', '0', NULL, 1, NULL, 'DemoToken', '12345', '2017-11-03 18:14:10', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-11-03 15:28:09', NULL),
(8, '9911529958', NULL, NULL, NULL, NULL, '9911529958', NULL, NULL, '9911529958', NULL, NULL, NULL, NULL, NULL, 1, NULL, '', '12345', '2017-11-07 13:40:07', NULL, '0000-00-00 00:00:00', NULL, NULL, '2017-11-07 12:53:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `device_token_id` text NOT NULL,
  `device_name` text,
  `added_on` datetime NOT NULL,
  `device_os` varchar(200) DEFAULT NULL,
  `lant` varchar(200) DEFAULT NULL,
  `long` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_devices`
--

INSERT INTO `user_devices` (`id`, `user_id`, `device_token_id`, `device_name`, `added_on`, `device_os`, `lant`, `long`, `status`) VALUES
(1, 2, '', '', '2017-11-01 17:05:27', '', '0.0', '0.0', 1),
(2, 2, '', '', '2017-11-01 17:10:42', 'android', '0.0', '0.0', 1),
(3, 2, '', 'Motorola Moto G4 Plus 7.1.2 N', '2017-11-01 17:47:51', 'android', '0.0', '0.0', 1),
(4, 3, '', 'Google Android SDK built for x86 7.0 M', '2017-11-01 18:35:36', 'android', '77.21707333333333', '28.527924999999996', 1),
(5, 3, '', 'Google Android SDK built for x86 7.0 M', '2017-11-01 18:37:30', 'android', '77.21707333333333', '28.527924999999996', 1),
(6, 4, '', 'Google Android SDK built for x86 7.0 M', '2017-11-01 18:45:22', 'android', '77.21707333333333', '28.527924999999996', 1),
(7, 6, '', 'Google Android SDK built for x86 7.0 M', '2017-11-01 18:53:13', 'android', '77.21707333333333', '28.527924999999996', 1),
(8, 7, 'DemoToken', '', '2017-11-03 15:47:51', '', '28.6351305', '77.2807421', 1),
(9, 2, '', 'Motorola Moto G4 Plus 7.1.2 N', '2017-11-03 17:32:36', 'android', '28.627542', '77.37238', 1),
(10, 7, 'DemoToken', '', '2017-11-03 18:13:22', '', '28.6351305', '77.2807421', 1),
(11, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 10:17:27', 'android', '77.21707333333333', '28.527924999999996', 1),
(12, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 11:12:39', 'android', '77.21707333333333', '28.527924999999996', 1),
(13, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 11:23:32', 'android', '77.21707333333333', '28.527924999999996', 1),
(14, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 12:23:33', 'android', '77.21707333333333', '28.527924999999996', 1),
(15, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 12:29:25', 'android', '77.21707333333333', '28.527924999999996', 1),
(16, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 12:35:23', 'android', '77.21707333333333', '28.527924999999996', 1),
(17, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 13:32:58', 'android', '77.21707333333333', '28.527924999999996', 1),
(18, 2, '', 'Google Android SDK built for x86 7.0 M', '2017-11-04 13:40:57', 'android', '77.21707333333333', '28.527924999999996', 1),
(19, 2, '', 'Motorola Moto G4 Plus 7.1.2 N', '2017-11-06 11:59:43', 'android', '28.627542', '77.37238', 1),
(20, 8, '', 'Motorola Moto G4 Plus 7.1.2 N', '2017-11-07 12:53:14', 'android', '28.627542', '77.37238', 1),
(21, 2, '', 'OnePlus A0001 6.0.1 LOLLIPOP_MR1', '2017-11-07 13:38:37', 'android', '28.6274823', '77.3723576', 1),
(22, 8, '', 'Motorola Moto G4 Plus 7.1.2 N', '2017-11-07 13:39:12', 'android', '28.627542', '77.37238', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_follows`
--

CREATE TABLE `user_follows` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `follow_on` datetime NOT NULL,
  `privacy_hide` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_follows`
--

INSERT INTO `user_follows` (`id`, `user_id`, `friend_id`, `follow_on`, `privacy_hide`) VALUES
(1, 1, 3, '2017-11-01 18:29:36', 0),
(2, 1, 4, '2017-10-19 10:15:35', 0),
(6, 2, 1, '2017-11-04 15:40:22', 0),
(7, 1, 5, '2017-11-04 15:52:03', 0),
(8, 8, 1, '2017-11-07 12:53:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_friends`
--

CREATE TABLE `user_friends` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  `requested_on` datetime NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT '0',
  `accepted_on` datetime NOT NULL,
  `accepted_type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_members`
--

CREATE TABLE `user_group_members` (
  `id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `video_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_time` varchar(50) DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `post_story` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `name`, `description`, `video_path`, `image_path`, `video_time`, `album_id`, `added_on`, `status`, `post_story`) VALUES
(1, 1, 'test file', 'test file', '20171104165458-1509794698-176602838-1505420289.mp4', '20171104165458-1509794698-918452037-547301929.png', '3:00', 0, '2017-11-04 16:54:58', 1, 1),
(2, 1, 'test file', 'test file', '20171104173542-1509797142-1729943870-1251966942.mp4', '20171104173542-1509797142-1102523617-1692462434.png', '3:00', 0, '2017-11-04 17:35:42', 1, 1),
(3, 1, 'myvideo.mp4', 'myvideo.mp4', '20171104175930-1509798570-433219644-440976075.mp4', '20171104175930-1509798570-980816472-397487200.png', '5548', 0, '2017-11-04 17:59:30', 1, 0),
(4, 1, 'test file', 'test file', '20171106113044-1509948044-1544740680-1798585733.mp4', '20171106113044-1509948044-1652353412-602242066.png', '3:00', 0, '2017-11-06 11:30:44', 1, 1),
(5, 1, 'myvideo.mp4', 'myvideo.mp4', '20171106113201-1509948121-140469627-995814119.mp4', '20171106113201-1509948121-312580188-285705715.png', '2901', 0, '2017-11-06 11:32:01', 1, 0),
(6, 1, 'myvideo.mp4', 'myvideo.mp4', '20171106113741-1509948461-1476587837-226794639.mp4', '20171106113741-1509948461-2128982571-1765010282.png', '2901', 0, '2017-11-06 11:37:41', 1, 0),
(7, 1, 'myvideo.mp4', 'myvideo.mp4', '20171106114104-1509948664-2131657807-998576758.mp4', '20171106114104-1509948664-1042699215-1185454230.png', '2901', 0, '2017-11-06 11:41:04', 1, 0),
(8, 1, 'myvideo.mp4', 'myvideo.mp4', '20171106115959-1509949799-163867963-1915561024.mp4', '20171106115959-1509949799-1531372740-1793856591.png', '2901', 0, '2017-11-06 11:59:59', 1, 0),
(9, 1, 'test file', 'test file', '20171106120627-1509950187-1067451732-1434912427.mp4', '20171106120627-1509950187-1874076537-1646664189.png', '3:00', 0, '2017-11-06 12:06:27', 1, 0),
(10, 1, 'test file', 'test file', '20171106120646-1509950206-1832351855-626107921.mp4', '20171106120646-1509950206-1226157650-1831026346.png', '3:00', 0, '2017-11-06 12:06:46', 1, 0),
(11, 1, 'myvideo.mp4', 'myvideo.mp4', '20171106125956-1509953396-1487584872-1858423570.mp4', '20171106125956-1509953396-1196012158-1273534750.png', '1080', 0, '2017-11-06 12:59:56', 0, 0),
(12, 2, 'myvideo.mp4', 'myvideo.mp4', '20171106174139-1509970299-14128188-993639744.mp4', '20171106174139-1509970299-1497630297-780898820.png', '3579', 0, '2017-11-06 17:41:39', 1, 0),
(13, 2, 'myvideo.mp4', 'myvideo.mp4', '20171106174839-1509970719-802318359-1489930294.mp4', '20171106174839-1509970719-447113050-1916077728.png', '3579', 0, '2017-11-06 17:48:39', 1, 0),
(14, 2, 'myvideo.mp4', 'myvideo.mp4', '20171106174929-1509970769-274964976-729472808.mp4', '20171106174929-1509970769-2096423122-1080862453.png', '3579', 0, '2017-11-06 17:49:29', 1, 0),
(15, 2, 'myvideo.mp4', 'myvideo.mp4', '20171106181929-1509972569-2143739626-1099794766.mp4', '20171106181929-1509972569-1684083949-1150988590.png', '1895', 0, '2017-11-06 18:19:29', 1, 0),
(16, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107101713-1510030033-449228726-1853104249.mp4', '20171107101713-1510030033-499435071-378771879.png', '2859', 0, '2017-11-07 10:17:13', 1, 0),
(17, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107102741-1510030661-124041664-1183573246.mp4', '20171107102741-1510030661-1704855988-1375582305.png', '2919', 0, '2017-11-07 10:27:41', 1, 0),
(18, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107103040-1510030840-717963938-1505625865.mp4', '20171107103040-1510030840-362659187-707866748.png', '1764', 0, '2017-11-07 10:30:40', 1, 1),
(19, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107122319-1510037599-839624020-517665141.mp4', '20171107122319-1510037599-480832395-613679622.png', '1894', 0, '2017-11-07 12:23:19', 1, 1),
(20, 8, 'myvideo.mp4', 'myvideo.mp4', '20171107135753-1510043273-950143737-404199396.mp4', '20171107135753-1510043273-1849813179-129418319.png', '853', 0, '2017-11-07 13:57:53', 1, 1),
(21, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107143023-1510045223-785517349-839512277.mp4', '20171107143023-1510045223-2111413398-1037901833.png', '1003', 0, '2017-11-07 14:30:23', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos_story`
--

CREATE TABLE `videos_story` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `video_path` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_time` varchar(50) DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos_story`
--

INSERT INTO `videos_story` (`id`, `user_id`, `name`, `description`, `video_path`, `image_path`, `video_time`, `album_id`, `added_on`, `status`) VALUES
(1, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107103040-1510030840-717963938-1505625865.mp4', '20171107103040-1510030840-362659187-707866748.png', '1764', 0, '2017-11-07 10:30:40', 1),
(2, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107122319-1510037599-839624020-517665141.mp4', '20171107122319-1510037599-480832395-613679622.png', '1894', 0, '2017-11-07 12:23:19', 1),
(3, 8, 'myvideo.mp4', 'myvideo.mp4', '20171107135753-1510043273-950143737-404199396.mp4', '20171107135753-1510043273-1849813179-129418319.png', '853', 0, '2017-11-07 13:57:53', 1),
(4, 2, 'myvideo.mp4', 'myvideo.mp4', '20171107143023-1510045223-785517349-839512277.mp4', '20171107143023-1510045223-2111413398-1037901833.png', '1003', 0, '2017-11-07 14:30:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_albums`
--

CREATE TABLE `video_albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(200) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `comment_on` datetime NOT NULL,
  `delete_yes_no` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_comments`
--

INSERT INTO `video_comments` (`id`, `comment_id`, `user_id`, `video_id`, `comment`, `comment_on`, `delete_yes_no`) VALUES
(1, 0, 1, 1, 'This is my first comment', '2017-11-06 16:19:43', 0),
(2, 0, 1, 1, 'This is my second comment', '2017-11-06 16:19:52', 0),
(3, 0, 1, 1, 'This is my second comment', '2017-11-06 16:21:56', 0),
(4, 0, 1, 1, 'This is my second comment', '2017-11-06 16:33:02', 0),
(5, 0, 1, 1, 'This is my last comment', '2017-11-06 16:34:59', 0),
(6, 0, 1, 1, 'This is my last comment', '2017-11-06 16:39:39', 0),
(7, 0, 1, 1, 'This is my last comment', '2017-11-06 18:10:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `video_likes`
--

CREATE TABLE `video_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `like_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `like_type` int(11) NOT NULL,
  `liked_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_likes`
--

INSERT INTO `video_likes` (`id`, `like_id`, `user_id`, `video_id`, `like_type`, `liked_on`) VALUES
(4, 0, 1, 1, 1, '2017-11-06 18:15:28'),
(5, 0, 1, 2, 1, '2017-11-06 18:15:32'),
(6, 0, 1, 3, 1, '2017-11-06 18:15:39'),
(12, 0, 1, 5, 1, '2017-11-06 18:16:51'),
(13, 0, 1, 6, 1, '2017-11-06 18:16:55'),
(14, 0, 1, 7, 1, '2017-11-06 18:17:00'),
(32, 0, 2, 18, 1, '2017-11-07 12:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `video_types`
--

CREATE TABLE `video_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_types`
--

INSERT INTO `video_types` (`id`, `name`) VALUES
(1, '1 Minute'),
(2, '3 Minutes'),
(3, '15 Minutes');

-- --------------------------------------------------------

--
-- Table structure for table `video_views`
--

CREATE TABLE `video_views` (
  `id` bigint(20) NOT NULL,
  `video_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `viewed_on` datetime NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `viewed_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_image`
--
ALTER TABLE `chat_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photoes`
--
ALTER TABLE `photoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_albums`
--
ALTER TABLE `photo_albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_comments`
--
ALTER TABLE `photo_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_likes`
--
ALTER TABLE `photo_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_follows`
--
ALTER TABLE `user_follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_friends`
--
ALTER TABLE `user_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_members`
--
ALTER TABLE `user_group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos_story`
--
ALTER TABLE `videos_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_albums`
--
ALTER TABLE `video_albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_likes`
--
ALTER TABLE `video_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_types`
--
ALTER TABLE `video_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_views`
--
ALTER TABLE `video_views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_image`
--
ALTER TABLE `chat_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photoes`
--
ALTER TABLE `photoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo_albums`
--
ALTER TABLE `photo_albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo_comments`
--
ALTER TABLE `photo_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo_likes`
--
ALTER TABLE `photo_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_follows`
--
ALTER TABLE `user_follows`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_friends`
--
ALTER TABLE `user_friends`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_group_members`
--
ALTER TABLE `user_group_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `videos_story`
--
ALTER TABLE `videos_story`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video_albums`
--
ALTER TABLE `video_albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `video_likes`
--
ALTER TABLE `video_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `video_types`
--
ALTER TABLE `video_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `video_views`
--
ALTER TABLE `video_views`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
