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
    <style>
        body {
            background-color: #445348; 
            color: #f3f3f3; /* Χρώμα κειμένου του body */
            font-family: Arial, sans-serif;
        }

        .container {
            margin: auto;
            padding: 20px;
            background-color: #374238; /* Χρώμα φόντου της περιοχής container */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        h1 {
            color: #def3df; /* Χρώμα κειμένου του τίτλου h1 */
        }

        label {
            color: #b6d4b7; /* Χρώμα κειμένου των ετικετών label */
            margin-top: 10px;
            display: block;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #2f332f; /* Χρώμα περιγράμματος input, textarea, select */
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #333; /* Χρώμα φόντου input, textarea, select */
            color: #fff; /* Χρώμα κειμένου input, textarea, select */
        }

        button {
            background-color: #6b756c; /* Χρώμα φόντου κουμπιού */
            color: #ffffff; /* Χρώμα κειμένου κουμπιού */
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #435743; /* Χρώμα φόντου κουμπιού κατά το hover */
        }

        #items {
            color: #4d744e; /* Χρώμα κειμένου της περιοχής με τα αντικείμενα */
        }

        a {
            text-decoration: none;
        }

        a button {
            background-color: #2c2626; /* Χρώμα φόντου κουμπιού συνδέσμου */
            color: #ffffff; /* Χρώμα κειμένου κουμπιού συνδέσμου */
            border: 1px solid #2a2c2a; /* Χρώμα περιγράμματος κουμπιού συνδέσμου */
            margin-top: 10px;
        }

        a button:hover {
            background-color: #4b5c4d; /* Χρώμα φόντου κουμπιού συνδέσμου κατά το hover */
            color: #fff; /* Χρώμα κειμένου κουμπιού συνδέσμου κατά το hover */
        }

        #result {
            margin-top: 20px;
            padding: 10px;
            background-color: #332d2d; /* Χρώμα φόντου της περιοχής αποτελέσματος */
            border: 1px solid #242020; /* Χρώμα περιγράμματος της περιοχής αποτελέσματος */
            border-radius: 4px;
        }
    </style>
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
