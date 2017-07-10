<?php 

	//大小写转化
	//大写转小写
	$str="ABCDEFG";
	echo strtolower($str),"</br>";

	//小写转化大写
	$str="abcdef";
	echo strtoupper($str),"<hr>";

	$arr=array(
		'abc'=>'absdlsf',
		'Egf' => 'DSAfds',
		'1' => array(
			'asdf',
			'DFASDF',
			'12312',
		),
	);

	//以下为转化键值大小写
	function change_arr_value($arr,$fag){	
		$a=$fag==1?'strtoupper':'strtolower';
		foreach ($arr as $k => $v) {
			if(is_array($v)){
				$arr[$k]=change_arr_value($v,$fag);
			}else{
				$arr[$k]=$a($v);
			}
		}
		return $arr;
	}
	var_dump(change_arr_value($arr,0));
   	// 首字母大写 和 字符串中单词 首字母大写   看老师写的
  	$password="124ewrfewfsw";
  	echo md5($password),"</br>";//生成32为加密字符串乱码

  	$pic="12@fds@.34rw>@sfsrer3";
  	$arr=explode('@', $pic);
  	var_dump($arr);//用@拆分字符串,返回一个拆分万的数组
  	echo "</br>";

  	$temp=array('1.2red','dsfaf423','3rwawfd');
  	$string=implode("....",$temp);//将数组中的元素 用符号链接成字符串
  	var_dump($string);

  	


  ?>