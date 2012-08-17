<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

function display_home() {

    # Disconnection
    if (isset($_GET['disconnect'])) {
        disconnection();
    }

    # Rendering
    return Config::$tpl->render('home.html', tpl_array(array(

        'page' => array(
            'title' => 'Accueil',

            'breadcrumbs' => false,

            'intro' => 'Bienvenue sur le site de l\'association IP7.',

            'news' => array()
        ),
    )));

}

function display_connection() {
    if (is_connected()) {
        redirect_to('/');
    }
    return tpl_render('connection.html', array(
        'page' => array(
            'title' => 'Connexion',
            'connection' => array( 'action' => Config::$root_uri.'connexion' )
        )
    ));
}

function post_connection() {
    $message = false;
    $message_type = '';

    # Connection
    if (   (isset($_POST['username']) && !empty($_POST['username']))
        && (isset($_POST['password']) && !empty($_POST['password']))) {

            # sanitization made by Propel
            $res = connection(
                $_POST['username'],
                $_POST['password'],
                (isset($_POST['remember']) ? (bool)$_POST['remember'] : false)
            );

            if ($res !== CONNECTION_OK) {
                $message_type = 'error';
                $message = app_error_message($res);
            }
    }

    if (!$message) {
        redirect_to('/', array('status' => HTTP_SEE_OTHER));
    }

    return tpl_render('connection.html', array(
        'page' => array(
            'title' => 'Connexion',
            'connection' => array( 'action' => Config::$root_uri ),

            'message' => $message,
            'message_type' => $message_type
        )
    ));

}

?>
