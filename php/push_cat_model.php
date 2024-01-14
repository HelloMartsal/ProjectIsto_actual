<?php
declare(strict_types=1);
function insert_category(object $conn,string $category){
    $select = "INSERT INTO category(cat_name) VALUES (:category)";
    $check = $conn->prepare($select);
    $check->bindParam(':category',$category);
    $check->execute();
}
?>