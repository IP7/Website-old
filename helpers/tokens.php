<?php

/* generate, store in DB, and return an unique token,
   valid for the given user, and which will give him/her
   $rights rights. $rights must be an array:

   array(
        [
            [ Token::canConnect, ]
            [ Token::canChangeUsername, ]
            [ Token::canChangeName, ]
            [ Token::canChangeEmail, ]
            [ Token::canChangeTel ]
        | Token::canChangeWholeProfile ]
   )
*/
function generate_token($user=null, $rights_array=0, $expiration_date=null, $post_method=false) {

    $rights = 0;

    if ($user) {
        if (is_array($rights_array)) {
            foreach ($rights_array as $k => $v) {
                $rights |= $v;
            }
        } else {
            $rights = $rights_array;
        }
    }

    $token = new Token();
    $token->setUser($user);
    $token->setRights($rights);
    if ($expiration_date > $_SERVER['REQUEST_TIME']) {
        $token->setExpirationDate($expiration_date);
    }
    else {
        $token->setExpirationDate($_SERVER['REQUEST_TIME'] + Durations::ONE_MONTH);
    }

    $token->setMethod($post_method ? 'POST' : 'GET');
    $token->setValue(get_random_string(Token::size));
    $token->save();

    return $token->getValue();
}

// shortcut for generate_token($user, $rights_array, $expiration_date, true)
function generate_post_token($user=null, $rights_array=0, $expiration_date=null) {
    return generate_token($user, $rights_array, $expiration_date, true);
}

// if the given token is valid, set $_SESSION['token'] and returns true
function use_token($token_string, $used_method='GET') {

    $token = TokenQuery::create()
                ->filterByMethod($used_method)
                ->findOneByValue($token_string);

    // if there is no such token
    if (!$token) {
        return false;
    }

    // delete the token in the DB, but the PHP object still exists
    $token->delete();

    $expiration_date = strtotime($token->getExpirationDate());

    // if the token's expiration date is over
    if ($expiration_date > 0 && $expiration_date < time()) {
        return false;
    }

    $user   = $token->getUser();
    $rights = $token->getRights();
    $method = $token->getMethod();

    if ($rights < 0) {
        return false;
    }

    $_SESSION['token'] = array(
        'value'  => $token->getValue(),
        'rights' => $rights,
        'user'   => $user,
        'method' => $method
    );

    if ($user && ($rights & Token::canConnect)) {
        set_connected($user, false);
    }

    return true;
}

?>
