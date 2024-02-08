<?php
require_once 'php/config_sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/con_style.css">
    <title>Contact Form</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #264428;
    color: #333;
    margin: 0;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #4f855c;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.top-bar {
    background-color: #1d2723;
    padding: 10px;
    text-align: center;
    color: rgb(255, 255, 255);
    width: 100%;
}

.site-name a {
    color: rgb(255, 255, 255);
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
}

.contact-form {
    display: grid;
    gap: 10px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #2f4b34;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #486948;
    color: rgb(255, 255, 255);
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #779c79;
}

footer {
    background-color: #333;
    color: rgb(255, 255, 255);
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>
    <div class="top-bar">
        <span class="site-name">
            <a href="index.html">Συντονισμός εθελοντών</a></span>

    </div>
    <div class="container">
        <form action="#" method="post" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
    <footer>
        <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
    </footer>
</body>
</html>