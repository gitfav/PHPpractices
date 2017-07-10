<?php

header('Content-type:text/html;charset=utf-8');
//定义IS_POST常量，用于确定是否是post提交的
define('IS_POST',!empty($_POST));

function p($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}


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
			return $config[$name];
		}
	}

}

//操作成功方法跳转
function success($url,$msg='操作成功'){
	echo "<script>alert('$msg');location.href='$url';</script>";
}

//失败操作
function error($url=null,$msg='操作失败'){
	echo "<script>alert('$msg');location.href='$url';</script>";
}

//写入数据库操作
function write_db($path,$data){
	//将数组数据变为字符串
	$data = var_export($data,true);
	//拼接合法数据文件样式
	$data = "<?php return $data;?>";
	//写入数据库文件
	return file_put_contents($path, $data);
}



?>