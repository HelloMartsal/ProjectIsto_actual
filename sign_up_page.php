<?php
require_once 'php/config_sess.php';
require_once 'php/sign_up_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Δημιουργία λογαριασμού</title>
    <script src="script/form.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #264428;
            color: #333;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        body, h1, p {
            margin: 0;
        }

        #content {
            max-width: 500px;
            margin: 0 auto;
            box-sizing: border-box;
            padding: 20px;
            background-color: #324738;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ffffff;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #e0d3d3;
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        input {
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #446455;
            border-radius: 4px;
            background-color: #3b5344;
            color: #333;
            width: 100%;
        }

        button {
            background-color: #47755a;
            color: #fff;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #345542;
        }

        #result {
            margin-top: 20px;
            color: #e74c3c;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 1000%;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="content">
        <h1>Λογαριασμός πολίτη</h1>
        <p>Παρακαλώ, καταχωρήστε τα στοιχεία σας παρακάτω:</p>
        <form action="php/sign_up.php" method="post">
            <input name="username" type="text" placeholder="Username" required>
            <br>
            <input name="password" type="password" placeholder="Password" required>
            <br>
            <input name="name" type="text" placeholder="Όνομα" required>
            <br>
            <input name="lastname" type="text" placeholder="Επίθετο" required>
            <br>
            <input name="Phonenumber" type="tel" placeholder="Τηλέφωνο (69...)" required>
            <br>
            <button type="submit">Δημιουργία</button>
            <input type="reset" value="Καθαρισμός">
        </form>
        <?php
        check_sign_up_errors();
        ?>
    </div>
    <footer>
        <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
    </footer>

</body>

</html>

