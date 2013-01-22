#! /bin/bash

# execute the script from the git working directory
APP_DIR=.

CSS_DIR=$APP_DIR/views/static/styles
JS_DIR=$APP_DIR/views/static/scripts
SCRIPTS_DIR=$APP_DIR/scripts

# 1. Version number
echo -n '1. Version '

version=$(git log -n 1 --pretty=format:'%h')
echo -n "(Using @$version): "

sed "s/define('IP7WEBSITE_VERSION',\s\+'[0-9.]\+/\0@$version/" $APP_DIR/config.php > .deploy.tmp
cat .deploy.tmp > $APP_DIR/config.php
rm .deploy.tmp
echo 'done'

# 2. Minifying JS+CSS
echo '2. Minifying JS+CSS: '
node $SCRIPTS_DIR/minify.js

# 4. Deploying through FTP
#TODO
