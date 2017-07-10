<?php 

	header('Content-type:text/html;charset=utf-8');
	$message=require_once"./db.php";
	$index=$_GET['index'];
	unset($message[$index]);
	$data=var_export($message,true);
	$data="<?php return ".$data."?>";
	file_put_contents('./db.php', $data);
	echo "<script>alert('操作成功');location.href='./index.php';</script>";
	
 ?>