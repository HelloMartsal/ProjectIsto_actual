<?php
declare(strict_types=1);

function get_user(object $conn) {
    $select = "SELECT onoma,epitheto,phonenum,usertype,Latitude,Longitude FROM person;";
    $check = $conn->prepare($select);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}
?>