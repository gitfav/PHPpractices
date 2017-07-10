var validate = {
	username : false,
	nname : false,
	pwd	 : false,
	pwded    : false,
	verify   : false,
	loginUsername : false,
	loginPwd : false

}
var msg = '';


$(function(){
	//验证注册表单
	//更换验证码
	$('.yan_img').click(function() {
		$(this).attr('src',APP+'/tool/code_user/show/'+Math.random());
	});
	var register=$('form[name=register]');
	register.submit(function() {
		var OK=validate.username && validate.pwd && validate.pwded && validate.verify;
		if (OK) {
			return true;
		};
		$("input[name=uname]").trigger('blur');
		$("input[name=pw]").trigger('blur');
		$("input[name=pwag]").trigger('blur');
		$("input[name=code]").trigger('blur');
		return false;
	});
	//验证账号
	$("input[name=uname]").blur(function() {
		var username=$(this).val();
		//不能为空
		if (username=='') {
			msg='账号不能为空';
			$('.error').html(msg);
			validate.username=false;
			return;
		};
		// 正则判断
		if(!/^\w{2,14}$/g.test(username)){
			msg = '必须是2-14个字符，字母，数字，下划线';
			$('.error').html(msg);
			validate.username = false;
			return;
		}
		//异步检测用户是否存在
		$.post(APP+'/admin_/admin_list/is_uname', {username: username}, function(status) {
			if (!status) {
				msg='已存在此账号';
				$('.error').html(msg);
				validate.username = false;
				
			}else{
				msg='';
				$('.error').html(msg);
				validate.username = true;
			};
		},'json');
	});
	//验证昵称
	$('input[name=nname]').blur(function() {
		var nname=$(this).val();
		//不能为空
		if (nname=='') {
			msg='昵称不能为空';
			$('.error_fi').html(msg);
			validate.nname=false;
			return;
		};
		//异步检测昵称是否存在
		$.post(APP+'/admin_/admin_list/is_uname', {nname: nname}, function(status) {
			if (!status) {
				msg='已存在此昵称';
				$('.error_fi').html(msg);
				validate.nname = false;
				
			}else{
				msg='';
				$('.error_fi').html(msg);
				validate.nname = true;
			};
		},'json');
	});
	//验证密码
	$('input[name=pw]').blur(function() {
		var pwd=$(this).val();
		//不能为空
		if (pwd=='') {
			msg='密码不能为空';
			$('.error_t').html(msg);
			validate.pwd=false;
			return;
		};
		// 正则判断
		if(!/^\w{6,20}$/g.test(pwd)){
			msg = '必须是6-20个字符，字母，数字，下划线';
			$('.error_t').html(msg);
			validate.pwd = false;
			return;
		}

		msg = '';
		validate.pwd = true;
		$('.error_t').html(msg);
	});
	//验证再次输入的密码
	$('input[name=pwag]').blur(function(){
		var pwded=$(this).val();
		//不能为空
		if (pwded=='') {
			msg='不能为空';
			$('.error_th').html(msg);
			validate.pwded=false;
			return;
		};
		//两次密码要相同
		if (pwded!=$('input[name=pw]').val()) {
			msg='两次密码不同';
			$('.error_th').html(msg);
			validate.pwded=false;
			return;
		};
		msg = '';
		validate.pwded = true;
		$('.error_th').html(msg);
	});
	//验证验证码
	$('input[name=code]').blur(function(){
		var verify=$(this).val();
		//判断是否为空
		if (verify=='') {
			msg='请输入验证码';
			$('.error_f').html(msg);
			validate.verify=false;
			return;
		};
		//异步判断
		$.post(APP+'/admin_/admin_list/is_code', {verify:verify}, function(status) {
			if (status) {
				msg='';
				$('.error_f').html(msg);
				validate.verify=true;
			}else{
				msg='验证码错误';
				$('.error_f').html(msg);
				validate.verify=false;
			};
		},'json');
	});

	//登录表单验证
	var login=$('form[name=login]');
	login.submit(function() {
		var OK=validate.loginUsername && validate.loginPwd;
		if (OK) {
			return true;
		};
		$('input[name=logname]').trigger('blur');
		$('input[name=logpw]').trigger('blur');
		return false;
	});
	//验证账号
	$('input[name=logname]').blur(function() {
		loginUsername=$(this).val();
		if (loginUsername=='') {
			msg='请输入账号';
			$('.error_s').html(msg);
			validate.loginUsername=false;
			return;
		};
		msg='';
		$('.error_s').html(msg);
		validate.loginUsername=true;

	});
	//验证密码
	$('input[name=logpw]').blur(function() {
		loginPwd=$(this).val();
		if (loginPwd=='') {
			msg='请输入密码';
			$('.error_se').html(msg);
			validate.loginUsername=false;
			return;
		};

		//异步验证账号和密码
		var data={
			username : $('input[name=logname]').val(),
			pwd : loginPwd
		}
		$.post(APP + '/admin_/admin_list/ajax_login', data, function(status){
			// alert(status);
			if(status){
				$('.error_se').html('');
				validate.loginUsername = true;
				validate.loginPwd = true;
			} else {
				$('.error_se').html('用户名或者密码不正确');
				validate.loginUsername = false;
				validate.loginPwd = false;
			}
		}, 'json');

	});

})