<?php 

function query($sql){
	echo '跑了数据库';
	$link = new Mysqli('127.0.0.1','root','','wenda');
	$link->query('SET NAMES UTF8');
	$result = $link->query($sql);
	$rows = array();
	while ($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	return $rows;
}

 ?>