<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    
    try {
        require 'dbc.php';
        require_once 'savior_save_pos_model.php';
        require_once 'savior_save_pos_control.php';
        require_once 'config_sess.php';
        
    
        update_coordinates($conn,$lat,$lng);
        $conn=null;
        $check=null;
        die();
    } catch (PDOException $e) {
        die("Query failed:". $e->getMessage());
    }
} else {
    header("Location:../index.php"); 
}
?>