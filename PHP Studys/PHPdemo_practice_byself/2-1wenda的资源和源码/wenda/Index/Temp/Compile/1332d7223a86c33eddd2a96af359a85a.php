<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo C("WEBNAME");?></title>
	<meta name="keywords" content="<?php echo C("KEYWORDS");?>"/>
	<meta name="description" content="<?php echo C("DISCRIPTION");?>"/>
	<link rel="stylesheet" href="http://127.0.0.1/PHPdemo/2-1/wenda/Index/Tpl/Public/Css/common.css" />
	<script type="text/javascript" src='http://127.0.0.1/PHPdemo/2-1/wenda/Index/Tpl/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript">
		var APP = "http://127.0.0.1/PHPdemo/2-1/wenda/index.php";
	</script>
	<script type="text/javascript" src="http://127.0.0.1/PHPdemo/2-1/wenda/Index/Tpl/Public/Js/validate.js"></script>
	<script type="text/javascript" src='http://127.0.0.1/PHPdemo/2-1/wenda/Index/Tpl/Public/Js/top-bar.js'></script>
	<link rel="stylesheet" href="http://127.0.0.1/PHPdemo/2-1/wenda/Index/Tpl/Public/Css/ask.css" />
	<script type="text/javascript">
		var on = false;
		var point = 0;
		on = <?php if(isset($_SESSION['username']) && isset($_SESSION['uid'])){?>
				point = <?php echo $point;?>;
				true
			<?php  }else{ ?>
				false
			<?php }?>
	</script>
	<script type="text/javascript" src="http://127.0.0.1/PHPdemo/2-1/wenda/Index/Tpl/Public/Js/ask.js"></script>
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
		<div class='logo'><a href="http://127.0.0.1/PHPdemo/2-1/wenda/index.php" class='logo'></a></div>
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
		<li class='nav-sel'><a href="http://127.0.0.1/PHPdemo/2-1/wenda/index.php" class='home'>问答首页</a></li>
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
<!-- top结束 -->
	<div id='location'>
		<a href="">后盾问答</a>&nbsp;>&nbsp;提问
	</div>

<!--------------------中部-------------------->
	<div id='center'>
		<div class='send'>
			<div class='title'>
				<p class='left'>向亿万网友们提问</p>
				<p class='right'>您还可以输入<span id='num'>50</span>个字</p>
			</div>
			<form action="<?php echo U('sub_ask');?>" method='post'>
				<div class='cons'>
					<textarea name="content"></textarea>
				</div>
				<div class='reward'>
					<span id='sel-cate' class='cate-btn'>选择分类</span>
					<ul>
						<li>
							我的金币：<span><?php echo $point;?></span>
						</li>
						<li>
					  悬赏：<select name="reward">
								<option value="0">0</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="50">50</option>
								<option value="80">80</option>
								<option value="100">100</option>
							</select>金币
						</li>
					</ul>
				</div>
				<input type='hidden' name='cid' value='0'/>
				<input type="submit" value='提交问题' class='send-btn'/>
			</form>
		</div>
	</div>
	<div id='category'>
		<p class='title'>
			<span>请选择分类</span>
			<a href="" class='close-window'></a>
		</p>
		<div class='sel'>
			<p>为您的问题选择一个合适的分类：</p>
			<select name="cate-one" size='16'>
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

					<option value="<?php echo $n['cid'];?>"><?php echo $n['title'];?></option>
				<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</select>
			<select name="cate-one" size='16' class='hidden'></select>
			<select name="cate-one" size='16' class='hidden'></select>
		</div>
		<p class='bottom'>
			<span id='ok'>确定</span>
		</p>
	</div>
<!--------------------中部结束-------------------->

<!-- 底部 -->
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>	<div id='bottom'>
		<p><?php echo C("COPY");?></p>
		<p><?php echo C("RECORD");?></p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="http://127.0.0.1/PHPdemo/2-1/wenda/Index/Tpl/Public/Js/iepng.js"></script>
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