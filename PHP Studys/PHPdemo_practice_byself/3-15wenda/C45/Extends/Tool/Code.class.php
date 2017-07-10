<?php
/*
* 验证码类
*
*/
class Code{
	private $fontFile;//字体文件

	private $img;//图像资源

	private $width;//画布宽度

	private $height;//画布高度

	private $size;//验证码字体大小

	private $seed;//验证码种子字符串，从这里面随机取

	private $length;//验证码长度

	public function __construct($length=null,$size=null,$width=null,$height=null,$seed=null,$fontFile=null){
		$this->length = is_null($length) ? C('CODE_LEN') : $length;
		$this->width = is_null($width) ? C('CODE_WIDTH') : $width;
		$this->height = is_null($height) ? C('CODE_HEIGHT') : $height;
		$this->seed = is_null($seed) ? C('CODE_SEED') : $seed;
		$this->size = is_null($size) ? C('FONT_SIZE') : $size;
		$this->fontFile = is_null($fontFile) ? C('FONT_FILE') : $fontFile;
	}
	/*
	*	显示验证码方法
	*/
	public function show(){
		//1,声明是图像
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
			imagettftext($this->img, $this->size, mt_rand(-30,30), $i*$step+15, $this->height/2, $color, $this->fontFile, $text);
		}
		$_SESSION['code'] = strtoupper($code);
		
	}
}

?>