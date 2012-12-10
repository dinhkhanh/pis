var j = jQuery.noConflict();

function initialize() {
    var directionsService = new google.maps.DirectionsService(),
    directionsDisplay = new google.maps.DirectionsRenderer(),
    createMap = function (start) {
        des = start.lat +","+ start.lng;
        var travel = {
            origin : des,
            destination : start.address,
            travelMode : google.maps.DirectionsTravelMode.DRIVING
        },
        mapOptions = {
            zoom: start.zoom,
            center : new google.maps.LatLng(start.lat, start.lng),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapMaker: true
        };
        if(document.getElementById("map_canvas")!=null){
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            marker = new google.maps.Marker(map)
            directionsDisplay.setMap(map);
            if (document.getElementById("map_directions")!=null) {
                directionsDisplay.setPanel(document.getElementById("map_directions"));
                directionsService.route(travel, function(result, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(result);
                    }
                });
            }
        }
        else {
            return null;
        }
    };
    address = document.getElementById("input_address");
    if(address) {
        address = address.value;
    } else {
        address="184 Nguyễn Văn Linh, Đà Nẵng, Việt Nam"
    };
    // Check for geolocation support
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            // Success!

            createMap({
                coords : false,
                zoom: 16,
                lat : position.coords.latitude,
                lng : position.coords.longitude,
                address : address
            });
        },
        function () {
            // Gelocation fallback
            createMap({
                coords : false,
                zoom: 16,
                lat : 16.06539,
                lng : 108.21659,
                address: address
            });
        }
        );
    }
    else {
        // No geolocation fallback
        createMap({
            coords : false,
            zoom: 15,
            lat : 16.06539,
            lng : 108.21659,
            address: address
        });
    }
}

function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCB5z9z-wlsk5ZdSUe_VM1oyf8shINtqbw&sensor=true&callback=initialize&region=VN";
    document.body.appendChild(script);
}

window.onload = loadScript;
j(document).ready(function() {
    elem = j('#page');
    j('#nav_down').click(
        function (e) {
            j('html, body').animate({
                scrollTop: elem.height()
            }, 800, "easeOutExpo");
        }
        );
    j('#nav_up').click(
        function (e) {
            j('html, body').animate({
                scrollTop: 0
            }, 800, "easeOutExpo");
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
