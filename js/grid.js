jQuery(document).ready(function ($) {
	$('#ri-grid').gridrotator( {
		rows            : 2,
		columns         : 5,
		w1024           : {
			rows    : 2,
			columns : 5
		},		 
		w768            : {
			rows    : 2,
			columns : 5
		},
		w480            : {
			rows    : 2,
			columns : 5
		},		 
		w320            : {
			rows    : 2,
			columns : 5
		},		 
		w240            : {
			rows    : 2,
			columns : 5
		},
		step            : 'random',
		maxStep         : 3,
		preventClick    : false,
		animType        : 'fadeInOut',
		animSpeed       : 500,
		animEasingOut   : 'linear',
		animEasingIn    : 'linear',
		interval        : 2200
	});
});