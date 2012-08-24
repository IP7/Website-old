<?php

require_once 'config.php';
Config::init();

/**
 * returns $_SESSION['user']
 **/
function user() {
    return $_SESSION['user'];
}

/**
 * Verify if user's credentials are valid. If so,
 * return the corresping User object. If the credentials
 * are invalid, return DEACTIVATED_ACCOUNT or
 * WRONG_USERNAME_OR_PASSWORD.
 *
 * @param	String $username	username
 * @param	String $password	password
 **/
function check_user_credentials($username, $password){

    $username = (string)$username;
    $password = (string)$password;

    $user = UserQuery::create()
                ->findOneByUsername($username);

    // Bad username
    if ($user == NULL) { return WRONG_USERNAME_OR_PASSWORD; }

    // Bad password
    if (Config::$p_hasher->CheckPassword($password, $user->getPasswordHash())) {
        return WRONG_USERNAME_OR_PASSWORD;
    }

    // Deactivated user
    if ( !$user->isActivated() || is_temp_username($user->getUsername()) ){
        return DEACTIVATED_ACCOUNT;
    }

    return $user;
}


/**
 *
 * Connect and return an user.
 *
 * @param	String $username	username
 * @param	String $password	password
 * @see check_user_credentials
 **/
function connection($username, $password, $remember=false) {

    if (is_connected() && user()->getUsername() == $username) {
        return ALREADY_CONNECTED;
    }

    $user = check_user_credentials($username, $password);

    if (!($user instanceof User)) {
        return $user; // error code
    }

    return set_connected($user, $remember);
}


/**
 * Set $_SESSION & $_COOKIE variables to connect the given user.
 * Returns CONNECTION_OK.
 **/
function set_connected($user, $remember=false) {
    $_SESSION['user'] = $user;
    if ($remember) {
        setcookie(AUTH_COOKIE,
                  '1:'.$user->getId().':'.$user->getPasswordHash(),
                  AUTH_COOKIE_EXPIRE,
                  '/');
                  # production: add the line below.
                  # 'wwww.infop7.org');
    }

    if (!isset($_SESSION['visit_counted'])) {
        $user->incrementVisitsNb();
        $user->setLastVisit(new DateTime());
        $_SESSION['visit_counted'] = true;
    }

    return CONNECTION_OK;
}

/**
 * Disconnect the current connected user. Return false if no one
 * is connected.
 **/
function disconnection() {
    if (!is_connected()) { return false; }
    setcookie(AUTH_COOKIE); // remove cookie
    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    return true;
}


/**
 * Test if an user is already connected, and return true or false.
 **/
function is_connected() {
    return (isset($_SESSION['user'])
                && (user() instanceof User)
                && user()->isActivated());
}

/**
 * Try to connect automatically an user if a cookie is set
 **/
function try_autoconnect() {
    if (is_connected()) {
        return ALREADY_CONNECTED;
    }

    if (!isset($_COOKIE) || !isset($_COOKIE[AUTH_COOKIE])) {
        return false;
    }

    $credentials = explode(':', $_COOKIE[AUTH_COOKIE]);

    if (count($credentials) < 3) { return false; }

    $id   = $credentials[1];
    $hash = $credentials[2];

    $user = UserQuery::create()
                ->filterById($id)
                ->filterByPasswordHash($hash)
                ->findOne();

    if ($user instanceof User) {
        return set_connected($user, true);
    }

    return false;
}

// generate a random string
function get_random_string($length=10) {
    // without 'l' and 'I', and 'o', 'O', '0' to avoid confusion
    $c = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789";
    $c_len = strlen($c)-1;
    $s = '';

    for($i=0; $i < $length; $i++) {
        $s .= $c[rand(0, $c_len)];
    }
    return str_shuffle($s);
}

// generate a random password
function get_random_password($length=10) {
    return get_random_string($length);
}

// generate a temporary username
function get_temp_username() {
   return '_tmp_'.get_random_string(9);
}

// test if an username is temporary
function is_temp_username($u) {
    return ((strlen($u) == 14) && (substr($u, 0, 4) == '_tmp_'));
}

?>
