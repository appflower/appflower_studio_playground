#!/bin/sh

DIR=$(dirname $0)

echo Setting root dir for project
cd $DIR/../

DB_NAME=`cat ./config/databases.yml | grep dbname= | sed -n '/dbname=/,/\;host=/p' | sed -e '1s/.*dbname=//' -e '$s/\;host=.*//' | sed 's/^ *//;s/ *$//'`
DB_USER=`cat ./config/databases.yml | grep username: | sed -n '/username:\ /,//p' | sed -e '1s/.*username:\ //' -e '$s/\.*//' | sed 's/^ *//;s/ *$//'`
DB_PASS=`cat ./config/databases.yml | grep password: | sed -n '/password:\ /,//p' | sed -e '1s/.*password:\ //' -e '$s/\.*//' | sed 's/^ *//;s/ *$//'`

echo Clearing Symfony Cache
./symfony cc

echo Building SQL Model
./symfony propel:build-model

echo Inserting SQL
./symfony propel:insert-sql-diff frontend