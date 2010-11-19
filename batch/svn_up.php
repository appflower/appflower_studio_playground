#!/bin/sh

DIR=$(dirname $0)
cd $DIR/../
date
svn up
./symfony propel:build-model
./symfony cc