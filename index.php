<?php

# Config
require_once 'config.php';
Config::init();

# Helpers
require_once 'helpers/tpl.php';

# Routes
dispatch('/', 'display_home');
dispatch('/home', 'display_home');

run();

?>

