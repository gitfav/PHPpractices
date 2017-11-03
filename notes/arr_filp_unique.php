<?php

header("Content-Type: text/html; charset=utf-8");

$arr = ['aa','bb','aa','cc'];
$arr = array_flip(array_flip($arr));    //这样可以去重，比 array_unique 速度要快