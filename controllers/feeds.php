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


