<?php 

	$num1=isset($_POST['num1'])?$_POST['num1']:0;
	$num2=isset($_POST['num2'])?$_POST['num2']:0;
	$fuhao=isset($_POST['fuhao'])?$_POST['fuhao']:0;
	// var_dump($fuhao);
	if ($fuhao=="+") {
		$all=($num1+$num2);
	}
	else if ($fuhao=='-') {
		$all=($num1-$num2);
	}
	elseif ($fuhao=='*') {
		$all=($num1*$num2);
	}
	elseif ($fuhao=='/') {
		$all=($num1/$num2);
	}
	else {
		unset($all);
	}
	echo $all;

 ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>无标题</title>
</head>
<body>

<form action="" method="post">
	<input type="text" name="num1">

	<select name="fuhao" id="" >
		<option value="+">+</option>
		<option value="-">-</option>
		<option value="*">*</option>
		<option value="/">/</option>
	</select>


	<input type="text" name="num2">
	<input type="submit" value="=">
</form>

</body>
</html>