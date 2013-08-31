#! /bin/env bash
#
# This script is run by Travis CI before the test script. It set up the DB and
# some other things.
#

echo -- Updating Composer
composer self-update
echo -- Installing the dependencies
composer install --dev

echo -- Creating the DB
mysql -e 'create database myapp_test;'

echo -- Generating the DB schema
sed -e 's/infop7db/myapp_test/g' models/schema.xml > tmp
mv tmp models/schema.xml

echo -- Setting-up Propel files
cp tests/buildtime-conf.xml models/buildtime-conf.xml
cp tests/buildtime-conf.xml models/runtime-conf.xml

echo -- Generating the model classes
cd models
rm -rf build/conf
rm -rf build/migrations
rm -rf build/sql
rm -rf build/classes/ip7website/map
rm -rf build/classes/ip7website/om
../vendor/propel/propel1/generator/bin/propel-gen

echo -- Generating the tables
mysql -e 'use myapp_test;\. build/sql/schema.sql'

echo -- Done.
