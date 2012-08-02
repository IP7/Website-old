<?php

require_once '../config.php';
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

// create a new Twig Environment object
function create_twig_env($tpls_dir=null, $options=null) {
    static $envs = array();

    if (empty($tpls_dir)) {
        return Config::$tpl;
    }

    $tpls_dir = (string)$tpls_dir;

    if (isset($envs[$tpls_dir]) && !empty($envs[$tpls_dir])) {
        return $envs[$tpls_dir];
    }

    $loader = new Twig_Loader_Filesystem($tpls_dir);

    $tpl = new Twig_Environment($loader, array_merge(Config::$default_twig_env, $options));

    $envs[$tpls_dir] = $tpl;

    return $tpl;
}

?>

