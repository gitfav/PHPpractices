<?php
	session_start();
	
	if(empty($_SESSION['password'])){
		echo "<a href='login.php'>登陆</a> <a href='regist.php' target='_blank'>注册</a>";
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	include "include/dbconn.php";
	include "include/common.inc.php";
	
	$nickname = $_SESSION['nickname'];
	$f_nickname = $_GET['f_nickname'];
	
	//判断是该用户id是否存在
	$sql = "select id from user where nickname='{$f_nickname}';";
	$res = mysql_query($sql,$link);
	if(mysql_num_rows($res)<1){
		echo "<script type='text/javascript'> alert('不存在该用户'); location.href='addfriend.php'; </script>";
		exit();
	}
	
	//判断是否已经加过该好友
	$sql = "select nickname from friend where f_nickname='{$f_nickname}' and nickname='{$nickname}';";
	$res = mysql_query($sql,$link);
	if(mysql_num_rows($res)>0){
		echo "<script type='text/javascript'> alert('您已经添加了该好友'); location.href='addfriend.php'; </script>";
		exit();
	}
	
	$sql = "insert friend (nickname,f_nickname) values ('{$nickname}','{$f_nickname}');";
	$res = mysql_query($sql,$link);
	if($res){
		echo "<script type='text/javascript'> alert('好友请求发送成功，请等待对方确认'); location.href='addfriend.php'; </script>";
	}

?>
