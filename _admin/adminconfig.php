<?php

require_once '../config.php';

# Helpers
require_once '../helpers/tpl.php';

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

class AdminConfig extends Config {

    # initalize Twig
    static function tpl_init() {

        Twig_Autoloader::register();

        self::$tpl = create_twig_environment(dirname(__FILE__).'/cache/templates');
    }

};

?>

