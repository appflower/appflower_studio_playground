
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
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_combine_server
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_combine_server`;


CREATE TABLE `sf_combine_server`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`online` TINYINT,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

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
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

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
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

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
) ENGINE=InnoDB;

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
) ENGINE=InnoDB;

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
) ENGINE=InnoDB;

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
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- af_widget_help_settings
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_widget_help_settings`;


CREATE TABLE `af_widget_help_settings`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`widget_help_is_enabled` TINYINT default 1,
	`popup_help_is_enabled` TINYINT default 1,
	`help_type` TINYINT default 1,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
