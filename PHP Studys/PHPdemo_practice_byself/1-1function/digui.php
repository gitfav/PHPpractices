<?php

	function digui($num){
		
		if ($num>1) {
			$re=$num*digui($num-1);
		}
		else {
			$re=1;
		}
		return $re;
	}

	echo digui(1),'</br>';
	echo digui(4);

?>