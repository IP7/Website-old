<?php

function send_email_to($users, $from, $subject, $message) {

    if (is_array($users)) {
        foreach ($users as $k => $user) {
            if (!send_email_to($user, $from, $subject, $message)) {
                return false;
            }
        }
        return true;
    }

    $to      = $user->getEmail();
    $subject = trim($subject);
    $message = trim($message);

    $headers = 'From '.trim($from)."\r\n";

    return mail($to, $subject, $message, $headers);
}

// send a welcome message to a new user
function send_welcome_message($user, $password) {
    $subject = "Hello World!";

    $hours = intval(date('G'));

    $bonjour = ($hours > 4 && $hours < 19) ? 'Bonjour' : 'Bonsoir';


    $message  = $bonjour.' et bienvenue sur le site de l\'association IP7,';
    $message .= "\r\n\r\nVotre inscription s'est bien déroulée, voici vos";
    $message .= " identifiants :\r\n\tPseudonyme : ".$user->getUsername()."\r\n";
    $message .= "\tMot de passe : ".$password."\r\n\r\n";
    $message .= 'Ce mot de passe a été généré aléatoirement et est chiffré';
    $message .= ' dans notre base de données. Il est cependant recommandé de';
    $message .= " le changer en vous connectant sur le site :\r\n";
    $message .= "\thttp://www.infop7.org/connexion\r\nPuis en allant dans ";
    $message .= "Mon profil > Éditer.\r\n";

    return send_email_to($user, 'tresorerie@infop7.org', $subject, $message);
}

?>

