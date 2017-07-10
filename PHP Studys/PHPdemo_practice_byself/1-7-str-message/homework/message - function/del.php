<?php
	require './functions.php';
	$message = require './db.php';

	$index = $_GET['index'];

	unset($message[$index]);

	//重写数据库
	write_db($message,'./db.php');

	//跳转操作开始
	success('./index.php','删除成功');



?>