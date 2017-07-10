<?php

	//php用$定义变量，变量要符合命名规范
	$a = 123;

	echo $a;

	// $teacherName = 'zhopu';

	// function get_name_by_gid(){

	// }


	//弱语言类型测试说明

	$b = 666666;

	var_dump($b);

	$b = 'abc';

	var_dump($b);

	$c=5;//变量区分大小写

	$C=6;

	echo $c,$C;

	var_dump($c,$C);

	$d='Hello';
	$$d='world';   //可变变量。即是以一个普通变量的值为变量名的变量，这个普通变量值改变，可变变量名就改变。 
	echo $d,'</br>';
	echo $$d,'</br>';
	echo $Hello,'</br>';

/*	$_abc123;

	$123bac;

	$$b;

	$ab123;*/


?>