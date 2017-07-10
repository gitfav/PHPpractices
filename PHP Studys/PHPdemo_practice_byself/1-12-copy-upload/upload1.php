<?php

	//上传条件
	//1,form表单必须有  a/ method="post" enctype="multipart/form-data"
	//2,包含<input type="file" name="up"/>
	//3,php.ini 中相关配置
	//4,上传的实质是：将$_FILES['tmp_name'] 的临时文件，移动到想要的位置

	require'../functions.php';
	p($_POST);
	p($_FILES);//同上，属于超级全局数组
	//如果上传失败，注意$_FILES['...']['error']是第几个错误。
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="text" name="username" id="">
		<input type="file" name="up" id="">
		<input type="submit" value="上传">
	</form>

</body>
</html>