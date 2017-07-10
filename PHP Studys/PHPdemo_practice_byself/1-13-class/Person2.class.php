<?php

class A{
	function foo(){
		if (isset($this)) {
			echo '$this is defined(';
			echo get_class($this);
			echo ')<br/>';
		}else{
			echo "\$this is not defined.<br/>";
		}
	}
}

class B{
	function bar(){
		A::foo();
	}
}

$a = new A();
$a->foo();

A::foo();

$b = new B();
$b->bar(); 