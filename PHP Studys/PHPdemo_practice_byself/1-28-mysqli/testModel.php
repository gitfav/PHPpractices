<?php
header('Content-type:text/html;charset=utf-8');
require './Model.class.php';

$obj = new Model('student');

//笨方法获取表数据
// $sql = 'select * from student';


// $arr =$obj->qu($sql);

//=======简化
//$arr = $obj->all();//执行all方法，将student表中数据取出 


//=====获取指定字段的值
$arr = $obj->field('username,age')->all();//最终让他执行的sql select username,age from student;
var_dump($arr);

?>