<?php

	
	include "include/dbconn.php";
	include "include/common.inc.php";
	header("Content-type:text/html;charset=utf-8");
	//获取数据
	$nickname = getAndJudge('nickname','昵称不能为空！');
	$password = getAndJudge('password','密码不能为空！');
	$password2 = getAndJudge2('password2','重复密码不能为空！');
	if($password==$password2){
		$password = md5($password);
	}else{
		echo "<script type='text/javascript'> alert('重复密码有误'); history.back();</script>";
	}
	$sex = $_POST['sex'];
	
	$yyyy = $_POST['yyyy'];
	$mm = $_POST['mm'];
	$dd = $_POST['dd'];
	$birthday = $yyyy."-".$mm."-".$dd;
	$address = $_POST['address'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	
	$age = intval(date("Y"))-intval($yyyy);
	
	$sql = "select * from user where nickname='".$nickname."';";
	$res = mysql_query($sql,$link);
	$row = mysql_num_rows($res);
	
	if ($row == 1){
		echo "<script type='text/javascript'> alert('该用户名已经被注册'); history.back();</script>";
	}
	
	$sql = "insert into user (nickname,password,address,sex,age,birthday,reg_time,question,answer) values ('{$nickname}','{$password}','{$address}','{$sex}','{$age}','{$birthday}',now(),'{$question}','{$answer}');";
	
	//echo $sql;
	$res = mysql_query($sql,$link);
	if($res){
		echo "恭喜！注册成功！！<p>马上<a href='index.php' target='_blank'>登陆</a></p>";
	}else{
		echo "<script type='text/javascript'> alert('对不起！注册失败！');history.back(); </script>";
	}

?>
