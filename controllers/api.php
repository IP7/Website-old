<?php

// check if an username already exists,
// and return the response with JSON
function json_check_username() {
    if (!has_get('username')) {
        return '';
    }
    $u = get_string('username', 'GET');

    $user = UserQuery::create()->findOneByUsername($u);

    return json(array('response' => ($user ? true : false)));
}

// 
function json_global_search() {
    $results = has_get('q')
                ? perform_search(get_string('q', 'GET'), false, 5)
                : array();

    // TODO return one array with type of contents in it

    return json(array('response' => $results));
}

?>
