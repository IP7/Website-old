<?php

# Config
require_once __DIR__.'/config.php';
Config::init();

# Helpers
foreach (glob(__DIR__.'/helpers/*.php') as $f) {
    require_once $f;
}

# Routes

// limonade configuration
function configure() {
    Config::routes_init();
}

function before($route) {

    // Override X-Powered-By header
    send_header('X-Powered-By: Electricity');

    foreach ($route['params'] as $k => $v) {
        params($k, escape_mysql_wildcards($v));
    }

    try_autoconnect();

    if (stristr($route['callback'], 'admin')) {
        if (!is_connected() || !user()->isAdmin()) {
            halt(HTTP_FORBIDDEN, 'L\'accès à cette page est réservé aux administrateurs.');
        }
    }
    else if (stristr($route['callback'], 'moderation')) {
        if (!is_connected() || !user()->isModerator()) {
            halt(HTTP_FORBIDDEN, 'L\'accès à cette page est réservé aux modérateurs.');
        }
    }
    else if (stristr($route['callback'], 'member')) {
        if (!is_connected() || !user()->isMember()) {
            halt(HTTP_FORBIDDEN, 'L\'accès à cette page est réservé aux membres.');
        }
    }
}

function before_sending_header($header) {
    if (strpos($header, 'text/html') !== false) {
        send_header('Cache-Control: no-store');
    }
}

define('LIM_REQUEST_URI', request_uri());

if ( strpos($_SERVER['HTTP_HOST'], 's.') === 0 ) {
    
    dispatch('/**', 'short_link_route');

} else {

    require_once __DIR__.'/routes.php';

}

# Errors handling (functions called by Limonade)

# Called when a route is not found.
function route_missing($request_method, $request_uri) {
  error_log("Not found: ($request_method) $request_uri");
  halt(NOT_FOUND);
}

# Server error output
#
# @param string $errno 
# @param string $errstr 
# @param string $errfile 
# @param string $errline 
# @return string "server error" output string
#
function server_error($errno, $errstr=null, $errfile=null, $errline=null) {
  return display_http_error($errno, $errstr, $errfile, $errline);
}

# Not found error output
# @see server_error
function not_found($errno, $errstr=null, $errfile=null, $errline=null) {
  return display_http_error($errno, $errstr, $errfile, $errline);
}

run();

?>
