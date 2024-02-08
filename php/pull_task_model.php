<?php

declare(strict_types=1);
function get_task_offer(object $conn){
    $select = "SELECT * FROM offers WHERE savior_id= :id";
    $check = $conn->prepare($select);
    $id = get_id($conn);
    $check->bindParam(':id',$id);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($result as $key => $value) {
        $select = "SELECT onoma,epitheto,phonenum,usertype,Latitude,Longitude FROM person WHERE user_id = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['user']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2[0] as $column => $data) {
            $result[$key][$column] = $data;
        }
    }
    foreach ($result as $key => $value) {
        $select = "SELECT id_item_l,quant FROM off_item_link WHERE id_off_l = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['id_off']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        $productNames = [];
        $quantities = [];
        foreach ($result2 as $key2 => $value2) {
            $select = "SELECT product_name FROM item WHERE product_id = :id;";
            $check = $conn->prepare($select);
            $check->bindParam(':id', $value2['id_item_l']);
            $check->execute();
            $result3 = $check->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result3[0] as $column => $data) {
                $productNames['product_name' . ($key2 + 1)] = $data;
            }
            $quantities['quant' . ($key2 + 1)] = $value2['quant'];
            
            $result[$key]['product_names'] = $productNames;
            $result[$key]['quantities'] = $quantities;
        }
    }
    return $result;
}


function get_id(object $conn) {
    $select = "SELECT user_id FROM person WHERE user_id = :id";
    $check = $conn->prepare($select);  
    $check->bindParam(':id', $_SESSION['user_id']);
    $check->execute();
    $result = $check->fetchColumn();
    return $result;
}

function get_task_request(object $conn){
    $select = "SELECT * FROM request WHERE savior_id= :id";
    $check = $conn->prepare($select);
    $id = get_id($conn);
    $check->bindParam(':id',$id);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($result as $key => $value) {
        $select = "SELECT onoma,epitheto,phonenum,usertype,Latitude,Longitude FROM person WHERE user_id = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['user']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2[0] as $column => $data) {
            $result[$key][$column] = $data;
        }
    }
    foreach ($result as $key => $value) {
        $select = "SELECT id_item_l,quant FROM off_item_link WHERE id_off_l = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['id_off']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        $productNames = [];
        $quantities = [];
        foreach ($result2 as $key2 => $value2) {
            $select = "SELECT product_name FROM item WHERE product_id = :id;";
            $check = $conn->prepare($select);
            $check->bindParam(':id', $value2['id_item_l']);
            $check->execute();
            $result3 = $check->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result3[0] as $column => $data) {
                $productNames['product_name' . ($key2 + 1)] = $data;
            }
            $quantities['quant' . ($key2 + 1)] = $value2['quant'];
            
            $result[$key]['product_names'] = $productNames;
            $result[$key]['quantities'] = $quantities;
        }
    }
    return $result;
}




?>