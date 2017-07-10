<?php 

	require_once"./functions.php";
	//设置时区  PRC东八区 为北京时间
	date_default_timezone_set("PRC");
	echo date_default_timezone_get(),"<hr>";

	//时间戳time()从1970-1-1 8:00到现在的秒数

	//time()返回当前的时间戳的秒数值。
	echo time(),"</br>";
	echo date('Y/m-d H:i:s',time()),"</br>";
	echo date("Y-m-d H:i:s",1000000000),'</br>';
	echo date("Y-m-d H:i:s"),'</br>';
	echo date("Y-m-d H:i:s",0);


	echo "<hr>";

	//microtime
	echo time(),'</br>';
	echo microtime(),'</br>';
	echo microtime(true),'</br>';
	echo microtime(false),'<hr>';





	$time=strtotime('2015-8-4 8:9:7');
	echo date('Y-m-d H:i:s',$time);

	p(getdate(time()));
	p(getdate($time));

	function runtime($b){
		static $d,$c;
		if ($b=='start') {
			$c=microtime(true);
		}
		elseif ($b=='end') {
			$d=microtime(true);
			return $d-$c;
		}
	}
	runtime('start');
	for($i=0;$i<1000000;$i++){
		$a=1;
	}
	echo runtime('end');


 ?>