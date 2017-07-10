$(function(){

	$(document).scroll(function() {
		var t=$(document).scrollTop();
		if (t<400) {
			$(".to-top").css('display', 'none');
		}
		if (t>400) {
			$(".to-top").css('display', 'block');
		}
	});
	$('.to-top').click(function() {
		$('html,body').animate({'scrollTop':'140px'}, 400)
	});

})