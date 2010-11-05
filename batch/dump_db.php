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

echo Dump current tables data from $DB_NAME
for (( i = 0 ; i < ${#TABLES[@]} ; i++ ))
do
	mysqldump --user=$DB_USER --password=$DB_PASS --no-create-info --lock-tables --quick --complete-insert $DB_NAME ${TABLES[$i]} > ./data/sql/$CURRENT_DATE/${TABLES[$i]}.sql
	echo ${TABLES[$i]} dumped
done

echo Dump current database from $DB_NAME
mysqldump --user=$DB_USER --password=$DB_PASS --opt --complete-insert $DB_NAME > ./data/sql/$CURRENT_DATE/$DB_NAME.sql