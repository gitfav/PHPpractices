<?php
	header("Content-Type:text/html; charset=utf-8");
	header("Access-Control-Allow-Origin: *");
	require_once 'sql.php';
	require_once 'user.php';
	
	$ip = $_SERVER['REMOTE_ADDR'];
	if (!isIpAllow($ip)){
		echo("hello");
		exit;
	}
	$comeUrl = $_SERVER['HTTP_REFERER'];
	$comeArry = explode('?',$comeUrl);
	$comeUrl = $comeArry[0];
	
	$ret = array();
	if( $comeUrl=='http://www.zsxgh5.com/game/maijinkeji/index.php' || $comeUrl=='http://www.zsxgh5.com/game/maijinkeji/index.html' || 1 ){
		$params = $_POST["value"];
		$params = toChar($params);
		$functionname = $_POST["funcname"];
		//die;
		if (function_exists($functionname))
		{
			$ret["ret"] = 0;
			$ret["command"] = $functionname;
			$ret["data"] = $functionname(json_decode(urldecode($params),true));
		}else{
			$ret["ret"] = -1;
			$ret["command"] = $functionname;
		}
		echo json_encode($ret);
	}else{
		$ret["error"] = 1;
		echo json_encode($ret);
	}
	
	//解析前台提交ascii码
	function toChar($str){
		$str = trim($str,"|||");
		$str =explode('|||',$str);
		$result = '';
		for($i=0; $i<count($str);$i++){
			$result .=chr($str["$i"]-$i);
		}
		return $result;
	}

?>