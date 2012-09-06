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
