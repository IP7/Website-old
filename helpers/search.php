<?php

function perform_search($q, $full_text=false) {
    $results = array(
        'users'             => array(
            'title'  => 'Utilisateurs',
            'values' => array()
        ),
        'cursus'            => array(
            'title'  => 'Cursus',
            'values' => array()
        ),
        'educational_paths' => array(
            'title'  => 'Parcours pédagogiques',
            'values' => array()
        ),
        'courses'           => array(
            'title'  => 'Cours',
            'values' => array()
        )
        // add others categories here
    );

    //TODO see issue #19
    return $results;
}

?>
