<?php
/**
观察者模式 把观察者从主体分离出去，当主体发生变化，观察者对象可以感知到
*/

interface Observable{
	function attach(Observer $observer);
	function detach(Observer $observer);
	function notify();
}

class Login implements Observable{
	private $observers;
	private $storage;

	function attach(Observer $observer){
		$this->observers[] = $observer;
	}

	//array_udiff返回数组1有数组2没有的值，这里用diff会报对象不能转换成字符串的错误
	function detach(Observer $observer){
		$this->observers = array_udiff($this->observers, array($observer), create_function('$a,$b', 'return ($a === $b)?0:1;'));
	}

	function notify(){
		// var_dump($this->observers);die;
		//检查数组对象是否为空
		if(!empty($this->observers)){
				foreach ($this->observers as $obs) {
				$obs->update($this);
			}	
		}else{
			echo 'not obj';
		}

	}

	function getStatus(){
		return 1;
	}
}

interface Observer{
	function update(Observable $observable);
} 

class Obs1 implements Observer{
	function update(Observable $observable){
		$status = $observable->getStatus();
		if($status==1){
			echo 'hello';
		}
	}
}

$obj = new Login();
$obs1 = new Obs1();
//把观察者加入主体
$obj->attach($obs1);
$obj->notify();
//把观察者从主体删除
$obj->detach($obs1);
$obj->notify();