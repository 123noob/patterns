<?php
/**
装饰模式
*/

abstract class Person{
	public abstract function show();
}

class Student extends Person{
	private $name;

	public function __construct($name){
		$this->name = $name;
	}

	public function show(){
		echo "i'm student",$this->name;
	}
}

abstract class Costume extends Person{

}

class Shirt extends Costume{
	private $person;

	public function __construct(Person $person){
		$this->person = $person;
	}

	public function show(){
		echo $this->person->show(),',穿着T恤';
	}
}

class Glasses extends Costume{
	private $person;

	public function __construct(Person $person){
		$this->person = $person;
	}

	public function show(){
		echo $this->person->show(),',带着眼镜';
	}
}

$student = new Student(' j');
$shirt = new Shirt($student);
$glasses = new Glasses($shirt);
$glasses->show();


