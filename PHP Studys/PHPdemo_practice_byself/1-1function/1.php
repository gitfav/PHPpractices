<?php

	header('Content-type:text/html;charset=utf-8;');
	echo "<h2>这里是h2标签</h2>";

	echo "<script>alert(123);</script>";
	$ip = $_SERVER["REMOTE_ADDR"];
	echo $ip;

	$user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
	$user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
	echo $user_IP;

?>