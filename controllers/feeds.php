<?php

function display_cursus_rss_feed() {
    return feed_helper(params('name'), null, 'rss');
}

function display_cursus_atom_feed() {
    return feed_helper(params('name'), null, 'atom');
}

function display_course_rss_feed() {
    return feed_helper(params('cursus'), params('course'), 'rss');
}

function display_course_atom_feed() {
    return feed_helper(params('cursus'), params('course'), 'atom');
}

function display_global_rss_feed() {
    return feed_helper(null, null, 'rss', 50, 0);
}

function display_global_atom_feed() {
    return feed_helper(null, null, 'atom', 50, 0);
}
