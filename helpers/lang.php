<?php
namespace Lang;

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

// Returns "de" or "d'" with the next word
function de($next_word) {
    // We should use "’" (HTML: "&#8217;"), but PHP doesn't accept Unicode,
    // and Twig would escape the '&' character.

    if (strlen($next_word) == 0) {
        return 'de';
    }

    $no_spaces = trim($next_word);

    $first_letter = strtolower($no_spaces[0]);

    $voyels = array( # voyels + h
        'a','â','e','é','è','ê','h','i','o','u','y'
    );

    $de = in_array($first_letter, $voyels) ? 'd\'' : 'de ';

    return $de.$next_word;
}

// make a string plurial
function plurial($s) {

    if (strtoupper($s) === $s) {
        return $s;
    }

    // really basic function
    return preg_replace("/[A-Z]?[-a-zâäàéèêëîôöùûü]+/", "\\0s", $s);
}

// format a date for French output
function date_fr($d) {
    $d = get_datetime($d);

    if ($d == NULL) {
      return 'Jamais';
    }

    $str = $d->format('d/m/Y'); 

    $today = new \DateTime();

    if ($today->format('d/m/Y') == $str) {
        return 'aujourd\'hui';
    }

    $diff = $d->diff($today);

    if (intval($diff->format('%r%d')) == 1) {
        return 'hier';
    }
    else if (intval($diff->format('%r%d')) == -1) {
        return 'demain';
    }

    return 'le '.$str;
}

?>
