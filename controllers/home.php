<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

function display_home() {

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
                $message = error_message($res);
            }
    }
    # Disconnection
    else if (isset($_GET['disconnect'])) {
        disconnection();
    }

    # Rendering
    return Config::$tpl->render('_test_home.html', tpl_array(array(
        'page' => array(
            'title' => 'Accueil',

            'message' => $message,
            'message_type' => $message_type,

            'show_connection_form' => !is_connected(),
            'show_disconnection_link' => is_connected()
        ),

        // temporary solution
        'welcome' => 'Bienvenue sur le site de la future association IP7.'
    )));

}

?>
