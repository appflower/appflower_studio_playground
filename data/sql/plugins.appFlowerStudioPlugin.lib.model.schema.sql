
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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
