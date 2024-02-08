<?php
require_once 'php/config_sess.php';
if ($_SESSION["user_type"]!=="savior"){
    header("Location: ../login_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>My Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <link rel="stylesheet" href="style/map_style.css"/>
    <script src="script/savior_map_script.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body onload="init()">
    <div id="map"></div>
    <div id="confirmationModal">
        <p>Θέλετε να αποθηκεύσετε τις συντεταγμένες σας;</p>
        <button id="confirmMove">Επιβεβαίωση</button>
        <button id="cancelMove">Άκυρο</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script/savior_map_script.js"></script>
</body>

    <footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
    </footer>
</html>
