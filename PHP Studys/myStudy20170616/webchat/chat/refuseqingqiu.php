<?php
	session_start();
	
	if(empty($_SESSION['password'])){
		echo "<a href='login.php'>登陆</a> <a href='regist.php' target='_blank'>注册</a>";
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	include "include/dbconn.php";
	
	$id = $_GET['id'];
	
	$sql = "delete from friend where id='{$id}';";
	$res = mysql_query($sql,$link);
	if($res){
		echo "<script type='text/javascript'> alert('已拒绝'); location.href='qingqiu.php'; </script>";
		exit();
	}

?>
