<?php

	header('Content-type:text/html;charset=utf-8;');
	//传址赋值与传值赋值==========
	

	//传址赋值
	//传址赋值  相当于是创建了一个a的快捷方式 b
	$a=3333;
	$b=&$a;

	echo $b,'</br>';

	$b=5555;
	echo $b,'</br>';


	//可变变量=================
	$a='Hello';
	$$a=' world';
	echo $a,$Hello,'</br>';
	echo $$a;

?>