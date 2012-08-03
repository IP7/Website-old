<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

require_once dirname(__FILE__).'/../helpers/login.php';

function display_admin_home() {

    if (!is_connected()) {
        return 'test:admin_home not connected.'; # TODO
    }

    return "test:admin_home"; # TODO
}

function post_admin_home() {

}

?>

