<?php
	
	//$_POST 可以接到表单提交过来的值  
	//<form action="" method="post">  要制定method 否则默认表单以get方式提交
	var_dump($_POST);

	//$_REQUEST 既能接到get参数 也能接到post参数
	var_dump($_REQUEST);

	//<form action="" method="post"> action 为空默认提交到当前页
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="post">
		
		姓名：<input type="text" name="name" id=""><br>
		年龄:<input type="text" name="age" id=""><br>
		性别：<input type="radio" name="sex" value="1"> 男
				<input type="radio" name="sex" value="2"> 女
		<br>
		<input type="submit" value="提交">
	</form>
</body>
</html>	