<?php 

	require'../../functions.php';
	require'./upload.class.php';
	$a=require'./config.php';
	C($a);//初始化上传条件
	$a=new upload();
	$up=$a->zong();
	p($a->mt_error());
	p($up);
	require'./up.html';


 ?>