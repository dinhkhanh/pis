var j = jQuery.noConflict();
var map;
var geocoder;
var centerChangedLast;
var reverseGeocodedLast;
var currentReverseGeocodeResponse;
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
            }
            directionsService.route(travel, function(result, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(result);
                }
            });
        }
        else {
            return null;
        }
    };
    address = document.getElementById("input_address");
    if(address) {
        address = address.value;
    } else {
        address="Đại học Duy Tân, Nguyễn Văn Linh, Đà Nẵng, Việt Nam"
    }
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            createMap({
                coords : false,
                zoom: 16,
                lat : position.coords.latitude,
                lng : position.coords.longitude,
                address : address
            });
        },
        function () {
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
        createMap({
            coords : false,
            zoom: 15,
            lat : 16.06539,
            lng : 108.21659,
            address: address
        });
    }
    geocoder = new google.maps.Geocoder();
    setupEvents();
    centerChanged();
}
function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();
    setInterval(function() {
        if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
            if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
                reverseGeocode();
        }
    }, 1000);

    google.maps.event.addListener(map, 'center_changed', centerChanged);
    google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
        map.setZoom(map.getZoom() + 1);
    });

}

function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
}

function centerChanged() {
    centerChangedLast = new Date();
    currentReverseGeocodeResponse = null;
}

function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({
        latLng:map.getCenter()
    },reverseGeocodeResult);
}

function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if(status == 'OK') {
        if(results.length != 0) {
            currentReverseGeocodeResponse = results[0].formatted_address;
        }
    }
}

function geocode() {
    var address = document.getElementById("address").value;
    geocoder.geocode({
        'address': address,
        'partialmatch': true
    }, geocodeResult);

    var directionsService = new google.maps.DirectionsService(),
    directionsDisplay = new google.maps.DirectionsRenderer(),
    des='';
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            des = position.coords.latitude +","+ position.coords.longitude;
        });
        var travel = {
            origin : des,
            destination : address,
            travelMode : google.maps.DirectionsTravelMode.DRIVING
        };
        directionsDisplay.setMap(map);
        if (document.getElementById("map_route")!=null) {
            directionsDisplay.setPanel(document.getElementById("map_route"));
        }
        directionsService.route(travel, function(result, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(result);
            }
        });
    }
}

function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
        map.fitBounds(results[0].geometry.viewport);
        addMarkerAtCenter();
    } else {
        alert("Geocode was not successful for the following reason: " + status);
    }
}


function addMarkerAtCenter() {
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map
    });

    var text = document.getElementById("address").value.toUpperCase();
    if(currentReverseGeocodeResponse) {
        var addr = '';
        if(currentReverseGeocodeResponse.size == 0) {
            addr = 'None';
        } else {
            addr = currentReverseGeocodeResponse[0].formatted_address;
        }
        text = text + '<br>' + 'address: <br>' + addr;
    }

    var infowindow = new google.maps.InfoWindow({
        content: text
    });
    infowindow.open(map,marker);
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
