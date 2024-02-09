<?php
    require_once 'php/config_sess.php';
    if ($_SESSION["user_type"] !== "admin") {
        header("Location:../login_page.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Δημιουργία Ανακοινώσεων</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>
<body>
    <div class="container">
        <h1>Δημιουργία Ανακοινώσεων</h1>
        <form id="blogForm">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" required></textarea>

            <label for="categories">Categories:</label>
            <select id="categories" name="categories[]" required>
            </select>
            <label for="items">Items:</label>
            <div id="items">
            </div>

            <button type="button" onclick="submitForm()">Submit</button>
        </form>
        <a href="add_cat_item.php">
            <button>Add Category or Item</button>
        </a>

        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script/blog_script.js"></script>
</body>
</html>
