<?php
header('Content-type:text/html;charset=utf-8');
class Person{

	public static $name = '007';

	public static function say(){
		//会报错，因为静态变量不属于 类new出的对象，而是属于类
		//echo '我是人'.$this->$name;

		echo '我是人'.self::$name;
	}
}

// $p1 = new Person();

// $p1->say();


Person::say();

echo Person::$name;

