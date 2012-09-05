<?php

// return the current URL
function url() {
  return $_SERVER['REQUEST_URI'];
}

// return the current URL without the Config::$root_uri prefix
function config_url() {
    $u = url();
    return str_ireplace(Config::$root_uri, '', $u);
}

// return the URL of a cursus
function cursus_url($c) {
    return Config::$root_uri.'cursus/'.$c->getShortName();
}

?>
