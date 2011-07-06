
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.

#-----------------------------------------------------------------------------
#-- afs_notification
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `afs_notification`;


CREATE TABLE `afs_notification`
(
	`message` VARCHAR(255)  NOT NULL,
	`message_type` VARCHAR(255)  NOT NULL,
	`user` VARCHAR(128)  NOT NULL,
	`ip` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	`id` INTEGER PRIMARY KEY AUTOINCREMENT
);

# This restores the fkey checks, after having unset them earlier
