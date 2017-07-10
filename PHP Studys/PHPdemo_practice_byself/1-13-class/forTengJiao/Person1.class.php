<?php
require '../../functions.php';
class Person1{

	public $name;

	public $age;
	//构造函数 在new 的时候自动执行
	public function __construct($n){
		// echo '我是构造函数，我运行了';
		$this->name = $n;
	}
	// public function __construct($k,$m){

	// }
	public function getName(){
		return $this->name;
	}
}


$p1 = new Person1('123');

echo $p1->getName();echo "<br>";

$p2 = new Person1('222');

echo $p2->getName();




?>