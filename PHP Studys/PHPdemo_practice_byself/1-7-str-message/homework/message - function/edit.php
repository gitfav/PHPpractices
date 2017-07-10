<?php
header('Content-type:text/html;charset=utf-8');
	require './functions.php';
	$message = require './db.php';


	if(!empty($_POST)){
		//覆盖旧数据
		$_POST['time'] = time();

		$index = $_POST['index'];

		unset($_POST['index']);

		$message[$index] = $_POST;

		//写如数据库操作
		write_db($message,'./db.php');

		//跳转操作
		success('./index.php','编辑成功');

	}else{

		//显示旧数据
		$index = $_GET['index'];

		$nowData = $message[$index];

		require './edit.html';

	}

?>