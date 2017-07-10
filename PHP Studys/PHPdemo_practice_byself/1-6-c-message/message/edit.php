<?php

require '../../functions.php';

$message = require './db.php';

if(IS_POST){
	// 执行编辑操作
	$_POST['time'] = time();//压入时间
	$id = $_POST['id'];//获取编辑那条记录的 id
	unset($_POST['id']);//删除post数据中的id
	$message[$id] = $_POST;//压入留言数组

	/*$data = var_export($message,true);
	$data = "<?php return $data;?>";
	file_put_contents('./db.php', $data);*/

	// $re = write_db('./db.php',$message);
	//执行写入操作
	if(write_db('./db.php',$message)){
		success('./index.php');
	}else{
		error('./index.php');
	}
}else{//不是post提交的，显示编辑界面及旧数据
	$id = $_GET['id'];//获取编辑数据id
	if(!isset($message[$id])){//如果乱传参数 进行检测，不存在该数据，进行错误提示
		error('./index.php');
	}

	$data = $message[$id];//存入$data中，方便模板页面读数据
	require './template/edit.html';//载入模板
}

?>