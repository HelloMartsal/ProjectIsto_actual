<?php
    require_once 'php/config_sess.php';
    if ($_SESSION["user_type"]!=="citizen"){
        header("Location:../login_page.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Δημιουργία Αιτήσεων</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>

<body>
    <div class="container">
        <h1>Δημιουργία Αίτησης</h1>
        <form id="blogForm">
            <label for="people">Άτομα:</label>
            <input type="number" id="people" name="people" required>
            <label for="categories">Κατηγορίες:</label>
            <select id="categories" name="categories[]" required>
            </select>
            <label for="items">Είδη:</label>
            <div id="items">
            </div>
            <button type="button" onclick="submitForm()">Υποβολή</button>
        </form>
        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script/request_page.js"></script>
</body>
</html>
