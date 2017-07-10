<?php

// header('Content-type:image/jpeg');

//$img = imagecreatefromjpeg('./pic/1.jpg');//打开图片资源

// imagecreatefromgif(filename)
// imagecreatefrompng(filename)
$f = 'imagecreatefrom';

$info = getimagesize('./pic/1.jpg');

var_dump($info);

// array
//   0 => int 500
//   1 => int 375
//   2 => int 2
//   3 => string 'width="500" height="375"' (length=24)
//   'bits' => int 8
//   'channels' => int 3
//   'mime' => string 'image/jpeg' (length=10)

$ext = ltrim(strrchr($info['mime'], '/'),'/');

$func = $f.$ext;

$img = $func('./pic/1.jpg');//imagecreatefromjpeg(filename);

// echo $ext;
// var_dump($info);

$funcOut = 'image'.$ext;

// $funcOut($img);
// imagejpeg($img,'./water/123456.jpg');

$x = imagesx($img);

$y = imagesy($img);

echo $x,'    ',$y;

?>