<?php

function send_email_to($user, $from, $subject, $message) {

    if (is_array($user)) {
        foreach ($user as $k => $u) {
            if (!send_email_to($u, $from, $subject, $message)) {
                return false;
            }
        }
        return true;
    }

    $to      = $user->getEmail();
    $subject = trim($subject);
    $message = trim($message);

    $headers = 'From: IP7 <'.trim($from).">\r\n";

    return mail($to, $subject, $message, $headers);
}

// send a welcome message to a new user
function send_welcome_message($user, $password) {
    $subject = "Hello World!";

    $message  = bonjour().' et bienvenue sur le site de l\'association IP7,';
    $message .= "\r\n\r\nVotre inscription s'est bien déroulée, voici vos";
    $message .= " identifiants :\r\n\r\n\tPseudonyme : ".$user->getUsername()."\r\n";
    $message .= "\tMot de passe : ".$password."\r\n\r\n";
    $message .= 'Ce mot de passe a été généré aléatoirement et est chiffré';
    $message .= ' dans notre base de données. Il est cependant recommandé de';
    $message .= " le changer en vous connectant sur le site :\r\n";
    $message .= "\thttp://www.infop7.org/connexion\r\nPuis en allant dans ";
    $message .= "Mon profil > Éditer.\r\n";

    return send_email_to($user, 'tresorerie@infop7.org', $subject, $message);
}

// send an unique URL to the given user, which allows him/her to connect
// to his/her account without a password.
function send_connection_token_email($user) {

    $subject = 'Mot de passe oublié';
    $token   = generate_token($user, Token::canChangePassword, time()+Durations::ONE_DAY);

    $message = bonjour().', vous trouverez ci-dessous un lien vous'
             . ' permettant de vous connecter à votre compte pour réinitialiser'
             . ' votre mot de passe :'
             . "\r\n\r\n\thttp://www.infop7.org/connexion?t=$token\r\n\r\n"
             . 'Ce lien expire dans 24 heures et n\'est valable qu\'une seule fois.';

    return send_email_to($user, 'noreply@infop7.org', $subject, $message);
}

// returns the URL of the mail provider of the user, or NULL if it
// can't be determined.
function get_mail_provider_url($user) {
    $providers = array(
        'gmail.com'          => 'mail.google.com/mail',
        'hotmail.fr'         => 'www.hotmail.fr',
        'hotmail.com'        => 'www.hotmail.com',
        'orange.fr'          => 'webmail.orange.fr/webmail',
        'voila.fr'           => 'mail.voila.fr',
        'yahoo.com'          => 'mail.yahoo.com',
        'yahoo.fr'           => 'fr.mail.yahoo.com'
    );

    $provider = explode('@', ''.$user->getEmail());
    if (count($provider) < 2) { return NULL; }

    $provider = $provider[1];

    if (array_key_exists($provider, $providers)) {
        return '//'.$providers[$provider];
    }
    return NULL;
}

?>
