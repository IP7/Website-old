<?php

# Config
require_once 'config.php';
Config::init();

# Helpers
require_once 'helpers/tpl.php';
require_once 'helpers/login.php';

# Routes
# -> uncomment implemented routes

## home
dispatch('/', 'display_home');

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
# ## admin
# dispatch('/admin', 'display_admin_page');
# # ...
#
#
# ## ...

run();

?>

