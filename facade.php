<?php
/**
外观模式 对外提供一个公共接口，对外隐藏复杂的内部结构
*/

class Home{
	var $_isOpen = 0;
	function on(){
		$this->_isOpen = 1;
	}

	function off(){
		$this->_isOpen = 0;
	}
}

class Light extends Home{

}

class TV extends Home{

}

/**
在项目中像这样调用这些方法，那么我们的代码会与子系统紧紧耦合在一起，当我们决定与子系统完全断开，代码就会出现问题。所以需要在子系统和代码中引入一个入口
*/

class Facade{
	private $_tv;
	private $_light;
	
	function __construct(){
		$this->_light = new Light;
		$this->_tv = new TV;
	}
	function off(){
		$this->_light->off();
		$this->_tv->off();
		$this->now();
	}

	function on(){
		$this->_light->on();
		$this->_tv->on();
		$this->now();
	}

	function now(){
		$l = $this->_light->_isOpen;
		$t = $this->_tv->_isOpen;
		echo 'light is ',$l?"on <br>":"off <br>";
		echo 'tv is ',$t?"on <br>":"off <br>";
	}
}
$facade = new Facade();
$facade->on();
$facade->off();
