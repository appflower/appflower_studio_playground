ALTER TABLE `afs_notification` ADD `user` INTEGER(11) default 0 NOT NULL;
ALTER TABLE `afs_notification` DROP FOREIGN KEY `afs_notification_FK_1`;
ALTER TABLE `afs_notification` DROP INDEX afs_notification_FI_1;
/* old definition: varchar(2) NOT NULL DEFAULT '0'
   new definition: VARCHAR(255)  NOT NULL */
ALTER TABLE `afs_notification` CHANGE `message_type` `message_type` VARCHAR(255)  NOT NULL;
ALTER TABLE `afs_notification` DROP `user_id`;
/* old definition: varchar(2) NOT NULL
   new definition: VARCHAR(255)  NOT NULL */
ALTER TABLE `afs_notification` CHANGE `ip` `ip` VARCHAR(255)  NOT NULL;
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
