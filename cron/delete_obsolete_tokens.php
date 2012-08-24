<?php

require_once '../config.php';
Config::init();

$tokens = TokenQuery::create()
            ->filterByExpirationDate(array(
                'max' => time() - 5
            ))
            ->find();

foreach ($tokens as $k => $token) {
    $token->delete();
}

?>

