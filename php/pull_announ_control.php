<?php
declare(strict_types=1);
function pull_announment(object $conn){
    $result = get_announment($conn);
    return $result;
}
?>