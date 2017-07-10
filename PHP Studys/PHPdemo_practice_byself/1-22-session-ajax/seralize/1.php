<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript" src="../ajax/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		function test(obj){
			//逐一获取表单信息，并且发送，麻烦
			username = $('input[name=username]').val();
			email = $('input[name=email]').val();
			age = $('input[name=age]').val();
			$.ajax({
				url:'./register.php',
				data:{username:username,email:email,age:age},
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
		<input type="submit" value="提交">
	</form>
</body>
</html>