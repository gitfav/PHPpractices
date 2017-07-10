<?php 

	header('Content-type:text/html;charset=utf-8');

	class Person{
		public $name;
		public $age;
		//在 new 的时候执行
		public function __construct($name){
			$this->name=$name;//构造方法__construct()在创建对象时自劢执行，没有返回值，用于执行类的一些初始化工作，如对象属性的初始化工作
		} 
		public function getName(){
			$this->changName();
			return $this->name;
		}
		public function changName(){
			$this->name='newname';
		}
		//在类的内部用属性和方法，前面加  $this->
	}

	$p1=new Person('李四');
	echo $p1->name,'</br>';
	echo $p1->getName(),'</br>';
	echo $p1->name,'</br>';


 ?>