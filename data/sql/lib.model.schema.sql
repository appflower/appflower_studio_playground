
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
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
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_profile_FI_2` (`timezones_id`),
	CONSTRAINT `sf_guard_user_profile_FK_2`
		FOREIGN KEY (`timezones_id`)
		REFERENCES `timezones` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- changelog
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `changelog`;


CREATE TABLE `changelog`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`object_id` INTEGER default 0 NOT NULL,
	`object_name` VARCHAR(255) default 'null' NOT NULL,
	`object_change_type` VARCHAR(2) default '0' NOT NULL,
	`object_link` VARCHAR(255),
	`module_name` VARCHAR(255) default 'null' NOT NULL,
	`changes` TEXT  NOT NULL,
	`user_commit_msg` TEXT  NOT NULL,
	`user_id` INTEGER default 0 NOT NULL,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `changelog_FI_1` (`user_id`),
	CONSTRAINT `changelog_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

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
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
