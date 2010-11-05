#!/bin/sh

DIR=$(dirname $0)

echo Setting root dir for project
cd $DIR/../

DB_NAME=`cat ./config/databases.yml | grep dbname= | sed -n '/dbname=/,/\;host=/p' | sed -e '1s/.*dbname=//' -e '$s/\;host=.*//' | sed 's/^ *//;s/ *$//'`
DB_USER=`cat ./config/databases.yml | grep username: | sed -n '/username:\ /,//p' | sed -e '1s/.*username:\ //' -e '$s/\.*//' | sed 's/^ *//;s/ *$//'`
DB_PASS=`cat ./config/databases.yml | grep password: | sed -n '/password:\ /,//p' | sed -e '1s/.*password:\ //' -e '$s/\.*//' | sed 's/^ *//;s/ *$//'`

echo Clearing Symfony Cache
./symfony cc

echo Dropping database
mysqladmin -u$DB_USER -p$DB_PASS -f drop $DB_NAME

echo Creating database
mysqladmin -u$DB_USER -p$DB_PASS create $DB_NAME

echo Setting database to UTF8 encoding
echo "ALTER DATABASE $DB_NAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;" | mysql -u $DB_USER -p$DB_PASS $DB_NAME

echo Deleting old models
rm -rf ./lib/model/om/*.php
rm -rf ./lib/model/map/*.php

echo Building SQL Model
./symfony propel:build-model

echo Building SQL
./symfony propel:build-sql

echo Inserting SQL
./symfony propel:insert-sql --no-confirmation

echo Loading data
mysql -u $DB_USER -p$DB_PASS $DB_NAME < ./data/sql/first-load.sql

echo Fixing permissions
./symfony fix-perms

echo Generating validator cache
./symfony appflower:validator-cache frontend cache yes

echo Clearing Symfony Cache
./symfony cc
