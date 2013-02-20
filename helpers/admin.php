<?php


function admin_tpl_default() {

    return array(
        'page' => array(

            'breadcrumbs' => array(
                array( 'title' => 'Administration', 'href' => Config::$root_uri.'admin' )
            ),

            'navlinks' => array(
                array('title' => 'Modération',  'href' => Config::$root_uri.'admin/#mod'),
                array('title' => 'Trésorerie',  'href' => Config::$root_uri.'admin/#tres'),
                array('title' => 'Maintenance', 'href' => Config::$root_uri.'admin/#mnt'),

                array('title' => 'Retour au site', 'href' => Config::$root_uri)
            )
        )
    );
}

# === Maintenance ===

function purge_cache() {
    if (!array_key_exists('cache', Config::$default_twig_env)) {
        return true;
    }
    return empty_dir_recur(Config::$default_twig_env['cache']);
}

function optimize_tables() {
        $conf = include(dirname(__FILE__).'/../models/build/conf/ip7website-conf.php');
        $db_conf = $conf['datasources']['infop7db']['connection'];

        try {
            $dbh = new PDO($db_conf['dsn'], $db_conf['user'], $db_conf['password']);
        } catch (PDOException $p) {
            error_log($p);
            return false;
        }

        $success = true;

        foreach ($dbh->query('SHOW TABLES;') as $table) {
            $success &= (bool)$dbh->query('OPTIMIZE TABLE '.$table.';');
        }

        $dbh = null;
        return $success;
}

function do_maintenance(&$message, &$message_type) {
    if (has_get('purge_cache')) {

        if (!use_token($_GET['purge_cache'])) {
            $message = 'Le token a expiré, veuillez réessayer.';
            $message_type = 'error';
            return false;
        }

        if (!purge_cache()) {
            $message = 'Erreur lors de la purge. Consultez les logs.';
            $message_type = 'error';
        }
        else {
            $message = 'Purge effectuée avec succès.';
            $message_type = 'notice';
        }
    }
    else if (has_get('optimize_tables')) {

        if (!use_token($_GET['optimize_tables'])) {
            $message = 'Le token a expiré, veuillez réessayer.';
            $message_type = 'error';
            return false;
        }

        if (!optimize_tables()) {
            $message = 'Erreur lors de l\'optimisation. Consultez les logs.';
            $message_type = 'error';
        }
        else {
            $message = 'Optimisation effectuée avec succès.';
            $message_type = 'notice';
        }
    }
    else {
        return false;
    }
    return true;
}

?>
