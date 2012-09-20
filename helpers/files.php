<?php

/**
 * Get the type of a file without using its extension
 **/
function get_filetype($path) {
    $finfo = new finfo();
    return strtolower($finfo->file($path, FILEINFO_MIME_TYPE));
}

# remove every child of $path
# like rm -R $path/*
function empty_dir_recur($path) {
    $path = trim((string)$path);
    if (empty($path)) { return false; }

    foreach(glob($path . '/*') as $file) {

        if (is_dir($file)) {
            if (!empty_dir_recur($file) || !rmdir($file)) {
                return false;
            }
        } else {
            if (!unlink($file)) {
                return false;
            }
        }
    }
    return true;
}

/**
 * Upload one or more user file and return their ids.
 *
 * @author : the author of the file(s).
 * @file_key : the name used to retrieve the file(s), e.g. $_FILES[$file_key]
 * @description : the description of the file, or an array if there is multiple
 * files
 *
 **/
function upload_user_file($author, $file_key, $description,
            &$msg_str=null, &$msg_type=null, $access_rights=0) {

    $path_root = Config::$app_dir.'/../data/usersfiles/';

    if (!has_file($file_key) || !$author) { return null; }

    $files = $_FILES[$file_key];

    if (!count($files['name']) || !count($files['tmp_name']) || !count($files['size'])) {
        return null;
    }

    $msg_str = $msg_str || '';

    $desc_count = 1;
   
    if (is_array($description)) { $desc_count = count($description); }
    else { $description = array($description); }

    $files_arr = array();

    for ($i=0,$l=count($files['tmp_name']);$i<$l && $i<MAX_FILES_PER_CONTENT;$i++) {
        if (!$files['name'][$i]) {
            continue;
        }

        $file = array(
            'tmp_name' => $files['tmp_name'][$i],
            'name'     => $files['name'][$i]
        );

        if (filesize($file['tmp_name']) > USER_FILE_MAX_SIZE) {
            $msg_str .= ($msg_str?' ':'')."Le ficher $k est trop lourd.";
            $msg_type = 'error';
            continue;
        }

        $type = get_filetype($file['tmp_name']);

        // basic filtering
        $db_type = ($type == 'application/pdf')
                        ? 'pdf'
                        : ((substr($type, 0, 6) == 'image/')
                            ? 'image'
                            : ((substr($type, 0, 5) == 'text/')
                                ? 'text'
                                : null));

        // avoid filenames collisions
        $new_name  = $author->getId();
        $new_name .= '-'.md5(file_get_contents($file['tmp_name'])).'-'.time();
        $new_name .= '-'.get_random_string(2);

        $new_path = $path_root.$new_name;

        if (!move_uploaded_file($file['tmp_name'], $new_path)) {
            $msg_str .= ($msg_str?' ':'').'Une erreur est survenue lors du téléchargement du fichier '.($i+1).'.';
            $msg_type = 'error';
            continue;
        } 

        $db_file = new File();
        $db_file->setPath($new_name);
        $db_file->setAuthor($author);
        $db_file->setName($file['name']);
        $db_file->setDate(time());
        $db_file->setAccessRights($access_rights);
        if ($i < $desc_count) { $db_file->setDescription($description[$i]); }
        $db_file->save();

        $files_arr []= $db_file;
    }

    return $files_arr;
}

?>
