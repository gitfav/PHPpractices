<?php
//C()函数功能
//1,C();  反出所有配置项信息
//2,C(array()) is_array array_merge 传一个参数，并且是数组 批量设置配置项信息
//3,C('name')  C('CODE_LEN') 5 传递一个参数，是字符串，获取对应配置项信息
//4,C('name','value'); 设置配置项信息

function C($name=null,$value=null){
	static $config = array();

	if(is_null($name) && is_null($value)){

	}

	if(is_array($name)){

	}

	if(is_string($name)){

	}
}




?>