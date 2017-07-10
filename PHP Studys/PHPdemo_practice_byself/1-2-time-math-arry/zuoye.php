1. 写一个计算脚本运行时间的函数

   function runtime($flag){
   		static $time = array();

   		$time[$flag] = microtime(true);
   		//isset($time[$flag])
	}

2,写一个递归转化数组键名大小写的函数 


3,练习用var_export()  、file_put_contents 函数写数据库文件