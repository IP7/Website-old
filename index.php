<?php

// Limonade
require_once 'lib/vendors/limonade/limonade.php';

option('controllers_dir', dirname(__FILE__).'/controllers');

dispatch('/', 'display_home');
dispatch('/home', 'display_home');

run();

?>

