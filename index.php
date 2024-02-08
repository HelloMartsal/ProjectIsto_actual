<?php
require_once 'php/config_sess.php';
require_once 'php/login_control.php';
if (isset($_SESSION["user_type"])){
    direct_to_page();
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
            color: #ffffff;
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
            display: flex; 
            align-items: center; 
        }

        .welcome-message {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .welcome-image {
            max-width: 50%;
            height: auto;
            margin-right: 20px;
        }

        .welcome-text {
            color: #ffffff;
            font-size: 16px;
            line-height: 1.5;
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

        #prev-arrow {
            left: 10px;
        }

        #next-arrow {
            right: 10px;
        }

        #prev-arrow:hover,
        #next-arrow:hover {
            color: black;
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
            <a href="index.php">Συντονισμός εθελοντών</a>
        </span>
    </div>
    <div class="container">
        <div class="main-content">
            <p class="welcome-message">Καλώς ήρθες στην πλατφόρμα συντονισμού εθελοντών!</p>
   
            <img src="../style/indeximage.png" alt="Καλωσορίσατε" class="welcome-image">

            <p class="welcome-text">
                Στις μέρες μας, οι φυσικές καταστροφές αποτελούν μια δυναμική πραγματικότητα που απαιτεί συντονισμένες προσπάθειες και αλληλεγγύη.
                Μέσα σε αυτό το πλαίσιο, η ιστοσελίδα μας δεσμεύεται να παρέχει σημαντικές πληροφορίες για τις φυσικές καταστροφές και τις επιπτώσεις τους
                στην κοινότητα. Επιδιώκουμε να κινητοποιήσουμε τους εθελοντές μας για να παράσχουν βοήθεια και στήριξη σε αυτές τις κρίσιμες στιγμές.
                Με διαφανή και ουσιαστική επικοινωνία, προσφέρουμε μια πλατφόρμα όπου οι κοινότητες μπορούν να συναντηθούν, να ενημερωθούν, και να
                συνεργαστούν για την αντιμετώπιση των προκλήσεων που προκύπτουν από αυτές τις αναγκαίες παρεμβάσεις. Ενώνουμε τις δυνάμεις μας για να
                δημιουργήσουμε ένα περιβάλλον όπου ο συντονισμός και η αλληλεγγύη αποτελούν την πρωταρχική μας αντίληψη, προσφέροντας πρακτική βοήθεια
                και ελπίδα σε εκείνους που τη χρειάζονται περισσότερο.
            </p>
        </div>

        <div class="sidebar">
            <a href="login_page.php">Σύνδεση στον λογαριασμό</a>
            <a href="contact.php">Επικοινωνία</a>
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
