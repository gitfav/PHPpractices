<?php

header("Content-Type: text/html; charset=utf-8");

$a = 1;
$b = 2;
$c = 3;
switch (true){
    case ($a==$b):
        echo 1;
        break;
    case($a<=$c):
        echo 2;
        break;
    default:
        echo 3;
        break;
};