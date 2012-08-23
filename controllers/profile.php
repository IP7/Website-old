<?php

require_once dirname(__FILE__).'/../config.php'; 
Config::init();

// -- (GET) Display profile pages --

// $is_my_profile : true if the page is acceded through /profile
function display_profile_page($username=NULL, $is_my_profile=false) {

    // if there is no username
    if (empty($username)) {
        halt(NOT_FOUND);
    }

    // if the URL is /p/<my_username> or /profile, this is me
    $me = (is_connected() && user()->getUsername() === $username);
    $user = $me ? user() : UserQuery::create()->findOneByUsername($username);

    // if I try to access to my profile using /p/<my_username>, redirect
    // me to /profile
    if (!$is_my_profile && $me) {
        redirect_to('/profile', array( 'status' => HTTP_MOVED_PERMANENTLY));
    }

    // if the username is not correct
    if ($user == NULL) {
        halt(NOT_FOUND);
    }

    // if the visitor is not connected and this is a private profile
    if (!is_connected() && $user->getConfigPrivateProfile()) {
        halt(NOT_FOUND);
    }

    $tpl_user = tpl_user($user, true);

    // if the accound is deactivated
    if (!$user->isActivated()) {

        $title = 'Profil de '.$tpl_user['displayed_name'];

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

    // I can edit if it's me or an admin
    $can_edit = ($me || (is_connected() && user()->isAdmin()));

    // I can see the options if it's me or an admin
    $can_see_options = $can_edit;

    $edit_button = false;

    if ($can_edit) {
        $edit_button = array( 'title' => 'Éditer' );
        // if this is me, go to /profile/edit to edit the profile, else
        // go to /p/the_username/edit
        $edit_button['href'] = Config::$root_uri.( $me ? 'profile/edit' : 'p/'.$user->getUsername().'/edit');
    }

    // displaying options
    if ($can_see_options) {
        foreach ($tpl_user['options'] as $k => $opt) {
            $tpl_user['options'][$k] = array(
                'title' => $opt['title'],
                'value' => bool_to_fr($opt['value'])
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

    if (!$user->getConfigShowRealName()) {
        $tpl_user['firstname'] = $tpl_user['lastname'] = false;
    }

    if (!$user->getConfigShowBirthdate()) {
        $tpl_user['birthdate'] = false;
    }

    if (!$user->getConfigShowAge()) {
        $tpl_user['age'] = false;
    }

    if (!$user->getConfigShowAddress()) {
        $tpl_user['address'] = false;
    }

    $profile = array(
        'page' => array(
            'edit_button' => $edit_button,

            'title' => $me ? 'Mon profil' : 'Profil de '.$tpl_user['displayed_name'],

            'user' => $tpl_user
        )
    );

    return tpl_render('public_profile.html', $profile);

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

    $tpl_user = tpl_user($user, true);

    return tpl_render('profile_edit.html', array(
        'page' => array(
            'title' => 'Édition du profil'.($me ? '' : ' de '.$tpl_user['displayed_name']),

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
            $msgstr = 'Veuillez entrer votre ancien mot de passe pour le changer.';
            $msgtype = 'error';
        }
        else if (!Config::$p_hasher->CheckPassword($_POST['old_password'],
                                                   user()->getPasswordHash())) {
                $msgstr = 'L\'ancien mot de passe est incorrect.';
                $msgtype = 'error';
        }
        else {

            $p = $_POST['new_password'];

            if (strlen($p) < 3) {
                $msgstr = 'Le nouveau mot de passe est trop court.';
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

    if (has_post('description')) {
        $desc = trim($_POST['description']);

        if (strlen($desc) > 512) {
            $desc = mb_substr($desc, 0, 509).'...';
            $msgstr .= ($msgstr?' ':'').'La présentation est trop longue, elle a été tronquée à 512 caractères.';
            $msgtype = $msgtype || 'notice';
        }

        $user->setDescription($desc);
    }

    if (has_post('gender')) {
        $gender = trim($_POST['gender']);
        if (in_array($gender, array('M', 'F', 'N'))) {
            $user->setGender($gender);
        }
    }
    else {
        $user->setGender('N');
    }

    if (has_post('address')) {
        $address = trim($_POST['address']);

        $user->setAddress($address);
    }

    $opts_names = User::getConfigVars();
    $opts = array();

    foreach ($opts_names as $k => $opt) {
        $opts[$opt] = has_post($opt);
    }

    $user->setConfig($opts);

    $user->save();

    if (!$msgstr) {
        $redirect = $me ? '/profile' : '/p/'.$user->getUsername();
        redirect_to($redirect, array('status' => HTTP_SEE_OTHER));
    }


    return tpl_render('profile_edit.html', array(
        'page' => array(
            'title' => 'Edition du profil',
            'edit_form' => array( 'action' => Config::$root_uri.'profile/edit' ),

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

function display_init_my_profile_page() {
    if (!isset($_SESSION) || !isset($_SESSION['token']) || empty($_SESSION['token'])) {
        halt(HTTP_FORBIDDEN);
    }

    $token = $_SESSION['token'];
    $user = $token['user'];
    $rights = $token['rights'];

    $post_token = generate_token($user, $rights, time() + 3600*24, 'POST');

    $fields = array();

    if ($rights & Token::canChangeUsername) {
        $fields []= array(
            'label' => 'Pseudo',
            'name'  => 'username',
            'type'  => 'text'
        );
    }

    if ($rights & Token::canChangeName) {
        $fields []= array(
            'label' => 'Nom',
            'name'  => 'lastname',
            'type'  => 'text'
        );
        $fields []= array(
            'label' => 'Prénom',
            'name'  => 'firstname',
            'type'  => 'text'
        );
    }

    if ($rights & Token::canChangeEmail) {
        $fields []= array(
            'label' => 'Email',
            'name'  => 'email',
            'type'  => 'email'
        );
    }

    if ($rights & Token::canChangePhone) {
        $fields []= array(
            'label' => 'Téléphone',
            'name'  => 'phone',
            'type'  => 'phone'
        );
    }

    unset($_SESSION['token']);

    return tpl_render('profile/init.html', array(
        'page' => array(
            'title' => 'Initialisation du profil',
            'user' => tpl_user($user),
            'form' => array(
                'action' => Config::$root_uri.'profile/init',

                'post_token' => $post_token,

                'fields' => $fields
            )
        )
    ));
}

?>
