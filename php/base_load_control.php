<?php
declare(strict_types=1);

function pull_offers($conn){
    $user_id = $_SESSION["user_id"];
    $user_id = (int)$user_id;
    $result  = get_offers_of_user($conn, $user_id);
    move_offer($conn, $user_id);
    remove_offers($conn, $user_id);
    return $result;    
}

function decode_to_base($conn){
    $result = pull_offers($conn);
    update_base($conn, $result);
}
?>