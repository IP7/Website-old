<?php

// return the current URL
function url() {
  return $_SERVER['REQUEST_URI'];
}

function config_url() {
    $u = url();
    return str_ireplace(Config::$root_uri, '', $u);
}

?>
