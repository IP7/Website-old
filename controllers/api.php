<?php

// check if an username already exists,
// and return the response with JSON
function json_check_username() {
    if (!has_get('username')) {
        return json(array('error' => 'no username provided.'));
    }
    $u = get_string('username', 'GET');

    $user = UserQuery::create()->findOneByUsername($u);

    return json(array('data' => ($user ? true : false)));
}

// 
function json_global_search() {
    if (!has_get('q')) {
        return json(array('data' => array()));
    }

    $raw_results = perform_search(escape_mysql_wildcards(get_string('q', 'GET')), false, 5);

    $results = array();

    foreach ($raw_results as $k => $cat_results) {
        foreach ($cat_results['values'] as $_ => $v) {
            $results []= $v;
        }
    }

    return json(array('data' => $results));
}

function json_get_last_contents() {
    $limit = 10;

    if (has_get('l')) {
        $limit = intval($_GET['l']);
    }

    if ($limit <= 0) {
        return json(array('data' => array()));
    }

    $user_rights = is_connected() ? user()->getRights() : 0;

    $contents = ContentQuery::create()
                    ->joinWith('Content.Cursus')
                    ->filterByValidated(1)
                    ->where(  '(SELECT content_types.access_rights '
                            . 'FROM content_types '
                            . 'WHERE content_types.id = contents.content_type_id) <= ?',
                                $user_rights, PDO::PARAM_INT)
                    ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                    ->orderByDate('desc')
                    ->limit($limit)
                    ->find();

    $tpl_contents = array();

    foreach ($contents as $c) {

        $cursus = $c->getCursus();
        $course = $c->getCourse();

        $tpl_contents []= array(
            'href'  => content_url($cursus, $course, $c),
            'title' => $c->getTitle(),
            'date'  => $c->getDate(),

            'cursus' => $cursus ? $cursus->getShortName() : null,
            'course' => $course ? $course->getShortName() : null
        );
    }

    return json(array('data' => $tpl_contents));
}

function json_get_news_by_id() {
    $id = intval(get_string('id', 'GET'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    $user_rights = is_connected() ? user()->getRights() : 0;

    $news = NewsQuery::create()
                ->where('Access_Rights <= ?', $user_rights, PDO::PARAM_INT)
                ->findOneById($id);

    if (!$news) { return json(array('error' => 'Bad id.')); }

    return json(array(
        'data' => array(
            array(
                'title'   => $news->getTitle(),
                'md_text' => $news->getText(),
                'text'    => tpl_render('utils/md.html', array('content'=>$news->getText()))
            )
        )
    ));
}

function json_post_update_news() {
    $id = intval(get_string('id', 'POST'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    $news = NewsQuery::create()->findOneById($id);
    if (!$news) { return json(array('error' => 'Bad id.')); }

    if ($news->getAccessRights() > user()->getRights()) {
        halt(HTTP_FORBIDDEN);
    }

    $cursus = $news->getCursus();

    if (!user()->isAdmin()) {
        if (!$cursus || !user()->isResponsibleFor($cursus)) {
            halt(HTTP_FORBIDDEN);
        }
    }

    $title = get_string('title', 'POST');
    $body  = get_string('body',  'POST');

    $err = check_and_save_news($title, $body, $news, $cursus);

    if ($err) {
        return $err;
    }

    return json(array(
        'data' => array(
            array(
                'title'   => $news->getTitle(),
                'md_text' => $news->getText(),
                'text'    => tpl_render('utils/md.html', array(
                    'content' => $news->getText()
                ))
            )
        )
    ));
}

function json_post_delete_news() {
    $id = intval(get_string('id', 'POST'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    $news = NewsQuery::create()->findOneById($id);
    if (!$news) { return json(array('error' => 'Bad id.')); }

    if ($news->getAccessRights() > user()->getRights()) {
        halt(HTTP_FORBIDDEN);
    }

    if (!user()->isAdmin()) {
        $cursus = $news->getCursus();
        if (!$cursus || !user()->isResponsibleFor($cursus)) {
            halt(HTTP_FORBIDDEN);
        }
    }

    $news->delete();

    return json(array('status' => 'ok'));
}

// post cu_id=<cursus_id>&co_id=<course_id>&title=<title>&text=<text>
function json_post_create_news() {

    $cursus_id = intval(get_string('cu_id', 'POST'));
    $course_id = intval(get_string('co_id', 'POST'));
    $title     = get_string('title', 'POST');
    $text      = get_string('text',  'POST');

    $cursus = ($cursus_id > 0) ? CursusQuery::create()->findOneById($cursus_id) : null;
    $course = ($course_id > 0) ? CourseQuery::create()->findOneById($course_id) : null;

    $news = null;

    $err = check_and_save_news($title, $text, $news, $cursus, $course);

    if ($err) {
        return $err;
    }

    return json(array(
        'data' => array(
            'title'   => $news->getTitle(),
            'md_text' => $news->getText(),
            'text'    => tpl_render('utils/md.html', array(
                'content' => $news->getText()
            )),
            'html'    => tpl_render('utils/one_news.html', array(
                'news' => array(
                    'id'            => $news->getId(),
                    'title'         => $news->getTitle(),
                    'content'       => $news->getText(),
                    'datetime_attr' => datetime_attr($news->getDate()),
                    'datetime'      => Lang\date_fr($news->getDate()),
                    'author'        => array(
                        'href' => Config::$root_uri.'p/'.user()->getUsername(),
                        'name' => user()->getPublicName()
                    )
                )
            ))
        )
    ));
}

// helper
function _json_post_news_mark_as( $old = true ) { // ?id=<news id>

    $id = intval(get_string('id', 'POST'));
    if (!$id) { return json(array('error' => 'Bad id.')); }

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    $news = NewsQuery::create()->findOneById($id);
    if (!$news) { return json(array('error' => 'Bad id.')); }

    if ($news->getAccessRights() > user()->getRights()) {
        halt(HTTP_FORBIDDEN);
    }

    if (!user()->isAdmin()) {
        $cursus = $news->getCursus();
        if (!$cursus || !user()->isResponsibleFor($cursus)) {
            halt(HTTP_FORBIDDEN);
        }
    }

    $news->setExpirationDate( $old ? 'now' : NULL );

    return json(array('status' => 'ok'));

}

function json_post_news_mark_as_old() {
    return _json_post_news_mark_as(true);
}

function json_post_news_mark_as_not_old() {
    return _json_post_news_mark_as(false);
}

function json_get_course_intro() { // ?id=<course id>
    return json_get_description_of_course_or_cursus('course');
}

function json_get_cursus_intro() { // ?id=<cursus id>
    return json_get_description_of_course_or_cursus('cursus');
}

function json_post_course_intro() { // id=<course id>, text=<text>
    return json_post_description_of_course_or_cursus('course');
}

function json_post_cursus_intro() { // id=<cursus id>, text=<text>
    return json_post_description_of_course_or_cursus('cursus');
}

function json_post_rename_file() { // id=<id>, name=<new name>

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    if (!has_post('id') || !has_post('name')) {
        return json(array( 'error' => 'no id and/or filename provided.' ));
    }

    $id = intval(get_string('id', 'POST'));

    $f = FileQuery::create()->findOneById($id);

    if (!$f) {
        return json(array( 'error' => 'bad id.' ));
    }

    if (!user()->isAdmin() && user()->getId() !== $f->getAuthorId()) {
        halt(HTTP_FORBIDDEN);
    }

    $new_title = get_string('name', 'POST');

    $new_title = preg_replace('#\s+#', ' ', $new_title);

    if (strlen($new_title) > 128) {
        return json(array( 'error' => 'filename too long.' ));
    }

    $disallowed_chars = array(
        '\\', '/', '\'', '"', '&', ';'
    );

    foreach ($disallowed_chars as $_ => $c) {
        if (strpos($new_title, $c) !== FALSE) {
            return json(array( 'error' => "the filename cannot contains '$c'." ));
        }
    }

    $f->setTitle($new_title);
    $f->save();

    return json(array( 'data' => array( 'filename' => $new_title ) ));
}

function json_post_delete_file() { // id=<id>

    if (!is_connected()) {
        halt(HTTP_FORBIDDEN);
    }

    if (!has_post('id')) {
        return json(array( 'error' => 'no id provided' ));
    }

    $id = intval(get_string('id', 'POST'));

    $f = FileQuery::create()->findOneById($id);

    if (!$f) {
        return json(array( 'error' => 'bad id.' ));
    }

    if (!user()->isAdmin() && user()->getId() !== $f->getAuthorId()) {
        halt(HTTP_FORBIDDEN);
    }

    $f->delete();

    return json(array( 'data' => array( 'id' => $id ) ));
}

