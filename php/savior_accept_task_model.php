<?php
declare(strict_types=1);

function update_offer(object $conn,int $task_id,int $user_id){
    if (!check_user_offers_requests($conn, $user_id)) {
        $_SESSION['error'] = "Error: User has 4 or more requests/offers.";
        return;
    }
    $select = "UPDATE offers SET savior_id = ?,accept_date = ? WHERE id_off = ?;";
    $check = $conn->prepare($select);
    $current_date = date('Y-m-d');
    $check->execute([$user_id,$current_date,$task_id]);
}

function update_request(object $conn,int $task_id,int $user_id){
    if (!check_user_offers_requests($conn, $user_id)) {
        $_SESSION['error'] = "Error: User has 4 or more requests/offers.";
        return;
    }
    echo "here";
    $select = "UPDATE request SET savior_id = ?,accept_date = ?,state = ? WHERE id_req = ?;";
    $check = $conn->prepare($select);
    $current_date = date('Y-m-d');
    $state = "accepted";
    $check->execute([$user_id,$current_date,$state,$task_id]);
}

function check_user_offers_requests(object $conn, int $user_id): bool {
    $select = "SELECT COUNT(*) as count FROM ((SELECT savior_id FROM offers WHERE savior_id = ?) UNION ALL (SELECT savior_id FROM request WHERE savior_id = ?)) as count";
    $stmt = $conn->prepare($select);
    $stmt->execute([$user_id, $user_id]);
    $result = $stmt->fetch();

    return $result['count'] < 4;
}
function remove_request(object $conn, int $task_id){
    $select = "DELETE FROM request WHERE id_req = :task_id";
    $check = $conn->prepare($select);
    $check->bindParam(':task_id', $task_id);
    $check->execute();

}

function move_request(object $conn, int $task_id){
$select = "SELECT * FROM request WHERE id_req = :task_id";
    $check = $conn->prepare($select);
    $check->bindParam(':task_id', $task_id);
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
        $result[$row]["items"] = json_encode($items);
    }
    $time = date("Y-m-d");
    foreach($result as $row=>$value){
        $select = "INSERT INTO finished_requests(product_id,manypeople,id_user,id_savior,time,accept_time,finish_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $check = $conn->prepare($select);
        $items = json_encode($value["items"]);
        $check->execute([$items,$value["people"],$value["user"],$value["savior_id"],$value["time"],$value["accept_date"],$time]);
    }


}
function compare_quant(object $conn, int $task_id){
    $select = "SELECT * FROM request WHERE id_req = :task_id";
    $check = $conn->prepare($select);
    $check->bindParam(':task_id', $task_id);
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
    $flag = true;
    foreach ($result as $row=>$value){
        $people = $value["people"];
        $items = $value["items"];
        $select = "SELECT * FROM base WHERE id_item = :id";
        foreach ($items as $row2=>$value2){
            $check = $conn->prepare($select);
            $check ->bindParam(':id', $value2["id_item_l"], PDO::PARAM_INT);
            $check->execute();
            if ($check->rowCount() == 0){
                $flag = false;
                break;
            }
            $result3 = $check->fetchAll(PDO::FETCH_ASSOC);
            if($result3[0]["quant"]<$people){
                $flag = false;
                break;
            }

        }
        if ($flag == false){
            break;
        }
    } 
    return $flag;
}
?>