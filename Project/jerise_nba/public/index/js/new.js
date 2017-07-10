$(function(){
	// 字体变大变小
	var b=0;
	$('.new .big').click(function() {
		if (b<=1) {
			b++;
			$('.new .texts p').css('font-size', 14+(b*2)+'px');	
		};
	});
	$('.new .small').click(function() {
		if (b>=0) {
			b--;
			$('.new .texts p').css('font-size', 14+(b*2)+'px');	
		};	
	});


	// 评论区的文本框加入与修改
	$('.z_h').click(function() {
		//关闭原来的发表框
		$('.post-list .fabiao').stop().slideUp("slow");
		$('.post-list .fabiao .de .te').val('');
		// alert(5);
		// alert($(this).parent().siblings('.fabiao').length);
		//找与父级的同级元素，class为fabiao。
		// if ($(this).parent().siblings('.fabiao').length==0) {
		// 	$(this).parent().after('<div id="fabiao" style="display:none;" class="fabiao"><div class="de"><textarea class="te" style="height: 80px;" name="content" accesskey="u" autocomplete="off" tabindex="1" id="" ></textarea></div><div class="anniu" style="height: 25px;"><input value="发表" type="submit" class="button" style="width: 40px; height: 25px;border:0px;"></div>');
			$(this).parent().next().find('.fabiao').stop().slideToggle("slow");
		// 	$(this).siblings('.z_h').parent().siblings('.fabiao').slideUp("slow");
		// 	// var a=$(this).parent().next().length;
		// 	// alert(a);
		// 	// nu=0;
		// }else{
			// $(this).parent().siblings('.fabiao').stop().slideToggle("slow");
		// }	
	});

	// 广告固定
	$(document).scroll(function() {
		var t=$(document).scrollTop();
		if (t>780) {
			// alert(t);
			$('.gg2').attr('class', 'gg2-2');
		}
		if (t<780) {
			$('.gg2-2').attr('class', 'gg2');
		};
	});

	//发表点击
	$('form[name=f_content]').submit(function() {
		if ($('.te').val()=='') {
			return false;
		};
		$('input[name=content]').val()=$('.te').val();
		return true;
	});
	$('form[name=r_content]').submit(function() {
		if ($(this).find('.te').val()=='') {
			return false;
		};
		$(this).find('input[name=content]').val()=$(this).find('.te').val();
		return true;
	});

	$('.zangs').click(function() {
		zangs=$(this).next();
		var data={
			id : $(this).parent().attr('reid'),
			good : $(this).parent().attr('gnum')
		}
		// var id=$(this).parent().attr('reid');
		// var good=$(this).parent().attr('gnum');
		$.post(APP+'/index_/news/good_ajax', data, function(status) {
			if (status) {
				msg='('+status+')';
				zangs.html(msg);
			};
		},'json');
	});
})