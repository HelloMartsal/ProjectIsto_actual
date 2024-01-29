// TODO FIX MULTIPLE OFFERS ON THE SAME SPOT
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
        var content2 = "<h2>" + name + "</h2>" 
        + "<h2>" + lastname + "</h2>" 
        + "<p>" + userType + "</br>" 
        + "<p>" + telephone + "</br>" 
        +"<button id='delivery'>Παράδοση</button>"
        +"<button id='extract'>Παραλαβή</button>";
        marker2.bindPopup(content2, {
            maxWidth: '200'
        });
        marker2.addTo(map);
        var kuklos2 = L.circle(marker2.getLatLng(), {
            color: 'red',
            radius: 100
        }).addTo(map);
        baseLayersGroup.addLayer(marker2);
        baseLayersGroup.addLayer(kuklos2);
        marker2.on('popupopen', function() {
            var btn = document.getElementById('delivery');
            btn.addEventListener('click', function() {
                if (inrange(marker1, this, 100)) {
                    on_off_load('offer');
                }
            }.bind(this));
        });
        marker2.on('popupopen', function() {
            var btn2 = document.getElementById('extract');
            btn2.addEventListener('click', function() {
                if (inrange(marker1, this, 100)) {
                    on_off_load('request');
                    alert('Φόρτωση Επιτυχής');
                }
            }.bind(this));
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
        var savior_id = data.requests[i].savior_id;
        var product_names = [];
        var productNamesObj = data.requests[i].product_names;
        for (var key in productNamesObj) {
            if (productNamesObj.hasOwnProperty(key)) {
                product_names.push(productNamesObj[key]);
            }
        }
        var username_veh = data.requests[i].username_veh;
        var accept_date = data.requests[i].accept_date;
        var Latitude = data.requests[i].Latitude;
        var Longitude = data.requests[i].Longitude;
        var state = data.requests[i].state;
        if (savior_id != null && state == "accepted") {
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
            + "<p>Product Name</br>"; 
            for (var j = 0; j < product_names.length; j++) {
                content4 += "<p>" + product_names[j] + "</p>"; 
            }
            
            content4 += "<p>Username Vehicle: " + username_veh + "</br>" 
            + "<p>Accept Date: " + accept_date + "</br>";      
            marker4.bindPopup(content4, {
                maxWidth: '200'
            });
            marker4.addTo(map);
            requestLayerGroup.addLayer(marker4);
        } else if (savior_id == null) {
            var marker7 = new L.Marker([Latitude, Longitude], {
                icon: customIcon4,
                request_id : data.requests[i].id_req 
                }).addTo(map);
            request_markers.push(marker7);
            var content7 = "<h2>Name: " + name + "</h2>" 
            + "<h2>Last Name: " + lastname + "</h2>" 
            + "<p>Telephone: " + telephone + "</br>" 
            + "<p>People: " + people + "</br>" 
            + "<p>Time: " + time + "</br>" 
            + "<p>Product Name</br>"; 
            for (var j = 0; j < product_names.length; j++) {
                content7 += "<p>" + product_names[j] + "</p>"; 
            }
            
            content7 +="<button id='accept'>Ανάληψη Task</button>";        
            marker7.bindPopup(content7, {
                maxWidth: '200'
            });
            marker7.addTo(map);
            var kuklos7 = L.circle(marker7.getLatLng(), {
                color: 'red',
                radius: 50
            }).addTo(map);
            requestLayerGroup.addLayer(marker7);
            requestLayerGroup.addLayer(kuklos7);
            marker7.on('popupopen', function() {
                var btn = document.getElementById('accept');
                btn.addEventListener('click', function() {
                    accept_task(this.options.request_id, 'request');
                    alert('Ανάληψη Επιτυχής');
                }.bind(this)); 
            });
        }else if(state == "loaded" && savior_id != null){
            var marker7 = new L.Marker([Latitude, Longitude], {
                icon: customIcon4,
                request_id : data.requests[i].id_req 
                }).addTo(map);
            request_markers.push(marker7);
            var content7 = "<h2>Name: " + name + "</h2>" 
            + "<h2>Last Name: " + lastname + "</h2>" 
            + "<p>Telephone: " + telephone + "</br>" 
            + "<p>People: " + people + "</br>" 
            + "<p>Time: " + time + "</br>" 
            + "<p>Product Name</br>"; 
            for (var j = 0; j < product_names.length; j++) {
                content7 += "<p>" + product_names[j] + "</p>"; 
            }
            
            content7 +="<button id='delivery'>Παράδοση</button>";         
            marker7.bindPopup(content7, {
                maxWidth: '200'
            });
            marker7.addTo(map);
            var kuklos7 = L.circle(marker7.getLatLng(), {
                color: 'red',
                radius: 50
            }).addTo(map);
            requestLayerGroup.addLayer(marker7);
            requestLayerGroup.addLayer(kuklos7);
            marker7.on('popupopen', function() {
                var btn2 = document.getElementById('delivery');
                btn2.addEventListener('click', function() {
                    if (inrange(marker1, this, 50)) {
                        make_ajax_post(marker1);
                        accept_task(this.options.request_id, 'delivery');
                        alert('Παράδοση Επιτυχής');
                    }
                }.bind(this)); 
            });
        }

    };
    var offer_markers = [];
    for (var i = 0; i < data.offers.length; i++) {
        var name = data.offers[i].onoma;
        var userType = data.offers[i].usertype;
        var telephone = data.offers[i].phonenum;
        var lastname = data.offers[i].epitheto;
        var time = data.offers[i].time;
        var savior_id = data.offers[i].savior_id;
        var product_names = [];
        var quantities = [];
        var quantitiesObj = data.offers[i].quantities;
        var productNamesObj = data.offers[i].product_names;
        for (var key in productNamesObj) {
            if (productNamesObj.hasOwnProperty(key)) {
                product_names.push(productNamesObj[key]);
            }
        }
        for (var key in quantitiesObj) {
            if (quantitiesObj.hasOwnProperty(key)) {
                quantities.push(quantitiesObj[key]);
            }
        }
        var username_veh = data.offers[i].username_veh;
        var accept_date = data.offers[i].accept_date;
        var Latitude = data.offers[i].Latitude;
        var Longitude = data.offers[i].Longitude;
        if (data.offers[i].savior_id != null) {
            var marker5 = new L.Marker([Latitude, Longitude], { 
                icon: customIcon5,
                offer_id : data.offers[i].id_off
            }).addTo(map);
            offer_markers.push(marker5);
            var content5 = "<h2>Name: " + name + "</h2>" 
            + "<h2>Last Name: " + lastname + "</h2>" 
            + "<p>Telephone: " + telephone + "</br>" 
            + "<p>Time: " + time + "</br>" 
            + "<p>Product Name and Quantity: </br>"; 
            
            for (var j = 0; j < product_names.length; j++) {
                content5 += "<p>" + product_names[j] + ": " + quantities[j] + "</p>"; 
            }
            
            content5 += "<p>Username Vehicle: " + username_veh + "</br>" 
            + "<p>Accept Date: " + accept_date + "</br>"; 
            marker5.bindPopup(content5, {
                maxWidth: '200'
            });
            marker5.addTo(map);
            offerLayerGroup.addLayer(marker5);
        } else {
            var marker6 = new L.Marker([Latitude, Longitude], { 
                icon: customIcon5,
                offer_id : data.offers[i].id_off
            }).addTo(map);
            offer_markers.push(marker6);
            var content6 = "<h2>Name: " + name + "</h2>" 
            + "<h2>Last Name: " + lastname + "</h2>" 
            + "<p>Telephone: " + telephone + "</br>" 
            + "<p>Time: " + time + "</br>" 
            + "<p>Product Name and Quantity: </br>"; // start product name and quantity section
            
            for (var j = 0; j < product_names.length; j++) {
                content6 += "<p>" + product_names[j] + ": " + quantities[j] + "</p>"; // add each product name and its quantity
            }
            
            content6 += "<button id='extract'> Παραλαβή </button>";
            marker6.bindPopup(content6, {
                maxWidth: '200'
            });
            marker6.addTo(map);
            var kuklos6 = L.circle(marker6.getLatLng(), {
                color: 'red',
                radius: 50
            }).addTo(map);
            offerLayerGroup.addLayer(marker6);
            offerLayerGroup.addLayer(kuklos6);
            marker6.on('popupopen', function() {
                var btn = document.getElementById('extract');
                btn.addEventListener('click', function() {
                    if(inrange(marker1, this, 50)){
                        make_ajax_post(marker1);
                        accept_task(this.options.offer_id, 'offer');
                        alert('Παραλαβή Επιτυχής');
                    }
                }.bind(this));
            });
        }
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

function inrange(saviorMarker, otherMarker,dist) {
    var saviorLatLng = saviorMarker.getLatLng();
    var otherLatLng = otherMarker.getLatLng();

    var distance = saviorLatLng.distanceTo(otherLatLng);
    if (distance < dist) {
        return true;
    }
    else {
        return false;
    }

}

function accept_task(task_id,type){
    $.ajax({
        type: 'POST',
        url: '../php/savior_accept_task.php',
        data: {
            task_id: task_id,
            type: type
        },
        success: function (response) {
            if(response){
                alert(response)
            }
        },
        error: function (error) {
            alert('Error!\nFailed to send coordinates.');
        }
    });
}

function on_off_load(type){
    $.ajax({
        type: 'POST',
        url: '../php/base_load.php',
        data: {
            type: type
        },
        success: function (response) {
            if(response){
                alert(response)
            }
        },
        error: function (error) {
            alert('Error!\nFailed to send coordinates.');
        }
    });
}

