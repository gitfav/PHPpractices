<?php

	header("Content-type:text/html;charset=utf-8");
	if(empty($_POST['sender'])){exit();}
	$sender = $_POST['sender'];
	$geter = $_POST['geter'];
	
	include "include/dbconn.php";
	$sql = "select content,stime from message where sender='{$geter}' and geter='{$sender}' and mloop=0 order by stime asc";
	//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	$res = mysql_query($sql,$link);
	$row=mysql_fetch_array($res);
	//消息条数   采用json返回数据
	$mNums = mysql_num_rows($res);
	if($mNums<1){
		echo "nomessage";
		exit();
	}else if($mNums==1){
		echo "[{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}]";
	}else{
		$result="[{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}";
		while($row=mysql_fetch_array($res)){
			$result.=",{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}";
		}
		$result.=']';
		echo $result;
	}
	mysql_free_result($res);
	 
	//收到消息后将它的状态设为1
	if($mNums>0){
		$sql = "update message set mloop=1 where sender='{$geter}' and geter='{$sender}' and mloop=0";
		mysql_query($sql,$link);
		//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	}
	
?>

