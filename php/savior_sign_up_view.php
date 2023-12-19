<?php
declare(strict_types=1);
@session_start(); //για λόγους ψυχικής υγείας
function check_savior_sign_up_errors(){

    if(isset($_SESSION["sign_up_errors"])){
        $errors=$_SESSION["sign_up_errors"];
        

        foreach($errors as $error){
            echo '<p class="sign_up_errors">' . $error .'</p>';
        }

        unset($_SESSION["sign_up_errors"]);
    }
    
    
}
?>