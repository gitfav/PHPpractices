<?php 

	require'../functions.php';
	
	date_default_timezone_set('PRC');
	function upload(){
		if (empty($_FILES)) return ; //判断是否有上传文件
		$a=array();//重组数组
		foreach ($_FILES as $k => $v) {
			if(is_array($v['name'])) {
				$em=array();
				foreach ($v['name'] as $ke => $f) {
					if (empty($f)) continue;
					$em=array(
						'name'=>$f,
						'tmp_name'=>$v['tmp_name'][$ke],
						'type'=>$v['type'][$ke],
						'error'    => $v['error'][$ke],
						'size'     => $v['size'][$ke]
					);
					$a[]=$em;
				}	
			}
			else{
				if (empty($v['name'])) continue;
				$a[]=$v;
			}
		}

		foreach ($a as $k => $v) {
			if (is_uploaded_file($v['tmp_name'])) {
				$dir='./upload/'.date('Y/m-d').'/';
				is_dir($dir)||mkdir($dir,0777,true);
				$filename=time().mt_rand(0,10000).strrchr($v['name'], '.');
				$fullname=$dir.$filename;
				move_uploaded_file($v['tmp_name'], $fullname);
			}
			
		}

		p($a);
	}
	upload();
	echo "<hr>";
	echo Date('Yms');
	p($_FILES);

 ?>

 <!DOCTYPE>
 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 	<title>无标题</title>
 </head>
 <body>
 <form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="up"><br>

 	<input type="file" name="up1[]"><br>
 	<input type="file" name="up1[]"><br>
 	<input type="file" name="up1[]"><br>
 	<input type="submit" value="上传">
 </form>
 </body>
 </html>