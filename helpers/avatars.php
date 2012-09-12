<?php

/**
 * Serve the default avatar
 **/
function serve_default_avatar() {
    return render_file('views/static/images/1x1.gif', true);
}

/**
 * Upload an avatar
 **/
function upload_avatar($user, &$msgstr, &$msgtype) {

    if (!has_file('avatar')) { return false; }

    $upload = $_FILES['avatar'];

    if (!$upload['size'] || !$upload['tmp_name']) { return false; }

    // size

    if (filesize($upload['tmp_name']) > AVATAR_MAX_SIZE) {
        $msgstr = 'L\'avatar est trop lourd.';
        $msgtype = 'error';
        return false;
    }

    // type
    $type = get_filetype($upload['tmp_name']);

    if (substr($type, 0, 6) !== 'image/') {
        $msgstr = 'L\'avatar envoyé n\'est pas une image.';
        $msgtype = 'error';
        return false;
    }

    $image_type = substr($type, 6, 4);
    $accepted_types = array( 'png', 'jpeg', 'gif' );

    if (!in_array($image_type, $accepted_types)) {
        $msgstr  = 'Le format de l\'avatar envoyé est incorrect. Seuls les';
        $msgstr .= ' formats PNG, JPEG et GIF sont acceptés.';
        $msgtype = 'error';
        return false;
    }

    $new_path = Config::$app_dir.'/../data/avatars/'.md5($user->getUsername().$upload['tmp_name']).'.png';

    if (!move_uploaded_file($upload['tmp_name'], $new_path)) {
        $msgstr  = 'Une erreur est survenue lors du téléchargement de l\'avatar.';
        $msgtype = 'error';
    }

    // resize the image 128x128
    $img = new SimpleImage();
    $img->load($new_path);
    unlink($new_path);
    $img->resize(128,128);
    $img->save($new_path);

    $db_file = new File();

    $db_file->setName('avatar_of_'.strtolower($user->getUsername()).'.png');
    $db_file->setFileType('image');
    $db_file->setAccessRights($user->getConfigPrivateProfile() ? MEMBER_RANK : 0);
    $db_file->setPath($new_path);
    $db_file->setAuthor($user);
    $user->setAvatar($db_file);
    $db_file->setDate(time());

    $db_file->save();

    return true;
}

?>
