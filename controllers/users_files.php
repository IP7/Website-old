<?php

function serve_user_file() {
    $id = intval(params('id'));

    $f = FileQuery::create()->findOneById($id);

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
