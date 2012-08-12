<?php

// return a DateTime object from a string
function get_datetime($s) {
    if (is_string($s)) {
        try {
            return new DateTime($s);
        }
        catch (Exception $e) {
            error_log($e);
            /* Propel seems to return some dates surrounded by curly brackets,
               e.g.: '{ 2010-08-04 }'. Using substr(X, 1, -1) deletes these curly
               brackets from X. */
            return new DateTime(substr($d, 1, -1));
        }
    }
    return $s;
}

// format a date for French output
function date_fr($d) {
    $d get_datetime($d);

    $str = $d->format('d/m/Y'); 

    $today = new DateTime();

    if ($today->format('d/m/Y') == $str) {
        return 'Aujourd\'hui';
    }

    $diff = $d->diff($today);

    if (intval($diff->format('%r%d')) == 1) {
        return 'Hier';
    }
    else if (intval($diff->format('%r%d')) == -1) {
        return 'Demain';
    }

    return $str;
}

?>

