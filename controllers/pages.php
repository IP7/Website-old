<?php

function display_sitemap_page() {
    return tpl_render('sitemap.html', array(
        'page' => array(
            'title'       => 'Plan du site',
            'keywords'    => array( 'sitemap', 'plan du site' ),
            'description' => 'Plan du site'
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

    // number of accepted contents per author
    $contents_counts = ContentQuery::create()
                            ->filterByValidated(true)
                            ->groupBy('AuthorId')
                            ->withColumn('COUNT(*)', 'contents_count')
                            ->select(array('AuthorId', 'contents_count'))
                            ->find();

    $max = 0;
    $best_contributor_id = 0;

    foreach ($contents_counts as $_ => $cc) {
        if ($cc['contents_count'] > $max) {
            $max = $cc['contents_count'];
            $best_contributor_id = $cc['AuthorId'];
        }
    }

    $contents_count         = ContentQuery::create()->filterByValidated(true)->count();
    $files_count            = FileQuery::create()->count();
    $best_contributor       = UserQuery::create()->findOneById($best_contributor_id);
    $best_contributor_count = ContentQuery::create()
                                    ->filterByValidated(true)
                                    ->filterByAuthor($best_contributor)
                                    ->count();

    $cursus_counts = array();

    $cursus = CursusQuery::create()->find();

    foreach ($cursus as $c) {
        $count = ContentQuery::create()
                    ->filterByValidated(true)
                    ->filterByCursus($c)
                    ->count();

        if ($count == 0) { continue; }

        $cursus_counts []= array(
            'name'  => $c->getShortName(),
            'count' => $count
        );
    }

    return tpl_render('stats.html', array(
        'page' => array(
            'title' => 'Statistiques',
            'stats' => array(
                'contents_count'   => $contents_count,
                'cursus_counts'    => $cursus_counts,
                'files_count'      => $files_count,
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

function display_page() {
	$url  = params('name');
    $page = PageQuery::create()
                ->withColumn('Page.text')
                ->findOneByUrl($url);

    if ($page === null) {
        return bad_url();
    }

    $scripts = array();

    return tpl_render('page.html', array(
        'page' => array(
            'title' => $page->getTitle(),
            'text'  => $page->getText(),
            'id'    => $page->getId(),
            'scripts' => $scripts
        )
    ));
}

