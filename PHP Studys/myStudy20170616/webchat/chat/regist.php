<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>web聊天_用户注册</title>
</head>

<body>

<form action="regist1.php" method="post">
<table id="table1">
	<tr>
		<td class="td1">昵称：</td>
		<td><input type="text"  name="nickname" /> *</td>
	</tr>

	<tr>
		<td class="td1">密码：</td>
		<td><input type="password" name="password" /> *</td>
	</tr>

	<tr>
		<td class="td1">确认密码：</td>
		<td><input type="password" name="password2" /> *</td>
	</tr>
	<tr>
		<td class="td1">性别：</td>
		<td><input type="radio" value='男' name="sex" checked="checked" />男  <input type="radio" value='女' name="sex" />女</td>
	</tr>
	<tr>
		<td class="td1">出生日期：</td>
		<td>
		<select name="yyyy">
		<?php
			for($i=2012;$i>1912;$i--){
				echo "<option value='{$i}'>$i</option>";
			}
		?>
		</select>年 
		<select name="mm">
		<?php
			for($i=1;$i<=12;$i++){
				echo "<option value='{$i}'>$i</option>";
			}
		?>
		</select>月 
		<select name="dd">
		<?php
			for($i=1;$i<=31;$i++){
				echo "<option value='{$i}'>$i</option>";
			}
		?>
		</select>日 
		</td>
	</tr>
	<tr>
		<td class="td1">居住地：</td>
		<td><input type="text" name="address" /></td>
	</tr>
	<tr>
		<td class="td1">问题提示：</td>
		<td><input type="text" name="question" /></td>
	</tr>
	<tr>
		<td class="td1">问题回答：</td>
		<td><input type="text" name="answer" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value=" 注册 " id="submit" /></td>
	</tr> 
</table>
</form>

</body>
</html>
