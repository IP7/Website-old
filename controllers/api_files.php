<?php

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
