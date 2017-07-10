$(function(){
	//删除用户、帖子
	$('.del').click(function(){
		return confirm('确定要删除吗？');
	})
	$('.zhu').click(function() {
		return confirm('确定要注销吗？');
	})
	$('.add').click(function() {
		return confirm('确定要添加吗？');
	})
		//返回按钮操作
	$('#back').click(function(){
		window.history.back();
	})
	$('#back_move').click(function(){
		location.href="index.php";
	})
	//修改文件名操作
	$('#sure').click(function(){
		if($('#newName').attr('value')==""){
		alert('修改内容不能为空');
		return false;
		}
	})
	//移动路径操作
	$('#sure').click(function(){
		if($('#newName').attr('value')==""){
		alert('修改内容不能为空');
		return false;
		}
	})

	var check=$('form[name=sporter]');
	check.submit(function() {
		var _OK=$('input[name=sp_face]').val()  && $('input[name=sp_inj]').val() && $('input[name=sp_name]').val() && $('input[name=sp_h]').val() && $('input[name=sp_w]').val() && $('input[name=sp_cip]').val() && $('input[name=sp_num]').val() && $('select[name=teid]').val();
		if (_OK) { return true; }
		if ($('input[name=sp_face]').val()=='') {
			var msg='请上传球员图片';
			$('#file_upload').parent().next().html(msg);
		}else{
			var msg='OK';
			$('#file_upload').parent().next().html(msg);
		};
		$('input[name=sp_name]').trigger('blur');
		$('input[name=sp_h]').trigger('blur');
		$('input[name=sp_w]').trigger('blur');
		$('input[name=sp_cip]').trigger('blur');
		$('input[name=sp_num]').trigger('blur');
		$('select[name=teid]').trigger('blur');
		$('input[name=sp_inj]').trigger('blur');
		return false;

	});


	$('input[name=sp_name]').blur(function() {
		if (!$(this).val()) {
			var msg='球员姓名必填';
			$(this).next().html(msg);
		}else{
			var msg='OK';
			$(this).next().html(msg);
		};
	});
	$('input[name=sp_inj]').blur(function() {
		if (!$(this).val()) {
			var msg='进入nba时间必填（只填年份）';
			$(this).next().html(msg);
		}else{
			var msg='OK';
			$(this).next().html(msg);
		};
	});
	$('input[name=sp_h]').blur(function() {
		if (!$(this).val()) {
			var msg='球员身高必填';
			$(this).next().html(msg);
		}else{
			var msg='OK';
			$(this).next().html(msg);
		};
	});
	$('input[name=sp_w]').blur(function() {
		if (!$(this).val()) {
			var msg='球员体重必填';
			$(this).next().html(msg);
		}else{
			var msg='OK';
			$(this).next().html(msg);
		};
	});
	$('input[name=sp_cip]').blur(function() {
		if (!$(this).val()) {
			var msg='球员选秀顺位必填';
			$(this).next().html(msg);
		}else{
			var msg='OK';
			$(this).next().html(msg);
		};
	});
	$('input[name=sp_num]').blur(function() {
		if (!$(this).val()) {
			var msg='球员球员号码必填';
			$(this).next().html(msg);
		}else{
			var msg='OK';
			$(this).next().html(msg);
		};
	});
	$('select[name=teid]').blur(function() {
		if (!$(this).val()) {
			var msg='球员所属球队必填';
			$(this).next().html(msg);
		}else{
			var msg='OK';
			$(this).next().html(msg);
		};
	});
})