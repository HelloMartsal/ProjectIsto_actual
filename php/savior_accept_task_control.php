<?php
declare(strict_types=1);

function accept_offer(object $conn, int $task_id,int $user_id){
    update_offer($conn,$task_id,$user_id);
}

function accept_request(object $conn, int $task_id,int $user_id){
    update_request($conn,$task_id,$user_id);
}

function deliver_request(object $conn, int $task_id){
    move_request($conn,$task_id);
    remove_request($conn,$task_id);
}
function check_availability(object $conn, int $task_id){
    $flag = compare_quant($conn,$task_id);
    return $flag;
}
?>