<?php
require './functions.php';
header('Content-type:text/html;charset=utf-8');
$message = require './db.php';



if(!empty($_POST)){
	//添加留言
	// var_dump($message);echo "<hr>";
	$_POST['time'] = time();
	$message[] = $_POST;
	// var_dump($message);

	//写入数据库操作
	write_db($message,'./db.php');
	//写入操作结束


	//跳转操作开始
	success('./index.php','添加成功');

}else{
	require './index.html';
}

?>