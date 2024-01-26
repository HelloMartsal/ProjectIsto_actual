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
    $select = "UPDATE request SET savior_id = ?,accept_date = ? WHERE id_req = ?;";
    $check = $conn->prepare($select);
    $current_date = date('Y-m-d');
    $check->execute([$user_id,$current_date,$task_id]);
}

function check_user_offers_requests(object $conn, int $user_id): bool {
    $select = "SELECT COUNT(*) as count FROM ((SELECT savior_id FROM offers WHERE savior_id = ?) UNION ALL (SELECT savior_id FROM request WHERE savior_id = ?)) as count";
    $stmt = $conn->prepare($select);
    $stmt->execute([$user_id, $user_id]);
    $result = $stmt->fetch();

    return $result['count'] < 4;
}
//TODO PUT STUFF HERE
function remove_request(object $conn, int $task_id){

}

function move_request(object $conn, int $task_id){

}
?>