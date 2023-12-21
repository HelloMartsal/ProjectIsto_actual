//TODO KANTO NA DOYLEUEI ME DIO BASE ISOS
//TODO FTIA3E TA BLUE LINES
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
        url: '../php/store_coordinates.php',
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
    var citizensLayerGroup = L.layerGroup().addTo(map);
    var baseLayersGroup = L.layerGroup().addTo(map);

    var customIcon1 = L.icon({
        iconUrl: '../assets/my_icon_map.png',
        iconSize: [35, 35],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

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
    for (var i = 0; i < data.length; i++) {
        var name = data[i].onoma;
            var userType = data[i].usertype;
            var telephone = data[i].phonenum;
            var lastname = data[i].epitheto;
            if (userType === "savior") {
                var marker1 = new L.Marker([data[i].Latitude, data[i].Longitude], { icon: customIcon2 }).addTo(map);
                var content1 = "<h2>" + name + "</h2>" + "<h2>" + lastname + "</h2>" + "<p>" + userType + "</br>" + "<p>" + telephone + "</br>";
                marker1.bindPopup(content1, {
                    maxWidth: '200'
                });
                marker1.addTo(map);
                saviorsLayerGroup.addLayer(marker1);
            } else if (userType === "citizen") {
                var marker2 = new L.Marker([data[i].Latitude, data[i].Longitude], { icon: customIcon1 }).addTo(map);
                var content2 = "<h2>" + name + "</h2>" + "<h2>" + lastname + "</h2>" + "<p>" + userType + "</br>" + "<p>" + telephone + "</br>";
                marker2.bindPopup(content2, {
                    maxWidth: '200'
                });
                marker2.addTo(map);
                var kuklos1 = L.circle(marker2.getLatLng(), {
                    color: 'red',
                    radius: 50
                }).addTo(map);
                citizensLayerGroup.addLayer(marker2);
            }else if(userType === "admin" && name === "base"){
                var marker =new L.marker([data[i].Latitude,data[i].Longitude], { draggable: true, icon: customIcon3 }).addTo(map);
                var kuklos =new L.circle([data[i].Latitude,data[i].Longitude], {
                    draggable: true,
                    color: 'red',
                    radius: 100
                }).addTo(map);
                marker.bindPopup("Βάση ειδών ανάγκης.");
                baseLayersGroup.addLayer(marker);
        
            }
    
    };
    var prev_coordinates = marker.getLatLng();
    marker.on('drag', function (event) {
        kuklos.setLatLng(event.target.getLatLng());
    });
    //Emfanisi tou confirmation box
    marker.on('moveend', function () {
        document.getElementById('confirmationModal').style.display = 'block';
    });
    document.getElementById('confirmMove').addEventListener('click', function () {
        make_ajax_post(marker);
        prev_coordinates = marker.getLatLng();
        document.getElementById('confirmationModal').style.display = 'none';
    });
    //Diaxeirisi koumpioy cancel
    document.getElementById('cancelMove').addEventListener('click', function () {
        document.getElementById('confirmationModal').style.display = 'none';
        marker.setLatLng( prev_coordinates);
        kuklos.setLatLng( prev_coordinates);
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
        layerControl.addOverlay(citizensLayerGroup, 'citizens');
        layerControl.addOverlay(baseLayersGroup, 'base');
        layerControl.addOverlay(saviorsLayerGroup, 'savior');
}


function fetchDataAndHandleMarkers(map) {
    $.ajax({
        type: 'GET',
        url: '../php/map.php',
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


