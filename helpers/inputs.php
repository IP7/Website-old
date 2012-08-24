<?php

// basic filter
function get_string($s, $from=null, $trim=true) {
    $from = strtolower($from);

    if ($from == 'post') {
        $s = has_post($s) ? $_POST[$s] : '';
    } else if ($from == 'get') {
        $s = has_get($s) ? $_GET[$s] : '';
    }

    return $trim ? trim($s) : $s;
}

/* -- Filters -- */

// filter an URL. If the URL is correct,
// the variable may be modified to add a missing protocol
// The function returns true or false.
function filter_website(&$ws, $from=null) {

    $ws = get_string($ws, $from);

    $ws = trim($ws);

    if (empty($ws) || strlen($ws) == 0) {
        return false;
    }

    $valid_website = '@^(?:https?\://)?'   // optional protocol HTTP or HTTPS
        .'(?:\w{1,255}\.){0,2}' // 0, 1 or 2 sub(sub)domains (could be more but who use >2 subdomains?)
        .'[-a-z0-9ßàáâãäåæçèéêëìíîñòóôõöùúûüýÿœ]{1,255}' // domain with accents
        .'\.(?:[a-z]{2,4}|42)' // tld
        .'/?' // optional trailing slash
        .'(?:\:(?:\d{2,5})?)?' // optional port
        .'(?:/[-\w\.]*)*' // subfolders
        .'(?:\?[^#]*)?' // GET params
        .'(?:#[^\s\[\]]*)?$@i'; // anchor

    if (!preg_match($valid_website, $ws)) {
        return false;
    }

    if (!preg_match('@^https?\://@', $ws)) {
        if (!preg_match('@^//@')) {
            $ws = 'http://'.$ws;
        }
        else {
            $ws = 'http:'.$ws;
        }
    }

    return true;
}

// filter username
function filter_username($username, $from=null) {
    $username = get_string($username, $from);

    return preg_match('/^[a-z0-9][_a-z0-9]{2,}$/i', $username);
}

// filter a name
function filter_name($name, $from=null) {
    $name = get_string($name, $from);

    // basic sample of forbidden chars
    return !preg_match('/[_<>\/[\]?!;%&*$:]/i', $name);
}

// filter an email
function filter_email($email, $from=null) {
    $email = get_string($email, $from);

    // may be changed to be more accurate
    return preg_match('/^[-+.a-zA-Z0-9]+@[-a-zA-Z0-9]+\.[a-z]{2,4}$/', $email);
}

// filter a French phone number
function filter_phone($phone, $from=null) {
    $phone = get_string($phone, $from);

    $len = strlen($phone);

    switch ($len) {
    case 10: // 06xxxxxxxx
        return ($phone[0] == '0');
    case 11: // 33xxxxxxxx
        return (($phone[0] == 3) && ($phone[1] == 3));
    case 13: // 0033xxxxxxxx
        return ($phone[0] + $phone[1] == 0);
    }

    return false;
}

/* -- Formats -- */

// (re)format a phone number given by an user
function format_phone($phone) {
    return implode('', preg_split('/\D+/', trim($phone)));
}

?>
