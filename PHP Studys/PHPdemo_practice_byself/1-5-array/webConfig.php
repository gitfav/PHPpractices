<?php 

	header("Content-type:text/html;charset=utf-8");
	$sysConfig = array(
		'CODE_LEN'			=> 4,//验证码
		'UPLOAD_TYPE'		=> array('doc','txt','excel'),
		'UPLOAD_SIZE'		=> '4M',
		'WEBNAME'			=> '兄弟连',
		'DBNAME'			=> 'houdunwang',//数据库名
		'DBUSER'			=> 'root',
		'DBPWD'				=> '',

	);

	$myConfig = array(
		'CODE_LEN' 			=> 6,
		'WEBNAME'			=> '后盾网',
		'DBNAME'			=> 'kuaixue',

		);

	$newConfig=array_merge($sysConfig,$myConfig);//批量修改配置项信息

	$code=$newConfig['CODE_LEN'];//通过键名 获取配置项信息

	$newConfig['CODE_LEN']=4;//通过键名键值 修改配置项信息

	//p($nowConfig);//打印所有配置项信息

	//新的functions()函数要包括以下函数

	// C();
	//C()函数功能
	//1,C();  反出所有配置项信息
	//2,C(array()) is_array array_merge 传一个参数，并且是数组 批量设置配置项信息
	//3,C(string)  C('CODE_LEN') 5 传递一个参数，是字符串，获取对应配置项信息
	//4,C('name','value'); 设置配置项信息


	//验证码配置项举例

	$Length=$newConfig['CODE_LEN'];
	$seed='1234567890qwertyuiopasdfghjklzxcvbnm';
	$code="";
	for ($i=0; $i < $Length; $i++) { 
		
		$code.=$seed[mt_rand(0,strlen($seed)-1)].' ';
	}
	echo $code;
	

 ?>