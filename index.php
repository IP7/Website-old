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

run();

?>
