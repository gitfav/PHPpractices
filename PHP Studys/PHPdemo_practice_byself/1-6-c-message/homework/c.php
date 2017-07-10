<?php

//C()函数功能
//1,C();  反出所有配置项信息
//2,C(array()) is_array array_merge 传一个参数，并且是数组 批量设置配置项信息
//3,C('name')  C('CODE_LEN') 5 传递一个参数，是字符串，获取对应配置项信息
//4,C('name','value'); 设置配置项信息
/*
* 配置项函数
*/
function C($name=null,$value=null){
	static $config = array();
	//1,C(); 
	if(is_null($name)){ 
		return $config;
	}
	//C(array())
	if(is_array($name)){
		$config = array_merge($config,array_change_key_case($name,CASE_UPPER));
		return true;
	}
	if(is_string($name)){
		$name = strtoupper($name);
		if(is_null($value)){
			return isset($config[$name]) ? $config[$name] : null;
		}else{
			$config[$name] = $value;
			return true;
		}
	}

}



// function C($name=null,$value=null){
// 	static $config = array();
// 	if(is_null($name)){
// 		return $config;
// 	}else if(is_array($name)){
// 		$config = array_merge($config,array_change_key_case($name,CASE_UPPER));
// 		return true;
// 	}else if(is_null($value)){
// 		return isset($config[strtoupper($name)]) ? $config[strtoupper($name)] : null;
// 	}else{
// 		$config[strtoupper($name)] = $value;
// 		return true;
// 	}
// }

$str = 'abdc';

echo strtoupper($str);
?>