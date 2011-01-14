
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- afs_notification
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `afs_notification`;


CREATE TABLE `afs_notification`
(
	`message` VARCHAR(255)  NOT NULL,
	`message_type` VARCHAR(255)  NOT NULL,
	`user` INTEGER(11) default 0 NOT NULL,
	`ip` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- afs_project
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `afs_project`;


CREATE TABLE `afs_project`
(
	`name` VARCHAR(255)  NOT NULL,
	`path` VARCHAR(255)  NOT NULL,
	`slug` VARCHAR(50)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `afs_project_U_1` (`slug`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
