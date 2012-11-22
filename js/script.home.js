var j = jQuery.noConflict();
j(document).ready(function() {
	sidebar = j('#sidebar');
	j(window).scroll(function () {
			secondHeight = sidebar.height() + 250;
			if (j(this).scrollTop() < 250 || (j(this).scrollTop() >= 250 && j(this).scrollTop() <= secondHeight)){
				j('#sidebar').css({position: 'relative'});
				j('#sidebar').css({top: '0'});
				j('#nav_up').fadeIn('slow');
				j('#nav_down').fadeIn('slow');
			} else {
				j('#sidebar').css({position: 'fixed'});
				j('#sidebar').css({top: '10px'});
			}
		});
});