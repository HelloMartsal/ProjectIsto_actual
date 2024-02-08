<?php
declare(strict_types=1);

function items(object $conn) {
    $select = "SELECT * FROM item INNER JOIN category ON category= cat_id
    LEFT JOIN base ON product_id = id_item ORDER BY product_id ASC";
    $check = $conn->prepare($select);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}



?>