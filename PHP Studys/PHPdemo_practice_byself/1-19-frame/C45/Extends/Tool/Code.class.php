<?php 

// 验证码类

class Code{

	private $img;//定义图像
	private $size = 18;//验证码字体大小
	private $seed = 'aqwertyuioplkjhgfdsazxcvbnm12345667890';//验证码字符库
	private $length = 4;

	//显示验证码方法
	public function show(){
		// 1.声明是图像
		header('content-type:image/jpeg');
		// 2.创建画布
		$this->img = imagecreatetruecolor(200, 100);
		// 3.填充背景色
		$white =imagecolorallocate($this->img, 255, 255, 255);
		imagefill($this->img, 0, 0, $white);
		// 4.画线
		$this->line();
		// 5.画点
		$this->point();
		// // 6.写字
		$this->write();
		// 7.输出
		imagejpeg($this->img);
		// 8.销毁
		imagedestroy($this->img);
	}
	/*画线方法*/
	private function line(){
		for ($i=0; $i < 50; $i++) { 
			$color = imagecolorallocate($this->img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
			// imageline(image, x1, y1, x2, y2, color)//画线
			imageline($this->img, mt_rand(0,200), mt_rand(0,100), mt_rand(0,200), mt_rand(0,100), $color);
		}
	}

	/*画点*/
	private function point(){
		for ($i=0; $i < 300; $i++) { 
			$color = imagecolorallocate($this->img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
			//画点
			imagesetpixel($this->img, mt_rand(0,255), mt_rand(0,255), $color);
		}
	}
	/*写字*/
	private function write(){
		// 字体颜色
		$color=imagecolorallocate($this->img, mt_rand(0,255), mt_rand(0,255), 0);
		// 字体库长度
		$len = strlen($this->seed);
		//随机到的字
		$step = 200/$this->length;//获取每个字的步长
		for ($i=0; $i <$this->length ; $i++) { 
			$text = $this->seed[mt_rand(0,$len-1)];
			// 写入
			imagettftext($this->img, $this->size, mt_rand(-30,30), $i*$step+20, 50, $color, 'STXINWEI.TTF', $text);
		}
		

	}




}

 ?>