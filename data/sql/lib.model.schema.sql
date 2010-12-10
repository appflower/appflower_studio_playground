
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- af_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `af_guard_user_profile`;


CREATE TABLE `af_guard_user_profile`
(
	`user_id` INTEGER  NOT NULL,
	`timezones_id` INTEGER,
	`first_name` VARCHAR(20),
	`last_name` VARCHAR(20),
	`job_title` VARCHAR(255),
	`phone_mobile` VARCHAR(255),
	`phone_office` VARCHAR(255),
	`personal_body` TEXT,
	`image` VARCHAR(255),
	`is_developer` TINYINT,
	`widget_help_is_enabled` TINYINT default 1,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`user_id`),
	CONSTRAINT `af_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `af_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `af_guard_user_profile_FI_2` (`timezones_id`),
	CONSTRAINT `af_guard_user_profile_FK_2`
		FOREIGN KEY (`timezones_id`)
		REFERENCES `timezones` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- timezones
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `timezones`;


CREATE TABLE `timezones`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(128),
	`offset` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `timezones_I_1`(`name`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
