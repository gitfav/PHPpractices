<?php
	
	require '../../functions.php';
	//获得老数据
	$data = require './db.php';

	$data[] = array(
		'username' => 'yuonly',
		'age'		=> 55,
		'content'	=> '岁数大了',
		'time'		=> time(),
		);
	
	$data = var_export($data,true);
	// p($data);
	//单引号不解析变量，双引号解析变量
	$data = "<?php return $data;?>";
	file_put_contents('./db.php', $data);

?>