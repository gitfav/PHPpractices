<?php
header('Content-type:text/html;charset=utf-8');
class A{
	//如果一个类中没有构造函数，与类名相同的方法名会作为构造函数
	public function a(){
		echo '我是A';
	}
}

new A();
?>