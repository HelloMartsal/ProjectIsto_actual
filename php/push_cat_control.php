<?php
declare(strict_types=1);
function push_new_category(object $conn,string $category){
    insert_category($conn,$category);
}
?>