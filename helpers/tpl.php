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

    $others_links = array();
    $connection_button = array();

    $url = config_url();

    if (is_connected()) {

        $others_links = array(
        #    array( 'href' => Config::$root_uri.'forum',     'title' => 'Forum' ),
            array( 'href' => Config::$root_uri.'profile',   'title' => 'Mon Profil')
        );

        $connection_button['title']  = 'Déconnexion';
        $connection_button['method'] = 'POST';
        $connection_button['action'] = Config::$root_uri;
        $connection_button['params'] = array(
            array( 'name' => 'disconnect', 'value' => 1 )
        );

        if ($url) {
            $connection_button['params'] []= array(
                'name' => 'u', 'value' => $url
            );
        }

    }
    else {
        $connection_button['title'] = 'Connexion';
        $connection_button['method'] = 'GET';
        $connection_button['action'] =
            Config::$root_uri.'connexion'.($url ? '?u=/'.$url : '');
    }

    return array(
        'site' => array(
            'global_links' => array(
                'others' => $others_links
            ),
            'connection_button' => $connection_button
        )
    );
}

# Returns an array for site.footer_links in function of user's state,
# i.e. connected or not, and admin or not
function global_footer_links() {

    $footer_links = array(
        array(
            'href'  => Config::$root_uri.'sitemap',
            'title' => 'Plan du site'
        ),
        array(
            'href'  => Config::$root_uri.'legals',
            'title' => 'Mentions légales'
        ),
        array(
            'href'  => Config::$root_uri.'contact',
            'title' => 'Contact'
        ),
        array(
            'href'  => Config::$root_uri.'a-propos',
            'title' => 'À Propos'
        ),
        array(
            'href'  => Config::$root_uri . 'bug',
            'title' => 'Signaler un bug'
        )
    );

    if (is_connected() && user()->isAdmin()) {
        $footer_links []= array(
            'href'  => Config::$root_uri.'admin',
            'title' => 'Administration'
        );
    }

    return array(
        'site' => array(
            'footer_links' => $footer_links
        )
    );
}

# Merge default templates values with the given
# array, and return a new array.
function tpl_array() {
    $arrays = func_get_args();
    array_unshift(&$arrays, global_menu_links());
    array_unshift(&$arrays, global_footer_links());
    array_unshift(&$arrays, Config::$default_tpl_values);
    return call_user_func_array('array_merge_recursive_new', $arrays);
}


// shortcut
function tpl_render($tp, $values) {
    return Config::$tpl->render($tp, tpl_array($values));
}

// return an array which represents a date
function tpl_date($d) {
  return array( 'date' => Lang\date_fr($d), 'datetime_attr' => datetime_attr($d));
}

/**
 * Return an array representing a file
 **/
function tpl_file($file) {
    if (!$file) {
        return array();
    }

    return array(
        'title'       => $file->getName(),
        'url'         => Config::$root_uri.'file/'.$file->getId().'/'.filename_encode($file->getName()),
        'description' => $file->getDescription()
    );
}

?>
