<?php
declare(strict_types=1);

function accept_offer(object $conn, int $task_id,int $user_id){
    update_offer($conn,$task_id,$user_id);
}

function accept_request(object $conn, int $task_id,int $user_id){
    update_request($conn,$task_id,$user_id);
}
?>