<?php
	// $var = array();
	$this->assign('message','liuyan');
	$this->assign('className','c45');
	$this->assign('teacherName','laozhou');

	$var = array(
		'message' => 'liuyan',
		'className'		=> 'c45',
		'teacherName'	=> 'laozhou',

		);
	extract($var);

	echo $message;echo "<br>";

	echo $className;

?>