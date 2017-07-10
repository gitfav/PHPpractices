<?php

	include "config/dbconfig.php";

	$link = @mysql_connect($DBHOST,$DBUSER,$DBPASSWORD);
	mysql_select_db($DBNAME);
	//设置编码
	mysql_query("set names utf8");

?>
