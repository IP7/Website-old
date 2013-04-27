<?php

// -- (GET) Display profile pages --

// $is_my_profile : true if the page is acceded through /profil
function display_profile_page($username=NULL, $is_my_profile=false) {

    // if there is no username
    if (empty($username)) {
        halt(NOT_FOUND);
    }

    $user = UserQuery::create()->findOneByUsername($username);

    // if the username is not correct
    if ($user == NULL) {
        halt(NOT_FOUND);
    }

    // ?public allows one to see their profile as a non-connected user (#309)
    $as_public    = has_get('public', true);
    $is_connected = !$as_public && is_connected();
    $is_admin     = $is_connected && user()->isAdmin();

    // if the user isn't on his/her profile, and ?public is present,
    // remove it
    if ((!is_connected() || user()->getUsername() !== $username) && $as_public) {
        redirect_to(user_url($user));
    }

    // if the URL is /p/<my_username> or /profil, this is me
    $me = ($is_connected && user()->getUsername() === $username);
    if ($me) { $user = user(); }

    // if I try to access to my profile using /p/<my_username>, redirect
    // me to /profil
    if (!$is_my_profile && $me) {
        redirect_to('/profil', array( 'status' => HTTP_MOVED_PERMANENTLY));
    }

    // if the visitor is not connected and this is a private profile
    if (!$is_connected && $user->getConfigPrivateProfile()) {
        halt(NOT_FOUND);
    }

    $tpl_user = tpl_user($user, true);

    $msg_str = '';
    $msg_type = '';
    $moderation_bar = array();

    if ($me) {
        $moderation_bar []= array(
            'href' => user_url($user) . '?public',
            'title' => 'Voir mon profil public'
        );
    }

    // if the accound is deactivated
    if (!$user->isActivated()) {

        if (!$is_admin) {
            $title = $tpl_user['displayed_name'];

            return tpl_render('deactivated_profile.html', array(
                'page' => array(
                    'user' => $tpl_user,
                    'title' => $title,

                    'breadcrumbs' => array(
                        1 => array( 'title' => $title, 'href' => url() )
                    )
                )
            ));    
        }

        // if I'm an admin
        $msg_str =  'Ce compte a été désactivé.';
        $msg_type = 'notice';
    }

    // I can edit if it's me or an admin
    $can_edit = ($me || $is_admin);

    // I can see the options only if it's me or I'm an admin
    $can_see_options = $can_edit;

    if ($can_edit) {
        $edit_button = array( 'title' => 'Éditer' );
        // if this is me, go to /profil/éditer to edit the profile, else
        // go to /p/the_username/éditer
        $edit_button['href'] = Config::$root_uri.( $me ? 'profil' : 'p/'.$user->getUsername() ).'/éditer';

        $moderation_bar []= $edit_button;
    }

    // displaying options
    if ($can_see_options) {
        foreach ($tpl_user['options'] as $k => $opt) {
            $tpl_user['options'][$k] = array(
                'title' => $opt['title'],
                'value' => Lang\bool_to_fr($opt['value'])
            );
        }
    }
    else {
        $tpl_user['options'] = null;
    }

    // displayed options

    if (!$user->getConfigShowEmail()) {
        $tpl_user['email'] = false;
    }

    if (!$user->getConfigShowPhone()) {
        $tpl_user['phone'] = false;
    }

    if (!$user->getConfigShowBirthdate()) {
        $tpl_user['birthdate'] = false;
    }

    if (!$user->getConfigShowAge()) {
        $tpl_user['age'] = false;
    }

    $profile = array(
        'page' => array(
            'message' => $msg_str,
            'message_type' => $msg_type,

            'title' => $me ? 'Mon profil' : $tpl_user['displayed_name'],

            'user' => $tpl_user,

            'moderation_bar' => $moderation_bar
        )
    );

    return tpl_render('profile/public.html', $profile);

}

function display_my_profile_page(){
    if (!is_connected()) { halt(NOT_FOUND); }
    // don't put the second argument to 'false', it would cause
    // an infinite loop
    return display_profile_page(user()->getUsername(), true);
}

// -- (GET) Edit profile pages --

function display_edit_profile_page($username=NULL, $is_my_profile=false) {

    $me = (is_connected() && user()->getUsername() == $username);

    // if I'm not connected or this is not me or I'm not an admin
    if (!is_connected()
        || empty($username)
        || ((user()->getUsername() != $username) && (!user()->isAdmin()))) {
        halt(NOT_FOUND);
    }
    
    $user = ((user()->getUsername() == $username)
                ? user()
                : UserQuery::create()->findOneByUsername($username));

    if (!$user) {
        halt(NOT_FOUND);
    }

    $tpl_user = tpl_user($user, true);

    if (is_connected() && user()->isAdmin() && user()->getUsername() != $username) {
        $tpl_user['options'] []= array(
            'name'  => 'activate',
            'title' => 'Activer',
            'value' => $user->isActivated()
        );
    }

    return tpl_render('profile/edit.html', array(
        'page' => array(
            'title' => 'Édition du profil'.($me ? '' : ' '.Lang\de($tpl_user['displayed_name'])),

            'user' => $tpl_user,

            'edit_form' => array( 'action' => url() )
        )
    ));
}

function display_edit_my_profile_page() {
    if (!is_connected()) { halt(NOT_FOUND); }
    // don't put the second argument to 'false', it would cause
    // an infinite loop
    return display_edit_profile_page(user()->getUsername(), true);
}


// -- (POST) Edit profile pages

function post_edit_profile_page($username=NULL) {
    if (!is_connected() || (($username != user()->getUsername()) && (!user()->isAdmin()))) {
        halt(NOT_FOUND);
    }

    $me = ($username == user()->getUsername());

    $user = $me ? user() : UserQuery::create()->findOneByUsername($username);

    if ($user == NULL) {
        halt(NOT_FOUND);
    }

    $msgstr = '';
    $msgtype = false;

    if (has_post('new_password')) {
        if (!has_post('old_password')) {
            $msgstr = ($msgstr?' ':'').'Veuillez entrer votre ancien mot de passe pour le changer.';
            $msgtype = 'error';
        }
        else if (!Config::$p_hasher->CheckPassword($_POST['old_password'],
                                                   user()->getPasswordHash())) {
                $msgstr = ($msgstr?' ':'').'L\'ancien mot de passe est incorrect.';
                $msgtype = 'error';
        }
        else {

            $p = $_POST['new_password'];

            if (strlen($p) < 3) {
                $msgstr .= ($msgstr?' ':'').'Le nouveau mot de passe est trop court.';
                $msgtype = 'error';
            }
            else {
                $user->setPassword($p);
            }    
        }
    }

    if (has_post('website')) {
        $website = $_POST['website'];
        if (!filter_website($website)) {
            $msgstr .= ($msgstr?' ':'').'Le site Web est incorrect.';
            $msgtype = 'error';
        }
        else {
            $user->setWebsite($website);
        }
    }

    $desc = '';

    if (has_post('description')) {
        $desc = trim($_POST['description']);

        if (strlen($desc) > 512) {
            $desc = mb_substr($desc, 0, 509).'...';
            $msgstr .= ($msgstr?' ':'').'La présentation est trop longue, elle a été tronquée à 512 caractères.';
            $msgtype = $msgtype || 'notice';
        }

    }

    $user->setDescription($desc);

    if (has_post('gender')) {
        $gender = trim($_POST['gender']);
        if (in_array($gender, array('M', 'F', 'N'))) {
            $user->setGender($gender);
        }
    }
    else {
        $user->setGender('N');
    }

    $opts_names = User::getConfigVars();
    $opts = array();

    foreach ($opts_names as $k => $opt) {
        $opts[$opt] = has_post($opt);
    }

    $user->setConfig($opts);

    if (user()->isAdmin() && user()->getUsername() != $username) { 
        // If I'm an admin and the edited profile is not mine
        $user->setDeactivated(!has_post('activate'));
    }

    $user->save();

    if (!$msgstr) {
        $redirect = $me ? '/profil' : '/p/'.$user->getUsername();
        redirect_to($redirect, array('status' => HTTP_SEE_OTHER));
    }


    return tpl_render('profile/edit.html', array(
        'page' => array(
            'title' => 'Edition du profil',
            'edit_form' => array( 'action' => Config::$root_uri.'profil/editer' ),

            'user' => tpl_user($user, true),

            'message' => $msgstr,
            'message_type' => $msgtype
        )
    ));

}

function post_edit_my_profile_page() {
    if (!is_connected()) { halt(NOT_FOUND); }
    return post_edit_profile_page(user()->getUsername());
}

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

?>
