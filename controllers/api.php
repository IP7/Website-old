<?php

// check if an username already exists,
// and return the response with JSON
function json_check_username() {
    if (!has_get('username')) {
        return '';
    }
    $u = trim($_GET['username']);

    $user = UserQuery::create()->findOneByUsername($u);

    return json(array('response' => ($user ? true : false)));
}

?>
