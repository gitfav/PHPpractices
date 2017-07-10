<?php
header("Content-Type:text/html; charset=utf-8");
require_once 'sql.php';

function needupdate($openid)
{
	sql_connect();
	$user = sql_fetch_one("select * from `gameuser` where `openid`='$openid'");
	if (empty($user))
		return true;
	if (empty($user["name"]))
		return  true;
	if (empty($user["image"]))
		return  true;
}

function insertUser($params)
{
	$openid = $params["openid"];
	$nickname = addslashes($params["name"]);
	$image = $params["image"];
	$score = $params["score"];
	sql_connect();
	$user = sql_fetch_one("select * from gameuser where `openid`='$openid'");
	if (!empty($user))
	{
		if (!empty($openid))
		{
			//sql_query("update gameuser set `name`='$nickname',`image`='$image',`score`='$score' where `openid`='$openid'");
			$sql="select * from gameuser where `openid`='$openid'";
			$result=mysql_query($sql);
			$row=mysql_fetch_assoc($result);
			//echo $row['score'];
			
			if(($row['score']==0)||($row['score']>$score)&&($score!=0))
				{sql_query("update gameuser set `score`='$score' where `openid`='$openid'");}
		}
		return $user["openid"];
	}
	else{
	$time = time();
	$id = sql_insert("insert into `gameuser` (`name`,`image`,`openid`,`rtime`,`score`) values ('$nickname','$image','$openid','$time','$score')");
	return $openid;
	}
}

//获取玩家信息
function  getuserinfo($params){
	$phone = $params["id"];
	$ret = array();
	if (empty($phone)){
		//id为空，返回错误码-2
		$ret["ret"] = -2;
		return  $ret;
	}
	sql_connect();
	$user = sql_fetch_one("select * from gameuser where `id`='$phone'");
	$ret["ret"] = 0;
	if (empty($user)){
		$ret["ret"] = -1;
		return  $ret;
	}else{
		$ret["name"] = stripslashes($user["name"]);
		$ret["image"] = $user["image"];
		$ret["score"] = $user["score"];
		$ret["count"] = $user["count"];
		$ret["phone"] = $user["phone"];
		$ret["rname"] = $user["rname"];
	}
	return  $ret;
}

//保存手机号
function  savephone($params){
	$phone = $params["phone"];
	$rname = $params["rname"];
	$id = $params["id"];
	$ret = array();
	if (empty($id)){
		//id为空，返回错误码-2
		$ret["ret"] = -2;
		return  $ret;
	}
	if (empty($phone)){
		//phone为空，返回错误码-3
		$ret["ret"] = -3;
		return  $ret;
	}
	sql_connect();
	$user = sql_fetch_one("select * from gameuser where `id`='$id'");
	if (empty($user)){
		$ret["ret"] = -1;
		return  $ret;
	}else{
		$ret["ret"] = 0;
		sql_query("update `gameuser` set `phone`='$phone',`rname`='$rname' where `id`=$id");
	}
	return  $ret;
}

//提交分数
function  sendscore($params){
	$openid = $params["openid"];
	$score = $params["score"];
	$ret = array();
	if (empty($openid)){
		//id为空，返回错误码-2
		$ret["ret"] = -2;
		return  $ret;
	}
	if ($score < 1){
		//分数为0，不用更新
		$ret["ret"] = -3;
		return $ret;
	}
	sql_connect();
	$user = sql_fetch_one("select * from gameuser where `openid`='$openid'");
	if (empty($user)){
		//玩家未登陆
		$ret["ret"] = -4;
	}else{
		$time = time();
		$ret["ret"] = 0;
		$score = $score > $user["score"] ? $score : $user["score"];
		sql_query("update `gameuser` set `count`=`count`+1, `score`=$score,`ltime`=$time where `openid`='$openid'");
		return $ret;
	}
}

function getranklist($params)
{
	$openid = $params["openid"];
	$ret = array();
	sql_connect();
	$user = sql_fetch_one("select * from gameuser where `openid`='$openid'");
	//$an = sql_fetch_rows("select `id`,`name`,`image`,`score`,`rname` from `gameuser` where 1 order by `score` desc limit 0,10");
	//$an = sql_fetch_rows("select * from gameuser where `score`<>0 order by `score` desc limit 0,10");
	//二次排序---第一次by score desc limit 0,10，第二次order by t.sharepy desc 
	//$an = sql_fetch_rows("select * from (select * from gameuser where score<>0 order by score desc limit 0,10) as t order by t.sharecount desc ");
	
	$an = sql_fetch_rows("select * from (select * from gameuser where score<>0 order by sharecount desc) as t order by t.score desc ");
	$j = 0;
	$rankBtn = 0;
	foreach($an as $v){
		if($v['openid'] == $openid){
			$myscore = $v['score'];
			$j++;
			$rankBtn = 1;
			break;
			}
		$j++;
	}
	foreach ($an as $aa)
	{
		$aa["name"] = stripslashes($aa["name"]);
	}
	
	$ret["ret"] = 0;
	$ret["rank"] = $j;
	$ret["score"] = $user['score'];
	$ret["rankList"] = $an;
	//$ret=$an;
	return  $ret;
}
//分享计数和用户基本信息一起
function  countShare($params){
	$openid = $params["openid"];
	$share = $params["share"];
	$ret = array();
	if (empty($openid)){
		//id为空，返回错误码-2
		$ret["ret"] = -2;
		return  $ret;
	}
	sql_connect();
	
	$time = time();
	$ret["ret"] = 0;
	if($share == 1){//分享到朋友圈
		sql_query("update `gameuser` set `sharecount`=`sharecount`+1, `sharepyq`=`sharepyq`+1,`ltime`=$time where `openid`='$openid'");
	}else{//分享给朋友
		sql_query("update `gameuser` set `sharecount`=`sharecount`+1, `sharepy`=`sharepy`+1,`ltime`=$time where `openid`='$openid'");
	}
	
	return $ret;
}
//分享计数单独放置--sharelog
function sendshare($params)
{
$openid = $params["openid"];
$share = $params["share"];
sql_connect();
$user =  sql_fetch_one("select * from gameuser where `openid`='$openid'");
$name = stripslashes($user["name"]);
$time = time();
$typestr = $share==1?"朋友圈":"好友";
sql_query("insert into `sharelog` (`openid`,`name`,`time`,`type`) values ('$openid','$name','$time','$typestr')");
$ret = array();
$ret["ret"] = 0;
return $ret;
}

?>