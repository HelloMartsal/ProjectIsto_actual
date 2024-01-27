<?php
declare(strict_types=1);
function insert_item(object $conn,string $name,int $category,string $details){
    $select = "INSERT INTO item (product_name,category,details) VALUES (:name,:category,:details)";
    $check = $conn->prepare($select);
    $check->bindParam(':name',$name);
    $check->bindParam(':category',$category);
    $check->bindParam(':details',$details);
    $check->execute();
}
function find_item(object $conn,string $name){
    $select = "SELECT product_name FROM item WHERE product_name = :name";
    $check = $conn->prepare($select);
    $check->bindParam(':name',$name);
    $check->execute();
    $result = $check->fetch(PDO::FETCH_ASSOC);
    if($result){
        return true;
    }else{
        return false;
    }
}
function find_category(object $conn,string $category){
    $select = "SELECT cat_id FROM category WHERE cat_name = :category";
    $check = $conn->prepare($select);
    $check->bindParam(':category',$category);
    $check->execute();
    $result = $check->fetch(PDO::FETCH_ASSOC);
    if($result){
        return $result['cat_id'];
    }else{
        return false;
    }
}
?>