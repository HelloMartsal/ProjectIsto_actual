<?php
declare(strict_types=1);

function fetch_username(object $conn, string $username){
    $select = "SELECT * FROM person WHERE username = :username";
    $check = $conn->prepare($select);
    $check->bindParam(":username",$username);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_savior_profile(object $conn,string $username1,string $password1,string $onoma, string $lastname,string $phonenum,string $salt,string $pepper){
    $select = "INSERT INTO person(onoma,epitheto,phonenum,usertype,Latitude,Longitude,username,pwd,salt,pepper)
    VALUES (:onoma,:epitheto,:phonenum,:usertype,:Latitude,:Longitude,:username,:pwd,:salt,:pepper)";
    $check = $conn->prepare($select);
    $check->bindParam(":onoma",$onoma);
    $check->bindParam(":epitheto",$lastname);
    $phonenumint = intval($phonenum,10);
    $check->bindParam(":phonenum",$phonenumint);
    $usertype = "savior";
    $check->bindParam(":usertype",$usertype);
    //Thetoume timi ena stis sintetagmenes. Den mas endiaferei h timi akoma
    //O xristis tha mporei na dosei tis sintetagmenes toy stin epomeni selida
    $Latitude = 1;
    $check->bindParam(":Latitude",$Latitude);
    $Longitude = 1;
    $check->bindParam(":Longitude",$Longitude);
    $check->bindParam(":pwd",$password1);
    $check->bindParam(":username",$username1);
    $check->bindParam(":salt",$salt);
    $check->bindParam(":pepper",$pepper);
    $check->execute();
}
?>