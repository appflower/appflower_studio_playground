#!/bin/sh

DIR=$(dirname $0)
CURRENT_DATE=`eval date +%Y%m%d`

TABLES=( "changelog" "sf_guard_group" "sf_guard_group_permission" "sf_guard_permission" "sf_guard_remember_key" "sf_guard_user" "sf_guard_user_group" "sf_guard_user_permission" "sf_guard_user_profile" "timezones" "af_portal_state" "af_widget_category" "af_widget_setting" "af_widget_selector" "af_save_filter" "af_notification" "af_notified_for" )

echo Setting root dir for project
cd $DIR/../

DB_NAME=`cat ./config/databases.yml | grep dbname= | sed -n '/dbname=/,/\;host=/p' | sed -e '1s/.*dbname=//' -e '$s/\;host=.*//' | sed 's/^ *//;s/ *$//'`
DB_USER=`cat ./config/databases.yml | grep username: | sed -n '/username:\ /,//p' | sed -e '1s/.*username:\ //' -e '$s/\.*//' | sed 's/^ *//;s/ *$//'`
DB_PASS=`cat ./config/databases.yml | grep password: | sed -n '/password:\ /,//p' | sed -e '1s/.*password:\ //' -e '$s/\.*//' | sed 's/^ *//;s/ *$//'`

echo Creating sync dir for current date $CURRENT_DATE
mkdir ./data/sql/$CURRENT_DATE/

echo Clearing Symfony Cache
./symfony cc

echo Dump current tables data from $DB_NAME
for (( i = 0 ; i < ${#TABLES[@]} ; i++ ))
do
	mysqldump --user=$DB_USER --password=$DB_PASS --no-create-info --lock-tables --quick --complete-insert $DB_NAME ${TABLES[$i]} > ./data/sql/$CURRENT_DATE/${TABLES[$i]}.sql
	echo ${TABLES[$i]} dumped
done

echo Dump current database from $DB_NAME
mysqldump --user=$DB_USER --password=$DB_PASS --opt --complete-insert $DB_NAME > ./data/sql/$CURRENT_DATE/$DB_NAME.sql

echo Dropping database
mysqladmin -u$DB_USER -p$DB_PASS -f drop $DB_NAME

echo Creating database
mysqladmin -u$DB_USER -p$DB_PASS create $DB_NAME

echo Setting database to UTF8 encoding
echo "ALTER DATABASE $DB_NAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;" | mysql -u $DB_USER -p$DB_PASS $DB_NAME

echo Deleting old models
rm -rf ./lib/model/om/*.php
rm -rf ./lib/model/map/*.php
rm -rf ./plugins/appFlowerPlugin/lib/model/om/*.php
rm -rf ./plugins/appFlowerPlugin/lib/model/map/*.php

echo Building SQL Model
./symfony propel:build-model

echo Building SQL
./symfony propel:build-sql

echo Inserting SQL
./symfony propel:insert-sql --no-confirmation

echo Loading data
for (( i = 0 ; i < ${#TABLES[@]} ; i++ ))
do
	mysql -u $DB_USER -p$DB_PASS $DB_NAME < ./data/sql/$CURRENT_DATE/${TABLES[$i]}.sql
	echo ${TABLES[$i]} restored
done

echo Fixing permissions
./symfony fix-perms

echo Generating validator cache
./symfony appflower:validator-cache frontend cache yes

echo Clearing Symfony Cache
./symfony cc
