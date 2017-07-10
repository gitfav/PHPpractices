<?php
	//等比例缩放知识准备


	//王宁友情提供
	$m = max($srcInfo[0],$srcInfo[1]);
	$rate = 100/$m;
	//王宁友情提供


	
	$srcInfo = getimagesize('../pic/16.jpg');
	$rateW = 100/$srcInfo[0];//宽度比例
	$rateH = 100/$srcInfo[1];//高度比例
	//统一比例
	//min 以长边为基准 即长边100
	//max 以短边为基准 即短边100
	$rate = min($rateH,$rateW);

	//计算新画布尺寸   
	$w = $rate*$srcInfo[0];
	$h = $rate*$srcInfo[1];



	// echo $srcInfo[0]."w  {$srcInfo[1]} h";
	// echo "<br>";

	// echo $w."w {$h} h";
	
	
	$dstImg = imagecreatetruecolor($w, $h);

	$dstW = imagesx($dstImg);
	$dstH = imagesy($dstImg);

	$srcImg = imagecreatefromjpeg('../pic/16.jpg');
	$srcW = imagesx($srcImg);
	$srcH = imagesy($srcImg);

	imagecopyresized($dstImg, $srcImg, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);

	imagejpeg($dstImg,'./thumb111.jpg');
?>