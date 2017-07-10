<?php

class Upload{

	//扩展完成
	private $allowType;//允许上传的类型

	private $size;//框架内部允许上传的大小

	private $path;//自定义上传路径 

	private $error;//记录过滤掉的上传文件

	public function __construct($allowType=null,$size=null,$path=null){
		//array('jpg','png','gif');
		$this->allowType = is_null($allowType) ? C('UPLOAD_ALLOW_TYPE') : $allowType;
		
		$this->size = is_null($size) ? C('UPLOAD_MAX_SIZE') : $size;

		$this->path = is_null($path) ? C('UPLOAD_PATH') : $path;

		//C函数理解不透彻版
		// $this->allowType = is_null($allowType) ? array('jpg','png') : $allowType;
		
		// $this->size = is_null($size) ? 10000 : $size;

		// $this->path = is_null($path) ? './upload' : $path;
		//C函数理解不透彻版
	}
	//扩展完成 

	/*
	* 外部调用的上传方法
	*/
	public function upload(){
		//1,重组数组
		$new = $this->resetArr();
		//2,过滤非法数据

		$newUp = $this->filterArr($new);
		//3,循环上传
		$this->up($newUp);

		//扩展
		return $up;//上传成功的文件信息，包括文件名 大小 上传后的存储路径
		//扩展
	}
	/*
	* 重组上传数组
	*/
	private function resetArr(){

	}

	/*
	* 重组上传数组
	*/
	private function filterArr(){

	}

	/*
	* 执行循环上传
	*/
	private function up(){

	}

}

?>