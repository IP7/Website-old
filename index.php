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

    // Override X-Powered-By header
    send_header('X-Powered-By: Electricity');

    foreach ($route['params'] as $k => $v) {
        params($k, escape_mysql_wildcards($v));
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
    else if (stristr($route['callback'], 'member')) {
        if (!is_connected() || !user()->isMember()) {
            halt(HTTP_FORBIDDEN, "L'accès à cette page est réservé aux membres.");
        }
    }
}

function before_sending_header($header) {
    if (strpos($header, 'text/html') !== false) {
        send_header("Cache-Control: no-store");
    }
}

## (get/post) home
dispatch('/',      'display_home');
dispatch_post('/', 'display_home');

## (get) connection page
dispatch('/connexion',      'display_connection');
## (post) connection
dispatch_post('/connexion', 'post_connection');

## forgotten password
dispatch('/oubli',      'display_forgotten_password');
dispatch_post('/oubli', 'post_forgotten_password');

## users' profiles
dispatch('/p/*',           'display_profile_page');
dispatch('/p/*/edit',      'display_edit_profile_page');
dispatch_post('/p/*/edit', 'post_edit_profile_page');
## my profile
dispatch('/profile',      'display_my_profile_page');
dispatch_post('/profile', 'display_my_profile_page');
## edit my profile
dispatch('/profile/edit',      'display_edit_my_profile_page');
dispatch_post('/profile/edit', 'post_edit_my_profile_page');
dispatch('/profile/init',      'display_init_my_profile_page');
dispatch_post('/profile/init', 'post_init_my_profile_page');

## search
dispatch('/recherche', 'display_search_results');

## cursus
dispatch('/cursus/:name',      'display_cursus');
dispatch_post('/cursus/:name', 'display_cursus');
dispatch('/cursus/:name/edit', 'display_moderation_edit_cursus');
## educational paths
dispatch('/cursus/:cursus/parcours/:path', 'display_educational_path');

## course
dispatch('/cursus/:cursus/:course', 'display_course');
## contents
dispatch('/cursus/:cursus/:course/proposer',      'display_member_proposing_content_form');
dispatch_post('/cursus/:cursus/:course/proposer', 'display_post_member_proposed_content');
dispatch_post('/cursus/:cursus/:course/proposer/prévisualiser',
                                                  'display_post_member_proposed_content_preview');
dispatch('/cursus/:cursus/:course/:id',           'display_course_content');
dispatch('/cursus/:cursus/:course/:id/:title',     'display_course_content');
dispatch('/cursus/:cursus/:course/:id/:year/:title', 'display_course_content');

## contents' files
# dispatch('/file/:id',       'serve_user_file');
dispatch('/file/:id/:name', 'serve_user_file_by_id_and_name');

## admin home
dispatch('/admin', 'display_admin_home');

## moderation 
dispatch('/admin/moderation',            'display_admin_moderation');
dispatch('/admin/reports',               'display_admin_content_report');
dispatch_post('/admin/reports',          'post_admin_content_report');
dispatch('/admin/content/proposed',      'display_admin_proposed_content');
dispatch_post('/admin/content/proposed', 'post_admin_proposed_content');

## members
dispatch('/admin/membres',          'display_admin_members');
dispatch('/admin/membres/add',      'display_admin_add_member');
dispatch_post('/admin/membres/add', 'post_admin_add_member');

## maintenance
dispatch('/admin/migrate', 'display_admin_migrate_db_page');

## news archives
dispatch('/actus/archives', 'display_news_archives');

## (almost-)static pages
dispatch('/contact',  'display_contact_page');
dispatch('/sitemap',  'display_sitemap_page');
dispatch('/legals',   'display_legals_page');
dispatch('/bug',      'display_bug_report');
dispatch_post('/bug', 'post_bug_report');
dispatch('/a-propos', 'display_apropos_page');
dispatch('/stats',    'display_stats_page');

## API
dispatch('/api/1/users/exists.json',     'json_check_username');
dispatch('/api/1/search.json',           'json_global_search');
dispatch('/api/1/contents/last.json',    'json_get_last_contents');

dispatch('/api/1/cursus/intro.json',      'json_get_cursus_intro');
dispatch('/api/1/course/intro.json',      'json_get_course_intro');
dispatch_post('/api/1/cursus/intro.json', 'json_post_cursus_intro');
dispatch_post('/api/1/course/intro.json', 'json_post_course_intro');

dispatch('/api/1/news/get_one.json',     'json_get_news_by_id');
dispatch_post('/api/1/news/update.json', 'json_post_update_news');
dispatch_post('/api/1/news/delete.json', 'json_post_delete_news');
dispatch_post('/api/1/news/create.json', 'json_post_create_news');
dispatch_post('/api/1/news/is_old.json', 'json_post_news_mark_as_old');
dispatch_post('/api/1/news/is_not_old.json', 'json_post_news_mark_as_not_old');

dispatch_post('/api/1/files/rename.json', 'json_post_rename_file');
dispatch_post('/api/1/files/delete.json', 'json_post_delete_file');

## tests
dispatch('/test/init_db', 'display_test_init_db');

## misc
dispatch('/;*',  'display_sql_injection');
dispatch('/\'*', 'display_sql_injection');

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
