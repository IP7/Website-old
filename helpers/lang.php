<?php

/* adapt a string to the gender of the user
 * if $gender is 'F', $female_suffix is appended, $male_suffix if not
 *
 * e.g.: adapt_to_gender($u, 'etudiant') -> 'etudiante' // female
 *       adapt_to_gender($u, 'etudiant') -> 'etudiant'  // male
 */
function adapt_to_gender($user, $s, $female_suffix='e', $male_suffix='') {
    return $s . (($user->getGender() == 'F') ? $female_suffix : $male_suffix);
}

?>

