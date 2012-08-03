<?php

// Call MyClassTest::main() if this source file is executed directly.
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'MyClassTest::main');
}

require_once '../config.php';
Config::init();
require_once '../helpers/tpl.php';

class TplHelpersTest extends PHPUnit_Framework_TestCase {

    public static function main() {
        require_once 'PHPUnit/TextUI/TestRunner.php';

        $suite  = new PHPUnit_Framework_TestSuite('TplHelpersTest');
        $result = PHPUnit_TextUI_TestRunner::run($suite);

    }

    public function test_array_merge_recursive_new() {
        $a17 = array(
            'foo' => array(
                'bar' => 17
            )
        );

        $a42 = array(
            'foo' => array(
                'bar' => 42
            )
        );

        $aEmpty = array();
        $a2 = array( 'foo' => 2 );

        $this->assertEquals($a42, array_merge_recursive_new($aEmpty, $a42));
        $this->assertEquals($a42, array_merge_recursive_new($a17, $a42));

        $this->assertEquals($a42, array_merge_recursive_new($a17, $a42, $a42));
        $this->assertEquals($a17, array_merge_recursive_new($a42, $a17, $a17));

        $this->assertEquals($a42, array_merge_recursive_new($a42, $a17, $a42, $aEmpty));

        $this->assertEquals($a2, array_merge_recursive_new($aEmpty, $a2));
        $this->assertEquals($a2, array_merge_recursive_new($a2, $aEmpty));
    }

    public function test_tpl_array() {
        $this->assertEquals(Config::$default_tpl_values, tpl_array());
        $this->assertEquals(Config::$default_tpl_values, tpl_array(Config::$default_tpl_values));
    }

}

// Call MyClassTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == 'MyClassTest::main') {
    MyClassTest::main();
}

?>

