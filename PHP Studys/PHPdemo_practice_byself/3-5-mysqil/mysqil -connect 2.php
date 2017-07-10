<?php 
	
	header('content-type:text/html;charset=utf-8');
	$link=@new Mysqli('127.0.0.1','root','','class2');
	if ($link->connect_errno) {
		die($link->connect_error);
	}
	$link->query('set names utf8');

	$result=$link->query('SELECT * from tag;');
	$rows=array();
	while($row=$result->fetch_assoc()) {
		$rows[]=$row;
	}
	var_dump($rows);
	echo $result->num_rows;
	$result->free();
	$link->close();

 ?>