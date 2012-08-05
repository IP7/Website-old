<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

# === GENERAL ================================================================ 

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

# === HOME =====================================================================

function display_admin_home() {
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default()));
}

# === MODERATION ===============================================================

function display_admin_moderation() {
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'actions' => array(
                array('label' => 'Contenu signalé', 'href' => Config::$root_uri.'admin/reports'),
                array('label' => 'Contenu proposé', 'href' => Config::$root_uri.'admin/content/proposed')
                # add subpages here
            )
        )
    )));
}

# === FINANCES ================================================================

function display_admin_finances() {
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'actions' => array(
                array('label' => 'Gérer les utilisateurs', 'href' => Config::$root_uri.'admin/membres'),
                array('label' => 'Gérer les transactions', 'href' => Config::$root_uri.'admin/transactions')
            )
        )
    )));
}

# === MAINTENANCE =============================================================

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
        if (!optimize_tables()) {
            $message = 'Erreur lors de l\'optimisation. Consultez les logs.';
            $message_type = 'error';
        }
        else {
            $message = 'Optimisation effectuée avec succès.';
            $message_type = 'notice';
        }
    }
    return Config::$tpl->render('admin_home.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'actions' => array(
                array('label' => 'Purger le cache des templates', 'href' => '?purge_cache'),
                array('label' => 'Optimiser les tables',          'href' => '?optimize_tables'),
                array('label' => 'Retour',                        'href' => '..')
            ),

            'message'      => $message,
            'message_type' => $message_type
        )
    )));
}

?>

