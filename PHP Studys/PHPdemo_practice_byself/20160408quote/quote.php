<?php
// class a{
// 	public function ac(){
// 		static $a = 1;
// 		$a++;
// 		echo '<br>hello<br>';
// 		echo $a;
// 	}
// }

function &b(){
	static $a=1;
	return $a;
}
$c =& b();
$c = 13;
$b =& b();
$b = 5;
$d = b();

echo $d;