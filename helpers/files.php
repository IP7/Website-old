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
 * Return an array representing a file
 **/
function tpl_file($file) {
    if (!$file) {
        return array();
    }

    return array(
        'title'       => $file->getName(),
        'url'         => Config::$root_uri.'file/'.$file->getId(),
        'description' => $file->getDescription()
    );
}

?>
