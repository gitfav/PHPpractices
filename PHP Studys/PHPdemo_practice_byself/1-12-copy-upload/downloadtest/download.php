<?php 

	$file=isset($_GET['f'])?$_GET['f']:'';
	if(empty($file)) return;
	header('Content-type:application/octet-stream');//二进制文件
	$filename=basename($file);//获得文件名
	header("Content-Disposition:attachment;filename={$filename}");//下载窗口中显示的文件名
	header("Accept-ranges:bytes");//文件尺寸单位
	header("Accept-length:".filesize($file));//文件大小
	readfile($file);//读出文件内容

 ?>