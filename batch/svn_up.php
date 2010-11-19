#!/bin/sh

DIR=$(dirname $0)
cd $DIR/../
date
rm -f ./config/schema.yml
svn up
./symfony propel:build-model
./symfony cc