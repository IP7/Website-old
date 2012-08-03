<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

require_once dirname(__FILE__).'/../helpers/login.php';
require_once dirname(__FILE__).'/../helpers/tpl.php';

function display_admin_home() {

    # TODO test if is admin

    if (!is_connected()) {
        return Config::$tpl->render('admin_home.html', tpl_array(array(
            'page' => array(
                'url' => '/admin',
                'title' => 'accueil'
            )
        )));
    }

    return Config::$tpl->render('admin_home_connected.html', tpl_array(array(

    )));
}

function post_admin_home() {

}

?>

