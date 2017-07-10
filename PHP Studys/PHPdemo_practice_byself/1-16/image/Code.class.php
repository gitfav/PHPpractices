<?php
/*
* 验证码类
*
*/
class Code{

	private $img;//图像资源

	private $size = 24;//验证码字体大小

	private $seed = '12345890weriopsdfghjklxcvbnm';//验证码种子字符串，从这里面随机取

	private $length = 4;//验证码长度
	/*
	*	显示验证码方法
	*/
	public function show(){
		//1,声明是图像
		header('Content-type:image/jpeg');
		//2,创建画布
		$this->img = imagecreatetruecolor(200, 100);
		//3,填充背景色
		$white = imagecolorallocate($this->img, 255, 255, 255);
		imagefill($this->img, 0, 0, $white);

		//4,画线
		$this->line();
		//5,画点
		$this->point();
		// //6,写字
		$this->write();
		//7,输出
		imagejpeg($this->img);
		//8,销毁资源 
		imagedestroy($this->img);
	}

	/*
	*	画线
	*/
	private function line(){
		for($i=0;$i<18;$i++){
			//颜色
			$color = imagecolorallocate($this->img, mt_rand(0,255),  mt_rand(0,255),  mt_rand(0,255));
			//画线
			imageline($this->img, mt_rand(0,200), mt_rand(0,100), mt_rand(0,200), mt_rand(0,100), $color);
		}
	}

	/*
	*	画线
	*/
	private function point(){
		for($i=0;$i<500;$i++){
			//颜色
			$color = imagecolorallocate($this->img, mt_rand(0,255),  mt_rand(0,255),  mt_rand(0,255));
			//画点
			imagesetpixel($this->img, mt_rand(0,200), mt_rand(0,100), $color);
		}
	}

	/*
	*	写字
	*/
	private function write(){
		//获取每一个验证码的步长
		$step = 200/$this->length;
		//循环写验证码
		for($i=0;$i<$this->length;$i++){
			//获取种子验证码长度
			$len = strlen($this->seed);
			//颜色
			$color = imagecolorallocate($this->img, 0, 0, 0);
			//当前验证码字
			$text = $this->seed[mt_rand(0,$len-1)];
			//写入
			imagettftext($this->img, $this->size, mt_rand(-30,30), $i*$step+15, 50, $color, './jianti.ttf', $text);
		}
		
	}
}

?>