<?php
declare (strict_types = 1);

function push_new_request(object $conn, int $user_id, array $items, int $people){
    insert_new_request($conn, $user_id, $items, $people);
}
?>