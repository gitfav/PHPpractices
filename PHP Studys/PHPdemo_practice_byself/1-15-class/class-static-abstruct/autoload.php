<?php


function __autoload($classname){
	$path = './'.$classname.'.class.php';
	require $path;
	echo $classname;
}
//当new 一个不存在的类的时候，自动运行__autoload 并且将类名作为参数传入
new A();
?>