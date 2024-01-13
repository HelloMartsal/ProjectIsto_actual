<?php
declare(strict_types=1);
function push_announ(object $conn,string $title,string $content,array $items){
    $currentDate = date('Y-m-d');
    store_announ($conn,$title,$content,$currentDate,$items);
}

?>