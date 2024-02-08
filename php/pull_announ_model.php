<?php
declare(strict_types=1);
function get_announment(object $conn){
    $select = "SELECT * FROM announcements";
    $check = $conn->prepare($select);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $key => $value) {
        $select = "SELECT product_name FROM announ_product INNER JOIN item ON id_pro_match = product_id
        WHERE id_ann_match = :id";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['id_ann']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($result2 as $column => $data) {
            $products['product' . ($column + 1)] = $data["product_name"];
        }
        $result[$key]['products'] = $products;
        
    }
    return $result;
}

?>