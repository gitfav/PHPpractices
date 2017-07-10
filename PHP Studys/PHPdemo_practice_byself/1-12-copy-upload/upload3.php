<?php

require '../functions.php';

p($_FILES);



?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="up" id="">
		<input type="hidden" name="MAX_FILE_SIZE" value="10">
		<input type="hidden" name="MAX_FILE_SIZE" value="1">
		<input type="submit" value="上传">
	</form>
</body>
</html>