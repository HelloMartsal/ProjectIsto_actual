<?php
declare(strict_types=1);
function insert_cat_url(object $conn,int $id,string $category_name){
    $insert = "INSERT INTO category (cat_id,cat_name) VALUES (:id,:category_name)";
    $check = $conn->prepare($insert);
    $check->bindParam(":id",$id);
    $check->bindParam(":category_name",$category_name);
    $check->execute();
}

function insert_item_url(object $conn,int $id,int $category,string $name, string $details){
    $insert = "INSERT INTO item(product_id,category,product_name,details) VALUES (:id,:category,:name,:details)";
    $check = $conn->prepare($insert);
    $check->bindParam(":id",$id);
    $check->bindParam(":category",$category);
    $check->bindParam(":name",$name);
    $check->bindParam(":details",$details);
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

function fetch_cat_id(object $conn,int $cat_id){
    $select = "SELECT cat_id FROM category WHERE cat_id= :category_id";
    $check = $conn->prepare($select);
    $check->bindParam(":category_id",$cat_id);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetch_item(object $conn,string $product_name){
    $select = "SELECT product_name FROM item WHERE product_name= :it";
    $check = $conn->prepare($select);
    $check->bindParam(":it",$product_name);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetch_item_id(object $conn,int $item_id){
    $select = "SELECT product_id FROM item WHERE product_id= :it_id";
    $check = $conn->prepare($select);
    $check->bindParam(":it_id",$item_id);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function update(object $conn,int $c_id1,int $c_id2, string $name){
    $update = "UPDATE item SET category = :id WHERE category = :id2 AND product_name= :iname";
    $check = $conn->prepare($update);
    $check->bindParam(":id",$c_id1);
    $check->bindParam(":id2",$c_id2);
    $check->bindParam(":iname",$name);
    $check->execute();
}


?>