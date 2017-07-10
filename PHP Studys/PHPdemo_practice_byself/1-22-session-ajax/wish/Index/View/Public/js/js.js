$(function(){
	$('.login .link-register .n').click(function() {
		$('.background').css('display', 'block');
		$('.register').css('display', 'block');
	});

	$(".register .close").click(function(event) {
		$('.background').css('display', 'none');
		$('.register').css('display', 'none');
	});

})