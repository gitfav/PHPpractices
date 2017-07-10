<?php
	var_dump($_POST);
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		table tr td{
			padding: 5px 5px;

		}
	</style>
	<script type="text/javascript" src="../jquery-1.7.2.min.js"></script>	
	<script type="text/javascript">
		$(function(){
			num1 = '';
			$('.n').click(function(){
				n = $(this).html();
				num1 += n;
				$('[name="num1"]').val(num1);
			})

			$('.o').click(function(){
				$('[name="num"]').val(num1);
				opt = $(this).html();
				$('[name="opt"]').val(opt);
				num1='';
			})
		})
		
	</script>	

</head>
<body>
	<form action="" method="post">
		<input type="text" name="num1" id="">
		<input type="text" name="num" id="">
		<input type="text" name="opt" id="">
		<table border='1'>
			<tr>
				<td class="n">1</td>
				<td class="n">2</td>
				<td class="n">3</td>
				<td class="o">+</td>
			</tr>
			<tr>
				<td class="n">4</td>
				<td class="n">5</td>
				<td class="n">6</td>
				<td class="o">-</td>
			</tr>
			<tr>
				<td class="n">7</td>
				<td class="n">8</td>
				<td class="n">9</td>
				<td class="o">*</td>
			</tr>
			<tr>
				<td>.</td>
				<td class="n">0</td>
				<td><input type="submit" value="="></td>
				<td>/</td>
			</tr>
		</table>
	</form>
</body>
</html>	