<?php

// return a DateTime object from a string
function get_datetime($s) {
    if (is_string($s)) {
        try {
            return new DateTime($s);
        }
        catch (Exception $e) {
            error_log($e);
            return null;
        }
    }
    return $s;
}

function datetime_attr($d) {
  $d = get_datetime($d);

  return ($d == NULL) ? '' : $d->format('c');
}

// return the timestamp of the next 31 july,
// for member account expiration date
function next_expiration_date() {
    $year = date('Y');
    if (intval(date('m')) > 7) { $year += 1; }
    return $year.'-07-31T00:00:00+01:00';
}

// return the current year, for courses, e.g.:
//  sept-dec 20XX -> 20XX
//  jan-aug  20XX -> 20XX - 1
//
//  so  sept  2012 -> 2012
//  but april 2012 -> 2011
function get_current_year() {
    return date('Y') - (intval(date('m')) < 7);
}

// return a date from an user input
function get_date_from_input($inp) {
    $tokens = preg_split('/\D+/', trim($inp));

    if (count($tokens) < 3) {
        return NULL;
    }

    $year = $month = $day = NULL;

    if (intval($tokens[0]) > 31) {
        // YYYY-MM-DD
        list($year, $month, $day) = $tokens;
    }
    else {
        // DD-MM-YYYY
        list($day, $month, $year) = $tokens;
    }

    if ($year < 1900) {
        // if year is only on 2-digits
        $year += 1900;
    }

    if ($month > 12) {
        // if $month > 12, we assume that
        // the month and the day have been inverted
        $tmp = $month;
        $month = $day;
        $day = $tmp;
    }

    return new DateTime($year.'-'.$month.'-'.$day);
}

// Use it like that:
//      $in_24_hours = time() + Durations::ONE_DAY
//
class Durations {
    const ONE_MINUTE = 60;
    const ONE_HOUR   = 3600;
    const ONE_DAY    = 86400; // 3600 * 24
    const ONE_WEEK   = 604800; // 3600 * 24 * 7
    const ONE_MONTH  = 2592000; // 3600 * 24 * 30
    const ONE_YEAR   = 31536000; // 3600 * 24 * 365
}

?>
