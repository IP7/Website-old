<?php

# Config
require_once 'config.php';
Config::init();

# Helpers
require_once 'helpers/tpl.php';
require_once 'helpers/login.php';
require_once 'helpers/errors.php';

# Routes

// limonade configuration
function configure() {
    Config::routes_init();
}

#
#
# -> uncomment implemented routes

function before($route) {
    try_autoconnect();

    if (stristr($route['callback'], 'admin')) {
        if (!is_connected() || !user()->isAdmin()) {
            halt(HTTP_FORBIDDEN, "L'accès à cette page est réservé aux administrateurs.");
        }
    }
}

## home
dispatch('/', 'display_home');

# ## connection
dispatch_post('/', 'display_home');

# ## users' profiles
# dispatch('/~:name', 'display_profile_page');
# ## my profile
# dispatch('/profile', 'display_my_profile_page');
# ## edit my profile
# dispatch('/profile/edit', 'display_edit_profile_page');
# dispatch_post('/profile/edit', 'post_edit_profile_page');
# 
# ## search
# dispatch('/search', 'display_search_page');
# dispatch_post('/search', 'display_search_results_page');
# 
# ## admin home
dispatch('/admin', 'display_admin_home');
# dispatch_post('/admin', 'post_admin_home');
# ## admin reports
# dispatch('/admin/reports', 'display_admin_reports');
# ## list contents
# dispatch('/admin/list/:name', 'display_admin_content');
#
# # ...
#
#
# ## ...


# Errors handling (functions called by Limonade)

# Called when a route is not found.
function route_missing($request_method, $request_uri) {
    # TODO
  halt(NOT_FOUND, "($request_method) $request_uri"); # by default
}

 

# Server error output
#
# @param string $errno 
# @param string $errstr 
# @param string $errfile 
# @param string $errline 
# @return string "server error" output string
#
function server_error($errno, $errstr, $errfile=null, $errline=null) {
    #TODO
    return $errstr ? $errstr : 'Oups, erreur '.$errno.'!';
}

# Not found error output
#
# @param string $errno 
# @param string $errstr 
# @param string $errfile 
# @param string $errline 
# @return string "not found" output string
#
function not_found($errno, $errstr, $errfile=null, $errline=null) {
    return 'Rien trouvé :('; # TODO 
}

run();

?>
