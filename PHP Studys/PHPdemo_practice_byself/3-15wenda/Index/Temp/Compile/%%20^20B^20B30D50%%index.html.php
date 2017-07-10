<?php /* Smarty version 2.6.26, created on 2015-04-07 13:03:25
         compiled from F:/Program+Files/wamp/www/PHPdemo+practice+byself/3-15wenda/Index/View/List/index.html */ ?>
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
/Css/list.css" />
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/common.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id='location'>
		<a href="<?php echo @__APP__; ?>
?c=list">全部分类</a>
		<?php if ($this->_tpl_vars['set'] == 1): ?>
		     <?php if ($this->_tpl_vars['length'] > 1): ?>
			<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['f_arr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['start'] = (int)1;
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
if ($this->_sections['n']['start'] < 0)
    $this->_sections['n']['start'] = max($this->_sections['n']['step'] > 0 ? 0 : -1, $this->_sections['n']['loop'] + $this->_sections['n']['start']);
else
    $this->_sections['n']['start'] = min($this->_sections['n']['start'], $this->_sections['n']['step'] > 0 ? $this->_sections['n']['loop'] : $this->_sections['n']['loop']-1);
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = min(ceil(($this->_sections['n']['step'] > 0 ? $this->_sections['n']['loop'] - $this->_sections['n']['start'] : $this->_sections['n']['start']+1)/abs($this->_sections['n']['step'])), $this->_sections['n']['max']);
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
				&gt;&nbsp;<a href="<?php echo @__APP__; ?>
?c=list&cid=<?php echo $this->_tpl_vars['f_arr'][$this->_sections['n']['index']]['cid']; ?>
">
						<?php echo $this->_tpl_vars['f_arr'][$this->_sections['n']['index']]['title']; ?>

					</a>&nbsp;&nbsp;
			<?php endfor; endif; ?>
		     <?php endif; ?>
			&gt;&nbsp;<a href="<?php echo @__APP__; ?>
?c=list&cid=<?php echo $this->_tpl_vars['f_arr'][0]['cid']; ?>
"><?php echo $this->_tpl_vars['f_arr'][0]['title']; ?>
</a>&nbsp;&nbsp;
		<?php endif; ?>
		
	</div>

<!--------------------中部-------------------->
	<div id='center'>
		<div id='left'>
			<div id='cate-list'>
				<p class='title'>按分类查找</p>
				<ul>	
				<?php if ($this->_tpl_vars['set'] == 1): ?>
					<?php $_from = $this->_tpl_vars['s_p_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<li>
						<a href="<?php echo @__APP__; ?>
?c=list&cid=<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</a>
					</li>
					<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>
					<?php $_from = $this->_tpl_vars['all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<li>
						<a href="<?php echo @__APP__; ?>
?c=list&cid=<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</a>
					</li>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
				</ul>
			</div>
			<div id='answer-list'>
				<ul class='ans-sel' id="ans-sel">
					<li class='on'>
						<a href="javascript:void(0)">待解决问题</a>
					</li>
					<li >
						<a href="javascript:void(0)">已解决</a>
					</li>
					<li >
						<a href="javascript:void(0)">高悬赏</a>
					</li>
					<li >
						<a href="javascript:void(0)">零回答</a>
					</li>
				</ul>
				<script type="text/javascript">

					$('#ans-sel li').click(function() {
						$(this).attr('class', 'on').siblings().attr('class', '');
						number=$(this).index();
						$.ajax({
							url:'<?php echo $this->_tpl_vars['samrty']['const']['__APP__']; ?>
?c=list&a=select&cid=<?php echo $_GET['cid']; ?>
',
							data:{w:number},
							type:'POST',
							dataType:'json',
							success:function(data){
								// alert(data);
								//移除原来的元素
								$('tr').remove('#t2');
								for (var i = 0; i < data.length; i++) {
									// alert(data[i]['content']);
									var time=data[i]['time'];

                                                                                                           str='<tr id="t2"><td class="t1 cons"><a href="<?php echo @__APP__; ?>
?c=show&asid='+data[i]['asid']+'"><b>'+data[i]['reward']+'</b>'+data[i]['content']+'</a>&nbsp;&nbsp;['+data[i]['tit']+']</td><td>'+data[i]['answer']+'</td><td>'+time+'</td></tr>';

									$('#t1').after(str);
									// alert(str);
								};		
							}
						})
					});
					//自动在此元素执行操作
					$('.on').trigger('click');
				</script>
				<!-- 待解决问题 -->
				<table id="wenti">
					<tr id="t1">
						<th class='t1'>标题</th>
						<th>回答数</th>
						<th>时间</th>
					</tr>

						<!-- <tr id="t2">
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr>

						<tr id="t2">
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr>
						<tr id="t2">
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr>
						<tr id="t2">
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr> -->

					<tr class='page'>
						<td colspan='3'>
							<a href="">1</a>
							<a href="">2</a>
							<a href="">3</a>
						</td>
					</tr>
				</table>

			</div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/right.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
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