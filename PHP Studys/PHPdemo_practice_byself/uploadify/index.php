<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="./jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
	<h1>上传 Demo</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>
	<button class="start">开始</button>
	<div class="show"></div>
<!-- 	<img src="./uploads/1.jpg" alt=""> -->
	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : './uploadify.swf',
				'uploader' : './upload/uploadify.php',
				'auto' : false,//是否自动上传
				'buttonText' : '上传头像',//改变按钮文字
				'width' : '100',
				'height' : '50',
				'cancelImg': './uploadify-cancel.png',
				'onUploadSuccess' : function(file,data,response){
					html="<p><img src='"+data+"'></p>";//data为后台调来的图片路径
					$('.show').append(html);
				}
			});


		});
		$('.start').click(function() {
			$('#file_upload').uploadify('upload','*');
		});
	</script>
</body>
</html>