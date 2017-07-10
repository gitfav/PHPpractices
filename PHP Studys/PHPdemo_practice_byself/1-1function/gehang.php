<?php
	$str="<table border=1>";
	$a=1;
	for ($i=1; $i <6 ; $i++) { 
		if ($a==0) {
			$str.="<tr>";
			$a=1;
		}
		else{
			$str.="<tr style='background-color:red'>";
			$a=0;
		}
		for ($j=1; $j <6; $j++) { 
			$str.="<td>";
			$str.=$j;
			$str.="</td>";
		}
		$str.="</tr>";
	}


	$str.="</table>";
	echo $str;
	$style="style='background-color:red;width:200px;height:150px;'";
	$stb="<div $style>";
	
	$stb.="</div>";
	echo $stb;
?>