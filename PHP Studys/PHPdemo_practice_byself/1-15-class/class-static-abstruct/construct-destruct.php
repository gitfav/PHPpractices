<?php
header('Content-type:text/html;charset=utf-8');

class A{

	public function __construct(){
		echo '我是construct';echo "<br>";
	}


	public function say(){
		echo '我是say';echo "<br>";
	}

	public function __destruct(){
		echo '我是destruct';echo "<br>";
	}
}

$a1 = new A();

$a1->say();