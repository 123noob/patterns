<?php
/**
策略模式。
比如问答系统（Question），要实现3个功能，可以创建3个Question子类，但是当要支持不同类型下的功能，可能使用Question下2个子类，每个子类下又分3个功能子类。这样就造成了大量代码重复
*/

abstract class Question{
	protected $marker;

	function __construct(Marker $marker){
		$this->marker = $marker;
	}

	abstract function mark();
}

class TextQuestion extends Question{
		function mark(){
		return $this->marker->mark();
	}
}

// class AVQuestion extends Question{

// }

abstract class Marker{
	abstract function mark();
}

class MarkLogicMarker extends Marker{
	function mark(){
		echo 'hello';
	}
}

$obj = new TextQuestion(new MarkLogicMarker);
$obj->mark();