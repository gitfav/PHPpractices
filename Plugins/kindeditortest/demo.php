<?php
	$htmlData = '';
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['content1']);
		} else {
			$htmlData = $_POST['content1'];
		}
	}
	var_dump($htmlData);
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>KindEditor PHP</title>
	<link rel="stylesheet" href="./kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="./kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="./kindeditor/kindeditor-all-min.js"></script>
	<script charset="utf-8" src="./kindeditor/lang/zh-CN.js"></script>
	<script charset="utf-8" src="./kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : './kindeditor/plugins/code/prettify.css',
				uploadJson : './kindeditor/upload/upload_json.php',
				fileManagerJson : './kindeditor/upload/file_manager_json.php',
				minWidth : '375px',
				width : '375px',
				height : '600px',
				items : ['source', '|', 'undo', 'redo', '|', 'preview', 'cut', 'copy', 'paste',
                         'plainpaste', 'wordpaste', '|', '/' , 'justifyleft', 'justifycenter', 'justifyright',
                         'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                         'superscript', 'clearhtml', 'quickformat', 'selectall', '|','/', 
                         'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                         'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', '/' , 'image', 'multiimage',
                         'media' , 'table', 'hr', 'emoticons', 'pagebreak',
                         'link', 'unlink',],
                htmlTags : {
                	        section : ['style'],
                            font : ['color', 'size', 'face', '.background-color'],
                            span : [
                                    '.color', '.background-color', '.font-size', '.font-family', '.background',
                                    '.font-weight', '.font-style', '.text-decoration', '.vertical-align', '.line-height'
                            ],
                            div : [
                                    'align', '.border', '.margin', '.padding', '.text-align', '.color',
                                    '.background-color', '.font-size', '.font-family', '.font-weight', '.background',
                                    '.font-style', '.text-decoration', '.vertical-align', '.margin-left'
                            ],
                            table: [
                                    'border', 'cellspacing', 'cellpadding', 'width', 'height', 'align', 'bordercolor',
                                    '.padding', '.margin', '.border', 'bgcolor', '.text-align', '.color', '.background-color',
                                    '.font-size', '.font-family', '.font-weight', '.font-style', '.text-decoration', '.background',
                                    '.width', '.height', '.border-collapse'
                            ],
                            'td,th': [
                                    'align', 'valign', 'width', 'height', 'colspan', 'rowspan', 'bgcolor',
                                    '.text-align', '.color', '.background-color', '.font-size', '.font-family', '.font-weight',
                                    '.font-style', '.text-decoration', '.vertical-align', '.background', '.border'
                            ],
                            a : ['href', 'target', 'name'],
                            embed : ['src', 'width', 'height', 'type', 'loop', 'autostart', 'quality', '.width', '.height', 'align', 'allowscriptaccess'],
                            img : ['src', 'width', 'height', 'border', 'alt', 'title', 'align', '.width', '.height', '.border'],
                            'p,ol,ul,li,blockquote,h1,h2,h3,h4,h5,h6' : [
                                    'align', '.text-align', '.color', '.background-color', '.font-size', '.font-family', '.background',
                                    '.font-weight', '.font-style', '.text-decoration', '.vertical-align', '.text-indent', '.margin-left'
                            ],
                            pre : ['class'],
                            hr : ['class', '.page-break-after'],
                            'br,tbody,tr,strong,b,sub,sup,em,i,u,strike,s,del' : []
                        },
                resizeType : 1,
                newlineTag : 'br',
                // filterMode: false,//是否开启过滤模式
                // themeType : 'simple',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
	<form name="example" method="post" action="demo.php">
		<textarea name="content1" style="width:700px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
		<br />
		<input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
	</form>
	<?php echo $htmlData; ?>
</body>
</html>

