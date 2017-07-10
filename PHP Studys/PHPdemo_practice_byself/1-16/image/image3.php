<?php

header('Content-type:image/jpeg');

$img = imagecreatetruecolor(600, 400);

$white = imagecolorallocate($img, 255, 255, 255);

$black = imagecolorallocate($img, 0, 0, 0);

imagefill($img, 0, 0, $white);

// imageline($img, 0, 0, 600, 400, $black);

// imageline($img, 0, 400, 600, 0, $black);
//画线
for($i=0;$i<100;$i++){
	$color = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imageline($img, mt_rand(0,600), mt_rand(0,400), mt_rand(0,600), mt_rand(0,400), $color);
}

//画点
for($i=0;$i<10000;$i++){
	$color = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imagesetpixel($img, mt_rand(0,600), mt_rand(0,400), $color);
}


imagejpeg($img);

?>