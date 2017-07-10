<?php

	header('Content-type:text/html;charset=utf-8;');

	//定义常量
	define("A",5);
	//常量不能被重复定义,否则显示错误。
	// define("A",3);

	echo A,"</br>";


	//系统常量
	echo PHP_VERSION,'</br>';

	echo PHP_OS,'</br>';

	var_dump(TRUE);

	var_dump(false);

?>