<?php /* Smarty version 2.6.26, created on 2015-03-15 22:33:02
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'index.html', 9, false),array('modifier', 'date_format', 'index.html', 13, false),array('modifier', 'upper', 'index.html', 14, false),array('modifier', 'lower', 'index.html', 14, false),array('modifier', 'truncate', 'index.html', 15, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>无标题</title>
</head>
<body>
	<?php echo $this->_tpl_vars['data']['username']; ?>
<br>
	<?php echo ((is_array($_tmp=@$_GET['id'])) ? $this->_run_mod_handler('default', true, $_tmp, '没有get参数！') : smarty_modifier_default($_tmp, '没有get参数！')); ?>
<br>
	<?php echo $_SESSION['uid']; ?>
<br>
	<!-- 输出常量 -->
	<?php echo @ROOT; ?>
<br>
	<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%y-%m-%d %H:%M')); ?>
<br>
	<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['word'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
<br>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['word'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 3, '') : smarty_modifier_truncate($_tmp, 3, '')); ?>
<br>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['chinese'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 9, '') : smarty_modifier_truncate($_tmp, 9, '')); ?>
<br>
	<?php echo $this->_tpl_vars['arr']['web']['name']; ?>
<br>
	<?php if ($this->_tpl_vars['arr']['web']['name'] == 'html' && $this->_tpl_vars['address'] == '美国'): ?>
		<p>努力学习html</p>
	<?php else: ?>
		<p>暂时未在<?php echo $this->_tpl_vars['address']; ?>
找到html</p>
	<?php endif; ?>
	<table border="1" cellpadding="" cellspacing="">
	<?php $_from = $this->_tpl_vars['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>		
			<tr>
				<td><?php echo $this->_tpl_vars['v']['asid']; ?>
</td><td><?php echo $this->_tpl_vars['v']['content']; ?>
</td>
			</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</body>
</html>