<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>		<div id='right'>
		<?php if(isset($_SESSION['username']) && isset($_SESSION['uid'])){?>
			<div class='userinfo'>
				<dl>
					<dt>
						<a href="<?php echo U('Member/index', array('uid'=>$_SESSION['uid']));?>"><img src="<?php echo $userInfo['face'];?>" width='48' height='48' alt="占位符"/></a>
					</dt>
					<dd class='username'>
						<a href="<?php echo U('Member/index', array('uid'=>$_SESSION['uid']));?>">
							<b><?php echo $_SESSION['username'];?></b>
						</a>
						<a href="<?php echo U('Member/my_level', array('uid'=>$_SESSION['uid']));?>">
							<i class='level lv<?php echo $userInfo['lv'];?>' title='Level <?php echo $userInfo['lv'];?>'></i>
						</a>
					</dd>
					<dd>金币：<a href="<?php echo U('Member/my_point', array('uid'=>$_SESSION['uid']));?>" style="color: #888888;"><?php echo $userInfo['point'];?><b class='point'></b></a></dd>
					<dd>经验值：<?php echo $userInfo['exp'];?></dd>
				</dl>
				<table>
					<tr>
						<td>回答数</td>
						<td>采纳率</td>
						<td class='last'>提问数</td>
					</tr>
					<tr>
						<td><a href="<?php echo U('Member/my_answer', array('uid'=>$_SESSION['uid']));?>"><?php echo $userInfo['answer'];?></a></td>
						<td><a href="<?php echo U('Member/index', array('uid'=>$_SESSION['uid']));?>"><?php echo $userInfo['ratio'];?>%</a></td>
						<td class='last'><a href="<?php echo U('Member/my_ask', array('uid'=>$_SESSION['uid']));?>"><?php echo $userInfo['ask'];?></a></td>
					</tr>
				</table>
				<ul>
					<li><a href="<?php echo U('Member/my_ask', array('uid'=>$_SESSION['uid']));?>">我提问的</a></li>
					<li><a href="<?php echo U('Member/my_answer', array('uid'=>$_SESSION['uid']));?>">我回答的</a></li>
				</ul>
			</div>
		<?php  }else{ ?>
			<div class='r-login'>
				<span class='login'><i></i>&nbsp;登录</span>
				<span class='register'><i></i>&nbsp;注册</span>
			</div>
		<?php }?>
	<div class='clear'></div>
	<div class='star'>
		<p class='title'>后盾问答之星</p>
		<?php if(!empty($eveStar)){?>
		<span class='star-name'>本日回答问题最多的人</span>
			<div class='star-info'>
				<div>
					<a href="<?php echo U('Member/index', array('uid'=>$eveStar['uid']));?>" class='star-face'>
						<img src="<?php echo $eveStar['face'];?>" width='48px' height='48px' alt="头像站位"/>
					</a>
					<ul>
						<li><a href="<?php echo U('Member/index', array('uid'=>$eveStar['uid']));?>"><?php echo $eveStar['username'];?></a></li>
						<i class='level lv<?php echo $eveStar['lv'];?>' title='Level <?php echo $eveStar['lv'];?>'></i>
					</ul>
				</div>
				<ul class='star-count'>
					<li>回答数：<span><?php echo $eveStar['answer'];?></span></li>
					<li>采纳率：<span><?php echo $eveStar['ratio'];?>%</span></li>
				</ul>
			</div>
			<?php }?>
			
		<?php if(!empty($hisStar)){?>
		<span class='star-name'>历史回答问题最多的人</span>
		<div class='star-info'>
			<div>
				<a href="<?php echo U('Member/index', array('uid'=>$hisStar['uid']));?>" class='star-face'>
					<img src="<?php echo $hisStar['face'];?>" width='48px' height='48px' alt="头像站位"/>
				</a>
				<ul>
					<li><a href="<?php echo U('Member/index', array('uid'=>$hisStar['uid']));?>"><?php echo $hisStar['username'];?></a></li>
					<i class='level lv<?php echo $hisStar['lv'];?>' title='Level <?php echo $hisStar['lv'];?>'></i>
				</ul>
			</div>
			<ul class='star-count'>
				<li>回答数：<span><?php echo $hisStar['answer'];?></span></li>
				<li>采纳率：<span><?php echo $hisStar['ratio'];?>%</span></li>
			</ul>
		</div>
		<?php }?>
	</div>
	<div class='star-list'>
		<p class='title'>后盾问答助人光荣榜</p>
		<div>
			<ul class='ul-title'>
				<li>用户名</li>
				<li style='text-align:right;'>帮助过的人数</li>
			</ul>
			<ul class='ul-list'>
				<?php if(isset($helper) && !empty($helper)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($helper));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($helper,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

					<li>
						<a href="<?php echo U('Member/index', array('uid'=>$n['uid']));?>"><i class='rank r<?php echo $hd['list']['n']['index'];?>'></i><?php echo $n['username'];?></a>
						<span><?php echo $n['accept'];?></span>
					</li>
				<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>	
			</ul>
		</div>
	</div>
</div>