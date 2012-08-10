<?php

# Config
require_once 'config.php';
Config::init();

# Helpers
foreach (glob('helpers/*.php') as $f) {
    require_once $f;
}

# Routes

// limonade configuration
function configure() {
    Config::routes_init();
}

function before($route) {
    try_autoconnect();

    if (stristr($route['callback'], 'admin')) {
        if (!is_connected() || !user()->isAdmin()) {
            halt(HTTP_FORBIDDEN, "L'accès à cette page est réservé aux administrateurs.");
        }
    }
}

## (get) home
dispatch('/', 'display_home');

## (get) connection page
dispatch('/connexion', 'display_connection');
## (post) connection
dispatch_post('/', 'display_home');

# ## users' profiles
dispatch('/~*', 'display_profile_page');
# ## my profile
# dispatch('/profile', 'display_my_profile_page');
# ## edit my profile
# dispatch('/profile/edit', 'display_edit_profile_page');
# dispatch_post('/profile/edit', 'post_edit_profile_page');
# 
# ## search
# dispatch('/search', 'display_search_page');
# dispatch_post('/search', 'display_search_results_page');

## cursus
dispatch('/cursus/:name', 'display_cursus');

## admin home
dispatch('/admin', 'display_admin_home');
## moderation
dispatch('/admin/moderation', 'display_admin_moderation');
## finances
dispatch('/admin/tresorerie', 'display_admin_finances');
## maintenance
dispatch('/admin/maintenance', 'display_admin_maintenance');

# test
# init DB
dispatch('/test/init_db', 'display_test_init_db');

# ## ...
#
#
# ## ...


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
