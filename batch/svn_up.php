#!/bin/sh

CLEANUP=( "./plugins/afGuardPlugin" "./plugins/appFlowerPlugin" "./plugins/appFlowerStudioPlugin" "./plugins/sfPropelSqlDiffPlugin" "./plugins/sfCaptchaPlugin" "./plugins" "./lib/vendor/symfony" "./lib/vendor" "." )


DIR=$PWD
date
rm -f ./config/schema.yml
echo SVN cleanup
for (( i = 0 ; i < ${#CLEANUP[@]} ; i++ ))
do
	cd ${CLEANUP[$i]}
	svn cleanup
	cd $DIR
	echo ${CLEANUP[$i]} cleaned up
done
svn up
./symfony propel:build-model
./symfony cc
chmod 777 ./config/schema.yml
