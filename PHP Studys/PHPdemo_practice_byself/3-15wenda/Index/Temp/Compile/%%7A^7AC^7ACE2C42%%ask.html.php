<?php /* Smarty version 2.6.26, created on 2015-04-07 12:10:48
         compiled from F:/Program+Files/wamp/www/PHPdemo+practice+byself/3-15wenda/Index/View/Index/ask.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后盾问答</title>
	<meta name="keywords" content="后盾问答"/>
	<meta name="description" content="后盾问答"/>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/common.css" />
	<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/top-bar.js'></script>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/ask.css" />
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/common.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id='location'>
		<a href="">后盾问答</a>&nbsp;>&nbsp;提问
	</div>

<!--------------------中部-------------------->
	<div id='center'>
		<div class='send'>
			<div class='title'>
				<p class='left'>向亿万网友们提问</p>
				<p class='right'>您还可以输入<span id='num'>50</span>个字</p>
			</div>
			<form action="<?php echo @__APP__; ?>
?a=asked" method='post'>
				<div class='cons'>
					<textarea name="content"></textarea>
				</div>
				<div class='reward'>
					<span id='sel-cate' class='cate-btn'>选择分类</span>
					<ul>
						<li>
							我的金币：<span class='all_reward'><?php echo $this->_tpl_vars['user'][0]['exp']; ?>
</span>
						</li>
						<li>
					  悬赏：<select name="reward">
								<option value="0">0</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="50">50</option>
								<option value="80">80</option>
								<option value="100">100</option>
							</select>金币
						</li>
					</ul>
				</div>
				<input type='hidden' name='cid' value='0'/>
				<input type="submit" value='提交问题' class='send-btn'/>
			</form>
		</div>
	</div>
	<div id='category'>
		<p class='title'>
			<span>请选择分类</span>
			<a href="" class='close-window'></a>
		</p>
		<div class='sel'>
			<p>为您的问题选择一个合适的分类：</p>
			<select name="cate-one" size='16' class="cate-one">
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<option value="<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select>
			<select name="cate-one" size='16' class='hidden'></select>
			<select name="cate-one" size='16' class='hidden'></select>
		</div>
		<p class='bottom'>
			<span id='ok'>确定</span>
		</p>
	</div>
	<script type="text/javascript">
		$('select[name=reward]').change(function() {
			// alert(<?php echo $this->_tpl_vars['user'][0]['exp']; ?>
);
			if(<?php echo $this->_tpl_vars['user'][0]['exp']; ?>
<$(this).val()){
				alert('你没有足够的金币！');
				$(this).val(0);
			}
		});
			
		$('select[name=cate-one]').change(function() {//change为当前文本域内容发生改变时发生的事件。
			var obj=$(this);//取出当前对象
			var number=$(this).val();
			var str='';
			$.ajax({//ajax在整个函数运行完才执行。
				url: '<?php echo @__APP__; ?>
?a=ajax_cid',
				type: 'post',
				dataType: 'json',
				data: {id: number},
				success:function(data){//ajax的数据无法输出可以用函数内全局变量，但无法输出全局变量?
					// alert(data);
					$.each(data, function(i, v) {
						str+= '<option value="'+v.cid+'">'+v.title+'</option>'
					});
					// alert(str);
					obj.next().html(str).show();
				}
			})
			// alert(str);//此str是空值
			$('input[name=cid]').val(number);
			// alert($('input[name=cid]').val());
		});
		$('#ok').click(function() {
			$('#category').fadeOut(300);
			$('#background').hide();
		});

	</script>
<!--------------------中部结束-------------------->

<!-- 底部 -->
	<div id='bottom'>
		<p>Copyright © 2013 Qihoo.Com All Rights Reserved 后盾网</p>
		<p>京公安网备xxxxxxxxxxxx</p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>
<!-- 底部结束 -->