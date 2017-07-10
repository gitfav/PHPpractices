<?php

require './Model2.class.php';

$m = new Model('student');

// $m->qu('select * from student');z

// $m->all();//让all 拼出 select * from student;

// $arr = $m->all();

// var_dump($arr);die;

//============field===========
// $arr = $m->field('username,age')->all();// select username,age from student
// var_dump($arr);

//============where=========
// $arr = $m->field('username,age,sid')->where('sid<3')->all();//select username,age,sid from student where sid<3;
// var_dump($arr);

//=============测试 opt

$arr = $m->field('username')->order('sid desc')->limit(2)->where('age>5')->group('class')->all();
var_dump($arr);
?>