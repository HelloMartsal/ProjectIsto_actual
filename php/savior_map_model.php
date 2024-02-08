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
    $group_results = [];
    $select = "SELECT * FROM offers;";
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
        $user = $value['user'];
        if (!array_key_exists($user, $group_results)) {
            $group_results[$user] = [];
        }
        array_push($group_results[$user], $result[$key]);
    }

    foreach ($result as $key => $value) {
        $select = "SELECT id_off_l,id_item_l,quant FROM off_item_link WHERE id_off_l = :id;";
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
        foreach ($group_results[$value['user']] as $key2 => $value2) {
            if ($value2['id_off'] == $value['id_off']) {
                $group_results[$value['user']][$key2]["product_names"] = $result[$key]['product_names'];
                $group_results[$value['user']][$key2]["quantities"] = $result[$key]['quantities'];
            }
        }

    }
    foreach ($result as $key => $value) {
        if ($value['savior_id'] != NULL){
            $select = "SELECT username_veh FROM vehicle WHERE id_veh = :id;";
            $check = $conn->prepare($select);
            $check->bindParam(':id', $value['savior_id']);
            $check->execute();
            $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result2[0] as $column => $data) {
                $result[$key][$column] = $data;
            }
            foreach ($group_results[$value['user']] as $key2 => $value2) {
                if ($value2['savior_id'] == $value['savior_id']) {
                    $group_results[$value['user']][$key2]["username_veh"]= $result[$key]['username_veh'];
                }
            }
        }
    }
    return $group_results;
}

function get_requests(object $conn) {
    $group_results = [];
    $select = "SELECT * FROM request;";
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
        $user = $value['user'];
        if (!array_key_exists($user, $group_results)) {
            $group_results[$user] = [];
        }
        array_push($group_results[$user], $result[$key]);
    }
    foreach ($result as $key => $value) {
        $select = "SELECT id_req_l,id_item_l FROM req_item_link WHERE id_req_l = :id;";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value['id_req']);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        $productNames = [];
        foreach ($result2 as $key2 => $value2) {
            $select = "SELECT product_name FROM item WHERE product_id = :id;";
            $check = $conn->prepare($select);
            $check->bindParam(':id', $value2['id_item_l']);
            $check->execute();
            $result3 = $check->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result3[0] as $column => $data) {
                $productNames['product_name' . ($key2 + 1)] = $data;
            }
            
            $result[$key]['product_names'] = $productNames;
        }
        foreach ($group_results[$value['user']] as $key2 => $value2) {
            if ($value2['id_req'] == $value['id_req']) {
                $group_results[$value['user']][$key2]["product_names"] = $result[$key]['product_names'];
            }
        }
    }
    foreach ($result as $key => $value) {
        if ($value['savior_id'] != NULL){
            $select = "SELECT username_veh FROM vehicle WHERE id_veh = :id;";
            $check = $conn->prepare($select);
            $check->bindParam(':id', $value['savior_id']);
            $check->execute();
            $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result2[0] as $column => $data) {
                $result[$key][$column] = $data;
            }
            foreach ($group_results[$value['user']] as $key2 => $value2) {
                if ($value2['savior_id'] == $value['savior_id']) {
                    $group_results[$value['user']][$key2]["username_veh"]= $result[$key]['username_veh'];
                }
            }
        }
    }
    return $group_results;
}


?>