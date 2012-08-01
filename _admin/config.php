<?php

# Usage:
#
# Don't create instances, use static variables/methods instead.
#
# AdminConfig::init() : initialize the configuration class (call it once)
#
# AdminConfig::$tpl : template renderer
# 
# AdminConfig::$default_tpl_values : default values for templates
#

class AdminConfig {

    static $tpl;
    static $default_tpl_values;

    # initalize Twig
    static function tpl_init() {

        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem('views/templates');

        self::$tpl = new Twig_Environment($loader, array(
            'cache'            => dirname(__FILE__).'/cache/templates',
            'charset'          => 'utf-8',
            'strict_variables' => true,
            'autoescape'       => true
        ));

        self::$default_tpl_values = array(

            'site' => array(
                'root' => '/',

                'logo' => array(
                    'src'    => '',
                    'width'  => 0,
                    'height' => 0
                ),

                'title' => 'Administration IP7'

            ),

            'page' => array(
                'lang'        => 'fr',
                'charset'     => 'utf-8',
                'keywords'    => '',
                'description' => 'interface d\'administration d\' infop7.org'
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

