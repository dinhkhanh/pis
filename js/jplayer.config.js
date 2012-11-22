jQuery(document).ready(function($){
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3: "https://ia600607.us.archive.org/27/items/OverTheGreenFields/cest-tout.mp3",
				oga: "https://ia600607.us.archive.org/27/items/OverTheGreenFields/cest-tout.ogg"
			}).jPlayer("play");
		},
		ended: function (event) {
			$(this).jPlayer("play");
		},
		swfPath: "js",
		supplied: "mp3, oga",
		volume: 1
	});
});