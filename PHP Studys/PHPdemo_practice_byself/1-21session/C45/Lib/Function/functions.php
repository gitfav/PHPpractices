<?php
define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST' ? true:false);

function p($arr){
	header('Content-type:text/html;charset=utf-8');
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

function C($name=null,$value=null){
	static $config = array();

	if(is_null($name)){
		return $config;
	}else if(is_array($name)){
		$config = array_merge($config,array_change_key_case($name,CASE_UPPER));
	}else if(is_null($value)){
		return isset($config[$name]) ? $config[$name] : null;
	}else{
		$config[$name] = $value;
	}
}

//错误提示函数
function halt($msg){
	header('Content-type:text/html;charset=utf-8');
	die($msg);
}

?>