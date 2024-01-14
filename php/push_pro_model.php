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
?>