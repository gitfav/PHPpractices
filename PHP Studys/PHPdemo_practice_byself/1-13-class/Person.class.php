<?php 

	require'../functions.php';
	class Person{
		//1、属性就是变量（区别在于所属）
		public $name='类中的名字';
		public $age;
		public $sex;
		public $height;
		public $weight;
		public function eat(){
			echo "我是类中 吃";
		}

		//2,方法:
		//方法就是函数(区别在于所属)
		public function drink(){
			echo "我能喝";
		}
	}
	//=================变量 函数 属性 方法区别===============
	$name='lads';
	echo $name,'</br>';
	function eat(){
		echo "我是函数中 吃";
	}
	eat();
	echo "</br>";
	//=========================类 属性 方法================
	$p1=new Person();
	echo $p1->name,'</br>';
	echo $p1->eat();
	echo "</br>";
	$p2=new Person();
	$p2->name="改变的名字";
	echo $p2->name,'</br>';	
	echo $p1->name,'</br>';


 ?>