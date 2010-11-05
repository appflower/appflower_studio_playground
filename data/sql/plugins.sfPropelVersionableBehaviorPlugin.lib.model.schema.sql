
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- resource_version
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `resource_version`;


CREATE TABLE `resource_version`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`resource_id` INTEGER  NOT NULL,
	`resource_name` VARCHAR(255)  NOT NULL,
	`number` INTEGER(11),
	`title` VARCHAR(255),
	`comment` TEXT,
	`created_by` VARCHAR(255),
	`created_at` DATETIME,
	`resource_version_id` INTEGER(11),
	PRIMARY KEY (`id`),
	KEY `resource_version_index`(`resource_id`, `resource_name`),
	INDEX `resource_version_FI_1` (`resource_version_id`),
	CONSTRAINT `resource_version_FK_1`
		FOREIGN KEY (`resource_version_id`)
		REFERENCES `resource_version` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- resource_attribute_version
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `resource_attribute_version`;


CREATE TABLE `resource_attribute_version`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`attribute_name` VARCHAR(255)  NOT NULL,
	`attribute_value` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- resource_attribute_version_hash
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `resource_attribute_version_hash`;


CREATE TABLE `resource_attribute_version_hash`
(
	`resource_attribute_version_id` INTEGER(11)  NOT NULL,
	`resource_version_id` INTEGER(11)  NOT NULL,
	`is_modified` TINYINT,
	PRIMARY KEY (`resource_attribute_version_id`,`resource_version_id`),
	CONSTRAINT `resource_attribute_version_hash_FK_1`
		FOREIGN KEY (`resource_attribute_version_id`)
		REFERENCES `resource_attribute_version` (`id`)
		ON DELETE CASCADE,
	INDEX `resource_attribute_version_hash_FI_2` (`resource_version_id`),
	CONSTRAINT `resource_attribute_version_hash_FK_2`
		FOREIGN KEY (`resource_version_id`)
		REFERENCES `resource_version` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
