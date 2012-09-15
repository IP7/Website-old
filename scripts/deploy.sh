#! /bin/bash

# execute the script from the git working directory
APP_DIR=.

CSS_DIR=$APP_DIR/views/static/styles
JS_DIR=$APP_DIR/views/static/scripts

# 1. Version number
echo -n '1. Version '

version=$(git log -n 1 --pretty=format:'%h')
echo -n "(Using @$version): "

sed "s/define('IP7WEBSITE_VERSION',\s\+'[0-9.]\+/\0@$version/" $APP_DIR/config.php > .deploy.tmp
cat .deploy.tmp > $APP_DIR/config.php
rm .deploy.tmp
echo 'done'

# 2. Minifying CSS
echo -n '2. Minifying CSS: '
rm -f $CSS_DIR/*.min.css

# Test if YUIcompressor is here
if [ ! -f yuicompressor-2.4.7.jar ]; then
    wget -q http://yui.zenfs.com/releases/yuicompressor/yuicompressor-2.4.7.zip
    unzip -qq yuicompressor-2.4.7.zip
    mv yuicompressor-2.4.7/build/yuicompressor-2.4.7.jar ./
    rm -Rf yuicompressor-2.4.7
fi

java -jar yuicompressor-2.4.7.jar -o '.css:.min.css' $CSS_DIR/*.css && echo 'done.'

# 3. Minifying JS
echo -n '2. Minifying JS: '
rm -f $CSS_DIR/*.min.js
java -jar yuicompressor-2.4.7.jar -o '.js:.min.js' $JS_DIR/*.js && echo 'done.'

# 4. Deploying through FTP
#TODO
