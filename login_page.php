<?php
require_once 'php/config_sess.php';
require_once 'php/login_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Σύνδεση σε λογαριασμό</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <script src="script/form.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #264428;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        main {
            background-color: #172920;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; 
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form input {
            margin: 10px 0;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"],
        form input[type="reset"] {
            background-color: #161b1a;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover,
        form input[type="reset"]:hover {
            background-color: #495e58;
        }

        form a {
            text-align: center;
            margin-top: 10px;
            color: #ffffff;
            text-decoration: none;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>

<body>
    <header>
        <?php
        print_username();
        ?>
    </header>
    <main>
        <a href="sign_up_page.php">Δημιουργία λογαριασμού</a>
        <form action="php/login.php" method="post">
            <input type="text" name="username" minlength="3" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" id="submit" value="Login">
            <input type="reset" value="Clear">
        </form>
        <?php
        check_login_errors();
        ?>
    </main>
    <?php
    var_dump($_SESSION);
    ?>
    <footer>
        <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
    </footer>
</body>

</html>

