<?php

$_SESSION = array();
$_SERVER['REQUEST_URI']  = '/';
$_SERVER['REQUEST_TIME'] = 42;

require_once __DIR__ . '/../config.php';
Config::init();

# Helpers
foreach (glob(__DIR__.'/../helpers/*.php') as $f) {
    require_once $f;
}
