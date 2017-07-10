<?php
	require '../../functions.php';

	$message = require './db.php';

	//有post数据，添加留言操作
	if(IS_POST){
		$_POST['time'] = time();//压入时间
		$message[] = $_POST;//添加新数据 
		//写入数据库
		if(write_db('./db.php',$message)){
			success('./index.php');
		}else{
			error('./index.php');
		}
		
	}else{//没有post数据，显示留言列表
		//载入模板
		require './template/index.html';
	}


?>