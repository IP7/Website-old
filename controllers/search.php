<?php

function display_search_results() {

    if (!has_get('q')) {
        redirect_to('/', array( 'status' => HTTP_MOVED_PERMANENTLY ));
    }

    $q = $_GET['q'];

    // alias
    if ($q === '42') { $q = '%'; }

    $results = perform_search($q);

    return tpl_render('search.html', array(
        'page' => array(
            'title' => 'Résultats de recherche pour « '.$_GET['q'].' »',
            'results' => array(
                'categories' => $results
            )
        )
    ));
}

?>
