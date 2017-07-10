<?php

	echo"<table border=1>";
	for ($i=1; $i<=9; $i++) { 
		echo"<tr>";
		for ($j=1; $j <=$i; $j++) { 
			echo "<td>";
			echo $i."x".$j.'='.$i*$j;
			echo "</td>";
		}
		echo"</tr>";
	}

	echo"<table>";


	//或者用变量统一输出。
	$str="<table border=1>";
	for ($i=1; $i<=9; $i++) { 
		$str.="<tr>";
		for ($j=1; $j <=$i; $j++) { 
			$str.= "<td>";
			$str.= $i."x".$j.'='.$i*$j;
			$str.= "</td>";
		}
		$str.= "</tr>";
	}

	$str.= "<table>";

	echo $str;


?>