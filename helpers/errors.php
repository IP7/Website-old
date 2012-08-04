<?php

/**
 * Returns the corresponding text to the given error code.
 **/
function error_message($code=0) {
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

?>

