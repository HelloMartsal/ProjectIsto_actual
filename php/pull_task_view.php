<?php
declare(strict_types=1);
function send_task(array $result){
    $data = json_encode($result,JSON_UNESCAPED_UNICODE);
    header('Content-Type: application/json');
    echo $data;
}
?>