<?php
	
	require '../../functions.php';

	$config = require './config.php';

	C($config);

	$upFile = isset($_POST['up']) ? $_POST['up'] : '';

	function checkUP($file){
		//获取后缀
		$ext = ltrim(strrchr($file,'.'),'.');
		//判断扩展名是否在上传类型中
		if(in_array($ext, C('ALLOW_TYPE'))){
			return true;
		}
		return false;
	}

	if(checkUP($upFile)){
		echo '允许的类型';
	}else{
		echo '不允许的类型';
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="post">
		
		<input type="file" name="up" id="">
		<input type="submit" value="上传">
	</form>
</body>
</html>