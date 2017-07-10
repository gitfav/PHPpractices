<?php /* Smarty version 2.6.26, created on 2015-04-07 17:23:36
         compiled from ./left.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', './left.html', 29, false),)), $this); ?>
<!-- 左侧 -->
		<div class='userinfo'>
			<dl>
				<dt>
				<?php if ($this->_tpl_vars['user'][0]['face'] == ''): ?>
					<a href=""><img src="<?php echo @__PUBLIC__; ?>
/Images/profile_avatar.jpg" width='48' height='48' alt="占位符"/></a>
				<?php else: ?>
					<a href=""><img src="<?php echo $this->_tpl_vars['user'][0]['face']; ?>
" width='48' height='48' alt="占位符"/></a>
				<?php endif; ?>
				</dt>
				<dd class='username'>
					<a href=""><b>后盾网</b>
					</a>
					<a href="">
						<i class='level lv1' title='Level 1'></i>
					</a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;"><b class='point'><?php echo $this->_tpl_vars['user'][0]['exp']; ?>
</b></a></dd>
				<dd>经验值：<?php echo $this->_tpl_vars['user'][0]['point']; ?>
</dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href=""><?php echo $this->_tpl_vars['user'][0]['answer']; ?>
</a></td>
					<td><a href=""><?php echo ((is_array($_tmp=$this->_tpl_vars['user'][0]['accept']/$this->_tpl_vars['user'][0]['answer']*100)) ? $this->_run_mod_handler('truncate', true, $_tmp, 5, '') : smarty_modifier_truncate($_tmp, 5, '')); ?>
%</a></td>
					<td class='last'><a href=""><?php echo $this->_tpl_vars['user'][0]['ask']; ?>
</a></td>
				</tr>
			</table>
		</div>

<!-- 左侧结束 -->