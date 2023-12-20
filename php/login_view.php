<?php
declare(strict_types=1);
@session_start(); //για λόγους ψυχικής υγείας
function check_login_errors(){
    if(isset($_SESSION["login_errors"])){
        $errors=$_SESSION["login_errors"]; 

        foreach($errors as $error){
            echo '<p class="login-errors">' . $error .'</p>';
        }
        unset($_SESSION["login_errors"]);
    } 
}
function print_username(){
    if(isset($_SESSION["username"])){
        echo "<p><strong>". $_SESSION["username"] . ",είστε συνδεμένοι." ."</strong></p>";
    }else {
        echo "<p><strong>" . "Συνδεθείτε σε ήδη υπάρχοντα λογαριασμό." . "</strong></p>";
    }
}

?>