<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript" src="../jquery-1.8.0.min.js"></script>
	<script type="text/javascript">

	</script>	
	<style type="text/css">
		.box{
			width:400px;
			min-height: 500px;
			margin:0 auto;
			border:1px solid #ccc;
			box-shadow: 4px 4px 4px red;
			position: relative;
		}
		.tip{
			position: absolute;
			width:100px;
			height: 100px;
			border:1px solid red;
			background: #fff;
		}
		.auto{

			width:400px;
			margin:0 auto;
			margin-top: 30px;
		}
	</style>	
</head>
<body style="margin-bottom:200px">
	<?php $wishs= require './db.php';?>
	<div class="box">
		<?php foreach($wishs as $w){?>
		<div class="tip" style="left:<?php echo mt_rand(0,300);?>px; top:<?php echo mt_rand(0,400)?>px">
			<p><?php echo $w['username']?> <span><?php echo $w['time'];?></span></p>
			<p><?php echo $w['content']?></p>
		</div>
		<?php }?>
	</div>

	<div class="auto">
		<!-- 阻止form提交行为 -->
		<!-- 1.action="javascript:;" -->
		<!-- 2, onsubmit="return false" -->
		<form action="" onsubmit="return false" id="form">
			姓名: <input type="text" name="username" id=""><br>
			留言： <textarea name="content" id="" cols="30" rows="10"></textarea><br>
			<input type="submit" value="留言" onclick="add();">
		</form>
	</div>
	<script type="text/javascript">
		function add(){
			formData = $('#form').serialize();//serialize() 方法通过序列化表单值，创建URL编码文本字符串。您可以选择一个或多个表单元素（比如 input 及/或 文本框），或者 form 元素本身。
			$.ajax({
				url:'./addMessage.php',
				data:formData,
				type:'post',
				dataType:'json',
				success:function(data){
					// alert(data.username);
					l = Math.random()*300;
					t = Math.random()*400;
					str='<div class="tip" style="left:'+l+'px; top:'+t+'px"><p>'+data.username+'<span>'+data.time+'</span></p><p>'+data.content+'</p></div>';
					$('.box').append(str);
				}
			});
		}
	</script>	
</body>
</html>