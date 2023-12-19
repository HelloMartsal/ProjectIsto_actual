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
<?php
var_dump($_SESSION);
?>
<footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
</footer>

</html>