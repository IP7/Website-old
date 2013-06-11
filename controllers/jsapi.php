<?php

// these controllers are used by AJAX calls


// POST level=debug, message=foo bar
function json_js_log() {

    $msg   = get_string('message', 'POST');

    if (!$msg) { halt(HTTP_BAD_REQUEST); }

    $level = get_string('level', 'POST');
    $now   = $_SERVER['REQUEST_TIME'];
    $path  = Config::$app_dir.'/../data/jslog';

    file_put_contents($path, "[$now][$level]: $msg\n", FILE_APPEND|LOCK_EX);

    return json(array('status' => 'ok'));
}
