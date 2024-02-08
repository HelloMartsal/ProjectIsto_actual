<?php
declare(strict_types=1);
function pull_task_offer(object $conn){
    $result = get_task_offer($conn);
    return $result;
}

function pull_task_request(object $conn){
    $result = get_task_request($conn);
    return $result;
}
?>
