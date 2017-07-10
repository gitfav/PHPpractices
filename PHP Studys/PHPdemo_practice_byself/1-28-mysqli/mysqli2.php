<?php
header('Content-type:text/html;charset=utf-8');
$mysqli = @new Mysqli('localhost','root','','c45'); 
//如果有错误号，打印链接错误信息
if($mysqli->connect_errno){
	echo $mysqli->connect_error;die;
}
//设置字符集           mysqli 使用 query 运行sql语句 
$mysqli->query('SET NAMES UTF8');

$sql = 'SELECT * FROM stu';

$result = $mysqli->query($sql);

if($mysqli->affected_rows>0){
	// $row = $result->fetch_assoc();//常用，多联系
	// $row = $result->fetch_assoc();
	// $row = $result->fetch_assoc();
	// $row = $result->fetch_assoc();
	// $row = $result->fetch_assoc();
	// $row = $result->fetch_assoc();
	//var_dump($row);//当取到最后是，没有记录返回 null
	
	$rows = array();
	while ($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	var_dump($rows);
}


?>