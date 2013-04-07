<?php

function send_email_to_user($user, $from, $subject, $message, $from_name='IP7') {

    $to = null;

    if (is_array($user)) {
        $to = array();
        foreach ($user as $k => $u) {
            $to []= $u->getEmail();
        }
    }
    else { $to = $user->getEmail(); }

    return send_email_to($to, $from, $subject, $message, $from_name);
}

function send_email_to($to, $from, $subject, $message, $from_name='IP7') {
    if (is_array($to)) {
        foreach ($to as $k => $t) {
            if (!send_email_to($t, $from, $subject, $message)) {
                return false;
            }
        }
        return true;
    }

    $to      = trim($to);
    $subject = trim($subject);
    $message = trim($message);

    $headers = 'From: '.$from_name.' <'.trim($from).">\r\n";

    return mail($to, $subject, $message, $headers);
}

// send a welcome message to a new user
function send_welcome_message($user) {
    $subject = "Hello World!";

    $token = generate_token(
        $user,
        Token::canChangePassword | Token::canChangeUsername,
        time() + Durations::ONE_DAY
    );

    $message  = Lang\bonjour().' et bienvenue sur le site de l\'association IP7,';
    $message .= "\r\n\r\nVotre inscription s'est bien déroulée, il ne manque plus";
    $message .= "qu'à définir vos identifiants de connexion. Cliquez sur le lien";
    $message .= " suivant pour le faire :\r\n\r\n\thttp://www.infop7.org/connexion?t=$token";
    $message .= "\r\n\r\nCe lien est à usage unique et expire dans 24 heures. Vous";
    $message .= " pourrez ensuite vous connecter et éditer votre profil.\r\nCe ";
    $message .= "message a été envoyé automatiquement, il est inutile d'y répondre.";

    return send_email_to_user($user, 'tresorerie@infop7.org', $subject, $message);
}

// send an unique URL to the given user, which allows him/her to connect
// to his/her account without a password.
function send_connection_token_email($user) {

    $subject = 'Mot de passe oublié';
    $token   = generate_token($user, Token::canChangePassword, time()+Durations::ONE_DAY);

    $message = Lang\bonjour().', vous trouverez ci-dessous un lien vous'
             . ' permettant de vous connecter à votre compte pour réinitialiser'
             . ' votre mot de passe :'
             . "\r\n\r\n\thttp://www.infop7.org/connexion?t=$token\r\n\r\n"
             . 'Ce lien expire dans 24 heures et n\'est valable qu\'une seule fois.';

    return send_email_to_user($user, 'noreply@infop7.org', $subject, $message);
}

// returns the URL of the mail provider of the user, or NULL if it
// can't be determined.
function get_mail_provider_url($user) {
    $providers = array(
        'etu.univ-paris-diderot' => 'webmail.etu.univ-paris-diderot.fr/ent-p7',
        'free.fr'                => 'imp.free.fr',
        'laposte.net'            => 'www.laposte.net',
        'gmail.com'              => 'mail.google.com/mail',
        'hotmail.fr'             => 'www.hotmail.fr',
        'hotmail.com'            => 'www.hotmail.com',
        'myopera.com'            => 'mail.opera.com',
        'orange.fr'              => 'webmail.orange.fr/webmail',
        'voila.fr'               => 'mail.voila.fr',
        'yahoo.com'              => 'mail.yahoo.com',
        'yahoo.fr'               => 'fr.mail.yahoo.com'
    );

    $provider = explode('@', ''.$user->getEmail());
    if (count($provider) < 2) { return NULL; }

    $provider = $provider[1];

    if (array_key_exists($provider, $providers)) {
        return '//'.$providers[$provider];
    }
    return NULL;
}

// send an email to contact@infop7.org when an user creates
// an account on the website
function notify_infop7_for_new_user($user) {

    $subject = 'Nouvel utilisateur sur le site';
    $message = 'Un nouvel utilisateur s\'est inscrit sur le site : '
             . $user->getFirstName() . ' ' . $user->getLastName()
             . ' (' . $user->getEmail() . ').';
    $from    = 'noreply@infop7.org';
    $to      = 'contact@infop7.org';

    return send_email_to($to, $from, $subject, $message);

}
