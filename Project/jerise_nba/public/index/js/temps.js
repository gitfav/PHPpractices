$(function(){

	// 球队二级菜单
	$('.wrapper .header .header-bottom ul li').hover(function() {
		$(this).find('div').show();
	},function(){
		$(this).find('div').hide();
	});

	// 赛程二级菜单
	$('.race-times .days .list-hd').hover(function(){
		$(this).find('.match-list').show();
	},function(){
		$(this).find('.match-list').hide();
	});

	// 登录显示界面
	$('.header .header-top .register .user-login').click(function() {
		// alert(1);
		$('.login').show();
	});
	$('.login .center .close').click(function() {
		$('.login').hide();
	});

	// 因为有3个表，所以要用各自的id来设置js功能，不然js只走一个地点。
	// 阵容间隔颜色变化
	$('#pe-ta tr:even').not('.temp-all .left .battle .pe .pe-ta .ts').attr('class', 't2');//选择偶数的tr。
	$('#pe-ta-2 tr:even').not('.temp-all .left .battle .pe .pe-ta .ts').attr('class', 't2');//需要相同css的表。
	$('#pe-ta-3 tr:even').not('.temp-all .left .battle .pe .pe-ta .ts').attr('class', 't2');

	// 鼠标移动时阵容间隔颜色变化
	//有色背景的接触
	$('#pe-ta tr:even').not('.temp-all .left .battle .pe .pe-ta .ts').hover(function() {
		$(this).attr('class', 't3');
	},function(){
		$(this).attr('class', 't2')
	});
	//无色背景的接触
	$('#pe-ta tr').not('#pe-ta tr:even').hover(function() {
		$(this).attr('class', 't3');
	},function(){
		$(this).attr('class', 't1')
	});
	//有色背景的接触
	$('#pe-ta-2 tr:even').not('.temp-all .left .battle .pe .pe-ta .ts').hover(function() {
		$(this).attr('class', 't3');
	},function(){
		$(this).attr('class', 't2')
	});
	//无色背景的接触
	$('#pe-ta-2 tr').not('#pe-ta tr:even').hover(function() {
		$(this).attr('class', 't3');
	},function(){
		$(this).attr('class', 't1')
	});
	//有色背景的接触
	// $('#pe-ta-3 tr').not('#pe-ta tr:even').hover(function() {
		// $(this).attr('class', 't3');
	// },function(){
		// $(this).attr('class', 't1')
	// });
	$('#pe-ta-3 tr:even').not('.temp-all .left .battle .pe .pe-ta .ts').hover(function() {
		$(this).attr('class', 't3');
	},function(){
		$(this).attr('class', 't2')
	});
	//无色背景的接触
	$('#pe-ta-3 tr').not('#pe-ta tr:even').hover(function() {
		$(this).attr('class', 't3');
	},function(){
		$(this).attr('class', 't1')
	});

	// 球员场均数据与总数据切换
	$('#i a').click(function() {
		var a=$(this).index()
		$('#battle .pe').eq(a).show().siblings('#battle .pe').hide();
	});

})