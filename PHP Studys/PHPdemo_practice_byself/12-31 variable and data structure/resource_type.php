<?php

	header('Content-type:text/html;charset=utf-8;');
	// $c = mysql_connect();
	// echo get_resource_type($c);
	// $fp = fopen("ad", "ode");
	// echo get_resource_type($fp);
	$a = 2;
	$b = (unset)$a;
	var_dump($b);
	var_dump($a);

?>