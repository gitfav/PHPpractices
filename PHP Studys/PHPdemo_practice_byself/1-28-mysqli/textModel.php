<?php 

header('content-type:text/html;charset=utf-8');
require'./Model.class.php';
$m=new Model('stu');
$arr=$m->all();
var_dump($arr);

$a=$m->where('name like \'ewtwe\'')->all();
var_dump($a);

 ?>