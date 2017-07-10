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

$data = array(
	'username'	=>	'小芳',
	'sex'		=>	'女'
);
//分配变量
$smarty->assign('data',$data);

session_start();
$_SESSION['uid'] = 1;

define('ROOT', '\images\s.txt');

$word = 'abcd';
$smarty->assign('word',$word);

$chinese='中国字很漂亮！';
$smarty->assign('chinese',$chinese);

$arr=array('web'=>array('name'=>'html'));
$address='美国';
$smarty->assign('arr',$arr);
$smarty->assign('address',$address);

// 重数据库中得到数据
$link=@new Mysqli('127.0.0.1','root','','wenda');
if ($link->connect_errno) {
	die($link->connect_error);
}
$link->query('SET NAMES UTF8');
$result=$link->query('SELECT * from hd_ask');
$rows=array();
while ($row = $result->fetch_assoc()) {
	$rows[]=$row;
}
$smarty->assign('rows',$rows);


$smarty->display('index.html');

 ?>