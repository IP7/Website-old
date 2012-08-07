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
                $message = app_error_message($res);
            }
    }
    # Disconnection
    else if (isset($_GET['disconnect'])) {
        disconnection();
    }

    #TODO make a function which returns global links in function of user's state:
    # connected or not and use it for every page
    $others_links = array();
    if (!is_connected()) {
        $others_links []= array(
            'href'  => Config::$root_uri.'connexion',
            'title' => 'Connexion'
        );
    }
    else {

        $others_links []= array(
            'href'  => Config::$root_uri.'forum',
            'title' => 'Forum'
        );

        $others_links []= array(
            'href'  => Config::$root_uri.'~'.user()->getUsername(),
            'title' => 'Mon Profil'
        );

        $others_links []= array(
            'href'  => Config::$root_uri.'?disconnect',
            'title' => 'Déconnexion'
        );
    }

    # Rendering
    return Config::$tpl->render('home.html', tpl_array(array(

        'site' => array(
            'global_links' => array(
                'others' => $others_links
            )
        ),

        'page' => array(
            'title' => 'Accueil',

            'message' => $message,
            'message_type' => $message_type,

            'intro' => 'Bienvenue sur le site de l\'association IP7.',

            'news' => array(
                'news' => array()
            )
        ),
    )));

}

?>
