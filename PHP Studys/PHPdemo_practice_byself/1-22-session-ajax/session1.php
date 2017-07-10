<?php 

session_name('c45');
session_start();
$_SESSION['username']='yuuuu';
echo $_SESSION['username'];
unset($_SESSION['username']);//删除session变量
var_dump(isset($_SESSION['username']));

 ?>