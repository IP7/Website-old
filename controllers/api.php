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
    if (!has_get('q')) {
        return json(array('response' => array()));
    }

    $raw_results = perform_search(escape_mysql_wildcards(get_string('q', 'GET')), false, 5);

    $results = array();

    foreach ($raw_results as $k => $cat_results) {
        foreach ($cat_results['values'] as $_ => $v) {
            $results []= $v;
        }
    }

    return json(array('response' => $results));
}

?>
