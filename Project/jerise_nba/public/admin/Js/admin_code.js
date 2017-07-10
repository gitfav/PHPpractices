$(function(){
	var validate = {
		username : false,
		password		 : false,
		passwordS    : false,
		nname   : false,
		loginUsername : false,
		loginPwd : false
	}
	var msg = '';
	// alert(APP);
	var register = $('form[name=register]');
	register.submit(function() {
		var isOk = validate.username && validate.password && validate.passwordS && validate.nname;
		if(isOk) {
			return true;
		}
		//点击提交按钮依次触发失去焦点再次验证
		$('input[name=username]').trigger('blur');
		$('input[name=password]').trigger('blur');
		$('input[name=passwordS]').trigger('blur');
		$('input[name=nname]').trigger('blur');
		return false;

	});
	//-------验证用户名-------
	$('input[name=username]').blur(function(){
		var username = $(this).val();
		var span = $(this).next();
		//不能为空
		if(username == ''){
			msg = '用户名不能为空！';
			span.html(msg);
			validate.username = false;
			return;
		}
		//正则判断
		if(!/^\w{2,14}$/g.test(username)){
			msg = '必须是2-14个字符，字母，数字，下划线';
			span.html(msg);
			validate.username = false;
			return;
		}

		//异步验证用户名是否存在
		$.post(APP + '/is_uname', {username : username}, function(status){
			if(status){
				msg = '';
				span.html(msg);
				validate.username = true;
				// alert(status);
			} else {
				msg = '用户名已经存在！';
				span.html(msg);
				validate.username = false;
				return;
			}
		}, 'json');
		msg = '';
		span.html(msg);
	})
	//确认密码
	$('input[name=password]').blur(function(){
		var password = $(this).val();
		var span = $(this).next();
		//确认密码不能为空
		if(password == ''){
			msg = '请输入密码';
			span.html(msg);
			validate.password = false;
			return;
		}
		//正则判断
		if(!/^\w{6,20}$/g.test(password)){
			msg = '密码必须由6-20个字母，数字，或者下划线组成';
			span.html(msg).addClass('error');
			validate.pwd = false;
			return;
		}
		msg = '';
		span.html(msg);
		validate.password = true;
	})
	$('input[name=passwordS]').blur(function(){
		//两次密码是否相同
		var passwordS = $(this).val();
		var span = $(this).next();
		if(passwordS == ''){
			msg = '请确认密码';
			span.html(msg);
			validate.passwordS = false;
			return;
		}
		if(passwordS != $('input[name=password]').val()){
			msg = '两次密码不一致！';
			span.html(msg);
			validate.passwordS = false;
			return;
		}
		msg = '';
		span.html(msg);
		validate.passwordS = true;
	})

	$('input[name=nname]').blur(function(){
		var nname = $(this).val();
		var span = $(this).next();
		//不能为空
		if(nname == ''){
			msg = '用户名不能为空！';
			span.html(msg);
			validate.nname = false;
			return;
		}
		//正则判断
		if(!/\w{1,14}/.test(nname)){
			msg = '必须是1-14个字符';
			span.html(msg);
			validate.nname = false;
			return;
		}

		//异步验证用户名是否存在
		$.post(APP + '/is_uname', {nname : nname}, function(status){
			if(status){
				msg = '';
				span.html(msg);
				validate.nname = true;
				// alert(status);
			} else {
				msg = '用户名已经存在！';
				span.html(msg);
				validate.nname = false;
			}
		}, 'json');
	})
});