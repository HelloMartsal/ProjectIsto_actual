<?php
declare(strict_types=1);
function push_new_item(object $conn,string $name,int $category,string $details){
    insert_item($conn,$name,$category,$details);
}
function item_exists(object $conn,string $name){
   if(find_item($conn,$name)){
       return true;
    }else{
        return false;
    }
}
function find_category_by_name(object $conn,string $category){
    $id_cat = find_category($conn,$category);
    return $id_cat;
}
?>