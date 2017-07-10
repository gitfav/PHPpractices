<?php
//获取目标图片相关信息
$dstDir = './pic/16.jpg';
$dstInfo = getimagesize($dstDir);
// //获取目标图片类型信息
$type = ltrim(strrchr($dstInfo['mime'], '/'),'/');

$func = 'imagecreatefrom'.$type;//组合打开图片资源函数名

$dstImg = $func($dstDir);

// //获取水印图片相关信息
$srcDir = './pic/1.jpg';
$srcInfo = getimagesize($srcDir);
// //获取目标图片类型信息
$type = ltrim(strrchr($srcInfo['mime'], '/'),'/');

$func = 'imagecreatefrom'.$type;//组合打开图片资源函数名

$srcImg = $func($srcDir);



// imagecopy($dstImg, $srcImg, 50, 10, 0, 0, $srcInfo[0], $srcInfo[1]);

imagecopymerge($dstImg, $srcImg, 50, 10, 0, 0, $srcInfo[0], $srcInfo[1],30);

// // imagecopy     (dst_im, src_im, dst_x, dst_y, src_x, src_y, src_w, src_h)

// // imagecopymerge(dst_im, src_im, dst_x, dst_y, src_x, src_y, src_w, src_h, pct)

$fn = 'image'.$type;

$fn($dstImg,'./water/1ww23123.jpg');


$info = pathinfo('./pic/1.jpg');

var_dump($info);



?>