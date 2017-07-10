<?php /* Smarty version 2.6.26, created on 2015-05-03 21:16:35
         compiled from F:/Program+Files/wamp/www/PHPdemo_practice_byself/3-15wenda/Index/View/Show/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'F:/Program Files/wamp/www/PHPdemo_practice_byself/3-15wenda/Index/View/Show/index.html', 74, false),)), $this); ?>
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
/Css/question.css" />
	<script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/Js/question.js"></script>
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
	<div id='center-wrap'>
		<div id='center'>
			<div id='left'>
				<div id='answer-info'>
					<!-- 如果没有解决用wait -->
					<div class='ans-state wait'></div>
					<div class='answer'>
						<p class='ans-title'><?php echo $this->_tpl_vars['ask'][0]['content']; ?>

							<b class='point'><?php echo $this->_tpl_vars['ask'][0]['reward']; ?>
</b>
						</p>
					</div>
					<ul>
						<li><a href=""><?php echo $this->_tpl_vars['ask'][0]['username']; ?>
</a></li>
						<li><i class='level lv1' title='Level 1'></i></li>
						<li><?php echo $this->_tpl_vars['ask'][0]['time']; ?>
</li>
				
					</ul>
					<div class='ianswer'>
						<form action="<?php echo @__APP__; ?>
?c=show&a=answer&asid=<?php echo $this->_tpl_vars['ask'][0]['asid']; ?>
" method='POST'>
							<p>我来回答</p>
							<textarea name="content"></textarea>
							<input type="hidden" name='qid' value=''>
							<input type="submit" value='提交回答' id='anw-sub'/>
						</form>
					</div>
					<!-- 满意回答 -->
					<div class='ans-right'>
						<p class='title'><i></i>满意回答<span></span></p>
						<?php $_from = $this->_tpl_vars['answer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
							<?php if ($this->_tpl_vars['v']['accept'] > 0): ?>
								<p class='ans-cons'><?php echo $this->_tpl_vars['v']['content']; ?>
</p>
								<dl>
									<dt>
										<a href=""><?php if ($this->_tpl_vars['v']['face'] == ''): ?>
										<img src="<?php echo @__PUBLIC__; ?>
/Images/noface.gif" width='48' height='48'/>
										<?php else: ?>
										<img src="<?php echo $this->_tpl_vars['v']['face']; ?>
" alt="" />
										<?php endif; ?></a>
									</dt>
									<dd>
									<a href=""><?php echo $this->_tpl_vars['v']['username']; ?>
</a>
									</dd>
									<dd><i class='level lv1'></i></dd>
									<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['accept']/$this->_tpl_vars['ask'][0]['answer']*100)) ? $this->_run_mod_handler('truncate', true, $_tmp, 5, '') : smarty_modifier_truncate($_tmp, 5, '')); ?>
%</dd>
								</dl>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						<!-- <p class='ans-cons'>很不错！</p>
						<dl>
							<dt>
								<a href=""><img src="./Images/noface.gif" width='48' height='48'/></a>
							</dt>
							<dd>
								<a href="">用户</a>
							</dd>
							<dd><i class='level lv1'></i></dd>
							<dd>20%</dd>
						</dl> -->
					</div>
					<!-- 满意回答 -->
				</div>

				<div id='all-answer'>
					<div class='ans-icon'></div>
					<p class='title' id="title">共 <strong><?php echo $this->_tpl_vars['all_le']; ?>
</strong> 条回答</p>
					<?php unset($this->_sections['c']);
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['le']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<ul id="ul_an" class="ul_an">
					<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['answer']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['start'] = (int)$this->_tpl_vars['le'][$this->_sections['c']['index']]*3;
$this->_sections['n']['max'] = (int)3;
$this->_sections['n']['show'] = true;
if ($this->_sections['n']['max'] < 0)
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
						<li id="answer">
							<div class='face'>
								<a href="">

								<?php if ($this->_tpl_vars['answer'][$this->_sections['n']['index']]['face'] == ''): ?>
									<img src="<?php echo @__PUBLIC__; ?>
/Images/noface.gif" width='48' height='48'/>
								<?php else: ?>
									<img src="<?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['face']; ?>
" alt="" />
								<?php endif; ?>
								</a>
							</div>
							<div class='cons blue'>
								<p><?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['content']; ?>
<span style='color:#888;font-size:12px'>&nbsp;&nbsp;<?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['time']; ?>
</span></p>
							</div>
								<?php if ($_SESSION['uid'] == $this->_tpl_vars['ask'][0]['uid']): ?>
								<?php if ($this->_tpl_vars['ask'][0]['solve'] == 0): ?>
								<a href="<?php echo @__APP__; ?>
?c=show&a=accept&anid=<?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['anid']; ?>
" class='adopt-btn'>采纳</a>
								<?php endif; ?>
								<?php endif; ?>
						</li>
					<?php endfor; endif; ?>
						<!-- <li>
							<div class='face'>
								<a href="">
									<img src="./Images/noface.gif" width='48' height='48'/>
								</a>
							</div>
							<div class='cons blue'>
								<p>真不错啊！<span style='color:#888;font-size:12px'>&nbsp;&nbsp;(1900.1.1)</span></p>
							</div>
							
								<a href="" class='adopt-btn'>采纳</a>
							
						</li> -->
					</ul>
					<?php endfor; endif; ?>
					<div class='page'>
						<?php echo $this->_tpl_vars['str']; ?>

					</div>
					<script type="text/javascript">
						$('.page a').click(function() {
							number=$(this).index();
							// alert(number);
							$('.ul_an').eq(number).css('display', 'block').siblings('.ul_an').css('display', 'none');
							//id是一个元素在整个源代码中独一无二的属性，id返回一个元素，class返回1个或更多元素。
						});
						$('.page a').eq(0).trigger('click');
					</script>
				</div>
				<div id='other-ask'>
					<p class='title'>待解决的相关问题</p>
					<table>
						<tr>
							<td class='t1'><a href="">什么牌子电脑好？</a></td>
							<td>20&nbsp;回答</td>
							<td>1900.1.1</td>
						</tr>
					</table>
				</div>
			</div>
		<!-- 右侧 -->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/right.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- ---右侧结束---- -->
			
		</div>

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