<?php

//获得磁盘分区大小

$total = disk_total_space('D:');

echo $total;

echo "<hr>";

$freeSpace = disk_free_space('D:');

// echo $freeSpace;

// KB pow(1024,1)
// MB pow(1024,2)
// GB pow(1024,3)
function getDiskSpace($total){
	$unit = $total/pow(1024,3)>=1 ? array('3','G') : ($total/pow(1024,2)>=1 ? array('2','MB') : array('1','KB'));
	
	return round($total/pow(1024,$unit[0]),2).$unit[1];
}


function getDiskSpace($total){
	if($total/pow(1024,3)>=1){

		$unit = array(3,'G');
		
	}else if($total/pow(1024,2)>=1){
		$unit = array(2,'M');
	}else{
		$unit = array(1,'KB');
	}
	return round($total/pow(1024,$unit[0]),2).$unit[1];
}


echo getDiskSpace($total);



?>