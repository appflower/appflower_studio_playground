CREATE TABLE IF NOT EXISTS `af_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `message` text,
  `log` text,
  `type` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `persistent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_for` int(11) DEFAULT NULL,
  `remote_ip` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_notification_FI_1` (`created_by`),
  KEY `af_notification_FI_2` (`created_for`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `af_notified_for` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_notified_for_FI_1` (`user`),
  KEY `af_notified_for_FI_2` (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `af_portal_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_xml` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `layout_type` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_portal_state_FI_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;


CREATE TABLE IF NOT EXISTS `af_save_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `filter` text,
  PRIMARY KEY (`id`),
  KEY `af_save_filter_FI_1` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `af_validator_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signature` varchar(40) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_validator_cache_I_1` (`signature`),
  KEY `af_validator_cache_I_2` (`path`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;


CREATE TABLE IF NOT EXISTS `af_widget_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(128) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_widget_category_I_1` (`module`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;


CREATE TABLE IF NOT EXISTS `af_widget_selector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) DEFAULT NULL,
  `params` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `af_widget_selector_I_1` (`url`),
  KEY `af_widget_selector_FI_1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;


CREATE TABLE IF NOT EXISTS `af_widget_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `setting` text,
  PRIMARY KEY (`id`),
  KEY `af_widget_setting_FI_1` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `resource_attribute_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(255) NOT NULL,
  `attribute_value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `resource_attribute_version_hash` (
  `resource_attribute_version_id` int(11) NOT NULL,
  `resource_version_id` int(11) NOT NULL,
  `is_modified` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`resource_attribute_version_id`,`resource_version_id`),
  KEY `resource_attribute_version_hash_FI_2` (`resource_version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


CREATE TABLE IF NOT EXISTS `sf_combine` (
  `assets_key` varchar(32) NOT NULL,
  `files` text NOT NULL,
  PRIMARY KEY (`assets_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `sf_combine_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `online` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_group_U_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `sf_guard_group` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Administrator group');


CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_FI_2` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`) VALUES
(1, 1);


CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_permission_U_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;


INSERT INTO `sf_guard_permission` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator permission');


CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `user_id` int(11) NOT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `sf_guard_user` (
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
  UNIQUE KEY `sf_guard_user_U_1` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;


INSERT INTO `sf_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `created_at`, `last_login`, `is_active`, `is_super_admin`) VALUES
(1, 'admin', 'sha1', 'b47bbb81ce8e8b6dc055408cd570b29e', '279e489fd155d706f1b9f690122c53f0404db431', '2007-06-24 20:18:21', '2010-03-25 06:09:51', 1, 1);


CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_FI_2` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`) VALUES
(1, 1);


CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_FI_2` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `sf_guard_user_profile` (
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
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
  `en_ticket_resolutions` varchar(255) DEFAULT NULL,
  `en_assigned_to` tinyint(4) DEFAULT NULL,
  `en_reporter` tinyint(4) DEFAULT NULL,
  `en_ticket_updated` tinyint(4) DEFAULT NULL,
  `en_dont_send` tinyint(4) DEFAULT NULL,
  `en_daily_project` tinyint(4) DEFAULT NULL,
  `en_weekly_project` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `sf_guard_user_profile_FI_2` (`customer_id`),
  KEY `sf_guard_user_profile_FI_3` (`timezones_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `sf_guard_user_profile` (`user_id`, `customer_id`, `timezones_id`, `first_name`, `last_name`, `job_title`, `phone_mobile`, `phone_office`, `personal_body`, `image`, `is_developer`, `widget_help_is_enabled`, `en_ticket_resolutions`, `en_assigned_to`, `en_reporter`, `en_ticket_updated`, `en_dont_send`, `en_daily_project`, `en_weekly_project`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Admin', '', '', '', '', '', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2007-07-23 21:42:10', '2007-07-23 21:42:10');


CREATE TABLE IF NOT EXISTS `timezones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `offset` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timezones_I_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;


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
-- Constraints for table `af_notification`
--
ALTER TABLE `af_notification`
  ADD CONSTRAINT `af_notification_FK_1` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `af_notification_FK_2` FOREIGN KEY (`created_for`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `af_notified_for`
--
ALTER TABLE `af_notified_for`
  ADD CONSTRAINT `af_notified_for_FK_1` FOREIGN KEY (`user`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `af_notified_for_FK_2` FOREIGN KEY (`notification_id`) REFERENCES `af_notification` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_portal_state`
--
ALTER TABLE `af_portal_state`
  ADD CONSTRAINT `af_portal_state_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_save_filter`
--
ALTER TABLE `af_save_filter`
  ADD CONSTRAINT `af_save_filter_FK_1` FOREIGN KEY (`user`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_widget_selector`
--
ALTER TABLE `af_widget_selector`
  ADD CONSTRAINT `af_widget_selector_FK_1` FOREIGN KEY (`category_id`) REFERENCES `af_widget_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `af_widget_setting`
--
ALTER TABLE `af_widget_setting`
  ADD CONSTRAINT `af_widget_setting_FK_1` FOREIGN KEY (`user`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_FK_1` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_profile`
--
ALTER TABLE `sf_guard_user_profile`
  ADD CONSTRAINT `sf_guard_user_profile_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_profile_FK_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_profile_FK_3` FOREIGN KEY (`timezones_id`) REFERENCES `timezones` (`id`) ON DELETE CASCADE;
