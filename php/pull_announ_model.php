<?php
declare(strict_types=1);
function get_announment(object $conn){
    $select = "SELECT * FROM announcements";
    $check = $conn->prepare($select);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $key => $value) {
        $select = "SELECT id_pro_match FROM announ_product WHERE id_ann_match = :id";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['id_ann']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($result2 as $column => $data) {
            $products['product' . ($column + 1)] = $data["id_pro_match"];
        }
        $result[$key]['products'] = $products;
        
    }
    return $result;
}
?>