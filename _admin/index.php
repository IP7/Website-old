<?php

# Lib
require_once '../lib/vendors/Twig/Autoloader.php';
require_once 'lib/vendors/limonade/limonade.php';

# Config
require_once 'config.php';
Config::init();

# Helpers
require_once 'helpers/tpl.php';

# Routes
dispatch('/', 'display_admin_home');
dispatch('/home', 'display_admin_home');

run();

?>

