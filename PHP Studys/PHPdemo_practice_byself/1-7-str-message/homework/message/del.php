<?php
	
	$message = require './db.php';

	$index = $_GET['index'];

	unset($message[$index]);

	//重写数据库
	$data = var_export($message,true);

	$data = "<?php return $data;?>";

	file_put_contents('./db.php', $data);

	//跳转操作开始
	echo "<script>alert('操作成功');location.href='./index.php'</script>";



?>