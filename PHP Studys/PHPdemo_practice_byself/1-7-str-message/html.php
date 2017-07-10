<?php

	$c = isset($_POST['content']) ? $_POST['content'] : '';
	//<script>alert(1)</script> 
	$c = htmlspecialchars($c);//标签实体化 

	echo $c;
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="post">
		<textarea name="content" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="提交">
	</form>
</body>
</html>		