<?php 

function __autoload($class)
{
	echo 11;

}
$a = new asd();//调用类，如果没有，会自动去调用 __autoload类;