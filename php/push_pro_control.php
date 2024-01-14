<?php
declare(strict_types=1);
function push_new_item(object $conn,string $name,int $category,string $details){
    insert_item($conn,$name,$category,$details);
}
?>