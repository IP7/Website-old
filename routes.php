<?php

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

if (strpos(LIM_REQUEST_URI, '/cursus') === 0) {

    ## cursus
    dispatch('/cursus/:name',      'display_cursus');
    dispatch_post('/cursus/:name', 'display_cursus');

    ## educational paths (deprecated Nov 2014)
    dispatch('/cursus/:cursus/parcours/:path', 'display_educational_path');

    ## cursus feeds
    dispatch('/cursus/:name/flux.rss', 'display_cursus_rss_feed');
    dispatch('/cursus/:name/flux.atom', 'display_cursus_atom_feed');

    ## courses (deprecated Nov 2014)
    dispatch('/cursus/:name/matières', 'display_cursus_courses');

    ## courses feeds
    dispatch('/cursus/:cursus/:course/flux.rss', 'display_course_rss_feed');
    dispatch('/cursus/:cursus/:course/flux.atom', 'display_course_atom_feed');

    ## course
    dispatch('/cursus/:cursus/:course', 'display_course');

    ## contents (course)
    dispatch('/cursus/:cursus/:course/proposer',      'display_member_proposing_content_form');
    dispatch_post('/cursus/:cursus/:course/proposer', 'display_post_member_proposed_content');
    dispatch_post('/cursus/:cursus/:course/proposer/prévisualiser',
                        'display_post_member_proposed_content_preview');
    dispatch('/cursus/:cursus/:course/zip',           'display_course_archive_page');

    dispatch('/cursus/:cursus/:course/:id/:title',     'display_course_content');
    dispatch('/cursus/:cursus/:course/:id/:year/:title', 'display_course_content');

}

## contents' files
dispatch('/file/:id/:name', 'serve_user_file_by_id_and_name');

## admin home
dispatch('/admin', 'display_admin_home');

## moderation
dispatch('/admin/content/proposed',      'display_admin_proposed_content');
dispatch_post('/admin/content/proposed', 'post_admin_proposed_content');

## (almost-)static pages
dispatch('/sitemap',  'display_sitemap_page');
dispatch('/a-propos', 'display_apropos_page');
dispatch('/stats',    'display_stats_page');

## API
if (strpos(LIM_REQUEST_URI, '/api') === 0) {

    dispatch('/api/1/users/exists.json',     'json_check_username');
    dispatch('/api/1/links_list.json',       'json_get_entities_links_list');

    dispatch('/api/1/contents/last.json',    'json_get_last_contents');

    ## API endpoints for Jeditable
    if (strpos(LIM_REQUEST_URI, '/api/1/edit') === 0) {

        ### Courses
        # Edit intro text
        dispatch('/api/1/edit/course/intro.md', 'api_get_course_intro_markdown');
        dispatch_post('/api/1/edit/course/intro.html', 'api_post_course_intro');

    }

    dispatch('/api/1/cursus.json',            'json_get_cursus');
    dispatch('/api/1/course.json',            'json_get_course');

    dispatch_post('/api/1/files/rename.json', 'json_post_rename_file');
    dispatch_post('/api/1/files/delete.json', 'json_post_delete_file');

    dispatch('/api/1/short_url', 'api_create_short_url');

}

# API for internal usage (AJAX calls)
if (strpos(LIM_REQUEST_URI, '/jsapi') === 0) {

    # Logging
    dispatch_post('/jsapi/log.json', 'json_js_log');

    # Edit pages' texts
    dispatch('/jsapi/edit/page.md',    'jsapi_get_page_markdown');
    dispatch_post('/jsapi/edit/page.html', 'jsapi_post_page');

    # Edit cursus' intros
    dispatch('/jsapi/edit/cursus/intro.md',  'jsapi_get_cursus_intro_markdown');
    dispatch_post('/jsapi/edit/cursus/intro.html', 'jsapi_post_cursus_intro');

    # Edit content's titles
    dispatch_post('/jsapi/edit/content/title.html', 'jsapi_post_change_content_title');
    # Edit content's years
    dispatch_post('/jsapi/edit/content/year.html', 'jsapi_post_change_content_year');
}

# pages
dispatch('/:name/**', 'display_page');

