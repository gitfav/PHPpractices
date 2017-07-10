<?php 

date_default_timezone_set('PRC');
require './libs/Smarty.class.php';
//实例化Smarty对象
$smarty = new Smarty();
//模版目录
$smarty->template_dir = "template"; 
//编译目录 
$smarty->compile_dir = "temp/compile";
//缓存目录 
$smarty->cache_dir = "temp/cache";
 //开始定界符 
$smarty->left_delimiter = "{*";
 //结束定界
$smarty->right_delimiter = "}";

$link=@new Mysqli('127.0.0.1','root','','wenda');
$link->query('SET NAMES UTF8');
$result = $link->query('SELECT * FROM hd_ask');
$rows = array();
while ($row = $result->fetch_assoc()) {
	$rows[] = $row;
}
$smarty->assign('rows',$rows);
$smarty->assign('words','中国北京后盾网');

$smarty->caching=true;
$smarty->cache_lifetime = 10;

session_start();
include 'function.php';
if (!$smarty->is_cached('index.html')) {
	$sql = "SELECT * FROM hd_user";
	$userInfo = query($sql);
	$smarty->assign('userInfo',$userInfo);
}



$smarty->display('index.html');
 ?>