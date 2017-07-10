<?php
	
	header("Content-type:text/html;charset=utf-8");
	if(empty($_POST['sender'])){exit();}
	$sender = $_POST['sender'];
	$geter = $_POST['geter'];
	$content = $_POST['content'];
	//$aa = $content."&".$sender."&".$geter;
	//file_put_contents("log.txt",$content."\r\n",FILE_APPEND);
	include "include/dbconn.php";
	
	$sql = "INSERT INTO message (sender,geter,content,stime)VALUES ('{$sender}','{$geter}','{$content}',now())";
	//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	$res = mysql_query($sql,$link);
	if(!$res){
		echo ""; //发送失败
	}else{
		date_default_timezone_set("PRC");
		echo date("H:i:s");
	}
?>