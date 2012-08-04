<?php

require_once dirname(__FILE__).'/lib/vendors/Twig/Autoloader.php';
require_once dirname(__FILE__).'/lib/vendors/limonade/limonade.php';
require_once dirname(__FILE__).'/lib/vendors/phpass/PasswordHash.php';
require_once dirname(__FILE__).'/lib/vendors/propel/runtime/lib/Propel.php';

### Constants ###
#
# - login constants
#
define('CONNECTION_OK', 2);
define('WRONG_USERNAME_OR_PASSWORD', -2);
define('DEACTIVATED_ACCOUNT', -3);
define('ALREADY_CONNECTED', -4);
#
#
# - access rights constants
#   (numbers MUST be between -127 and +127)
#
# define('VISITOR_RANK', 0);
define('MEMBER_RANK', 50);
define('ADMIN_RANK', 100);
#
#
# - cookie
define('AUTH_COOKIE', 'ip7_ac');
define('AUTH_COOKIE_EXPIRE', time()+60*60*24*30);
#
###

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
    static $p_hasher;
    static $default_tpl_values;
    static $default_twig_env;

    private static $initialized = false;

    # initalize Twig
    private static function tpl_init() {

        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/views/templates');

        self::$default_twig_env = array(
            'cache'            => dirname(__FILE__).'/cache/templates',
            'charset'          => 'utf-8',
            'strict_variables' => true,
            'autoescape'       => true
        );

        self::$tpl = new Twig_Environment($loader, self::$default_twig_env);

        self::$default_tpl_values = array(

            'site' => array(
                'root' => '/',
                'connection_page' => '/',

                'logo' => array(
                    'src'    => '/views/static/images/logo32.png',
                    'width'  => 32,
                    'height' => 32
                ),

                'title' => 'IP7'

            ),

            'page' => array(
                'lang'        => 'fr',
                'charset'     => 'utf-8',
                'keywords'    => 'ip7, informatique, paris diderot, association',
                'description' => 'IP7 est une association de filière en Informatique'
                               . ' à l\'Université Paris Diderot.',
            )
        );
    }

    # initialize Limonade
    public static function routes_init() {
        option('controllers_dir', dirname(__FILE__).'/controllers');
        option('base_uri', '/');

        # remove for production
        option('env', ENV_DEVELOPMENT);
        option('debug', true);
    }

    # initialize Propel
    private static function orm_init() {

        // Initialize Propel with the runtime configuration
        Propel::init(dirname(__FILE__)."/models/build/conf/ip7website-conf.php");

        // Add the generated 'classes' directory to the include path
        set_include_path(dirname(__FILE__)."/models/build/classes" . PATH_SEPARATOR . get_include_path());
    }

    private static function phpass_init() {
        self::$p_hasher = new PasswordHash(8, true);
    }

    # call others *_init() methods
    static function init() {
        if (self::$initialized) {
            return;
        }
        self::$initialized = true;
        
        self::tpl_init();
        self::routes_init();
        self::orm_init();
        self::phpass_init();
    }

};

?>
