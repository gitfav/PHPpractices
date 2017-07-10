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
</head>
<body>
	<!-- 搜索顶部 -->
	<div class="search_top">
		<div class="sealeft">
			<a href="http://www.houdunphp.com/show/wenda/index.php"><img src="http://www.houdunphp.com/show/wenda/Index/Tpl/Public/images/t0150f9b7bd1b41d84e.png" alt="" /></a>
			<a href="http://www.houdunwang.com">后盾顶尖PHP培训</a>
			<a href="http://www.houdunwang.com">后盾网</a>
		</div>

	</div>
	<!-- 搜索顶部结束 -->
	<!-- 搜索框 -->
	<div class="search_box">
		<form action="<?php echo U("Index/search");?>" method='POST'>
			<input type="text" name="search" class="searchInput"/>
			<input type="submit" value="搜索答案" class="sub"/>
			<a href="<?php echo U('Ask/ask');?>">我要提问</a>	
		</form>
		
	</div>
	<!-- 搜索框结束 -->
	<!-- 搜索内容 -->
	<?php if(!empty($search)){?>
		<div class="searcont">
			<?php if(isset($search) && !empty($search)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($search));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($search,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

				<ul>
					<li> <a href="<?php echo U('Show/index', array('asid'=>$n['asid'], 'cid'=>$n['cid']));?>" class="title"><?php echo $n['content'];?></a> </li>
					<li><?php echo $n['answerCon'];?></li>
					<li class="time"><span><?php echo $n['title'];?> - <?php echo $n['answer'];?>个回答</span> - 提问时间: <?php echo date('Y-m-d',$n['time']);?></li>
				</ul>
			<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</div>
	<?php }?>
	<!-- 搜索内容结束 -->

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