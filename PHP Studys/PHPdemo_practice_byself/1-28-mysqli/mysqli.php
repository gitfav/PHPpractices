<?php 

//建立数据库链接        主机  用户名   密码   数据库
$mysqli=@new mysqli('localhost','root','','c45');//@ 忽略php 错误提示
//如果有错误号，打印链接错误信息
if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
	die;
}
//设置字符集           mysqli 使用 query 运行sql语句 
$mysqli->query('SET NAMES UTF8');
$sql='SELECT * from stu';
$result=$mysqli->query($sql);
echo $mysqli->affected_rows,'<br>';

// $sql = 'INSERT INTO stu SET name=\'sdsadas\'';
// $mysqli->query($sql);
// echo $mysqli->affected_rows;echo "<br>";
// echo $mysqli->insert_id;//新插入的数据，才会产生主键自增id

// $sql='UPDATE stu set name=453453 where number=2';
// $mysqli->query($sql);
// echo $mysqli->affected_rows;//获得受影响的条数

$sql='INSERT INTO stu SET name=\'mmkimi\',sex=\'男\',class=10,number=10';
$mysqli->query($sql);

$sql='INSERT INTO stu SET name=\'43dfvdvd\',sex=\'男\',class=11,number=11';
$mysqli->query($sql);

echo $mysqli->affected_rows,'<br>';
printf ("New Record has id %d.\n", $mysqli->insert_id);

$mysqli->close(); 

 ?>