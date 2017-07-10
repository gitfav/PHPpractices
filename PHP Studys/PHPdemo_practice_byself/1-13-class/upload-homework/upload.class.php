<?php 

	class upload{
		private $size;
		private $type;
		private $path;
		private $error;
		//得到上传的条件
		public function __construct($size=null,$type=null,$path=null){
			$this->size=is_null($size)? C('UPLOAD_SIZE'):$size;
			$this->path=is_null($path)? C('UPLOAD_PATH'):$path;
			$this->type=is_null($type)? C('UPLOAD_ALLOW_TYPE'):$type;
		}

		private function Arronload(){
			
			$new=array();	//重装数组
			foreach ($_FILES as $k => $v) {
				if (!is_array($v['name'])) {
					// if (empty($v)) {continue;}
					$new[]=$v;
				}
				else{
					$mid=array();
					foreach ($v['name'] as $ke => $va) {
						// if (empty($va)) {continue;}
						$mid=array(
							'name' => $va,
							'tmp_name' => $v['tmp_name'][$ke],
							'type' => $v['type'][$ke],
							'error' => $v['error'][$ke],
							'size' => $v['size'][$ke],
						);
						$new[] = $mid;
					}
				}
			}
			return $new;
		}
		//提取分离关于错误信息与正确信息。
		private function right_error($file){
			$arr=array();
			foreach ($file as $k => $v) {
				$ext=ltrim(strrchr($v['name'], '.'),'.');
				switch (true) {
					case $v['error']==1:
						$b='大小超过了 php.ini 中 upload_max_filesize 限制值';
						$v['errorMsg']=$b;
						$this->error[]=$v;
						break;
					case $v['error']==2:
						$b='大小超过 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
						$v['errorMsg']=$b;
						$this->error[]=$v;
						break;
					case $v['error']==3:
						$b='文件只有部分被上传。';
						$v['errorMsg']=$b;
						$this->error[]=$v;
						break;
					case $v['error']==4:
						$b='没有文件被上传';
						$v['errorMsg']=$b;
						$this->error[]=$v;
						break;
					case $v['size']>$this->size:
						$b='上传文件大小超出框架设置';
						$v['errorMsg']=$b;
						$this->error[]=$v;
						break;
					case !in_array($ext, $this->type):
						$b='上传类型不合法';
						$v['errorMsg']=$b;
						$this->error[]=$v;
						break;
					default: 
						$arr[]=$v;
						break;
				}
			}
			return $arr;
		}

		private function up($file){
			foreach ($file as $ke => $va) {
				$dir=$this->path.'/'.date('Ymd').'/';
				is_dir($dir) || mkdir($dir,0777,true);
				$filename=time().mt_rand(0,10000).'.'. ltrim(strrchr($va['name'],'.'),'.');
				$fullname=$dir.$filename;
				if (is_uploaded_file($va['tmp_name'])) {
					move_uploaded_file($va['tmp_name'], $fullname);
				}
			}
		}

		//返回错误的信息
		public function mt_error(){
			return $this->error;
		}



		public function zong(){
			$new=$this->Arronload();
			$data=$this->right_error($new);
			$this->up($new);
			return $data;
		}


	}

 ?>