<?php
	header("Content-type:text/html;charset=utf-8");

	define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST' ? true:false);
// 封装函数
	// 打印
	function p($a){
		header('Content-type:text/html;charset=utf-8');
		echo '<pre>';
		print_r($a);
		echo '</pre>';
	}

	// C函数
function C($name=null,$value=null){
	
	// 声明一个静态数组
	static $config = array();
	//1. name，value都为空
	if(is_null($name) && is_null($value)){
		// 反出所有配置项信息
		return $config;
	}
	//2. 传入一个数组
	if(is_array($name)){
		// 批量设置配置项信息
		// 如果name不全为大写则转为大写
		$config = array_merge($config, array_change_key_case($name,CASE_UPPER));
		// 如果设置成功则返回真
		return true;
	}

	if (is_string($name)) {
		// 如果name不全为大写则转为大写
		$name = strtoupper($name);
		if (is_null($value)) {
			//只有name，没有value
			return isset($config[$name])? $config[$name] :null;
		}else{
			// 既有name又有value
			$config[$name]=$value;
		}
	}
}


function print_const(){
	$arr = get_defined_constants(true);
	p($arr['user']);
}

function halt($msg){
	header('Content-type:text/html;charset=utf-8');
	die($msg);
}

//实例化模型
function M(){
	return new Model();
}

//实例化扩展模型
function K($table){
	$class = ucfirst($table).'Model';
	return new $class($table);
}

function nocache($params, $content, &$smarty) {
	return $content;
}

function Q($str){
	return addslashes(htmlspecialchars($str));
}

?>