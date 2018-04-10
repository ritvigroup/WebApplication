-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 01:19 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kaajneeti`
--

-- --------------------------------------------------------

--
-- Table structure for table `AttachmentType`
--

CREATE TABLE IF NOT EXISTS `AttachmentType` (
  `AttachmentTypeId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) DEFAULT NULL,
  `TypeDescription` text NOT NULL,
  `TypeExtensions` varchar(200) DEFAULT NULL,
  `TypeStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`AttachmentTypeId`),
  KEY `TypeName` (`TypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `AttachmentType`
--

INSERT INTO `AttachmentType` (`AttachmentTypeId`, `TypeName`, `TypeDescription`, `TypeExtensions`, `TypeStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'photo', 'Photos like jpg, jpeg, png, bmp', 'jpg,jpeg,bmp,png', 1, 0, '2018-03-01 07:00:00', 0, '2018-03-01 07:00:00'),
(2, 'video', '', 'mp4,dat,3gp', 1, 0, '2018-03-01 07:00:00', 0, '2018-03-01 07:00:00'),
(3, 'document', '', 'doc,docx,xls,pdf,txt', 1, 0, '2018-03-01 07:00:00', 0, '2018-03-01 07:00:00'),
(4, 'audio', '', 'mp3,wav', 1, 0, '2018-03-01 07:00:00', 0, '2018-03-01 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Chat`
--

CREATE TABLE IF NOT EXISTS `Chat` (
  `ChatId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `FriendUserProfileId` bigint(20) unsigned NOT NULL,
  `UserGroupId` bigint(20) unsigned NOT NULL,
  `ChatType` varchar(50) DEFAULT NULL,
  `ChatPhotoPath` varchar(255) DEFAULT NULL,
  `ChatThumbnailPath` varchar(255) DEFAULT NULL,
  `ChatFileSize` varchar(200) DEFAULT NULL,
  `ChatVideoTime` varchar(200) DEFAULT NULL,
  `ChatText` text NOT NULL,
  `SentOn` datetime NOT NULL,
  `DeliveredOn` datetime NOT NULL,
  `ViewedOn` datetime NOT NULL,
  `DeleteForUserProfileIdYesNo` int(11) NOT NULL DEFAULT '0',
  `DeleteForFriendUserProfileId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ChatId`),
  KEY `citizen_id` (`UserProfileId`),
  KEY `citizen_group_id` (`UserGroupId`),
  KEY `friend_citizen_id` (`FriendUserProfileId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ChatGroup`
--

CREATE TABLE IF NOT EXISTS `ChatGroup` (
  `ChatGroupId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ChatGroupName` varchar(100) DEFAULT NULL,
  `ChatGroupDescription` text NOT NULL,
  `ChatGroupStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`ChatGroupId`),
  KEY `TypeName` (`ChatGroupName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ChatGroupMember`
--

CREATE TABLE IF NOT EXISTS `ChatGroupMember` (
  `ChatGroupMemberId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ChatGroupId` bigint(20) unsigned NOT NULL,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `AcceptedYesNo` int(11) NOT NULL DEFAULT '0',
  `AcceptedOn` datetime NOT NULL,
  `GroupAdminYesNo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ChatGroupMemberId`),
  KEY `ComplaintId` (`ChatGroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Complaint`
--

CREATE TABLE IF NOT EXISTS `Complaint` (
  `ComplaintId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ComplaintUniqueId` varchar(100) NOT NULL,
  `ComplaintTypeId` bigint(20) unsigned NOT NULL,
  `ApplicantName` varchar(100) NOT NULL,
  `ApplicantFatherName` varchar(100) NOT NULL,
  `ApplicantGender` varchar(10) NOT NULL,
  `ApplicantMobile` varchar(20) NOT NULL,
  `ApplicantEmail` varchar(100) NOT NULL,
  `ApplicantAadhaarNumber` varchar(100) NOT NULL,
  `ApplicantDistrict` varchar(100) NOT NULL,
  `ApplicantTehsil` varchar(100) NOT NULL,
  `ApplicantThana` varchar(100) NOT NULL,
  `ApplicantBlock` varchar(100) NOT NULL,
  `ApplicantVillagePanchayat` varchar(100) NOT NULL,
  `ApplicantVillage` varchar(100) NOT NULL,
  `ApplicantTownArea` varchar(100) NOT NULL,
  `ApplicantWard` varchar(100) NOT NULL,
  `ApplicantAddress` varchar(200) NOT NULL,
  `ComplaintDepartment` varchar(100) NOT NULL,
  `ComplaintSubject` varchar(200) NOT NULL,
  `ComplaintDescription` text NOT NULL,
  `ComplaintStatus` bigint(20) NOT NULL DEFAULT '0',
  `AddedOn` datetime NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`ComplaintId`),
  KEY `ComplaintStatus` (`ComplaintStatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Complaint`
--

INSERT INTO `Complaint` (`ComplaintId`, `ComplaintUniqueId`, `ComplaintTypeId`, `ApplicantName`, `ApplicantFatherName`, `ApplicantGender`, `ApplicantMobile`, `ApplicantEmail`, `ApplicantAadhaarNumber`, `ApplicantDistrict`, `ApplicantTehsil`, `ApplicantThana`, `ApplicantBlock`, `ApplicantVillagePanchayat`, `ApplicantVillage`, `ApplicantTownArea`, `ApplicantWard`, `ApplicantAddress`, `ComplaintDepartment`, `ComplaintSubject`, `ComplaintDescription`, `ComplaintStatus`, `AddedOn`, `AddedBy`, `UpdatedOn`, `UpdatedBy`) VALUES
(1, 'C21150697481522669171', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-02 13:39:31', 1, '2018-04-02 13:39:31', 0),
(2, 'C691152241522669188', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-02 13:39:48', 1, '2018-04-02 13:39:48', 0),
(3, 'C10318691291522747396', 2, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 11:23:16', 3, '2018-04-03 11:23:16', 0),
(4, 'C2576260061522752383', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 4, '2018-04-03 12:46:23', 1, '2018-04-05 10:02:17', 2),
(5, 'C13425141081522752505', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:48:25', 1, '2018-04-03 12:48:25', 0),
(6, 'C17978406981522752847', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:54:07', 1, '2018-04-03 12:54:07', 0),
(7, 'C4946602731522752927', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:55:27', 1, '2018-04-03 12:55:27', 0),
(8, 'C13892620841522752957', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:55:57', 1, '2018-04-03 12:55:57', 0),
(9, 'C3667558501522752993', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:56:33', 1, '2018-04-03 12:56:33', 0),
(10, 'C12831197501522753068', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:57:48', 1, '2018-04-03 12:57:48', 0),
(11, 'C2474475351522753099', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:58:19', 1, '2018-04-03 12:58:19', 0),
(12, 'C1977580431522753126', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:58:46', 1, '2018-04-03 12:58:46', 0),
(13, 'C4556685141522753175', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:59:35', 1, '2018-04-03 12:59:35', 0),
(14, 'C5661348731522753199', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 12:59:59', 1, '2018-04-03 12:59:59', 0),
(15, 'C15876647171522753332', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 13:02:12', 1, '2018-04-03 13:02:12', 0),
(16, 'C2179859351522753422', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 13:03:42', 1, '2018-04-03 13:03:42', 0),
(17, 'C10122397171522754434', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 1, '2018-04-03 13:20:34', 4, '2018-04-03 13:20:34', 0),
(18, 'C2078896081522837384', 1, 'Rajesh', 'SS', '', '6786786786786', '', '', '', '', '', '', '', '', '', '', '', '', 'Sewer Problem', 'In my area there is sewer problem', 4, '2018-04-04 12:23:04', 5, '2018-04-05 08:45:17', 3),
(19, 'C20504336841522923820', 1, 'Rajesh Kumar', 'SP', '', '35432432423', '', '', '', '', '', '', '', '', '', '', '', '', 'Test Complaint', 'Test Complaint Description', 1, '2018-04-05 12:23:40', 2, '2018-04-05 12:23:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintAssigned`
--

CREATE TABLE IF NOT EXISTS `ComplaintAssigned` (
  `ComplaintAssignedId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ComplaintId` bigint(20) unsigned NOT NULL,
  `AssignedTo` bigint(20) unsigned NOT NULL,
  `AssignedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintAssignedId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `ComplaintAssigned`
--

INSERT INTO `ComplaintAssigned` (`ComplaintAssignedId`, `ComplaintId`, `AssignedTo`, `AssignedBy`, `AddedOn`) VALUES
(1, 1, 4, 1, '2018-04-02 13:39:31'),
(2, 2, 4, 1, '2018-04-02 13:39:48'),
(3, 3, 4, 1, '2018-04-03 11:23:16'),
(4, 4, 4, 1, '2018-04-03 12:46:23'),
(5, 5, 4, 1, '2018-04-03 12:48:25'),
(6, 6, 4, 1, '2018-04-03 12:54:07'),
(7, 7, 4, 1, '2018-04-03 12:55:27'),
(8, 8, 4, 1, '2018-04-03 12:55:57'),
(9, 9, 4, 1, '2018-04-03 12:56:33'),
(10, 10, 4, 1, '2018-04-03 12:57:48'),
(11, 11, 4, 1, '2018-04-03 12:58:19'),
(12, 12, 4, 1, '2018-04-03 12:58:46'),
(13, 13, 4, 1, '2018-04-03 12:59:35'),
(14, 14, 4, 1, '2018-04-03 12:59:59'),
(15, 15, 4, 1, '2018-04-03 13:02:12'),
(16, 16, 4, 1, '2018-04-03 13:03:42'),
(17, 17, 4, 4, '2018-04-03 13:20:34'),
(18, 18, 2, 5, '2018-04-04 12:23:04'),
(19, 19, 4, 2, '2018-04-05 12:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintAttachment`
--

CREATE TABLE IF NOT EXISTS `ComplaintAttachment` (
  `ComplaintAttachmentId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ComplaintId` bigint(20) unsigned NOT NULL,
  `AttachmentTypeId` bigint(20) unsigned NOT NULL,
  `AttachmentFile` varchar(200) NOT NULL,
  `AttachmentOrginalFile` varchar(200) NOT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`ComplaintId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `ComplaintAttachment`
--

INSERT INTO `ComplaintAttachment` (`ComplaintAttachmentId`, `ComplaintId`, `AttachmentTypeId`, `AttachmentFile`, `AttachmentOrginalFile`, `AttachmentThumb`, `AttachmentOrder`, `AttachmentStatus`, `AddedBy`, `AddedOn`, `DeletedOn`) VALUES
(1, 2, 1, '20180402133948PM-1522669188-COMPLAINT-404812733.jpg', '26733710_1607120982707121_4977188501835848390_n.jpg', '', 0, 1, 1, '2018-04-02 13:39:48', '0000-00-00 00:00:00'),
(2, 4, 1, '20180403124623PM-1522752383-COMPLAINT-1469445168.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:46:23', '0000-00-00 00:00:00'),
(3, 5, 1, '20180403124825PM-1522752505-COMPLAINT-1956044212.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:48:25', '0000-00-00 00:00:00'),
(4, 6, 1, '20180403125407PM-1522752847-COMPLAINT-1915503968.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:54:07', '0000-00-00 00:00:00'),
(5, 7, 1, '20180403125527PM-1522752927-COMPLAINT-202520906.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:55:27', '0000-00-00 00:00:00'),
(6, 8, 1, '20180403125557PM-1522752957-COMPLAINT-785487425.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:55:57', '0000-00-00 00:00:00'),
(7, 9, 1, '20180403125633PM-1522752993-COMPLAINT-693212449.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:56:33', '0000-00-00 00:00:00'),
(8, 10, 1, '20180403125748PM-1522753068-COMPLAINT-126978938.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:57:48', '0000-00-00 00:00:00'),
(9, 11, 1, '20180403125819PM-1522753099-COMPLAINT-711010917.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:58:19', '0000-00-00 00:00:00'),
(10, 12, 1, '20180403125846PM-1522753126-COMPLAINT-1508830761.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:58:46', '0000-00-00 00:00:00'),
(11, 13, 1, '20180403125935PM-1522753175-COMPLAINT-313380147.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:59:35', '0000-00-00 00:00:00'),
(12, 14, 1, '20180403125959PM-1522753199-COMPLAINT-1534226832.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 12:59:59', '0000-00-00 00:00:00'),
(13, 15, 1, '20180403130212PM-1522753332-COMPLAINT-604065539.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 13:02:12', '0000-00-00 00:00:00'),
(14, 16, 1, '20180403130342PM-1522753422-COMPLAINT-1383212759.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 1, '2018-04-03 13:03:42', '0000-00-00 00:00:00'),
(15, 17, 1, '20180403132034PM-1522754434-COMPLAINT-573167180.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 4, '2018-04-03 13:20:34', '0000-00-00 00:00:00'),
(16, 18, 1, '20180404122304PM-1522837384-COMPLAINT-919520075.png', 'main-qimg-6145ed5e394e734acd9e4394413c2a9f.png', '', 0, 1, 5, '2018-04-04 12:23:04', '0000-00-00 00:00:00'),
(17, 18, 1, '20180404122304PM-1522837384-COMPLAINT-1050678137.jpg', '29573290_190149091773307_8656630391751810562_n.jpg', '', 0, 1, 5, '2018-04-04 12:23:04', '0000-00-00 00:00:00'),
(18, 19, 1, '20180405122340PM-1522923820-COMPLAINT-197784849.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 1, 2, '2018-04-05 12:23:40', '0000-00-00 00:00:00'),
(19, 19, 1, '20180405122340PM-1522923820-COMPLAINT-1805306714.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 2, '2018-04-05 12:23:40', '0000-00-00 00:00:00'),
(20, 19, 1, '20180405122340PM-1522923820-COMPLAINT-786948562.jpg', '26804325_1604268469659039_8660154410810191147_n.jpg', '', 0, 1, 2, '2018-04-05 12:23:40', '0000-00-00 00:00:00'),
(21, 19, 1, '20180405122340PM-1522923820-COMPLAINT-1800739612.jpg', '26904288_1605468096205743_4023110878160532579_n.jpg', '', 0, 1, 2, '2018-04-05 12:23:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintHistory`
--

CREATE TABLE IF NOT EXISTS `ComplaintHistory` (
  `ComplaintHistoryId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ComplaintId` bigint(20) unsigned NOT NULL,
  `ParentComplaintHistoryId` bigint(20) DEFAULT NULL,
  `HistoryTitle` varchar(100) DEFAULT NULL,
  `HistoryDescription` text NOT NULL,
  `HistoryStatus` bigint(20) NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintHistoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ComplaintHistory`
--

INSERT INTO `ComplaintHistory` (`ComplaintHistoryId`, `ComplaintId`, `ParentComplaintHistoryId`, `HistoryTitle`, `HistoryDescription`, `HistoryStatus`, `AddedBy`, `AddedOn`) VALUES
(2, 2, 0, 'Please do something', 'Pleaes do something description', 1, 1, '2018-04-02 13:51:29'),
(3, 2, 0, 'Please do something', 'Pleaes do something description', 1, 1, '2018-04-02 13:51:38'),
(4, 18, 0, 'So much smell in drains', 'So much smell in drains descrption', 1, 5, '2018-04-05 07:28:36'),
(5, 18, 0, 'So much smell in drains', 'So much smell in drains descrption', 1, 7, '2018-04-05 08:37:31'),
(6, 18, 0, 'So much smell in drains', 'So much smell in drains descrption', 1, 3, '2018-04-05 08:38:26'),
(7, 18, 0, 'Your problem is solved', 'Your problem is solved by me. Documents attached with this complaint', 1, 3, '2018-04-05 08:45:17'),
(8, 4, 0, 'adsfads', 'fasdf', 1, 2, '2018-04-05 09:56:33'),
(9, 4, 0, 'Now your problem is resolved', 'Now your problem is resolved description', 1, 2, '2018-04-05 09:57:28'),
(10, 4, 0, 'asdfsadf', 'asdfadsf', 1, 2, '2018-04-05 09:58:17'),
(11, 4, 0, 'adsfadsf', 'asdfasdf', 1, 2, '2018-04-05 09:58:57'),
(12, 4, 0, 'sadfasdf', 'asdfasd', 1, 2, '2018-04-05 09:59:11'),
(13, 4, 0, 'This is my last status', 'This is my last status description', 1, 2, '2018-04-05 10:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintHistoryAttachment`
--

CREATE TABLE IF NOT EXISTS `ComplaintHistoryAttachment` (
  `ComplaintHistoryAttachmentId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ComplaintHistoryId` bigint(20) unsigned NOT NULL,
  `AttachmentTypeId` bigint(20) unsigned NOT NULL,
  `AttachmentFile` varchar(200) NOT NULL,
  `AttachmentOrginalFile` varchar(200) NOT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintHistoryAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`ComplaintHistoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `ComplaintHistoryAttachment`
--

INSERT INTO `ComplaintHistoryAttachment` (`ComplaintHistoryAttachmentId`, `ComplaintHistoryId`, `AttachmentTypeId`, `AttachmentFile`, `AttachmentOrginalFile`, `AttachmentThumb`, `AttachmentOrder`, `AttachmentStatus`, `AddedBy`, `AddedOn`, `DeletedOn`) VALUES
(3, 2, 1, '20180402135129PM-1522669889-COMPLAINT-HISTORY-2079163325.jpg', '26903896_1606349259450960_9137444995711768452_n.jpg', '', 0, 1, 1, '2018-04-02 13:51:29', '0000-00-00 00:00:00'),
(4, 2, 1, '20180402135129PM-1522669889-COMPLAINT-HISTORY-894107705.jpg', '28467845_2072175809706691_7773245989434949632_n.jpg', '', 0, 1, 1, '2018-04-02 13:51:29', '0000-00-00 00:00:00'),
(5, 3, 1, '20180402135138PM-1522669898-COMPLAINT-HISTORY-664619126.jpg', '26903896_1606349259450960_9137444995711768452_n.jpg', '', 0, 1, 1, '2018-04-02 13:51:38', '0000-00-00 00:00:00'),
(6, 3, 1, '20180402135138PM-1522669898-COMPLAINT-HISTORY-1317734666.jpg', '28467845_2072175809706691_7773245989434949632_n.jpg', '', 0, 1, 1, '2018-04-02 13:51:38', '0000-00-00 00:00:00'),
(7, 4, 1, '20180405072836AM-1522906116-COMPLAINT-HISTORY-101895788.jpg', '26731503_1608440015908551_3867693781635597514_n.jpg', '', 0, 1, 5, '2018-04-05 07:28:36', '0000-00-00 00:00:00'),
(8, 4, 1, '20180405072836AM-1522906116-COMPLAINT-HISTORY-1647655982.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 1, 5, '2018-04-05 07:28:36', '0000-00-00 00:00:00'),
(9, 5, 1, '20180405083731AM-1522910251-COMPLAINT-HISTORY-2094136548.jpg', '26731503_1608440015908551_3867693781635597514_n.jpg', '', 0, 1, 7, '2018-04-05 08:37:31', '0000-00-00 00:00:00'),
(10, 5, 1, '20180405083731AM-1522910251-COMPLAINT-HISTORY-420522905.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 1, 7, '2018-04-05 08:37:31', '0000-00-00 00:00:00'),
(11, 6, 1, '20180405083826AM-1522910306-COMPLAINT-HISTORY-102632681.jpg', '26731503_1608440015908551_3867693781635597514_n.jpg', '', 0, 1, 3, '2018-04-05 08:38:26', '0000-00-00 00:00:00'),
(12, 6, 1, '20180405083826AM-1522910306-COMPLAINT-HISTORY-1601142417.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 1, 3, '2018-04-05 08:38:26', '0000-00-00 00:00:00'),
(13, 7, 1, '20180405084517AM-1522910717-COMPLAINT-HISTORY-2066644897.jpg', '26731503_1608440015908551_3867693781635597514_n.jpg', '', 0, 1, 3, '2018-04-05 08:45:17', '0000-00-00 00:00:00'),
(14, 7, 1, '20180405084517AM-1522910717-COMPLAINT-HISTORY-1782326334.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 1, 3, '2018-04-05 08:45:17', '0000-00-00 00:00:00'),
(15, 8, 1, '20180405095634AM-1522914994-COMPLAINT-HISTORY-1779732249.jpg', '28472176_2072313586359580_5997641011017285632_n.jpg', '', 0, 1, 2, '2018-04-05 09:56:34', '0000-00-00 00:00:00'),
(16, 8, 1, '20180405095634AM-1522914994-COMPLAINT-HISTORY-479184203.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 1, 2, '2018-04-05 09:56:34', '0000-00-00 00:00:00'),
(17, 8, 1, '20180405095634AM-1522914994-COMPLAINT-HISTORY-75870892.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 0, 1, 2, '2018-04-05 09:56:34', '0000-00-00 00:00:00'),
(18, 8, 1, '20180405095634AM-1522914994-COMPLAINT-HISTORY-7132521.jpg', '26804325_1604268469659039_8660154410810191147_n.jpg', '', 0, 1, 2, '2018-04-05 09:56:34', '0000-00-00 00:00:00'),
(19, 9, 1, '20180405095728AM-1522915048-COMPLAINT-HISTORY-1442029809.jpg', '28467845_2072175809706691_7773245989434949632_n.jpg', '', 0, 1, 2, '2018-04-05 09:57:28', '0000-00-00 00:00:00'),
(20, 13, 1, '20180405100217AM-1522915337-COMPLAINT-HISTORY-795810427.jpg', '28279192_2071144853143120_7539167059167412224_n.jpg', '', 0, 1, 2, '2018-04-05 10:02:17', '0000-00-00 00:00:00'),
(21, 13, 1, '20180405100217AM-1522915337-COMPLAINT-HISTORY-1363147523.jpg', '28467845_2072175809706691_7773245989434949632_n.jpg', '', 0, 1, 2, '2018-04-05 10:02:17', '0000-00-00 00:00:00'),
(22, 13, 1, '20180405100217AM-1522915337-COMPLAINT-HISTORY-1155959132.jpg', '28472176_2072313586359580_5997641011017285632_n.jpg', '', 0, 1, 2, '2018-04-05 10:02:17', '0000-00-00 00:00:00'),
(23, 13, 1, '20180405100217AM-1522915337-COMPLAINT-HISTORY-1277785989.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 1, 2, '2018-04-05 10:02:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintMember`
--

CREATE TABLE IF NOT EXISTS `ComplaintMember` (
  `ComplaintMemberId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ComplaintId` bigint(20) unsigned NOT NULL,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `AcceptedYesNo` int(11) NOT NULL DEFAULT '0',
  `AcceptedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintMemberId`),
  KEY `ComplaintId` (`ComplaintId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `ComplaintMember`
--

INSERT INTO `ComplaintMember` (`ComplaintMemberId`, `ComplaintId`, `UserProfileId`, `AddedBy`, `AddedOn`, `AcceptedYesNo`, `AcceptedOn`) VALUES
(1, 3, 1, 1, '2018-04-03 11:23:16', 0, '2018-04-03 11:23:16'),
(2, 3, 2, 1, '2018-04-03 11:23:16', 0, '2018-04-03 11:23:16'),
(3, 4, 4, 1, '2018-04-03 12:46:23', 0, '2018-04-03 12:46:23'),
(4, 4, 2, 1, '2018-04-03 12:46:23', 0, '2018-04-03 12:46:23'),
(5, 5, 4, 1, '2018-04-03 12:48:25', 0, '2018-04-03 12:48:25'),
(6, 5, 2, 1, '2018-04-03 12:48:25', 0, '2018-04-03 12:48:25'),
(7, 6, 4, 1, '2018-04-03 12:54:07', 0, '2018-04-03 12:54:07'),
(8, 6, 2, 1, '2018-04-03 12:54:07', 0, '2018-04-03 12:54:07'),
(9, 7, 4, 1, '2018-04-03 12:55:27', 0, '2018-04-03 12:55:27'),
(10, 7, 2, 1, '2018-04-03 12:55:27', 0, '2018-04-03 12:55:27'),
(11, 8, 4, 1, '2018-04-03 12:55:57', 0, '2018-04-03 12:55:57'),
(12, 8, 2, 1, '2018-04-03 12:55:57', 0, '2018-04-03 12:55:57'),
(13, 9, 4, 1, '2018-04-03 12:56:33', 0, '2018-04-03 12:56:33'),
(14, 9, 2, 1, '2018-04-03 12:56:33', 0, '2018-04-03 12:56:33'),
(15, 10, 4, 1, '2018-04-03 12:57:48', 0, '2018-04-03 12:57:48'),
(16, 10, 2, 1, '2018-04-03 12:57:48', 0, '2018-04-03 12:57:48'),
(17, 11, 4, 1, '2018-04-03 12:58:19', 0, '2018-04-03 12:58:19'),
(18, 11, 2, 1, '2018-04-03 12:58:19', 0, '2018-04-03 12:58:19'),
(19, 12, 4, 1, '2018-04-03 12:58:46', 0, '2018-04-03 12:58:46'),
(20, 12, 2, 1, '2018-04-03 12:58:46', 0, '2018-04-03 12:58:46'),
(21, 13, 4, 1, '2018-04-03 12:59:35', 0, '2018-04-03 12:59:35'),
(22, 13, 2, 1, '2018-04-03 12:59:35', 0, '2018-04-03 12:59:35'),
(23, 14, 4, 1, '2018-04-03 12:59:59', 0, '2018-04-03 12:59:59'),
(24, 14, 2, 1, '2018-04-03 12:59:59', 0, '2018-04-03 12:59:59'),
(25, 15, 4, 1, '2018-04-03 13:02:12', 0, '2018-04-03 13:02:12'),
(26, 15, 2, 1, '2018-04-03 13:02:12', 0, '2018-04-03 13:02:12'),
(27, 16, 4, 1, '2018-04-03 13:03:42', 0, '2018-04-03 13:03:42'),
(28, 16, 2, 1, '2018-04-03 13:03:42', 0, '2018-04-03 13:03:42'),
(29, 17, 4, 4, '2018-04-03 13:20:34', 0, '2018-04-03 13:20:34'),
(30, 17, 2, 4, '2018-04-03 13:20:34', 0, '2018-04-03 13:20:34'),
(31, 18, 7, 5, '2018-04-04 12:23:04', 0, '2018-04-04 12:23:04'),
(32, 18, 3, 5, '2018-04-04 12:23:04', 0, '2018-04-04 12:23:04'),
(33, 19, 6, 2, '2018-04-05 12:23:40', 0, '2018-04-05 12:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintStatus`
--

CREATE TABLE IF NOT EXISTS `ComplaintStatus` (
  `ComplaintStatusId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(100) NOT NULL,
  `StatusDescription` text NOT NULL,
  `StatusStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) unsigned NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintStatusId`),
  KEY `TypeName` (`StatusName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ComplaintStatus`
--

INSERT INTO `ComplaintStatus` (`ComplaintStatusId`, `StatusName`, `StatusDescription`, `StatusStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Created', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Accepted', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Rejected', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'Completed', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'InActive', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'Request To Close', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintType`
--

CREATE TABLE IF NOT EXISTS `ComplaintType` (
  `ComplaintTypeId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) DEFAULT NULL,
  `TypeDescription` text,
  `TypeStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedBy` bigint(20) unsigned DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ComplaintTypeId`),
  KEY `TypeName` (`TypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ComplaintType`
--

INSERT INTO `ComplaintType` (`ComplaintTypeId`, `TypeName`, `TypeDescription`, `TypeStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Self', 'Self', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Group', 'Group', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Other', 'Other', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE IF NOT EXISTS `Country` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(128) NOT NULL,
  `IsoCode2` varchar(2) NOT NULL,
  `IsoCode3` varchar(3) NOT NULL,
  `CountryStatus` tinyint(1) NOT NULL DEFAULT '1',
  `CountryPhoneCode` varchar(20) DEFAULT NULL,
  `CountryFavourite` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=258 ;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`CountryId`, `CountryName`, `IsoCode2`, `IsoCode3`, `CountryStatus`, `CountryPhoneCode`, `CountryFavourite`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1, '93', 100),
(2, 'Albania', 'AL', 'ALB', 1, '355', 100),
(3, 'Algeria', 'DZ', 'DZA', 1, '213', 7),
(4, 'American Samoa', 'AS', 'ASM', 1, '1-684', 100),
(5, 'Andorra', 'AD', 'AND', 1, '376', 100),
(6, 'Angola', 'AO', 'AGO', 1, '244', 100),
(7, 'Anguilla', 'AI', 'AIA', 1, '1-264', 100),
(8, 'Antarctica', 'AQ', 'ATA', 1, '672', 100),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1, '1-268', 100),
(10, 'Argentina', 'AR', 'ARG', 1, '54', 100),
(11, 'Armenia', 'AM', 'ARM', 1, '374', 100),
(12, 'Aruba', 'AW', 'ABW', 1, '297', 100),
(13, 'Australia', 'AU', 'AUS', 1, '61', 100),
(14, 'Austria', 'AT', 'AUT', 1, '43', 100),
(15, 'Azerbaijan', 'AZ', 'AZE', 1, '994', 100),
(16, 'Bahamas', 'BS', 'BHS', 1, '1-242', 100),
(17, 'Bahrain', 'BH', 'BHR', 1, '973', 15),
(18, 'Bangladesh', 'BD', 'BGD', 1, '880', 100),
(19, 'Barbados', 'BB', 'BRB', 1, '1-246', 100),
(20, 'Belarus', 'BY', 'BLR', 1, '375', 100),
(21, 'Belgium', 'BE', 'BEL', 1, '32', 100),
(22, 'Belize', 'BZ', 'BLZ', 1, '501', 100),
(23, 'Benin', 'BJ', 'BEN', 1, '229', 100),
(24, 'Bermuda', 'BM', 'BMU', 1, '1-441', 100),
(25, 'Bhutan', 'BT', 'BTN', 1, '975', 100),
(26, 'Bolivia', 'BO', 'BOL', 1, '591', 100),
(27, 'Bosnia and Herzegovina', 'BA', 'BIH', 1, '387', 100),
(28, 'Botswana', 'BW', 'BWA', 1, '267', 100),
(29, 'Bouvet Island', 'BV', 'BVT', 1, '55', 100),
(30, 'Brazil', 'BR', 'BRA', 1, '55', 100),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1, '246', 100),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1, '673', 100),
(33, 'Bulgaria', 'BG', 'BGR', 1, '359', 100),
(34, 'Burkina Faso', 'BF', 'BFA', 1, '226', 100),
(35, 'Burundi', 'BI', 'BDI', 1, '257', 100),
(36, 'Cambodia', 'KH', 'KHM', 1, '855', 100),
(37, 'Cameroon', 'CM', 'CMR', 1, '237', 100),
(38, 'Canada', 'CA', 'CAN', 1, '1', 100),
(39, 'Cape Verde', 'CV', 'CPV', 1, '238', 100),
(40, 'Cayman Islands', 'KY', 'CYM', 1, '1-345', 100),
(41, 'Central African Republic', 'CF', 'CAF', 1, '236', 100),
(42, 'Chad', 'TD', 'TCD', 1, '235', 100),
(43, 'Chile', 'CL', 'CHL', 1, '56', 100),
(44, 'China', 'CN', 'CHN', 1, '86', 100),
(45, 'Christmas Island', 'CX', 'CXR', 1, '61', 100),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1, '61', 100),
(47, 'Colombia', 'CO', 'COL', 1, '57', 100),
(48, 'Comoros', 'KM', 'COM', 1, '269', 100),
(49, 'Congo', 'CG', 'COG', 1, '242', 100),
(50, 'Cook Islands', 'CK', 'COK', 1, '682', 100),
(51, 'Costa Rica', 'CR', 'CRI', 1, '506', 100),
(52, 'Cote D''Ivoire', 'CI', 'CIV', 1, '225', 100),
(53, 'Croatia', 'HR', 'HRV', 1, '385', 100),
(54, 'Cuba', 'CU', 'CUB', 1, '53', 100),
(55, 'Cyprus', 'CY', 'CYP', 1, '357', 100),
(56, 'Czech Republic', 'CZ', 'CZE', 1, '420', 100),
(57, 'Denmark', 'DK', 'DNK', 1, '45', 100),
(58, 'Djibouti', 'DJ', 'DJI', 1, '253', 22),
(59, 'Dominica', 'DM', 'DMA', 1, '1-767', 100),
(60, 'Dominican Republic', 'DO', 'DOM', 1, '1-809', 100),
(61, 'East Timor', 'TL', 'TLS', 1, '670', 100),
(62, 'Ecuador', 'EC', 'ECU', 1, '593', 100),
(63, 'Egypt', 'EG', 'EGY', 1, '20', 6),
(64, 'El Salvador', 'SV', 'SLV', 1, '503', 100),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1, '240', 100),
(66, 'Eritrea', 'ER', 'ERI', 1, '291', 100),
(67, 'Estonia', 'EE', 'EST', 1, '372', 100),
(68, 'Ethiopia', 'ET', 'ETH', 1, '251', 100),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1, '500', 100),
(70, 'Faroe Islands', 'FO', 'FRO', 1, '298', 100),
(71, 'Fiji', 'FJ', 'FJI', 1, '679', 100),
(72, 'Finland', 'FI', 'FIN', 1, '358', 100),
(74, 'France, Metropolitan', 'FR', 'FRA', 1, '33', 100),
(75, 'French Guiana', 'GF', 'GUF', 1, '594', 100),
(76, 'French Polynesia', 'PF', 'PYF', 1, '689', 100),
(77, 'French Southern Territories', 'TF', 'ATF', 1, '262', 100),
(78, 'Gabon', 'GA', 'GAB', 1, '241', 100),
(79, 'Gambia', 'GM', 'GMB', 1, '220', 100),
(80, 'Georgia', 'GE', 'GEO', 1, '995', 100),
(81, 'Germany', 'DE', 'DEU', 1, '49', 100),
(82, 'Ghana', 'GH', 'GHA', 1, '233', 100),
(83, 'Gibraltar', 'GI', 'GIB', 1, '350', 100),
(84, 'Greece', 'GR', 'GRC', 1, '30', 100),
(85, 'Greenland', 'GL', 'GRL', 1, '299', 100),
(86, 'Grenada', 'GD', 'GRD', 1, '1-473', 100),
(87, 'Guadeloupe', 'GP', 'GLP', 1, '590', 100),
(88, 'Guam', 'GU', 'GUM', 1, '1-671', 100),
(89, 'Guatemala', 'GT', 'GTM', 1, '502', 100),
(90, 'Guinea', 'GN', 'GIN', 1, '224', 100),
(91, 'Guinea-Bissau', 'GW', 'GNB', 1, '245', 100),
(92, 'Guyana', 'GY', 'GUY', 1, '592', 100),
(93, 'Haiti', 'HT', 'HTI', 1, '509', 100),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1, '0', 100),
(95, 'Honduras', 'HN', 'HND', 1, '504', 100),
(96, 'Hong Kong', 'HK', 'HKG', 1, '852', 100),
(97, 'Hungary', 'HU', 'HUN', 1, '36', 100),
(98, 'Iceland', 'IS', 'ISL', 1, '354', 100),
(99, 'India', 'IN', 'IND', 1, '91', 100),
(100, 'Indonesia', 'ID', 'IDN', 1, '62', 100),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1, '98', 100),
(102, 'Iraq', 'IQ', 'IRQ', 1, '964', 13),
(103, 'Ireland', 'IE', 'IRL', 1, '353', 100),
(104, 'Palestine (1948)', 'P2', 'PS2', 1, '972', 2),
(105, 'Italy', 'IT', 'ITA', 1, '39', 100),
(106, 'Jamaica', 'JM', 'JAM', 1, '1-876', 100),
(107, 'Japan', 'JP', 'JPN', 1, '81', 100),
(108, 'Jordan', 'JO', 'JOR', 1, '962', 3),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1, '7', 100),
(110, 'Kenya', 'KE', 'KEN', 1, '254', 100),
(111, 'Kiribati', 'KI', 'KIR', 1, '686', 100),
(112, 'North Korea', 'KP', 'PRK', 1, '850', 100),
(113, 'South Korea', 'KR', 'KOR', 1, '82', 100),
(114, 'Kuwait', 'KW', 'KWT', 1, '965', 12),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1, '996', 100),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1, '856', 100),
(117, 'Latvia', 'LV', 'LVA', 1, '371', 100),
(118, 'Lebanon', 'LB', 'LBN', 1, '961', 5),
(119, 'Lesotho', 'LS', 'LSO', 1, '266', 100),
(120, 'Liberia', 'LR', 'LBR', 1, '231', 100),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1, '218', 20),
(122, 'Liechtenstein', 'LI', 'LIE', 1, '423', 100),
(123, 'Lithuania', 'LT', 'LTU', 1, '370', 100),
(124, 'Luxembourg', 'LU', 'LUX', 1, '352', 100),
(125, 'Macau', 'MO', 'MAC', 1, '853', 100),
(126, 'FYROM', 'MK', 'MKD', 1, '389', 100),
(127, 'Madagascar', 'MG', 'MDG', 1, '261', 100),
(128, 'Malawi', 'MW', 'MWI', 1, '265', 100),
(129, 'Malaysia', 'MY', 'MYS', 1, '60', 100),
(130, 'Maldives', 'MV', 'MDV', 1, '960', 100),
(131, 'Mali', 'ML', 'MLI', 1, '223', 100),
(132, 'Malta', 'MT', 'MLT', 1, '356', 100),
(133, 'Marshall Islands', 'MH', 'MHL', 1, '692', 100),
(134, 'Martinique', 'MQ', 'MTQ', 1, '596', 100),
(135, 'Mauritania', 'MR', 'MRT', 1, '222', 21),
(136, 'Mauritius', 'MU', 'MUS', 1, '230', 100),
(137, 'Mayotte', 'YT', 'MYT', 1, '262', 100),
(138, 'Mexico', 'MX', 'MEX', 1, '52', 100),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1, '691', 100),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1, '373', 100),
(141, 'Monaco', 'MC', 'MCO', 1, '377', 100),
(142, 'Mongolia', 'MN', 'MNG', 1, '976', 100),
(143, 'Montserrat', 'MS', 'MSR', 1, '1-664', 100),
(144, 'Morocco', 'MA', 'MAR', 1, '212', 9),
(145, 'Mozambique', 'MZ', 'MOZ', 1, '258', 100),
(146, 'Myanmar', 'MM', 'MMR', 1, '95', 100),
(147, 'Namibia', 'NA', 'NAM', 1, '264', 100),
(148, 'Nauru', 'NR', 'NRU', 1, '674', 100),
(149, 'Nepal', 'NP', 'NPL', 1, '977', 100),
(150, 'Netherlands', 'NL', 'NLD', 1, '31', 100),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1, '599', 100),
(152, 'New Caledonia', 'NC', 'NCL', 1, '687', 100),
(153, 'New Zealand', 'NZ', 'NZL', 1, '64', 100),
(154, 'Nicaragua', 'NI', 'NIC', 1, '505', 100),
(155, 'Niger', 'NE', 'NER', 1, '227', 100),
(156, 'Nigeria', 'NG', 'NGA', 1, '234', 100),
(157, 'Niue', 'NU', 'NIU', 1, '683', 100),
(158, 'Norfolk Island', 'NF', 'NFK', 1, '672', 100),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1, '1-670', 100),
(160, 'Norway', 'NO', 'NOR', 1, '47', 100),
(161, 'Oman', 'OM', 'OMN', 1, '968', 17),
(162, 'Pakistan', 'PK', 'PAK', 1, '92', 100),
(163, 'Palau', 'PW', 'PLW', 1, '680', 100),
(164, 'Panama', 'PA', 'PAN', 1, '507', 100),
(165, 'Papua New Guinea', 'PG', 'PNG', 1, '675', 100),
(166, 'Paraguay', 'PY', 'PRY', 1, '595', 100),
(167, 'Peru', 'PE', 'PER', 1, '51', 100),
(168, 'Philippines', 'PH', 'PHL', 1, '63', 100),
(169, 'Pitcairn', 'PN', 'PCN', 1, '64', 100),
(170, 'Poland', 'PL', 'POL', 1, '48', 100),
(171, 'Portugal', 'PT', 'PRT', 1, '351', 100),
(172, 'Puerto Rico', 'PR', 'PRI', 1, '1-787', 100),
(173, 'Qatar', 'QA', 'QAT', 1, '974', 16),
(174, 'Reunion', 'RE', 'REU', 1, '262', 100),
(175, 'Romania', 'RO', 'ROM', 1, '40', 100),
(176, 'Russian Federation', 'RU', 'RUS', 1, '7', 100),
(177, 'Rwanda', 'RW', 'RWA', 1, '250', 100),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1, '1-869', 100),
(179, 'Saint Lucia', 'LC', 'LCA', 1, '1-758', 100),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1, '1-784', 100),
(181, 'Samoa', 'WS', 'WSM', 1, '685', 100),
(182, 'San Marino', 'SM', 'SMR', 1, '378', 100),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1, '239', 100),
(184, 'Saudi Arabia', 'SA', 'SAU', 1, '966', 10),
(185, 'Senegal', 'SN', 'SEN', 1, '221', 100),
(186, 'Seychelles', 'SC', 'SYC', 1, '248', 100),
(187, 'Sierra Leone', 'SL', 'SLE', 1, '232', 100),
(188, 'Singapore', 'SG', 'SGP', 1, '65', 100),
(189, 'Slovak Republic', 'SK', 'SVK', 1, '421', 100),
(190, 'Slovenia', 'SI', 'SVN', 1, '386', 100),
(191, 'Solomon Islands', 'SB', 'SLB', 1, '677', 100),
(192, 'Somalia', 'SO', 'SOM', 1, '252', 19),
(193, 'South Africa', 'ZA', 'ZAF', 1, '27', 100),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', 1, '500', 100),
(195, 'Spain', 'ES', 'ESP', 1, '34', 100),
(196, 'Sri Lanka', 'LK', 'LKA', 1, '94', 100),
(197, 'St. Helena', 'SH', 'SHN', 1, '290', 100),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1, '508', 100),
(199, 'Sudan', 'SD', 'SDN', 1, '249', 18),
(200, 'Suriname', 'SR', 'SUR', 1, '597', 100),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1, '47', 100),
(202, 'Swaziland', 'SZ', 'SWZ', 1, '268', 100),
(203, 'Sweden', 'SE', 'SWE', 1, '46', 100),
(204, 'Switzerland', 'CH', 'CHE', 1, '41', 100),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1, '963', 4),
(206, 'Taiwan', 'TW', 'TWN', 1, '886', 100),
(207, 'Tajikistan', 'TJ', 'TJK', 1, '992', 100),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1, '255', 100),
(209, 'Thailand', 'TH', 'THA', 1, '66', 100),
(210, 'Togo', 'TG', 'TGO', 1, '228', 100),
(211, 'Tokelau', 'TK', 'TKL', 1, '690', 100),
(212, 'Tonga', 'TO', 'TON', 1, '676', 100),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1, '1-868', 100),
(214, 'Tunisia', 'TN', 'TUN', 1, '216', 8),
(215, 'Turkey', 'TR', 'TUR', 1, '90', 100),
(216, 'Turkmenistan', 'TM', 'TKM', 1, '993', 100),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1, '1-649', 100),
(218, 'Tuvalu', 'TV', 'TUV', 1, '688', 100),
(219, 'Uganda', 'UG', 'UGA', 1, '256', 100),
(220, 'Ukraine', 'UA', 'UKR', 1, '380', 100),
(221, 'United Arab Emirates', 'AE', 'ARE', 1, '971', 11),
(222, 'United Kingdom', 'GB', 'GBR', 1, '44', 100),
(223, 'United States', 'US', 'USA', 1, '1', 100),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1, '1', 100),
(225, 'Uruguay', 'UY', 'URY', 1, '598', 100),
(226, 'Uzbekistan', 'UZ', 'UZB', 1, '998', 100),
(227, 'Vanuatu', 'VU', 'VUT', 1, '678', 100),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1, '379', 100),
(229, 'Venezuela', 'VE', 'VEN', 1, '58', 100),
(230, 'Viet Nam', 'VN', 'VNM', 1, '84', 100),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1, '1', 100),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1, '1', 100),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1, '681', 100),
(234, 'Western Sahara', 'EH', 'ESH', 1, '212', 100),
(235, 'Yemen', 'YE', 'YEM', 1, '967', 14),
(237, 'Democratic Republic of Congo', 'CD', 'COD', 1, '243', 100),
(238, 'Zambia', 'ZM', 'ZMB', 1, '260', 100),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1, '263', 100),
(242, 'Montenegro', 'ME', 'MNE', 1, '382', 100),
(243, 'Serbia', 'RS', 'SRB', 1, '381', 100),
(244, 'Aaland Islands', 'AX', 'ALA', 1, '358', 100),
(245, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', 1, '599', 100),
(246, 'Curacao', 'CW', 'CUW', 1, '599', 100),
(247, 'Palestine', 'P1', 'PS1', 1, '970', 1),
(248, 'South Sudan', 'SS', 'SSD', 1, '211', 100),
(249, 'St. Barthelemy', 'BL', 'BLM', 1, '590', 100),
(250, 'St. Martin (French part)', 'MF', 'MAF', 1, '1', 100),
(251, 'Canary Islands', 'IC', 'ICA', 1, '34', 100),
(252, 'Ascension Island (British)', 'AC', 'ASC', 1, '247', 100),
(253, 'Kosovo, Republic of', 'XK', 'UNK', 1, '383', 100),
(254, 'Isle of Man', 'IM', 'IMN', 1, '44', 100),
(255, 'Tristan da Cunha', 'TA', 'SHN', 1, '290', 100),
(256, 'Guernsey', 'GG', 'GGY', 1, '44-1481', 100),
(257, 'Jersey', 'JE', 'JEY', 1, '44-1534', 100);

-- --------------------------------------------------------

--
-- Table structure for table `CountryState`
--

CREATE TABLE IF NOT EXISTS `CountryState` (
  `StateId` int(5) NOT NULL AUTO_INCREMENT,
  `CountryId` int(11) NOT NULL DEFAULT '99',
  `StateName` varchar(100) NOT NULL,
  `StateStatus` int(11) DEFAULT '1',
  PRIMARY KEY (`StateId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `CountryState`
--

INSERT INTO `CountryState` (`StateId`, `CountryId`, `StateName`, `StateStatus`) VALUES
(1, 99, 'Andaman and Nicobar Islands', 1),
(2, 99, 'Andhra Pradesh', 1),
(3, 99, 'Arunachal Pradesh', 1),
(4, 99, 'Assam', 1),
(5, 99, 'West Bengal', 1),
(6, 99, 'Bihar', 1),
(7, 99, 'Chandigarh', 1),
(8, 99, 'Chhattisgarh', 1),
(9, 99, 'Delhi', 1),
(10, 99, 'Goa', 1),
(11, 99, 'Gujarat', 1),
(12, 99, 'Haryana', 1),
(13, 99, 'Himachal Pradesh', 1),
(14, 99, 'Jammu and Kashmir', 1),
(15, 99, 'Jharkhand', 1),
(16, 99, 'Karnataka', 1),
(17, 99, 'Kerala', 1),
(18, 99, 'Madhya Pradesh', 1),
(19, 99, 'Maharashtra', 1),
(20, 99, 'Manipur', 1),
(21, 99, 'Meghalaya', 1),
(22, 99, 'Mizoram', 1),
(23, 99, 'Nagaland', 1),
(24, 99, 'Orissa', 1),
(25, 99, 'Pondicherry', 1),
(26, 99, 'Punjab', 1),
(27, 99, 'Rajasthan', 1),
(28, 99, 'Tamil Nadu', 1),
(29, 99, 'Tripura', 1),
(30, 99, 'Uttar Pradesh', 1),
(31, 99, 'Uttaranchal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Document`
--

CREATE TABLE IF NOT EXISTS `Document` (
  `DocumentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `DocumentFolderId` bigint(20) DEFAULT NULL,
  `DocumentName` varchar(200) DEFAULT NULL,
  `DocumentPath` varchar(200) DEFAULT NULL,
  `DocumentStatus` int(11) DEFAULT '0',
  `AddedOn` datetime DEFAULT NULL,
  `AddedBy` bigint(20) DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`DocumentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Document`
--

INSERT INTO `Document` (`DocumentId`, `DocumentFolderId`, `DocumentName`, `DocumentPath`, `DocumentStatus`, `AddedOn`, `AddedBy`, `UpdatedOn`, `UpdatedBy`) VALUES
(1, 4, 'main-qimg-6145ed5e394e734acd9e4394413c2a9f.png', '20180402110812AM-1522660092-DOCUMENT-1335537563.png', 1, '2018-04-02 11:08:12', 2, '2018-04-02 11:08:12', 2),
(2, 4, '29594567_4221424388186313_3167784360595070515_n.png', '20180402110812AM-1522660092-DOCUMENT-272266426.png', 1, '2018-04-02 11:08:12', 2, '2018-04-02 11:08:12', 2),
(3, 4, '29573290_190149091773307_8656630391751810562_n.jpg', '20180402110812AM-1522660092-DOCUMENT-1178966758.jpg', 1, '2018-04-02 11:08:12', 2, '2018-04-02 11:08:12', 2),
(4, 4, '29186307_1641999532560068_737960361675718656_n.jpg', '20180402110813AM-1522660093-DOCUMENT-1413495956.jpg', 1, '2018-04-02 11:08:13', 2, '2018-04-02 11:08:13', 2),
(5, 4, '29176952_10156600555838455_5852662306881667072_n.jpg', '20180402110813AM-1522660093-DOCUMENT-1818604136.jpg', 1, '2018-04-02 11:08:13', 2, '2018-04-02 11:08:13', 2),
(6, 6, '26733710_1607120982707121_4977188501835848390_n.jpg', '20180402122036PM-1522664436-DOCUMENT-92088340.jpg', 1, '2018-04-02 12:20:36', 2, '2018-04-02 12:20:36', 2),
(7, 4, '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '20180403053922AM-1522726762-DOCUMENT-1927661764.jpeg', 1, '2018-04-03 05:39:22', 2, '2018-04-03 05:39:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `DocumentFolder`
--

CREATE TABLE IF NOT EXISTS `DocumentFolder` (
  `DocumentFolderId` bigint(20) NOT NULL AUTO_INCREMENT,
  `DocumentFolderName` varchar(100) DEFAULT NULL,
  `DocumentFolderDescription` text,
  `DocumentFolderStatus` int(11) DEFAULT NULL,
  `AddedBy` bigint(20) unsigned DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedBy` bigint(20) unsigned DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`DocumentFolderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `DocumentFolder`
--

INSERT INTO `DocumentFolder` (`DocumentFolderId`, `DocumentFolderName`, `DocumentFolderDescription`, `DocumentFolderStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(3, 'Tet', NULL, 1, 2, '2018-04-02 09:31:15', 2, '2018-04-02 09:31:15'),
(4, 'Private', NULL, 1, 2, '2018-04-02 10:38:43', 2, '2018-04-02 10:38:43'),
(5, 'Public', NULL, 1, 2, '2018-04-02 10:38:51', 2, '2018-04-02 10:38:51'),
(6, 'Shared', NULL, 1, 2, '2018-04-02 10:38:58', 2, '2018-04-02 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE IF NOT EXISTS `Event` (
  `EventId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `EventUniqueId` varchar(100) DEFAULT NULL,
  `EventName` varchar(100) DEFAULT NULL,
  `EventDescription` text,
  `EventLocation` varchar(100) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `EveryYear` int(11) DEFAULT '0',
  `EveryMonth` int(11) DEFAULT '0',
  `EventStatus` int(11) DEFAULT '0',
  `AddedBy` bigint(20) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`EventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Event`
--

INSERT INTO `Event` (`EventId`, `EventUniqueId`, `EventName`, `EventDescription`, `EventLocation`, `StartDate`, `EndDate`, `EveryYear`, `EveryMonth`, `EventStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'C15210481041521628553', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 1, '2018-03-21 11:35:53', 1, '2018-03-21 11:35:53'),
(2, 'C15210452162346534', 'This is an event name two', 'This is an event description two', 'New Delhi', '2018-05-02 14:09:00', '2018-05-03 15:10:00', 0, 0, 1, 1, '2018-03-21 11:35:53', 1, '2018-03-21 11:35:53'),
(3, 'C6794778581521717322', 'asdfasdf', 'sadfadsf', 'asdfasdfasdfasas', '2018-03-01 16:33:00', '2018-03-01 16:33:00', NULL, NULL, 1, 4, '2018-03-22 12:15:22', 4, '2018-03-22 12:15:22'),
(4, 'C19613095241521717385', 'asdfasdf', 'sadfadsf', 'asdfasdfasdfasas', '2018-03-01 16:33:00', '2018-03-01 16:33:00', NULL, NULL, 1, 4, '2018-03-22 12:16:25', 4, '2018-03-22 12:16:25'),
(5, 'C6257838971521717425', 'Party', 'Party Description', 'Noida', '2018-03-22 16:46:00', '2018-03-22 16:46:00', NULL, NULL, 1, 4, '2018-03-22 12:17:05', 4, '2018-03-22 12:17:05'),
(6, 'C18054536791521717868', 'Cristmas', 'Csadfadsfsadf', 'New Delhi', '2018-12-25 16:53:00', '2018-12-25 16:53:00', NULL, NULL, 1, 4, '2018-03-22 12:24:28', 4, '2018-03-22 12:24:28'),
(7, 'C9589113951521718059', 'Holid', 'sdfsadf', 'sadfsdf', '2018-03-06 16:56:00', '2018-03-01 16:56:00', NULL, NULL, 1, 4, '2018-03-22 12:27:39', 4, '2018-03-22 12:27:39'),
(8, 'C661964331521718183', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 1, '2018-03-22 12:29:43', 1, '2018-03-22 12:29:43'),
(9, 'C11821639521521718401', 'sadfsdaf', 'sadfsadf', 'sadfsad', '2018-03-19 17:00:00', '2018-03-19 17:00:00', NULL, NULL, 1, 4, '2018-03-22 12:33:21', 4, '2018-03-22 12:33:21'),
(10, 'C9084303581521718491', 'new year', 'sdsdfsadf', 'New Lhid', '2018-03-05 17:04:00', '2018-02-16 17:04:00', NULL, NULL, 1, 4, '2018-03-22 12:34:51', 4, '2018-03-22 12:34:51'),
(11, 'C15400608021521719792', 'New year eve', 'New Year Eve', 'Noida', '2018-03-29 17:26:00', '2018-03-29 17:26:00', NULL, NULL, 1, 4, '2018-03-22 12:56:32', 4, '2018-03-22 12:56:32'),
(12, 'C19501401331521734850', 'First with attendee', 'First with attendee description', 'Noida', '2018-03-29 21:36:00', '2018-03-29 21:36:00', NULL, NULL, 1, 4, '2018-03-22 17:07:30', 4, '2018-03-22 17:07:30'),
(13, 'C231310281521735639', 'asdfasdf', 'asdfsadf', 'sdfsadf', '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL, 1, 4, '2018-03-22 17:20:39', 4, '2018-03-22 17:20:39'),
(14, 'C5932880521522035400', 'Rally Jansampark', 'Rally Jansampark for BJP supporters', 'Raam Leela Ground, New Delhi', '2018-03-28 09:05:00', '2018-03-28 09:05:00', NULL, NULL, 1, 2, '2018-03-26 05:36:40', 2, '2018-03-26 05:36:40'),
(15, 'C2850511901522152155', 'test event', 'test event description', 'Test event location', '2018-03-27 17:32:00', '2018-04-18 17:32:00', NULL, NULL, 1, 2, '2018-03-27 14:02:35', 2, '2018-03-27 14:02:35'),
(16, 'C12941459021522213744', 'sadf', '', '', '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL, 1, 2, '2018-03-28 07:09:04', 2, '2018-03-28 07:09:04'),
(17, 'C4030416611522217706', 'asdfsadfasdf', 'asdfasdf', '', '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL, 1, 2, '2018-03-28 08:15:06', 2, '2018-03-28 08:15:06'),
(18, 'C17557248391522217885', 'Event with File', 'Event with file description', 'New Delhi', '2018-02-27 11:47:00', '2018-03-28 11:47:00', NULL, NULL, 1, 2, '2018-03-28 08:18:05', 2, '2018-03-28 08:18:05'),
(19, 'C16172055721522218833', 'adsfsad', 'adsfasdfa', '', '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL, 1, 2, '2018-03-28 08:33:53', 2, '2018-03-28 08:33:53'),
(20, 'C6407128861522218953', 'asdfasdf', 'afds', '', '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL, 1, 2, '2018-03-28 08:35:53', 2, '2018-03-28 08:35:53'),
(21, 'C6918299681522219103', 'reyewry', 'dsdf', '', '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL, 1, 2, '2018-03-28 08:38:23', 2, '2018-03-28 08:38:23'),
(22, 'C17964646691522219142', 'sadfdsaf', 'sadfsadf', '', '1970-01-01 01:00:00', '1970-01-01 01:00:00', NULL, NULL, 1, 2, '2018-03-28 08:39:02', 2, '2018-03-28 08:39:02'),
(23, 'C12119713761522219624', 'Test Event', 'Test Event Descriptoni', 'Test Location', '2018-03-22 12:16:00', '2018-03-22 12:16:00', NULL, NULL, 1, 2, '2018-03-28 08:47:04', 2, '2018-03-28 08:47:04'),
(24, 'C3494469341522219960', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 2, '2018-03-28 08:52:40', 2, '2018-03-28 08:52:40'),
(25, 'C9769500641522220002', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 2, '2018-03-28 08:53:22', 2, '2018-03-28 08:53:22'),
(26, 'C15893578591522220099', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 2, '2018-03-28 08:54:59', 2, '2018-03-28 08:54:59'),
(27, 'C9035399871522220286', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 2, '2018-03-28 08:58:06', 2, '2018-03-28 08:58:06'),
(28, 'C14842354271522220350', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 2, '2018-03-28 08:59:10', 2, '2018-03-28 08:59:10'),
(29, 'C5540890691522220399', 'This is an event name', 'This is an event description', 'Event Location', '2018-02-02 14:09:00', '2018-02-03 15:10:00', 0, 0, 1, 2, '2018-03-28 08:59:59', 2, '2018-03-28 08:59:59'),
(30, 'C14080588601522220485', 'asdfasdf', 'sadfasdsd', 'asdfasdf', '2018-03-12 12:31:00', '2018-03-09 12:31:00', NULL, NULL, 1, 2, '2018-03-28 09:01:25', 2, '2018-03-28 09:01:25'),
(31, 'C2600254571522228961', 'Rajesh', 'rajesh', 'Rajesh', '2018-02-26 14:51:00', '2018-02-26 14:51:00', NULL, NULL, 1, 2, '2018-03-28 11:22:41', 2, '2018-03-28 11:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `EventAttachment`
--

CREATE TABLE IF NOT EXISTS `EventAttachment` (
  `EventAttachmentId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `EventId` bigint(20) unsigned NOT NULL,
  `AttachmentTypeId` bigint(20) unsigned NOT NULL,
  `AttachmentFile` varchar(200) DEFAULT NULL,
  `AttachmentOrginalFile` varchar(200) DEFAULT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `EventMain` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`EventAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`EventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `EventAttachment`
--

INSERT INTO `EventAttachment` (`EventAttachmentId`, `EventId`, `AttachmentTypeId`, `AttachmentFile`, `AttachmentOrginalFile`, `AttachmentThumb`, `AttachmentOrder`, `EventMain`, `AttachmentStatus`, `AddedBy`, `AddedOn`, `DeletedOn`) VALUES
(1, 1, 1, '20180321113553AM-1521628553-EVENT-923802831.png', 'Screenshot from 2018-03-16 10-16-23.png', '', 0, 0, 1, 1, '2018-03-21 11:35:54', '0000-00-00 00:00:00'),
(2, 1, 2, '20180321113554AM-1521628554-EVENT-1031057713.mp4', 'VID-20170331-WA0025.mp4', '20180321113554AM-1521628554-EVENT-THUMB-1240542923.png', 1, 0, 1, 1, '2018-03-21 11:35:54', '0000-00-00 00:00:00'),
(3, 17, 3, '20180328081507AM-1522217707-EVENT-206357107.phpR61mIN', 'phpR61mIN', '', 0, 0, 1, 2, '2018-03-28 08:15:07', '0000-00-00 00:00:00'),
(4, 17, 3, '20180328081507AM-1522217707-EVENT-541202989.phpcyL1RL', 'phpcyL1RL', '', 1, 0, 1, 2, '2018-03-28 08:15:07', '0000-00-00 00:00:00'),
(5, 17, 3, '20180328081507AM-1522217707-EVENT-659553385.phpCUUM1J', 'phpCUUM1J', '', 2, 0, 1, 2, '2018-03-28 08:15:07', '0000-00-00 00:00:00'),
(6, 18, 3, '20180328081805AM-1522217885-EVENT-1655735718.php2NrQKM', 'php2NrQKM', '', 0, 0, 1, 2, '2018-03-28 08:18:05', '0000-00-00 00:00:00'),
(7, 18, 3, '20180328081805AM-1522217885-EVENT-197551104.phpq1OqvC', 'phpq1OqvC', '', 1, 0, 1, 2, '2018-03-28 08:18:05', '0000-00-00 00:00:00'),
(8, 18, 3, '20180328081805AM-1522217885-EVENT-1447354478.phpiK2ags', 'phpiK2ags', '', 2, 0, 1, 2, '2018-03-28 08:18:05', '0000-00-00 00:00:00'),
(9, 19, 1, '20180328083353AM-1522218833-EVENT-682143590.png', 'Screenshot from 2018-01-06 20-30-18.png', '', 0, 0, 1, 2, '2018-03-28 08:33:53', '0000-00-00 00:00:00'),
(10, 19, 1, '20180328083353AM-1522218833-EVENT-1544889086.png', 'Screenshot from 2018-01-06 20-21-55.png', '', 1, 0, 1, 2, '2018-03-28 08:33:53', '0000-00-00 00:00:00'),
(11, 19, 1, '20180328083353AM-1522218833-EVENT-1797361586.png', 'Screenshot from 2018-01-06 19-53-05.png', '', 2, 0, 1, 2, '2018-03-28 08:33:53', '0000-00-00 00:00:00'),
(12, 19, 1, '20180328083353AM-1522218833-EVENT-1368298182.png', 'Screenshot from 2017-12-20 10-26-30.png', '', 3, 0, 1, 2, '2018-03-28 08:33:53', '0000-00-00 00:00:00'),
(13, 20, 1, '20180328083553AM-1522218953-EVENT-644952649.jpg', '23519378_1619796681390528_1876235193348425607_n.jpg', '', 0, 0, 1, 2, '2018-03-28 08:35:53', '0000-00-00 00:00:00'),
(14, 20, 1, '20180328083553AM-1522218953-EVENT-372694471.jpg', '20171117164929PM-1510917569-PROFILE-62411044.jpg', '', 1, 0, 1, 2, '2018-03-28 08:35:53', '0000-00-00 00:00:00'),
(15, 21, 1, '20180328083823AM-1522219103-EVENT-343356371.png', 'Screenshot from 2018-01-06 20-30-18.png', '', 0, 0, 1, 2, '2018-03-28 08:38:23', '0000-00-00 00:00:00'),
(16, 21, 1, '20180328083823AM-1522219103-EVENT-1965471965.png', 'Screenshot from 2017-12-20 10-26-30.png', '', 1, 0, 1, 2, '2018-03-28 08:38:23', '0000-00-00 00:00:00'),
(17, 22, 1, '20180328083902AM-1522219142-EVENT-446712667.png', 'Screenshot from 2018-01-06 20-21-55.png', '', 0, 0, 1, 2, '2018-03-28 08:39:02', '0000-00-00 00:00:00'),
(18, 22, 1, '20180328083902AM-1522219142-EVENT-1829153738.png', 'Screenshot from 2018-01-06 19-53-05.png', '', 1, 0, 1, 2, '2018-03-28 08:39:02', '0000-00-00 00:00:00'),
(19, 22, 1, '20180328083902AM-1522219142-EVENT-289220562.png', 'Screenshot from 2017-12-20 10-26-30.png', '', 2, 0, 1, 2, '2018-03-28 08:39:02', '0000-00-00 00:00:00'),
(20, 23, 3, '20180328084704AM-1522219624-EVENT-1228690598.pdf', 'mypdfName-1522039571-download.pdf', '', 0, 0, 1, 2, '2018-03-28 08:47:04', '0000-00-00 00:00:00'),
(21, 23, 3, '20180328084704AM-1522219624-EVENT-1185857559.pdf', 'mypdfName-1521980381-download.pdf', '', 1, 0, 1, 2, '2018-03-28 08:47:04', '0000-00-00 00:00:00'),
(22, 24, 1, '20180328085240AM-1522219960-EVENT-373149016.jpg', '20171117164929PM-1510917569-PROFILE-62411044.jpg', '', 0, 0, 1, 2, '2018-03-28 08:52:40', '0000-00-00 00:00:00'),
(23, 24, 1, '20180328085240AM-1522219960-EVENT-1314522218.png', 'Screenshot from 2018-01-06 20-30-18.png', '20180328085240AM-1522219960-EVENT-THUMB-1153640519.png', 1, 0, 1, 2, '2018-03-28 08:52:40', '0000-00-00 00:00:00'),
(24, 25, 1, '20180328085322AM-1522220002-EVENT-1504064701.jpg', '20171117164929PM-1510917569-PROFILE-62411044.jpg', '', 0, 0, 1, 2, '2018-03-28 08:53:22', '0000-00-00 00:00:00'),
(25, 25, 1, '20180328085322AM-1522220002-EVENT-61088575.png', 'Screenshot from 2018-01-06 20-30-18.png', '20180328085322AM-1522220002-EVENT-THUMB-881359262.png', 1, 0, 1, 2, '2018-03-28 08:53:22', '0000-00-00 00:00:00'),
(26, 26, 1, '20180328085459AM-1522220099-EVENT-2111485815.jpg', '20171117164929PM-1510917569-PROFILE-62411044.jpg', '', 0, 0, 1, 2, '2018-03-28 08:54:59', '0000-00-00 00:00:00'),
(27, 26, 1, '20180328085459AM-1522220099-EVENT-834530742.png', 'Screenshot from 2018-01-06 20-30-18.png', '20180328085459AM-1522220099-EVENT-THUMB-111894715.png', 1, 0, 1, 2, '2018-03-28 08:54:59', '0000-00-00 00:00:00'),
(28, 27, 1, '20180328085806AM-1522220286-EVENT-295297147.jpg', '20171117164929PM-1510917569-PROFILE-62411044.jpg', '', 0, 0, 1, 2, '2018-03-28 08:58:06', '0000-00-00 00:00:00'),
(29, 27, 1, '20180328085806AM-1522220286-EVENT-2082244243.png', 'Screenshot from 2018-01-06 20-30-18.png', '20180328085806AM-1522220286-EVENT-THUMB-1388722956.png', 1, 0, 1, 2, '2018-03-28 08:58:06', '0000-00-00 00:00:00'),
(30, 28, 1, '20180328085910AM-1522220350-EVENT-2018936529.jpg', '29573290_190149091773307_8656630391751810562_n.jpg', '', 0, 0, 1, 2, '2018-03-28 08:59:11', '0000-00-00 00:00:00'),
(31, 28, 1, '20180328085911AM-1522220351-EVENT-51168474.jpg', '29186307_1641999532560068_737960361675718656_n.jpg', '', 1, 0, 1, 2, '2018-03-28 08:59:11', '0000-00-00 00:00:00'),
(32, 29, 1, '20180328085959AM-1522220399-EVENT-1028496501.jpg', '29573290_190149091773307_8656630391751810562_n.jpg', '', 0, 0, 1, 2, '2018-03-28 08:59:59', '0000-00-00 00:00:00'),
(33, 29, 1, '20180328085959AM-1522220399-EVENT-1916330890.jpg', '29186307_1641999532560068_737960361675718656_n.jpg', '', 1, 0, 1, 2, '2018-03-28 08:59:59', '0000-00-00 00:00:00'),
(34, 30, 1, '20180328090125AM-1522220485-EVENT-1587845729.jpeg', '871e356c-9e25-48ca-97fe-b28b9ceab5d3.jpeg', '', 0, 0, 1, 2, '2018-03-28 09:01:25', '0000-00-00 00:00:00'),
(35, 30, 1, '20180328090125AM-1522220485-EVENT-1032818242.png', '26903685_2021237471225623_8169878695508283575_n.png', '', 1, 0, 1, 2, '2018-03-28 09:01:25', '0000-00-00 00:00:00'),
(36, 30, 1, '20180328090125AM-1522220485-EVENT-1075521545.jpg', '26804325_1604268469659039_8660154410810191147_n.jpg', '', 2, 0, 1, 2, '2018-03-28 09:01:25', '0000-00-00 00:00:00'),
(37, 31, 1, '20180328112243AM-1522228963-EVENT-1610070101.jpg', '29573290_190149091773307_8656630391751810562_n.jpg', '', 0, 0, 1, 2, '2018-03-28 11:22:43', '0000-00-00 00:00:00'),
(38, 31, 1, '20180328112243AM-1522228963-EVENT-763741636.jpg', '29186307_1641999532560068_737960361675718656_n.jpg', '', 1, 0, 1, 2, '2018-03-28 11:22:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `EventAttendee`
--

CREATE TABLE IF NOT EXISTS `EventAttendee` (
  `EventAttendeeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `EventId` bigint(20) DEFAULT NULL,
  `UserProfileId` bigint(20) DEFAULT NULL,
  `EventApprovedStatus` int(11) DEFAULT '0',
  `ApprovedOn` datetime DEFAULT NULL,
  `AddedBy` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`EventAttendeeId`),
  KEY `ComplaintId` (`EventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `EventAttendee`
--

INSERT INTO `EventAttendee` (`EventAttendeeId`, `EventId`, `UserProfileId`, `EventApprovedStatus`, `ApprovedOn`, `AddedBy`) VALUES
(1, 1, 1, 0, '2018-03-21 11:35:53', 1),
(2, 1, 2, 0, '2018-03-21 11:35:53', 1),
(3, 8, 1, 0, '2018-03-22 12:29:44', 1),
(4, 8, 2, 0, '2018-03-22 12:29:44', 1),
(5, 12, 2, 0, '2018-03-22 17:07:30', 4),
(6, 13, 2, 0, '2018-03-22 17:20:39', 4),
(7, 14, 4, 0, '2018-03-26 05:36:40', 2),
(8, 17, 4, 0, '2018-03-28 08:15:06', 2),
(9, 18, 4, 0, '2018-03-28 08:18:05', 2),
(10, 19, 4, 0, '2018-03-28 08:33:53', 2),
(11, 20, 4, 0, '2018-03-28 08:35:53', 2),
(12, 21, 4, 0, '2018-03-28 08:38:23', 2),
(13, 22, 4, 0, '2018-03-28 08:39:02', 2),
(14, 23, 4, 0, '2018-03-28 08:47:04', 2),
(15, 24, 1, 0, '2018-03-28 08:52:40', 2),
(16, 24, 2, 0, '2018-03-28 08:52:40', 2),
(17, 25, 1, 0, '2018-03-28 08:53:22', 2),
(18, 25, 2, 0, '2018-03-28 08:53:22', 2),
(19, 26, 1, 0, '2018-03-28 08:54:59', 2),
(20, 26, 2, 0, '2018-03-28 08:54:59', 2),
(21, 27, 1, 0, '2018-03-28 08:58:06', 2),
(22, 27, 2, 0, '2018-03-28 08:58:06', 2),
(23, 28, 1, 0, '2018-03-28 08:59:10', 2),
(24, 28, 2, 0, '2018-03-28 08:59:10', 2),
(25, 29, 1, 0, '2018-03-28 08:59:59', 2),
(26, 29, 2, 0, '2018-03-28 08:59:59', 2),
(27, 30, 4, 0, '2018-03-28 09:01:25', 2),
(28, 31, 4, 0, '2018-03-28 11:22:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `EventLike`
--

CREATE TABLE IF NOT EXISTS `EventLike` (
  `EventLikeId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `EventId` bigint(20) unsigned NOT NULL,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `LikedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`EventLikeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `EventLike`
--

INSERT INTO `EventLike` (`EventLikeId`, `EventId`, `UserProfileId`, `LikedOn`) VALUES
(2, 1, 2, '2018-03-30 10:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `Feeling`
--

CREATE TABLE IF NOT EXISTS `Feeling` (
  `FeelingId` int(11) NOT NULL AUTO_INCREMENT,
  `FeelingName` varchar(100) DEFAULT NULL,
  `FeelingImagePath` varchar(200) DEFAULT NULL,
  `FeelingStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`FeelingId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Feeling`
--

INSERT INTO `Feeling` (`FeelingId`, `FeelingName`, `FeelingImagePath`, `FeelingStatus`) VALUES
(1, 'angry', 'angry.png', 1),
(2, 'happy', 'happy.png', 1),
(3, 'sad', 'sad.png', 1),
(4, 'wow', 'wow.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Fleet`
--

CREATE TABLE IF NOT EXISTS `Fleet` (
  `FleetId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `VehicleId` bigint(20) unsigned NOT NULL,
  `VehicleQuantity` varchar(255) NOT NULL,
  `FleetStatus` int(11) NOT NULL DEFAULT '0',
  `AddedOn` datetime NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`FleetId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Fleet`
--

INSERT INTO `Fleet` (`FleetId`, `UserProfileId`, `VehicleId`, `VehicleQuantity`, `FleetStatus`, `AddedOn`, `UpdatedOn`) VALUES
(1, 2, 1, '0', 1, '2018-04-03 09:27:56', '2018-04-03 09:34:10'),
(2, 2, 2, '34', 1, '2018-04-03 09:27:57', '2018-04-03 09:34:10'),
(3, 2, 5, '23', 1, '2018-04-03 09:27:57', '2018-04-03 09:34:10'),
(4, 2, 4, '0', 1, '2018-04-03 09:27:57', '2018-04-03 09:34:10'),
(5, 2, 3, '0', 1, '2018-04-03 09:27:57', '2018-04-03 09:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `Fund`
--

CREATE TABLE IF NOT EXISTS `Fund` (
  `FundId` int(11) NOT NULL AUTO_INCREMENT,
  `FundName` varchar(100) DEFAULT NULL,
  `FundStatus` int(11) DEFAULT '0',
  `AddedBy` bigint(20) unsigned DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`FundId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Fund`
--

INSERT INTO `Fund` (`FundId`, `FundName`, `FundStatus`, `AddedBy`, `AddedOn`) VALUES
(1, 'Crowd', 1, NULL, '2018-03-01 00:00:00'),
(2, 'Party', 1, NULL, '2018-03-01 00:00:00'),
(3, 'Others', 1, NULL, '2018-03-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Gender`
--

CREATE TABLE IF NOT EXISTS `Gender` (
  `GenderId` int(11) NOT NULL AUTO_INCREMENT,
  `GenderName` varchar(50) DEFAULT NULL,
  `GenderStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`GenderId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Gender`
--

INSERT INTO `Gender` (`GenderId`, `GenderName`, `GenderStatus`) VALUES
(1, 'Male', 1),
(2, 'Female', 1),
(3, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Information`
--

CREATE TABLE IF NOT EXISTS `Information` (
  `InformationId` bigint(20) NOT NULL AUTO_INCREMENT,
  `InformationUniqueId` varchar(100) DEFAULT NULL,
  `InformationPrivacy` bigint(20) NOT NULL,
  `ApplicantName` varchar(100) DEFAULT NULL,
  `ApplicantFatherName` varchar(100) DEFAULT NULL,
  `ApplicantGender` varchar(10) DEFAULT NULL,
  `ApplicantMobile` varchar(20) DEFAULT NULL,
  `ApplicantEmail` varchar(100) DEFAULT NULL,
  `ApplicantAadhaarNumber` varchar(100) DEFAULT NULL,
  `InformationSubject` varchar(200) DEFAULT NULL,
  `InformationDescription` text,
  `InformationStatus` bigint(20) NOT NULL DEFAULT '0',
  `AddedOn` datetime NOT NULL,
  `AddedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  PRIMARY KEY (`InformationId`),
  KEY `ComplaintStatus` (`InformationStatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Information`
--

INSERT INTO `Information` (`InformationId`, `InformationUniqueId`, `InformationPrivacy`, `ApplicantName`, `ApplicantFatherName`, `ApplicantGender`, `ApplicantMobile`, `ApplicantEmail`, `ApplicantAadhaarNumber`, `InformationSubject`, `InformationDescription`, `InformationStatus`, `AddedOn`, `AddedBy`, `UpdatedOn`, `UpdatedBy`) VALUES
(1, 'C16992668391522043358', 0, 'Name', 'father name', NULL, '9988556699', NULL, NULL, 'Subject', 'Description', 1, '2018-03-26 07:49:18', 1, '2018-03-26 07:49:18', 1),
(2, 'I2994730001522043386', 0, 'Name', 'father name', NULL, '9988556699', NULL, NULL, 'Subject', 'Description', 1, '2018-03-26 07:49:46', 1, '2018-03-26 07:49:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `InformationAttachment`
--

CREATE TABLE IF NOT EXISTS `InformationAttachment` (
  `InformationAttachmentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `InformationId` bigint(20) NOT NULL,
  `AttachmentTypeId` bigint(20) NOT NULL,
  `AttachmentFile` varchar(200) NOT NULL,
  `AttachmentOrginalFile` varchar(200) NOT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`InformationAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`InformationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `InformationHistory`
--

CREATE TABLE IF NOT EXISTS `InformationHistory` (
  `InformationHistoryId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `InformationId` bigint(20) unsigned NOT NULL,
  `HistoryDescription` text NOT NULL,
  `HistoryStatus` bigint(20) NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`InformationHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `InformationHistoryAttachment`
--

CREATE TABLE IF NOT EXISTS `InformationHistoryAttachment` (
  `InformationHistoryAttachmentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `InformationHistoryId` bigint(20) NOT NULL,
  `AttachmentTypeId` bigint(20) NOT NULL,
  `AttachmentFile` varchar(200) NOT NULL,
  `AttachmentOrginalFile` varchar(200) NOT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`InformationHistoryAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`InformationHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `PaymentGateway`
--

CREATE TABLE IF NOT EXISTS `PaymentGateway` (
  `PaymentGatewayId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PaymentGatewayName` varchar(100) NOT NULL,
  `PaymentGatewayDescription` text NOT NULL,
  `PaymentGatewayStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PaymentGatewayId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `PaymentGateway`
--

INSERT INTO `PaymentGateway` (`PaymentGatewayId`, `PaymentGatewayName`, `PaymentGatewayDescription`, `PaymentGatewayStatus`) VALUES
(1, 'PayU Money', 'PayU Money', 1),
(2, 'PayTM', 'PayTM', 1),
(3, 'PayPal', 'PayPal', 1),
(4, 'Wallet', 'Wallet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PaymentGatewayAPI`
--

CREATE TABLE IF NOT EXISTS `PaymentGatewayAPI` (
  `PaymentGatewayAPI` bigint(20) NOT NULL AUTO_INCREMENT,
  `PaymentGatewayId` bigint(20) NOT NULL,
  `ApiUrl` varchar(255) DEFAULT NULL,
  `ApiMerchantKey` varchar(250) NOT NULL,
  `ApiUsername` varchar(250) NOT NULL,
  `ApiPassword` varchar(250) NOT NULL,
  `ApiAccessKey` varchar(250) NOT NULL,
  `ApiStatus` int(11) NOT NULL,
  PRIMARY KEY (`PaymentGatewayAPI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `PaymentGatewayAPI`
--

INSERT INTO `PaymentGatewayAPI` (`PaymentGatewayAPI`, `PaymentGatewayId`, `ApiUrl`, `ApiMerchantKey`, `ApiUsername`, `ApiPassword`, `ApiAccessKey`, `ApiStatus`) VALUES
(1, 1, 'https://secure.payu.in', 'xit8dtfA', '', '', 'dlr4AbGetK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PaymentTransactionLog`
--

CREATE TABLE IF NOT EXISTS `PaymentTransactionLog` (
  `PaymentTransactionLogId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PaymentGatewayId` bigint(20) NOT NULL,
  `TransactionId` varchar(200) NOT NULL,
  `PaymentBy` bigint(20) unsigned NOT NULL,
  `PaymentTo` bigint(20) unsigned NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `TransactionAmount` double(16,2) NOT NULL,
  `TransactionShippingAmount` double(16,2) NOT NULL,
  `DebitOrCredit` int(11) NOT NULL,
  `TransactionStatus` int(11) NOT NULL DEFAULT '0',
  `TransactionComment` text NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`PaymentTransactionLogId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `PaymentTransactionLog`
--

INSERT INTO `PaymentTransactionLog` (`PaymentTransactionLogId`, `PaymentGatewayId`, `TransactionId`, `PaymentBy`, `PaymentTo`, `TransactionDate`, `TransactionAmount`, `TransactionShippingAmount`, `DebitOrCredit`, `TransactionStatus`, `TransactionComment`, `AddedOn`) VALUES
(1, 1, 'TE454534', 4, 4, '2018-05-01 14:10:00', 45.00, 0.00, 1, 1, 'This is payment for support', '2018-04-06 13:26:34'),
(2, 1, 'TE454534', 4, 4, '2018-05-01 14:10:00', 45.00, 0.00, 1, 1, 'This is payment for support', '2018-04-06 13:27:24'),
(3, 1, 'TE454534', 4, 4, '2018-05-01 14:10:00', 45.00, 0.00, 1, 1, 'This is payment for support', '2018-04-06 13:28:20'),
(4, 1, 'TE454534', 4, 4, '2018-05-01 14:10:00', 45.00, 0.00, 1, 1, 'This is payment for support', '2018-04-06 13:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `Permission`
--

CREATE TABLE IF NOT EXISTS `Permission` (
  `PermissionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PermissionScreenName` varchar(100) NOT NULL,
  `PermissionStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`PermissionId`),
  KEY `TypeName` (`PermissionScreenName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Plan`
--

CREATE TABLE IF NOT EXISTS `Plan` (
  `PlanId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PlanUniqueId` varchar(50) DEFAULT NULL,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `UserTypeId` int(11) NOT NULL,
  `StateId` int(11) DEFAULT NULL,
  `CityId` int(11) DEFAULT NULL,
  `TotalTeamMale` varchar(100) DEFAULT NULL,
  `TotalTeamFemale` varchar(100) DEFAULT NULL,
  `TotalBudget` varchar(100) DEFAULT NULL,
  `TotalEvent` varchar(100) DEFAULT NULL,
  `TotalVehicle` varchar(100) DEFAULT NULL,
  `PlanStatus` int(11) DEFAULT '0',
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PlanId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Plan`
--

INSERT INTO `Plan` (`PlanId`, `PlanUniqueId`, `UserProfileId`, `UserTypeId`, `StateId`, `CityId`, `TotalTeamMale`, `TotalTeamFemale`, `TotalBudget`, `TotalEvent`, `TotalVehicle`, `PlanStatus`, `AddedOn`, `UpdatedOn`) VALUES
(1, 'P1782931451522497912', 2, 5, 30, 913, '10', '12', '123456789', '120', '130', 1, '2018-03-31 14:05:12', '2018-03-31 14:05:12'),
(2, 'P12071919641522497975', 2, 5, 30, 913, '10', '12', '123456789', '120', '130', 1, '2018-03-31 14:06:15', '2018-03-31 14:06:15'),
(3, 'P16829724331522642175', 2, 4, 30, 913, '456322', '34', '567856', '33', '66', 1, '2018-04-02 06:09:35', '2018-04-02 06:09:35'),
(4, 'P2810073851522642209', 2, 4, 30, 913, '456322', '34', '567856', '33', '66', 1, '2018-04-02 06:10:09', '2018-04-02 06:10:09'),
(5, 'P3962980081522650207', 2, 2, 19, 578, '33', '111', '77777777', '45', '67', 1, '2018-04-02 08:23:27', '2018-04-02 08:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `PlanFund`
--

CREATE TABLE IF NOT EXISTS `PlanFund` (
  `PlanFundId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PlanId` bigint(20) unsigned NOT NULL,
  `FundId` int(11) NOT NULL,
  PRIMARY KEY (`PlanFundId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `PlanFund`
--

INSERT INTO `PlanFund` (`PlanFundId`, `PlanId`, `FundId`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(6, 3, 3),
(7, 4, 1),
(8, 4, 3),
(9, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PlanTargetPopulation`
--

CREATE TABLE IF NOT EXISTS `PlanTargetPopulation` (
  `PlanTargetPopulationId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PlanId` bigint(20) unsigned DEFAULT NULL,
  `TotalPopulation` varchar(100) DEFAULT NULL,
  `MalePopulation` varchar(100) DEFAULT NULL,
  `FemalePopulation` varchar(100) DEFAULT NULL,
  `Above18_30Population` varchar(100) DEFAULT NULL,
  `Above31_50Population` varchar(100) DEFAULT NULL,
  `Above51_60Population` varchar(100) DEFAULT NULL,
  `Above60Population` varchar(100) DEFAULT NULL,
  `TotalArea` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PlanTargetPopulationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `PlanTargetPopulation`
--

INSERT INTO `PlanTargetPopulation` (`PlanTargetPopulationId`, `PlanId`, `TotalPopulation`, `MalePopulation`, `FemalePopulation`, `Above18_30Population`, `Above31_50Population`, `Above51_60Population`, `Above60Population`, `TotalArea`) VALUES
(1, 1, '10000000', '500000', '5000000', '10000', '800000', '600000', '100000', '96656 Sq. Ft.'),
(2, 2, '10000000', '500000', '5000000', '10000', '800000', '600000', '100000', '96656 Sq. Ft.'),
(3, 3, '100000', '50000', '500000', '1000', '80000', '60000', '10000', '9666 Sq. Ft.'),
(4, 4, '100000', '50000', '500000', '1000', '80000', '60000', '10000', '9666 Sq. Ft.'),
(5, 5, '333', '45', '667', '888', '88', '888', '990', '234');

-- --------------------------------------------------------

--
-- Table structure for table `PlanVehicle`
--

CREATE TABLE IF NOT EXISTS `PlanVehicle` (
  `PlanVehicleId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PlanId` bigint(20) DEFAULT NULL,
  `VehicleId` bigint(20) DEFAULT NULL,
  `VehicleQuantity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PlanVehicleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `PoliticalParty`
--

CREATE TABLE IF NOT EXISTS `PoliticalParty` (
  `PoliticalPartyId` bigint(20) NOT NULL AUTO_INCREMENT,
  `PoliticalPartyName` varchar(200) DEFAULT NULL,
  `PoliticalPartyCode` varchar(100) DEFAULT NULL,
  `PoliticalPartyDescription` text,
  `PoliticalPartyWebsite` varchar(255) DEFAULT NULL,
  `PoliticalPartyLocation` varchar(200) DEFAULT NULL,
  `PoliticalPartyEstablishedYear` varchar(100) DEFAULT NULL,
  `PoliticalPartyPresidentName` varchar(200) DEFAULT NULL,
  `PoliticalPartyStatus` int(11) DEFAULT '0',
  PRIMARY KEY (`PoliticalPartyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `PoliticalParty`
--

INSERT INTO `PoliticalParty` (`PoliticalPartyId`, `PoliticalPartyName`, `PoliticalPartyCode`, `PoliticalPartyDescription`, `PoliticalPartyWebsite`, `PoliticalPartyLocation`, `PoliticalPartyEstablishedYear`, `PoliticalPartyPresidentName`, `PoliticalPartyStatus`) VALUES
(1, 'Indian National Congress', 'INC', 'Indian National Congress', 'https://www.inc.in/en', '24, Akbar Road, New Delhi 110 011, INDIA', '1885', 'Mr. Rahul Gandhi', 1),
(2, 'Bhartiya Janta Party', 'BJP', 'Bhartiya Janta Party', 'http://www.bjp.org/', 'BJP Central Office 6 - A, DEEN DAYAL UPADHYAYA MARG, NEW DELHI -110002 India', '1925', 'Mr. Amit Shah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Poll`
--

CREATE TABLE IF NOT EXISTS `Poll` (
  `PollId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PollUniqueId` varchar(100) DEFAULT NULL,
  `PollQuestion` varchar(200) NOT NULL,
  `PollPrivacy` int(11) NOT NULL DEFAULT '1',
  `ValidFromDate` date NOT NULL,
  `ValidEndDate` date NOT NULL,
  `PollStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`PollId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Poll`
--

INSERT INTO `Poll` (`PollId`, `PollUniqueId`, `PollQuestion`, `PollPrivacy`, `ValidFromDate`, `ValidEndDate`, `PollStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(3, 'P15215294101415338923', 'This is my second poll', 1, '2018-03-01', '2018-03-07', 1, 1, '2018-03-20 08:03:30', 1, '2018-03-20 08:03:30'),
(4, 'P152155435455338923', 'Poll 1', 1, '2018-03-01', '2018-03-07', 1, 4, '2018-03-20 08:03:30', 4, '2018-03-20 08:03:30'),
(5, 'P1521800501374103346', 'Question 1', 0, '0000-00-00', '0000-00-00', 1, 4, '2018-03-23 11:21:41', 4, '2018-03-23 11:21:41'),
(6, 'P152180158619999474', 'asdfsad', 1, '2018-03-06', '2018-03-06', 1, 4, '2018-03-23 11:39:46', 4, '2018-03-23 11:39:46'),
(7, 'P1522035441626698924', 'Who will win 2019 Election?', 1, '2018-03-30', '2018-03-31', 1, 2, '2018-03-26 05:37:21', 2, '2018-03-26 05:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `PollAnswer`
--

CREATE TABLE IF NOT EXISTS `PollAnswer` (
  `PollAnswerId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PollId` bigint(20) NOT NULL,
  `PollAnswer` varchar(200) NOT NULL,
  `PollAnswerStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`PollAnswerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `PollAnswer`
--

INSERT INTO `PollAnswer` (`PollAnswerId`, `PollId`, `PollAnswer`, `PollAnswerStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(9, 3, 'First Answer', 1, 1, '2018-03-20 08:03:30', 1, '2018-03-20 08:03:30'),
(10, 3, 'Second Answer', 1, 1, '2018-03-20 08:03:30', 1, '2018-03-20 08:03:30'),
(11, 3, 'Third Answer', 1, 1, '2018-03-20 08:03:30', 1, '2018-03-20 08:03:30'),
(12, 3, 'Fourth Answer', 1, 1, '2018-03-20 08:03:31', 1, '2018-03-20 08:03:31'),
(13, 4, 'First Answer', 1, 1, '2018-03-20 08:03:30', 1, '2018-03-20 08:03:30'),
(14, 4, 'Second Answer', 1, 1, '2018-03-20 08:03:30', 1, '2018-03-20 08:03:30'),
(15, 4, 'Third Answer', 1, 1, '2018-03-20 08:03:30', 1, '2018-03-20 08:03:30'),
(16, 4, 'Fourth Answer', 1, 1, '2018-03-20 08:03:31', 1, '2018-03-20 08:03:31'),
(17, 5, 'Answer 1', 1, 4, '2018-03-23 11:21:41', 4, '2018-03-23 11:21:41'),
(18, 5, 'Answer 2', 1, 4, '2018-03-23 11:21:41', 4, '2018-03-23 11:21:41'),
(19, 5, 'Answer 3', 1, 4, '2018-03-23 11:21:41', 4, '2018-03-23 11:21:41'),
(20, 5, 'Answer 4', 1, 4, '2018-03-23 11:21:42', 4, '2018-03-23 11:21:42'),
(21, 6, 'asdf', 1, 4, '2018-03-23 11:39:47', 4, '2018-03-23 11:39:47'),
(22, 6, 'adsfadsfas', 1, 4, '2018-03-23 11:39:47', 4, '2018-03-23 11:39:47'),
(23, 6, 'dfasdf', 1, 4, '2018-03-23 11:39:47', 4, '2018-03-23 11:39:47'),
(24, 6, 'asdfas', 1, 4, '2018-03-23 11:39:47', 4, '2018-03-23 11:39:47'),
(25, 7, 'Narendra Modi', 1, 2, '2018-03-26 05:37:21', 2, '2018-03-26 05:37:21'),
(26, 7, 'Rahul Gandhi', 1, 2, '2018-03-26 05:37:21', 2, '2018-03-26 05:37:21'),
(27, 7, 'Mamta Banarjee', 1, 2, '2018-03-26 05:37:21', 2, '2018-03-26 05:37:21'),
(28, 7, 'Arvind Kejriwal', 1, 2, '2018-03-26 05:37:21', 2, '2018-03-26 05:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `PollLike`
--

CREATE TABLE IF NOT EXISTS `PollLike` (
  `PollLikeId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PollId` bigint(20) unsigned NOT NULL,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `LikedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PollLikeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `PollParticipation`
--

CREATE TABLE IF NOT EXISTS `PollParticipation` (
  `PollParticipationId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PollId` bigint(20) NOT NULL,
  `PollAnswerId` bigint(20) NOT NULL,
  `PollParticipationDescription` varchar(200) NOT NULL,
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`PollParticipationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `PollParticipation`
--

INSERT INTO `PollParticipation` (`PollParticipationId`, `PollId`, `PollAnswerId`, `PollParticipationDescription`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(4, 3, 9, '', 2, '2018-03-20 08:16:13', 2, '2018-03-20 08:16:13'),
(5, 3, 11, '', 1, '2018-03-20 08:17:24', 1, '2018-03-20 08:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE IF NOT EXISTS `Post` (
  `PostId` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserProfileId` bigint(20) NOT NULL,
  `PostTitle` text,
  `PostFeelingId` int(11) NOT NULL DEFAULT '0',
  `PostStatus` int(11) NOT NULL DEFAULT '0',
  `PostLocation` text,
  `PostDescription` text,
  `PostURL` text,
  `AddedOn` datetime NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`PostId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Post`
--

INSERT INTO `Post` (`PostId`, `UserProfileId`, `PostTitle`, `PostFeelingId`, `PostStatus`, `PostLocation`, `PostDescription`, `PostURL`, `AddedOn`, `UpdatedOn`) VALUES
(1, 2, 'Test Post', 2, 1, 'Post Location', 'Post Description', 'Post Url', '2018-03-14 06:18:18', '2018-03-14 06:18:18'),
(2, 2, 'I am feeling sad', 0, 1, 'Noida', 'I am feeling sad description', NULL, '2018-03-26 06:12:30', '2018-03-26 06:12:30'),
(3, 2, 'Test Post', 0, 1, 'Test Location', 'Test Post Description', NULL, '2018-03-28 12:32:25', '2018-03-28 12:32:25'),
(4, 2, 't', 0, 1, 'asdfasd', 'estsdfasd', NULL, '2018-03-28 12:42:03', '2018-03-28 12:42:03'),
(7, 1, 'This is first post', 2, 1, 'Noida', 'this is post description', 'http://www.indiatimes.com', '2018-03-28 12:48:38', '2018-03-28 12:48:38'),
(8, 1, 'This is first post', 2, 1, 'Noida', 'this is post description', 'http://www.indiatimes.com', '2018-03-28 12:52:11', '2018-03-28 12:52:11'),
(9, 1, 'This is first post', 2, 1, 'Noida', 'this is post description', 'http://www.indiatimes.com', '2018-03-28 12:53:55', '2018-03-28 12:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `PostAttachment`
--

CREATE TABLE IF NOT EXISTS `PostAttachment` (
  `PostAttachmentId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PostId` bigint(20) unsigned NOT NULL,
  `AttachmentTypeId` bigint(20) unsigned NOT NULL,
  `AttachmentFile` varchar(200) DEFAULT NULL,
  `AttachmentOrginalFile` varchar(200) DEFAULT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PostAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`PostId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `PostAttachment`
--

INSERT INTO `PostAttachment` (`PostAttachmentId`, `PostId`, `AttachmentTypeId`, `AttachmentFile`, `AttachmentOrginalFile`, `AttachmentThumb`, `AttachmentOrder`, `AttachmentStatus`, `AddedBy`, `AddedOn`, `DeletedOn`) VALUES
(1, 1, 1, 'TestFile.jpg', 'Test.jpg', NULL, 0, 1, 1, '2018-03-14 06:18:18', NULL),
(2, 1, 1, 'Two.jpg', 't.jpg', NULL, 1, 1, 1, '2018-03-14 06:18:18', NULL),
(3, 3, 1, '20180328123226PM-1522233146-POST-132637339.jpg', '26169153_10156388213623455_3834306087817877268_n.jpg', NULL, 0, 1, 2, '2018-03-28 12:32:26', NULL),
(4, 3, 1, '20180328123226PM-1522233146-POST-460225811.jpg', '26196335_10156402255398455_4340823665976565567_n.jpg', NULL, 1, 1, 2, '2018-03-28 12:32:26', NULL),
(5, 4, 1, '20180328124204PM-1522233724-POST-196093294.jpg', '29176952_10156600555838455_5852662306881667072_n.jpg', NULL, 0, 1, 2, '2018-03-28 12:42:04', NULL),
(6, 7, 1, '20180328124838PM-1522234118-POST-1968530538.jpg', '29573290_190149091773307_8656630391751810562_n.jpg', NULL, 0, 1, 1, '2018-03-28 12:48:38', NULL),
(7, 8, 1, '20180328125211PM-1522234331-POST-20045296.jpg', '29573290_190149091773307_8656630391751810562_n.jpg', NULL, 0, 1, 1, '2018-03-28 12:52:11', NULL),
(8, 9, 1, '20180328125355PM-1522234435-POST-1150378900.jpg', '29573290_190149091773307_8656630391751810562_n.jpg', NULL, 0, 1, 1, '2018-03-28 12:53:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PostLike`
--

CREATE TABLE IF NOT EXISTS `PostLike` (
  `PostLikeId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PostId` bigint(20) unsigned NOT NULL,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `LikedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PostLikeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `PostTag`
--

CREATE TABLE IF NOT EXISTS `PostTag` (
  `PostTagId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PostId` bigint(20) unsigned NOT NULL,
  `UserProfileId` bigint(20) unsigned NOT NULL,
  `TagStatus` int(11) NOT NULL DEFAULT '0',
  `TagApproved` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`PostTagId`),
  KEY `AttachmentTypeId` (`UserProfileId`),
  KEY `ComplaintId` (`PostId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `PostTag`
--

INSERT INTO `PostTag` (`PostTagId`, `PostId`, `UserProfileId`, `TagStatus`, `TagApproved`, `AddedBy`, `AddedOn`) VALUES
(1, 1, 1, 1, 1, 1, '2018-03-14 06:18:18'),
(2, 1, 3, 1, 1, 1, '2018-03-14 06:18:18'),
(3, 2, 4, 1, 1, 2, '2018-03-26 06:12:30'),
(4, 3, 4, 1, 1, 2, '2018-03-28 12:32:25'),
(5, 4, 4, 1, 1, 2, '2018-03-28 12:42:03'),
(10, 7, 2, 1, 1, 1, '2018-03-28 12:48:38'),
(11, 7, 1, 1, 1, 1, '2018-03-28 12:48:38'),
(12, 8, 2, 1, 1, 1, '2018-03-28 12:52:11'),
(13, 8, 1, 1, 1, 1, '2018-03-28 12:52:11'),
(14, 9, 2, 1, 1, 1, '2018-03-28 12:53:55'),
(15, 9, 1, 1, 1, 1, '2018-03-28 12:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `SocialSite`
--

CREATE TABLE IF NOT EXISTS `SocialSite` (
  `SocialSiteId` int(11) NOT NULL AUTO_INCREMENT,
  `SocialSiteName` varchar(100) DEFAULT NULL,
  `SocialSiteStatus` int(11) DEFAULT '0',
  PRIMARY KEY (`SocialSiteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `SocialSite`
--

INSERT INTO `SocialSite` (`SocialSiteId`, `SocialSiteName`, `SocialSiteStatus`) VALUES
(1, 'Facebook', 1),
(2, 'Twitter', 1),
(3, 'Google', 1),
(4, 'LinkedIn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `StateCity`
--

CREATE TABLE IF NOT EXISTS `StateCity` (
  `CityId` int(11) NOT NULL AUTO_INCREMENT,
  `ZoneId` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `CityLatitude` varchar(10) NOT NULL,
  `CityLongitude` varchar(10) NOT NULL,
  `TotalPopulation` varchar(100) DEFAULT NULL,
  `MalePopulation` varchar(100) DEFAULT NULL,
  `FemalePopulation` varchar(100) DEFAULT NULL,
  `Above18_30Population` varchar(100) DEFAULT NULL,
  `Above31_50Population` varchar(100) DEFAULT NULL,
  `Above51_60Population` varchar(100) DEFAULT NULL,
  `Above60Population` varchar(100) DEFAULT NULL,
  `TotalArea` varchar(100) DEFAULT NULL,
  `StateId` int(11) NOT NULL,
  `CityStatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CityId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

--
-- Dumping data for table `StateCity`
--

INSERT INTO `StateCity` (`CityId`, `ZoneId`, `CityName`, `CityLatitude`, `CityLongitude`, `TotalPopulation`, `MalePopulation`, `FemalePopulation`, `Above18_30Population`, `Above31_50Population`, `Above51_60Population`, `Above60Population`, `TotalArea`, `StateId`, `CityStatus`) VALUES
(1, 1505, 'Port Blair', '11.67 N', '92.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(2, 1505, 'Adilabad', '19.68 N', '78.53 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(3, 1505, 'Adoni', '15.63 N', '77.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(4, 1505, 'Alwal', '17.50 N', '78.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(5, 1505, 'Anakapalle', '17.69 N', '83.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(6, 1505, 'Anantapur', '14.70 N', '77.59 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(7, 1505, 'Bapatla', '15.91 N', '80.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(8, 1505, 'Belampalli', '19.06 N', '79.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(9, 1505, 'Bhimavaram', '16.55 N', '81.53 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(10, 1505, 'Bhongir', '17.52 N', '78.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(11, 1505, 'Bobbili', '18.57 N', '83.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(12, 1505, 'Bodhan', '18.66 N', '77.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(13, 1505, 'Chilakalurupet', '16.10 N', '80.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(14, 1505, 'Chinna Chawk', '14.47 N', '78.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(15, 1505, 'Chirala', '15.84 N', '80.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(16, 1505, 'Chittur', '13.22 N', '79.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(17, 1505, 'Cuddapah', '14.48 N', '78.81 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(18, 1505, 'Dharmavaram', '14.42 N', '77.71 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(19, 1505, 'Dhone', '15.42 N', '77.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(20, 1505, 'Eluru', '16.72 N', '81.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(21, 1505, 'Gaddiannaram', '17.36 N', '78.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(22, 1505, 'Gadwal', '16.23 N', '77.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(23, 1505, 'Gajuwaka', '17.70 N', '83.21 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(24, 1505, 'Gudivada', '16.44 N', '81.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(25, 1505, 'Gudur', '14.15 N', '79.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(26, 1505, 'Guntakal', '15.18 N', '77.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(27, 1505, 'Guntur', '16.31 N', '80.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(28, 1505, 'Hindupur', '13.83 N', '77.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(29, 1505, 'Hyderabad', '17.40 N', '78.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(30, 1505, 'Jagtial', '18.80 N', '78.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(31, 1505, 'Kadiri', '14.12 N', '78.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(32, 1505, 'Kagaznagar', '19.34 N', '79.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(33, 1505, 'Kakinada', '16.96 N', '82.24 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(34, 1505, 'Kallur', '15.69 N', '77.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(35, 1505, 'Kamareddi', '18.32 N', '78.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(36, 1505, 'Kapra', '17.37 N', '78.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(37, 1505, 'Karimnagar', '18.45 N', '79.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(38, 1505, 'Karnul', '15.83 N', '78.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(39, 1505, 'Kavali', '14.92 N', '79.99 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(40, 1505, 'Khammam', '17.25 N', '80.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(41, 1505, 'Kodar', '16.98 N', '79.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(42, 1505, 'Kondukur', '15.22 N', '79.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(43, 1505, 'Koratla', '18.82 N', '78.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(44, 1505, 'Kottagudem', '17.56 N', '80.64 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(45, 1505, 'Kukatpalle', '17.49 N', '78.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(46, 1505, 'Lalbahadur Nagar', '17.43 N', '78.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(47, 1505, 'Machilipatnam', '16.19 N', '81.14 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(48, 1505, 'Mahbubnagar', '16.74 N', '77.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(49, 1505, 'Malkajgiri', '17.55 N', '78.59 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(50, 1505, 'Mancheral', '18.88 N', '79.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(51, 1505, 'Mandamarri', '18.97 N', '79.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(52, 1505, 'Mangalagiri', '16.44 N', '80.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(53, 1505, 'Markapur', '15.73 N', '79.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(54, 1505, 'Miryalaguda', '16.87 N', '79.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(55, 1505, 'Nalgonda', '17.06 N', '79.26 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(56, 1505, 'Nandyal', '15.49 N', '78.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(57, 1505, 'Narasapur', '16.45 N', '81.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(58, 1505, 'Narasaraopet', '16.24 N', '80.04 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(59, 1505, 'Nellur', '14.46 N', '79.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(60, 1505, 'Nirmal', '19.12 N', '78.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(61, 1505, 'Nizamabad', '18.68 N', '78.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(62, 1505, 'Nuzvid', '16.78 N', '80.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(63, 1505, 'Ongole', '15.50 N', '80.05 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(64, 1505, 'Palakollu', '16.52 N', '81.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(65, 1505, 'Palasa', '18.77 N', '84.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(66, 1505, 'Palwancha', '17.60 N', '80.68 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(67, 1505, 'Patancheru', '17.53 N', '78.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(68, 1505, 'Piduguralla', '16.48 N', '79.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(69, 1505, 'Ponnur', '16.07 N', '80.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(70, 1505, 'Proddatur', '14.73 N', '78.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(71, 1505, 'Qutubullapur', '17.43 N', '78.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(72, 1505, 'Rajamahendri', '17.02 N', '81.79 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(73, 1505, 'Rajampet', '14.18 N', '79.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(74, 1505, 'Rajendranagar', '17.29 N', '78.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(75, 1505, 'Ramachandrapuram', '17.56 N', '78.04 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(76, 1505, 'Ramagundam', '18.80 N', '79.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(77, 1505, 'Rayachoti', '14.05 N', '78.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(78, 1505, 'Rayadrug', '14.70 N', '76.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(79, 1505, 'Samalkot', '17.06 N', '82.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(80, 1505, 'Sangareddi', '17.63 N', '78.08 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(81, 1505, 'Sattenapalle', '16.40 N', '80.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(82, 1505, 'Serilungampalle', '17.48 N', '78.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(83, 1505, 'Siddipet', '18.11 N', '78.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(84, 1505, 'Sikandarabad', '17.47 N', '78.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(85, 1505, 'Sirsilla', '18.40 N', '78.81 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(86, 1505, 'Srikakulam', '18.30 N', '83.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(87, 1505, 'Srikalahasti', '13.76 N', '79.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(88, 1505, 'Suriapet', '17.15 N', '79.62 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(89, 1505, 'Tadepalle', '16.48 N', '80.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(90, 1505, 'Tadepallegudem', '16.82 N', '81.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(91, 1505, 'Tadpatri', '14.91 N', '78.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(92, 1505, 'Tandur', '17.25 N', '77.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(93, 1505, 'Tanuku', '16.75 N', '81.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(94, 1505, 'Tenali', '16.24 N', '80.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(95, 1505, 'Tirupati', '13.63 N', '79.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(96, 1505, 'Tuni', '17.35 N', '82.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(97, 1505, 'Uppal Kalan', '17.38 N', '78.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(98, 1505, 'Vijayawada', '16.52 N', '80.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(99, 1505, 'Vinukonda', '16.05 N', '79.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(100, 1505, 'Visakhapatnam', '17.73 N', '83.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(101, 1505, 'Vizianagaram', '18.12 N', '83.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(102, 1505, 'Vuyyuru', '16.37 N', '80.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(103, 1505, 'Wanparti', '16.37 N', '78.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(104, 1505, 'Warangal', '18.01 N', '79.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(105, 1505, 'Yemmiganur', '15.73 N', '77.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1),
(106, 1505, 'Itanagar', '27.14 N', '93.61 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1),
(107, 1505, 'Barpeta', '26.32 N', '91.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(108, 1505, 'Bongaigaon', '26.48 N', '90.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(109, 1505, 'Dhuburi', '26.03 N', '89.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(110, 1505, 'Dibrugarh', '27.49 N', '94.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(111, 1505, 'Diphu', '25.84 N', '93.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(112, 1505, 'Guwahati', '26.19 N', '91.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(113, 1505, 'Jorhat', '26.76 N', '94.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(114, 1505, 'Karimganj', '24.85 N', '92.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(115, 1505, 'Lakhimpur', '27.24 N', '94.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(116, 1505, 'Lanka', '25.93 N', '92.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(117, 1505, 'Nagaon', '26.35 N', '92.68 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(118, 1505, 'Sibsagar', '26.99 N', '94.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(119, 1505, 'Silchar', '24.83 N', '92.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(120, 1505, 'Tezpur', '26.63 N', '92.79 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(121, 1505, 'Tinsukia', '27.50 N', '95.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1),
(122, 1505, 'Alipur Duar', '26.50 N', '89.53 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(123, 1505, 'Arambagh', '22.88 N', '87.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(124, 1505, 'Asansol', '23.69 N', '86.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(125, 1505, 'Ashoknagar Kalyangarh', '22.84 N', '88.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(126, 1505, 'Baharampur', '24.10 N', '88.24 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(127, 1505, 'Baidyabati', '22.79 N', '88.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(128, 1505, 'Baj Baj', '22.48 N', '88.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(129, 1505, 'Bally', '22.65 N', '88.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(130, 1505, 'Bally Cantonment', '22.65 N', '88.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(131, 1505, 'Balurghat', '25.23 N', '88.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(132, 1505, 'Bangaon', '23.05 N', '88.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(133, 1505, 'Bankra', '22.58 N', '88.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(134, 1505, 'Bankura', '23.24 N', '87.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(135, 1505, 'Bansbaria', '22.95 N', '88.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(136, 1505, 'Baranagar', '22.64 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(137, 1505, 'Barddhaman', '23.24 N', '87.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(138, 1505, 'Basirhat', '22.66 N', '88.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(139, 1505, 'Bhadreswar', '22.84 N', '88.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(140, 1505, 'Bhatpara', '22.89 N', '88.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(141, 1505, 'Bidhannagar', '22.57 N', '88.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(142, 1505, 'Binnaguri', '26.74 N', '89.037 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(143, 1505, 'Bishnupur', '23.08 N', '87.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(144, 1505, 'Bolpur', '23.67 N', '87.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(145, 1505, 'Calcutta', '22.57 N', '88.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(146, 1505, 'Chakdaha', '22.48 N', '88.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(147, 1505, 'Champdani', '22.81 N', '88.34 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(148, 1505, 'Chandannagar', '22.89 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(149, 1505, 'Contai', '21.79 N', '87.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(150, 1505, 'Dabgram', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(151, 1505, 'Darjiling', '27.05 N', '88.26 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(152, 1505, 'Dhulian', '24.68 N', '87.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(153, 1505, 'Dinhata', '26.13 N', '89.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(154, 1505, 'Dum Dum', '22.63 N', '88.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(155, 1505, 'Durgapur', '23.50 N', '87.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(156, 1505, 'Gangarampur', '25.40 N', '88.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(157, 1505, 'Garulia', '22.83 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(158, 1505, 'Gayespur', '22.98 N', '88.51 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(159, 1505, 'Ghatal', '22.67 N', '87.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(160, 1505, 'Gopalpur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(161, 1505, 'Habra', '22.84 N', '88.62 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(162, 1505, 'Halisahar', '22.95 N', '88.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(163, 1505, 'Haora', '22.58 N', '88.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(164, 1505, 'HugliChunchura', '22.91 N', '88.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(165, 1505, 'Ingraj Bazar', '25.01 N', '88.14 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(166, 1505, 'Islampur', '26.27 N', '88.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(167, 1505, 'Jalpaiguri', '26.53 N', '88.71 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(168, 1505, 'Jamuria', '23.70 N', '87.08 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(169, 1505, 'Jangipur', '24.47 N', '88.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(170, 1505, 'Jhargram', '22.45 N', '86.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(171, 1505, 'Kaliyaganj', '25.63 N', '88.32 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(172, 1505, 'Kalna', '23.22 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(173, 1505, 'Kalyani', '22.98 N', '88.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(174, 1505, 'Kamarhati', '22.67 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(175, 1505, 'Kanchrapara', '22.95 N', '88.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(176, 1505, 'Kandi', '23.95 N', '88.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(177, 1505, 'Karsiyang', '26.88 N', '88.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(178, 1505, 'Katwa', '23.65 N', '88.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(179, 1505, 'Kharagpur', '22.34 N', '87.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(180, 1505, 'Kharagpur Railway Settlement', '22.34 N', '87.26 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(181, 1505, 'Khardaha', '22.73 N', '88.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(182, 1505, 'Kharia', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(183, 1505, 'Koch Bihar', '26.33 N', '89.46 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(184, 1505, 'Konnagar', '22.70 N', '88.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(185, 1505, 'Krishnanagar', '23.41 N', '88.51 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(186, 1505, 'Kulti', '23.72 N', '86.89 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(187, 1505, 'Madhyamgram', '22.70 N', '88.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(188, 1505, 'Maheshtala', '22.51 N', '88.23 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(189, 1505, 'Memari', '23.20 N', '88.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(190, 1505, 'Midnapur', '22.33 N', '87.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(191, 1505, 'Naihati', '22.91 N', '88.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(192, 1505, 'Navadwip', '23.42 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(193, 1505, 'Ni Barakpur', '22.77 N', '88.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(194, 1505, 'North Barakpur', '22.78 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(195, 1505, 'North Dum Dum', '22.64 N', '88.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(196, 1505, 'Old Maldah', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(197, 1505, 'Panihati', '22.69 N', '88.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(198, 1505, 'Phulia', '23.24 N', '88.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(199, 1505, 'Pujali', '22.47 N', '88.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(200, 1505, 'Puruliya', '23.34 N', '86.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(201, 1505, 'Raiganj', '25.62 N', '88.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(202, 1505, 'Rajpur', '22.44 N', '88.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(203, 1505, 'Rampur Hat', '24.17 N', '87.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(204, 1505, 'Ranaghat', '23.19 N', '88.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(205, 1505, 'Raniganj', '23.62 N', '87.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(206, 1505, 'Rishra', '22.71 N', '88.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(207, 1505, 'Shantipur', '23.26 N', '88.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(208, 1505, 'Shiliguri', '26.73 N', '88.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(209, 1505, 'Shrirampur', '22.74 N', '88.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(210, 1505, 'Siuri', '23.91 N', '87.53 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(211, 1505, 'South Dum Dum', '22.61 N', '88.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(212, 1505, 'Titagarh', '22.74 N', '88.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(213, 1505, 'Ulubaria', '22.47 N', '88.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(214, 1505, 'UttarparaKotrung', '22.66 N', '88.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
(215, 1505, 'Araria', '26.15 N', '87.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(216, 1505, 'Arrah', '25.56 N', '84.66 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(217, 1505, 'Aurangabad', '24.75 N', '84.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(218, 1505, 'Bagaha', '27.10 N', '84.09 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(219, 1505, 'Begusarai', '25.42 N', '86.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(220, 1505, 'Bettiah', '26.81 N', '84.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(221, 1505, 'Bhabua', '25.05 N', '83.62 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(222, 1505, 'Bhagalpur', '25.26 N', '86.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(223, 1505, 'Bihar', '25.21 N', '85.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(224, 1505, 'Buxar', '25.58 N', '83.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(225, 1505, 'Chhapra', '25.78 N', '84.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(226, 1505, 'Darbhanga', '26.16 N', '85.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(227, 1505, 'Dehri', '24.91 N', '84.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(228, 1505, 'DighaMainpura', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(229, 1505, 'Dinapur', '25.64 N', '85.04 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(230, 1505, 'Dumraon', '25.55 N', '84.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(231, 1505, 'Gaya', '24.81 N', '85.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(232, 1505, 'Gopalganj', '26.47 N', '84.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(233, 1505, 'Goura', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(234, 1505, 'Hajipur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(235, 1505, 'Jahanabad', '25.22 N', '84.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(236, 1505, 'Jamalpur', '25.32 N', '86.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(237, 1505, 'Jamui', '24.92 N', '86.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(238, 1505, 'Katihar', '25.55 N', '87.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(239, 1505, 'Khagaria', '25.50 N', '86.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(240, 1505, 'Khagaul', '25.58 N', '85.05 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(241, 1505, 'Kishanganj', '26.11 N', '87.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(242, 1505, 'Lakhisarai', '25.18 N', '86.09 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(243, 1505, 'Madhipura', '25.92 N', '86.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(244, 1505, 'Madhubani', '26.37 N', '86.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(245, 1505, 'Masaurhi', '25.35 N', '85.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(246, 1505, 'Mokama', '25.40 N', '85.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(247, 1505, 'Motihari', '26.66 N', '84.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(248, 1505, 'Munger', '25.39 N', '86.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(249, 1505, 'Muzaffarpur', '26.13 N', '85.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(250, 1505, 'Nawada', '24.88 N', '85.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(251, 1505, 'Patna', '25.62 N', '85.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(252, 1505, 'Phulwari', '25.60 N', '85.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(253, 1505, 'Purnia', '25.78 N', '87.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(254, 1505, 'Raxaul', '26.98 N', '84.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(255, 1505, 'Saharsa', '25.88 N', '86.59 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(256, 1505, 'Samastipur', '25.85 N', '85.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(257, 1505, 'Sasaram', '24.96 N', '84.01 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(258, 1505, 'Sitamarhi', '26.61 N', '85.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(259, 1505, 'Siwan', '26.23 N', '84.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(260, 1505, 'Supaul', '26.12 N', '86.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1),
(261, 1505, 'Chandigarh', '30.75 N', '76.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1),
(262, 1505, 'Ambikapur', '23.13 N', '83.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(263, 1505, 'Bhilai', '21.21 N', '81.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(264, 1505, 'Bilaspur', '22.09 N', '82.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(265, 1505, 'Charoda', '21.23 N', '81.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(266, 1505, 'Chirmiri', '23.21 N', '82.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(267, 1505, 'Dhamtari', '20.71 N', '81.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(268, 1505, 'Durg', '21.20 N', '81.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(269, 1505, 'Jagdalpur', '19.09 N', '82.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(270, 1505, 'Korba', '22.35 N', '82.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(271, 1505, 'Raigarh', '21.90 N', '83.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(272, 1505, 'Raipur', '21.24 N', '81.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(273, 1505, 'Rajnandgaon', '21.10 N', '81.04 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1),
(274, 1505, 'Bhalswa Jahangirpur', '28.74 N', '77.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(275, 1505, 'Burari', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(276, 1505, 'Chilla Saroda Bangar', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(277, 1505, 'Dallo Pura', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(278, 1505, 'Delhi', '28.67 N', '77.21 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(279, 1505, 'Deoli', '28.49 N', '77.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(280, 1505, 'Dilli Cantonment', '28.57 N', '77.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(281, 1505, 'Gharoli', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(282, 1505, 'Gokalpur', '28.71 N', '77.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(283, 1505, 'Hastsal', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(284, 1505, 'Jaffrabad', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(285, 1505, 'Karawal Nagar', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(286, 1505, 'Khajuri Khas', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(287, 1505, 'Kirari Suleman Nagar', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(288, 1505, 'Mandoli', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(289, 1505, 'Mithe Pur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(290, 1505, 'Molarband', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(291, 1505, 'Mundka', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(292, 1505, 'Mustafabad', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(293, 1505, 'Nangloi Jat', '28.68 N', '77.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(294, 1505, 'Ni Dilli', '28.60 N', '77.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(295, 1505, 'Pul Pehlad', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(296, 1505, 'Puth Kalan', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(297, 1505, 'Roshan Pura', '28.60 N', '76.99 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(298, 1505, 'Sadat Pur Gujran', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(299, 1505, 'Sultanpur Majra', '28.76 N', '77.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(300, 1505, 'Tajpul', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(301, 1505, 'Tigri', '28.50 N', '77.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(302, 1505, 'Ziauddin Pur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1),
(303, 1505, 'Madgaon', '15.28 N', '73.94 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1),
(304, 1505, 'Mormugao', '15.42 N', '73.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1),
(305, 1505, 'Panaji', '15.50 N', '73.81 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1),
(306, 1505, 'Ahmadabad', '23.03 N', '72.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(307, 1505, 'Amreli', '21.61 N', '71.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(308, 1505, 'Anand', '22.56 N', '72.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(309, 1505, 'Anjar', '23.12 N', '70.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(310, 1505, 'Bardoli', '21.12 N', '73.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(311, 1505, 'Bharuch', '21.71 N', '72.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(312, 1505, 'Bhavnagar', '21.79 N', '72.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(313, 1505, 'Bhuj', '23.26 N', '69.66 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(314, 1505, 'Borsad', '22.42 N', '72.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(315, 1505, 'Botad', '22.18 N', '71.66 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(316, 1505, 'Chandkheda', '23.15 N', '72.61 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(317, 1505, 'Chandlodiya', '23.10 N', '72.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(318, 1505, 'Dabhoi', '22.13 N', '73.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(319, 1505, 'Dahod', '22.84 N', '74.25 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(320, 1505, 'Dholka', '22.74 N', '72.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(321, 1505, 'Dhoraji', '21.74 N', '70.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(322, 1505, 'Dhrangadhra', '23.00 N', '71.46 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(323, 1505, 'Disa', '24.26 N', '72.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(324, 1505, 'Gandhidham', '23.07 N', '70.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(325, 1505, 'Gandhinagar', '23.30 N', '72.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(326, 1505, 'Ghatlodiya', '23.05 N', '72.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(327, 1505, 'Godhra', '22.77 N', '73.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(328, 1505, 'Gondal', '21.97 N', '70.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(329, 1505, 'Himatnagar', '23.60 N', '72.96 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(330, 1505, 'Jamnagar', '22.47 N', '70.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(331, 1505, 'Jamnagar', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(332, 1505, 'Jetpur', '21.75 N', '70.61 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(333, 1505, 'Junagadh', '21.52 N', '70.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(334, 1505, 'Kalol', '23.25 N', '72.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(335, 1505, 'Keshod', '21.31 N', '70.23 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(336, 1505, 'Khambhat', '22.32 N', '72.61 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(337, 1505, 'Kundla', '21.35 N', '71.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(338, 1505, 'Mahuva', '21.10 N', '71.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(339, 1505, 'Mangrol', '21.12 N', '70.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(340, 1505, 'Modasa', '23.47 N', '73.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(341, 1505, 'Morvi', '22.82 N', '70.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(342, 1505, 'Nadiad', '22.70 N', '72.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(343, 1505, 'Navagam Ghed', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(344, 1505, 'Navsari', '20.96 N', '72.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(345, 1505, 'Palitana', '21.52 N', '71.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(346, 1505, 'Patan', '23.86 N', '72.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(347, 1505, 'Porbandar', '21.65 N', '69.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(348, 1505, 'Puna', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(349, 1505, 'Rajkot', '22.31 N', '70.79 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(350, 1505, 'Ramod', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(351, 1505, 'Ranip', '23.03 N', '72.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(352, 1505, 'Siddhapur', '23.92 N', '72.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(353, 1505, 'Sihor', '21.70 N', '71.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(354, 1505, 'Surat', '21.20 N', '72.82 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(355, 1505, 'Surendranagar', '22.71 N', '71.67 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(356, 1505, 'Thaltej', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(357, 1505, 'Una', '20.82 N', '71.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(358, 1505, 'Unjha', '23.81 N', '72.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(359, 1505, 'Upleta', '21.75 N', '70.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(360, 1505, 'Vadodara', '22.31 N', '73.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(361, 1505, 'Valsad', '20.62 N', '72.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(362, 1505, 'Vapi', '20.37 N', '72.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(363, 1505, 'Vastral', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(364, 1505, 'Vejalpur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(365, 1505, 'Veraval', '20.92 N', '70.34 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(366, 1505, 'Vijalpor', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(367, 1505, 'Visnagar', '23.71 N', '72.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(368, 1505, 'Wadhwan', '22.73 N', '71.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1),
(369, 1505, 'Ambala', '30.38 N', '76.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(370, 1505, 'Ambala Cantonment', '30.39 N', '76.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(371, 1505, 'Ambala Sadar', '30.35 N', '76.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(372, 1505, 'Bahadurgarh', '28.69 N', '76.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(373, 1505, 'Bhiwani', '28.81 N', '76.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(374, 1505, 'Charkhi Dadri', '28.60 N', '76.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(375, 1505, 'Dabwali', '29.95 N', '74.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(376, 1505, 'Faridabad', '28.38 N', '77.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(377, 1505, 'Gohana', '29.13 N', '76.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(378, 1505, 'Hisar', '29.17 N', '75.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(379, 1505, 'Jagadhri', '30.18 N', '77.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(380, 1505, 'Jind', '29.31 N', '76.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(381, 1505, 'Kaithal', '29.81 N', '76.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(382, 1505, 'Karnal', '29.69 N', '76.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(383, 1505, 'Narnaul', '28.04 N', '76.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(384, 1505, 'Narwana', '29.62 N', '76.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(385, 1505, 'Palwal', '28.15 N', '77.32 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(386, 1505, 'Panchkula', '30.70 N', '76.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(387, 1505, 'Panipat', '29.39 N', '76.96 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(388, 1505, 'Rewari', '28.19 N', '76.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(389, 1505, 'Rohtak', '28.90 N', '76.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(390, 1505, 'Sirsa', '29.53 N', '75.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(391, 1505, 'Sonipat', '28.99 N', '77.01 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(392, 1505, 'Thanesar', '29.98 N', '76.82 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(393, 1505, 'Tohana', '29.70 N', '75.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(394, 1505, 'Yamunanagar', '30.14 N', '77.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1),
(395, 1505, 'Shimla', '31.11 N', '77.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1),
(396, 1505, 'Anantnag', '33.73 N', '75.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(397, 1505, 'Baramula', '34.20 N', '74.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(398, 1505, 'Bari Brahmana', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(399, 1505, 'Jammu', '32.71 N', '74.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(400, 1505, 'Kathua', '32.37 N', '75.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(401, 1505, 'Sopur', '34.30 N', '74.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(402, 1505, 'Srinagar', '34.09 N', '74.79 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(403, 1505, 'Udhampur', '32.93 N', '75.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(404, 1505, 'Adityapur', '22.80 N', '86.04 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(405, 1505, 'Bagbahra', '22.82 N', '86.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(406, 1505, 'Bhuli', '23.79 N', '86.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(407, 1505, 'Bokaro', '23.78 N', '85.96 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(408, 1505, 'Chaibasa', '22.56 N', '85.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(409, 1505, 'Chas', '23.65 N', '86.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(410, 1505, 'Daltenganj', '24.05 N', '84.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(411, 1505, 'Devghar', '24.49 N', '86.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(412, 1505, 'Dhanbad', '23.80 N', '86.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(413, 1505, 'Hazaribag', '24.01 N', '85.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(414, 1505, 'Jamshedpur', '22.79 N', '86.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(415, 1505, 'Jharia', '23.76 N', '86.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(416, 1505, 'Jhumri Tilaiya', '24.43 N', '85.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(417, 1505, 'Jorapokhar', '23.79 N', '86.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(418, 1505, 'Katras', '23.80 N', '86.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(419, 1505, 'Lohardaga', '23.43 N', '84.68 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(420, 1505, 'Mango', '22.85 N', '86.21 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(421, 1505, 'Phusro', '23.68 N', '85.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(422, 1505, 'Ramgarh', '23.63 N', '85.51 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(423, 1505, 'Ranchi', '23.36 N', '85.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(424, 1505, 'Sahibganj', '25.25 N', '87.62 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(425, 1505, 'Saunda', '23.64 N', '85.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(426, 1505, 'Sindari', '23.68 N', '86.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 1),
(427, 1505, 'Bagalkot', '16.19 N', '75.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(428, 1505, 'Bangalore', '12.97 N', '77.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(429, 1505, 'Basavakalyan', '17.87 N', '76.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(430, 1505, 'Belgaum', '15.86 N', '74.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(431, 1505, 'Bellary', '15.14 N', '76.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(432, 1505, 'Bhadravati', '13.84 N', '75.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(433, 1505, 'Bidar', '17.92 N', '77.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(434, 1505, 'Bijapur', '16.83 N', '75.71 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(435, 1505, 'Bommanahalli', '13.01 N', '77.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(436, 1505, 'Byatarayanapura', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(437, 1505, 'Challakere', '14.32 N', '76.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(438, 1505, 'Chamrajnagar', '11.92 N', '76.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(439, 1505, 'Channapatna', '12.66 N', '77.19 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(440, 1505, 'Chik Ballapur', '13.47 N', '77.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(441, 1505, 'Chikmagalur', '13.32 N', '75.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(442, 1505, 'Chintamani', '13.40 N', '78.05 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(443, 1505, 'Chitradurga', '14.23 N', '76.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(444, 1505, 'Dasarahalli', '13.01 N', '77.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(445, 1505, 'Davanagere', '14.46 N', '75.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(446, 1505, 'Dod Ballapur', '13.30 N', '77.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(447, 1505, 'Gadag', '15.44 N', '75.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(448, 1505, 'Gangawati', '15.44 N', '76.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(449, 1505, 'Gokak', '16.18 N', '74.81 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(450, 1505, 'Gulbarga', '17.34 N', '76.82 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(451, 1505, 'Harihar', '14.52 N', '75.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(452, 1505, 'Hassan', '13.01 N', '76.08 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(453, 1505, 'Haveri', '14.80 N', '75.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(454, 1505, 'Hiriyur', '13.97 N', '76.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(455, 1505, 'Hosakote', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(456, 1505, 'Hospet', '15.28 N', '76.37 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(457, 1505, 'Hubli', '15.36 N', '75.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(458, 1505, 'Ilkal', '15.97 N', '76.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(459, 1505, 'Jamkhandi', '16.51 N', '75.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(460, 1505, 'Kanakapura', '12.54 N', '77.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(461, 1505, 'Karwar', '14.82 N', '74.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(462, 1505, 'Kolar', '13.14 N', '78.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(463, 1505, 'Kollegal', '12.15 N', '77.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(464, 1505, 'Koppal', '15.35 N', '76.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(465, 1505, 'Krishnarajapura', '12.97 N', '77.74 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(466, 1505, 'Mahadevapura', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(467, 1505, 'Maisuru', '12.31 N', '76.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(468, 1505, 'Mandya', '12.54 N', '76.89 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(469, 1505, 'Mangaluru', '12.88 N', '74.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(470, 1505, 'Nipani', '16.41 N', '74.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(471, 1505, 'Pattanagere', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(472, 1505, 'Puttur', '12.77 N', '75.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(473, 1505, 'Rabkavi', '16.47 N', '75.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(474, 1505, 'Raichur', '16.21 N', '77.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(475, 1505, 'Ramanagaram', '12.72 N', '77.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(476, 1505, 'Ranibennur', '14.62 N', '75.61 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(477, 1505, 'Robertsonpet', '12.97 N', '78.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(478, 1505, 'Sagar', '14.17 N', '75.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(479, 1505, 'Shahabad', '17.13 N', '76.93 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(480, 1505, 'Shahpur', '16.70 N', '76.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(481, 1505, 'Shimoga', '13.93 N', '75.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(482, 1505, 'Shorapur', '16.52 N', '76.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(483, 1505, 'Sidlaghatta', '13.38 N', '77.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(484, 1505, 'Sira', '13.75 N', '76.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(485, 1505, 'Sirsi', '14.62 N', '74.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(486, 1505, 'Tiptur', '13.27 N', '76.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(487, 1505, 'Tumkur', '13.34 N', '77.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(488, 1505, 'Udupi', '13.35 N', '74.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(489, 1505, 'Ullal', '12.80 N', '74.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(490, 1505, 'Yadgir', '16.77 N', '77.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(491, 1505, 'Yelahanka', '13.10 N', '77.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 1),
(492, 1505, 'Alappuzha', '9.50 N', '76.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(493, 1505, 'Beypur', '11.18 N', '75.82 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(494, 1505, 'Cheruvannur', '11.21 N', '75.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(495, 1505, 'Edakkara', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(496, 1505, 'Edathala', '10.03 N', '76.32 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(497, 1505, 'Kalamassery', '10.05 N', '76.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(498, 1505, 'Kannan Devan Hills', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(499, 1505, 'Kannangad', '12.34 N', '75.09 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(500, 1505, 'Kannur', '11.86 N', '75.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(501, 1505, 'Kayankulam', '9.17 N', '76.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(502, 1505, 'Kochi', '10.02 N', '76.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(503, 1505, 'Kollam', '8.89 N', '76.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(504, 1505, 'Kottayam', '9.60 N', '76.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(505, 1505, 'Koyilandi', '11.43 N', '75.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1);
INSERT INTO `StateCity` (`CityId`, `ZoneId`, `CityName`, `CityLatitude`, `CityLongitude`, `TotalPopulation`, `MalePopulation`, `FemalePopulation`, `Above18_30Population`, `Above31_50Population`, `Above51_60Population`, `Above60Population`, `TotalArea`, `StateId`, `CityStatus`) VALUES
(506, 1505, 'Kozhikkod', '11.26 N', '75.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(507, 1505, 'Kunnamkulam', '10.65 N', '76.08 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(508, 1505, 'Malappuram', '11.07 N', '76.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(509, 1505, 'Manjeri', '11.12 N', '76.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(510, 1505, 'Nedumangad', '8.61 N', '77.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(511, 1505, 'Neyyattinkara', '8.40 N', '77.08 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(512, 1505, 'Palakkad', '10.78 N', '76.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(513, 1505, 'Pallichal', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(514, 1505, 'Payyannur', '12.10 N', '75.19 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(515, 1505, 'Ponnani', '10.78 N', '75.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(516, 1505, 'Talipparamba', '12.03 N', '75.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(517, 1505, 'Thalassery', '11.75 N', '75.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(518, 1505, 'Thiruvananthapuram', '8.51 N', '76.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(519, 1505, 'Thrippunithura', '9.94 N', '76.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(520, 1505, 'Thrissur', '10.52 N', '76.21 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(521, 1505, 'Tirur', '10.91 N', '75.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(522, 1505, 'Tiruvalla', '9.39 N', '76.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(523, 1505, 'Vadakara', '11.61 N', '75.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1),
(524, 1505, 'Ashoknagar', '24.57 N', '77.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(525, 1505, 'Balaghat', '21.80 N', '80.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(526, 1505, 'Basoda', '23.85 N', '77.93 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(527, 1505, 'Betul', '21.92 N', '77.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(528, 1505, 'Bhind', '26.57 N', '78.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(529, 1505, 'Bhopal', '23.24 N', '77.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(530, 1505, 'BinaEtawa', '24.20 N', '78.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(531, 1505, 'Burhanpur', '21.33 N', '76.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(532, 1505, 'Chhatarpur', '24.92 N', '79.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(533, 1505, 'Chhindwara', '22.07 N', '78.94 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(534, 1505, 'Dabra', '25.90 N', '78.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(535, 1505, 'Damoh', '23.85 N', '79.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(536, 1505, 'Datia', '25.67 N', '78.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(537, 1505, 'Dewas', '22.97 N', '76.05 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(538, 1505, 'Dhar', '22.60 N', '75.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(539, 1505, 'Gohad', '26.43 N', '78.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(540, 1505, 'Guna', '24.65 N', '77.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(541, 1505, 'Gwalior', '26.23 N', '78.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(542, 1505, 'Harda', '22.33 N', '77.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(543, 1505, 'Hoshangabad', '22.75 N', '77.71 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(544, 1505, 'Indore', '22.72 N', '75.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(545, 1505, 'Itarsi', '22.62 N', '77.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(546, 1505, 'Jabalpur', '23.17 N', '79.94 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(547, 1505, 'Jabalpur Cantonment', '23.16 N', '79.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(548, 1505, 'Jaora', '23.64 N', '75.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(549, 1505, 'Khandwa', '21.83 N', '76.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(550, 1505, 'Khargone', '21.83 N', '75.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(551, 1505, 'Mandidip', '23.10 N', '77.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(552, 1505, 'Mandsaur', '24.07 N', '75.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(553, 1505, 'Mau', '22.56 N', '75.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(554, 1505, 'Morena', '26.51 N', '77.99 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(555, 1505, 'Murwara', '23.85 N', '80.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(556, 1505, 'Nagda', '23.46 N', '75.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(557, 1505, 'Nimach', '24.47 N', '74.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(558, 1505, 'Pithampur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(559, 1505, 'Raghogarh', '24.45 N', '77.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(560, 1505, 'Ratlam', '23.35 N', '75.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(561, 1505, 'Rewa', '24.53 N', '81.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(562, 1505, 'Sagar', '23.85 N', '78.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(563, 1505, 'Sarni', '22.04 N', '78.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(564, 1505, 'Satna', '24.58 N', '80.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(565, 1505, 'Sehore', '23.20 N', '77.08 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(566, 1505, 'Sendhwa', '21.68 N', '75.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(567, 1505, 'Seoni', '22.10 N', '79.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(568, 1505, 'Shahdol', '23.30 N', '81.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(569, 1505, 'Shajapur', '23.43 N', '76.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(570, 1505, 'Sheopur', '25.67 N', '76.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(571, 1505, 'Shivapuri', '25.43 N', '77.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(572, 1505, 'Sidhi', '24.42 N', '81.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(573, 1505, 'Singrauli', '23.84 N', '82.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(574, 1505, 'Tikamgarh', '24.74 N', '78.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(575, 1505, 'Ujjain', '23.19 N', '75.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(576, 1505, 'Vidisha', '23.53 N', '77.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(577, 1505, 'Achalpur', '21.26 N', '77.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(578, 1505, 'Ahmadnagar', '19.10 N', '74.74 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(579, 1505, 'Akola', '20.71 N', '77.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(580, 1505, 'Akot', '21.10 N', '77.05 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(581, 1505, 'Amalner', '21.05 N', '75.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(582, 1505, 'Ambajogai', '18.73 N', '76.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(583, 1505, 'Amravati', '20.95 N', '77.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(584, 1505, 'Anjangaon', '21.16 N', '77.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(585, 1505, 'Aurangabad', '19.89 N', '75.32 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(586, 1505, 'Badlapur', '19.15 N', '73.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(587, 1505, 'Ballarpur', '19.85 N', '79.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(588, 1505, 'Baramati', '18.15 N', '74.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(589, 1505, 'Barsi', '18.24 N', '75.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(590, 1505, 'Basmat', '19.32 N', '77.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(591, 1505, 'Bhadravati', '20.11 N', '79.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(592, 1505, 'Bhandara', '21.18 N', '79.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(593, 1505, 'Bhiwandi', '19.30 N', '73.05 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(594, 1505, 'Bhusawal', '21.05 N', '75.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(595, 1505, 'Bid', '18.99 N', '75.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(596, 1505, 'Mumbai', '18.96 N', '72.82 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(597, 1505, 'Buldana', '20.54 N', '76.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(598, 1505, 'Chalisgaon', '20.46 N', '74.99 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(599, 1505, 'Chandrapur', '19.96 N', '79.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(600, 1505, 'Chikhli', '20.35 N', '76.25 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(601, 1505, 'Chiplun', '17.53 N', '73.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(602, 1505, 'Chopda', '21.25 N', '75.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(603, 1505, 'Dahanu', '19.97 N', '72.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(604, 1505, 'Deolali', '19.95 N', '73.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(605, 1505, 'Dhule', '20.90 N', '74.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(606, 1505, 'Digdoh', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(607, 1505, 'Diglur', '18.55 N', '77.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(608, 1505, 'Gadchiroli', '20.17 N', '80.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(609, 1505, 'Gondiya', '21.47 N', '80.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(610, 1505, 'Hinganghat', '20.56 N', '78.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(611, 1505, 'Hingoli', '19.72 N', '77.14 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(612, 1505, 'Ichalkaranji', '16.69 N', '74.46 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(613, 1505, 'Jalgaon', '21.01 N', '75.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(614, 1505, 'Jalna', '19.85 N', '75.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(615, 1505, 'Kalyan', '19.25 N', '73.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(616, 1505, 'Kamthi', '21.23 N', '79.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(617, 1505, 'Karanja', '20.48 N', '77.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(618, 1505, 'Khadki', '18.57 N', '73.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(619, 1505, 'Khamgaon', '20.70 N', '76.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(620, 1505, 'Khopoli', '18.78 N', '73.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(621, 1505, 'Kolhapur', '16.70 N', '74.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(622, 1505, 'Kopargaon', '19.88 N', '74.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(623, 1505, 'Latur', '18.41 N', '76.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(624, 1505, 'Lonavale', '18.75 N', '73.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(625, 1505, 'Malegaon', '20.56 N', '74.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(626, 1505, 'Malkapur', '20.90 N', '76.19 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(627, 1505, 'Manmad', '20.26 N', '74.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(628, 1505, 'Mira Bhayandar', '19.29 N', '72.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(629, 1505, 'Nagpur', '21.16 N', '79.08 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(630, 1505, 'Nalasopara', '19.43 N', '72.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(631, 1505, 'Nanded', '19.17 N', '77.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(632, 1505, 'Nandurbar', '21.38 N', '74.23 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(633, 1505, 'Nashik', '20.01 N', '73.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(634, 1505, 'Navghar', '19.34 N', '72.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(635, 1505, 'Navi Mumbai', '19.11 N', '73.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(636, 1505, 'Navi Mumbai', '19.00 N', '73.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(637, 1505, 'Osmanabad', '18.17 N', '76.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(638, 1505, 'Palghar', '19.68 N', '72.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(639, 1505, 'Pandharpur', '17.68 N', '75.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(640, 1505, 'Parbhani', '19.27 N', '76.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(641, 1505, 'Phaltan', '17.98 N', '74.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(642, 1505, 'Pimpri', '18.62 N', '73.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(643, 1505, 'Pune', '18.53 N', '73.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(644, 1505, 'Pune Cantonment', '18.50 N', '73.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(645, 1505, 'Pusad', '19.91 N', '77.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(646, 1505, 'Ratnagiri', '17.00 N', '73.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(647, 1505, 'SangliMiraj', '16.86 N', '74.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(648, 1505, 'Satara', '17.70 N', '74.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(649, 1505, 'Shahada', '21.55 N', '74.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(650, 1505, 'Shegaon', '20.78 N', '76.68 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(651, 1505, 'Shirpur', '21.35 N', '74.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(652, 1505, 'Sholapur', '17.67 N', '75.89 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(653, 1505, 'Shrirampur', '19.63 N', '74.64 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(654, 1505, 'Sillod', '20.30 N', '75.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(655, 1505, 'Thana', '19.20 N', '72.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(656, 1505, 'Udgir', '18.40 N', '77.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(657, 1505, 'Ulhasnagar', '19.23 N', '73.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(658, 1505, 'Uran Islampur', '17.05 N', '74.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(659, 1505, 'Vasai', '19.36 N', '72.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(660, 1505, 'Virar', '19.47 N', '72.79 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(661, 1505, 'Wadi', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(662, 1505, 'Wani', '20.07 N', '78.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(663, 1505, 'Wardha', '20.75 N', '78.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(664, 1505, 'Warud', '21.47 N', '78.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(665, 1505, 'Washim', '20.10 N', '77.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(666, 1505, 'Yavatmal', '20.41 N', '78.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 1),
(667, 1505, 'Imphal', '24.79 N', '93.94 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 1),
(668, 1505, 'Shillong', '25.57 N', '91.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 1),
(669, 1505, 'Tura', '25.52 N', '90.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 1),
(670, 1505, 'Aizawl', '23.71 N', '92.71 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, 1),
(671, 1505, 'Lunglei', '22.88 N', '92.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, 1),
(672, 1505, 'Dimapur', '25.92 N', '93.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 1),
(673, 1505, 'Kohima', '25.67 N', '94.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 1),
(674, 1505, 'Wokha', '26.10 N', '94.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 1),
(675, 1505, 'Balangir', '20.71 N', '83.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(676, 1505, 'Baleshwar', '21.49 N', '86.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(677, 1505, 'Barbil', '22.12 N', '85.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(678, 1505, 'Bargarh', '21.34 N', '83.61 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(679, 1505, 'Baripada', '21.95 N', '86.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(680, 1505, 'Bhadrak', '21.06 N', '86.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(681, 1505, 'Bhawanipatna', '19.91 N', '83.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(682, 1505, 'Bhubaneswar', '20.27 N', '85.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(683, 1505, 'Brahmapur', '19.32 N', '84.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(684, 1505, 'Brajrajnagar', '21.82 N', '83.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(685, 1505, 'Dhenkanal', '20.67 N', '85.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(686, 1505, 'Jaypur', '18.86 N', '82.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(687, 1505, 'Jharsuguda', '21.87 N', '84.01 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(688, 1505, 'Kataka', '20.47 N', '85.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(689, 1505, 'Kendujhar', '21.63 N', '85.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(690, 1505, 'Paradwip', '20.32 N', '86.62 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(691, 1505, 'Puri', '19.81 N', '85.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(692, 1505, 'Raurkela', '22.24 N', '84.81 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(693, 1505, 'Raurkela Industrial Township', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(694, 1505, 'Rayagada', '19.18 N', '83.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(695, 1505, 'Sambalpur', '21.47 N', '83.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(696, 1505, 'Sunabeda', '18.69 N', '82.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 1),
(697, 1505, 'Karaikal', '10.93 N', '79.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 1),
(698, 1505, 'Ozhukarai', '11.94 N', '79.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 1),
(699, 1505, 'Pondicherry', '11.94 N', '79.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 1),
(700, 1505, 'Abohar', '30.14 N', '74.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(701, 1505, 'Amritsar', '31.64 N', '74.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(702, 1505, 'Barnala', '30.39 N', '75.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(703, 1505, 'Batala', '31.82 N', '75.21 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(704, 1505, 'Bathinda', '30.17 N', '74.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(705, 1505, 'Dhuri', '30.37 N', '75.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(706, 1505, 'Faridkot', '30.68 N', '74.74 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(707, 1505, 'Fazilka', '30.41 N', '74.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(708, 1505, 'Firozpur', '30.92 N', '74.61 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(709, 1505, 'Firozpur Cantonment', '30.95 N', '74.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(710, 1505, 'Gobindgarh', '30.66 N', '76.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(711, 1505, 'Gurdaspur', '32.04 N', '75.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(712, 1505, 'Hoshiarpur', '31.53 N', '75.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(713, 1505, 'Jagraon', '30.78 N', '75.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(714, 1505, 'Jalandhar', '31.33 N', '75.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(715, 1505, 'Kapurthala', '31.38 N', '75.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(716, 1505, 'Khanna', '30.71 N', '76.21 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(717, 1505, 'Kot Kapura', '30.59 N', '74.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(718, 1505, 'Ludhiana', '30.91 N', '75.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(719, 1505, 'Malaut', '30.23 N', '74.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(720, 1505, 'Maler Kotla', '30.54 N', '75.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(721, 1505, 'Mansa', '29.98 N', '75.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(722, 1505, 'Moga', '30.82 N', '75.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(723, 1505, 'Mohali', '30.78 N', '76.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(724, 1505, 'Pathankot', '32.27 N', '75.64 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(725, 1505, 'Patiala', '30.32 N', '76.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(726, 1505, 'Phagwara', '31.22 N', '75.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(727, 1505, 'Rajpura', '30.48 N', '76.59 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(728, 1505, 'Rupnagar', '30.98 N', '76.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(729, 1505, 'Samana', '30.15 N', '76.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(730, 1505, 'Sangrur', '30.25 N', '75.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(731, 1505, 'Sirhind', '30.65 N', '76.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(732, 1505, 'Sunam', '30.13 N', '75.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(733, 1505, 'Tarn Taran', '31.45 N', '74.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1),
(734, 1505, 'Ajmer', '26.45 N', '74.64 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(735, 1505, 'Alwar', '27.56 N', '76.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(736, 1505, 'Balotra', '25.83 N', '72.23 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(737, 1505, 'Banswara', '23.54 N', '74.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(738, 1505, 'Baran', '25.10 N', '76.51 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(739, 1505, 'Bari', '26.65 N', '77.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(740, 1505, 'Barmer', '25.75 N', '71.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(741, 1505, 'Beawar', '26.10 N', '74.30 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(742, 1505, 'Bharatpur', '27.23 N', '77.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(743, 1505, 'Bhilwara', '25.35 N', '74.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(744, 1505, 'Bhiwadi', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(745, 1505, 'Bikaner', '28.03 N', '73.32 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(746, 1505, 'Bundi', '25.45 N', '75.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(747, 1505, 'Chittaurgarh', '24.89 N', '74.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(748, 1505, 'Chomun', '27.17 N', '75.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(749, 1505, 'Churu', '28.31 N', '74.96 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(750, 1505, 'Daosa', '26.88 N', '76.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(751, 1505, 'Dhaulpur', '26.70 N', '77.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(752, 1505, 'Didwana', '27.39 N', '74.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(753, 1505, 'Fatehpur', '27.99 N', '74.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(754, 1505, 'Ganganagar', '29.93 N', '73.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(755, 1505, 'Gangapur', '26.47 N', '76.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(756, 1505, 'Hanumangarh', '29.62 N', '74.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(757, 1505, 'Hindaun', '26.74 N', '77.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(758, 1505, 'Jaipur', '26.92 N', '75.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(759, 1505, 'Jaisalmer', '26.92 N', '70.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(760, 1505, 'Jalor', '25.35 N', '72.62 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(761, 1505, 'Jhalawar', '24.60 N', '76.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(762, 1505, 'Jhunjhunun', '28.13 N', '75.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(763, 1505, 'Jodhpur', '26.29 N', '73.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(764, 1505, 'Karauli', '26.50 N', '77.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(765, 1505, 'Kishangarh', '26.58 N', '74.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(766, 1505, 'Kota', '25.18 N', '75.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(767, 1505, 'Kuchaman', '27.15 N', '74.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(768, 1505, 'Ladnun', '27.64 N', '74.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(769, 1505, 'Makrana', '27.05 N', '74.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(770, 1505, 'Nagaur', '27.21 N', '73.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(771, 1505, 'Nawalgarh', '27.85 N', '75.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(772, 1505, 'Nimbahera', '24.62 N', '74.68 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(773, 1505, 'Nokha', '27.60 N', '73.42 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(774, 1505, 'Pali', '25.79 N', '73.32 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(775, 1505, 'Rajsamand', '25.07 N', '73.88 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(776, 1505, 'Ratangarh', '28.09 N', '74.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(777, 1505, 'Sardarshahr', '28.45 N', '74.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(778, 1505, 'Sawai Madhopur', '26.03 N', '76.34 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(779, 1505, 'Sikar', '27.61 N', '75.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(780, 1505, 'Sujangarh', '27.70 N', '74.46 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(781, 1505, 'Suratgarh', '29.32 N', '73.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(782, 1505, 'Tonk', '26.17 N', '75.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(783, 1505, 'Udaipur', '24.58 N', '73.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1),
(784, 1505, 'Alandur', '13.03 N', '80.23 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(785, 1505, 'Ambattur', '13.11 N', '80.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(786, 1505, 'Ambur', '12.80 N', '78.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(787, 1505, 'Arakonam', '13.08 N', '79.67 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(788, 1505, 'Arani', '12.68 N', '79.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(789, 1505, 'Aruppukkottai', '9.51 N', '78.09 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(790, 1505, 'Attur', '11.60 N', '78.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(791, 1505, 'Avadi', '13.12 N', '80.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(792, 1505, 'Avaniapuram', '9.86 N', '78.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(793, 1505, 'Bodinayakkanur', '10.01 N', '77.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(794, 1505, 'Chengalpattu', '12.70 N', '79.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(795, 1505, 'Dharapuram', '10.74 N', '77.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(796, 1505, 'Dharmapuri', '12.13 N', '78.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(797, 1505, 'Dindigul', '10.36 N', '77.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(798, 1505, 'Erode', '11.35 N', '77.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(799, 1505, 'Gopichettipalaiyam', '11.46 N', '77.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(800, 1505, 'Gudalur', '11.76 N', '79.75 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(801, 1505, 'Gudiyattam', '12.95 N', '78.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(802, 1505, 'Hosur', '12.72 N', '77.82 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(803, 1505, 'Idappadi', '11.58 N', '77.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(804, 1505, 'Kadayanallur', '9.08 N', '77.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(805, 1505, 'Kambam', '9.74 N', '77.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(806, 1505, 'Kanchipuram', '12.84 N', '79.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(807, 1505, 'Karur', '10.96 N', '78.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(808, 1505, 'Kavundampalaiyam', '11.05 N', '76.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(809, 1505, 'Kovilpatti', '9.19 N', '77.86 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(810, 1505, 'Koyampattur', '11.01 N', '76.96 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(811, 1505, 'Krishnagiri', '12.54 N', '78.21 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(812, 1505, 'Kumarapalaiyam', '11.44 N', '77.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(813, 1505, 'Kumbakonam', '10.97 N', '79.38 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(814, 1505, 'Kuniyamuthur', '10.98 N', '76.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(815, 1505, 'Kurichi', '10.92 N', '76.96 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(816, 1505, 'Madhavaram', '13.02 N', '80.26 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(817, 1505, 'Madras', '13.09 N', '80.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(818, 1505, 'Madurai', '9.92 N', '78.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(819, 1505, 'Maduravoyal', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(820, 1505, 'Mannargudi', '10.67 N', '79.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(821, 1505, 'Mayiladuthurai', '11.11 N', '79.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(822, 1505, 'Mettupalayam', '11.30 N', '76.94 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(823, 1505, 'Mettur', '11.80 N', '77.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(824, 1505, 'Nagapattinam', '10.80 N', '79.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(825, 1505, 'Nagercoil', '8.18 N', '77.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(826, 1505, 'Namakkal', '11.23 N', '78.17 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(827, 1505, 'Nerkunram', '13.04 N', '80.26 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(828, 1505, 'Neyveli', '11.62 N', '79.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(829, 1505, 'Pallavaram', '12.99 N', '80.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(830, 1505, 'Pammal', '12.97 N', '80.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(831, 1505, 'Pannuratti', '11.78 N', '79.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(832, 1505, 'Paramakkudi', '9.54 N', '78.59 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(833, 1505, 'Pattukkottai', '10.43 N', '79.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(834, 1505, 'Pollachi', '10.67 N', '77.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(835, 1505, 'Pudukkottai', '10.39 N', '78.82 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(836, 1505, 'Puliyankudi', '9.18 N', '77.40 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(837, 1505, 'Punamalli', '13.05 N', '80.11 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(838, 1505, 'Rajapalaiyam', '9.46 N', '77.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(839, 1505, 'Ramanathapuram', '9.37 N', '78.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(840, 1505, 'Salem', '11.67 N', '78.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(841, 1505, 'Sankarankoil', '9.17 N', '77.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(842, 1505, 'Sivakasi', '9.46 N', '77.79 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(843, 1505, 'Srivilliputtur', '9.52 N', '77.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(844, 1505, 'Tambaram', '12.93 N', '80.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(845, 1505, 'Tenkasi', '8.96 N', '77.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(846, 1505, 'Thanjavur', '10.79 N', '79.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(847, 1505, 'Theni Allinagaram', '10.02 N', '77.48 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(848, 1505, 'Thiruthangal', '9.48 N', '77.83 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(849, 1505, 'Thiruvarur', '10.78 N', '79.64 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(850, 1505, 'Thuthukkudi', '8.81 N', '78.14 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(851, 1505, 'Tindivanam', '12.24 N', '79.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(852, 1505, 'Tiruchchirappalli', '10.81 N', '78.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(853, 1505, 'Tiruchengode', '11.38 N', '77.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(854, 1505, 'Tirunelveli', '8.73 N', '77.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(855, 1505, 'Tirupathur', '12.50 N', '78.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(856, 1505, 'Tiruppur', '11.09 N', '77.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(857, 1505, 'Tiruvannamalai', '12.24 N', '79.07 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(858, 1505, 'Tiruvottiyur', '13.16 N', '80.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(859, 1505, 'Udagamandalam', '11.42 N', '76.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(860, 1505, 'Udumalaipettai', '10.58 N', '77.24 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(861, 1505, 'Valparai', '10.38 N', '76.99 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(862, 1505, 'Vaniyambadi', '12.69 N', '78.60 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(863, 1505, 'Velampalaiyam', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(864, 1505, 'Velluru', '12.92 N', '79.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(865, 1505, 'Viluppuram', '11.95 N', '79.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(866, 1505, 'Virappanchatram', '11.40 N', '77.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(867, 1505, 'Virudhachalam', '11.51 N', '79.32 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(868, 1505, 'Virudunagar', '9.59 N', '77.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 1),
(869, 1505, 'Agartala', '23.84 N', '91.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 1),
(870, 1505, 'Agartala MCl', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 1),
(871, 1505, 'Badharghat', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 1),
(872, 1505, 'Agra', '27.19 N', '78.01 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(873, 1505, 'Aligarh', '27.89 N', '78.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(874, 1505, 'Allahabad', '25.45 N', '81.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(875, 1505, 'Amroha', '28.91 N', '78.46 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(876, 1505, 'Aonla', '28.28 N', '79.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(877, 1505, 'Auraiya', '26.47 N', '79.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(878, 1505, 'Ayodhya', '26.80 N', '82.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(879, 1505, 'Azamgarh', '26.07 N', '83.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(880, 1505, 'Baheri', '28.78 N', '79.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(881, 1505, 'Bahraich', '27.58 N', '81.59 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(882, 1505, 'Ballia', '25.76 N', '84.15 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(883, 1505, 'Balrampur', '27.43 N', '82.18 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(884, 1505, 'Banda', '25.48 N', '80.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(885, 1505, 'Baraut', '29.10 N', '77.26 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(886, 1505, 'Bareli', '28.36 N', '79.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(887, 1505, 'Basti', '26.80 N', '82.74 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(888, 1505, 'Behta Hajipur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(889, 1505, 'Bela', '25.92 N', '81.99 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(890, 1505, 'Bhadohi', '25.40 N', '82.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(891, 1505, 'Bijnor', '29.38 N', '78.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(892, 1505, 'Bisalpur', '28.30 N', '79.80 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(893, 1505, 'Biswan', '27.50 N', '81.00 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(894, 1505, 'Budaun', '28.04 N', '79.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(895, 1505, 'Bulandshahr', '28.41 N', '77.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(896, 1505, 'Chandausi', '28.46 N', '78.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(897, 1505, 'Chandpur', '29.14 N', '78.27 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(898, 1505, 'Chhibramau', '27.15 N', '79.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(899, 1505, 'Chitrakut Dham', '25.20 N', '80.84 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(900, 1505, 'Dadri', '28.57 N', '77.55 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(901, 1505, 'Deoband', '29.70 N', '77.67 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(902, 1505, 'Deoria', '26.51 N', '83.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(903, 1505, 'Etah', '27.57 N', '78.64 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(904, 1505, 'Etawah', '26.78 N', '79.01 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(905, 1505, 'Faizabad', '26.78 N', '82.14 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(906, 1505, 'Faridpur', '28.22 N', '79.53 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(907, 1505, 'Farrukhabad', '27.40 N', '79.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(908, 1505, 'Fatehpur', '25.93 N', '80.81 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(909, 1505, 'Firozabad', '27.15 N', '78.39 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(910, 1505, 'Gajraula', '28.85 N', '78.23 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(911, 1505, 'Ganga Ghat', '26.52 N', '80.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(912, 1505, 'Gangoh', '29.77 N', '77.25 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(913, 1505, 'Ghaziabad', '28.66 N', '77.41 E', '10000000', '500000', '5000000', '10000', '800000', '600000', '100000', '96656 Sq. Ft.', 30, 1),
(914, 1505, 'Ghazipur', '25.59 N', '83.59 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(915, 1505, 'Gola Gokarannath', '28.08 N', '80.47 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(916, 1505, 'Gonda', '27.14 N', '81.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(917, 1505, 'Gorakhpur', '26.76 N', '83.36 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(918, 1505, 'Hapur', '28.73 N', '77.77 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(919, 1505, 'Hardoi', '27.42 N', '80.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(920, 1505, 'Hasanpur', '28.72 N', '78.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(921, 1505, 'Hathras', '27.60 N', '78.04 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(922, 1505, 'Jahangirabad', '28.42 N', '78.10 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(923, 1505, 'Jalaun', '26.15 N', '79.35 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(924, 1505, 'Jaunpur', '25.76 N', '82.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(925, 1505, 'Jhansi', '25.45 N', '78.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(926, 1505, 'Kadi', '23.31 N', '72.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(927, 1505, 'Kairana', '29.40 N', '77.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(928, 1505, 'Kannauj', '27.06 N', '79.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(929, 1505, 'Kanpur', '26.47 N', '80.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(930, 1505, 'Kanpur Cantonment', '26.50 N', '80.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(931, 1505, 'Kasganj', '27.81 N', '78.63 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(932, 1505, 'Khatauli', '29.28 N', '77.72 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(933, 1505, 'Khora', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(934, 1505, 'Khurja', '28.26 N', '77.85 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(935, 1505, 'Kiratpur', '29.52 N', '78.20 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(936, 1505, 'Kosi Kalan', '27.80 N', '77.44 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(937, 1505, 'Laharpur', '27.72 N', '80.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(938, 1505, 'Lakhimpur', '27.95 N', '80.78 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(939, 1505, 'Lakhnau', '26.85 N', '80.92 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(940, 1505, 'Lakhnau Cantonment', '26.81 N', '80.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(941, 1505, 'Lalitpur', '24.70 N', '78.41 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(942, 1505, 'Loni', '28.75 N', '77.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(943, 1505, 'Mahoba', '25.30 N', '79.87 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(944, 1505, 'Mainpuri', '27.24 N', '79.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(945, 1505, 'Mathura', '27.50 N', '77.68 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(946, 1505, 'Mau', '25.96 N', '83.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(947, 1505, 'Mauranipur', '25.24 N', '79.13 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(948, 1505, 'Mawana', '29.11 N', '77.91 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(949, 1505, 'Mirat', '28.99 N', '77.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(950, 1505, 'Mirat Cantonment', '29.02 N', '77.67 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(951, 1505, 'Mirzapur', '25.16 N', '82.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(952, 1505, 'Modinagar', '28.92 N', '77.62 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(953, 1505, 'Moradabad', '28.84 N', '78.76 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(954, 1505, 'Mubarakpur', '26.09 N', '83.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(955, 1505, 'Mughal Sarai', '25.30 N', '83.12 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(956, 1505, 'Muradnagar', '28.78 N', '77.50 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(957, 1505, 'Muzaffarnagar', '29.48 N', '77.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(958, 1505, 'Nagina', '29.45 N', '78.43 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(959, 1505, 'Najibabad', '29.62 N', '78.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(960, 1505, 'Nawabganj', '26.94 N', '81.19 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(961, 1505, 'Noida', '28.58 N', '77.33 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(962, 1505, 'Obra', '24.42 N', '82.98 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(963, 1505, 'Orai', '25.99 N', '79.45 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(964, 1505, 'Pilibhit', '28.64 N', '79.81 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(965, 1505, 'Pilkhuwa', '28.72 N', '77.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(966, 1505, 'Rae Bareli', '26.23 N', '81.23 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(967, 1505, 'Ramgarh Nagla Kothi', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(968, 1505, 'Rampur', '28.82 N', '79.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(969, 1505, 'Rath', '25.58 N', '79.57 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(970, 1505, 'Renukut', '24.20 N', '83.03 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(971, 1505, 'Saharanpur', '29.97 N', '77.54 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(972, 1505, 'Sahaswan', '28.08 N', '78.74 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(973, 1505, 'Sambhal', '28.59 N', '78.56 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(974, 1505, 'Sandila', '27.08 N', '80.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(975, 1505, 'Shahabad', '27.65 N', '79.95 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(976, 1505, 'Shahjahanpur', '27.88 N', '79.90 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(977, 1505, 'Shamli', '29.46 N', '77.31 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(978, 1505, 'Sherkot', '29.35 N', '78.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(979, 1505, 'Shikohabad', '27.12 N', '78.58 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(980, 1505, 'Sikandarabad', '28.44 N', '77.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(981, 1505, 'Sitapur', '27.57 N', '80.69 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(982, 1505, 'Sukhmalpur Nizamabad', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(983, 1505, 'Sultanpur', '26.26 N', '82.06 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(984, 1505, 'Tanda', '26.55 N', '82.65 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(985, 1505, 'Tilhar', '27.98 N', '79.73 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(986, 1505, 'Tundla', '27.20 N', '78.28 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(987, 1505, 'Ujhani', '28.02 N', '79.02 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(988, 1505, 'Unnao', '26.55 N', '80.49 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(989, 1505, 'Varanasi', '25.32 N', '83.01 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(990, 1505, 'Vrindavan', '27.58 N', '77.70 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1),
(991, 1505, 'Dehra Dun', '30.34 N', '78.05 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(992, 1505, 'Dehra Dun Cantonment', '30.34 N', '77.97 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(993, 1505, 'Gola Range', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(994, 1505, 'Haldwani', '29.23 N', '79.52 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(995, 1505, 'Haridwar', '29.98 N', '78.16 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(996, 1505, 'Kashipur', '29.22 N', '78.96 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(997, 1505, 'Pithoragarh', '29.58 N', '80.22 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(998, 1505, 'Rishikesh', '30.12 N', '78.29 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(999, 1505, 'Rudrapur', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1),
(1000, 1505, 'Rurki', '29.87 N', '77.89 E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Suggestion`
--

CREATE TABLE IF NOT EXISTS `Suggestion` (
  `SuggestionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `SuggestionUniqueId` varchar(100) DEFAULT NULL,
  `ApplicantName` varchar(100) DEFAULT NULL,
  `ApplicantFatherName` varchar(100) DEFAULT NULL,
  `ApplicantGender` varchar(10) DEFAULT NULL,
  `ApplicantMobile` varchar(20) DEFAULT NULL,
  `ApplicantEmail` varchar(100) DEFAULT NULL,
  `ApplicantAadhaarNumber` varchar(100) DEFAULT NULL,
  `ApplicantAddress` varchar(200) DEFAULT NULL,
  `SuggestionSubject` varchar(200) DEFAULT NULL,
  `SuggestionDescription` text,
  `SuggestionStatus` bigint(20) DEFAULT '0',
  `AddedOn` datetime DEFAULT NULL,
  `AddedBy` bigint(20) DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`SuggestionId`),
  KEY `ComplaintStatus` (`SuggestionStatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Suggestion`
--

INSERT INTO `Suggestion` (`SuggestionId`, `SuggestionUniqueId`, `ApplicantName`, `ApplicantFatherName`, `ApplicantGender`, `ApplicantMobile`, `ApplicantEmail`, `ApplicantAadhaarNumber`, `ApplicantAddress`, `SuggestionSubject`, `SuggestionDescription`, `SuggestionStatus`, `AddedOn`, `AddedBy`, `UpdatedOn`, `UpdatedBy`) VALUES
(1, 'S2785618841521806035', 'Rajesh Kumar', 'SP', NULL, NULL, NULL, NULL, NULL, 'Title', 'Description', 1, '2018-03-23 12:53:55', 4, '2018-03-23 12:53:55', NULL),
(2, 'S15435790191521806142', 'Rajesh Kumar Vishwakaram', 'Satya Prakash Vishwakaram', NULL, NULL, NULL, NULL, NULL, 'New Suggestion', 'New Suggestion Description', 1, '2018-03-23 12:55:42', 4, '2018-03-23 12:55:42', NULL),
(3, 'S19971125541521870462', 'Rajesh', 'SP', NULL, NULL, NULL, NULL, NULL, 'Test Suggestion', 'Test Suggestion Description', 1, '2018-03-24 06:47:42', 4, '2018-03-24 06:47:42', NULL),
(4, 'S2347433101522035471', 'Rajesh', 'SP', NULL, NULL, NULL, NULL, NULL, 'Connect to social Media', 'Connect to social Media like facebook', 1, '2018-03-26 05:37:51', 2, '2018-03-26 05:37:51', NULL),
(5, 'S5928613331522650068', 'Satish', 'KKK', NULL, NULL, NULL, NULL, NULL, 'How to manage people if you are not a leader?', 'asdfasdfasda', 1, '2018-04-02 08:21:08', 2, '2018-04-02 08:21:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SuggestionAssigned`
--

CREATE TABLE IF NOT EXISTS `SuggestionAssigned` (
  `SuggestionAssignedId` bigint(20) NOT NULL AUTO_INCREMENT,
  `SuggestionId` bigint(20) NOT NULL,
  `AssignedTo` bigint(20) NOT NULL,
  `AssignedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`SuggestionAssignedId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `SuggestionAssigned`
--

INSERT INTO `SuggestionAssigned` (`SuggestionAssignedId`, `SuggestionId`, `AssignedTo`, `AssignedBy`, `AddedOn`) VALUES
(1, 1, 2, 4, '2018-03-23 12:53:55'),
(2, 2, 2, 4, '2018-03-23 12:55:42'),
(3, 3, 2, 4, '2018-03-24 06:47:42'),
(4, 4, 4, 2, '2018-03-26 05:37:51'),
(5, 5, 4, 2, '2018-04-02 08:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `SuggestionAttachment`
--

CREATE TABLE IF NOT EXISTS `SuggestionAttachment` (
  `SuggestionAttachmentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `SuggestionId` bigint(20) DEFAULT NULL,
  `AttachmentTypeId` bigint(20) DEFAULT NULL,
  `AttachmentFile` varchar(200) DEFAULT NULL,
  `AttachmentOrginalFile` varchar(200) DEFAULT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) DEFAULT '0',
  `AttachmentStatus` int(11) DEFAULT '0',
  `AddedBy` bigint(20) unsigned DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SuggestionAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`SuggestionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `SuggestionHistory`
--

CREATE TABLE IF NOT EXISTS `SuggestionHistory` (
  `SuggestionHistoryId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `SuggestionId` bigint(20) unsigned NOT NULL,
  `HistoryDescription` text NOT NULL,
  `HistoryStatus` bigint(20) NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`SuggestionHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `SuggestionHistoryAttachment`
--

CREATE TABLE IF NOT EXISTS `SuggestionHistoryAttachment` (
  `SuggestionHistoryAttachmentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `SuggestionHistoryId` bigint(20) NOT NULL,
  `AttachmentTypeId` bigint(20) NOT NULL,
  `AttachmentFile` varchar(200) NOT NULL,
  `AttachmentOrginalFile` varchar(200) NOT NULL,
  `AttachmentThumb` varchar(200) DEFAULT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`SuggestionHistoryAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`SuggestionHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TestMockApi`
--

CREATE TABLE IF NOT EXISTS `TestMockApi` (
  `TestMockApiId` bigint(20) NOT NULL AUTO_INCREMENT,
  `TestMockApiName` text NOT NULL,
  `TestMockApiResponseSuccess` text NOT NULL,
  `TestMockApiResponseFailed` text NOT NULL,
  PRIMARY KEY (`TestMockApiId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `TestMockApi`
--

INSERT INTO `TestMockApi` (`TestMockApiId`, `TestMockApiName`, `TestMockApiResponseSuccess`, `TestMockApiResponseFailed`) VALUES
(1, 'userlogin/loginMobileMpin', '{\n    "status": "success",\n    "user_profile": {\n        "UserId": "1",\n        "UserUniqueId": "23423423423423432",\n        "LoginDeviceToken": "",\n        "UserStatus": "1",\n        "LoginStatus": "1",\n        "UserName": "rajesh1may",\n        "UserEmail": "rajesh1may@gmail.com",\n        "UserMobile": "+919911529958",\n        "AddedOn": "2 days ago",\n        "UpdatedOn": "2 days ago",\n        "ProfilePhotoId": "0",\n        "ProfilePhotoPath": "",\n        "CoverPhotoId": "0",\n        "CoverPhotoPath": "",\n        "FacebookProfileId": "",\n        "GoogleProfileId": "",\n        "LinkedinProfileId": "",\n        "UserProfileCitizen": {\n            "UserProfileId": "1",\n            "ParentUserId": "0",\n            "FirstName": "Rajesh",\n            "MiddleName": "Kumar",\n            "LastName": "Vishwakarma",\n            "Email": "rajesh1may@gmail.com",\n            "UserProfileDeviceToken": "sdfasdf asdf asf asdf asdf asdf ",\n            "DateOfBirth": "1981-05-01",\n            "Gender": "1",\n            "Address": "New Delhi",\n            "Mobile": "9911529958",\n            "AltMobile": "",\n            "ProfileStatus": "1",\n            "AddedBy": "0",\n            "UpdatedBy": "0",\n            "AddedOn": "2 days ago",\n            "UpdatedOn": "2 days ago"\n        }\n    },\n    "message": "User logged in successfully"\n}', '{\n    "status": "failed",\n    "message": "Error: Either mobile number or mpin incorrect"\n}'),
(2, 'userlogin/loginMobile', '{\n    "status": "success",\n    "message": "OTP sent to your mobile number",\n}', '{\r\n    "status": "failed",\r\n    "message": "This mobile number is not registered with us. Please register first."\r\n}'),
(3, 'userlogin/loginUsernamePassword', '{\n    "status": "success",\n    "user_profile": {\n        "UserId": "1",\n        "UserUniqueId": "23423423423423432",\n        "LoginDeviceToken": "",\n        "UserStatus": "1",\n        "LoginStatus": "1",\n        "UserName": "rajesh1may",\n        "UserEmail": "rajesh1may@gmail.com",\n        "UserMobile": "+919911529958",\n        "AddedOn": "2 days ago",\n        "UpdatedOn": "2 days ago",\n        "ProfilePhotoId": "0",\n        "ProfilePhotoPath": "",\n        "CoverPhotoId": "0",\n        "CoverPhotoPath": "",\n        "FacebookProfileId": "",\n        "GoogleProfileId": "",\n        "LinkedinProfileId": "",\n        "UserProfileCitizen": {\n            "UserProfileId": "1",\n            "ParentUserId": "0",\n            "FirstName": "Rajesh",\n            "MiddleName": "Kumar",\n            "LastName": "Vishwakarma",\n            "Email": "rajesh1may@gmail.com",\n            "UserProfileDeviceToken": "sdfasdf asdf asf asdf asdf asdf ",\n            "DateOfBirth": "1981-05-01",\n            "Gender": "1",\n            "Address": "New Delhi",\n            "Mobile": "9911529958",\n            "AltMobile": "",\n            "ProfileStatus": "1",\n            "AddedBy": "0",\n            "UpdatedBy": "0",\n            "AddedOn": "2 days ago",\n            "UpdatedOn": "2 days ago"\n        }\n    },\n    "message": "User logged in successfully"\n}', '{\r\n    "status": "failed",\r\n    "message": "Error: Either username or password incorrect"\r\n}'),
(4, 'userlogin/validateMobileOtp', '{\n    "status": "success",\n    "user_profile": {\n        "UserId": "1",\n        "UserUniqueId": "23423423423423432",\n        "LoginDeviceToken": "",\n        "UserStatus": "1",\n        "LoginStatus": "1",\n        "UserName": "rajesh1may",\n        "UserEmail": "rajesh1may@gmail.com",\n        "UserMobile": "+919911529958",\n        "AddedOn": "2 days ago",\n        "UpdatedOn": "2 days ago",\n        "ProfilePhotoId": "0",\n        "ProfilePhotoPath": "",\n        "CoverPhotoId": "0",\n        "CoverPhotoPath": "",\n        "FacebookProfileId": "",\n        "GoogleProfileId": "",\n        "LinkedinProfileId": "",\n        "UserProfileCitizen": {\n            "UserProfileId": "1",\n            "ParentUserId": "0",\n            "FirstName": "Rajesh",\n            "MiddleName": "Kumar",\n            "LastName": "Vishwakarma",\n            "Email": "rajesh1may@gmail.com",\n            "UserProfileDeviceToken": "sdfasdf asdf asf asdf asdf asdf ",\n            "DateOfBirth": "1981-05-01",\n            "Gender": "1",\n            "Address": "New Delhi",\n            "Mobile": "9911529958",\n            "AltMobile": "",\n            "ProfileStatus": "1",\n            "AddedBy": "0",\n            "UpdatedBy": "0",\n            "AddedOn": "2 days ago",\n            "UpdatedOn": "2 days ago"\n        }\n    },\n    "message": "OPT validated successfully"\n}', '{\n    "status": "failed",\n    "message": "OTP incorrect or expired. Please regenerate"\n}'),
(5, 'userlogin/loginWithSocial', '{\n    "status": "success",\n    "user_profile": {\n        "UserId": "1",\n        "UserUniqueId": "23423423423423432",\n        "LoginDeviceToken": "",\n        "UserStatus": "1",\n        "LoginStatus": "1",\n        "UserName": "rajesh1may",\n        "UserEmail": "rajesh1may@gmail.com",\n        "UserMobile": "+919911529958",\n        "AddedOn": "2 days ago",\n        "UpdatedOn": "Just Now",\n        "ProfilePhotoId": "0",\n        "ProfilePhotoPath": "",\n        "CoverPhotoId": "0",\n        "CoverPhotoPath": "",\n        "FacebookProfileId": "",\n        "GoogleProfileId": "",\n        "LinkedinProfileId": "",\n        "UserProfileCitizen": {\n            "UserProfileId": "1",\n            "ParentUserId": "0",\n            "FirstName": "Rajesh",\n            "MiddleName": "Kumar",\n            "LastName": "Vishwakarma",\n            "Email": "rajesh1may@gmail.com",\n            "UserProfileDeviceToken": "sdfasdf asdf asf asdf asdf asdf ",\n            "DateOfBirth": "1981-05-01",\n            "Gender": "1",\n            "Address": "New Delhi",\n            "Mobile": "9911529958",\n            "AltMobile": "",\n            "ProfileStatus": "1",\n            "AddedBy": "0",\n            "UpdatedBy": "0",\n            "AddedOn": "2 days ago",\n            "UpdatedOn": "2 days ago"\n        }\n    },\n    "message": "User logged in successfully"\n}', '{\r\n    "status": "failed",\r\n    "message": "Please select your id"\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `TestMockApiParam`
--

CREATE TABLE IF NOT EXISTS `TestMockApiParam` (
  `TestMockApiParamId` bigint(20) NOT NULL AUTO_INCREMENT,
  `TestMockApiId` bigint(20) NOT NULL,
  `TestMockApiKey` varchar(50) NOT NULL,
  `TestMockApiValue` text NOT NULL,
  PRIMARY KEY (`TestMockApiParamId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `TestMockApiParam`
--

INSERT INTO `TestMockApiParam` (`TestMockApiParamId`, `TestMockApiId`, `TestMockApiKey`, `TestMockApiValue`) VALUES
(1, 1, 'mobile', '+919911529958'),
(2, 1, 'mpin', '1234'),
(3, 2, 'mobile', '+919911529958'),
(4, 3, 'username', 'rajesh1may'),
(5, 3, 'password', 'rajesh'),
(6, 4, 'mobile', '+919911529958'),
(7, 4, 'otp', '123456'),
(8, 4, 'device_token', '5345345324'),
(9, 4, 'location_lant', '3532'),
(10, 4, 'location_long', '3534534'),
(11, 4, 'device_name', 'Web'),
(12, 4, 'device_os', 'Linux'),
(13, 5, 'id', '1234567890'),
(14, 5, 'name', 'Rajesh Kumar'),
(15, 5, 'email', 'rajesh1may@gmail.com'),
(16, 5, 'mobile', '+919911529958'),
(17, 5, 'social_type', 'facebook');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserUniqueId` varchar(100) NOT NULL,
  `UserName` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `UserPassword` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `UserMpin` int(11) NOT NULL DEFAULT '0',
  `UserEmail` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `UserMobile` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` int(11) DEFAULT '0',
  `MaritalStatus` int(11) DEFAULT '0',
  `UserStatus` int(11) NOT NULL DEFAULT '0',
  `LoginDeviceToken` text,
  `LoginOtp` varchar(100) DEFAULT NULL,
  `LoginStatus` int(11) NOT NULL DEFAULT '1',
  `LoginOtpValidTill` datetime NOT NULL,
  `ActivationCode` varchar(200) DEFAULT NULL,
  `ResetPasswordCode` varchar(200) NOT NULL,
  `ResetPasswordCodeValidTill` datetime DEFAULT NULL,
  `ProfilePhotoId` bigint(20) NOT NULL DEFAULT '0',
  `CoverPhotoId` bigint(20) NOT NULL DEFAULT '0',
  `FacebookProfileId` varchar(200) NOT NULL,
  `GoogleProfileId` varchar(200) NOT NULL,
  `LinkedinProfileId` varchar(200) NOT NULL,
  `TwitterProfileId` varchar(200) NOT NULL,
  `DeviceLantitude` varchar(200) DEFAULT NULL,
  `DeviceLongitude` varchar(200) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `DeactivatedOn` datetime NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserUniqueId` (`UserUniqueId`),
  UNIQUE KEY `UserName` (`UserName`),
  UNIQUE KEY `UserEmail` (`UserEmail`),
  UNIQUE KEY `UserMobile` (`UserMobile`),
  KEY `mobile` (`UserMobile`),
  KEY `mpin` (`UserMpin`),
  KEY `email` (`UserEmail`),
  KEY `login_status` (`LoginStatus`),
  KEY `profile_id` (`UserUniqueId`),
  KEY `login_otp` (`LoginOtp`),
  KEY `login_otp_valid_till` (`LoginOtpValidTill`),
  KEY `activation_code` (`ActivationCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `UserUniqueId`, `UserName`, `UserPassword`, `UserMpin`, `UserEmail`, `UserMobile`, `DateOfBirth`, `Gender`, `MaritalStatus`, `UserStatus`, `LoginDeviceToken`, `LoginOtp`, `LoginStatus`, `LoginOtpValidTill`, `ActivationCode`, `ResetPasswordCode`, `ResetPasswordCodeValidTill`, `ProfilePhotoId`, `CoverPhotoId`, `FacebookProfileId`, `GoogleProfileId`, `LinkedinProfileId`, `TwitterProfileId`, `DeviceLantitude`, `DeviceLongitude`, `AddedOn`, `UpdatedOn`, `DeactivatedOn`) VALUES
(1, '2520942731521629994988224977', 'rajesh1may', 'e10adc3949ba59abbe56e057f20f883e', 0, 'rajesh1may@gmail.com', '+919911529958', '1981-05-01', 1, 1, 1, NULL, NULL, 1, '0000-00-00 00:00:00', NULL, '', '2018-03-21 12:54:54', 22, 0, '', '', '', '', NULL, NULL, '2018-03-21 11:59:54', '2018-04-09 13:06:33', '0000-00-00 00:00:00'),
(2, '1409071411521714669242916526', 'ramesh', '6fc42c4388ed6f0c5a91257f096fef3c', 0, 'ramesh@gmail.com', '342389042390', NULL, 1, 0, 1, NULL, NULL, 1, '0000-00-00 00:00:00', NULL, '', NULL, 0, 0, '', '', '', '', NULL, NULL, '2018-03-22 11:31:09', '2018-03-22 11:31:09', '0000-00-00 00:00:00'),
(3, '54206465915228287681193773594', 'gaurav', '29be54a52396750258d886abc5417fda', 0, 'gaurav@ritvigroup.com', '432423432423', NULL, 1, 0, 1, NULL, NULL, 1, '0000-00-00 00:00:00', NULL, '', NULL, 0, 0, '', '', '', '', NULL, NULL, '2018-04-04 09:59:28', '2018-04-04 09:59:28', '0000-00-00 00:00:00'),
(4, '128573488715228288222039744858', 'vaidehi', '5772f5dd7afb90241fe9265becd65703', 0, 'vaidehi@gmail.com', '89898989898', NULL, 2, 0, 1, NULL, NULL, 1, '0000-00-00 00:00:00', NULL, '', NULL, 0, 0, '', '', '', '', NULL, NULL, '2018-04-04 10:00:22', '2018-04-04 10:00:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `UserAlbum`
--

CREATE TABLE IF NOT EXISTS `UserAlbum` (
  `UserAlbumId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) unsigned NOT NULL,
  `AlbumName` varchar(100) NOT NULL,
  `AlbumDescription` text NOT NULL,
  `PrivacyType` int(11) NOT NULL DEFAULT '1',
  `AlbumStatus` int(11) NOT NULL DEFAULT '0',
  `AddedOn` datetime NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`UserAlbumId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `UserAlbum`
--

INSERT INTO `UserAlbum` (`UserAlbumId`, `UserId`, `AlbumName`, `AlbumDescription`, `PrivacyType`, `AlbumStatus`, `AddedOn`, `UpdatedOn`) VALUES
(1, 1, 'Profile', 'My Profile', 1, 1, '2018-03-27 12:52:41', '2018-03-27 12:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `UserFavUser`
--

CREATE TABLE IF NOT EXISTS `UserFavUser` (
  `UserFavUserId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserProfileId` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FriendUserProfileId` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FavOn` datetime NOT NULL,
  PRIMARY KEY (`UserFavUserId`),
  KEY `user_id` (`FriendUserProfileId`,`UserProfileId`),
  KEY `user_profile_id` (`UserProfileId`),
  KEY `friend_user_profile_id` (`FriendUserProfileId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `UserFavUser`
--

INSERT INTO `UserFavUser` (`UserFavUserId`, `UserProfileId`, `FriendUserProfileId`, `FavOn`) VALUES
(2, 1, 4, '2018-03-23 10:15:27'),
(3, 2, 4, '2018-03-23 10:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `UserFriend`
--

CREATE TABLE IF NOT EXISTS `UserFriend` (
  `UserFriendId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserProfileId` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FriendUserProfileId` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RequestSentOn` datetime DEFAULT NULL,
  `RequestAccepted` int(11) DEFAULT '0',
  `RequestAcceptedOn` datetime DEFAULT NULL,
  `RequestDeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`UserFriendId`),
  KEY `user_id` (`FriendUserProfileId`,`UserProfileId`),
  KEY `user_profile_id` (`UserProfileId`),
  KEY `friend_user_profile_id` (`FriendUserProfileId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `UserFriend`
--

INSERT INTO `UserFriend` (`UserFriendId`, `UserProfileId`, `FriendUserProfileId`, `RequestSentOn`, `RequestAccepted`, `RequestAcceptedOn`, `RequestDeletedOn`) VALUES
(3, 2, 4, '2018-03-27 09:46:01', 0, NULL, NULL),
(4, 2, 6, '2018-04-04 10:00:56', 1, '2018-04-04 10:01:31', NULL),
(6, 6, 2, '2018-04-04 10:01:31', 1, '2018-04-04 10:01:31', NULL),
(7, 8, 2, '2018-04-04 10:05:58', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `UserLog`
--

CREATE TABLE IF NOT EXISTS `UserLog` (
  `UserLogId` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) NOT NULL,
  `DeviceTokenId` text,
  `DeviceName` text,
  `DeviceOs` varchar(200) DEFAULT NULL,
  `Longitude` varchar(200) DEFAULT NULL,
  `Lantitude` varchar(200) DEFAULT NULL,
  `LoggedIn` datetime NOT NULL,
  `LoggedOut` datetime NOT NULL,
  PRIMARY KEY (`UserLogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserPhoto`
--

CREATE TABLE IF NOT EXISTS `UserPhoto` (
  `UserPhotoId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) unsigned NOT NULL,
  `UserAlbumId` bigint(20) unsigned NOT NULL,
  `PhotoPath` varchar(255) NOT NULL,
  `PhotoStatus` int(11) NOT NULL DEFAULT '0',
  `AddedOn` datetime NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`UserPhotoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `UserPhoto`
--

INSERT INTO `UserPhoto` (`UserPhotoId`, `UserId`, `UserAlbumId`, `PhotoPath`, `PhotoStatus`, `AddedOn`, `UpdatedOn`) VALUES
(1, 1, 1, '20180327125241PM-1522147961-PROFILE-2021461805.jpg', 1, '2018-03-27 12:52:42', '2018-03-27 12:52:42'),
(2, 1, 1, '20180327125521PM-1522148121-PROFILE-709990800.jpg', 1, '2018-03-27 12:55:21', '2018-03-27 12:55:21'),
(3, 1, 1, '20180327125706PM-1522148226-PROFILE-2035450927.jpg', 1, '2018-03-27 12:57:07', '2018-03-27 12:57:07'),
(4, 1, 1, '20180327125708PM-1522148228-PROFILE-1797063344.jpg', 1, '2018-03-27 12:57:08', '2018-03-27 12:57:08'),
(5, 1, 1, '20180327125737PM-1522148257-PROFILE-1610530816.jpg', 1, '2018-03-27 12:57:37', '2018-03-27 12:57:37'),
(6, 1, 1, '20180327130510PM-1522148710-PROFILE-1692027536.jpg', 1, '2018-03-27 13:05:11', '2018-03-27 13:05:11'),
(7, 1, 1, '20180327130617PM-1522148777-PROFILE-1835237085.jpg', 1, '2018-03-27 13:06:17', '2018-03-27 13:06:17'),
(8, 1, 1, '20180327130635PM-1522148795-PROFILE-944871793.jpg', 1, '2018-03-27 13:06:35', '2018-03-27 13:06:35'),
(9, 1, 1, '20180327130805PM-1522148885-PROFILE-1014332872.jpg', 1, '2018-03-27 13:08:05', '2018-03-27 13:08:05'),
(10, 1, 1, '20180327130953PM-1522148993-PROFILE-828063235.jpg', 1, '2018-03-27 13:09:53', '2018-03-27 13:09:53'),
(11, 1, 1, '20180328090045AM-1522220445-PROFILE-399228097.jpeg', 1, '2018-03-28 09:00:45', '2018-03-28 09:00:45'),
(12, 1, 1, '20180409080929AM-1523254169-PROFILE-1072912123.jpg', 1, '2018-04-09 08:09:29', '2018-04-09 08:09:29'),
(13, 1, 1, '20180409081328AM-1523254408-PROFILE-779629958.jpg', 1, '2018-04-09 08:13:28', '2018-04-09 08:13:28'),
(14, 1, 1, '20180409081437AM-1523254477-PROFILE-2080458802.jpg', 1, '2018-04-09 08:14:37', '2018-04-09 08:14:37'),
(15, 1, 1, '20180409081740AM-1523254660-PROFILE-450529883.png', 1, '2018-04-09 08:17:40', '2018-04-09 08:17:40'),
(16, 1, 1, '20180409082812AM-1523255292-PROFILE-252106858.jpg', 1, '2018-04-09 08:28:12', '2018-04-09 08:28:12'),
(17, 1, 1, '20180409082913AM-1523255353-PROFILE-1506944494.jpg', 1, '2018-04-09 08:29:13', '2018-04-09 08:29:13'),
(18, 1, 1, '20180409085427AM-1523256867-PROFILE-1316383260.jpg', 1, '2018-04-09 08:54:27', '2018-04-09 08:54:27'),
(19, 1, 1, '20180409124340PM-1523270620-PROFILE-596006677.jpg', 1, '2018-04-09 12:43:40', '2018-04-09 12:43:40'),
(20, 1, 1, '20180409130349PM-1523271829-PROFILE-1681086949.jpg', 1, '2018-04-09 13:03:49', '2018-04-09 13:03:49'),
(21, 1, 1, '20180409130501PM-1523271901-PROFILE-714903216.jpg', 1, '2018-04-09 13:05:01', '2018-04-09 13:05:01'),
(22, 1, 1, '20180409130540PM-1523271940-PROFILE-877259365.jpg', 1, '2018-04-09 13:05:40', '2018-04-09 13:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `UserProfile`
--

CREATE TABLE IF NOT EXISTS `UserProfile` (
  `UserProfileId` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) unsigned DEFAULT NULL,
  `UserTypeId` int(11) DEFAULT '1' COMMENT '1=Citizen',
  `ParentUserId` bigint(20) unsigned DEFAULT NULL,
  `UserRoleId` bigint(20) DEFAULT '0',
  `FirstName` varchar(100) DEFAULT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `UserProfileDeviceToken` text,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `PoliticalPartyId` bigint(20) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `District` varchar(100) DEFAULT NULL,
  `Tehsil` varchar(100) DEFAULT NULL,
  `Thana` varchar(100) DEFAULT NULL,
  `Block` varchar(100) DEFAULT NULL,
  `VillagePanchayat` varchar(100) DEFAULT NULL,
  `Village` varchar(100) DEFAULT NULL,
  `TownArea` varchar(100) DEFAULT NULL,
  `Ward` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `ZipCode` varchar(100) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `AltMobile` varchar(20) DEFAULT NULL,
  `ProfilePhotoId` bigint(20) unsigned DEFAULT NULL,
  `CoverPhotoId` bigint(20) unsigned NOT NULL,
  `ProfileStatus` int(11) DEFAULT '0',
  `WebsiteUrl` text,
  `FacebookPageUrl` text,
  `TwitterPageUrl` text,
  `GooglePageUrl` text,
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `AddedBy` bigint(20) DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`UserProfileId`),
  KEY `UserId` (`UserId`),
  KEY `UserType` (`UserTypeId`),
  KEY `ParentUserId` (`ParentUserId`),
  KEY `UserRoleId` (`UserRoleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `UserProfile`
--

INSERT INTO `UserProfile` (`UserProfileId`, `UserId`, `UserTypeId`, `ParentUserId`, `UserRoleId`, `FirstName`, `MiddleName`, `LastName`, `Email`, `UserProfileDeviceToken`, `DateOfBirth`, `Gender`, `PoliticalPartyId`, `Address`, `City`, `District`, `Tehsil`, `Thana`, `Block`, `VillagePanchayat`, `Village`, `TownArea`, `Ward`, `State`, `ZipCode`, `Mobile`, `AltMobile`, `ProfilePhotoId`, `CoverPhotoId`, `ProfileStatus`, `WebsiteUrl`, `FacebookPageUrl`, `TwitterPageUrl`, `GooglePageUrl`, `AddedOn`, `UpdatedOn`, `AddedBy`, `UpdatedBy`) VALUES
(1, 1, 1, 0, 0, 'Rajesh', '', '', 'rajesh1may@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New Delhi', NULL, '+919911529958', '+919911529958', NULL, 0, 1, NULL, NULL, NULL, NULL, '2018-03-21 11:59:54', '2018-03-27 13:09:53', 1, 1),
(2, 1, 2, 0, 0, 'Rajesh', '', 'Kumar', 'rajesh1may@gmail.com', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New Delhi', NULL, '+919911529958', '+919911529958', NULL, 0, 1, 'http://facebook.com/rajesh1mayweb', 'http://facebook.com/rajesh1may', 'http://twitter.com/rajesh1may', 'http://google.com/rajesh1may', '2018-03-21 11:59:54', '2018-04-09 13:05:40', 1, 2),
(3, 2, 1, 0, 0, 'RameshCitizen', NULL, 'Kumar', 'ramesh@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '342389042390', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2018-03-22 11:31:09', '2018-03-22 11:31:09', 2, 2),
(4, 2, 2, 0, 0, 'RameshLeader', NULL, 'Kumar', 'ramesh@gmail.com', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '342389042390', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2018-03-22 11:31:09', '2018-03-22 11:31:09', 2, 2),
(5, 3, 1, 0, 0, 'Gaurav', NULL, 'Gautam', 'gaurav@ritvigroup.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '432423432423', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2018-04-04 09:59:28', '2018-04-04 09:59:28', 3, 3),
(6, 3, 2, 0, 0, 'Gaurav', NULL, 'Gautam', 'gaurav@ritvigroup.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '432423432423', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2018-04-04 09:59:28', '2018-04-04 09:59:28', 3, 3),
(7, 4, 1, 0, 0, 'Vaidehi', NULL, 'RitviGroup', 'vaidehi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '89898989898', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2018-04-04 10:00:22', '2018-04-04 10:00:22', 4, 4),
(8, 4, 2, 0, 0, 'Vaidehi', NULL, 'RitviGroup', 'vaidehi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '89898989898', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2018-04-04 10:00:22', '2018-04-04 10:00:22', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `UserRole`
--

CREATE TABLE IF NOT EXISTS `UserRole` (
  `UserRoleId` bigint(20) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(100) NOT NULL,
  `RoleDescription` text NOT NULL,
  `RoleStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`UserRoleId`),
  KEY `TypeName` (`RoleName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserRolePermission`
--

CREATE TABLE IF NOT EXISTS `UserRolePermission` (
  `UserRolePermissionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserRoleId` bigint(20) NOT NULL,
  `PermissionId` bigint(20) NOT NULL,
  `PermissionAction` varchar(100) NOT NULL COMMENT 'A = Add, E = Edit, D = Delete, V = View',
  `PermissionStatus` int(11) NOT NULL DEFAULT '0',
  `AddedOn` datetime NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `UpdatedBy` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`UserRolePermissionId`),
  KEY `UserRoleId` (`UserRoleId`,`PermissionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE IF NOT EXISTS `UserType` (
  `UserTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) DEFAULT NULL,
  `TypeDescription` text,
  `TypeDefault` int(11) NOT NULL DEFAULT '0',
  `TypeStatus` int(11) DEFAULT '0',
  `AddedBy` bigint(20) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`UserTypeId`),
  KEY `TypeName` (`TypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`UserTypeId`, `TypeName`, `TypeDescription`, `TypeDefault`, `TypeStatus`, `AddedBy`, `AddedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Citizen', 'Citizen', 1, 1, NULL, NULL, NULL, NULL),
(2, 'Leader', 'Leader', 0, 1, NULL, NULL, NULL, NULL),
(3, 'SubLeader', 'SubLeader', 1, 1, NULL, NULL, NULL, NULL),
(4, 'Activist', 'Activist', 0, 1, NULL, NULL, NULL, NULL),
(5, 'MLA', 'MLA', 0, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Vehicle`
--

CREATE TABLE IF NOT EXISTS `Vehicle` (
  `VehicleId` bigint(20) NOT NULL AUTO_INCREMENT,
  `VehicleName` varchar(100) DEFAULT NULL,
  `VehicleDescription` text,
  `VehicleStatus` int(11) DEFAULT '0',
  `AddedBy` bigint(20) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`VehicleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Vehicle`
--

INSERT INTO `Vehicle` (`VehicleId`, `VehicleName`, `VehicleDescription`, `VehicleStatus`, `AddedBy`, `AddedOn`) VALUES
(1, 'Bike', 'Bike Like Hero, Honda, TVS', 1, NULL, '2018-03-01 00:00:00'),
(2, 'Bolero', 'Bolero', 1, NULL, '2018-03-01 00:00:00'),
(3, 'Scorpio', 'Scorpio', 1, NULL, '2018-03-01 00:00:00'),
(4, 'Safari', 'Safari', 1, NULL, '2018-03-01 00:00:00'),
(5, 'Innova', 'Innova', 1, NULL, '2018-03-01 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
