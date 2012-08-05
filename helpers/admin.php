<?php

# === Maintenance ===

function purge_cache() {
    return empty_dir_recur(Config::$default_twig_env['cache']);
}

function optimize_tables() {

}

?>

