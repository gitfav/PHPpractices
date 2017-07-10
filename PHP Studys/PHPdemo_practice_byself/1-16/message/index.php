<?php
/*
*	单入口文件[通过get参数访问不同类中的不同方法]
*	get中的 c 表示类名  a 表示类中方法名
*/
require '../../functions.php';
require './TestController.class.php';
require './MessageController.class.php';

// $obj = new MessageController();

// $obj->index();

// $obj->edit();
//要想访问类中的方法，需要实例化这个类 用实例化出的对象 调用该方法
				//因为类名首字母大写，所以用ucfirst处理一下							
$class = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Message';

//echo $class;//当前值Message  要想变成类名 链接controller

$className = $class.'Controller';

//echo $className;//类名到new  差  new $className()

$obj = new $className();//根据get中的C 实例化该类

//获得方法名
$method = isset($_GET['a']) ? $_GET['a'] : 'index';


$obj->$method();
?>