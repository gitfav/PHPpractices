<?php 
header('Content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','','c45');
if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
	die;
}
$mysqli->query('SET NAMES UTF8');
$sql='SELECT * from stu';
$result=$mysqli->query($sql);
if ($mysqli->affected_rows>0) {
	$row=$result->fetch_assoc();//返回关联数组
	$rr=$result->fetch_row();//返回索引数组
	$arr=$result->fetch_array();
	$ob=$result->fetch_object();//返回对象
	
	var_dump($result);
	var_dump($row);
	var_dump($rr);
	var_dump($arr);
	var_dump($ob);
	var_dump($ob->number);

	// while ($row=$result->fetch_assoc()) {
	// 	var_dump($row);
	// }
}



 ?>