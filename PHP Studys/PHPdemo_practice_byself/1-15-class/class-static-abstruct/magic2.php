<?php


class A{

	private $abc=1;


	public function __isset($v){

		return isset($this->$v);
	}

	public function __unset($v){
		echo $v;
		unset($this->$v);
	}

	public function __set($name,$value){
		$this->abc = 222;
		// echo $name;
		$this->$name = $value;//$this->ccc = 
		// echo $name;
		// echo "<br>";
		// echo $value;
	}

	// public function get(){
	// 	echo  $this->abc;
	// }

	// public function __get($v){
	// 	return $this->$v = 'ddd123123';
	// }


}
//检测对象中的私有属性 __isset 在外部用isset检测对象私有属性时自动调用
$a1 = new A();

// $re = isset($a1->abc);

// var_dump($re);

//删除私有成员属性 __unset 在外部unset对象私有属性时自动调用

// unset($a1->abc);

// $a1->get();

//__get() 

// echo $a1->ddd;//输出对象中没有的属性时，会运行__get()方法。$a1->__get();
// echo $a1->ddd;

//__set()  给未定义的属性赋值时，自动运行的魔术函数。可以将set设置的未定义属性存到类的数组类型成员属性，get时再找相应变量索引

$a1->ccc = 'ccc123123';

// echo $a1->ccc;





?>