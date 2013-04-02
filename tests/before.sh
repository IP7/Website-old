#! /bin/env bash
#
# This script is run by Travis CI before the test script. It set up the DB and
# some other things.
#

echo -- Installing Propel
pear channel-discover pear.propelorm.org
pear install -a propel/propel_generator
pear install -a propel/propel_runtime

echo -- Creating the DB
mysql -u root -e 'create database infop7db_test;'

echo -- Creating the user
mysql -u root -e 'create user infop7user;grant all on infop7db_test.* to infop7user;'

cd models

echo -- Generating the DB schema
sed -e 's/infop7db/infop7db_test/g' schema.xml > tmp
mv tmp schema.xml

echo -- Setting-up Propel files
cp {tests,models}/buildtime-conf.xml
cp {tests,models}/runtime-conf.xml

echo -- Generating the model classes
rm -rf build
propel-gen

echo -- Generating the tables
mysql -u infop7user -e '\. build/sql/schema.sql;'

echo -- Done.
