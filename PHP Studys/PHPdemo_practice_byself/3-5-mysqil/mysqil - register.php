<?php 

header('Content-type:text/html;charset=utf-8');
$link=@new Mysqli('127.0.0.1','root','','class2');
if ($link->connect_errno) {
	die($link->connect_error);
}
$link->query('SET NAMES UTF8');

$stmt=$link->prepare('INSERT INTO register(username,password) values(?,?)');
$username='112sdced';
$password=md5('safvfvfewedfc');
if ($stmt) {
	$stmt->bind_param('si',$username,$password);
	if (!$stmt->execute()) {
		echo "错误代码：".$stmt->errno.'错误信息：'.$stmt->error;
	}else{
		echo "受影响条数：".$stmt->affected_rows.'<br>'.'自增id：'.$stmt->insert_id.'<br>';
	}
}else{
	$link->error;
}

 ?>