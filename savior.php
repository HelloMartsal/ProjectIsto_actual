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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/start.css">
    <title>Συντονισμός εθελοντών</title>
</head>

<body>
    <div class="top-bar">
        <span class="site-name">
            <a href="index.php">Συντονισμός εθελοντών</a></span>

    </div>
    <div class="container">
        <div class="main-content">
            <!-- Main content goes here -->
            <p>Welcome savior!</p>
        </div>

        <div class="sidebar">
            <a href="login_page.php">Σύνδεση στον λογαριασμό</a>
            <a href="contact.php">Επικοινωνία</a>
            <a href="php/logout.php">Αποσύνδεση</a>

        </div>
    </div>

</body>
<?php
var_dump($_SESSION);
?>
<footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
</footer>

</html>