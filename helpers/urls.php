<?php

// return the current URL
function url() {
  return $_SERVER['REQUEST_URI'];
}

// return the current URL without the Config::$root_uri prefix
function config_url() {
    $u = url();
    $root_uri_len = strlen(Config::$root_uri);

    if (substr($u, 0, $root_uri_len) == Config::$root_uri) {
        $u = substr($u, $root_uri_len);
    }
    return $u;
}

// return the URL of a cursus
function cursus_url($c) {
    return Config::$root_uri.'cursus/'.$c->getShortName();
}

// return the URL of a course
function course_url($cursus, $course) {
    $u  = Config::$root_uri.'cursus/'.$cursus->getShortName();
    if ($course) { $u .= '/'.$course->getCode(); }

    return $u;
}

// return the URL of an user
function user_url($user) {
    return Config::$root_uri.'p/'.$user->getUsername();
}

?>
