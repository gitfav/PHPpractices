<?php
header('Content-type:text/html;charset=utf-8');
class A{
	//类中有跟类名一致的同名方法，也有构造函数，那么该方法不作为构造函数，而只是普通方法
	public function __construct(){
		echo '我才是构造函数';
	}
	public function a(){
		echo '我是A';
	}
}

$a1=new A();
?>