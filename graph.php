<?php
require_once 'php/config_sess.php';
if ($_SESSION["user_type"]!=="admin"){
    header("Location:../login_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Γράφημα Αιτημάτων και Προσφορών</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="stylesheet" href="style/style_graph.css">

</head>
<body>
    <div id="datepicker-container">
        <label for="startDate">Από:</label>
        <input type="text" id="startDate">
        <label for="endDate">Έως:</label>
        <input type="text" id="endDate">
        <button id="filterButton">Εφαρμογή</button>
        <button id="showAllButton">Εμφάνιση Όλων</button>
    </div>
    <canvas id="myChart" width="350" height="350"></canvas>
    <script src="script/graph.js"></script>
</body>
</html>


