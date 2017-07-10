<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>jerise-nba后台首页</title>
	<link rel="stylesheet" href="<?php echo A_PUBLIC; ?>/css/admin.css" />
	<script type="text/javascript" src="<?php echo A_PUBLIC; ?>/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo A_PUBLIC; ?>/js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">jerise管理后台</p>
			<ul id="menu2" class="menu">
				<li>
					<a href="<?php echo site_url(''); ?>">前台首页</a>
				</li>
				<!-- <li><a href="">查看栏目</a></li>  -->
				<li><a href="<?php echo site_url('admin_/admin_list/user_list'); ?>">用户列表</a></li>
				<!-- <li><a href="">网站配置</a></li>				 -->
			</ul>
		</div>
		<div class="top_bar">
			<p class="adm">
					<span>超级</span>
				管理员：
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people">[<?php echo $user['nname']; ?>]</span>
			</p>
			<script type="text/javascript">
			$(function(){
				var today=new Date();
				var day;
				if(today.getDay()==0) day = "星期日";
				if(today.getDay()==1) day = "星期一";
				if(today.getDay()==2) day = "星期二";
				if(today.getDay()==3) day = "星期三";
				if(today.getDay()==4) day = "星期四";
				if(today.getDay()==5) day = "星期五";
				if(today.getDay()==6) day = "星期六";
				var date='今天是：'+(today.getFullYear())+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+day+' | 您的当前位置是：<span>首页</span>';
				$('.now_time').html(date);
			})
			</script>
			<p class="now_time">
				<!-- 今天是：2014-9-4 
				星期三 | 
				您的当前位置是：
				<span>首页</span> -->
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="<?php echo site_url('admin_/admin_list/out'); ?>" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">常用菜单</p>

			 <div class="menu_box">
				<h2>球队管理</h2>
				<div class="text">
				   <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url("admin_/temp_list"); ?>" class="pos">球队的列表</a>       	
				        </li> 
				    </ul>
				   <!--  <ul class="con">
				    	<li class="nav_u">
				    		<a href="" class="pos">球队的数据</a>
				    	</li>
				    </ul> -->
				     <ul class="con">
				    	<li class="nav_u">
				    		<a href="<?php echo site_url("admin_/temp_list/add_temp_view"); ?>" class="pos">球队的添加</a>
				    	</li>
				    </ul>
				</div>
			</div>

			<div class="menu_box">
				<h2>球员列表</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin_/sporter_list'); ?>" class="pos">球员的列表</a>
				        </li>
				    </ul>
				    <ul class="con">
				    	<li class="nav_u">
				    		<a href="<?php echo site_url('admin_/sporter_list/add_sporter_view'); ?>" class="pos">增加新球员</a>
				    	</li>
				    </ul>
				</div>
			</div>

			

			<div class="menu_box">
				<h2>比赛的赛程</h2>
				<div class="text">
				<ul class="con">
				        <li class="nav_u">		        	
				        	<a href="<?php echo site_url('admin_/agende_list/add_agende_view'); ?>/" class="pos">添加赛程</a>
				        </li>
				</ul>
				 <ul class="con">
				    	<li class="nav_u"><a href="<?php echo site_url('admin_/agende_list/agende_view'); ?>" class="pos">球赛列表</a></li>
				</ul>
				</div>
			</div>

			<div class="menu_box">
				<h2>赛季的编辑</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">		        	
				        	<a href="<?php echo site_url('admin_/season_list'); ?>" class="pos">修改默认赛季</a>
				        </li>
				    </ul>
				    <ul class="con">
				    	<li class="nav_u"><a href="<?php echo site_url('admin_/season_list/add_season'); ?>" class="pos">添加新赛季</a></li>
				    </ul>
				</div>
			</div>
			<div class="menu_box">
				<h2>文本管理</h2>
				<div class="text">
				     <ul class="con">
				        <li class="nav_u"><a href="<?php echo site_url('admin_/text_editor'); ?>"  class="pos">添加文章</a></li>
				    </ul>
				    <ul class="con">
				        <li class="nav_u"><a href="<?php echo site_url('admin_/text_editor/add_his'); ?>"  class="pos">历史事件文章</a></li>
				    </ul>
				</div>
			</div>
			<div class="menu_box">
				<h2>后台用户管理</h2>
				<div class="text">
				<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin_/admin_list/add_admin'); ?>"  class="pos">添加账户</a>
				        </li>
				</ul>
				    <ul class="con">
				        <li class="nav_u"><a href="<?php echo site_url('admin_/admin_list/alter_pw'); ?>"  class="pos">修改密码</a></li>
				    </ul>

				    <ul class="con">
				        <li class="nav_u"><a href="<?php echo site_url('admin_/admin_list/user_list'); ?>"  class="pos">用户列表</a></li>
				    </ul>
				</div>
			</div>
			
			
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="<?php echo site_url(''); ?>"></iframe>
		</div>
	<!-- 底部 -->
	<div id="foot_box">
		<div class="foot">
			<p><!-- @Copyright © 2013-2013 MZY.com All Rights Reserved. 京ICP备0000000号 --></p>
		</div>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->
</body>
</html>