<?php

function user_to_search_result($u) {
    return array(
        'title' => $u->getPublicName(),
        'href'  => Config::$root_uri.'/p/'.$u->getUsername()
    );
}

function search_users($q, $limit=10) {
    // usernames
    $users = UserQuery::create()
                ->limit($limit)
                ->filterByPublicProfile()
                ->findByUsername('%'.$q.'%');

    $results = array();

    foreach ($users as $u) {
        $results []= user_to_search_result($u);
    }

    if (count($results) === $limit) {
        return $results;
    }

    // first names
    $users = UserQuery::create()
                ->limit($limit - count($results))
                ->filterByConfigShowRealName(1)
                ->filterByPublicProfile()
                ->findByFirstName('%'.$q.'%');

    foreach ($users as $u) {
        $results []= user_to_search_result($u);
    }

    $results = array_unique($results);

    if (count($results) === $limit) {
        return $results;
    }

    // email
    $users = UserQuery::create()
                ->limit($limit - count($results))
                ->filterByConfigShowEmail(1)
                ->filterByPublicProfile()
                ->findByEmail('%'.$q.'%');


    return $results;
}

function perform_search($q, $full_text=false, $category_limit=10, $limit=100) {
    $results = array(
        'users'             => array(
            'title'  => 'Utilisateurs',
            'values' => search_users($q, $category_limit)
        ),
        'cursus'            => array(
            'title'  => 'Cursus',
            'values' => array() //TODO
        ),
        'educational_paths' => array(
            'title'  => 'Parcours pédagogiques',
            'values' => array() //TODO
        ),
        'courses'           => array(
            'title'  => 'Cours',
            'values' => array() //TODO
        )
        // add others categories here
    );

    //TODO see issue #19
    
    return $results;
}

?>
