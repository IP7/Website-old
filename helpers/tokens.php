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
function generate_token($user, $rights_array, $expiration_date=null, $post_method=false) {

    $rights = 0;

    if (is_array($rights_array)) {
        foreach ($rights_array as $k => $v) {
            $rights |= $v;
        }
    } else {
        $rights = $rights_array;
    }

    if (($rights == 0) || ($user == NULL)) {
        return NULL;
    }

    $token = new Token();
    $token->setUser($user);
    $token->setRights($rights);
    if ($expiration_date > time()) {
        $token->setExpirationDate($expiration_date);
    }

    $token->setMethod($post_method ? 'POST' : 'GET');
    $token->setValue(get_random_string(Token::size));
    $token->save();

    return $token->getValue();
}

function use_token($token_string, $used_method='GET') {

    $token = TokenQuery::create()
                ->filterByMethod($used_method)
                ->findOneByValue($token_string);

    // if there is no such token
    if (!$token) {
        return false;
    }

    // if the token's expiration date is over
    if ($token->getExpirationDate() > 0 && $token->getExpirationDate() < time()) {
        $token->delete();
        return false;
    }

    $user   = $token->getUser();
    $rights = $token->getRights();
    $method = $token->getMethod();

    $token->delete();

    if ($rights <= 0) {
        return false;
    }

    $_SESSION['token'] = array( 'value'  => $token->getValue(),
                                'rights' => $rights,
                                'user'   => $user,
                                'method' => $method );

    if ($rights & Token::canConnect) {
        set_connected($user, false);
    }

    return true;
}

?>
