<?php /* Smarty version 2.6.26, created on 2015-04-07 21:56:03
         compiled from ../Common/right.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', '../Common/right.html', 38, false),)), $this); ?>
<!-- 右侧 -->
		<div id='right'>
		<?php if ($_SESSION['username']): ?>
		<div class='userinfo'>
			<dl>
				<dt>
					<a href="<?php echo @__APP__; ?>
?c=Mynews">
					<?php if ($this->_tpl_vars['user'][0]['face'] == ''): ?>
						<img src="<?php echo @__PUBLIC__; ?>
/Images/noface.gif" width='48' height='48' alt="占位符"/>
					<?php else: ?>
						<img src="<?php echo @__PUBLIC__; ?>
/faces/<?php echo $this->_tpl_vars['user'][0]['face']; ?>
" width='48' height='48' alt="" />
					<?php endif; ?>
					</a>
				</dt>
				<dd class='username'>
					<a href="<?php echo @__APP__; ?>
?c=Mynews">
						<b><?php echo $_SESSION['username']; ?>
</b>
					</a>
					<a href="">
						<i class='level lv1' title='Level 1'></i>
					</a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;">20<b class='point'></b></a></dd>
				<dd>经验值：200</dd>
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
					<td><a href="">
					<?php if ($this->_tpl_vars['user'][0]['answer'] == 0): ?>
						0%
					<?php else: ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['user'][0]['accept']/$this->_tpl_vars['user'][0]['answer']*100)) ? $this->_run_mod_handler('truncate', true, $_tmp, 5, '') : smarty_modifier_truncate($_tmp, 5, '')); ?>
%
					<?php endif; ?>
					</a></td>
					<td class='last'><a href=""><?php echo $this->_tpl_vars['user'][0]['ask']; ?>
</a></td>
				</tr>
			</table>
			<ul>
				<li><a href="">我提问的</a></li>
				<li><a href="">我回答的</a></li>
			</ul>
		</div>
		<?php else: ?>
		<div class='r-login'>
			<span class='login'><i></i>&nbsp;登录</span>
			<span class='register'><i></i>&nbsp;注册</span>
		</div>
		<?php endif; ?>
	<div class='clear'></div>
	<div class='star'>
		<p class='title'>后盾问答之星</p>
		<span class='star-name'>本日回答问题最多的人</span>
			<div class='star-info'>
				<div>
					<a href="" class='star-face'>
						<img src="" width='48px' height='48px' alt="头像站位"/>
					</a>
					<ul>
						<li><a href="">后盾网</a></li>
						<i class='level lv1' title='Level 1'></i>
					</ul>
				</div>
				<ul class='star-count'>
					<li>回答数：<span>100</span></li>
					<li>采纳率：<span>20%</span></li>
				</ul>
			</div>
		<span class='star-name'>历史回答问题最多的人</span>

		<div class='star-info'>
			<div>
				<a href="" class='star-face'>
					<img src="" width='48px' height='48px' alt="头像站位"/>
				</a>
				<ul>
					<li><a href="">后盾网</a></li>
					<i class='level lv1' title='Level 1'></i>
				</ul>
			</div>
			<ul class='star-count'>
				<li>回答数：<span>200</span></li>
				<li>采纳率：<span>100%</span></li>
			</ul>
		</div>
	</div>
	<div class='star-list'>
		<p class='title'>后盾问答助人光荣榜</p>
		<div>
			<ul class='ul-title'>
				<li>用户名</li>
				<li style='text-align:right;'>帮助过的人数</li>
			</ul>
			<ul class='ul-list'>
				<li>
					<a href=""><i class='rank r1'></i>houdunwang.com</a>
					<span>100</span>
				</li>
				<li>
					<a href=""><i class='rank r2'></i>houdunwang.com</a>
					<span>100</span>
				</li>
				<li>
					<a href=""><i class='rank r3'></i>houdunwang.com</a>
					<span>100</span>
				</li>				
			</ul>
		</div>
	</div>
</div>
<!-- ---右侧结束---- -->