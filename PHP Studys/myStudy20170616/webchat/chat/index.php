<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<title>web聊天</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">
	$(function(){
		$("#flist li").hover(function(){ $(this).css("color","blue").css("cursor","pointer");$(this).siblings().css("color","#000")},function(){$(this).css("color","#000")}).click(function(){window.open("message.php?geter="+$(this).attr("title"),"webchat","width=600,height=600");});
	});
</script>
</head>

<body>
<?php

	include "include/dbconn.php";
	
	if(empty($_SESSION['password'])){
		header("Location:login.php");
		exit();
	}else{
		$nickname = $_SESSION['nickname'];
		echo "<a href='index.php'>".$nickname."</a>";
		//判断是否有好友请求
		$sql = "select id from friend where f_nickname='{$nickname}' and fzt='0';";
		$res = mysql_query($sql,$link);
		$fnum = mysql_num_rows($res);
		if($fnum>0){
			echo "<span ><a href='qingqiu.php' style='color:#c00'>&nbsp;您有(".$fnum.")条好友请求</span></a> 在线 <a href='exit.php'>退出登陆</a>";
		}else{
			echo " 在线 <a href='exit.php'>退出登陆</a>";
		}
		mysql_free_result($res);	
	}
?>
<div id="message">
				
	<hr />
	<p><span style="font-weight:bold">好友列表</span>&nbsp;|&nbsp;<a href="addfriend.php">添加好友</a></p>
	<ul id="flist">
	<?php
		$sql = "select f_nickname from friend where nickname='{$nickname}' and fzt='1';"; 
		//echo $sql;exit();
		$res = mysql_query($sql,$link);
		if(mysql_num_rows($res)<1){
			echo "您还没有好友！<a href='addfriend.php'>添加好友</a>";
			exit();
		}
		echo "<table>";
		while($row = mysql_fetch_array($res)){
			echo "<tr>";
			$f_nickname = $row['f_nickname'];
			//判断是否有新消息
			$sql1 = "select id from message where sender='{$f_nickname}' and geter='{$nickname}' and mloop=0;";
			$res1 = mysql_query($sql1,$link);
			//echo $sql1;
			echo "<td><li title='".$f_nickname."'>".$f_nickname;
			if(mysql_num_rows($res1)>0){
				echo "<span style='color:red'>(有新消息)</span></li></td>";
				
			}else{
				echo "</li></td>";
			}
			echo "<td>&nbsp;&nbsp;<a href='delfriend.php?f_nickname=".$f_nickname."' onclick='return del_confirm()'>删除</a></td>";
			echo "</tr>";
		}
		mysql_free_result($res);
		echo "</table>";
	?>
	</ul>
	<hr />
</div>
</body>
</html>
