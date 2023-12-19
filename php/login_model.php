<?php
declare(strict_types=1);

function fetch_user(object $conn, string $username){
    $select = "SELECT * FROM person WHERE username = :username";
    $check = $conn->prepare($select);
    $check->bindParam(":username",$username);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    return $result;
}
?>