<?php

/* adapt a string to the gender of the user
 * if $gender is 'F', $female_suffix is appended, $male_suffix if it's 'M', and
 * nothing if $gender is 'N' (= none)
 *
 * e.g.: adapt_to_gender($u, 'etudiant') -> 'etudiante' // female
 *       adapt_to_gender($u, 'etudiant') -> 'etudiant'  // male (or none)
 */
function adapt_to_gender($user, $s, $female_suffix='e', $male_suffix='') {
    if ($user->isFemale()) {
        return $s.$female_suffix;
    }
    if ($user->isMale()) {
        return $s.$male_suffix;
    }
    
    return $s;
}

/* convert boolean into words, e.g.:
    true -> oui
    false -> non */
function bool_to_fr($b) {
    return $b ? 'oui' : 'non';
}

// Returns 'Bonjour' or 'Bonsoir'
function bonjour() {
    $hours = intval(date('G'));
    return ($hours > 4 && $hours < 19) ? 'Bonjour' : 'Bonsoir';
}

?>
