<?php
declare(strict_types=1);
function insert_category(object $conn,string $category){
    $select = "INSERT INTO category(cat_name) VALUES (:category)";
    $check = $conn->prepare($select);
    $check->bindParam(':category',$category);
    $check->execute();
}


function fetch_category(object $conn,string $category_name){
    $select = "SELECT cat_name FROM category WHERE cat_name= :category_name";
    $check = $conn->prepare($select);
    $check->bindParam(":category_name",$category_name);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    return $result;
}

?>