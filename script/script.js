document.addEventListener("DOMContentLoaded", function () {
    var defaultLocation = [38.246254, 21.735125];
    var defaultZoomLevel = 15;
    var map = L.map('map').setView(defaultLocation, defaultZoomLevel);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    var marker = L.marker(defaultLocation, { draggable: true }).addTo(map);

    marker.on('dragend', function (event) {
        var position = marker.getLatLng();
        console.log("Marker Coordinates:", position);
    });

    document.getElementById('confirmMove').addEventListener('click', function () {
        var position = marker.getLatLng();

        $.ajax({
            type: 'POST',
            url: '../php/process_coordinates.php',
            data: { lat: position.lat, lng: position.lng },
            success: function (response) {
                alert('Συντεταγμένες Αποθηκεύτηκαν: \nΣυντεταγμένες ' + position.lat + ', ' + position.lng);
            },
            error: function (error) {
                alert('Error!\nFailed to send coordinates.');
            }
        });
    });
});