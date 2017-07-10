<?php
	header('Content-type:text/html; charset=utf-8');

	//$_GET 地址栏传参
	//http://127.0.01/c45/12-31-jichu/waibubianliang.php?b=%E5%90%8E%E7%9B%BE&c=3&d=666

	// 在地址栏加入?b=%E5%90%8E%E7%9B%BE&c=3&d=666&u=8888

	var_dump($_GET);

	var_dump($_GET['b']);

?>