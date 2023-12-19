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
    <?php
var_dump($_SESSION);
?>
    <footer>
        <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
    </footer>
</body>
</html>
