<?php
// require './bug.php';如果载入的文件有错误，图像也不能正常显示
//phpinfo();//查看是否安装gd库

//$re = extension_loaded("GD");//检测是否加载了GD库，有返回true

// var_dump($re);

//0：发送HTTP头文件，声明内容为图像
header('Content-type: image/jpeg');
//1：创建画布
$img = imagecreatetruecolor(600, 300);
//2：创建绘图所需要的颜色
$red = imagecolorallocate($img, 255, 0, 0);
//3：绘图  (填充画布、画圆、画方块、画线条、画布上写字)
imagefill($img, 0, 0, $red);
//4：输出图像
imagejpeg($img);
//5：释放图像资源
imagedestroy($img);




?>