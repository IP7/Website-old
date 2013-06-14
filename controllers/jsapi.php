<?php

// these controllers are used by AJAX calls


// POST level=debug, message=foo bar
function json_js_log() {

    $msg   = get_string('message', 'POST');

    if (!$msg) { halt(HTTP_BAD_REQUEST); }

    $level = get_string('level', 'POST');
    $now   = $_SERVER['REQUEST_TIME'];
    $path  = Config::$app_dir.'/../data/jslog';

    file_put_contents($path, "[$now][$level]: $msg\n", FILE_APPEND|LOCK_EX);

    return json(array('status' => 'ok'));
}

// === PAGES ===

// used by Jeditable
function jsapi_get_page_markdown() {

    $id = (int)get_string('id', 'GET');

    $page = PageQuery::create()
                ->withColumn('Page.text')
                ->findOneById($id);

    if (!$page) {
        halt(NOT_FOUND);
    }

    return $page->getText();

}

// used by Jeditable
function jsapi_post_page() {

    $id = (int)get_string('id', 'POST');
    $newvalue = get_string('value', 'POST');

    $page = PageQuery::create()->findOneById($id);

    if (!$page) {
        halt(NOT_FOUND);
    }

    if (!is_connected() || !is_moderator()) {
        halt(HTTP_FORBIDDEN);
    }

    $page->setText(truncate_string($newvalue, 4096));
    $page->save();

    return tpl_render('utils/md.html', array('content'=>$page->getText()));

}

// === CURSUS ===

// used by Jeditable
function jsapi_get_cursus_intro_markdown() {

    $id = (int)get_string('id', 'GET');

    $cursus = CursusQuery::create()
                ->withColumn('Cursus.description')
                ->findOneById($id);

    if (!$cursus) { halt(NOT_FOUND); }

    return $cursus->getDescription();

}

// used by Jeditable
function jsapi_post_cursus_intro() {

    $id = (int)get_string('id', 'POST');
    $newvalue = get_string('value', 'POST');

    $cursus = CursusQuery::create()
                ->findOneById($id);

    if (!$cursus) { halt(NOT_FOUND); }

    if (!is_connected() || (!is_admin() && !user()->isResponsibleFor($cursus))) {
        halt(HTTP_FORBIDDEN);
    }

    $cursus->setDescription(truncate_string($newvalue, 1024));
    $cursus->save();

    return tpl_render('utils/md.html', array('content'=>$cursus->getDescription()));

}
