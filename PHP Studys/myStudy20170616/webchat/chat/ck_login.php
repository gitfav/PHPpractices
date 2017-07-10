<?php

	session_start();
	include "include/dbconn.php";
	header("Content-type:text/html; charset=utf-8");
	$nickname = $_POST['login_id'];
	$password = $_POST['password'];
	$password = md5($password);
	//
	$sql = "select id from user where nickname='{$nickname}' and password='{$password}';";
	$res = mysql_query($sql,$link);
	if(mysql_num_rows($res)<1){
		echo "<script type='text/javascript'> alert('用户名或密码错误！'); history.back();</script>";
		exit();
	}else{
		$_SESSION['nickname'] = $nickname;
		$_SESSION['password'] = $password;
		
	}
	
	header("Location:index.php");

?>