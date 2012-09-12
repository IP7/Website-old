<?php

function serve_avatar($id) {
    return serve_avatar_with_size($id, 'default');
}

function serve_avatar_with_size($id, $size) {
    if ($size != 'default' && $size < 1) { halt(NOT_FOUND); }

    $u = UserQuery::create()->findOneById($id);
    if (!$u) { halt(NOT_FOUND); }

    $file = $u->getAvatar();
    if (!$file) { return serve_default_avatar(); }

    $path = $file->getPath();
    if (!$path) { return serve_default_avatar(); }

    $path = preg_replace('@/([^/]+)/\.\./@', '/', $path);

    $path_with_size = preg_replace('/\(.[a-z]+)$/', '-'.$size.'\\0', $path);

    if (file_exists($path_with_size)) {
        return render_file($path_with_size, true);
    }
    if (file_exists($path)) {
        return render_file($path, true);
    }

    return serve_default_avatar();
}

?>
