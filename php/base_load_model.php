<?php
declare(strict_types=1);
function get_offers_of_user(object $conn,int $user_id){
    $select = "SELECT id_off FROM offers WHERE savior_id = :user_id";
    $check = $conn->prepare($select);
    $check->bindParam(':user_id', $user_id);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    $items = [];
    foreach($result as $row=>$value){
        $select = "SELECT id_item_l,quant FROM off_item_link WHERE id_off_l = :id";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value["id_off"], PDO::PARAM_INT);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $row2=>$value2){
            $items[] = $value2;
        }
    }
    return $items;
}

function update_base(object $conn, array $result){
    $select = "INSERT INTO base (id_item,quant) VALUES (:id_item,:quant) ON DUPLICATE KEY UPDATE quant = quant + :quant";
    $check = $conn->prepare($select);
    foreach($result as $row=>$value){
        $check->bindParam(':id_item', $value["id_item_l"], PDO::PARAM_INT);
        $check->bindParam(':quant', $value["quant"], PDO::PARAM_INT);
        $check->execute();
    }
    
}

function remove_offers(object $conn, int $user_id){
    $select = "DELETE FROM offers WHERE savior_id = :user_id";
    $check = $conn->prepare($select);
    $check->bindParam(':user_id', $user_id);
    $check->execute();
}

function move_offer(object $conn, int $user_id){
    $select = "SELECT * FROM offers WHERE savior_id = :user_id";
    $check = $conn->prepare($select);
    $check->bindParam(':user_id', $user_id);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row=>$value){
        $items = [];
        $select = "SELECT id_item_l,quant FROM off_item_link WHERE id_off_l = :id";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value["id_off"], PDO::PARAM_INT);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $row2=>$value2){
            $items[] = $value2;
 
        }
        $result[$row]["items"] = json_encode($items);
    }
    $time = date("Y-m-d");
    foreach($result as $row=>$value){
        $select = "INSERT INTO finished_offers(itemquant,id_user,id_savior,time,accept_time,finish_time) VALUES (:items,:id_user,:id_savior,:time,:accept_time,:finish_time)";
        $check = $conn->prepare($select);
        $check->bindParam(':items', $value["items"]);
        $check->bindParam(':id_user', $value["user"]);
        $check->bindParam(':id_savior', $value["savior_id"]);
        $check->bindParam(':time',$value["time"]);
        $check->bindParam(':accept_time',$value["accept_date"]);
        $check->bindParam(':finish_time',$time);
        $check->execute();
    }

}

function get_items(object $conn){
    $select = "SELECT id_item,quant FROM base";
    $check = $conn->prepare($select);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_request_by_user(object $conn,int $user_id){
    $select = "SELECT id_req,people FROM request WHERE savior_id = :user_id";
    $check = $conn->prepare($select);
    $check->bindParam(':user_id', $user_id);
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row=>$value){
        $items = [];
        $select = "SELECT id_item_l FROM req_item_link WHERE id_req_l = :id";
        $check = $conn->prepare($select);
        $check->bindParam(':id', $value["id_req"], PDO::PARAM_INT);
        $check->execute();
        $result2 = $check->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $row2=>$value2){
            $items[] = $value2;
        }
        $result[$row]["items"] = $items;
    }
    return $result;
}

function remove_items_from_base(object $conn, array $result){
    foreach($result as $row=>$value){
        $select = "UPDATE base SET quant = quant - :quant WHERE id_item = :id_item";
        $check = $conn->prepare($select);
        $check->bindParam(':id_item', $value["item"], PDO::PARAM_INT);
        $check->bindParam(':quant', $value["quant"], PDO::PARAM_INT);
        $check->execute();
    }
}

function set_state_request(object $conn, int $user_id){
    $select = "UPDATE request SET state = 'loaded' WHERE savior_id = :user_id";
    $check = $conn->prepare($select);
    $check->bindParam(':user_id', $user_id);
    $check->execute();
}
?>
