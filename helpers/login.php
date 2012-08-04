<?php

	require_once 'config.php';
	Config::init();

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

		if ( $user instanceof User ){
			if ( Config::$p_hasher->CheckPassword($password, $user->getPasswordHash()) ){
				if ( $user->isActivated() ){
					return $user;
				}
				return DEACTIVATED_ACCOUNT;
			}
		}
		return WRONG_USERNAME_OR_PASSWORD;
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

        if (is_connected()) {
            return ALREADY_CONNECTED;
        }

        $user = check_user_credentials($username, $password);

        if (!( $user instanceof User )) {
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
                      $user->getUsername().':'.$user->getPasswordHash(),
                      AUTH_COOKIE_EXPIRE,
                      '/',
                      'www.infop7.org');
        }

        if (!isset($_SESSION['visit_counted'])) {
            $user->incrementVisitsNb();
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
        return (isset($_SESSION['user']) && ($_SESSION['user'] instanceof User));
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

        if (count($credentials) < 2) { return false; }

        $username = $credentials[0];
        $hash     = $credentials[1];

        $user = UserQuery::create()
                    ->filterByPseudo($username)
                    ->filterByPasswordHash($hash)
                    ->findOne();

        if ($user instanceof User) {
            return set_connected($user, true);
        }

        return false;
    }

?>

