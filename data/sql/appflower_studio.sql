-- phpMyAdmin SQL Dump
-- version 2.11.9.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2010 at 08:37 PM
-- Server version: 5.1.45
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appflower_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `afs_notification`
--

CREATE TABLE IF NOT EXISTS `afs_notification` (
  `message` varchar(255) NOT NULL,
  `message_type` varchar(2) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `afs_notification_FI_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `afs_notification`
--


-- --------------------------------------------------------

--
-- Table structure for table `af_guard_group`
--

CREATE TABLE IF NOT EXISTS `af_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `af_guard_group_U_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `af_guard_group`
--

INSERT INTO `af_guard_group` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator group');

-- --------------------------------------------------------

--
-- Table structure for table `af_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `af_guard_group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `af_guard_group_permission_FI_2` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `af_guard_group_permission`
--

INSERT INTO `af_guard_group_permission` (`group_id`, `permission_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `af_guard_permission`
--

CREATE TABLE IF NOT EXISTS `af_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `af_guard_permission_U_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `af_guard_permission`
--

INSERT INTO `af_guard_permission` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator permission');

-- --------------------------------------------------------

--
-- Table structure for table `af_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `af_guard_remember_key` (
  `user_id` int(11) NOT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `af_guard_remember_key`
--

INSERT INTO `af_guard_remember_key` (`user_id`, `remember_key`, `ip_address`, `created_at`) VALUES
(1, '62e931bcd7fdacaeb66ec8f2bef89417', '192.168.1.100', '2010-12-10 20:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `af_guard_user`
--

CREATE TABLE IF NOT EXISTS `af_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `af_guard_user_U_1` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `af_guard_user`
--

INSERT INTO `af_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `created_at`, `last_login`, `is_active`, `is_super_admin`) VALUES
(1, 'admin', 'sha1', '74333eec3edd981fb5b74b13bc85ee78', '52fdccfb819d47b93169a3d1034eff6bdd89b402', '2010-02-19 16:46:52', '2010-12-10 20:32:29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `af_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `af_guard_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `af_guard_user_group_FI_2` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `af_guard_user_group`
--

INSERT INTO `af_guard_user_group` (`user_id`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `af_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `af_guard_user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `af_guard_user_permission_FI_2` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `af_guard_user_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `af_guard_user_profile`
--

CREATE TABLE IF NOT EXISTS `af_guard_user_profile` (
  `user_id` int(11) NOT NULL,
  `timezones_id` int(11) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `phone_mobile` varchar(255) DEFAULT NULL,
  `phone_office` varchar(255) DEFAULT NULL,
  `personal_body` text,
  `image` varchar(255) DEFAULT NULL,
  `is_developer` tinyint(4) DEFAULT NULL,
  `widget_help_is_enabled` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `af_guard_user_profile_FI_2` (`timezones_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `af_guard_user_profile`
--

INSERT INTO `af_guard_user_profile` (`user_id`, `timezones_id`, `first_name`, `last_name`, `job_title`, `phone_mobile`, `phone_office`, `personal_body`, `image`, `is_developer`, `widget_help_is_enabled`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', '', '', '', '', '', NULL, NULL, 1, '2007-07-23 21:42:10', '2007-07-23 21:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `af_portal_state`
--

CREATE TABLE IF NOT EXISTS `af_portal_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_xml` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `layout_type` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `af_portal_state`
--


-- --------------------------------------------------------

--
-- Table structure for table `af_save_filter`
--

CREATE TABLE IF NOT EXISTS `af_save_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `filter` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `af_save_filter`
--


-- --------------------------------------------------------

--
-- Table structure for table `af_validator_cache`
--

CREATE TABLE IF NOT EXISTS `af_validator_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signature` varchar(40) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_validator_cache_I_1` (`signature`),
  KEY `af_validator_cache_I_2` (`path`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `af_validator_cache`
--

INSERT INTO `af_validator_cache` (`id`, `signature`, `path`, `created_at`, `updated_at`) VALUES
(1, '347d04d87252aff15d2755fef2f09ab79412e1d6', '/var/www/projects/appflower_studio/apps/frontend/modules/afGuardUserProfile/config/edit.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(2, '64df5bae3d852c0f8f6a2c36b318e22d1be48271', '/var/www/projects/appflower_studio/apps/frontend/config/pages/dashboard.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(3, '39cb5fa58879f103657f389aace1d97adfa85db5', '/var/www/projects/appflower_studio/apps/frontend/config/pages/error404Page.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(4, 'acc18fe5c3ff24f437be78197a7f518d15a34008', '/var/www/projects/appflower_studio/apps/frontend/config/pages/error500Page.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(5, 'cf061d594d046a0564f5d51ab5c6ebafc9f1ec0d', '/var/www/projects/appflower_studio/apps/frontend/config/pages/insufficientCredentials.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(6, '3bd48f43457f1ceaa39ce5b33952793aabe8dc22', '/var/www/projects/appflower_studio/apps/frontend/config/pages/tabs.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(7, '4162bf35e94ea7d1777bc6a17a7b01d054b9afa1', '/var/www/projects/appflower_studio/plugins/afGuardPlugin/modules/afGuardGroup/config/edit.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(8, '0f3e286b8ca3a56cb729e4c71ae52ca3ae2ab3db', '/var/www/projects/appflower_studio/plugins/afGuardPlugin/modules/afGuardGroup/config/list.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(9, '0aacd1a7f2148ed51745dec9a9e11b653e78080a', '/var/www/projects/appflower_studio/plugins/afGuardPlugin/modules/afGuardUser/config/edit.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(10, 'df76b5927d0c378bdb02663e19268d884d68706e', '/var/www/projects/appflower_studio/plugins/afGuardPlugin/modules/afGuardUser/config/list.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(11, '2090f71b668f7d7665f036f0132d310ae3dc6127', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/appFlower/config/editHelpSettings.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(12, '7ae6f8795fecde29356574f1301774ed403a0307', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/appFlower/config/firstPage.xml', '2010-12-10 20:34:07', '2010-12-10 20:34:07'),
(13, '30dd5c70ed1990b9ec03123f0efd16d25b2ffb85', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/bugReport/config/index.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(14, '90e0fe352227a663e93a5064421463a459a8abcf', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/buttons.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(15, '1da78c1346fd81f21075b5b46635f98d4567423f', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/edit.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(16, 'b09137243dbdec6bedcbb3f8b84ed44fcb4824cf', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/editnew.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(17, 'f362422fd36f70b9fcdf0758ac473e90626e5003', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/html.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(18, 'd998f6940afaa75a5c05e3b792038a3c8fa897d5', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/info.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(19, '90eb18f6e443c26f1f44a7d9e68545c9832c1761', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/list.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(20, '363c18f7b8e6c2675e3488e1376985ab88b82928', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/listZones.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(21, '21352d7615b7eb76445cb70b47acb6e026dcddd6', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/liststatic.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(22, 'f188cc594f9e3ccf34272105326b8591a71fcdb2', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/listtree.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(23, '027c54c8d5000850938969bb8aa56281290dea55', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/newZone.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(24, '0cf182e7df5ba997fcca49e2789c1f218825d8eb', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/popup.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(25, 'e10820641c9a9d60ef69460e7142448b5473ddee', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/show.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(26, '8ad8d0100201a0fed6087fd1a0eba232f53db9f1', '/var/www/projects/appflower_studio/plugins/appFlowerPlugin/modules/test/config/showZone.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08'),
(27, 'a61a2075d15006de1c886c0e6eea1e10979aa39a', '/var/www/projects/appflower_studio/plugins/appFlowerStudioPlugin/modules/appFlowerStudio/config/test.xml', '2010-12-10 20:34:08', '2010-12-10 20:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `af_widget_category`
--

CREATE TABLE IF NOT EXISTS `af_widget_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(128) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_widget_category_I_1` (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `af_widget_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `af_widget_help_settings`
--

CREATE TABLE IF NOT EXISTS `af_widget_help_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `widget_help_is_enabled` tinyint(4) DEFAULT '1',
  `popup_help_is_enabled` tinyint(4) DEFAULT '1',
  `help_type` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `af_widget_help_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `af_widget_selector`
--

CREATE TABLE IF NOT EXISTS `af_widget_selector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) DEFAULT NULL,
  `params` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_widget_selector_I_1` (`url`),
  KEY `af_widget_selector_FI_1` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `af_widget_selector`
--


-- --------------------------------------------------------

--
-- Table structure for table `af_widget_setting`
--

CREATE TABLE IF NOT EXISTS `af_widget_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `setting` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `af_widget_setting`
--


-- --------------------------------------------------------

--
-- Table structure for table `resource_attribute_version`
--

CREATE TABLE IF NOT EXISTS `resource_attribute_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(255) NOT NULL,
  `attribute_value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resource_attribute_version`
--


-- --------------------------------------------------------

--
-- Table structure for table `resource_attribute_version_hash`
--

CREATE TABLE IF NOT EXISTS `resource_attribute_version_hash` (
  `resource_attribute_version_id` int(11) NOT NULL,
  `resource_version_id` int(11) NOT NULL,
  `is_modified` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`resource_attribute_version_id`,`resource_version_id`),
  KEY `resource_attribute_version_hash_FI_2` (`resource_version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_attribute_version_hash`
--


-- --------------------------------------------------------

--
-- Table structure for table `resource_version`
--

CREATE TABLE IF NOT EXISTS `resource_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_id` int(11) NOT NULL,
  `resource_name` varchar(255) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `resource_version_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resource_version_index` (`resource_id`,`resource_name`),
  KEY `resource_version_FI_1` (`resource_version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resource_version`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_combine`
--

CREATE TABLE IF NOT EXISTS `sf_combine` (
  `assets_key` varchar(32) NOT NULL,
  `files` text NOT NULL,
  PRIMARY KEY (`assets_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sf_combine`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_combine_server`
--

CREATE TABLE IF NOT EXISTS `sf_combine_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `online` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_combine_server`
--


-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE IF NOT EXISTS `timezones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `offset` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timezones_I_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id`, `name`, `offset`, `created_at`, `updated_at`) VALUES
(1, 'Greenwich Mean Time (GMT) Dublin, Edinburgh, Lisbon, London, Casablanca, Monrovia', 0, '2009-11-24 13:51:20', '2009-11-24 13:51:20'),
(2, 'Afghanistan Standard Time (GMT+04:30) Kabul', 16200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(3, 'Alaskan Standard Time (GMT-09:00) Alaska', 32400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(4, 'Arab Standard Time (GMT+03:00) Kuwait, Riyadh', 10800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(5, 'Arabian Standard Time (GMT+04:00) Abu Dhabi, Muscat', 14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(6, 'Arabic Standard Time (GMT+03:00) Baghdad', 10800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(7, 'Atlantic Standard Time (GMT-04:00) Atlantic Time (Canada)', -14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(8, 'AUS Central Standard Time (GMT+09:30) Darwin', 34200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(9, 'AUS Eastern Standard Time (GMT+10:00) Canberra, Melbourne, Sydney', 36000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(10, 'Azerbaijan Standard Time (GMT +04:00) Baku', 14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(11, 'Azores Standard Time (GMT-01:00) Azores', -3600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(12, 'Canada Central Standard Time (GMT-06:00) Saskatchewan', -21600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(13, 'Cape Verde Standard Time (GMT-01:00) Cape Verde Islands', -3600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(14, 'Caucasus Standard Time (GMT+04:00) Yerevan', 14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(15, 'Cen. Australia Standard Time (GMT+09:30) Adelaide', 34200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(16, 'Central America Standard Time (GMT-06:00) Central America', -21600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(17, 'Central Asia Standard Time (GMT+06:00) Astana, Dhaka', 21600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(18, 'Central Brazilian Standard Time (GMT -04:00) Manaus', -14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(19, 'Central Europe Standard Time (GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague', 3600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(20, 'Central European Standard Time (GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb', 3600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(21, 'Central Pacific Standard Time (GMT+11:00) Magadan, Solomon Islands, New Caledonia', 39600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(22, 'Central Standard Time (GMT-06:00) Central Time (US and Canada)', -21600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(23, 'Central Standard Time (Mexico) (GMT-06:00) Guadalajara, Mexico City, Monterrey', -21600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(24, 'China Standard Time (GMT+08:00) Beijing, Chongqing, Hong Kong SAR, Urumqi', 28800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(25, 'Dateline Standard Time (GMT-12:00) International Date Line West', -43200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(26, 'E. Africa Standard Time (GMT+03:00) Nairobi', 10800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(27, 'E. Australia Standard Time (GMT+10:00) Brisbane', 36000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(28, 'E. Europe Standard Time (GMT+02:00) Minsk', 7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(29, 'E. South America Standard Time (GMT-03:00) Brasilia', -10800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(30, 'Eastern Standard Time (GMT-05:00) Eastern Time (US and Canada)', -18000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(31, 'Egypt Standard Time (GMT+02:00) Cairo', 7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(32, 'Ekaterinburg Standard Time (GMT+05:00) Ekaterinburg', 18000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(33, 'Fiji Standard Time (GMT+12:00) Fiji Islands, Kamchatka, Marshall Islands', 43200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(34, 'FLE Standard Time (GMT+02:00) Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius', 7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(35, 'Georgian Standard Time (GMT +04:00) Tblisi', 14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(36, 'Greenland Standard Time (GMT-03:00) Greenland', -10800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(37, 'GTB Standard Time (GMT+02:00) Athens, Bucharest, Istanbul', 7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(38, 'Hawaiian Standard Time (GMT-10:00) Hawaii', -36000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(39, 'India Standard Time (GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi', 19800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(40, 'Iran Standard Time (GMT+03:30) Tehran', 12600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(41, 'Israel Standard Time (GMT+02:00) Jerusalem', 7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(42, 'Korea Standard Time (GMT+09:00) Seoul', 32400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(43, 'Mid-Atlantic Standard Time (GMT-02:00) Mid-Atlantic', -7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(44, 'Mountain Standard Time (GMT-07:00) Mountain Time (US and Canada)', -25200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(45, 'Mountain Standard Time (Mexico) (GMT-07:00) Chihuahua, La Paz, Mazatlan', -25200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(46, 'Myanmar Standard Time (GMT+06:30) Yangon (Rangoon)', 23400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(47, 'N. Central Asia Standard Time (GMT+06:00) Almaty, Novosibirsk', 21600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(48, 'Namibia Standard Time (GMT +02:00) Windhoek', 7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(49, 'Nepal Standard Time (GMT+05:45) Kathmandu', 20700, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(50, 'New Zealand Standard Time (GMT+12:00) Auckland, Wellington', 43200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(51, 'Newfoundland Standard Time (GMT-03:30) Newfoundland and Labrador', -12600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(52, 'North Asia East Standard Time (GMT+08:00) Irkutsk, Ulaanbaatar', 28800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(53, 'North Asia Standard Time (GMT+07:00) Krasnoyarsk', 25200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(54, 'Pacific SA Standard Time (GMT-04:00) Santiago', -14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(55, 'Pacific Standard Time (GMT-08:00) Pacific Time (US and Canada); Tijuana', -28800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(56, 'Romance Standard Time (GMT+01:00) Brussels, Copenhagen, Madrid, Paris', 3600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(57, 'Russian Standard Time (GMT+03:00) Moscow, St. Petersburg, Volgograd', 10800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(58, 'SA Eastern Standard Time (GMT-03:00) Buenos Aires, Georgetown', -10800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(59, 'SA Pacific Standard Time (GMT-05:00) Bogota, Lima, Quito', -18000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(60, 'SA Western Standard Time (GMT-04:00) Caracas, La Paz', -14400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(61, 'Samoa Standard Time (GMT-11:00) Midway Island, Samoa', -39600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(62, 'SE Asia Standard Time (GMT+07:00) Bangkok, Hanoi, Jakarta', 25200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(63, 'Singapore Standard Time (GMT+08:00) Kuala Lumpur, Singapore', 28800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(64, 'South Africa Standard Time (GMT+02:00) Harare, Pretoria', 7200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(65, 'Sri Lanka Standard Time (GMT+06:00) Sri Jayawardenepura', 21600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(66, 'Taipei Standard Time (GMT+08:00) Taipei', 28800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(67, 'Tasmania Standard Time (GMT+10:00) Hobart', 36000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(68, 'Tokyo Standard Time (GMT+09:00) Osaka, Sapporo, Tokyo', 32400, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(69, 'Tonga Standard Time (GMT+13:00) Nuku''alofa', 46800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(70, 'US Eastern Standard Time (GMT-05:00) Indiana (East)', -18000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(71, 'US Mountain Standard Time (GMT-07:00) Arizona', -25200, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(72, 'Vladivostok Standard Time (GMT+10:00) Vladivostok', 36000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(73, 'W. Australia Standard Time (GMT+08:00) Perth', 28800, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(74, 'W. Central Africa Standard Time (GMT+01:00) West Central Africa', 3600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(75, 'W. Europe Standard Time (GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna', 3600, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(76, 'West Asia Standard Time (GMT+05:00) Islamabad, Karachi, Tashkent', 18000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(77, 'West Pacific Standard Time (GMT+10:00) Guam, Port Moresby', 36000, '2009-11-24 13:51:32', '2009-11-24 13:51:32'),
(78, 'Yakutsk Standard Time (GMT+09:00) Yakutsk', 32400, '2009-11-24 13:51:32', '2009-11-24 13:51:32');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afs_notification`
--
ALTER TABLE `afs_notification`
  ADD CONSTRAINT `afs_notification_FK_1` FOREIGN KEY (`user_id`) REFERENCES `af_guard_user` (`id`);

--
-- Constraints for table `af_guard_group_permission`
--
ALTER TABLE `af_guard_group_permission`
  ADD CONSTRAINT `af_guard_group_permission_FK_1` FOREIGN KEY (`group_id`) REFERENCES `af_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `af_guard_group_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `af_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_guard_remember_key`
--
ALTER TABLE `af_guard_remember_key`
  ADD CONSTRAINT `af_guard_remember_key_FK_1` FOREIGN KEY (`user_id`) REFERENCES `af_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_guard_user_group`
--
ALTER TABLE `af_guard_user_group`
  ADD CONSTRAINT `af_guard_user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `af_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `af_guard_user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `af_guard_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_guard_user_permission`
--
ALTER TABLE `af_guard_user_permission`
  ADD CONSTRAINT `af_guard_user_permission_FK_1` FOREIGN KEY (`user_id`) REFERENCES `af_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `af_guard_user_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `af_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_guard_user_profile`
--
ALTER TABLE `af_guard_user_profile`
  ADD CONSTRAINT `af_guard_user_profile_FK_1` FOREIGN KEY (`user_id`) REFERENCES `af_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `af_guard_user_profile_FK_2` FOREIGN KEY (`timezones_id`) REFERENCES `timezones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_widget_selector`
--
ALTER TABLE `af_widget_selector`
  ADD CONSTRAINT `af_widget_selector_FK_1` FOREIGN KEY (`category_id`) REFERENCES `af_widget_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_attribute_version_hash`
--
ALTER TABLE `resource_attribute_version_hash`
  ADD CONSTRAINT `resource_attribute_version_hash_FK_1` FOREIGN KEY (`resource_attribute_version_id`) REFERENCES `resource_attribute_version` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resource_attribute_version_hash_FK_2` FOREIGN KEY (`resource_version_id`) REFERENCES `resource_version` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_version`
--
ALTER TABLE `resource_version`
  ADD CONSTRAINT `resource_version_FK_1` FOREIGN KEY (`resource_version_id`) REFERENCES `resource_version` (`id`) ON DELETE CASCADE;
