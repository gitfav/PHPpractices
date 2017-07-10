<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><div id='left'>
		<div class='userinfo'>
			<dl>
				<dt>
					<a href="<?php echo U('Member/index', array('uid'=>$_GET['uid']));?>"><img src="<?php echo $member['face'];?>" width='48' height='48' alt="占位符"/></a>
				</dt>
				<dd class='username'>
					<a href="<?php echo U('Member/index', array('uid'=>$_GET['uid']));?>"><b><?php echo $member['username'];?></b>
					</a>
					<a href="<?php echo U('Member/my_level', array('uid'=>$_GET['uid']));?>">
						<i class='level lv<?php echo $member['lv'];?>' title='Level <?php echo $member['lv'];?>'></i>
					</a>
				</dd>
				<dd>金币：<a href="<?php echo U('Member/my_point', array('uid'=>$_GET['uid']));?>" style="color: #888888;"><b class='point'><?php echo $member['point'];?></b></a></dd>
				<dd>经验值：<?php echo $member['exp'];?></dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href="<?php echo U('Member/my_answer', array('uid'=>$_GET['uid']));?>"><?php echo $member['answer'];?></a></td>
					<td><a href="<?php echo U('Member/index', array('uid'=>$_GET['uid']));?>"><?php echo $member['ratio'];?>%</a></td>
					<td class='last'><a href="<?php echo U('Member/my_ask', array('uid'=>$_GET['uid']));?>"><?php echo $member['ask'];?></a></td>
				</tr>
			</table>
		</div>

	<ul>
		<li class='myhome <?php if(METHOD == 'index'){?>cur<?php }?>'>
			<a href="<?php echo U('Member/index', array('uid'=>$_GET['uid']));?>"><?php echo $rank;?>的首页</a>
		</li>
		<li class='myask <?php if(METHOD == 'my_ask'){?>cur<?php }?>'>
			<a href="<?php echo U('Member/my_ask', array('uid'=>$_GET['uid']));?>"><?php echo $rank;?>的提问</a>
		</li>
		<li class='myanswer <?php if(METHOD == 'my_answer'){?>cur<?php }?>'>
			<a href="<?php echo U('Member/my_answer', array('uid'=>$_GET['uid']));?>"><?php echo $rank;?>的回答</a>
		</li>
		<li class='mylevel <?php if(METHOD == 'my_level'){?>cur<?php }?>'>
			<a href="<?php echo U('Member/my_level', array('uid'=>$_GET['uid']));?>"><?php echo $rank;?>的等级</a>
		</li>
		<li class='mygold <?php if(METHOD == 'my_point'){?>cur<?php }?>'>
			<a href="<?php echo U('Member/my_point', array('uid'=>$_GET['uid']));?>"><?php echo $rank;?>的金币</a>
		</li>
		<?php if($_SESSION['uid'] == $_GET['uid']){?>
			<li class='myface <?php if(METHOD == 'my_face'){?>cur<?php }?>'>
				<a href="<?php echo U('Member/my_face', array('uid'=>$_GET['uid']));?>">上传头像</a>
			</li>
		<?php }?>
		<li style="background:none"></li>
	</ul>
</div>