<?php 

	header("Content-type:text/html;charset=utf-8");
	require_once"./functions.php";
	$data=require_once"./require_data.php";

	p($data);
	$data[] = array(
			'user'=>'sun',
			'title'=>'前端大牛',
			'content'=>'好的',

			);
	p($data);
	$data = array(
			'user'=>'sun',
			'title'=>'前端大牛',
			'content'=>'好的',

			);
	//将数组转换成普通字符串形式
	$data = var_export($data,true);
	p($data);
	//前面链接 <?php return 组合成跟数据库文件(require_data.php)一样的样式
	$newData = "<?php return ".$data;
	p($newData);
	file_put_contents('../require_data.php', $newData);//已经在上一级菜单生成require_data.php文件。

 ?>