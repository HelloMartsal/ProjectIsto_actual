<?php
declare (strict_types = 1);
function insert_new_request($conn, $user_id, $items, $people){
    $select = "INSERT INTO request (user,state,time,people) VALUES (:user_id,:state,:time,:people)";
    $check = $conn->prepare($select);
    $check->bindParam(':user_id', $user_id);
    $state = "nothing";
    $check->bindParam(':state', $state);
    $time = date("Y-m-d");
    $check->bindParam(':time', $time);
    $check->bindParam(':people', $people);
    $check->execute();
    $request_id = $conn->lastInsertId();
    foreach ($items as $item) {
        $select = "INSERT INTO req_item_link (id_req_l,id_item_l) VALUES (:request_id,:item_id)";
        $check = $conn->prepare($select);
        $check->bindParam(':request_id', $request_id);
        $check->bindParam(':item_id', $item);
        $check->execute();
    }

}
