<?php /* Smarty version 2.6.26, created on 2015-04-17 15:56:49
         compiled from F:/Program+Files/wamp/www/PHPdemo_practice_byself/3-15wenda/Index/View/Mynews/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'F:/Program Files/wamp/www/PHPdemo_practice_byself/3-15wenda/Index/View/Mynews/index.html', 51, false),)), $this); ?>
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
/Css/member.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/common.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--------------------中部-------------------->
	<div id='center'>
<!-- 左侧 -->
<div id='left'>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => './left.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<ul class="list">
		<li class='myhome cur'>
			<a href="<?php echo @__APP__; ?>
?c=Mynews">我的首页</a>
		</li>
		<li class='myask'>
			<a href="">我的提问</a>
		</li>
		<li class='myanswer'>
			<a href="">我的回答</a>
		</li>
		<li class='mylevel'>
			<a href="">我的等级</a>
		</li>
		<li class='mygold'>
			<a href="">我的金币</a>
		</li>
		<li class='myface'>
			<a href="<?php echo @__APP__; ?>
?c=Mynews&a=my_face">上传头像</a>
		</li>

		<li style="background:none"></li>
	</ul>
</div>
<!-- 左侧结束 -->
		<div id='right'>
	
			<p class='title'>我的首页</p>

			<ul class='property'>
				<li>金币：<span><?php echo $this->_tpl_vars['user'][0]['exp']; ?>
</span></li>
				<li>经验值：<span><?php echo $this->_tpl_vars['user'][0]['point']; ?>
</span></li>
				<li>采纳率：<span><?php echo ((is_array($_tmp=$this->_tpl_vars['user'][0]['accept']/$this->_tpl_vars['user'][0]['answer']*100)) ? $this->_run_mod_handler('truncate', true, $_tmp, 5, '') : smarty_modifier_truncate($_tmp, 5, '')); ?>
%</span></li>
			</ul>
			<div class='list'>
				<p><span>我的提问 <b>(共<?php echo $this->_tpl_vars['user'][0]['ask']; ?>
条)</b></span><a href="">更多>></a></p>
				<table>
						<tr>
							<th class='t1'>标题</th>
							<th>回答数</th>
							<th class='t3'>更新时间</th>
						</tr>
					<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['ask']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['max'] = (int)10;
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
						<tr>
							<td class='t1'>
								<a href="<?php echo @__APP__; ?>
?c=show&asid=<?php echo $this->_tpl_vars['ask'][$this->_sections['n']['index']]['asid']; ?>
"><?php echo $this->_tpl_vars['ask'][$this->_sections['n']['index']]['content']; ?>
</a><span>[<?php echo $this->_tpl_vars['ask'][$this->_sections['n']['index']]['category']; ?>
]</span>
							</td>
							<td><?php echo $this->_tpl_vars['ask'][$this->_sections['n']['index']]['answer']; ?>
</td>
							<td class='t3'><?php echo $this->_tpl_vars['ask'][$this->_sections['n']['index']]['time']; ?>
</td>
						</tr>
					<?php endfor; endif; ?>
				</table>
			</div>
			<div class='list'>
				<p><span>我的回答 <b>(共<?php echo $this->_tpl_vars['user'][0]['answer']; ?>
条)</b></span><a href="">更多>></a></p>
				<table>

					<tr>
						<th class='t1'>标题</th>
						<th>回答</th>
						<th class='t3'>更新时间</th>
					</tr>

					<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['answer']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['max'] = (int)10;
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
						<tr>
							<td class='t1'>
								<a href="<?php echo @__APP__; ?>
?c=show&asid=<?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['asid']; ?>
"><?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['content']; ?>
</a><span>[<?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['category']; ?>
]</span>
							</td>
							<td><?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['answer']; ?>
</td>
							<td class='t3'><?php echo $this->_tpl_vars['answer'][$this->_sections['n']['index']]['time']; ?>
</td>
						</tr>
					<?php endfor; endif; ?>

				</table>
			</div>
		</div>
	</div>
<!--------------------中部结束-------------------->

<!--------------------底部-------------------->
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