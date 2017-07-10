<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript" src="../ajax/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		function test(obj){
			//逐一获取表单信息，并且发送，麻烦
			postData = $(obj).serialize();
			$.ajax({
				url:'./register.php',
				data:postData,
				type:'post',
				success:function(data){
					alert(data);
				}
			})
			return false;
		}
	</script>	
</head>
<body>
	<form action="" onsubmit="return test(this)">
		姓名: <input type="text" name="username" id=""><br>
		邮箱: <input type="text" name="email" id=""><br>
		年龄: <input type="text" name="age" id=""><br>
		性别: <input type="radio" name="sex" value="男"> 男 
		<input type="submit" value="提交">
	</form>
</body>
</html>