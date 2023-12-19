<?php
require_once 'php/config_sess.php';
require_once 'php/login_view.php';
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Σύνδεση σε λογαριασμό</title>
      <script src="script/form.js"defer> </script>
      <link rel="stylesheet" type="text/css" href="">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    
    
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
            Username : <input type = "text" name="username" minlength="3" required ><br>
            Password : <input type = "password" name="password" required ><br>
            <input type="submit" id="submit" value="login">
            <input type="reset" value="clear">
            </form>
            <?php
            check_login_errors();
            ?>
        </main>
    
    </body>
    <?php
var_dump($_SESSION);
?>
    <footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
    </footer>
</html>