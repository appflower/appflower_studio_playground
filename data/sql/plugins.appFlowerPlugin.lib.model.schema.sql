
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_combine
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_combine`;


CREATE TABLE `sf_combine`
(
	`assets_key` VARCHAR(32)  NOT NULL,
	`files` TEXT  NOT NULL,
	PRIMARY KEY (`assets_key`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_combine_server
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_combine_server`;


CREATE TABLE `sf_combine_server`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`online` TINYINT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_portal_state
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_portal_state`;


CREATE TABLE `af_portal_state`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_xml` VARCHAR(255),
	`user_id` INTEGER,
	`layout_type` VARCHAR(255),
	`content` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `af_portal_state_FI_1` (`user_id`),
	CONSTRAINT `af_portal_state_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_widget_setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_widget_setting`;


CREATE TABLE `af_widget_setting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`user` INTEGER,
	`setting` TEXT,
	PRIMARY KEY (`id`),
	INDEX `af_widget_setting_FI_1` (`user`),
	CONSTRAINT `af_widget_setting_FK_1`
		FOREIGN KEY (`user`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_widget_selector
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_widget_selector`;


CREATE TABLE `af_widget_selector`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(128),
	`params` VARCHAR(255),
	`category_id` INTEGER,
	`permission` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `af_widget_selector_I_1`(`url`),
	INDEX `af_widget_selector_FI_1` (`category_id`),
	CONSTRAINT `af_widget_selector_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `af_widget_category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_widget_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_widget_category`;


CREATE TABLE `af_widget_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`module` VARCHAR(128),
	`name` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `af_widget_category_I_1`(`module`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_validator_cache
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_validator_cache`;


CREATE TABLE `af_validator_cache`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`signature` VARCHAR(40),
	`path` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `af_validator_cache_I_1`(`signature`),
	KEY `af_validator_cache_I_2`(`path`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_save_filter
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_save_filter`;


CREATE TABLE `af_save_filter`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`user` INTEGER,
	`path` VARCHAR(255),
	`title` VARCHAR(255),
	`filter` TEXT,
	PRIMARY KEY (`id`),
	INDEX `af_save_filter_FI_1` (`user`),
	CONSTRAINT `af_save_filter_FK_1`
		FOREIGN KEY (`user`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_notification
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_notification`;


CREATE TABLE `af_notification`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`message` TEXT,
	`log` TEXT,
	`type` VARCHAR(255),
	`duration` INTEGER,
	`category` INTEGER,
	`persistent` INTEGER,
	`created_by` INTEGER,
	`created_for` INTEGER,
	`remote_ip` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `af_notification_FI_1` (`created_by`),
	CONSTRAINT `af_notification_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `af_notification_FI_2` (`created_for`),
	CONSTRAINT `af_notification_FK_2`
		FOREIGN KEY (`created_for`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- af_notified_for
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_notified_for`;


CREATE TABLE `af_notified_for`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user` INTEGER,
	`notification_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `af_notified_for_FI_1` (`user`),
	CONSTRAINT `af_notified_for_FK_1`
		FOREIGN KEY (`user`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `af_notified_for_FI_2` (`notification_id`),
	CONSTRAINT `af_notified_for_FK_2`
		FOREIGN KEY (`notification_id`)
		REFERENCES `af_notification` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
