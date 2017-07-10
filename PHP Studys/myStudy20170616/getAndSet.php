<?php

class A
{
	private $attribute;
	function __get($name)
	{
		return $this->$name;
	}

	function __set($name,$value)
	{
		$this->$name = $value;
	}
}

$B = new A();
$B->attribute = 10;
echo $B->attribute;