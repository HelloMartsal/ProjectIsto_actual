<?php
declare(strict_types=1);

function get_user(object $conn) {
    $select = "SELECT onoma,epitheto,phonenum,usertype,Latitude,Longitude FROM person WHERE user_id = :id";
    $check = $conn->prepare($select);  
    $check->bindParam(':id', $_SESSION['user_id']);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_base(object $conn) {
    $select = "SELECT onoma,epitheto,phonenum,usertype,Latitude,Longitude FROM person WHERE usertype = 'admin' and onoma = 'base'";
    $check = $conn->prepare($select);  
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_offers(object $conn) {
    $select = "SELECT * FROM offers WHERE savior_id IS NOT NULL;";
    $check = $conn->prepare($select);
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
        $select = "SELECT product_name FROM item WHERE product_id = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['product_id']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2[0] as $column => $data) {
            $result[$key][$column] = $data;
        }
    }
    foreach ($result as $key => $value) {
        $select = "SELECT username_veh FROM vehicle WHERE id_veh = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['savior_id']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2[0] as $column => $data) {
            $result[$key][$column] = $data;
        }
    }
    return $result;
}

function get_requests(object $conn) {
    $select = "SELECT * FROM request WHERE savior_id IS NOT NULL;";
    $check = $conn->prepare($select);
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
        $select = "SELECT product_name FROM item WHERE product_id = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['product_id']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2[0] as $column => $data) {
            $result[$key][$column] = $data;
        }
    }
    foreach ($result as $key => $value) {
        $select = "SELECT username_veh FROM vehicle WHERE id_veh = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['savior_id']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result2[0] as $column => $data) {
            $result[$key][$column] = $data;
        }
    }
    return $result;
}


?>