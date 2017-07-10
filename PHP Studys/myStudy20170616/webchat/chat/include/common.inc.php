<?php
	
	//
	//公用函数
	//
	
	//接受表单数据并判断内容是否为空
	function getAndJudge($val,$str){
		if(empty($_POST[$val])){
			echo "<script type='text/javascript'> alert('".$str."'); history.back();</script>";
			exit();
		}else{
			return $_POST[$val];
		}
	}
	
	//接受表单数据并判断内容是否为空  没有 history.back();
	function getAndJudge2($val,$str){
		if(empty($_POST[$val])){
			echo "<script type='text/javascript'> alert('".$str."'); </script>";
			exit();
		}else{
			return $_POST[$val];
		}
	}
	
	//根据某个条件查询有个表中的结果（唯一）
	function getResFromTable($getval,$tiaojian,$val,$table){
		include "include/dbconn.php";
		$sql = "select $getval from $table where $tiaojian=$val;";
		$res = mysql_query($sql,$link);
		$row = mysql_fetch_array($res);
		$getval = $row[$getval];
		mysql_free_result($res);
		return $getval;
	}
	

?>
