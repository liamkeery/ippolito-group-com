$(document).foundation();

console.log('Connected');

$(function() {
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop != 0)
			$('.top-bar').stop().animate({'opacity':'0.2'},400);
		else	
			$('.top-bar').stop().animate({'opacity':'1'},400);
	});
	
	$('.top-bar').hover(
		function (e) {
			var scrollTop = $(window).scrollTop();
			if(scrollTop != 0){
				$('.top-bar').stop().animate({'opacity':'1'},400);
			}
		},
		function (e) {
			var scrollTop = $(window).scrollTop();
			if(scrollTop != 0){
				$('.top-bar').stop().animate({'opacity':'0.2'},400);
			}
		}
	);
});
