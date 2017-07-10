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

	//滚动栏目，图片
	var t=0;
	function run(){
		if (t==5) {
			t=-1;
		};
		t++;
		var w=(-600)*t;
		$('.news .sroll .imgs').stop().animate({'left': w+'px'}, 500);
		$('.news .sroll .under-text .yuans span').stop().eq(t).attr('class','dotItemOn').siblings().attr('class','dotItem');
	}
	var timer=setInterval(run,4000);//图片自动移动
	$('.news .sroll .under-text .yuans span').click(function() {//点击圆点是移动
		clearInterval(timer);
		t=$(this).index();
		var w=(-600)*t;
		$('.news .sroll .imgs').stop().animate({'left': w+'px'}, 500);
		$(this).stop().attr('class','dotItemOn').siblings().attr('class','dotItem');
		timer=setInterval(run,4000);
	});
	//左右键头按键
	// 按左键
	$('.news .sroll .under-text .left').click(function() {
		clearInterval(timer);
		if (t==0) {
			t=6;
		};
		t--;
		var w=(-600)*t;
		$('.news .sroll .imgs').stop().animate({'left': w+'px'}, 500);
		$('.news .sroll .under-text .yuans span').stop().eq(t).attr('class','dotItemOn').siblings().attr('class','dotItem');
		timer=setInterval(run,4000);
	});
	// 按右键
	$('.news .sroll .under-text .right').click(function() {
		clearInterval(timer);
		if (t==5) {
			t=-1;
		};
		t++;
		var w=(-600)*t;
		$('.news .sroll .imgs').stop().animate({'left': w+'px'}, 500);
		$('.news .sroll .under-text .yuans span').stop().eq(t).attr('class','dotItemOn').siblings().attr('class','dotItem');
		timer=setInterval(run,4000);
	});

	// 得分、篮板菜单当鼠标移到时改变class，已经改变下面的排名表单
	$('.datas #today-data .lists span').mouseover(function() {
		$(this).attr('class','table-on').siblings().attr('class', 'table');
		var a=$(this).index();
		// alert(a);
		$('.datas #today-data .tab_item').eq(a).css('display', 'block').siblings('.datas #today-data .tab_item').css('display', 'none');
	});
	$('.datas #season-data .lists span').mouseover(function() {
		$(this).attr('class','table-on').siblings().attr('class', 'table');
		var a=$(this).index();
		// alert(a);
		$('.datas #season-data .tab_item').eq(a).css('display', 'block').siblings('.datas #season-data .tab_item').css('display', 'none');
	});
	//排名移动改变class
	$('.datas .today-data .tab_item table tr').mouseover(function() {
		$(this).attr('class','cur').siblings().attr('class', '');
	});
	// 球队赛季排名 东西部
	$('.datas .ranking .e-w div').mouseover(function() {
		$(this).attr('class', 'on').siblings().attr('class', '');
		var a=$(this).index();
		$('.datas .ranking .sore').eq(a).css('display', 'block').siblings('.datas .ranking .sore').css('display', 'none');
	});
	// 登录显示界面
	$('.header .header-top .register .user-login').click(function() {
		// alert(1);
		$('.login').show();
	});
	$('.login .center .close').click(function() {
		$('.login').hide();
	});

})