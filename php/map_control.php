<?php
declare(strict_types=1);

function user_data(object $conn){
    $result = get_user($conn);
    return $result;
}
?>