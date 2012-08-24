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

function display_connection($message=null, $message_type=null) {

    if (!$message) {
        if (is_connected()) {
            redirect_to('/');
        }

        # Tokens
        if (has_get('t')
            && use_token(''.$_GET['t'])
            && ($_SESSION['token']['rights'] > 1)) {
                redirect_to('/profile/init', array('status' => HTTP_SEE_OTHER));
        }
    }

    return tpl_render('connection.html', array(
        'page' => array(
            'title' => 'Connexion',
            'connection' => array( 'action' => Config::$root_uri.'connexion' ),

            'message' => $message,
            'message_type' => $message_type
        )
    ));
}

function post_connection() {
    $message = false;
    $message_type = '';

    # Connection
    if (isset($_POST['username']) && !empty($_POST['username'])) {

        $password = get_string('password', 'post', false);

        # sanitization made by Propel
        $res = connection(
            get_string('username', 'post'),
            $password,
            (isset($_POST['remember']) ? (bool)$_POST['remember'] : false)
        );

        if ($res !== CONNECTION_OK) {
            $message_type = 'error';
            $message = app_error_message($res);
        }
        else {
            redirect_to('/', array('status' => HTTP_SEE_OTHER));
        }
    }

    return display_connection($message, $message_type);
}

?>
