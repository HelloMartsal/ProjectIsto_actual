<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    
    try {
        require 'dbc.php';
        require_once 'process_coordinates_model.php';
        require_once 'process_coordinates_control.php';
        require_once 'config_sess.php';
        
        $usr = $_SESSION["temp_user"];
        update_coordinates_sign_up($conn,$lat,$lng,$usr);
        unset( $_SESSION["temp_user"]);
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
