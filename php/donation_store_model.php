<?php
declare(strict_types=1);

function insert_new_offer(object $conn, int $user_id, array $items){
    $sql = "INSERT INTO offers (user,time) VALUES (:user_id,:time)";
    $check = $conn->prepare($sql);
    $check->bindParam(':user_id', $user_id);
    $time = date("Y-m-d");
    $check->bindParam(':time',$time );
    $check->execute();
    $offer_id = $conn->lastInsertId(); //damn this is cool
    foreach ($items as $item){
        $sql = "INSERT INTO off_item_link (id_off_l,id_item_l, quant) VALUES (:offer_id, :item_id, :quantity)";
        $check = $conn->prepare($sql);
        $check->bindParam(':offer_id', $offer_id);
        $check->bindParam(':item_id', $item["item"]);
        $check->bindParam(':quantity', $item["quant"]);
        $check->execute();
    }

}
?>