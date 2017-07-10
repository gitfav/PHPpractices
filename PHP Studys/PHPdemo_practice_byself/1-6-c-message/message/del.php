<?php
	require '../../functions.php';
	$message = require './db.php';

	$id = $_GET['id'];//获取要删除哪条记录的id值 

	if(!isset($message[$id])){//非法传参处理
		error('./index.php','非法传参');
	}

	unset($message[$id]);//删掉当前记录

	//执行写数据库操作
	if(write_db('./db.php',$message)){
		success('./index.php','删除成功');
	}else{
		error('./index.php','删除失败');
	}
?>