// TODO ADD THE REQUIRED DATAILS FOR SAVIOR
function init() {
    var map = L.map('map').setView([38.246254, 21.735125], 15);
    var osmLink = "<a href='http://www.openstreetmap.org'>Open StreetMap</a>";
    L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + osmLink,
            maxZoom: 18
        }).addTo(map);
    fetchDataAndHandleMarkers(map);
}
function make_ajax_post(marker){
    var coordinates = marker.getLatLng();
    $.ajax({
        type: 'POST',
        url: '../php/savior_save_pos.php',
        data: {
            lat: coordinates.lat,
            lng: coordinates.lng
        },
        success: function (response) {
            alert("Συντεταγμένες Αποθηκεύτηκαν: " + coordinates.lat + ", " + coordinates.lng);
        },
        error: function (error) {
            alert('Error!\nFailed to send coordinates.');
        }
    });
}

function handleMarkers(data, map) {
    var saviorsLayerGroup = L.layerGroup().addTo(map);
    var baseLayersGroup = L.layerGroup().addTo(map);
    var requestLayerGroup = L.layerGroup().addTo(map);
    var offerLayerGroup = L.layerGroup().addTo(map);


    var customIcon2 = L.icon({
        iconUrl: '../assets/fireman_icon_map.png',
        iconSize: [35, 35],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

    var customIcon3 = L.icon({
        iconUrl: '../assets/base_icon_map.png',
        iconSize: [45, 45],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

    var customIcon4 = L.icon({
        iconUrl: '../assets/icons8-request-48.png',
        iconSize: [35, 35],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });
    var customIcon5 = L.icon({
        iconUrl: '../assets/icons8-donation-64.png',
        iconSize: [35, 35],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });
    for (var i = 0; i < data.users.length; i++) {
        var name = data.users[i].onoma;
        var userType = data.users[i].usertype;
        var telephone = data.users[i].phonenum;
        var lastname = data.users[i].epitheto;
        var marker1 = new L.Marker([data.users[i].Latitude, data.users[i].Longitude], {draggable: true, icon: customIcon2 }).addTo(map);
        var content1 = "<h2>" + name + "</h2>" + "<h2>" + lastname + "</h2>" + "<p>" + userType + "</br>" + "<p>" + telephone + "</br>";
        marker1.bindPopup(content1, {
            maxWidth: '200'
        });
        marker1.addTo(map);
        saviorsLayerGroup.addLayer(marker1);
    
    };
    for (var i = 0; i < data.base.length; i++) {
        var name = data.base[i].onoma;
        var userType = data.base[i].usertype;
        var telephone = data.base[i].phonenum;
        var lastname = data.base[i].epitheto;
        var marker2 = new L.Marker([data.base[i].Latitude, data.base[i].Longitude], { icon: customIcon3 }).addTo(map);
        var content2 = "<h2>" + name + "</h2>" + "<h2>" + lastname + "</h2>" + "<p>" + userType + "</br>" + "<p>" + telephone + "</br>" +"<button id='delivery'>Παράδωση</button>" ;
        marker2.bindPopup(content2, {
            maxWidth: '200'
        });
        marker2.addTo(map);
        var kuklos2 = L.circle(marker2.getLatLng(), {
            color: 'red',
            radius: 100
        }).addTo(map);
        baseLayersGroup.addLayer(marker2);
        marker2.on('popupopen', function() {
            var btn = document.getElementById('delivery');
            btn.addEventListener('click', function() {
                if (inrange(marker1, marker2)) {
                    alert('Παράδωση Επιτυχής');
                }
            });
        });
    }
    var request_markers = [];
    for (var i = 0; i < data.requests.length; i++) {
        var name = data.requests[i].onoma;
        var userType = data.requests[i].usertype;
        var telephone = data.requests[i].phonenum;
        var lastname = data.requests[i].epitheto;
        var people = data.requests[i].people;
        var time = data.requests[i].time;
        var product_name = data.requests[i].product_name;
        var username_veh = data.requests[i].username_veh;
        var accept_date = data.requests[i].accept_date;
        var Latitude = data.requests[i].Latitude;
        var Longitude = data.requests[i].Longitude;
        var marker4 = new L.Marker([Latitude, Longitude], {
             icon: customIcon4,
            request_id : data.requests[i].id_req 
            }).addTo(map);
        request_markers.push(marker4);
        var content4 = "<h2>Name: " + name + "</h2>" 
        + "<h2>Last Name: " + lastname + "</h2>" 
        + "<p>Telephone: " + telephone + "</br>" 
        + "<p>People: " + people + "</br>" 
        + "<p>Time: " + time + "</br>" 
        + "<p>Product Name: " + product_name + "</br>" 
        + "<p>Username Vehicle: " + username_veh + "</br>" 
        + "<p>Accept Date: " + accept_date + "</br>"
        + "<button id='delivery'>Παράδωση</button>";        
        marker4.bindPopup(content4, {
            maxWidth: '200'
        });
        marker4.addTo(map);
        var kuklos4 = L.circle(marker4.getLatLng(), {
            color: 'red',
            radius: 50
        }).addTo(map);
        requestLayerGroup.addLayer(marker4);
        marker4.on('popupopen', function() {
            var btn = document.getElementById('delivery');
            btn.addEventListener('click', function() {
                if (inrange(marker1, marker4)) {
                    alert('Παράδωση Επιτυχής');
                }
            });
        });
    };
    var offer_markers = [];
    for (var i = 0; i < data.offers.length; i++) {
        var name = data.offers[i].onoma;
        var userType = data.offers[i].usertype;
        var telephone = data.offers[i].phonenum;
        var lastname = data.offers[i].epitheto;
        var quantity = data.offers[i].quant;
        var time = data.offers[i].time;
        var product_name = data.offers[i].product_name;
        var username_veh = data.offers[i].username_veh;
        var accept_date = data.offers[i].accept_date;
        var Latitude = data.offers[i].Latitude;
        var Longitude = data.offers[i].Longitude;
        var marker5 = new L.Marker([Latitude, Longitude], { 
            icon: customIcon5,
            offer_id : data.offers[i].id_off
        }).addTo(map);
        offer_markers.push(marker4);
        var content5 = "<h2>Name: " + name + "</h2>"
        + "<h2>Last Name: " + lastname + "</h2>"
        + "<p>Telephone: " + telephone + "</br>"
        + "<p>Quantity: " + quantity + "</br>"
        + "<p>Time: " + time + "</br>"
        + "<p>Product Name: " + product_name + "</br>"
        + "<p>Username Vehicle: " + username_veh + "</br>"
        + "<p>Accept Date: " + accept_date + "</br>"
        + "<button id='extract'> Παραλαβή </button>";
        marker5.bindPopup(content5, {
            maxWidth: '200'
        });
        marker5.addTo(map);
        var kuklos5 = L.circle(marker5.getLatLng(), {
            color: 'red',
            radius: 50
        }).addTo(map);
        offerLayerGroup.addLayer(marker5);
        marker5.on('popupopen', function() {
            var btn = document.getElementById('extract');
            btn.addEventListener('click', function() {
                if(inrange(marker1, marker5)){
                    alert('Παραλαβή Επιτυχής');
                }
            });
        });
    };
    
    //Emfanisi tou confirmation box
    prev_coordinates = marker1.getLatLng();
    marker1.on('moveend', function () {
        document.getElementById('confirmationModal').style.display = 'block';
    });
    document.getElementById('confirmMove').addEventListener('click', function () {
        make_ajax_post(marker1);
        prev_coordinates = marker1.getLatLng();
        document.getElementById('confirmationModal').style.display = 'none';
    });
    //Diaxeirisi koumpioy cancel
    document.getElementById('cancelMove').addEventListener('click', function () {
        document.getElementById('confirmationModal').style.display = 'none';
        marker1.setLatLng( prev_coordinates);
    });
    //Dimiourgia pop up
    var popup = L.popup();
    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("Κάνατε κλικ στις συντεταγμένες: " + e.latlng.toString())
            .openOn(map);
    }
    map.on('click', onMapClick);
    //Diaxeirisi layers
    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
        });

        const baseLayers = {
            'OpenStreetMap': osm,
            'OpenStreetMap.HOT': osmHOT
        };
        const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {	maxZoom: 19,
        attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });


        const layerControl = L.control.layers(baseLayers).addTo(map);
        layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
        layerControl.addOverlay(requestLayerGroup, 'request');
        layerControl.addOverlay(offerLayerGroup, 'offer');
        layerControl.addOverlay(baseLayersGroup, 'base');
        layerControl.addOverlay(saviorsLayerGroup, 'savior');
}


function fetchDataAndHandleMarkers(map) {
    $.ajax({
        type: 'GET',
        url: '../php/savior_map.php',
        dataType: 'json',
        success: function (data) {
            handleMarkers(data,map);
        },
        error: function (error) {
            // Handle error
            console.error('Error occurred:', error);
        }

        
    });
}

function inrange(saviorMarker, otherMarker) {
    var saviorLatLng = saviorMarker.getLatLng();
    var otherLatLng = otherMarker.getLatLng();

    var distance = saviorLatLng.distanceTo(otherLatLng);
    if (distance < 50) {
        console.log(distance);
        return true;
    }
    else {
        console.log(distance);
        return false;
    }

}

