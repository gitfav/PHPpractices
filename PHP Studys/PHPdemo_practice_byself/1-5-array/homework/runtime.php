<?php
	
	function runtime($flag){
		static $time = array();


		if(!isset($time[$flag])){

			$time[$flag] = microtime(true);

		}
		return $time[$flag];
	}


	runtime('first');
	for($i=0;$i<10000;$i++){
		$a = 1;
	}
	runtime('second');

	echo runtime('second')-runtime('first');echo "<br>";
	for($i=0;$i<10000;$i++){
		$a = 1;
	}
	echo runtime('third')-runtime('second');echo "<br>";
	echo runtime('third')-runtime('first');
?>