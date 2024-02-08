<?php
declare(strict_types=1);
function insert_base(object $conn,int $quantity ,int $id){
    $select = "INSERT INTO base (id_item,quant) VALUES (:id,:quan)";
    $check = $conn->prepare($select);
    $check->bindParam(':id',$id);
    $check->bindParam(':quan',$quantity);
    $check->execute();
}

function add_quan(object $conn,int $quantity,int $id,int $oldquan){
$select = "UPDATE base SET quant = :quan+:oldquan WHERE id_item = :id";
$check = $conn->prepare($select);
$check->bindParam(':id',$id);
$check->bindParam(':quan',$quantity);
$check->bindParam(':oldquan',$oldquan);
$check->execute();
}

function select_quan_from_name(object $conn,string $name){
$select = "SELECT quant FROM base INNER JOIN item ON id_item=product_id 
WHERE product_name = :name";
$check = $conn->prepare($select);
$check->bindParam(":name",$name);
$check->execute();
$result=$check->fetch(PDO::FETCH_ASSOC);
return $result['quant'];
}

function fetch_item(object $conn,string $product_name){
    $select = "SELECT product_name FROM item WHERE product_name= :it";
    $check = $conn->prepare($select);
    $check->bindParam(":it",$product_name);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetch_id_name(object $conn,string $name){
$select = "SELECT product_id FROM item WHERE product_name= :it";
$check = $conn->prepare($select);
$check->bindParam(":it",$name);
$check->execute();
$result=$check->fetch(PDO::FETCH_ASSOC);
return $result['product_id'];
}

function remove_quan(object $conn,int $quantity,int $id,int $oldquan){
$select = "UPDATE base SET quant = :oldquan-:quan WHERE id_item = :id";
$check = $conn->prepare($select);
$check->bindParam(':id',$id);
$check->bindParam(':quan',$quantity);
$check->bindParam(':oldquan',$oldquan);
$check->execute();
}

function fetch_id(object $conn,int $id){
$select = "SELECT id_item FROM base WHERE id_item= :it";
$check = $conn->prepare($select);
$check->bindParam(":it",$id);
$check->execute();
$result=$check->fetch(PDO::FETCH_ASSOC);
return $result;
}

?>