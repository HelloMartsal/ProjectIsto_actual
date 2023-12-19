<?php
declare(strict_types=1);


function set_coordinates(object $conn,float $lat,float $log,string $usr){
    $select = "UPDATE person SET Latitude = ? , Longitude = ? WHERE username = ?";
    $check = $conn->prepare($select);

    $check->execute([$lat,$log,$usr]);
}
?>