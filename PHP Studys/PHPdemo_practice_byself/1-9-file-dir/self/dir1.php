<?php
	
	$total=disk_total_space('D:');
	echo $total,'</br>';
	$free=disk_free_space('D:');
	echo $free,'</br>';

	// echo $freeSpace;

	// KB pow(1024,1)
	// MB pow(1024,2)
	// GB pow(1024,3)
	function getDiskSpace($total){
		$unit=$total/pow(1024,3)>=1?array(3,'G'):($total/pow(1024, 2)>=1?array(2,'M'):array(1,'K'));
		return round($total/pow(1024, $unit[0]),2).$unit[1];
	}

	echo getDiskSpace($total);


?>