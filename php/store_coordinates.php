<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lat = $_POST["lat"];
    $lng = $_POST["lng"];
    
    try {
        require_once 'dbc.php';
        $select = "UPDATE person SET Latitude = ? , Longitude = ? WHERE usertype = 'admin' ";
        $check = $conn->prepare($select);
    
        $check->execute([$lat,$lng]);
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