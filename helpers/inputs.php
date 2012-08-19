<?php

// basic filter
function get_string($s, $from=null) {
    if ($from == 'post') {
        $s = has_post($s) ? $_POST[$s] : '';
    } else if ($from == 'get') {
        $s = has_get($s) ? $_GET[$s] : '';
    }

    return trim($s);
}

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
        if (!preg_match('@^\://@')) {
            $ws = 'http://'.$ws;
        }
        else {
            $ws = 'http'.$ws;
        }
    }

    return true;
}

// filter username
function filter_username($username, $from=null) {
    $username = get_string($username, $from);

    return preg_match('/[a-z0-9]{3,}[_a-z0-9]+/i', $username);
}

?>
