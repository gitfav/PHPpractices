<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>web聊天_添加好友</title>
</head>

<body>
<P><a href="index.php">返回主页</a></P>
<hr />
<form action="addfriend1.php" method="get">
对方的昵称：<input type="text" name="f_nickname" />
<input type="submit" value=" 添加 " name="sub" />
</form>
<hr />
<p>最新注册会员</p>
<?php

	include "include/dbconn.php";
	$sql = "select nickname from user order by reg_time desc limit 0,10;";
	$res = mysql_query($sql,$link);
	
	while($row = mysql_fetch_array($res)){
		echo "<li>".$row['nickname']."&nbsp;|&nbsp;<a href='addfriend1.php?f_nickname=".$row['nickname']."'>添加好友</a></li>";
	}
	mysql_free_result($res);

?>
</body>
</html>
