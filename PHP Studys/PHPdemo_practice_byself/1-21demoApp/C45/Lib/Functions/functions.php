<?php
$flag = $_SERVER['REQUEST_METHOD']=='POST' ? true:false;

define('IS_POST',$flag);

function C($name=null,$value=null){
	static $config = array();

	if(is_null($name)){
		return $config;
	}else if(is_array($name)){
		$config = array_merge($config,$name);
	}else if(is_null($value)){
		return isset($config[$name]) ? $config[$name] : null;
	}else{
		$config[$name] = $value;
	}
}

function p($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
?>