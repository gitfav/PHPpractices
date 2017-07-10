<?php 

class Upload{
	//外部调用的上传方法
	public function upload(){
		//1,重组数组
		if(empty($_FILES)) return;
		$new = $this->resetArr();
		//2,过滤非法数据
		$newUp = $this->filterArr($new);
		//3,循环上传并传出文件名
		return $this->up($newUp);

		// return $up;//上传成功的文件信息，包括文件名 大小 上传后的存储路径
	}
	/*
	* 重组上传数组
	*/
	private function resetArr(){

		$new = array();											//新建一个数组
		foreach ($_FILES as $k => $v) {							//遍历$_FILES里的数据，如果键值不是数组那么直接压入
	// 不是多维，直接压入
			if (!is_array($v['name'])) {						//键值附给新数组
				$new[] = $v;
			}else{
	//是多维数组
				// 根据键名循环组合数组，压入另一个新数组		//如果键值是数组
				$temp=array();//新建一个数组
				// 遍历$v数组
				foreach ($v['name'] as $key => $value) {
					// 新数组的键名、键值
					$temp=array(
						'name' => $value,
						'type' => $v['type'][$key],
						'tmp_name' => $v['tmp_name'][$key],
						'error' => $v['error'][$key],
						'size' => $v['size'][$key]
					);
					$new[] =$temp;
				}
			}
		}
		return $new;
	}	

	/*
	* 重组上传数组
	*/
	private function filterArr($new){
		return $new;
	}
	/*
	* 执行循环上传
	*/
	private function up($new){
		$f_name=array();
		foreach ($new as $k => $v) {
			// 自定义上传目录
			$dir = C('UPLOAD_PATH').'/';  //文件上传目录为./upload/2015/1-2/
			// 确认目录是否存，不存在创建
			is_dir($dir) || mkdir($dir,0777,true);		  //如果目录不存在创建
			// 自定义文件名
			$file = time().$_SESSION['uid'];				  //自定义文件名
			//文件名后缀
			$end = strrchr($v['name'], '.');			  //文件名后缀.jpg
			//组合
			$str = $dir.$file.$end;						  //组合最终路径 homework\upload\2015\01-15\1.jpg
			// 执行上传操作
			$f_name[]=$file.$end;
			if (is_uploaded_file($v['tmp_name'])) {		  //判断是否是上传文件：是，上传！
				move_uploaded_file($v['tmp_name'], $str);
			}
		}
		return $f_name;
	}
}
 ?>