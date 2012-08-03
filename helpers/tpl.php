<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

# Templates helpers

# version of array_merge_recursive without overwriting numeric keys
# picked from
# http://www.php.net/manual/fr/function.array-merge-recursive.php#106985
function array_merge_recursive_new() {

    $arrays = func_get_args();
    $base = array_shift($arrays);

    foreach ($arrays as $array) {
        reset($base); //important
        while (list($key, $value) = @each($array)) {
            if (is_array($value) && @is_array($base[$key])) {
                $base[$key] = array_merge_recursive_new($base[$key], $value);
            } else {
                $base[$key] = $value;
            }
        }
    }

    return $base;
}

# Merge default templates values with the given
# array, and return a new array.
function tpl_array($arr=null) {

    if (empty($arr)) {
        return Config::$default_tpl_values;
    }
    return array_merge_recursive_new(Config::$default_tpl_values, $arr);
}

?>

