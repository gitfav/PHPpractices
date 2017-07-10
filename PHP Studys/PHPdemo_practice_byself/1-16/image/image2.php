<?php

header('Content-type:image/jpeg');

//1,创建画布

$img = imagecreatetruecolor(600, 400);

//2,颜色
$white = imagecolorallocate($img, 255, 255, 255);
$red = imagecolorallocate($img, 255, 0, 0);
$black = imagecolorallocate($img, 0, 0, 0);
//3,填充
imagefill($img, 0, 0, $white);

imageFilledEllipse($img, 300, 200, 300, 300, $red);

imagettftext($img, 28, 30, 500, 300, $black, './jianti.ttf', '打倒');
//4,输出

imagejpeg($img);
?>