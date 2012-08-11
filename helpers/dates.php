<?php

# format a date for French output
function date_fr($d) {
    if (is_string($d)) {
        $d = new DateTime($d);
    }

    $str = $d->format('d/m/Y'); 

    $today = new DateTime();

    if ($today->format('d/m/Y') == $str) {
        return 'Ajourd\'hui';
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

