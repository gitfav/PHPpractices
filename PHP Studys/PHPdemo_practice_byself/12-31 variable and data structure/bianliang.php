<?php

	$a=123;
	echo $a;


	//弱语言测试说明；
	$b=128;
	var_dump($b);  

	$b='abc';
	var_dump($b);

	$c=5;		//变量区分大小。
	$C=6;


	echo $c,$C;
	var_dump($c,$C);

	$d='Hello';
	$$d='world';   //可变变量。即是以一个普通变量的值为变量名的变量，这个普通变量值改变，可变变量名就改变。 
	echo $d,'</br>';
	echo $$d,'</br>';
	echo $Hello,'</br>';

	// $ab123=5;
	// $_abc123;
	// $123abc;		//变量不能以数字开头。
	// $$b;
	// echo $ab123;

?>