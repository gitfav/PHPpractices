<?php /* Smarty version 2.6.26, created on 2015-04-15 19:24:52
         compiled from F:/Program+Files/wamp/www/PHPdemo_practice_byself/3-15wenda/Index/View/Index/index.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后盾问答</title>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/common.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<meta name="keywords" content="后盾问答"/>
	<meta name="description" content="后盾问答"/>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/common.css" />
	<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/top-bar.js'></script>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/index.css" />
	<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/index.js'></script>
</head>
<body>
	
	<div class='main'>
		<div id='left'>
			<p class='left-title'>所有问题分类</p>
			<ul class='left-list'>
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<li class='list-l1'>
					<div class='list-l1-wrap'>
						<h4><a href="<?php echo @__APP__; ?>
?c=list&cid=<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</a></h4>
						<ul class='list-l2'>
							<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['v']['son']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['max'] = (int)3;
$this->_sections['n']['show'] = true;
if ($this->_sections['n']['max'] < 0)
    $this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
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
							<li><a href="<?php echo @__APP__; ?>
?c=list&cid=<?php echo $this->_tpl_vars['v']['son'][$this->_sections['n']['index']]['cid']; ?>
"><?php echo $this->_tpl_vars['v']['son'][$this->_sections['n']['index']]['title']; ?>
</a></li>
							<?php endfor; endif; ?>
						</ul>
					</div>
					<div class='list-more hidden'>
						<ul>
							<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['v']['son']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['start'] = (int)3;
$this->_sections['n']['max'] = (int)6;
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
								<li><a href="<?php echo @__APP__; ?>
?c=list&cid=<?php echo $this->_tpl_vars['v']['son'][$this->_sections['n']['index']]['cid']; ?>
"><?php echo $this->_tpl_vars['v']['son'][$this->_sections['n']['index']]['title']; ?>
</a></li>
							<?php endfor; endif; ?>
						</ul>
					</div>
				</li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>

		<div id='center'>
			<div id='animate'>
				<div class='imgs-wrap'>
					<ul>
						<li>
							<a href=""><img src="<?php echo @__PUBLIC__; ?>
/Images/animate1.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="<?php echo @__PUBLIC__; ?>
/Images/animate2.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="<?php echo @__PUBLIC__; ?>
/Images/animate3.jpg" width='558' height='190'/></a>
						</li>
					</ul>
				</div>
				<ul class='ani-btn'>
					<li class='ani-btn-cur'>0学费学习<i></i></li>
					<li>超百G原创视频<i></i></li>
					<li style='border:none'>有实力做后盾<i></i></li>
				</ul>
			</div>

			<dl class='answer-list'>
				<dt>
					<span class='wait-as'>待解决问题</span>
					<a href=''>更多>></a>
				</dt>
				<?php $_from = $this->_tpl_vars['no_solve']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<dd>
					<a href="<?php echo @__APP__; ?>
?c=show&asid=<?php echo $this->_tpl_vars['v']['asid']; ?>
"><?php echo $this->_tpl_vars['v']['content']; ?>
</a>
					<span><?php echo $this->_tpl_vars['v']['answer']; ?>
回答</span>
				</dd>
				<?php endforeach; endif; unset($_from); ?>
			</dl>

			<dl class='answer-list'>
				<dt>
					<span class='reward-as'>高分悬赏问题</span>
					<a href=''>更多>></a>
				</dt>
				<?php $_from = $this->_tpl_vars['h_reward']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<dd>
					<a href="<?php echo @__APP__; ?>
?c=show&asid=<?php echo $this->_tpl_vars['v']['asid']; ?>
"><b><?php echo $this->_tpl_vars['v']['reward']; ?>
</b><?php echo $this->_tpl_vars['v']['content']; ?>
</a>
					<span><?php echo $this->_tpl_vars['v']['answer']; ?>
回答</span>
				</dd>
				<?php endforeach; endif; unset($_from); ?>
			</dl>

		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/right.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
<!--------------------内容主体结束-------------------->
	<div class='clear'></div>
	
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