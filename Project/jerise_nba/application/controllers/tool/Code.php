<?php
/*
* 验证码类
*
*/
class Code extends CI_Controller{
	public function  __construct(){//相当于__construct()函数
		parent::__construct();//你此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		$this->load->helper('url');
		$this->load->library('session');
	}
	private $fontFile;//字体文件

	private $img;//图像资源

	private $width=100;//画布宽度

	private $height=25;//画布高度

	private $size=15;//验证码字体大小

	private $seed='1234567890qwertyuiopasdfghjklzxcvbnm';//验证码种子字符串，从这里面随机取

	private $length=4;//验证码长度
	/*
	*	显示验证码方法
	*/
	public function show(){
		$this->fontFile="./public/Font/jianti.ttf";
		// $path=str_replace('\\', '/', dirname(__FILE__));
		// var_dump($path);
		// $this->fontFile=base_url('public/Font/jianti.ttf');
		// echo $this->fontFile;
		// 1,声明是图像
		header('Content-type:image/jpeg');
		//2,创建画布
		$this->img = imagecreatetruecolor($this->width, $this->height);
		//3,填充背景色
		$white = imagecolorallocate($this->img, 255, 255, 255);
		
		imagefill($this->img, 0, 0, $white);

		//4,画线
		$this->line();
		//5,画点
		$this->point();
		//6,写字
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
	*	画点
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
		$step = $this->width/$this->length;
		//循环写验证码
		$code = '';
		for($i=0;$i<$this->length;$i++){
			//获取种子验证码长度
			$len = strlen($this->seed);
			//颜色
			$color = imagecolorallocate($this->img, 0, 0, 0);
			//当前验证码字
			$text = $this->seed[mt_rand(0,$len-1)];

			$code .=$text;
			//写入
			imagettftext($this->img, $this->size, mt_rand(-30,30), $i*$step+15, $this->height/1.5, $color, $this->fontFile, $text);
		}
		$_SESSION['code'] = strtoupper($code);
	}
}

?>