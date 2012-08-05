<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

function admin_tpl_default() {
    static $init = false;
    static $d;

    if (!$init) {
        $d = array(
            'page' => array(
                'title' => 'Administration',

                'navlinks' => array(
                    array('label' => 'Modération',  'href' => Config::$root_uri.'admin/moderation'),
                    array('label' => 'Trésorerie',  'href' => Config::$root_uri.'admin/tresorerie'),
                    array('label' => 'Maintenance', 'href' => Config::$root_uri.'admin/maintenance')
                )
            )
        );
        $init = true;
    }
    return $d;
}

function display_admin_home() {
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default()));
}

function display_admin_moderation() {
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default(),array(

    )));
}

function display_admin_finances() {
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default(),array(

    )));
}

function display_admin_maintenance() {

    $message = $message_type = null;

    if (isset($_GET['purge_cache'])) {
        if (!purge_cache()) {
            $message = 'Erreur lors de la purge. Consultez les logs.';
            $message_type = 'error';
        }
        else {
            $message = 'Purge effectuée avec succès.';
            $message_type = 'notice';
        }
    }
    else if (isset($_GET['optimize_tables'])) {
        $message = 'Non implémenté.';
        $message_type = 'notice';
    }
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'actions' => array(
                array('label' => 'Purger le cache des templates', 'href' => '?purge_cache'),
                array('label' => 'Optimiser les tables', 'href' => '?optimize_tables'),
                array('label' => 'Retour', 'href' => '..')
            ),

            'message'      => $message,
            'message_type' => $message_type
        )
    )));
}

?>

