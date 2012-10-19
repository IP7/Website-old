<?php

function cron_delete_obsolete_tokens() {

    $tokens = TokenQuery::create()
                ->filterByExpirationDate(array(
                    'max' => time() - 5
                ))
                ->find();

    foreach ($tokens as $k => $token) {
        $token->delete();
    }

}

// issue #209
function cron_purge_files() {
    $path_root = Config::$app_dir.'/../data/usersfiles/*';

    $files = glob($path_root);

    foreach ($files as $filename) {
        
        if (($filename === '.') || ($filename === '..') || is_dir($filename)) {
            continue;
        }

        $q = FileQuery::create()->findOneByPath($filename);

        if ($q) {
            continue;
        }

        unlink($file);
    }

}

?>
