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
				j('#sidebar').css({top: '15px'});
			}
		});
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
		if (!j(a.target).parent().hasClass("notifications")) {
			j(".notifications").removeClass("open")
		}
	});
	
	var csvURL = 'https://docs.google.com/spreadsheet/pub?key='+'0AixEq-tpChNOdDJWMHFzTVhMYzQ4U25ldTZmUjBWNEE&single=true&gid=0&output=csv';
	var yqlURL =	"http://query.yahooapis.com/v1/public/yql?q="+
					"select%20*%20from%20csv%20where%20url%3D'"+encodeURIComponent(csvURL)+
					"'%20and%20columns%3D'quotes'&format=json&callback=?";
	
	var dl = j('#dolly');
	var quoteslist=[];
	j.getJSON(yqlURL,function(msg){
		j.each(msg.query.results.row,function(){
			var quotes = this.quotes.replace(/""/g,'"').replace(/^"|"$/g,'');
			quoteslist.push(quotes);
		});
		dl.append('"'+quoteslist[Math.floor(Math.random()*quoteslist.length)]+'"');	
	});

});
