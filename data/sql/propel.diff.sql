
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

CREATE TABLE `afs_notification`
(
	`message` VARCHAR(255)  NOT NULL,
	`message_type` VARCHAR(2) default '0' NOT NULL,
	`user_id` INTEGER default 0 NOT NULL,
	`ip` VARCHAR(2)  NOT NULL,
	`created_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `afs_notification_FI_1` (`user_id`),
	CONSTRAINT `afs_notification_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `af_guard_user` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `af_guard_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `af_guard_group_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `af_guard_permission`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `af_guard_permission_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `af_guard_group_permission`
(
	`group_id` INTEGER  NOT NULL,
	`permission_id` INTEGER  NOT NULL,
	PRIMARY KEY (`group_id`,`permission_id`),
	CONSTRAINT `af_guard_group_permission_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `af_guard_group` (`id`)
		ON DELETE CASCADE,
	INDEX `af_guard_group_permission_FI_2` (`permission_id`),
	CONSTRAINT `af_guard_group_permission_FK_2`
		FOREIGN KEY (`permission_id`)
		REFERENCES `af_guard_permission` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `af_guard_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(128)  NOT NULL,
	`algorithm` VARCHAR(128) default 'sha1' NOT NULL,
	`salt` VARCHAR(128)  NOT NULL,
	`password` VARCHAR(128)  NOT NULL,
	`created_at` DATETIME,
	`last_login` DATETIME,
	`is_active` TINYINT default 1 NOT NULL,
	`is_super_admin` TINYINT default 0 NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `af_guard_user_U_1` (`username`)
) ENGINE=InnoDB;

CREATE TABLE `af_guard_user_permission`
(
	`user_id` INTEGER  NOT NULL,
	`permission_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`permission_id`),
	CONSTRAINT `af_guard_user_permission_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `af_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `af_guard_user_permission_FI_2` (`permission_id`),
	CONSTRAINT `af_guard_user_permission_FK_2`
		FOREIGN KEY (`permission_id`)
		REFERENCES `af_guard_permission` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `af_guard_user_group`
(
	`user_id` INTEGER  NOT NULL,
	`group_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`group_id`),
	CONSTRAINT `af_guard_user_group_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `af_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `af_guard_user_group_FI_2` (`group_id`),
	CONSTRAINT `af_guard_user_group_FK_2`
		FOREIGN KEY (`group_id`)
		REFERENCES `af_guard_group` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `af_guard_remember_key`
(
	`user_id` INTEGER  NOT NULL,
	`remember_key` VARCHAR(32),
	`ip_address` VARCHAR(50)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`user_id`,`ip_address`),
	CONSTRAINT `af_guard_remember_key_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `af_guard_user` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;
/* old definition: int(11) NOT NULL
   new definition: INTEGER(11)  NOT NULL */
ALTER TABLE `resource_attribute_version_hash` CHANGE `resource_attribute_version_id` `resource_attribute_version_id` INTEGER(11)  NOT NULL;
/* old definition: int(11) NOT NULL
   new definition: INTEGER(11)  NOT NULL */
ALTER TABLE `resource_attribute_version_hash` CHANGE `resource_version_id` `resource_version_id` INTEGER(11)  NOT NULL;
/* old definition: int(11) DEFAULT NULL
   new definition: INTEGER(11) */
ALTER TABLE `resource_version` CHANGE `number` `number` INTEGER(11);
/* old definition: int(11) DEFAULT NULL
   new definition: INTEGER(11) */
ALTER TABLE `resource_version` CHANGE `resource_version_id` `resource_version_id` INTEGER(11);
