#!/bin/sh

DIR=$(dirname $0)

date

echo Setting root dir for project
cd $DIR/../

echo SVN cleanup
rm -rf lock.log
find ./ -name "lock" >> lock.log
FILES=`cat lock.log`

for file in $FILES
do
  rm -rf $file
done

rm -f ./config/schema.yml
svn up
./symfony propel:build-model
./symfony cc
chmod 777 ./config/schema.yml
