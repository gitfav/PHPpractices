<?php
header('Content-Type:application/vnd.ms-excel');
header('Content-Disposition:attachment;filename=demo.xls');
header('Pragma:no-cache');
header('Expires:0');

$title = array('编号','姓名','性别','年龄','身高','体重');
$data = array(
	array('1','张三','男','22','183','72'),
	array('2','是是','反对','12','152','40'),
	array('3','姓名','性别','年龄','身高','体重'),
	array('4','姓名','性别','年龄','身高','体重'),
	array('5','姓名','性别','年龄','身高','体重'),
);
echo iconv('utf-8','gbk',implode("\t", $title)."\n");
foreach($data as $value){
	echo iconv('utf-8','gbk', implode("\t", $value)."\n");
}