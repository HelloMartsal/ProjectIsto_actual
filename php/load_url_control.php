<?php
declare(strict_types=1);
function push_cat_url(object $conn,array $data){
    foreach($data['categories'] as $category){
        $id = intval($category['id']);
        insert_cat_url($conn,$id,$category['category_name']);
    }
}
function push_item_url(object $conn,array $data){
    foreach($data['items'] as $item){
        $id = intval($item['id']);
        $category = intval($item['category']);
        $details = json_encode($item['details']);
        insert_item_url($conn,$id,$category,$item['name'],$details);
    }
}

?>