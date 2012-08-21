<?php

function display_contact_page() {
    return tpl_render('contact.html', array(
        'page' => array( 'title' => 'Contact' )
    ));
}

function display_sitemap_page() {
    return tpl_render('sitemap.html', array(
        'page' => array( 'title' => 'Plan du site' )
    ));
}

function display_legals_page() {
    return tpl_render('legals.html', array(
        'page' => array( 'title' => 'Mentions légales' )
    ));
}

function display_admin_migrate_db_page() {
    return Config::$tpl->render('admin_db_migration.html', tpl_array(
        admin_tpl_default(),
        array(
            'page' => array( 'title' => 'Migration de la base de données' )
        )
    ));
}

?>
