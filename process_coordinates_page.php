<?php
require_once 'php/config_sess.php';
require_once 'php/process_coordinates_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select your locations</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #map { height: 400px; }
    </style>
</head>
<body>
<header>
    <p><strong>Επιλέξτε την θέση σας.</br></strong></p>
</header>
<div id="map"></div>

<button id="confirmMove">Confirm Position</button>

<form action="php/sign_up_coor_next.php" method="post">
    <button type="submit" name="nextButton">Next</button>
</form>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="script/script.js"></script>
<script src="script/nextbutton.js"></script>

</body>
<?php
var_dump($_SESSION);
?>
<footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
</footer>
</html>
