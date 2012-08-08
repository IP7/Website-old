<?php

/**
 * Returns the corresponding text to the given error code.
 **/
function app_error_message($code=0) {
    switch ($code) {
    # Connection
    case WRONG_USERNAME_OR_PASSWORD:
        return 'Mauvais nom d\'utilisateur ou mot de passe.';
    case DEACTIVATED_ACCOUNT:
        return 'Compte désactivé.';
    case ALREADY_CONNECTED:
        return 'Déjà connecté.';

    default:
        return 'Erreur inconnue.';
    }

}

// return HTML for the given HTTP error
function display_http_error($errno, $errstr=null, $errfile=null, $errline=null) {

    $err_msgs = include(dirname(__FILE__).'/errors_messages.php');

    if (empty($errstr)) {
        if (array_key_exists($errno, $err_msgs)) {
            $errstr = $err_msgs[$errno];
        }
        else {
            $errstr = 'Oups, erreur '.$errno.'.';
        }
    }

    error_log("Error: num='$errno', str='$errstr', file='$errfile', line='$errline'.");

    return Config::$tpl->render('error.html', tpl_array(array(
        'page' => array(
            'errno'  => $errno,
            'errstr' => $errstr
        )
    )));
}

?>
