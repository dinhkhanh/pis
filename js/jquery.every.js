var j = jQuery.noConflict();
j(document).ready(function() {
//	sidebar = j('#sidebar');
//	j(window).scroll(function () {
//			secondHeight = sidebar.height() + 250;
//			if (j(this).scrollTop() < 250 || (j(this).scrollTop() >= 250 && j(this).scrollTop() <= secondHeight)){
//				j('#sidebar').css({position: 'relative'});
//				j('#sidebar').css({top: '0'});
//				j('#nav_up').fadeIn('slow');
//				j('#nav_down').fadeIn('slow');
//			} else {
//				j('#sidebar').css({position: 'fixed'});
//				j('#sidebar').css({top: '15px'});
//			}
//		});
	elem = j('#page');
	j('#nav_down').click(
		function (e) {
			j('html, body').animate({scrollTop: elem.height()}, 800, "easeOutExpo");
		}
	);
	j('#nav_up').click(
		function (e) {
			j('html, body').animate({scrollTop: 0}, 800, "easeOutExpo");
		}
	);
	j('.notifications').click(function () {
		if(j(this).hasClass('open')) {
			j(this).removeClass('open');
		}
		else {
			j('.notify_icon').removeClass('open');
			j(this).addClass('open');
		}
	});
	j(document).bind("click", function (a) {
		if (!j(a.target).parent().hasClass("notifications")&&!j(a.target).parent('h3').parent('li').hasClass("notifications")) {
			j(".notifications").removeClass("open");
		}
	});

});
