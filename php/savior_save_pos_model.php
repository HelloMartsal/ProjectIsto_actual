<?php
declare(strict_types=1);


function set_coordinates(object $conn,float $lat,float $log){
    $select = "UPDATE person SET Latitude = ? , Longitude = ? WHERE user_id = ?";
    $check = $conn->prepare($select);
    $user_id = $_SESSION["user_id"];
    $check->execute([$lat,$log,$user_id]);
}
?>