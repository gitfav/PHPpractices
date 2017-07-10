<?php

$username = $_POST['username'];

$wishs = require './db.php';

$_POST['time'] = date('Y-m-d');

$wishs[] = $_POST;

$data = "<?php return ".var_export($wishs,true).";?>";

file_put_contents('./db.php', $data);

echo json_encode($_POST);die;
?>