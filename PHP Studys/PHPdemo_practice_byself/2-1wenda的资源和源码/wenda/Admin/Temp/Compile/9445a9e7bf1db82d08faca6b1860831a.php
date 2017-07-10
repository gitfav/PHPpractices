<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://www.houdunphp.com/show/wenda/Admin/Tpl/Public/Css/public.css" />
	<script type="text/javascript" src="http://www.houdunphp.com/show/wenda/Admin/Tpl/Public/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://www.houdunphp.com/show/wenda/Admin/Tpl/Public/Js/public.js"></script>	
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">答案列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>答案内容</td>
			<td>回答时间</td>
			<td>操作</td>
		</tr>
		<?php if(isset($answer) && !empty($answer)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($answer));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($answer,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

			<tr>
				<td><?php echo $n['anid'];?></td>
				<td><?php echo $n['content'];?></td>
				<td><?php echo date('Y-m-d',$n['time']);?></td>
				<td>
					<a href="<?php echo U('Answer/del_answer', array('anid'=>$n['anid']));?>" class="del">删除</a>
				</td>
			</tr>
		<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	</table>
	<div class="page">
		共<?php echo $count;?>条 &nbsp
		<?php echo $page;?>
	</div>

</body>
</html>