<?php
/**
单例模式
*/

class Example {
	private static $_instance;

	private function __construct(){

	}

	public static function singleton() {
		if(!isset(self::$_instance)){
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public function __clone(){
		die('Clone is not allow');
	}

	public function test(){
		echo 'test';
	}

}

// 这个写法会出错，因为构造方法被声明为private
// $test = new Example;

// 下面将得到Example类的单例对象
$test = Example::singleton();
$test->test();

// 复制对象将导致一个E_USER_ERROR.
// $test_clone = clone $test;