#!/bin/sh

CLEANUP=( "./plugins/afGuardPlugin" "./plugins/appFlowerPlugin" "./plugins/appFlowerStudioPlugin" "./plugins/sfPropelSqlDiffPlugin" "./plugins" "./lib/vendor/symfony" "./lib/vendor" "." )


DIR=$(dirname $0)
cd $DIR/../
date
rm -f ./config/schema.yml
echo SVN cleanup
for (( i = 0 ; i < ${#CLEANUP[@]} ; i++ ))
do
	svn cleanup ${CLEANUP[$i]}
	echo ${CLEANUP[$i]} cleaned up
done
svn up
./symfony propel:build-model
./symfony cc
chmod 777 ./config/schema.yml
