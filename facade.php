<?php
/**
外观模式 对外提供一个公共接口，对外因此复杂的内部结构
*/

function getProductFileLines($file){
	return @file($file);
}

function getProductObjectFromID($id,$productname){
	// 数据库查询
	return new Product($id,$productname);
}

function getNameFromLine($line){
	//获取名称
}

function getIDFromLine($line){
	//获取id
}

class Product{
	public $id;
	public $name;
	function __construct($id,$name){
		$this->id= $id;
		$this->name = $name;
	}
}
//读取文件内容
$lines = getProductFileLines('test.txt');
$objects = array();
foreach ($lines as $line) {
	//获取名称、id
	$id = getIDFromLine($line);
	$name = getNameFromLine($line);
	//查数据库
	$objects[$id] = getProductObjectFromID($id,$name);
}

//在项目中像这样调用这些方法，那么我们的代码会与子系统紧紧耦合在一起，当我们决定与子系统完全断开，代码就会出现问题。所以需要在子系统和代码中引入一个入口
//外观模式其实就是把代码块封装到一个 类，对外提供公共接口访问，隐藏类的复杂性
class Facade{
	private $products = array();

	function __construct($file){
		$this->file = $file;
		$this->compile();
	}

	private function compile(){
		$lines = getProductFileLines($this->file);
		foreach ($lines as $line) {
			$id = getIDFromLine($line);
			$name = getNameFromLine($line);
			$this->products[$id] = getProductObjectFromID($id,$name);
		}
	}
}
$Facade = new Facade('test.txt');