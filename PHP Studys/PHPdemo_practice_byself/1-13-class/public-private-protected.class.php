<?php

require '../functions.php';
//public  private  protected区别

class Father{

	public $name = 'father';

	private $age = 19;

	protected $sex = '男';


	public function say(){
		echo '我是父亲';
	}
}

//public
$f1 = new Father();
// echo $f1->name;echo "<br>";//public的方法和属性 可以在类的外部访问

// echo $f1->age;echo "<br>";//private 和 protected 的方法和属性，不可以在类的外部使用

// echo $f1->sex;echo "<br>";





//private  protected
class Son extends Father{
	//private 私有的子类不可用
	public function testPrivate(){
		echo $this->age;
	}
	//protected 受保护的  子类可用
	public function testProtected(){
		echo $this->sex;
	}
}

$s1 = new Son();

$s1->testProtected();

$s1->testPrivate();

//===============总结==============

//1，只有public 可以再外部使用，其它都不行
//2, protected 可以再自己和子类中使用

//3,private 只能自己用，子类也不可用

?>