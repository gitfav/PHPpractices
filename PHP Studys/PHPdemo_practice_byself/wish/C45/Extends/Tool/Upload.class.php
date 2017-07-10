<?php

class Upload{

	private $allowType;//允许的上传类型

	private $size;//框架内部上传大小限定

	private $path;//上传路径

	private $error;//上传错误信息

	public function __construct($allowType=null,$size=null,$path=null){
		$this->allowType = is_null($allowType) ? C('UPLOAD_ALLOW_TYPE') : $allowType;
		$this->size = is_null($size) ? C('UPLOAD_SIZE') : $size;
		$this->path = is_null($path) ? C('UPLOAD_PATH') : $path;
	}
	/*
	* 外部调用上传方法
	*/
	public function uploadFile(){
		//p($_FILES);//根据打印结果 arr.php 去写 重置数组函数
		//1,重置数组方法
		$new = $this->resetArr();
		//2,过滤数据
		$filterData = $this->filterArr($new);

		//3,循环上传
		$up = $this->up($filterData);

		return $up;
	}

	private function resetArr(){
		$new = array();//装处理完的数组
		foreach ($_FILES as $k => $f) {
			if(!is_array($f['name'])){
				$new[] = $f;
			}else{
				$temp = array();
				foreach ($f['name'] as $key => $value) {
					$temp = array(
						'name'		=>		$value,
						'type'		=>		$f['type'][$key],
						'tmp_name'	=>		$f['tmp_name'][$key],
						'size'		=>		$f['size'][$key],
						'error'		=>		$f['error'][$key]

						);
					$new[] = $temp;
				}
			}
		}
		return $new;
	}


	/*
	*	过滤非法数据
	*/
	private function filterArr($files){
		$new = array();
		foreach ($files as $key => $f) {
			//得到文件扩展名
			$ext = ltrim(strrchr($f['name'],'.'),'.');

			switch (true) {
				case $f['error']==1:
					$errorMsg = '大小超过了 php.ini 中 upload_max_filesize 限制值
';
					$f['errorMsg'] = $errorMsg;
					$this->error[] = $f;
					break;
				case $f['error']==2:
					$errorMsg = '大小超过 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
					$f['errorMsg'] = $errorMsg;
					$this->error[] = $f;
					break;
				case $f['error']==3:
					$errorMsg = '文件只有部分被上传。';
					$f['errorMsg'] = $errorMsg;
					$this->error[] = $f;
					break;
				case $f['error']==4:
					$errorMsg = '没有文件被上传
';
					$f['errorMsg'] = $errorMsg;
					$this->error[] = $f;
					break;
				case !in_array($ext, $this->allowType):
					$errorMsg = '上传类型不合法';
					$f['errorMsg'] = $errorMsg;
					$this->error[] = $f;
					break;
				case $f['size']>$this->size:
					$errorMsg = '上传文件大小超出框架设置';
					$f['errorMsg'] = $errorMsg;
					$this->error[] = $f;
					break;
				default:
					$new[] = $f;
					break;
			}
		}
		return $new;
	}

	/*
	*	循环上传文件
	*/


	private function up($files){
		foreach ($files as $key => $f) {
			//组合上传目标文件 目录
			$dir = $this->path.'/'.date('Ymd');
			$filename = time().mt_rand(0,1000);
			$ext = ltrim(strrchr($f['name'],'.'),'.');
			$fullname = $dir.'/'.$filename.'.'.$ext;
			//创建文件夹
			is_dir($dir) || mkdir($dir,0777,true);

			if(is_uploaded_file($f['tmp_name'])){
				move_uploaded_file($f['tmp_name'], $fullname);
			}

		}
		return $files;
	}


	/*
	*	获取上传文件错误信息
	*/
	public function getError(){
		return $this->error;
	}
}	

?>