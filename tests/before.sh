#! /bin/env bash
#
# This script is run by Travis CI before the test script. It set up the DB and
# some other things.
#

echo -- Installing the dependencies
composer install --dev

echo -- Creating the DB
mysql -u root -e 'create database infop7db_test;'

echo -- Creating the user
mysql -u root -e 'create user infop7user;grant all on infop7db_test.* to infop7user;'

echo -- Generating the DB schema
sed -e 's/infop7db/infop7db_test/g' models/schema.xml > tmp
mv tmp models/schema.xml

echo -- Setting-up Propel files
cp {tests,models}/buildtime-conf.xml
cp tests/buildtime-conf.xml models/runtime-conf.xml

cd models

echo -- Generating the model classes
rm -rf build
../vendor/propel/propel1/generator/bin/propel-gen

echo -- Generating the tables
mysql -u infop7user -e 'use infop7db_test;\. build/sql/schema.sql'

echo -- Done.
