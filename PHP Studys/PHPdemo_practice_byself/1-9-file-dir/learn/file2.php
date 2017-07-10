<?php

date_default_timezone_set('PRC');

$file = './dir1.php';

$time  = filemtime($file);

echo date('Y-m-d H:i:s',$time);
?>