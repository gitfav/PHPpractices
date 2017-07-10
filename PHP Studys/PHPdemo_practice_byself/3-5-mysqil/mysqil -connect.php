<?php 

//1.连接数据库
//2.检查数据库是否连接
//3.设定字符集
//4.进行一系列删除，插入等操作
$link=@new Mysqli('127.0.0.1','root','','class2');
if($link->connect_errno){
	die($link->connect_error);
}
$link->query('SET NAMES UTF8');
var_dump($link->query('SELECT * from tag'));
if($link->affected_rows>0){
	echo "OK";
}

 ?>