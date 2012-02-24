-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: db.ac97.org
-- Generation Time: Feb 23, 2012 at 08:20 PM
-- Server version: 5.1.53
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `np_photographer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_badge_rules`
--

CREATE TABLE IF NOT EXISTS `np_badge_rules` (
  `bg_rule_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(50) DEFAULT NULL,
  `rule_level` enum('globa','event') DEFAULT 'event',
  `rule_count` int(10) unsigned DEFAULT NULL,
  `rule_type` enum('tags_did','tags_received','photos_uploaded','events_attended') DEFAULT 'tags_did',
  `img_path` varchar(100) DEFAULT NULL,
  `achieved_count` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`bg_rule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_badge_rules`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_comments`
--

CREATE TABLE IF NOT EXISTS `np_comments` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(10) unsigned DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_events`
--

CREATE TABLE IF NOT EXISTS `np_events` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `featured_photo` text,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `private` enum('Y','N') DEFAULT 'N',
  `total_comments` int(10) unsigned DEFAULT NULL,
  `total_photos` int(10) unsigned DEFAULT NULL,
  `total_tags` int(10) unsigned DEFAULT NULL,
  `total_attendees` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_events`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_event_attendees`
--

CREATE TABLE IF NOT EXISTS `np_event_attendees` (
  `attendee_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `tags_received` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`attendee_id`),
  UNIQUE KEY `event_id_user_id` (`event_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_event_attendees`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_login_attempts`
--

CREATE TABLE IF NOT EXISTS `np_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `np_login_attempts`
--

INSERT INTO `np_login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '60.53.199.11', 'a', '2012-02-22 07:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `np_photos`
--

CREATE TABLE IF NOT EXISTS `np_photos` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned DEFAULT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `uploaded_by` int(10) unsigned DEFAULT NULL,
  `total_comments` int(10) unsigned DEFAULT NULL,
  `total_tags` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_photos`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_tags`
--

CREATE TABLE IF NOT EXISTS `np_tags` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(10) unsigned DEFAULT NULL,
  `event_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `tagged_by` int(10) unsigned DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `tag_px` int(10) unsigned NOT NULL,
  `tag_width` int(10) unsigned NOT NULL,
  `tag_height` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `photo_id_user_id` (`photo_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_users`
--

CREATE TABLE IF NOT EXISTS `np_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` enum('admin','organizer','attendee','guest') COLLATE utf8_bin NOT NULL DEFAULT 'attendee',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_user_autologin`
--

CREATE TABLE IF NOT EXISTS `np_user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `np_user_autologin`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_user_badges`
--

CREATE TABLE IF NOT EXISTS `np_user_badges` (
  `user_badge_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bg_rule_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `date_achieved` datetime DEFAULT NULL,
  PRIMARY KEY (`user_badge_id`),
  UNIQUE KEY `bg_rule_id_user_id` (`bg_rule_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_user_badges`
--


-- --------------------------------------------------------

--
-- Table structure for table `np_user_profiles`
--

CREATE TABLE IF NOT EXISTS `np_user_profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `country` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `my_badges` text COLLATE utf8_bin COMMENT 'badge_rule_id',
  `tags_did` int(10) unsigned DEFAULT NULL,
  `tags_received` int(10) unsigned DEFAULT NULL,
  `events_attended` int(10) unsigned DEFAULT NULL,
  `photos_uploaded` int(10) unsigned DEFAULT NULL,
  `total_comments` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `np_user_profiles`
--

