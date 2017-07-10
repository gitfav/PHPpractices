<?php

require '../functions.php';
class Father{

	public $name = '父亲';

	public function say(){
		echo "我是父亲我赚钱";
		echo "<br>";
	}


}

// class Son extends Father{

// }

// $s1 = new Son();

// $s1->say();
//输出 我是父亲我赚钱，虽然Son没有定义say方法，但是继承了父类的方法say

class Son extends Father{
	//1，同名方法：儿子的优先级更高，用儿子的
	public function say(){
		echo "我是儿子我坑爹";
		echo "<br>";
	}

	public function fatherSay(){
		parent::say();
	}
}

$s1 = new Son();

$s1->say();

$s1->fatherSay();





?>