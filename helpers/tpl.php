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

# Returns an array for site.global_links.others in function of user's state,
# i.e. connected or not
function global_menu_links() {

    if (!is_connected()) {
        return array(
            'site' => array(
                'global_links' => array(
                    'others' => array(
                        array( 'href' => Config::$root_uri.'connexion', 'title' => 'Connexion' )
                    )
                )
            )
        );
    }

    return array(
        'site' => array(
            'global_links' => array(
                'others' => array(
                    array( 'href' => Config::$root_uri.'forum',       'title' => 'Forum' ),
                    array( 'href' => Config::$root_uri.'profile',     'title' => 'Mon Profil'),
                    array( 'href' => Config::$root_uri.'?disconnect', 'title' => 'Déconnexion')
                )
            )
        )
    );
}

# Merge default templates values with the given
# array, and return a new array.
function tpl_array() {
    $arrays = func_get_args();
    array_unshift(&$arrays, global_menu_links());
    array_unshift(&$arrays, Config::$default_tpl_values);
    return call_user_func_array('array_merge_recursive_new', $arrays);
}


// shortcut
function tpl_render($tp, $values) {
    return Config::$tpl->render($tp, tpl_array($values));
}

?>
