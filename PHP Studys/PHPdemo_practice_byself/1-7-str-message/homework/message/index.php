<?php

header('Content-type:text/html;charset=utf-8');
$message = require './db.php';



if(!empty($_POST)){
	//添加留言
	// var_dump($message);echo "<hr>";
	$_POST['time'] = time();
	$message[] = $_POST;
	// var_dump($message);

	//写入数据库操作
	$data = var_export($message,true);//将$message数组变为字符串
	
	$data = "<?php return ".$data.";?>";//数据文件组合完毕

	file_put_contents('./db.php', $data);//写入文件操作
	//写入操作结束


	//跳转操作开始
	echo "<script>alert('操作成功');location.href='./index.php'</script>";

}else{
	require './index.html';
}

?>