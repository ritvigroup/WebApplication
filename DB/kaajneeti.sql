-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2018 at 07:22 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`ComplaintId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintHistory`
--

CREATE TABLE IF NOT EXISTS `ComplaintHistory` (
  `ComplaintHistoryId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ComplaintId` bigint(20) unsigned NOT NULL,
  `HistoryDescription` text NOT NULL,
  `HistoryStatus` bigint(20) NOT NULL,
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintHistoryAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`ComplaintHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ComplaintType`
--

CREATE TABLE IF NOT EXISTS `ComplaintType` (
  `ComplaintTypeId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) NOT NULL,
  `TypeDescription` text NOT NULL,
  `TypeStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) unsigned NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`ComplaintTypeId`),
  KEY `TypeName` (`TypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE IF NOT EXISTS `Country` (
  `CountryId` bigint(20) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(150) NOT NULL,
  `IsoCode2` varchar(2) NOT NULL,
  `IsoCode3` varchar(3) NOT NULL,
  `CountryStatus` tinyint(1) NOT NULL DEFAULT '1',
  `CountryPhoneCode` varchar(20) DEFAULT NULL,
  `CountryFavourite` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE IF NOT EXISTS `Event` (
  `EventId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `EventUniqueId` varchar(100) DEFAULT NULL,
  `EventName` varchar(100) NOT NULL,
  `EventDescription` text NOT NULL,
  `EventLocation` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `EveryYear` int(11) NOT NULL DEFAULT '0',
  `EveryMonth` int(11) NOT NULL DEFAULT '0',
  `EventStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`EventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `EventMain` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
  PRIMARY KEY (`EventAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`EventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `EventAttendee`
--

CREATE TABLE IF NOT EXISTS `EventAttendee` (
  `EventAttendeeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `EventId` bigint(20) NOT NULL,
  `UserProfileId` bigint(20) NOT NULL,
  `EventApprovedStatus` int(11) NOT NULL DEFAULT '0',
  `ApprovedOn` datetime NOT NULL,
  `AddedBy` bigint(20) NOT NULL,
  PRIMARY KEY (`EventAttendeeId`),
  KEY `ComplaintId` (`EventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PostAttachmentId`),
  KEY `AttachmentTypeId` (`AttachmentTypeId`),
  KEY `ComplaintId` (`PostId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `Suggestion`
--

CREATE TABLE IF NOT EXISTS `Suggestion` (
  `SuggestionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `SuggestionUniqueId` varchar(100) NOT NULL,
  `ApplicantName` varchar(100) NOT NULL,
  `ApplicantFatherName` varchar(100) NOT NULL,
  `ApplicantGender` varchar(10) NOT NULL,
  `ApplicantMobile` varchar(20) NOT NULL,
  `ApplicantEmail` varchar(100) NOT NULL,
  `ApplicantAadhaarNumber` varchar(100) NOT NULL,
  `ApplicantAddress` varchar(200) NOT NULL,
  `SuggestionSubject` varchar(200) NOT NULL,
  `SuggestionDescription` text NOT NULL,
  `SuggestionStatus` bigint(20) NOT NULL DEFAULT '0',
  `AddedOn` datetime NOT NULL,
  `AddedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  PRIMARY KEY (`SuggestionId`),
  KEY `ComplaintStatus` (`SuggestionStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `SuggestionAttachment`
--

CREATE TABLE IF NOT EXISTS `SuggestionAttachment` (
  `SuggestionAttachmentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `SuggestionId` bigint(20) NOT NULL,
  `AttachmentTypeId` bigint(20) NOT NULL,
  `AttachmentFile` varchar(200) NOT NULL,
  `AttachmentOrginalFile` varchar(200) NOT NULL,
  `AttachmentOrder` int(11) NOT NULL DEFAULT '0',
  `AttachmentStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) unsigned NOT NULL,
  `AddedOn` datetime NOT NULL,
  `DeletedOn` datetime NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `ProfileStatus` int(11) DEFAULT '0',
  `AddedOn` datetime DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `AddedBy` bigint(20) DEFAULT NULL,
  `UpdatedBy` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`UserProfileId`),
  KEY `UserId` (`UserId`),
  KEY `UserType` (`UserTypeId`),
  KEY `ParentUserId` (`ParentUserId`),
  KEY `UserRoleId` (`UserRoleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
  `TypeName` varchar(100) NOT NULL,
  `TypeDescription` text NOT NULL,
  `TypeStatus` int(11) NOT NULL DEFAULT '0',
  `AddedBy` bigint(20) NOT NULL,
  `AddedOn` datetime NOT NULL,
  `UpdatedBy` bigint(20) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`UserTypeId`),
  KEY `TypeName` (`TypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
