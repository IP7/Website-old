<?php

function display_search_results() {

    if (!has_get('q')) {
        redirect_to('/', array( 'status' => HTTP_MOVED_PERMANENTLY ));
    }

    $q = $_GET['q'];

    // alias
    if ($q === '42') { $q = '%'; }

    $results = perform_search($q);

    $nb = 0;

    foreach ($results as $category) {
        $nb += count($category['values']);
    }

    $tpl_results = $nb ? array( 'categories' => $results ) : array();
    $title  = $nb ? 'Résultats' : 'Aucun résultat';
    $title .= ' de recherche pour « '.truncate_string($_GET['q'], 30).' »';

    return tpl_render('search.html', array(
        'page' => array(
            'title'   => $title,
            'results' => $tpl_results,

            'keywords'    => preg_split("/\s+/", $q),
            'description' => truncate_string($title),

            'styles' => array(
                array( 'href' => css_url('search'), 'media' => 'all' )
            )
        )
    ));
}

?>
