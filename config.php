<?php

# Usage:
#
# Don't create instances, use static variables/methods instead.
#
# Config::init() : initialize the configuration class (call it once)
#
# Config::$tpl : template renderer
# 
# Config::$default_tpl_values : default values for templates
#

class Config {

    static $tpl;
    static $default_tpl_values;

    # initalize Twig
    static function tpl_init() {

        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem('static/templates');

        self::$tpl = new Twig_Environment($loader, array(
            'cache' => dirname(__FILE__).'/cache/templates'
        ));

        self::$default_tpl_values = array(
            'page' => array(
                'lang'        => 'fr',
                'charset'     => 'utf-8',
                'keywords'    => 'ip7, informatique, paris diderot, association',
                'description' => 'IP7 est une association de filière en Informatique'
                               . ' à l\'Université Paris Diderot.',
                'title'       => 'IP7'
            )
        );
    }

    # initialize Limonade
    static function routes_init() {

        # Controllers directory
        option('controllers_dir', dirname(__FILE__).'/controllers');
    }

    # call others *_init() methods
    static function init() {
        self::tpl_init();
        self::routes_init();
    }

};

?>

