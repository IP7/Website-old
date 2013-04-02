<?php

require_once __DIR__ . '/init-tests.php';

class LoginHelpersTest extends PHPUnit_Framework_TestCase {

  public function setUp() {

    $u = new User();
    $u->setUsername('user');
    $u->setPasswordHash('');
    $u->setEmail('foo@bar.com');
    $u->setFirstName('Foo');
    $u->setLastName('Bar');
    $u->setRights(0);
    $u->setDeactivated(0);
    $u->save();

  } 

  public function testRandomPasswordGeneration() {

    $s = get_random_password(0);
    $this->assertEquals(0, strlen($s));

    $s = get_random_password(42);
    $this->assertEquals(42, strlen($s));

  }

  public function testTempUsernameGeneration() {

    $s = get_temp_username();
    $this->assertEquals(14, strlen($s));
    $this->assertEquals('_tmp_', substr($s, 0, 5));

  }

  public function testTempUsernameTest() {

    $s1 = '_tmp_123456789';
    $s2 = 'foobar';

    $this->assertTrue(is_temp_username($s1));
    $this->assertFalse(is_temp_username($s2));

  }

}
