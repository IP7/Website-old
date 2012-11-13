<?php

function display_contact_page() {
    return tpl_render('contact.html', array(
        'page' => array(
            'title'       => 'Contact',
            'keywords'    => array( 'contact', 'ip7' ),
            'description' => 'Contactez-nous'
        )
    ));
}

function display_sitemap_page() {
    return tpl_render('sitemap.html', array(
        'page' => array(
            'title'       => 'Plan du site',
            'keywords'    => array( 'sitemap', 'plan du site' ),
            'description' => 'Plan du site'
        )
    ));
}

function display_legals_page() {
    return tpl_render('legals.html', array(
        'page' => array(
            'title'       => 'Mentions légales',
            'keywords'    => array( 'mentions légales' ),
            'description' => 'Mentions légales'
        )
    ));
}

function display_apropos_page() {
    return tpl_render('apropos.html', array(
        'page' => array(
            'title' => 'À Propos d\'IP7'
        )
    ));
}

function display_stats_page() {

    $authors_count = ContentQuery::create()
            ->filterByValidated(true)
            ->withColumn('COUNT(*)', 'contents_count')
            ->groupBy('AuthorId');

    $max_contributions = ContentQuery::create()
            ->addSelectQuery($authors_count, 'ac')
            ->where('ac.contents_count=(SELECT MAX(ac.contents_count))')
            ->findOne();

    $downloads_count = FileQuery::create()
                        ->withColumn('SUM(downloads_count)', 'downloads')
                        ->select('downloads')
                        ->findOne();

    $contents_count = ContentQuery::create()->filterByValidated(true)->count();
    $files_count    = FileQuery::create()->count();
    $best_contributor = $max_contributions->getAuthor();
    $best_contributor_count = ContentQuery::create()
                                    ->filterByValidated(true)
                                    ->filterByAuthor($best_contributor)
                                    ->count();

    return tpl_render('stats.html', array(
        'page' => array(
            'title' => 'Statistiques',
            'stats' => array(
                'contents_count'   => $contents_count,
                'files_count'      => $files_count,
                'downloads_count'  => $downloads_count,
                'best_contributor' => array(
                    'count' => $best_contributor_count,
                    'name'  => $best_contributor->getPublicName(),
                    'href'  => user_url($best_contributor)
                )
            )
        )
    ));
}

function display_admin_migrate_db_page() {
    return Config::$tpl->render('admin/db_migration.html', tpl_array(
        admin_tpl_default(),
        array(
            'page' => array(
                'title' => 'Migration de la base de données',
                'breadcrumbs' => array(
                    1 => array( 'title' => 'Migration de la base de données', 'href' => url())
                )
            )
        )
    ));
}


?>
