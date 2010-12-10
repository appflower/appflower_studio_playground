SET foreign_key_checks = 0;
INSERT INTO `af_guard_group` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator group');

INSERT INTO `af_guard_group_permission` (`group_id`, `permission_id`) VALUES
(1, 1);

INSERT INTO `af_guard_permission` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator permission');

INSERT INTO `af_guard_remember_key` (`user_id`, `remember_key`, `ip_address`, `created_at`) VALUES
(1, '93aeeeb7c63bd4f13aa38aade8a8f4eb', '192.168.1.100', '2010-11-19 13:52:51');

INSERT INTO `af_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `created_at`, `last_login`, `is_active`, `is_super_admin`) VALUES
(1, 'admin', 'sha1', '74333eec3edd981fb5b74b13bc85ee78', '52fdccfb819d47b93169a3d1034eff6bdd89b402', '2010-02-19 16:46:52', '2010-11-19 15:55:35', 1, 1);

INSERT INTO `af_guard_user_group` (`user_id`, `group_id`) VALUES
(1, 1);

INSERT INTO `af_guard_user_profile` (`user_id`, `timezones_id`, `first_name`, `last_name`, `job_title`, `phone_mobile`, `phone_office`, `personal_body`, `image`, `is_developer`, `widget_help_is_enabled`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', '', '', '', '', '', NULL, NULL, 1, '2007-07-23 21:42:10', '2007-07-23 21:42:10');

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
SET foreign_key_checks = 1;