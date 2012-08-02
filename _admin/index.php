<?php

# Config
require_once 'adminconfig.php';
AdminConfig::init();

# Routes
dispatch('/', 'display_admin_home');

dispatch_post('/', 'post_connection');

run();

?>

