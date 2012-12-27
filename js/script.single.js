jQuery(document).ready(function ($) {
    $(function(){
        $('#place_slider').nivoSlider({
            effect: 'fade',
            directionNav: false, // Next & Prev navigation
            controlNav: false, // 1,2,3... navigation
            randomStart: true // Start on a random slide
        });
    });

});