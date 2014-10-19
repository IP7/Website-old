<?php

function admin_tpl_default() {

    return array(
        'page' => array(

            'breadcrumbs' => array(
                array( 'title' => 'Administration', 'href' => Config::$root_uri.'admin' )
            ),

            'navlinks' => array(
                array('title' => 'Modération',  'href' => Config::$root_uri.'admin/#mod'),

                array('title' => 'Retour au site', 'href' => Config::$root_uri)
            )
        )
    );
}
