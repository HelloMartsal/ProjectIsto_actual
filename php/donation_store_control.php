<?php
declare(strict_types=1);

function push_new_offer(object $conn, int $user_id, array $items){
    insert_new_offer($conn, $user_id, $items);
}
?>