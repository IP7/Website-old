<?php

require_once dirname(__FILE__).'/lib/vendors/Twig/Autoloader.php';
require_once dirname(__FILE__).'/lib/vendors/limonade/limonade.php';
require_once dirname(__FILE__).'/lib/vendors/phpass/PasswordHash.php';
require_once dirname(__FILE__).'/lib/vendors/propel/runtime/lib/Propel.php';
require_once dirname(__FILE__).'/lib/vendors/simple_image/simple_image.php';
require_once dirname(__FILE__).'/lib/vendors/php_markdown_extra/markdown.php';

### Constants ###
#
# add '@xxxxxxxx' with the commit when putting online
define('IP7WEBSITE_VERSION', '1');
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
define('VISITOR_RANK', 0);
define('MEMBER_RANK', 50);
define('MODERATOR_RANK', 80);
define('ADMIN_RANK', 100);
#
#
# - cookie
define('AUTH_COOKIE', 'a');
define('AUTH_COOKIE_EXPIRE', time()+60*60*24*30);
#
define('SESSION_COOKIE', 's');
#
# - avatars & users files
define('AVATAR_MAX_SIZE', 65536); # 65 kio
define('USER_FILE_MAX_SIZE', 2097152); # 2 Mio
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

    #static $timezone = 'Europe/Paris';

    static $root_uri = '/';
    static $app_dir;

    private static $initialized = false;

    # initalize Twig
    private static function tpl_init() {

        $styles = self::$root_uri.'views/static/styles';
        $scripts = self::$root_uri.'views/static/js';

        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem(self::$app_dir.'/views/templates');

        self::$default_twig_env = array(
#            'cache'            => self::$app_dir.'/cache/templates',
            'charset'          => 'utf-8',
            'strict_variables' => true,
            'autoescape'       => true
        );

        self::$tpl = new Twig_Environment($loader, self::$default_twig_env);

        self::$default_tpl_values = array(

            'site' => array(
                'root'            => self::$root_uri,

                'authorsfile'     => array( 'href' => self::$root_uri.'humans.txt' ),

                # Styles
                'styles'          => array(
                    array( 'href' => $styles.'/normalize.min.css',    'media' => 'screen' ),
                    array( 'href' => $styles.'/global.css',           'media' => 'all' )
                ),

                # IE Styles
                'ie_styles'       => array(),

                # Scripts
                'rendering_scripts' => array(
                    array( 'href' => $scripts.'/jquery-1.8.0.min.js' )
                ),
                'scripts'           => array(
                ),

                'logo' => array(
                    'src'    => self::$root_uri.'views/static/images/logo32transp.png',
                    'width'  => 32,
                    'height' => 32
                ),

                'avatar_max_size'      => AVATAR_MAX_SIZE,
                'file_upload_max_size' => USER_FILE_MAX_SIZE,

                'title' => 'IP7',

                'global_links' => array(
                    'cursus' => array(
                        array(
                            'href'  => self::$root_uri.'cursus/L1',
                            'title' => 'Licence 1',
                            'abbr'  => 'L1'
                        ),
                        array(
                            'href'  => self::$root_uri.'cursus/L2',
                            'title' => 'Licence 2',
                            'abbr'  => 'L2'
                        ),
                        array(
                            'href'  => self::$root_uri.'cursus/L3',
                            'title' => 'Licence 3',
                            'abbr'  => 'L3'
                        ),
                        array(
                            'href'  => self::$root_uri.'cursus/M1',
                            'title' => 'Master 1',
                            'abbr'  => 'M1'
                        ),
                        array(
                            'href'  => self::$root_uri.'cursus/M2',
                            'title' => 'Master 2',
                            'abbr'  => 'M2'
                        ),
                    ),
                    'others' => array()
                ),

                'footer_links' => array(),

                'search' => array(
                    'action' => self::$root_uri.'recherche',
                    'method' => 'GET'
                )

            ),

            'page' => array(
                'lang'        => 'fr',
                'charset'     => 'utf-8',
                'keywords'    => array('ip7', 'informatique', 'paris diderot', 'association'),
                'description' => 'IP7 est une association de filière en Informatique'
                               . ' à l\'Université Paris Diderot.',

                'breadcrumbs' => 'default',
                'url'         => $_SERVER['REQUEST_URI'],

                'favicon'     => self::$root_uri.'views/static/images/logo32.png',
                'apple_icon'  => self::$root_uri.'views/static/images/logo256.png'
            )
        );
    }

    # initialize Limonade
    public static function routes_init() {
        option('controllers_dir', self::$app_dir.'/controllers');
        option('public_dir',      self::$app_dir.'/views/static');
        option('views_dir',       self::$app_dir.'/views/templates');
        option('error_views_dir', self::$app_dir.'/views/templates');
        option('lib_dir',         self::$app_dir.'/lib');

        option('base_uri', self::$root_uri);
        option('session', SESSION_COOKIE);
    }

    # initialize Propel
    private static function orm_init() {

        // Initialize Propel with the runtime configuration
        Propel::init(self::$app_dir."/models/build/conf/ip7website-conf.php");

        // Add the generated 'classes' directory to the include path
        set_include_path(self::$app_dir."/models/build/classes" . PATH_SEPARATOR . get_include_path());
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
        #self::routes_init();
        self::orm_init();
        self::phpass_init();
    }

};
Config::$app_dir = dirname(__FILE__);

if (file_exists(dirname(__FILE__).'/tests/local_config.php')) {
    require_once dirname(__FILE__).'/tests/local_config.php';
}

?>
