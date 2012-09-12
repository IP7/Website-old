<?php

// truncate a string to the given length
function truncate_string($s, $len=80, $elipse="...") {
    // can't use … because PHP doesn't support Unicode strings
    $s = trim($s);

    $s_len = strlen($s);
    $e_len = strlen($elipse);

    if ($s_len <= $len) {
        return $s;
    }

    if ($e_len >= $len) {
        return '';
    }

    return substr($s, 0, $len-$e_len).$elipse;
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

?>

