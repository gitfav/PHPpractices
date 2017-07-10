<?php
	
	
	
	$dstImg = imagecreatetruecolor(100, 100);

	$dstW = imagesx($dstImg);
	$dstH = imagesy($dstImg);

	$srcImg = imagecreatefromjpeg('./pic/16.jpg');
	$srcW = imagesx($srcImg);
	$srcH = imagesy($srcImg);

	imagecopyresized($dstImg, $srcImg, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);

	imagejpeg($dstImg,'./thumb.jpg');

?>