<?php
	require '../../functions.php';
	//网站配置项举例

	//肯德基加盟配置
	$sysConfig = array(
		'面积' 		=> '500平',
		'门脸'		=> '>10m',
		'资金' 		=> '500万',
		'房屋租期'  => '10年',
		'人员配置'  => array(
			'店长'  => 2,
			'店员'  => 10,

			),
		'迎宾'      => 2
		);

	//我的加盟店，具体情况
	$myConfig = array(
		'面积'		=> '5000平',
		'门脸'      => '20米',
		'资金'      => '1000万',
		'房屋租期'  => '个人',
		'人员配置'  => array(
			'店长'  => 5,
			'店员'  => 20,
			'经理' =>1
			),
		);

	$nowConfig = array_merge($sysConfig,$myConfig);

	p($nowConfig);


?>