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

?>

