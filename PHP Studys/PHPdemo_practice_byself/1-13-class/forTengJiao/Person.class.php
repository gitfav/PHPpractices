<?php
require '../../functions.php';

class Person{
	//1,属性
	// 属性和变量类似
	public $name = '燕腾蛟';

	public $height = '193';

	public $sex = '男';
	//2,方法
	//方法和函数类似
	public function say(){
		echo '说话';
	}

	public function xiezuo(){
		echo '写文章';
	}
}

$name = '腾蛟';

echo $name;


$p1 = new Person();

echo $p1->name;echo "<hr>";

echo $p1->height;

$p1 = new Person();

$p1->say();


?>