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

    if (isset($_GET['disconnect']) && $_GET['disconnect']) {
        disconnection();
    }

    try_autoconnect();

    if (stristr($route['callback'], 'admin')) {
        if (!is_connected() || !user()->isAdmin()) {
            halt(HTTP_FORBIDDEN, "L'accès à cette page est réservé aux administrateurs.");
        }
    }
    else if (stristr($route['callback'], 'moderation')) {
        if (!is_connected() || !user()->isModerator()) {
            halt(HTTP_FORBIDDEN, "L'accès à cette page est réservé aux modérateurs.");
        }
    }
}

## (get/post) home
dispatch('/', 'display_home');
dispatch_post('/', 'display_home');

## (get) connection page
dispatch('/connexion', 'display_connection');
## (post) connection
dispatch_post('/connexion', 'post_connection');

# ## users' profiles
dispatch('/p/*', 'display_profile_page');
dispatch('/p/*/edit', 'display_edit_profile_page');
dispatch_post('/p/*/edit', 'post_edit_profile_page');
# ## my profile
dispatch('/profile', 'display_my_profile_page');
dispatch_post('/profile', 'display_my_profile_page');
# ## edit my profile
dispatch('/profile/edit', 'display_edit_my_profile_page');
dispatch_post('/profile/edit', 'post_edit_my_profile_page');
# 
# ## search
# dispatch('/search', 'display_search_page');

## cursus
dispatch('/cursus/:name', 'display_cursus');
dispatch_post('/cursus/:name', 'display_cursus');
dispatch('/cursus/:name/edit', 'display_moderation_edit_cursus');
## - news
#dispatch('/cursus/:name/add_news',      'display_add_cursus_news');
#dispatch_post('/cursus/:name/add_news', 'display_add_cursus_news');

## course
dispatch('/cursus/:cursus/:course', 'display_course');


## admin home
dispatch('/admin', 'display_admin_home');
## moderation
## finances
dispatch('/admin/membre/:name', 'display_admin_membre');
dispatch('/admin/membre/:name/edit', 'display_admin_edit_membre');
dispatch('/admin/membres', 'display_admin_members');
## maintenance
dispatch('/admin/maintenance', 'display_admin_maintenance');

## (almost-)static pages
#
dispatch('/contact', 'display_contact_page');
dispatch('/sitemap', 'display_sitemap_page');

# test
# init DB
dispatch('/test/init_db', 'display_test_init_db');

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
