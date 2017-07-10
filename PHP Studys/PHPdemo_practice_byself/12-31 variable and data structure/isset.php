<?php

	header('Content-type:text/html;charset=utf-8;');
	
	//isset是检测变量是否存在，存在boole返回true，不存在返回false
	var_dump(isset($_POST['b']));


	$d=555;
	//unset 删除变量$d
	unset($d);
	var_dump(isset($d));

	//检测常量是否存在  defined(常量名)
	define('ABC', 5);
	echo ABC;
	var_dump(defined('ABC'));
	var_dump(defined('EDF'));

?>