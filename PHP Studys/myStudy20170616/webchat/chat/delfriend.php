<?php
	session_start();
	if(empty($_SESSION['password'])){
		header("Location:login.php");
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	include "include/dbconn.php";
	$f_nickname = $_GET['f_nickname'];
	$sql = "delete from friend where nickname='".$_SESSION['nickname']."' and f_nickname='{$f_nickname}'";
	if(mysql_query($sql,$link)){
		echo "<script type='text/javascript'> alert('删除成功'); location.href='index.php'; </script>";	}
	

?>