<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    try {
        require_once 'sign_up_coor_next_control.php';
        require_once 'config_sess.php';
        header("Location:../login_page.php");
        
        die();
    } catch (PDOException $e) {
        die("Idk what failed". $e->getMessage());
    }
} else {
    header("Location:../index.php"); 
}
?>