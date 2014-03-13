<?php

namespace Test\Router;

use Router\Router;

class RouterTest extends \PHPUnit_Framework_TestCase {
	
  
  public function testTrueIsTrue() {
    $foo = true;
    $this->assertTrue($foo);
  }
  
  /**
   * @dataProvider provideUrl
   */
  public function testIFUrlStartsWithSlash($url) {
  	$router = new Router($url);
  	$this->assertStringStartsWith('/', $url);
  }
  
  public function provideUrl() {
  	return array(
  		array('/user'),
	    array('/user/login'),
	    array('/user/1234'),
	    array('/123/user'),
	    array('#%#&/user'),
  	);
  }
  
  
}