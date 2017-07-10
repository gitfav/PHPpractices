<?php 

	require'../functions.php';
	function up(){
		//是空的说明没有文件上传，直接返回
		if (empty($_FILES)) {
			return;
		}
		//1,目标路径的创建
		$dir='./upload/'.date("Ymd").'/';
		is_dir($dir)||mkdir($dir,0777,true);
		if (is_uploaded_file($_FILES['up']['tmp_name'])) {
			//组合文件名字，还有后缀名。
			$filename=time().mt_rand(0,1000).strrchr($_FILES['up']['name'], '.');
			$fullname=$dir.$filename;
			move_uploaded_file($_FILES['up']['tmp_name'], $fullname);
		}
	}
	up();
	p($_FILES);

 ?>

 <!DOCTYPE html>
 <html lang="en-US">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>

 	<form action="" method="post" enctype="multipart/form-data">
 		<input type="text" name="username">
 		<input type="hidden" name="MAX_FILE_SIZE" value="1026322">
 		<!--如果没有此句，上传不需要符合"MAX_FILE_SIZE"规定的值，value里是单位是字节-->
 		<input type="file" name="up">
 		<input type="submit" value="上传">
 	</form>
 	
 </body>
 </html>