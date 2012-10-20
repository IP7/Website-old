<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

function display_home() {

    if (has_post('disconnect')) {
        disconnection();

        if (has_post('u') && $_POST['u'][0] == '/') {
            $u = explode('?', get_string('u', 'post'));
            redirect_to($u[0], array('status' => HTTP_SEE_OTHER));
        }
    }

    $tpl_name = is_connected() ? 'connected_home.html' : 'home.html';

    $scripts = null;

    if (is_connected()) {
        $scripts = array(
            array( 'href' => js_url('connected_home') )
        );
    }

    # Rendering
    return tpl_render($tpl_name, array(

        'page' => array(
            'title' => 'Accueil',

            'breadcrumbs' => false,

            'news' => array(),

            'scripts' => $scripts
        )
    ));

}

function display_connection($message=null, $message_type=null) {

    if (!$message) {
        if (is_connected()) {
            redirect_to('/');
        }

        # Tokens
        if (has_get('t') && use_token(''.$_GET['t'])) {

            // if it's a 'canChangeXXX' token
            if ($_SESSION['token']['rights'] > 1) {
                redirect_to('/profile/init', array('status' => HTTP_SEE_OTHER));
            }

            // if it's a 'canConnect' token
            if ($_SESSION['token']['rights'] > 0) {
                redirect_to('/', array('status' => HTTP_SEE_OTHER));
            }
        }
    }

    $u = has_get('u') ? '?u='.$_GET['u'] : '';

    return tpl_render('connection.html', array(
        'page' => array(
            'title'                  => 'Connexion',
            'form'                   => array(
                'action' => Config::$root_uri.'connexion'.$u
            ),
            'breadcrumbs'            => false,

            'keywords'               => array( 'connexion' ),
            'description'            => 'Connexion',

            'forgotten_password_url' => Config::$root_uri.'oubli',

            'styles'                 => array(
                array( 'href' => css_url('pretty_inputs'), 'media' => 'all' ),
                array( 'href' => css_url('connection'),    'media' => 'all' )
            ),

            'message'                => $message,
            'message_type'           => $message_type,

            'scripts'                => array(
                array( 'href' => js_url('pretty_inputs') ),
                array( 'href' => js_url('gravatar') ),
                array( 'href' => js_url('connection') )
            )
        )
    ));
}

function post_connection() {
    $message = false;
    $message_type = '';

    # Connection
    if (isset($_POST['username']) && !empty($_POST['username'])) {

        $password = get_string('password', 'post', false);

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
            $u = '/';
            if (has_get('u') && $_GET['u'][0] == '/') {
                $u = explode('?', $_GET['u']);
            }
            redirect_to($u[0], array('status' => HTTP_SEE_OTHER));
        }
    }

    return display_connection($message, $message_type);
}

function display_forgotten_password($message=null, $message_type=null) {

    if (is_connected()) {
        redirect_to('/');
    }

    return tpl_render('forgotten_password.html', array(
        'page' => array(
            'title'        => 'Mot de passe oublié',

            'keywords'     => array( 'mot de passe', 'mdp', 'oublié' ),
            'description'  => 'Procédure de réinitialisation du mot de passe.',

            'form'         => array(
                'action'     => Config::$root_uri.'oubli',
                'post_token' => generate_post_token()
            ),
            'message'      => $message,
            'message_type' => $message_type
        )
    ));
}

function post_forgotten_password() {
    if (!has_post('email') || !has_post('t')) {
        return display_forgotten_password();
    }

    $email = get_string('email', 'POST');

    $user = UserQuery::create()->findOneByEmail($email);

    // bad email
    if (!$user) {
        return display_forgotten_password(
            'Aucun utilisateur n\'a cette adresse email.',
            'error'
        );
    }

    // bad token
    if (!use_token($_POST['t'], 'POST')) {
        return display_forgotten_password();
    }

    if (!send_connection_token_email($user)) {
        return display_forgotten_password(
            'Une erreur est survenue lors de l\'envoi du mail. Merci de contacter un responsable.',
            'error'
        );
    }

    return tpl_render('forgotten_password.html', array(
        'page' => array(
            'title'        => 'Email envoyé',
            'breadcrumbs'  => false,
            'mail_url'     => get_mail_provider_url($user),
            'confirmation' =>  'Vous allez bientôt recevoir un mail vous permettant'
                             . ' de modifier votre mot de passe.'
        )
    ));
}

?>
