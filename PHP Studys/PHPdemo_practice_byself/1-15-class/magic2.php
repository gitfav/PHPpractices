<?php 

	class A{
		private $abc=1;
		public $bc=2;

		public function __isset($b){	//$b的值是abc。
			// echo $this->bc;
			return (isset($this->$b));
		}
		public function __unset($b){
			echo $b;//$b是要用的变量名
			unset($this->$b);
		}
		public function get(){
			echo $this->bc,'<br>';
			echo $this->abc;
		}
		public function __get($v){
			return $this->$v='safddsa';
		}
		public function __set($name,$value){
			echo $name.'.';
		}
	}

	//检测对象中的私有属性 __isset 在外部用isset检测对象私有属性时自动调用
	$a=new A();
	var_dump(isset($a->abc));//用isset时，对象自动调用__isset()函数,里面函数功能可以改变。参数的改变也会改变结果
	//删除私有成员属性 __unset 在外部unset对象私有属性时自动调用
	unset($a->abc);	//用unset时，对象自动调用__unset()函数，里面函数功能可以改变。
	var_dump(isset($a->abc));
	$a->get();	//因为类里面的$abc已经被删除了,所以自动运行了_get函数
	echo "<br>";
	echo $a->dd,"<br>";	//输出对象中没有的属性时，会运行__get()方法。$a1->__get();
	//__set()  给未定义的属性赋值时，自动运行的魔术函数。可以将set设置的未定义属性存到类的数组类型成员属性，get时再找相应变量索引。
	$a->ccc = 'ccc123123';
	echo "<br>";
	echo $a->ccc;



 ?>