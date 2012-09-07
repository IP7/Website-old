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

?>
