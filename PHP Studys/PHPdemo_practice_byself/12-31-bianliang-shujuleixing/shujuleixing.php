<?php
	

	$a = 12334859;

	var_dump($a);

	$b = 1.23;

	var_dump($b);

	$c = '123';

	var_dump($c);

	$d;

	var_dump($d);

	$e = null;

	var_dump($e);

	//gettype 获取变量类型
	echo gettype($c);
	echo "<hr>";

	echo gettype($b);
	echo "<hr>";
	echo gettype($a);
	echo "<hr>";

	//is_int 判断是否是整型数字
	var_dump(is_int($a));

	//强制类型转换
	$z = 123;
	settype($z, 'string');

	var_dump($z);

	$k = '4564423';
	// 方式一
	// $k = intval($k);
	//方式二
	$k = (int)$k;

	var_dump($k);

	


?>