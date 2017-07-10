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
			<td class="th" colspan="20">后台用户列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>用户名</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
			<td>帐号状态</td>
			<td>操作</td>
		</tr>
		<?php if(isset($admin) && !empty($admin)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($admin));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($admin,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

			<tr>
				<td><?php echo $n['aid'];?></td>
				<td><?php echo $n['username'];?></td>
				<?php if($n['logintime'] == 0){?>
					<td>从未登录</td>
				<?php  }else{ ?>
					<td><?php echo date('Y-m-d',$n['logintime']);?></td>
				<?php }?>

				<?php if($n['loginip'] == ''){?>
					<td>从未登录</td>
				<?php  }else{ ?>
					<td><?php echo $n['loginip'];?></td>
				<?php }?>

			
				<?php if($n['lock'] == 1){?>
					<td>锁定</td>
				<?php  }else{ ?>
					<td>正常</td>
				<?php }?>

				<?php if($n['username'] <> 'admin'){?> 
				<td>
					<?php if($n['lock'] == 1){?>
						<a href="<?php echo U('Admin/unlock', array('aid'=>$n['aid']));?>">解锁</a>
					<?php  }else{ ?>
						<a href="<?php echo U('Admin/lock', array('aid'=>$n['aid']));?>">锁定</a>
					<?php }?>
				</td>
				<?php  }else{ ?>
					<td>
						<span>admin不能被锁定</span>
					</td>
				<?php }?>
			</tr>
		<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	</table>

</body>
</html>