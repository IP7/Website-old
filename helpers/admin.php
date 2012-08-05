<?php


# === Maintenance ===

function purge_cache() {
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

?>
