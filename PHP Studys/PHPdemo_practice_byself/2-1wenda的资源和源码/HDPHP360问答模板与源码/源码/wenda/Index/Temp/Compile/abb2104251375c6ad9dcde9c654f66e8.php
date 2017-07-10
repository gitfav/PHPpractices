<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo C("WEBNAME");?></title>
	<meta name="keywords" content="<?php echo C("KEYWORDS");?>"/>
	<meta name="description" content="<?php echo C("DISCRIPTION");?>"/>
	<link rel="stylesheet" href="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Css/common.css" />
	<script type="text/javascript" src='http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript">
		var APP = "http://www.houdunphp.com/show/wenda/index.php";
	</script>
	<script type="text/javascript" src="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Js/validate.js"></script>
	<script type="text/javascript" src='http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Js/top-bar.js'></script>
	<link rel="stylesheet" href="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Css/index.css" />
	<script type="text/javascript" src='http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Js/index.js'></script>
</head>
<body>
<!-- top -->
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><div id='top-fixed'>
	<div id='top-bar'>
		<ul class="top-bar-left fl">
			<li><a href="http://www.houdunwang.com" target='_blank'>后盾顶尖后盾PHP培训</a></li>
			<li><a href="http://www.houdunwang.com" target='_blank'>后盾论坛</a></li>
		</ul>
		<ul class='top-bar-right fr'>
			<?php if(isset($_SESSION['username']) && isset($_SESSION['uid'])){?>
				<li class='userinfo'>
					<a href="<?php echo U('Member/index', array('uid'=>$_SESSION['uid']));?>" class='uname'><?php echo $_SESSION['username'];?></a>
				</li>
				<li style='color:#eaeaf1'>|</li>
				<li><a href="<?php echo U('Login/out');?>">退出</a></li>
			<?php  }else{ ?>

				<li><a href="" class='login'>登录</a></li>
				<li style='color:#eaeaf1'>|</li>
				<li><a href="" class='register'>注册</a></li>
			<?php }?>	
		</ul>
	</div>
<!-- 提问搜索框 -->
	<div id='search'>
		<div class='logo'><a href="http://www.houdunphp.com/show/wenda/index.php" class='logo'></a></div>
		<form action="<?php echo U('Index/search');?>" method='POST'>
			<input type="text" name='search' class='sech-cons'/>
			<input type="submit" class='sech-btn'/>
		</form>
		
		<a href="<?php echo U('Ask/ask');?>" class='ask-btn'></a>
	</div>
<!-- 提问搜索框结束 -->
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
	<ul class='list'>
		<li class='nav-sel'><a href="http://www.houdunphp.com/show/wenda/index.php" class='home'>问答首页</a></li>
		<li class='nav-sel ask-cate'>
			<a href="<?php echo U('List/index', array('cid'=>0));?>" class='ask-list'><span>问题库</span><i></i></a>
			<ul class='hidden'>
				<?php if(isset($topCate) && !empty($topCate)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($topCate));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($topCate,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

					<li>
						<a href="<?php echo U('List/index', array('cid'=>$n['cid']));?>"><?php echo $n['title'];?></a>
					</li>
				<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</ul>
		</li>
	</ul>
	<p class='total'>累计提问：<?php echo $askNum;?></p>
</div>

	<!----------注册框---------->
	<div id='register' class='hidden'>
		<div class='reg-title'>
			<p>欢迎注册后盾问答</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div id='reg-wrap'>
			<div class='reg-left'>
				<ul>
					<li><span>账号注册</span></li>
				</ul>
				<div class='reg-l-bottom'>
					已有账号，<a href="" id='login-now'>马上登录</a>
				</div>
			</div>
			<div class='reg-right'>
				<form action="<?php echo U('Reg/register');?>" method='post' name='register'>
					<ul>
						<li>
							<label for="reg-uname">用户名</label>
							<input type="text" name='username' id='reg-uname'/>
							<span>2-14个字符：字母、数字</span>
						</li>
						<li>
							<label for="reg-pwd">密码</label>
							<input type="password" name='pwd' id='reg-pwd'/>
							<span>6-20个字符:字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-pwded">确认密码</label>
							<input type="password" name='pwded' id='reg-pwded'/>
							<span>请再次输入密码</span>
						</li>
						<li>
							<label for="reg-verify">验证码</label>
							<input type="text" name='verify' id='reg-verify'/>
							<img src="<?php echo U('Reg/code');?>" width='99' height='35' alt="验证码" id='verify-img'/>
							<span>请输入图中的字母或数字，不区分大小写</span>
						</li>
						<li class='submit'>
							<input type="submit" value='立即注册'/>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>

	<!----------登录框---------->	
	<div id='login' class='hidden'>
		<div class='login-title'>
			<p>欢迎您登录后盾问答</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div class='login-form'>
			<span id='login-msg'></span>
			<!-- 登录FORM -->
			<form action="<?php echo U('Login/login');?>" method='post' name='login'>
				<ul>
					<li>
						<label for="login-acc">账号</label>
						<input type="text" name='username' class='input' id='login-acc'/>
					</li>
					<li>
						<label for="login-pwd">密码</label>
						<input type="password" name='pwd' class='input' id='login-pwd'/>
					</li>
					<li class='login-auto'>
						<label for="auto-login">
							<input type="checkbox" checked='checked' name='auto'  id='auto-login'/>&nbsp;下一次自动登录
						</label>
						<a href="" id='regis-now'>注册新账号</a>
					</li>
					<li>
						<input type="submit" value='' id='login-btn'/>
					</li>
				</ul>
			</form>
		</div>
	</div>

<!--背景遮罩--><div id='background' class='hidden'></div>	
<!-- top -->
	<div class='main'>
		<div id='left'>
			<p class='left-title'>所有问题分类</p>
			<ul class='left-list'>
				<?php if(isset($cate) && !empty($cate)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($cate));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($cate,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

					<li class='list-l1'>
						<div class='list-l1-wrap'>
							<h4><a href="<?php echo U('List/index', array('cid'=>$n['cid']));?>"><?php echo $n['title'];?></a></h4>
							<ul class='list-l2'>

								<?php if(isset($n['down']) && !empty($n['down'])):$_id_v=0;$_index_v=0;$lastv=min(3,count($n['down']));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($n['down'],0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

									<li><a href="<?php echo U('List/index', array('cid'=>$v['cid']));?>"><?php echo $v['title'];?></a></li>
								<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
								
							</ul>
						</div>

						<div class='list-more hidden'>
							<ul>
								<?php if(isset($n['down']) && !empty($n['down'])):$_id_v=0;$_index_v=0;$lastv=min(1000,count($n['down']));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($n['down'],3,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

									<li><a href="<?php echo U('List/index', array('cid'=>$v['cid']));?>"><?php echo $v['title'];?></a></li>
								<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
							</ul>
						</div>
					</li>
				<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</ul>
		</div>

		<div id='center'>
			<div id='animate'>
				<div class='imgs-wrap'>
					<ul>
						<li>
							<a href=""><img src="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Images/animate1.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Images/animate2.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Images/animate3.jpg" width='558' height='190'/></a>
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
					<a href='<?php echo U("List/index", array("cid"=>0));?>'>更多>></a>
				</dt>
				<?php if(isset($noSolveL) && !empty($noSolveL)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($noSolveL));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($noSolveL,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

					<dd>
						<a href="<?php echo U('Show/index', array('asid'=>$n['asid'],'cid'=>$n['cid']));?>"><?php echo $n['content'];?></a>
						<span><?php echo $n['answer'];?>回答</span>
					</dd>
				<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</dl>

			<dl class='answer-list'>
				<dt>
					<span class='reward-as'>高分悬赏问题</span>
					<a href='<?php echo U('List/index', array('cid'=>0, 'where'=>2));?>'>更多>></a>
				</dt>
				<?php if(isset($noSolveH) && !empty($noSolveH)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($noSolveH));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($noSolveH,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

					<dd>
						<a href="<?php echo U('Show/index', array('asid'=>$n['asid'],'cid'=>$n['cid']));?>"><b><?php echo $n['reward'];?></b><?php echo $n['content'];?></a>
						<span><?php echo $n['answer'];?>回答</span>
					</dd>
				<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</dl>

		</div>
	<!-- 右侧 -->
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
<!-- ---右侧结束---- -->
	</div>
<!--------------------内容主体结束-------------------->
	<div class='clear'></div>
	
<!-- 底部 -->
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>	<div id='bottom'>
		<p><?php echo C("COPY");?></p>
		<p><?php echo C("RECORD");?></p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
        DD_belatedPNG.fix('.ani-btn-cur i','background');
        DD_belatedPNG.fix('.rank','background');
        DD_belatedPNG.fix('.answer-list b','background');
        DD_belatedPNG.fix('.reward-as','background');
        DD_belatedPNG.fix('.wait-as','background');
        DD_belatedPNG.fix('#background','background');
        DD_belatedPNG.fix('.t1 b','background');
        DD_belatedPNG.fix('.point','background');
        
    </script>
<![endif]-->
</body>
</html>
<!-- 底部结束 -->
<!--[if IE 6]>
    <script type="text/javascript">
        alert("不建议您使用这款超极老的IE6，如您是程序员建议您使用火狐浏览器！")
    </script>
<![endif]-->