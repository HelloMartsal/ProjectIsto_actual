<?php
require_once 'php/config_sess.php';
require_once 'php/savior_sign_up_view.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Δημιουργία λογαριασμού Διασώστη</title>
    <script src="script/form.js"defer> </script>
    <link rel="stylesheet" type="text/css" href=""> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #264428;
    color: #333;
    margin: 0;
}

h1 {
    color: #ffffff;
}

p {
    color: #ffffff;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #467455;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="password"],
input[type="tel"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #293129;
    border-radius: 4px;
    margin-bottom: 10px;
}

button {
    background-color: #324e40;
    color: rgb(255, 255, 255);
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2c462e;
}

input[type="reset"] {
    background-color: #324e40;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="reset"]:hover {
    background-color: #2c462e;
}



    </style>

</head>
<body>
    <h1>Λογαριασμός Διασώστη</h1>
     <p>Παρακαλώ, καταχωρήστε τα στοιχεία σας παρακάτω:</p>
     <form action ="php/savior_sign_up.php" method="post">    
        Username:
        <input name = "username" type = "text" size = "25" required >
        <br>
        Password: 
        <input name = "password" type = "password" size = "25" required>
        <br>
        Όνομα: 
        <input name = "name" type = "text" size = "25" required> 
        <br>
        Επίθετο:
        <input name= "lastname" type = "text" size = "25" required>
        <br>
        Τηλέφωνο:
        <input name = "Phonenumber" type = "tel" size = "25" placeholder="69..." required>
        <br>
        <button type = "submit">Create</button>
        <input  type = "reset" value = "Clear">
    </form>
    <?php
    check_savior_sign_up_errors();
    ?>
</body>
<footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
</footer>

</html>