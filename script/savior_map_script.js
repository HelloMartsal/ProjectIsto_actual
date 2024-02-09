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
                    make_ajax_post(marker1);
                    on_off_load('offer');
                }
            }.bind(this));
        });
        marker2.on('popupopen', function() {
            var btn2 = document.getElementById('extract');
            btn2.addEventListener('click', function() {
                if (inrange(marker1, this, 100)) {
                    make_ajax_post(marker1);
                    on_off_load('request');
                    alert('Φόρτωση Επιτυχής');
                }
            }.bind(this));
        });
    }
    var request_markers = [];
    var req_keys = Object.keys(data.requests);
    for (var i = 0; i < req_keys.length; i++) {
        var key = req_keys[i];
        var values = data.requests[key];
        var number = values.length;
        var Latitude = values[0].Latitude;
        var Longitude = values[0].Longitude;
        var content = [];
        flag = 0;
        for (var j = 0; j < number; j++) {
            var name = values[j].onoma;
            var userType = values[j].usertype;
            var telephone = values[j].phonenum;            
            var lastname = values[j].epitheto;
            var people = values[j].people;
            var time = values[j].time;
            var product_names = [];
            var quantitiesObj = values[j].quantities;
            var productNamesObj = values[j].product_names;
            var state = values[j].state;
            var savior_id = values[j].savior_id;
            var accept_date = values[j].accept_date;
            var username_veh = values[j].username_veh;
            for (var key in productNamesObj) {
                if (productNamesObj.hasOwnProperty(key)) {
                    product_names.push(productNamesObj[key]);
                }
            }
            var index = number+"a"+ j;
            content[index] = "<h2>Αίτηση "+j+"</h2>";
            content[index] += "<h2>Name: " + name + "</h2>"
            + "<h2>Last Name: " + lastname + "</h2>"
            + "<p>People: " + people + "</br>"
            + "<p>Telephone: " + telephone + "</br>"
            + "<p>Ημερομηνία Δημ/γιας: " + time + "</br>"
            + "<p>Product Name: </br>";
            for (var l = 0; l < product_names.length; l++) {
                content[index] += "<p>" + product_names[l] + "</p>"; 
            }
            if (state == "nothing"){
                content[index] += "<button id='accept_req"+index+"' data-request-id = '"+ values[j].id_req +"'>Ανάληψη Task</button>";
            }else if (state == "loaded"){
                content[index] += "<button id='deliver"+index+"' data-request-id = '"+ values[j].id_req +"'>Παράδοση</button>";
            }else if (state == "accepted"){
                content[index] += "<p>Διασώστης: "+savior_id +"</p>"
                +"<p>Όχημα: " + username_veh + "</p>"
                +"<p>Παραλαβή: " + accept_date + "</p>"
                +"<p>Κατάσταση: " + state + "</p>";
        }
        var markerreq = new L.Marker([Latitude, Longitude], {
            icon: customIcon4,
            number : number,
            content : content,
            request_id : key
            }).addTo(map);
        var contentreq = "<h2>Αίτηση</h2>"
        + "<p>Όνομα: " +values[0].onoma +" "+values[0].epitheto+ "</br>";
        for (var k = 0; k < number; k++) {
            contentreq += "<button id='req_extract" +number+"a"+k + "'>Αίτηση "+(k+1) +"</button>";

        }
        markerreq.bindPopup(contentreq, {
            maxWidth: '200'
        });
        var kuklosreq = L.circle(markerreq.getLatLng(), {
            color: 'red',
            radius: 50
        }).addTo(map);
        requestLayerGroup.addLayer(markerreq);
        requestLayerGroup.addLayer(kuklosreq);
        markerreq.on('popupopen', function() {
            var btn = [];
            for (var k = 0; k < this.options.number; k++) {
                btn[k] = document.getElementById('req_extract' +this.options.number+"a"+ k);
                var popup = L.popup();
                var index = this.options.number+"a"+ k;
        
                // IIFE
                //In this code, (function(index, btn, popup) {...}).bind(this)(index, btn[k], popup);
                // creates a new function for each iteration of the loop, each with its own index, btn, 
                //and popup variables. This ensures that each event listener is referencing the correct values.
                (function(index, btn, popup) {
                    btn.addEventListener('click', function() {
                        popup
                            .setLatLng(this.getLatLng())
                            .setContent(this.options.content[index])
                            .openOn(map);
                            var marker = this;
                            (function(index) {
                                var acceptButton = document.getElementById('accept_req' + index);
                                console.log(acceptButton);
                                if (acceptButton) {
                                    acceptButton.addEventListener('click', function() {
                                        var request_id = acceptButton.dataset.requestId;
                                        make_ajax_post(marker1);
                                        accept_task(request_id, 'request');
                                        alert('Ανάληψη Επιτυχής');
                                    });
                                }
                            })(index);

                            (function(index,marker) {
                                var deliverButton = document.getElementById('deliver' + index);
                                console.log(deliverButton);
                                if (deliverButton) {
                                    deliverButton.addEventListener('click', function() {
                                        if (inrange(marker1, marker, 100)) {
                                            var request_id = deliverButton.dataset.requestId;
                                            make_ajax_post(marker1);
                                            accept_task(request_id, 'delivery');
                                            alert('Παράδοση Επιτυχής');
                                        }
                                    });
                                }
                            })(index,marker);
                    }.bind(this));
                }).bind(this)(index, btn[k], popup);
            }
        });
    }
    }

    var keys = Object.keys(data.offers);
    for (var i = 0; i < keys.length; i++) {
        var key = keys[i];
        var values = data.offers[key];
        var number = values.length;
        var Latitude = values[0].Latitude;
        var Longitude = values[0].Longitude;
        var content = [];
        flag = 0;
        for (var j = 0; j < number; j++) {
            var name = values[j].onoma;
            var userType = values[j].usertype;
            var telephone = values[j].phonenum;
            var lastname = values[j].epitheto;
            var time = values[j].time;
            var product_names = [];
            var quantities = [];
            var quantitiesObj = values[j].quantities;
            var productNamesObj = values[j].product_names;
            var savior_id = values[j].savior_id;
            var state = values[j].state;
            var accept_date = values[j].accept_date;
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
            var index = number+"b"+ j;
            if (savior_id != null) {
                content[index] = "<h2>Προσφορά "+j+"</h2>";
                content[index] += "<h2>Name: " + name + "</h2>"
                + "<h2>Last Name: " + lastname + "</h2>"
                + "<p>Telephone: " + telephone + "</br>"
                + "<p>Ημερομηνία Δημ/γιας: " + time + "</br>"
                + "<p>Product Name and Quantity: </br>";
                for (var l = 0; l < product_names.length; l++) {
                    content[index] += "<p>" + product_names[l] + ": " + quantities[l] + "</p>"; 
                }
                content[index] += "<p>Διασώστης: " + savior_id + "</p>"
                +"<p>Παραλαβή: " + accept_date + "</p>";
                continue;
            }
            content[index] = "<h2>Προσφορά "+j+"</h2>";
            content[index] += "<h2>Name: " + name + "</h2>"
            + "<h2>Last Name: " + lastname + "</h2>"
            + "<p>Telephone: " + telephone + "</br>"
            + "<p>Time: " + time + "</br>"
            + "<p>Product Name and Quantity: </br>"; 
            
            for (var l = 0; l < product_names.length; l++) {
                content[index] += "<p>" + product_names[l] + ": " + quantities[l] + "</p>"; 
            }
            
            content[index] += "<button id='accept"+index+"' data-offer-id = '"+ values[j].id_off +"'>Παραλαβή</button>";
            
        }
        var markeroff = new L.Marker([Latitude, Longitude], {
            icon: customIcon5,
            number : number,
            content : content,
            offer_id : key
            }).addTo(map);
        var contentoff = "<h2>Προσφορά</h2>"
        + "<p>Όνομα: " +values[0].onoma +" "+values[0].epitheto+ "</br>";
        for (var k = 0; k < number; k++) {
            contentoff += "<button id='extract" +number+"b"+k + "'>Προσφορά "+(k+1) +"</button>";
        }
        markeroff.bindPopup(contentoff, {
            maxWidth: '200'
        });
        var kuklosoff = L.circle(markeroff.getLatLng(), {
            color: 'red',
            radius: 50
        }).addTo(map);
        offerLayerGroup.addLayer(markeroff);
        offerLayerGroup.addLayer(kuklosoff);

        markeroff.on('popupopen', function() {
            var btn = [];
            for (var k = 0; k < this.options.number; k++) {
                btn[k] = document.getElementById('extract' +this.options.number+"b"+ k);
                var popup = L.popup();
                var index = this.options.number+"b"+ k;
        
                // IIFE
                //In this code, (function(index, btn, popup) {...}).bind(this)(index, btn[k], popup);
                // creates a new function for each iteration of the loop, each with its own index, btn, 
                //and popup variables. This ensures that each event listener is referencing the correct values.
                (function(index, btn, popup) {
                    btn.addEventListener('click', function() {
                        popup
                            .setLatLng(this.getLatLng())
                            .setContent(this.options.content[index])
                            .openOn(map);
                            var marker = this;
                            (function(index,marker) {
                                var acceptButton = document.getElementById('accept' + index);
                                console.log(acceptButton);
                                if (acceptButton) {
                                    acceptButton.addEventListener('click', function() {
                                        if (inrange(marker1, marker, 100)) {
                                            var offer_id = acceptButton.dataset.offerId;
                                            make_ajax_post(marker1);
                                            accept_task(offer_id, 'offer');
                                            alert('Παραλαβή Επιτυχής');
                                        }
                                    });
                                }
                            })(index,marker);
                    }.bind(this));
                }).bind(this)(index, btn[k], popup);
            }
        });
        
    }
    
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

