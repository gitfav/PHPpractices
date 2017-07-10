<?php 

	$preg='/(http:\/\/www\.|www\.|http:\/\/)(\w+?)(\.com|cn|org)/';
	$preg_1='/(.*?)(@qq|@126|@sina|@163)(.com)/';
	$mail='sdfd@126.com';
	$hre='www.baidu.com';
	var_dump(preg_match($preg_1, $mail));
	var_dump(preg_match($preg, $hre));

 ?>