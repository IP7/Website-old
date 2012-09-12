<?php

function serve_user_file() {
    $id = intval(params('id'));

    $f = FileQuery::create()->findOneById($id);

    return _serve_user_file($f);
}

function serve_user_file_by_name() {
    $name = params('name');
    $f = FileQuery::create()->findOneByName($name);

    return _serve_user_file($f);
}

// helper
function _serve_user_file($f) {

    if (!$f) {
        halt(NOT_FOUND);
    }

    $path = Config::$app_dir.'/../data/usersfiles/'.$f->getPath();
    $path = preg_replace('@/([^/]+)/\.\./@', '/', $path);

    if (!file_exists($path)) {
        halt(NOT_FOUND);
    }

    $access_rights = $f->getAccessRights();

    if (($access_rights >= MEMBER_RANK)
        && (!is_connected() || (user()->getRank() < $access_rights))) {
        return halt(HTTP_FORBIDDEN);
    }

    return render_file($path, true);
}

?>
