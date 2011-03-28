#!/bin/sh

DIR=$(dirname $0)

date

echo Setting root dir for project
cd $DIR/../

echo Updating from GitHub repo
git checkout ./config/schema.yml
git fetch
git stash
git merge origin/master
git stash pop

cd plugins/appFlowerStudioPlugin
git stash
cd ../..
git submodule update
cd plugins/appFlowerStudioPlugin
git stash pop
cd ../..

echo Building model and cc
./symfony propel:build-model
./symfony appflower:validator-cache frontend cache yes
./symfony cc
./symfony afs:fix-perms
