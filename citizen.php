<?php
require_once 'php/config_sess.php';
if ($_SESSION["user_type"]!=="citizen"){
    header("Location:../login_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Συντονισμός εθελοντών</title>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #264428;
            color: #333;
            margin: 0;
        }
        
        .container {
                    max-width: 1100px;
                    margin: 0 auto;
                    display: flex;
                    flex-direction: column; 
        }
        
        .top-bar {
            background-color: #1d2723;
            padding: 10px;
            text-align: center;
            color: white;
            width: 100%; 
            margin: 0; 
        }
        
        .site-name a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }
        
        .main-content {
            flex: 2;
            padding: 20px;
        }
        .welcome-message {
            color: #ffffff; 
            font-size: 24px; 
            font-weight: bold; 
            margin-bottom: 20px; 
        }


        .welcome-image {
            width: 100%; 
            max-width: 600px; 
            margin-top: 10px;
            border-radius: 8px; 
        }

        
        .arrow {
            font-size: 50px;
            cursor: pointer;
            background-color: transparent;
            border: none;
            color: rgba(0, 0, 0, 0.5);
            position: static;
            top: 50%;
            transform: translateY(-50%);
            transition: color 0.3s;
        }
        
        
        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: right; 
            height: 100vh; 
        }
        
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: left; 
        }
        
        .sidebar a:hover {
            background-color: #555;
        }
        
        footer {
            background-color: #333;
            color: white;
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
            <a href="index.php">Συντονισμός εθελοντών</a></span>

    </div>
    <div class="container">
        <div class="main-content">

            <p class="welcome-message">Welcome citizen!</p>

            <img class="welcome-image" src="../style/citizenpic.png" alt="Welcome Image">
        </div>

        <div class="sidebar">
            <a href="login_page.php">Σύνδεση στον λογαριασμό</a>
            <a href="contact.php">Επικοινωνία</a>
            <a href="show_announ.php">Ανακοινώσεις</a>
            <a href="logout.php">Αποσύνδεση</a>

        </div>
    </div>

</body>
<footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
</footer>

</html>


