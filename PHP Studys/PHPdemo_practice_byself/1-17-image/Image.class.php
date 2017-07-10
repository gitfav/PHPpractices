<?php

/*
* 图像处理类
*
*/
class Image{

	//水印属性
	private $pos;//水印位置
	private $pct;//水印透明度
	/*
	*	水印
	*/
	public function water($dst,$water,$pos=9,$pct=50){


		//打开目标图像资源
		$dstInfo = getimagesize($dst);
		$type = ltrim(strrchr($dstInfo['mime'],'/'),'/');
		$func = 'imagecreatefrom'.$type;
		$dstImg = $func($dst);
		//打开水印图像资源
		$waterInfo = getimagesize($water);
		$type = ltrim(strrchr($waterInfo['mime'],'/'),'/');
		$func = 'imagecreatefrom'.$type;
		$waterImg = $func($water);

		$posArr = $this->getPos($dstInfo[0],$dstInfo[1],$waterInfo[0],$waterInfo[1],$pos);

		imagecopymerge($dstImg, $waterImg, $posArr[0], $posArr[1], 0, 0, $waterInfo[0], $waterInfo[1], $pct);

		//水印图片文件名
		$saveInfo = pathinfo($dst);
		$name = 'water_'.$saveInfo['filename'].'.'.$saveInfo['extension'];
		$fullname = $saveInfo['dirname'].'/'.$name;
		$fn = 'image'.$type;
		$fn($dstImg,$fullname);
		//销毁资源
		imagedestroy($dstImg);
		imagedestroy($waterImg);
	}


	/*
	*	获取水印位置
	*/

	private function getPos($dstW,$dstH,$waterW,$waterH,$pos){
		$posArr = array();

		switch ($pos) {
			case 1:
				$posArr[0] = 20;
				$posArr[1] = 20;
				break;
			
			case 5:
				$posArr[0] = ($dstW-$waterW) /2;
				$posArr[1] = ($dstH-$waterH) /2;
				break;
			
			case 9:
				$posArr[0] = $dstW-$waterW - 20;
				$posArr[1] = $dstH-$waterH - 20;
				break;
			
		}
		return $posArr;
	}


	/*
	*	缩略图
	*/
	public function thumb($src,$thumbW,$thumbH){
		//计算缩放比例
		$srcInfo = getimagesize($src);
		$rateW = $thumbW/$srcInfo[0];
		$rateH = $thumbH/$srcInfo[1];
		$rate = min($rateW,$rateH);
		//新画布大小
		$thumbW = $rate*$srcInfo[0];
		$thumbH = $rate*$srcInfo[1];
		//创建目标画布
		$dstImg = imagecreatetruecolor($thumbW, $thumbH);

		//获得原图资源
		$srcInfo = getimagesize($src);
		$type = ltrim(strrchr($srcInfo['mime'],'/'),'/');
		$func = 'imagecreatefrom'.$type;
		$srcImg = $func($src);
		//进行缩略
		imagecopyresized($dstImg, $srcImg, 0, 0, 0, 0, $thumbW, $thumbH, $srcInfo[0], $srcInfo[1]);
		//组合缩略图存储完整路径
		$saveInfo = pathinfo($src);
		$name = 'thumb_'.$saveInfo['filename'].'.'.$saveInfo['extension'];
		$fullname = $saveInfo['dirname'].'/'.$name;
		$fn = 'image'.$type;
		//保存缩略图
		$fn($dstImg,$fullname);
		//销毁资源
		imagedestroy($dstImg);
		imagedestroy($srcImg);

	}

}

$img = new Image();
// ($dst,$water,$pos=9,$pct=50)
// $img->water('./pic/22.jpg','./pic/1.jpg',5);

$img->thumb('./pic/7.jpg',300,300);

?>