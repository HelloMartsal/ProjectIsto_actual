<?php
declare(strict_types=1);
function get_category(object $conn) {
    $select = "SELECT * FROM category;";
    $check = $conn->prepare($select);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}

function get_items(object $conn) {
    $select = "SELECT * FROM item;";
    $check = $conn->prepare($select);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}

?>