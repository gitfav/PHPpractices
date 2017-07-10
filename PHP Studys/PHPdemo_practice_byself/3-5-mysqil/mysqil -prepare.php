<?php 

header('Content-type:text/html;charset=utf-8');
$link=@new Mysqli('127.0.0.1','root','','class2');
if ($link->connect_errno) {
	die($link->connect_error);
}
$link->query('SET NAMES UTF8');

$stmt=$link->prepare('INSERT INTO ask(content,cid) values(?,?)');//******
if ($stmt) {
	$variable=array(
		array('con'=>'js怎么样？','cid'=>'6'),
		array('con'=>'div怎么样？','cid'=>'3')
	);
	foreach ($variable as $v) {
		extract($v);
		$stmt->bind_param('si',$con,$cid);//*****
		if (!$stmt->execute()) {
			echo "错误代码：".$stmt->errno.'  错误信息：'.$stmt->error;
		}else{
			echo "受条数影响：".$stmt->affected_rows.'<br>';
			echo "自增id：".$stmt->insert_id.'<br>';
		}

	}
}else{
	$link->error;
}

 ?>