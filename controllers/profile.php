<?php

function display_init_my_profile_page($token=null, $message=null, $message_type=null) {

    if (!$token) {
        if (!isset($_SESSION) || !isset($_SESSION['token']) || empty($_SESSION['token'])) {
            halt(HTTP_FORBIDDEN);
        }
    }
    else if (!use_token($token, 'GET')) {
        halt(HTTP_FORBIDDEN);
    }

    $token    = $_SESSION['token'];
    $user     = $token['user'];

    if (!$user) {
        // to prevent 'Call to a member function getUsername() on a non-object'
        halt(HTTP_FORBIDDEN);
    }

    $username = $user->getUsername();
    $rights   = $token['rights'];

    $post_token = generate_token($user, $rights, $_SERVER['REQUEST_TIME'] + 3600 * 24, true);

    $fields = array();
    $infos = array();

    if ($rights & Token::canChangeUsername) {

        $username = $user->getUsername();

        $fields []= array(
            'label' => 'Pseudo',
            'name'  => 'username',
            'type'  => 'text',
            'value' => is_temp_username($username) ? '' : $username
        );
    } else {
        $infos []= array(
            'name' => 'Pseudo',
            'value' => is_temp_username($username) ? '' : $username
        );
    }

    if ($rights & Token::canChangeName) {
        $fields []= array(
            'label' => 'Nom',
            'name'  => 'lastname',
            'type'  => 'text',
            'value' => $user->getLastName()
        );
        $fields []= array(
            'label' => 'Prénom',
            'name'  => 'firstname',
            'type'  => 'text',
            'value' => $user->getFirstName()
        );
    } else {
        $infos []= array( 'name' => 'Nom', 'value' => $user->getLastName());
        $infos []= array( 'name' => 'Prénom','value'=>$user->getFirstName());
    }

    if ($rights & Token::canChangeEmail) {
        $fields []= array(
            'label' => 'Email',
            'name'  => 'email',
            'type'  => 'email',
            'value' => $user->getEmail()
        );
    } else {
        $infos []= array( 'name' => 'Email', 'value' => $user->getEmail() );
    }

    if ($rights & Token::canChangePhone) {
        $fields []= array(
            'label' => 'Téléphone',
            'name'  => 'phone',
            'type'  => 'phone',
            'value' => $user->getPhone()
        );
    } else {
        $infos []= array( 'name' => 'Téléphone', 'value' => $user->getPhone() );
    }

    if ($rights & Token::canChangePassword) {
        $fields []= array(
            'label' => 'Nouveau mot de passe',
            'name'  => 'password',
            'type'  => 'password',
            'value' => ''
        );
    }

    unset($_SESSION['token']);

    return tpl_render('profile/init.html', array(
        'page' => array(
            'title' => 'Initialisation du profil',
            'message' => $message,
            'message_type' => $message_type,
            'user' => tpl_user($user),
            'form' => array(
                'action' => Config::$root_uri.'profil/créer',

                'post_token' => $post_token,

                'fields' => $fields
            ),
            'infos' => $infos,

            'scripts' => array(
                array( 'href' => js_url('subscription') )
            )
        )
    ));
}

function post_init_my_profile_page() {
    if (!has_post('t')) {
        halt(HTTP_FORBIDDEN);
    }

    if (!use_token($_POST['t'], 'POST')) {
        halt(HTTP_FORBIDDEN);
    }

    $message = $message_type = null;

    $user = $_SESSION['token']['user'];
    $rights = $_SESSION['token']['rights'];

    $invalid_fields = 0;

    if (has_post('username') && ($rights & Token::canChangeUsername)) {

        $username = get_string('username', 'post');

        if (!filter_username($username)) {
            $message = 'Le pseudo n\'est pas valide.';
            $message_type = 'error';
            $invalid_fields |= Token::canChangeUsername;
        }
        else if (UserQuery::create()->findOneByUsername($username)) {
            $message = 'Le pseudo est déjà pris.';
            $message_type = 'error';
            $invalid_fields |= Token::canChangeUsername;
        }
        else {
            $user->setUsername($username);
        }
    }

    if (has_post('firstname') && ($rights & Token::canChangeName)) {
        $firstname = get_string('firstname', 'post');

        if (!filter_name($firstname)) {
            $message .= ($message ? ' ' : '') . 'Le prénom n\'est pas valide.';
            $message_type = $message_type || 'error';
            $invalid_fields |= Token::canChangeName;
        }
        else {
            $user->setFirstName($firstname);
        }
    }

    if (has_post('lastname') && ($rights & Token::canChangeName)) {
        $lastname = get_string('lastname', 'post');

        if (!filter_name($lastname)) {
            $message .= ($message ? ' ' : '') . 'Le nom n\'est pas valide.';
            $message_type = $message_type || 'error';
            $invalid_fields |= Token::canChangeName;
        }
        else {
            $user->setLastName($lastname);
        }
    }

    if (has_post('email') && ($rights & Token::canChangeEmail)) {
        $email = get_string('email', 'post');

        if (!filter_email($email)) {
            $message .= ($message ? ' ' : '') . 'L\'email n\'est pas valide.';
            $message_type = $message_type || 'error';
            $invalid_fields |= Token::canChangeEmail;
        }
        else {
            $user->setEmail($email);
        }
    }

    if (has_post('phone') && ($rights & Token::canChangePhone)) {
        $phone = format_phone(get_string('phone', 'post'));
        if (!filter_phone($phone)) {
            $message .= ($message ? ' ' : '') . 'Le téléphone n\'est pas valide.';
            $message_type = $message_type || 'error';
            $invalid_fields |= Token::canChangePhone;
        }
        else {
            $user->setPhone($phone);
        }
    }

    if (has_post('password') && ($rights & Token::canChangePassword)) {
        $user->setPassword(get_string('password', 'post', false));
    }

    $user->save();

    if (!$message) {
        redirect_to('/connexion', array( 'status' => HTTP_SEE_OTHER ));
    }

    $new_token = generate_token($user, $invalid_fields, time() + 3600 * 24, false);

    return display_init_my_profile_page($new_token, $message, $message_type);
}
