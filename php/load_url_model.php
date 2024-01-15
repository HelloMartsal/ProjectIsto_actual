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

?>