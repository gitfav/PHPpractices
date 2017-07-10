<?php /* Smarty version 2.6.26, created on 2015-03-12 22:34:49
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'css', 'index.html', 2, false),array('modifier', 'truncate_w', 'index.html', 47, false),array('block', 'arclist', 'index.html', 55, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'head.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_css(array('file' => './template/css/public.css'), $this);?>

<!-- 创建了一个css的函数 -->

<table border="1" cellpadding="" cellspacing="">
<tr>
	<th>id</th><th>content</th><th>操作</th>
</tr>
<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['rows']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['start'] = (int)0;
$this->_sections['n']['max'] = (int)10;
$this->_sections['n']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['n']['show'] = true;
if ($this->_sections['n']['max'] < 0)
    $this->_sections['n']['max'] = $this->_sections['n']['loop'];
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
	<?php if ($this->_sections['n']['first']): ?>
		<tr style="color:red;">
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['asid']; ?>
</td>
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['content']; ?>
</td>
			<td><a href="">操作</a><a href="">删除</a></td>
		</tr>
	<?php else: ?>
		<tr>
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['asid']; ?>
</td>
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['content']; ?>
</td>
			<td><a href="">操作</a><a href="">删除</a></td>
		</tr>
	<?php endif; ?>
<?php endfor; endif; ?>
</table>

<table border="1" cellpadding="" cellspacing="">
<tr>
	<th>id</th><th>content</th><th>操作</th>
</tr>
<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['rows']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
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
	<?php if ($this->_sections['n']['index'] < 5 && $this->_sections['n']['index'] > 0): ?>
		<tr style="color:red;">
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['asid']; ?>
</td>
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['content']; ?>
</td>
			<td><a href="">操作</a><a href="">删除</a></td>
		</tr>
	<?php else: ?>
		<tr>
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['asid']; ?>
</td>
			<td><?php echo $this->_tpl_vars['rows'][$this->_sections['n']['index']]['content']; ?>
</td>
			<td><a href="">操作</a><a href="">删除</a></td>
		</tr>
	<?php endif; ?>
<?php endfor; endif; ?>
</table>
<hr />
	<?php echo ((is_array($_tmp=$this->_tpl_vars['words'])) ? $this->_run_mod_handler('truncate_w', true, $_tmp, 3, '') : smarty_modifier_truncate_w($_tmp, 3, '')); ?>

	<!-- 自己创建的 自定义 变量调节器 名为truncate_w -->
<hr />

<table border="1" cellspacing="" cellpadding="">
<tr>
		<th>id</th><th>content</th><th>操作</th>
</tr>
<?php $this->_tag_stack[] = array('arclist', array('cid' => 1,'rows' => 4)); $_block_repeat=true;smarty_block_arclist($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<tr>
		<td>[$field.asid]</td>
		<td>[$field.content]</td>
		<td><a href="">操作</a><a href="">删除</a></td>
	</tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_arclist($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</table>

<table border="1" cellpadding="" cellspacing="">
<tr><th>用户名</th></tr>
	<?php $_from = $this->_tpl_vars['userInfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['v']['username']; ?>
</td>
		</tr>


	<?php endforeach; endif; unset($_from); ?>
</table>